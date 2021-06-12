
<?php

function Main()
{    
  $GLOBALS["goMap"] = ms_newMapObj("../map/sigohan_malang.map" );
  $GLOBALS["goMap"]->set("width",530);
  //batas koordinat seluruh peta, untuk tool 'zoom all'
  $GLOBALS["gfMinX"] = (float)$GLOBALS["goMap"]->extent->minx;
  $GLOBALS["gfMinY"] = (float)$GLOBALS["goMap"]->extent->miny;
  $GLOBALS["gfMaxX"] = (float)$GLOBALS["goMap"]->extent->maxx;
  $GLOBALS["gfMaxY"] = (float)$GLOBALS["goMap"]->extent->maxy;
  
  //set nilai $aVars dengan nilai parameter URL
  if (sizeof($_POST) > 0) {
    $aVars = $_POST;
  } else {
    if (sizeof($_GET) > 0) {
      $aVars = $_GET;
    } else {
      $aVars = array();
    }
  }
  
  //tool navigasi default: zoom in
  $GLOBALS["gszCurrentTool"] = "ADD";
  $GLOBALS["gShowQueryResults"] = FALSE;
  
  //proses parameter URL
  ProcessURLArray( $aVars );
}


function DrawMap()
{
 if ($GLOBALS["gShowQueryResults"])
    $img = $GLOBALS["goMap"]->drawQuery();
  else
    $img = $GLOBALS["goMap"]->draw();
  
  $url = $img->saveWebImage();

  $nWidth = $GLOBALS["goMap"]->width;
  $nHeight = $GLOBALS["goMap"]->height;

  echo "<INPUT  TYPE=image SRC=".$url." BORDER=0 WIDTH=\"".
        $nWidth."\" HEIGHT=\"".$nHeight."\" NAME=MAINMAP>\n";

  echo "<INPUT TYPE=HIDDEN NAME=MINX VALUE=\"".
      $GLOBALS["goMap"]->extent->minx."\">\n";
  echo "<INPUT TYPE=HIDDEN NAME=MINY VALUE=\"".
      $GLOBALS["goMap"]->extent->miny."\">\n";
  echo "<INPUT TYPE=HIDDEN NAME=MAXX VALUE=\"".
      $GLOBALS["goMap"]->extent->maxx."\">\n";
  echo "<INPUT TYPE=HIDDEN NAME=MAXY VALUE=\"".
      $GLOBALS["goMap"]->extent->maxy."\">\n";
}



function DrawKeyMap()
{
    $img = $GLOBALS["goMap"]->drawreferencemap();
    $url = $img->saveWebImage();

    echo "<INPUT TYPE=image SRC=$url  BORDER=1 NAME=KEYMAP>\n";
}


function ProcessURLArray( $aVars)
{
  //simpan tool navigasi yang sedang aktif
  $GLOBALS["gszCurrentTool"] = (isset($aVars["CMD"])) ? 
    $aVars["CMD"] : "ADD";

  //set batas koordinat peta
  $oExt = $GLOBALS["goMap"];
  $fMinX = isset($aVars["MINX"]) ? $aVars["MINX"] : $oExt->extent->minx;
  $fMinY = isset($aVars["MINY"]) ? $aVars["MINY"] : $oExt->extent->miny;;
  $fMaxX = isset($aVars["MAXX"]) ? $aVars["MAXX"] : $oExt->extent->maxx;;
  $fMaxY = isset($aVars["MAXY"]) ? $aVars["MAXY"] : $oExt->extent->maxy;;
  $GLOBALS["goMap"]->setextent( $fMinX, $fMinY, $fMaxX, $fMaxY );

  //lebar dan tinggi gambar peta
  $fW  = $GLOBALS["goMap"]->width;
  $fH = $GLOBALS["goMap"]->height;

  if (isset($_POST["legendlayername"]))
  {
        for( $i=0; $i<$GLOBALS["goMap"]->numlayers; $i++ )
        {
            $oLayer = $GLOBALS["goMap"]->getLayer($i);
            if (in_array( $oLayer->name, $_POST["legendlayername"] ))
                $oLayer->set( "status", MS_ON );
            else
                $oLayer->set( "status", MS_OFF );
        }
    }
  
  //lakukan perubahan skala, sesuai tool navigasi terpilih
  if (isset($aVars["CMD"]) && isset ($aVars["MAINMAP_x"])) {
    //titik tempat user meng-klik pada lokasi peta
    $nX = isset($aVars["MAINMAP_x"]) ? 
      intval($aVars["MAINMAP_x"]) : $fW/2.0;
    $nY = isset($aVars["MAINMAP_y"]) ? 
      intval($aVars["MAINMAP_y"]) : $fW/2.0;
    
    if (isset($aVars["MAINMAP_x"]) && isset($aVars["MAINMAP_y"])) {
      $oPixelPos = ms_newpointobj();
      $oPixelPos->setxy($nX, $nY);

      $oGeoExt = ms_newrectobj();
      $oGeoExt->setextent($fMinX, $fMinY, $fMaxX, $fMaxY);

      //ubah skala peta, dengan method zoompoint atau setextent
      if ($aVars["CMD"] == "ZOOM_IN") {
        $GLOBALS["goMap"]->zoompoint(2, $oPixelPos, 
          $fW, $fH, $oGeoExt);
      } else if ($aVars["CMD"] == "ZOOM_OUT") {
        $GLOBALS["goMap"]->zoompoint(-2, $oPixelPos, 
          $fW, $fH, $oGeoExt);
      } else if ($aVars["CMD"] == "RECENTER") {
        $GLOBALS["goMap"]->zoompoint(1, $oPixelPos, 
          $fW, $fH, $oGeoExt);
      } else if ($aVars["CMD"] == "ZOOM_ALL") {
        $GLOBALS["goMap"]->setextent($GLOBALS["gfMinX"],
          $GLOBALS["gfMinY"], $GLOBALS["gfMaxX"],
          $GLOBALS["gfMaxY"]);
      }else if ($aVars["CMD"] == "ADD"){
		 
		 $nGeoX = Pix2Geo($nX, 0, $fW, $fMinX, $fMaxX, 0);
         $nGeoY = Pix2Geo($nY, 0, $fH, $fMinY, $fMaxY, 1);
		 $img = $GLOBALS["goMap"]->draw();
		 //====
		 $shapepath=$GLOBALS["goMap"]->{shapepath};
		$stmp="/wisata.shp";
		$pointshpFileName="$shapepath"."$stmp";

		 //====
		 $oConsLayer = $GLOBALS["goMap"]->getLayerByName("pariwisata");
		 $m_Point = ms_newPointObj();

		 $shapefile = ms_newShapefileObj("C:/ms4w/Apache/htdocs/siparmal/data/shp/sigohan/wisata",-2);
		 $m_Point->setXY($nGeoX, $nGeoY );
		 $m_Point->draw($GLOBALS["goMap"], $oConsLayer, $img, 0, "pariwisata");
		 //$shapefile->addPoint($m_Point);
		 //=======
		 $line = ms_newLineObj();
		 $line->addXY($nGeoX, $nGeoY);
		 $feature = ms_newShapeObj(0);
		 $feature->set('text', 'abcd');
		 $feature->add($line);
		 $oConsLayer->addFeature($feature);
		 $shapefile->addShape($feature);
		 //=============
		 $server = "localhost";
		$username = "root";
		$password = "root";
		$database = "sigohan_db";
// Koneksi dan memilih database di server
		mysql_connect($server,$username,$password) or die("Koneksi gagal");
		mysql_select_db($database) or die("Database tidak bisa dibuka");
		 $dbf = dbase_open( "C:/ms4w/Apache/htdocs/siparmal/data/shp/sigohan/wisata", 2 );
		 dbase_add_record($dbf, array($_POST[id],$_POST[nama]));
		$sql="insert into wisata(id,nama,jenis,alamat,tiket,keterangan,tag) values('$_POST[id]','$_POST[nama]','$_POST[jenis]','$_POST[alamat]','$_POST[tiket]','$_POST[keterangan]','$_POST[stag]')";
		mysql_query($sql);
		mkdir("../data/foto wisata/$_POST[nama]",0000);
		
		 $shapefile->free();
		 //$m_Point->free();
		 //============
		 
		//=============
		 $nWidth = $GLOBALS["goMap"]->width;
		$nHeight = $GLOBALS["goMap"]->height;
		$url = $img->saveWebImage();
		echo "<INPUT  TYPE=image SRC=".$url." BORDER=0 WIDTH=\"".
        $nWidth."\" HEIGHT=\"".$nHeight."\" NAME=MAINMAP>\n";
		echo "<INPUT TYPE=HIDDEN NAME=MINX VALUE=\"".
      $GLOBALS["goMap"]->extent->minx."\">\n";
		echo "<INPUT TYPE=HIDDEN NAME=MINY VALUE=\"".
      $GLOBALS["goMap"]->extent->miny."\">\n";
		echo "<INPUT TYPE=HIDDEN NAME=MAXX VALUE=\"".
      $GLOBALS["goMap"]->extent->maxx."\">\n";
		echo "<INPUT TYPE=HIDDEN NAME=MAXY VALUE=\"".
      $GLOBALS["goMap"]->extent->maxy."\">\n";		
	  header("location: page_admin.php?page=man_wisata");
	  }
    }
  } else if (isset($aVars["KEYMAP_x"]) 
    && isset($aVars["KEYMAP_y"])) {
    
    $oRefExt = $GLOBALS["goMap"]->reference->extent;
    
    $nX = intval($aVars["KEYMAP_x"]);
    $nY = intval($aVars["KEYMAP_y"]);
    
    $fWidthPix = doubleval($GLOBALS["goMap"]->reference->width);
    $fHeightPix = doubleval($GLOBALS["goMap"]->reference->height);
    
    $nGeoX = Pix2Geo($nX, 0, $fWidthPix, $oRefExt->minx, $oRefExt->maxx, 0);
    $nGeoY = Pix2Geo($nY, 0, $fHeightPix, $oRefExt->miny, $oRefExt->maxy, 1);
    
    $fDeltaX = ($fMaxX - $fMinX) / 2.0;
    $fDeltaY = ($fMaxY - $fMinY) / 2.0;
    
    $GLOBALS["goMap"]->setextent($nGeoX - $fDeltaX, $nGeoY - $fDeltaY,
                                  $nGeoX + $fDeltaX, $nGeoY + $fDeltaY);
  }
  if ($aVars["CMD"] != "ADD"){
		DrawMap();
  }
  
}


function Pix2Geo($nPixPos, $fPixMin, $fPixMax, $fGeoMin, $fGeoMax,
                     $bInversePix)
{
    $fDeltaPix = ($bInversePix) ? $fPixMax - $nPixPos : $nPixPos - $fPixMin;

    $fDeltaGeo = $fDeltaPix * ($fGeoMax - $fGeoMin) / 
      ($fPixMax - $fPixMin);

    return $fGeoMin + $fDeltaGeo;
}


function IsCurrentTool( $szTool )
{
    return (strcasecmp($GLOBALS["gszCurrentTool"], $szTool) == 0);
}



?>

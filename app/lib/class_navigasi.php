
<?php

//ob_end_clean();
//echo "aaaaaa".getcwd();
 
define( "MODULE", "php_mapscript.dll" );

// load the mapscript module
if (!extension_loaded("MapScript")) dl(MODULE);


Main();


function Main()
{    
  $GLOBALS["goMap"] = ms_newMapObj("../map/sigohan_malang.map" );
  
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
  $GLOBALS["gszCurrentTool"] = "ZOOM_IN";
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

function DrawScaleBar()
{
  $img = $GLOBALS["goMap"]->drawScaleBar();
  $url = $img->saveWebImage();

  echo"<IMG SRC=$url BORDER=0>\n";
}


function DrawLegend()
{
    echo "<table cellspacing=0 cellpadding=0 style='font-size:11px'>";
    echo "<tr>\n";
    echo "<td></td>\n";
    echo "</tr>\n";
    echo $GLOBALS["goMap"]->processLegendTemplate( array() );
    echo "<tr>\n";
    echo "<td><input type=\"image\"".
      " src=\"gambar/icon_update.png\"".
      " width=\"20\" height=\"20\"></td>\n";
    echo "</tr>\n";
    echo "</table>";
}


function DrawPointQueryResults()
{
  if (!$GLOBALS["gShowQueryResults"]) {
    echo "Kecamatan:\n";
	echo "--<br>";
	echo "Pariwisata pada Kecamatan:\n";
	echo "--\n";
  } else {
    $nResults = 0;
    $oLayer = $GLOBALS["goMap"]->getLayerByName("Kabupaten");
    $nLayerResults = $oLayer->getNumResults();
    if ($nLayerResults > 0) {
      $oLayer->open();
      $aField = explode(";", $oLayer->getMetaData("RESULT_FIELDS"));
      $aDesc = explode(";", $oLayer->getMetaData("DESC_FIELDS"));
      for ($i=0; $i<$nLayerResults; $i++) {
        $oRes = $oLayer->getResult($i);
        $oShape = $oLayer->getShape($oRes->tileindex, $oRes->shapeindex);
        //for ($j=0; $j<count($aField); $j++) {
          echo "<p style='border:solid thin black;padding:10px'>".$aDesc[0].": ";
		  $n=$oShape->values[$aField[0]];
          echo $n."<br>";
		  
		  //------------
		  $sql="select * from kecamatan where id='".$oShape->values[$aField[1]]."'";
		  $a=mysql_query($sql);
		  $b=mysql_num_rows($a);
		  if($b>0){
		  $d=mysql_fetch_array($a);
		  echo "Jumlah Populasi : ".$d['populasi']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		  echo "Kepadatan Penduduk : ".$d['kepadatan']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		  echo "Luas Wilayah :".$d['luas']."</p><a href=''>Selengkapnya</a> tentang kabupaten $n</br>";
		  }
		  //------------
       // }
        DrawShapeQueryResults($oShape);
        $oShape->free();
        $nResults++;
      }
      $oLayer->close();
    }else{
		$oLayer = $GLOBALS["goMap"]->getLayerByName("kecamatan");
		$nLayerResults = $oLayer->getNumResults();
		if ($nLayerResults > 0) {
      $oLayer->open();
      $aField = explode(";", $oLayer->getMetaData("RESULT_FIELDS"));
      $aDesc = explode(";", $oLayer->getMetaData("DESC_FIELDS"));
      for ($i=0; $i<$nLayerResults; $i++) {
        $oRes = $oLayer->getResult($i);
        $oShape = $oLayer->getShape($oRes->tileindex, $oRes->shapeindex);
        //for ($j=0; $j<count($aField); $j++) {
          echo "<p style='border:solid thin black;padding:10px'>".$aDesc[0].": ";
		  $n=$oShape->values[$aField[0]];
          echo $n."<br>";
		  
		  //------------
		  $sql="select * from kecamatan where id='".$oShape->values[$aField[1]]."'";
		  $a=mysql_query($sql);
		  $b=mysql_num_rows($a);
		  if($b>0){
		  $d=mysql_fetch_array($a);
		  echo "Jumlah Populasi : ".$d['populasi']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		  echo "Kepadatan Penduduk : ".$d['kepadatan']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		  echo "Luas Wilayah : ".$d['luas']."</p><a href='index.php?module=det_kecamatan&id=$d[id]'>Selengkapnya</a> tentang kecamatan $n</br></br>";
		  }
		  //------------
       // }
        DrawShapeQueryResults($oShape);
        $oShape->free();
        $nResults++;
      }
      $oLayer->close();
    }
	}
    
    if ($nResults == 0) {
      echo "Tidak ditemukan objek pada layer Propinsi.";
    }
 
  }
}

function DrawShapeQueryResults($oShape)
{

  @$GLOBALS["goMap"]->queryByShape($oShape);
  $oLayer = $GLOBALS["goMap"]->getLayerByName("pariwisata");
  $nLayerResults = $oLayer->getNumResults();
  echo "Tempat Pariwisata:</br>";
  $nResults = 0;
  if ($nLayerResults > 0) {
	$temp=1;
	echo "<table width=100% cellpadding=10 cellspacing=10>";
    $oLayer->open();
    $aField = explode(";", $oLayer->getMetaData("RESULT_FIELDS"));
    $aDesc = explode(";", $oLayer->getMetaData("DESC_FIELDS"));
    for ($i=0; $i<$nLayerResults; $i++) {
      $oRes = $oLayer->getResult($i);
      $oShape = $oLayer->getShape($oRes->tileindex, $oRes->shapeindex);
	  if($temp%2!=0){
	  echo "<tr>";
	  }
	  echo "<td id=rec05>";
	  $id="";
      for ($j=0; $j<count($aField); $j++) {
	    if($aDesc[$j]=="Id"){$id=$oShape->values[$aField[$j]];continue;}
		echo $aDesc[$j].": ";
        echo $oShape->values[$aField[$j]]."</br>";
      }
	  $sql="select * from wisata where id='$id'";
	  $data=mysql_fetch_array(mysql_query($sql));
	  echo "Alamat: ".$data['alamat']."<br />Keterangan: ".$data['keterangan']."<br />";
	  echo "<a href='index.php?module=detail_wisata&id=$id'>Selengkapnya</a></td>";
	  if($temp%2==0){
	  echo "</tr>";
	  }
	  $temp++;
      $oShape->free();
      $nResults++;
    }
    $oLayer->close();
	echo "</table>";
  }
 

  if ($nResults == 0) {
    echo "Tidak ditemukan objek pada layer Kota.";
  }
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
    $aVars["CMD"] : "ZOOM_IN";

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
      } else if ($aVars["CMD"] == "QUERY")
      {
          $nGeoX = Pix2Geo($nX, 0, $fW, $fMinX, $fMaxX, 0);
          $nGeoY = Pix2Geo($nY, 0, $fH, $fMinY, $fMaxY, 1);
      
          $oGeo = ms_newPointObj();
          $oGeo->setXY($nGeoX, $nGeoY);
      
          // Simbol '@' digunakan supaya tidak muncul pesan peringatan
          // ketika objek tidak ditemukan
          @$GLOBALS["goMap"]->queryByPoint($oGeo, MS_SINGLE, -1);
      
          $GLOBALS["gShowQueryResults"] = TRUE;
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
		 echo $oConsLayer->{data};
		 $shapefile = ms_newShapefileObj("C:/ms4w/Apache/htdocs/siparmal/data/shp/sigohan/wisata",-2);
		 $m_Point->setXY($nGeoX, $nGeoY );
		 $m_Point->draw($GLOBALS["goMap"], $oConsLayer, $img, 0, "poin");
		 $shapefile->addPoint($m_Point);
		echo "<p>result: $temp\n";//test
		echo "<p>result: " . $shapefile->numshapes;//test
		echo "<p>result: " . $shapefile->type;//test
		echo "<p>result: " . $shapefile->source;//test

		 $shapefile->free();
		 $m_Point->free();
		 //add the dbf record
		$dbf = dbase_open( "../data/shp/sigohan/wisata.dbf", 2 );
		
		$attr = array( "45", "aaaaaa");
		
		if( !dbase_add_record( $dbf, $attr ) ) echo "<h2>Add Record Failed!</h2>";
		dbase_pack( $dbf );
 
  dbase_close ($dbf);
		 //$oConsLayer->draw($img);
		$url = $img->saveWebImage();
		echo "<img src=\"$url\" alt=\"Yuhuu!\" />";
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

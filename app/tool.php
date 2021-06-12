<?

function getFotoWisata($wisata){
$path="../data/foto wisata/".$wisata;
$hasil="<table width=100% style='font-size:11px'>";
if ($handle = opendir("$path")) {
    /* This is the correct way to loop over the directory. */
    while (false !== ($file = readdir($handle))) {
	
	if($file==".." || $file=="." || $file=="Thumbs.db")continue;
	$d=mysql_query("select keterangan,wahana from keteranganfoto where file='$file'");
		$r=mysql_fetch_array($d);
        $hasil.="<tr><td align=center><a href=\"$path/$file\"><img src=\"$path/$file\" width=300 height=200></a></td></tr>
		<tr><td align=center><b>$r[wahana]</b></td></tr>
		<tr><td align=center>$r[keterangan]</td></tr>
		<tr><td><br></td></tr>
		";
    }

    closedir($handle);
}
$hasil.="</table>";
return $hasil;
}

function getFotoPenginapan($penginapan){
$path="../data/foto penginapan";
$hasil="<table width=100% style='font-size:11px'>";
if ($handle = opendir("$path")) {
    /* This is the correct way to loop over the directory. */

        $hasil.="<tr><td><a href=\"$path/$penginapan.jpg\"><img src=\"$path/$penginapan.jpg\"></a></td></tr>";
	
    closedir($handle);
}
$hasil.="</table>";
return $hasil;
}
function getListFotoDanKeterangan($wisata,$id){
$hasil="<table width=100% style='font-size:11px'>";
$path="../data/foto wisata/".$wisata;
if ($handle = opendir("$path")) {
    /* This is the correct way to loop over the directory. */
    while (false !== ($file = readdir($handle))) {
	if($file==".." || $file=="." || $file=="Thumbs.db")continue;
	$d=mysql_query("select keterangan,wahana from keteranganfoto where file='$file'");
		if(mysql_num_rows($d) > 0){
		$r=mysql_fetch_array($d);
        $hasil.="<form method=post action='?page=man_foto&jenis=wisata&wisata=$id'>
		<tr><td><textarea cols=90 rows=1 name=file>$file</textarea><br />
		<input type='text' name='wahana' value=$r[wahana]>
		<textarea cols=90 rows=1 name=keterangan>$r[keterangan]</textarea>	
		<br /><input type=submit name=edit value=edit><hr/>
		</td></tr>
		</form>";
		}else{
		$hasil.="<tr><td colspan=2><form method=post action='?page=man_foto&jenis=wisata&wisata=$id'>
		<textarea cols=90 rows=1 name=file>$file</textarea><br />
		<input type='text' name='wahana'>
		<textarea cols=90 rows=1 name=keterangan></textarea><br /><input type=submit name=submit value=submit><hr/>
		</form></td></tr>";
		}
    }
}
    closedir($handle);

$hasil.="</table>";
return $hasil;
}
?>
<?php
include("lib/koneksi.php");

$s=mysql_query("select * from wisata where id='1'");
$a=mysql_fetch_array($s);
$as=$a['nama'];
$path="../data/foto wisata/".$as;
if ($handle = opendir("$path")) {
  
    /* This is the correct way to loop over the directory. */
    while (false !== ($file = readdir($handle))) {
	if($file==".." || $file=="." || $file=="Thumbs.db")continue;
        echo "<img src=\"$path/$file\">\n";
    }

    closedir($handle);
}
?>

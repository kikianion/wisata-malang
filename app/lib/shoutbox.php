<?php

include("koneksi.php");
include ("fungsi_indotgl.php");

$shoutbox = mysql_query("SELECT * FROM shoutbox WHERE aktif='Y' ORDER BY id_shoutbox DESC LIMIT 10");
while ($d = mysql_fetch_array($shoutbox)) {
  $pesan = $d['pesan'];
  $pesan = str_replace(":-)", "<img src=\"../gambar/smiley/1.gif\">", $pesan);
  $pesan = str_replace(":-(", "<img src=\"../gambar/smiley/2.gif\">", $pesan);
  $pesan = str_replace(";-)", "<img src=\"../gambar/smiley/3.gif\">", $pesan);
  $pesan = str_replace(";-D", "<img src=\"../gambar/smiley/4.gif\">", $pesan);
  $pesan = str_replace(";;-)", "<img src=\"../gambar/smiley/5.gif\">", $pesan);
  $pesan = str_replace("<:D>", "<img src=\"../gambar/smiley/6.gif\">", $pesan);

  // Apabila ada link website diisi, tampilkan dalam bentuk link   
  if ($d[website] != '') {
    echo "<p style=\"font-size=11px\"><a href='http://$d[website]' target='_blank'>$d[nama]</a> : </p>";
  } else {
    echo "<p style=\"font-size=11px\">$d[nama] : </p>";
  }
  $t = tgl_indo($d['tanggal']);
  echo "<p style=\"font-size:11px;padding:0;\">$pesan</p>";
  echo "<p style=\"font-size:11px;padding:0;\">$t</p>";
  echo "<hr color=#e0cb91 noshade=noshade />";
}
?>

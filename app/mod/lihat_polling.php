<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// membuat cookie dengan nama poling
// cookie akan secara otomatis terhapus dalam waktu 24 jam
$body .= "<span class=posting width=100%><b class=judul_body>Hasil Poling</b></span><br />";
if (isset($_COOKIE["poling"])) {
  $body .= "<p </p>";
}
setcookie("poling", "sudah poling", time() + 3600 * 24);



$u = mysql_query("UPDATE poling SET rating=rating+1 WHERE id_poling='$_POST[pilihan]'");

$body .= "<p align=center>Terimakasih atas partisipasi Anda mengikuti poling kami<br /><br />
        Hasil poling saat ini: </p><br />";

$body .= "<table width=100% style='border: 1pt solid #d2d2d2; padding: 10px;font-size:11px'>";

$jml = mysql_query("SELECT SUM(rating) as jml_vote FROM poling WHERE aktif='Y'");
$j = mysql_fetch_array($jml);

$jml_vote = $j[jml_vote];

$sql = mysql_query("SELECT * FROM poling WHERE aktif='Y'");

while ($s = mysql_fetch_array($sql)) {

  $prosentase = sprintf("%2.1f", (($s[rating] / $jml_vote) * 100));
  $gbr_vote = $prosentase * 3;

  $body .= "<tr><td width=120>$s[pilihan] ($s[rating]) </td><td> 
          <img src=gambar/blue.png width=$gbr_vote height=18 border=0> $prosentase % 
          </td></tr>";
}
$body .= "</table>
        <p>Jumlah Voting: <b>$jml_vote</b></p>
		<div class=kembali><a href=javascript:history.go(-1)>[Kembali]</a>
		";



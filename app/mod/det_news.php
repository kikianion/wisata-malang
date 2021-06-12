<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$id = $_GET['id'];
$h = mysql_query("select * from berita where id_berita='$id'");
$body .= "<table style=\"font-size:11px;padding:10px;border:solid thin black;height:500px;\" width=100%>
	<tr><td align=\"center\" class=judul_body colspan=7><b>Detail Berita</b></td></tr>
	";
while ($d = mysql_fetch_array($h)) {
  $bid = $d['id_berita'];
  $bjudul = $d['judul'];
  $btanggal = $d['tanggal'];
  $bisi = $d['isi_berita'];
  $bjam = $d['jam'];
  $bhari = $d['hari'];
  $bgambar = $d['gambar'];
  $bdibaca = $d['dibaca'];
  $tgl = tgl_indo($btanggal);

  $body .= "<tr><td colspan=2><span class=date>$btanggal, $tgl - $bjam WIB</span><br /></td></tr>
		<tr><td colspan=2><span class=judul>$bjudul</span><br /></td></tr>
		<tr><td valign=top>
		";
  if ($d[gambar] != '') {
    $body .= "<img src='gambar/foto_berita/$d[gambar]' width=110 border=0></td><td valign=top>";
  }
  $body .= "$bisi
          <br />Dibaca: $bdibaca</td></tr>";
}
$body .= "
		<tr><td colspan=6><div class=kembali><a href=javascript:history.go(-1)>[Kembali]</a></td></tr>
	</table>";

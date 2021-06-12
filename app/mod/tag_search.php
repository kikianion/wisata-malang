<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$tag = $_POST['tag'];
$key = $_POST['key'];
$jenis = $_POST['jenis'];

if ($jenis == "Pariwisata") {
  $body .= "<table style=\"font-size:11px;padding:10px;border:solid thin black;\" width=100%>
		<tr><td align=\"center\" class=judul_body colspan=7><b>Pencarian objek wisata $tag</b></td></tr>";

  $sql = "select * from wisata where tag like '%$tag%'";
  $h = mysql_query($sql);
  if (mysql_num_rows($h) > 0) {
    while ($d = mysql_fetch_array($h)) {
      $body .= "<tr><td>
	<table width=100% style='font-size:11px'>
		<tr><td>Nama Wisata</td><td>:</td><td>$d[nama]</td></tr>
		<tr><td>Alamat</td><td>:</td><td>$d[alamat]</td></tr>
		<tr><td>Tiket</td><td>:</td><td>$d[tiket]</td></tr>
		<tr ><td colspan=3><hr></td></tr>
	</table>
	</td></tr>";
    }
  } else {
    $body .= "<tr><td>
	<table width=100% style='font-size:11px'>
		<tr><td align=center style='color:red'>Objek wisata tidak ada</td></tr>
	</table>
	</td></tr>";
  }
} else { //Search penginapan
  $body .= "<table style=\"font-size:11px;padding:10px;border:solid thin black;\" width=100%>
		<tr><td align=\"center\" class=judul_body colspan=7><b>Pencarian Penginapan $tag</b></td></tr>";

  $sql = "select * from penginapan where tag like '%$tag%' and nama like '%$key%'";
  $h = mysql_query($sql);
  if (mysql_num_rows($h) > 0) {
    while ($d = mysql_fetch_array($h)) {
      $body .= "<tr><td>
	<table width=100% style='font-size:11px'>
		<tr><td>Nama Penginapan</td><td>:</td><td>$d[nama]</td></tr>
		<tr><td>Alamat</td><td>:</td><td>$d[alamat]</td></tr>
		<tr><td>Telpon</td><td>:</td><td>$d[telpon]</td></tr>
		<tr><td colspan=3><hr></td></tr>
	</table>
	</td></tr>";
    }
  } else {
    $body .= "<tr><td>
	<table width=100% style='font-size:11px'>
		<tr><td align=center style='color:red'>Penginapan tidak ditemukan</td></tr>
	</table>
	</td></tr>";
  }
}
$body .= "<tr><td colspan=6><div class=kembali><a href=javascript:history.go(-1)>[Kembali]</a></td></tr></table>";

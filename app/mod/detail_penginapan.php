<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$id = $_GET['id'];
$g = mysql_query("select * from penginapan where id='$id'");
$body .= "<table style=\"font-size:11px;padding:10px;border:solid thin black;\" width=100%>
		<tr><td align=\"center\" class=judul_body colspan=7><b>Detail Penginapan</b></td></tr>
	";
while ($d = mysql_fetch_array($g)) {
  $pid = $d['id'];
  $pnama = $d['nama'];
  $palamat = $d['alamat'];
  $ptelepon = $d['telpon'];
  $pket = $d['keterangan'];
  $body .= "<tr><td colspan=7 align=right><a href='lib/pdf_hand.php?module=$mod&id=$pid&jenis=penginapan'><img src='gambar/pdf.gif' border=0></a></td></tr>";
  $body .= "<tr><td>Nama: $pnama</td></tr>
	<tr><td>Alamat: $palamat</td></tr>
	<tr><td>Telepon: $ptelepon</td></tr>
	<tr><td>Keterangan: $pket</td></tr>
	";
  $body .= "<tr><td align=center>" . getFotoPenginapan($pnama) . "</td></tr>";
}
$body .= "
		<tr><td colspan=6><div class=kembali><a href=javascript:history.go(-1)>[Kembali]</a></td></tr>
	</table>";

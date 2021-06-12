<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$id = $_GET['id'];
$sql = "select * from kecamatan where id='$id'";
$m = mysql_query($sql);
if (mysql_num_rows($m) > 0) {
  $d = mysql_fetch_array($m);
  $nama = $d['nama'];
  $pop = $d['populasi'];
  $kep = $d['kepadatan'];
  $lua = $d['luas'];
  $ket = $d['keterangan'];
  $body .= "<table style='font-size:11px;border:solid thin black;' width=100%>
		<tr><td align=\"center\" class=judul_body colspan=5><b>Keterangan kecamatan $nama</b></td></tr>
	<tr><td>Kecamatan </td><td align=left>: </td><td>$nama</td></tr>
	<tr><td>Populasi </td><td align=left>: </td><td>$pop</td></tr>
	<tr><td>Kepadatan </td><td align=left>: </td><td>$kep</td></tr>
	<tr><td>Luas </td><td align=left>: </td><td>$lua</td></tr>
	<tr><td>Keterangan </td><td align=left>: </td><td>$ket</td></tr>
		<tr><td colspan=6><div class=kembali><a href=javascript:history.go(-1)>[Kembali]</a></td></tr>
	</table>";
} else {
  
}
$body .= "";

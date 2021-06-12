<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$id = $_GET['id'];
$sql = "select * from wisata where id='$id'";
$h = mysql_query($sql);
$body .= "<table style=\"font-size:11px;padding:10px;border:solid thin black;\" width=100%>
		<tr><td align=\"center\" class=judul_body colspan=7><b>Objek Wisata</b></td></tr>
	";
$data = mysql_fetch_array($h);
//get penginapan
$g = mysql_fetch_array(mysql_query("select penginapan from wisata_penginapan where id_wisata='$data[id]'"));
//-----------------
$listPenginapan = $g['penginapan'];
$nama = $data['nama'];
$jenis = $data['jenis'];
$alamat = $data['alamat'];
$tiket = $data['tiket'];
$ket = $data['keterangan'];
$body .= "<tr><td colspan=7 align=right><a href='lib/pdf_hand.php?module=$mod&id=$id'><img src='gambar/pdf.gif' border=0></a></td></tr>
	<tr><td>Nama : $nama</td></tr>
	<tr><td>Jenis : $jenis</td></tr>
	<tr><td>Alamat : $alamat</td></tr>
	<tr><td>Tiket : $tiket</td></tr>
	<tr><td>Keterangan : $ket</td></tr>
	<tr><td>Daftar Penginapan</td></tr>
	
	";
///if($ls!=""){
if ($listPenginapan != null || $listPenginapan != "") {
  $ls = explode(",", $listPenginapan);
  $h = count($ls);
  $body .= "<tr><td colspan=2><table style='font-size:11px;border:solid thin black' width=100%>";
  for ($i = 0; $i < $h; $i++) {
    $s = mysql_query("select * from penginapan where id='$ls[$i]'");

    $t = mysql_fetch_array($s);
    $pid = $t['id'];
    $pnama = $t['nama'];
    $palamat = $t['alamat'];
    $body .= "<tr><td>" . $pnama . "</td><td>" . $palamat . "</td><td><a href=?module=detail_penginapan&id=$pid>Detail</a></td></tr>";
  }

  $body .= "</table>";
} else {
  $body .= "<tr><td colspan=2><table style='font-size:11px;color:red' width=100%><tr><td align=center>Penginapan tidak ada</td></tr></table>";
}
$body .= "</td></tr>";
$body .= "<tr><td align=center>" . getFotoWisata($nama) . "</td></tr>";
//}

$body .= "
	<tr><td colspan=6><div class=kembali><a href=javascript:history.go(-1)>[Kembali]</a></td></tr>
	</table>";

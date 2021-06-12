<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$body .= "<table style=\"font-size:11px;padding:10px;border:solid thin black;\" width=100%>
	<tr><td align=\"center\" class=judul_body colspan=7><b>Objek Wisata</b></td></tr>
	<tr><td align=center>No</td><td align=center>Nama Wisata</td><td align=center>Jenis</td><td align=center>Alamat</td><td align=center>Tiket</td><td align=center>Aksi</td></tr>
	";
$p = new Paging;
$batas = 10;
$posisi = $p->cariPosisi($batas);


$tampil = mysql_query("SELECT * FROM wisata ORDER BY id DESC LIMIT $posisi,$batas");


$no = $posisi + 1;
while ($r = mysql_fetch_array($tampil)) {
  $body .= "<tr><td>$no</td>
                <td align=center>$r[nama]</td>
                <td align=center>$r[jenis]</td>
				<td align=center>$r[alamat]</td>
				<td align=center>$r[tiket]</td>
		        <td align=center><a href='?module=detail_wisata&id=$r[id]'>Detail</a></td>
		        </tr>";
  $no++;
}
$body .= "</table>";
$jmldata = mysql_num_rows(mysql_query("SELECT * FROM wisata"));

$jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

$body .= "<div id=paging>Hal: $linkHalaman</div><br>";

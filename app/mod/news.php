<?php

$p = new Paging;
$batas = 10;
$posisi = $p->cariPosisi($batas);
$no = 1;
$body .= "<table style=\"font-size:11px;padding:10px;border:solid thin black;padding:10px;\" width=100%>
	<tr><td align=\"center\" class=judul_body colspan=5><b>Berita Terkini</b></td></tr>
	<tr><td><b>No</b></td><td align=center><b>Gambar</b></td><td align=center><b>Judul</b></td><td align=center><b>Tanggal</b></td><td align=center><b>Dibaca</b></td></tr>
	";
$m = mysql_query("select * from berita LIMIT $posisi,$batas");
while ($d = mysql_fetch_array($m)) {
  $bid = $d['id_berita'];
  $bjudul = $d['judul'];
  $btanggal = $d['tanggal'];
  $bisi = $d['isi_berita'];
  $bjam = $d['jam'];
  $bhari = $d['hari'];
  $bgambar = $d['gambar'];
  $bdibaca = $d['dibaca'];
  $tgl = tgl_indo($btanggal);
  $body .= "<tr><td>$no</td><td align=center><img src='gambar/foto_berita/$d[gambar]' width=110 border=0></td><td align=center><a href='?module=det_news&id=$bid'>$bjudul</a></td><td align=center>$bhari,$tgl</td><td align=center>$bdibaca</td></tr>";
  $no++;
}

$jmldata = mysql_num_rows(mysql_query("SELECT * FROM berita"));

$jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

$body .= "<tr><td colspan=5>Hal: $linkHalaman</td></tr>";
$body .= "
		<tr><td colspan=6><div class=kembali><a href=javascript:history.go(-1)>[Kembali]</a></td></tr>
	</table>";

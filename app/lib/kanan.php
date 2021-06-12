<?
// Kalender
include_once "lib/fungsi_kalender.php";
$kanan="";
$kanan.="
<table style=\"border:solid thin black;font-size:11px;\" cellpadding=\"5\" cellspacing=\"0\">
<tr><td align=\"center\" class=judul_body colspan=7><b>Kalender</b></td></tr>
<tr> 
<td align=\"center\">";
$tgl_skrg=date("d");
$bln_skrg=date("n");
$thn_skrg=date("Y");
$kanan.="<div class='dt'>".buatkalender($tgl_skrg,$bln_skrg,$thn_skrg)."</div>"; 

$kanan.="
</td>
</tr>
</table>
";

$kanan.="<br />";

// Statistik user
$kanan.="
<table style=\"border:solid thin black;font-size:11px;\" cellpadding=\"5\" cellspacing=\"0\" height=\"200\">
<tr><td align=\"center\" class=judul_body colspan=7><b>Statistik User</b></td></tr>
<tr><td align=\"left\"> 
<p style=\"color: rgb(31, 134, 222); font-size: 11px; padding-bottom: 0px;\">";
$ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
$tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
$waktu   = time(); // 

// Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
$s = mysql_query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
// Kalau belum ada, simpan data user tersebut ke database
if(mysql_num_rows($s) == 0){
  mysql_query("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
} 
else{
  mysql_query("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
}

$pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
$totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0); 
$hits             = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal"), 0); 
$totalhits        = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
$tothitsgbr       = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
$bataswaktu       = time() - 300;
$pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));

$path = "gambar/counter/";
$ext = ".png";

$tothitsgbr = sprintf("%06d", $tothitsgbr);
for ( $i = 0; $i <= 9; $i++ ){
	$tothitsgbr = str_replace($i, "<img src='$path$i$ext' alt='$i'>", $tothitsgbr);
}

$kanan.="<p>$tothitsgbr </p>
		
      <img src=gambar/counter/hariini.png> Pengunjung hari ini : $pengunjung <br>
      <img src=gambar/counter/total.png> Total pengunjung    : $totalpengunjung <br><br>
      <img src=gambar/counter/hariini.png> Hits hari ini    : $hits <br>
      <img src=gambar/counter/total.png> Total Hits       : $totalhits <br><br>
      <img src=gambar/counter/online.png> Pengunjung Online: $pengunjungonline
      </div>
      
	  </td></tr>
	  </table>
	  ";
$kanan.="<br />";
// Polling
$po=mysql_query("SELECT * FROM survei");
$poo=mysql_fetch_array($po);
$kanan.="
<table style=\"border:solid thin black;font-size:11px\" cellpadding=\"5\" cellspacing=\"0\" height=\"200\">
<tr><td align=\"center\" class=judul_body colspan=7><b>Polling</b></td></tr>
<tr><td align=\"left\" > 
<p style=\"color: black; font-size: 11px; padding-bottom: 0px;\">

	<b>$poo[survie]</b> <br /><br />
	<form method=POST action='index.php?module=lihat_polling'>";

$poling=mysql_query("SELECT * FROM poling WHERE aktif='Y'");
while ($p=mysql_fetch_array($poling)){
$kanan.="<p style=\"font-size=11px\"><input type=radio name=pilihan value='$p[id_poling]' />$p[pilihan]<br /></p>";
}
$kanan.="<p align=center><input type=submit value=Vote /></p>
      </form>
      <p align=center><a href=index.php?module=lihat_polling>Lihat Hasil Poling</a></p>
	  </td></tr></table>
	  ";
$kanan.="<br />";


?>

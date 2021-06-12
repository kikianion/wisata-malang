<?php
ob_start();
require_once ('lib/fungsi_indotgl.php');
include("lib/koneksi.php");
include("lib/kanan.php");
include("lib/tengah.php");
require_once ("tool.php");
require_once ('lib/class_paging.php');
$mod = isset($_GET['module']) ? $_GET['module'] : "";
if ($mod == "" || $mod == null)
  $mod = "home";
$body = "";
switch ($mod) {
  case 'tag_search':
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
    break;
  case 'detail_wisata':
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
    break;
  case 'detail_penginapan':
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
    break;
  case 'det_news':
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
    break;
  case 'bukutamu':
    $body .= "<div class='dt2'><table style=\"font-size:11px;padding:10px;border:solid thin black;\" width=100%>
			<form method='post' action='index.php?module=bukutamu'>
			<tr><td align=\"center\" class=judul_body colspan=2><b>Form Guest Book</b></td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td colspan='2' align=center><input type='text' name='nama' size='30' maxsize='30' value='pengirim'>
			<input type='text' name='email' size='30' maxsize='30' value='email'></td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td colspan='2' align=center><textarea name=pesan rows=5 cols=50 wrap='physical'></textarea></td></tr>
			<tr><td colspan='2' align=center><input type='submit' name='submit' value='OK'></td></tr>
			</form>
			<tr><td><div class=kembali><a href=javascript:history.go(-1)>[Kembali]</a></td></tr>
			</table></div>";
    if ($_POST['submit'] != null)
      include_once "include/proc_buku_tamu.php";
    $h = mysql_query("select * from buku_tamu");
    $body .= "<table width=100% style=\"font-size:11px;padding:10px;border:solid thin black;margin-top:10px;\">";
    $body .= "<tr>
  <td align=\"center\" class=judul_body colspan=2>
    <b>Guest Book</b>
  </td>
</tr>";
    while ($data = mysql_fetch_array($h)) {
      $body .= "<tr><td>Pengirim:</td><td>$data[nama] $data[email]</td></tr><tr><td>Tanggal:</td><td>" . tgl_indo($data['date']) . "</td></tr><tr><td colspan=2>$data[pesan]</td></tr>
	<tr><td style='padding-left:15px;padding-right:15px;border:thin solid black;' colspan=2>Tanggapan:<br/>$data[tanggapan]</td></tr>
	<tr><td colspan=2 align=center>-----------------------------------------------------------------------------------------------------------------------------------</td></tr>";
    }
    $body .= "</table>";
    break;
  case 'home':
    $body .= "<table border=0 width=100% style='font-size:12px;border: thin solid black;color:black;padding:10px;' cellpadding=10>
	<tr><td align=center><b>Bingung cari tempat wisata ?<br/>\"wisata-malang\"<br/>solusinya</b></td></tr>
	<tr><td>Selamat datang di \"Pariwisata Malang Raya\" ...</td></tr>
	<tr><td align=center><b>Profil<br/>\"wisata-malang\"</br></td></tr>
	<tr><td>Malang sejak masa kolonial dikenal sebagai tempat peristirahatan dan tujuan wisata bangsa Eropa terutama dari Negeri Belanda. Iklim tropis pegunungan yang sejuk dan kaya pemandangan indah serta lingkungan yang alami dikelilingi oleh perkebunan, pegunungan, sungai dan taman menjadikan Malang dikenal sebagai Paris Van East Java dan Switzerland of Indonesia. Malang juga merupakan pusat pertemuan beragam etnik, agama, kepercayaan dan budaya khas Jawa Timur yaitu Jawa Tengahan, Jawa Kulonan, Jawa Wetanan (Blambangan), Pesisi Lor dan Kidul, Madura, Osing (Jawa - Bali) dan Mandalungun (Madura - Jawa) sehingga memiliki keunikan serta daya tarik tersendiri. 
	<br>Di beberapa kawasan Kota Malang masih banyak terdapat beberapa bangunan kuno-bersejarah yang memiliki nilai arsitektur dan sejarah, antara lain di kawasan yang menggunakan nama jalan gunung-gunung (Bergenbuurt), kawasan yang menggunakan nama jalan pahlawan-pahlawan (Orangebuurt), kawasan yang menggunakan nama jalan pulau-pulau (Eilandenbuurt), kawasan Splendid, kawasan alun-alun, dan lain sebagainya.</br>
	<br>Jika Anda memiliki info atau masukan untuk website ini silahkan isi komentar anda di form buku tamu.</td></tr>
	</table>";
    //news...
    /* 	$terkini=mysql_query("select judul, jam, 
      berita.id_berita, hari, tanggal, gambar, isi_berita
      from berita
      group by berita.id_berita DESC LIMIT 0,4");

      // 	Bagian News
      $body.="";
      $body.="<table style=\"font-size:11px;padding:10px;border:solid thin black;margin-top:10px;\" width=100% cellpadding=5>
      <tr><td align=\"center\" class=judul_body colspan=2><b>Berita Terkini</b></td></tr>";
      while($t=mysql_fetch_array($terkini)){
      $tgl = tgl_indo($t[tanggal]);

      $body.="<tr><td colspan=2><span class=date>$t[hari], $tgl - $t[jam] WIB</span><br /></td></tr>
      <tr><td colspan=2><span class=judul><a href=''>$t[judul]</a></span><br /></td></tr>
      <tr><td>
      ";
      // Apabila ada gambar dalam berita, tampilkan
      if ($t[gambar]!=''){
      $body.="<img src='gambar/foto_berita/small_$t[gambar]' width=110 border=0></td><td  valign=top>";
      }
      // Tampilkan hanya sebagian isi berita
      $isi_berita = htmlentities(strip_tags($t[isi_berita])); // membuat paragraf pada isi berita dan mengabaikan tag html
      $isi = substr($isi_berita,0,220); // ambil sebanyak 220 karakter
      $isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat

      $body.="$isi ... <a href='?module=det_news&id=$t[2]'>Selengkapnya</a>
      <br /></td></tr>";

      }
      $body.="</table>";
     */
    break;
  case 'news':
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
    break;
  case 'det_kecamatan':
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
    break;
  case 'wisata':
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
    break;
  case "lihat_polling":
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


    break;
}
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="lib/style.css" /> 
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    </head>
    <body>
        <table align="center" border="0" width=950px cellspacing="0" cellpadding="0">
            <tr><td>
                    <table border=0 width=100% cellspacing="0" cellpadding="0"><tr><td><img src="gambar/header.gif" width="100%"></td></tr></table>
                </td></tr>
            <tr><td>

                    <table border="0" width=100% cellspacing="0" cellpadding="0">
                        <tr><td colspan=3 id='menubar'><a href='index.php?module=home'>Home</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href='sigohan.php?module=peta'>Peta GIS</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?module=news'>Berita</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?module=wisata'>Wisata</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?module=bukutamu'>Buku Tamu</a></td></tr>
                        <tr>
                            <td class=bg01 width=20% cellspacing="0" cellpadding="0"></td>
                            <td align="center" class=bg01 width=60% cellspacing="0" cellpadding="0" style="border:solid thin black">


                            </td>


                            <td width=20% class=bg01 cellspacing="0" cellpadding="0"></td>
                        </tr>
                        <tr>

                            <!-- tampilan legenda peta --> 
                            <td valign="top" class=bg02>
                                <table border="0" cellspacing="0" cellpadding="0" width=100%>
                                    <tr>
                                        <td align="center" class=judul_menu  style="padding:10px;">
                                            <b>Menu</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" id=rec01  style="padding-top:10px;">
                                            <?= $tengah ?>
                                        </td>
                                    </tr>
                                </table>
                                <br>
                                <table border="0" cellspacing="0" cellpadding="0" width=100%>
                                    <tr><td align="center" class=judul_menu><b>            </b></td></tr>
                                    <tr><td id=rec01>
                                            <?php //DrawLegend();  ?>
                                        </td></tr></table>

                            </td>

                            <td id=rec01 style="background-color: #88B858;"  valign=top>
                                <?php echo $body ?>
                            </td>

                            <td valign="top" class=bg02 width=30%>
                                <table border="0" cellspacing="0" cellpadding="0" width=100%>

                                    <tr><td class=judul_menu align="center" style="padding:10px;">Fitur</td></tr>
                                    <tr>
                                        <td id=rec01>
                                            <table width=100%><tr><td valign=top align=center>
                                                        <?= $kanan ?>
                                                    </td></tr>

                                            </table>
                                        </td>
                                    </tr>

                                </table>
                            </td>

                        </tr>

                        <!-- menu navigasi, terdiri dari 4 radio button -->
                        <tr>
                            <td class=bg01></td>
                            <!-- skala grafis -->
                            <td align="center" class=bg01>
                                <?php //DrawScaleBar();  ?>
                            </td>

                            <td class=bg01></td>
                        </tr>





                    </table>
                </td></tr>
            <tr><td class=judul_menu></td></tr>
            <tr><td id=rec02>
                    <? //DrawPointQueryResults() ?>
                </td></tr>
            <tr><td></td></tr>
            <tr><td id=rec02>
                    <?
                    ?>
                </td></tr>
            <tr><td>
                    <table width=100% cellspacing="0" cellpadding="0"><tr><td><img src="gambar/footer.gif" width="100%"></td></tr></table>
                </td></tr>
        </table>

    </form>    

</body>
</html>

<?
session_start();
ob_start();
require_once ('lib/class_paging.php');
require_once ('lib/functions.php');
require_once ('lib/fungsi_indotgl.php');
include_once "lib/koneksi.php";	//===============Koneksi database
//require_once('include/replaceman.php');



//===================autentikasi admin

$page=$_GET['page'];
if(cek_admin_session($_SESSION['sesi_admin'],$_SESSION['sesi_kode'])){
$left="<table><tr><td><a href=''>Member List</a></td></tr>
			<tr><td><a href=''>Kost list</a></td></tr>
			</table>";
$body="<table width=100% cellpadding=5 cellspacing=5>";
//---------------------------navigasi menu
$menu.="
		 <li><a href=\"page_admin.php?page=man_wisata\">Manage Wisata</a></li>
		 <li><a href=\"page_admin.php?page=man_penginapan\">Manage Penginapan</a></li>
		 <li><a href=\"page_admin.php?page=penginapan_wisata\">Penginapan Wisata</a></li> 
		<li><a href=\"page_admin.php?page=man_kecamatan\">Manage Kecamatan</a></li>
		 <li><a href=\"include/logout.php\">Logout</a></li>
		 ";
$kiri.="<table class=dt cellpadding=10px>
		<tr><td class=ht>Modul</td></tr>
			
		<tr><td><a href='?page=news'>News</a></td></tr>
		<tr><td><a href='?page=mini_chat'>Mini Chat</a></td></tr>
		<tr><td><a href='?page=polling'>Polling</a></td></tr>
		<tr><td><a href='?page=buku_tamu'>Buku Tamu</a></td></tr>
		</table>
		";
//------------------------parsing konten
switch($page){
case "man_wisata":
	include_once "include/modul/manage_wisata/manage_wisata.php";
	break;
case "man_penginapan":
	include_once "include/modul/manage_penginapan/manage_penginapan.php";
	break;
case "penginapan_wisata":
	include_once "include/modul/penginapan_wisata/penginapan_wisata.php";
	break;
case "man_kecamatan":
	include_once "include/modul/manage_kecamatan/manage_kecamatan.php";
	break;
case "news":
	include_once "include/modul/mod_berita/berita.php";
	break;
case "download":
	include_once "include/modul/mod_download/download.php";
	break;
case "mini_chat":
	include_once "include/modul/mod_shoutbox/shoutbox.php";
	break;
case "polling":
	include_once "include/modul/mod_poling/poling.php";
	break;
case "buku_tamu":
	include_once "include/modul/mod_buku_tamu/bukutamu.php";
	break;
case "man_foto":
	include_once "include/man_foto.php";
	break;
case "add_foto_wisata":
	include_once "include/add_foto_wisata.php";
	break;
case "add_foto_penginapan":
	include_once "include/add_foto_penginapan.php";
	break;
case "map":
	header("location:map.php");
	break;
}
$body.="</table>";
}
//-----------------------
else{
$kiri="<img src='gambar/login-welcome.gif'>";
$body.="<table><form action='page_admin.php' method='post'><tr><td>Administrator:</td><td><input type='password' name='nama_admin' maxlength='' size=''></td></tr>
			<tr><td>Kode:</td><td><input type='password' name='kode_admin' maxlength='' size=''></td></tr>
			<tr><td></td><td><input type='submit' name='submit' value='login'></td></tr>
			</form>
			</table>";
	if($_POST['submit']!=null){
		if(cek_admin_session($_POST['nama_admin'],$_POST['kode_admin'])){
		$sesi_admin=$_POST['nama_admin'];$sesi_kode=$_POST['kode_admin'];
		//$h=_query("select kd_admin from admin where nama='$sesi_admin' and kode='$sesi_kode'");
		//$data=_fetch_array($h);$sesi_id_admin=$data['kd_member'];
		//session_register("sesi_id_admin");
		session_register("sesi_admin");
		session_register("sesi_kode");
		header('location:page_admin.php?page=reservasi_list');
		}else{
		$body.="Sorry....you don't have permission";
		}
	}
}
//-----------------------tulis konten pada template

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<script language="JavaScript">
function bukajendela(url) {
 window.open(url, "window_baru", "width=1000,height=700,left=120,top=10,resizable=1,scrollbars=1");
}
</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="index, follow">
<meta name="description" content="">
<meta name="keywords" content="">
<meta http-equiv="Copyright" content="lokomedia">
<meta name="author" content="Lukmanul Hakim">
<meta http-equiv="imagetoolbar" content="no">
<meta name="language" content="Indonesia">
<meta name="revisit-after" content="7">
<meta name="webcrawlers" content="all">
<meta name="rating" content="general">
<meta name="spiders" content="all">

<link rel="shortcut icon" href="favicon.ico" />
<link href="style.css" rel="stylesheet" type="text/css" />

</head>

<body>
<div id="wrapper">
  <div id="header">
    <div id="menuutama">
   	  <ul>
		<?=$menu?>
	  </ul>
    </div>
  </div>
   <div id="rightcontent2">
    <p align=center>
      <?=$kiri?>
    </p>
  </div>
  <div id="leftcontent2">
    <p>
      <?=$body?>
    </p>
  </div>
 
  <div id="clearer"></div>
  <div id="footer">Copyright 2010 &copy; 2010 by wisata-malang.com. All Rights Reserved.</div>
</div>
</body>
</html>

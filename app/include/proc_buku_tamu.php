<?
ob_start();
include_once "lib/koneksi.php";

$nama=$_POST['nama'];
$email=$_POST['email'];
$pesan=$_POST['pesan'];
$tgl=date("Ymd");
$sql="insert into buku_tamu(nama,email,pesan,date) values('$nama','$email','$pesan','$tgl')";
mysql_query($sql);
header('location:index.php?module=buku_tamu');

?>
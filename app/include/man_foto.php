<?
include "lib/koneksi.php";
include_once "tool.php";
$jenisFoto=$_GET['jenis'];
$wisata=$_GET['wisata'];
if($jenisFoto=="wisata"){
if($_POST['submit']){
$file=$_POST['file'];$ket=$_POST['keterangan'];$wahana=$_POST['wahana'];
$a=mysql_query("insert into keteranganfoto values('$file','$ket','$wahana')");
}else if($_POST['edit']){
$file=$_POST['file'];$ket=$_POST['keterangan'];$wahana=$_POST['wahana'];
$a=mysql_query("update keteranganfoto set keterangan='$ket',wahana='$wahana' where file='$file'");
}
$a=mysql_fetch_array(mysql_query("select nama from wisata where id='$wisata'"));
$body.=getListFotoDanKeterangan($a['nama'],$wisata);
}else{
$a=mysql_fetch_array(mysql_query("select nama from wisata where id='$wisata'"));
}
?>
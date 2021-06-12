<?
switch($_GET[act]){
default:
if($_GET['pesan']==1){
$body.="File foto telah disimpan<br />";
}
$m=mysql_query("select * from penginapan");
 $body.="Tambah Foto Penginapan<br><form enctype='multipart/form-data' action='page_admin.php?page=add_foto_penginapan&act=aksi' method='POST'>";
$body.="Pilih Wisata: <select name=penginapan>";
while($d=mysql_fetch_array($m)){
$body.="<option value=$d[id]>$d[nama]</option>";
}
$body.="</select><br />
Pilih File Gambar: <input name='userfile' type='file' /><br />
<input type='submit' value='Upload' />
</form> ";
break;
case "aksi":
$uploaddir = "../data/foto penginapan/";
	$fileName = $_FILES['userfile']['name']; 
	$tmpName  = $_FILES['userfile']['tmp_name']; 
	$fileSize = $_FILES['userfile']['size'];
	$fileType = $_FILES['userfile']['type'];
	$m=mysql_fetch_array(mysql_query("select nama from penginapan where id='$_POST[penginapan]'"));
	$uploadfile = $uploaddir .$m['nama'].".jpg";
	if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
	header("location:page_admin.php?page=add_foto_penginapan&pesan=1");
	}else{
	$body.="Gagal upload video ke $uploadfile";
	}
	break;
}
?>
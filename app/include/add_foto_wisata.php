<?
switch($_GET[act]){
default:
if($_GET['pesan']==1){
$body.="File foto telah disimpan<br />";
}
$m=mysql_query("select * from wisata");
 $body.="Tambah Foto Wisata <br><form enctype='multipart/form-data' action='page_admin.php?page=add_foto_wisata&act=aksi' method='POST'>";
$body.="Pilih Wisata: <select name=wisata>";
while($d=mysql_fetch_array($m)){
$body.="<option value=$d[nama]>$d[nama]</option>";
}
$body.="</select><br />
Pilih File Gambar: <input name='userfile' type='file' /><br />
<input type='submit' value='Upload' />
</form> ";
break;
case "aksi":
$uploaddir = "../data/foto wisata/$_POST[wisata]/";
	$fileName = $_FILES['userfile']['name']; 
	$tmpName  = $_FILES['userfile']['tmp_name']; 
	$fileSize = $_FILES['userfile']['size'];
	$fileType = $_FILES['userfile']['type'];
	$uploadfile = $uploaddir . $fileName;
	if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
	header("location:page_admin.php?page=add_foto_wisata&pesan=1");
	}else{
	$body.="Gagal upload video ke $uploadfile";
	}
	break;
}
?>
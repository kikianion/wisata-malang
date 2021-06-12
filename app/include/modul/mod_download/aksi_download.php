<?php
session_start();
include_once "../../../lib/koneksi.php";

$module=$_GET[page];
$act=$_GET[act];

// Hapus download
if ($module=='download' AND $act=='hapus'){
	$lihat = mysql_query("SELECT nama_file FROM download WHERE id_download='$_GET[id]'");
	$hasil = mysql_fetch_array($lihat);
 
	if ($hasil[isi_file]==null)
		{
		mysql_query("DELETE FROM download WHERE id_download='$_GET[id]'");
		header('location:../../../page_admin.php?page='.$module);
		}
	else
		{
		$direktori_isi = "../../../../files/$hasil[nama_file]"; 
		if (unlink ($direktori_isi))
			{
			mysql_query("DELETE FROM download WHERE id_download='$_GET[id]'");
			header('location:../../../page_admin.php?page='.$module);
			}
		}
}

// Input download
elseif ($module=='download' AND $act=='input'){
$direktori_file = "../../../../files/$fupload_name"; 
$tgl_sekarang=date("Ymd");
//Jika tidak ada file yang diupload
if (!move_uploaded_file($fupload,$direktori_file)) 
	{
	mysql_query("INSERT INTO download (
								       judul,
                                       
                                       tgl_posting) 
                          VALUES(
                                 '$_POST[judul]',
                                 
                                 '$tgl_sekarang')");
	header('location:../../../page_admin.php?page='.$module);
	} 
//Jika ada file yang di upload
else
	{ 
	mysql_query("INSERT INTO download (
								       judul,
                                       
                                       nama_file,
                                       tgl_posting) 
                          VALUES(
                                 '$_POST[judul]',
                                 
                                 '$fupload_name',
                                 '$tgl_sekarang')");
	header('location:../../../page_admin.php?page='.$module);
	}
}

// Update donwload
elseif ($module=='download' AND $act=='update'){
$lokasi_filex = $_FILES['fuploads']['tmp_name'];
$lokasi_files = $_FILES['fupload']['tmp_name'];
$direktori_up = "../../../../files/$_POST[filex]";
$direktori_filex = "../../../../files/$fuploads_name";
$direktori_files = "../../../../files/$fupload_name";

if (!empty($_POST['filex']) AND !empty($lokasi_filex))
  {
	if (unlink ($direktori_up))
	  {
		if (!move_uploaded_file($fuploads,$direktori_filex)) 
		{
		echo "Gagal Upload";
		header('location:../../../page_admin.php?page='.$module);
		} 
		//Jika ada file yang di upload
		else
		{ 
		mysql_query("UPDATE download SET 
								     judul = '$_POST[judul]',
								     
                                     
                                     nama_file = '$fuploads_name', 
                                     tgl_posting = '$tgl_sekarang' 
                           WHERE id_download = '$_POST[id]'");
		header('location:../../../page_admin.php?page='.$module);
		}	
	  }
   }
   
elseif (!empty($_POST['filex']) AND !empty($_POST['file2url']))
	{
	if (unlink ($direktori_up))
	  {
		mysql_query("UPDATE download SET 
								     judul = '$_POST[judul]',
								     
                                     nama_file = '$fuploads_name', 
                                     tgl_posting = '$tgl_sekarang' 
                           WHERE id_download = '$_POST[id]'");
		header('location:../../../page_admin.php?page='.$module);
	  }	
	}
	
elseif (!empty($_POST['url_lama']) AND !empty($lokasi_files))
	{
	if (!move_uploaded_file($fupload,$direktori_files))
	  { 
	  echo "Gagal Upload";
	  }
	else 
	  {
      mysql_query("UPDATE download SET 
								     judul = '$_POST[judul]',
								    
                                     nama_file = '$fupload_name', 
                                     tgl_posting = '$tgl_sekarang' 
                           WHERE id_download= '$_POST[id]'");
	  header('location:../../media.php?module='.$module);
	  } 
	}

elseif (!empty($_POST['url_lama']) AND !empty($_POST['new_url']))
	{ 
     mysql_query("UPDATE download SET 
								     judul = '$_POST[judul]',
								     
                                     nama_file = '$fupload_name', 
                                     tgl_posting = '$tgl_sekarang' 
                           WHERE id_download = '$_POST[id]'");
	 header('location:../../../page_admin.php?page='.$module);
	}

else
	{
	mysql_query("UPDATE download SET id_
								     judul = '$_POST[judul]',
								      
                           WHERE id_down = '$_POST[id]'");
	header('location:../../../page_admin.php?page='.$module);	
	}
}
?>

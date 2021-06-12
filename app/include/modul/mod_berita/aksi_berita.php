<?php
session_start();
include_once "../../../lib/koneksi.php";
include_once "../../../lib/fungsi_thumb.php";

$module=$_GET[page];
$act=$_GET[act];

// Hapus berita
if ($module=='news' AND $act=='hapus'){
  mysql_query("DELETE FROM berita WHERE id_berita='$_GET[id]'");
  header('location:../../../page_admin.php?page='.$module);
}

// Input berita
elseif ($module=='news' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
 
$tgl_sekarang=date('Ymd');
$jam_sekarang=date('hms');
  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadImage($nama_file_unik);

    mysql_query("INSERT INTO berita(judul,
                                   
                                    username,
                                    isi_berita,
                                    jam,
                                    tanggal,
                                    hari,
                                  
                                    gambar) 
                            VALUES('$_POST[judul]',
                                 
                                   '$_SESSION[namauser]',
                                   '$_POST[isi_berita]',
                                   '$jam_sekarang',
                                   '$tgl_sekarang',
                                   '$hari_ini',
                                   
                                   '$nama_file_unik')");
  }
  else{
    mysql_query("INSERT INTO berita(judul,
                                   
                                    username,
                                    isi_berita,
                                    jam,
                                    tanggal,
                                  
                                    hari) 
                            VALUES('$_POST[judul]',
                                 
                                   '$_SESSION[namauser]',
                                   '$_POST[isi_berita]',
                                   '$jam_sekarang',
                                   '$tgl_sekarang',
                                 
                                   '$hari_ini')");
  }
  
  $jml=count($tag_seo);
  for($i=0;$i<$jml;$i++){
    mysql_query("UPDATE tag SET count=count+1 WHERE tag_seo='$tag_seo[$i]'");
  }
  header('location:../../../page_admin.php?page='.$module);
}

// Update berita
elseif ($module=='news' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  

 

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE berita SET judul       = '$_POST[judul]',
                                   
                                  
                                  
                                   isi_berita  = '$_POST[isi_berita]'  
                             WHERE id_berita   = '$_POST[id]'");
  }
  else{
    UploadImage($nama_file_unik);
    mysql_query("UPDATE berita SET judul       = '$_POST[judul]',
                                   
                                  
                                   isi_berita  = '$_POST[isi_berita]',
                                   gambar      = '$nama_file_unik'   
                             WHERE id_berita   = '$_POST[id]'");
  }
  header('location:../../../page_admin.php?page='.$module);
}
?>

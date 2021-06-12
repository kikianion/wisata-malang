<?php
session_start();
include_once "../../../lib/koneksi.php";
$module=$_GET[page];
$act=$_GET[act];

// Hapus berita
if ($module=='man_penginapan' AND $act=='hapus'){
  mysql_query("DELETE FROM penginapan WHERE id='$_GET[id]'");
  header('location:../../../page_admin.php?page='.$module);
}

// Input berita
elseif ($module=='man_penginapan' AND $act=='input'){
 $sql="insert into penginapan(nama,alamat,telpon,keterangan) values('$_POST[nama]','$_POST[alamat]','$_POST[telpon]','$_POST[keterangan]')";
  mysql_query($sql);
  header('location:../../../page_admin.php?page='.$module);
}

// Update berita
elseif ($module=='man_penginapan' AND $act=='update'){
   $sql="update penginapan set nama='$_POST[nama]',alamat='$_POST[alamat]',telpon='$_POST[telpon]',keterangan='$_POST[keterangan]',tag='$_POST[stag]' where id='$_POST[id]'";
  mysql_query($sql);
  header('location:../../../page_admin.php?page='.$module);
}
?>

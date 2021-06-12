<?php
session_start();
include_once "../../../lib/koneksi.php";

$module=$_GET[page];
$act=$_GET[act];

// Hapus berita
if ($module=='man_wisata' AND $act=='hapus'){
  mysql_query("DELETE FROM berita WHERE id_berita='$_GET[id]'");
  header('location:../../../page_admin.php?page='.$module);
}

// Input berita
elseif ($module=='man_wisata' AND $act=='input'){
 $sql="insert into wisata(id,nama,jenis,alamat,tiket,keterangan,tag) values('$_POST[id]','$_POST[nama]','$_POST[jenis]','$_POST[alamat]','$_POST[tiket]','$_POST[keterangan]','$_POST[stag]')";
  mysql_query($sql);
  header('location:../../../page_admin.php?page='.$module);
}elseif ($module=='man_wisata' AND $act=='input2'){
 $sql="insert into wisata(id,nama,jenis,alamat,tiket,keterangan,tag) values('$_POST[id]','$_POST[nama]','$_POST[jenis]','$_POST[alamat]','$_POST[tiket]','$_POST[keterangan]','$_POST[stag]')";
  mysql_query($sql);
  mkdir("../../../../data/foto wisata/$_POST[nama]",0000);
  $dbf = dbase_open( "../../../../data/shp/sigohan/wisata.dbf", 2 );
$attr = array( $_POST["id"], $_POST["nama"]);
if( !dbase_add_record( $dbf, $attr ) ) echo "<h2>Add Record Failed!</h2>";
dbase_pack( $dbf );
dbase_close ($dbf);
  header('location:../../../page_admin.php?page='.$module);
}

// Update berita
elseif ($module=='man_wisata' AND $act=='update'){
  $sql="update wisata set nama='$_POST[nama]',jenis='$_POST[jenis]',alamat='$_POST[alamat]',tiket='$_POST[tiket]',keterangan='$_POST[keterangan]',tag='$_POST[stag]' where id='$_POST[id]'";
  mysql_query($sql);
  header('location:../../../page_admin.php?page='.$module);
}
?>

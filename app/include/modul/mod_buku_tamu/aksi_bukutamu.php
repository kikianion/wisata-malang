<?php
include_once "../../../lib/koneksi.php";

$module=$_GET['page'];
$act=$_GET['act'];

// Hapus shoutbox
if ($module=='buku_tamu' AND $act=='hapus'){
  mysql_query("DELETE FROM buku_tamu WHERE id_bk='$_GET[id]'");
  header('location:../../../page_admin.php?page='.$module);
}

// Update shoutbox
elseif ($module=='buku_tamu' AND $act=='update'){
  mysql_query("UPDATE buku_tamu SET tanggapan         = '$_POST[tanggapan]'
                               
                                   
                             WHERE id_bk   = '$_POST[id]'");
  header('location:../../../page_admin.php?page='.$module);
}
?>

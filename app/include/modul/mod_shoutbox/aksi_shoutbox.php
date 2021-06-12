<?php
include_once "../../../lib/koneksi.php";

$module=$_GET[page];
$act=$_GET[act];

// Hapus shoutbox
if ($module=='mini_chat' AND $act=='hapus'){
  mysql_query("DELETE FROM shoutbox WHERE id_shoutbox='$_GET[id]'");
  header('location:../../../page_admin.php?page='.$module);
}

// Update shoutbox
elseif ($module=='mini_chat' AND $act=='update'){
  mysql_query("UPDATE shoutbox SET nama          = '$_POST[nama]',
                                   website       = '$_POST[website]', 
                                   pesan         = '$_POST[pesan]', 
                                   aktif         = '$_POST[aktif]'
                             WHERE id_shoutbox   = '$_POST[id]'");
  header('location:../../../page_admin.php?page='.$module);
}
?>

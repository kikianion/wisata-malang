<?php
session_start();
include_once "../../../lib/koneksi.php";

$module=$_GET[page];
$act=$_GET[act];

// Hapus poling
if ($module=='polling' AND $act=='hapus'){
  mysql_query("DELETE FROM poling WHERE id_poling='$_GET[id]'");
  header('location:../../../page_admin.php?page='.$module);
}

// Input poling
elseif ($module=='polling' AND $act=='input'){
  mysql_query("INSERT INTO poling(pilihan,
                                  aktif) 
	                       VALUES('$_POST[pilihan]',
                                '$_POST[aktif]')");
  header('location:../../../page_admin.php?page='.$module);
}

// Update poling
elseif ($module=='polling' AND $act=='update'){
  mysql_query("UPDATE poling SET pilihan = '$_POST[pilihan]',
                                 aktif   = '$_POST[aktif]'  
                          WHERE id_poling = '$_POST[id]'");
  header('location:../../../page_admin.php?page='.$module);
}

// Update survei
elseif ($module=='polling' AND $act=='updates'){
  mysql_query("UPDATE survei SET survie = '$_POST[survei]' WHERE id_surv = '$_POST[id]'");
  header('location:../../../page_admin.php?page='.$module);
}
?>

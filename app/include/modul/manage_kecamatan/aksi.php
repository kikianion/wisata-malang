<?php
session_start();
include_once "../../../lib/koneksi.php";;

$module=$_GET[page];
$act=$_GET[act];

// Hapus berita
if ($module=='man_kecamatan' AND $act=='hapus'){
 
}

// Input berita
elseif ($module=='man_kecamatan' AND $act=='input'){
?>
<script>
alert("Tidak ada aksi");
header('location:../../../page_admin.php?page='.$module);
</script>
<?
}

// Update berita
elseif ($module=='man_kecamatan' AND $act=='update'){
  $sql="update kecamatan set nama='$_POST[nama]',populasi='$_POST[populasi]',kepadatan='$_POST[kepadatan]',luas='$_POST[luas]',keterangan='$_POST[keterangan]' where id='$_POST[id]'";
  mysql_query($sql);
  header('location:../../../page_admin.php?page='.$module);
}
?>

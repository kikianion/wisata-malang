<?php

session_start();
include_once "../../../lib/koneksi.php";

$module = $_GET[page];
$act = $_GET[act];

// Hapus berita
if ($module == 'penginapan_wisata' AND $act == 'hapus') {
  $idinapurut = $_GET['idinapurut'];
  $wisata = $_GET['id'];
  $sql = "select * from wisata_penginapan where id_wisata='$wisata'";
  $m = mysql_query($sql);
  if (mysql_num_rows($m) > 0) {
    $d = mysql_fetch_array($m);
    $peng = $d['penginapan'];
    $current_peng = explode(",", $peng);
    $new_peng = "";
    for ($i = 0; $i < count($current_peng); $i++) {
      if ($i == $idinapurut) {
        
      } else {
        if ($new_peng == "") {
          $new_peng .= $current_peng[$i];
        } else {
          $new_peng .= "," . $current_peng[$i];
        }
      }
    }
    mysql_query("update wisata_penginapan set penginapan='$new_peng' where id_wisata='$wisata'");
    header('location:../../../page_admin.php?page=' . $module);
  }
}

// Input berita
elseif ($module == 'penginapan_wisata' AND $act == 'input') {
  $wisata = $_GET['id'];
  $sql = "select * from wisata_penginapan where id_wisata='$wisata'";
  $m = mysql_query($sql);
  if (mysql_num_rows($m) > 0) {
    $d = mysql_fetch_array($m);
    $peng = $d['penginapan'];
    $newpeng = $peng . "," . $_POST['penginapan'];
    mysql_query("update wisata_penginapan set penginapan='$newpeng' where id_wisata='$wisata'");
  } else {
    $p = $_POST['penginapan'];
    mysql_query("insert into wisata_penginapan values('$wisata','$p')");
  }
  header('location:../../../page_admin.php?page=' . $module);
}

// Update berita
elseif ($module == 'penginapan_wisata' AND $act == 'update') {
  
}
?>

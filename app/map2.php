<?php
session_start();
//ob_start();
require_once ('lib/class_paging.php');
require_once ('lib/functions.php');
require_once ('lib/fungsi_indotgl.php');
include_once "lib/koneksi.php"; //===============Koneksi database
//require_once('include/replaceman.php');
//===================autentikasi admin


$page = $_GET['page'];
if (cek_admin_session($_SESSION['sesi_admin'], $_SESSION['sesi_kode'])) {
  $left = "<table><tr><td><a href=''>Member List</a></td></tr>
			<tr><td><a href=''>Kost list</a></td></tr>
			</table>";
  $body = "<table width=100% cellpadding=5 cellspacing=5>";
//---------------------------navigasi menu
  ob_start();
  
  include("_top_admin.php");
  $menu = ob_get_clean();

  ob_start();
  ?>
  <div class="list-group">
      <span href="#" class="list-group-item active">
          Modul
      </span>
      <a href='?page=news' class="list-group-item">News</a>
      <a href='?page=mini_chat' class="list-group-item">Mini Chat</a>
      <a href='?page=polling' class="list-group-item">Polling</a>
      <a href='?page=buku_tamu' class="list-group-item">Buku Tamu</a>
  </div>  

  <?php
  $kiri = ob_get_clean();
//------------------------parsing konten
  switch ($page) {
    case "man_wisata":
      include_once "include/modul/manage_wisata/manage_wisata.php";
      break;
    case "man_penginapan":
      include_once "include/modul/manage_penginapan/manage_penginapan.php";
      break;
    case "penginapan_wisata":
      include_once "include/modul/penginapan_wisata/penginapan_wisata.php";
      break;
    case "man_kecamatan":
      include_once "include/modul/manage_kecamatan/manage_kecamatan.php";
      break;
    case "news":
      include_once "include/modul/mod_berita/berita.php";
      break;
    case "download":
      include_once "include/modul/mod_download/download.php";
      break;
    case "mini_chat":
      include_once "include/modul/mod_shoutbox/shoutbox.php";
      break;
    case "polling":
      include_once "include/modul/mod_poling/poling.php";
      break;
    case "buku_tamu":
      include_once "include/modul/mod_buku_tamu/bukutamu.php";
      break;
    case "man_foto":
      include_once "include/man_foto.php";
      break;
    case "add_foto_wisata":
      include_once "include/add_foto_wisata.php";
      break;
    case "add_foto_penginapan":
      include_once "include/add_foto_penginapan.php";
      break;
    case "map":
      header("location:map.php");
      break;
  }
  $body .= "</table>";
}
//-----------------------
else {//not logged in
  if ($_POST['submit'] != null) {
    if (cek_admin_session($_POST['nama_admin'], $_POST['kode_admin'])) {
      $sesi_admin = $_POST['nama_admin'];
      $sesi_kode = $_POST['kode_admin'];

      //$h=_query("select kd_admin from admin where nama='$sesi_admin' and kode='$sesi_kode'");
      //$data=_fetch_array($h);$sesi_id_admin=$data['kd_member'];
      //session_register("sesi_id_admin");

      session_register("sesi_admin");
      session_register("sesi_kode");
      header('location:page_admin.php?page=reservasi_list');
    } else {
      $body .= "Sorry....you don't have permission";
    }
  }
}
//-----------------------tulis konten pada template
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <script language="JavaScript">
          function bukajendela(url) {
              window.open(url, "window_baru", "width=1000,height=700,left=120,top=10,resizable=1,scrollbars=1");
          }
        </script>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" href="favicon.ico" />
        <link rel="stylesheet" type="text/css" href="lib/bootstrap-3.3.7-dist/css/bootstrap.css" /> 
        <link href="style.css" rel="stylesheet" type="text/css" />
        <style>
            .col-md-9 h2{
                margin-top: 0px;
            }
            .col-md-9 input[type=button], .col-md-9 input[type=submit], .col-md-9 a.btn{
                margin-bottom: 5px;
            }
        </style>

    </head>

    <body>
        <?= $menu ?>
        <?php
//        echo "<br><br><br><br><br><br><br>$$$".$_SESSION['nama_admin']."^". $_SESSION['kode_admin'].cek_admin_session($_SESSION['nama_admin'], $_SESSION['kode_admin'])."%%";
        if (!cek_admin_session($_SESSION['sesi_admin'], $_SESSION['sesi_kode'])) {
          ?>
          <div class="container" style="margin-top: 50px">
              <div class="row">
                  <div class="col-md-6 col-md-offset-2" style="border:1px solid black; background: #CCCCCC; border-radius: 9px">
                      <div class="row">
                          <div class="col-md-3" style="xborder:1px solid black;">
                              <i class="glyphicon glyphicon-user" style="font-size: 8em; margin-top:105px"></i>

                          </div>
                          <div class="col-md-9">
                              <form action='page_admin.php' method='post' class="form-horizontal">
                                  <div class="form-group">
                                      <label for="inputEmail3" class="col-sm-3 control-label" style="text-align: center; width:100%"><h1 >Login</h1></label>
                                  </div>
                                  <div class="form-group">
                                      <label for="inputEmail3" class="col-sm-3 control-label">Administrator</label>
                                      <div class="col-sm-9">
                                          <input type='text' name='nama_admin' class="form-control">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="inputPassword3" class="col-sm-3 control-label">Kode</label>
                                      <div class="col-sm-3">
                                          <input type='password' name='kode_admin' class="form-control" >
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="col-sm-offset-3 col-sm-9">
                                          <input type="submit" name="submit" class="btn btn-default" value="Login">
                                      </div>
                                  </div>
                              </form>

                          </div>
                      </div>

                  </div>
              </div>
          </div>
          <?php
        }
        ?>

        </div>
        <div class="container-fluid" style="margin-top:160px">
            <div class="row">
                <div class="col-md-3">
                    <?= $kiri ?>
                </div>
                <div class="col-md-9">
                    <?= $body ?>
                </div>
            </div>
        </div>

    </body>
</html>
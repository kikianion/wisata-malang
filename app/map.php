<?php
session_start();
//ob_start();
require("lib/class_navigasi2.php");
include("lib/koneksi.php");
require_once ('lib/functions.php');

if (cek_admin_session($_SESSION['sesi_admin'], $_SESSION['sesi_kode'])) {
//---------------------------navigasi menu
  ob_start();
  include("_admin_top.php");
  $menu = ob_get_clean();

  ob_start();
  ?>
  <div class="list-group">
      <span href="#" class="list-group-item active">
          Modul
      </span>
      <a href='page_admin.php?page=add_foto_wisata' class="list-group-item">Tambah Foto Wisata</a>
      <a href='page_admin.php?page=add_foto_penginapan' class="list-group-item">Tambah Foto Penginapan</a>

      <?php include("_admin_kiri_part2.php"); ?>
  </div>  

  <?php
  $kiri = ob_get_clean();

  include("_admin_head.php");
  ?>
  <?= $menu ?>
  <div class="container-fluid" style="margin-top:160px">
      <div class="row">
          <div class="col-md-3">
              <?= $kiri ?>
          </div>
          <div class="col-md-9">
              <?php
              $aksi = "include/modul/manage_wisata/aksi.php";
              ?>

              <form class="form-horizontal" name="main" method="POST" enctype='multipart/form-data'>
                  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">ID</label>
                      <div class="col-sm-10">
                          <input type='text' name='id' class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama Wisata</label>
                      <div class="col-sm-10">

                          <input type=text name='nama' size=60' class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Jenis Wisata</label>
                      <div class="col-sm-10">

                          <textarea name='jenis' cols=70 rows=3 class="form-control"></textarea>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
                      <div class="col-sm-10">

                          <input type=text name='alamat' size=60' class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Biaya Masuk</label>
                      <div class="col-sm-10">
                          <input type=text name='tiket' size=60' class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Keterangan</label>
                      <div class="col-sm-10">

                          <textarea name='keterangan' cols=70 rows=10 class="form-control"></textarea>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Tag</label>
                      <div class="col-sm-10">
                          <select name=tag onchange="ganti(document.main.tag.options[document.main.tag.selectedIndex].value)" class="form-control">
                              <option value='Taman'>Taman</option>
                              <option value='Keluarga'>Keluarga</option>
                              <option value='Pantai'>Pantai</option>
                              <option value='Air terjun'>Air terjun</option>
                              <option value='Perkemahan'>Perkemahan</option>
                              <option value='Air panas'>Air panas</option>
                              <option value='Outbond'>Outbond</option>
                              <option value='Kolam renang'>Kolam renang</option>
                              <option value='Bendungan'>Bendungan</option>
                              <option value='Perkebunan'>Perkebunan</option>
                              <option value='Sejarah'>Sejarah</option>
                              <option value='Agrowisata'>Agrowisata</option>
                          </select>
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label"></label>
                      <div class="col-sm-10">
                          <textarea name='stag' rows=4 cols=70 class="form-control"></textarea>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label"></label>
                      <div class="col-sm-10">
                          <?php Main(); ?>
                      </div>
                  </div>

              </form>

              <?= $body ?>
              <form name="main" method="POST" enctype='multipart/form-data'>
                  <table align="center" border="0" width=600px cellspacing="0" cellpadding="0">
                      <tr>
                          <td align="center" class=bg01>
                              <input TYPE="radio" NAME="CMD" VALUE="ZOOM_ALL" 
                                     <?php if (IsCurrentTool("ZOOM_ALL")) echo "CHECKED"; ?>>&nbsp;
                              <img SRC="gambar/icon_zoomfull.png" WIDTH="20" HEIGHT="20">
                              <input TYPE="radio" NAME="CMD" VALUE="ZOOM_IN" 
                              <?php if (IsCurrentTool("ZOOM_IN")) echo "CHECKED"; ?>
                                     >&nbsp;&nbsp;<img SRC="gambar/icon_zoomin.png" WIDTH="20" HEIGHT="20">	
                              <input TYPE="radio" NAME="CMD" VALUE="ZOOM_OUT" 
                              <?php if (IsCurrentTool("ZOOM_OUT")) echo "CHECKED"; ?>
                                     >&nbsp;&nbsp;<img SRC="gambar/icon_zoomout.png" WIDTH="20" HEIGHT="20">
                              <input TYPE="radio" NAME="CMD" VALUE="RECENTER" 
                              <?php if (IsCurrentTool("RECENTER")) echo "CHECKED"; ?>
                                     >&nbsp;&nbsp;<img SRC="gambar/icon_recentre.png" WIDTH="20" HEIGHT="20">

                              <input TYPE="radio" NAME="CMD" VALUE="ADD" 
                                     <?php if (IsCurrentTool("ADD")) echo "CHECKED"; ?>>&nbsp;
                              <img SRC="gambar/icon_info.png" WIDTH="20" HEIGHT="20">
                          </td>
                      </tr>

                  </table>
              </form> 
          </div>
      </div>
  </div>

  <script language="JavaScript" type="text/javascript">
    function ganti(pilihan) {
        a = document.main.stag.innerHTML + pilihan + ",";
        document.main.stag.innerHTML = a;
    }
    // function ganti(){}
  </script>

  <?php
  include("_admin_foot.php");
}
?>

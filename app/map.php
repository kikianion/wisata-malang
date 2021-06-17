<?php
session_start();
ob_start();
require("lib/class_navigasi2.php");
include("lib/koneksi.php");
require_once ('lib/functions.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>z
        <title></title>
        <link rel="shortcut icon" href="favicon.ico" />
        <link href="style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php
        if (cek_admin_session($_SESSION['sesi_admin'], $_SESSION['sesi_kode'])) {
//---------------------------navigasi menu
          $menu .= "
		 <li><a href=\"page_admin.php?page=man_wisata\">Manage Wisata</a></li>
		 <li><a href=\"page_admin.php?page=man_penginapan\">Manage Penginapan</a></li>
		 <li><a href=\"page_admin.php?page=penginapan_wisata\">Penginapan Wisata</a></li> 
		<li><a href=\"page_admin.php?page=man_kecamatan\">Manage Kecamatan</a></li>
		 <li><a href=\"include/logout.php\">Logout</a></li>
		 ";
          $kiri .= "<table class=dt cellpadding=10px>
		<tr><td class=ht>Modul</td></tr>
		<tr><td><a href='page_admin.php?page=add_foto_wisata'>Tambah Foto Wisata</a></td></tr>	
		<tr><td><a href='page_admin.php?page=add_foto_penginapan'>Tambah Foto Penginapan</a></td></tr>	
		<tr><td><a href='page_admin.php?page=news'>News</a></td></tr>
		<tr><td><a href='page_admin.php?page=mini_chat'>Mini Chat</a></td></tr>
		<tr><td><a href='page_admin.php?page=polling'>Polling</a></td></tr>
		<tr><td><a href='page_admin.php?page=buku_tamu'>Buku Tamu</a></td></tr>
		</table>
		";
          ?>

          <div id="wrapper">
              <div id="header">
                  <div id="menuutama">
                      <ul>
                          <?= $menu ?>
                      </ul>
                  </div>
              </div>
              <div id="rightcontent2">
                  <p align=center>
                      <?= $kiri ?>
                  </p>
              </div>
              <div id="leftcontent2">
                  <p align=center>
                      <script language="JavaScript" type="text/javascript">
                        function ganti(pilihan) {
                            a = document.main.stag.innerHTML + pilihan + ",";
                            document.main.stag.innerHTML = a;
                        }
                        // function ganti(){}
                      </script>
                      <form name="main" method="POST" enctype='multipart/form-data'>

                          <table align="center" border="0" width=600px cellspacing="0" cellpadding="0">
                              <tr><td>
                                      <?php
                                      $aksi = "include/modul/manage_wisata/aksi.php";
                                      echo "          
                                      <table>
                                      <tr><td>ID</td><td>: <input type='text' name='id'></td></tr>
                                      <tr><td width=70>Nama Wisata</td>     <td> : <input type=text name='nama' size=60'></td></tr>
                                      <tr><td width=70>Jenis Wisata</td>     <td> : <textarea name='jenis' cols=70 rows=3></textarea></td></tr>
                                      <tr><td width=70>Alamat</td>     <td> : <input type=text name='alamat' size=60'></td></tr>
                                      <tr><td width=70>Biaya Masuk</td>     <td> : <input type=text name='tiket' size=60'></td></tr>
                                      <tr><td width=70>Keterangan</td>     <td> : <textarea name='keterangan' cols=70 rows=10></textarea></td></tr>
                                      <tr><td>Tag</td><td>:<select name=tag onchange=\"ganti(document.main.tag.options[document.main.tag.selectedIndex].value)\">
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
                                      </select></td></tr>
                                      <tr><td></td><td><textarea name='stag' rows=4 cols=70></textarea></td></tr>

                                      </table>
                                      ";
                                      ?>
                                  </td></tr>
                              <tr><td>

                                      <table border="0" width=100% cellspacing="0" cellpadding="0">
                                          <tr><td align=left><?php Main(); ?></td></tr>
                                      </table>
                                  </td></tr>
                              <tr><td align="center" class=bg01><input TYPE="radio" NAME="CMD" VALUE="ZOOM_ALL" 
                                                                       <?php if (IsCurrentTool("ZOOM_ALL")) echo "CHECKED"; ?>
                                                                       >&nbsp;&nbsp;<img SRC="gambar/icon_zoomfull.png" WIDTH="20" HEIGHT="20">
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
                                                                             <?if (IsCurrentTool( "ADD" )) echo "CHECKED";?>
                                                                          >&nbsp;&nbsp;<img SRC="gambar/icon_info.png" WIDTH="20" HEIGHT="20"></td></tr>

                                                                              </table>
                                                                              </form> 
                                                                              <table>
                                                                                  <tr><td><?php
                                                              ?>

                                                                                          <?php
                                                                                          ?>	  
                                                                                      </td></tr></table>   
                                                                              </p>
                                                                              </div>


                                                                              </div>
                                                                              <?php
                                                                            }
                                                                            ?>
                                                                            </body>
                                                                            </html>

<?php
include("lib/class_navigasi.php");
include("lib/koneksi.php");
?>
<?
$m=$_GET['module'];
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="lib/style.css" /> 
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="lib/bootstrap-3.3.7-dist/css/bootstrap.css" /> 
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Project name</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container" style="border: 1px black dotted">
            <div class="row">
                <div class="col-md-12">
                    <form name="main" method="POST">
                        <table align="center" border="0" width=950px cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                                    <table width=100% cellspacing="0" cellpadding="0"><tr><td><img src="gambar/header.gif" width="100%"></td></tr></table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table border="0" width=100% cellspacing="0" cellpadding="0">
                                        <tr><td colspan=3 id='menubar'><a href='index.php?module=home'>Home</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href='sigohan.php?module=peta'>Peta GIS</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?module=news'>News</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?module=wisata'>Wisata</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?module=bukutamu'>Buku Tamu</a></td></tr>
                                        <tr>
                                            <td class=bg01 width=25% cellspacing="0" cellpadding="0"></td>
                                            <td align="center" class=bg01 width=45% cellspacing="0" cellpadding="0">

                                                <input TYPE="radio" NAME="CMD" VALUE="ZOOM_ALL" 
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
                                                <input TYPE="radio" NAME="CMD" VALUE="QUERY" 
                                                       <?php if (IsCurrentTool("QUERY")) echo "CHECKED"; ?> />&nbsp;&nbsp;<img SRC="gambar/icon_info.png" WIDTH="20" HEIGHT="20">
                                            </td>
                                            <td width=30% class=bg01 cellspacing="0" cellpadding="0"></td>
                                        </tr>
                                        <tr>

                                            <!-- tampilan legenda peta --> 
                                            <td valign="top" class=bg02>
                                                <table border="0" cellspacing="0" cellpadding="0" width=100%>
                                                    <tr>
                                                        <td align="center" class=judul_menu>
                                                            <b>Peta Index</b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" id=rec01>
                                                            <?php DrawKeyMap(); ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <br>
                                                <table border="0" cellspacing="0" cellpadding="0" width=100%>
                                                    <tr><td align="center" class=judul_menu><b>Legenda</b></td></tr>
                                                    <tr><td id=rec01>
                                                            <?php DrawLegend(); ?>
                                                        </td></tr></table>

                                            </td>

                                            <td id=rec01>
                                                <?php DrawMap(); ?>
                                            </td>

                                            <td valign="top" class=bg02 width=30%>
                                                <table border="0" cellspacing="0" cellpadding="0" width=100%>

                                                    <tr><td class=judul_menu align="center">Pencarian</td></tr>
                                                    <tr>
                                                        <td id=rec01>
                                                            <form method='post' action='sigohan.php'>
                                                                <table style="font-size:11px;" width=100%><tr><td>
                                                                            Lokasi Pariwisata: 
                                                                        </td></tr>
                                                                    <tr><td align=center><input type='text' name='key' value='Tempat wisata' size=15 maxlength=15></td></tr>
                                                                    <tr><td align=center><input type='submit' name='submit' value='Search'></td></tr>
                                                                </table>
                                                            </form>
                                                        </td>
                                                    </tr>

                                                </table>
                                            </td>

                                        </tr>

                                        <!-- menu navigasi, terdiri dari 4 radio button -->
                                        <tr>
                                            <td class=bg01></td>
                                            <!-- skala grafis -->
                                            <td align="center" class=bg01>
                                                <?php DrawScaleBar(); ?>
                                            </td>

                                            <td class=bg01></td>
                                        </tr>





                                    </table>
                                </td></tr>
                            <tr><td class=judul_menu>Hasil Query</td></tr>
                            <tr><td id=rec02>
                                    <?php
                                    DrawPointQueryResults();
                                    if ($_POST['submit'] != null || $_POST['submit'] != "") {
                                      $key = $_POST['key'];
                                      $sql = "select * from wisata where nama like '%$key%'";
                                      $j = mysql_query($sql);
                                      if (mysql_num_rows($j) > 0) {
                                        $temp = 1;
                                        echo "<table width=100% cellpadding=10 cellspacing=10>";
                                        while ($d = mysql_fetch_array($j)) {
                                          $id = $d['id'];
                                          $nama = $d['nama'];
                                          $alamat = $d['alamat'];
                                          $ket = $d['keterangan'];
                                          if ($temp % 2 != 0) {
                                            echo "<tr>";
                                          }
                                          echo "<td id=rec05>";
                                          echo "Nama: $nama <br />Alamat: " . $alamat . "<br />Keterangan: " . $ket . "<br />";
                                          echo "<a href='index.php?module=detail_wisata&id=$id'>Selengkapnya</a></td>";
                                          echo "</td>";
                                          if ($temp % 2 == 0) {
                                            echo "</tr>";
                                          }
                                          $temp++;
                                        }
                                        echo "</table>";
                                      } else {
                                        
                                      }
                                    }
                                    ?>
                                </td></tr>
                            <tr><td></td></tr>

                            <tr><td>
                                    <table width=100% cellspacing="0" cellpadding="0"><tr><td><img src="gambar/footer.gif" width="100%"></td></tr></table>
                                </td></tr>
                        </table>
                    </form>    

                </div>

            </div>
        </div>
        <script src="lib/bootstrap-3.3.7-dist/css/bootstrap.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    </body>
</html>

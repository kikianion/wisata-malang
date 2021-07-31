<?php
include("lib/class_navigasi.php");
include("lib/koneksi.php");
?>
<?
$m=$_GET['module'];
?>

<?php include("_header.php"); ?>

    <!--<img src="gambar/header.gif" width="100%">-->

<form name="main" method="POST">
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table border="0" width=100% cellspacing="0" cellpadding="0">
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
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" style="text-align: center">
                            <?php DrawMap(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" style="text-align: center">
                            <?php DrawScaleBar(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" style="xtext-align: center">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Info</h3>
                                </div>
                                <div class="panel-body">
                                    <?php
                                    DrawPointQueryResults();
                                    if ($_POST['submit'] != null || $_POST['submit'] != "") {
                                      $key = $_POST['key'];
                                      $sql = "select * from wisata where nama like '%$key%'";
                                      $j = mysql_query($sql);
                                      if (mysql_num_rows($j) > 0) {
                                        $temp = 1;
                                        echo "<table width=100% class='table'>";
                                        while ($d = mysql_fetch_array($j)) {
                                          $id = $d['id'];
                                          $nama = $d['nama'];
                                          $alamat = $d['alamat'];
                                          $ket = $d['keterangan'];
                                          if ($temp % 2 != 0) {
                                            echo "<tr>";
                                          }
                                          echo "<td xid=rec05>";
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
                                </div>
                            </div>                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Menu</h3>
    </div>
    <div class="panel-body">
        <div class="btn-group-vertical" role="group" aria-label="..." style="width: 100%">
            <a class="btn btn-primary" href='index.php?module=home'>Home</a>
            <a class="btn btn-primary" href='sigohan.php?module=peta'>Peta GIS</a>
            <a class="btn btn-primary" href='index.php?module=news'>News</a>
            <a class="btn btn-primary" href='index.php?module=wisata'>Wisata</a>
            <a class="btn btn-primary" href='index.php?module=bukutamu'>Buku Tamu</a>

        </div>
    </div>
</div>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Fitur</h3>
                </div>
                <div class="panel-body">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Peta Index</h3>
                        </div>
                        <div class="panel-body">
                            <?php DrawKeyMap(); ?>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Legenda</h3>
                        </div>
                        <div class="panel-body">
                            <?php DrawLegend(); ?>
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Pencarian</h3>
                        </div>
                        <div class="panel-body">
                            <form method='post' action='sigohan.php'>
                                Lokasi Pariwisata:
                                <div class="input-group">
                                    <input type="text" name='key' class="form-control" placeholder="Cari...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit" name='submit' value='submit'>&nbsp;<i class="glyphicon glyphicon-search"></i>&nbsp;</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </div>
</form>

<?php include("_footer.php") ?>
<!--111-->
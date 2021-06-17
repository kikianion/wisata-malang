<script language="JavaScript" type="text/javascript">
  var arrPariwisata = ["Taman", "Keluarga", "Pantai", "Air terjun", "Perkemahan", "Air panas", "Outbond", "Kolam renang", "Bendungan", "Agrowisata", "Perkebunan", "Sejarah"];
  var arrPenginapan = ["Bintang", "Melati", "Villa"];
  function ganti(pilihan) {
      var arrPilihan = eval("arr" + pilihan);
      while (arrPilihan.length < searchForm.tag.options.length) {
          searchForm.tag.options[(searchForm.tag.options.length - 1)] = null;
      }
      var jml = arrPilihan.length;
      for (var i = 0; i <= jml - 1;
              i++
              ) {
          document.searchForm.tag.options[i] = new Option(arrPilihan[i]);
      }
  }
  // function ganti(){}
</script>

<?php
ob_start();
// Quick Search
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Quick Search</h3>
    </div>
    <div class="panel-body">
        <form method=post action='index.php?module=tag_search' name='searchForm' class="form-horizontal">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">Pencarian</label>
                <div class="col-sm-8">
                    <select name='jenis' onchange="ganti(document.searchForm.jenis.options[document.searchForm.jenis.selectedIndex].value)" class="form-control">
                        <option value='Pariwisata'>Objek Wisata</option>
                        <option value=Penginapan>Penginapan</option>
                    </select>                
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">Tag</label>
                <div class="col-sm-8">
                    <select name='tag' class="form-control">
                        <option value='Taman'>Taman</option>
                        <option value='Keluarga'>Keluarga</option>
                        <option value='Pantai'>Pantai</option>
                        <option value='Air terjun'>Air terjun</option>
                        <option value='Perkemahan'>Perkemahan</option>
                        <option value='Air panas'>Air panas</option>
                        <option value='Outbond'>Outbond</option>
                        <option value='Kolam renang'>Kolam renang</option>
                        <option value='Bendungan'>Bendungan</option>
                        <option value='Agrowisata'>Agrowisata</option>
                        <option value='Perkebunan'>Perkebunan</option>
                        <option value='Sejarah'>Sejarah</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8">
                    <button type="submit" class="btn btn-default">Cari</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
$kanan = ob_get_clean();

ob_start();
// Shoutbox
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Shoutmix</h3>
    </div>
    <div class="panel-body">
        <iframe src='lib/shoutbox.php' width=100% height=250 style="border:0"></iframe>
        <hr>
        <form name=formshout action=lib/simpanshoutbox.php method=POST>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input class="form-control" type=text name=nama size=15>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Website</label>
                <input class="form-control" type=text name=website size=15>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Pesan</label>
                <textarea class="form-control" name='pesan' rows=3 cols=15></textarea>
            </div>
            <input class="btn btn-sm" type=submit name=submit value=Kirim>
            <input class="btn btn-sm" type=reset name=reset value=Reset>
        </form>
    </div>
</div>

<?php
$kanan .= ob_get_clean();


// Kalender
include_once "lib/fungsi_kalender.php";

ob_start();
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Kalender</h3>
    </div>
    <div class="panel-body">
        <table style="xborder:solid thin black;font-size:11px;" cellpadding="5" cellspacing="0" width="100%">
            <tr> 
                <td align="center">
                    <?php
                    $tgl_skrg = date("d");
                    $bln_skrg = date("n");
                    $thn_skrg = date("Y");
                    ?>
                    <div class='dt'><?php echo buatkalender($tgl_skrg, $bln_skrg, $thn_skrg) ?></div>
                </td>
            </tr>
        </table>

    </div>
</div>

<?php
$kanan .= ob_get_clean();

ob_start();
// Statistik user
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Statistik User</h3>
    </div>
    <div class="panel-body">
        <table width="100%">
            <tr>
                <td align="center"> 
                    <p style="color: rgb(31, 134, 222); font-size: 11px; padding-bottom: 0px;">
                        <?php
                        $ip = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
                        $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
                        $waktu = time(); // 
                        // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
                        $s = mysql_query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
                        // Kalau belum ada, simpan data user tersebut ke database
                        if (mysql_num_rows($s) == 0) {
                          mysql_query("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
                        } else {
                          mysql_query("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
                        }

                        $pengunjung = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
                        $totalpengunjung = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0);
                        $hits = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal"), 0);
                        $totalhits = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0);
                        $tothitsgbr = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0);
                        $bataswaktu = time() - 300;
                        $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));

                        $path = "gambar/counter/";
                        $ext = ".png";

                        $tothitsgbr = sprintf("%06d", $tothitsgbr);
                        for ($i = 0; $i <= 9; $i++) {
                          $tothitsgbr = str_replace($i, "<img src='$path$i$ext' alt='$i'>", $tothitsgbr);
                        }
                        ?>

                    <p><?= $tothitsgbr ?> </p>
                    <img src=gambar/counter/hariini.png> Pengunjung hari ini : <?= $pengunjung ?> <br>
                    <img src=gambar/counter/total.png> Total pengunjung    : <?= $totalpengunjung ?> <br><br>
                    <img src=gambar/counter/hariini.png> Hits hari ini    : <?= $hits ?> <br>
                    <img src=gambar/counter/total.png> Total Hits       : <?= $totalhits ?> <br><br>
                    <img src=gambar/counter/online.png> Pengunjung Online: <?= $pengunjungonline ?>
                    </p>
                </td>
            </tr>
        </table>
    </div>
</div>
<?php
$kanan .= ob_get_clean();

ob_start();

// Polling
$po = mysql_query("SELECT * FROM survei");
$poo = mysql_fetch_array($po);
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Polling</h3>
    </div>
    <div class="panel-body">
        <table style="width: 100%">
            <tr>
                <td align="left" > 
                    <form method=POST action='index.php?module=lihat_polling'>
                        <span >
                            <b><?= $poo[survie] ?></b> 
                            <br><br>
                            <?php
                            $poling = mysql_query("SELECT * FROM poling WHERE aktif='Y'");
                            while ($p = mysql_fetch_array($poling)) {
                              ?>
                              <p style='xfont-size:11px; margin-bottom: 5px '>
                                  <input type=radio name=pilihan value='<?= $p[id_poling] ?>' /><?= $p[pilihan] ?>
                              </p>
                              <?php
                            }
                            ?>
                            <p align=center><input type=submit value=Vote /></p>
                        </span>
                    </form>
                    <p align=center><a href=index.php?module=lihat_polling>Lihat Hasil Poling</a></p>
                </td>
            </tr>
        </table>
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Administrator</h3>
    </div>
    <div class="panel-body">
        <a href="page_admin.php">Login</a>
    </div>
</div>
<?php
$kanan .= ob_get_clean();


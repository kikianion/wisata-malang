<?php
$p = new Paging;
$batas = 10;
$posisi = $p->cariPosisi($batas);
$no = 1;

ob_start();
?>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Berita Terkini</h3>
    </div>
    <div class="panel-body">
        <table class='table' width=100%>
            <tr>
                <td><b>No</b></td>
                <td align=center><b>Gambar</b></td>
                <td align=center><b>Judul</b></td>
                <td align=center><b>Tanggal</b></td>
                <td align=center><b>Dibaca</b></td>
            </tr>
            <?php
            $m = mysql_query("select * from berita LIMIT $posisi,$batas");
            while ($d = mysql_fetch_array($m)) {
              $bid = $d['id_berita'];
              $bjudul = $d['judul'];
              $btanggal = $d['tanggal'];
              $bisi = $d['isi_berita'];
              $bjam = $d['jam'];
              $bhari = $d['hari'];
              $bgambar = $d['gambar'];
              $bdibaca = $d['dibaca'];
              $tgl = tgl_indo($btanggal);
              ?>
              <tr>
                  <td><?=$no?></td>
                  <td align=center><img src='gambar/foto_berita/<?= $d[gambar] ?>' width=110 border=0></td>
                  <td align=center><a href='?module=det_news&id=$bid'><?= $bjudul ?></a></td>
                  <td align=center><?= $bhari ?>,<?= $tgl ?></td>
                  <td align=center><?= $bdibaca ?></td>
              </tr>
              <?php
              $no++;
            }

            $jmldata = mysql_num_rows(mysql_query("SELECT * FROM berita"));

            $jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
            $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
            ?>
            <tr>
                <td colspan=5>Hal: <?= $linkHalaman ?></td>
            </tr>

        </table>
    </div>
</div>


<?php
$body = ob_get_clean();

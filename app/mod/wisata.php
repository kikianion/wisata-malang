<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

ob_start();
?>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Objek Wisata</h3>
    </div>
    <div class="panel-body">
        <table class='table'>
            <tr>
                <td align=center>No</td>
                <td align=center>Nama Wisata</td>
                <td align=center>Jenis</td>
                <td align=center>Alamat</td>
                <td align=center>Tiket</td>
                <td align=center>Aksi</td>
            </tr>

            <?php
            $p = new Paging;
            $batas = 10;
            $posisi = $p->cariPosisi($batas);

            $tampil = mysql_query("SELECT * FROM wisata ORDER BY id DESC LIMIT $posisi,$batas");


            $no = $posisi + 1;
            while ($r = mysql_fetch_array($tampil)) {
              ?>
              <tr>
                  <td><?= $no ?></td>
                  <td align = center><?= $r[nama] ?></td>
                  <td align=center><?= $r[jenis] ?></td>
                  <td align=center><?= $r[alamat] ?></td>
                  <td align=center><?= $r[tiket] ?></td>
                  <td align=center><a href='?module=detail_wisata&id=$r[id]'>Detail</a></td>
              </tr>
              <?php
              $no++;
            }
            $jmldata = mysql_num_rows(mysql_query("SELECT * FROM wisata"));

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


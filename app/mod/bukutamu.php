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
        <h3 class="panel-title">Form Guest Book</h3>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" method='post' action='index.php?module=bukutamu'>
            <div class="form-group">
                <div class="col-sm-6 col-md-offset-3">
                    <input type='text' name='nama' size='30' maxsize='30' placeholder='pengirim' class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6 col-md-offset-3">
                    <input type='text' name='email' size='30' maxsize='30' placeholder='email' class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6 col-md-offset-3">
                    <textarea name=pesan rows=5 cols=50 wrap='physical' class="form-control" placeholder="Pesan"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-10">
                    <input type='submit' name='submit' value='OK' class="btn btn-default">
                </div>
            </div>
        </form>
    </div>
</div>

<?php
if ($_POST['submit'] != null)
  include_once "include/proc_buku_tamu.php";

$h = mysql_query("select * from buku_tamu");
?>
<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">Guest Book</h3>
    </div>
    <div class="panel-body">
        <table width=100% class="table">
            <?php
            while ($data = mysql_fetch_array($h)) {
              ?>
              <tr>
                  <td>Pengirim:</td><td><?= $data[nama] ?> <?= $data[email] ?></td></tr>
              <tr>
                  <td>Tanggal:</td><td><?= tgl_indo($data['date']) ?></td>
              </tr>
              <tr>
                  <td colspan=2><?= $data[pesan] ?></td>
              </tr>
              <tr>
                  <td style='padding-left:15px;padding-right:15px;border:thin solid black;' colspan=2>Tanggapan:<br/><?= $data[tanggapan] ?></td>
              </tr>
              <?php
            }
            ?>
        </table>
    </div>
</div>

<?php
$body = ob_get_clean();

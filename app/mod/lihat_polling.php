<?php
// membuat cookie dengan nama poling
// cookie akan secara otomatis terhapus dalam waktu 24 jam

if (isset($_COOKIE["poling"])) {
  $body .= "<p> </p>";
}
setcookie("poling", "sudah poling", time() + 3600 * 24);

$u = mysql_query("UPDATE poling SET rating=rating+1 WHERE id_poling='$_POST[pilihan]'");
ob_start();
?>
<p align=center>Terimakasih atas partisipasi Anda mengikuti poling kami<br />
    Hasil poling saat ini:
</p>

<table width=100% xstyle='border: 1pt solid #d2d2d2; padding: 10px;font-size:11px'>
    <?php
    $jml = mysql_query("SELECT SUM(rating) as jml_vote FROM poling WHERE aktif='Y'");
    $j = mysql_fetch_array($jml);

    $jml_vote = $j[jml_vote];

    $sql = mysql_query("SELECT * FROM poling WHERE aktif='Y'");

    while ($s = mysql_fetch_array($sql)) {

      $prosentase = sprintf("%2.1f", (($s[rating] / $jml_vote) * 100));
      $gbr_vote = $prosentase * 3;
      ?>
      <tr>
          <td width=120><?= $s[pilihan] ?> <?= ($s[rating]) ?></td>
          <td> 
              <img src=gambar/blue.png width=<?=$gbr_vote?> height=18 border=0> <?= $prosentase ?> % 
          </td>
      </tr>
      <?php
    }
    ?>
</table>
<p>Jumlah Voting: <b><?= $jml_vote ?></b></p>
<div class=kembali>
    <a href=javascript:history.go(-1)>[Kembali]</a>
</div>

<?php
$c = ob_get_clean();
ob_start();
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Hasil Poling</h3>
    </div>
    <div class="panel-body">
        <?= $c ?>
    </div>

</div>
<?php
$body = ob_get_clean();

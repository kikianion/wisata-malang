<?php
$tag = $_POST['tag'];
$key = $_POST['key'];
$jenis = $_POST['jenis'];

ob_start();

$judul = "";
$content = "";

if ($jenis == "Pariwisata") {
  $judul = "Pencarian objek wisata $tag";
  $sql = "select * from wisata where tag like '%$tag%'";
  $h = mysql_query($sql);
  if (mysql_num_rows($h) > 0) {
    while ($d = mysql_fetch_array($h)) {
      ?>
      <table width=100% class='table'>
          <tr><th width="140">Nama Wisata</th><th><?= $d[nama] ?></th></tr>
          <tr><td>Alamat</td><td><?= $d[alamat] ?></td></tr>
          <tr><td>Tiket</td><td><?= $d[tiket] ?></td></tr>
      </table>
      <?php
    }
  } else {
    ?>
    <table width=100% >
        <tr><td align=center style='color:red'>Objek wisata tidak ada</td></tr>
    </table>
    <?php
//    $content .= ob_get_clean();
  }
} else { //Search penginapan
  $judul = "Pencarian Penginapan $tag";
  $sql = "select * from penginapan where tag like '%$tag%' and nama like '%$key%'";
  $h = mysql_query($sql);
  if (mysql_num_rows($h) > 0) {
    while ($d = mysql_fetch_array($h)) {
      ?>
      <table width=100% class="table">
          <tr><th width="250">Nama Penginapan</th><th><?= $d[nama] ?></th></tr>
          <tr><td>Alamat</td><td><?= $d[alamat] ?></td></tr>
          <tr><td>Telpon</td><td><?= $d[telpon] ?></td></tr>
      </table>
      <?php
    }
  } else {
    ?>
    <table width=100% class="table">
        <tr><td align=center style='color:red'>Penginapan tidak ditemukan</td></tr>
    </table>
    <?php
  }
}

$c = ob_get_clean();
ob_start();
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><?= $judul ?></h3>
    </div>
    <div class="panel-body">
        <?= $c ?>
    </div>
    <div class="panel-footer text-center"><a href=javascript:history.go(-1)>[Kembali]</a></div>
</div>
<?php
$body = ob_get_clean();

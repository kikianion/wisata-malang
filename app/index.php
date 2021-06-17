<?php

require_once ('lib/fungsi_indotgl.php');
include("lib/koneksi.php");
include("lib/kanan.php");
include("lib/tengah.php");
require_once ("tool.php");
require_once ('lib/class_paging.php');
$mod = isset($_GET['module']) ? $_GET['module'] : "";
if ($mod == "" || $mod == null)
  $mod = "home";

$body = "";

switch ($mod) {
  case 'tag_search':
    include("mod/tag_search.php");
    break;
  case 'detail_wisata':
    include("mod/detail_wisata.php");
    break;
  case 'detail_penginapan':
    include("mod/detail_penginapan.php");
    break;
  case 'det_news':
    include("mod/det_news.php");
    break;
  case 'bukutamu':
    include("mod/bukutamu.php");
    break;
  case 'home':
    include("mod/home.php");
    break;
  case 'news':
    include("mod/news.php");
    break;
  case 'det_kecamatan':
    include("mod/det_kecamatan.php");
    break;
  case 'wisata':
    include("mod/wisata.php");
    break;
  case "lihat_polling":
    include("mod/lihat_polling.php");
    break;
}
?>

<?php include("_header.php"); ?>
<div class="row">
    <div class="col-md-9">
        <div class="panel panel-primary">
            <div class="panel-body">
                <?= $body ?>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Fitur</h3>
            </div>
            <div class="panel-body">
                <?= $kanan ?>
            </div>
        </div>
    </div>
</div>
<?php include("_footer.php") ?>
<?php

function GetCheckboxes($table, $key, $Label, $Nilai = '') {
  $s = "select * from $table order by nama_tag";
  $r = mysql_query($s);
  $_arrNilai = explode(',', $Nilai);
  $str = '';
  while ($w = mysql_fetch_array($r)) {
    $_ck = (array_search($w[$key], $_arrNilai) === false) ? '' : 'checked';
    $str .= "<input type=checkbox name='" . $key . "[]' value='$w[$key]' $_ck>$w[$Label] ";
  }
  return $str;
}

$aksi = "include/modul/manage_kecamatan/aksi.php";
switch ($_GET[act]) {
  // Tampil Berita
  default:
    $body .= "<h2>Manage Kecamatan Kota</h2>
        
          <table style=\"\" cellpadding=10px width=100% class='table '>
          <tr><th>no</th><th>Nama Kecamatan</th><th>Populasi</th><th>Kepadatan</th><th>Luas</th><th>aksi</th></tr>";

    $p = new Paging;
    $batas = 10;
    $posisi = $p->cariPosisi($batas);


    $tampil = mysql_query("SELECT * FROM kecamatan ORDER BY id DESC LIMIT $posisi,$batas");


    $no = $posisi + 1;
    while ($r = mysql_fetch_array($tampil)) {
      $body .= "<tr><td>$no</td>
                <td>$r[nama]</td>
                <td>$r[populasi]</td>
				<td>$r[kepadatan]</td>
				<td>$r[luas]</td>
		            <td><a href=?page=man_kecamatan&act=editkecamatan&id=$r[id]>Edit</a>
		                </td>
		        </tr>";
      $no++;
    }
    $body .= "</table>";


    $jmldata = mysql_num_rows(mysql_query("SELECT * FROM kecamatan"));

    $jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    $body .= "<div id=paging>Hal: $linkHalaman</div><br>";

    break;
  case "hapus":

  case "tambahkecamatan":
    ?>
    <script>
      alert("Tidak ada aksi");
    </script>

    <?php

    $module = $_GET[page];
    header('location:page_admin.php?page=' . $module);
  case "editkecamatan":
    $edit = mysql_query("SELECT * FROM kecamatan WHERE id='$_GET[id]'");
    $r = mysql_fetch_array($edit);

    $body .= "<h2>Edit Info Kecamatan</h2>
<form method=POST enctype='multipart/form-data' action=$aksi?page=man_kecamatan&act=update>
<input type=hidden name=id value=$r[id]>
<table style=\"\" cellpadding=10px width=100% class='table'>
<tr><td width=70>Kecamatan</td>     <td> : <input type=text name='nama' size=60 value='$r[nama]'></td></tr>
<tr><td width=70>Pupulasi</td>     <td> : <input type=text name='populasi' size=60 value='$r[populasi]'></td></tr>
<tr><td width=70>Kepadatan</td>     <td> : <input type=text name='kepadatan' size=60 value='$r[kepadatan]'></td></tr>
<tr><td width=70>Luas</td>     <td> : <input type=text name='luas' size=60 value='$r[luas]'></td></tr>
<tr><td>Keterangan</td><td> <textarea name=keterangan rows=4 cols=60>$r[keterangan]</textarea></td></tr>
";


    $body .= "<tr><td colspan=2><input type=submit value=Update>
<input type=button value=Batal onclick=self.history.back()></td></tr>
</table></form>";
    break;
}
?>

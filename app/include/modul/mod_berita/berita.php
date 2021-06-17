<?php
function GetCheckboxes($table, $key, $Label, $Nilai='') {
  $s = "select * from $table order by nama_tag";
  $r = mysql_query($s);
  $_arrNilai = explode(',', $Nilai);
  $str = '';
  while ($w = mysql_fetch_array($r)) {
    $_ck = (array_search($w[$key], $_arrNilai) === false)? '' : 'checked';
    $str .= "<input type=checkbox name='".$key."[]' value='$w[$key]' $_ck>$w[$Label] ";
  }
  return $str;
}

$aksi="include/modul/mod_berita/aksi_berita.php";
switch($_GET[act]){
  // Tampil Berita
  default:
    $body.="<h2>Berita</h2>
          <input type=button class='btn btn-primary' value='Tambah Berita' onclick=\"window.location.href='?page=news&act=tambahberita';\">
          <table class='table'>
          <tr><th>no</th><th>judul</th><th>tgl. posting</th><th>aksi</th></tr>";

    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    
      $tampil = mysql_query("SELECT * FROM berita ORDER BY id_berita DESC LIMIT $posisi,$batas");
  
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
      $tgl_posting=tgl_indo($r[tanggal]);
      $body.="<tr><td>$no</td>
                <td>$r[judul]</td>
                <td>$tgl_posting</td>
		            <td><a href=?page=news&act=editberita&id=$r[id_berita]>Edit</a> | 
		                <a href=$aksi?page=news&act=hapus&id=$r[id_berita]>Hapus</a></td>
		        </tr>";
      $no++;
    }
    $body.="</table>";

   
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM berita"));
    
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    $body.="<div id=paging>Hal: $linkHalaman</div><br>";
 
    break;
  
  case "tambahberita":
    $body.="<h2>Tambah Berita</h2>
          <form method=POST action='$aksi?page=news&act=input' enctype='multipart/form-data'>
          <table class='table'>
          <tr><td width=70>Judul</td>     <td> <input class='form-control' type=text name='judul' size=60></td></tr>";
          
          
    $body.="</td></tr>
          <tr><td>Isi Berita</td>  <td> <textarea class='form-control' name='isi_berita' style='width: 450px; height: 350px;'></textarea></td></tr>
          <tr><td>Gambar</td>      <td> <input type=file name='fupload' size=40 class='form-control'> 
                                          <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 400 px</td></tr>";

    
    $body.="</td></tr>
          <tr><td colspan=2><input type=submit value=Simpan class='btn btn-primary'>
                            <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'></td></tr>
          </table></form>";
     break;
    
  case "editberita":
    $edit = mysql_query("SELECT * FROM berita WHERE id_berita='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    $body.="<h2>Edit Berita</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?page=news&act=update>
          <input type=hidden name=id value=$r[id_berita]>
          <table class='table'>
          <tr><td width=130>Judul</td>     <td> <input class='form-control' type=text class='form-control' name='judul' size=60 value='$r[judul]'></td></tr>";
          
 
          
    $body.="</td></tr>
          <tr><td>Isi Berita</td>   <td> <textarea class='form-control'  name='isi_berita' style='width: 450px; height: 350px;'>$r[isi_berita]</textarea></td></tr>
          <tr><td>Gambar</td>       <td> ";
          if ($r[gambar]!=''){
              $body.="<img src='gambar/foto_berita/$r[gambar]'>";  
          }
    $body.="</td></tr>
          <tr><td>Ganti Gbr*</td>    <td> <input type=file class='form-control' name='fupload' size=30> </td></tr>
          <tr><td colspan=2>*) Apabila gambar tidak diubah, dikosongkan saja.</td></tr>";

   
    $body.="<tr><td colspan=2><input type=submit value=Update class='btn btn-primary'>
                            <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'></td></tr>
         </table></form>";
    break;  
}
?>

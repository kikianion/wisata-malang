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

$aksi="include/modul/penginapan_wisata/aksi.php";
switch($_GET[act]){
  // Tampil Berita
  default:
    $body.="<h2>Manage Penginapan Wisata</h2>
        
          <table width=100%>
          <tr><th>no</th><th>Nama Objek Wisata</th><th>Nama Penginapan Terdekat</th></tr>";

    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    
      $tampil = mysql_query("SELECT * FROM wisata_penginapan LIMIT $posisi,$batas");
  
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
	$wisata=$r['id_wisata'];
	$list=$r['penginapan'];
	$a=mysql_query("select nama from wisata where id='$wisata'");
	$aa=mysql_fetch_array($a);
	$q=explode(",",$list);
	$str="";
	for($i=0;$i<count($q);$i++){
	$bb=mysql_fetch_array(mysql_query("select nama from penginapan where id='$q[$i]'"));
	$str.=$bb['nama']."<br>";
	}
      $body.="<tr><td>$no</td>
	  <td>$aa[nama]</td>
                <td>$str</td>
              <td><a href=?page=penginapan_wisata&act=tambahpenginapan&id=$wisata&nama=$aa[nama]>Tambah</a> | 
		                <a href=$aksi?page=penginapan_wisata&act=hapus&id=$wisata>Hapus</a> | 
						
						</td>
		        </tr>";
      $no++;
    }
    $body.="</table>";

   
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM wisata_penginapan"));
    
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    $body.="<div id=paging>Hal: $linkHalaman</div><br>";
 
    break;
  
  case "tambahpenginapan":
	$id=$_GET['id'];$n=$_GET['nama'];
	$m=mysql_query("select * from penginapan");
    $body.="<h2>Tambah Penginapan Wisata</h2>
          <form method=POST action='$aksi?page=penginapan_wisata&act=input&id=$id' enctype='multipart/form-data'>
          <table>
		  <tr><td>Pilih penginapan untuk wisata $n</td></tr>
		  <tr><td><select name='penginapan'>
          ";
		  while($d=mysql_fetch_array($m)){
		  $body.= "<option value=$d[id]>$d[nama]</option>";
		  }

    
    $body.="</select></td></tr>
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
    
  case "editpenginapan":
    $edit = mysql_query("SELECT * FROM penginapan WHERE id='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    $body.="<h2>Edit Penginapan</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?page=man_penginapan&act=update>
          <input type=hidden name=id value=$r[id]>
          <table>
          <tr><td width=70>Judul</td>     <td> : <input type=text name='judul' size=60 value='$r[nama]'></td></tr>";
          
 
          
    $body.="
          <tr><td width=70>Alamat</td>     <td> : <input type=text name='alamat' size=60 value='$r[alamat]'></td></tr>
		  <tr><td width=70>Telepon</td>     <td> : <input type=text name='telpon' size=60 value='$r[telpon]'></td></tr>
		  <tr><td>Keterangan</td>  <td> <textarea name='keterangan' style='width: 450px; height: 350px;'>$r[keterangan]</textarea></td></tr>
         ";
   
    $body.="<tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
         </table></form>";
    break;  
}
?>

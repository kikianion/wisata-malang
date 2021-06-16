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
include_once "tool.php";
$aksi="include/modul/manage_penginapan/aksi.php";
switch($_GET[act]){
  // Tampil Berita
  default:
    $body.="<h2>Manage Penginapan</h2>
          <input type=button value='Tambah Objek Penginapan' onclick=\"window.location.href='?page=man_penginapan&act=tambahpenginapan';\">
		  <input type=button value='Tambah Foto Penginapan' onclick=\"window.location.href='?page=add_foto_penginapan';\">
          <table width=100% class='table'>
		  
          <th>no</th><th>Nama Penginapan</th><th>Alamat</th><th>Telepon</th><th>aksi</th>";

    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    
      $tampil = mysql_query("SELECT * FROM penginapan ORDER BY id DESC LIMIT $posisi,$batas");
  
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
      $body.="<tr><td>$no</td>
                <td>$r[nama]</td>
                <td>$r[alamat]</td>
				<td>$r[telpon]</td>
			
		            <td><a href=?page=man_penginapan&act=editpenginapan&id=$r[id]>Edit</a> | 
		                <a href=?page=man_penginapan&act=hapus&id=$r[id]>Hapus</a> | 
						<a href=?page=man_penginapan&act=foto&id=$r[id]>Foto</a>
						</td>
		        </tr>";
      $no++;
    }
    $body.="</table>";

   
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM penginapan"));
    
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    $body.="<div id=paging>Hal: $linkHalaman</div><br>";
 
    break;
  case "foto":
	$id=$_GET['id'];
	$j=mysql_fetch_array(mysql_query("select * from penginapan where id='$id'"));
	$nama=$j['nama'];
	$body.="<table width=100%  class='table'>
	<tr><td>$nama</td></tr>
	<tr><td>
	".getFotoPenginapan($j['id'])."
	</td></tr>";
	$s=mysql_query("select keterangan from keteranganfoto where file like '%$nama%'");
	if(mysql_num_rows($s) > 0){
	$d=mysql_fetch_array($s);
	$re.="$d[keterangan]";
	}else{
	$re="Tidak ada keterangan foto";
	}
	$body.="<tr><td align=center>$re</td></tr>";
	$body.="</table>";
	break;
  case "hapus":
		$id=$_GET['id'];
		mysql_query("delete from penginapan where id='$id'");
		header("location:?page=man_penginapan");
		break;
  case "tambahpenginapan":
  
    $body.="<h2>Tambah Penginapan</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?page=man_penginapan&act=input>
          
          <table class='table'>
          <tr><td width=70>Nama</td>     <td> : <input type=text name='nama' size=60 value=''></td></tr>";
          
 
          
    $body.="
          <tr><td width=70>Alamat</td>     <td> : <input type=text name='alamat' size=60 value=''></td></tr>
		  <tr><td width=70>Telepon</td>     <td> : <input type=text name='telpon' size=60 value=''></td></tr>
		  <tr><td>Keterangan</td>  <td> <textarea name='keterangan' style='width: 450px; height: 100px;'></textarea></td></tr>
         ";
   
    $body.="<tr><td colspan=2><input type=submit value=Add>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
         </table></form>";
    break;  
    
  case "editpenginapan":
   ?>
  	<script language="JavaScript" type="text/javascript">
  function ganti(pilihan){
	var a=document.tambahForm.stag.innerHTML+pilihan+",";
	document.tambahForm.stag.innerHTML=a;
  }
 // function ganti(){}
</script>
  <?php
    $edit = mysql_query("SELECT * FROM penginapan WHERE id='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    $body.="<h2>Edit Penginapan</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?page=man_penginapan&act=update name='tambahForm'>
          <input type=hidden name=id value=$r[id]>
          <table  class='table'>
          <tr><td width=70>Nama</td>     <td> : <input type=text name='nama' size=60 value='$r[nama]'></td></tr>";
          
 
          
    $body.="
          <tr><td width=70>Alamat</td>     <td> : <input type=text name='alamat' size=60 value='$r[alamat]'></td></tr>
		  <tr><td width=70>Telepon</td>     <td> : <input type=text name='telpon' size=60 value='$r[telpon]'></td></tr>
		  <tr><td>Keterangan</td>  <td> <textarea name='keterangan' style='width: 450px; height: 100px;'>$r[keterangan]</textarea></td></tr>
		   <tr><td>Tag</td><td>:<select name=tag onchange=\"ganti(document.tambahForm.tag.options[document.tambahForm.tag.selectedIndex].value)\">
		  <option value='Bintang'>Bintang</option>
		  <option value='Melati'>Melati</option>
		  <option value='Villa'>Villa</option>
		
		 
		  </select></td></tr>
		  <tr><td></td><td><textarea name='stag' rows=4 cols=70></textarea></td></tr>
         ";
   
    $body.="<tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
         </table></form>";
    break;  
}
?>

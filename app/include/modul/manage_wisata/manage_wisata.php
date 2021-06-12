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

$aksi="include/modul/manage_wisata/aksi.php";
switch($_GET[act]){
  // Tampil Berita
  default:
    $body.="<h2>Manage Wisata</h2>
          <input type=button value='Tambah Objek Wisata' onclick=\"window.location.href='page_admin.php?page=map';\">
		  <input type=button value='Tambah Foto Wisata' onclick=\"window.location.href='?page=add_foto_wisata';\">
		 
          <table style=\"border:solid thin black\" width=100% border=1>
          <tr><td align=center>no</td><td align=center>Nama Wisata</td><td align=center>Jenis</td><td align=center>Alamat</td><td align=center>Tiket</td><td align=center>aksi</td></tr>";

    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    
      $tampil = mysql_query("SELECT * FROM wisata ORDER BY id DESC LIMIT $posisi,$batas");
  
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
      $body.="<tr><td align=center>$no</td>
                <td align=center>$r[nama]</td>
                <td align=center>$r[jenis]</td>
				<td align=center>$r[alamat]</td>
				<td align=center>$r[tiket]</td>
		            <td align=center><a href=?page=man_wisata&act=editwisata&id=$r[id]>Edit</a><br />
		                <a href=?page=man_wisata&act=hapus&id=$r[id]>Hapus</a><br /> 
						<a href=?page=penginapan_wisata&act=tambahpenginapan&id=$r[id]&nama=$r[nama]>Tambah Penginapan</a><br />
						<a href=?page=man_foto&jenis=wisata&wisata=$r[id]>Foto</a>
						</td>
		        </tr>";
      $no++;
    }
    $body.="</table>";

   
    $jmldata = mysql_num_rows(mysql_query("SELECT * FROM wisata"));
    
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    $body.="<div id=paging>Hal: $linkHalaman</div><br>";
 
    break;
   case "hapus":
		$id=$_GET['id'];
		mysql_query("delete from wisata where id='$id'");
		header("location:?page=man_wisata");
		break;
  case "tambahwisata":
	?>
	<script language="JavaScript" type="text/javascript">
  function ganti(pilihan){
	a=document.tambahForm.stag.innerHTML+pilihan+",";
	document.tambahForm.stag.innerHTML=a;
  }
 // function ganti(){}
</script>
	<?
	require("lib/class_navigasi2.php");
    $body.="<h2>Tambah Objek Wisata</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?page=man_wisata&act=input name='tambahForm'>
          
          <table>
		  <tr><td>ID</td><td>: <input type='text' name='id'></td></tr>
          <tr><td width=70>Nama Wisata</td>     <td> : <input type=text name='nama' size=60'></td></tr>
		  <tr><td width=70>Jenis Wisata</td>     <td> : <textarea name='jenis' cols=70 rows=3></textarea></td></tr>
		  <tr><td width=70>Alamat</td>     <td> : <input type=text name='alamat' size=60'></td></tr>
		  <tr><td width=70>Biaya Masuk</td>     <td> : <input type=text name='tiket' size=60'></td></tr>
		  <tr><td width=70>Keterangan</td>     <td> : <textarea name='keterangan' cols=70 rows=10></textarea></td></tr>
		  <tr><td>Tag</td><td>:<select name=tag onchange=\"ganti(document.tambahForm.tag.options[document.tambahForm.tag.selectedIndex].value)\">
		  <option value='Taman'>Taman</option>
		  <option value='Keluarga'>Keluarga</option>
		  <option value='Pantai'>Pantai</option>
		  <option value='Air terjun'>Air terjun</option>
		  <option value='Perkemahan'>Perkemahan</option>
		  <option value='Air panas'>Air panas</option>
		  <option value='Outbond'>Outbond</option>
		  <option value='Kolam renang'>Kolam renang</option>
		  <option value='Bendungan'>Bendungan</option>
		  <option value='Perkebunan'>Perkebunan</option>
		  <option value='Sejarah'>Sejarah</option>
		  <option value='Agrowisata'>Agrowisata</option>
		  </select></td></tr>
		  <tr><td></td><td><textarea name='stag' rows=4 cols=70></textarea></td></tr>
		  ";
    $body.="
		<tr><td align=left colspan=8>".Main()."</td></tr>
		";      
 
    $body.="<tr><td colspan=2><input type=submit value=Tambah>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
         </table></form>";
    break;  

  case "editwisata":
  ?>
  	<script language="JavaScript" type="text/javascript">
  function ganti(pilihan){
	var a=document.tambahForm.stag.innerHTML+pilihan+",";
	document.tambahForm.stag.innerHTML=a;
  }
 // function ganti(){}
</script>
  <?
    $edit = mysql_query("SELECT * FROM wisata WHERE id='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    $body.="<h2>Edit Wisata</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?page=man_wisata&act=update name='tambahForm'>
          <input type=hidden name=id value=$r[id]>
          <table>
		  <tr><td>ID</td><td>: <input type='text' name='id' value='$r[id]'></td></tr>
          <tr><td width=70>Nama Wisata</td>     <td> : <input type=text name='nama' size=60 value='$r[nama]'></td></tr>
		  <tr><td width=70>Jenis Wisata</td>     <td> : <textarea name='jenis' cols=70 rows=3>$r[jenis]</textarea></td></tr>
		  <tr><td width=70>Alamat</td>     <td> : <input type=text name='alamat' size=60 value='$r[alamat]'></td></tr>
		  <tr><td width=70>Biaya Masuk</td>     <td> : <input type=text name='tiket' size=60 value='$r[tiket]'></td></tr>
		  <tr><td width=70>Keterangan</td>     <td> : <textarea name='keterangan' cols=70 rows=10>$r[keterangan]</textarea></td></tr>
		   <tr><td>Tag</td><td>:<select name=tag onchange=\"ganti(document.tambahForm.tag.options[document.tambahForm.tag.selectedIndex].value)\">
		  <option value='Taman'>Taman</option>
		  <option value='Keluarga'>Keluarga</option>
		  <option value='Pantai'>Pantai</option>
		  <option value='Air terjun'>Air terjun</option>
		  <option value='Perkemahan'>Perkemahan</option>
		  <option value='Air panas'>Air panas</option>
		  <option value='Outbond'>Outbond</option>
		  <option value='Kolam renang'>Kolam renang</option>
		  <option value='Bendungan'>Bendungan</option>
		  <option value='Perkebunan'>Perkebunan</option>
		  <option value='Sejarah'>Sejarah</option>
		  <option value='Agrowisata'>Agrowisata</option>
		  </select></td></tr>
		  <tr><td></td><td><textarea name='stag' rows=4 cols=70></textarea></td></tr>
		  ";
          
 
    $body.="<tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
         </table></form>";
    break;  
}
?>

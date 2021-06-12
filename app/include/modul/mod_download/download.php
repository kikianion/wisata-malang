<?php
$aksi="include/modul/mod_download/aksi_download.php";
switch($_GET[act]){
  // Tampil Download
  default:
    $body.="<h2>Manage Download</h2>
          <input type=button value='Tambah Download' onclick=location.href='?page=download&act=tambahdownload'>
          <table >
          <tr><th style='width:30px;'>No</th><th>Judul</th><th>Tgl. Posting</th><th>Aksi</th></tr>";
    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);
    
    $tampil=mysql_query("SELECT * FROM download ORDER BY id_download DESC LIMIT $posisi,$batas");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
      $tgl=tgl_indo($r[tgl_posting]);
      $body.="<tr><td align=center>$no</td>
                <td>$r[judul]</td>
                <td>$tgl</td>
                <td align=center><a href=?page=download&act=editdownload&id=$r[id_download]>Edit</a> | 
	                  <a href=$aksi?page=download&act=hapus&id=$r[id_download] onclick=\"return confirm('Apakah anda yakin akan menghapus download ini?')\">Hapus</a>
		        </tr>";
    $no++;
    }
    $body.="</table>";
    $jmldata=mysql_num_rows(mysql_query("SELECT * FROM download"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    $body.="<div id=paging>Hal: $linkHalaman</div><br>";
    break;
  
  case "tambahdownload":
    $body.="<h2>Tambah Download</h2>
          <form method=POST action='$aksi?page=download&act=input' enctype='multipart/form-data'>
        <table style='width:615px;'>
        <tr><td>Judul</td><td><input type=text name=judul size=35></td></tr>
	
        <tr><td colspan=2>---------------------------------------------------------------------</td></tr>
        
        <tr><td>Upload File</td><td><input type=file name='fupload' size=35> **</td></tr>
        <tr><td></td><td>*) Biarkan kosong bila memilih Upload File</td></tr>
        <tr><td></td><td>**) Jangan Upload File bila memilih Link URL</td></tr>
        <tr><td colspan=2>----------------------------------------------------------------------</td></tr>
        <tr><td></td><td><input type=submit value=Simpan>
        <input type=button value=Batal onclick=self.history.back()></td></tr>
        </table></form>";
     break;
    
  case "editdownload":
    $edit = mysql_query("SELECT * FROM download WHERE id_download='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

  $body.="<h2>Edit Download</h2>
        <form method=POST enctype='multipart/form-data' action=$aksi?page=download&act=update>
        <input type=hidden name=id value=$r[id_down]>

        <table width=100%>
        <tr><td>Judul</td><td><input type=text name=judul size=35 value='$r[judul]'></td></tr>
        ";
  $body.="</td></tr>";
        if ($r[nama_file]==null){
 $body.="<tr><td style=vertical-align:top;>URL Lama</td><td style=width:448px;> $r[link_url]<input type=hidden name=url_lama value=$r[link_url]></td></tr>
        <tr><td colspan=2>-----------------------------------------------------------------------------------------------------------------------</td></tr>
        <tr><td>URL Baru</td><td><input type=text name=new_url size=35> *</td></tr>
        <tr><td>Upload File</td><td><input type=file name='fupload' size=35> **</td></tr>
        <tr><td></td><td>*) Biarkan kosong bila memilih Upload File</td></tr>
        <tr><td></td><td>**) Jangan Upload File bila memilih URL Baru</td></tr>";
	    }
        else{
  $body.="<tr><td style=vertical-align:top;>File lama</td><td style=width:448px;> $r[isi_file]<input type=hidden name=filex value=$r[isi_file]></td></tr>
		<tr><td colspan=2>-----------------------------------------------------------------------------------------------------------------------</td></tr>
        <tr><td>Link URL</td><td><input type=text name=file2url size=35> *</td></tr>
        <tr><td>Ganti File</td><td><input type=file name='fuploads' size=35> **</td></tr>
        <tr><td></td><td>*) Biarkan kosong bila memilih Ganti File</td></tr>
        <tr><td></td><td>**) Jangan Ganti File bila memilih Link URL</td></tr>";
	    }
 $body.="<tr><td colspan=2>----------------------------------------------------------------------------------------------------------------------</td></tr>
        <tr><td style=vertical-align:top;>Deskripsi</td><td><textarea name=deskripsi id=deskripsi style='width: 250px; height: 100px;'>$r[deskripsi]</textarea></td></tr>       
        <tr><td></td><td><input type=submit value=Update>
        <input type=button value=Batal onclick=self.history.back()></td></tr>
        </table></form>";
    break;  
}
?>

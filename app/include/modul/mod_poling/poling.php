<?php
$aksi="include/modul/mod_poling/aksi_poling.php";
switch($_GET[act]){
  // Tampil Modul
  default:
	$body.="<h2>Manage Poling</h2>
		  <table>
		  <tr><th>Pertanyaan Polling</th><th>Aksi</th></tr>";
		  $lihat=mysql_query("SELECT * FROM survei ORDER BY id_surv");
		  while ($r=mysql_fetch_array($lihat)){
    $body.="<tr><td>$r[survie]</td>
          <td align=center><a href=?page=polling&act=editsurvei&id=$r[id_surv]>Ganti</a></td></tr>";
	      }
	$body.="</table>";
	
    $body.="<h2>Manage Pilihan</h2>
          <input type=button value='Tambah Poling' onclick=\"window.location.href='?page=polling&act=tambahpoling';\">
          <table>
          <tr><th style='width:30px;'>No</th><th>Pilihan</th><th>Rating</th><th>Aktif</th><th>Aksi</th></tr>";
          
    $no = 1;
    $tampil=mysql_query("SELECT * FROM poling ORDER BY id_poling DESC");
    while ($r=mysql_fetch_array($tampil)){
      $body.="<tr>
            <td align=center>$no</td>
            <td>$r[pilihan]</td>
            <td align=center>$r[rating]</td>
            <td align=center>$r[aktif]</td>
            <td align=center><a href=?page=polling&act=editpoling&id=$r[id_poling]>Edit</a> | 
	              <a href=$aksi?page=polling&act=hapus&id=$r[id_poling] onclick=\"return confirm('Apakah anda yakin akan menghapus polling ini?')\">Hapus</a>
            </td></tr>";
      $no++;
    }
    $body.="</table>";
    break;

  case "tambahpoling":
    $body.="<h2>Tambah Poling</h2>
          <form method=POST action='$aksi?page=polling&act=input'>
          <table>
          <tr><td>Pilihan</td> <td><input type=text name='pilihan'></td></tr>
          <tr><td>Aktif</td>   <td><input type=radio name='aktif' value='Y' checked>Y 
                                         <input type=radio name='aktif' value='N'>N  </td></tr>
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
 
  case "editpoling":
    $edit = mysql_query("SELECT * FROM poling WHERE id_poling='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    $body.="<h2>Edit Poling</h2>
          <form method=POST action=$aksi?page=polling&act=update>
          <input type=hidden name=id value='$r[id_poling]'>
          <table>
          <tr><td>Pilihan</td> <td><input type=text name='pilihan' value='$r[pilihan]'></td></tr>";
    if ($r[aktif]=='Y'){
      $body.="<tr><td>Aktif</td> <td><input type=radio name='aktif' value='Y' checked>Y  
                                      <input type=radio name='aktif' value='N'> N</td></tr>";
    }
    else{
      $body.="<tr><td>Aktif</td> <td><input type=radio name='aktif' value='Y'>Y  
                                      <input type=radio name='aktif' value='N' checked>N</td></tr>";
    }

    $body.="<tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
    
    case "editsurvei":
    $edits=mysql_query("SELECT * FROM survei WHERE id_surv='$_GET[id]'");
    $s=mysql_fetch_array($edits);

    $body.="<h2>Ganti Pertanyaan</h2>
          <form method=POST action=$aksi?page=polling&act=updates>
          <input type=hidden name=id value='$s[id_surv]'>
          <table>
          <tr><td>Pertanyaan Polling</td><td><input style=width:350px; type=text name='survei' value='$s[survie]'></td></tr>
          <tr><td></td><td><input type=submit value=Ganti>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
?>

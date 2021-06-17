<?php
$aksi="include/modul/mod_buku_tamu/aksi_bukutamu.php";
switch($_GET[act]){
  // Tampil Shoutbox
  default:
    $body.="<h2>Buku Tamu</h2>
          <table class='table'>
          <tr><th>nama</th><th>Tanggal</th><th>Email</th><th>pesan</th><th>aksi</th></tr>";

   
    $tampil=mysql_query("SELECT * FROM buku_tamu");


    while ($r=mysql_fetch_array($tampil)){
      $body.="<tr>
                <td width=180>$r[nama]</td>
		<td width=120>$r[date]</td>
		<td width=80>$r[email]</td>
                <td xwidth=450>$r[pesan]</td>
               
                <td width=150><a href=?page=buku_tamu&act=editbukutamu&id=$r[id_bk]>Tanggapan</a> |
	                  <a href=$aksi?page=buku_tamu&act=hapus&id=$r[id_bk]>Hapus</a>
		        </tr>";
      $no++;
    }
    $body.="</table>";
    
    break;
  
  case "editbukutamu":
    $edit = mysql_query("SELECT * FROM buku_tamu WHERE id_bk='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    $body.="<h2>Tanggapan</h2>
          <form method=POST action=$aksi?page=buku_tamu&act=update>
          <input type=hidden name='id' value=$r[id_bk]>
          <table class='table'>
          <tr><td>Nama</td><td>     $r[nama]</td></tr>
          <tr><td>Email</td><td>  $r[email]</td></tr>
          <tr><td>Pesan</td><td> $r[pesan]</td></tr>
		  <tr><td colspan=2>Tanggapan<br/><textarea class='form-control' name='tanggapan' style='width: 400px; height: 100px;'>$r[tanggapan]</textarea></td></tr>
		  ";

    
    $body.="<tr><td colspan=2><input type=submit class='btn btn-primary' value=Tanggapi>
                            <input type=button class='btn btn-danger' value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
?>

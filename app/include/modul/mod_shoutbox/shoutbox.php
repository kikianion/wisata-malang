<?php
$aksi="include/modul/mod_shoutbox/aksi_shoutbox.php";
switch($_GET[act]){
  // Tampil Shoutbox
  default:
    $body.="<h2>Shoutbox</h2>
          <table class='table'>
          <tr><th>no</th><th>nama</th><th>pesan</th><th>aktif</th><th>aksi</th></tr>";

    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    $tampil=mysql_query("SELECT * FROM shoutbox ORDER BY id_shoutbox DESC LIMIT $posisi,$batas");

    $no = $posisi+1;
    while ($r=mysql_fetch_array($tampil)){
      $body.="<tr><td width=50>$no</td>
                <td width=180>$r[nama]</td>
                <td width=290>$r[pesan]</td>
                <td width=5 align=center>$r[aktif]</td>
                <td><a href=?page=mini_chat&act=editshoutbox&id=$r[id_shoutbox]>Edit</a> | 
	                  <a href=$aksi?page=mini_chat&act=hapus&id=$r[id_shoutbox]>Hapus</a>
		        </tr>";
      $no++;
    }
    $body.="</table>";
    $jmldata=mysql_num_rows(mysql_query("SELECT * FROM shoutbox"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    $body.="<div id=paging>Hal: $linkHalaman</div><br>";
    break;
  
  case "editshoutbox":
    $edit = mysql_query("SELECT * FROM shoutbox WHERE id_shoutbox='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    $body.="<h2>Edit Shoutbox</h2>
          <form method=POST action=$aksi?page=mini_chat&act=update>
          <input type=hidden name=id value=$r[id_shoutbox]>
          <table class='table'>
          <tr><td>Nama</td><td>     <input class='form-control' type=text name='nama' size=30 value='$r[nama]'></td></tr>
          <tr><td>Website</td><td>  <input  class='form-control' type=text name='website' size=30 value='$r[website]'></td></tr>
          <tr><td>Pesan</td><td> <textarea  class='form-control' name=pesan style='width: 400px; height: 100px;'>$r[pesan]</textarea></td></tr>";

    if ($r[aktif]=='Y'){
      $body.="<tr><td>Aktif</td> <td> <input type=radio name='aktif' value='Y' checked>Y  
                                      <input type=radio name='aktif' value='N'> N</td></tr>";
    }
    else{
      $body.="<tr><td>Aktif</td> <td> : <input type=radio name='aktif' value='Y'>Y  
                                      <input type=radio name='aktif' value='N' checked>N</td></tr>";
    }

    $body.="<tr><td colspan=2><input type=submit value=Update class='btn btn-primary'>
                            <input type=button class='btn btn-danger' value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
?>

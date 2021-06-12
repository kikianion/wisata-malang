<script language="JavaScript" type="text/javascript">
  var arrPariwisata=["Taman","Keluarga","Pantai","Air terjun","Perkemahan","Air panas","Outbond","Kolam renang","Bendungan","Agrowisata","Perkebunan","Sejarah"];
  var arrPenginapan=["Bintang","Melati","Villa"];
  function ganti(pilihan){
  var arrPilihan=eval("arr"+pilihan);
  while(arrPilihan.length < searchForm.tag.options.length){
  searchForm.tag.options[(searchForm.tag.options.length-1)]=null;
  }
  var jml=arrPilihan.length;
  for(var i=0;i<=jml-1;i++){
  document.searchForm.tag.options[i]=new Option(arrPilihan[i]);
  }
  }
 // function ganti(){}
</script>
<?
// Quick Search
$tengah="";
$tengah.="
<table width=\"165\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border:solid thin black;font-size:11px;padding-bottom:5px\">
<tr><td align=\"center\" class=judul_body colspan=7><b>Quick Search</b></td></tr>
<tr><td align=\"center\" valign=\"top\"><form method=post action='index.php?module=tag_search' name='searchForm'>
<table width=100% style='font-size:11px;padding:5' border=0>
<tr><td>Pencarian</td><td><select name='jenis' onchange=\"ganti(document.searchForm.jenis.options[document.searchForm.jenis.selectedIndex].value)\"><option value='Pariwisata'>Objek Wisata</option><option value=Penginapan>Penginapan</option></select></td></tr>
<tr><td>Tag</td><td><select name='tag'>
<option value='Taman'>Taman</option>
<option value='Keluarga'>Keluarga</option>
<option value='Pantai'>Pantai</option>
<option value='Air terjun'>Air terjun</option>
<option value='Perkemahan'>Perkemahan</option>
<option value='Air panas'>Air panas</option>
<option value='Outbond'>Outbond</option>
<option value='Kolam renang'>Kolam renang</option>
<option value='Bendungan'>Bendungan</option>
<option value='Agrowisata'>Agrowisata</option>
<option value='Perkebunan'>Perkebunan</option>
<option value='Sejarah'>Sejarah</option>
</select></td></tr>

<tr><td colspan=2><input type=submit name=submit value='Cari'></td></tr>
</table></form>
</td></tr>
<tr><td alt=\"\" width=\"165\" border=\"0\"></td></tr>
</table>
<br />
"; 




// Shoutbox
?>

<?
$tengah.="
<table width=\"165\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border:solid thin black;font-size=11px\">
<tbody><tr> 
<tr><td align=\"center\" class=judul_body colspan=7><b>Shoutmix</b></td></tr>
</tr>
<tr> 
<td align=\"center\" valign=\"top\"> <p> 
<br><strong>
<iframe src='lib/shoutbox.php' width=140 height=250 border=1 solid></iframe><br /><br />
	
	<table class=shout width=100% style=\"font-size:11px;\">
    <form name=formshout action=lib/simpanshoutbox.php method=POST>
    <tr><td align=\"center\">Nama<br/><input class=shout type=text name=nama size=15></td></tr>
    <tr><td align=\"center\">Website<br/><input class=shout type=text name=website size=15></td></tr>
    <tr><td valign=top colspan=2 align=\"center\">Pesan</td></tr><tr><td colspan=2 align=\"center\"><textarea class=shout name='pesan' rows=3 cols=15></textarea></td></tr>
    <tr><td colspan=2 align=\"center\">
        <a onClick=\"addSmiley(':-)')\"><img src='gambar/smiley/1.gif'></a> 
        <a onClick=\"addSmiley(':-(')\"><img src='gambar/smiley/2.gif'></a>
        <a onClick=\addSmiley(';-)')\"><img src='gambar/smiley/3.gif'></a>
        <a onClick=\"addSmiley(';-D')\"><img src='gambar/smiley/4.gif'></a>
        <a onClick=\"addSmiley(';;-)')\"><img src='gambar/smiley/5.gif'></a>
        <a onClick=\"addSmiley('<:D>')\"><img src='gambar/smiley/6.gif'></a>
        </td></tr>
	<tr><td colspan=2 align=\"center\"><input class=shout type=submit name=submit value=Kirim><input class=shout type=reset name=reset value=Reset></td></tr>
        </form></table>
    
</strong><br>
</p></td>
</tr>
<tr> 
<td></td>
</tr></tbody></table> 
<br />";
// Download
/*$tengah.="
<table width=\"165\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border:solid thin black;font-size=11px\">
<tbody><tr> 
<tr><td align=\"center\" class=judul_body colspan=7><b>Download</b></td></tr>
</tr>
<tr> 
<td align=\"center\" valign=\"top\"> <p> 
<br><strong>";
$download=mysql_query("SELECT * FROM download 
                    ORDER BY id_download DESC LIMIT 5");
while($d=mysql_fetch_array($download)){
$tengah.="<p><li><a href='include_file/downlot.php?file=$d[nama_file]'>$d[judul]</a> ($d[hits])</li></p>";
}
$tengah.="</ul></div><br />";
$tengah.="</strong><br>
</p></td>
</tr>
<tr> 
<td alt=\"\" width=\"165\" border=\"0\"></td>
</tr></tbody></table>"; 
*/


?>

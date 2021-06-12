<table  cellpadding="0" cellspacing="0">
<?
$m=$_GET['module'];
if($m==null || $m==""){
$result=mysql_query("select*from artikel ORDER BY counter DESC LIMIT 2");
if($result!=null){
if(mysql_num_rows($result) != 0){
$temp=1;
while($row=mysql_fetch_array($result)){
$bid=$row[bid];
$grup=$row[bgid];
$tglberita=$row[tanggal];
$judul=$row[judul];
$isiberita=$row[isi];
$penulis=$row[penulis];
$gambar=$row[picture];
$tmpbagianberita=array();
$tmp=explode(" ", $isiberita);
for($i=0;$i<=30;$i++) $tmpbagianberita[$i]=$tmp[$i];
$bagianberita=implode(" ", $tmpbagianberita);
$bagianberita=str_replace("\r\n","<br>",$bagianberita);
//menampilkan bagian berita dibrowser
if($temp%2!=0){
echo "<tr class=bg02>";
?>
<td><div class=judul_artikel><?=$judul?></div>
<div class=judul_artikel>Penulis: <?=$penulis?></div>
<img src='foto_artikel/<?=$gambar?>' width=150 height=120 hspace=10 border=0 align=left>
<div class=artikel><?=$bagianberita?> </div><a href='sigohan.php?module=d_artikel&id=<?=$bid?>'>Baca selengkapnya....</a>
<div class=judul_artikel>Posted: <?=$tglberita?></div>
</td>
<?
}else{
?>
<td><div class=judul_artikel><?=$judul?></div>
<div class=judul_artikel>Penulis: <?=$penulis?></div>
<img src='foto_artikel/<?=$gambar?>' width=150 height=120 hspace=10 border=0 align=left>
<div class=artikel><?=$bagianberita?></div> <a href='sigohan.php?module=d_artikel&id=<?=$bid?>'>Baca selengkapnya....</a>
<div class=judul_artikel>Posted: <?=$tglberita?></div>
</td>
<?
echo "</tr>";
}
$temp++;
}
}
}
}else if($m=="d_artikel"){
$id=$_GET['id'];
$result=mysql_query("select*from artikel where bid='$id'");
if($result!=null){
if(mysql_num_rows($result) != 0){
$row=mysql_fetch_array($result);
$bid=$row[bid];
$tglberita=$row[tanggal];
$judul=$row[judul];
$isiberita=$row[isi];
$penulis=$row[penulis];
$gambar=$row[picture];
$berita=str_replace("\r\n","<br>",$isiberita);
?>
<tr class=bg02>
<td><div class=judul_artikel><?=$judul?></div>
<div class=judul_artikel>Penulis: <?=$penulis?></div>
<img src='foto_artikel/<?=$gambar?>' width=150 height=120 hspace=10 border=0 align=left>
<div class=artikel><?=$berita?> </div>
<div class=judul_artikel>Posted: <?=$tglberita?></div>
</td></tr>
<?
}
}
}
?>
<tr><td></td></tr>
<tr><td colspan=2 align=center><a href='sigohan.php?module=video'>Video</a></td></tr>
</table>
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$body .= "<div class='dt2'><table style=\"font-size:11px;padding:10px;border:solid thin black;\" width=100%>
			<form method='post' action='index.php?module=bukutamu'>
			<tr><td align=\"center\" class=judul_body colspan=2><b>Form Guest Book</b></td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td colspan='2' align=center><input type='text' name='nama' size='30' maxsize='30' value='pengirim'>
			<input type='text' name='email' size='30' maxsize='30' value='email'></td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td colspan='2' align=center><textarea name=pesan rows=5 cols=50 wrap='physical'></textarea></td></tr>
			<tr><td colspan='2' align=center><input type='submit' name='submit' value='OK'></td></tr>
			</form>
			<tr><td><div class=kembali><a href=javascript:history.go(-1)>[Kembali]</a></td></tr>
			</table></div>";
if ($_POST['submit'] != null)
  include_once "include/proc_buku_tamu.php";
$h = mysql_query("select * from buku_tamu");
$body .= "<table width=100% style=\"font-size:11px;padding:10px;border:solid thin black;margin-top:10px;\">";
$body .= "<tr>
  <td align=\"center\" class=judul_body colspan=2>
    <b>Guest Book</b>
  </td>
</tr>";
while ($data = mysql_fetch_array($h)) {
  $body .= "<tr><td>Pengirim:</td><td>$data[nama] $data[email]</td></tr><tr><td>Tanggal:</td><td>" . tgl_indo($data['date']) . "</td></tr><tr><td colspan=2>$data[pesan]</td></tr>
	<tr><td style='padding-left:15px;padding-right:15px;border:thin solid black;' colspan=2>Tanggapan:<br/>$data[tanggapan]</td></tr>
	<tr><td colspan=2 align=center>-----------------------------------------------------------------------------------------------------------------------------------</td></tr>";
}
$body .= "</table>";

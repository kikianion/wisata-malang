<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$body .= "<table border=0 width=100% style='font-size:12px;border: thin solid black;color:black;padding:10px;' cellpadding=10>
	<tr><td align=center><b>Bingung cari tempat wisata ?<br/>\"wisata-malang\"<br/>solusinya</b></td></tr>
	<tr><td>Selamat datang di \"Pariwisata Malang Raya\" ...</td></tr>
	<tr><td align=center><b>Profil<br/>\"wisata-malang\"</br></td></tr>
	<tr><td>Malang sejak masa kolonial dikenal sebagai tempat peristirahatan dan tujuan wisata bangsa Eropa terutama dari Negeri Belanda. Iklim tropis pegunungan yang sejuk dan kaya pemandangan indah serta lingkungan yang alami dikelilingi oleh perkebunan, pegunungan, sungai dan taman menjadikan Malang dikenal sebagai Paris Van East Java dan Switzerland of Indonesia. Malang juga merupakan pusat pertemuan beragam etnik, agama, kepercayaan dan budaya khas Jawa Timur yaitu Jawa Tengahan, Jawa Kulonan, Jawa Wetanan (Blambangan), Pesisi Lor dan Kidul, Madura, Osing (Jawa - Bali) dan Mandalungun (Madura - Jawa) sehingga memiliki keunikan serta daya tarik tersendiri. 
	<br>Di beberapa kawasan Kota Malang masih banyak terdapat beberapa bangunan kuno-bersejarah yang memiliki nilai arsitektur dan sejarah, antara lain di kawasan yang menggunakan nama jalan gunung-gunung (Bergenbuurt), kawasan yang menggunakan nama jalan pahlawan-pahlawan (Orangebuurt), kawasan yang menggunakan nama jalan pulau-pulau (Eilandenbuurt), kawasan Splendid, kawasan alun-alun, dan lain sebagainya.</br>
	<br>Jika Anda memiliki info atau masukan untuk website ini silahkan isi komentar anda di form buku tamu.</td></tr>
	</table>";
//news...
    /* 	$terkini=mysql_query("select judul, jam, 
      berita.id_berita, hari, tanggal, gambar, isi_berita
      from berita
      group by berita.id_berita DESC LIMIT 0,4");

      // 	Bagian News
      $body.="";
      $body.="<table style=\"font-size:11px;padding:10px;border:solid thin black;margin-top:10px;\" width=100% cellpadding=5>
      <tr><td align=\"center\" class=judul_body colspan=2><b>Berita Terkini</b></td></tr>";
      while($t=mysql_fetch_array($terkini)){
      $tgl = tgl_indo($t[tanggal]);

      $body.="<tr><td colspan=2><span class=date>$t[hari], $tgl - $t[jam] WIB</span><br /></td></tr>
      <tr><td colspan=2><span class=judul><a href=''>$t[judul]</a></span><br /></td></tr>
      <tr><td>
      ";
      // Apabila ada gambar dalam berita, tampilkan
      if ($t[gambar]!=''){
      $body.="<img src='gambar/foto_berita/small_$t[gambar]' width=110 border=0></td><td  valign=top>";
      }
      // Tampilkan hanya sebagian isi berita
      $isi_berita = htmlentities(strip_tags($t[isi_berita])); // membuat paragraf pada isi berita dan mengabaikan tag html
      $isi = substr($isi_berita,0,220); // ambil sebanyak 220 karakter
      $isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat

      $body.="$isi ... <a href='?module=det_news&id=$t[2]'>Selengkapnya</a>
      <br /></td></tr>";

      }
      $body.="</table>";
     */
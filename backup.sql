-- phpMyAdmin SQL Dump
-- version 2.9.0.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Oct 22, 2010 at 08:43 PM
-- Server version: 5.0.24
-- PHP Version: 5.1.6
-- 
-- Database: `sigohan_db`
-- 
CREATE DATABASE `sigohan_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sigohan_db`;

-- --------------------------------------------------------

-- 
-- Table structure for table `banner`
-- 

CREATE TABLE `banner` (
  `id_banner` int(5) NOT NULL auto_increment,
  `judul` varchar(100) collate latin1_general_ci NOT NULL,
  `url` varchar(100) collate latin1_general_ci NOT NULL,
  `gambar` varchar(100) collate latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  PRIMARY KEY  (`id_banner`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `banner`
-- 

INSERT INTO `banner` VALUES (4, 'Fresh Book', 'http://freshbooks.com', 'freshbook.jpg', '2009-02-05');
INSERT INTO `banner` VALUES (7, 'Cinema 21', 'http://21cineplex.com', 'cinema21.jpg', '2008-02-09');

-- --------------------------------------------------------

-- 
-- Table structure for table `berita`
-- 

CREATE TABLE `berita` (
  `id_berita` int(5) NOT NULL auto_increment,
  `username` varchar(30) collate latin1_general_ci NOT NULL,
  `judul` varchar(100) collate latin1_general_ci NOT NULL,
  `isi_berita` text collate latin1_general_ci NOT NULL,
  `hari` varchar(20) collate latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `gambar` varchar(100) collate latin1_general_ci NOT NULL,
  `dibaca` int(5) NOT NULL default '1',
  PRIMARY KEY  (`id_berita`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=99 ;

-- 
-- Dumping data for table `berita`
-- 

INSERT INTO `berita` VALUES (97, '', 'Minat wisatawan ke museum brawijaya ', 'Minat berwisata sejarah ke Museum Brawijaya di Jalan Ijen ternyata masih sangat tinggi. Selain dikunjungi wisatawan domestic, museum yang telah berusia 40 tahun ini juga masih memikat wisatawan asing. Di museum ini, selain berwisata sejarah dan nostalgia, juga jadi tempat riset ilmu pengetahuan.<br>\r\n\r\nKepala Museum Brawijaya, Mayor (CAJ) Lukas Wahyu Dewanto mengungkapkan, waktu puncak kunjungan terjadi pada bulan Mei, Juni dan Juli. Dalam periode waktu ini, terdapat sekitar 7000 pengunjung setiap bulannya.\r\n\r\n?Para pengunjung di waktu puncak kunjungan ini berasal dari pelajar dan mahasiswa dari dalam Kota Malang dan daerah lain di Jawa Timur,? katanya. Banyaknya pengunjung dari kalangan pelajar karena sesuai program sekolah, yakni sebelum dan sesudah liburan. Selain pelajar dan mahasiswa, masyarakat umum juga mengunjungi museum.\r\n\r\nDalam sebulan, rata-rata pengunjungnya berkisar 1000 orang. Minat masyarakat umum mengunjungi Museum Brawijaya tampak pada 18 Agustus kemarin. Saat itu, kata dia, sekitar 60-an warga RW 16, RT 3 di Sawojajar II ramai-ramai mengunjungi museum sebagai bentuk peringatan ke 63 Kemerdekaan RI. Selain itu, anggota TNI dan Polri pun tercatat sebagai pengunjung di museum ini.\r\n\r\nSedangkan wisatawan asing juga berminat mengunjungi museum milik Kodam V Brawijaya ini. Dalam kurun waktu sebulan, terdapat sekitar 500 wisatawan asing. ?Wisatawan asing yang berkunjung ke sini ada yang bernostalgia, ada yang ingin mengetahui koleksi dan ada juga yang study,? jelas perwira menengah TNI AD ini.', '', '2010-10-19', '08:10:20', '51brawijaya-museum.gif', 1);
INSERT INTO `berita` VALUES (98, '', 'Sengketa wisata senaputra', 'TAMAN wisata Senaputra, boleh jadi sekarang menjadi sengketa kepemilikan antara Kodam V Brawijaya dengan Yayasan Senaputra. Namun, siapa sangka di balik perseteruan itu, kawasan wisata alam di Kota Malang ini, membidik wisatawan khusus menengah. Berada di tepi anak Sungai Brantas dengan kemiringan 15 derajat di atas ketinggian 667 meter di atas permukaan air laut, Senaputra menawarkan kesejukan udara bertemperatur 22-26 derajat Celcius dengan dipayungi rindangnya lima pohon beringin dan belasan pohon penyejuk lainnya.<br><br>\r\n\r\n?Sejak awal dibangun dengan berbagai fasilitas pendukung mulai sekitar Maret 1951, Taman Wisata Senaputra memang membidik wisatawan menengah ke bawah. Ini terlihat dari harga tiket masuk, sarana apa adanya untuk ukuran tempat wisata masa kini. Tetapi wisata ini memiliki kelebihan dibanding tempat lain, yakni lebih menonjolkan keelokan dan keaslian suasana alamnya,?jelas Ketua Pengelola Harian Taman Wisata Senaputra, Sif Bargiono. \r\n\r\nMenurutnya, sebelum kawasan tersebut dijadikan obyek wisata alam, adalah hamparan sawah dan perkebunan warga seluas dua hektar. Adalah Yayasan Senaputra, diantaranya diprakarsai mendiang Sadewo, seorang pensiunan TNI AD waktu itu, yang merintis pembukaan kawasan hijau terbuka Kota Malang itu sejak tahun 1951. Sekitar tahun 1955, kawasan ini akhirnya menjadi sebuah obyek wisata alam di era pemerintahan Wali Kota M. Sardjono Wiryohardjono (1945-1958).\r\n\r\nLahan seluas dua hektar sejak tahun 1951 hingga kini, fasilitas dan kondisi geografisnya masih orisinil seperti awalnya dibangun. Hanya beberapa sarana saja yang terbengkalai alias tak digunakan lagi. Topografisnya, Taman Wisata Senaputra terdesain dalam bentuk kawasan yang rindang atau berupa kawasan hijau pepohonan seluas 15.000 meter persegi.\r\n\r\n?Sarana wisatanya memang sejak dulu hingga kini tak ada perubahan, asli seperti pertama kali dibuat. Ini agar sesuai dan menyatu dengan kondisi lingkungan alamnya yang berada pada kemiringan ditambah anak sungai. Untuk ukuran sekarang, ya kelewat sederhana. Namun justru itu yang disukai wisatawan,? imbuh Pak Sif yang juga menjabat Ketua Tata Usaha Taman Wisata Senaputra itu.\r\n\r\nKeberadaan fasilitas yang ada di kawasan dalam Senaputra, membujur dari sisi atas sebelah utara hingga menurun ke bagian selatan. Seperti sebuah kolam renang besar ukuran 6 meter x 13 meter, sebuah kolam berukuran sedang 8 meter x 9 meter, dan tiga buah kolam mandi berukuran kecil 6 meter x 6 meter. Juga didukung keberadaan Taman Lalu Lintas, Taman Bunga, dan Ampli Theater atau panggung terbuka, kolam hias air mancur untuk bermain anak-anak serta sebuah aula besar, komedi putar, dan ayunan.\r\n\r\n?Dulu si sebelah barat ada studio foto model kuno, tapi sekarang sudah tak terpakai karena alasan perkembangan zaman dan banyak pengunjung membawa kamera digital sendiri. Begitu juga untuk fungsi kawasan wisata ini, kini lebih banyak menjadi arena bermain anak-anak dan yang dewasa lebih suka menggelar acara outbound atau sekadar duduk-duduk,? tukas pria usia 66 tahun itu. ', '', '2010-10-19', '09:10:50', '23senaputra2.gif', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `buku_tamu`
-- 

CREATE TABLE `buku_tamu` (
  `id_bk` int(11) NOT NULL auto_increment,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pesan` text NOT NULL,
  `date` date NOT NULL,
  `tanggapan` text,
  PRIMARY KEY  (`id_bk`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- 
-- Dumping data for table `buku_tamu`
-- 

INSERT INTO `buku_tamu` VALUES (8, 'rifai', 'rifaiza1@yahoo.com', 'sudah baik ampilannya dan moga selalu di update terus datanya', '2010-10-16', 'iya makasih masukannya');

-- --------------------------------------------------------

-- 
-- Table structure for table `download`
-- 

CREATE TABLE `download` (
  `id_download` int(5) NOT NULL auto_increment,
  `judul` varchar(100) collate latin1_general_ci NOT NULL,
  `nama_file` varchar(100) collate latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `hits` int(3) NOT NULL,
  PRIMARY KEY  (`id_download`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=18 ;

-- 
-- Dumping data for table `download`
-- 

INSERT INTO `download` VALUES (17, 'rute', '', '2010-09-27', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `hubungi`
-- 

CREATE TABLE `hubungi` (
  `id_hubungi` int(5) NOT NULL auto_increment,
  `nama` varchar(50) collate latin1_general_ci NOT NULL,
  `email` varchar(100) collate latin1_general_ci NOT NULL,
  `subjek` varchar(100) collate latin1_general_ci NOT NULL,
  `pesan` text collate latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY  (`id_hubungi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `hubungi`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `kecamatan`
-- 

CREATE TABLE `kecamatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `populasi` varchar(50) NOT NULL,
  `kepadatan` varchar(50) NOT NULL,
  `luas` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `kecamatan`
-- 

INSERT INTO `kecamatan` VALUES (1, 'Kecamatan Blimbing', '50000', '60000', '70000', '');
INSERT INTO `kecamatan` VALUES (2, 'Kecamatan Sukun', '40000', '50000', '60000', '');
INSERT INTO `kecamatan` VALUES (3, 'Kecamatan Lowokwaru', '5000', '5000', '5000', '');
INSERT INTO `kecamatan` VALUES (4, 'Kecamatan Klojen', '6000', '6000', '6000', '');
INSERT INTO `kecamatan` VALUES (5, 'Kecamatan Kedungkandang', '4500', '5500', '8000', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `keteranganfoto`
-- 

CREATE TABLE `keteranganfoto` (
  `file` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `wahana` varchar(30) NOT NULL,
  UNIQUE KEY `file` (`file`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `keteranganfoto`
-- 

INSERT INTO `keteranganfoto` VALUES ('wendit 1.jpg', 'Merupakan Pintu utama untuk menuju ke kolam renang dan water Boom di area\r\nlokasi wisata wendit', 'Pintu Masuk Water Park');
INSERT INTO `keteranganfoto` VALUES ('sengkaling', 'asasasas', '');
INSERT INTO `keteranganfoto` VALUES ('sengkaling 1.jpg', 'Pintu utama waktu memasuki Taman Rekreasi Sengkaling', 'Pintu Masuk Taman Rekreasi Sen');
INSERT INTO `keteranganfoto` VALUES ('sengkaling 10.jpg', 'Anak anda pasti akan suka untuk menaiki wahana yang satu ini, kendaraan\r\nini di model seperti kereta api mini yang dapat dijalankan pengendaranya', 'Train');
INSERT INTO `keteranganfoto` VALUES ('sengkaling 2.jpg', 'Cobalah untuk memasuki wahana dunia ikan ini dan setelah keluar dari wahana\r\nini anda dan keluarga anda akan mendapatkan wawasan tentang jenis ikan\r\nyang ada di sekitar laut', 'Dunia Ikan');
INSERT INTO `keteranganfoto` VALUES ('sengkaling 3.jpg', 'Bagi anda yang ingin memacu adrenalin dan menyukai ketinggian\r\ntak ada salahnya untuk mencoba wahana ini', 'Flying Fox');
INSERT INTO `keteranganfoto` VALUES ('sengkaling 4.jpg', 'Bagi penyuka olahraga otomotif, di Sengkaling juga tersedia sirkuit yang dapat\r\ndigunakan untuk mencoba balapan menggunakan gokart, drag race atau mencoba\r\nkeahlian berkendara dengan mencoba mengikuti slalom.', 'Arena Gokart');
INSERT INTO `keteranganfoto` VALUES ('sengkaling 5.jpg', 'Anda bisa berkeliling dan menikmati indahnya danau buatan ini dengan\r\nsepeda air yang di sewakan dengan harga murah ', 'Sepeda');
INSERT INTO `keteranganfoto` VALUES ('sengkaling 6.jpg', 'Taman rekreasi Sengkaling dilengkapi dengan kolam renang standar internasional.\r\nSebagaimana tempat rekreasi keluarga, tempat ini juga terdapat kolam khusus\r\nuntuk anak-anak. Semua kolam renang di tempat Rekreasi Sengkaling diisi dengan\r\nair sumber yang jernih dan menyegarkan.', 'Kolam Renang');
INSERT INTO `keteranganfoto` VALUES ('sengkaling 7.jpg', 'Bagi yang suka tantangan tentang dunia hantu coba dulu wahana kapal misteri ini,\r\nanda akan di suguhi hantu-hantu yang sangat menyeramkan.', 'Kapal Misteri');
INSERT INTO `keteranganfoto` VALUES ('sengkaling 8.jpg', 'Wahana bermain untuk anak-anak dalam mengendarai mobil', 'Bom-bom Car');
INSERT INTO `keteranganfoto` VALUES ('sengkaling 9.jpg', 'Bagi penJika naik wahana ini anda akan merasakan seakan naik kuda beneran', 'Naik Kuda');
INSERT INTO `keteranganfoto` VALUES ('wendit 2.jpg', 'Air dalam kolam renang ini merupakan sumber alami langsung yang sumbernya\r\nada di bawah permukaan kolam renang yang berpasir dan terdapat banyak\r\nsumber-sumber air yang yang muncul', 'Kolam Renang');
INSERT INTO `keteranganfoto` VALUES ('wendit 3.jpg', 'Kolam renang dan area bermain anak-anak yang ingin tumpahan air dengan\r\nsangat banyak sehingga menggelegar seperti bom', 'Water Boom');
INSERT INTO `keteranganfoto` VALUES ('wendit 4.jpg', 'Dengan membayar @Rp.3000 anda akan dipuaskan berkaliling kolam yang ada\r\ndi lokasi wisata wendit', 'Wisata Perahu');
INSERT INTO `keteranganfoto` VALUES ('wendit 5.jpg', 'Satwa endemik Jawa ini hidup bebas di taman wisata yang berlokasi tak jauh\r\ndari pusat Kota Malang ini, tempat ini juga dijadikan lokasi konservasi Kera Jawa ', 'Kera Jawa');
INSERT INTO `keteranganfoto` VALUES ('Tlogomas 1.jpg', 'Kolam renang ini mempunyai kedalaman hingga 220 CM jadi pengunjung bisa\r\nmelakukan aktifitas renang dengan leluasa', 'Kolam Renang Dewasa');
INSERT INTO `keteranganfoto` VALUES ('tirta nirwana 1.jpg', 'Kebun ini dilengkapi tempat kongkow. Dari kebun ini anda juga bisa melihat\r\npanorama pegunungan sekitar dan menghirup udara sejuk\r\n', 'Kebun Wisata');
INSERT INTO `keteranganfoto` VALUES ('tirta nirwana 2.jpg', 'Putra-putri anda bisa langsung berenang di kolam khusus bagi anak-anak.\r\nTidak perlu khawatir, di kolam renang ini putra-putri anda akan aman.\r\nAnda cukup mengawasinya dari kejauhan. Kolam renang ini didesain sedemikian\r\nrupa sehingga sangat nyaman dan aman untuk anak-anak\r\n', 'Kolam Renang');
INSERT INTO `keteranganfoto` VALUES ('tirta nirwana 3.jpg', 'Jembatan ini ada di area kebun taman wisata tirta nirwana untuk menyebrangi\r\nkolam buatan di area kebun wisata', 'Jembatan');
INSERT INTO `keteranganfoto` VALUES ('tirta nirwana 4.jpg', 'Ada banyak patung-patung yang ada di kebun wisata diantaranya adalah patung\r\nhewan yang bentuknya sangat menyerupai hewan aslinya', 'Patung Hewan');
INSERT INTO `keteranganfoto` VALUES ('tirta nirwana 5.jpg', 'Disamping patung hewan ada juga patung-patung buah yang dapat digunakan\r\nuntuk berfoto', 'Patung Buah');
INSERT INTO `keteranganfoto` VALUES ('senaputra 1.jpg', 'Ketika mau memasuki area wisata ini terdapet sebuah monumen dan patung,\r\nlokasi wisata yang berada di tengah kota akn sangat mudah di jangkau', 'Depan Pintu Masuk');
INSERT INTO `keteranganfoto` VALUES ('senaputra 2.jpg', 'Terdapat beberapa tempat main untuk anak-anak yang bisa di gunakan dengan baik\r\nmeskipun sebagian kondisinya ga terawat', 'Berbagai');
INSERT INTO `keteranganfoto` VALUES ('', '', '');
INSERT INTO `keteranganfoto` VALUES ('senaputra.jpg', '', '');
INSERT INTO `keteranganfoto` VALUES ('selecta 1.jpg', 'Tulisan kata SELECTA diatas adalah kumpulan dari bunga yang di bentuk\r\nmenjadi huruf-huruf', 'Taman Selecta');
INSERT INTO `keteranganfoto` VALUES ('selecta 2.jpg', 'Kolam renang yang ada di Selecta ada 3 kolam mulai kolam untuk anak-anak\r\nhingga untuk dewasa', 'Kolam Renang');
INSERT INTO `keteranganfoto` VALUES ('selecta 3.jpg', 'Nikmati wisata sepeda air ini untuk berkeliling mengitari kolam', 'Sepeda Air');
INSERT INTO `keteranganfoto` VALUES ('selecta 4.jpg', 'Di tempat rekreasi Selecta terdapat kolam ikan yang terdiri dari beberapa\r\njenis ikan yang hidup di air tawar', 'Kolam Ikan');
INSERT INTO `keteranganfoto` VALUES ('selecta 5.jpg', 'Untuk anak-anak tersedia bebrapa tempat main yang dapat digunakan di area\r\nwisata ini', 'Tempat Bermain Anak');
INSERT INTO `keteranganfoto` VALUES ('selecta 6.jpg', 'Terdapat banyak jenis bunga yang ada di taman ini yang kelihatan begitu indah\r\ndan terjaga dengan baik', 'Taman Bunga');
INSERT INTO `keteranganfoto` VALUES ('selecta 7.jpg', 'Untuk yang ingin memacu adrenalin coba wahana flying fox yang ada di area taman\r\nselecta ini, anda akan merasakan serasa terbang di atas hamparan kebun bunga', 'Flying Fox');
INSERT INTO `keteranganfoto` VALUES ('selecta 8.jpg', 'Rasanya belum lengkap kalau meninggalkan lokasi wisata tanpa ada oleh-oleh,\r\ndi pinggir area wisata ini ada pasar yang menawarkan berbagai souvenir dan\r\noleh-oleh khas Wisata Selecta dan kota Batu', 'Pasar Wisata');
INSERT INTO `keteranganfoto` VALUES ('tlogomas 2.jpg', 'Disamping kolam renang untuk dewasa di lokasi wisata ini juga menyediakan\r\nkolam renang khusus untuk anak-anak', 'Kolam Renang Anak-anak');
INSERT INTO `keteranganfoto` VALUES ('tlogomas 3.jpg', 'Di kolam renang dewasa ada perosotan yang bisa digunakan dengan baik', 'Seluncur Air');
INSERT INTO `keteranganfoto` VALUES ('tlogomas 4.jpg', 'Anda bisa berkeliling dan menikmati indahnya danau buatan ini dengan sepeda\r\nair yang di sewakan dengan harga murah', 'Sepeda Air');
INSERT INTO `keteranganfoto` VALUES ('tlogomas 5.jpg', 'Terdapat kolam ikan, jika ingin memegang ikan cukup dengan kocok-kocokkan\r\ntangan anda di permukaan air maka ikan-ikan akan menghampiri tangan dengan\r\nsendirinya', 'Kolam Ikan');
INSERT INTO `keteranganfoto` VALUES ('paralayang 1.jpg', 'Ketika kita sampai di lokasi paralayang ini maka kita bisa melihat kota Batu dan\r\nMalang yang berada di bawah lokasi ini', 'Lokasi Paralayang');
INSERT INTO `keteranganfoto` VALUES ('paralayang 2.jpg', 'Sebaiknya setelah di lokasi ini anda mencoba serunya paralayang dan di jamin\r\nanda akan puas untuk olahraga yang satu ini', 'Persiapan Lepas Landas');
INSERT INTO `keteranganfoto` VALUES ('paralayang 3.jpg', 'Ketika sudah lepas landas dan terbang anda bisa menikmati untuk melihat kota\r\ndari ketinggian', 'Mengudara');
INSERT INTO `keteranganfoto` VALUES ('sendang biru 1.jpg', 'Air laut yang ada di sekitar area wisata terkenal sangat jernih', 'Air Laut');
INSERT INTO `keteranganfoto` VALUES ('sendang biru 2.jpg', 'Pantai Sendangbiru juga dikenal sebagai tempat pendaratan ikan serta tempat\r\npelelangan ikan Kabupaten Malang\r\n', 'Pendaratan Kapal Nelayan');
INSERT INTO `keteranganfoto` VALUES ('sendang biru 3.jpg', 'Cagar Alam yang berdanau tawar penuh ikan lele di tengah hutannya. Pantai ini\r\ndinamakan Pantai Sendang Biru biru karena di pantai ini ada sumber air atau\r\nyang lebih dikenal dalam bahasa Jawa Sendang yang berwarna biru.', 'Danau Air Tawar');
INSERT INTO `keteranganfoto` VALUES ('ngliyep 1.jpg', 'Pantai Ngliyep merupakan perpaduan dari tebing curam yang masih dengan hutan\r\nlindung dan hamparan pasir putih disela-selanya serta deburan ombak yang setiap\r\nsaat menerpa tebing-tebing terjal di tepian pantai', 'Deburan Ombak');
INSERT INTO `keteranganfoto` VALUES ('ngliyep 2.jpg', 'Dengan adanya pasir putih ini kita dapat melakukan aktifitas yaitu membuat patung\r\ndengan pasir yang halus', 'Pasir Putih');
INSERT INTO `keteranganfoto` VALUES ('ngliyep 3.jpg', 'Beristirahat sambil menyaksikan pesona senja dapat dinikmati dari Gunung\r\nKombang, sebuah pulau kecil yang menjorok ke laut.', 'Waktu Senja');
INSERT INTO `keteranganfoto` VALUES ('museum brawijaya 1.jpg', 'Simbol ini berada di luar lokasi area museum brawijaya dan dekat dengan jalan di\r\nkawasan jalan Ijen', 'Simbol Depan Museum');
INSERT INTO `keteranganfoto` VALUES ('museum brawijaya 2.jpg', 'Meriam ini di gunakan pada waktu perang jaman dulu', 'Meriam Kuno');
INSERT INTO `keteranganfoto` VALUES ('museum brawijaya 3.jpg', 'Memang dulu telekomunikasi belum secanggih sekarang tapi meskipun begitu\r\njaman dulu juga ada alat telekomunikasi yang di gunakan dalam berperang', 'Telekomunikasi Tempo Dulu');
INSERT INTO `keteranganfoto` VALUES ('museum brawijaya 4.jpg', 'Komputer ini di gunakan pada waktu perang jaman dulu', 'Komputer Jadul');
INSERT INTO `keteranganfoto` VALUES ('museum brawijaya 5.jpg', 'Senapan ini di gunakan berperang untuk mempertahankan kedaulatan Indonesia', 'Komputer ini di gunakan pada w');
INSERT INTO `keteranganfoto` VALUES ('museum brawijaya 6.jpg', 'Foto-foto yang mengisahkan suasana perang dahulu', 'Foto Perang');
INSERT INTO `keteranganfoto` VALUES ('museum brawijaya 7.jpg', 'Mobil sedan di atas merupakan buatan pabrik DE SOTO USA', 'Koleksi Mobil Jadul');
INSERT INTO `keteranganfoto` VALUES ('kebun teh 1.jpg', 'Dari kejauhan hamparan kebun teh yang sangat luas dan indah di pandang', 'Tampak dari Jauh');
INSERT INTO `keteranganfoto` VALUES ('kebun teh 2.jpg', 'Banyaknya tanaman Teh dan hijaunya dau-daun disini mengundang daya tarik\r\nyang mempesona bagi para pengunjung', 'Hamparan Kebun Teh');
INSERT INTO `keteranganfoto` VALUES ('kebun teh 3.jpg', 'Menikmati indahnya kebun Teh disini bisa dengan jalan kaki atau menggunakan\r\nkendaraan sepeda motor atau mobil', 'Jalan di Area Perkebunan');
INSERT INTO `keteranganfoto` VALUES ('kebun teh 4.jpg', 'Kereta api mini ini di sediakan bagi pengunjung untuk mengitari area perkebunan', 'Kereta Api Mini');
INSERT INTO `keteranganfoto` VALUES ('kebun teh 5.jpg', 'Tempat bersantai sejenak menikmati hamparan kebun teh sambil menikmati\r\nberbagai hidangan dari teh', 'Tempat Bersantai');
INSERT INTO `keteranganfoto` VALUES ('karangkates 1.jpg', 'Di gunakan sebagai bendungan dan mengatur keluarnya air yang di alirkan', 'Dam Karangkates');
INSERT INTO `keteranganfoto` VALUES ('karangkates 2.jpg', 'Di area bendungan terdapat beberapa permainan air seperti banana boat yang\r\ndapat di nikmati pengunjung, dalam 1 banana boat dapat di naiki 3 orang', 'Banana Boat');
INSERT INTO `keteranganfoto` VALUES ('karangkates 3.jpg', 'Bagi anda yang suka kebut-kebutan coba rasakan kebut-kebutan di air dengan\r\nmenyetir jet sky yang ada di wisata karangkates ini', 'Jet Sky');
INSERT INTO `keteranganfoto` VALUES ('karangkates 4.jpg', 'Untuk yang ingin memacu adrenalin coba wahana flying fox yang ada di sebelah\r\ndanau buatan ini, nikmati ketinggian di atas kolam yang indah', 'Flying Fox');
INSERT INTO `keteranganfoto` VALUES ('jatim park 1.jpg', 'Pengen coba mengendarai Boat dengan aman dan asyik! Di Jatim Park kalian bisa\r\ntemukan wahana yang satu ini, jangan takut tenggelam karena Bumber Boat ini\r\ndirancang khusus untuk adik-adik dan pastinya aman buat kalian semua.', 'Bumper Boat');
INSERT INTO `keteranganfoto` VALUES ('jatim park 10.jpg', 'Manjakan diri anda dengan merdunya kicauan berbagai jenis burung dari\r\nbelahan dunia. Nikmati pula keunikan tingkah laku dan indahnya warna warni\r\ntubuh mereka. Taman ini memiliki 400 ekor burung yang terdiri dari 103 spesies.', 'Taman Burung');
INSERT INTO `keteranganfoto` VALUES ('jatim park 11.jpg', 'Ketahuilah berbagai informasi tentang berbagai spesies reptil di taman ini!\r\njumpai 170 ekor reptil yang terdiri dari 182 spesies (dari 170 ekor), yang\r\nterdiri dari Golongan ular, Golongan non ular (Buaya, biawak, komodo, kadal,\r\ncicak, tokek, kura-kura), satwa eksotik 98% dan satwa lokalnya. Sempatkanlah\r\njuga berfoto bersama ular Phiton.', 'Taman Reptil');
INSERT INTO `keteranganfoto` VALUES ('jatim park 12.jpg', 'Gelitik perut anda dengan wahana yang satu ini! Bayangkan bagaimana serunya\r\nduduk diatas ketinggian 10 meter sembil meluncur lepas kebawah secara\r\nvertikal dengan kecepatan yang menakjubkan.', 'Drop Zone');
INSERT INTO `keteranganfoto` VALUES ('jatim park 13.jpg', 'Jangan berani masuk kalau takut tersesat ! Ditaman sesat ini kalian ditantang\r\nuntuk bisa menemukan jalan keluar dengan menggunakan petunjuk-petunjuk\r\nyang ada, jadi jangan sampai tersesat ya...', 'Taman Sesat');
INSERT INTO `keteranganfoto` VALUES ('jatim park 14.jpg', 'Ingat yang dirumah menunggu oleh-oleh dari Jatim Park! Belum lengkap rasanya\r\njika pulang dengan tangan hampa tanpa oleh-oleh dari Jawa Timur Park.\r\nHadiahi keluarga anda dengan berbagai produk dari Pasar Wisata Jatim Park.\r\nBerbagai kerajinan tangan, buah, sayur, produk makanan dan hewan peliharaan,\r\nbisa anda beli di sini dengan kualitas yang baik dan harga yang terjangkau', 'Pasar Wisata');
INSERT INTO `keteranganfoto` VALUES ('jatim park 2.jpg', 'Jangan cuma lihat saja! Ayo ajak keluarga dan teman kamu untuk seru-seruan di\r\nwahana Bumper Car. Injak pedal gasnya, berbelok, dan melaju dengan kencang.\r\nAwas jangan sampai bertabrakan ya! Buat adik-adik jangan lupa pakai Seat Belt.', 'Bumper Car');
INSERT INTO `keteranganfoto` VALUES ('jatim park 3.jpg', 'Rasakan serunya meluncur dengan Jet Coaster dan berputar-putar dengan\r\nkecepatan 40-50 km/jam di atas punggung naga. Jet Coaster ini di tangani oleh\r\npara tenaga ahli dengan sistim keamanan yang memadai. Tunggu apa lagi?\r\nAyo coba sekarang juga!', 'Jet Coaster');
INSERT INTO `keteranganfoto` VALUES ('jatim park 4.jpg', 'Dilihat aja seru! Apalagi dicoba?? Wahana andalan Jawa Timur Park yang satu ini\r\nakan memberikan kamu sensasi yang tidak pernah bisa kamu lupakan.Rasakan\r\nserunya berayun dan berputar 360'' di atas udara dengan ketinggian 13 meter.\r\nTidak perlu khawatir, karena wahana ini dijalankan dan diawasi oleh teknisi yang\r\nberpengalaman, serta di dukung oleh keamanan yang berstandard international.\r\nAyo tunggu apa lagi?', 'Flying Tornado');
INSERT INTO `keteranganfoto` VALUES ('jatim park 5.jpg', 'Cobalah meluncur didalam pipa ini! Kolam yang satu ini dapat diniknmati oleh\r\nremaja dan orang dewasa karena memiliki kedalaman 130 cm. nikmati juga\r\nasyiknya bermain voli dan basket air.', 'Water Boom');
INSERT INTO `keteranganfoto` VALUES ('jatim park 6.jpg', 'Segarkan tubuh putra putri anda di wahana yang satu ini ! biarkan mereka\r\nbermain air, mencoba serunya meluncur di Seluncur buaya, dan bermain\r\nTrampolin air sepuasnya, tak perlu khawatir, karena kolam anak ini hanya\r\nmemiliki kedalaman 40 cm dan diawasi oleh pool guard yang siap membantu.\r\nRasakan sensasi guyuran air yang jatuh dari tong raksasa yang ada di kolam ini.', 'Kolam Anak');
INSERT INTO `keteranganfoto` VALUES ('jatim park 7.jpg', 'Ayo uji keberanian kamu! Masuki lorong-lorong gelap yang mencekam, temui\r\nberbagai macam kejutan yang membuat bulu kuduk kamu merinding.\r\nAjak teman-teman kamu, biar lebih seru !', 'Rumah Hantu');
INSERT INTO `keteranganfoto` VALUES ('jatim park 8.jpg', 'Menikmati pemandangan sambil menguji adrenalin? Spining Coaster jawabnya!\r\nYa, wahana yang satu ini bisa berjalan, meluncur dan berputar pada ketinggian\r\n20 meter. Nikmati indahnya panorama gunung Panderman pada saat wahana ini\r\nmencapai titik puncak, dan rasakan pula serunya wahana ini pada saat\r\nmeluncur ke bawah dengan kecepatan 40 km per jam. Tak perlu kawatir, karena\r\nwahana ini dilengkapi dengan seat belt dan pengaman kaki yang siap melindungi.', 'Spinning Coaster');
INSERT INTO `keteranganfoto` VALUES ('jatim park 9.jpg', 'Di area seluas 600 M anda akan dimanjakan dengan berbagai macam jenis ikan.\r\nTerdapat 75 species ikan dari berbagai belahan dunia yang terbagi atas 25 jenis\r\nair tawar dan 12 jenis air laut, ada pula Arapaima Gigas yang berumur ratusan\r\ntahun dengan panjang 1,7 meter. Selain itu saksikan pertunjukan memberi makan\r\nikan piranha yang kami hadirkan setiap hari minggu dan rabu.', 'Taman Ikan');
INSERT INTO `keteranganfoto` VALUES ('segara anakan 1.jpg', 'Segara Anakan, danau kecil di dataran pasir pulau sempu merupakan pantai\r\nberbahasakan keindahan, bermajaskan natural serta berkiasan keagungan Tuhan.', 'Masuk Danau');
INSERT INTO `keteranganfoto` VALUES ('segara anakan 2.jpg', 'Pasir putih di danau segara anakan ini sangat lembut dan sangat bersih ', 'Pasir Putih');
INSERT INTO `keteranganfoto` VALUES ('segara anakan 3.jpg', 'di sebelah selatan danau ini, terdapat terowongan yang tembus langsung ke pantai\r\nselatan ( samudera hindia) dan terowongan ini yang mengisi air laut di danau\r\nSegara Anakan sehingga bisa terjadi pasang surut.', 'Laguna');
INSERT INTO `keteranganfoto` VALUES ('segara anakan 4.jpg', 'Tempat menginap satu-satunya di danau segara anakan ini adalah berkemah, jadi\r\nsebelum berangkat siapkan perlengkapan kemah dan kebutuhan untuk konsumsi\r\nanda. Ingat kalau anda membawa benda seperti plastik, botol-botol minuman dan\r\nbenda-benda lain yang di anggap bisa mengotori lokasi maka sebaiknya waktu\r\nbalik anda membawanya juga jika tidak ingin kena sanksi, ini dilakukan untuk\r\nmenjaga kebersuhan dan ke alamian danau', 'Perkemahan');
INSERT INTO `keteranganfoto` VALUES ('coban talun 1.jpg', 'Dari lokasi parkiran, diperlukan jalan kaki kurang lebih 1 km, melintasi hutan\r\ndan sungai yang ternyata merupakan bagian atas dari air terjun. Air terjun itu\r\nsendiri terletak didasar tebing sungai dan untuk mencapainya harus melewati\r\nsebuah jalan tanah berkelok-kelok disisi tebing.', 'Air Terjun dari Kejauhan');
INSERT INTO `keteranganfoto` VALUES ('coban talun 2.jpg', 'Derasnya aliran dan indahnya air terjun serasa terobati perjalanan yang melelahkan', 'Air Terjun Tampak Dekat');
INSERT INTO `keteranganfoto` VALUES ('coban rondo 1.jpg', 'Konon nama dari air terjun ini memiliki historial tersendiri', 'Air Terjun Coban Rondo');
INSERT INTO `keteranganfoto` VALUES ('coban rondo 2.jpg', 'Air yang mengalir yang berasal dari sumber air terjun ini sangat dingin dan sejuk\r\nkebanyakan pengunjung menggunakannya untuk membasuh muka', 'Aliran Dari Air Terjun');
INSERT INTO `keteranganfoto` VALUES ('coban rondo 3.jpg', 'Selain indahnya air terjun di wisata ini ada pula tempat untuk melakukan\r\nkegiatan-kegiatan Outdoor', 'Kegiatan Outdoor');
INSERT INTO `keteranganfoto` VALUES ('coban rondo 4.jpg', 'Karena suhu udara yang sejuk di tempat ini maka banyak pengunjung yang\r\nmelakukan perkemahan di tempat ini, biasanya yang sering menggunakan bumi\r\nperkemahan ini adalah dari sekolah-sekolah SMA atau SMP', 'Bumi Perkemahan');
INSERT INTO `keteranganfoto` VALUES ('cangar 1.jpg', 'Pemandian air panas cangar ini berada di hutan daerah dataran tnggi kota Batu\r\nyang berbatasan dengan Pacet, Kabupaten Mojokerto', 'Depan Lokasi Pemandian');
INSERT INTO `keteranganfoto` VALUES ('cangar 2.jpg', 'Meskipun merupakan area pemandian tetapi wisata pemandian cangar tidak\r\nmelupakan keindahan taman yang berada disekitar area pemandian', 'Taman Wisata');
INSERT INTO `keteranganfoto` VALUES ('cangar 3.jpg', 'Kolam ini merupakan aliran pertama dari sumber air panas jadi waktu di kolam\r\nini airnya akan terasa panas dan baik untuk mngobati penyakit kulit', 'Kolam Sumber Air Panas');
INSERT INTO `keteranganfoto` VALUES ('cangar 4.jpg', 'Disamping kolam sumber air panas adapula kolam renang, air dari kolam renang\r\nini merupakan aliran dari kolam utama sumber air panas jadi air di kolam renang\r\nini suhunya lebih dingin daripada yang di kolam utama', 'Kolam Renang');
INSERT INTO `keteranganfoto` VALUES ('bns 1.jpg', 'Pemandangan malam hari di depan pintu masuk BNS', 'Pintu Masuk BNS');
INSERT INTO `keteranganfoto` VALUES ('bns 10.jpg', 'Nikmati serunya naik mobil mini yang meluncur dengan cepat', 'BomBom Car');
INSERT INTO `keteranganfoto` VALUES ('bns 2.jpg', 'Sosok binatang seperti Naga yang ganas yang terbentuk dari lampu-lampu', 'Dragon Fly');
INSERT INTO `keteranganfoto` VALUES ('bns 3.jpg', 'Sosok binatang seperti burung raksasa yang terbuat dari lampion', 'Kunam');
INSERT INTO `keteranganfoto` VALUES ('bns 4.jpg', 'Karena tempat wisata ini bukanya mulai pukul 15.00 maka di waktu siang\r\nhari keadaan wahana masih sepi tanpa pengunjung', 'Suasana Wana Waktu Siang Hari');
INSERT INTO `keteranganfoto` VALUES ('bns 5.jpg', 'Ini adalah pintu masuk untuk wahana lampion yang ada di BNS, di dalamnya\r\nterdapat beberapa lampu-lampu lampion yang bentuknya sangat menarik', 'Pintu Masuk Lampion Garden');
INSERT INTO `keteranganfoto` VALUES ('bns 6.jpg', 'Banyaknya lampion mulai dari bentuk hewan sampai bunga dan bentuk-bentuk\r\nyang lainnya membuat semua orang terpesona akan keindahan wahana ini', 'Lampion Garden');
INSERT INTO `keteranganfoto` VALUES ('bns 7.jpg', 'Silahkan anda mencoba wahana ini dan rasakan sekali masuk anda akan\r\ndi bingungkan dengan bayangan diri anda sendiri.', 'Rumah Kaca');
INSERT INTO `keteranganfoto` VALUES ('bns 8.jpg', 'Coba rasakan wahana yg berbentuk mirip kincir angin ini. Bagi anda yg\r\nnaik wahana ini akan dikocok2 perut anda.', 'Kincir Angin');
INSERT INTO `keteranganfoto` VALUES ('bns 9.jpg', 'Bagi penyuka olahraga otomotif, di BNS juga tersedia sirkuit yang dapat\r\ndigunakan untuk mencoba balapan menggunakan gokart, drag race atau mencoba\r\nkeahlian berkendara dengan mencoba mengikuti slalom.', 'Arena Gokart');
INSERT INTO `keteranganfoto` VALUES ('balekambang 1.jpg', 'Merupakan tempat peribadatan umat hindu yang ada di pantai balekambang\r\ntempat ini hampir mirip pura yang ada di Tanah Lot, Bali', 'Pura');
INSERT INTO `keteranganfoto` VALUES ('balekambang 2.jpg', 'Jembatan ini di gunakan untuk menuju ke Pura karena lokasi Pura yang ada di atas\r\nair laut tetapi kalau air laut sedang surut bisa jalan kaki lewat pasir-pasir yang ada\r\ndi tepi pantai', 'Jembatan Menuju Pura');
INSERT INTO `keteranganfoto` VALUES ('balekambang 3.jpg', 'Melihat indahnya mentari di pagi hari yang begitu tenang dengan deburan ombak\r\nlaut selatan ', 'Sun Rise');
INSERT INTO `keteranganfoto` VALUES ('balekambang 4.jpg', 'Indahnya pasir putih balekambang yang bersih menambah cantiknya wisata ini.\r\nPasir putih ini terdapat hampir di seluruh tepi pantai wisata balekambang', 'Pasir Putih');
INSERT INTO `keteranganfoto` VALUES ('alun-alun 1.jpg', 'Dijadikan penanda untuk tempat yang berada di tengah-tengah jantung kota', 'Monumen Alun-Alun');
INSERT INTO `keteranganfoto` VALUES ('alun-alun 2.jpg', 'Meskipun berada di tengah kota tetapi jika memasuki area alun-alun akan terasa\r\nsejuk karena banyak pohon-pohon yang terawat dengan baik jadi tepat jika\r\ntempat ini jadi tempat kumpul keluarga', 'Halaman Alun-alun');
INSERT INTO `keteranganfoto` VALUES ('alun-alun 3.jpg', 'Lokasi masjid yang tidak jauh dari alun-alun membuat orang yang ingin beribadah\r\ntidak kesulitan mencari tempat ibadah untuk melaksanakan sholat', 'Masjid Jami''');
INSERT INTO `keteranganfoto` VALUES ('alun-alun 4.jpg', 'Di alun-alun ini kita akan menemui banyak burung merpati yang berterbangan\r\nkarena populasi burung merpati disini di jaga keberadaannya', 'Banyak Merpati');

-- --------------------------------------------------------

-- 
-- Table structure for table `penginapan`
-- 

CREATE TABLE `penginapan` (
  `id` int(4) NOT NULL auto_increment,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telpon` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `tag` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

-- 
-- Dumping data for table `penginapan`
-- 

INSERT INTO `penginapan` VALUES (1, 'Hotel THE GRAND PALACE', 'Jl. Ade Irma Suryani 23 Malang', '0341-332900', 'Kelas Bintang', 'Bintang');
INSERT INTO `penginapan` VALUES (2, 'Hotel Pelangi', 'Jl. Merdeka Selatan 3 Malang', '0341 - 365156', 'Kelas : Bintang', 'Bintang');
INSERT INTO `penginapan` VALUES (3, 'Hotel Santosa', 'Jl. K.H. Agus Salim 24 Malang', '0341 - 366889 ', 'Kelas : Melati', 'Melati');
INSERT INTO `penginapan` VALUES (5, 'Villa Kota Batu', 'Jl. Abdul Gani Atas Kav.12 Kota Wisata Batu ', '0341-596047', 'Tarif :\r\n* Hari biasa harga istimewa : Rp. 500.000, Permalam\r\n* Weekend / Hari Besar : Rp. 750.000, Permalam\r\n* Lebaran / Tahun Baru : Rp. 1.000.000, Permalam', 'Villa');
INSERT INTO `penginapan` VALUES (6, 'Hotel Surya Indah', 'Jl. Oro-Oro Ombo 202', '(0341) 568098', 'Kelas : Bintang 1', 'Bintang');
INSERT INTO `penginapan` VALUES (7, 'Pondok Jatim Park', 'Jl. Imam Bonjol Atas 53', '(0341) 591666', 'Kelas : Bintang 1', 'Bintang');
INSERT INTO `penginapan` VALUES (8, 'Hotel Selecta', 'Jl. Raya Selecta Tulungrejo, Kota Batu', '0341 - 592369 ', 'Kelas : Melati', 'Melati');
INSERT INTO `penginapan` VALUES (9, 'Hotel Wijaya Kartika', 'Jl. Panglima Sudirman 127 Pesanggrahan, Kota Batu', '0341 - 592600 ', 'Kelas : Bintang', 'Bintang');
INSERT INTO `penginapan` VALUES (10, 'Hotel Victory', 'Jl. Raya Junggo 107 Batu', '0341-592985', 'Kelas : Melati', 'Melati');
INSERT INTO `penginapan` VALUES (11, 'Villa Nova', 'Jl.Raya songgoriti, kota Batu', '08123368731', 'Tarif :\r\nTYPE A : (3 kmr 4 bed kamar mandi dalam, TV, dapur, ruang Tamu) Rp 600.000,\r\nTYPE B : (2 kamar, 1 kamar mandi, dapur, TV, Ruang Tamu) Rp 350.000,\r\nTYPE C : (1 kmr, ruang tamu, 1 kmr mandi dlm, TV) Rp 250.000,\r\nTYPE D, E, F : (3 kamar, 1 kamar mandi, dapur, ruang tamu, TV) Rp 500.000,\r\nTYPE G : (3 kamar 4 bed, ruang tamu, 1 kamar mandi, TV) Rp 600.000,', 'Villa');
INSERT INTO `penginapan` VALUES (12, 'Hotel Songgoriti', 'Jl.Raya songgoriti 51, kota Batu', '0341-593555', 'Tarif :\r\nWijaya Kusuma (Cottage) : Rp. 600.000,-\r\nCempaka : Rp. 350.000,-\r\nAnggrek : Rp. 220.000,-\r\nTeratai : Rp. 200.000,-\r\nKenanga : Rp. 175.000,-\r\nMawar : Rp. 150.000,-', 'Bintang');
INSERT INTO `penginapan` VALUES (13, 'Villa Kebun Teh', 'Area lokasi kebun teh', '', 'Villa', '');
INSERT INTO `penginapan` VALUES (14, 'Hotel Santana', 'Jalan Anjasmoro 37 Kepanjen, Malang,', '0341 - 393530', 'Kelas : Melati', 'Melati');
INSERT INTO `penginapan` VALUES (15, 'Hotel Armi', 'Jl. Kaliurang 63 Malang', '0341 - 362178', 'Kelas : Melati', 'Melati');
INSERT INTO `penginapan` VALUES (16, 'Hotel Pajajaran Park', 'Jl. Letjend. Sutoyo 178 Malang', '341-491347 ', 'Kelas : Melati', 'Melati');
INSERT INTO `penginapan` VALUES (17, 'Peye Guest House', 'Jl. Simpang Dieng No.1 Malang Bara', '0341 - 561642 ', 'Kelas : Melati', 'Melati');
INSERT INTO `penginapan` VALUES (19, 'Hotel UMM Inn', 'Jl. Raya Sengkaling no 1. Dau Kabupaten Malang', '0341- 468692', 'Tarif :\r\nType Standard Rp. 185.000\r\nType Superior Rp. 230.000\r\nType Deluxe Rp. Rp. 300.000\r\nType Suites Rp. 425.000', 'Bintang');
INSERT INTO `penginapan` VALUES (20, 'Hotel Montana II', 'Jl. Candi Panggung 2 Malang', '0341 - 495885', 'Kelas : Bintang', 'Bintang');
INSERT INTO `penginapan` VALUES (21, 'Hotel Montana I', 'Jl. Kahuripan 9 Malang', '0341 - 328370', 'Kelas : Melati', 'Melati');
INSERT INTO `penginapan` VALUES (4, 'Hotel Splendid Inn', 'Jl. Majapahit 2 - 4 Malang', '0341 - 366860 ', 'Kelas : Bintang', 'Bintang');
INSERT INTO `penginapan` VALUES (22, 'Hotel Kahuripan', 'Jl. Kahuripan 11 - 15 Malang', '0341 - 350426 ', 'Kelas : Melati', 'Melati');
INSERT INTO `penginapan` VALUES (23, 'Hotel Arjosari', 'Jl. Raden Intan No.49 Malang Utara/Blimbing', '0341 - 409429', 'Kelas : Melati', 'Melati');
INSERT INTO `penginapan` VALUES (18, 'Hotel Tirto', 'Jl. Simpang Panji Suroso 133 Malang Utara, Blimbin', '0341 486104', 'Kelas : Bintang', 'Bintang');

-- --------------------------------------------------------

-- 
-- Table structure for table `poling`
-- 

CREATE TABLE `poling` (
  `id_poling` int(5) NOT NULL auto_increment,
  `pilihan` varchar(100) collate latin1_general_ci NOT NULL,
  `rating` int(5) NOT NULL,
  `aktif` enum('Y','N') collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id_poling`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=12 ;

-- 
-- Dumping data for table `poling`
-- 

INSERT INTO `poling` VALUES (11, 'Amat Baik', 1, 'Y');
INSERT INTO `poling` VALUES (10, 'Baik', 5, 'Y');
INSERT INTO `poling` VALUES (9, 'Cukup', 1, 'Y');
INSERT INTO `poling` VALUES (8, 'Kurang', 1, 'Y');

-- --------------------------------------------------------

-- 
-- Table structure for table `shoutbox`
-- 

CREATE TABLE `shoutbox` (
  `id_shoutbox` int(5) NOT NULL auto_increment,
  `nama` varchar(100) collate latin1_general_ci NOT NULL,
  `website` varchar(50) collate latin1_general_ci NOT NULL,
  `pesan` text collate latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `aktif` enum('Y','N') collate latin1_general_ci NOT NULL default 'Y',
  PRIMARY KEY  (`id_shoutbox`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=21 ;

-- 
-- Dumping data for table `shoutbox`
-- 

INSERT INTO `shoutbox` VALUES (20, 'rifai', '', 'hallo jg;-D', '2010-10-16', '00:00:00', 'Y');
INSERT INTO `shoutbox` VALUES (18, 'halim', '', 'Halow..smw....:D', '2010-10-16', '00:00:00', 'Y');

-- --------------------------------------------------------

-- 
-- Table structure for table `statistik`
-- 

CREATE TABLE `statistik` (
  `ip` varchar(20) NOT NULL default '',
  `tanggal` date NOT NULL,
  `hits` int(10) NOT NULL default '1',
  `online` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `statistik`
-- 

INSERT INTO `statistik` VALUES ('127.0.0.2', '2009-09-11', 1, '1252681630');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2009-09-11', 17, '1252734209');
INSERT INTO `statistik` VALUES ('127.0.0.3', '2009-09-12', 8, '1252817594');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2009-10-24', 8, '1256381921');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2009-10-26', 108, '1256620074');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2009-10-27', 52, '1256686769');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2009-10-28', 124, '1256792223');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2009-10-29', 9, '1256828032');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2009-10-31', 3, '1257047101');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2009-11-01', 85, '1257113554');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2009-11-02', 11, '1257207543');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2009-11-03', 165, '1257292312');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2009-11-04', 12, '1257351239');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2010-02-07', 4, '1265555683');
INSERT INTO `statistik` VALUES ('::1', '2010-02-08', 7, '1265619918');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2010-02-08', 7, '1265602465');
INSERT INTO `statistik` VALUES ('::1', '2010-02-10', 15, '1265781796');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2010-02-10', 32, '1265781657');
INSERT INTO `statistik` VALUES ('::1', '2010-02-14', 8, '1266126936');
INSERT INTO `statistik` VALUES ('::1', '2010-02-15', 3, '1266171617');
INSERT INTO `statistik` VALUES ('::1', '2010-02-16', 1, '1266324700');
INSERT INTO `statistik` VALUES ('::1', '2010-02-17', 2, '1266394596');
INSERT INTO `statistik` VALUES ('::1', '2010-02-21', 7, '1266717287');
INSERT INTO `statistik` VALUES ('::1', '2010-02-22', 1, '1266818250');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2010-03-08', 4, '1268031976');
INSERT INTO `statistik` VALUES ('::1', '2010-03-11', 4, '1268280955');
INSERT INTO `statistik` VALUES ('::1', '2010-03-21', 10, '1269175620');
INSERT INTO `statistik` VALUES ('::1', '2010-03-23', 2, '1269342049');
INSERT INTO `statistik` VALUES ('::1', '2010-03-25', 2, '1269484269');
INSERT INTO `statistik` VALUES ('::1', '2010-05-08', 46, '1273337432');
INSERT INTO `statistik` VALUES ('::1', '2010-05-09', 97, '1273389221');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2010-05-10', 92, '1273475495');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2009-05-11', 141, '1242077473');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2009-05-19', 18, '1242753062');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2009-06-20', 89, '1245555069');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2009-06-21', 10, '1245653979');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2009-06-22', 30, '1245655713');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2010-06-22', 117, '1277208025');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2010-09-03', 48, '1283504300');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2010-09-20', 136, '1284976737');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2010-09-21', 1, '1285045222');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2010-09-22', 152, '1285144855');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2010-09-23', 36, '1285239429');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2010-09-25', 21, '1285386423');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2010-09-27', 115, '1285571539');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2010-09-28', 71, '1285668882');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2010-09-29', 16, '1285753760');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2010-09-30', 12, '1285835710');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2010-10-01', 16, '1285930933');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2010-10-02', 44, '1285986110');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2010-10-05', 26, '1286260550');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2010-10-07', 7, '1286434783');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2010-10-08', 14, '1286519793');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2010-10-11', 5, '1286780934');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2010-10-12', 3, '1286866930');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2010-10-14', 22, '1287034374');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2010-10-15', 42, '1287138299');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2010-10-16', 111, '1287208063');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2010-10-18', 22, '1287419631');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2010-10-19', 150, '1287506210');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2010-10-20', 12, '1287514495');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2010-10-22', 16, '1287750652');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2010-10-22', 16, '1287750652');

-- --------------------------------------------------------

-- 
-- Table structure for table `survei`
-- 

CREATE TABLE `survei` (
  `id_surv` int(11) NOT NULL auto_increment,
  `survie` varchar(400) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id_surv`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `survei`
-- 

INSERT INTO `survei` VALUES (1, 'Pilih Penilaian Anda Mengenai Website ini?');

-- --------------------------------------------------------

-- 
-- Table structure for table `wisata`
-- 

CREATE TABLE `wisata` (
  `id` int(3) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis` text NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tiket` varchar(15) NOT NULL,
  `keterangan` text NOT NULL,
  `tag` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `wisata`
-- 

INSERT INTO `wisata` VALUES (1, 'Alun-alun', 'Tempat bermain dan kumpul bersama keluarga dengan pemandangan alam dan air mancur', 'Jl.Merdeka Berada di tengah pusat kota malang', 'Gratis', '', 'Keluarga,');
INSERT INTO `wisata` VALUES (2, 'Pantai Balekambang', 'Wisata alam pantai pasir putih dan terdapat sebuah Pura untuk peribadatan umat hindu', 'Ds.Sumberbening Kec.Bantur', 'Rp.7.000', '', 'Pantai,');
INSERT INTO `wisata` VALUES (3, 'BNS', 'Wisata keluarga yang hanya dapat dinikmati malam hari, buka mulai pukul 15:00 sampai dengan 02:00', 'Ds.Oro-oro Ombo Kota Batu', 'Rp.10.000', '', 'Keluarga,');
INSERT INTO `wisata` VALUES (4, 'Cangar', 'Wisata Air Terjun, Bumi Perkemahan, Kolam Air panas, Hutan penelitian, Pendopo', 'Desa Tulungrejo Kec. Bumiaji', 'Rp.3.500', '', 'Air terjun, Perkemahan, Air panas');
INSERT INTO `wisata` VALUES (5, 'Coban Rondo', 'Wisata alam air terjun, terdapat tempat untuk Outbond dan Perkemahan', 'Ds.Ngroto Kec.Pujon', 'Rp.8.000', '', 'Air terjun, Outbond, Perkemahan');
INSERT INTO `wisata` VALUES (6, 'Coban Talun', 'Wisata Air Terjun dan Perkemahan', 'Dsn.Junggo, Ds.Tulungrejo, Kec. Bumiaji', 'Rp.10.000', '', 'Air terjun, Perkemahan');
INSERT INTO `wisata` VALUES (7, 'Danau Segara Anakan', 'Alam pantai yang masih alami', 'Pulau Sempu, Ds.Tambakrejo, Kec. Sumbermanjing', 'Gratis', '', 'Pantai,');
INSERT INTO `wisata` VALUES (8, 'Jatim Park', 'Wisata keluarga dengan konsep pendidikan dan pariwisata yang terdapat banyak wahana permainan, kolam renang', 'Jl .Kartika 2 Ds.Oro-oro Ombo Kec. Kota Batu', 'Rp.35.000', '', 'Keluarga, Kolam renang');
INSERT INTO `wisata` VALUES (9, 'Karangkates', 'Wisata bendungan dan permainan air', 'Ds.Karangkates, Kec.Sumber Pucung, Kab.Malang', 'Rp.10.000', '', 'Bendungan,');
INSERT INTO `wisata` VALUES (10, 'Kebun Teh', 'Agrowisata Alam Perkebunan', 'Ds. Wonorejo - Kec. Lawang', 'Rp.5.000', '', 'Agrowisata, Perkebunan');
INSERT INTO `wisata` VALUES (11, 'Museum Brawijaya', 'Wisata sejarah senjata perang', 'Jl.Ijen no.25', 'Rp.4.000', '', 'Sejarah,');
INSERT INTO `wisata` VALUES (12, 'Pantai Ngliyep', 'Wisata Alam Pantai', 'Ds.Bandungrejo - Kec.Donomulyo', 'Rp.3.000', '', 'Pantai,');
INSERT INTO `wisata` VALUES (13, 'Pantai Sendang Biru', 'Wisata Alam Pantai', 'Ds.Tambakrejo - Kec.Sumbermanjing', 'Rp.6.000', '', 'Pantai,');
INSERT INTO `wisata` VALUES (14, 'Paralayang', 'Olah raga paragliding', 'Ds.Sumberejo Kota Batu', 'Rp.200.000', '', '');
INSERT INTO `wisata` VALUES (15, 'Pemandian Tlogomas', 'Wisata alam dan kolam renang', 'Jl.Tlogomas Kota Malang', 'Rp. 15.000', '', '');
INSERT INTO `wisata` VALUES (16, 'Selecta', 'Kolam renang dan taman bunga yang indah', 'Ds.Tulungrejo Kec.Bumiaji, Kota Wisata Batu', 'Rp.12.600', '', 'Kolam renang, Taman');
INSERT INTO `wisata` VALUES (17, 'Senaputra', 'Taman Bermain', 'Jl.Kahuripan no.1 Malang', 'Rp.7.000', '', 'Taman,');
INSERT INTO `wisata` VALUES (18, 'Sengkaling', 'Taman rekreasi keluarga yang mempunyai kolam renang dan dilengkapi dg berbagai fasilitas lain', 'Jl.raya Mulyoagung 188, Kec.Dau, Kab.Malang', 'Rp.15.000', '', 'Taman, Keluarga');
INSERT INTO `wisata` VALUES (19, 'Tirta Nirwana', 'Aneka wahana seperti sepeda air, kebun kongkow dan patung-patung satwa langka', 'Ds.Songgokerto kota batu', 'Rp.15.000', '', 'Perkebunan');
INSERT INTO `wisata` VALUES (20, 'Wendit', 'Kolam renang alami dari sumber dan terdapat banyak kera', 'Ds.Mangliawan Kec. Pakis', 'Rp.10.000', '', 'Kolam renang');

-- --------------------------------------------------------

-- 
-- Table structure for table `wisata_penginapan`
-- 

CREATE TABLE `wisata_penginapan` (
  `id_wisata` int(3) NOT NULL,
  `penginapan` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `wisata_penginapan`
-- 

INSERT INTO `wisata_penginapan` VALUES (17, '21,4,22');
INSERT INTO `wisata_penginapan` VALUES (18, '19,20');
INSERT INTO `wisata_penginapan` VALUES (19, '11,12');
INSERT INTO `wisata_penginapan` VALUES (20, '23,18');
INSERT INTO `wisata_penginapan` VALUES (16, '10,9,8');
INSERT INTO `wisata_penginapan` VALUES (15, '19,20');
INSERT INTO `wisata_penginapan` VALUES (14, '11,12');
INSERT INTO `wisata_penginapan` VALUES (11, '15,16,17');
INSERT INTO `wisata_penginapan` VALUES (10, '13');
INSERT INTO `wisata_penginapan` VALUES (8, '6,7,5');
INSERT INTO `wisata_penginapan` VALUES (6, '9,10,8');
INSERT INTO `wisata_penginapan` VALUES (5, '11,12');
INSERT INTO `wisata_penginapan` VALUES (4, '8,9,10');
INSERT INTO `wisata_penginapan` VALUES (3, '5,6,7');
INSERT INTO `wisata_penginapan` VALUES (1, '1,2,3');
INSERT INTO `wisata_penginapan` VALUES (9, '14');

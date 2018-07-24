/*
SQLyog Enterprise - MySQL GUI v8.2 RC2
MySQL - 5.5.8 : Database - citytourbdg
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`citytourbdg` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `citytourbdg`;

/*Table structure for table `m_kendaraan` */

DROP TABLE IF EXISTS `m_kendaraan`;

CREATE TABLE `m_kendaraan` (
  `IdKendaraan` int(11) NOT NULL AUTO_INCREMENT,
  `Jenis` varchar(100) NOT NULL,
  `Kapasitas` int(4) DEFAULT NULL,
  `Jumlah` int(4) DEFAULT NULL,
  `Harga` double DEFAULT NULL,
  `Photo` varchar(100) DEFAULT NULL,
  `StatusAktif` char(1) NOT NULL DEFAULT 'Y',
  `StatusDelete` char(1) DEFAULT 'T',
  PRIMARY KEY (`IdKendaraan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `m_kendaraan` */

insert  into `m_kendaraan`(`IdKendaraan`,`Jenis`,`Kapasitas`,`Jumlah`,`Harga`,`Photo`,`StatusAktif`,`StatusDelete`) values (1,'Avansa',8,10,400000,'Avanza.png','Y','T'),(2,'Innova',8,10,500000,'Innova.png','Y','T'),(3,'Apv',8,10,500000,'Apv.png','Y','T'),(4,'Offroad',4,5,450000,'Offroad.png','Y','Y'),(5,'Mako',2,100,2000000,'Mako.png','Y','T');

/*Table structure for table `m_pelanggan` */

DROP TABLE IF EXISTS `m_pelanggan`;

CREATE TABLE `m_pelanggan` (
  `IdPelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Nama` varchar(100) DEFAULT NULL,
  `NoTelpon` int(20) DEFAULT NULL,
  `StatusAktif` char(1) DEFAULT 'Y',
  `StatusDelete` char(1) DEFAULT 'T',
  PRIMARY KEY (`IdPelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `m_pelanggan` */

insert  into `m_pelanggan`(`IdPelanggan`,`Email`,`Password`,`Nama`,`NoTelpon`,`StatusAktif`,`StatusDelete`) values (1,'huba.khoiri@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','Huba Khoiri',2147483647,'Y','T'),(2,'a','0cc175b9c0f1b6a831c399e269772661','a',0,'Y','T'),(3,'asd','827ccb0eea8a706c4c34a16891f84e7b','asd',0,'Y','T'),(4,'aaaaaa','827ccb0eea8a706c4c34a16891f84e7b','aaaaaa',0,'Y','T'),(5,'aaaaa@gmail.com','9cc892a13ab565e8b3fe353e0efbeca1','adas',0,'Y','T'),(6,'asal@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','asal',0,'Y','T'),(7,'jmyusup@gmail.com','6593f91cfdf59cc28141132954f7f13a','jajang',2147483647,'Y','T'),(8,'coc.klas1@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','test',0,'Y','T');

/*Table structure for table `m_petugas` */

DROP TABLE IF EXISTS `m_petugas`;

CREATE TABLE `m_petugas` (
  `IdPetugas` int(11) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(35) DEFAULT NULL,
  `Alamat` varchar(100) DEFAULT NULL,
  `NoTelpon` varchar(20) DEFAULT NULL,
  `StatusAktif` char(1) NOT NULL DEFAULT 'Y',
  `StatusDelete` char(1) NOT NULL DEFAULT 'T',
  PRIMARY KEY (`IdPetugas`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `m_petugas` */

insert  into `m_petugas`(`IdPetugas`,`Nama`,`Alamat`,`NoTelpon`,`StatusAktif`,`StatusDelete`) values (1,'Aghniya','Marga asih','08156922478','Y','T');

/*Table structure for table `m_wisata` */

DROP TABLE IF EXISTS `m_wisata`;

CREATE TABLE `m_wisata` (
  `IdWisata` int(11) NOT NULL AUTO_INCREMENT,
  `Paket` varchar(150) DEFAULT NULL,
  `Keterangan` text,
  `Harga` double DEFAULT NULL,
  `Photo` varchar(100) DEFAULT NULL,
  `StatusAktif` char(1) NOT NULL DEFAULT 'Y',
  `StatusDelete` char(1) NOT NULL DEFAULT 'T',
  PRIMARY KEY (`IdWisata`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `m_wisata` */

insert  into `m_wisata`(`IdWisata`,`Paket`,`Keterangan`,`Harga`,`Photo`,`StatusAktif`,`StatusDelete`) values (1,'Tangkuban Perahu','Tangkuban Parahu atau Gunung Tangkuban Perahu adalah salah satu gunung yang terletak di Provinsi Jawa Barat, Indonesia. <br/>\r\nKetinggian: 2.084 m, Ketinggian relatif: 707 m',150000,'Tangkuban.jpg','Y','T'),(2,'Floating Market','Tempat wisata baru di Bandung. Floating market Bandung satu2nya pasar terapung di Bandung cocok untuk semua usia',200000,'floating.jpg','Y','T'),(3,'Farm House','Farm House Susu Lembang Taman hiburan dengan bangunan bergaya Eropa, kostum tradisional Belanda yang disewakan, & restoran modern.<br/>\r\nAlamat: Jl. Raya Lembang No.108, Kabupaten Bandung Barat',150000,'farm.jpg','Y','T'),(4,'Kawah Putih','Kawah Putih adalah sebuah tempat wisata di Jawa Barat yang terletak di kawasan Ciwidey. Kawah putih merupakan sebuah danau yang terbentuk dari letusan Gunung Patuha.<br/>\r\nKetinggian permukaan: 2.430 m',225000,'Kawah.jpg','Y','T');

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` varchar(10) DEFAULT NULL,
  `parent_id` varchar(10) DEFAULT NULL,
  `text` varchar(100) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

/*Data for the table `menu` */

insert  into `menu`(`id`,`menu_id`,`parent_id`,`text`,`link`) values (1,'1','0','Data Master','#'),(2,'1.1','1','Kendaraan','?cat=master&page=KendaraanGrid'),(3,'1.2','1','Wisata','?cat=master&page=WisataGrid'),(5,'1.4','1','Petugas','?cat=master&page=PetugasGrid'),(7,'2','0','Pemesanan','#'),(8,'2.1','2','Pemesanan','?cat=pemesanan&page=pemesananGrid'),(11,'0','0','Pengembalian','#'),(12,'0','3','Pengembalian','?cat=pengembalian&page=PengembalianGrid'),(16,'0','0','Log Buku','#'),(17,'0','4','Log Buku','?cat=logbuku&page=LogBukuGrid'),(18,'3','0','Laporan','#'),(19,'3.1','3','Laporan','?cat=laporan&page=Laporan'),(22,'4','0','Kontak','#'),(23,'4.1','4','Kontak','?cat=kontak&page=KontakGrid'),(24,'5','0','About Us','#'),(25,'5.1','5','About Us','?cat=about&page=AboutGrid'),(33,'6','0','System','#'),(34,'6.1','6','User','?cat=system&page=UserGrid'),(35,'6.2','6','User Group','?cat=system&page=UserGroupGrid');

/*Table structure for table `menu_sub` */

DROP TABLE IF EXISTS `menu_sub`;

CREATE TABLE `menu_sub` (
  `menu_id` varchar(15) DEFAULT NULL,
  `link` varchar(225) DEFAULT NULL,
  `link_file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `menu_sub` */

insert  into `menu_sub`(`menu_id`,`link`,`link_file`) values ('1.1','?cat=buku&page=BukuGrid',NULL),('1.2','?cat=client&page=client_grid',NULL),('1.3','?cat=artikel&page=artikel',NULL),('1.4','?cat=master&page=pegawai_grid',NULL),('1.5','?cat=master&page=perusahaan_grid',NULL),('2.1','?cat=inventori&page=stok_awal',NULL),('2.2','?cat=inventori&page=item_masuk',NULL),('2.3','?cat=inventori&page=item_keluar',NULL),('3.1','?cat=pembelian&page=pembelian_grid',NULL),('3.2','?cat=pembelian&page=pembayaran_grid',NULL),('3.3','?cat=penjualan&page=order_grid',NULL),('3.4','?cat=penjualan&page=packing_grid',NULL),('3.5','?cat=penjualan&page=faktur_grid',NULL),('3.6','?cat=penjualan&page=invoice_grid',NULL),('4.1','?cat=laporan&page=lap_stok_item',NULL),('4.2','?cat=laporan&page=lap_order',NULL),('4.3','?cat=laporan&page=lap_bulanan',NULL);

/*Table structure for table `tb_about` */

DROP TABLE IF EXISTS `tb_about`;

CREATE TABLE `tb_about` (
  `IdAbout` int(11) NOT NULL AUTO_INCREMENT,
  `About` text,
  `Tanggal` datetime DEFAULT NULL,
  PRIMARY KEY (`IdAbout`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tb_about` */

insert  into `tb_about`(`IdAbout`,`About`,`Tanggal`) values (1,'<div align=\"justify\"><b><font size=\"5\"><span id=\"sceditor-start-marker\" style=\"line-height: 0; display: none;\" class=\"sceditor-selection sceditor-ignore\"> </span>PT. Daya Sarana Cipta(DSC) merupakan sebuah perusahaan yang bergerak di bidang jaya pelayanan transportasi.kami memiliki harapan bisa menjadi perusahaan yang bisa memberikan pelayanan terbaik sehingga banyak masyarakat yang sedang menggunakan jasa transportasi kami.mengutamakan pelayanan terbaik ada visi kami dan misi kami bisa menjadi jasa pelayanan travel terbaik di kota bandung .</font><span id=\"sceditor-end-marker\" style=\"line-height: 0; display: none;\" class=\"sceditor-selection sceditor-ignore\"> </span><br></b></div><b></b>','2018-07-23 17:55:06');

/*Table structure for table `tb_booking` */

DROP TABLE IF EXISTS `tb_booking`;

CREATE TABLE `tb_booking` (
  `IdBooking` int(11) NOT NULL AUTO_INCREMENT,
  `KodeBooking` varchar(25) DEFAULT NULL,
  `IdKendaraan` int(11) DEFAULT NULL,
  `IdWisata` int(11) DEFAULT NULL,
  `IdPelanggan` int(11) DEFAULT NULL,
  `JmlHari` int(11) DEFAULT NULL,
  `TotalHarga` double DEFAULT NULL,
  `TanggalRegistrasi` datetime DEFAULT NULL,
  `TanggalBookingAwal` date DEFAULT NULL,
  `TanggalBookingAkhir` date DEFAULT NULL,
  `StatusBayar` char(1) DEFAULT 'T',
  PRIMARY KEY (`IdBooking`),
  KEY `FK_tb_pelanggan` (`IdPelanggan`),
  KEY `FK_tb_kendaraan` (`IdKendaraan`),
  KEY `FK_tb_wisata` (`IdWisata`),
  CONSTRAINT `FK_tb_kendaraan` FOREIGN KEY (`IdKendaraan`) REFERENCES `m_kendaraan` (`IdKendaraan`),
  CONSTRAINT `FK_tb_pelanggan` FOREIGN KEY (`IdPelanggan`) REFERENCES `m_pelanggan` (`IdPelanggan`),
  CONSTRAINT `FK_tb_wisata` FOREIGN KEY (`IdWisata`) REFERENCES `m_wisata` (`IdWisata`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `tb_booking` */

insert  into `tb_booking`(`IdBooking`,`KodeBooking`,`IdKendaraan`,`IdWisata`,`IdPelanggan`,`JmlHari`,`TotalHarga`,`TanggalRegistrasi`,`TanggalBookingAwal`,`TanggalBookingAkhir`,`StatusBayar`) values (4,'220518-003',4,3,1,3,3150347,'2018-05-22 10:07:33','2018-05-22','2018-05-25','T'),(5,'230518-003',1,2,1,2,1200579,'2018-05-23 08:36:19','2018-05-23','2018-05-25','T'),(6,'030718-001',3,1,1,2,1100237,'2018-07-13 16:50:22','2018-07-03','2018-07-05','Y'),(7,'030718-002',1,3,1,2,1100156,'2018-07-14 16:51:23','2018-07-03','2018-07-05','T'),(9,'240718-003',1,3,8,2,1100168,'2018-07-24 05:59:29','2018-07-24','2018-07-26','T'),(12,'240718-004',1,3,1,0,550019,'2018-07-24 07:52:43','2018-07-24','2018-07-24','T');

/*Table structure for table `tb_kontak` */

DROP TABLE IF EXISTS `tb_kontak`;

CREATE TABLE `tb_kontak` (
  `IdKontak` int(11) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Subjek` varchar(200) DEFAULT NULL,
  `Pesan` text,
  `Tanggal` datetime DEFAULT NULL,
  PRIMARY KEY (`IdKontak`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tb_kontak` */

insert  into `tb_kontak`(`IdKontak`,`Nama`,`Email`,`Subjek`,`Pesan`,`Tanggal`) values (1,'Huba','alloneshare@gmail.com','ada','aada','2018-07-02 09:38:01'),(2,'Huba','alloneshare@gmail.com','ada','aada','2018-07-02 09:39:15'),(3,'Huba','alloneshare@gmail.com','ada','aada','2018-07-02 09:39:28'),(4,'test','alloneshare@gmail.com','test','test','2018-07-02 09:40:42'),(5,'jajang','jmyusup@gmail.com','booking','tong mahal teuing luur','2018-07-03 16:26:32'),(6,'ada','yogi.lussomobili@gmail.com','ada','ada','2018-07-24 06:41:10'),(7,'asa','yogi.lussomobili@gmail.com','asa','asa','2018-07-24 06:42:46'),(8,'caaca','coc.klas1@gmail.com','caca','cacac','2018-07-24 06:43:31');

/*Table structure for table `user_group` */

DROP TABLE IF EXISTS `user_group`;

CREATE TABLE `user_group` (
  `IdGroup` int(5) NOT NULL AUTO_INCREMENT,
  `NamaGroup` varchar(50) NOT NULL,
  `StatusDelete` char(1) DEFAULT 'T',
  PRIMARY KEY (`IdGroup`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `user_group` */

insert  into `user_group`(`IdGroup`,`NamaGroup`,`StatusDelete`) values (1,'Admin','T'),(2,'Petugas','T');

/*Table structure for table `user_group_menu` */

DROP TABLE IF EXISTS `user_group_menu`;

CREATE TABLE `user_group_menu` (
  `id_group_menu` int(11) NOT NULL AUTO_INCREMENT,
  `id_group` varchar(10) DEFAULT NULL,
  `menu_id` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_group_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Data for the table `user_group_menu` */

insert  into `user_group_menu`(`id_group_menu`,`id_group`,`menu_id`) values (1,'1','1'),(2,'1','1.1'),(3,'1','1.2'),(4,'1','1.3'),(5,'1','1.4'),(6,'1','1.5'),(7,'1','2'),(8,'1','2.1'),(9,'1','2.2'),(10,'1','2.3'),(11,'1','3'),(12,'1','3.1'),(13,'1','3.2'),(14,'1','3.3'),(15,'1','3.4'),(16,'1','3.5'),(17,'1','3.6'),(18,'1','4'),(19,'1','4.1'),(20,'1','4.2'),(21,'1','4.3'),(22,'1','5'),(23,'1','5.1'),(24,'1','5.2'),(25,'1','6'),(26,'1','6.1'),(27,'1','6.2'),(28,'2','2.3');

/*Table structure for table `user_login` */

DROP TABLE IF EXISTS `user_login`;

CREATE TABLE `user_login` (
  `IdUserLogin` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `LoginHash` varchar(30) NOT NULL,
  `IdPetugas` int(11) NOT NULL,
  `IdGroup` int(11) DEFAULT NULL,
  `Tanggal` datetime NOT NULL,
  `StatusDelete` char(1) DEFAULT 'T',
  `StatusAktif` char(1) DEFAULT 'Y',
  `UserUpdate` varchar(30) DEFAULT NULL,
  `WaktuUpdate` datetime DEFAULT NULL,
  PRIMARY KEY (`IdUserLogin`),
  KEY `FK_user_group` (`IdGroup`),
  CONSTRAINT `FK_user_group` FOREIGN KEY (`IdGroup`) REFERENCES `user_group` (`IdGroup`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `user_login` */

insert  into `user_login`(`IdUserLogin`,`Username`,`Password`,`LoginHash`,`IdPetugas`,`IdGroup`,`Tanggal`,`StatusDelete`,`StatusAktif`,`UserUpdate`,`WaktuUpdate`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3','administrator',1,1,'0000-00-00 00:00:00','T','Y',NULL,NULL),(2,'gudang','827ccb0eea8a706c4c34a16891f84e7b','gudang',0,NULL,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL),(3,'pimpinan','827ccb0eea8a706c4c34a16891f84e7b','pimpinan',0,NULL,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL),(4,'asepp','827ccb0eea8a706c4c34a16891f84e7b','',2,2,'2014-03-31 06:44:51','T','Y','','2014-03-31 06:44:51'),(5,'petugas','827ccb0eea8a706c4c34a16891f84e7b','',3,2,'2018-01-21 17:10:44','T','Y','2018-01-21 17:11:23','2018-01-21 17:10:44');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

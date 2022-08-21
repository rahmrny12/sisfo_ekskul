-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: sisfo_ekskul
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ekskul`
--

DROP TABLE IF EXISTS `ekskul`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ekskul` (
  `id_ekskul` int(11) NOT NULL AUTO_INCREMENT,
  `nama_ekskul` varchar(125) DEFAULT NULL,
  `deskripsi` varchar(225) DEFAULT NULL,
  `foto_ekskul` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_ekskul`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ekskul`
--

LOCK TABLES `ekskul` WRITE;
/*!40000 ALTER TABLE `ekskul` DISABLE KEYS */;
INSERT INTO `ekskul` VALUES (1,'Pramuka','Pramuka adalah kegiatan untuk melatih kedisipilinan dan mental siswa.','f92e24d43f0a4db6a8a69c48bab6ca53.jpg'),(2,'Bola Voli','Kegiatan olahraga bola voli, yang melatih kekuatan, ketangkasan maupun kelincahan tubuh siswa','59816862d77f4173e4814a2feb43c8e4.jpg'),(6,'Paskibra (Pasukan Pengibar Bendera)','Paskibra adalah pasukan yang bertanggung jawab dalam pengibaran sang saka merah putih. Paskibra menjadi ajang bagi anggotanya untuk membentuk nilai-nilai penting dalam diri. Di dalamnya terdapat nilai nilai seperti kedisiplin','d63fe112b96e8c0dcd28c7103df16175.jpg'),(7,'PMR (Palang Merah Remaja)','PMR bertujuan membangun dan mengembangkan karakter Kepalangmerahan agar siap menjadi Relawan PMI pada masa depan. Dengan mengikuti PMR, kamu melatih jiwa kemanusiaan kamu, sekaligus belajar gaya hidup sehat dan ilmu kesehatan','82df18c71ef830967b7530f6addaf1d9.jpg'),(8,'Basket','Bola basket adalah permainan kerja sama tim untuk memasukkan bola ke dalam ring supaya pertandingan bisa dimenangkan. Basket dapat melatih kekuatan otot, sekaligus kerja sama tim.','fdac17512c79d7eb1509e0f1c4a8e491.jpg'),(9,'Paduan Suara','Paduan suara atau koor adalah sebuah asambel yang terdiri dari sekelompok penyanyi dan pemain musik yang saling berkolaborasi membawakan lagu-lagu. Dengan bergabung padus, kamu akan menjadi lebih percaya diri, kompak dengan t','807c5a363da6f634a95dc56ad1a89835.jpg'),(10,'Sepak Bola','Sepak bola adalah merujuk pada permainan yang dilakukan oleh dua tim berbeda, dengan komposisi pemain yang berada lapangan sebanyak sebelas orang. Dimana masing-masing tim berupaya untuk menang dan mencetak gol ke gawang lawa','72b8186464dbb55c16a038f0c17f8166.jpg'),(11,'Futsal','Futsal adalah permainan bola yang dimainkan oleh dua regu, yang masing- masing beranggotakan lima orang. Tujuannya adalah memasukkan bola ke gawang lawan, dengan memanipulasi bola dengan kaki dan anggota tubuh lain selain tan','9b139a144cbc2242d8ad8db8b97699e5.jpg'),(12,'Teater dan Kesenian','seni teater adalah jenis kesenian pertunjukan drama yang dipentaskan di atas panggung. Secara spesifik, pengertian seni teater merupakan sebuah seni drama yang menampilkan perilaku manusia dengan gerak, tari, dan nyanyian yan','9705e94341725882ff5e5d8fe03dd780.jpg'),(13,'Remas (Remaja Masjid)','Remaja masjid adalah kegiatan yang menghimpun remaja muslim yang aktif datang dan beribadah shalat berjama\'ah di masjid. Karena keterikatannya dengan masjid, maka peran utamanya tidak lain adalah memakmurkan masjid.','efdccd2b83223e01650c94f7f4a70cd3.jpeg');
/*!40000 ALTER TABLE `ekskul` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galeri`
--

DROP TABLE IF EXISTS `galeri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL AUTO_INCREMENT,
  `foto_ekskul` varchar(45) DEFAULT NULL,
  `ekskul_id_ekskul` int(11) NOT NULL,
  PRIMARY KEY (`id_galeri`,`ekskul_id_ekskul`),
  KEY `fk_galeri_ekskul_idx` (`ekskul_id_ekskul`),
  CONSTRAINT `fk_galeri_ekskul` FOREIGN KEY (`ekskul_id_ekskul`) REFERENCES `ekskul` (`id_ekskul`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galeri`
--

LOCK TABLES `galeri` WRITE;
/*!40000 ALTER TABLE `galeri` DISABLE KEYS */;
/*!40000 ALTER TABLE `galeri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guru_pembimbing`
--

DROP TABLE IF EXISTS `guru_pembimbing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guru_pembimbing` (
  `id_guru_pembimbing` int(11) NOT NULL AUTO_INCREMENT,
  `nama_guru` varchar(125) DEFAULT NULL,
  `no_telp` varchar(45) DEFAULT NULL,
  `username` varchar(125) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `id_ekskul` int(11) NOT NULL,
  PRIMARY KEY (`id_guru_pembimbing`),
  KEY `fk_guru_pembimbing_ekskul1_idx` (`id_ekskul`),
  CONSTRAINT `fk_guru_pembimbing_ekskul1` FOREIGN KEY (`id_ekskul`) REFERENCES `ekskul` (`id_ekskul`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guru_pembimbing`
--

LOCK TABLES `guru_pembimbing` WRITE;
/*!40000 ALTER TABLE `guru_pembimbing` DISABLE KEYS */;
/*!40000 ALTER TABLE `guru_pembimbing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jadwal`
--

DROP TABLE IF EXISTS `jadwal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `hari` date DEFAULT NULL,
  `jam_dimulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `id_ekskul` int(11) NOT NULL,
  PRIMARY KEY (`id_jadwal`,`id_ekskul`),
  KEY `fk_jadwal_ekskul1_idx` (`id_ekskul`),
  CONSTRAINT `fk_jadwal_ekskul1` FOREIGN KEY (`id_ekskul`) REFERENCES `ekskul` (`id_ekskul`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jadwal`
--

LOCK TABLES `jadwal` WRITE;
/*!40000 ALTER TABLE `jadwal` DISABLE KEYS */;
/*!40000 ALTER TABLE `jadwal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kegiatan`
--

DROP TABLE IF EXISTS `kegiatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kegiatan` varchar(45) DEFAULT NULL,
  `id_ekskul` int(11) NOT NULL,
  PRIMARY KEY (`id_kegiatan`),
  KEY `fk_kegiatan_ekskul1_idx` (`id_ekskul`),
  CONSTRAINT `fk_kegiatan_ekskul1` FOREIGN KEY (`id_ekskul`) REFERENCES `ekskul` (`id_ekskul`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kegiatan`
--

LOCK TABLES `kegiatan` WRITE;
/*!40000 ALTER TABLE `kegiatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `kegiatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pendaftaran`
--

DROP TABLE IF EXISTS `pendaftaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pendaftaran` (
  `id_siswa` int(11) NOT NULL,
  `id_ekskul` int(11) NOT NULL,
  `alasan_bergabung` varchar(225) DEFAULT NULL,
  `waktu_pendaftaran` timestamp NULL DEFAULT NULL,
  `dikonfirmasi` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_siswa`,`id_ekskul`),
  KEY `fk_siswa_has_ekskul_ekskul1_idx` (`id_ekskul`),
  KEY `fk_siswa_has_ekskul_siswa_idx` (`id_siswa`),
  CONSTRAINT `fk_siswa_has_ekskul_ekskul1` FOREIGN KEY (`id_ekskul`) REFERENCES `ekskul` (`id_ekskul`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_siswa_has_ekskul_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pendaftaran`
--

LOCK TABLES `pendaftaran` WRITE;
/*!40000 ALTER TABLE `pendaftaran` DISABLE KEYS */;
INSERT INTO `pendaftaran` VALUES (8,1,'hello','2022-08-21 02:06:02',0),(8,2,'pengen jadi anime','2022-08-21 02:00:54',0);
/*!40000 ALTER TABLE `pendaftaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siswa`
--

DROP TABLE IF EXISTS `siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `nama_siswa` varchar(125) DEFAULT NULL,
  `nisn` varchar(45) DEFAULT NULL,
  `kelas` varchar(45) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `username` varchar(125) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siswa`
--

LOCK TABLES `siswa` WRITE;
/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;
INSERT INTO `siswa` VALUES (8,'Rahmat Rendy Prayogo','0059242983','XII RPL 2','Jl. Kampung Baru, Rt 009 Rw 010, Semboro Pasar','082139570709','rahmrny12','$2y$10$gSXuptwQDg31W7EYEAdGkeoHLizoDbGKMqOW4RLlzBpayWbgDuu3C'),(9,'Wahyu Candra','35090707','XII RPL 2','Babatan','085237123200','yahawahyu','$2y$10$DWlbLnBfpntpFPqr2DGkNu.awswbJY4Mpwx6sM7d6u8gGc7TDPuIi');
/*!40000 ALTER TABLE `siswa` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-21 20:12:22

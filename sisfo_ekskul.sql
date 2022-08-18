-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 18, 2022 at 03:53 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisfo_ekskul`
--

-- --------------------------------------------------------

--
-- Table structure for table `ekskul`
--

CREATE TABLE `ekskul` (
  `id_ekskul` int(11) NOT NULL,
  `nama_ekskul` varchar(125) DEFAULT NULL,
  `deskripsi` varchar(225) DEFAULT NULL,
  `foto_ekskul` varchar(45) DEFAULT NULL,
  `jumlah_pendaftar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ekskul`
--

INSERT INTO `ekskul` (`id_ekskul`, `nama_ekskul`, `deskripsi`, `foto_ekskul`, `jumlah_pendaftar`) VALUES
(1, 'Pramuka', 'Pramuka adalah kegiatan untuk melatih kedisipilinan dan mental siswa.', 'f92e24d43f0a4db6a8a69c48bab6ca53.jpg', 1),
(2, 'Bola Voli', 'Kegiatan olahraga bola voli, yang melatih kekuatan, ketangkasan maupun kelincahan tubuh siswa', '59816862d77f4173e4814a2feb43c8e4.jpg', 1),
(6, 'Paskibra (Pasukan Pengibar Bendera)', 'Paskibra adalah pasukan yang bertanggung jawab dalam pengibaran sang saka merah putih. Paskibra menjadi ajang bagi anggotanya untuk membentuk nilai-nilai penting dalam diri. Di dalamnya terdapat nilai nilai seperti kedisiplin', 'd63fe112b96e8c0dcd28c7103df16175.jpg', NULL),
(7, 'PMR (Palang Merah Remaja)', 'PMR bertujuan membangun dan mengembangkan karakter Kepalangmerahan agar siap menjadi Relawan PMI pada masa depan. Dengan mengikuti PMR, kamu melatih jiwa kemanusiaan kamu, sekaligus belajar gaya hidup sehat dan ilmu kesehatan', '82df18c71ef830967b7530f6addaf1d9.jpg', NULL),
(8, 'Basket', 'Bola basket adalah permainan kerja sama tim untuk memasukkan bola ke dalam ring supaya pertandingan bisa dimenangkan. Basket dapat melatih kekuatan otot, sekaligus kerja sama tim.', 'fdac17512c79d7eb1509e0f1c4a8e491.jpg', NULL),
(9, 'Paduan Suara', 'Paduan suara atau koor adalah sebuah asambel yang terdiri dari sekelompok penyanyi dan pemain musik yang saling berkolaborasi membawakan lagu-lagu. Dengan bergabung padus, kamu akan menjadi lebih percaya diri, kompak dengan t', '807c5a363da6f634a95dc56ad1a89835.jpg', NULL),
(10, 'Sepak Bola', 'Sepak bola adalah merujuk pada permainan yang dilakukan oleh dua tim berbeda, dengan komposisi pemain yang berada lapangan sebanyak sebelas orang. Dimana masing-masing tim berupaya untuk menang dan mencetak gol ke gawang lawa', '72b8186464dbb55c16a038f0c17f8166.jpg', NULL),
(11, 'Futsal', 'Futsal adalah permainan bola yang dimainkan oleh dua regu, yang masing- masing beranggotakan lima orang. Tujuannya adalah memasukkan bola ke gawang lawan, dengan memanipulasi bola dengan kaki dan anggota tubuh lain selain tan', '9b139a144cbc2242d8ad8db8b97699e5.jpg', NULL),
(12, 'Teater dan Kesenian', 'seni teater adalah jenis kesenian pertunjukan drama yang dipentaskan di atas panggung. Secara spesifik, pengertian seni teater merupakan sebuah seni drama yang menampilkan perilaku manusia dengan gerak, tari, dan nyanyian yan', '9705e94341725882ff5e5d8fe03dd780.jpg', NULL),
(13, 'Remas (Remaja Masjid)', 'Remaja masjid adalah kegiatan yang menghimpun remaja muslim yang aktif datang dan beribadah shalat berjama\'ah di masjid. Karena keterikatannya dengan masjid, maka peran utamanya tidak lain adalah memakmurkan masjid.', 'efdccd2b83223e01650c94f7f4a70cd3.jpeg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_siswa` int(11) NOT NULL,
  `id_ekskul` int(11) NOT NULL,
  `waktu_pendaftaran` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_siswa`, `id_ekskul`, `waktu_pendaftaran`) VALUES
(8, 1, '2022-08-18 03:03:02'),
(9, 1, '2022-08-18 02:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(125) DEFAULT NULL,
  `nisn` varchar(45) DEFAULT NULL,
  `kelas` varchar(45) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `username` varchar(125) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama_siswa`, `nisn`, `kelas`, `alamat`, `no_telp`, `username`, `password`) VALUES
(8, 'Rahmat Rendy Prayogo', '0059242983', 'XII RPL 2', 'Jl. Kampung Baru, Rt 009 Rw 010, Semboro Pasar', '082139570709', 'rahmrny12', '$2y$10$gSXuptwQDg31W7EYEAdGkeoHLizoDbGKMqOW4RLlzBpayWbgDuu3C'),
(9, 'Wahyu Candra', '35090707', 'XII RPL 2', 'Babatan', '085237123200', 'yahawahyu', '$2y$10$DWlbLnBfpntpFPqr2DGkNu.awswbJY4Mpwx6sM7d6u8gGc7TDPuIi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ekskul`
--
ALTER TABLE `ekskul`
  ADD PRIMARY KEY (`id_ekskul`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_siswa`,`id_ekskul`),
  ADD KEY `fk_siswa_has_ekskul_ekskul1_idx` (`id_ekskul`),
  ADD KEY `fk_siswa_has_ekskul_siswa_idx` (`id_siswa`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ekskul`
--
ALTER TABLE `ekskul`
  MODIFY `id_ekskul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `fk_siswa_has_ekskul_ekskul1` FOREIGN KEY (`id_ekskul`) REFERENCES `ekskul` (`id_ekskul`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_siswa_has_ekskul_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

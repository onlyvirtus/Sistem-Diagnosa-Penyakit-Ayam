-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2024 at 05:28 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `no` int(10) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `namadepan` varchar(255) NOT NULL,
  `namabelakang` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`no`, `gambar`, `namadepan`, `namabelakang`, `email`, `password`) VALUES
(4, 'dkter.png', 'FIkri', 'Jul', 'fikri@gmail.com', '19da9ebef1ca88a6cb3ffcb997054199');

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mesin_inferensi`
--

CREATE TABLE `mesin_inferensi` (
  `no` int(11) NOT NULL,
  `idpenyakit` varchar(255) NOT NULL,
  `idgejala` varchar(255) NOT NULL,
  `namagejala` varchar(255) NOT NULL,
  `nilaicf` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mesin_inferensi`
--

INSERT INTO `mesin_inferensi` (`no`, `idpenyakit`, `idgejala`, `namagejala`, `nilaicf`) VALUES
(171, 'P1', 'G01', 'Ngorok basah', 0.90),
(172, 'P1', 'G02', 'Leleran hidung lengket', 0.70),
(173, 'P1', 'G03', 'Terdapat eskudat berbuih pada mata', 0.50),
(174, 'P1', 'G04', 'Menggeleng-gelengkan kepala', 0.30),
(175, 'P1', 'G05', 'Mengeluarkan nanah dari hidung', 0.40),
(176, 'P2', 'G06', 'Mengengap-engap', 0.80),
(177, 'P2', 'G07', 'Batuk', 0.70),
(178, 'P2', 'G08', 'Bersin', 0.70),
(179, 'P2', 'G09', 'Ayam tampak lesu dan mengantuk', 0.40),
(180, 'P2', 'G10', 'Nafsu makan menurun', 0.50),
(181, 'P2', 'G11', 'Mencret', 0.30),
(182, 'P2', 'G12', 'Jengger dan kepala kebiruan', 0.30),
(183, 'P2', 'G13', 'Kornea menjadi keruh', 0.20),
(184, 'P2', 'G14', 'Sayap turun', 0.70),
(185, 'P2', 'G15', 'Otot tubuh gemetar', 0.60),
(186, 'P2', 'G16', 'Kejang-kejang', 0.30),
(187, 'P03', 'G09', 'Ayam tampak lesu dan mengantuk', 0.40),
(188, 'P03', 'G10', 'Nafsu makan menurun', 0.20),
(189, 'P03', 'G17', 'Bulu tampak kusam', 0.40),
(190, 'P03', 'G18', 'Diare berlendir mengotori bulu pantat', 0.60),
(191, 'P03', 'G19', 'Peradangan di sekitar dubur dan kloaka', 0.60),
(192, 'P03', 'G20', 'Mematok dubur sendiri', 0.50),
(193, 'P03', 'G21', 'Paruh menempel di lantai ketika tidur', 0.90),
(194, 'P03', 'G22', 'Kotoran berwarna putih', 0.20),
(195, 'P04', 'G09', 'Ayam tampak lesu dan mengantuk', 0.60),
(196, 'P04', 'G10', 'Nafsu makan menurun', 0.20),
(197, 'P04', 'G14', 'Sayap turun', 0.70),
(198, 'P04', 'G17', 'Bulu tampak kusam', 0.80),
(199, 'P04', 'G22', 'Kotoran berwarna putih', 0.90),
(200, 'P04', 'G23', 'Kotoran menempel di sekitar dubur', 0.80),
(201, 'P04', 'G24', 'Kloaka tampak putih', 0.80),
(202, 'P04', 'G25', 'Jengger berwarna keabuan', 0.40),
(203, 'P04', 'G26', 'Mata menutup', 0.30),
(204, 'P04', 'G27', 'Luka bergerombol', 0.30),
(205, 'P05', 'G18', 'Diare berlendir mengotori bulu pantat', 0.20),
(206, 'P05', 'G28', 'Lumpuh', 0.50),
(207, 'P05', 'G29', 'Pendarahan gusi', 0.70),
(208, 'P05', 'G30', 'Pendarahan hidung', 0.70);

-- --------------------------------------------------------

--
-- Table structure for table `p_ayambroiler`
--

CREATE TABLE `p_ayambroiler` (
  `no` int(10) NOT NULL,
  `idpenyakit` varchar(20) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `namapenyakit` varchar(255) NOT NULL,
  `namailmiah` varchar(255) NOT NULL,
  `keterangan` varchar(2555) NOT NULL,
  `gejala` varchar(2555) NOT NULL,
  `solusi` varchar(2555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p_ayambroiler`
--

INSERT INTO `p_ayambroiler` (`no`, `idpenyakit`, `gambar`, `namapenyakit`, `namailmiah`, `keterangan`, `gejala`, `solusi`) VALUES
(65, 'P1', 'CRD.jpeg', 'Penyakit  Ngorok', 'Cronic Respiratory Disease', 'Penyebab Chronic Respiratory Disease (CRD) adalah bakteri Mycoplasma gallisepticum yang menginfeksi saluran pernapasan unggas seperti ayam, itik, angsa, entok, kalkun, merpati, dan lain-lain. Kejadian penyakit CRD hingga saat ini masih ditemukan di seluruh wilayah Indonesia dan menyebabkan kerugian bagi peternak.', 'Ngorok basah, Leleran hidung lengket, Terdapat eskudat berbuih pada mata, Menggeleng-gelengkan kepala, Mengeluarkan nanah dari hidung', 'Pengobatan CRD umumnya melibatkan pemberian antibiotik yang efektif terhadap Mycoplasma gallisepticum. Beberapa antibiotik yang sering digunakan antara lain: Tiamulin, Tilmicosin, Tylosin, Spiramycin, Enrofloxacin. Antibiotik dapat diberikan melalui air minum atau injeksi sesuai dengan dosis dan anjuran dokter hewan. Selain itu, menjaga kebersihan kandang dan sanitasi lingkungan juga penting untuk mencegah penyebaran penyakit.'),
(66, 'P2', 'Tetelo.jpg', 'Penyakit Tetelo', 'Newcastle Disease', 'Penyakit tetelo atau Newcastle Disease (ND) merupakan salah satu penyakit virus yang penting dalam dunia perunggasan dan merupakan penyakit endemik di Indonesia. Inang yang diserang semua unggas meliputi ayam ras maupun ayam bukan ras (buras). Penyakit ND menginfeksi saluran pernapasan, saluran pencernaan maupun pada sistem saraf. Gejala klinis ND dapat bersifat akut maupun kronis, mudah menular dan menginfeksi unggas disekitarnya.', 'Mengengap-engap, Batuk, Bersin, Ayam tampak lesu dan mengantuk, Nafsu makan menurun, Mencret, Jengger dan kepala kebiruan, Kornea menjadi keruh, Sayap turun, Otot tubuh gemetar, Kejang-kejang', 'Tidak ada obat, berikan vitamin untuk membantu kondisi tubuh.'),
(67, 'P03', 'gumboro.jpg', 'Gumboro', 'Infectious Bursal Disease', 'Infectious bursal disease (IBD) atau gumboro merupakan penyakit infeksius pada unggas yang bersifat akut . penyebab penyakit ini adalah virus genus Avibirnavirus famili Birnaviridae yang mempunyai asam inti RNA rantai ganda dengan dua segmen (Adan B) (Muller et al. 1979). Virus IBD merupakan virus limfotropik yang dapat merusak limfosit B (immature) secara cepat dan menyebabkan imunosupresi pada unggas.', 'Ayam tampak lesu dan mengantuk, Nafsu makan menurun, Bulu tampak kusam, Diare berlendir mengotori bulu pantat, Peradangan di sekitar dubur dan kloaka, Mematok dubur sendiri, Paruh menempel di lantai ketika tidur, Kotoran berwarna putih', 'Tidak ada obat. Air gula 30-50 gr/ liter air dan ditambah master Vit-stress dengan dosis 1 gr/ 2 liter air untuk meningkatkan kondisi tubuh.'),
(68, 'P04', 'feses kapur.jpg', 'Berak Kapur', 'Pullorum', 'Penyakit berak kapur (Pullorum Disease), juga dikenal sebagai Bacillary White Diarrhea, adalah penyakit infeksi bakteri yang sangat menular pada unggas, terutama menyerang anak ayam yang masih muda. Penyakit ini disebabkan oleh bakteri Salmonella pullorum.', 'Ayam tampak lesu dan mengantuk, Nafsu makan menurun, Sayap turun, Bulu tampak kusam, Kotoran berwarna putih, Kotoran menempel di sekitar dubur, Kloaka tampak putih, Jengger berwarna keabuan, Mata menutup, Luka bergerombol', 'Berikan master colliprim dosis 1 gr/1 liter selama 3-4 hari (1/2 hari) berturut-turut. Setelah itu berikan master vit-stress selama 3-4 hari untuk membantu proses penyembuhan.'),
(69, 'P05', 'fluburung.jpg', 'Flu Burung', 'Avian Influenza', 'Flu burung atau Avian Influenza (AI) adalah penyakit zoonosis fatal dan menular serta dapat menginfeksi semua jenis burung, manusia, babi, kuda dan anjing, Virus Avian Influenza tipe A (hewan) dari keluarga Drthomyxoviridae telah menyerang manusia dan menyebabkan banyak korban meninggal dunia.', 'Diare berlendir mengotori bulu pantat, Lumpuh, Pendarahan gusi, Pendarahan hidung', 'Tidak ada obat, dianjurkan untuk disingkirkan dan dimusnahkan dengan cara dibakar dang bangkainya dikubur.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `mesin_inferensi`
--
ALTER TABLE `mesin_inferensi`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `p_ayambroiler`
--
ALTER TABLE `p_ayambroiler`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mesin_inferensi`
--
ALTER TABLE `mesin_inferensi`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT for table `p_ayambroiler`
--
ALTER TABLE `p_ayambroiler`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

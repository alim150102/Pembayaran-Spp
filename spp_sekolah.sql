-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 04, 2020 at 02:36 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spp_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(5) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `namalengkap` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`, `namalengkap`) VALUES
(1, 'admin', 'admin', 'Hari Aspriyono'),
(2, 'admin1', 'admin1', 'Agus Susanto'),
(3, 'user', 'user', 'Hari Aspriyono');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `idguru` int(5) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `namaguru` varchar(40) DEFAULT NULL,
  `alamat` varchar(25) NOT NULL,
  `telp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`idguru`, `nik`, `namaguru`, `alamat`, `telp`) VALUES
(10, '3371456798767654', 'Zunny Abu Ibtisam', 'Kedungwuni', '086456543212'),
(12, '3379098789876531', 'Urip Sumoharjo', 'Panjang', '085435654345'),
(13, '3373458767887656', 'Ahmad Shiddiq', 'Buaran', '087341876543'),
(14, '3377655676789345', 'Farhan Alexander', 'Kramatsari', '085342678546'),
(15, '3379876787321570', 'Drs Khusaeni', 'Wonopringgo', '084234376896'),
(16, '3378475843874758', 'Abdur Rozak', 'Klego', '087325645676');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `idsiswa` int(10) NOT NULL,
  `nis` varchar(10) DEFAULT NULL,
  `namasiswa` varchar(40) DEFAULT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `tahunajaran` varchar(10) DEFAULT NULL,
  `biaya` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`idsiswa`, `nis`, `namasiswa`, `kelas`, `tahunajaran`, `biaya`) VALUES
(26, '9471', 'Lutfi Faris Anam', 'Rekayasa Perangkat Lunak', '2019/2020', 420000),
(27, '9472', 'Muhammad Fathin Faikar', 'Rekayasa Perangkat Lunak', '2019/2020', 420000),
(28, '9473', 'Mubarak Ali Januar', 'Rekayasa Perangkat Lunak', '2019/2020', 420000),
(29, '9571', 'Syahrul Mumtaza', 'Teknik Sepeda Motor', '2019/2020', 420000),
(30, '9572', 'Muhammad Hamzah', 'Teknik Sepeda Motor', '2019/2020', 420000),
(31, '9573', 'Muammad Royyan', 'Teknik Sepeda Motor', '2019/2020', 420000);

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `idspp` int(100) NOT NULL,
  `idsiswa` int(10) DEFAULT NULL,
  `jatuhtempo` date DEFAULT NULL,
  `bulan` varchar(20) DEFAULT NULL,
  `nobayar` varchar(10) DEFAULT NULL,
  `tglbayar` date DEFAULT NULL,
  `jumlah` int(20) DEFAULT NULL,
  `ket` varchar(20) DEFAULT NULL,
  `idadmin` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`idspp`, `idsiswa`, `jatuhtempo`, `bulan`, `nobayar`, `tglbayar`, `jumlah`, `ket`, `idadmin`) VALUES
(217, 26, '2019-07-10', 'Juli 2019', NULL, NULL, 420000, NULL, NULL),
(218, 26, '2019-08-10', 'Agustus 2019', NULL, NULL, 420000, NULL, NULL),
(219, 26, '2019-09-10', 'September 2019', NULL, NULL, 420000, NULL, NULL),
(220, 26, '2019-10-10', 'Oktober 2019', NULL, NULL, 420000, NULL, NULL),
(221, 26, '2019-11-10', 'November 2019', NULL, NULL, 420000, NULL, NULL),
(222, 26, '2019-12-10', 'Desember 2019', NULL, NULL, 420000, NULL, NULL),
(223, 26, '2020-01-10', 'Januari 2020', NULL, NULL, 420000, NULL, NULL),
(224, 26, '2020-02-10', 'Februari 2020', NULL, NULL, 420000, NULL, NULL),
(225, 26, '2020-03-10', 'Maret 2020', NULL, NULL, 420000, NULL, NULL),
(226, 26, '2020-04-10', 'April 2020', NULL, NULL, 420000, NULL, NULL),
(227, 26, '2020-05-10', 'Mei 2020', NULL, NULL, 420000, NULL, NULL),
(228, 26, '2020-06-10', 'Juni 2020', NULL, NULL, 420000, NULL, NULL),
(229, 27, '2019-07-10', 'Juli 2019', NULL, NULL, 420000, NULL, NULL),
(230, 27, '2019-08-10', 'Agustus 2019', NULL, NULL, 420000, NULL, NULL),
(231, 27, '2019-09-10', 'September 2019', NULL, NULL, 420000, NULL, NULL),
(232, 27, '2019-10-10', 'Oktober 2019', NULL, NULL, 420000, NULL, NULL),
(233, 27, '2019-11-10', 'November 2019', NULL, NULL, 420000, NULL, NULL),
(234, 27, '2019-12-10', 'Desember 2019', NULL, NULL, 420000, NULL, NULL),
(235, 27, '2020-01-10', 'Januari 2020', NULL, NULL, 420000, NULL, NULL),
(236, 27, '2020-02-10', 'Februari 2020', NULL, NULL, 420000, NULL, NULL),
(237, 27, '2020-03-10', 'Maret 2020', NULL, NULL, 420000, NULL, NULL),
(238, 27, '2020-04-10', 'April 2020', NULL, NULL, 420000, NULL, NULL),
(239, 27, '2020-05-10', 'Mei 2020', NULL, NULL, 420000, NULL, NULL),
(240, 27, '2020-06-10', 'Juni 2020', NULL, NULL, 420000, NULL, NULL),
(241, 28, '2019-07-10', 'Juli 2019', '1912250001', '2019-12-25', 420000, 'LUNAS', 1),
(242, 28, '2019-08-10', 'Agustus 2019', '2001030001', '2020-01-03', 420000, 'LUNAS', 1),
(243, 28, '2019-09-10', 'September 2019', NULL, NULL, 420000, NULL, NULL),
(244, 28, '2019-10-10', 'Oktober 2019', NULL, NULL, 420000, NULL, NULL),
(245, 28, '2019-11-10', 'November 2019', NULL, NULL, 420000, NULL, NULL),
(246, 28, '2019-12-10', 'Desember 2019', NULL, NULL, 420000, NULL, NULL),
(247, 28, '2020-01-10', 'Januari 2020', NULL, NULL, 420000, NULL, NULL),
(248, 28, '2020-02-10', 'Februari 2020', NULL, NULL, 420000, NULL, NULL),
(249, 28, '2020-03-10', 'Maret 2020', NULL, NULL, 420000, NULL, NULL),
(250, 28, '2020-04-10', 'April 2020', NULL, NULL, 420000, NULL, NULL),
(251, 28, '2020-05-10', 'Mei 2020', NULL, NULL, 420000, NULL, NULL),
(252, 28, '2020-06-10', 'Juni 2020', NULL, NULL, 420000, NULL, NULL),
(253, 29, '2019-07-10', 'Juli 2019', '1912290001', '2019-12-29', 420000, 'LUNAS', 1),
(254, 29, '2019-08-10', 'Agustus 2019', NULL, NULL, 420000, NULL, NULL),
(255, 29, '2019-09-10', 'September 2019', NULL, NULL, 420000, NULL, NULL),
(256, 29, '2019-10-10', 'Oktober 2019', NULL, NULL, 420000, NULL, NULL),
(257, 29, '2019-11-10', 'November 2019', NULL, NULL, 420000, NULL, NULL),
(258, 29, '2019-12-10', 'Desember 2019', NULL, NULL, 420000, NULL, NULL),
(259, 29, '2020-01-10', 'Januari 2020', NULL, NULL, 420000, NULL, NULL),
(260, 29, '2020-02-10', 'Februari 2020', NULL, NULL, 420000, NULL, NULL),
(261, 29, '2020-03-10', 'Maret 2020', NULL, NULL, 420000, NULL, NULL),
(262, 29, '2020-04-10', 'April 2020', NULL, NULL, 420000, NULL, NULL),
(263, 29, '2020-05-10', 'Mei 2020', NULL, NULL, 420000, NULL, NULL),
(264, 29, '2020-06-10', 'Juni 2020', NULL, NULL, 420000, NULL, NULL),
(265, 30, '2019-07-10', 'Juli 2019', NULL, NULL, 420000, NULL, NULL),
(266, 30, '2019-08-10', 'Agustus 2019', NULL, NULL, 420000, NULL, NULL),
(267, 30, '2019-09-10', 'September 2019', NULL, NULL, 420000, NULL, NULL),
(268, 30, '2019-10-10', 'Oktober 2019', NULL, NULL, 420000, NULL, NULL),
(269, 30, '2019-11-10', 'November 2019', NULL, NULL, 420000, NULL, NULL),
(270, 30, '2019-12-10', 'Desember 2019', NULL, NULL, 420000, NULL, NULL),
(271, 30, '2020-01-10', 'Januari 2020', NULL, NULL, 420000, NULL, NULL),
(272, 30, '2020-02-10', 'Februari 2020', NULL, NULL, 420000, NULL, NULL),
(273, 30, '2020-03-10', 'Maret 2020', NULL, NULL, 420000, NULL, NULL),
(274, 30, '2020-04-10', 'April 2020', NULL, NULL, 420000, NULL, NULL),
(275, 30, '2020-05-10', 'Mei 2020', NULL, NULL, 420000, NULL, NULL),
(276, 30, '2020-06-10', 'Juni 2020', NULL, NULL, 420000, NULL, NULL),
(277, 31, '2019-07-10', 'Juli 2019', NULL, NULL, 420000, NULL, NULL),
(278, 31, '2019-08-10', 'Agustus 2019', NULL, NULL, 420000, NULL, NULL),
(279, 31, '2019-09-10', 'September 2019', NULL, NULL, 420000, NULL, NULL),
(280, 31, '2019-10-10', 'Oktober 2019', NULL, NULL, 420000, NULL, NULL),
(281, 31, '2019-11-10', 'November 2019', NULL, NULL, 420000, NULL, NULL),
(282, 31, '2019-12-10', 'Desember 2019', NULL, NULL, 420000, NULL, NULL),
(283, 31, '2020-01-10', 'Januari 2020', NULL, NULL, 420000, NULL, NULL),
(284, 31, '2020-02-10', 'Februari 2020', NULL, NULL, 420000, NULL, NULL),
(285, 31, '2020-03-10', 'Maret 2020', NULL, NULL, 420000, NULL, NULL),
(286, 31, '2020-04-10', 'April 2020', NULL, NULL, 420000, NULL, NULL),
(287, 31, '2020-05-10', 'Mei 2020', NULL, NULL, 420000, NULL, NULL),
(288, 31, '2020-06-10', 'Juni 2020', NULL, NULL, 420000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `walikelas`
--

CREATE TABLE `walikelas` (
  `kelas` varchar(50) NOT NULL,
  `idguru` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `walikelas`
--

INSERT INTO `walikelas` (`kelas`, `idguru`) VALUES
('Rekayasa Perangkat Lunak', 10),
('Teknik Instalasi Tenaga Listrik', 12),
('Teknik Sepeda Motor', 13),
('Teknik Kendaraan Ringan', 14),
('Teknik Permesinan', 15),
('Teknik Body Otomotif', 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`idguru`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`idsiswa`),
  ADD KEY `fk_kelas` (`kelas`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`idspp`),
  ADD KEY `fk_admin` (`idadmin`),
  ADD KEY `fk_siswa` (`idsiswa`);

--
-- Indexes for table `walikelas`
--
ALTER TABLE `walikelas`
  ADD PRIMARY KEY (`kelas`),
  ADD KEY `fk_guru` (`idguru`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `idguru` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `idsiswa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `idspp` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `fk_kelas` FOREIGN KEY (`kelas`) REFERENCES `walikelas` (`kelas`) ON UPDATE CASCADE;

--
-- Constraints for table `spp`
--
ALTER TABLE `spp`
  ADD CONSTRAINT `fk_admin` FOREIGN KEY (`idadmin`) REFERENCES `admin` (`idadmin`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_siswa` FOREIGN KEY (`idsiswa`) REFERENCES `siswa` (`idsiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `walikelas`
--
ALTER TABLE `walikelas`
  ADD CONSTRAINT `fk_guru` FOREIGN KEY (`idguru`) REFERENCES `guru` (`idguru`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

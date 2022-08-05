-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2022 at 03:45 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hate_if-7_kepegawaian`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `tampilK` ()   begin
select * from karyawan;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tampillog` ()   begin
select * from log_unit;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` enum('P','S','M') NOT NULL,
  `ket` enum('H','A','I') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `id_karyawan`, `tanggal`, `waktu`, `ket`) VALUES
(1, 1, '2022-08-05', 'P', 'H'),
(2, 2, '2022-08-05', 'P', 'H');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `unit` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `unit`) VALUES
(1, 'LimitMax', 'QA'),
(2, 'elsa', 'QC'),
(4, 'Abdul', 'Karyawan'),
(5, 'Hapsari', 'Admin');

--
-- Triggers `karyawan`
--
DELIMITER $$
CREATE TRIGGER `update_unit` BEFORE UPDATE ON `karyawan` FOR EACH ROW BEGIN
INSERT INTO log_unit
set nama = OLD.nama,
unit_lama = OLD.unit,
unit_baru = NEW.unit,
waktu = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `log_unit`
--

CREATE TABLE `log_unit` (
  `id_log` int(10) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `unit_lama` varchar(20) DEFAULT NULL,
  `unit_baru` varchar(20) DEFAULT NULL,
  `waktu` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_unit`
--

INSERT INTO `log_unit` (`id_log`, `nama`, `unit_lama`, `unit_baru`, `waktu`) VALUES
(1, 'LimitMax', 'Karyawan', 'QC', '2022-08-05'),
(2, 'elsa', 'QC', 'Qa', '2022-08-05'),
(3, 'elsa', 'Qa', 'QC', '2022-08-05'),
(4, 'Testing', 'Quality Control', 'Analyst System', '2022-08-05'),
(5, 'LimitMax', 'QC', 'QA', '2022-08-05');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `log_unit`
--
ALTER TABLE `log_unit`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `log_unit`
--
ALTER TABLE `log_unit`
  MODIFY `id_log` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

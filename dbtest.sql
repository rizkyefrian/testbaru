-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2021 at 04:14 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbltest`
--

CREATE TABLE `tbltest` (
  `id` int(11) NOT NULL,
  `uraian` varchar(25) NOT NULL,
  `prognosa` int(11) DEFAULT NULL,
  `rkap` int(11) DEFAULT NULL,
  `januari` int(11) DEFAULT NULL,
  `februari` int(11) DEFAULT NULL,
  `maret` int(11) DEFAULT NULL,
  `triwulan1` int(11) DEFAULT NULL,
  `april` int(11) DEFAULT NULL,
  `mei` int(11) DEFAULT NULL,
  `juni` int(11) DEFAULT NULL,
  `triwulan2` int(11) DEFAULT NULL,
  `juli` int(11) DEFAULT NULL,
  `agustus` int(11) DEFAULT NULL,
  `september` int(11) DEFAULT NULL,
  `triwulan3` int(11) DEFAULT NULL,
  `oktober` int(11) DEFAULT NULL,
  `november` int(11) DEFAULT NULL,
  `desember` int(11) DEFAULT NULL,
  `triwulan4` int(11) DEFAULT NULL,
  `jumlah_setahun` int(11) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbltest`
--

INSERT INTO `tbltest` (`id`, `uraian`, `prognosa`, `rkap`, `januari`, `februari`, `maret`, `triwulan1`, `april`, `mei`, `juni`, `triwulan2`, `juli`, `agustus`, `september`, `triwulan3`, `oktober`, `november`, `desember`, `triwulan4`, `jumlah_setahun`, `tahun`) VALUES
(1, 'TU/TB/TK', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2019),
(3, 'TBM', 200, 200, 200, 200, 200, 200, 200, 200, 200, 200, 200, 200, 200, 200, 200, 200, 200, 200, 200, 2019),
(8, 'TM', 300, 300, 300, 300, 300, 900, 300, 300, 300, 900, 300, 300, 300, 900, 300, 300, 300, 900, 4200, 2019);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbltest`
--
ALTER TABLE `tbltest`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbltest`
--
ALTER TABLE `tbltest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

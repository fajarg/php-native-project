-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2021 at 11:27 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `bmw`
--

CREATE TABLE `bmw` (
  `id` int(11) NOT NULL,
  `tipe_mobil` varchar(10) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `kode_mesin` varchar(6) DEFAULT NULL,
  `gambar` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bmw`
--

INSERT INTO `bmw` (`id`, `tipe_mobil`, `tahun`, `kode_mesin`, `gambar`) VALUES
(1, 'E36', '1991', 'M50B20', 'e36.png'),
(2, 'E46', '1998', 'M43B19', 'e46.png'),
(3, 'E60', '2007', 'N62B44', 'e60.png'),
(4, 'E90', '2006', 'N46B20', 'e90.png'),
(5, 'F30', '2011', 'N55', 'f30.png'),
(13, 'sa', 'sass', 'ad', '5fd0cfb07f58a.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'ferg', '$2y$10$9pDKgsHnC7sjCT5z4pOtSu7w1dNcYJ.sskPiLckWCf7j494dJwCDm'),
(3, 'admin', '$2y$10$YLgM6MLbe/M7SQq2r.0ABOWcmUDgFalzYjj2Bi8uvjLpqErIC6O6K');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bmw`
--
ALTER TABLE `bmw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bmw`
--
ALTER TABLE `bmw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

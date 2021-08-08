-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2019 at 08:12 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gunung`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_g`
--

CREATE TABLE `tb_g` (
  `nama` varchar(20) NOT NULL,
  `tinggi` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_g`
--

INSERT INTO `tb_g` (`nama`, `tinggi`) VALUES
('Sinabung', 2),
('Kerinci', 3),
('Gede', 1.8);

-- --------------------------------------------------------

--
-- Table structure for table `tb_gunung`
--

CREATE TABLE `tb_gunung` (
  `id` int(5) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `bentuk` varchar(20) NOT NULL,
  `tinggi` varchar(30) NOT NULL,
  `letusan_terakhir` varchar(30) NOT NULL,
  `gambar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gunung`
--

INSERT INTO `tb_gunung` (`id`, `nama`, `bentuk`, `tinggi`, `letusan_terakhir`, `gambar`) VALUES
(1, 'Sinabung', 'stratovulkan', '2,460 meter (8,07 ft)', '9 Juni 2019', 'Sinabung.jpg'),
(2, 'Kerinci', 'stratovulkan', '3,800 meter (12,47 ft)', '22 Juni 2004', 'kerinci.jpg'),
(3, 'Salak', 'stratovulkan	', '2,211 meter (7,25 ft)', '31 Januari 1938', 'salak.jpg'),
(4, 'Gede', 'stratovulkan', '2,958 meter (9,70 ft)', '13 Maret 1957', 'gede.jpg'),
(5, 'Tangkuban Perahu', 'stratovulkan', '2,084 meter (6,84 ft)', '2 Agustus 2019', 'tangkuban.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_gunung`
--
ALTER TABLE `tb_gunung`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_gunung`
--
ALTER TABLE `tb_gunung`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

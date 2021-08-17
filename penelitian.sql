-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2021 at 04:58 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penelitian`
--

-- --------------------------------------------------------

--
-- Table structure for table `hari_ini`
--

CREATE TABLE `hari_ini` (
  `id` int(12) NOT NULL,
  `no` int(12) NOT NULL,
  `tanggal` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hari_ini`
--

INSERT INTO `hari_ini` (`id`, `no`, `tanggal`) VALUES
(0, 1, '17-08-2021');

-- --------------------------------------------------------

--
-- Table structure for table `koordinat_pasar`
--

CREATE TABLE `koordinat_pasar` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lon` varchar(255) NOT NULL,
  `maps_link` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `koordinat_pasar`
--

INSERT INTO `koordinat_pasar` (`id`, `nama`, `lat`, `lon`, `maps_link`) VALUES
(1, 'Pasar Dinoyo', '-7.937595925575199', '112.60734900000138', 'https://goo.gl/maps/DngmebU919LsV1FPA'),
(2, 'Pasar Klojen', '-7.972012988750972', '112.63758656083965', 'https://goo.gl/maps/jqjYuAuSkBV8ivHN6'),
(3, 'Pasar Blimbing', '-7.937377740412265', '112.64724042321303', 'https://goo.gl/maps/Wr7szNDa9yPKiEDm7'),
(4, 'Pasar Oro-Oro Dowo', '-7.964805897847654', '112.63196755023232', 'https://goo.gl/maps/zCQN4sjqzF13krXk8'),
(5, 'Pasar Tawangwangu Malang Kota', '-7.955960817089377', '112.63866010046463', 'https://goo.gl/maps/KbGMSKwKn9xMFHtx6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hari_ini`
--
ALTER TABLE `hari_ini`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `koordinat_pasar`
--
ALTER TABLE `koordinat_pasar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hari_ini`
--
ALTER TABLE `hari_ini`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `koordinat_pasar`
--
ALTER TABLE `koordinat_pasar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

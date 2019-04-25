-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 25, 2019 at 08:34 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nebeng`
--

-- --------------------------------------------------------

--
-- Table structure for table `bengkel`
--

CREATE TABLE `bengkel` (
  `bk_id` smallint(6) NOT NULL,
  `bk_namabengkel` varchar(20) NOT NULL,
  `bk_deskripsi` varchar(100) NOT NULL,
  `bk_foto` varchar(20) NOT NULL,
  `bk_telpon` varchar(15) NOT NULL,
  `bk_long` float NOT NULL,
  `bk_lat` float NOT NULL,
  `bk_layanan` varchar(70) NOT NULL,
  `bk_kategori` tinyint(2) NOT NULL,
  `bk_pemilik` varchar(30) NOT NULL,
  `bk_availableday` varchar(20) NOT NULL,
  `bk_availabletime` varchar(15) NOT NULL,
  `bk_startdate` date NOT NULL,
  `bk_approved` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kt_id` tinyint(2) NOT NULL,
  `kt_kategori` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kt_id`, `kt_kategori`) VALUES
(1, 'motor'),
(2, 'mobil');

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `ul_id` smallint(6) NOT NULL,
  `ul_idbengkel` smallint(6) NOT NULL,
  `ul_user` varchar(30) NOT NULL,
  `ul_ulasan` varchar(50) NOT NULL,
  `ul_rating` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `us_email` varchar(30) NOT NULL,
  `us_password` varchar(15) NOT NULL,
  `us_nama` varchar(20) DEFAULT NULL,
  `us_nomorhp` varchar(15) DEFAULT NULL,
  `us_jk` enum('p','l') DEFAULT NULL,
  `us_pekerjaan` varchar(20) DEFAULT NULL,
  `us_profil` varchar(20) DEFAULT NULL,
  `us_level` tinyint(2) NOT NULL,
  `us_token` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`us_email`, `us_password`, `us_nama`, `us_nomorhp`, `us_jk`, `us_pekerjaan`, `us_profil`, `us_level`, `us_token`) VALUES
('admin', 'admin', NULL, NULL, NULL, NULL, NULL, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VybmFtZSI6ImFkbWluIiwibGV2ZWwiOjAsImxhc3RMb2dpbiI6IjIwMTktMDQtMjUgMDY6NTg6NTFhbSIsImlwYWRkcmVzcyI6IjEyNy4wLjAuMSJ9.78vJmmOT6NYPtu0keiOeGHZfbFxRuyBnuWtQnv1ZjEE'),
('public', 'public', NULL, NULL, NULL, NULL, NULL, 2, '1234567');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bengkel`
--
ALTER TABLE `bengkel`
  ADD PRIMARY KEY (`bk_id`),
  ADD KEY `pemilik` (`bk_pemilik`),
  ADD KEY `kategori` (`bk_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kt_id`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`ul_id`),
  ADD KEY `bengkel` (`ul_idbengkel`),
  ADD KEY `user` (`ul_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`us_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bengkel`
--
ALTER TABLE `bengkel`
  MODIFY `bk_id` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kt_id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `ul_id` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bengkel`
--
ALTER TABLE `bengkel`
  ADD CONSTRAINT `kategori` FOREIGN KEY (`bk_kategori`) REFERENCES `kategori` (`kt_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemilik` FOREIGN KEY (`bk_pemilik`) REFERENCES `user` (`us_email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `bengkel` FOREIGN KEY (`ul_idbengkel`) REFERENCES `bengkel` (`bk_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user` FOREIGN KEY (`ul_user`) REFERENCES `user` (`us_email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

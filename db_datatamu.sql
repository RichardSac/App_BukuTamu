-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2023 at 11:19 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_datatamu`
--

-- --------------------------------------------------------

--
-- Table structure for table `tagenda`
--

CREATE TABLE `tagenda` (
  `id_user` int(11) NOT NULL,
  `nouser` varchar(25) DEFAULT NULL,
  `notulen` varchar(150) DEFAULT NULL,
  `notulensi` varchar(25) DEFAULT NULL,
  `file` varchar(25) DEFAULT NULL,
  `update_at` varchar(25) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbukutamu`
--

CREATE TABLE `tbukutamu` (
  `id_user` int(11) NOT NULL,
  `nouser` varchar(30) DEFAULT NULL,
  `kategori` varchar(30) DEFAULT NULL,
  `tanggal` varchar(30) DEFAULT NULL,
  `waktu` varchar(30) DEFAULT NULL,
  `bertemu` varchar(30) DEFAULT NULL,
  `keterangan` varchar(30) DEFAULT NULL,
  `namalengkap` varchar(25) NOT NULL,
  `status_user` int(11) NOT NULL DEFAULT 1,
  `update_at` varchar(30) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tdokumen`
--

CREATE TABLE `tdokumen` (
  `id_user` int(11) NOT NULL,
  `nouser` varchar(25) DEFAULT NULL,
  `namafile` varchar(25) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `status_user` int(11) NOT NULL DEFAULT 1,
  `update_at` varchar(25) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tkategori`
--

CREATE TABLE `tkategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `deskripsi` varchar(50) DEFAULT NULL,
  `status_user` int(11) NOT NULL DEFAULT 1,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `create_at` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tuser`
--

CREATE TABLE `tuser` (
  `id_user` int(11) NOT NULL,
  `nouser` varchar(25) DEFAULT NULL,
  `namalengkap` varchar(25) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `role` varchar(25) DEFAULT NULL,
  `status_user` int(11) DEFAULT 1,
  `create_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tuser`
--

INSERT INTO `tuser` (`id_user`, `nouser`, `namalengkap`, `username`, `password`, `role`, `status_user`, `create_at`, `update_at`) VALUES
(1, '113523', 'Richard Sachio', 'richardsac', '1212ricric', 'user', 1, '2023-03-01 09:18:36', NULL),
(2, '12312', 'Richard Sachio', 'richardsachio@gmail.com', 'user', 'user', 1, '2023-03-01 09:19:21', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tagenda`
--
ALTER TABLE `tagenda`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbukutamu`
--
ALTER TABLE `tbukutamu`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tdokumen`
--
ALTER TABLE `tdokumen`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tkategori`
--
ALTER TABLE `tkategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tuser`
--
ALTER TABLE `tuser`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tagenda`
--
ALTER TABLE `tagenda`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbukutamu`
--
ALTER TABLE `tbukutamu`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tdokumen`
--
ALTER TABLE `tdokumen`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tkategori`
--
ALTER TABLE `tkategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tuser`
--
ALTER TABLE `tuser`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

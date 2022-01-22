-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2022 at 04:15 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koi_farm`
--

-- --------------------------------------------------------

--
-- Table structure for table `koleksi`
--

CREATE TABLE `koleksi` (
  `id_ikan` int(11) NOT NULL,
  `nama_ikan` varchar(128) DEFAULT NULL,
  `kategori` varchar(128) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `usia` int(2) NOT NULL,
  `ukuran` int(2) NOT NULL,
  `kelamin` varchar(128) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `koleksi`
--

INSERT INTO `koleksi` (`id_ikan`, `nama_ikan`, `kategori`, `deskripsi`, `usia`, `ukuran`, `kelamin`, `gambar`) VALUES
(18, 'koi showa', 'showa', 'dominan orange', 32, 230, 'dsfg', 'sanke13.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `password`, `role_id`, `is_active`, `date_created`, `image`) VALUES
(14, 'user', 'user@mail.com', '1234567890', '$2y$10$4mpeLVwHFYHyqylokEL8IePWEOJiG5zB/pdoUX8Ajtk36gQRQhbka', 2, 1, 1642469622, 'default.jpg'),
(15, 'Admin', 'admin@mail.com', '987654321', '$2y$10$cy3jSPqEkIBNOulwZtkKu.aTSWIsFHKaCtRUVRQjgfedWIiin7wwy', 2, 1, 1642469694, 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `koleksi`
--
ALTER TABLE `koleksi`
  ADD PRIMARY KEY (`id_ikan`),
  ADD UNIQUE KEY `id_ikan` (`id_ikan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`name`,`email`,`phone`,`password`(255),`role_id`,`is_active`,`date_created`,`image`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `koleksi`
--
ALTER TABLE `koleksi`
  MODIFY `id_ikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2020 at 07:22 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii`
--

-- --------------------------------------------------------

--
-- Table structure for table `coment`
--

CREATE TABLE `coment` (
  `id_coment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_sub_coment` int(11) NOT NULL,
  `isi_coment` varchar(255) NOT NULL,
  `tgl_coment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `id_sub_menu` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id_page` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi_page` varchar(255) NOT NULL,
  `tgl_buat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_coment` int(11) NOT NULL,
  `judul` int(11) NOT NULL,
  `isi` int(11) NOT NULL,
  `icon` int(11) NOT NULL,
  `gambar` int(11) NOT NULL,
  `link` int(11) NOT NULL,
  `tgl_buat` int(11) NOT NULL,
  `tgl_ubah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu`
--

CREATE TABLE `sub_menu` (
  `id_sub_menu` int(11) NOT NULL,
  `nama_sub_menu` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tgl_buat` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `email`, `tgl_buat`, `role`) VALUES
(1, 'admin', '5414450', 'luthfi', 'bilqimlb@gmail.com', '16/07/2020', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coment`
--
ALTER TABLE `coment`
  ADD PRIMARY KEY (`id_coment`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id_page`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`id_sub_menu`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coment`
--
ALTER TABLE `coment`
  MODIFY `id_coment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id_page` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `id_sub_menu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

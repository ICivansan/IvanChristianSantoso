-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 06:08 PM
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
-- Database: `daur_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE `alamat` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `label_add` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `f_add` varchar(100) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `kecmtn` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`id`, `user_id`, `label_add`, `nama`, `nohp`, `f_add`, `kota`, `kecmtn`) VALUES
(9, 9, 'Rumah Randy', 'Randy', '08123456789', 'Jl. cipinang muara', 'Jakarta Barat', 'Kebon Jeruk'),
(10, 10, 'Rumah Irvin', 'Irvin', '123456789', 'Jl. tebet utara', 'Jakarta Timur', 'Tebet'),
(11, 12, 'Rumah Ale', 'Ale', '0987654321', 'Jl. wapati', 'Jakarta Timur', 'Jatinegara'),
(12, 11, 'Rumah Melvin', 'Melvin', '0123456789', 'Jl. bsd', 'Tanggerang', 'rangrang'),
(13, 13, 'Rumah ivan', 'Ivan', '08191234567', 'Jl. bsd', 'Jakarta Timur', 'Jatinegara');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nama` varchar(10) DEFAULT 'transaksi',
  `berat` int(3) NOT NULL,
  `pts` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `user_id`, `nama`, `berat`, `pts`) VALUES
(11, 9, 'transaksi', 1, 2000),
(12, 9, 'transaksi', 2, 4000),
(13, 9, 'transaksi', 1, 2000),
(14, 9, 'transaksi', 1, 2000),
(15, 9, 'transaksi', 1, 2000),
(16, 10, 'transaksi', 1, 2000),
(17, 12, 'transaksi', 1, 2000),
(18, 11, 'transaksi', 5, 10000),
(19, 13, 'transaksi', 1, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `trans`
--

CREATE TABLE `trans` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `berat` int(3) NOT NULL,
  `total` int(10) NOT NULL,
  `sampah` varchar(20) DEFAULT NULL,
  `stat` enum('not','confirm') DEFAULT 'not'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `sandi` varchar(10) NOT NULL,
  `u_pts` int(10) DEFAULT 0,
  `trs` int(4) DEFAULT 0,
  `income` int(10) DEFAULT 0,
  `wait` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `nohp`, `sandi`, `u_pts`, `trs`, `income`, `wait`) VALUES
(9, 'Randy', '08123456789', 'ucup1509', 0, 5, 5, 0),
(10, 'Irvin', '123456789', 'irvin123', 0, 1, 1, 0),
(11, 'Melvin', '0123456789', 'melvin123', 0, 1, 1, 0),
(12, 'Ale', '0987654321', 'ale123', 0, 1, 1, 0),
(13, 'Ivan', '08191234567', 'ivan123', 0, 1, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans`
--
ALTER TABLE `trans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alamat`
--
ALTER TABLE `alamat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `trans`
--
ALTER TABLE `trans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alamat`
--
ALTER TABLE `alamat`
  ADD CONSTRAINT `alamat_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `trans`
--
ALTER TABLE `trans`
  ADD CONSTRAINT `trans_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

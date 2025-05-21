-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2025 at 09:18 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web-crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbarang`
--

CREATE TABLE `tbarang` (
  `id_barang` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jenis_barang` varchar(255) NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `tggl_titip` date NOT NULL,
  `tggl_ambil` date DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbarang`
--

INSERT INTO `tbarang` (`id_barang`, `nama_pelanggan`, `nama_barang`, `jenis_barang`, `tempat`, `tggl_titip`, `tggl_ambil`, `status`) VALUES
(1, 'Siti Khadijah', 'Laptop Acer A45', 'Elektronik', 'Rak 2', '2025-05-07', '2025-05-14', 'Diambil'),
(2, 'Muhammad Amir', 'Emas', 'Non-Elektronik', 'Rak 2', '2025-05-14', '2025-05-14', 'Diambil'),
(4, 'Agus Arifin', 'Oppo Find X', 'Elektronik', 'Rak 2', '2025-05-07', '2025-05-14', 'Diambil'),
(5, 'Muhammad Faturrahman', 'Xiaomi Redmi 15', 'Elektronik', 'Rak 1', '2025-05-01', NULL, 'Disimpan'),
(6, 'Rahmat Darmawan', 'Laptop Asus A455U', 'Elektronik', 'Rak 2', '2025-05-07', NULL, 'Disimpan'),
(7, 'Adelia Nur', 'Sepatu Lari', 'Non-Elektronik', 'Rak 3', '2025-05-14', NULL, 'Disimpan'),
(8, 'Budiman', 'Buku', 'Non-Elektronik', 'Rak 4', '2025-05-13', NULL, 'Disimpan'),
(9, 'Muhammad Bima', 'Raket Bulu tangkis', 'Non-Elektronik', 'Rak 3', '2025-05-14', NULL, 'Disimpan');

-- --------------------------------------------------------

--
-- Table structure for table `tuser`
--

CREATE TABLE `tuser` (
  `id` int(50) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tuser`
--

INSERT INTO `tuser` (`id`, `nama`, `email`, `username`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'user', 'user@gmail.com', 'user', 'ee11cbb19052e40b07aac0ca060c23ee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbarang`
--
ALTER TABLE `tbarang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tuser`
--
ALTER TABLE `tuser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbarang`
--
ALTER TABLE `tbarang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tuser`
--
ALTER TABLE `tuser`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

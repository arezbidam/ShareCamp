-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2021 at 04:40 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstoneproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(50) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `foto_barang_path` varchar(255) NOT NULL,
  `kategori_barang` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `stok` int(50) NOT NULL,
  `harga` decimal(19,2) NOT NULL,
  `status` varchar(50) NOT NULL,
  `id_toko` int(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `foto_barang_path`, `kategori_barang`, `deskripsi`, `stok`, `harga`, `status`, `id_toko`, `created_at`, `updated_at`) VALUES
(6, 'kasur', '2_1639076788_ebd6fc1aad35c7b4c4a6.png', '1', 'Tenda Berkemah dengan Lubang Ventilasi, Tahan Angin, Tahan Hujan, Tabir Surya, Perlindungan Ultraviolet, Tenda Gazebo Instan', 23, '10000.00', 'Tersedia', 2, '2021-12-09 06:06:28', '2021-12-10 03:00:31'),
(7, 'barang 2', '2_1639099320_ae3060a4458e71bf74b2.png', '1', 'loremloremloremloremloremloremlorem\r\n', 12, '20000.00', 'Tersedia', 2, '2021-12-09 12:22:00', '2021-12-10 03:00:36'),
(8, 'barang 3', '2_1639099529_d2b66445d8e0aa4e6678.png', '1', 'qs', 11, '30000.00', 'Tersedia', 2, '2021-12-09 12:25:29', '2021-12-10 03:00:43'),
(9, 'barang 4', '2_1639099549_60aaf31744a9af69065d.png', '1', 'dscsd', 12, '400000.00', 'Tersedia', 2, '2021-12-09 12:25:49', '2021-12-10 03:00:47'),
(10, 'barang x', '2_1639099320_ae3060a4458e71bf74b2.png', 'tenda', 'sASA', 23, '450000.00', '', 3, '2021-12-10 02:05:06', '2021-12-10 03:00:53');

-- --------------------------------------------------------

--
-- Table structure for table `tb_categories`
--

CREATE TABLE `tb_categories` (
  `id_categories` int(100) NOT NULL,
  `nama_categories` varchar(100) NOT NULL,
  `keterangan_categories` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_categories`
--

INSERT INTO `tb_categories` (`id_categories`, `nama_categories`, `keterangan_categories`) VALUES
(1, 'Tenda', 'Tenda adalah tempat pelindung yang terdiri dari lembaran kain atau bahan lainnya menutupi yang melekat pada kerangka tiang atau menempel pada tali pendukung.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id_login` int(5) NOT NULL,
  `email` int(50) NOT NULL,
  `password` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_toko`
--

CREATE TABLE `tb_toko` (
  `id_toko` int(50) NOT NULL,
  `nama_toko` varchar(100) NOT NULL,
  `kota_toko` varchar(255) DEFAULT NULL,
  `alamat_toko` text NOT NULL,
  `no_telp_toko` varchar(50) NOT NULL,
  `deskripsi_toko` text NOT NULL,
  `status_toko` varchar(100) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_toko`
--

INSERT INTO `tb_toko` (`id_toko`, `nama_toko`, `kota_toko`, `alamat_toko`, `no_telp_toko`, `deskripsi_toko`, `status_toko`, `id_user`, `created_at`, `updated_at`) VALUES
(2, 'rental cirebon', 'cirebon', 'jln. lobunta raya', '085324009008', '<p>toko rental alat2 outdoor</p>', 'Menunggu Konfirmasi', '13', '2021-12-05 23:46:21', '2021-12-10 02:01:54'),
(3, 'bandung store', 'bandung', '', '', '', '', '16', '2021-12-10 02:03:05', '2021-12-10 02:04:20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_ktp` varchar(50) DEFAULT NULL,
  `kota` varchar(100) DEFAULT NULL,
  `alamat` varchar(500) DEFAULT NULL,
  `no_tlp` varchar(50) DEFAULT NULL,
  `no_rek` varchar(50) DEFAULT NULL,
  `nama_bank` varchar(100) DEFAULT NULL,
  `atas_nama_bank` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `email`, `password`, `nama`, `no_ktp`, `kota`, `alamat`, `no_tlp`, `no_rek`, `nama_bank`, `atas_nama_bank`, `created_at`, `updated_at`) VALUES
(13, 'adji@gmail.com', '123', 'adji putra nugraha', NULL, 'Bandung', 'Jl. Sukasari 2', '085155299774', '111', 'BCA', 'adji nugraha', '2021-12-09 07:36:25', '2021-12-09 19:39:08'),
(16, 'nugraha@gmail.com', '123', 'nugraha', NULL, 'cirebon', 'Jl. Sukasari 2', '08777', '000', 'BRI', 'Nugraha Nugraha', '2021-12-09 07:44:29', '2021-12-09 08:06:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_categories`
--
ALTER TABLE `tb_categories`
  ADD PRIMARY KEY (`id_categories`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `tb_toko`
--
ALTER TABLE `tb_toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_categories`
--
ALTER TABLE `tb_categories`
  MODIFY `id_categories` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id_login` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_toko`
--
ALTER TABLE `tb_toko`
  MODIFY `id_toko` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

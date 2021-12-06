-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2021 at 12:50 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

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
  `nama_barang` varchar(100) NOT NULL,
  `foto_barang_path` varchar(255) NOT NULL,
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

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `foto_barang_path`, `deskripsi`, `stok`, `harga`, `status`, `id_toko`, `created_at`, `updated_at`) VALUES
(1, 'Tenda Berkemah dengan Lubang Ventilasi, Tahan Angin, Tahan Hujan, Tabir Surya, Perlindungan Ultravio', '1_1638788701_d6db3e6f4ea267f4fcea.png', 'Rincian cepat\r\nTempat asal:\r\nChina\r\nNama merek:\r\nmoqiyi\r\nNomor model:\r\nMQ-1111\r\nKain:\r\nOxford cloth\r\nDaerah:\r\n3*3M\r\nTenda Gaya:\r\nLurus Bracing Tipe\r\nMusim:\r\nEmpat Musim Tenda\r\nStruktur:\r\nSatu Kamar Tidur\r\nTipe Bangunan:\r\nKonstruksi Berdasarkan Kebutuhan\r\nIndeks Tahan Air Bagian Bawah:\r\n2000-3000 mm\r\nIndeks Tahan Air Tenda Luar:\r\n2000-3000 mm\r\ncolor:\r\nBlue with white\r\nSize:\r\n3*3M\r\nUse:\r\nFamily tents for PICNIC CAMPING\r\nColor:\r\nBlue with white', 10, '40000.00', 'Tersedia', 1, '2021-12-05 22:05:01', '2021-12-05 22:05:01');

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

INSERT INTO `tb_toko` (`id_toko`, `nama_toko`, `alamat_toko`, `no_telp_toko`, `deskripsi_toko`, `status_toko`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'rental cirebon', 'jln. lobunta raya', '085324009008', '<p>toko rental alat-alat outdoor</p>', 'Menunggu Konfirmasi', '1', '2021-12-05 14:15:14', '2021-12-05 14:15:14');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `email`, `password`, `nama`) VALUES
(1, 'adji@gmail.com', '12345', 'adji nugraha'),
(2, 'putra@gmail.com', '54321', 'putra nugraha');

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
  MODIFY `id_barang` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id_toko` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2021 at 01:13 AM
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
-- Database: `db_sharecamp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(100) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `keterangan_kategori` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`, `keterangan_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Tenda', 'Tenda adalah tempat pelindung yang terdiri dari lembaran kain atau bahan lainnya menutupi yang melekat pada kerangka tiang atau menempel pada tali pendukung.', '2021-12-10 10:20:36', '2021-12-09 21:38:58'),
(2, 'Sleeping Bag', 'sebuah kantong tidur yang bisa digunakan untuk kegiatan outdoor', '2021-12-09 21:20:44', '2021-12-09 21:20:44');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `id_keranjang` int(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `id_toko` int(255) NOT NULL,
  `id_produk` int(255) NOT NULL,
  `jumlah_sewa` int(50) NOT NULL,
  `tgl_mulai_sewa` date NOT NULL,
  `tgl_berakhir_sewa` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_keranjang`
--

INSERT INTO `tb_keranjang` (`id_keranjang`, `id_user`, `id_toko`, `id_produk`, `jumlah_sewa`, `tgl_mulai_sewa`, `tgl_berakhir_sewa`, `created_at`, `updated_at`) VALUES
(5, 'U211217001', 3, 3, 1, '2021-12-21', '2021-12-23', '2021-12-19 21:06:06', '2021-12-19 21:06:06'),
(8, 'U211220001', 3, 5, 1, '2021-12-23', '2021-12-25', '2021-12-22 15:46:45', '2021-12-22 15:46:45');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id_login` int(5) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hak_akses` varchar(100) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id_login`, `email`, `password`, `hak_akses`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'clarence@gmail.com', '12345', 'user', 'U211217001', '2021-12-17 11:08:00', '2021-12-17 11:08:00'),
(2, 'adji@gmail.com', '123', 'user', 'U211220001', '2021-12-19 22:09:33', '2021-12-19 22:09:33'),
(3, 'arissetiana93@gmail.com', '123', 'user', 'U211221001', '2021-12-21 01:51:05', '2021-12-21 01:51:05'),
(4, 'admin@gmail.com', 'admin', 'administrator', 'U211221002', '2021-12-21 01:55:33', '2021-12-21 02:03:55');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `no_pesanan` varchar(100) NOT NULL,
  `tgl_pesanan` date NOT NULL,
  `id_toko` varchar(100) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `total_biaya_pesanan` decimal(19,2) NOT NULL,
  `sudah_bayar` decimal(19,2) NOT NULL,
  `sisa_bayar` decimal(19,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`no_pesanan`, `tgl_pesanan`, `id_toko`, `id_user`, `total_biaya_pesanan`, `sudah_bayar`, `sisa_bayar`, `created_at`, `updated_at`) VALUES
('P211222001', '2021-12-22', '3', 'U211220001', '95000.00', '0.00', '0.00', '2021-12-21 23:25:33', '2021-12-21 23:25:33');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan_detail`
--

CREATE TABLE `tb_pesanan_detail` (
  `id_pesanan_detail` int(255) NOT NULL,
  `no_pesanan` varchar(100) NOT NULL,
  `id_produk` int(255) NOT NULL,
  `jumlah_sewa` int(50) NOT NULL,
  `tgl_mulai_sewa` date NOT NULL,
  `tgl_berakhir_sewa` date NOT NULL,
  `harga_sewa_per_hari` decimal(19,2) NOT NULL,
  `lama_sewa` int(11) NOT NULL,
  `total_biaya_sewa` decimal(19,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pesanan_detail`
--

INSERT INTO `tb_pesanan_detail` (`id_pesanan_detail`, `no_pesanan`, `id_produk`, `jumlah_sewa`, `tgl_mulai_sewa`, `tgl_berakhir_sewa`, `harga_sewa_per_hari`, `lama_sewa`, `total_biaya_sewa`, `created_at`, `updated_at`) VALUES
(11, 'P211222001', 3, 1, '2021-12-21', '2021-12-23', '40000.00', 2, '80000.00', '2021-12-21 23:25:33', '2021-12-21 23:25:33'),
(12, 'P211222001', 5, 1, '2021-12-22', '2021-12-23', '15000.00', 1, '15000.00', '2021-12-21 23:25:33', '2021-12-21 23:25:33');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(50) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `img_path` varchar(255) NOT NULL,
  `kategori_produk` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `stok` int(50) NOT NULL,
  `harga` decimal(19,2) NOT NULL,
  `status` varchar(50) NOT NULL,
  `id_toko` int(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk`, `img_path`, `kategori_produk`, `deskripsi`, `stok`, `harga`, `status`, `id_toko`, `created_at`, `updated_at`) VALUES
(3, 'Tenda', '3_1639982578_336b902ba7c29764b951.png', '1', '<p>Tenda Kapasitas 4 orang</p>', 10, '40000.00', 'Tersedia', 3, '2021-12-19 17:42:58', '2021-12-19 17:42:58'),
(4, 'Tenda 1', '3_1639982662_5739f1ee52771ae5b056.png', '1', '<p>Tenda Kapasitas 6 orang</p>', 10, '50000.00', 'Tersedia', 3, '2021-12-19 17:44:22', '2021-12-19 17:44:22'),
(5, 'Tenda Dom', '3_1639982689_5df6117b00db7d5066d4.png', '1', '<p>kapasitas 2 orang</p>', 5, '15000.00', 'Tersedia', 3, '2021-12-19 17:44:49', '2021-12-19 17:44:49');

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
(3, 'LemonStore', 'Cirebon', 'jln. pilang raya', '085324009008', 'menjual alat-alat outdoor', 'APPROVED', 'U211217001', '2021-12-18 11:54:41', '2021-12-21 02:15:49'),
(4, 'bandung store', 'bandung', 'bandung', '085324009008', 'lorem ipsum', 'APPROVED', 'U211220001', '2021-12-19 22:11:40', '2021-12-21 02:15:47'),
(5, 'CampCirebon', 'cirebon', 'jln. perjuangan no 48', '000', 'tempat sewa alat2 outdoor', 'APPROVED', 'U211221001', '2021-12-21 01:57:51', '2021-12-21 02:15:45');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_ktp` varchar(50) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `no_rek` varchar(50) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `atas_nama_bank` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `no_ktp`, `kota`, `alamat`, `no_telp`, `no_rek`, `nama_bank`, `atas_nama_bank`, `created_at`, `updated_at`) VALUES
('U211217001', 'CLARENCE TAYLOR', '327409384567', '', 'cirebon', '085434354', '324005', 'BRI', 'Clarence Taylor', '2021-12-17 11:07:59', '2021-12-17 15:20:57'),
('U211220001', 'adji', '327409384566', 'Cirebon', 'jl. bandung raya', '085324409333', '324', 'BRI', 'adji', '2021-12-19 22:09:33', '2021-12-20 12:40:39'),
('U211221001', 'arez', '327409384567', 'cirebon', 'jln. pilang raya', '085224224224', '324005', 'BRI', 'arez', '2021-12-21 01:51:05', '2021-12-21 01:51:05'),
('U211221002', 'admin', '327409384566', 'cirebon', 'jln lorem ipsum', '085224224224', '324005', 'BNI', 'admin', '2021-12-21 01:55:33', '2021-12-21 01:55:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`no_pesanan`);

--
-- Indexes for table `tb_pesanan_detail`
--
ALTER TABLE `tb_pesanan_detail`
  ADD PRIMARY KEY (`id_pesanan_detail`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

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
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id_keranjang` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id_login` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pesanan_detail`
--
ALTER TABLE `tb_pesanan_detail`
  MODIFY `id_pesanan_detail` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_toko`
--
ALTER TABLE `tb_toko`
  MODIFY `id_toko` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

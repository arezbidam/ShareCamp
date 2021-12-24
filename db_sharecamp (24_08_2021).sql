-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2021 at 02:33 AM
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
-- Table structure for table `tb_join_sharecamp`
--

CREATE TABLE `tb_join_sharecamp` (
  `id_join_sharecamp` int(255) NOT NULL,
  `no_sharecamp` varchar(100) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `tb_kota`
--

CREATE TABLE `tb_kota` (
  `id_kota` int(11) NOT NULL,
  `nama_kota` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_kota`
--

INSERT INTO `tb_kota` (`id_kota`, `nama_kota`) VALUES
(1, 'PIDIE JAYA'),
(2, 'SIMEULUE'),
(3, 'BIREUEN'),
(4, 'ACEH TIMUR'),
(5, 'ACEH UTARA'),
(6, 'PIDIE'),
(7, 'ACEH BARAT DAYA'),
(8, 'GAYO LUES'),
(9, 'ACEH SELATAN'),
(10, 'ACEH TAMIANG'),
(11, 'ACEH BESAR'),
(12, 'ACEH TENGGARA'),
(13, 'BENER MERIAH'),
(14, 'ACEH JAYA'),
(15, 'LHOKSEUMAWE'),
(16, 'ACEH BARAT'),
(17, 'NAGAN RAYA'),
(18, 'LANGSA'),
(19, 'BANDA ACEH'),
(20, 'ACEH SINGKIL'),
(21, 'SABANG'),
(22, 'ACEH TENGAH'),
(23, 'SUBULUSSALAM'),
(24, 'NIAS SELATAN'),
(25, 'MANDAILING NATAL'),
(26, 'DAIRI'),
(27, 'LABUHAN BATU UTARA'),
(28, 'TAPANULI UTARA'),
(29, 'SIMALUNGUN'),
(30, 'LANGKAT'),
(31, 'SERDANG BEDAGAI'),
(32, 'TAPANULI SELATAN'),
(33, 'ASAHAN'),
(34, 'PADANG LAWAS UTARA'),
(35, 'PADANG LAWAS'),
(36, 'LABUHAN BATU SELATAN'),
(37, 'PADANG SIDEMPUAN'),
(38, 'TOBA SAMOSIR'),
(39, 'TAPANULI TENGAH'),
(40, 'HUMBANG HASUNDUTAN'),
(41, 'SIBOLGA'),
(42, 'BATU BARA'),
(43, 'SAMOSIR'),
(44, 'PEMATANG SIANTAR'),
(45, 'LABUHAN BATU'),
(46, 'DELI SERDANG'),
(47, 'GUNUNGSITOLI'),
(48, 'NIAS UTARA'),
(49, 'NIAS'),
(50, 'KARO'),
(51, 'NIAS BARAT'),
(52, 'MEDAN'),
(53, 'PAKPAK BHARAT'),
(54, 'TEBING TINGGI'),
(55, 'BINJAI'),
(56, 'TANJUNG BALAI'),
(57, 'DHARMASRAYA'),
(58, 'SOLOK SELATAN'),
(59, 'SIJUNJUNG (SAWAH LUNTO SIJUNJUNG)'),
(60, 'PASAMAN BARAT'),
(61, 'SOLOK'),
(62, 'PASAMAN'),
(63, 'PARIAMAN'),
(64, 'TANAH DATAR'),
(65, 'PADANG PARIAMAN'),
(66, 'PESISIR SELATAN'),
(67, 'PADANG'),
(68, 'SAWAH LUNTO'),
(69, 'LIMA PULUH KOTO / KOTA'),
(70, 'AGAM'),
(71, 'PAYAKUMBUH'),
(72, 'BUKITTINGGI'),
(73, 'PADANG PANJANG'),
(74, 'KEPULAUAN MENTAWAI'),
(75, 'INDRAGIRI HILIR'),
(76, 'KUANTAN SINGINGI'),
(77, 'PELALAWAN'),
(78, 'PEKANBARU'),
(79, 'ROKAN HILIR'),
(80, 'BENGKALIS'),
(81, 'INDRAGIRI HULU'),
(82, 'ROKAN HULU'),
(83, 'KAMPAR'),
(84, 'KEPULAUAN MERANTI'),
(85, 'DUMAI'),
(86, 'SIAK'),
(87, 'TEBO'),
(88, 'TANJUNG JABUNG BARAT'),
(89, 'MUARO JAMBI'),
(90, 'KERINCI'),
(91, 'MERANGIN'),
(92, 'BUNGO'),
(93, 'TANJUNG JABUNG TIMUR'),
(94, 'SUNGAIPENUH'),
(95, 'BATANG HARI'),
(96, 'JAMBI'),
(97, 'SAROLANGUN'),
(98, 'PALEMBANG'),
(99, 'LAHAT'),
(100, 'OGAN KOMERING ULU TIMUR'),
(101, 'MUSI BANYUASIN'),
(102, 'PAGAR ALAM'),
(103, 'OGAN KOMERING ULU SELATAN'),
(104, 'BANYUASIN'),
(105, 'MUSI RAWAS'),
(106, 'MUARA ENIM'),
(107, 'OGAN KOMERING ULU'),
(108, 'OGAN KOMERING ILIR'),
(109, 'EMPAT LAWANG'),
(110, 'LUBUK LINGGAU'),
(111, 'PRABUMULIH'),
(112, 'OGAN ILIR'),
(113, 'BENGKULU TENGAH'),
(114, 'REJANG LEBONG'),
(115, 'MUKO MUKO'),
(116, 'KAUR'),
(117, 'BENGKULU UTARA'),
(118, 'LEBONG'),
(119, 'KEPAHIANG'),
(120, 'BENGKULU SELATAN'),
(121, 'SELUMA'),
(122, 'BENGKULU'),
(123, 'LAMPUNG UTARA'),
(124, 'WAY KANAN'),
(125, 'LAMPUNG TENGAH'),
(126, 'MESUJI'),
(127, 'PRINGSEWU'),
(128, 'LAMPUNG TIMUR'),
(129, 'LAMPUNG SELATAN'),
(130, 'TULANG BAWANG'),
(131, 'TULANG BAWANG BARAT'),
(132, 'TANGGAMUS'),
(133, 'LAMPUNG BARAT'),
(134, 'PESISIR BARAT'),
(135, 'PESAWARAN'),
(136, 'BANDAR LAMPUNG'),
(137, 'METRO'),
(138, 'BELITUNG'),
(139, 'BELITUNG TIMUR'),
(140, 'BANGKA'),
(141, 'BANGKA SELATAN'),
(142, 'BANGKA BARAT'),
(143, 'PANGKAL PINANG'),
(144, 'BANGKA TENGAH'),
(145, 'KEPULAUAN ANAMBAS'),
(146, 'BINTAN'),
(147, 'NATUNA'),
(148, 'BATAM'),
(149, 'TANJUNG PINANG'),
(150, 'KARIMUN'),
(151, 'LINGGA'),
(152, 'JAKARTA UTARA'),
(153, 'JAKARTA BARAT'),
(154, 'JAKARTA TIMUR'),
(155, 'JAKARTA SELATAN'),
(156, 'JAKARTA PUSAT'),
(157, 'KEPULAUAN SERIBU'),
(158, 'DEPOK'),
(159, 'KARAWANG'),
(160, 'CIREBON'),
(161, 'BANDUNG'),
(162, 'SUKABUMI'),
(163, 'SUMEDANG'),
(164, 'INDRAMAYU'),
(165, 'MAJALENGKA'),
(166, 'KUNINGAN'),
(167, 'TASIKMALAYA'),
(168, 'CIAMIS'),
(169, 'SUBANG'),
(170, 'PURWAKARTA'),
(171, 'BOGOR'),
(172, 'BEKASI'),
(173, 'GARUT'),
(174, 'PANGANDARAN'),
(175, 'CIANJUR'),
(176, 'BANJAR'),
(177, 'BANDUNG BARAT'),
(178, 'CIMAHI'),
(179, 'PURBALINGGA'),
(180, 'KEBUMEN'),
(181, 'MAGELANG'),
(182, 'CILACAP'),
(183, 'BATANG'),
(184, 'BANJARNEGARA'),
(185, 'BLORA'),
(186, 'BREBES'),
(187, 'BANYUMAS'),
(188, 'WONOSOBO'),
(189, 'TEGAL'),
(190, 'PURWOREJO'),
(191, 'PATI'),
(192, 'SUKOHARJO'),
(193, 'KARANGANYAR'),
(194, 'PEKALONGAN'),
(195, 'PEMALANG'),
(196, 'BOYOLALI'),
(197, 'GROBOGAN'),
(198, 'SEMARANG'),
(199, 'DEMAK'),
(200, 'REMBANG'),
(201, 'KLATEN'),
(202, 'KUDUS'),
(203, 'TEMANGGUNG'),
(204, 'SRAGEN'),
(205, 'JEPARA'),
(206, 'WONOGIRI'),
(207, 'KENDAL'),
(208, 'SURAKARTA (SOLO)'),
(209, 'SALATIGA'),
(210, 'SLEMAN'),
(211, 'BANTUL'),
(212, 'YOGYAKARTA'),
(213, 'GUNUNG KIDUL'),
(214, 'KULON PROGO'),
(215, 'GRESIK'),
(216, 'KEDIRI'),
(217, 'SAMPANG'),
(218, 'BANGKALAN'),
(219, 'SUMENEP'),
(220, 'SITUBONDO'),
(221, 'SURABAYA'),
(222, 'JEMBER'),
(223, 'PAMEKASAN'),
(224, 'JOMBANG'),
(225, 'PROBOLINGGO'),
(226, 'BANYUWANGI'),
(227, 'PASURUAN'),
(228, 'BOJONEGORO'),
(229, 'BONDOWOSO'),
(230, 'MAGETAN'),
(231, 'LUMAJANG'),
(232, 'MALANG'),
(233, 'BLITAR'),
(234, 'SIDOARJO'),
(235, 'LAMONGAN'),
(236, 'PACITAN'),
(237, 'TULUNGAGUNG'),
(238, 'MOJOKERTO'),
(239, 'MADIUN'),
(240, 'PONOROGO'),
(241, 'NGAWI'),
(242, 'NGANJUK'),
(243, 'TUBAN'),
(244, 'TRENGGALEK'),
(245, 'BATU'),
(246, 'TANGERANG'),
(247, 'SERANG'),
(248, 'PANDEGLANG'),
(249, 'LEBAK'),
(250, 'TANGERANG SELATAN'),
(251, 'CILEGON'),
(252, 'KLUNGKUNG'),
(253, 'KARANGASEM'),
(254, 'BANGLI'),
(255, 'TABANAN'),
(256, 'GIANYAR'),
(257, 'BADUNG'),
(258, 'JEMBRANA'),
(259, 'BULELENG'),
(260, 'DENPASAR'),
(261, 'MATARAM'),
(262, 'DOMPU'),
(263, 'SUMBAWA BARAT'),
(264, 'SUMBAWA'),
(265, 'LOMBOK TENGAH'),
(266, 'LOMBOK TIMUR'),
(267, 'LOMBOK UTARA'),
(268, 'LOMBOK BARAT'),
(269, 'BIMA'),
(270, 'TIMOR TENGAH SELATAN'),
(271, 'FLORES TIMUR'),
(272, 'ALOR'),
(273, 'ENDE'),
(274, 'NAGEKEO'),
(275, 'KUPANG'),
(276, 'SIKKA'),
(277, 'NGADA'),
(278, 'TIMOR TENGAH UTARA'),
(279, 'BELU'),
(280, 'LEMBATA'),
(281, 'SUMBA BARAT DAYA'),
(282, 'SUMBA BARAT'),
(283, 'SUMBA TENGAH'),
(284, 'SUMBA TIMUR'),
(285, 'ROTE NDAO'),
(286, 'MANGGARAI TIMUR'),
(287, 'MANGGARAI'),
(288, 'SABU RAIJUA'),
(289, 'MANGGARAI BARAT'),
(290, 'LANDAK'),
(291, 'KETAPANG'),
(292, 'SINTANG'),
(293, 'KUBU RAYA'),
(294, 'PONTIANAK'),
(295, 'KAYONG UTARA'),
(296, 'BENGKAYANG'),
(297, 'KAPUAS HULU'),
(298, 'SAMBAS'),
(299, 'SINGKAWANG'),
(300, 'SANGGAU'),
(301, 'MELAWI'),
(302, 'SEKADAU'),
(303, 'KOTAWARINGIN TIMUR'),
(304, 'SUKAMARA'),
(305, 'KOTAWARINGIN BARAT'),
(306, 'BARITO TIMUR'),
(307, 'KAPUAS'),
(308, 'PULANG PISAU'),
(309, 'LAMANDAU'),
(310, 'SERUYAN'),
(311, 'KATINGAN'),
(312, 'BARITO SELATAN'),
(313, 'MURUNG RAYA'),
(314, 'BARITO UTARA'),
(315, 'GUNUNG MAS'),
(316, 'PALANGKA RAYA'),
(317, 'TAPIN'),
(318, 'BANJAR'),
(319, 'HULU SUNGAI TENGAH'),
(320, 'TABALONG'),
(321, 'HULU SUNGAI UTARA'),
(322, 'BALANGAN'),
(323, 'TANAH BUMBU'),
(324, 'BANJARMASIN'),
(325, 'KOTABARU'),
(326, 'TANAH LAUT'),
(327, 'HULU SUNGAI SELATAN'),
(328, 'BARITO KUALA'),
(329, 'BANJARBARU'),
(330, 'KUTAI BARAT'),
(331, 'SAMARINDA'),
(332, 'PASER'),
(333, 'KUTAI KARTANEGARA'),
(334, 'BERAU'),
(335, 'PENAJAM PASER UTARA'),
(336, 'BONTANG'),
(337, 'KUTAI TIMUR'),
(338, 'BALIKPAPAN'),
(339, 'MALINAU'),
(340, 'NUNUKAN'),
(341, 'BULUNGAN (BULONGAN)'),
(342, 'TANA TIDUNG'),
(343, 'TARAKAN'),
(344, 'BOLAANG MONGONDOW (BOLMONG)'),
(345, 'BOLAANG MONGONDOW SELATAN'),
(346, 'MINAHASA SELATAN'),
(347, 'BITUNG'),
(348, 'MINAHASA'),
(349, 'KEPULAUAN SANGIHE'),
(350, 'MINAHASA UTARA'),
(351, 'KEPULAUAN TALAUD'),
(352, 'KEPULAUAN SIAU TAGULANDANG BIARO (SITARO)'),
(353, 'MANADO'),
(354, 'BOLAANG MONGONDOW UTARA'),
(355, 'BOLAANG MONGONDOW TIMUR'),
(356, 'MINAHASA TENGGARA'),
(357, 'KOTAMOBAGU'),
(358, 'TOMOHON'),
(359, 'BANGGAI KEPULAUAN'),
(360, 'TOLI-TOLI'),
(361, 'PARIGI MOUTONG'),
(362, 'BUOL'),
(363, 'DONGGALA'),
(364, 'POSO'),
(365, 'MOROWALI'),
(366, 'TOJO UNA-UNA'),
(367, 'BANGGAI'),
(368, 'SIGI'),
(369, 'PALU'),
(370, 'MAROS'),
(371, 'WAJO'),
(372, 'BONE'),
(373, 'SOPPENG'),
(374, 'SIDENRENG RAPPANG / RAPANG'),
(375, 'TAKALAR'),
(376, 'BARRU'),
(377, 'LUWU TIMUR'),
(378, 'SINJAI'),
(379, 'PANGKAJENE KEPULAUAN'),
(380, 'PINRANG'),
(381, 'JENEPONTO'),
(382, 'PALOPO'),
(383, 'TORAJA UTARA'),
(384, 'LUWU'),
(385, 'BULUKUMBA'),
(386, 'MAKASSAR'),
(387, 'SELAYAR (KEPULAUAN SELAYAR)'),
(388, 'TANA TORAJA'),
(389, 'LUWU UTARA'),
(390, 'BANTAENG'),
(391, 'GOWA'),
(392, 'ENREKANG'),
(393, 'PAREPARE'),
(394, 'KOLAKA'),
(395, 'MUNA'),
(396, 'KONAWE SELATAN'),
(397, 'KENDARI'),
(398, 'KONAWE'),
(399, 'KONAWE UTARA'),
(400, 'KOLAKA UTARA'),
(401, 'BUTON'),
(402, 'BOMBANA'),
(403, 'WAKATOBI'),
(404, 'BAU-BAU'),
(405, 'BUTON UTARA'),
(406, 'GORONTALO UTARA'),
(407, 'BONE BOLANGO'),
(408, 'GORONTALO'),
(409, 'BOALEMO'),
(410, 'POHUWATO'),
(411, 'MAJENE'),
(412, 'MAMUJU'),
(413, 'MAMUJU UTARA'),
(414, 'POLEWALI MANDAR'),
(415, 'MAMASA'),
(416, 'MALUKU TENGGARA BARAT'),
(417, 'MALUKU TENGGARA'),
(418, 'SERAM BAGIAN BARAT'),
(419, 'MALUKU TENGAH'),
(420, 'SERAM BAGIAN TIMUR'),
(421, 'MALUKU BARAT DAYA'),
(422, 'AMBON'),
(423, 'BURU'),
(424, 'BURU SELATAN'),
(425, 'KEPULAUAN ARU'),
(426, 'TUAL'),
(427, 'HALMAHERA BARAT'),
(428, 'TIDORE KEPULAUAN'),
(429, 'TERNATE'),
(430, 'PULAU MOROTAI'),
(431, 'KEPULAUAN SULA'),
(432, 'HALMAHERA SELATAN'),
(433, 'HALMAHERA TENGAH'),
(434, 'HALMAHERA TIMUR'),
(435, 'HALMAHERA UTARA'),
(436, 'YALIMO'),
(437, 'DOGIYAI'),
(438, 'ASMAT'),
(439, 'JAYAPURA'),
(440, 'PANIAI'),
(441, 'MAPPI'),
(442, 'TOLIKARA'),
(443, 'PUNCAK JAYA'),
(444, 'PEGUNUNGAN BINTANG'),
(445, 'JAYAWIJAYA'),
(446, 'LANNY JAYA'),
(447, 'NDUGA'),
(448, 'BIAK NUMFOR'),
(449, 'KEPULAUAN YAPEN (YAPEN WAROPEN)'),
(450, 'PUNCAK'),
(451, 'INTAN JAYA'),
(452, 'WAROPEN'),
(453, 'NABIRE'),
(454, 'MIMIKA'),
(455, 'BOVEN DIGOEL'),
(456, 'YAHUKIMO'),
(457, 'SARMI'),
(458, 'MERAUKE'),
(459, 'DEIYAI (DELIYAI)'),
(460, 'KEEROM'),
(461, 'SUPIORI'),
(462, 'MAMBERAMO RAYA'),
(463, 'MAMBERAMO TENGAH'),
(464, 'RAJA AMPAT'),
(465, 'MANOKWARI SELATAN'),
(466, 'MANOKWARI'),
(467, 'KAIMANA'),
(468, 'MAYBRAT'),
(469, 'SORONG SELATAN'),
(470, 'FAKFAK'),
(471, 'PEGUNUNGAN ARFAK'),
(472, 'TAMBRAUW'),
(473, 'SORONG'),
(474, 'TELUK WONDAMA'),
(475, 'TELUK BINTUNI');

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
(2, 'adji@gmail.com', '123', 'user', 'U211220001', '2021-12-19 22:09:33', '2021-12-23 18:32:46'),
(4, 'admin@gmail.com', 'admin', 'administrator', 'U211221002', '2021-12-21 01:55:33', '2021-12-21 02:03:55'),
(5, 'arissetiana93@gmail.com', '123', 'user', 'U211223001', '2021-12-23 09:27:03', '2021-12-23 09:27:03');

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
('P211223001', '2021-12-23', '10', 'U211220001', '45000.00', '0.00', '0.00', '2021-12-23 10:45:59', '2021-12-23 10:45:59');

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
(26, 'P211223001', 10, 1, '2021-12-25', '2021-12-26', '45000.00', 1, '45000.00', '2021-12-23 10:45:59', '2021-12-23 10:45:59');

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
(9, 'Sb / Sleeping Bag Mummy Kilimanjaro Atmosfer Dacron', '10_1640248456_a63e3c07c93818fe8036.png', '2', '<p><span style=\"color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\">Spesifikasi SB Sleeping Bag:</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\"><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\"><span style=\"color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\">Inner Material Dacron 6 Oz</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\"><span style=\"color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\">Outer Material Parasut</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\"><span style=\"color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\">Mummy Style</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\"><span style=\"color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\">Size 190x73x55 Cm</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\"><span style=\"color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\">Comfortable Range 7 to 2 Celcius</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\"><span style=\"color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\">Unisex</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\"><span style=\"color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\">Filling : 250g 75/25</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\"><span style=\"color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\">sqm hollow cotton / 4 to 6 oz dacron</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\"><span style=\"color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\">Comfort temp : 7 c / 45 F to</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\"><span style=\"color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\">2 c / 36 F to</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\"><span style=\"color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\">Extreme : -2C / 10F</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\"><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\"><span style=\"color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\">packing 37 x 19 cm</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\"><span style=\"color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\">packing press / di tarik tali webbingnya 27 x 19 cm ( packing kecil )</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\"><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\"><span style=\"color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\">warna:</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\"><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\"><span style=\"color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\">Merah kombinasi Hitam</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\"><span style=\"color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\">Hijau Kombinasi Hitam</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\"></p>', 10, '30000.00', 'Tersedia', 10, '2021-12-23 08:34:16', '2021-12-23 08:34:16'),
(10, 'Tenda Camping MIS GO Java x Borneo Merah 4P limited edition 25 TH', '10_1640248721_d849dd8e0d28b967297e.jpg', '1', '<p><span style=\"color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\">SPESIFIKASI</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\"><span style=\"color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\">Item Name: JAVA X BORNEO 4</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\"><span style=\"color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\">Color: Merah</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\"><span style=\"color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\">Size: (100+210) X240X130CM.</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\"><span style=\"color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\">Flysheet:190T polyester PU2500mm seam taped.</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\"><span style=\"color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\">Inner door:190T polyester PA coated.</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\"><span style=\"color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\">Inner:190T polyester breathable.</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\"><span style=\"color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\">Floor:10x10 110g/m2 PE.</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\"><span style=\"color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\">Pole:D8.5mm x3pcs fibreglass poles orange colour.</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\"><span style=\"color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\">Peg: D4mm*18cm* 18pcs galvanized steel</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\"><span style=\"color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\">Guyrope:D3mm PP rope.</span><br style=\"box-sizing: inherit; color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\"><span style=\"color: rgba(49, 53, 59, 0.96); font-family: &quot;open sans&quot;, tahoma, sans-serif;\">berat : 4.1kg</span><br></p>', 6, '45000.00', 'Tersedia', 10, '2021-12-23 08:38:41', '2021-12-23 08:38:41');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sharecamp`
--

CREATE TABLE `tb_sharecamp` (
  `no_sharecamp` int(100) NOT NULL,
  `dari_tgl` date NOT NULL,
  `sampai_tgl` date NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sharecamp`
--

INSERT INTO `tb_sharecamp` (`no_sharecamp`, `dari_tgl`, `sampai_tgl`, `tujuan`, `kota`, `keterangan`, `id_user`, `created_at`, `updated_at`) VALUES
(2, '2021-12-25', '2021-12-26', 'Buper Ipukan', 'CIREBON', 'ayo join jangan sungkan :)', 'U211220001', '2021-12-24 01:25:32', '2021-12-24 01:25:32');

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
(10, 'Clarence Store', 'CIREBON', 'Jln. Plered Raya No.212', '628324409384', 'Menyewakan alat-alat outdoor paling murah sedunia', 'APPROVED', 'U211217001', '2021-12-23 08:31:12', '2021-12-23 09:33:31');

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
('U211217001', 'CLARENCE TAYLOR', '327409384567', 'usa', 'cirebon', '628324409384409', '324005', 'BRI', 'Clarence Taylor', '2021-12-17 11:07:59', '2021-12-23 09:29:03'),
('U211220001', 'adji', '327409384566', 'Cirebon', 'jl. bandung raya', '085324409333', '324', 'BRI', 'adji', '2021-12-19 22:09:33', '2021-12-20 12:40:39'),
('U211221002', 'admin', '327409384566', 'cirebon', 'jln lorem ipsum', '085224224224', '324005', 'BNI', 'admin', '2021-12-21 01:55:33', '2021-12-21 01:55:33'),
('U211223001', 'arez', '327409384567', 'cirebon', 'Jln. Lobunta Raya Blok D. No 10', '628324409384', '324', 'BRI', 'Aris Setiana', '2021-12-23 09:27:02', '2021-12-23 09:27:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_join_sharecamp`
--
ALTER TABLE `tb_join_sharecamp`
  ADD PRIMARY KEY (`id_join_sharecamp`);

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
-- Indexes for table `tb_kota`
--
ALTER TABLE `tb_kota`
  ADD PRIMARY KEY (`id_kota`) USING BTREE;

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
-- Indexes for table `tb_sharecamp`
--
ALTER TABLE `tb_sharecamp`
  ADD PRIMARY KEY (`no_sharecamp`);

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
-- AUTO_INCREMENT for table `tb_join_sharecamp`
--
ALTER TABLE `tb_join_sharecamp`
  MODIFY `id_join_sharecamp` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id_keranjang` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_kota`
--
ALTER TABLE `tb_kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=476;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id_login` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pesanan_detail`
--
ALTER TABLE `tb_pesanan_detail`
  MODIFY `id_pesanan_detail` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_sharecamp`
--
ALTER TABLE `tb_sharecamp`
  MODIFY `no_sharecamp` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_toko`
--
ALTER TABLE `tb_toko`
  MODIFY `id_toko` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

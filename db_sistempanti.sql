-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 16, 2024 at 09:32 AM
-- Server version: 10.6.16-MariaDB-cll-lve
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1671256_sistempanti`
--

-- --------------------------------------------------------

--
-- Table structure for table `anak_asuh`
--

CREATE TABLE `anak_asuh` (
  `id` int(11) NOT NULL,
  `id_panti` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` text NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(255) NOT NULL,
  `rt` varchar(10) NOT NULL,
  `rw` varchar(10) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `negara` varchar(50) NOT NULL,
  `kategori_anak` varchar(20) NOT NULL,
  `status_panti` varchar(50) NOT NULL,
  `status_anak` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `anak_asuh`
--

INSERT INTO `anak_asuh` (`id`, `id_panti`, `nip`, `nama`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `rt`, `rw`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `negara`, `kategori_anak`, `status_panti`, `status_anak`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 1, '0071', 'Azka Ibadil Aziz', '[\"1691460694_64009435f6a8e727b7df.png\"]', 'Banyumas', '2002-09-08', '', '003', '001', 'Parungkamal', 'Lumbir', 'Banyumas', 'Jawa Tengah', 'Indonesia', 'Dhuafa', 'Anak Asuh Mukim', 'Aktif', '2023-08-08 09:11:34', '2024-01-10 21:43:16', NULL),
(5, 1, '0074', 'Muhammad Abdul Latif', '[\"1691460877_5960e4c14333f92cc37b.png\"]', 'Purbalingga', '2008-05-30', '', '002', '001', 'Krangean', 'Kertanegara', 'Purbalingga', 'Jawa Tengah', 'Indonesia', 'Piatu', 'Anak Asuh Mukim', 'Aktif', '2023-08-08 09:14:37', '2024-01-10 21:48:32', NULL),
(6, 1, '0075', 'Satria Gumilang', '[\"1691460961_07bbbaac51691edd10fa.png\"]', 'Purbalingga', '2013-05-12', '', '002', '001', 'Krangean', 'Kertanegara', 'Purbalingga', 'Jawa Tengah', 'Indonesia', 'Piatu', 'Anak Asuh Mukim', 'Aktif', '2023-08-08 09:16:01', '2024-01-10 21:48:51', NULL),
(7, 1, '0100', 'Janitra Nadia Putri', '[\"1691461211_dbe30ee87abe51f18151.png\"]', 'Banyumas', '2010-01-27', '', '003', '001', 'Dermaji', 'Lumbir', 'Banyumas', 'Jawa Tengah', 'Indonesia', 'Dhuafa', 'Anak Asuh Mukim', 'Aktif', '2023-08-08 09:20:11', '2023-08-08 09:20:11', NULL),
(8, 1, '0083', 'Aditya Akbar hidayat', '[\"1691461437_e13450194d6ccb239404.png\"]', 'Banyumas', '2008-04-23', '', '001', '007', 'Canduk', 'Lumbir', 'Banyumas', 'Jawa Tengah', 'Indonesia', 'Dhuafa', 'Anak Asuh Mukim', 'Dikeluarkan', '2023-08-08 09:23:57', '2024-01-15 00:00:57', NULL),
(9, 1, '0089', 'Oki Ramadhani', '[\"1691461552_d6e10ac2e9ea13b8b5e0.png\"]', 'Banyumas', '2005-10-08', '', '002', '001', 'Parungkamal', 'Lumbir', 'Banyumas', 'Jawa Tengah', 'Indonesia', 'Dhuafa', 'Anak Asuh Mukim', 'Aktif', '2023-08-08 09:25:52', '2024-01-10 21:55:52', NULL),
(10, 1, '0091', 'Arya Maolana', '[\"1691461860_a732f2789fc54ef63c35.png\"]', 'Banyumas', '2007-12-01', '', '004', '007', 'Wangon', 'Wangon', 'Banyumas', 'Jawa Tengah', 'Indonesia', 'Dhuafa', 'Anak Asuh Mukim', 'Aktif', '2023-08-08 09:31:00', '2024-01-10 22:00:36', NULL),
(11, 1, '0117', 'Abizar Syafitra', '[\"1691464751_5a125610e22a6c540336.png\"]', 'Sukabumi', '2016-07-03', '', '003', '006', 'Canduk', 'Lumbir', 'Banyumas', 'Jawa Tengah', 'Indonesia', 'Yatim', 'Anak Asuh Mukim', 'Aktif', '2023-08-08 10:19:11', '2023-08-08 10:19:11', NULL),
(12, 1, '0118', 'Adi Prayoga', '[\"1691464828_30d274ec8264e4363698.png\"]', 'Banyumas', '2011-01-13', '', '002', '003', 'Sabeng Kulon', 'Kembaran', 'Banyumas', 'Jawa Tengah', 'Indonesia', 'Dhuafa', 'Anak Asuh Mukim', 'Aktif', '2023-08-08 10:20:28', '2023-08-08 10:20:28', NULL),
(13, 1, '0120', 'Celsy Aprilia Ningsih', '[\"1691464950_0b31644f12231fe614b8.png\"]', 'Banyumas', '2011-04-24', '', '006', '005', 'Karangkemiri', 'Pekuncen', 'Banyumas', 'Jawa Tengah', 'Indonesia', 'Dhuafa', 'Anak Asuh Mukim', 'Keluar', '2023-08-08 10:22:30', '2023-12-27 16:54:14', NULL),
(14, 1, '0110', 'Christoforus Raja Basawelan', '[\"1691465080_ddf9796ce046c4b09315.png\"]', 'Jakarta', '2009-07-07', '', '001', '001', 'Ciputat', 'Ciputat', 'Tanggerang Selatan', 'Banten', 'Indonesia', 'Dhuafa', 'Anak Asuh Mukim', 'Aktif', '2023-08-08 10:24:40', '2023-08-08 10:24:40', NULL),
(15, 1, '0104', 'Juwandi', '[\"1691465334_d2dcb0a33d704f19f21d.png\"]', 'Banyumas', '2007-01-05', '', '005', '001', 'Parungkamal', 'Lumbir', 'Banyumas', 'Jawa Tengah', 'Indonesia', 'Dhuafa', 'Anak Asuh Mukim', 'Aktif', '2023-08-08 10:28:54', '2023-08-08 10:28:54', NULL),
(16, 1, '0115', 'Charolus Boromeus Herman Welan', '[\"1691465485_fa8735b604e9cd68d0e1.png\"]', 'Jakarta', '2011-05-13', '', '001', '001', 'Ciputat', 'Ciputat', 'Tanggerang Selatan', 'Banten', 'Indonesia', 'Dhuafa', 'Anak Asuh Mukim', 'Aktif', '2023-08-08 10:31:25', '2023-08-08 10:31:25', NULL),
(17, 1, '0119', 'Muhammad Yusuf', '[\"1691466103_86a77019b9a669bae601.png\"]', 'Palembang', '2009-06-23', '', '009', '001', '14 Ulu', 'Sebrang Ulu II', 'Palembang', 'Sumatra Selatan', 'Indonesia', 'Yatim-Piatu', 'Anak Asuh Mukim', 'Aktif', '2023-08-08 10:41:43', '2023-08-08 10:41:43', NULL),
(18, 1, '0112', 'Zainal Arifin', '[\"1691466284_7826592013a8b138a125.png\"]', 'Banyumas', '2014-07-31', '', '001', '001', 'Krajan', 'Pekuncen', 'Banyumas', 'Jawa Tengah', 'Indonesia', 'Yatim', 'Anak Asuh Mukim', 'Aktif', '2023-08-08 10:44:44', '2023-08-08 10:44:44', NULL),
(19, 1, '0113', 'Muhammad Nizam', '[\"1691466371_80aca2fab7c3e098d7cd.png\"]', 'Banyumas', '2015-12-29', '', '003', '002', 'Krajan', 'Pekuncen', 'Banyumas', 'Jawa Tengah', 'Indonesia', 'Yatim', 'Anak Asuh Mukim', 'Aktif', '2023-08-08 10:46:11', '2023-08-08 10:46:11', NULL),
(20, 1, '0114', 'Farah Jauza Arifiyanti', '[\"1691466614_5ff41e720021f1731678.png\"]', 'Banyumas', '2017-01-07', '', '003', '002', 'Krajan', 'Pekuncen', 'Banyumas', 'Jawa Tengah', 'Indonesia', 'Yatim', 'Anak Asuh Mukim', 'Aktif', '2023-08-08 10:50:14', '2023-08-08 10:50:14', NULL),
(21, 1, '0116', 'Angela Andriani Wulansari', '[\"1691466824_a7f7aa9ea9a03a57b247.png\"]', 'Jakarta', '2006-11-25', '', '001', '001', 'Ciputat', 'Ciputat', 'Tanggerang Selatan', 'Banten', 'Indonesia', 'Dhuafa', 'Anak Asuh Mukim', 'Aktif', '2023-08-08 10:53:44', '2023-08-08 10:53:44', NULL),
(22, 1, '0121', 'Rafarrel Junior Rizki', '[\"1691467004_aafe0918bb0e9fff2073.png\"]', 'Banyumas', '2011-06-14', '', '005', '001', 'Parungkamal', 'Lumbir', 'Banyumas', 'Jawa Tengah', 'Indonesia', 'Dhuafa', 'Anak Asuh Mukim', 'Aktif', '2023-08-08 10:56:44', '2023-08-08 10:56:44', NULL),
(23, 1, '0107', 'Lira Agustina', '[\"1691553827_7d4ae23fc45793a12000.png\"]', 'Banyumas', '2008-08-08', '', '001', '001', 'Dermaji', 'Lumbir', 'Banyumas', 'Jawa Tengah', 'Indonesia', 'Dhuafa', 'Anak Asuh Mukim', 'Dikeluarkan', '2023-08-09 11:03:47', '2023-12-27 16:53:34', NULL),
(24, 1, '0109', 'Fadhilah Nur\'aini', '[\"1691554366_de2755a544a9739e4f0b.png\"]', 'Bekasi', '2007-03-03', '', '003', '002', 'Kp Cijingga Kel. Serang', 'Cikarang selatan', 'Bekasi', 'Jawa Barat', 'Indonesia', 'Dhuafa', 'Anak Asuh Mukim', 'Aktif', '2023-08-09 11:12:46', '2023-11-01 14:25:29', NULL),
(25, 1, '0094', 'febri maulana', '[\"1691975479_abc6d7806dc6649ac117.png\"]', 'Banyumas', '2006-02-14', '', '004', '005', 'Karangkemiri', 'Pekuncen', 'Banyumas', 'Jawa Tengah', 'Indonesia', 'Dhuafa', 'Anak Asuh Mukim', 'Aktif', '2023-08-14 08:11:19', '2023-08-14 08:11:19', NULL),
(26, 1, '0095', 'fajar hidayah', '[\"1691975552_3211d44fb1d9a2fa4b82.png\"]', 'Banyumas', '2006-04-19', '', '004', '001', 'parungkamal', 'Lumbir', 'Banyumas', 'Jawa Tengah', 'Indonesia', 'Yatim', 'Anak Asuh Mukim', 'Aktif', '2023-08-14 08:12:32', '2023-08-14 08:12:32', NULL),
(27, 1, '0081', 'Aditya Muhammad Syaeful Yanuar', '[\"1691975652_cca75ef37a100b46586f.png\"]', 'Bogor', '2006-01-06', '', '005', '007', 'Parungkamal', 'Lumbir', 'Banyumas', 'Jawa Tengah', 'Indonesia', 'Yatim', 'Anak Asuh Mukim', 'Aktif', '2023-08-14 08:14:12', '2023-08-14 08:14:12', NULL),
(28, 1, '0086', 'Damar Harum', '[\"1691975730_3b86cd5734e1da6d9d2f.png\"]', 'Sukabumi', '2007-04-05', '', '003', '006', 'Canduk', 'Lumbir', 'Banyumas', 'Jawa Tengah', 'Indonesia', 'Yatim', 'Anak Asuh Mukim', 'Aktif', '2023-08-14 08:15:30', '2023-08-14 08:15:30', NULL),
(29, 1, '0122', 'Ibal Stiawan', '[\"1692441871_38d96e0b270a4c384e00.png\"]', 'Banyumas', '2015-09-26', '', '7', '2', 'SUMPIUH', 'SUMPIUH', 'Banyumas', 'Jawa Tengah', 'Indonesia', 'Yatim', 'Anak Asuh Mukim', 'Aktif', '2023-08-19 17:44:31', '2024-01-15 08:55:35', NULL),
(34, 1, '0123', 'Muhammad Lutfi Afandi', '', 'Bekasi', '2010-07-08', '', '002', '006', 'Kalikudi', 'Adipala', 'Cilacap', 'Banyumas', 'Indonesia', 'Dhuafa', 'Anak Asuh Mukim', 'Aktif', '2024-01-10 21:36:49', '2024-01-10 21:36:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dokumen_anak`
--

CREATE TABLE `dokumen_anak` (
  `id` int(11) NOT NULL,
  `id_anak` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `file` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `dokumen_anak`
--

INSERT INTO `dokumen_anak` (`id`, `id_anak`, `judul`, `file`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 34, 'Kartu Keluarga', '1704898504_353d16289a42bc2d4472.jpeg', '2024-01-10 21:55:04', '2024-01-10 21:55:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `donatur`
--

CREATE TABLE `donatur` (
  `id` int(11) NOT NULL,
  `id_panti` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` text DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `rt` varchar(10) DEFAULT NULL,
  `rw` varchar(10) DEFAULT NULL,
  `desa` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `kabupaten` varchar(50) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `negara` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `donatur`
--

INSERT INTO `donatur` (`id`, `id_panti`, `nama`, `foto`, `nohp`, `alamat`, `rt`, `rw`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `negara`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Ely Suparwati', NULL, '6285225504988', 'Situmpur', '', '', '', '', '', '', 'Indonesia', '2024-01-15 08:46:52', '2024-01-15 08:46:52', NULL),
(2, 1, 'Rike Yunita B. H.', NULL, '6281225754317', 'Bekasi', '', '', '', '', '', '', 'Indonesia', '2024-01-15 08:56:30', '2024-01-15 08:56:30', NULL),
(3, 1, 'Danang', NULL, '6285725073528', 'Purwokerto', '', '', '', '', '', '', 'Indonesia', '2024-01-15 08:57:14', '2024-01-15 08:57:14', NULL),
(4, 1, 'Sakti Prasetyo Hoetomo', NULL, '6281225754317', 'Bekasi', '', '', '', '', '', '', 'Indonesia', '2024-01-15 08:57:34', '2024-01-15 08:57:34', NULL),
(5, 1, 'Mega Denada Aldilla', NULL, '6282136239540', 'Ovist', '', '', '', '', '', '', 'Indonesia', '2024-01-15 08:58:03', '2024-01-15 08:58:03', NULL),
(6, 1, 'Sigit W.', NULL, '6281329796433', 'Arcawinangun', '', '', '', '', '', '', 'Indonesia', '2024-01-15 08:58:16', '2024-01-15 08:58:16', NULL),
(7, 1, 'Arif Aji', NULL, '6281548926465', 'Jl.Ovis Isdiman (Taspen Purwokerto)', '05', '03', '', '', '', '', 'Indonesia', '2024-01-15 08:58:57', '2024-01-15 09:00:46', NULL),
(8, 1, 'Sdr. Arza', NULL, '6287733198329', 'Sumampir', '01', '07', '', '', '', '', 'Indonesia', '2024-01-15 09:03:16', '2024-01-15 09:03:16', NULL),
(9, 1, 'Mirza dan Firda', NULL, '6285727585925', 'Jl.Esparman 48', '', '', '', '', '', '', 'Indonesia', '2024-01-15 09:03:54', '2024-01-15 09:03:54', NULL),
(10, 1, 'Zulfikar Bayu Aji', NULL, '6282234021945', 'Jl.Tegal Mulya', '', '', 'Ledug', 'Kembaran', '', '', 'Indonesia', '2024-01-15 09:04:37', '2024-01-15 09:04:54', NULL),
(11, 1, 'Andinna Vitri S', NULL, '628122993333', 'Purwokerto', '', '', '', '', '', '', 'Indonesia', '2024-01-15 09:07:27', '2024-01-15 09:07:27', NULL),
(12, 1, 'Danang', NULL, '6285725073536', '', '', '', 'Dukuhwaluh', 'Kembaran', 'Banyumas', 'Jawa Tengah', 'Indonesia', '2024-01-15 09:08:24', '2024-01-15 09:08:24', NULL),
(13, 1, 'Ibu Retnowati', NULL, '6285882716809', 'Purwokerto', '', '', '', '', '', '', 'Indonesia', '2024-01-15 09:09:05', '2024-01-15 09:09:05', NULL),
(15, 1, 'Intan Cahya', NULL, '6285601915844', 'Jl. Supriyadi', '', '', '', '', '', '', 'Indonesia', '2024-01-15 09:09:52', '2024-01-15 09:09:52', NULL),
(16, 1, 'Pak Indra Purwita', NULL, '', 'Perum Saphire Kr.Wangkal', '', '', '', '', '', '', 'Indonesia', '2024-01-15 09:10:15', '2024-01-15 09:10:15', NULL),
(17, 1, 'Pak M. Saefudin', NULL, '6285752123888', 'Kober', '', '', '', '', '', '', 'Indonesia', '2024-01-15 09:10:29', '2024-01-15 09:11:13', NULL),
(18, 1, 'Keluarga Martomiharjo', NULL, '6282376867887', 'Kebasen', '', '', '', '', '', '', 'Indonesia', '2024-01-15 09:12:02', '2024-01-15 09:12:02', NULL),
(19, 1, 'Dilla Fitriani', NULL, '62878743642110', 'UMP', '', '', '', '', '', '', 'Indonesia', '2024-01-15 09:17:04', '2024-01-15 09:17:04', NULL),
(20, 1, 'Iwan Abdul & Noor Laily', NULL, '6282242506126', 'Pegalongan', '', '', '', 'Patikraja', '', '', 'Indonesia', '2024-01-15 09:18:28', '2024-01-15 09:18:28', NULL),
(21, 1, 'Alm. Siswo Endro Wahyono', NULL, '', 'Purwokerto', '', '', '', '', '', '', 'Indonesia', '2024-01-15 09:30:40', '2024-01-15 09:30:40', NULL),
(22, 1, 'Hamba Allah', NULL, '', 'Purwokerto', '', '', '', '', '', '', 'Indonesia', '2024-01-15 09:34:52', '2024-01-15 09:34:52', NULL),
(23, 1, 'Keluarga Bpk Suwarsi bin A. Sudarji', NULL, '', 'Purwokerto', '', '', '', '', '', '', 'Indonesia', '2024-01-15 09:38:33', '2024-01-15 09:38:33', NULL),
(24, 1, 'Vitri & Bahtiar', NULL, '', '', '', '', 'Bantarwuni', 'Sumbang', 'Banyumas', 'Jawa Tengah', 'Indonesia', '2024-01-15 09:52:16', '2024-01-15 09:52:16', NULL),
(25, 1, 'Mirza & Dwi', NULL, '', '', '', '', '', '', '', '', 'Indonesia', '2024-01-15 09:53:43', '2024-01-15 09:53:43', NULL),
(26, 1, 'Hamba Allah', NULL, '', '', '', '', '', '', '', '', 'Indonesia', '2024-01-15 09:54:33', '2024-01-15 09:54:33', NULL),
(27, 1, 'Ibu Lukman', NULL, '', 'Arcawinangun', '', '', '', '', '', '', 'Indonesia', '2024-01-15 16:03:25', '2024-01-15 16:03:25', NULL),
(28, 1, 'Purwokerto Berbagi', NULL, '', 'Purwokerto', '', '', '', '', '', '', 'Indonesia', '2024-01-15 16:04:05', '2024-01-15 16:04:05', NULL),
(29, 1, 'Bapak Indra Ismanto', NULL, '6282134555295', '', '', '', 'Karangrau', 'Sokaraja', '', '', 'Indonesia', '2024-01-15 16:05:20', '2024-01-15 17:30:59', NULL),
(30, 1, 'Andinna Vitri S', NULL, '628122993333', 'Purwokerto', '', '', '', '', '', '', 'Indonesia', '2024-01-15 16:11:59', '2024-01-15 16:11:59', NULL),
(31, 1, 'Almh. Sobiah Binti Asmani', NULL, '', 'Karangturi', '', '', '', '', '', '', 'Indonesia', '2024-01-15 16:14:35', '2024-01-15 16:14:35', NULL),
(32, 1, 'Intan Cahya', NULL, '6285601915844', 'Jl. Supriyadi', '', '', '', '', '', '', 'Indonesia', '2024-01-15 16:21:09', '2024-01-15 16:21:09', NULL),
(33, 1, 'Sutomo', NULL, '', 'Sumbang', '', '', '', '', '', '', 'Indonesia', '2024-01-15 16:24:29', '2024-01-15 16:24:29', NULL),
(34, 1, 'CIMSA Fakultas Kedokteran Unsoed', NULL, '', '', '', '', '', '', '', '', 'Indonesia', '2024-01-15 16:52:56', '2024-01-15 16:52:56', NULL),
(35, 1, 'Refi CG SMANSA', NULL, '6285225679988', '', '', '', '', '', '', '', 'Indonesia', '2024-01-15 16:58:45', '2024-01-15 16:58:45', NULL),
(36, 1, 'Bu Ana', NULL, '6281575587382', '', '', '', 'Karangrau', 'Sokaraja', '', '', 'Indonesia', '2024-01-15 17:02:33', '2024-01-15 17:02:33', NULL),
(37, 1, 'PT. Garuda Mitra Abadi Jaya', NULL, '', 'Purwokerto  Wetan', '', '', '', '', '', '', 'Indonesia', '2024-01-15 17:07:12', '2024-01-15 17:07:12', NULL),
(38, 1, 'Siti Fariah', NULL, '6289966731493', 'Purwokerto  Wetan', '', '', '', '', '', '', 'Indonesia', '2024-01-15 17:09:11', '2024-01-15 17:09:11', NULL),
(39, 1, 'Bapak Danang', NULL, '6285725073526', '', '', '', 'Dukuhwaluh', 'Kembaran', 'Banyumas', 'Jawa Tengah', 'Indonesia', '2024-01-15 17:18:17', '2024-01-15 17:18:17', NULL),
(40, 1, 'Imaningtyas', NULL, '6288226340684', 'Wiradadi', '', '', '', '', '', '', 'Indonesia', '2024-01-15 17:28:32', '2024-01-15 17:28:32', NULL),
(41, 1, 'Keluarga Almh Atminah', NULL, '6285654420648', 'Purwokerto', '', '', '', '', '', '', 'Indonesia', '2024-01-15 17:32:53', '2024-01-15 17:32:53', NULL),
(42, 1, 'Kevin Dan Azkiya', NULL, '6285227489250', 'Perum Ngalson Indah', '', '', '', '', '', '', 'Indonesia', '2024-01-15 17:36:04', '2024-01-15 17:36:04', NULL),
(43, 1, 'nanda', NULL, '08534232143', 'kombas', '2', '4', 'kombas', 'kombas', '', '', 'Indonesia', '2024-02-16 03:03:22', '2024-02-16 03:04:22', '2024-02-16 03:04:22');

-- --------------------------------------------------------

--
-- Table structure for table `item_pengeluaran`
--

CREATE TABLE `item_pengeluaran` (
  `id` int(11) NOT NULL,
  `id_pengeluaran` int(11) NOT NULL,
  `item` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `item_pengeluaran`
--

INSERT INTO `item_pengeluaran` (`id`, `id_pengeluaran`, `item`, `jumlah`, `harga`, `total_harga`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'SMK Bina Taruna', 1, 3000000, 3000000, '2024-01-17 21:20:07', '2024-01-17 21:20:07', NULL),
(2, 1, 'SMA Muhammadiyah 1', 1, 1500000, 1500000, '2024-01-17 21:20:07', '2024-01-17 21:20:07', NULL),
(3, 1, 'MTs Muhammadiyah', 1, 3000000, 3000000, '2024-01-17 21:20:07', '2024-01-17 21:20:07', NULL),
(4, 1, 'SD Negeri 1 Mersi', 1, 150000, 150000, '2024-01-17 21:20:07', '2024-01-17 21:20:07', NULL),
(5, 1, 'SD Negeri 3 Mersi', 1, 700000, 700000, '2024-01-17 21:20:07', '2024-01-17 21:20:07', NULL),
(6, 2, 'asdasd', 1, 2132, 2132, '2024-01-18 09:07:11', '2024-01-18 09:07:11', NULL),
(7, 3, 'Wifi Biznet', 1, 480000, 480000, '2024-01-18 09:39:11', '2024-01-18 09:39:11', NULL),
(8, 4, 'Sayur mayur', 1, 200000, 200000, '2024-01-18 09:48:00', '2024-01-18 09:48:00', NULL),
(9, 4, 'Daging Ayam', 1, 300000, 300000, '2024-01-18 09:48:00', '2024-01-18 09:48:00', NULL),
(10, 4, 'Telur', 1, 150000, 150000, '2024-01-18 09:48:00', '2024-01-18 09:48:00', NULL),
(11, 4, 'Bumbu dapur', 1, 150000, 150000, '2024-01-18 09:48:42', '2024-01-18 09:48:42', NULL),
(12, 5, 'WiFi Biznet', 1, 480000, 480000, '2024-01-18 09:49:42', '2024-01-18 09:49:42', NULL),
(13, 6, 'Sayur mayur', 1, 200000, 200000, '2024-01-18 09:52:01', '2024-01-18 09:52:01', NULL),
(14, 6, 'Telur', 1, 100000, 100000, '2024-01-18 09:52:01', '2024-01-18 09:52:01', NULL),
(15, 6, 'Susu', 1, 250000, 250000, '2024-01-18 09:52:01', '2024-01-18 09:52:01', NULL),
(16, 6, 'Transport', 1, 50000, 50000, '2024-01-18 09:52:01', '2024-01-18 09:52:01', NULL),
(17, 6, 'Bumbu dapur', 1, 50000, 50000, '2024-01-18 09:52:01', '2024-01-18 09:52:01', NULL),
(18, 7, 'WiFi Biznet', 1, 480000, 480000, '2024-01-18 10:12:41', '2024-01-18 10:12:41', NULL),
(19, 8, 'WiFi Biznet', 1, 480000, 480000, '2024-01-18 10:13:18', '2024-01-18 10:13:18', NULL),
(20, 9, 'Sayur mayur', 1, 250000, 250000, '2024-01-18 10:14:53', '2024-01-18 10:14:53', NULL),
(21, 9, 'Telur', 1, 50000, 50000, '2024-01-18 10:14:53', '2024-01-18 10:14:53', NULL),
(22, 9, 'Transport', 1, 50000, 50000, '2024-01-18 10:14:53', '2024-01-18 10:14:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orangtua_anak`
--

CREATE TABLE `orangtua_anak` (
  `id` int(11) NOT NULL,
  `id_anak` int(11) NOT NULL,
  `nama_ayah` varchar(255) NOT NULL,
  `pekerjaan_ayah` varchar(255) DEFAULT NULL,
  `agama_ayah` varchar(255) DEFAULT NULL,
  `hp_ayah` varchar(15) DEFAULT NULL,
  `tempatlahir_ayah` varchar(255) DEFAULT NULL,
  `tgllahir_ayah` date DEFAULT NULL,
  `rt_ayah` varchar(10) DEFAULT NULL,
  `rw_ayah` varchar(10) DEFAULT NULL,
  `desa_ayah` varchar(50) DEFAULT NULL,
  `kecamatan_ayah` varchar(50) DEFAULT NULL,
  `kabupaten_ayah` varchar(50) DEFAULT NULL,
  `provinsi_ayah` varchar(50) DEFAULT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `pekerjaan_ibu` varchar(255) DEFAULT NULL,
  `agama_ibu` varchar(255) DEFAULT NULL,
  `hp_ibu` varchar(15) DEFAULT NULL,
  `tempatlahir_ibu` varchar(255) DEFAULT NULL,
  `tgllahir_ibu` date DEFAULT NULL,
  `rt_ibu` varchar(10) DEFAULT NULL,
  `rw_ibu` varchar(10) DEFAULT NULL,
  `desa_ibu` varchar(50) DEFAULT NULL,
  `kecamatan_ibu` varchar(50) DEFAULT NULL,
  `kabupaten_ibu` varchar(50) DEFAULT NULL,
  `provinsi_ibu` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `orangtua_anak`
--

INSERT INTO `orangtua_anak` (`id`, `id_anak`, `nama_ayah`, `pekerjaan_ayah`, `agama_ayah`, `hp_ayah`, `tempatlahir_ayah`, `tgllahir_ayah`, `rt_ayah`, `rw_ayah`, `desa_ayah`, `kecamatan_ayah`, `kabupaten_ayah`, `provinsi_ayah`, `nama_ibu`, `pekerjaan_ibu`, `agama_ibu`, `hp_ibu`, `tempatlahir_ibu`, `tgllahir_ibu`, `rt_ibu`, `rw_ibu`, `desa_ibu`, `kecamatan_ibu`, `kabupaten_ibu`, `provinsi_ibu`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 'Johari', 'Buruh', 'islam', '-', 'Banyumas', '1974-05-10', '003', '001', 'Parungkamal', 'Lumbir', 'Banyumas', 'Jawa Tengah', 'Surinah', 'Ibu Rumah Tangga', 'Islam', '-', 'Banyumas', '1985-05-10', '003', '001', 'Parungkamal', 'Lumbir', 'Banyumas', 'Jawa Tengah', '2024-01-10 21:42:44', '2024-01-10 21:42:44', NULL),
(2, 5, 'Esan Saniyo Lungsi', 'Wiraswasta', 'islam', '-', 'Kulonprogo', '1967-07-10', '002', '001', 'Krangean', 'Kertanegara', 'Purbalingga', 'Jawa Tengah', 'Almh Aminah', '-', 'Islam', '-', '-', NULL, '-', '-', '-', '-', '-', '-', '2024-01-10 21:48:13', '2024-01-10 21:48:13', NULL),
(3, 6, 'Esan Saniyo Lungsi', 'Wiraswasta', 'islam', '-', 'Kulonprogo', '1967-07-10', '002', '001', 'Krangean', 'Kertanegara', 'Purbalingga', 'Jawa Tengah', 'Almh Aminah', '-', 'Islam', '-', '-', NULL, '-', '-', '-', '-', '-', '-', '2024-01-10 21:50:04', '2024-01-10 21:50:04', NULL),
(4, 7, 'Warsito', 'petani', 'islam', '-', 'Banyumas', '1964-12-31', '003', '001', 'Dermaji', 'Lumbir', 'Banyumas', 'Jawa Tengah', 'Sukeri', 'Ibu Rumah Tangga', 'Islam', '-', 'Banyumas', '1971-07-21', '003', '001', 'Dermaji', 'Lumbir', 'Banyumas', 'Jawa Tengah', '2024-01-10 21:53:37', '2024-01-10 21:53:37', NULL),
(5, 9, 'Sidin', 'Buruh', 'islam', '-', 'Banyumas', '1975-07-08', '002', '001', 'Parungkamal', 'Lumbir', 'Banyumas', 'Jawa Tengah', 'Sujinah', 'Ibu Rumah Tangga', 'Islam', '-', 'Banyumas', '1971-02-22', '002', '001', 'Parungkamal', 'Lumbir', 'Banyumas', 'Jawa Tengah', '2024-01-10 22:00:02', '2024-01-10 22:00:02', NULL),
(6, 10, 'Sukanto', 'Buruh', 'islam', '-', 'Banyumas', '1980-02-25', '004', '017', 'Wangon', 'Wangon', 'Banyumas', 'Jawa Tengah', 'Triningsih', 'Ibu Rumah Tangga', 'Islam', '-', 'Banyumas', '1985-02-27', '004', '017', 'Wangon', 'Wangon', 'Banyumas', 'Jawa Tengah', '2024-01-10 22:03:48', '2024-01-10 22:03:48', NULL),
(7, 11, 'Alm Saleh', '-', 'islam', '-', '-', NULL, '-', '-', '-', '-', '-', '-', 'Nur Khosiyah', 'Ibu Rumah Tangga', 'Islam', '-', 'Banyumas', '1984-05-10', '003', '006', 'Canduk', 'Lumbir', 'Banyumas', 'Jawa Tengah', '2024-01-10 22:06:19', '2024-01-10 22:06:19', NULL),
(8, 28, 'Alm Saleh', '-', 'islam', '-', '-', NULL, '-', '-', '-', '-', '-', '-', 'Nur Khosiyah', 'Ibu Rumah Tangga', 'Islam', '-', 'Banyumas', '1984-05-10', '003', '006', 'Canduk', 'Lumbir', 'Banyumas', 'Jawa Tengah', '2024-01-10 22:07:31', '2024-01-10 22:07:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `panti`
--

CREATE TABLE `panti` (
  `id` int(11) NOT NULL,
  `nama_panti` varchar(255) NOT NULL,
  `email_panti` varchar(255) NOT NULL,
  `telp_panti` varchar(20) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `alamat_detail` varchar(255) DEFAULT NULL,
  `alamat_kelurahan` varchar(255) DEFAULT NULL,
  `alamat_kecamatan` varchar(255) DEFAULT NULL,
  `alamat_kabupaten` varchar(255) DEFAULT NULL,
  `alamat_provinsi` varchar(255) DEFAULT NULL,
  `tanggal_berdiri` date DEFAULT NULL,
  `jenis_panti` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `panti`
--

INSERT INTO `panti` (`id`, `nama_panti`, `email_panti`, `telp_panti`, `password`, `alamat_detail`, `alamat_kelurahan`, `alamat_kecamatan`, `alamat_kabupaten`, `alamat_provinsi`, `tanggal_berdiri`, `jenis_panti`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Panti Asuhan Harapan Mulia', 'panti@gmail.com', '085123123123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-02 02:04:59', '2022-11-02 02:04:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id` int(11) NOT NULL,
  `id_panti` int(11) NOT NULL,
  `sumber` varchar(50) NOT NULL,
  `id_donatur` int(11) DEFAULT NULL,
  `nama` text NOT NULL,
  `tanggal_pemasukan` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `file` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `pemasukan`
--

INSERT INTO `pemasukan` (`id`, `id_panti`, `sumber`, `id_donatur`, `nama`, `tanggal_pemasukan`, `jumlah`, `keterangan`, `file`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'sumber-donatur', 20, 'Iwan Abdul & Noor Laily', '2023-05-04', 1000000, '', NULL, '2024-01-15 09:26:09', '2024-01-15 09:26:37', NULL),
(2, 1, 'sumber-donatur', 2, 'Rike Yunita B. H.', '2023-05-07', 300000, '', NULL, '2024-01-15 09:29:27', '2024-01-15 09:29:57', NULL),
(3, 1, 'sumber-donatur', 21, 'Alm. Siswo Endro Wahyono', '2023-05-07', 300000, '', NULL, '2024-01-15 09:34:22', '2024-01-15 09:35:42', NULL),
(4, 1, 'sumber-donatur', 22, 'Hamba Allah', '2023-05-09', 200000, '', NULL, '2024-01-15 09:35:12', '2024-01-15 09:37:04', NULL),
(5, 1, 'sumber-donatur', 23, 'Keluarga Bpk Suwarsi bin A. Sudarji', '2023-05-12', 200000, '', NULL, '2024-01-15 09:38:59', '2024-01-15 09:38:59', NULL),
(6, 1, 'sumber-donatur', 4, 'Sakti Prasetyo Hoetomo', '2023-05-12', 300000, '', NULL, '2024-01-15 09:43:45', '2024-01-15 09:43:45', NULL),
(7, 1, 'sumber-donatur', 6, 'Sigit W.', '2023-05-13', 500000, '', NULL, '2024-01-15 09:44:24', '2024-01-15 09:44:24', NULL),
(8, 1, 'sumber-donatur', 7, 'Arif Aji', '2023-05-20', 500000, '', NULL, '2024-01-15 09:44:56', '2024-01-15 09:45:46', NULL),
(9, 1, 'sumber-donatur', 8, 'Sdr. Arza', '2023-05-20', 600000, '', NULL, '2024-01-15 09:48:50', '2024-01-15 09:48:50', NULL),
(10, 1, 'sumber-donatur', 24, 'Vitri & Bahtiar', '2023-05-26', 200000, '', NULL, '2024-01-15 09:52:31', '2024-01-15 09:52:53', NULL),
(11, 1, 'sumber-donatur', 25, 'Mirza & Dwi', '2023-05-26', 500000, '', NULL, '2024-01-15 09:54:01', '2024-01-15 09:55:18', NULL),
(12, 1, 'sumber-donatur', 26, 'Hamba Allah', '2023-05-26', 140000, '', NULL, '2024-01-15 09:54:59', '2024-01-15 09:54:59', NULL),
(13, 1, 'sumber-donatur', 28, 'Purwokerto Berbagi', '2023-06-02', 250000, '', NULL, '2024-01-15 16:04:22', '2024-01-15 16:04:41', NULL),
(14, 1, 'sumber-donatur', 29, 'Bapak Indra Ismanto', '2023-06-02', 200000, '', NULL, '2024-01-15 16:05:52', '2024-01-15 16:05:52', NULL),
(15, 1, 'sumber-donatur', 30, 'Andinna Vitri S', '2023-06-02', 4772000, '', NULL, '2024-01-15 16:12:24', '2024-01-15 16:12:51', NULL),
(16, 1, 'sumber-donatur', 31, 'Almh. Sobiah Binti Asmani', '2023-06-03', 2000000, '', NULL, '2024-01-15 16:14:53', '2024-01-15 16:16:47', NULL),
(17, 1, 'sumber-donatur', 13, 'Ibu Retnowati', '2023-06-06', 100000, '', NULL, '2024-01-15 16:17:42', '2024-01-15 16:17:42', NULL),
(18, 1, 'sumber-donatur', 29, 'Bapak Indra Ismanto', '2023-06-09', 200000, '', NULL, '2024-01-15 16:18:52', '2024-01-15 16:21:44', NULL),
(19, 1, 'sumber-donatur', 32, 'Intan Cahya', '2023-06-09', 200000, '', NULL, '2024-01-15 16:21:30', '2024-01-15 16:22:05', NULL),
(20, 1, 'sumber-donatur', 29, 'Bapak Indra Ismanto', '2023-06-16', 200000, '', NULL, '2024-01-15 16:23:09', '2024-01-15 16:23:09', NULL),
(21, 1, 'sumber-donatur', 33, 'Sutomo', '2023-06-17', 2000000, '', NULL, '2024-01-15 16:31:48', '2024-01-15 16:31:48', NULL),
(22, 1, 'sumber-donatur', 34, 'CIMSA Fakultas Kedokteran Unsoed', '2023-06-17', 1015000, '', NULL, '2024-01-15 16:51:31', '2024-01-15 16:53:06', NULL),
(23, 1, 'sumber-donatur', 17, 'Pak M. Saefudin', '2023-06-17', 2000000, '', NULL, '2024-01-15 16:54:57', '2024-01-15 16:54:57', NULL),
(24, 1, 'sumber-donatur', 18, 'Keluarga Martomiharjo', '2023-06-18', 1300000, '', NULL, '2024-01-15 16:56:46', '2024-01-15 16:57:20', NULL),
(25, 1, 'sumber-donatur', 35, 'Refi CG SMANSA', '2023-06-18', 1000000, '', NULL, '2024-01-15 16:59:37', '2024-01-15 16:59:37', NULL),
(26, 1, 'sumber-donatur', 36, 'Bu Ana', '2023-06-22', 150000, '', NULL, '2024-01-15 17:04:34', '2024-01-15 17:04:34', NULL),
(27, 1, 'sumber-donatur', 29, 'Bapak Indra Ismanto', '2023-06-30', 300000, '', NULL, '2024-01-15 17:05:53', '2024-01-15 17:06:29', NULL),
(28, 1, 'sumber-donatur', 37, 'PT. Garuda Mitra Abadi Jaya', '2023-06-30', 1500000, '', NULL, '2024-01-15 17:07:50', '2024-01-15 17:07:50', NULL),
(29, 1, 'sumber-donatur', 38, 'Siti Fariah', '2023-07-02', 150000, '', NULL, '2024-01-15 17:13:25', '2024-01-15 17:13:25', NULL),
(30, 1, 'sumber-donatur', 39, 'Bapak Danang', '2023-07-03', 300000, '', NULL, '2024-01-15 17:26:49', '2024-01-15 17:27:10', NULL),
(31, 1, 'sumber-donatur', 40, 'Imaningtyas', '2023-07-07', 250000, '', NULL, '2024-01-15 17:28:43', '2024-01-15 17:29:04', NULL),
(32, 1, 'sumber-donatur', 29, 'Bapak Indra Ismanto', '2023-07-07', 300000, '', NULL, '2024-01-15 17:31:24', '2024-01-15 17:31:42', NULL),
(33, 1, 'sumber-donatur', 41, 'Keluarga Almh Atminah', '2023-07-11', 200000, '', NULL, '2024-01-15 17:33:07', '2024-01-15 17:33:58', NULL),
(34, 1, 'sumber-donatur', 26, 'Hamba Allah', '2023-07-13', 500000, '', NULL, '2024-01-15 17:34:26', '2024-01-15 17:34:45', NULL),
(35, 1, 'sumber-donatur', 29, 'Bapak Indra Ismanto', '2023-07-14', 300000, '', NULL, '2024-01-15 17:35:10', '2024-01-15 17:35:31', NULL),
(36, 1, 'sumber-donatur', 42, 'Kevin Dan Azkiya', '2023-07-14', 500000, '', NULL, '2024-01-15 17:36:24', '2024-01-15 17:36:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL,
  `id_panti` int(11) NOT NULL,
  `tgl_pengeluaran` date NOT NULL,
  `judul` text NOT NULL,
  `kategori` varchar(255) DEFAULT 'Tidak Dikategorikan',
  `total_pengeluaran` int(11) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `file` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `id_panti`, `tgl_pengeluaran`, `judul`, `kategori`, `total_pengeluaran`, `keterangan`, `file`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '2023-12-14', 'Bayar sekolah anak-anak', 'Pendidikan', 8350000, '', NULL, '2024-01-17 21:20:07', '2024-01-18 09:07:31', NULL),
(3, 1, '2023-11-15', 'Bayar WiFI', 'Bulanan', 480000, '', NULL, '2024-01-18 09:39:11', '2024-01-18 09:39:38', NULL),
(4, 1, '2023-10-02', 'Belanja Pekan 1 Oktober', 'Mingguan', 800000, '', NULL, '2024-01-18 09:48:00', '2024-01-18 09:50:04', NULL),
(5, 1, '2023-10-15', 'Bayar WiFi', 'Bulanan', 480000, '', NULL, '2024-01-18 09:49:42', '2024-01-18 09:49:42', NULL),
(6, 1, '2023-10-09', 'Belanja pekan 2 oktober', 'Mingguan', 650000, '', NULL, '2024-01-18 09:52:01', '2024-01-18 09:52:01', NULL),
(7, 1, '2024-01-15', 'Bayar WiFi', 'Bulanan', 480000, '', NULL, '2024-01-18 10:12:41', '2024-01-18 10:12:41', NULL),
(8, 1, '2023-12-15', 'Bayar WiFi', 'Bulanan', 480000, '', NULL, '2024-01-18 10:13:18', '2024-01-18 10:13:18', NULL),
(9, 1, '2023-10-16', 'Belanja pekan 3 oktober', 'Mingguan', 350000, '', NULL, '2024-01-18 10:14:53', '2024-01-18 10:15:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `perkembangan_anak`
--

CREATE TABLE `perkembangan_anak` (
  `id` int(11) NOT NULL,
  `id_anak` int(11) NOT NULL,
  `waktu_rekam` datetime NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `tinggibadan_fisik` int(11) NOT NULL,
  `beratbadan_fisik` int(11) NOT NULL,
  `tekanandarah_fisik` varchar(255) DEFAULT NULL,
  `guladarah_fisik` varchar(255) DEFAULT NULL,
  `kolesterol_fisik` varchar(255) DEFAULT NULL,
  `fungsiparu_fisik` varchar(255) DEFAULT NULL,
  `keterangan_fisik` text DEFAULT NULL,
  `percayadiri_pskologis` text DEFAULT NULL,
  `mandiri_pskologis` text DEFAULT NULL,
  `disiplin_pskologis` text DEFAULT NULL,
  `tanggungjawab_pskologis` text DEFAULT NULL,
  `keterangan_pskologis` text DEFAULT NULL,
  `penyesuaian_sosial` text DEFAULT NULL,
  `kerjasama_sosial` text DEFAULT NULL,
  `sopan_sosial` text DEFAULT NULL,
  `keterangan_sosial` text DEFAULT NULL,
  `gambaran_masalah` text DEFAULT NULL,
  `penyelesaian_masalah` text DEFAULT NULL,
  `perubahan_masalah` text DEFAULT NULL,
  `keterangan_masalah` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_manager`
--

CREATE TABLE `user_manager` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_panti` int(11) NOT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'adminpanti',
  `alamat_detail` varchar(255) NOT NULL,
  `alamat_rt` int(11) NOT NULL,
  `alamat_rw` int(11) NOT NULL,
  `alamat_kelurahan` varchar(255) NOT NULL,
  `alamat_kecamatan` varchar(255) NOT NULL,
  `alamat_kabupaten` varchar(255) NOT NULL,
  `alamat_provinsi` varchar(255) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `verifikasi` int(11) NOT NULL DEFAULT 0,
  `tanggal_masuk` date DEFAULT NULL,
  `tanggal_keluar` date DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_manager`
--

INSERT INTO `user_manager` (`id`, `nama`, `email`, `telp`, `password`, `id_panti`, `jabatan`, `role`, `alamat_detail`, `alamat_rt`, `alamat_rw`, `alamat_kelurahan`, `alamat_kecamatan`, `alamat_kabupaten`, `alamat_provinsi`, `kode_pos`, `verifikasi`, `tanggal_masuk`, `tanggal_keluar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin Panti', 'admin@pantiharapanmulia.com', '085877493514', '$2y$10$96EeJsK.wmgyFnu7RuSNeeWDj9Qk2SAIhc6RatSaJ2aKdUtDptHPK', 1, 'Admin', 'adminpanti', 'RT07/RW01', 7, 1, 'Kotayasa', 'Sumbang', 'Banyumas', 'Jawa Tengah', 53183, 1, '2018-11-01', NULL, '2022-11-02 02:04:59', '2022-11-02 02:04:59', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anak_asuh`
--
ALTER TABLE `anak_asuh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokumen_anak`
--
ALTER TABLE `dokumen_anak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donatur`
--
ALTER TABLE `donatur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_pengeluaran`
--
ALTER TABLE `item_pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orangtua_anak`
--
ALTER TABLE `orangtua_anak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panti`
--
ALTER TABLE `panti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perkembangan_anak`
--
ALTER TABLE `perkembangan_anak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_manager`
--
ALTER TABLE `user_manager`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anak_asuh`
--
ALTER TABLE `anak_asuh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `dokumen_anak`
--
ALTER TABLE `dokumen_anak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donatur`
--
ALTER TABLE `donatur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `item_pengeluaran`
--
ALTER TABLE `item_pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orangtua_anak`
--
ALTER TABLE `orangtua_anak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `panti`
--
ALTER TABLE `panti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `perkembangan_anak`
--
ALTER TABLE `perkembangan_anak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_manager`
--
ALTER TABLE `user_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

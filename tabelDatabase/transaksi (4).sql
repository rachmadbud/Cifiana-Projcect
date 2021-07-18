-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2021 at 04:04 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apriori`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(20) NOT NULL,
  `kodeNota` varchar(20) NOT NULL,
  `namaPembeli` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `kodeNota`, `namaPembeli`, `alamat`, `total`, `created_at`, `updated_at`) VALUES
(1, 'ASDFGH23', 'Wahyu', '', 373630, '2021-07-11 11:27:56', '2021-07-11 11:27:56'),
(12, '236915847', 'Rachmad Budianto', '', 20000, '2021-07-14 17:31:16', '2021-07-14 17:31:16'),
(13, '176329845', 'Romi Ardiyanto', '', 30000, '2021-07-14 17:33:51', '2021-07-14 17:33:51'),
(14, '167593824', 'Fiki', '', 154120, '2021-07-14 17:37:47', '2021-07-14 17:37:47'),
(15, '296135847', 'Riyanto', '', 8000, '2021-07-16 04:42:05', '2021-07-16 04:42:05'),
(16, '581267493', 'CIFIANA HANDAYANI', '', 6000, '2021-07-16 16:53:46', '2021-07-16 16:53:46'),
(17, '489562371', 'CIFIANA HANDAYANI', '', 6000, '2021-07-16 17:17:04', '2021-07-16 17:17:04'),
(18, '816947532', 'Example', 'Jalan exampale', 55000, '2021-07-18 02:25:30', '2021-07-18 02:25:30'),
(19, '357619824', 'Bp Arif', 'sribasuki, sebelah tk anggrek', 2115000, '2021-02-18 03:23:38', '2021-07-18 03:23:38'),
(20, '419758236', 'Bp Bagus', 'Punai, Sebelah Warung mie ayam', 2947000, '2021-02-18 03:50:06', '2021-07-18 03:50:06'),
(21, '184936257', 'Anad', 'Skip sebelah lapangan', 880000, '2021-02-18 03:52:01', '2021-07-18 03:52:01'),
(22, '189725364', 'Bp Ridho', 'Rejosari jalan sri rejeki', 945000, '2021-02-18 03:57:58', '2021-07-18 03:57:58'),
(23, '675481293', 'Bp Iyos', 'Rejosari Per3an ahmad akuan', 1285000, '2021-02-18 04:00:46', '2021-07-18 04:00:46'),
(24, '194523678', 'Bu Erissa', 'Sribasuki Samping yudi tarup', 2097000, '2021-02-18 04:03:39', '2021-07-18 04:03:39'),
(25, '451932678', 'Andi Kancil', 'Umbul sunda sebelah musola', 620000, '2021-02-18 04:06:23', '2021-07-18 04:06:23'),
(26, '698723514', 'Pak Maryadi', 'Warung Pojok', 1431000, '2021-07-18 04:12:40', '2021-02-18 04:12:40'),
(27, '972843165', 'Tatang las', 'Jalan manunggal', 1560000, '2021-02-18 04:15:23', '2021-07-18 04:15:23'),
(28, '137824965', 'Mbah marno', 'Kelapa 7 depan sd 6', 2095000, '2021-02-18 04:18:25', '2021-07-18 04:18:25'),
(29, '867952341', 'Febri', 'Simpang saprodi', 608000, '2021-03-18 05:37:51', '2021-07-18 05:37:51'),
(30, '485261937', 'Bp Marwan', 'Bumi agung dekat kantor lurah', 1070000, '2021-03-18 05:40:25', '2021-07-18 05:40:25'),
(31, '793148562', 'Pak Ratjam', 'Pungguk Lama', 2690000, '2021-03-18 05:46:47', '2021-07-18 05:46:47'),
(32, '925364817', 'Ibu Nole', 'Penagan Ratu', 750000, '2021-03-18 05:47:35', '2021-07-18 05:47:35'),
(33, '574198236', 'Ibu Singgit', 'Perumnas Telung Mili', 821500, '2021-03-18 05:50:34', '2021-07-18 05:50:34'),
(34, '765928413', 'Adi bayu', 'Banyu urip', 521000, '2021-03-18 05:51:59', '2021-07-18 05:51:59'),
(35, '692547831', 'Wasir urut', 'Campur sari', 534000, '2021-03-18 05:53:41', '2021-07-18 05:53:41'),
(36, '713925864', 'Ibu affan', 'Sribasuki, dekat gudang sudar', 1212000, '2021-03-18 05:57:19', '2021-07-18 05:57:19'),
(37, '398517264', 'Andre', 'Jl. manunggal', 956000, '2021-03-18 05:59:25', '2021-07-18 05:59:25'),
(38, '964278315', 'Gofar', 'Dahlia, sebelah rel', 295000, '2021-03-18 06:00:16', '2021-07-18 06:00:16'),
(39, '127894635', 'ajis', 'kota alam blakang smp 3', 987000, '2021-04-18 06:02:07', '2021-07-18 06:02:07'),
(40, '918736542', 'Ibu Sepri', 'Tanah miring', 1223000, '2021-07-18 06:05:13', '2021-07-18 06:05:13'),
(41, '179625438', 'Bp Peno', 'Pasar pagi', 1178000, '2021-04-18 06:31:44', '2021-07-18 06:31:44'),
(42, '416738295', 'Haikal', 'Belakang RS rya cudu', 550000, '2021-07-18 06:36:54', '2021-07-18 06:36:54'),
(43, '432679581', 'Bp Adi', 'Rejosari samping sd 2', 656000, '2021-04-18 06:39:11', '2021-07-18 06:39:11'),
(44, '436781592', 'Pak Gudung', 'Tulung batuan, service kulkas', 528000, '2021-04-18 06:45:41', '2021-07-18 06:45:41'),
(45, '453896127', 'Ibu Rusman', 'Komi', 642000, '2021-04-18 06:49:24', '2021-07-18 06:49:24'),
(46, '563871294', 'Alam', 'Rejosari, sebelah masjid baitul rohim', 1650000, '2021-04-18 06:58:08', '2021-07-18 06:58:08'),
(47, '952631874', 'Riski', 'Rejosari, depan indomarko', 560000, '2021-04-18 07:00:35', '2021-07-18 07:00:35'),
(48, '628517934', 'Bp. giyo', 'Sribasuki, sdebelah hadi electric', 815000, '2021-04-18 07:03:46', '2021-07-18 07:03:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

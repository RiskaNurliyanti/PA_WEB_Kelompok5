-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 01:26 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `top_up_game`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin1`
--

CREATE TABLE `admin1` (
  `id` int(5) NOT NULL,
  `username` varchar(40) NOT NULL,
  `psw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin1`
--

INSERT INTO `admin1` (`id`, `username`, `psw`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `psw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `nama`, `username`, `email`, `psw`) VALUES
(4, 'test', 'test', 'test@gmail.com', '$2y$10$sRxzgPeTH1POhSjejez5auhk.9tIoS2cIXYkLH5qyOv90exovcTYO'),
(5, 'coba', 'coba', 'coba@gmail.com', '$2y$10$yJoQb8zeW79nyLYY9ta9WuiQqyaXzdjl1wEYh4P1sE5pni/iHY42y'),
(6, 'mail', 'mail', 'mail@gmail.com', '$2y$10$/spEBBLcuFi1psF9VQVTDe8tlFPEPuIHedcIwNw69OYr2Czj4SZBq');

-- --------------------------------------------------------

--
-- Table structure for table `boxcomment`
--

CREATE TABLE `boxcomment` (
  `id_comment` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `komentar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `boxcomment`
--

INSERT INTO `boxcomment` (`id_comment`, `nama`, `email`, `tanggal`, `komentar`) VALUES
(1, 'test', 'test@gmail.com', '12-11-2022', 'abcdefg'),
(5, 'coba', 'coba@gmail.com', '11-11-2022', '789'),
(10, 'mail', 'mail@gmail.com', '12-11-2022', '6'),
(11, 'fizi', 'fizi@gmail.com', '12-11-2022', '111');

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `id_game` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_pilihan` varchar(255) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id_game`, `nama`, `jenis_pilihan`, `gambar`) VALUES
(16, 'APEX', 'Syndicate Gold Pack 4 (500 Gold) Rp 65.000, Syndicate Gold Pack 33 (800 Gold) Rp 99.000, Syndicate G', 'Apex.png'),
(17, 'Call of Duty Mobile', '31 CP Rp 5.000, 127 CP Rp 20.000, 320 CP Rp 50.000', 'cod.jpg'),
(18, 'Higgs Domino', '30M Koin Emas Rp 5.000, 100M Koin Emas Rp 15.000, 200M Koin Emas Rp 30.000', 'domino.jpg'),
(19, 'Free Fire', '70 Diamonds Rp 10.000, 140 Diamonds Rp 20.000, 355 Diamonds Rp 50.000', 'ff.jpg'),
(20, 'Growtopia', 'Builder Lock Rp 2.600, Bunny Lock Rp 3.600, Diamond Lock Rp 6.000,  ', 'gt.webp'),
(21, 'League of Legends', '125 Wild Cores Rp 15.000, 417 Wild Cores +7 Bonus Rp 50.000, 667 Wild Cores +67 Bonus Rp 80.000', 'lol.png'),
(22, 'Mobile Legend', '42 Diamonds Rp 12.000, 257 Diamonds Rp 65.000, 514 Diamonds Rp 140.000 ', 'ml.png'),
(23, 'PUBG Mobile', '60 UC Rp 15.000, 325 UC Rp 75.000, 660 UC Rp 150.000 ', 'pubg.jpg'),
(24, 'Sausage Man', '60 CANDIES Rp 16.000, 180 CANDIES Rp 49.000, 316 CANDIES Rp 79.000', 'sausage.jpg'),
(25, 'Valorant', '300 Points Rp 34.000, 625 Points Rp 67.000, 1125 Points Rp 167.000', 'Valorant.png');

-- --------------------------------------------------------

--
-- Table structure for table `meme`
--

CREATE TABLE `meme` (
  `id` int(11) NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meme`
--

INSERT INTO `meme` (`id`, `waktu`, `nama`) VALUES
(8, '11-11-2022', 'test.png'),
(12, '11-11-2022', 'test.webp'),
(13, '11-11-2022', 'test.png'),
(15, '12-11-2022', 'akun2.png'),
(16, '12-11-2022', 'admin.png');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_beli` int(5) NOT NULL,
  `id_akun` int(5) NOT NULL,
  `id_game` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nama_game` varchar(30) NOT NULL,
  `id_user` varchar(30) NOT NULL,
  `server_id` varchar(30) NOT NULL,
  `jenis_pilihan` varchar(50) NOT NULL,
  `pembayaran` varchar(30) NOT NULL,
  `waktu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_beli`, `id_akun`, `id_game`, `nama`, `email`, `nama_game`, `id_user`, `server_id`, `jenis_pilihan`, `pembayaran`, `waktu`) VALUES
(14, 5, 21, 'coba', 'coba@gmail.com', 'League', '345', '1111', '417 Wild Cores +7 Bonus Rp 50.000', 'transfer', '2022-11-11'),
(15, 5, 20, 'coba', 'coba@gmail.com', 'Growtopia', 'aaaaa', '678', 'Builder Lock Rp 2.600', 'E-Wallet', '2022-11-29'),
(25, 4, 17, 'test', 'test@gmail.com', 'Call of Duty Mobile', '777', '7777', ' 320 CP Rp 50.000', 'E-Wallet', '2022-11-12'),
(26, 4, 24, 'test', 'test@gmail.com', 'Sausage Man', '888', '999', '180 CANDIES Rp 49.000', 'transfer', '2022-11-12'),
(27, 4, 17, 'test', 'test@gmail.com', 'Call of Duty Mobile', '1313', '1212', '31 CP Rp 5.000', 'E-Wallet', '2022-11-14'),
(29, 6, 22, 'mail', 'mail@gmail.com', 'Mobile Legend', '888', '888', '257 Diamonds Rp 65.000', 'E-Wallet', '2022-11-14'),
(30, 4, 24, 'test', 'test@gmail.com', 'Sausage Man', '444', '444', '180 CANDIES Rp 49.000', 'virtual', '2022-11-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin1`
--
ALTER TABLE `admin1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boxcomment`
--
ALTER TABLE `boxcomment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id_game`);

--
-- Indexes for table `meme`
--
ALTER TABLE `meme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_beli`),
  ADD KEY `id_game` (`id_game`),
  ADD KEY `id_akun` (`id_akun`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin1`
--
ALTER TABLE `admin1`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `boxcomment`
--
ALTER TABLE `boxcomment`
  MODIFY `id_comment` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `id_game` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `meme`
--
ALTER TABLE `meme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_beli` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

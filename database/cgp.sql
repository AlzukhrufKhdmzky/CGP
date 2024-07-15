-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2023 at 11:50 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cgp`
--

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id_film` int(11) NOT NULL,
  `judul` varchar(60) NOT NULL,
  `id_genre` varchar(4) NOT NULL,
  `id_rating` varchar(4) NOT NULL,
  `durasi` int(3) NOT NULL,
  `produser` varchar(60) NOT NULL,
  `tanggal_rilis` date NOT NULL,
  `sinopsis` varchar(800) NOT NULL,
  `img` varchar(100) NOT NULL,
  `trailler` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id_film`, `judul`, `id_genre`, `id_rating`, `durasi`, `produser`, `tanggal_rilis`, `sinopsis`, `img`, `trailler`) VALUES
(4, 'Fast X', 'AKS', 'DE20', 141, 'Neal H. Moritz · Vin Diesel; Justin Lin; Jeff Kirschenbaum;', '2023-03-17', 'Selama banyak misi dan melawan rintangan yang mustahil, Dom Toretto dan keluarganya telah mengakali dan mengalahkan setiap musuh di jalan mereka. Sekarang, mereka menghadapi lawan paling mematikan yang pernah mereka hadapi: Ancaman mengerikan yang muncul dari bayang-bayang masa lalu yang dipicu oleh dendam berdarah, dan yang bertekad untuk menghancurkan keluarga ini dan menghancurkan segalanyadan semua orangyang dicintai Dom, selamanya.', 'img1686675555.jpg', 'mp41686675555.mp4'),
(5, 'Transformers: Rise of the Beasts', 'FKS', 'SU00', 127, 'Michael Bay, Lorenzo di Bonaventura, Duncan Henderson, Tom D', '2023-05-17', 'Kembali ke aksi dan tontonan yang telah memikat penonton bioskop di seluruh dunia, Transformers: Rise of the Beasts akan membawa penonton dalam petualangan keliling dunia tahun 90-an dengan Autobots dan memperkenalkan generasi baru Transformer – Maximals – ke pertempuran yang ada di bumi antara Autobots dan Decepticons.', 'img1686675778.jpg', 'mp41686675778.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id_genre` varchar(3) NOT NULL,
  `genre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id_genre`, `genre`) VALUES
('AKS', 'Aksi/Laga'),
('CMD', 'Comedy'),
('DRM', 'Drama'),
('FKS', 'FIksi/Ilmiah'),
('FNT', 'Fantasy'),
('HRR', 'Horror'),
('RMS', 'Romantis');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id_rating` varchar(4) NOT NULL,
  `rating` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id_rating`, `rating`) VALUES
('DE20', '20+'),
('RE17', '17+'),
('SU00', 'SU');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  `studio` int(1) NOT NULL,
  `lokasi` varchar(256) NOT NULL,
  `jumlah_tiket` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `id_film`, `studio`, `lokasi`, `jumlah_tiket`) VALUES
(10, 5, 2, 'Metropolitan Mall Bekasi, Revo Town Bekasi', 40),
(17, 4, 1, 'Metropolitan Mall Bekasi, Revo Town Bekasi', 60);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  `date` varchar(80) NOT NULL,
  `time` varchar(6) NOT NULL,
  `lokasi` varchar(128) NOT NULL,
  `studio` int(1) NOT NULL,
  `ticket` int(1) NOT NULL,
  `seats` varchar(20) NOT NULL,
  `total_priece` int(11) NOT NULL,
  `date_pesan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_film`, `date`, `time`, `lokasi`, `studio`, `ticket`, `seats`, `total_priece`, `date_pesan`) VALUES
(12, 2, 5, '30 Juni 2023', '16.00', 'Revo Town Bekasi', 2, 2, '39, 40', 80000, 1687633267),
(13, 4, 5, '27 Juni 2023', '16.00', 'Metropolitan Mall Bekasi', 2, 2, '29, 30', 80000, 1687679974),
(14, 4, 4, '30 Juni 2023', '13.45', 'Pondok Gede', 1, 1, '35', 40000, 1687683316);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `img` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`, `role_id`, `date_created`, `img`) VALUES
(2, 'Alzukhruf Khadomizky', 'zukhruf@gmail.com', '$2y$10$NWe1c9oxSHR9RtBVSOzU5OA5xK0k9grwt0T/rAUSWz5TPnZXgDIc2', 2, 1686817185, 'default.jpg'),
(3, 'admin2', 'admin2@gmail.com', '$2y$10$Chu5ZeyPVoKdgunhyfJh3ebR/ijjcuRBsYR/JnWLDCDkWHlZXLZS6', 1, 1686839605, 'default.jpg'),
(4, 'Lionel Messi', 'messi10@gmail.com', '$2y$10$ug1JyVCxlJLIeCx9iXDhwOCuEFGMH8//JFE8E7LtIpEp5U2pDcdKm', 2, 1687679914, 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

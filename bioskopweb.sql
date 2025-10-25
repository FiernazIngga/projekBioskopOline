-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 24, 2025 at 02:46 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

 /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
 /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
 /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 /*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bioskopweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int NOT NULL,
  `id_user` varchar(255) NOT NULL COLLATE utf8mb4_general_ci,
  `role_user` varchar(11) NOT NULL DEFAULT 'Free' COLLATE utf8mb4_general_ci,
  `expired_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `id_user`, `role_user`, `expired_at`) VALUES
(1, 'usr_68fa3463db0ee_20251023', 'Free', NULL),
(2, 'usr_68fa3637bc364_20251023', 'Free', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` varchar(255) NOT NULL COLLATE utf8mb4_general_ci,
  `nama` varchar(100) NOT NULL COLLATE utf8mb4_general_ci,
  `username` varchar(255) NOT NULL COLLATE utf8mb4_general_ci,
  `password` varchar(255) NOT NULL COLLATE utf8mb4_general_ci,
  `email` varchar(255) NOT NULL COLLATE utf8mb4_general_ci,
  `foto_profil` varchar(100) NOT NULL DEFAULT 'default.png' COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`, `email`, `foto_profil`) VALUES
('usr_68fa3463db0ee_20251023', 'Prada Bimaya', 'admin', '123', 'prada@gmail.com', 'usr_68fa3463db0ee_20251023_1761228323.jpg'),
('usr_68fa3637bc364_20251023', 'Albertus Ali Edited', 'user', '123', 'albertus@gmail.com', 'default.png');

--
-- Indexes for dumped tables
--

-- Indexes for table `role`
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

-- Indexes for table `users`
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

-- AUTO_INCREMENT for table `role`
ALTER TABLE `role`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

COMMIT;

 /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
 /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
 /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

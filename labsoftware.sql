-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 06, 2022 at 04:44 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `labsoftware`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id_articles` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `id_categories` int(11) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id_articles`, `title`, `description`, `thumbnail`, `date`, `id_categories`, `id_users`) VALUES
(1, 'Cara mudah mempercepat windows 11', '<p>edited dfsfds</p>', '1657047291_b316f40e84e3bb23b9fd.png', '2022-07-05', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_categories` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_categories`, `name`) VALUES
(1, 'Berita'),
(4, 'Komputer'),
(5, 'Pendidikan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roles` enum('admin','staff') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `name`, `username`, `password`, `roles`) VALUES
(1, 'Muhammad Dzaky', 'admin', '$2y$10$brHpBxzQG/p.hvUfVX3uhuITpvLwCgMRRHi6BwwwK76LUpcbPJJdO', 'admin'),
(4, 'Naomi', 'staff', '$2y$10$qAUFx2d69LAwmUHDGDvzdutoAgGgoH2rtuxgd57GW3thpEwBnwkEq', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id_visitors` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_articles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id_visitors`, `type`, `created_at`, `id_articles`) VALUES
(1, 1, '2022-07-05 23:26:45', 1),
(2, 1, '2022-07-05 23:36:29', 1),
(3, 1, '2022-07-05 23:37:05', 1),
(4, 1, '2022-07-06 00:25:24', 1),
(5, 1, '2022-07-06 00:25:38', 1),
(6, 1, '2022-07-06 00:28:40', 1),
(7, 1, '2022-07-06 00:28:48', 1),
(8, 1, '2022-07-06 00:29:28', 1),
(9, 1, '2022-07-06 00:29:40', 1),
(10, 2, '2022-07-06 00:30:06', 1),
(11, 2, '2022-07-06 00:30:10', 1),
(12, 2, '2022-07-06 00:30:15', 1),
(13, 2, '2022-07-06 00:30:18', 1),
(14, 2, '2022-07-06 00:30:19', 1),
(15, 2, '2022-07-06 00:30:53', 1),
(16, 2, '2022-07-06 00:31:14', 1),
(17, 2, '2022-07-06 00:31:24', 1),
(18, 2, '2022-07-06 00:31:37', 1),
(19, 2, '2022-07-06 00:33:33', 1),
(20, 2, '2022-07-06 00:34:30', 1),
(21, 2, '2022-07-06 00:38:47', 1),
(22, 2, '2022-07-06 00:39:02', 1),
(23, 2, '2022-07-06 00:39:41', 1),
(24, 2, '2022-07-06 00:39:56', 1),
(25, 2, '2022-07-06 00:41:14', 1),
(26, 2, '2022-07-06 00:41:29', 1),
(27, 2, '2022-07-06 00:41:39', 1),
(28, 2, '2022-07-06 00:41:56', 1),
(29, 2, '2022-07-06 00:42:20', 1),
(30, 2, '2022-07-06 00:42:35', 1),
(31, 2, '2022-07-06 00:42:55', 1),
(32, 2, '2022-07-06 00:43:12', 1),
(33, 2, '2022-07-06 00:43:34', 1),
(34, 2, '2022-07-06 00:44:24', 1),
(35, 2, '2022-07-06 00:45:02', 1),
(36, 2, '2022-07-06 00:45:35', 1),
(37, 2, '2022-07-06 00:45:41', 1),
(38, 2, '2022-07-06 00:48:01', 1),
(39, 2, '2022-07-06 00:48:13', 1),
(40, 2, '2022-07-06 00:48:47', 1),
(41, 2, '2022-07-06 00:49:00', 1),
(42, 2, '2022-07-06 00:49:47', 1),
(43, 2, '2022-07-06 00:50:16', 1),
(44, 2, '2022-07-06 00:50:33', 1),
(45, 2, '2022-07-06 00:52:52', 1),
(46, 2, '2022-07-06 00:54:43', 1),
(47, 2, '2022-07-06 00:54:55', 1),
(48, 2, '2022-07-06 01:01:55', 1),
(49, 2, '2022-07-06 01:05:55', 1),
(50, 2, '2022-07-06 01:06:16', 1),
(51, 2, '2022-07-06 01:06:28', 1),
(52, 2, '2022-07-06 01:06:43', 1),
(53, 2, '2022-07-06 01:06:46', 1),
(54, 2, '2022-07-06 01:06:48', 1),
(55, 2, '2022-07-06 01:07:03', 1),
(56, 2, '2022-07-06 01:07:54', 1),
(57, 2, '2022-07-06 01:10:24', 1),
(58, 2, '2022-07-06 01:10:44', 1),
(59, 2, '2022-07-06 01:10:57', 1),
(60, 2, '2022-07-06 01:11:11', 1),
(61, 2, '2022-07-06 01:11:17', 1),
(62, 2, '2022-07-06 01:11:24', 1),
(63, 2, '2022-07-06 01:12:03', 1),
(64, 2, '2022-07-06 01:13:10', 1),
(65, 2, '2022-07-06 01:13:32', 1),
(66, 2, '2022-07-06 01:13:38', 1),
(67, 2, '2022-07-06 01:15:27', 1),
(68, 2, '2022-07-06 01:15:49', 1),
(69, 2, '2022-07-06 01:16:10', 1),
(70, 2, '2022-07-06 01:16:40', 1),
(71, 2, '2022-07-06 01:17:27', 1),
(72, 2, '2022-07-06 01:17:52', 1),
(73, 2, '2022-07-06 01:18:09', 1),
(74, 2, '2022-07-06 01:18:20', 1),
(75, 2, '2022-07-06 01:18:41', 1),
(76, 2, '2022-07-06 01:20:09', 1),
(77, 2, '2022-07-06 01:20:29', 1),
(78, 2, '2022-07-06 01:21:07', 1),
(79, 2, '2022-07-06 01:21:31', 1),
(80, 2, '2022-07-06 01:30:29', 1),
(81, 2, '2022-07-06 01:31:07', 1),
(82, 2, '2022-07-06 01:31:13', 1),
(83, 2, '2022-07-06 01:31:33', 1),
(84, 2, '2022-07-06 01:31:41', 1),
(85, 2, '2022-07-06 01:33:15', 1),
(86, 2, '2022-07-06 01:33:41', 1),
(87, 2, '2022-07-06 01:34:33', 1),
(88, 2, '2022-07-06 02:33:17', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id_articles`),
  ADD KEY `id_categories` (`id_categories`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categories`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id_visitors`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id_articles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categories` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id_visitors` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 20 Jan 2023 pada 11.11
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `articles`
--

CREATE TABLE `articles` (
  `id_articles` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `slug` text NOT NULL,
  `id_categories` int(11) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `articles`
--

INSERT INTO `articles` (`id_articles`, `title`, `description`, `thumbnail`, `date`, `slug`, `id_categories`, `id_users`) VALUES
(6, 'Competitive Fund Vokasi 2022', '<p>lorem</p>', '1665633574_d93e1e7182cdbed6bdd7.png', '2022-10-12', 'competitive-fund-vokasi-2022', 1, 1),
(7, 'Kunjungan Industri', '<p>lorem</p>', '1665633650_3ec9649349628013adf3.png', '2022-10-12', 'kunjungan-industri', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id_categories` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id_categories`, `name`) VALUES
(1, 'Berita'),
(4, 'Komputer'),
(5, 'Pendidikan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `donate`
--

CREATE TABLE `donate` (
  `id_donate` int(11) NOT NULL,
  `donors` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `npm` int(8) DEFAULT NULL,
  `id_users` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `notification` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `donate`
--

INSERT INTO `donate` (`id_donate`, `donors`, `title`, `author`, `status`, `picture`, `npm`, `id_users`, `id_prodi`, `notification`) VALUES
(34, NULL, 'Sang pemimpi', 'Andrea Hirata', 0, NULL, 213, 4, 0, 0),
(36, NULL, 'Belajar Excel', 'Muhammad Dzaky', 0, NULL, 123, 0, 2, 0),
(37, NULL, 'Belajar PHP', 'Dzaky', 0, NULL, 12, 4, 1, 0),
(38, NULL, 'Belajar HTML', 'reza', 0, NULL, 12321, 0, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `name`) VALUES
(1, 'Manajemen Informatika'),
(2, 'Akuntansi Digital'),
(3, 'Pariwisata');

-- --------------------------------------------------------

--
-- Struktur dari tabel `teaching_materials`
--

CREATE TABLE `teaching_materials` (
  `id_materials` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `material` text NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `teaching_materials`
--

INSERT INTO `teaching_materials` (`id_materials`, `title`, `material`, `description`, `status`, `id_users`, `id_prodi`) VALUES
(10, 'Agribisnis - Manajemen Pemasaran oleh Fitriani, S.P., M.E.P', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/C-twZZtBD1I\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '-', 1, 0, 3),
(13, 'ini dokumen', '1674015980_04d9d07bf5f66ad67a75.pdf', 'pdf', 2, 4, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roles` enum('admin','staff') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `name`, `username`, `password`, `roles`) VALUES
(1, 'Muhammad Dzaky', 'admin', '$2y$10$brHpBxzQG/p.hvUfVX3uhuITpvLwCgMRRHi6BwwwK76LUpcbPJJdO', 'admin'),
(4, 'Marta Santra Wijaya', 'staff', '$2y$10$H1AUjN87AB38.gi7gm4IWeKqApOKeHu6LY2Ezs2ppkl9Bs9.zdQhC', 'staff');

-- --------------------------------------------------------

--
-- Struktur dari tabel `visitors`
--

CREATE TABLE `visitors` (
  `id_visitors` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_articles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `visitors`
--

INSERT INTO `visitors` (`id_visitors`, `type`, `created_at`, `id_articles`) VALUES
(917, 2, '2023-01-19 18:49:11', 6),
(918, 1, '2023-01-19 19:46:51', 1),
(919, 1, '2023-01-19 19:46:52', 1),
(920, 1, '2023-01-19 19:46:55', 1),
(921, 1, '2023-01-19 19:53:37', 1),
(922, 1, '2023-01-19 19:53:37', 1),
(923, 1, '2023-01-19 19:53:39', 1),
(924, 1, '2023-01-19 19:57:30', 1),
(925, 1, '2023-01-19 19:57:32', 1),
(926, 1, '2023-01-19 19:58:32', 1),
(927, 1, '2023-01-19 19:58:40', 1),
(928, 1, '2023-01-19 19:58:50', 1),
(929, 1, '2023-01-19 20:04:01', 1),
(930, 1, '2023-01-19 20:04:15', 1),
(931, 1, '2023-01-19 20:07:00', 1),
(932, 1, '2023-01-19 20:07:05', 1),
(933, 1, '2023-01-19 20:10:51', 1),
(934, 1, '2023-01-19 20:15:44', 1),
(935, 1, '2023-01-19 20:15:52', 1),
(936, 1, '2023-01-20 02:13:27', 1),
(937, 1, '2023-01-20 02:14:32', 1),
(938, 1, '2023-01-20 03:43:28', 1),
(939, 1, '2023-01-20 03:44:08', 1),
(940, 1, '2023-01-20 03:45:11', 1),
(941, 1, '2023-01-20 03:45:31', 1),
(942, 1, '2023-01-20 03:49:12', 1),
(943, 1, '2023-01-20 06:49:23', 1),
(944, 1, '2023-01-20 06:49:32', 1),
(945, 1, '2023-01-20 06:54:01', 1),
(946, 1, '2023-01-20 06:54:32', 1),
(947, 1, '2023-01-20 06:54:44', 1),
(948, 1, '2023-01-20 08:01:46', 1),
(949, 1, '2023-01-20 08:02:06', 1),
(950, 1, '2023-01-20 08:30:40', 1),
(951, 1, '2023-01-20 08:33:18', 1),
(952, 1, '2023-01-20 08:33:51', 1),
(953, 1, '2023-01-20 08:34:09', 1),
(954, 1, '2023-01-20 08:35:29', 1),
(955, 1, '2023-01-20 08:35:30', 1),
(956, 1, '2023-01-20 08:35:59', 1),
(957, 1, '2023-01-20 08:36:08', 1),
(958, 1, '2023-01-20 08:37:21', 1),
(959, 1, '2023-01-20 08:37:38', 1),
(960, 1, '2023-01-20 09:01:51', 1),
(961, 1, '2023-01-20 09:02:00', 1),
(962, 1, '2023-01-20 09:02:07', 1),
(963, 1, '2023-01-20 09:02:37', 1),
(964, 1, '2023-01-20 09:02:44', 1),
(965, 1, '2023-01-20 09:52:46', 1),
(966, 1, '2023-01-20 09:53:00', 1),
(967, 1, '2023-01-20 09:54:20', 1),
(968, 1, '2023-01-20 09:57:26', 1),
(969, 1, '2023-01-20 09:57:40', 1),
(970, 1, '2023-01-20 09:57:51', 1),
(971, 1, '2023-01-20 09:58:03', 1),
(972, 1, '2023-01-20 09:58:14', 1),
(973, 1, '2023-01-20 09:59:31', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id_articles`),
  ADD KEY `id_categories` (`id_categories`),
  ADD KEY `id_users` (`id_users`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categories`);

--
-- Indeks untuk tabel `donate`
--
ALTER TABLE `donate`
  ADD PRIMARY KEY (`id_donate`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indeks untuk tabel `teaching_materials`
--
ALTER TABLE `teaching_materials`
  ADD PRIMARY KEY (`id_materials`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- Indeks untuk tabel `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id_visitors`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `articles`
--
ALTER TABLE `articles`
  MODIFY `id_articles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categories` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `donate`
--
ALTER TABLE `donate`
  MODIFY `id_donate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `teaching_materials`
--
ALTER TABLE `teaching_materials`
  MODIFY `id_materials` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id_visitors` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=974;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

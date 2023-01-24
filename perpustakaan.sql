-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 24 Jan 2023 pada 17.39
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
(7, 'Kunjungan Industri', '<p>lorem</p>', '1665633650_3ec9649349628013adf3.png', '2022-10-12', 'kunjungan-industri', 1, 1),
(12, 'Launching PKM Center dan Pembekalan Polinela Goes to School (PGTS) 2023', '<p><span style=\"color: rgb(61, 61, 61); font-family: Poppins, serif; font-size: 13px;\">Polinela, Selasa (17/1/23). Program Kreativitas Mahasiswa (PKM) Center resmi dibuka oleh Wakil Direktur III Polinela Agung Adi Candra, S.Kh., M.SI. pada hari Selasa 17 Januari 2023 di Gedung Serba Guna (GSG). Kegiatan ini dihadiri oleh Direktur, Ka. Humas, Pengurus UKM Smart, dan mahasiswa penerima beasiswa KIP-K.</span><span id=\"more-6338\" style=\"border: 0px; font-family: Poppins, serif; font-size: 13px; margin: 0px; padding: 0px; outline: 0px; vertical-align: baseline; color: rgb(61, 61, 61);\"></span><br style=\"color: rgb(61, 61, 61); font-family: Poppins, serif; font-size: 13px;\"><span style=\"color: rgb(61, 61, 61); font-family: Poppins, serif; font-size: 13px;\">Dalam laporanya, Ketua UKM Smart Aldenny Rezky Roham menyampaikan bahwa PKM Center akan menjadi pusat informasi dan pelatihan dalam pengusulan PKM. PKM Center Polinela diharapkan menjadi wadah untuk menyatukan tekad dan semangat kuat dalam menggali potensi dan inovasi mahasiswa Polinela pada program PKM-PIMNAS untuk mewujudkan cita-cita besar meraih puncak tertinggi penghargaan di bidang program penalaran yaitu Program Kreativitas Mahasiswa (PKM).</span><br></p>', '1674534683_4893e653051f3847ec48.jpg', '2023-01-24', 'launching-pkm-center-dan-pembekalan-polinela-goes-to-school-pgts-2023', 1, 4),
(13, 'Polinela Gelar Launching Sistem Penerimaan Mahasiswa Baru Tahun 2023/2024', '<p style=\"color: rgb(171, 178, 191); font-family: &quot;Fira Code&quot;, Consolas, &quot;Courier New&quot;, monospace; font-size: 20px; line-height: 40px; white-space: pre;\"><span style=\"font-family: Arial;\">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptate, dolores omnis! Dolore quae, molestias animi quas architecto nulla sunt. Accusantium veritatis ipsa ducimus placeat sit, laudantium magni aut rem veniam corporis eius porro, natus qui minima recusandae quibusdam autem sunt sequi debitis repellat. Iusto fuga obcaecati nisi quasi sit rem autem vel veritatis unde molestiae harum, explicabo illum mollitia voluptatibus? Minima, assumenda neque accusantium voluptatem iure dicta illum illo, molestias, ducimus ipsum delectus quod ut animi minus fugiat eius optio. Nemo autem dolore dicta eveniet fuga facilis tempora quo obcaecati.</span></p>', '1674534780_faf8a4bc7d5ace628b32.jpg', '2023-01-24', 'polinela-gelar-launching-sistem-penerimaan-mahasiswa-baru-tahun-20232024', 1, 4),
(14, 'Agenda Dies Natalis Ke-38 Th Politeknik Negeri Lampung', '<article id=\"post-4834\" class=\"post-4834 post type-post status-publish format-standard has-post-thumbnail hentry category-agenda\" style=\"margin: 0px 0px 15px; color: rgb(61, 61, 61); font-family: Poppins, serif; font-size: 14px;\"><div class=\"entry-content\" style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 15px 0px 0px; padding: 0px; outline: 0px; vertical-align: baseline;\"><p style=\"border: 0px; font-family: inherit; font-size: 1.3rem; font-style: inherit; font-weight: inherit; margin-right: 0px; margin-bottom: 2.30769rem; margin-left: 0px; padding: 0px; outline: 0px; vertical-align: baseline; position: relative; line-height: 1.4em;\">Rangkain acara dan kegiatan Dies Natalis ke-38 tahun Politeknik Negeri Lampung</p></div></article>', '1674534854_54617cf592f59f13249c.jpg', '2023-01-24', 'agenda-dies-natalis-ke-38-th-politeknik-negeri-lampung', 1, 4);

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
(41, 'Hanum', 'Codeigniter Vs Laravel', 'David Naista', 0, NULL, 20753014, 0, 0, 2),
(42, NULL, 'Belajar PHP', 'Reza Oktario', 0, NULL, NULL, 4, 1, 0),
(44, 'Dzaky', 'Belajar Excel', 'Reza Oktario', 0, NULL, 20753022, 4, 1, 2),
(45, 'Dzaky', 'Laskar Pelangi', 'Andrea Hirata', 0, NULL, 20753022, 4, 1, 2),
(46, 'dzaky', 'Sang Pemimpi', 'Andrea Hirata', 0, NULL, 123, 4, 1, 2);

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
(14, 'Himbauan Direktur Polinela Terkait UAS dan Tahun Baru 2023', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/8n-_NXJrmG8\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 'tes', 1, 4, 1),
(15, 'Kisah Inspiratif Alumni Polinela Sukses Beternak Ayam Broiler', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/cdqftgzTujs\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 'tes', 1, 4, 1),
(16, 'BPP Kewirausahaan', '1674535062_27dfa299c60af8badbb3.pdf', 'tes', 2, 4, 1),
(17, 'Pemrogramman Mobile Minggu 7', '1674535175_3144224726c27444f6ae.pdf', 'tes', 2, 4, 1),
(18, 'Jalur Mandiri Politeknik Negeri Lampung 2022', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/vmyCUXGDCLU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 'tes', 1, 4, 1);

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
(973, 1, '2023-01-20 09:59:31', 1),
(974, 1, '2023-01-21 13:24:18', 1),
(975, 1, '2023-01-21 13:24:21', 1),
(976, 1, '2023-01-21 13:24:30', 1),
(977, 1, '2023-01-21 14:28:22', 1),
(978, 1, '2023-01-21 14:28:23', 1),
(979, 1, '2023-01-21 14:28:33', 1),
(980, 1, '2023-01-21 14:29:23', 1),
(981, 1, '2023-01-21 14:29:50', 1),
(982, 1, '2023-01-21 14:30:22', 1),
(983, 1, '2023-01-24 04:15:58', 1),
(984, 1, '2023-01-24 04:15:59', 1),
(985, 1, '2023-01-24 04:24:05', 1),
(986, 1, '2023-01-24 04:24:08', 1),
(987, 1, '2023-01-24 04:24:26', 1),
(988, 1, '2023-01-24 04:28:11', 1),
(989, 1, '2023-01-24 04:28:11', 1),
(990, 2, '2023-01-24 04:28:18', 6),
(991, 1, '2023-01-24 04:28:24', 1),
(992, 1, '2023-01-24 04:36:02', 1),
(993, 1, '2023-01-24 04:38:47', 1),
(994, 1, '2023-01-24 04:38:51', 1),
(995, 1, '2023-01-24 04:38:56', 1),
(996, 1, '2023-01-24 04:40:31', 1),
(997, 1, '2023-01-24 04:40:39', 1),
(998, 1, '2023-01-24 04:40:43', 1),
(999, 1, '2023-01-24 06:36:48', 1),
(1000, 1, '2023-01-24 06:37:17', 1),
(1001, 1, '2023-01-24 06:37:31', 1),
(1002, 1, '2023-01-24 07:31:37', 1),
(1003, 1, '2023-01-24 07:31:38', 1),
(1004, 1, '2023-01-24 07:31:40', 1),
(1005, 1, '2023-01-24 07:31:46', 1),
(1006, 1, '2023-01-24 08:07:16', 1),
(1007, 1, '2023-01-24 08:09:50', 1),
(1008, 1, '2023-01-24 08:09:57', 1),
(1009, 1, '2023-01-24 08:25:25', 1),
(1010, 1, '2023-01-24 08:25:30', 1),
(1011, 2, '2023-01-24 08:25:35', 12),
(1012, 1, '2023-01-24 08:25:42', 1),
(1013, 2, '2023-01-24 08:26:44', 12),
(1014, 2, '2023-01-24 08:26:56', 12),
(1015, 2, '2023-01-24 08:27:03', 12),
(1016, 2, '2023-01-24 08:28:08', 12),
(1017, 2, '2023-01-24 08:28:18', 12),
(1018, 2, '2023-01-24 08:28:24', 12),
(1019, 2, '2023-01-24 08:28:26', 12),
(1020, 2, '2023-01-24 08:28:39', 12),
(1021, 1, '2023-01-24 09:01:25', 1),
(1022, 1, '2023-01-24 09:01:58', 1),
(1023, 1, '2023-01-24 09:02:03', 1),
(1024, 1, '2023-01-24 09:02:27', 1);

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
  MODIFY `id_articles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categories` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `donate`
--
ALTER TABLE `donate`
  MODIFY `id_donate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `teaching_materials`
--
ALTER TABLE `teaching_materials`
  MODIFY `id_materials` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id_visitors` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1025;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

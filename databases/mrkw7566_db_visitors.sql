-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 18 Mar 2023 pada 10.59
-- Versi server: 10.0.38-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mrkw7566_db_visitors`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `token` varchar(10) NOT NULL,
  `user_nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0 is Non Active',
  `date_created` int(11) NOT NULL,
  `createdby` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `token`, `user_nama`, `email`, `password`, `role_id`, `is_active`, `date_created`, `createdby`) VALUES
(3, 'MYUewyww97', 'Daniel', 'ds.ultima@gmail.com', '$2y$10$H.eAQqeSTD.2vD0UetQHUOOlj5l5FA236LAvs.VuLXzNyURq/ANJ2', 1, '1', 1677642510, 'Paulus Christofel S'),
(4, 'fdMcrRyW4L', 'IT Team', 'it@mwk.com', '$2y$10$la9rQh/wE/2fCyuNf5XVyupV3NiRPWBSzo8MlAAH77t20369Cf7F.', 1, '1', 1677645810, 'Daniel'),
(5, 'TIyzH9UBd2', 'Paulus Christofel S', 'paulus.mwk@gmail.com', '$2y$10$9TLsM4mMei9aLBgNzwGXdeUAEw6QDNl7K3OUQOYHdkz.fABr3zxYi', 1, '1', 1677729116, 'Paulus Christofel S'),
(6, 'H5dyx1YMUA', 'Mela', 'mela@website.com', '$2y$10$V05TDQzHSq/aqGSaTwZE2uEbToMBWtCYDstvsTO9.W3sttdbzHox6', 1, '1', 1677812751, 'Paulus Christofel S'),
(7, 'KdKr0LQGxe', 'Antonius', 'anton.mrkitchen@gmail.com', '$2y$10$eUKK.lIs7QzII.s7iDwXVuUiBdWIH.FWVSk3yDvXuOGsSz8N4hQX6', 1, '1', 1677815073, 'Paulus Christofel S'),
(8, 'hQAwSaJC7B', 'Admin Toko Gudang', 'cek@tamu.com', '$2y$10$mMWOdkZhfyZCBVlYUvkEGOT5cAKaFqebDYR4COJifQXQiegv6OlQW', 1, '1', 1678069050, 'Paulus Christofel S');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_visitors`
--

CREATE TABLE `tb_visitors` (
  `id` int(11) NOT NULL,
  `token` varchar(10) NOT NULL,
  `visitor_name` varchar(250) NOT NULL,
  `visitor_hp` varchar(50) NOT NULL COMMENT '08xxx',
  `visitor_ig` varchar(128) NOT NULL COMMENT '@example',
  `visitor_email` varchar(128) DEFAULT NULL COMMENT 'example@domain',
  `visitor_alamat` varchar(250) DEFAULT NULL,
  `visitor_notes` text,
  `date_created` int(11) DEFAULT NULL COMMENT 'time()',
  `location` varchar(128) DEFAULT NULL COMMENT 'JL Riau / Jl Garuda',
  `koordinat` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `nourut` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `nourut`) VALUES
(1, 'Admin', 1),
(2, 'User', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Guest');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` varchar(128) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '0',
  `nourutan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`, `nourutan`) VALUES
(3, '1', 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', '1', 1),
(4, '1', 'Data Pengunjung', 'admin/pengunjung', 'fa fa-book', '1', 2),
(5, '2', 'User', 'user', 'fa fa-user', '1', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `visitor_logs`
--

CREATE TABLE `visitor_logs` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(128) NOT NULL,
  `page_visited` varchar(128) NOT NULL,
  `visit_time` datetime NOT NULL,
  `visitor_name` varchar(128) DEFAULT NULL,
  `country` varchar(128) DEFAULT NULL,
  `isp` varchar(128) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `tb_visitors`
--
ALTER TABLE `tb_visitors`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `visitor_logs`
--
ALTER TABLE `visitor_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_visitors`
--
ALTER TABLE `tb_visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `visitor_logs`
--
ALTER TABLE `visitor_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

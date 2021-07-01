-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jul 2021 pada 16.51
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jv_absensi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `control`
--

CREATE TABLE `control` (
  `id` int(11) NOT NULL,
  `kondisi` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `control`
--

INSERT INTO `control` (`id`, `kondisi`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `datas`
--

CREATE TABLE `datas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date_in` date DEFAULT NULL,
  `day_in` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_in` time DEFAULT NULL,
  `date_out` date DEFAULT NULL,
  `day_out` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_out` time DEFAULT NULL,
  `total_hours` time DEFAULT NULL,
  `activity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intensive` float DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `datas`
--

INSERT INTO `datas` (`id`, `date_in`, `day_in`, `time_in`, `date_out`, `day_out`, `time_out`, `total_hours`, `activity`, `site_name`, `remark`, `intensive`, `user_id`) VALUES
(30, '2021-06-25', 'Friday', '09:00:00', '2021-06-25', 'Friday', '17:54:00', '07:48:00', 'Clear site, captur EPNM, captur log', 'Wfh', 'none', 0, 14),
(31, '2021-06-25', 'Friday', '09:07:00', '2021-06-25', 'Friday', '15:00:00', '04:53:00', 'Clear site, capture Log, capture Epnm', 'wfh', 'none', 0, 13),
(32, '2021-06-25', 'Friday', '09:16:00', '2021-06-25', 'Friday', '18:00:00', '07:44:00', 'Clear site,Capture EPNM,Capture Log', 'Wfh', 'none', 0, 15),
(34, '2021-06-26', 'Saturday', '13:43:00', '2021-06-26', 'Saturday', '17:40:00', '03:57:00', 'Clear site, capture epnm, capture log', 'Wfh', 'none', 0, 14),
(35, '2021-06-26', 'Saturday', '13:46:00', '2021-06-26', 'Saturday', '17:52:00', '04:06:00', 'Clear site, capture Log, capture Epnm', 'wfh', 'weekend 1', 50000, 13),
(36, '2021-06-26', 'Saturday', '14:19:00', '2021-06-26', 'Saturday', '17:56:00', '03:37:00', 'clear-site, capture-log, capture-epnm', 'Wfh', 'none', 0, 15),
(37, '2021-06-28', 'Monday', '08:56:00', '2021-06-28', 'Monday', '18:27:00', '09:31:00', 'clear-site, capture-log, capture-epnm', 'wfh', 'none', 0, 13),
(38, '2021-06-28', 'Monday', '09:09:00', '2021-06-28', 'Monday', '17:59:00', '08:50:00', 'Clear site, Capture epnm, Capture log', 'Wfh', 'none', 0, 14),
(39, '2021-06-28', 'Monday', '09:00:00', '2021-06-28', 'Monday', '18:04:00', '08:04:00', 'Clear site, capture log', 'Wfh', 'none', 0, 15),
(40, '2021-06-29', 'Tuesday', '08:56:00', '2021-06-29', 'Tuesday', '17:55:00', '08:59:00', 'clear-site, capture-log, capture-epnm', 'wfh', 'none', 0, 13),
(41, '2021-06-29', 'Tuesday', '09:02:00', '2021-06-29', 'Tuesday', '18:00:00', '08:58:00', 'Clear site, Capture Log, Capture EPNM', 'Wfh', 'none', 0, 15),
(42, '2021-06-29', 'Tuesday', '09:00:00', '2021-06-29', 'Tuesday', '17:00:00', '08:00:00', 'Clear site, capture epnm, capture log', 'Wfh', 'none', 0, 14),
(43, '2021-06-30', 'Wednesday', '07:43:00', '2021-06-30', 'Wednesday', '18:34:00', '10:51:00', 'Clear site, capture Log, capture Epnm', 'wfh', 'none', 0, 13),
(44, '2021-06-30', 'Wednesday', '07:44:00', '2021-06-30', 'Wednesday', '18:10:00', '10:26:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 15),
(45, '2021-06-30', 'Wednesday', '07:57:00', '2021-06-30', 'Wednesday', '18:28:00', '10:31:00', 'Clear site, capture epnm, capture log', 'Wfh', 'none', 0, 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `holiday`
--

CREATE TABLE `holiday` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(15, '2014_10_12_000000_create_users_table', 1),
(16, '2014_10_12_100000_create_password_resets_table', 1),
(17, '2019_08_19_000000_create_failed_jobs_table', 1),
(18, '2021_06_05_035546_create_datas_table', 1),
(19, '2021_06_05_040053_create_remarks_table', 1),
(20, '2021_06_05_040112_create_projects_table', 1),
(21, '2021_06_05_040339_add_data_id_to_users_table', 1),
(22, '2021_06_05_040404_add_remark_id_to_datas_table', 1),
(23, '2021_06_06_133732_create_holiday_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('yusman@gmail.com', '$2y$10$QM/ksvCBJSMySr/yslCN9eJ.KrPigPLTkdhMr5iVzXIx5oHbgA9r.', '2021-06-06 06:20:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `projects`
--

INSERT INTO `projects` (`id`, `nama`) VALUES
(6, 'Indosat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `remarks`
--

CREATE TABLE `remarks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `remarks`
--

INSERT INTO `remarks` (`id`, `nama`, `deskripsi`) VALUES
(1, 'lembur 1', 'Kerja di hr kerja sampe jam 9 malem'),
(2, 'lembur 2', 'Kerja di hr kerja sampe jam 12 malem'),
(3, 'weekend 1', 'Kerja di hr libur minimal 4 jam'),
(4, 'weekend 2', 'Kerja di hr libur minimal 8 jam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `project_id`, `photo`) VALUES
(6, 'Portal Admin Jarvis', 'jarvis@gmail.com', NULL, '$2y$10$pMo.EUZ3HfiY4lHVqnPTUu5yW4giGidS0qA7Q0FYRGSnBG86m2blq', 'admin', 'FW4ZlrvZvnQAA7tlUusV4P73DSVXNLiADsFfgi23USUXZrhNqKbuSFadFCpE', '2021-06-05 19:34:51', '2021-06-26 11:00:29', 6, '1624705229.jpg'),
(12, 'Slamet Santoso', 'senyum.slamet@gmail.com', NULL, '$2y$10$c0fGX8TfC0Zh/V6V2ML4ie66wR6Cmr.qd3lxtUSfSdQO24NI/pzum', 'user', NULL, '2021-06-23 14:33:56', '2021-06-26 02:49:09', 6, '1624675749.jpg'),
(13, 'Adji Saka Ardhana', 'adjisakaardhana@gmail.com', NULL, '$2y$10$tIh73Fua8REmLN1yqX5MtOZlbB8peTBpJrZ/m6s4nsbbAxH1Fiw9W', 'user', NULL, '2021-06-24 13:02:59', '2021-06-24 13:02:59', 6, NULL),
(14, 'Muhammad Rifqi', 'mr.rifqi2000@gmail.com', NULL, '$2y$10$hXzzZ.LmfU9EvSU4/Vnnxequ.l.vqfyLqje9lRK/9TxFwZN9PCxjK', 'user', '1qa9kKpzIciVGrRogEDFkBOouq47cS026uIJs35g6o4nJbTQSWkOcbR8p3pX', '2021-06-24 13:03:36', '2021-06-24 13:03:36', 6, NULL),
(15, 'Muhammad Yusuf Salman', 'mys4lm4n@gmail.com', NULL, '$2y$10$Cwxx8cZMG6HQNu2BnQutNOBeah/fz/A1h9Q56/Uiz.3Vi8XSRcAUm', 'user', 'OVpiDtlQ5pbibuWrOv8XijvgoO5IhxVLfbaWRqth3wjSRf0mig2WIg9FGJcP', '2021-06-24 14:03:48', '2021-06-24 14:03:48', 6, NULL),
(16, 'Rafi Ramadhana', 'ramadhanarafi437@gmail.com', NULL, '$2y$10$UQoyrOqJMmc7Y.AEm4MZfeNV5CpXHFB3m8GDXVr9GiPN4MaeynaNa', 'user', NULL, '2021-06-26 02:40:34', '2021-06-26 02:49:22', 6, '1624675762.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `control`
--
ALTER TABLE `control`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `datas`
--
ALTER TABLE `datas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `datas_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `holiday`
--
ALTER TABLE `holiday`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `remarks`
--
ALTER TABLE `remarks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_project_id_foreign` (`project_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `control`
--
ALTER TABLE `control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `datas`
--
ALTER TABLE `datas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `holiday`
--
ALTER TABLE `holiday`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `remarks`
--
ALTER TABLE `remarks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `datas`
--
ALTER TABLE `datas`
  ADD CONSTRAINT `datas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

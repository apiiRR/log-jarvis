-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Agu 2021 pada 19.54
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
-- Database: `db_absensi_jarvis_new`
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
(1, 1);

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
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `datas`
--

INSERT INTO `datas` (`id`, `date_in`, `day_in`, `time_in`, `date_out`, `day_out`, `time_out`, `total_hours`, `activity`, `site_name`, `remark`, `intensive`, `project_id`, `user_id`) VALUES
(32, '2021-06-25', 'Friday', '09:16:00', '2021-06-25', 'Friday', '18:00:00', '07:44:00', 'Clear site,Capture EPNM,Capture Log', 'WFH', 'none', 0, 6, 15),
(36, '2021-06-26', 'Saturday', '13:50:00', '2021-06-26', 'Saturday', '17:56:00', '04:06:00', 'clear-site, capture-log, capture-epnm', 'WFH', 'weekend 1', 50000, 6, 15),
(37, '2021-06-28', 'Monday', '08:56:00', '2021-06-28', 'Monday', '18:27:00', '09:31:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 13),
(39, '2021-06-28', 'Monday', '09:00:00', '2021-06-28', 'Monday', '18:00:00', '09:00:00', 'Clear site, capture log', 'WFH', 'none', 0, 6, 15),
(40, '2021-06-29', 'Tuesday', '08:56:00', '2021-06-29', 'Tuesday', '17:55:00', '08:59:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 13),
(41, '2021-06-29', 'Tuesday', '09:02:00', '2021-06-29', 'Tuesday', '18:00:00', '08:58:00', 'Clear site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 15),
(43, '2021-06-30', 'Wednesday', '07:43:00', '2021-06-30', 'Wednesday', '18:34:00', '10:51:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 13),
(44, '2021-06-30', 'Wednesday', '07:44:00', '2021-06-30', 'Wednesday', '18:10:00', '10:26:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 15),
(54, '2021-07-02', 'Friday', '07:49:00', '2021-07-02', 'Friday', '17:23:00', '09:34:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', '', 0, 6, 13),
(55, '2021-07-01', 'Thursday', '07:30:00', '2021-07-01', 'Thursday', '19:00:00', '11:30:00', 'Clear site, capture log, capture EPNM,Rapat Koordinasi', 'WFH', 'none', 0, 6, 15),
(57, '2021-07-02', 'Friday', '08:30:00', '2021-07-02', 'Friday', '17:31:00', '09:01:00', 'Clear Site, Capture EPNM, capture log', 'wfh', 'none', 0, 6, 14),
(58, '2021-07-01', 'Thursday', '08:30:00', '2021-07-01', 'Thursday', '19:00:00', '10:30:00', 'Clear site, Capture epnm, Capture log, rapat koordinasi', 'Wfh', 'none', 0, 6, 14),
(59, '2021-07-01', 'Thursday', '09:52:00', '2021-07-01', 'Thursday', '19:50:00', '09:58:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 13),
(60, '2021-06-26', 'Saturday', '13:47:00', '2021-06-26', 'Saturday', '17:47:00', '04:00:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'weekend 1', 50000, 6, 13),
(61, '2021-06-25', 'Friday', '09:29:00', '2021-06-25', 'Friday', '18:50:00', '09:21:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 13),
(62, '2021-06-24', 'Thursday', '08:30:00', '2021-06-24', 'Thursday', '20:00:00', '11:30:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 13),
(63, '2021-06-23', 'Wednesday', '10:00:00', '2021-06-23', 'Wednesday', '15:15:00', '05:15:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 13),
(64, '2021-06-22', 'Tuesday', '10:00:00', '2021-06-22', 'Tuesday', '17:35:00', '07:35:00', 'Clear Site, Capture Log, Capture EPNM', 'ASTEL', 'none', 0, 6, 13),
(65, '2021-06-03', 'Thursday', '10:00:00', '2021-06-03', 'Thursday', '19:00:00', '09:00:00', 'Clear Site, Captur LOG, EPNM', 'wfh', 'none', 0, 6, 14),
(66, '2021-06-21', 'Monday', '10:28:00', '2021-06-21', 'Monday', '16:50:00', '06:22:00', 'Clear Site, Capture Log, Capture EPNM', 'ASTEL', 'none', 0, 6, 13),
(67, '2021-06-04', 'Friday', '09:30:00', '2021-06-04', 'Friday', '18:30:00', '09:00:00', 'Clear Site, Captur LOG, EPNM', 'sisindokom', 'none', 0, 6, 14),
(68, '2021-06-19', 'Saturday', '11:30:00', '2021-06-19', 'Saturday', '18:00:00', '06:30:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'weekend 1', 50000, 6, 13),
(69, '2021-06-05', 'Saturday', '13:00:00', '2021-06-05', 'Saturday', '17:00:00', '04:00:00', 'Clear Site, Captur LOG, EPNM', 'wfh', 'weekend 1', 50000, 6, 14),
(70, '2021-06-18', 'Friday', '10:40:00', '2021-06-18', 'Friday', '17:00:00', '06:20:00', 'Clear Site, Capture Log, Capture EPNM', 'ASTEL', 'none', 0, 6, 13),
(71, '2021-06-17', 'Thursday', '10:30:00', '2021-06-17', 'Thursday', '18:00:00', '07:30:00', 'Clear Site, Capture Log, Capture EPNM', 'ASTEL', 'none', 0, 6, 13),
(72, '2021-06-07', 'Monday', '09:00:00', '2021-06-07', 'Monday', '18:00:00', '09:00:00', 'Clear Site, Captur LOG, EPNM', 'kppti', 'none', 0, 6, 14),
(73, '2021-06-16', 'Wednesday', '10:00:00', '2021-06-16', 'Wednesday', '16:37:00', '06:37:00', 'Clear Site, Capture Log, Capture EPNM', 'ASTEL', 'none', 0, 6, 13),
(74, '2021-06-08', 'Tuesday', '09:15:00', '2021-06-08', 'Tuesday', '18:00:00', '08:45:00', 'Clear Site, Captur LOG, EPNM', 'sisindokom', 'none', 0, 6, 14),
(75, '2021-06-15', 'Tuesday', '10:30:00', '2021-06-15', 'Tuesday', '17:53:00', '07:23:00', 'Clear Site, Capture Log, Capture EPNM', 'ASTEL', 'none', 0, 6, 13),
(76, '2021-06-14', 'Monday', '14:30:00', '2021-06-14', 'Monday', '16:52:00', '02:22:00', 'Clear Site, Capture Log, Capture EPNM', 'ASTEL', 'none', 0, 6, 13),
(77, '2021-06-09', 'Wednesday', '09:30:00', '2021-06-09', 'Wednesday', '18:00:00', '08:30:00', 'Clear Site, Captur LOG, EPNM', 'wfh', 'none', 0, 6, 14),
(78, '2021-06-10', 'Thursday', '09:30:00', '2021-06-10', 'Thursday', '18:00:00', '08:30:00', 'Clear Site, Captur LOG, EPNM', 'kppti', 'none', 0, 6, 14),
(79, '2021-06-11', 'Friday', '09:30:00', '2021-06-11', 'Friday', '18:00:00', '08:30:00', 'Clear Site, Captur LOG, EPNM', 'sisindokom', 'none', 0, 6, 14),
(80, '2021-06-12', 'Saturday', '10:50:00', '2021-06-12', 'Saturday', '18:30:00', '07:40:00', 'Clear Site, Captur LOG, EPNM', 'wfh', 'weekend 1', 50000, 6, 14),
(81, '2021-06-14', 'Monday', '09:47:00', '2021-06-14', 'Monday', '18:00:00', '08:13:00', 'Clear Site, Captur LOG, EPNM', 'sisindokom', 'none', 0, 6, 14),
(82, '2021-06-12', 'Saturday', '12:00:00', '2021-06-12', 'Saturday', '16:15:00', '04:15:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'weekend 1', 50000, 6, 13),
(83, '2021-06-11', 'Friday', '10:30:00', '2021-06-11', 'Friday', '17:12:00', '06:42:00', 'Clear Site, Capture Log, Capture EPNM', 'ASTEL', 'none', 0, 6, 13),
(84, '2021-06-15', 'Tuesday', '10:00:00', '2021-06-15', 'Tuesday', '18:30:00', '08:30:00', 'Clear Site, Captur LOG, EPNM', 'sisindokom', 'none', 0, 6, 14),
(85, '2021-06-10', 'Thursday', '10:30:00', '2021-06-10', 'Thursday', '18:50:00', '08:20:00', 'Clear Site, Capture Log, Capture EPNM', 'KPPTI', 'none', 0, 6, 13),
(86, '2021-06-16', 'Wednesday', '10:00:00', '2021-06-16', 'Wednesday', '18:30:00', '08:30:00', 'Clear Site, Captur LOG, EPNM', 'sisindokom', 'none', 0, 6, 14),
(87, '2021-06-09', 'Wednesday', '11:00:00', '2021-06-09', 'Wednesday', '16:50:00', '05:50:00', 'Clear Site, Capture Log, Capture EPNM', 'ASTEL', 'none', 0, 6, 13),
(88, '2021-06-17', 'Thursday', '09:50:00', '2021-06-17', 'Thursday', '18:00:00', '08:10:00', 'Clear Site, Captur LOG, EPNM', 'sisindokom', 'none', 0, 6, 14),
(89, '2021-06-08', 'Tuesday', '12:30:00', '2021-06-08', 'Tuesday', '19:35:00', '07:05:00', 'Clear Site, Capture Log, Capture EPNM', 'ASTEL', 'none', 0, 6, 13),
(90, '2021-06-07', 'Monday', '09:30:00', '2021-06-07', 'Monday', '19:16:00', '09:46:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 13),
(91, '2021-06-18', 'Friday', '10:00:00', '2021-06-18', 'Friday', '17:45:00', '07:45:00', 'Clear Site, Captur LOG, EPNM', 'sisindokom', 'none', 0, 6, 14),
(92, '2021-06-05', 'Saturday', '09:00:00', '2021-06-05', 'Saturday', '20:50:00', '11:50:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'weekend 2', 150000, 6, 13),
(93, '2021-06-19', 'Saturday', '09:50:00', '2021-06-19', 'Saturday', '18:00:00', '08:10:00', 'Clear Site, Captur LOG, EPNM', 'wfh', 'weekend 2', 150000, 6, 14),
(94, '2021-06-04', 'Friday', '10:00:00', '2021-06-04', 'Friday', '18:30:00', '08:30:00', 'Clear Site, Capture Log, Capture EPNM, Remark HN', 'ASTEL', 'none', 0, 6, 13),
(95, '2021-06-03', 'Thursday', '07:00:00', '2021-06-03', 'Thursday', '16:20:00', '09:20:00', 'Clear Site, Capture Log, Capture EPNM, Remark HN', 'ASTEL', 'none', 0, 6, 13),
(96, '2021-06-21', 'Monday', '09:30:00', '2021-06-21', 'Monday', '18:00:00', '08:30:00', 'Clear Site, Captur LOG, EPNM', 'wfh', 'none', 0, 6, 14),
(97, '2021-06-22', 'Tuesday', '10:00:00', '2021-06-22', 'Tuesday', '18:00:00', '08:00:00', 'Clear Site, Captur LOG, EPNM', 'sisindokom', 'none', 0, 6, 14),
(98, '2021-06-23', 'Wednesday', '09:20:00', '2021-06-23', 'Wednesday', '17:30:00', '08:10:00', 'Clear Site, Captur LOG, EPNM', 'wfh', 'none', 0, 6, 14),
(99, '2021-06-24', 'Thursday', '09:00:00', '2021-06-24', 'Thursday', '18:00:00', '09:00:00', 'Clear Site, Captur LOG, EPNM', 'wfh', 'none', 0, 6, 14),
(100, '2021-06-25', 'Friday', '09:00:00', '2021-06-25', 'Friday', '17:54:00', '08:54:00', 'Clear Site, Captur LOG, EPNM', 'wfh', 'none', 0, 6, 14),
(101, '2021-06-26', 'Saturday', '13:40:00', '2021-06-26', 'Saturday', '17:40:00', '04:00:00', 'Clear Site, Captur LOG, EPNM', 'wfh', 'weekend 1', 50000, 6, 14),
(102, '2021-06-28', 'Monday', '09:00:00', '2021-06-28', 'Monday', '18:00:00', '09:00:00', 'Clear Site, Captur LOG, EPNM', 'wfh', 'none', 0, 6, 14),
(103, '2021-06-29', 'Tuesday', '09:00:00', '2021-06-29', 'Tuesday', '17:00:00', '08:00:00', 'Clear Site, Captur LOG, EPNM', 'wfh', 'none', 0, 6, 14),
(104, '2021-06-30', 'Wednesday', '08:00:00', '2021-06-30', 'Wednesday', '18:00:00', '10:00:00', 'Clear Site, Captur LOG, EPNM', 'wfh', 'none', 0, 6, 14),
(105, '2021-07-02', 'Friday', '09:00:00', '2021-07-02', 'Friday', '18:00:00', '09:00:00', 'Clear site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 15),
(107, '2021-06-03', 'Thursday', '09:00:00', '2021-06-03', 'Thursday', '20:30:00', '11:30:00', 'clear site,capture EPNM,capture log, Create HN', 'WFH', 'none', 0, 6, 15),
(108, '2021-06-04', 'Friday', '10:00:00', '2021-06-04', 'Friday', '17:00:00', '07:00:00', 'clear site,capture EPNM,capture log, Create HN', 'KPPTI', 'none', 0, 6, 15),
(109, '2021-06-05', 'Saturday', '13:00:00', '2021-06-05', 'Saturday', '21:30:00', '08:30:00', 'clear site,capture EPNM,capture log, Create HN', 'WFH', 'weekend 2', 150000, 6, 15),
(110, '2021-06-07', 'Monday', '09:00:00', '2021-06-07', 'Monday', '18:00:00', '09:00:00', 'clear site,capture EPNM,capture log', 'WFH', 'none', 0, 6, 15),
(111, '2021-06-08', 'Tuesday', '09:00:00', '2021-06-08', 'Tuesday', '18:00:00', '09:00:00', 'clear site,capture EPNM,capture log', 'Astel', 'none', 0, 6, 15),
(112, '2021-06-09', 'Wednesday', '09:00:00', '2021-06-09', 'Wednesday', '18:00:00', '09:00:00', 'clear site,capture EPNM,capture log', 'Astel', 'none', 0, 6, 15),
(113, '2021-06-10', 'Thursday', '09:00:00', '2021-06-10', 'Thursday', '18:00:00', '09:00:00', 'clear site,capture EPNM,capture log', 'WFH', 'none', 0, 6, 15),
(115, '2021-06-11', 'Friday', '09:00:00', '2021-06-11', 'Friday', '18:00:00', '09:00:00', 'clear site,capture EPNM,capture log', 'Astel', 'none', 0, 6, 15),
(116, '2021-06-12', 'Saturday', '09:30:00', '2021-06-12', 'Saturday', '18:00:00', '08:30:00', 'clear site,capture EPNM,capture log, Create HN', 'WFH', 'weekend 2', 150000, 6, 15),
(117, '2021-06-14', 'Monday', '09:00:00', '2021-06-14', 'Monday', '20:00:00', '11:00:00', 'clear site,capture EPNM,capture log, clear BOQ', 'WFH', 'none', 0, 6, 15),
(118, '2021-06-15', 'Tuesday', '10:00:00', '2021-06-15', 'Tuesday', '18:00:00', '08:00:00', 'clear site,capture EPNM,capture log', 'Astel', 'none', 0, 6, 15),
(119, '2021-06-16', 'Wednesday', '09:30:00', '2021-06-16', 'Wednesday', '18:00:00', '08:30:00', 'clear site,capture EPNM,capture log', 'Astel', 'none', 0, 6, 15),
(120, '2021-06-17', 'Thursday', '09:54:00', '2021-06-17', 'Thursday', '18:00:00', '08:06:00', 'clear site,capture EPNM,capture log', 'WFH', 'none', 0, 6, 15),
(121, '2021-06-18', 'Friday', '10:10:00', '2021-06-18', 'Friday', '18:00:00', '07:50:00', 'clear site,capture EPNM,capture log', 'Astel', 'none', 0, 6, 15),
(122, '2021-06-19', 'Saturday', '10:10:00', '2021-06-19', 'Saturday', '18:00:00', '07:50:00', 'clear site,capture EPNM,capture log', 'WFH', 'weekend 1', 50000, 6, 15),
(123, '2021-06-21', 'Monday', '09:45:00', '2021-06-21', 'Monday', '18:00:00', '08:15:00', 'clear site,capture EPNM,capture log', 'Astel', 'none', 0, 6, 15),
(124, '2021-06-22', 'Tuesday', '09:40:00', '2021-06-22', 'Tuesday', '18:00:00', '08:20:00', 'clear site,capture EPNM,capture log', 'WFH', 'none', 0, 6, 15),
(125, '2021-06-23', 'Wednesday', '10:00:00', '2021-06-23', 'Wednesday', '18:00:00', '08:00:00', 'clear site,capture EPNM,capture log', 'WFH', 'none', 0, 6, 15),
(126, '2021-06-24', 'Thursday', '09:05:00', '2021-06-24', 'Thursday', '18:00:00', '08:55:00', 'clear site,capture EPNM,capture log', 'WFH', 'none', 0, 6, 15),
(130, '2021-07-03', 'Saturday', '08:23:00', '2021-07-03', 'Saturday', '18:02:00', '09:39:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'weekend 2', 150000, 6, 13),
(132, '2021-07-03', 'Saturday', '11:01:00', '2021-07-03', 'Saturday', '18:00:00', '06:59:00', 'Clear site, capture epnm, capture log', 'Wfh', 'weekend 1', 50000, 6, 14),
(133, '2021-07-03', 'Saturday', '09:02:00', '2021-07-03', 'Saturday', '17:00:00', '07:58:00', 'Clear site, capture Log, Capture EPNM', 'WFH', 'weekend 1', 50000, 6, 15),
(135, '2021-07-05', 'Monday', '09:00:00', '2021-07-05', 'Monday', '18:00:00', '09:00:00', 'Clear Site, Capture Epnm, Capture Log', 'Wfh', 'none', 0, 6, 14),
(136, '2021-07-05', 'Monday', '09:09:00', '2021-07-05', 'Monday', '18:15:00', '09:06:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 13),
(137, '2021-07-05', 'Monday', '09:30:00', '2021-07-05', 'Monday', '18:00:00', '08:30:00', 'Clear site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 15),
(138, '2021-07-06', 'Tuesday', '08:42:00', '2021-07-06', 'Tuesday', '18:00:00', '09:18:00', 'Clear site, Capture EPNM, Capture Log', 'WFH', 'none', 0, 6, 15),
(139, '2021-07-06', 'Tuesday', '08:45:00', '2021-07-06', 'Tuesday', '17:41:00', '08:56:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 13),
(140, '2021-07-06', 'Tuesday', '08:52:00', '2021-07-06', 'Tuesday', '18:32:00', '09:40:00', 'Clear site, capture epnm, capture log', 'Wfh', 'none', 0, 6, 14),
(141, '2021-07-07', 'Wednesday', '07:36:00', '2021-07-07', 'Wednesday', '17:00:00', '09:24:00', 'Clear site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 15),
(142, '2021-07-07', 'Wednesday', '07:40:00', '2021-07-07', 'Wednesday', '17:28:00', '09:48:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 13),
(143, '2021-07-07', 'Wednesday', '08:40:00', '2021-07-07', 'Wednesday', '18:02:00', '09:22:00', 'Clear site, capture epnm, capture log', 'Wfh', 'none', 0, 6, 14),
(144, '2021-07-08', 'Thursday', '07:55:00', '2021-07-08', 'Thursday', '18:09:00', '10:14:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 13),
(145, '2021-07-08', 'Thursday', '08:39:00', '2021-07-08', 'Thursday', '18:30:00', '09:51:00', 'Clear Site, Capture EPNM, Capture Log', 'Wfh', 'none', 0, 6, 14),
(146, '2021-07-08', 'Thursday', '08:42:00', '2021-07-08', 'Thursday', '18:00:00', '09:18:00', 'Clear site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 15),
(147, '2021-07-09', 'Friday', '08:14:00', '2021-07-09', 'Friday', '18:04:00', '09:50:00', 'Clear Site, Capture LOG, Capture EPNM', 'WFH', 'none', 0, 6, 13),
(148, '2021-07-09', 'Friday', '08:15:00', '2021-07-09', 'Friday', '18:00:00', '09:45:00', 'Clear site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 15),
(149, '2021-07-09', 'Friday', '09:27:00', '2021-07-09', 'Friday', '18:00:00', '08:33:00', 'Clear site, captur epnm, capture log', 'Wfh', 'none', 0, 6, 14),
(150, '2021-07-10', 'Saturday', '08:06:00', '2021-07-10', 'Saturday', '18:02:00', '09:56:00', 'Clear site, capture log, capture EPNM', 'WFH', 'weekend 2', 150000, 6, 15),
(151, '2021-07-10', 'Saturday', '08:07:00', '2021-07-10', 'Saturday', '18:00:00', '09:53:00', 'Clear Site, Capture LOG, Capture EPNM', 'WFH', 'weekend 2', 150000, 6, 13),
(152, '2021-07-12', 'Monday', '08:18:00', '2021-07-12', 'Monday', '21:09:00', '12:51:00', 'Clear Site, Capture LOG, Capture EPNM', 'WFH', 'lembur 1', 25000, 6, 13),
(153, '2021-07-12', 'Monday', '08:52:00', '2021-07-12', 'Monday', '21:50:00', '12:58:00', 'Clear site, captur epnm, capture log, meeting with taskforce team', 'Wfh', 'lembur 1', 25000, 6, 14),
(154, '2021-07-12', 'Monday', '09:00:00', '2021-07-12', 'Monday', '21:19:00', '12:19:00', 'Clear Site, Capture Log, Clear Single Leg', 'WFH', 'lembur 1', 25000, 6, 15),
(155, '2021-07-13', 'Tuesday', '08:40:00', '2021-07-13', 'Tuesday', '20:57:00', '12:17:00', 'Clear site, capture epnm, capture log, validasi ring integrasi', 'Wdh', 'none', 0, 6, 14),
(156, '2021-07-13', 'Tuesday', '08:53:00', '2021-07-13', 'Tuesday', '20:59:00', '12:06:00', 'Clear Site, Capture LOG, Capture EPNM', 'WFH', 'none', 0, 6, 13),
(157, '2021-07-13', 'Tuesday', '08:40:00', '2021-07-13', 'Tuesday', '20:30:00', '11:50:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 15),
(159, '2021-07-14', 'Wednesday', '09:13:00', '2021-07-14', 'Wednesday', '18:20:00', '09:07:00', 'Clear Site, Capture LOG, Capture EPNM', 'WFH', 'none', 0, 6, 13),
(160, '2021-07-14', 'Wednesday', '09:17:00', '2021-07-14', 'Wednesday', '21:35:00', '12:18:00', 'Clear site, capture epnm, capture log, kordinasi dengan team taskforce', 'Wfh', 'lembur 1', 25000, 6, 14),
(161, '2021-07-14', 'Wednesday', '10:28:00', '2021-07-14', 'Wednesday', '18:02:00', '07:34:00', 'Clear site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 15),
(162, '2021-07-15', 'Thursday', '08:22:00', '2021-07-15', 'Thursday', '18:45:00', '10:23:00', 'Clear Site, Capture LOG, Capture EPNM', 'WFH', 'none', 0, 6, 13),
(163, '2021-07-15', 'Thursday', '09:00:00', '2021-07-15', 'Thursday', '17:30:00', '08:30:00', 'Capture EPNM, Capture Log, Clear Site, Validasi Ring Ultimate', 'Wfh', 'none', 0, 6, 14),
(164, '2021-07-15', 'Thursday', '08:25:00', '2021-07-15', 'Thursday', '18:01:00', '09:36:00', 'Clear Site, Capture Log, Validasi Ring Ultimate', 'WFH', 'none', 0, 6, 15),
(165, '2021-07-16', 'Friday', '08:31:00', '2021-07-16', 'Friday', '18:10:00', '09:39:00', 'Clear Site, Capture LOG, Capture EPNM', 'WFH', 'none', 0, 6, 13),
(166, '2021-07-16', 'Friday', '08:31:00', '2021-07-16', 'Friday', '19:20:00', '10:49:00', 'Clear SIte, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 15),
(167, '2021-07-16', 'Friday', '09:14:00', '2021-07-16', 'Friday', '20:07:00', '10:53:00', 'Clear site, capture EPNM, capture log, Validasi alarm before after swap', 'Wfh', 'none', 0, 6, 14),
(169, '2021-07-17', 'Saturday', '09:13:00', '2021-07-17', 'Saturday', '15:00:00', '05:47:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'weekend 1', 50000, 6, 15),
(170, '2021-07-17', 'Saturday', '09:18:00', '2021-07-17', 'Saturday', '18:35:00', '09:17:00', 'Clear Site, Capture LOG, Capture EPNM', 'WFH', 'weekend 2', 150000, 6, 13),
(171, '2021-07-17', 'Saturday', '09:45:00', '2021-07-17', 'Saturday', '16:00:00', '06:15:00', 'Clear Site, Capture EPNM, Capture LOG', 'wfh', 'weekend 1', 50000, 6, 14),
(172, '2021-07-18', 'Sunday', '07:46:00', '2021-08-03', 'Tuesday', '05:53:00', '22:06:00', 'Mantengin Monitor.', 'Dari Rumah', 'weekend 2', 150000, 6, 12),
(173, '2021-07-18', 'Sunday', '08:23:00', '2021-07-18', 'Sunday', '15:58:00', '07:35:00', 'validasi single leg befor after swap', 'wfh', 'weekend 1', 50000, 6, 14),
(175, '2021-07-19', 'Monday', '09:07:00', '2021-07-19', 'Monday', '20:11:00', '11:04:00', 'Clear Validasi Alarms, Clear Site, Capture Log', 'WFH', 'none', 0, 6, 15),
(176, '2021-07-19', 'Monday', '09:09:00', '2021-07-19', 'Monday', '18:20:00', '09:11:00', 'Clear Site, Capture LOG, Capture EPNM', 'WFH', 'none', 0, 6, 13),
(177, '2021-07-19', 'Monday', '09:49:00', '2021-07-19', 'Monday', '21:18:00', '11:29:00', 'Capture Epnm, Capture Log, Clear Site, validasi alarm before after', 'Wfh', 'lembur 1', 25000, 6, 14),
(178, '2021-07-20', NULL, '21:39:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 17),
(179, '2021-07-21', 'Wednesday', '07:01:00', '2021-07-21', 'Wednesday', '18:13:00', '11:12:00', 'Clear Site, Capture LOG, Capture EPNM', 'WFH', 'none', 0, 6, 13),
(180, '2021-07-21', 'Wednesday', '07:31:00', '2021-07-21', 'Wednesday', '18:01:00', '10:30:00', 'Clear site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 15),
(181, '2021-07-21', 'Wednesday', '07:31:00', '2021-07-21', 'Wednesday', '18:21:00', '10:50:00', 'Clear Site, Capture EPNM, Capture Log', 'wfh', 'none', 0, 6, 14),
(182, '2021-07-22', 'Thursday', '07:32:00', '2021-07-22', 'Thursday', '17:51:00', '10:19:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 15),
(183, '2021-07-22', 'Thursday', '07:35:00', '2021-07-22', 'Thursday', '18:11:00', '10:36:00', 'Clear Site, Capture LOG, Capture EPNM', 'WFH', 'none', 0, 6, 13),
(184, '2021-07-22', 'Thursday', '09:01:00', '2021-07-22', 'Thursday', '18:32:00', '09:31:00', 'clear site, capture epnm, capture log', 'wfh', 'none', 0, 6, 14),
(185, '2021-07-23', 'Friday', '08:23:00', '2021-07-23', 'Friday', '18:15:00', '09:52:00', 'Clear Site, Capture LOG, Capture EPNM', 'WFH', 'none', 0, 6, 13),
(186, '2021-07-23', 'Friday', '08:30:00', '2021-07-23', 'Friday', '18:26:00', '09:56:00', 'Clear Site, Capture EPNM, Capture Log, Check Alarm', 'wfh', 'none', 0, 6, 14),
(187, '2021-07-23', 'Friday', '08:35:00', '2021-07-23', 'Friday', '18:35:00', '10:00:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 15),
(188, '2021-07-24', 'Saturday', '07:57:00', '2021-07-24', 'Saturday', '18:32:00', '10:35:00', 'Clear Site, Capture LOG, Capture EPNM', 'WFH', 'weekend 2', 150000, 6, 13),
(189, '2021-07-24', 'Saturday', '08:00:00', '2021-07-24', 'Saturday', '18:00:00', '10:00:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'weekend 2', 150000, 6, 15),
(190, '2021-07-24', 'Saturday', '09:00:00', '2021-07-24', 'Saturday', '15:00:00', '06:00:00', 'Clear Site, Capture EPNM, Capture Log', 'wfh', 'weekend 1', 50000, 6, 14),
(191, '2021-07-26', 'Monday', '07:29:00', '2021-07-26', 'Monday', '18:15:00', '10:46:00', 'Clear Site, Capture LOG, Capture EPNM', 'WFH', 'none', 0, 6, 13),
(192, '2021-07-26', 'Monday', '07:48:00', '2021-07-26', 'Monday', '17:59:00', '10:11:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 15),
(193, '2021-07-26', 'Monday', '08:33:00', '2021-07-26', 'Monday', '18:00:00', '09:27:00', 'clear site, capture epnm, capture log', 'wfh', 'none', 0, 6, 14),
(194, '2021-07-27', 'Tuesday', '09:02:00', '2021-07-27', 'Tuesday', '18:21:00', '09:19:00', 'Clear Site, Capture LOG, Capture EPNM', 'WFH', 'none', 0, 6, 13),
(195, '2021-07-27', 'Tuesday', '09:06:00', '2021-07-27', 'Tuesday', '18:20:00', '09:14:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 15),
(196, '2021-07-27', 'Tuesday', '09:00:00', '2021-07-27', 'Tuesday', '18:00:00', '09:00:00', 'Clear Site, Capture EPNM, Capture Log, Validasi Ring Ultimate', 'wfh', 'none', 0, 6, 14),
(197, '2021-07-28', 'Wednesday', '08:58:00', '2021-07-28', 'Wednesday', '17:26:00', '08:28:00', 'Clear site, capture epnm, capture log', 'Wfh', 'none', 0, 6, 14),
(198, '2021-07-28', 'Wednesday', '09:21:00', '2021-07-28', 'Wednesday', '18:17:00', '08:56:00', 'Clear Site, Capture Log, Capture Epnm', 'WFH', 'none', 0, 6, 13),
(199, '2021-07-28', 'Wednesday', '09:26:00', '2021-07-28', 'Wednesday', '18:00:00', '08:34:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 15),
(200, '2021-07-29', 'Thursday', '09:00:00', '2021-07-29', 'Thursday', '17:34:00', '08:34:00', 'Clear Site, Capture EPNM, Capture Log, Cek Ultimate RIng', 'wfh', 'none', 0, 6, 14),
(201, '2021-07-29', 'Thursday', '09:30:00', '2021-07-29', 'Thursday', '18:00:00', '08:30:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 15),
(203, '2021-07-29', 'Thursday', '09:31:00', '2021-07-29', 'Thursday', '18:04:00', '08:33:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 13),
(204, '2021-07-30', 'Friday', '09:01:00', '2021-07-30', 'Friday', '17:58:00', '08:57:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 15),
(205, '2021-07-30', 'Friday', '09:02:00', '2021-07-30', 'Friday', '18:36:00', '09:34:00', 'Clear Site, Capture LOG, Capture EPNM', 'WFH', 'none', 0, 6, 13),
(206, '2021-07-30', 'Friday', '09:16:00', '2021-07-30', 'Friday', '18:31:00', '09:15:00', 'Clear site, Capture EPNM, Capture Log, Validasi Ring Ultimate', 'wfh', 'none', 0, 6, 14),
(209, '2021-07-31', 'Saturday', '11:08:00', '2021-07-31', 'Saturday', '18:00:00', '06:52:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'weekend 1', 50000, 6, 15),
(210, '2021-07-31', 'Saturday', '11:16:00', '2021-07-31', 'Saturday', '18:14:00', '06:58:00', 'Clear Site, Capture Log, Capture Epnm', 'WFH', 'weekend 1', 50000, 6, 13),
(211, '2021-07-31', 'Saturday', '11:20:00', '2021-07-31', 'Saturday', '18:00:00', '06:40:00', 'Clear site, capture EPNM, Capture log', 'Wfh', 'weekend 1', 50000, 6, 14),
(212, '2021-08-02', 'Monday', '07:41:00', '2021-08-02', 'Monday', '18:29:00', '10:48:00', 'Clear Site, Capture LOG, Capture EPNM', 'WFH', 'none', 0, 6, 13),
(213, '2021-08-02', 'Monday', '08:21:00', '2021-08-02', 'Monday', '18:00:00', '09:39:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 15),
(214, '2021-08-02', 'Monday', '09:29:00', '2021-08-02', 'Monday', '20:15:00', '10:46:00', 'Clear Site, Capture EPNM, Capture Log, Meet with taskforce, validasi alarm before after', 'wfh', 'none', 0, 6, 14),
(216, '2021-08-03', 'Tuesday', '09:54:00', '2021-08-03', 'Tuesday', '18:00:00', '08:06:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 15),
(217, '2021-08-03', 'Tuesday', '09:55:00', '2021-08-03', 'Tuesday', '17:56:00', '08:01:00', 'Clear Site, Capture LOG, Capture EPNM', 'WFH', 'none', 0, 6, 13),
(218, '2021-08-03', 'Tuesday', '09:58:00', '2021-08-03', 'Tuesday', '18:00:00', '08:02:00', 'Clear Site, Capture EPNM, Capture Log', 'wfh', 'none', 0, 6, 14),
(219, '2021-08-04', 'Wednesday', '08:11:00', '2021-08-04', 'Wednesday', '17:09:00', '08:58:00', 'Clear Site, Capture EPNM, Capture Log', 'wfh', 'none', 0, 6, 14),
(220, '2021-08-04', 'Wednesday', '08:25:00', '2021-08-04', 'Wednesday', '18:00:00', '09:35:00', 'Clear site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 15),
(221, '2021-08-04', 'Wednesday', '08:42:00', '2021-08-04', 'Wednesday', '16:58:00', '08:16:00', 'Clear Site, Capture LOG, Capture EPNM', 'WFH', 'none', 0, 6, 13),
(222, '2021-08-05', 'Thursday', '10:03:00', '2021-08-05', 'Thursday', '17:55:00', '07:52:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 15),
(223, '2021-08-05', 'Thursday', '10:03:00', '2021-08-05', 'Thursday', '18:03:00', '08:00:00', 'clear site, captur epnm, capture log', 'wfh', 'none', 0, 6, 14),
(224, '2021-08-05', 'Thursday', '10:09:00', '2021-08-05', 'Thursday', '18:04:00', '07:55:00', 'Clear Site, Capture LOG, Capture EPNM', 'WFH', 'none', 0, 6, 13),
(225, '2021-08-06', 'Friday', '08:31:00', '2021-08-06', 'Friday', '17:50:00', '09:19:00', 'Clear Site, Capture Log, Capture Epnm', 'WFH', 'none', 0, 6, 13),
(226, '2021-08-06', 'Friday', '08:32:00', '2021-08-06', 'Friday', '17:55:00', '09:23:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 15),
(227, '2021-08-06', 'Friday', '08:33:00', '2021-08-06', 'Friday', '17:56:00', '09:23:00', 'Clear site, capture epnm, capture log', 'Wfh', 'none', 0, 6, 14),
(228, '2021-08-07', 'Saturday', '08:25:00', '2021-08-07', 'Saturday', '16:55:00', '08:30:00', 'Clear Site, Capture Log, Capture Epnm', 'WFH', 'weekend 2', 150000, 6, 13),
(229, '2021-08-07', 'Saturday', '08:25:00', '2021-08-07', 'Saturday', '16:49:00', '08:24:00', 'Clear site, Capture Log, Capture EPNM', 'WFH', 'weekend 2', 150000, 6, 15),
(230, '2021-08-07', 'Saturday', '10:49:00', '2021-08-07', 'Saturday', '15:39:00', '04:50:00', 'Clear site, capture epnm, capture log', 'Wfh', 'weekend 1', 50000, 6, 14),
(231, '2021-08-09', 'Monday', '08:22:00', '2021-08-09', 'Monday', '18:06:00', '09:44:00', 'Clear Site, Capture Log, Capture Epnm', 'WFH', 'none', 0, 6, 13),
(232, '2021-08-09', 'Monday', '08:46:00', '2021-08-09', 'Monday', '18:00:00', '09:14:00', 'Clear site, Caputre Log, Capture EPNM', 'WFH', 'none', 0, 6, 15),
(233, '2021-08-09', 'Monday', '08:51:00', '2021-08-09', 'Monday', '18:05:00', '09:14:00', 'Clear site, capture epnm, capture log', 'Wfh', 'none', 0, 6, 14),
(234, '2021-08-10', 'Tuesday', '08:39:00', '2021-08-10', 'Tuesday', '18:01:00', '09:22:00', 'Clear Site, Capture LOG, Capture EPNM', 'WFH', 'none', 0, 6, 13),
(235, '2021-08-10', 'Tuesday', '08:41:00', '2021-08-10', 'Tuesday', '18:01:00', '09:20:00', 'Clear site, Capture epnm, Capture Log', 'Wfh', 'none', 0, 6, 14),
(236, '2021-08-10', 'Tuesday', '09:46:00', '2021-08-10', 'Tuesday', '18:00:00', '08:14:00', 'Clear site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 15),
(237, '2021-08-11', 'Wednesday', '09:03:00', '2021-08-11', 'Wednesday', '17:47:00', '08:44:00', 'Clear site, Capture EPNM, Capture Log', 'Wfh', 'none', 0, 6, 14),
(238, '2021-08-11', 'Wednesday', '09:22:00', '2021-08-11', 'Wednesday', '17:46:00', '08:24:00', 'Clear Site, Capture LOG, Capture EPNM', 'WFH', 'none', 0, 6, 13),
(239, '2021-08-11', 'Wednesday', '09:27:00', '2021-08-11', 'Wednesday', '18:00:00', '08:33:00', 'Clear site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 15),
(241, '2021-08-12', 'Thursday', '10:46:00', '2021-08-12', 'Thursday', '18:04:00', '07:18:00', 'Clear Site ,Capture Log , Capture EPNM', 'WFH', 'none', 0, 6, 18),
(242, '2021-08-12', 'Thursday', '10:47:00', '2021-08-12', 'Thursday', '18:03:00', '07:16:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 19),
(243, '2021-08-12', 'Thursday', '10:47:00', '2021-08-12', 'Thursday', '20:17:00', '09:30:00', 'Clear site, capture epnm, capture log, build doc spe', 'Wfh', 'none', 0, 6, 14),
(244, '2021-08-12', 'Thursday', '10:48:00', '2021-08-12', 'Thursday', '18:25:00', '07:37:00', 'Clear Site, Capture LOG, Capture EPNM', 'WFH', 'none', 0, 6, 13),
(245, '2021-08-12', 'Thursday', '10:51:00', '2021-08-12', 'Thursday', '20:18:00', '09:27:00', 'Clear site, capture epnm, capture log, build doc SPE', 'WFH', 'none', 0, 6, 15),
(246, '2021-08-12', 'Thursday', '12:05:00', '2021-08-12', 'Thursday', '18:18:00', '06:13:00', 'Clear Site ,Capture Log , Capture EPNM', 'WFH', 'none', 0, 6, 20),
(247, '2021-08-13', 'Friday', '09:16:00', '2021-08-13', 'Friday', '18:05:00', '08:49:00', 'Capture epnm, capture log, build doc spe', 'Wfh', 'none', 0, 6, 14),
(248, '2021-08-13', 'Friday', '09:41:00', '2021-08-13', 'Friday', '18:03:00', '08:22:00', 'Clear Site, Capture LOG, Capture EPNM', 'WFH', 'none', 0, 6, 13),
(249, '2021-08-13', 'Friday', '09:57:00', '2021-08-13', 'Friday', '18:02:00', '08:05:00', 'Clear site, Capture Log, Capture EPNM, Create SPE Doc', 'WFH', 'none', 0, 6, 15),
(250, '2021-08-13', 'Friday', '09:58:00', '2021-08-13', 'Friday', '17:59:00', '08:01:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 19),
(251, '2021-08-13', 'Friday', '09:58:00', '2021-08-13', 'Friday', '18:01:00', '08:03:00', 'Clead Site , Capture Log ,Capture EPNM', 'WFH', 'none', 0, 6, 18),
(252, '2021-08-13', 'Friday', '09:58:00', '2021-08-13', 'Friday', '18:19:00', '08:21:00', 'Clear Site ,Capture Log , Capture EPNM', 'WFH', 'none', 0, 6, 20),
(253, '2021-08-13', 'Friday', '09:58:00', '2021-08-13', 'Friday', '18:00:00', '08:02:00', 'Clear Site , Capture Log ,Capture EPNM', 'WFH', 'none', 0, 6, 18),
(254, '2021-08-14', 'Saturday', '08:44:00', '2021-08-14', 'Saturday', '17:08:00', '08:24:00', 'Clear site, Capture Log, Capture EPNM, Create SPE doc', 'WFH', 'weekend 2', 150000, 6, 15),
(255, '2021-08-14', 'Saturday', '08:45:00', '2021-08-14', 'Saturday', '18:20:00', '09:35:00', 'Clear Site, Capture LOG, Capture EPNM', 'WFH', 'weekend 2', 150000, 6, 13),
(256, '2021-08-14', 'Saturday', '08:45:00', '2021-08-14', 'Saturday', '18:00:00', '09:15:00', 'Clear Site, Capture Log, Capture, EPNM', 'WFH', 'weekend 2', 150000, 6, 19),
(257, '2021-08-14', 'Saturday', '08:46:00', '2021-08-14', 'Saturday', '18:01:00', '09:15:00', 'Clear Site , Capture Log , Capture EPNM', 'WFH', 'weekend 2', 150000, 6, 18),
(258, '2021-08-14', 'Saturday', '08:48:00', '2021-08-14', 'Saturday', '18:00:00', '09:12:00', 'Clear Site ,Capture Log , Capture EPNM', 'WFH', 'weekend 2', 150000, 6, 20),
(259, '2021-08-16', 'Monday', '09:14:00', '2021-08-16', 'Monday', '18:05:00', '08:51:00', 'Capture epnm, capture log, build doc spe', 'Wfh', 'none', 0, 6, 14),
(260, '2021-08-16', 'Monday', '09:30:00', '2021-08-16', 'Monday', '18:00:00', '08:30:00', 'Clear site, Capture Log, Capture EPNM, Create SPE doc', 'WFH', 'none', 0, 6, 15),
(261, '2021-08-16', 'Monday', '09:39:00', '2021-08-16', 'Monday', '18:00:00', '08:21:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 19),
(262, '2021-08-16', 'Monday', '09:40:00', '2021-08-16', 'Monday', '18:18:00', '08:38:00', 'Clear Site ,Capture Log , Capture EPNM', 'WFH', 'none', 0, 6, 20),
(263, '2021-08-16', 'Monday', '09:42:00', '2021-08-16', 'Monday', '18:06:00', '08:24:00', 'Clear Site , Capture Log , Capture EPNM', 'WFH', 'none', 0, 6, 18),
(264, '2021-08-16', 'Monday', '09:48:00', '2021-08-16', 'Monday', '18:24:00', '08:36:00', 'Clear Site, Capture LOG, Capture EPNM', 'WFH', 'none', 0, 6, 13),
(265, '2021-08-17', 'Tuesday', '09:36:00', '2021-08-17', 'Tuesday', '09:49:00', '00:13:00', 'cek site program swap issue ospf', 'WFH', 'none', 0, 6, 13),
(266, '2021-08-18', 'Wednesday', '08:29:00', '2021-08-18', 'Wednesday', '18:19:00', '09:50:00', 'Clear Site ,Capture Log , Capture EPNM', 'WFH', 'none', 0, 6, 20),
(267, '2021-08-18', 'Wednesday', '08:30:00', '2021-08-18', 'Wednesday', '18:01:00', '09:31:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 19),
(268, '2021-08-18', 'Wednesday', '08:34:00', '2021-08-18', 'Wednesday', '18:01:00', '09:27:00', 'Clear Site , Capture EPNM , Capture Log', 'WFH', 'none', 0, 6, 18),
(269, '2021-08-18', 'Wednesday', '09:16:00', '2021-08-18', 'Wednesday', '18:00:00', '08:44:00', 'Clear Site, Capture Log, Capture EPNM, Create SPE Doc', 'WFH', 'none', 0, 6, 15),
(270, '2021-08-18', 'Wednesday', '09:22:00', '2021-08-18', 'Wednesday', '18:01:00', '08:39:00', 'Clear site, Capture epnm, Capture log, build doc spe', 'Wfh', 'none', 0, 6, 14),
(271, '2021-08-18', 'Wednesday', '09:27:00', '2021-08-18', 'Wednesday', '18:09:00', '08:42:00', 'Clear Site, Capture LOG, Capture EPNM', 'WFH', 'none', 0, 6, 13),
(272, '2021-08-19', 'Thursday', '08:00:00', '2021-08-19', 'Thursday', '18:00:00', '10:00:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 19),
(273, '2021-08-19', 'Thursday', '08:01:00', '2021-08-19', 'Thursday', '18:02:00', '10:01:00', 'Clear Site , Capture EPNM , Capture Log', 'WFH', 'none', 0, 6, 18),
(274, '2021-08-19', 'Thursday', '08:01:00', '2021-08-19', 'Thursday', '18:28:00', '10:27:00', 'Clear Site, Capture LOG, Capture EPNM', 'WFH', 'none', 0, 6, 13),
(275, '2021-08-19', 'Thursday', '08:06:00', '2021-08-19', 'Thursday', '18:16:00', '10:10:00', 'Clear Site ,Capture Log , Capture EPNM', 'WFH', 'none', 0, 6, 20),
(276, '2021-08-19', 'Thursday', '08:44:00', '2021-08-19', 'Thursday', '18:06:00', '09:22:00', 'Clear site, capture epnm, capture log, build doc spe', 'wfh', 'none', 0, 6, 14),
(277, '2021-08-19', 'Thursday', '11:33:00', '2021-08-19', 'Thursday', '11:33:00', '00:00:00', 'Rapat Bersama SMK Citra Negara', 'WFH', 'none', 0, 6, 12),
(278, '2021-08-20', 'Friday', '08:24:00', '2021-08-20', 'Friday', '18:24:00', '10:00:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 19),
(279, '2021-08-20', 'Friday', '08:25:00', '2021-08-20', 'Friday', '18:24:00', '09:59:00', 'Clear Site, Capture LOG, Capture EPNM', 'WFH', 'none', 0, 6, 20),
(280, '2021-08-20', 'Friday', '08:25:00', '2021-08-20', 'Friday', '18:04:00', '09:39:00', 'Clear Site , Capture EPNM , Capture Log', 'WFH', 'none', 0, 6, 18),
(281, '2021-08-20', 'Friday', '08:45:00', '2021-08-20', 'Friday', '18:00:00', '09:15:00', 'Clear site, Capture Log, Capture EPNM, Create SPE Doc', 'WFH', 'none', 0, 6, 15),
(282, '2021-08-20', 'Friday', '08:48:00', '2021-08-20', 'Friday', '18:23:00', '09:35:00', 'Clear Site, Capture LOG, Capture EPNM', 'WFH', 'none', 0, 6, 13),
(283, '2021-08-20', 'Friday', '09:27:00', '2021-08-20', 'Friday', '18:00:00', '08:33:00', 'Clear site, capture epnm, capture log, build document spe', 'Wfh', 'none', 0, 6, 14),
(284, '2021-08-21', 'Saturday', '08:23:00', '2021-08-21', 'Saturday', '16:40:00', '08:17:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'weekend 2', 150000, 6, 19),
(285, '2021-08-21', 'Saturday', '08:26:00', '2021-08-21', 'Saturday', '16:41:00', '08:15:00', 'Clear Site ,Capture Log , Capture EPNM', 'WFH', 'weekend 2', 150000, 6, 18),
(286, '2021-08-21', 'Saturday', '08:28:00', '2021-08-21', 'Saturday', '16:53:00', '08:25:00', 'Clear Site ,Capture Log , Capture EPNM', 'WFH', 'weekend 2', 150000, 6, 20),
(287, '2021-08-21', 'Saturday', '08:45:00', '2021-08-21', 'Saturday', '16:32:00', '07:47:00', 'Clear Site, Capture LOG, Capture EPNM', 'WFH', 'weekend 1', 50000, 6, 13),
(288, '2021-08-21', 'Saturday', '08:55:00', '2021-08-21', 'Saturday', '18:02:00', '09:07:00', 'clear site, capture epnm, capture log, Create SPE Doc', 'wfh', 'weekend 2', 150000, 6, 14),
(289, '2021-08-21', 'Saturday', '08:56:00', '2021-08-21', 'Saturday', '18:00:00', '09:04:00', 'Clear site, Capture Log, Capture EPNM, Create SPE Doc', 'WFH', 'weekend 2', 150000, 6, 15),
(290, '2021-08-23', 'Monday', '08:55:00', '2021-08-23', 'Monday', '18:00:00', '09:05:00', 'Clear Site , Capture EPNM , Capture Log', 'WFH', 'none', 0, 6, 18),
(291, '2021-08-23', 'Monday', '08:55:00', '2021-08-23', 'Monday', '18:26:00', '09:31:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 19),
(292, '2021-08-23', 'Monday', '08:56:00', '2021-08-23', 'Monday', '17:55:00', '08:59:00', 'Clear Site, Capture LOG, Capture EPNM', 'WFH', 'none', 0, 6, 13),
(293, '2021-08-23', 'Monday', '08:56:00', '2021-08-23', 'Monday', '18:18:00', '09:22:00', 'Clear Site ,Capture Log , Capture EPNM', 'WFH', 'none', 0, 6, 20),
(294, '2021-08-23', 'Monday', '09:13:00', '2021-08-23', 'Monday', '18:01:00', '08:48:00', 'Clear site, capture epnm, capture log, Create SPE doc', 'Wfh', 'none', 0, 6, 14),
(295, '2021-08-23', 'Monday', '09:31:00', '2021-08-23', 'Monday', '18:08:00', '08:37:00', 'Clear Site, Capture Log, Capture EPNM, Create SPE Doc', 'WFH', 'none', 0, 6, 15),
(296, '2021-08-24', 'Tuesday', '09:18:00', '2021-08-24', 'Tuesday', '18:59:00', '09:41:00', 'Clear Site, Capture Log, Capture EPNM', 'WFH', 'none', 0, 6, 19),
(297, '2021-08-24', 'Tuesday', '09:19:00', '2021-08-24', 'Tuesday', '18:02:00', '08:43:00', 'Clear Site, Capture Log, Capture EPNM, Create SPE Doc', 'WFH', 'none', 0, 6, 15),
(298, '2021-08-24', 'Tuesday', '09:19:00', '2021-08-24', 'Tuesday', '18:24:00', '09:05:00', 'Clear Site, Capture LOG, Capture EPNM', 'WFH', 'none', 0, 6, 13),
(299, '2021-08-24', 'Tuesday', '09:20:00', '2021-08-24', 'Tuesday', '19:20:00', '10:00:00', 'Clear Site , Capture EPNM , Capture Log', 'WFH', 'none', 0, 6, 18),
(301, '2021-08-24', 'Tuesday', '09:23:00', '2021-08-24', 'Tuesday', '18:30:00', '09:07:00', 'Clear Site ,Capture Log , Capture EPNM', 'WFH', 'none', 0, 6, 20),
(302, '2021-08-24', 'Tuesday', '10:17:00', '2021-08-24', 'Tuesday', '18:11:00', '07:54:00', 'Clear Site, Capture Log, Capture EPNM, Create SPE Doc', 'wfh', 'none', 0, 6, 14),
(306, '2021-08-24', 'Tuesday', '08:08:00', '2021-08-24', 'Tuesday', '10:10:00', '02:02:00', 'Test Server', 'Rumah', 'none', 0, 6, 16);

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

--
-- Dumping data untuk tabel `holiday`
--

INSERT INTO `holiday` (`id`, `day`, `date`) VALUES
(6, 'Tuesday', '2021-06-01'),
(7, 'Tuesday', '2021-07-20'),
(8, 'Wednesday', '2021-08-11'),
(9, 'Tuesday', '2021-08-17'),
(10, 'Wednesday', '2021-10-20');

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
(23, '2021_06_06_133732_create_holiday_table', 2),
(24, '2021_08_24_142127_create_user_has_project_table', 3);

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
(6, 'Indosat'),
(7, 'PKL Akademi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `project_user`
--

CREATE TABLE `project_user` (
  `id` int(11) NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `project_user`
--

INSERT INTO `project_user` (`id`, `project_id`, `user_id`) VALUES
(1, 6, 6),
(3, 6, 13),
(4, 6, 14),
(6, 6, 15),
(7, 6, 16),
(8, 6, 17),
(9, 6, 18),
(10, 6, 19),
(11, 6, 20),
(12, 7, 16),
(18, 6, 12),
(19, 7, 12);

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
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `photo`) VALUES
(6, 'Portal Admin Jarvis', 'jarvis@gmail.com', NULL, '$2y$10$pMo.EUZ3HfiY4lHVqnPTUu5yW4giGidS0qA7Q0FYRGSnBG86m2blq', 'admin', '0KnVNPQVG4KG51xNhss72Obe5v2SPeKxorH0ySmzsKVX1VYimSP6WsHBBA2q', '2021-06-05 19:34:51', '2021-06-26 11:00:29', '1624705229.jpg'),
(12, 'Slamet Santoso', 'senyum.slamet@gmail.com', NULL, '$2y$10$c0fGX8TfC0Zh/V6V2ML4ie66wR6Cmr.qd3lxtUSfSdQO24NI/pzum', 'user', NULL, '2021-06-23 14:33:56', '2021-06-26 02:49:09', '1624675749.jpg'),
(13, 'Adji Saka Ardhana', 'adjisakaardhana@gmail.com', NULL, '$2y$10$tIh73Fua8REmLN1yqX5MtOZlbB8peTBpJrZ/m6s4nsbbAxH1Fiw9W', 'user', NULL, '2021-06-24 13:02:59', '2021-06-24 13:02:59', NULL),
(14, 'Muhammad Rifqi', 'mr.rifqi2000@gmail.com', NULL, '$2y$10$hXzzZ.LmfU9EvSU4/Vnnxequ.l.vqfyLqje9lRK/9TxFwZN9PCxjK', 'user', '1qa9kKpzIciVGrRogEDFkBOouq47cS026uIJs35g6o4nJbTQSWkOcbR8p3pX', '2021-06-24 13:03:36', '2021-06-24 13:03:36', NULL),
(15, 'Muhammad Yusuf Salman', 'mys4lm4n@gmail.com', NULL, '$2y$10$Cwxx8cZMG6HQNu2BnQutNOBeah/fz/A1h9Q56/Uiz.3Vi8XSRcAUm', 'user', 'OVpiDtlQ5pbibuWrOv8XijvgoO5IhxVLfbaWRqth3wjSRf0mig2WIg9FGJcP', '2021-06-24 14:03:48', '2021-06-24 14:03:48', NULL),
(16, 'Rafi Ramadhana', 'ramadhanarafi437@gmail.com', NULL, '$2y$10$UQoyrOqJMmc7Y.AEm4MZfeNV5CpXHFB3m8GDXVr9GiPN4MaeynaNa', 'user', NULL, '2021-06-26 02:40:34', '2021-08-24 19:30:56', '1629858656.jpg'),
(17, 'A', 'aaa@nf.co.id', NULL, '$2y$10$fD495Vmj1lWd1Bs3XxmhOujUkq0Qe2NwXfupBRgoV2trB9DGx.zY.', 'user', NULL, '2021-07-20 14:39:19', '2021-07-20 14:39:19', NULL),
(18, 'Faisal Putra Mayanggi', 'faisalputra312@gmail.com', NULL, '$2y$10$Ssx5yRyDiYg529VpJkSqHuKBakcoUWS7J8eDyVYrswkQTQ9oKDlvy', 'user', '5CQqCbxR37MlPbymXlRwKKg6IQ8rxq202Wc3LPDOwvoXsgjThxV15Ka9Qcgw', '2021-08-11 03:56:15', '2021-08-11 03:56:15', NULL),
(19, 'Uwais Naufal Kusuma', 'uwaisnaufal@gmail.com', NULL, '$2y$10$DFAn893ZqS11xDwHvn0B.uRp0JRT.nA9dMAZygaIkAGPCYrqFXtxW', 'user', 'gzqVGtyeTqATRuFmS7xTSt19se7EFLrhIVe3eV3hxvwKEafpP4plYx6vdkn0', '2021-08-11 04:02:03', '2021-08-11 04:02:03', NULL),
(20, 'Mohamad Hafizh Ashifani', 'mhafizh@corp.jarvis-solusi.id', NULL, '$2y$10$qGkOo/wLvWchWEfj1CqQQ.8nKdqWsnrksHlpST6iNihCZFooTEB4q', 'user', NULL, '2021-08-11 07:36:20', '2021-08-11 07:36:20', NULL);

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
  ADD KEY `datas_user_id_foreign` (`user_id`),
  ADD KEY `fk_datas_to_project` (`project_id`);

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
-- Indeks untuk tabel `project_user`
--
ALTER TABLE `project_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_has_project_project_id_foreign` (`project_id`),
  ADD KEY `user_has_project_user_id_foreign` (`user_id`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=314;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `holiday`
--
ALTER TABLE `holiday`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `project_user`
--
ALTER TABLE `project_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `remarks`
--
ALTER TABLE `remarks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `datas`
--
ALTER TABLE `datas`
  ADD CONSTRAINT `datas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_datas_to_project` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Ketidakleluasaan untuk tabel `project_user`
--
ALTER TABLE `project_user`
  ADD CONSTRAINT `user_has_project_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `user_has_project_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

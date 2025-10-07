-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Sep 2025 pada 14.12
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zakatfitrah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bayarzakat`
--

CREATE TABLE `bayarzakat` (
  `id_zakat` bigint(20) UNSIGNED NOT NULL,
  `nama_kk` varchar(255) NOT NULL,
  `jumlah_tanggungan` int(11) NOT NULL,
  `jenis_bayar` enum('beras','uang') NOT NULL,
  `bayar_beras` double DEFAULT NULL,
  `bayar_uang` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bayarzakat`
--

INSERT INTO `bayarzakat` (`id_zakat`, `nama_kk`, `jumlah_tanggungan`, `jenis_bayar`, `bayar_beras`, `bayar_uang`, `created_at`, `updated_at`) VALUES
(10, 'Latief Naufal Adrianto', 2, 'beras', 5, 90000.00, '2025-04-18 23:10:52', '2025-04-18 23:10:52'),
(11, 'Amarullah', 5, 'uang', 12.5, 225000.00, '2025-04-18 23:11:05', '2025-04-18 23:11:05'),
(12, 'Alex Nurdin aluska', 3, 'uang', 7.5, 135000.00, '2025-04-18 23:11:18', '2025-04-18 23:11:18'),
(13, 'Aditya Rahman', 5, 'beras', 12.5, 225000.00, '2025-04-18 23:11:28', '2025-04-18 23:11:28'),
(14, 'Ahmad Fauzi Abdullah', 3, 'beras', 7.5, 135000.00, '2025-04-18 23:11:36', '2025-04-18 23:11:36'),
(15, 'Daniel Giovani', 1, 'uang', 2.5, 45000.00, '2025-04-18 23:11:47', '2025-04-18 23:11:47'),
(16, 'kaka el patok', 3, 'beras', 7.5, 135000.00, '2025-04-18 23:11:59', '2025-04-18 23:11:59'),
(17, 'Muhammad Aditya Rahman Santoso', 5, 'beras', 12.5, 225000.00, '2025-04-18 23:12:27', '2025-04-18 23:12:27'),
(18, 'Abdul Rahman', 5, 'beras', 12.5, 225000.00, '2025-04-18 23:12:42', '2025-04-18 23:12:42'),
(19, 'Hendrasyah', 6, 'uang', 15, 270000.00, '2025-04-18 23:12:50', '2025-04-18 23:12:50'),
(20, 'Joko Anwar', 3, 'beras', 7.5, 135000.00, '2025-04-18 23:13:06', '2025-04-18 23:13:06'),
(21, 'Sulaiman Hartono', 5, 'beras', 12.5, 225000.00, '2025-04-18 23:13:15', '2025-04-18 23:13:15'),
(22, 'Budi Santoso Wijaya', 6, 'beras', 15, 270000.00, '2025-04-18 23:13:26', '2025-04-18 23:13:26'),
(23, 'Zibran Labrezan', 6, 'uang', 15, 270000.00, '2025-04-18 23:13:46', '2025-04-18 23:13:46'),
(24, 'Alif Erdin', 6, 'beras', 15, 270000.00, '2025-04-18 23:14:15', '2025-04-18 23:14:15'),
(25, 'Ali Alimin', 5, 'uang', 12.5, 225000.00, '2025-04-18 23:14:24', '2025-04-18 23:14:24'),
(26, 'Kevin Van Bjir', 4, 'beras', 10, 180000.00, '2025-04-18 23:14:43', '2025-04-18 23:14:43'),
(27, 'Rudi Gunawan Pratsetyo', 5, 'beras', 12.5, 225000.00, '2025-04-18 23:15:04', '2025-04-18 23:15:04'),
(28, 'Yudistira', 4, 'uang', 10, 180000.00, '2025-04-18 23:15:25', '2025-04-18 23:15:25'),
(29, 'Yoga Saputra', 5, 'uang', 12.5, 225000.00, '2025-04-18 23:15:34', '2025-04-18 23:15:34'),
(30, 'Aleko Angkasa', 8, 'beras', 20, 360000.00, '2025-04-18 23:15:46', '2025-04-18 23:15:46'),
(31, 'Suherli', 2, 'uang', 5, 90000.00, '2025-04-18 23:16:02', '2025-04-18 23:16:02'),
(32, 'Fachrul Rachmatdiya', 3, 'uang', 7.5, 135000.00, '2025-04-18 23:16:11', '2025-04-18 23:16:11'),
(33, 'Wawan Setiawan', 5, 'beras', 12.5, 225000.00, '2025-04-18 23:16:40', '2025-04-18 23:16:40'),
(35, 'Tes1 Bayar', 1, 'beras', 2.5, 45000.00, '2025-04-27 22:49:57', '2025-04-27 22:49:57'),
(36, 'Gilang Haris', 5, 'uang', 12.5, 225000.00, '2025-05-21 21:42:26', '2025-05-21 21:42:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `distribusi`
--

CREATE TABLE `distribusi` (
  `id_distribusi` bigint(20) UNSIGNED NOT NULL,
  `nama_mustahik` varchar(255) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `alamat` text DEFAULT NULL,
  `kontak` varchar(20) DEFAULT NULL,
  `jenis_distribusi` enum('uang','beras','kombinasi') NOT NULL,
  `jumlah_uang` decimal(15,0) NOT NULL DEFAULT 0,
  `jumlah_beras` decimal(8,2) NOT NULL DEFAULT 0.00,
  `tanggal` date NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `distribusi`
--

INSERT INTO `distribusi` (`id_distribusi`, `nama_mustahik`, `kategori`, `alamat`, `kontak`, `jenis_distribusi`, `jumlah_uang`, `jumlah_beras`, `tanggal`, `keterangan`, `created_at`, `updated_at`) VALUES
(9, 'Fahri Azis', 'Miskin', 'Jln. H.Salamah No.23 01/02 Kahuripan, Jawa Barat, Desa kahuripan', NULL, 'beras', 0, 4.10, '2025-04-28', NULL, '2025-04-21 00:41:26', '2025-04-27 22:51:20'),
(12, 'Sayuti Malik', 'Miskin', 'Jln. pungkur No.13 01/03 Kahuripan, Jawa Barat, Desa kahuripan', NULL, 'uang', 45000, 0.00, '2025-04-27', NULL, '2025-04-27 00:16:01', '2025-04-27 00:16:01'),
(13, 'Galih Olgasan', 'Miskin', 'Jln. pungkur No.16 01/03 Kahuripan, Jawa Barat, Desa kahuripan', NULL, 'beras', 0, 4.10, '2025-04-27', NULL, '2025-04-27 00:16:26', '2025-04-27 00:16:26'),
(14, 'Olga Yoga', 'Mualaf', 'Jln. BKR No.5 02/04 Kahuripan, Jawa Barat, Desa kahuripan', NULL, 'uang', 18000, 0.00, '2025-04-27', NULL, '2025-04-27 00:17:00', '2025-04-27 00:17:00'),
(15, 'Nurdin Al-Hidayat', 'Miskin', 'Desa Jauh', NULL, 'uang', 45000, 4.10, '2025-04-28', NULL, '2025-04-27 22:51:56', '2025-04-27 22:51:56'),
(17, 'Wati Wartini', 'Miskin', 'Jln. pungkur No.9 01/03 Kahuripan, Jawa Barat, Desa kahuripan', NULL, 'uang', 45000, 4.10, '2025-05-04', NULL, '2025-05-04 02:13:45', '2025-05-04 02:13:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_mustahik`
--

CREATE TABLE `kategori_mustahik` (
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `jumlah_hak` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori_mustahik`
--

INSERT INTO `kategori_mustahik` (`id_kategori`, `nama_kategori`, `jumlah_hak`, `created_at`, `updated_at`) VALUES
(1, 'Fakir', 40, '2025-04-18 06:34:42', '2025-04-18 06:34:42'),
(2, 'Miskin', 40, '2025-04-18 06:34:42', '2025-04-18 06:34:42'),
(3, 'Amil', 10, '2025-04-18 06:34:42', '2025-04-18 06:34:42'),
(4, 'Mualaf', 2, '2025-04-18 06:34:42', '2025-04-18 06:34:42'),
(5, 'Riqab', 1, '2025-04-18 06:34:42', '2025-04-18 06:34:42'),
(6, 'Gharimin', 1, '2025-04-18 06:34:42', '2025-04-18 06:34:42'),
(7, 'Fisabilillah', 5, '2025-04-18 06:34:42', '2025-04-18 06:34:42'),
(8, 'Ibnu Sabil', 1, '2025-04-18 06:34:42', '2025-04-18 06:34:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, 'create_bayarzakat_table', 1),
(5, 'create_kategori_mustahik_table', 1),
(6, 'create_mustahik_lainnya_table', 1),
(7, 'create_mustahik_warga_table', 1),
(8, 'create_muzakki_table', 1),
(9, '2025_04_18_055316_add_alamat_to_muzakki_table', 2),
(10, '2025_04_18_060045_add_nik_to_mustahik_warga_table', 3),
(11, '2025_04_18_063856_add_alamat_and_keterangan_to_mustahik_warga_table', 4),
(12, '2023_07_10_063428_create_distribusi_table', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mustahik_lainnya`
--

CREATE TABLE `mustahik_lainnya` (
  `id_mustahiklainnya` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `hak` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mustahik_warga`
--

CREATE TABLE `mustahik_warga` (
  `id_mustahikwarga` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) NOT NULL,
  `hak` int(11) NOT NULL,
  `alamat` text DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mustahik_warga`
--

INSERT INTO `mustahik_warga` (`id_mustahikwarga`, `nama`, `nik`, `kategori`, `hak`, `alamat`, `keterangan`, `created_at`, `updated_at`) VALUES
(11, 'Nurdin Al-Hidayat', '12321312', 'Miskin', 40, 'Desa Jauh', NULL, '2025-04-18 06:38:57', '2025-04-26 22:54:47'),
(12, 'Niko Ardillah', '12321312', 'Fakir', 40, 'Desa Jauh', NULL, '2025-04-18 06:39:14', '2025-04-18 06:39:14'),
(13, 'Dudi Tabuti', '32100634566716', 'Fakir', 40, 'Desa Jauh', NULL, '2025-04-18 06:39:35', '2025-04-18 21:15:38'),
(14, 'Dayat Nur Fadillah', '3210071823890', 'Fakir', 40, 'Desa Jauh', NULL, '2025-04-18 06:39:57', '2025-04-18 21:15:46'),
(15, 'Siti Aminah Zahra', '3210045678005', 'Fakir', 40, 'Jln. BKR No.24 02/03 Tawang, Jawa Barat', NULL, '2025-04-18 20:50:55', '2025-04-18 21:18:25'),
(16, 'Nurul Izzah Almas', '32100565678004', 'Fakir', 40, 'Jln. HJ.Umar 003/005 Pungkur', NULL, '2025-04-18 20:53:12', '2025-04-18 21:18:36'),
(17, 'Ahmad Fadli Prakoso', '32457000814', 'Fakir', 40, 'Jln. Tamansari No.9 01/02 Tawang, Jawa Barat', NULL, '2025-04-18 20:54:48', '2025-04-18 21:18:47'),
(18, 'Intan Permata Sari', '324000780012', 'Fakir', 40, 'Jln. Pemuda no.12  06/08 Kahuripan, Jawa Barat', NULL, '2025-04-18 20:55:44', '2025-04-18 21:19:09'),
(19, 'Hafiz Muhamad Rafi', '325809900023', 'Fakir', 40, 'Jln. Cimulu no.85 05/03 Tamansari, Jawa Barat,', NULL, '2025-04-18 20:57:11', '2025-04-18 21:19:31'),
(20, 'Dewi Lestari', '32119800016', 'Fakir', 40, 'Jln. Moh Toha no.25 Tawang, Jawa Barat', NULL, '2025-04-18 20:58:10', '2025-04-18 21:20:10'),
(21, 'Yusuf Ramadhan', '325677890003', 'Fakir', 40, 'Jln. Asmi no.10 02/04 Pungkur, Jawa Barat', NULL, '2025-04-18 20:59:20', '2025-04-18 21:20:21'),
(22, 'Salma Fitria Dewi', '32566678880145', 'Fakir', 40, 'Jln. Ciateul no.23 01/02 Pungkur, Jawa Barat', NULL, '2025-04-18 21:00:09', '2025-04-18 21:20:32'),
(23, 'Andi Putra Wirawan', '236007895100', 'Fakir', 40, 'Jln. Ijan No.2 03/02 Pungkur, Jawa Barat', NULL, '2025-04-18 21:01:11', '2025-04-18 21:20:50'),
(24, 'Rina Kartika Sari', '234007008917', 'Fakir', 40, 'Jln. Tamansari no.11  01/05 Kahuripan, Jawa Barat', NULL, '2025-04-18 21:02:28', '2025-04-18 21:21:01'),
(25, 'Astuti', '3232466670091', 'Fakir', 40, 'Jln. H.Salamah No.9 01/02 Kahuripan, Jawa Barat', NULL, '2025-04-18 21:17:02', '2025-04-18 21:21:16'),
(26, 'Yuni Yunita', '3260051134', 'Miskin', 40, 'Jln. H.Salamah No.17 01/02 Kahuripan, Jawa Barat, Desa kahuripan', NULL, '2025-04-18 21:22:27', '2025-04-18 21:22:27'),
(27, 'Fahri Azis', '324500714', 'Miskin', 40, 'Jln. H.Salamah No.23 01/02 Kahuripan, Jawa Barat, Desa kahuripan', NULL, '2025-04-18 21:23:34', '2025-04-18 21:23:34'),
(28, 'Abdilah', '234007008917', 'Miskin', 40, 'Jln. pungkur No.23 01/02 Kahuripan, Jawa Barat, Desa kahuripan', NULL, '2025-04-18 21:24:06', '2025-04-18 21:24:06'),
(29, 'Rara Nongrang', '32100634566716', 'Miskin', 40, 'Jln. pungkur No.25 01/02 Kahuripan, Jawa Barat, Desa kahuripan', NULL, '2025-04-18 21:24:35', '2025-04-18 21:24:35'),
(30, 'Hidayat', '3210071823890', 'Miskin', 40, 'Jln. pungkur No.1 01/03 Kahuripan, Jawa Barat, Desa kahuripan', NULL, '2025-04-18 21:25:11', '2025-04-18 21:25:11'),
(31, 'Sekar Mega', '32566678880145', 'Miskin', 40, 'Jln. pungkur No.3 01/03 Kahuripan, Jawa Barat, Desa kahuripan', NULL, '2025-04-18 21:25:43', '2025-04-18 21:25:43'),
(32, 'Asep Sayuti', '325666788', 'Miskin', 40, 'Jln. pungkur No.5 01/03 Kahuripan, Jawa Barat, Desa kahuripan', NULL, '2025-04-18 21:26:13', '2025-04-18 21:26:13'),
(33, 'Wati Wartini', '2340070084004', 'Miskin', 40, 'Jln. pungkur No.9 01/03 Kahuripan, Jawa Barat, Desa kahuripan', NULL, '2025-04-18 21:26:42', '2025-04-18 21:26:42'),
(34, 'Dandi Ahmad', '3210071823890', 'Miskin', 40, 'Jln. pungkur No.10 01/03 Kahuripan, Jawa Barat, Desa kahuripan', NULL, '2025-04-18 21:27:03', '2025-04-18 21:27:03'),
(35, 'Sisil Nursilawati', '234007894561', 'Miskin', 40, 'Jln. pungkur No.11  01/03 Kahuripan, Jawa Barat, Desa kahuripan', NULL, '2025-04-18 21:27:44', '2025-04-18 21:27:44'),
(36, 'Galih Olgasan', '23456661900034', 'Miskin', 40, 'Jln. pungkur No.16 01/03 Kahuripan, Jawa Barat, Desa kahuripan', NULL, '2025-04-18 21:28:18', '2025-04-18 21:28:18'),
(37, 'Lee Soman', '23800091314', 'Miskin', 40, 'Jln. pungkur No.12 01/03 Kahuripan, Jawa Barat, Desa kahuripan', NULL, '2025-04-18 21:28:43', '2025-04-18 21:28:43'),
(38, 'Sayuti Malik', '2300045418409', 'Miskin', 40, 'Jln. pungkur No.13 01/03 Kahuripan, Jawa Barat, Desa kahuripan', NULL, '2025-04-18 21:29:06', '2025-04-18 21:29:06'),
(39, 'Jenni Janet', '23400790112', 'Miskin', 40, 'Jln. pungkur No.18 01/03 Kahuripan, Jawa Barat, Desa kahuripan', NULL, '2025-04-18 21:29:33', '2025-04-18 21:29:33'),
(40, 'Tuti Astuti', '2340097875', 'Miskin', 40, 'Jln. pungkur No.19 01/03 Kahuripan, Jawa Barat, Desa kahuripan', NULL, '2025-04-18 21:29:55', '2025-04-18 21:29:55'),
(41, 'Satia Mahardika', '23400084321', 'Amil', 10, 'Jln. BKR No.1 01/03 Kahuripan, Jawa Barat, Desa kahuripan', NULL, '2025-04-18 21:30:33', '2025-04-18 21:30:33'),
(42, 'Reni Rahayu', '3240009764513', 'Amil', 10, 'Jln. BKR No.2 02/04 Kahuripan, Jawa Barat, Desa kahuripan', NULL, '2025-04-18 21:31:03', '2025-04-18 21:31:03'),
(43, 'Budiman Ahmad', '3270085813', 'Amil', 10, 'Jln. BKR No.3 02/04 Kahuripan, Jawa Barat, Desa kahuripan', NULL, '2025-04-18 21:31:29', '2025-04-18 21:31:29'),
(44, 'Deni Rahman', '3240900977513', 'Mualaf', 2, 'Jln. BKR No.4 02/04 Kahuripan, Jawa Barat, Desa kahuripan', NULL, '2025-04-18 21:32:01', '2025-04-18 21:32:01'),
(45, 'Olga Yoga', '32700862132698', 'Mualaf', 2, 'Jln. BKR No.5 02/04 Kahuripan, Jawa Barat, Desa kahuripan', NULL, '2025-04-18 21:32:33', '2025-04-18 21:32:33'),
(46, 'Salman Hidayat', '327007836223', 'Riqab', 1, 'Jln. BKR No.8 02/04 Kahuripan, Jawa Barat, Desa kahuripan', NULL, '2025-04-18 21:33:00', '2025-04-18 21:33:00'),
(47, 'Tatang Martanang', '32400713512', 'Riqab', 1, 'Jln. BKR No.9 02/04 Kahuripan, Jawa Barat, Desa kahuripan', NULL, '2025-04-18 21:33:30', '2025-04-18 21:33:30'),
(48, 'Asbun Marbun', '32566678880145', 'Gharimin', 1, 'Jln. BKR No.11 02/04 Kahuripan, Jawa Barat, Desa kahuripan', NULL, '2025-04-18 21:33:59', '2025-04-18 21:33:59'),
(49, 'Wawan Dermawan', '3270073417564234', 'Fisabilillah', 5, 'Jln. BKR No.13 02/04 Kahuripan, Jawa Barat, Desa kahuripan', NULL, '2025-04-18 21:34:33', '2025-04-18 21:34:33'),
(50, 'Yuyut Hayatut', '3210071823890', 'Fisabilillah', 5, 'Jln. BKR No.15 02/04 Kahuripan, Jawa Barat, Desa kahuripan', NULL, '2025-04-18 21:34:58', '2025-04-18 21:34:58'),
(51, 'Tantri Marhaban', '32100634566716', 'Ibnu Sabil', 1, 'Jln. BKR No.17 02/04 Kahuripan, Jawa Barat, Desa kahuripan', NULL, '2025-04-18 21:35:25', '2025-04-18 21:35:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `muzakki`
--

CREATE TABLE `muzakki` (
  `id_muzakki` bigint(20) UNSIGNED NOT NULL,
  `nama_muzakki` varchar(255) NOT NULL,
  `alamat` text DEFAULT NULL,
  `jumlah_tanggungan` int(11) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `muzakki`
--

INSERT INTO `muzakki` (`id_muzakki`, `nama_muzakki`, `alamat`, `jumlah_tanggungan`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 'Latief Naufal Adrianto', 'Jln. H.Salamah No.23 01/02 Kahuripan, Jawa Barat, Desa kahuripan', 3, 'hai lol', '2025-04-17 06:49:09', '2025-04-26 22:54:11'),
(5, 'Alex Nurdin aluska', 'Jln. H.Salamah No.23 01/02 Kahuripan, Jawa Barat, Desa kahuripan', 3, NULL, '2025-04-17 22:54:41', '2025-04-18 22:14:02'),
(6, 'kaka el patok', 'Jln. H.Salamah No.23 01/02 Kahuripan, Jawa Barat, Desa kahuripan', 3, NULL, '2025-04-17 22:57:46', '2025-04-18 22:14:07'),
(7, 'Amarullah', 'Jln. H.Salamah No.23 01/02 Kahuripan, Jawa Barat, Desa kahuripan', 5, NULL, '2025-04-18 06:49:50', '2025-04-18 22:14:12'),
(8, 'Muhammad Aditya Rahman Santoso', 'Jln. H.Salamah No.23 01/02 Kahuripan, Jawa Barat, Desa kahuripan', 5, 'Jangan Di Korupsi', '2025-04-18 21:03:46', '2025-04-18 21:10:04'),
(9, 'Ahmad Fauzi Abdullah', 'Jln. H.Salamah No.2 01/02 Kahuripan, Jawa Barat, Desa kahuripan', 3, NULL, '2025-04-18 21:04:41', '2025-04-18 21:10:28'),
(10, 'Budi Santoso Wijaya', 'Jln. H.Salamah No.26 01/02 Kahuripan, Jawa Barat, Desa kahuripan', 6, NULL, '2025-04-18 21:11:10', '2025-04-18 21:11:10'),
(11, 'Joko Anwar', 'Jln. H.Salamah No.10 01/05 Kahuripan, Jawa Barat, Desa kahuripan', 3, NULL, '2025-04-18 21:11:47', '2025-04-18 22:15:07'),
(12, 'Sulaiman Hartono', 'Jln. H.Salamah No.03 01/01 Kahuripan, Jawa Barat, Desa kahuripan', 5, NULL, '2025-04-18 21:12:29', '2025-04-18 21:49:51'),
(13, 'Abdul Rahman', 'Jln. H.Salamah No.24 02/06 Kahuripan, Jawa Barat, Desa kahuripan', 5, NULL, '2025-04-18 21:13:18', '2025-04-18 21:13:18'),
(14, 'Hendrasyah', 'Jln. H.Salamah No.6 02/06 Kahuripan, Jawa Barat, Desa kahuripan', 6, NULL, '2025-04-18 21:13:45', '2025-04-18 21:13:45'),
(15, 'Ali Alimin', 'Jln. H.Salamah No.7 01/02 Kahuripan, Jawa Barat, Desa kahuripan', 5, NULL, '2025-04-18 21:14:08', '2025-04-18 22:15:24'),
(16, 'Arif Arifin', 'Jln. H.Salamah No.8 01/02 Kahuripan, Jawa Barat, Desa kahuripan', 4, NULL, '2025-04-18 21:14:35', '2025-04-18 22:14:56'),
(17, 'Rudi Gunawan Pratsetyo', 'Jln. H.Salamah No.5 01/02 Kahuripan, Jawa Barat, Desa kahuripan', 5, NULL, '2025-04-18 21:15:01', '2025-04-18 21:15:01'),
(18, 'Kevin Van Bjir', 'Jln. BKR No.7 02/04 Kahuripan, Jawa Barat, Desa kahuripan', 4, NULL, '2025-04-18 21:36:36', '2025-04-18 21:45:27'),
(19, 'Gilang Haris', 'Jln. BKR No.17 02/04 Kahuripan, Jawa Barat, Desa kahuripan', 5, NULL, '2025-04-18 21:37:36', '2025-04-18 21:37:36'),
(20, 'Aleko Angkasa', 'Jln. BKR No.23 02/04 Kahuripan, Jawa Barat, Desa kahuripan', 8, NULL, '2025-04-18 21:38:04', '2025-04-18 21:38:04'),
(21, 'Yudistira', 'Jln. BKR No.13 02/04 Kahuripan, Jawa Barat, Desa kahuripan', 4, NULL, '2025-04-18 21:38:32', '2025-04-18 21:38:32'),
(22, 'Yoga Saputra', 'Jln. BKR No.26 02/04 Kahuripan, Jawa Barat, Desa kahuripan', 5, NULL, '2025-04-18 21:38:48', '2025-04-18 21:38:48'),
(23, 'Alif Erdin', 'Jln. BKR No.5 02/04 Kahuripan, Jawa Barat, Desa kahuripan', 6, NULL, '2025-04-18 21:39:53', '2025-04-18 21:39:53'),
(24, 'Aditya Rahman', 'Jln. Pemuda No.2 02/04 Kahuripan, Jawa Barat, Desa kahuripan', 5, NULL, '2025-04-18 21:40:18', '2025-04-18 21:40:18'),
(25, 'Zibran Labrezan', 'Jln. Pemuda No.3 02/04 Kahuripan, Jawa Barat, Desa kahuripan', 6, NULL, '2025-04-18 21:40:41', '2025-04-18 21:40:41'),
(26, 'Suherli', 'Jln. Pemuda No.4 02/04 Kahuripan, Jawa Barat, Desa kahuripan', 2, NULL, '2025-04-18 21:40:58', '2025-04-18 21:40:58'),
(27, 'Daniel Giovani', 'Jln. Pemuda No.4 02/04 Kahuripan, Jawa Barat, Desa kahuripan', 1, NULL, '2025-04-18 21:41:16', '2025-04-18 21:41:16'),
(28, 'Fachrul Rachmatdiya', 'Jln. Pemuda No.6 02/04 Kahuripan, Jawa Barat, Desa kahuripan', 3, NULL, '2025-04-18 21:41:35', '2025-04-18 21:41:35'),
(31, 'Wawan Setiawan', 'Jln. Pemuda No.15 02/04 Kahuripan, Jawa Barat, Desa kahuripan', 5, NULL, '2025-04-18 21:43:28', '2025-04-18 21:43:28'),
(32, 'Tes1 Bayar', NULL, 1, NULL, '2025-04-26 23:07:27', '2025-04-26 23:07:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Desa Kahuripan', 'admin@gmail.com', NULL, '$2y$12$PsdKWnv7xQgkhL9w2JGkPOXRMgSwwO5wV7NgPXWaRFcetXEkt9PWi', NULL, '2025-04-17 06:32:31', '2025-04-17 06:32:31'),
(2, 'Azmi Nur Shidiq Ridwan', 'azminursidiq@gmail.com', NULL, '$2y$12$rRUi5F0fEhaymL/ajZRIB.2QRutXP/tiABmStGhD8jcBe5sHiciJu', NULL, '2025-05-04 00:43:22', '2025-05-04 00:43:22');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bayarzakat`
--
ALTER TABLE `bayarzakat`
  ADD PRIMARY KEY (`id_zakat`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `distribusi`
--
ALTER TABLE `distribusi`
  ADD PRIMARY KEY (`id_distribusi`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_mustahik`
--
ALTER TABLE `kategori_mustahik`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mustahik_lainnya`
--
ALTER TABLE `mustahik_lainnya`
  ADD PRIMARY KEY (`id_mustahiklainnya`);

--
-- Indeks untuk tabel `mustahik_warga`
--
ALTER TABLE `mustahik_warga`
  ADD PRIMARY KEY (`id_mustahikwarga`);

--
-- Indeks untuk tabel `muzakki`
--
ALTER TABLE `muzakki`
  ADD PRIMARY KEY (`id_muzakki`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT untuk tabel `bayarzakat`
--
ALTER TABLE `bayarzakat`
  MODIFY `id_zakat` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `distribusi`
--
ALTER TABLE `distribusi`
  MODIFY `id_distribusi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori_mustahik`
--
ALTER TABLE `kategori_mustahik`
  MODIFY `id_kategori` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `mustahik_lainnya`
--
ALTER TABLE `mustahik_lainnya`
  MODIFY `id_mustahiklainnya` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mustahik_warga`
--
ALTER TABLE `mustahik_warga`
  MODIFY `id_mustahikwarga` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `muzakki`
--
ALTER TABLE `muzakki`
  MODIFY `id_muzakki` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

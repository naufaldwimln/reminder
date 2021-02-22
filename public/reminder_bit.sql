-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Feb 2021 pada 10.13
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reminder_bit`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `general_app`
--

CREATE TABLE `general_app` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_light` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_dark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token_api` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `general_app`
--

INSERT INTO `general_app` (`id`, `name`, `logo_light`, `logo_dark`, `icon`, `token_api`, `facebook`, `twitter`, `instagram`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Reminder BIT', '/storage/general_app/xvan2sYEIcSWcS3tc6dn2vFgC1Hoc8X5jhwsj4U0.png', '/storage/general_app/f2a21y1IDY2dFAIMdKVXf2nEjbok8JLVxruHo90X.png', '/storage/general_app/tBUzW4cT7AxbQxz3zOvd8jShkR7XuZOBnql0X0Im.ico', 'AAAA0ueqkwI:APA91bFXjeGUgKVx0yw-Y_RaBvBxzElgP_G2k1wJDYwScqJHB8RduDlzIrfM95jrcj-WwDgxY_QTDNjFh57XcmgQXU9Q87rNix3fo58UVYA0YKylhxIXNWZKQLsuNoK8J54rdG7xSCcv', NULL, NULL, NULL, NULL, NULL, 'Bandung', NULL, '2021-02-15 04:23:20'),
(3, 'Mitra Pedagang', 'frontend/images/logo.png', 'frontend/images/logo-dark.png', 'frontend/images/logo.ico', NULL, '', '', '', '', NULL, 'Bandung', NULL, NULL),
(4, 'Mitra Pedagang', 'frontend/images/logo.png', 'frontend/images/logo-dark.png', 'frontend/images/logo.ico', NULL, '', '', '', '', NULL, 'Bandung', NULL, NULL),
(5, 'Mitra Pedagang', 'frontend/images/logo.png', 'frontend/images/logo-dark.png', 'frontend/images/logo.ico', NULL, '', '', '', '', NULL, 'Bandung', NULL, NULL),
(6, 'Mitra Pedagang', 'frontend/images/logo.png', 'frontend/images/logo-dark.png', 'frontend/images/logo.ico', NULL, '', '', '', '', NULL, 'Bandung', NULL, NULL),
(7, 'Mitra Pedagang', 'frontend/images/logo.png', 'frontend/images/logo-dark.png', 'frontend/images/logo.ico', NULL, '', '', '', '', NULL, 'Bandung', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `group_menus`
--

CREATE TABLE `group_menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user_group` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `role` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `group_menus`
--

INSERT INTO `group_menus` (`id`, `id_user_group`, `id_menu`, `role`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'ACRUD', '2019-03-25 10:28:31', '2019-03-25 10:28:38'),
(2, 1, 2, 'ACRUD', '2019-03-25 09:14:26', '2019-03-25 10:23:31'),
(3, 1, 3, 'ACRUD', '2019-03-25 10:30:14', '2019-03-25 10:30:18'),
(4, 1, 4, 'ACRUD', '2019-03-25 10:31:27', '2019-03-25 10:31:29'),
(5, 1, 6, 'ACRUD', '2019-03-25 10:33:14', '2019-03-25 10:33:16'),
(47, 1, 5, 'ACRUD', '2021-01-27 16:07:21', '2021-01-27 16:07:24'),
(48, 1, 29, 'ACRUD', '2021-01-27 16:07:25', '2021-01-27 16:07:28'),
(49, 1, 33, 'AC', '2021-01-27 17:44:45', '2021-01-27 17:44:47'),
(50, 1, 30, 'ACRDU', '2021-01-27 17:44:48', '2021-01-27 17:44:52'),
(51, 1, 32, 'ACRUD', '2021-01-27 17:44:56', '2021-01-30 17:12:15'),
(52, 1, 34, 'ACRUD', '2021-01-27 17:44:58', '2021-01-27 17:45:20'),
(53, 1, 35, 'ACRUD', '2021-01-27 17:44:59', '2021-01-27 17:45:24'),
(54, 1, 36, 'ACRUD', '2021-01-27 17:44:59', '2021-01-27 17:45:29'),
(55, 1, 37, 'ACRUD', '2021-01-27 17:45:01', '2021-01-27 17:45:32'),
(56, 1, 38, 'ADURC', '2021-01-27 17:45:01', '2021-01-27 17:45:35'),
(57, 1, 39, 'ACRUD', '2021-01-27 17:45:02', '2021-01-27 17:45:38'),
(58, 1, 40, 'ADURC', '2021-01-27 17:45:03', '2021-01-27 17:45:41'),
(59, 1, 41, 'ACRUD', '2021-01-27 17:45:03', '2021-01-27 17:45:44'),
(60, 1, 42, 'ACRDU', '2021-01-27 17:56:55', '2021-01-27 17:57:00'),
(61, 1, 44, 'ACRUD', '2021-01-27 17:57:02', '2021-01-27 17:57:06'),
(62, 1, 43, 'ACRUD', '2021-01-27 17:57:44', '2021-01-27 17:57:48'),
(63, 1, 31, 'ACRUD', '2021-01-28 10:32:40', '2021-01-28 10:32:44'),
(64, 1, 45, 'ACRUD', '2021-01-30 17:12:08', '2021-01-30 17:12:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_notification`
--

CREATE TABLE `jenis_notification` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis_notification`
--

INSERT INTO `jenis_notification` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Tetap', 1, NULL, NULL),
(2, 'Tidak Tetap', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `head` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_menu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parrent` int(11) NOT NULL,
  `nama_parrent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_menu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `nama_menu`, `parrent`, `nama_parrent`, `link`, `icon_menu`, `urutan`, `created_at`, `updated_at`) VALUES
(1, 'Setting', 0, 'Setting', '#', 'icon-cog', 100, '2021-01-26 15:05:25', '2021-01-26 15:05:25'),
(2, 'Role', 1, 'Setting', 'roles', 'icon-accessibility', 3, '2019-03-25 09:14:10', '2019-04-22 19:56:17'),
(3, 'Menu Backoffice', 1, 'Setting', 'menus', 'icon-list2', 1, '2019-03-25 17:00:00', '2019-04-22 19:55:28'),
(4, 'Users', 6, 'Kelola & Setting Pengguna', 'users', 'icon-people', 2, '2019-03-25 10:31:04', '2019-04-22 19:56:46'),
(6, 'Kelola & Setting Pengguna', 0, NULL, '#', 'icon-users4', 1, '2019-11-25 23:16:39', '2019-12-09 20:18:14'),
(29, 'Setting General Aplikasi', 6, 'Kelola & Setting Pengguna', 'setting-application', 'icon-lock', 1, '2021-01-27 16:06:36', '2021-01-27 16:06:36');

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
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(12, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(13, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(14, '2016_06_01_000004_create_oauth_clients_table', 1),
(15, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(16, '2021_01_22_175116_general_app_table', 1),
(17, '2021_02_15_113612_jenis_notification_table', 2),
(18, '2021_02_15_114759_notification_table', 3),
(19, '2021_02_15_114805_notification_time_table', 3),
(20, '2021_02_15_115303_notification_involved_table', 3),
(21, '2021_02_15_150011_logs_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notification`
--

CREATE TABLE `notification` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_start` datetime DEFAULT NULL,
  `target_finish` datetime DEFAULT NULL,
  `id_jenis_notification` int(11) NOT NULL,
  `working_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `notification`
--

INSERT INTO `notification` (`id`, `name`, `detail`, `color`, `target_start`, `target_finish`, `id_jenis_notification`, `working_status`, `created_at`, `updated_at`) VALUES
(24, 'KAK BP Batam', 'tolong di cek ya', '1', '2021-02-17 00:00:00', NULL, 0, NULL, '2021-02-17 04:07:01', '2021-02-17 04:07:01'),
(25, 'testing', 'trsting apps teminder', '3', '2021-02-17 00:00:00', NULL, 0, NULL, '2021-02-17 09:13:15', '2021-02-17 09:13:15'),
(26, 'yes 1', 'jangan luoa taa', '3', '2021-02-19 00:00:00', NULL, 0, '', '2021-02-19 02:48:19', '2021-02-19 02:48:19'),
(27, 'yes', 'BP btam', '3', '2021-02-19 00:00:00', NULL, 1, 'Mingguan', '2021-02-19 03:01:12', '2021-02-19 03:01:12'),
(28, 'Testing reminder 1', 'detail reminder 1', '3', '2021-02-19 00:00:00', NULL, 1, 'Harian', '2021-02-19 08:07:46', '2021-02-19 08:07:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notification_involved`
--

CREATE TABLE `notification_involved` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_notification` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `notification_involved`
--

INSERT INTO `notification_involved` (`id`, `id_notification`, `id_user`, `detail`, `created_at`, `updated_at`) VALUES
(32, 24, 2, '', '2021-02-17 04:07:01', '2021-02-17 04:07:01'),
(33, 24, 3, '', '2021-02-17 04:07:01', '2021-02-17 04:07:01'),
(34, 25, 2, '', '2021-02-17 09:13:15', '2021-02-17 09:13:15'),
(35, 25, 3, '', '2021-02-17 09:13:15', '2021-02-17 09:13:15'),
(36, 26, 2, '', '2021-02-19 02:48:19', '2021-02-19 02:48:19'),
(37, 26, 4, '', '2021-02-19 02:48:19', '2021-02-19 02:48:19'),
(38, 26, 3, 'Created', '2021-02-19 02:48:19', '2021-02-19 02:48:19'),
(39, 27, 2, '', '2021-02-19 03:01:12', '2021-02-19 03:01:12'),
(40, 27, 5, '', '2021-02-19 03:01:12', '2021-02-19 03:01:12'),
(41, 27, 3, 'Created', '2021-02-19 03:01:12', '2021-02-19 03:01:12'),
(42, 27, 2, 'Created', '2021-02-19 02:48:19', '2021-02-19 02:48:19'),
(43, 28, 3, '', '2021-02-19 08:07:46', '2021-02-19 08:07:46'),
(44, 28, 4, 'Created', '2021-02-19 08:07:46', '2021-02-19 08:07:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notification_time`
--

CREATE TABLE `notification_time` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_notification` int(11) NOT NULL,
  `time_notif` datetime DEFAULT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `notification_time`
--

INSERT INTO `notification_time` (`id`, `id_notification`, `time_notif`, `detail`, `status`, `created_at`, `updated_at`) VALUES
(13, 24, '2021-02-18 09:44:57', '', 0, '2021-02-17 04:07:01', '2021-02-17 04:07:01'),
(14, 24, '2021-02-19 11:45:22', '', 1, '2021-02-17 04:07:01', '2021-02-17 04:07:01'),
(15, 24, '2021-02-19 04:45:39', '', 1, '2021-02-17 04:07:01', '2021-02-17 04:07:01'),
(16, 25, '2021-02-17 16:12:28', '', 0, '2021-02-17 09:13:15', '2021-02-17 09:13:15'),
(17, 25, '2021-02-18 16:12:36', '', 0, '2021-02-17 09:13:15', '2021-02-17 09:13:15'),
(18, 25, '2021-02-19 11:12:42', '', 0, '2021-02-17 09:13:15', '2021-02-17 09:13:15'),
(19, 26, '2021-02-20 07:00:36', '', 0, '2021-02-19 02:48:19', '2021-02-19 02:48:19'),
(20, 26, '2021-02-21 10:30:45', '', 0, '2021-02-19 02:48:19', '2021-02-19 02:48:19'),
(21, 27, '2021-02-19 15:03:32', '', 1, '2021-02-19 03:01:12', '2021-02-19 08:03:30'),
(22, 27, '2021-02-20 15:05:38', '', 0, '2021-02-19 03:01:12', '2021-02-19 03:01:12'),
(23, 28, '2021-02-19 16:00:19', '', 1, '2021-02-19 08:07:46', '2021-02-19 09:00:35'),
(24, 28, '2021-02-19 15:59:13', '', 0, '2021-02-19 08:07:46', '2021-02-19 08:57:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0022ef2637ea34c0c76cfc5bbfbe97415e5e4405cf0855220bfe5377db955799a719ffc144d78db8', 3, 3, 'ReminterBIT', '[]', 0, '2021-02-17 03:30:04', '2021-02-17 03:30:04', '2022-02-17 10:30:04'),
('140c62876a7767ba03f8e2d9a82cc7b3adffdda6c473f02e1257a79ca85bf98bd4f97a9ef73c52e1', 3, 3, 'ReminterBIT', '[]', 0, '2021-02-17 09:02:16', '2021-02-17 09:02:16', '2022-02-17 16:02:16'),
('1ed4ba5c81c59475afad2e72bbf0a605ce1d92d5675b594abe40e3bc14539ff729eeca863f29e2d0', 3, 3, 'ReminterBIT', '[]', 0, '2021-02-17 07:57:25', '2021-02-17 07:57:25', '2022-02-17 14:57:25'),
('20ac7ad714027a976c2fe0516b640c6b682382a8ca65372b0984a1c19119b23b22c5876835c75799', 1, 3, 'ReminderBIT', '[]', 0, '2021-02-16 01:43:27', '2021-02-16 01:43:27', '2022-02-16 08:43:27'),
('3e98f95e85c42b6be9bc6bdb48325bd117df149caf1b03d61e90e16ae03f49a316ad13a8ef3341b5', 3, 3, 'ReminterBIT', '[]', 0, '2021-02-16 07:45:43', '2021-02-16 07:45:43', '2022-02-16 14:45:43'),
('4a7713bbc79425b8a1ee6bbce23af0c4f478dc177e389192eba4c70d12ec3685a5258126f35c2acb', 3, 3, 'ReminterBIT', '[]', 0, '2021-02-16 07:51:39', '2021-02-16 07:51:39', '2022-02-16 14:51:39'),
('4d2d6478c92798865de1157062832cb7663936f7745ff508bc56ce0460163f5bf804da860bddecd1', 1, 3, 'ReminterBIT', '[]', 0, '2021-02-16 04:48:50', '2021-02-16 04:48:50', '2022-02-16 11:48:50'),
('5782b59aa7efbc2ca33ce0eb2ea96b2c5753d1c2df2e7a143aa438fe346689174595df1518b9415a', 3, 3, 'ReminterBIT', '[]', 0, '2021-02-16 07:54:10', '2021-02-16 07:54:10', '2022-02-16 14:54:10'),
('59ba7e772c6b4aa15a0321a19fc658e5a83a3d281f8acaca4ad11098fd71ecfb8bfcd798532fa553', 3, 3, 'ReminterBIT', '[]', 0, '2021-02-16 08:09:16', '2021-02-16 08:09:16', '2022-02-16 15:09:16'),
('6712651d279f670f3051211ad2373e4dd600adb1ee10bdb84dd12f58b8b84ffa5a3c12443a4bee07', 3, 3, 'ReminterBIT', '[]', 0, '2021-02-17 08:17:26', '2021-02-17 08:17:26', '2022-02-17 15:17:26'),
('695ac6f5bd478efcdbbcf245ea04efd33b1805e1db46badce7b8f4a48dc4fa0447a38a25714d95e4', 3, 3, 'ReminterBIT', '[]', 0, '2021-02-16 08:07:21', '2021-02-16 08:07:21', '2022-02-16 15:07:21'),
('740c019b49ddfc529133744bab531832db5bdb32859ae616a7fcfbc9ae8fa91fdd3f89a5ec732592', 3, 3, 'ReminterBIT', '[]', 0, '2021-02-16 07:56:19', '2021-02-16 07:56:19', '2022-02-16 14:56:19'),
('800dd564398c1674602f270576fb381d4a302f44ed14b16fc31100878920838be5cca70b8f21e924', 4, 3, 'ReminterBIT', '[]', 0, '2021-02-17 09:14:01', '2021-02-17 09:14:01', '2022-02-17 16:14:01'),
('8d297af5365e82bbf9d455c340245b014c24ffbca00317f89f17fdd778af4fddc21f6a5455d180c7', 3, 3, 'ReminterBIT', '[]', 0, '2021-02-17 08:12:25', '2021-02-17 08:12:25', '2022-02-17 15:12:25'),
('91e2bf24cd3e31d814711b735d728024ee9957d4e8becd143c25c215db6ea3db9adb24710054c32b', 3, 3, 'ReminterBIT', '[]', 0, '2021-02-16 07:46:12', '2021-02-16 07:46:12', '2022-02-16 14:46:12'),
('92579581bf3d7d1f743ee9d3d9e573bd7220d761b750549524a6bda3152135e6a596b65fdad9773e', 4, 3, 'ReminterBIT', '[]', 0, '2021-02-17 09:13:56', '2021-02-17 09:13:56', '2022-02-17 16:13:56'),
('9c130c05e54539b436aa14ad7657abe90405f179047a2a10d3392f261b65d7091056a5298b9f424a', 3, 3, 'ReminterBIT', '[]', 0, '2021-02-16 07:59:23', '2021-02-16 07:59:23', '2022-02-16 14:59:23'),
('a30ba1ee655dcb48854e8dfacff0747f5183a4e313a5a0a9204159b08d8887c8526fd75c20b49058', 3, 3, 'ReminterBIT', '[]', 0, '2021-02-17 03:30:03', '2021-02-17 03:30:03', '2022-02-17 10:30:03'),
('caecaba07f3a739c529c64c93126ddb1346839ed3d21080b4df09c6d2d9d6349783188890f9dfd42', 3, 3, 'ReminterBIT', '[]', 0, '2021-02-19 08:50:29', '2021-02-19 08:50:29', '2022-02-19 15:50:29'),
('d186338d936e5f8da79aeeea5b3ba38330f2dd5c6dd85fe7d42ef46bc4650281ce0e37750b419881', 3, 3, 'ReminterBIT', '[]', 0, '2021-02-19 08:50:31', '2021-02-19 08:50:31', '2022-02-19 15:50:31'),
('e563483e602efa3f27e5a2c3a6ac52eb1de3f44fc51558022a64bc54226abb34f7730a7a628a823e', 3, 3, 'ReminterBIT', '[]', 0, '2021-02-16 08:01:29', '2021-02-16 08:01:29', '2022-02-16 15:01:29'),
('ec37ed9c51f7d639deb0260019152242eb22fca0ab49bbf0bccd0750ab14f4ed56f76a307846110a', 4, 3, 'ReminterBIT', '[]', 0, '2021-02-17 09:09:28', '2021-02-17 09:09:28', '2022-02-17 16:09:28'),
('fc6ff42ee1ff8b54ee6a00eea214aaf1e6440dea43f431da4e60c73a9bef06d0270f27468ec9f803', 3, 3, 'ReminterBIT', '[]', 0, '2021-02-16 07:50:37', '2021-02-16 07:50:37', '2022-02-16 14:50:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'MitraPedagang Personal Access Client', 'trEbIdudMYMPHpQy7C9exjhvdKXiYbNs0XMBuVQZ', 'http://localhost', 1, 0, 0, '2021-02-16 01:42:44', '2021-02-16 01:42:44'),
(2, NULL, 'MitraPedagang Password Grant Client', 'CpVCCjmwst5yKRi64maiH5ncMml9GWBqxSIt9Sby', 'http://localhost', 0, 1, 0, '2021-02-16 01:42:44', '2021-02-16 01:42:44'),
(3, NULL, 'MitraPedagang Personal Access Client', 'blP2Buu5BUJOVO18h3ItGtyNwTzpZpcCsoSEtSXx', 'http://localhost', 1, 0, 0, '2021-02-16 01:43:05', '2021-02-16 01:43:05'),
(4, NULL, 'MitraPedagang Password Grant Client', 'BfBtC8TieHz88zO7r7HE5PcBtH4DKCtq4aMqld7h', 'http://localhost', 0, 1, 0, '2021-02-16 01:43:05', '2021-02-16 01:43:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-02-16 01:42:44', '2021-02-16 01:42:44'),
(2, 3, '2021-02-16 01:43:05', '2021-02-16 01:43:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_user_group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `nama_user_group`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', '2019-04-23 06:54:35', '2019-04-23 06:54:36'),
(2, 'HRD', '2019-11-14 02:55:39', '2019-11-14 02:55:39'),
(12, 'Analis', '2021-02-15 06:57:18', '2021-02-15 06:57:18'),
(16, 'Admin', '2021-02-15 06:57:18', '2021-02-15 06:57:18'),
(17, 'Programmer', '2021-02-15 06:57:18', '2021-02-15 06:57:18'),
(18, 'Other', '2021-02-15 06:57:18', '2021-02-15 06:57:18');

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
  `id_user_group` int(11) NOT NULL,
  `remember_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `id_user_group`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin_super@mail.com', NULL, '$2y$10$gVMY1AFt8ISlWpEVd/61eeyswACI73U8M31Eb.rlDDlJqiYYtZZwi', 1, NULL, '2021-01-25 14:15:23', '2021-01-25 14:15:23'),
(2, 'Leman', 'ardyn.sulaeman@gmail.com', NULL, '$2y$10$fRDAUZtocfbtBHVmU4eGjelg3yWe4ntqbPqqsPRXl0MAAdXuYYlyO', 12, NULL, '2021-02-16 04:51:51', '2021-02-16 04:53:31'),
(3, 'Naufal', 'naufaltechnology@gmail.com', NULL, '$2y$10$e/9UG93g/c6/atXWc5kZ5.X/a3jRV8dlzt/QX9TvycIsctHqYwb5y', 17, 'clEniJtiRv20hAci5rHm5m:APA91bHP9EHCgTahMRqMPPuxh8W0kgXH4wBb4Vr9qx-450-VtI6yQjqlZ-VFOsPH0HJmayac6VsLWqG9f6yTClhbIm77Dr2Als0Mc36c25BHZ9xtdmV-v1ZJfb5PzcVQtQJh2G3UU7HC', '2021-02-16 04:53:04', '2021-02-19 08:50:33'),
(4, 'Sulaeman', 'lemanfoetra@gmail.com', NULL, '$2y$10$vkWOf/QtaRGKK3M08bh.PO0l4K84vVqC.0x6i0xVFhxXm201QzQYe', 16, 'cUsNdxVDQsWxYSyRvhUJav:APA91bEL1n8GkoZoCV63cLgxU0n5_bVuH6XhNy9up-6StGb5OdpgCxQOGO05mEk3H1VUxYTwo8dVSCHe7XLPUm6px3UpvNCCjNcm42ODlTG24ODDTfeMxh87kmgPU03gaJJtsB27wvA8', '2021-02-17 09:05:42', '2021-02-17 09:14:03'),
(5, 'Nurul', '13.azizan@gmail.com', NULL, '$2y$10$1bKu9kkQbfBKdj8Isf3cceo4Czhv6oSHBNNwRsgDlcqzazwm2gbuG', 17, NULL, '2021-02-17 09:23:35', '2021-02-17 09:23:35');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `general_app`
--
ALTER TABLE `general_app`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `group_menus`
--
ALTER TABLE `group_menus`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `jenis_notification`
--
ALTER TABLE `jenis_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notification_involved`
--
ALTER TABLE `notification_involved`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notification_time`
--
ALTER TABLE `notification_time`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indeks untuk tabel `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`) USING BTREE;

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
-- AUTO_INCREMENT untuk tabel `general_app`
--
ALTER TABLE `general_app`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `group_menus`
--
ALTER TABLE `group_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `jenis_notification`
--
ALTER TABLE `jenis_notification`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `notification`
--
ALTER TABLE `notification`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `notification_involved`
--
ALTER TABLE `notification_involved`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `notification_time`
--
ALTER TABLE `notification_time`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2024 at 10:35 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mrg-pembelian`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_06_06_135636_create_roles_table', 1),
(6, '2024_06_06_135824_create_pembelians_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembelians`
--

CREATE TABLE `pembelians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) NOT NULL,
  `kd_pembelian` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `status_manager` int(11) NOT NULL,
  `date_manager` date DEFAULT NULL,
  `status_finance` int(11) NOT NULL,
  `bukti_beli` varchar(255) DEFAULT NULL,
  `date_finance` date DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembelians`
--

INSERT INTO `pembelians` (`id`, `userId`, `kd_pembelian`, `tanggal`, `nama_barang`, `nama_supplier`, `quantity`, `satuan`, `harga`, `status_manager`, `date_manager`, `status_finance`, `bukti_beli`, `date_finance`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 'pembelian1', '2024-06-08', 'Barang1', 'supplier1', 6, 'Pcs', 10000, 3, '2024-06-08', 1, NULL, NULL, 'fsafasfas', '2024-06-08 04:22:02', '2024-06-08 04:22:11'),
(2, 1, 'pembelian2', '2024-06-08', 'Barang2', 'supplier2', 5, 'Kg', 200000, 2, '2024-06-08', 3, NULL, '2024-06-08', 'hahahaha', '2024-06-08 04:27:04', '2024-06-08 04:57:42'),
(3, 1, 'pembelian3', '2024-06-08', 'barang3', 'supplier3', 4, 'Batang', 20000, 2, '2024-06-08', 2, 'bukti-image/3BlyC4RiXYM1QA3c2uNVU94BeAFajv2wKUYdahte.jpg', '2024-06-08', NULL, '2024-06-08 05:47:17', '2024-06-08 07:09:12'),
(4, 1, 'Pembelian4', '2024-06-08', 'Barang1', 'supplier1', 2, 'Batang', 1000, 2, '2024-06-08', 1, NULL, NULL, NULL, '2024-06-08 06:36:05', '2024-06-08 06:36:51'),
(5, 1, 'Pembelian5', '2024-06-08', 'Barang2', 'supplier2', 6, 'Batang', 20000, 1, NULL, 1, NULL, NULL, NULL, '2024-06-08 06:36:43', '2024-06-08 06:36:43');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2024-06-08 04:21:30', '2024-06-08 04:21:30'),
(2, 'Manajer', '2024-06-08 04:21:30', '2024-06-08 04:21:30'),
(3, 'Finance', '2024-06-08 04:21:30', '2024-06-08 04:21:30'),
(4, 'Office', '2024-06-08 04:21:30', '2024-06-08 04:21:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roleId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `roleId`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '$2y$10$T19Z4/DhRS1DOINXg4iZIu0gI8fQ9rjaM4csXw7ihEYqDameXT5oC', 1, '2024-06-08 04:21:30', '2024-06-08 04:21:30'),
(2, 'Manager', 'manager', '$2y$10$/tK8NMZ97J5vLuCXWfckNeamxxJbh3xsa7SxtxyYYookq2ny60HkW', 2, '2024-06-08 04:21:30', '2024-06-08 04:21:30'),
(3, 'Finance', 'finance', '$2y$10$fUDgoa2BOAL/JAROTqWuvu5hu6nsg03LyDcl4Sez37WhX4Kh7hKq.', 3, '2024-06-08 04:21:31', '2024-06-08 04:21:31'),
(4, 'Office', 'office', '$2y$10$1jlLtp9hZmOA04PFK7V9YuHkIk/CwmwM0mtOm45KQ9VMwlfYByehG', 4, '2024-06-08 04:21:31', '2024-06-08 04:21:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pembelians`
--
ALTER TABLE `pembelians`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pembelians_kd_pembelian_unique` (`kd_pembelian`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembelians`
--
ALTER TABLE `pembelians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

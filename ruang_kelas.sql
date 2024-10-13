-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 13, 2024 at 11:15 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ruang_kelas`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dosens`
--

CREATE TABLE `dosens` (
  `id_dosen` bigint UNSIGNED NOT NULL,
  `nama_dosen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` bigint UNSIGNED NOT NULL,
  `id_matkul` bigint UNSIGNED NOT NULL,
  `id_kelas` bigint UNSIGNED NOT NULL,
  `id_waktu` bigint UNSIGNED NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` bigint UNSIGNED NOT NULL,
  `nama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Available','Not Available') COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_fasilitas` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id_matkul` bigint UNSIGNED NOT NULL,
  `nama_matkul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_dosen` bigint UNSIGNED NOT NULL,
  `hari` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(21, '0001_01_01_000000_create_users_table', 1),
(22, '0001_01_01_000001_create_cache_table', 1),
(23, '0001_01_01_000002_create_jobs_table', 1),
(24, '2024_09_24_022006_create_personal_access_tokens_table', 1),
(25, '2024_09_24_022336_create_dosens_table', 1),
(26, '2024_09_24_022356_create_fasilitas_table', 1),
(27, '2024_09_24_022434_create_kelas_table', 1),
(28, '2024_09_24_022454_create_mata_kuliah_table', 1),
(29, '2024_09_24_022516_create_waktu_table', 1),
(30, '2024_09_24_022540_create_jadwal_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'auth_token', '9fd7ec2204a84d9f77b2fea3d8274722a655d2dddf89268ac3840b561d7de88e', '[\"*\"]', NULL, NULL, '2024-10-06 20:37:23', '2024-10-06 20:37:23'),
(2, 'App\\Models\\User', 1, 'auth_token', '85524ad7364bb02918625e27577640fc754871ffe39966b72b271c19f9d43098', '[\"*\"]', NULL, NULL, '2024-10-06 20:37:38', '2024-10-06 20:37:38'),
(3, 'App\\Models\\User', 1, 'auth_token', '31fe05be08af8928aba08e2891c4974b22c33e1f4d6a3ea2ab68f936249b611e', '[\"*\"]', NULL, NULL, '2024-10-06 21:11:50', '2024-10-06 21:11:50'),
(4, 'App\\Models\\User', 1, 'auth_token', '1449cfa10bb9944220eab7e2ea257f765ead3bcb3ac6c07d1641ee53848f3cbd', '[\"*\"]', NULL, NULL, '2024-10-07 05:00:25', '2024-10-07 05:00:25'),
(5, 'App\\Models\\User', 1, 'auth_token', 'e25a5c019604d8091ca26e26b742afed8d1b1852a7fddcd71b5b6523592a588c', '[\"*\"]', NULL, NULL, '2024-10-07 05:00:27', '2024-10-07 05:00:27'),
(6, 'App\\Models\\User', 1, 'auth_token', 'ddfaaac50267b9f473621a6d553e6af20ffa9ee0a8a837f015ae6f99fa940b82', '[\"*\"]', NULL, NULL, '2024-10-07 05:04:42', '2024-10-07 05:04:42'),
(7, 'App\\Models\\User', 1, 'auth_token', 'ca868fe49464c58b660c47bb44a99b95f964fd80afef4413579337f92709fcad', '[\"*\"]', NULL, NULL, '2024-10-07 05:06:14', '2024-10-07 05:06:14'),
(8, 'App\\Models\\User', 1, 'auth_token', 'cb1bc0d2df2ae18e007c97266ee2b5182c0c0af6930d5a08bee954b60690d2e7', '[\"*\"]', NULL, NULL, '2024-10-07 05:06:45', '2024-10-07 05:06:45'),
(9, 'App\\Models\\User', 1, 'auth_token', 'e3c9daec45d0cf68b7f34e66e52fd8919a0ab14a58cb85bccd2264b45d5e4fb0', '[\"*\"]', NULL, NULL, '2024-10-07 06:20:19', '2024-10-07 06:20:19'),
(10, 'App\\Models\\User', 1, 'auth_token', 'e9b5f896c399be960cc5299224019efeaf62282b5482a693cdbb6c16512e7a62', '[\"*\"]', NULL, NULL, '2024-10-07 18:36:50', '2024-10-07 18:36:50'),
(11, 'App\\Models\\User', 1, 'auth_token', 'abd9e2764f2855b9ae98e5ac81b1fe82df473307e3a8cfa7bd7e2d71366f7c46', '[\"*\"]', NULL, NULL, '2024-10-07 18:36:51', '2024-10-07 18:36:51'),
(12, 'App\\Models\\User', 1, 'auth_token', 'd6014272b504b778ebe2282edb02b319fbc68797722c8a87cd4f55088cafedb1', '[\"*\"]', NULL, NULL, '2024-10-07 18:36:52', '2024-10-07 18:36:52'),
(13, 'App\\Models\\User', 1, 'auth_token', '6289821242e1c6c9a11ac486297eb22fc221692fd731a25e2d615281b9643201', '[\"*\"]', NULL, NULL, '2024-10-07 18:38:26', '2024-10-07 18:38:26'),
(14, 'App\\Models\\User', 1, 'auth_token', 'f6d9342a9703d5dcc739e8410dd940fc21d3e890ccf9382e85bdd8aa73216c2b', '[\"*\"]', NULL, NULL, '2024-10-07 18:53:28', '2024-10-07 18:53:28'),
(15, 'App\\Models\\User', 1, 'auth_token', 'b076b9d26a5ed9cb556b525812ee3de46317e0a3c48234b51da513b08195a327', '[\"*\"]', NULL, NULL, '2024-10-07 19:07:03', '2024-10-07 19:07:03'),
(16, 'App\\Models\\User', 1, 'auth_token', '49ff479cc78f584cef2b1f973d911efd0e2522b7daadc1b543fab6ba4506002b', '[\"*\"]', NULL, NULL, '2024-10-07 19:24:53', '2024-10-07 19:24:53'),
(17, 'App\\Models\\User', 1, 'auth_token', 'ceec577fecbd3ceebc7754de03083c9b58015bbc1423565fe110b4d33b48cd33', '[\"*\"]', NULL, NULL, '2024-10-07 19:45:45', '2024-10-07 19:45:45'),
(18, 'App\\Models\\User', 1, 'auth_token', '1c914de70c71b385146834e4c61083fb01fd5f9bed3fb8bf10baf9ee6efd081b', '[\"*\"]', NULL, NULL, '2024-10-08 03:00:21', '2024-10-08 03:00:21'),
(19, 'App\\Models\\User', 1, 'auth_token', 'f649f1a66a21d1425fc7dcfe8b99fb17a9cbddabb36176f89ba3960457f328d2', '[\"*\"]', NULL, NULL, '2024-10-09 05:44:56', '2024-10-09 05:44:56'),
(20, 'App\\Models\\User', 1, 'auth_token', '37d7c9fbac50eca1db151f70f6eaed2253e9a8835452c98ecfa45b91e334895a', '[\"*\"]', NULL, NULL, '2024-10-09 05:44:59', '2024-10-09 05:44:59'),
(21, 'App\\Models\\User', 1, 'auth_token', '6734312285588654b13735d15ae755cec28156f9fd5769319b6221a4cf9e39c1', '[\"*\"]', NULL, NULL, '2024-10-09 09:13:02', '2024-10-09 09:13:02'),
(22, 'App\\Models\\User', 1, 'auth_token', 'e00eb8003919ec4067610368883c0ac46596a82d9c6e77d39b7207dfbd4f6b30', '[\"*\"]', NULL, NULL, '2024-10-09 09:13:06', '2024-10-09 09:13:06'),
(23, 'App\\Models\\User', 1, 'auth_token', '6b67ed6f60d24ff859e87fafe7529d73cc99e36930fa66640997491ef88a7034', '[\"*\"]', NULL, NULL, '2024-10-09 09:14:04', '2024-10-09 09:14:04'),
(24, 'App\\Models\\User', 1, 'auth_token', '11f7a6271356ce50b046d75241bd8e5e99bdeefab4c18557900e5f11f201c1b8', '[\"*\"]', NULL, NULL, '2024-10-09 09:14:25', '2024-10-09 09:14:25'),
(25, 'App\\Models\\User', 1, 'auth_token', 'bac44914269b44f6d7dd12d44f41d2025e322721c6e8e211c6abe6b1cbde50e6', '[\"*\"]', NULL, NULL, '2024-10-10 08:02:48', '2024-10-10 08:02:48'),
(26, 'App\\Models\\User', 1, 'auth_token', '6df2cead7f45e4b151dbfaed5fc3f39a3768e5ccbb21365c0fcd0398158d6a5c', '[\"*\"]', NULL, NULL, '2024-10-10 19:05:04', '2024-10-10 19:05:04'),
(27, 'App\\Models\\User', 1, 'auth_token', '67281749cb0bd66692789826224e821a6c5f1b7f2ec982d0d163ed2277824f27', '[\"*\"]', NULL, NULL, '2024-10-10 19:05:05', '2024-10-10 19:05:05'),
(28, 'App\\Models\\User', 1, 'auth_token', '98cbaad249e2988473e45990f9471659776d4b387afcc8e35362b3416fb05544', '[\"*\"]', NULL, NULL, '2024-10-13 04:13:01', '2024-10-13 04:13:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `role` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_induk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `nomor_induk`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', '3202216016', NULL, '$2y$12$o5ol8/hEoge1KbifdPkuF.IYWsfABEpYMUYQh6axjPMIzTSSzZrjC', NULL, '2024-10-06 20:37:13', '2024-10-06 20:37:13');

-- --------------------------------------------------------

--
-- Table structure for table `waktu`
--

CREATE TABLE `waktu` (
  `id_waktu` bigint UNSIGNED NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `dosens`
--
ALTER TABLE `dosens`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD UNIQUE KEY `jadwal_id_matkul_unique` (`id_matkul`),
  ADD UNIQUE KEY `jadwal_id_kelas_unique` (`id_kelas`),
  ADD UNIQUE KEY `jadwal_id_waktu_unique` (`id_waktu`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `kelas_id_fasilitas_foreign` (`id_fasilitas`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id_matkul`),
  ADD UNIQUE KEY `mata_kuliah_id_dosen_unique` (`id_dosen`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `waktu`
--
ALTER TABLE `waktu`
  ADD PRIMARY KEY (`id_waktu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosens`
--
ALTER TABLE `dosens`
  MODIFY `id_dosen` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  MODIFY `id_matkul` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `waktu`
--
ALTER TABLE `waktu`
  MODIFY `id_waktu` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `jadwal_id_matkul_foreign` FOREIGN KEY (`id_matkul`) REFERENCES `mata_kuliah` (`id_matkul`),
  ADD CONSTRAINT `jadwal_id_waktu_foreign` FOREIGN KEY (`id_waktu`) REFERENCES `waktu` (`id_waktu`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_id_fasilitas_foreign` FOREIGN KEY (`id_fasilitas`) REFERENCES `fasilitas` (`id_fasilitas`);

--
-- Constraints for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD CONSTRAINT `mata_kuliah_id_dosen_foreign` FOREIGN KEY (`id_dosen`) REFERENCES `dosens` (`id_dosen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

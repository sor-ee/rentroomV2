-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 14, 2025 at 07:12 AM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'ห้องเช่า', NULL, NULL),
(2, 'บ้านเช่า', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(114, '2014_10_12_000000_create_users_table', 1),
(115, '2014_10_12_100000_create_password_resets_table', 1),
(116, '2019_08_19_000000_create_failed_jobs_table', 1),
(117, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(118, '2023_04_20_132210_create_category_table', 1),
(119, '2023_04_20_132754_create_roomrent_table', 1),
(120, '2024_08_14_082403_create_setting_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roomrent`
--

CREATE TABLE `roomrent` (
  `id` int(10) UNSIGNED NOT NULL,
  `house_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanent_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fire_number` int(11) DEFAULT NULL,
  `water_number` int(11) DEFAULT NULL,
  `electricity_fee` double(8,2) DEFAULT NULL,
  `water_fee` double(8,2) DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_fee` double(50,2) NOT NULL,
  `waste_cost` double(50,2) NOT NULL,
  `old_fire_number` double(50,2) NOT NULL,
  `old_water_number` double(50,2) NOT NULL,
  `total` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roomrent`
--

INSERT INTO `roomrent` (`id`, `house_number`, `room_number`, `tanent_name`, `fire_number`, `water_number`, `electricity_fee`, `water_fee`, `category_id`, `date`, `room_fee`, `waste_cost`, `old_fire_number`, `old_water_number`, `total`, `created_at`, `updated_at`) VALUES
(1, '5 หมู่6', '1', NULL, 3433, 513, 0.00, 0.00, 1, 'จันทร์ 3 มีนาคม 2568', 1000.00, 10.00, 3433.00, 513.00, 1010.00, NULL, '2025-03-03 02:38:52'),
(2, '5 หมู่6', '2', NULL, 3288, 1057, 1340.00, 480.00, 1, 'จันทร์ 3 มีนาคม 2568', 1000.00, 10.00, 3288.00, 1057.00, 2830.00, NULL, '2025-03-03 01:07:59'),
(3, '5 หมู่6', '3', NULL, 8865, 377, 840.00, 240.00, 1, 'จันทร์ 3 มีนาคม 2568', 1000.00, 10.00, 8865.00, 377.00, 2090.00, NULL, '2025-03-03 01:08:27'),
(4, '5 หมู่6', '4', NULL, 5528, 288, 530.00, 30.00, 1, 'จันทร์ 3 มีนาคม 2568', 1000.00, 10.00, 5528.00, 288.00, 1570.00, NULL, '2025-03-03 01:08:51'),
(5, '5 หมู่6', 'บ้านสองชั้น', NULL, 8759, 2666, 1760.00, 390.00, 2, 'จันทร์ 3 มีนาคม 2568', 4000.00, 10.00, 8759.00, 2666.00, 6160.00, NULL, '2025-03-03 01:09:28'),
(6, '43/3', '2', 'บริษัท สมคิดเซอร์วิส1977 จำกัด', 2003, 493, 20.00, 0.00, 1, 'จันทร์ 3 มีนาคม 2568', 1300.00, 10.00, 2003.00, 493.00, 1330.00, NULL, '2025-03-03 02:23:49'),
(7, '43/3', '3', 'บริษัท สมคิดเซอร์วิส1977 จำกัด', 2109, 914, 250.00, 570.00, 1, 'จันทร์ 3 มีนาคม 2568', 1300.00, 10.00, 2109.00, 914.00, 2130.00, NULL, '2025-03-03 01:11:51'),
(8, '43/3', 'บ้านสองชั้น', 'บริษัท สมคิดเซอร์วิส1977 จำกัด', 7453, 1409, 2790.00, 690.00, 2, 'จันทร์ 3 มีนาคม 2568', 3500.00, 10.00, 7453.00, 1409.00, 6990.00, NULL, '2025-03-03 01:12:36'),
(9, '35 หมู่5', '1', NULL, 6742, 430, 530.00, 120.00, 1, 'จันทร์ 3 มีนาคม 2568', 1300.00, 10.00, 6742.00, 430.00, 1960.00, NULL, '2025-03-03 01:13:24'),
(10, '35 หมู่5', '2', NULL, 4858, 901, 320.00, 60.00, 1, 'จันทร์ 3 มีนาคม 2568', 1200.00, 10.00, 4858.00, 901.00, 1590.00, NULL, '2025-03-03 01:14:02'),
(11, '35 หมู่5', '3', 'บริษัท สมคิดเซอร์วิส1977 จำกัด', 8057, 539, 340.00, 180.00, 1, 'จันทร์ 3 มีนาคม 2568', 1500.00, 10.00, 8057.00, 539.00, 2030.00, NULL, '2025-03-03 01:14:46'),
(12, '35 หมู่5', '4', NULL, 2315, 1311, 1860.00, 390.00, 1, 'จันทร์ 3 มีนาคม 2568', 1500.00, 10.00, 2315.00, 1311.00, 3760.00, NULL, '2025-03-03 01:15:58'),
(13, '35 หมู่5', '5', 'บริษัท สมคิดเซอร์วิส1977 จำกัด', 2558, 594, 120.00, 90.00, 1, 'จันทร์ 3 มีนาคม 2568', 1500.00, 10.00, 2558.00, 594.00, 1720.00, NULL, '2025-03-03 01:16:29'),
(14, '35 หมู่5', '6', NULL, 4518, 21, 750.00, 60.00, 1, 'จันทร์ 3 มีนาคม 2568', 1000.00, 10.00, 4518.00, 21.00, 1820.00, NULL, '2025-03-03 01:17:42'),
(15, '35 หมู่5', '7', 'คมสันต์ สมมะลิ', 5425, 425, 270.00, 150.00, 1, 'จันทร์ 3 มีนาคม 2568', 1000.00, 10.00, 5425.00, 425.00, 1430.00, NULL, '2025-03-03 01:18:19'),
(16, '35 หมู่5', '8', NULL, 5922, 389, 40.00, 120.00, 1, 'จันทร์ 3 มีนาคม 2568', 2000.00, 10.00, 5922.00, 389.00, 2170.00, NULL, '2025-03-03 02:21:36'),
(17, '35 หมู่5', '9 (ร้านตัดผม)', NULL, 5695, 0, 3140.00, 0.00, 1, 'จันทร์ 3 มีนาคม 2568', 2000.00, 10.00, 5695.00, 0.00, 7150.00, NULL, '2025-03-13 21:40:55'),
(18, '35 หมู่5', '10 (ซีดี)', NULL, 6652, 1259, 1040.00, 300.00, 1, 'จันทร์ 3 มีนาคม 2568', 2000.00, 10.00, 6652.00, 1259.00, 3350.00, NULL, '2025-03-03 01:24:21');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(10) UNSIGNED NOT NULL,
  `electricity_price` double(8,2) DEFAULT NULL,
  `water_price` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `electricity_price`, `water_price`, `created_at`, `updated_at`) VALUES
(3, 10.00, 30.00, NULL, '2024-09-02 04:43:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roomrent`
--
ALTER TABLE `roomrent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roomrent_category_id_foreign` (`category_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roomrent`
--
ALTER TABLE `roomrent`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `roomrent`
--
ALTER TABLE `roomrent`
  ADD CONSTRAINT `roomrent_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2024 at 04:07 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo_ciesto`
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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_08_175550_create_tbl_user_table', 1),
(6, '2024_02_10_190556_create_shops_table', 1),
(7, '2024_02_10_190627_create_products_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `shop_id` bigint(20) UNSIGNED NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `stock`, `shop_id`, `video`, `created_at`, `updated_at`) VALUES
(13, 'iphone5', '12000.00', 5, 1, NULL, '2024-02-11 12:40:02', '2024-02-11 12:40:02'),
(14, 'iphone11', '120000.00', 10, 1, 'videos/1707655326_SampleVideo_1280x720_1mb (1).mp4', '2024-02-11 12:40:29', '2024-02-11 12:42:06'),
(15, 'iphone15', '90000.00', 15, 1, 'videos/1707655338_SampleVideo_1280x720_1mb (1).mp4', '2024-02-11 12:41:23', '2024-02-11 12:42:18'),
(16, 'iphone12', '120000.00', 10, 1, 'videos/1707655312_SampleVideo_1280x720_1mb (1).mp4', '2024-02-11 12:41:52', '2024-02-11 12:41:52');

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `name`, `image`, `address`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Shop 1', '1.jpg', 'Address 1', 'shop1@example.com', '2024-02-10 19:15:21', '2024-02-10 19:15:21'),
(2, 'Shop 2', '2.jpg', 'Address 2', 'shop2@example.com', '2024-02-10 19:15:22', '2024-02-10 19:15:22'),
(3, 'Shop 3', '3.jpg', 'Address 3', 'shop3@example.com', '2024-02-10 19:15:22', '2024-02-10 19:15:22'),
(4, 'Shop 4', '4.jpg', 'Address 4', 'shop4@example.com', '2024-02-10 19:15:22', '2024-02-10 19:15:22'),
(5, 'Shop 5', '5.jpg', 'Address 5', 'shop5@example.com', '2024-02-10 19:15:22', '2024-02-10 19:15:22'),
(6, 'Shop 6', '6.jpg', 'Address 6', 'shop6@example.com', '2024-02-10 19:15:22', '2024-02-10 19:15:22'),
(7, 'Shop 7', '7.jpg', 'Address 7', 'shop7@example.com', '2024-02-10 19:15:22', '2024-02-10 19:15:22'),
(8, 'Shop 8', '8.jpg', 'Address 8', 'shop8@example.com', '2024-02-10 19:15:22', '2024-02-10 19:15:22'),
(9, 'Shop 9', '9.jpg', 'Address 9', 'shop9@example.com', '2024-02-10 19:15:22', '2024-02-10 19:15:22'),
(10, 'Shop 10', '10.jpg', 'Address 10', 'shop10@example.com', '2024-02-10 19:15:22', '2024-02-10 19:15:22'),
(11, 'Shop 11', '11.jpg', 'Address 11', 'shop11@example.com', '2024-02-10 19:15:22', '2024-02-10 19:15:22'),
(12, 'Shop 12', '12.jpg', 'Address 12', 'shop12@example.com', '2024-02-10 19:15:22', '2024-02-10 19:15:22'),
(13, 'Shop 13', '13.jpg', 'Address 13', 'shop13@example.com', '2024-02-10 19:15:22', '2024-02-10 19:15:22'),
(14, 'Shop 14', '14.jpg', 'Address 14', 'shop14@example.com', '2024-02-10 19:15:23', '2024-02-10 19:15:23'),
(15, 'Shop 15', '15.jpg', 'Address 15', 'shop15@example.com', '2024-02-10 19:15:23', '2024-02-10 19:15:23'),
(16, 'Shop 16', '16.jpg', 'Address 16', 'shop16@example.com', '2024-02-10 19:15:23', '2024-02-10 19:15:23'),
(17, 'Shop 17', '17.jpg', 'Address 17', 'shop17@example.com', '2024-02-10 19:15:23', '2024-02-10 19:15:23'),
(18, 'Shop 18', '18.jpg', 'Address 18', 'shop18@example.com', '2024-02-10 19:15:23', '2024-02-10 19:15:23'),
(19, 'Shop 19', '19.jpg', 'Address 19', 'shop19@example.com', '2024-02-10 19:15:23', '2024-02-10 19:15:23'),
(20, 'Shop 20', '20.jpg', 'Address 20', 'shop20@example.com', '2024-02-10 19:15:23', '2024-02-10 19:15:23'),
(21, 'Shop 21', '21.jpg', 'Address 21', 'shop21@example.com', '2024-02-10 19:15:23', '2024-02-10 19:15:23'),
(22, 'Shop 22', '22.jpg', 'Address 22', 'shop22@example.com', '2024-02-10 19:15:23', '2024-02-10 19:15:23'),
(23, 'Shop 23', '23.jpg', 'Address 23', 'shop23@example.com', '2024-02-10 19:15:23', '2024-02-10 19:15:23'),
(24, 'Shop 24', '24.jpg', 'Address 24', 'shop24@example.com', '2024-02-10 19:15:23', '2024-02-10 19:15:23'),
(25, 'Shop 25', '25.jpg', 'Address 25', 'shop25@example.com', '2024-02-10 19:15:23', '2024-02-10 19:15:23'),
(26, 'Shop 26', '26.jpg', 'Address 26', 'shop26@example.com', '2024-02-10 19:15:23', '2024-02-10 19:15:23'),
(27, 'Shop 27', '27.jpg', 'Address 27', 'shop27@example.com', '2024-02-10 19:15:23', '2024-02-10 19:15:23'),
(28, 'Shop 28', '28.jpg', 'Address 28', 'shop28@example.com', '2024-02-10 19:15:24', '2024-02-10 19:15:24'),
(29, 'Shop 29', '29.jpg', 'Address 29', 'shop29@example.com', '2024-02-10 19:15:24', '2024-02-10 19:15:24'),
(30, 'Shop 30', '30.jpg', 'Address 30', 'shop30@example.com', '2024-02-10 19:15:24', '2024-02-10 19:15:24'),
(31, 'Shop 31', '31.jpg', 'Address 31', 'shop31@example.com', '2024-02-10 19:15:24', '2024-02-10 19:15:24'),
(32, 'Shop 32', '32.jpg', 'Address 32', 'shop32@example.com', '2024-02-10 19:15:24', '2024-02-10 19:15:24'),
(33, 'Shop 33', '33.jpg', 'Address 33', 'shop33@example.com', '2024-02-10 19:15:24', '2024-02-10 19:15:24'),
(34, 'Shop 34', '34.jpg', 'Address 34', 'shop34@example.com', '2024-02-10 19:15:24', '2024-02-10 19:15:24'),
(35, 'Shop 35', '35.jpg', 'Address 35', 'shop35@example.com', '2024-02-10 19:15:24', '2024-02-10 19:15:24'),
(36, 'Shop 36', '36.jpg', 'Address 36', 'shop36@example.com', '2024-02-10 19:15:24', '2024-02-10 19:15:24'),
(37, 'Shop 37', '37.jpg', 'Address 37', 'shop37@example.com', '2024-02-10 19:15:24', '2024-02-10 19:15:24'),
(38, 'Shop 38', '38.jpg', 'Address 38', 'shop38@example.com', '2024-02-10 19:15:24', '2024-02-10 19:15:24'),
(39, 'Shop 39', '39.jpg', 'Address 39', 'shop39@example.com', '2024-02-10 19:15:24', '2024-02-10 19:15:24'),
(40, 'Shop 40', '40.jpg', 'Address 40', 'shop40@example.com', '2024-02-10 19:15:24', '2024-02-10 19:15:24'),
(41, 'Shop 41', '41.jpg', 'Address 41', 'shop41@example.com', '2024-02-10 19:15:24', '2024-02-10 19:15:24'),
(42, 'Shop 42', '42.jpg', 'Address 42', 'shop42@example.com', '2024-02-10 19:15:24', '2024-02-10 19:15:24'),
(43, 'Shop 43', '43.jpg', 'Address 43', 'shop43@example.com', '2024-02-10 19:15:24', '2024-02-10 19:15:24'),
(44, 'Shop 44', '44.jpg', 'Address 44', 'shop44@example.com', '2024-02-10 19:15:25', '2024-02-10 19:15:25'),
(45, 'Shop 45', '45.jpg', 'Address 45', 'shop45@example.com', '2024-02-10 19:15:25', '2024-02-10 19:15:25'),
(46, 'Shop 46', '46.jpg', 'Address 46', 'shop46@example.com', '2024-02-10 19:15:25', '2024-02-10 19:15:25'),
(47, 'Shop 47', '47.jpg', 'Address 47', 'shop47@example.com', '2024-02-10 19:15:25', '2024-02-10 19:15:25'),
(48, 'Shop 48', '48.jpg', 'Address 48', 'shop48@example.com', '2024-02-10 19:15:25', '2024-02-10 19:15:25'),
(49, 'Shop 49', '49.jpg', 'Address 49', 'shop49@example.com', '2024-02-10 19:15:25', '2024-02-10 19:15:25'),
(50, 'Shop 50', '50.jpg', 'Address 50', 'shop50@example.com', '2024-02-10 19:15:25', '2024-02-10 19:15:25'),
(51, 'Shop 51', '51.jpg', 'Address 51', 'shop51@example.com', '2024-02-10 19:15:25', '2024-02-10 19:15:25'),
(52, 'Shop 52', '52.jpg', 'Address 52', 'shop52@example.com', '2024-02-10 19:15:25', '2024-02-10 19:15:25'),
(53, 'Shop 53', '53.jpg', 'Address 53', 'shop53@example.com', '2024-02-10 19:15:25', '2024-02-10 19:15:25'),
(54, 'Shop 54', '54.jpg', 'Address 54', 'shop54@example.com', '2024-02-10 19:15:25', '2024-02-10 19:15:25'),
(55, 'Shop 55', '55.jpg', 'Address 55', 'shop55@example.com', '2024-02-10 19:15:25', '2024-02-10 19:15:25'),
(56, 'Shop 56', '56.jpg', 'Address 56', 'shop56@example.com', '2024-02-10 19:15:25', '2024-02-10 19:15:25'),
(57, 'Shop 57', '57.jpg', 'Address 57', 'shop57@example.com', '2024-02-10 19:15:26', '2024-02-10 19:15:26'),
(58, 'Shop 58', '58.jpg', 'Address 58', 'shop58@example.com', '2024-02-10 19:15:26', '2024-02-10 19:15:26'),
(59, 'Shop 59', '59.jpg', 'Address 59', 'shop59@example.com', '2024-02-10 19:15:26', '2024-02-10 19:15:26'),
(60, 'Shop 60', '60.jpg', 'Address 60', 'shop60@example.com', '2024-02-10 19:15:26', '2024-02-10 19:15:26'),
(61, 'Shop 61', '61.jpg', 'Address 61', 'shop61@example.com', '2024-02-10 19:15:26', '2024-02-10 19:15:26'),
(62, 'Shop 62', '62.jpg', 'Address 62', 'shop62@example.com', '2024-02-10 19:15:26', '2024-02-10 19:15:26'),
(63, 'Shop 63', '63.jpg', 'Address 63', 'shop63@example.com', '2024-02-10 19:15:26', '2024-02-10 19:15:26'),
(64, 'Shop 64', '64.jpg', 'Address 64', 'shop64@example.com', '2024-02-10 19:15:26', '2024-02-10 19:15:26'),
(65, 'Shop 65', '65.jpg', 'Address 65', 'shop65@example.com', '2024-02-10 19:15:26', '2024-02-10 19:15:26'),
(66, 'Shop 66', '66.jpg', 'Address 66', 'shop66@example.com', '2024-02-10 19:15:26', '2024-02-10 19:15:26'),
(67, 'Shop 67', '67.jpg', 'Address 67', 'shop67@example.com', '2024-02-10 19:15:26', '2024-02-10 19:15:26'),
(68, 'Shop 68', '68.jpg', 'Address 68', 'shop68@example.com', '2024-02-10 19:15:26', '2024-02-10 19:15:26'),
(69, 'Shop 69', '69.jpg', 'Address 69', 'shop69@example.com', '2024-02-10 19:15:26', '2024-02-10 19:15:26'),
(70, 'Shop 70', '70.jpg', 'Address 70', 'shop70@example.com', '2024-02-10 19:15:26', '2024-02-10 19:15:26'),
(71, 'Shop 71', '71.jpg', 'Address 71', 'shop71@example.com', '2024-02-10 19:15:27', '2024-02-10 19:15:27'),
(72, 'Shop 72', '72.jpg', 'Address 72', 'shop72@example.com', '2024-02-10 19:15:27', '2024-02-10 19:15:27'),
(73, 'Shop 73', '73.jpg', 'Address 73', 'shop73@example.com', '2024-02-10 19:15:27', '2024-02-10 19:15:27'),
(74, 'Shop 74', '74.jpg', 'Address 74', 'shop74@example.com', '2024-02-10 19:15:27', '2024-02-10 19:15:27'),
(75, 'Shop 75', '75.jpg', 'Address 75', 'shop75@example.com', '2024-02-10 19:15:27', '2024-02-10 19:15:27'),
(76, 'Shop 76', '76.jpg', 'Address 76', 'shop76@example.com', '2024-02-10 19:15:27', '2024-02-10 19:15:27'),
(77, 'Shop 77', '77.jpg', 'Address 77', 'shop77@example.com', '2024-02-10 19:15:27', '2024-02-10 19:15:27'),
(78, 'Shop 78', '78.jpg', 'Address 78', 'shop78@example.com', '2024-02-10 19:15:27', '2024-02-10 19:15:27'),
(79, 'Shop 79', '79.jpg', 'Address 79', 'shop79@example.com', '2024-02-10 19:15:27', '2024-02-10 19:15:27'),
(80, 'Shop 80', '80.jpg', 'Address 80', 'shop80@example.com', '2024-02-10 19:15:27', '2024-02-10 19:15:27'),
(81, 'Shop 81', '81.jpg', 'Address 81', 'shop81@example.com', '2024-02-10 19:15:27', '2024-02-10 19:15:27'),
(82, 'Shop 82', '82.jpg', 'Address 82', 'shop82@example.com', '2024-02-10 19:15:27', '2024-02-10 19:15:27'),
(83, 'Shop 83', '83.jpg', 'Address 83', 'shop83@example.com', '2024-02-10 19:15:27', '2024-02-10 19:15:27'),
(84, 'Shop 84', '84.jpg', 'Address 84', 'shop84@example.com', '2024-02-10 19:15:27', '2024-02-10 19:15:27'),
(85, 'Shop 85', '85.jpg', 'Address 85', 'shop85@example.com', '2024-02-10 19:15:28', '2024-02-10 19:15:28'),
(86, 'Shop 86', '86.jpg', 'Address 86', 'shop86@example.com', '2024-02-10 19:15:28', '2024-02-10 19:15:28'),
(87, 'Shop 87', '87.jpg', 'Address 87', 'shop87@example.com', '2024-02-10 19:15:28', '2024-02-10 19:15:28'),
(88, 'Shop 88', '88.jpg', 'Address 88', 'shop88@example.com', '2024-02-10 19:15:28', '2024-02-10 19:15:28'),
(89, 'Shop 89', '89.jpg', 'Address 89', 'shop89@example.com', '2024-02-10 19:15:28', '2024-02-10 19:15:28'),
(90, 'Shop 90', '90.jpg', 'Address 90', 'shop90@example.com', '2024-02-10 19:15:28', '2024-02-10 19:15:28'),
(91, 'Shop 91', '91.jpg', 'Address 91', 'shop91@example.com', '2024-02-10 19:15:28', '2024-02-10 19:15:28'),
(92, 'Shop 92', '92.jpg', 'Address 92', 'shop92@example.com', '2024-02-10 19:15:28', '2024-02-10 19:15:28'),
(93, 'Shop 93', '93.jpg', 'Address 93', 'shop93@example.com', '2024-02-10 19:15:28', '2024-02-10 19:15:28'),
(94, 'Shop 94', '94.jpg', 'Address 94', 'shop94@example.com', '2024-02-10 19:15:28', '2024-02-10 19:15:28'),
(95, 'Shop 95', '95.jpg', 'Address 95', 'shop95@example.com', '2024-02-10 19:15:28', '2024-02-10 19:15:28'),
(96, 'Shop 96', '96.jpg', 'Address 96', 'shop96@example.com', '2024-02-10 19:15:28', '2024-02-10 19:15:28'),
(97, 'Shop 97', '97.jpg', 'Address 97', 'shop97@example.com', '2024-02-10 19:15:28', '2024-02-10 19:15:28'),
(98, 'Shop 98', '98.jpg', 'Address 98', 'shop98@example.com', '2024-02-10 19:15:28', '2024-02-10 19:15:28'),
(99, 'Shop 99', '99.jpg', 'Address 99', 'shop99@example.com', '2024-02-10 19:15:28', '2024-02-10 19:15:28'),
(100, 'Shop 100', 'images/1707603344_Collage internship vivek_page-0001.jpg', 'Address 100', 'shop100@example.com', '2024-02-10 19:15:28', '2024-02-10 22:15:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$2SuchbriDNajm4JYtoGYWeVDl1EdrGWluOVBPvcj9y5VdlF8nWL8u', NULL, '2024-02-10 20:09:52', '2024-02-10 20:09:52');

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_shop_id_foreign` (`shop_id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shops_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2024 at 06:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `littlesmartdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jobs`
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
-- Table structure for table `job_batches`
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
(13, '0001_01_01_000000_create_users_table', 1),
(14, '0001_01_01_000001_create_cache_table', 1),
(15, '0001_01_01_000002_create_jobs_table', 1),
(16, '2024_07_12_125725_edit_users_table', 1),
(17, '2024_07_12_130942_create_scores_table', 1),
(18, '2024_07_30_163147_create_posts_table', 1);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postid` int(10) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `image` text DEFAULT NULL,
  `createdtime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postid`, `userid`, `title`, `description`, `image`, `createdtime`) VALUES
(1, 100000, 'Omnis voluptatem qui earum.', 'Corrupti sed enim aut nihil consequatur odit. Soluta alias minima qui quia nobis. Incidunt rerum placeat facilis ut alias laborum. Quibusdam qui quis autem temporibus atque enim optio.', '66a90d7f6f0ca.jpg', '2019-08-30 01:44:23'),
(2, 100000, 'Et autem enim ducimus et.', 'Tempora iste ut nihil. Officia voluptatem et perspiciatis.', '66a90d83baf54.jpg', '2020-04-06 05:10:47'),
(3, 100000, 'Ipsum vitae aut dicta incidunt aut.', 'Et autem inventore quis et exercitationem iure. Aut est molestias tenetur officia expedita. Beatae eius dignissimos ut asperiores totam consequatur sunt.', '66a90d8649a1d.jpg', '2020-08-15 14:01:24'),
(4, 100000, 'Ea sunt animi at atque iusto molestiae harum.', 'Magni est quisquam a aliquid quisquam eaque quaerat praesentium. At sint aut molestias ipsum quod vel velit. Necessitatibus et recusandae doloremque molestiae. Numquam non quia deleniti consequatur aut.', '66a90d882a933.jpg', '2021-06-30 17:47:57'),
(5, 100000, 'Sed sit eos qui aliquam iusto nihil.', 'Totam adipisci nobis qui velit assumenda. Eos quod totam consequatur id earum. Nostrum alias accusantium vero hic officia deserunt. Ut odit aut tempore veniam molestiae qui repudiandae.', '66a90d8b4137c.jpg', '2019-04-08 01:06:12'),
(6, 100000, 'Excepturi laboriosam ex quaerat rerum quia.', 'Quidem reiciendis sit et eos. Aliquid aut et rerum itaque sit. Sint aut molestiae facilis mollitia qui qui dolores.', '66a90d8d2c99d.jpg', '2023-12-21 00:03:44');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `scoreid` int(10) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `mandarin` int(11) NOT NULL,
  `english` int(11) NOT NULL,
  `malay` int(11) NOT NULL,
  `math` int(11) NOT NULL,
  `science` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`scoreid`, `userid`, `mandarin`, `english`, `malay`, `math`, `science`) VALUES
(1, 846562, 60, 85, 39, 42, 81),
(2, 369183, 7, 26, 55, 18, 23),
(3, 767120, 69, 1, 28, 57, 37),
(4, 713198, 29, 44, 64, 11, 99),
(5, 319409, 64, 82, 69, 98, 39);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('BTrXbNCISgBnEWRqNam75oWwt6OGKUYUHJVQYoeB', 100000, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUUU4M3JReDBrbk5ZUGllYlQ3VFB3WDRtNzRRSkZIUzNZTUdJMWNZVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEwMDAwMDtzOjE2OiJsYXN0QWN0aXZpdHlUaW1lIjtpOjE3MjIzNTUzMjE7fQ==', 1722355321);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `telno` varchar(16) NOT NULL,
  `school` varchar(255) DEFAULT NULL,
  `standard` int(11) DEFAULT NULL,
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

INSERT INTO `users` (`id`, `username`, `name`, `role`, `age`, `telno`, `school`, `standard`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(100000, 'admin', 'Admin', 'teacher', 99, '012-3456789', 'SJK(C) Bukit Serdang', 5, 'admin@gmail.com', '2024-07-30 15:57:51', '$2y$12$qS00bv.BodLRywod5OtnWO2fTKkrvWK8cyKXD9w6uaiQwW33pgCbW', 'tJ0fgm8zKl', '2024-07-30 15:57:51', '2024-07-30 15:57:51'),
(319409, 'stiedemann.delfina', 'Regan Kris Jr.', 'student', 7, '014-7764252', 'SJK(C) Bukit Serdang', 1, 'janie.greenfelder@example.org', '2024-07-30 15:57:51', '$2y$12$awf14aX7IsQVbORJidWKk.ZO4meTOor.AdpywipdKq/kzAnV.NPxe', 'c3wjT9yBfu', '2024-07-30 15:57:51', '2024-07-30 15:57:51'),
(369183, 'zane.bosco', 'Narciso Orn', 'student', 9, '016-9922063', 'SJK(C) Bukit Serdang', 3, 'aterry@example.net', '2024-07-30 15:57:51', '$2y$12$awf14aX7IsQVbORJidWKk.ZO4meTOor.AdpywipdKq/kzAnV.NPxe', 'YwE9ONybxQ', '2024-07-30 15:57:51', '2024-07-30 15:57:51'),
(713198, 'barton.olin', 'Mr. Jabari Frami PhD', 'student', 12, '016-5623932', 'SJK(C) Bukit Serdang', 6, 'gleichner.madisen@example.com', '2024-07-30 15:57:51', '$2y$12$awf14aX7IsQVbORJidWKk.ZO4meTOor.AdpywipdKq/kzAnV.NPxe', 'iP6PTJc38D', '2024-07-30 15:57:51', '2024-07-30 15:57:51'),
(767120, 'vroob', 'Alia Orn III', 'student', 9, '014-8018136', 'SJK(C) Bukit Serdang', 3, 'xmorar@example.com', '2024-07-30 15:57:51', '$2y$12$awf14aX7IsQVbORJidWKk.ZO4meTOor.AdpywipdKq/kzAnV.NPxe', 'WoA7DhDRP9', '2024-07-30 15:57:51', '2024-07-30 15:57:51'),
(846562, 'mills.modesta', 'Deshawn Nikolaus Sr.', 'student', 10, '010-9070844', 'SJK(C) Bukit Serdang', 4, 'alockman@example.com', '2024-07-30 15:57:51', '$2y$12$awf14aX7IsQVbORJidWKk.ZO4meTOor.AdpywipdKq/kzAnV.NPxe', 'FMazfz9BfR', '2024-07-30 15:57:51', '2024-07-30 15:57:51');

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postid`),
  ADD KEY `posts_userid_foreign` (`userid`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`scoreid`),
  ADD KEY `scores_userid_foreign` (`userid`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `scoreid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

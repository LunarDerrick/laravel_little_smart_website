-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2024 at 08:36 PM
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
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `msgid` int(10) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `createdtime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`msgid`, `userid`, `title`, `description`, `is_read`, `createdtime`) VALUES
(1, 654810, 'Vitae ut et qui voluptatem nam.', 'Voluptatem maiores quisquam iste in nisi enim ut. Iste nostrum soluta vel dolorem quia facilis maiores. Ad ut sunt minus molestiae. Eius laboriosam magnam at omnis pariatur.', 0, '2020-06-08 23:11:50'),
(2, 624611, 'Sunt voluptas dolore cumque consequuntur non repellendus qui.', 'Iusto blanditiis qui laudantium quisquam temporibus maxime temporibus. Qui ea quas cum qui velit quia et. Deserunt eum debitis culpa eum delectus.', 0, '2019-06-02 10:23:21'),
(3, NULL, 'Assumenda autem illo et.', 'Consectetur ea sunt est sunt. Dolor sequi explicabo quisquam nulla possimus placeat. Qui tempore et eveniet.', 0, '2023-06-07 11:33:55'),
(4, 571047, 'Quia recusandae ipsum voluptatem et sit consequatur dolorem sit.', 'Adipisci voluptatem alias vero ratione sunt harum quisquam. Debitis fugiat possimus consequatur expedita. Et voluptatibus ut nihil aut minus placeat tempore. Cupiditate sint id rem non.', 0, '2022-09-12 11:14:45'),
(5, NULL, 'Ab suscipit possimus eligendi ipsum eveniet culpa.', 'Est reiciendis magnam tenetur doloribus error voluptatem autem. Beatae ea sed rerum hic. Sed voluptatem vel explicabo. Suscipit excepturi error dolor suscipit reiciendis. Consequatur accusantium totam suscipit distinctio repudiandae aliquam.', 0, '2022-12-21 14:34:57'),
(6, NULL, 'Vel ut veritatis consequatur vitae ipsum.', 'Voluptatem totam sed eius quia optio laboriosam. Culpa porro similique culpa magnam fugiat. Dolore eveniet aut quo voluptatum.', 0, '2022-03-12 11:47:32'),
(7, 654810, 'Sapiente delectus itaque explicabo qui unde autem.', 'Expedita eum doloremque magnam. Qui fugit animi dolor qui dolor.', 0, '2021-12-08 23:50:05'),
(8, 654810, 'Pariatur totam illum et.', 'Magnam quae laborum at voluptatem rerum quas officia. Et voluptatum omnis porro perspiciatis in. Itaque quis nihil quis exercitationem illum.', 0, '2023-12-02 05:51:12'),
(9, NULL, 'Maxime ad qui nemo et eum blanditiis.', 'Enim doloribus officiis dicta. Quia magni aperiam corporis quibusdam doloribus fugit corrupti. Odit eveniet possimus quibusdam harum. Vel et rem incidunt molestiae.', 0, '2023-01-16 17:41:38'),
(10, 571047, 'Ut fugit ea earum vel hic accusantium velit.', 'Aliquam harum aliquid corporis aperiam non voluptatem officiis cumque. Expedita minus quo neque. Aliquam qui expedita nesciunt qui quibusdam voluptatem.', 0, '2020-06-15 06:45:26'),
(11, 654810, 'Nostrum dicta nesciunt ipsam suscipit cum rerum voluptatibus impedit.', 'Ea dolorem et commodi voluptas. Quas quod non cupiditate ipsa ut itaque. Sequi itaque deserunt culpa iure. Nostrum numquam minus sed cupiditate rem et nemo.', 0, '2022-08-23 22:35:26'),
(12, NULL, 'Omnis nostrum sequi esse.', 'Aspernatur qui deserunt doloribus sed. Consectetur itaque eum aspernatur. Modi itaque eaque hic eos eos nihil natus. Quidem in quod quis voluptatem et et sint.', 0, '2019-11-07 07:29:21'),
(13, NULL, 'Ad excepturi earum mollitia sed ratione repudiandae id.', 'Quis dolor distinctio temporibus ex tempore eos minima beatae. Dolores eos nemo sed voluptatem praesentium distinctio.', 0, '2022-03-08 16:33:26'),
(14, 100000, 'Repudiandae beatae vitae molestiae sit dolores.', 'Voluptatem et magni nihil explicabo. Magnam enim sequi magnam in. Magnam qui ad consequuntur.', 0, '2024-05-03 14:19:54'),
(15, 919342, 'Est est commodi doloribus dolores esse.', 'Voluptatem consequatur dicta neque qui qui. Veniam facilis ipsa magni fugit sint excepturi.', 0, '2024-05-15 18:01:55'),
(16, 971753, 'Vel aliquam nisi expedita ut possimus architecto.', 'Incidunt incidunt tempora quod et aliquid. Rerum eum ut omnis nesciunt hic minima omnis. Ab ut rerum repellat perspiciatis voluptatem qui.', 0, '2019-07-28 06:29:29'),
(17, 100000, 'Minima ut ex sunt necessitatibus id officiis.', 'Ut incidunt qui eligendi laudantium nostrum. Cumque explicabo facere sint repudiandae. Officia et alias est porro. Quis optio quis maxime libero cupiditate enim repudiandae iste.', 0, '2022-08-11 16:35:24'),
(18, 100000, 'Saepe fuga fuga non voluptas et.', 'Sed repudiandae unde nihil eos impedit minima ut. Omnis amet veniam sed minus. Officia est et ullam distinctio sed. Numquam ut debitis rerum in maxime consequuntur excepturi. Molestias deleniti iusto rerum modi voluptates alias.', 0, '2021-12-27 16:02:29'),
(19, NULL, 'Et amet et sint.', 'Laborum sit ullam voluptatibus vel autem excepturi voluptas. Nihil quibusdam molestias at esse consequatur autem at. Qui voluptatem odio quia quam modi.', 0, '2020-12-18 12:55:20'),
(20, 654810, 'Tempore omnis et neque facilis.', 'Dolore eveniet unde magnam est. Delectus id error assumenda ut suscipit. Dolor distinctio quis rerum. Aut non quis quia veritatis ea.', 0, '2022-11-23 04:00:56'),
(21, 654810, 'Dolor aut dolorum nobis omnis perferendis qui similique doloremque.', 'Voluptatem aliquam quibusdam aut officia rerum inventore saepe. Aut et quos et veniam esse est rerum. Quisquam esse omnis tempore incidunt consectetur laboriosam atque. Et facere placeat hic nobis nisi.', 0, '2024-06-16 22:20:08');

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
(239, '0001_01_01_000000_create_users_table', 1),
(240, '0001_01_01_000001_create_cache_table', 1),
(241, '0001_01_01_000002_create_jobs_table', 1),
(242, '2024_07_12_125725_edit_users_table', 1),
(243, '2024_07_12_130942_create_scores_table', 1),
(244, '2024_07_30_163147_create_posts_table', 1),
(245, '2024_08_01_235052_create_feedbacks_table', 1);

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
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`images`)),
  `createdtime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postid`, `userid`, `title`, `description`, `images`, `createdtime`) VALUES
(1, 100000, 'Et atque quia quae et et.', 'Tempore ut autem atque. Sed veniam incidunt inventore consectetur voluptate sed.', '[\"66d5eb7d97808.jpg\"]', '2021-01-22 07:36:06'),
(2, 100000, 'Tenetur eligendi et dolores dicta dolor.', 'Dolores sed sequi sunt amet. Ut sint eligendi qui et. Doloremque inventore ab laborum et consequatur quasi accusamus est. Error nesciunt qui odit ut nobis sunt nesciunt.', '[\"66d5eb8123e96.jpg\"]', '2024-05-14 22:35:53'),
(3, 100000, 'Laborum dolore cupiditate vel.', 'Rem iure doloremque occaecati. Error ipsum corporis voluptatibus dolorem aut neque. Tenetur magnam aut totam autem voluptatibus.', '[\"66d5eb832d5df.jpg\"]', '2022-11-14 10:20:15'),
(4, 100000, 'Itaque autem fuga deleniti.', 'Incidunt odit dignissimos aperiam quia officia et quis. Praesentium quos sit explicabo quo. Amet vel molestias ut fuga eligendi quis.', '[\"66d5eb84e1b34.jpg\"]', '2022-06-22 20:09:31'),
(5, 100000, 'Dicta ducimus beatae dolorem eaque dolores omnis officiis.', 'Incidunt temporibus neque et reiciendis. Distinctio quia at sunt voluptates ea cupiditate eaque. Voluptas quia odit voluptatum sit dolorum doloribus et. Recusandae consectetur delectus eius rerum sed dolorum voluptatem.', '[\"66d5eb86d3b04.jpg\"]', '2021-03-30 07:51:17'),
(6, 100000, 'Quas omnis autem similique.', 'Et incidunt aliquam ea et iure amet. Quisquam nostrum nemo sapiente delectus et. Laboriosam numquam omnis sed quasi non et itaque.', '[\"66d5eb8936ccc.jpg\"]', '2021-06-08 15:29:16');

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
(1, 971753, 75, 28, 65, 88, 8),
(2, 571047, 69, 54, 19, 80, 37),
(3, 624611, 84, 16, 83, 30, 55),
(4, 654810, 57, 42, 18, 46, 95),
(5, 919342, 49, 95, 42, 80, 81);

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
  `last_activity` int(11) NOT NULL,
  `is_first` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(100000, 'admin', 'Admin', 'teacher', 99, '012-3456789', 'SJK(C) Bukit Serdang', 5, 'admin@gmail.com', '2024-09-02 16:44:45', '$2y$12$xLcn21PtYjb4Cvv18wTu2efdYhTEMZMdly8Y.wYpUGlU/godPOvhe', 'zCM26rHGDzN4kQfVGr05jknBb2vfs3czTEkCzYFhDkwn3tSnR8Pe0C1AyAQv', '2024-09-02 16:44:45', '2024-09-02 16:44:45'),
(571047, 'marty26', 'Jovani Bergnaum', 'student', 9, '018-7720824', 'SJK(C) Bukit Serdang', 3, 'eoreilly@example.org', '2024-09-02 16:44:45', '$2y$12$Qe9EA.hsh1kUT.mYgjQW9.sYlCuGefg8N6Innuib5/lejdeCutrMO', 'rdskYQ0nyt', '2024-09-02 16:44:45', '2024-09-02 16:44:45'),
(624611, 'julie.schaden', 'Neha Pfannerstill', 'student', 10, '014-8139488', 'SJK(C) Bukit Serdang', 4, 'melissa.abbott@example.net', '2024-09-02 16:44:45', '$2y$12$Qe9EA.hsh1kUT.mYgjQW9.sYlCuGefg8N6Innuib5/lejdeCutrMO', 'FpLbo03oRJ', '2024-09-02 16:44:45', '2024-09-02 16:44:45'),
(654810, 'ruthie.bayer', 'Jaclyn Cole', 'student', 9, '018-9773836', 'SJK(C) Bukit Serdang', 3, 'abbigail.ruecker@example.net', '2024-09-02 16:44:45', '$2y$12$Qe9EA.hsh1kUT.mYgjQW9.sYlCuGefg8N6Innuib5/lejdeCutrMO', 'VyPLPyMpy4', '2024-09-02 16:44:45', '2024-09-02 16:44:45'),
(919342, 'joaquin.wolf', 'Houston Reichert', 'student', 8, '017-1296066', 'SJK(C) Bukit Serdang', 2, 'harris.annie@example.org', '2024-09-02 16:44:45', '$2y$12$Qe9EA.hsh1kUT.mYgjQW9.sYlCuGefg8N6Innuib5/lejdeCutrMO', 'eQNhGtD2nw', '2024-09-02 16:44:45', '2024-09-02 16:44:45'),
(971753, 'ozboncak', 'Prof. Marcia Cronin IV', 'student', 11, '012-6864422', 'SJK(C) Bukit Serdang', 5, 'caufderhar@example.org', '2024-09-02 16:44:45', '$2y$12$Qe9EA.hsh1kUT.mYgjQW9.sYlCuGefg8N6Innuib5/lejdeCutrMO', '8n6DtJG3l3', '2024-09-02 16:44:45', '2024-09-02 16:44:45');

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
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`msgid`),
  ADD KEY `feedbacks_userid_foreign` (`userid`);

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
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `msgid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

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
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE SET NULL;

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

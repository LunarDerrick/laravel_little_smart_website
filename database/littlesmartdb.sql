-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2024 at 03:57 PM
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
(1, 123671, 'Doloremque alias voluptatum voluptas.', 'Quas ipsum harum sit quod fugiat. Eius quia ad ut. Deserunt id iste qui. Tempora nulla maxime beatae dolores ut tempore.', 0, '2020-12-21 17:53:25'),
(2, NULL, 'Consequatur qui officiis dolorum.', 'Dolores libero quaerat qui omnis molestias nobis. Velit quia sed blanditiis qui. Sed ut rerum quia beatae harum repellendus dicta eum. Beatae dolorum vero sit a rerum.', 0, '2023-09-24 00:29:02'),
(3, NULL, 'Non quae nostrum autem velit occaecati quam eum eum.', 'Voluptates ut alias laborum. Nesciunt tenetur id eum sapiente. Eum accusamus aliquid molestias tenetur rem minima.', 0, '2019-05-04 18:52:54'),
(4, 559592, 'Dolorem qui adipisci est quis quasi ducimus.', 'Amet sit laborum quasi reiciendis distinctio sunt beatae. Ut voluptatum dicta ea ipsa molestiae. Quidem debitis ut corporis eos voluptates quis officia.', 0, '2023-04-12 08:26:36'),
(5, 123671, 'Fugit quo voluptatem voluptas ipsam et deserunt molestias.', 'Eligendi et nisi qui. Sit at non aut. Sit dicta sint aliquid omnis quia asperiores est.', 0, '2020-08-27 00:45:32'),
(6, 100000, 'Sed ipsam non amet unde in est eligendi.', 'Et nam dicta quis quia. Dolor sit perspiciatis asperiores qui. Voluptatem maiores ipsum dolorum iure. Earum qui corrupti mollitia aut. Voluptatem ipsum aut quod optio quam.', 0, '2022-11-21 02:57:11'),
(7, 558123, 'Vel dolorum atque aut non qui facere dolorem ut.', 'Est dolor eius sapiente quia et. Exercitationem harum aut vel eos. Ut inventore voluptatem velit quidem odio.', 0, '2019-05-05 13:41:44'),
(8, 558123, 'Voluptate temporibus veniam voluptatem vitae.', 'Vel ea officiis et commodi. Velit eum autem corrupti quod sunt id sequi necessitatibus. Nam porro harum omnis. Aut et et dolorem quod veritatis.', 0, '2023-05-21 10:09:12'),
(9, 123671, 'Molestias repellendus autem natus eveniet velit.', 'Quia magnam recusandae ut a. Saepe facere aliquid vel ducimus. Nisi nobis qui illo repudiandae qui impedit ut.', 0, '2019-06-18 18:28:19'),
(10, 559592, 'Laborum est quis natus vel.', 'Sunt quia nisi assumenda voluptas quasi quaerat nesciunt. Est ea aliquid qui qui. Rem velit neque quia perferendis quis natus aut. Velit hic nam quia quidem cumque est.', 0, '2020-11-30 23:44:22'),
(11, 559592, 'Quae hic qui et ipsa voluptatem optio sunt.', 'Excepturi quaerat laborum sed repudiandae quia rem. Quae incidunt beatae quo illum doloribus alias. Cum temporibus et totam saepe veritatis et est. Autem similique molestias cumque eum eligendi rem non ipsam.', 0, '2024-08-10 10:44:59'),
(12, 681092, 'Similique rerum non aut debitis cum sint sequi itaque.', 'Rem provident illum ratione nulla beatae consequatur. Est quas modi sed et minus dignissimos.', 0, '2021-07-01 15:08:12'),
(13, 123671, 'Aut impedit doloribus quod ut.', 'Rem necessitatibus quod magni voluptas autem consequatur nam. Saepe enim est id veniam minus. Non sit et voluptatem eos molestiae doloribus. Aspernatur autem sit deleniti optio et aliquam.', 0, '2021-02-09 09:21:59'),
(14, 333595, 'Sunt rerum error voluptatem molestiae nisi assumenda.', 'Eum nostrum architecto repellat ea perferendis atque nemo. Accusantium odio laudantium fugiat sit accusantium aut. Modi in amet sapiente.', 0, '2019-03-02 14:12:42'),
(15, 123671, 'Aut asperiores sed aut ratione ducimus et omnis.', 'Culpa consectetur quod placeat iste quo tenetur doloribus. Dolorem corrupti molestiae et sit aut est qui. Commodi id dolor nam quia. Porro in dolore eos exercitationem quod optio exercitationem.', 0, '2020-01-22 22:03:49'),
(16, 333595, 'Placeat qui nihil ullam rem libero.', 'Cum error porro velit atque perspiciatis architecto enim. Iusto quia mollitia aut necessitatibus. Quae et inventore impedit dolores. Officiis dolorem quis facilis. Dolorem officia explicabo sit ad fuga.', 0, '2023-07-29 08:29:49'),
(17, NULL, 'Sit et placeat soluta distinctio placeat eum suscipit.', 'Repudiandae qui alias consequatur consequatur sed. Necessitatibus accusamus aut odio voluptatem pariatur atque voluptatibus. Illo itaque aut possimus alias.', 0, '2024-06-20 07:45:58'),
(18, 123671, 'Quos ut ut sunt et.', 'Hic sed placeat quia. Voluptatem eius est ratione pariatur iste. Nisi maiores illum sint molestias dolor iste. Eum voluptatem corporis aliquam inventore ab temporibus nostrum.', 0, '2023-09-03 04:19:15'),
(19, NULL, 'Animi saepe quia excepturi autem reiciendis ut et.', 'Praesentium deserunt pariatur quisquam delectus alias asperiores vel ea. Aperiam veritatis neque qui voluptatem deserunt quis quod qui. Nisi ut vero qui est vitae. Cumque fuga labore necessitatibus voluptatum.', 0, '2023-01-18 14:13:29'),
(20, 681092, 'Quis veniam dolor consequuntur non.', 'Voluptate repellat id necessitatibus neque mollitia consequuntur quo labore. Sit minima officiis et in non repudiandae. Illo omnis quia ut reprehenderit. Excepturi nisi quisquam assumenda aliquid.', 0, '2023-06-11 12:11:32'),
(21, 558123, 'Et aut id molestiae aut officiis maiores et qui.', 'Quibusdam sed veritatis architecto aut. Tenetur molestiae similique qui nihil quia. Veniam omnis laborum quibusdam.', 0, '2023-06-25 04:54:17');

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
(218, '0001_01_01_000000_create_users_table', 1),
(219, '0001_01_01_000001_create_cache_table', 1),
(220, '0001_01_01_000002_create_jobs_table', 1),
(221, '2024_07_12_125725_edit_users_table', 1),
(222, '2024_07_12_130942_create_scores_table', 1),
(223, '2024_07_30_163147_create_posts_table', 1),
(224, '2024_08_01_235052_create_feedbacks_table', 1);

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
(1, 100000, 'Voluptatum eos nisi velit optio numquam.', 'Suscipit voluptas quasi voluptatem aperiam. Illo voluptas mollitia ut sit vitae labore. Consequatur inventore et saepe dignissimos aliquam.', '[\"66be16557f290.jpg\"]', '2022-04-26 22:14:31'),
(2, 100000, 'Odio in et ut ducimus ipsa.', 'Totam sunt ducimus molestiae quia. Mollitia incidunt cupiditate consequatur voluptatem magnam. Aut occaecati voluptas placeat et unde quod error. Impedit voluptas mollitia sunt.', '[\"66be165763bcd.jpg\"]', '2022-01-22 04:24:31'),
(3, 100000, 'Et quo vitae neque eligendi in.', 'Laborum veniam amet molestiae eligendi. Quo libero ut rerum ipsa et sequi quis. Minima dolore ullam tempore.', '[\"66be1658b0018.jpg\"]', '2019-04-17 09:28:27'),
(4, 100000, 'Blanditiis qui itaque asperiores aperiam sint.', 'Et nam eaque sed dignissimos magnam ipsam nisi. Corporis placeat eligendi eius eius eos. Consectetur culpa et explicabo dignissimos autem sed. Cumque rerum aut laborum qui.', '[\"66be165a9a756.jpg\"]', '2022-04-28 18:59:40'),
(5, 100000, 'Sed id consectetur quisquam fugit fuga.', 'Laboriosam veritatis maiores asperiores expedita. Ut est laborum beatae assumenda id velit molestiae. Voluptatem sit harum odit. Nostrum eaque et rerum a.', '[\"66be165c028ed.jpg\"]', '2019-06-20 02:01:04'),
(6, 100000, 'Culpa cumque saepe molestias neque.', '<p>Illum aspernatur consequatur deserunt eum inventore voluptatum. Et cum alias recusandae accusamus praesentium sunt. Numquam autem ab porro ab.</p>', '[\"66be165d3b8ee.jpg\",\"yiRQFHXkXqAW1NULh4CzZOMabiiEDiiaj5BWy1yD.gif\"]', '2022-12-29 00:16:56');

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
(1, 558123, 95, 39, 15, 50, 92),
(2, 559592, 42, 4, 72, 5, 93),
(3, 123671, 45, 76, 65, 74, 29),
(4, 333595, 66, 42, 53, 85, 86),
(5, 681092, 38, 85, 82, 14, 48);

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
('DBULdrbwUpgS2WsFpiclQ0a3y1MoLpbHlm8dTUWc', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYmt5eEhwTDhVUUhqWlJFVTY1U0JMd3VDSnpMU2w1cjdtUURNRThiUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTI0OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvcmVzZXQtcGFzc3dvcmQvMDhjNWViZDYzYTQxOTJkZmVjZjM5NTg3OTZmNDU5ZDA4MTNmYWM3NDhkNDc2MjBiNjU0MWUxZjA3ZmE4NzNmYT9lbWFpbD1hZG1pbiU0MG1haWwuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1723901456),
('Epaf23QqFLQORRVQ0TD6nPff0O68RXsIfB6Tds3e', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWjFLV3VCeWxBcGpUYjdnWXBzeW1pNlM0SXluRzM5NjV1MUhXTHFFdCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9mb3Jnb3RfcGFzc3dvcmQiO319', 1723902900),
('gsm3zWYNpo7ix6J8gx9dNvtsh3YFskBxa8VVfJEH', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRzY2azFNS0tVRmRqSkpKVEtMc3FFTFZFU3NvSUVyMVpGVVRtT3RUUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTI0OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvcmVzZXQtcGFzc3dvcmQvZjE5NTdjOTBiMjYxY2Y3ODA1NWI1NTcxZGM3NmM0YTg5NTExZDYzOTZlNjkyZGQ5NmRlMWVkYzA4YmQxMTcxNT9lbWFpbD1hZG1pbiU0MG1haWwuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1723898248);

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
(100000, 'admin', 'Admin', 'teacher', 99, '012-3456789', 'SJK(C) Bukit Serdang', 3, 'admin@mail.com', '2024-08-15 14:53:09', '$2y$12$Y9kLevo0MLeafn0P4JtOX.5HwTPpneQDigr5ujgYcHAUqyIdxalcK', 'ION7Faly3fDodtgNOD9V1mV2Ygmz0rsHJ6D7Fgul9fcbwZgrweoOlXWGFxJN', '2024-08-15 14:53:09', '2024-08-17 13:32:38'),
(123671, 'roberta.corkery', 'Dr. Edward Conn', 'student', 7, '010-5680058', 'SJK(C) Bukit Serdang', 1, 'cyrus04@example.org', '2024-08-15 14:53:09', '$2y$12$9bcNLN19tuxFbde20yVp1OVEEcLVZQA43EJkLRe00hhAfEwL9MUAK', 'js7sShNNi9', '2024-08-15 14:53:09', '2024-08-15 14:53:09'),
(333595, 'leonora22', 'Dr. Noah Grant MD', 'student', 10, '013-9399893', 'SJK(C) Bukit Serdang', 4, 'stokes.gladyce@example.org', '2024-08-15 14:53:09', '$2y$12$9bcNLN19tuxFbde20yVp1OVEEcLVZQA43EJkLRe00hhAfEwL9MUAK', 'AkjgobE1g8', '2024-08-15 14:53:09', '2024-08-15 14:53:09'),
(558123, 'lakin.monroe', 'Rhianna Streich', 'student', 7, '014-8274440', 'SJK(C) Bukit Serdang', 1, 'lowell.beier@example.net', '2024-08-15 14:53:09', '$2y$12$9bcNLN19tuxFbde20yVp1OVEEcLVZQA43EJkLRe00hhAfEwL9MUAK', 'INyTWzkAyo', '2024-08-15 14:53:09', '2024-08-15 14:53:09'),
(559592, 'nader.genoveva', 'Marjory Eichmann', 'student', 9, '010-4516770', 'SJK(C) Bukit Serdang', 3, 'clementina57@example.org', '2024-08-15 14:53:09', '$2y$12$9bcNLN19tuxFbde20yVp1OVEEcLVZQA43EJkLRe00hhAfEwL9MUAK', 'nWe3rdb2Wc', '2024-08-15 14:53:09', '2024-08-15 14:53:09'),
(681092, 'dach.franz', 'Prof. Reynold Jones I', 'student', 11, '011-31059047', 'SJK(C) Bukit Serdang', 5, 'conor.witting@example.org', '2024-08-15 14:53:09', '$2y$12$9bcNLN19tuxFbde20yVp1OVEEcLVZQA43EJkLRe00hhAfEwL9MUAK', 'IYU7yEi01J', '2024-08-15 14:53:09', '2024-08-15 14:53:09');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

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

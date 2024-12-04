-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2024 at 06:12 PM
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
(1, 688943, 'Eos laudantium necessitatibus aut minima aperiam ipsam et.', 'Illo ea iusto voluptatum aut dolore enim. Est rem sit ut dolorem in aperiam vel. Sint doloribus incidunt aperiam aut. Voluptates fugit eius repudiandae rem consequuntur. Sint omnis earum fugit dolor asperiores laborum.', 0, '2024-03-20 10:17:27'),
(2, 689876, 'Labore et sint quae temporibus enim officia rerum.', 'Perspiciatis vitae voluptates dolorum delectus. Praesentium molestias voluptas magni in ad ea consequatur ea.', 0, '2022-04-17 20:08:10'),
(3, 655916, 'Praesentium necessitatibus modi reprehenderit veritatis et rerum consequatur.', 'Possimus neque recusandae at eius est sapiente esse. Esse necessitatibus quasi nihil ea dolores nisi. Totam sed blanditiis odit quisquam natus.', 0, '2021-06-21 14:35:06'),
(4, 505515, 'Doloremque voluptates quod voluptas quo.', 'Aliquid ut odit nobis cupiditate. Dolorum et qui facere dolorem sint ut dolores. Exercitationem sunt omnis maxime voluptate reprehenderit corrupti culpa sapiente.', 0, '2021-09-11 06:00:07'),
(5, 505515, 'Molestiae eius totam quia rerum in itaque consequatur in.', 'Rerum id quis magnam earum rem. Et voluptatum sequi illo unde praesentium. Eum ipsum reprehenderit quia assumenda labore distinctio non et.', 0, '2019-11-23 04:23:28'),
(6, 505515, 'Dolores eveniet cumque perspiciatis tempora culpa iusto.', 'Alias rerum alias officiis sit. Iste aut eligendi non eaque quidem consequatur distinctio. Qui non a voluptatibus expedita laborum quis. Quia soluta eius voluptas aperiam.', 0, '2020-08-05 19:26:01'),
(7, 655916, 'Odit minima corporis impedit voluptas dolore eligendi facere et.', 'Magni ullam quae ipsum sint architecto. Numquam totam libero dolore eveniet enim. Rerum non quos aut ipsam quia aut. Et dolores quia vero dolor quas. Et sequi cumque saepe facilis.', 0, '2021-04-20 07:01:12'),
(8, 466209, 'Optio omnis aut quae rerum quibusdam perspiciatis eius.', 'In maxime dolore nihil vitae provident non. Harum facilis aliquid vero ab vel. Reiciendis dolore culpa quibusdam. Illum in doloribus ut necessitatibus amet.', 0, '2022-01-25 02:31:53'),
(9, 466209, 'Quia nihil sint quod voluptatum eaque quam.', 'Aut animi sint consequatur consequatur exercitationem voluptatibus. Fugit quam aut voluptate reprehenderit velit. Aut error maxime qui sit maiores.', 0, '2023-11-26 17:48:39'),
(10, 466209, 'Reprehenderit unde nisi qui sint qui voluptas et.', 'Voluptatem aliquid voluptatem corrupti commodi tempore voluptate. Minus eum autem sit porro quaerat. Ut et quis illo dolorum sequi occaecati amet.', 0, '2022-09-30 01:22:26'),
(11, 688943, 'Iste fugit adipisci voluptate.', 'Impedit aut minus aut sunt et. Quaerat ea ab quia enim qui pariatur. Repellendus odit voluptas qui dolor dolor qui nemo nobis.', 0, '2021-08-18 02:14:55'),
(12, 505515, 'Nihil sint nobis quisquam voluptas ut possimus a unde.', 'Eum quos nostrum beatae at sed. Optio quis enim iste omnis.', 0, '2021-12-20 21:03:21'),
(13, 688943, 'Sint et non nostrum commodi.', 'Ut dolorem nobis aut pariatur. Amet consequatur et et et qui distinctio aliquam. Dolorem blanditiis dicta enim eius minus voluptates. Autem est placeat omnis officia.', 0, '2019-04-09 17:01:51'),
(14, 100000, 'Temporibus molestiae consequatur cupiditate voluptatem tenetur cum.', 'Eaque explicabo omnis sit qui voluptatem suscipit maiores. Sunt numquam alias iusto dignissimos nobis. Asperiores omnis in maiores sed enim. Optio pariatur tempore ea excepturi.', 0, '2023-09-29 17:30:47'),
(15, NULL, 'Neque modi consequatur velit dolores.', 'Ipsa ex adipisci excepturi amet dolor. Ab inventore tempora aperiam quidem sunt vel. Odit ex suscipit quia quam officia.', 1, '2018-12-21 09:57:18'),
(16, 655916, 'Et quo laudantium quis quod voluptas et eaque.', 'Nemo quo unde ducimus quis. Voluptatem et iusto molestiae minus odit. Nulla possimus in consequatur assumenda commodi.', 0, '2020-04-06 06:53:51'),
(17, 655916, 'Reprehenderit voluptas consequatur magnam sit dolor exercitationem autem.', 'Est modi magni voluptatem quos nostrum. Quas repellat numquam sed quis ut. Iusto fugiat sequi ducimus magnam omnis unde.', 0, '2022-04-10 11:00:24'),
(18, 688943, 'Sed libero neque omnis.', 'Quasi eveniet quae est nulla magni dignissimos. Laudantium voluptatum et in amet. Id eligendi vel repellat itaque saepe quam provident adipisci. Veniam ipsa in molestias sequi sequi. Illo voluptatem saepe harum non.', 0, '2021-07-17 11:50:45'),
(19, 688943, 'Sit autem aut vero sit.', 'Eos voluptatem neque id sunt consequuntur. Blanditiis fugiat ea voluptas qui earum minima.', 0, '2019-06-29 13:48:34'),
(20, 688943, 'Modi inventore voluptas aut et.', 'Porro molestiae sapiente sunt et. Quod sed eius doloremque perferendis atque odit impedit. Molestias tenetur similique aut.', 0, '2020-05-21 03:24:11'),
(21, 688943, 'Voluptate sed est tempora rerum.', 'Doloremque non necessitatibus repudiandae et ut incidunt. Ab qui tempora delectus est tempore. Qui beatae quaerat sequi ea. Est officia eveniet adipisci incidunt qui.', 0, '2020-01-22 11:26:36');

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
(281, '0001_01_01_000000_create_users_table', 1),
(282, '0001_01_01_000001_create_cache_table', 1),
(283, '0001_01_01_000002_create_jobs_table', 1),
(284, '2024_07_12_125725_edit_users_table', 1),
(285, '2024_07_12_130942_create_scores_table', 1),
(286, '2024_07_30_163147_create_posts_table', 1),
(287, '2024_08_01_235052_create_feedbacks_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$12$uTvn.q0zkQrDtaUOJQodDOGryhsumqEIuadJloZtTaDccX45tEoOO', '2024-11-10 08:50:43'),
('derrickphb@gmail.com', '$2y$12$13Jk/OkzJwvutOkjVoX1Ju0BS4kBQI17l0tx.CrDjOJ8.Uf290Iyi', '2024-11-13 02:35:25');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postid` int(10) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `media` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`media`)),
  `createdtime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postid`, `userid`, `title`, `description`, `media`, `createdtime`) VALUES
(1, 100000, 'Est cupiditate vitae enim odit ea.', 'Dolorum et numquam et molestiae quibusdam commodi. Earum repudiandae quam eos. Nisi debitis ex sequi quisquam nihil.', '[{\"type\":\"image\",\"url\":\"67135580d3831.jpg\"}]', '2019-08-03 22:22:26'),
(2, 100000, 'Eligendi doloribus nesciunt officia incidunt non tempore doloribus commodi.', 'Quis facilis debitis voluptatem aliquam qui autem distinctio. Numquam non sapiente aspernatur qui quae quo perferendis.', '[{\"type\":\"image\",\"url\":\"671355835929b.jpg\"}]', '2023-06-01 06:22:53'),
(3, 100000, 'Nihil molestias non quidem esse ut.', 'Ipsum rerum iste unde sint molestias eaque molestiae impedit. Veniam fuga sunt corporis aut perspiciatis et beatae maxime. Quia modi iure labore sapiente consequatur est.', '[{\"type\":\"image\",\"url\":\"67135584be929.jpg\"}]', '2020-10-11 14:47:01'),
(4, 100000, 'Ad odit aut qui.', 'Voluptas delectus voluptatem quasi laboriosam corporis hic ipsam sequi. Labore aut sapiente et voluptatem atque.', '[{\"type\":\"image\",\"url\":\"6713558675115.jpg\"}]', '2023-12-19 08:04:40'),
(5, 100000, 'Repellendus voluptas maxime eligendi sed minus hic.', 'Nesciunt itaque quia est provident. Esse ut et corrupti maiores delectus vero. Et laudantium aut ea deleniti inventore repudiandae inventore.', '[{\"type\":\"image\",\"url\":\"671355882dc76.jpg\"}]', '2023-08-27 13:37:51'),
(6, 100000, 'Harum sequi consequatur modi quia.', 'Laudantium atque non fugiat fuga perspiciatis nihil. Odit aut ut culpa quia. Veniam eaque temporibus repellendus voluptatem quam odio nemo. Omnis odit vitae ipsa ut aliquid et quasi.', '[{\"type\":\"image\",\"url\":\"67135589a4b80.jpg\"}]', '2023-04-24 16:54:45');

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
  `science` int(11) NOT NULL,
  `history` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`scoreid`, `userid`, `mandarin`, `english`, `malay`, `math`, `science`, `history`) VALUES
(1, 505515, 57, 35, 44, 76, 26, 75),
(2, 688943, 7, 27, 25, 34, 93, NULL),
(3, 655916, 53, 97, 50, 27, 6, NULL),
(4, 689876, 57, 48, 2, 98, 19, NULL),
(5, 466209, 90, 40, 90, 1, 69, 18);

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

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`, `is_first`) VALUES
('wKnpaZawedPX76FjBEJqOEF2MYrDWoQbsf5HxApg', 100000, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoieGw2bVhETElzbVpNaTZqU2IxOG1Vc0F3dWV0NUZualRvUjRNajIyUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHA6Ly84NDBlLTE4MC03NS0yMzktMTE1Lm5ncm9rLWZyZWUuYXBwL3Byb2ZpbGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxMDAwMDA7czoxNjoibGFzdEFjdGl2aXR5VGltZSI7aToxNzMxNjU2ODQ0O30=', 1731656846, 1);

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
(100000, 'admin', 'Admin', 'teacher', 99, '012-3456789', 'SJK(C) Bukit Serdang', 3, 'derrickphb@gmail.com', '2024-10-19 06:45:20', '$2y$12$27He0UTWx7WkowNcwupkteRQ7z3qp2qwRjUTQrLFdR.bmuj2J9YhK', 'Xo87ts6GqFjX01IvFNnnVtWVUyOrKQRAOUxcSQeLP1LHk6IiCVszvFquCWBZ', '2024-10-19 06:45:20', '2024-10-19 06:45:20'),
(466209, 'sabbott', 'Dr. Julia Daugherty', 'student', 10, '010-9331605', 'SJK(C) Bukit Serdang', 4, 'smoore@example.net', '2024-10-19 06:45:20', '$2y$12$7qloV493ZtVz8ef5wFYQcOwMIcRc.f5Q3.H.GZPHJwVKp1G3wcE5C', 'IIPzXaoOJs', '2024-10-19 06:45:20', '2024-10-19 06:45:20'),
(505515, 'kcrist', 'Audie Hill', 'student', 12, '017-2952768', 'SJK(C) Bukit Serdang', 6, 'marlene.marks@example.net', '2024-10-19 06:45:20', '$2y$12$7qloV493ZtVz8ef5wFYQcOwMIcRc.f5Q3.H.GZPHJwVKp1G3wcE5C', '2D9baS2NmG', '2024-10-19 06:45:20', '2024-10-19 06:45:20'),
(655916, 'chadd31', 'Prof. Archibald McCullough', 'student', 8, '019-5290706', 'SJK(C) Bukit Serdang', 2, 'windler.camron@example.net', '2024-10-19 06:45:20', '$2y$12$7qloV493ZtVz8ef5wFYQcOwMIcRc.f5Q3.H.GZPHJwVKp1G3wcE5C', '45HAYRoT17', '2024-10-19 06:45:20', '2024-10-19 06:45:20'),
(688943, 'pfeffer.josefa', 'Jerod Ankunding MD', 'student', 8, '013-6844333', 'SJK(C) Bukit Serdang', 2, 'nhauck@example.com', '2024-10-19 06:45:20', '$2y$12$7qloV493ZtVz8ef5wFYQcOwMIcRc.f5Q3.H.GZPHJwVKp1G3wcE5C', 'oWkLX68dIE', '2024-10-19 06:45:20', '2024-10-19 06:45:20'),
(689876, 'denis81', 'Margarette Collins', 'student', 7, '010-1437814', 'SJK(C) Bukit Serdang', 1, 'jayden.boyer@example.com', '2024-10-19 06:45:20', '$2y$12$7qloV493ZtVz8ef5wFYQcOwMIcRc.f5Q3.H.GZPHJwVKp1G3wcE5C', 'c9Sz6WAa8W', '2024-10-19 06:45:20', '2024-10-19 06:45:20');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=288;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `scoreid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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

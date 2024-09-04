-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2024 at 11:56 AM
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
(1, 526454, 'Reiciendis sit et et.', 'Assumenda dolores sint qui quia nihil sunt. Dicta molestias deserunt in fugit ipsum sit et.', 0, '2023-12-09 07:34:42'),
(2, 499359, 'Voluptas dolor aut et molestiae tempore vitae aut.', 'Ipsum ex ipsa quas et distinctio quis. Ex sint veniam dicta autem eos veniam dignissimos. Perferendis iure in voluptatem voluptas tempora fuga. Totam eum nesciunt ducimus tempora nisi.', 0, '2020-11-23 22:20:27'),
(3, 712467, 'Eum molestiae ullam sunt repellat.', 'Similique deserunt dolorem facilis tempore. Minus voluptas ut est provident. Ab iure et incidunt quas fuga inventore eligendi.', 0, '2021-06-22 09:48:55'),
(4, 526454, 'Veritatis ducimus pariatur explicabo eos maxime perspiciatis vero.', 'Doloremque quia nihil similique tempora pariatur. Tenetur et temporibus qui similique. Nihil odit sapiente molestiae quam placeat.', 0, '2021-09-14 18:31:37'),
(5, 526454, 'Ducimus assumenda laudantium quisquam voluptatum exercitationem iste sit.', 'Iusto placeat rerum dolore nulla nihil. Doloremque ab placeat inventore consequatur. Animi ut voluptate maxime itaque.', 0, '2021-10-05 22:30:46'),
(6, 100000, 'Animi amet pariatur aut voluptas quas atque.', 'Qui excepturi vitae perferendis dolores. Voluptate sint corporis temporibus omnis quo maiores aut est. Quibusdam officia tenetur commodi possimus provident corporis molestias. Enim velit laborum et sint.', 0, '2019-12-14 15:14:10'),
(7, 526454, 'Qui facilis occaecati fuga necessitatibus aut aliquid aliquam aut.', 'Magni maxime tempore ab. A omnis est earum sit deserunt. At iure vel autem neque pariatur eum est mollitia.', 0, '2022-04-27 09:22:34'),
(8, 499359, 'Autem doloribus sed ut odio vel est magni.', 'Sint culpa aut ducimus qui dicta voluptas. Optio deserunt fugiat commodi accusantium aut fugiat. Velit autem dolorem tempore optio eum est a repellendus.', 0, '2023-06-19 20:35:54'),
(9, 855622, 'Aperiam non veniam perferendis consequuntur temporibus provident.', 'Alias rerum in ut sint ipsum nobis. Nam placeat deserunt blanditiis at aut est. Non eveniet quasi impedit veniam. Perferendis harum repellat impedit earum assumenda rerum cum. Deleniti id facilis cupiditate perferendis aliquam sit.', 0, '2019-01-21 18:27:08'),
(10, 100000, 'Voluptates fugiat asperiores reiciendis repellat.', 'Nostrum dignissimos quia repellendus quidem. Ut qui ut possimus. Et enim rerum nesciunt accusamus sint eos. Sint illum quia tempore debitis repudiandae.', 0, '2020-12-13 15:40:06'),
(11, 425548, 'Eligendi consectetur et impedit voluptas voluptatum veritatis veniam.', 'Iste excepturi qui atque et officiis qui omnis. Illo alias ducimus sed et consectetur optio molestiae ratione. Est facilis aut nemo laudantium itaque.', 0, '2023-08-01 17:53:07'),
(12, 855622, 'Quas quisquam odit quae quam neque.', 'Velit illum quisquam natus quasi voluptatem consectetur tenetur. Officia aut incidunt ab ut incidunt. Dolor voluptate esse dolores et. Error fugiat quod et et voluptatem omnis nostrum.', 0, '2023-12-07 12:05:30'),
(13, 100000, 'Quia ut quis optio ut facilis.', 'Incidunt quis voluptas inventore minima quia non. Et odio necessitatibus sed. Ex neque sapiente facilis voluptas ipsa. Enim consequatur tempore maxime voluptatem.', 0, '2024-04-19 21:34:22'),
(14, 425548, 'Qui saepe voluptate aut pariatur cupiditate quaerat.', 'Consequatur itaque optio perferendis dolore ut possimus sit. Ab reiciendis quo qui eaque odio. Est delectus officiis ipsam temporibus iure. Esse possimus maiores dolor molestiae.', 0, '2024-03-02 04:01:06'),
(15, 526454, 'Enim voluptas et sed ullam voluptatem occaecati.', 'Voluptatem quis quo ea voluptas natus vel ut. Quia necessitatibus et itaque dolorem qui eum veniam. Consequuntur soluta eum asperiores quia. Qui beatae assumenda dolores sed illum rerum ad maxime.', 0, '2023-02-07 08:46:21'),
(16, NULL, 'Quaerat hic consequatur sunt occaecati.', 'Aliquid similique est est deserunt in at. Quod expedita quam assumenda velit facilis. Officiis consequatur autem itaque ut aut velit nemo.', 0, '2019-11-30 18:18:12'),
(17, 100000, 'Laudantium minus itaque cupiditate eligendi non.', 'Ratione expedita reprehenderit aut culpa. Praesentium eos voluptatum qui rerum id. Consectetur rem molestiae hic ea enim alias et. Id voluptate harum et minus aut.', 0, '2020-11-08 08:52:25'),
(18, 499359, 'Doloribus et eos repellat repellendus maiores possimus ut.', 'Nobis quas quam iusto ut ea. Iusto veritatis consequatur qui vero. Et quasi aut commodi libero vel cum.', 0, '2022-11-29 20:40:46'),
(19, NULL, 'Sunt quos odit asperiores.', 'Ratione voluptates consectetur necessitatibus et. Provident molestiae fugit laboriosam maiores. Corrupti nostrum odio vel maiores quisquam voluptatem quae.', 0, '2023-02-10 21:02:48'),
(20, 425548, 'Quia magni unde eius.', 'Laboriosam nihil et laboriosam et. Voluptatem aut sit aut ad minima.', 0, '2020-03-20 13:58:13'),
(21, 712467, 'Inventore alias dignissimos dolorem dolores sit eligendi eos.', 'Consequatur cumque at repudiandae ipsam possimus et tempore consequatur. Dicta fuga voluptate dolore in quia. Minima consequuntur qui rerum repudiandae voluptatum minima accusantium cumque. Corporis non et molestiae eum quam et itaque.', 0, '2023-12-04 05:55:11');

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
(267, '0001_01_01_000000_create_users_table', 1),
(268, '0001_01_01_000001_create_cache_table', 1),
(269, '0001_01_01_000002_create_jobs_table', 1),
(270, '2024_07_12_125725_edit_users_table', 1),
(271, '2024_07_12_130942_create_scores_table', 1),
(272, '2024_07_30_163147_create_posts_table', 1),
(273, '2024_08_01_235052_create_feedbacks_table', 1);

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
('derrickphb@gmail.com', '$2y$12$hZm7CoLmFLJuwMdgeVANBujD/zh6XxhvVSt4.37bVShMXrkwvA/.2', '2024-09-04 09:52:51');

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
(1, 100000, 'Nisi eos dolores velit deleniti sed dolor provident.', 'Maxime possimus molestias id eius qui officia maiores. Voluptatibus accusantium a incidunt delectus. Optio amet ipsa consequatur rerum.', '[{\"type\":\"image\",\"url\":\"66d8298eceb2a.jpg\"}]', '2023-01-19 04:07:07'),
(2, 100000, 'Deleniti consequatur dolores vel ut consectetur corrupti repellendus temporibus.', 'Natus est officiis sapiente dolore eos neque architecto praesentium. Et delectus veritatis aut doloribus facilis odio. Voluptatibus odio nobis suscipit quos omnis.', '[{\"type\":\"image\",\"url\":\"66d8299031c1a.jpg\"}]', '2019-05-17 22:23:05'),
(3, 100000, 'Qui non eum ratione veniam nihil.', 'Commodi amet deserunt hic. Consequatur odit animi eveniet et eum laudantium. Minima repellendus aut sint voluptates dignissimos aut eos reprehenderit. Officiis reiciendis aut aut officiis consequatur officia explicabo.', '[{\"type\":\"image\",\"url\":\"66d82991b94df.jpg\"}]', '2020-02-02 16:44:45'),
(4, 100000, 'Enim omnis rerum unde sunt aut aspernatur sunt.', 'Ea eos qui reprehenderit in nesciunt cum eos. Mollitia eaque et tenetur consectetur veritatis similique. Omnis cupiditate eaque aut beatae. Rerum porro dolorem ullam accusantium dolor et aliquam eius.', '[{\"type\":\"image\",\"url\":\"66d8299333a7c.jpg\"}]', '2022-02-28 13:58:14'),
(5, 100000, 'Dicta id eum eveniet voluptates quo ut.', '<p>Aperiam est minima blanditiis voluptatem dolore. Ab impedit placeat eveniet. Ab ea veniam maiores quia minus omnis non. Fugit eum velit eum hic omnis iste.</p>', '[{\"type\":\"image\",\"url\":\"66d82994b0539.jpg\"},{\"type\":\"video\",\"url\":\"https:\\/\\/www.youtube.com\\/embed\\/K87aFjB7Ff0\"},{\"type\":\"image\",\"url\":\"Y2w2RUK6veQVNdu44MDC8lJEcDczyeK9o3zSyaL4.gif\"},{\"type\":\"video\",\"url\":\"https:\\/\\/drive.google.com\\/file\\/d\\/1mQEkWNUrK02WI7PDdvOFeewAIX682Gb6\\/preview\"}]', '2023-10-05 08:03:11'),
(6, 100000, 'Quo id molestiae soluta accusantium.', 'Nemo id quo est dolores amet iusto aspernatur. Mollitia non dolore aspernatur ut. Nemo pariatur quis aut corrupti debitis.', '[{\"type\":\"image\",\"url\":\"66d829957872b.jpg\"}]', '2021-03-03 01:50:15');

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
(1, 526454, 97, 93, 81, 94, 5),
(2, 855622, 10, 36, 19, 72, 72),
(3, 499359, 85, 45, 96, 45, 42),
(4, 425548, 18, 50, 17, 21, 53),
(5, 712467, 30, 13, 47, 90, 9);

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
('5zrmGyFO8eOOEaNKyE1IksGGPeTVxtX4ck9xCqJU', 100000, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiWlZYc3lreUY0SUh4cUxadlUxMXVxN3JaTGhxdmRjazA5c2FaYVJ2RyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC8/cGFnZT0xIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEwMDAwMDtzOjE2OiJsYXN0QWN0aXZpdHlUaW1lIjtpOjE3MjU0NDI1ODY7fQ==', 1725442586, 0),
('siZ4Vge6TgGEjEbn2nbBKhxLZ2S4dsPXx3qsCSly', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUEVpUUltam83OFFNaGpmV096VEE2TFVWODQ1aVJwMzBDTVlSUWtneiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9mb3Jnb3RfcGFzc3dvcmQiO319', 1725443582, 0);

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
(100000, 'admin', 'Admin', 'teacher', 99, '012-3456789', 'SJK(C) Bukit Serdang', 5, 'derrickphb@gmail.com', '2024-09-04 09:34:06', '$2y$12$QaMabMsFqHRKjV8kwobbbu5nUmv6XMVxrmD6elxQvPJU.AROceUUK', 'rDFRKdUroesEOqIFxqZiiZhOxNpw6NG4iQwXZG1xdO7n1ZBvMlpxawx2zQTx', '2024-09-04 09:34:06', '2024-09-04 09:34:06'),
(425548, 'douglas.rose', 'Frida Deckow', 'student', 7, '014-4677971', 'SJK(C) Bukit Serdang', 1, 'schulist.rodger@example.org', '2024-09-04 09:34:06', '$2y$12$7BAKwmNewf5RQR3LhAmkReOanxEodqi4U3As88.UQFwdYWl0GZGTa', 'nDzcvraPkC', '2024-09-04 09:34:06', '2024-09-04 09:34:06'),
(499359, 'marcus66', 'Lloyd Walter', 'student', 11, '019-1863115', 'SJK(C) Bukit Serdang', 5, 'ypouros@example.com', '2024-09-04 09:34:06', '$2y$12$7BAKwmNewf5RQR3LhAmkReOanxEodqi4U3As88.UQFwdYWl0GZGTa', 'oMuDUla1uZ', '2024-09-04 09:34:06', '2024-09-04 09:34:06'),
(526454, 'cleo67', 'Braeden Hoeger I', 'student', 9, '014-5585323', 'SJK(C) Bukit Serdang', 3, 'hettinger.ismael@example.com', '2024-09-04 09:34:06', '$2y$12$7BAKwmNewf5RQR3LhAmkReOanxEodqi4U3As88.UQFwdYWl0GZGTa', 'UWoOZyhTAl', '2024-09-04 09:34:06', '2024-09-04 09:34:06'),
(712467, 'crosenbaum', 'Vincenza Wiegand MD', 'student', 7, '014-8912271', 'SJK(C) Bukit Serdang', 1, 'bailey.katlyn@example.org', '2024-09-04 09:34:06', '$2y$12$7BAKwmNewf5RQR3LhAmkReOanxEodqi4U3As88.UQFwdYWl0GZGTa', '0jOFlxFLuw', '2024-09-04 09:34:06', '2024-09-04 09:34:06'),
(855622, 'becker.alexandre', 'Ashton Kassulke', 'student', 10, '016-3801680', 'SJK(C) Bukit Serdang', 4, 'murphy.norwood@example.net', '2024-09-04 09:34:06', '$2y$12$7BAKwmNewf5RQR3LhAmkReOanxEodqi4U3As88.UQFwdYWl0GZGTa', 'F9P6btbwfx', '2024-09-04 09:34:06', '2024-09-04 09:34:06');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;

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

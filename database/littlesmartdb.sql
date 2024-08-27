-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2024 at 05:12 PM
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
(1, 177814, 'Sed nam architecto reprehenderit.', 'Nulla non odit id facere et. Aperiam nisi nisi quidem nihil sapiente consequuntur.', 0, '2021-01-12 12:09:23'),
(2, 675657, 'Dolor tenetur alias quia aut maxime enim.', 'Blanditiis excepturi qui placeat consequatur. Similique consequuntur molestiae voluptates nesciunt repudiandae illum. Repudiandae asperiores quisquam soluta architecto.', 0, '2023-06-28 17:56:14'),
(3, 663345, 'Quae voluptatem pariatur illo accusamus ut unde.', 'Eos adipisci nobis architecto velit consequatur at facere. Voluptatem nesciunt sint qui quasi aut libero sit. Laboriosam ab cupiditate veritatis. Eligendi maxime veritatis totam itaque.', 0, '2023-07-19 08:04:16'),
(4, 100000, 'Sit corrupti est itaque repudiandae.', 'Autem optio et sit dolorem. Blanditiis earum labore est autem. Nihil nihil rerum magni mollitia qui. Porro aut dolor voluptatibus tempore.', 0, '2020-09-10 08:13:02'),
(5, 177814, 'Eligendi voluptatum porro nam qui dolorem.', 'Molestiae mollitia quidem vel aliquid ad autem. Error quis et dolores iure eveniet rerum. Perspiciatis facere aperiam quae qui. Ratione quis possimus ad sed culpa et qui.', 0, '2021-05-26 15:39:59'),
(6, NULL, 'Neque corrupti reprehenderit officia ducimus et.', 'Odio aut sunt esse aliquid omnis. Excepturi consequatur voluptate ea aut quidem exercitationem vel. Delectus qui voluptate harum corrupti temporibus molestias quae. Non ratione dolores amet animi quam.', 0, '2021-08-28 12:26:25'),
(7, 663345, 'Repellat eveniet est culpa labore molestiae qui.', 'Similique sint tempore molestiae culpa quis. Quia enim nulla illum nulla odit. Est commodi facere amet aut necessitatibus ut. Non doloremque quia accusantium maxime. Veritatis neque dolor ratione fugiat expedita ipsum.', 0, '2024-05-27 20:49:10'),
(8, 177814, 'Minima rerum dolores atque.', 'Aut qui eos quae sapiente qui. Itaque sit veritatis id. Culpa quis fugiat est. Id officiis delectus ab aut velit. Ab dicta illum corporis magnam consequuntur placeat omnis vel.', 0, '2023-03-02 09:59:42'),
(9, 652196, 'Fugit assumenda cum impedit cum.', 'Quasi et fugiat libero officia neque voluptatem. Corrupti soluta assumenda atque explicabo est dicta quasi. Nam doloremque consequatur reprehenderit quis qui. Eveniet officia laborum voluptates ab explicabo.', 0, '2019-06-28 11:45:36'),
(10, 652196, 'Esse nulla explicabo dolorum voluptatibus eos aut laborum.', 'Qui vitae quia maxime error eveniet suscipit voluptatem perspiciatis. Voluptas ea ipsa aliquid et. Numquam sed consectetur pariatur. Cumque et dolorum incidunt ab.', 0, '2023-10-03 03:29:40'),
(11, NULL, 'Est veniam ullam explicabo.', 'Quia perspiciatis qui doloribus ut laboriosam aut velit. Sunt enim nam similique ipsam maxime porro.', 0, '2021-05-14 22:36:24'),
(12, 177814, 'Impedit beatae praesentium rerum vitae ad sint voluptas.', 'Tempore ut voluptatem sunt officia. Ea dolorem quasi ut debitis. Ex ut dicta minus provident. Quam hic sed nulla tenetur.', 0, '2019-03-15 07:11:48'),
(13, 177814, 'Doloribus magnam nihil perferendis ipsa et aut ratione.', 'Atque molestiae a harum non sit eligendi sunt. Et autem velit cumque sit aspernatur eum. Sit vel aliquid rerum ipsa eveniet. Possimus nisi deserunt inventore quae exercitationem illum molestiae odit.', 0, '2023-07-24 11:19:25'),
(14, 177814, 'Est ad sit qui inventore est perspiciatis eum.', 'Saepe eum dolorum modi officia ad cumque. Et sed atque est dignissimos laboriosam aut. Consequatur eius quae similique ut.', 0, '2020-02-09 16:29:59'),
(15, 100000, 'Dolor aut fugiat ea voluptas perspiciatis.', 'Eum at nesciunt qui ipsam. Quos ea dolor nostrum nobis velit quos animi. Occaecati recusandae in laudantium ea eos.', 0, '2019-07-13 04:01:21'),
(16, 675657, 'Consequuntur fugiat et laudantium vel.', 'Sunt voluptatum tempore commodi ut aliquid sed. Molestias et commodi voluptatem optio quos autem beatae quod. Occaecati illum corrupti iure quis perferendis. Sit quis ut tenetur culpa.', 0, '2021-03-30 09:15:58'),
(17, 675657, 'Rerum non id recusandae excepturi consequuntur.', 'Et eaque iste nisi rerum mollitia et tempora. Vel sapiente doloremque corporis illo. Quo amet corrupti hic repudiandae.', 0, '2019-10-06 18:39:42'),
(18, 177814, 'Quaerat eos expedita similique.', 'Molestiae exercitationem assumenda est consequatur voluptatum doloremque et architecto. Quis commodi officiis voluptatem animi fuga. Id accusamus labore quam non recusandae nemo delectus.', 0, '2022-11-18 11:07:14'),
(19, 652196, 'Alias nemo repudiandae ea sapiente itaque omnis aspernatur atque.', 'Quibusdam repellendus qui itaque. Cumque et blanditiis vel. Sunt quam corrupti exercitationem esse distinctio est ut.', 0, '2022-06-24 21:21:08'),
(20, 675657, 'Maxime quia consectetur omnis dignissimos dolorem omnis enim reiciendis.', 'Nihil voluptatem suscipit minus. Ducimus consequuntur sed sint. Voluptate accusamus a quos voluptas tempore. Et quos fuga et quam quae suscipit quo.', 0, '2019-11-04 10:27:28'),
(21, 652196, 'Voluptatem aut ea esse rerum laboriosam.', 'Ut aperiam in ut totam commodi optio et. Unde dolor itaque excepturi illo quis ea dolor. Repudiandae quia eum expedita et. Ut dignissimos temporibus qui amet dolor.', 0, '2024-03-24 05:01:40');

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
(232, '0001_01_01_000000_create_users_table', 1),
(233, '0001_01_01_000001_create_cache_table', 1),
(234, '0001_01_01_000002_create_jobs_table', 1),
(235, '2024_07_12_125725_edit_users_table', 1),
(236, '2024_07_12_130942_create_scores_table', 1),
(237, '2024_07_30_163147_create_posts_table', 1),
(238, '2024_08_01_235052_create_feedbacks_table', 1);

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
(1, 100000, 'Dolor facere odio nesciunt accusantium consequatur fugiat.', 'Temporibus qui ea blanditiis laborum enim iusto tempora. Distinctio vero molestiae officia quo eos doloribus eveniet. Libero deserunt quam quos in.', '[\"66cdeb4996c8d.jpg\"]', '2020-04-08 19:56:04'),
(2, 100000, 'Non exercitationem quia iusto et maxime.', 'Suscipit architecto aut ex est. Velit consequatur enim optio.', '[\"66cdeb4b185ea.jpg\"]', '2021-09-10 20:38:16'),
(3, 100000, 'Iusto id praesentium ut delectus non maxime sit.', '<p>Tempora vel qui quia assumenda quia qui et. Nobis nostrum quia ea aut similique tempore omnis. Et molestiae itaque et esse cum voluptatibus voluptatem similique. Deleniti dolorum est ratione quam temporibus consequuntur corrupti iste. Aliquam corporis vel vero velit.</p>', '[\"66cdeb4c5c68f.jpg\",\"SoGTPq3TXqyUgQ3uCbUmPsY7g9zWsTESR7jpCC9K.gif\"]', '2024-02-20 13:22:59'),
(4, 100000, 'Dolorem doloribus sit neque vel facere ut et veniam.', 'Omnis necessitatibus est fugit qui vel dolor a. Quo quasi sit iure aspernatur quia. Repellat sequi laborum veritatis ea id omnis.', '[\"66cdeb4ddfd0b.jpg\"]', '2021-08-10 19:05:42'),
(5, 100000, 'Similique magnam rerum exercitationem.', 'Quibusdam assumenda quidem est quis. Corporis sint quas ratione aspernatur ut eos ut praesentium. Quae quam aut quia necessitatibus et. Repellat eum dolorum sed consequatur pariatur. Qui et voluptate totam ipsa sit sed quae.', '[\"66cdeb4f80d3b.jpg\"]', '2019-11-14 07:58:01'),
(6, 100000, 'Eveniet deserunt reiciendis voluptas iste et.', 'Ea repellat possimus quia repellat ducimus aspernatur est. Rerum aut eaque quo perferendis expedita. Laborum quia ad nemo eos labore.', '[\"66cdeb50ed049.jpg\"]', '2023-05-26 22:13:36');

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
(1, 177814, 22, 17, 17, 29, 10),
(2, 652196, 62, 1, 72, 34, 23),
(3, 675657, 65, 19, 48, 19, 49),
(4, 663345, 0, 12, 66, 55, 79),
(5, 632208, 69, 56, 6, 94, 15);

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
('h2ItOpcQGXp5LxfOKJtJlLcC5mRsruTZhb9vVTUD', 100000, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoianZ1eU8yU1FxVnM0TVo0Uk5mcFFuRnBseHVHdW1JTkxQNXloMkhOeSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9wb3N0P3BhZ2U9MSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEwMDAwMDtzOjE2OiJsYXN0QWN0aXZpdHlUaW1lIjtpOjE3MjQ3NzEzMzc7fQ==', 1724771337);

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
(100000, 'admin', 'Admin', 'teacher', 99, '012-3456789', 'SJK(C) Bukit Serdang', 4, 'admin@gmail.com', '2024-08-27 15:05:45', '$2y$12$KQv.5k9sYsChuK0ymFoGduHIObETqQsc79Ug4NQIW310KoJsJmKOq', 'OnOJNmEJJUrrh8MF2YHV0Bt9eslCa0lBt5pNRz2CLudgmusTLMSL1lhV6Zva', '2024-08-27 15:05:45', '2024-08-27 15:05:45'),
(177814, 'lang.kelsie', 'Ms. Gracie Schroeder', 'student', 7, '013-7131805', 'SJK(C) Bukit Serdang', 1, 'vcremin@example.net', '2024-08-27 15:05:45', '$2y$12$ULUs7rEJkVT7pQpfJNAtdezua7jxOeekEgnonIy9v7HVuA/h0x8Gu', 'IuitRrPWQP', '2024-08-27 15:05:45', '2024-08-27 15:05:45'),
(632208, 'luettgen.fabian', 'Dr. Delmer Hill MD', 'student', 12, '011-70423119', 'SJK(C) Bukit Serdang', 6, 'hschneider@example.net', '2024-08-27 15:05:45', '$2y$12$ULUs7rEJkVT7pQpfJNAtdezua7jxOeekEgnonIy9v7HVuA/h0x8Gu', 'E3TH2AAopn', '2024-08-27 15:05:45', '2024-08-27 15:05:45'),
(652196, 'fidel.fritsch', 'Russell Jacobi', 'student', 7, '011-27865128', 'SJK(C) Bukit Serdang', 1, 'labadie.carter@example.org', '2024-08-27 15:05:45', '$2y$12$ULUs7rEJkVT7pQpfJNAtdezua7jxOeekEgnonIy9v7HVuA/h0x8Gu', 'dKyyJvKTCN', '2024-08-27 15:05:45', '2024-08-27 15:05:45'),
(663345, 'hermiston.milan', 'Pearline Kuhlman', 'student', 8, '014-5731668', 'SJK(C) Bukit Serdang', 2, 'jast.clement@example.org', '2024-08-27 15:05:45', '$2y$12$ULUs7rEJkVT7pQpfJNAtdezua7jxOeekEgnonIy9v7HVuA/h0x8Gu', 'iMHvWtfEKZ', '2024-08-27 15:05:45', '2024-08-27 15:05:45'),
(675657, 'dgreen', 'Adah Corwin', 'student', 12, '011-48806438', 'SJK(C) Bukit Serdang', 6, 'gschimmel@example.net', '2024-08-27 15:05:45', '$2y$12$ULUs7rEJkVT7pQpfJNAtdezua7jxOeekEgnonIy9v7HVuA/h0x8Gu', '9JuSjxFAXy', '2024-08-27 15:05:45', '2024-08-27 15:05:45');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

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

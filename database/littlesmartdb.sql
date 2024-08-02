-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2024 at 12:11 PM
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
  `createdtime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`msgid`, `userid`, `title`, `description`, `createdtime`) VALUES
(1, 371665, 'Voluptas impedit nihil nam eius est est.', 'Commodi dolorum voluptates et earum commodi alias. Fuga velit ipsam quo sint in voluptates. Et officiis vel accusantium earum quo unde voluptates. Reiciendis quae architecto mollitia ut debitis qui.', '2020-05-29 11:54:21'),
(2, 849341, 'Dolorum ad amet et iste velit.', 'In voluptate asperiores quo cumque aut repellat. Autem non pariatur tempore doloremque voluptatem tempore. In nemo qui debitis.', '2019-03-18 15:06:50'),
(3, 100000, 'Iste perspiciatis ipsam fugit sed.', 'Perferendis illum aut rerum voluptatem fuga dolorum. Illum doloribus at pariatur quaerat quasi quo molestiae reiciendis. Possimus suscipit optio cupiditate fuga praesentium aut aut. Id nihil totam dolorum adipisci assumenda quia occaecati.', '2021-10-06 15:34:18'),
(4, NULL, 'Fugit quasi optio ipsam perspiciatis.', 'Rem laudantium dolor ad hic quidem. Quis excepturi occaecati laudantium voluptas. Minus provident nulla aut modi amet dignissimos est. Aut voluptas minus magni veritatis voluptatem officia harum.', '2022-08-14 09:47:24'),
(5, 371665, 'Corporis commodi soluta quis distinctio.', 'Quia ex velit sit delectus neque. Non cumque tempora rerum neque. Aspernatur consequuntur quo natus iure quibusdam molestiae sunt.', '2023-06-10 08:32:27');

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
(8, '0001_01_01_000000_create_users_table', 1),
(9, '0001_01_01_000001_create_cache_table', 1),
(10, '0001_01_01_000002_create_jobs_table', 1),
(11, '2024_07_12_125725_edit_users_table', 1),
(12, '2024_07_12_130942_create_scores_table', 1),
(13, '2024_07_30_163147_create_posts_table', 1),
(14, '2024_08_01_235052_create_feedbacks_table', 1);

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
(1, 100000, 'Minus tenetur veniam sunt nam soluta.', 'Culpa est laudantium magnam adipisci facere qui quas. Laudantium quibusdam eveniet odit et. Et maiores eaque nemo quia. Deserunt quidem quisquam in in blanditiis neque. Tempore odit eum sed quidem.', '66ac96fd0a1ff.jpg', '2020-06-02 11:47:14'),
(2, 100000, 'Et labore iste sunt nesciunt nisi minus illo.', 'Non fugit impedit incidunt nihil quia non. Repudiandae aut excepturi quia exercitationem. Vero quasi ea itaque voluptate iusto aut ullam. Voluptatem commodi distinctio voluptas magni totam totam quaerat. Molestiae est ducimus aliquam voluptas et hic.', '66ac96fec9705.jpg', '2023-08-11 22:52:08'),
(3, 100000, 'Maiores eligendi eveniet minima repellat vitae provident minus.', 'Rem quo voluptas reprehenderit quas sed et minus et. Aut eligendi nesciunt voluptatem tempora qui adipisci. Sapiente molestiae tempora aut non consequatur.', '66ac97002f5bb.jpg', '2023-04-25 04:26:17'),
(4, 100000, 'Hic quo hic officia et maiores.', 'In dignissimos sed et. Sed voluptatem quia sapiente corporis debitis ut. Sint earum pariatur quia aliquam impedit eos nam.', '66ac9701bb088.jpg', '2023-02-01 23:53:52'),
(5, 100000, 'Eveniet et neque ullam laboriosam ullam fuga qui quia.', 'Commodi quae ut quasi nostrum quisquam eaque libero. Voluptatum laborum soluta consequatur et. Vero provident hic voluptas dignissimos non.', '66ac9702f04e1.jpg', '2023-02-06 16:37:11'),
(6, 100000, 'Fuga fugiat laudantium magni incidunt ea.', 'Qui impedit laborum velit ut quos nisi est. Dignissimos voluptatem modi quasi.', '66ac970449735.jpg', '2019-08-11 07:25:33');

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
(1, 371665, 51, 82, 0, 64, 2),
(2, 838480, 57, 42, 17, 57, 28),
(3, 578152, 46, 49, 60, 40, 18),
(4, 803654, 88, 94, 85, 5, 43),
(5, 849341, 96, 66, 50, 40, 32);

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
('pIx8i0L2j4ow9gZ90iIbFZJNZxK0TGe80UmJIpkK', 100000, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUmdBaUwzTGlWNndzMzRFVzZqZGhEcVdNWjBRR21TWHljYUc4T2x3NSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9pbmJveCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEwMDAwMDtzOjE2OiJsYXN0QWN0aXZpdHlUaW1lIjtpOjE3MjI1OTMyNzk7fQ==', 1722593279);

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
(100000, 'admin', 'Admin', 'teacher', 99, '012-3456789', 'SJK(C) Bukit Serdang', 2, 'admin@gmail.com', '2024-08-02 08:21:16', '$2y$12$3FfwpHRwlDgQhQK2/cv8GuBPkWBye0Ud/6W5RFIMPTINh.VPNdlEi', 'xKi31Lk91n', '2024-08-02 08:21:16', '2024-08-02 08:21:16'),
(371665, 'hlebsack', 'Piper Fritsch', 'student', 11, '013-1111930', 'SJK(C) Bukit Serdang', 5, 'troy70@example.net', '2024-08-02 08:21:16', '$2y$12$rbKYAD/oXs9hY27SyiTOC.V5rYdKyqem02.oxVBw4aFXSnLcx4spe', '0tURdeZSKX', '2024-08-02 08:21:16', '2024-08-02 08:21:16'),
(578152, 'johnathon12', 'Ms. Lottie Block', 'student', 11, '010-8534525', 'SJK(C) Bukit Serdang', 5, 'sage.will@example.org', '2024-08-02 08:21:16', '$2y$12$rbKYAD/oXs9hY27SyiTOC.V5rYdKyqem02.oxVBw4aFXSnLcx4spe', 'AeDNzxpz7o', '2024-08-02 08:21:16', '2024-08-02 08:21:16'),
(803654, 'jermain.klocko', 'Stacy Daugherty', 'student', 11, '011-64022460', 'SJK(C) Bukit Serdang', 5, 'destiney.harris@example.org', '2024-08-02 08:21:16', '$2y$12$rbKYAD/oXs9hY27SyiTOC.V5rYdKyqem02.oxVBw4aFXSnLcx4spe', 'l0kKjRP7Bi', '2024-08-02 08:21:16', '2024-08-02 08:21:16'),
(838480, 'jessie80', 'Ottilie Labadie', 'student', 9, '015-7464056', 'SJK(C) Bukit Serdang', 3, 'cnicolas@example.com', '2024-08-02 08:21:16', '$2y$12$rbKYAD/oXs9hY27SyiTOC.V5rYdKyqem02.oxVBw4aFXSnLcx4spe', 'qsd3IVfXSY', '2024-08-02 08:21:16', '2024-08-02 08:21:16'),
(849341, 'purdy.rosamond', 'Mrs. Summer Yundt', 'student', 11, '013-7557425', 'SJK(C) Bukit Serdang', 5, 'ftromp@example.org', '2024-08-02 08:21:16', '$2y$12$rbKYAD/oXs9hY27SyiTOC.V5rYdKyqem02.oxVBw4aFXSnLcx4spe', '3rYDvB6pqO', '2024-08-02 08:21:16', '2024-08-02 08:21:16');

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
  MODIFY `msgid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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

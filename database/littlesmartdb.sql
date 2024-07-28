-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2024 at 08:03 PM
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_07_12_125725_edit_users_table', 1),
(5, '2024_07_12_130942_create_scores_table', 1);

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
  `postid` int(128) NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `image` text DEFAULT NULL,
  `createdtime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postid`, `userid`, `title`, `description`, `image`, `createdtime`) VALUES
(1, 100000, 'Pendaftaran Kemasukan 2025', '家长们别忘了今天开始可以帮2/1/2018-1/1/2019的孩子报名入学啰😊', 'thL59Vwgjho9Mb9XbRAnrnIqYQv3kOpi0ImjDnUI.jpg', '2024-07-20 00:52:18'),
(2, 100000, 'Christmas at Little Smart', '🌲 Christmas is around the corner 🌲', 'Gy5FEDDsnv0JVhvnq2nNic2M0rVwnLgzQ241kiaL.jpg', '2024-07-20 08:58:29'),
(3, 100000, 'Happy Holidays 🥳', NULL, 'oFauLATAn9Rid1r5iUdHxQkU19mxN8GdaBZhhVbX.jpg', '2024-07-20 15:07:13'),
(4, 100000, '安亲班招生啦！', '<p>报名电话： Novy <br />安亲班 <br />功课班 <br />补习班 <br />写作与理解并重 <br />优越的上课环境 <br />多元化的智能教学 <br />7岁~12岁</p>', NULL, '2024-07-20 15:16:45'),
(5, 100000, 'Teacher\'s Day', '谢谢家长送给老师们的教师节礼物😋', 'U6vSf1mFTkShv8ZtcRpjBDv89XCGotPLXCozPOep.jpg', '2024-07-23 11:31:05'),
(6, 100000, 'Recruitment', NULL, 'Lr4gxV7okCwaanQsjaOf3dNQtjBsT7pOjcvSx9Ew.jpg', '2024-07-23 11:32:13'),
(17, 100000, 'Early Bird Intake 2026', '<p>Little Smart Day Care Centre is open for early registrations!<br />If your child is age 7 to 12, has no one to look after between after-school and after-work hours,<br /><u>this is the place for you~</u><br />Reach out to us now to learn more!</p>', 'cszVJuucl4NflcjXoKKdHJvmCx59lTBSDGSBLBoD.png', '2024-07-28 14:48:48'),
(18, 100000, 'Congratulations to Top Scorers', '<p>Congratulations to these students, you\'ve done us proud!</p><table><thead><tr><th>Name</th><th>Subject</th><th>Score</th></tr></thead><tbody><tr><td>Camryn Lebsack</td><td>Mandarin</td><td>60</td></tr><tr><td>Camryn Lebsack</td><td>English</td><td>65</td></tr><tr><td>Camryn Lebsack</td><td>Malay</td><td>51</td></tr><tr><td>Miss Alfreda Moen</td><td>Math</td><td>89</td></tr><tr><td>Joana Ondricka</td><td>Science</td><td>86</td></tr></tbody></table>', NULL, '2024-07-28 14:50:17'),
(19, 100000, 'Analysis Jul 2025', '<p>sneak peek<a href=\"https://emojipedia.org/eyes\">👀</a></p>', 'aKWYwyvYdCUoLR4wBYI4Vx3YiyUQbYeYwYl95PlM.png', '2024-07-28 14:51:44'),
(20, 100000, 'Do you know?', '<p><strong>A lot of alumni</strong> stated their academics improved after attending tuition.<br />Consider join us now!</p>', NULL, '2024-07-28 14:59:23'),
(21, 100000, 'Snack Time!', '', 'f7c4L6aOJmWqDq4v5FGWUGTLfZM40TlndXXh2t6A.jpg', '2024-07-28 15:02:17'),
(22, 100000, 'Guess the Image!', '<p>it\'s a cotton candy machine! we offer fun activities every now and then for students to enjoy</p>', '7iEsW7Er6OU2HR24Z8zoTldiqEubJozFcjw7CbRe.jpg', '2024-07-28 15:03:03'),
(23, 100000, 'Creativity Over the Roof', '<p>Check out what our students have made!</p>', 'oT0G66HE1NnZ00PvoKCBbKHPcHLjNfDM7FgL5Ovg.jpg', '2024-07-28 15:03:48'),
(24, 100000, 'CNY 2023', '<p>Little Smart Day Care Centre wishes everyone a happy CNY!</p>', 'lJGCCAsWnzWYr7UE02EaHCyLk1R8fWH8QxcXEFmk.jpg', '2024-07-28 15:09:06'),
(25, 100000, 'UASA New Format (Important)!', '<p>Want to score A+ in malay in UASA 2030? <br />Join us to learn how!</p>', 'MYXhesOiRSEzvHBVGP7e4IaLVyDn3yDe6yhgblVW.jpg', '2024-07-28 15:09:48');

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
(1, 444271, 58, 24, 50, 25, 18),
(2, 993288, 60, 65, 51, 45, 67),
(3, 573284, 17, 38, 51, 52, 86),
(4, 236087, 3, 61, 33, 89, 59),
(5, 929361, 42, 64, 46, 75, 40);

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
('jnwWJq1aa8vWwUH1KfYEap7BS3bF9K0KKhhnsHDv', 100000, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiRmxERFJPSEdNRjkzaHpEaGRvTlk4SklRZXJpcDBqRFpvUGN2V0ljWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hbmFseXNpcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEwMDAwMDtzOjE2OiJsYXN0QWN0aXZpdHlUaW1lIjtpOjE3MjIxODkzMDQ7fQ==', 1722189304);

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
(100000, 'admin', 'Admin', 'teacher', 99, '012-3456789', 'SJK(C) Bukit Serdang', 2, 'admin@gmail.com', '2024-07-12 05:40:42', '$2y$12$q5Vbu49FMC5aa778etZX7OqAi6T6l7KCsHjA1bAqxWJzUQF3ulO1i', 'SPI9XbBgc8IrBydkjD668ae0abPxkyUKuSpaw7OrUq9M7mTdWovJ0YqRZ0VL', '2024-07-12 05:40:43', '2024-07-12 05:40:43'),
(236087, 'alena.lowe', 'Miss Alfreda Moen', 'student', 10, '013-2237912', 'SJK(C) Bukit Serdang', 4, 'nhowe@example.net', '2024-07-12 05:40:43', '$2y$12$fEo6LR.qP03Aj3P5Bds26uc6WkBoTedu0BjPhSSIeEiTYbSlnTfCi', 'QME0U1h4Va', '2024-07-12 05:40:43', '2024-07-12 05:40:43'),
(444271, 'aidan.gleichner', 'Nannie Conroy IV', 'student', 10, '013-8953231', 'SJK(C) Bukit Serdang', 4, 'maggio.alek@example.org', '2024-07-12 05:40:43', '$2y$12$fEo6LR.qP03Aj3P5Bds26uc6WkBoTedu0BjPhSSIeEiTYbSlnTfCi', 'JZDnEbU9b3', '2024-07-12 05:40:43', '2024-07-12 05:40:43'),
(573284, 'kuhn.zoie', 'Joana Ondricka', 'student', 8, '018-7924450', 'SJK(C) Bukit Serdang', 2, 'ewald94@example.net', '2024-07-12 05:40:43', '$2y$12$fEo6LR.qP03Aj3P5Bds26uc6WkBoTedu0BjPhSSIeEiTYbSlnTfCi', 'SXQDzJ0ys8', '2024-07-12 05:40:43', '2024-07-12 05:40:43'),
(929361, 'wisozk.bettye', 'Mrs. Lilyan Monahan PhD', 'student', 12, '015-6094506', 'SJK(C) Bukit Serdang', 6, 'maryjane71@example.com', '2024-07-12 05:40:43', '$2y$12$fEo6LR.qP03Aj3P5Bds26uc6WkBoTedu0BjPhSSIeEiTYbSlnTfCi', 'NiYM6pbOS6', '2024-07-12 05:40:43', '2024-07-12 05:40:43'),
(993288, 'brennon.ondricka', 'Camryn Lebsack', 'student', 7, '011-30093359', 'SJK(C) Bukit Serdang', 1, 'hertha.donnelly@example.net', '2024-07-12 05:40:43', '$2y$12$fEo6LR.qP03Aj3P5Bds26uc6WkBoTedu0BjPhSSIeEiTYbSlnTfCi', 'deWXKeEOo8', '2024-07-12 05:40:43', '2024-07-12 05:40:43');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postid` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `scoreid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

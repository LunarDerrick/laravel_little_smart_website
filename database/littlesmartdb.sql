-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2024 at 05:41 PM
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
(1, 100000, 'Qui animi quia dolorum aliquam.', 'Est fugit laboriosam recusandae fuga deserunt molestias porro. Illum eaque quam eveniet nostrum ut dolorem. Iusto eum impedit aut et dolores rerum. Nihil rem architecto eius qui enim ab id delectus.', 0, '2022-03-04 16:46:09'),
(2, 120868, 'Sapiente perspiciatis quod omnis.', 'Non aut enim dignissimos modi. Illum quos temporibus incidunt molestias. Rerum ducimus quos sit molestias earum iure.', 0, '2020-02-12 22:58:00'),
(3, 406795, 'Ut necessitatibus voluptatem illum autem veniam perferendis deleniti.', 'Sunt voluptatem nam omnis voluptatem incidunt omnis voluptas. Quae quidem similique ut aut velit. Expedita ad vero deserunt nihil. Quis eligendi quis optio aut sint eum nisi aut.', 0, '2019-01-30 18:41:53'),
(4, 120868, 'Quasi dolor qui enim voluptas fuga beatae.', 'Molestias veritatis ipsa consequuntur non odio deleniti fuga at. In laudantium provident quibusdam aspernatur numquam occaecati quia. Quasi voluptatem rem quia est delectus dolor. Asperiores ad inventore dolores veritatis animi nulla.', 0, '2023-05-05 17:52:05'),
(5, 406795, 'Unde adipisci iure facilis et ratione iure ex aut.', 'Aut quo delectus et debitis et in. Totam nihil hic voluptas laborum et sequi dignissimos. Aperiam sunt asperiores provident architecto nihil. Odit mollitia unde aliquam eum eos rerum laudantium.', 0, '2019-11-18 20:33:44'),
(6, 143264, 'Deleniti id adipisci nesciunt tempore exercitationem provident.', 'Sed ipsum eaque consequatur ut dicta quia. Reiciendis a et enim. Quasi amet tenetur accusamus ea. Fuga omnis praesentium earum dolor voluptates repellendus.', 0, '2024-02-01 04:47:07'),
(7, 390987, 'Voluptas dolore nulla corporis repellat.', 'Velit cupiditate ut et. Quis et consequuntur sed nemo a dolorem recusandae. Dolor sapiente repellat laborum voluptatum tenetur.', 0, '2022-04-21 19:44:00'),
(8, 120868, 'Ut est et molestiae omnis molestiae vel.', 'Ipsa unde occaecati praesentium vel magnam ducimus. Repellendus error quia ut. Vitae tempora at rem. Recusandae velit enim voluptatem laboriosam sit qui.', 0, '2021-05-02 22:41:20'),
(9, 100000, 'Alias quibusdam at error perspiciatis enim sit deleniti.', 'Fuga mollitia modi magni et suscipit vitae. Tenetur unde eligendi ipsum harum hic quia. Eligendi rem rem ut et repellat.', 0, '2019-08-30 11:20:08'),
(10, 120868, 'Amet aut quidem dolor illum aliquam quaerat temporibus.', 'Sint qui error sint magnam neque harum sapiente. Temporibus placeat ea sit tempora. Aut sequi sint atque non quos rerum consequatur. Ea laboriosam sed similique quo autem quia. Quo saepe accusamus ab fugit architecto eum.', 0, '2022-01-30 15:35:25'),
(11, NULL, 'Et in eveniet nisi.', 'Quas voluptatem quisquam quo et atque deleniti. Atque culpa deleniti nemo eum id quo dolor. Et natus accusamus voluptatem vero. Non nobis ratione sunt.', 0, '2019-10-20 09:12:53'),
(12, NULL, 'Est error sequi in nisi excepturi quos aut modi.', 'Labore dolor ut aliquid aliquam quisquam eaque vel. Dolores deleniti odit numquam reiciendis provident molestiae enim dolor. Voluptas odio autem molestiae mollitia sunt et at.', 0, '2023-03-12 05:50:03'),
(13, 143264, 'Eos recusandae aut velit dolor corrupti deserunt dolorem.', 'Nesciunt ducimus earum pariatur velit. Aspernatur quisquam sequi sunt numquam. Nulla aliquid voluptates labore sit ut atque.', 0, '2023-02-06 05:29:29'),
(14, NULL, 'Excepturi numquam illo perferendis qui voluptatibus delectus.', 'Molestiae laborum perferendis error ea. Perferendis quia quisquam aut rem blanditiis aut saepe quasi. Accusamus neque excepturi sequi. Dolorem qui et adipisci adipisci aspernatur libero.', 0, '2019-12-06 22:55:45'),
(15, 100000, 'Et nihil vitae recusandae dolore dignissimos.', 'Non beatae recusandae nulla quibusdam dolor. Ipsa iusto enim sit laudantium voluptatum harum. Iusto id nemo quo accusamus.', 0, '2020-08-02 09:42:00'),
(16, 120868, 'Tempore nesciunt velit repellat blanditiis libero eos.', 'Autem eius pariatur laborum ducimus unde eligendi. Quod labore sed pariatur quae vitae et. Voluptatem veritatis fugit asperiores rerum sint velit dicta. Quidem fuga labore quo iusto quos fugit ut.', 0, '2019-06-19 02:48:07'),
(17, NULL, 'Sunt corporis temporibus sunt magni inventore esse quia est.', 'Provident et consequatur est. Vel delectus eveniet corrupti rerum iure delectus. Soluta et debitis consequuntur in.', 0, '2020-06-17 20:39:24'),
(18, 143264, 'Ad itaque deserunt nihil deserunt vel suscipit deleniti quas.', 'Repudiandae cupiditate id repellendus voluptatibus et asperiores aperiam. Hic praesentium ea minima corrupti non. Autem consectetur qui deleniti illo animi consequatur. Quisquam omnis error in esse magni.', 0, '2023-02-09 01:37:20'),
(19, 390987, 'Veniam dignissimos repellat ducimus molestiae aut aut.', 'Doloremque sapiente voluptatem qui nesciunt dignissimos. Illum non aut quibusdam et blanditiis eveniet. Sit eos omnis libero.', 0, '2019-10-13 03:36:24'),
(20, 390987, 'Magnam numquam qui atque placeat animi tenetur voluptatum.', 'Error et consequatur laborum eius. Iusto earum iusto a doloremque eos aut aut. Molestias dignissimos hic nam ut quae quae vitae. Sequi ut aut sed quis facere nemo.', 0, '2020-04-26 03:43:40'),
(21, 100000, 'Illum quae velit quos tempore officia.', 'Eligendi quia beatae quia soluta blanditiis earum ullam aspernatur. Ut enim molestias placeat officiis aut fuga. Omnis eius incidunt sapiente ea aut reprehenderit odit. Qui ducimus provident non aliquam voluptas quia necessitatibus magni.', 0, '2022-04-30 01:41:38');

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
(204, '0001_01_01_000000_create_users_table', 1),
(205, '0001_01_01_000001_create_cache_table', 1),
(206, '0001_01_01_000002_create_jobs_table', 1),
(207, '2024_07_12_125725_edit_users_table', 1),
(208, '2024_07_12_130942_create_scores_table', 1),
(209, '2024_07_30_163147_create_posts_table', 1),
(210, '2024_08_01_235052_create_feedbacks_table', 1);

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
(1, 100000, 'Et ratione nesciunt ut nostrum ut.', 'Ut aut quisquam aut non fugiat aut. Qui omnis quia enim aut sit. Quia sed aut et aspernatur iure.', '66b243ee78b96.jpg', '2022-03-09 21:35:10'),
(2, 100000, 'Minus voluptate sint ipsa consequatur inventore.', 'Quae quia magni perspiciatis est qui dolores. Placeat aliquid quibusdam sint. Dolor reprehenderit accusantium veniam ut.', '66b243f07d83f.jpg', '2023-03-22 16:02:07'),
(3, 100000, 'Natus voluptatem dolor ea ut voluptate inventore.', 'Rerum placeat veritatis reprehenderit aut laborum. Esse aut enim iure voluptas suscipit ut ipsam eius. Illum eum quis laudantium ea magnam vel.', '66b243f2304ec.jpg', '2020-08-16 15:08:33'),
(4, 100000, 'Et deleniti id quia cum cum.', 'Repellat quisquam impedit est repudiandae sed. Est ut dolor accusantium id.', '66b243f3cdd6c.jpg', '2021-03-13 15:33:16'),
(5, 100000, 'Asperiores laborum vitae est corrupti exercitationem quaerat et.', 'Animi nobis id dolores sunt sit ratione voluptas ipsam. Exercitationem magni et sit. Et nam ut commodi labore ab et.', '66b243f570c64.jpg', '2019-09-22 06:18:28'),
(6, 100000, 'Similique aliquid perferendis maxime debitis.', 'Rem et omnis veniam sequi aliquam minus ea. Voluptatibus non explicabo labore et.', '66b243f74f216.jpg', '2023-05-09 21:32:44');

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
(1, 390987, 48, 61, 66, 92, 30),
(2, 143264, 9, 66, 10, 83, 81),
(3, 406795, 39, 56, 87, 89, 33),
(4, 832001, 26, 56, 59, 68, 71),
(5, 120868, 96, 37, 100, 43, 12);

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
(100000, 'admin', 'Admin', 'teacher', 99, '012-3456789', 'SJK(C) Bukit Serdang', 2, 'admin@gmail.com', '2024-08-06 15:40:30', '$2y$12$nkI0N0Ua1qghISGjdfMK9OLBd4rAB45zARE2HxOHg5Q8f5rgNHqf.', '5074avCNtE', '2024-08-06 15:40:30', '2024-08-06 15:40:30'),
(120868, 'walter.monahan', 'Ronaldo Aufderhar', 'student', 10, '011-50779911', 'SJK(C) Bukit Serdang', 4, 'justine.conn@example.com', '2024-08-06 15:40:30', '$2y$12$yghKmy2MLDZcm80upF/Wtuxc5I0UhV183bftRvMLkSlhHkVeqOO2G', 'ngldGZB3d1', '2024-08-06 15:40:30', '2024-08-06 15:40:30'),
(143264, 'cgrant', 'Mr. Davon Crist II', 'student', 9, '011-30963651', 'SJK(C) Bukit Serdang', 3, 'witting.deborah@example.org', '2024-08-06 15:40:30', '$2y$12$yghKmy2MLDZcm80upF/Wtuxc5I0UhV183bftRvMLkSlhHkVeqOO2G', 'S8Qj1EPbT0', '2024-08-06 15:40:30', '2024-08-06 15:40:30'),
(390987, 'okeefe.armand', 'Arnulfo O\'Connell', 'student', 7, '013-4886790', 'SJK(C) Bukit Serdang', 1, 'hdurgan@example.com', '2024-08-06 15:40:30', '$2y$12$yghKmy2MLDZcm80upF/Wtuxc5I0UhV183bftRvMLkSlhHkVeqOO2G', 'tPyiY7Dmhp', '2024-08-06 15:40:30', '2024-08-06 15:40:30'),
(406795, 'loy.casper', 'Jerry Block PhD', 'student', 12, '019-4621718', 'SJK(C) Bukit Serdang', 6, 'johathan.monahan@example.org', '2024-08-06 15:40:30', '$2y$12$yghKmy2MLDZcm80upF/Wtuxc5I0UhV183bftRvMLkSlhHkVeqOO2G', 'fnkiFQEERr', '2024-08-06 15:40:30', '2024-08-06 15:40:30'),
(832001, 'mante.geo', 'Tierra Howe', 'student', 11, '018-4005388', 'SJK(C) Bukit Serdang', 5, 'fredrick97@example.com', '2024-08-06 15:40:30', '$2y$12$yghKmy2MLDZcm80upF/Wtuxc5I0UhV183bftRvMLkSlhHkVeqOO2G', 'Z3uF54PADz', '2024-08-06 15:40:30', '2024-08-06 15:40:30');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

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

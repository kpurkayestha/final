-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2018 at 05:58 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(35, 'ধান চাষ', '2018-08-11 14:40:53', '2018-08-11 14:40:53'),
(36, 'পশু পালন', '2018-08-11 14:41:11', '2018-08-11 14:41:11'),
(37, 'মৎস্য চাষ', '2018-08-11 15:45:23', '2018-08-14 16:00:59');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_user_id` int(10) UNSIGNED NOT NULL,
  `comment_user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `comment_body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `question_user_id`, `comment_user_id`, `category_id`, `question_id`, `comment_body`, `created_at`, `updated_at`) VALUES
(4, 5, 19, 36, 3, 'খুব ভালো হয়েছে।', '2018-08-19 03:11:02', '2018-08-19 07:17:29'),
(9, 5, 9, 36, 3, '<p><strong>vas</strong></p>', '2018-08-20 01:21:20', '2018-08-20 01:23:08'),
(12, 5, 9, 36, 3, '<p>csc</p>', '2018-08-20 04:07:33', '2018-08-20 04:07:33');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Ashraf Hossan Shovo', 'ashrafshovo@gmail.com', 'This is subject', 'This is a test message.', '2018-08-14 14:25:12', '2018-08-14 14:25:12'),
(3, 'Kongkon Purkayestha', 'kpurkayestha@gmail.com', 'This is subject', 'This is a test message.', '2018-08-16 13:37:26', '2018-08-16 13:37:26'),
(4, 'Tawfiquzzaman Opu', 'opu.cse.32@gmail.com', 'This is subject', 'This is test', '2018-08-18 07:36:26', '2018-08-18 07:36:26');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_08_08_113942_create_categories_table', 1),
(4, '2018_08_08_114148_create_admins_table', 1),
(5, '2018_08_08_114319_create_contacts_table', 1),
(6, '2018_08_08_114418_create_replies_table', 2),
(7, '2018_08_08_114015_create_questions_table', 3),
(8, '2018_08_08_113842_create_requests_table', 4),
(9, '2018_08_08_114118_create_comments_table', 5),
(10, '2018_08_08_114639_create_votes_table', 6),
(11, '2018_08_08_114521_create_notifications_table', 7),
(12, '2018_08_20_103216_create_questionvotes_table', 8),
(13, '2018_08_20_114047_create_profilevisitors_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `notification_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `notification_user_id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `comment_id` int(10) UNSIGNED DEFAULT NULL,
  `vote_id` int(10) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profilevisitors`
--

CREATE TABLE `profilevisitors` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profilevisitors`
--

INSERT INTO `profilevisitors` (`id`, `user_id`, `ip`, `created_at`, `updated_at`) VALUES
(2, '19', '127.0.0.1', '2018-08-20 05:47:57', '2018-08-20 05:47:57');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `user_id`, `category_id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 10, 35, 'আমার ধান পোকায় নষ্ট করে ফেলেছে।', 'আমার এখন কী করা উচিত?', '2018-08-11 15:37:04', '2018-08-14 06:59:07'),
(3, 5, 36, 'আমার গরু চুরি হয়ে গেছে।', 'আমার একটি দেশী গাভী চুরি হয়ে গেছে। এখন আমার কী করণীয়?', '2018-08-12 02:29:06', '2018-08-12 02:29:06'),
(4, 19, 37, 'আমার পুকুরের মাছের ফুলকা পচা রোগ হয়েছে।', 'আমার পুকুরের মাছের ফুলকা পচা রোগ হয়েছে। এমতাবস্থায় আমার কী করণীয়?', '2018-08-19 04:58:37', '2018-08-19 08:22:35');

-- --------------------------------------------------------

--
-- Table structure for table `questionvotes`
--

CREATE TABLE `questionvotes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questionvotes`
--

INSERT INTO `questionvotes` (`id`, `user_id`, `question_id`, `status`, `created_at`, `updated_at`) VALUES
(14, '9', '4', 'like', '2018-08-20 05:15:00', '2018-08-20 05:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `request_user_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` enum('User','Admin','Editor','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'User',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirm_email` tinyint(4) NOT NULL DEFAULT '0',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `pro_pic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `about` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT 'N/A',
  `university` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `ban` tinyint(4) NOT NULL DEFAULT '0',
  `profile_visitor` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `confirm_email`, `password`, `provider`, `provider_id`, `pro_pic`, `about`, `university`, `location`, `ban`, `profile_visitor`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'User', 'Shishir Das', 'ranakom007@gmail.com', 0, '$2y$10$E5AZgWD6.6qqIV5BW8wtHucl3y90ptR1944YmjcjsuL2ED3.jnvt.', '0', '0', 'default.jpg', 'N/A', 'N/A', 'N/A', 0, 0, 'XHM8bL96oBE1ukuis3rLUfuPiFdIxMwbzeXfFBPXJKVK0jjremz16kkBQRlO', '2018-08-10 07:46:57', '2018-08-10 07:46:57'),
(5, 'User', 'Ashraf Hossan Shovo', 'ashrafshovo@gmail.com', 0, '$2y$10$7v25iK7gixDtVtSoYuPGyeT64zAQpAVRdgldZDWfO4xCLxpdSrqkG', '0', '0', 'default.jpg', 'N/A', 'Metropolitan University, Sylhet', 'Sylhet, Bangladesh', 0, 0, 'DNbuSByk2tJetYW1ot2QhOuN4Bw3oxaweSXnzSE0UalLEHKY6v8RHxtjFDbE', '2018-08-10 07:49:56', '2018-08-12 06:26:47'),
(6, 'Admin', 'Admin', 'admin@admin.com', 0, '$2y$10$Zy.HRBhSYDX6gn67ArzOsOoH1J0IW8P8pU719Ac.YHvwKLd7.4LYu', '0', '0', 'default.jpg', 'N/A', 'N/A', 'Sylhet, Bangladesh', 0, 0, 'jKj9gnZGHnNNw4wjLaxYnweR9OeoKg7WH87uZiiRZi3KmYbpqf6pqndcVIEc', '2018-08-10 01:25:20', '2018-08-16 14:06:43'),
(7, 'User', 'Tawfiquzzaman Opu', 'opu.cse32@gmail.com', 0, '$2y$10$EkOLFoSF3zZQBnsWzKgnB.3aKV8js83GoCntTi1BF9aSXwhrrchmC', '0', '0', 'default.jpg', 'N/A', 'Metropolitan University, Sylhet', 'Sylhet, Bangladesh', 0, 0, 'm3Vwl1L5bTj1FVMsLtBG2KSZnvDnjeTJShpmHpqYy8cmI4U2KybMo8YKdvsz', '2018-08-10 10:59:56', '2018-08-18 14:04:02'),
(8, 'User', 'Debasis Bose', 'debu@gmail.com', 0, '$2y$10$2efYRUhEN.ZBBfkAN.SffOIAxuvTSbOhoyER83r4gXH4kbbjcn8nq', '0', '0', 'default.jpg', 'N/A', 'Metropolitan University, Sylhet', 'Sylhet, Bangladesh', 0, 0, 'tdGv5N192nq5XCZiJDrPYRbFNiZm8KyBRjSKaHlVgR9Pc6rLlKYjViZQvk1d', '2018-08-10 11:18:31', '2018-08-16 13:45:00'),
(9, 'User', 'Ranak Braman', 'ranakom@gmail.com', 0, '$2y$10$Ct3yR4kR0qRJ.1UZPPtyluwmpzrxcg/SFi.cOgC/ytmUDMKPuJ1Yy', '0', '0', 'default.jpg', 'N/A', 'N/A', 'N/A', 0, 0, 'J2oXHgUz3tyi9qg2jHwE5SLupWGGTVlQDpkAnpwypFxDDQotkEK3l9NGECKu', '2018-08-10 11:24:54', '2018-08-10 11:24:54'),
(10, 'User', 'Amit Purkayestha', 'amit@gmail.com', 0, '$2y$10$JI1BEFCTF01V40mmrN52IeYV780aoNJqBvogeEUAgXfk4to6Ren5.', '0', '0', 'default.jpg', 'N/A', 'Jamalgonj Degree College', 'Jamalgonj, Sunamganj', 0, 0, 'rLYoSiUO3nleGCXT8TUlV9GlkMWmkISx7ElYGWliLlHS1gW6uvxKL017Z4OO', '2018-08-11 13:33:27', '2018-08-14 06:20:18'),
(17, 'User', 'কংকন পুরকায়স্থ', 'kpurkayestha@gmail.com', 0, NULL, 'facebook', '1693228947462845', 'default.jpg', 'N/A', 'N/A', 'N/A', 0, 0, 'G3zu932H8OE3UkmYHYHOhaLPj2hCSi4xhU1qwqAYSqXT82Hv71tVeeNgXhPd', '2018-08-14 05:03:43', '2018-08-14 05:03:43'),
(18, 'Editor', 'Editor', 'editor@editor.com', 0, '$2y$10$keHi9FbbC18CmWJTj1ovIeFqrGXBzr8BPQ4ElU.skbGOItPrkCHbm', '0', '0', 'default.jpg', 'N/A', 'N/A', 'N/A', 0, 0, NULL, '2018-08-16 13:42:23', '2018-08-16 13:42:23'),
(19, 'User', 'Nazmul Hossan Ovi', 'ovi2015@gmail.com', 0, '$2y$10$1RRQxWMnLyM5Q9TO0snxCeSHmf3UaSPL5KmS/KaEdkNfzsfIm1ATm', '0', '0', 'default.jpg', 'N/A', 'Sylhet Polytechnic Institiute', 'Sylhet, Bangladesh', 0, 1, 'h4pmsbVaOV0bRECo002bp7A3LfHol04WDlrNjP16vA7lKXTkMoK4tYPLPCmA', '2018-08-18 13:13:52', '2018-08-20 05:47:57');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `like` tinyint(4) DEFAULT '0',
  `dislike` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `question_id`, `like`, `dislike`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 0, NULL, NULL),
(2, 3, 0, 0, NULL, NULL),
(3, 4, 1, 0, NULL, '2018-08-20 05:15:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_question_user_id_foreign` (`question_user_id`),
  ADD KEY `comments_comment_user_id_foreign` (`comment_user_id`),
  ADD KEY `comments_category_id_foreign` (`category_id`),
  ADD KEY `comments_question_id_foreign` (`question_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_id_foreign` (`user_id`),
  ADD KEY `notifications_notification_user_id_foreign` (`notification_user_id`),
  ADD KEY `notifications_question_id_foreign` (`question_id`),
  ADD KEY `notifications_comment_id_foreign` (`comment_id`),
  ADD KEY `notifications_vote_id_foreign` (`vote_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `profilevisitors`
--
ALTER TABLE `profilevisitors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `questions_user_id_foreign` (`user_id`),
  ADD KEY `questions_category_id_foreign` (`category_id`);

--
-- Indexes for table `questionvotes`
--
ALTER TABLE `questionvotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requests_user_id_foreign` (`user_id`),
  ADD KEY `requests_request_user_id_foreign` (`request_user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `votes_question_id_foreign` (`question_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profilevisitors`
--
ALTER TABLE `profilevisitors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `questionvotes`
--
ALTER TABLE `questionvotes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `comments_comment_user_id_foreign` FOREIGN KEY (`comment_user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`),
  ADD CONSTRAINT `comments_question_user_id_foreign` FOREIGN KEY (`question_user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`),
  ADD CONSTRAINT `notifications_notification_user_id_foreign` FOREIGN KEY (`notification_user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `notifications_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`),
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `notifications_vote_id_foreign` FOREIGN KEY (`vote_id`) REFERENCES `votes` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `questions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_request_user_id_foreign` FOREIGN KEY (`request_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

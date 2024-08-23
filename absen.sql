-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 12, 2024 at 10:40 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absen`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint UNSIGNED NOT NULL,
  `attendances_teacher_id` bigint NOT NULL,
  `attendances_subject_id` bigint NOT NULL,
  `attendances_grade_id` bigint NOT NULL,
  `attendances_student_id` json NOT NULL,
  `attendances_status` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `attendances_teacher_id`, `attendances_subject_id`, `attendances_grade_id`, `attendances_student_id`, `attendances_status`, `created_at`, `updated_at`) VALUES
(10, 1, 2, 1, '\"1|2\"', '\"1|2\"', '2024-06-12 10:09:45', '2024-06-12 10:09:45'),
(11, 5, 1, 2, '\"3\"', '\"1\"', '2024-06-12 10:29:07', '2024-06-12 10:29:07'),
(12, 5, 1, 1, '\"1|2\"', '\"1|1\"', '2024-06-12 10:29:43', '2024-06-12 10:29:43'),
(13, 1, 2, 1, '\"1|2\"', '\"2|2\"', '2024-06-12 10:30:08', '2024-06-12 10:30:08'),
(14, 5, 2, 7, '\"4\"', '\"1\"', '2024-06-12 10:37:34', '2024-06-12 10:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'X IPA 1', '2024-06-03 07:30:29', '2024-06-03 07:30:29'),
(2, 'X IPA 2', '2024-06-03 07:30:42', '2024-06-03 07:30:42'),
(3, 'XI IPA 1', '2024-06-03 07:30:55', '2024-06-03 07:30:55'),
(4, 'XI IPA 2', '2024-06-03 07:31:07', '2024-06-03 07:31:07'),
(5, 'XII IPA 1', '2024-06-03 07:31:26', '2024-06-03 07:31:26'),
(6, 'XII IPA 2', '2024-06-03 07:31:36', '2024-06-03 07:31:36'),
(7, 'XII IPS 1', '2024-06-12 10:28:14', '2024-06-12 10:28:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_19_102456_create_permission_tables', 1),
(6, '2022_03_29_105225_create_settings_table', 1),
(7, '2024_05_12_011329_create_posts_table', 1),
(8, '2024_05_12_123958_create_categories_table', 1),
(9, '2024_06_03_022628_create_grades_table', 2),
(10, '2024_06_03_023305_create_subjects_table', 3),
(11, '2024_06_03_025553_create_teachers_table', 4),
(12, '2024_06_06_043159_create_students_table', 5),
(13, '2024_06_08_123135_create_attendances_table', 6),
(14, '2024_06_08_123137_create_attendances_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(1, 'App\\Models\\User', 4),
(1, 'App\\Models\\User', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'filemanager', 'web', '2024-06-03 07:18:05', '2024-06-03 07:18:05'),
(2, 'read module', 'web', '2024-06-03 07:18:05', '2024-06-03 07:18:05'),
(3, 'delete setting', 'web', '2024-06-03 07:18:05', '2024-06-03 07:18:05'),
(4, 'update setting', 'web', '2024-06-03 07:18:05', '2024-06-03 07:18:05'),
(5, 'read setting', 'web', '2024-06-03 07:18:05', '2024-06-03 07:18:05'),
(6, 'create setting', 'web', '2024-06-03 07:18:05', '2024-06-03 07:18:05'),
(7, 'delete user', 'web', '2024-06-03 07:18:05', '2024-06-03 07:18:05'),
(8, 'update user', 'web', '2024-06-03 07:18:05', '2024-06-03 07:18:05'),
(9, 'read user', 'web', '2024-06-03 07:18:05', '2024-06-03 07:18:05'),
(10, 'create user', 'web', '2024-06-03 07:18:05', '2024-06-03 07:18:05'),
(11, 'delete role', 'web', '2024-06-03 07:18:06', '2024-06-03 07:18:06'),
(12, 'update role', 'web', '2024-06-03 07:18:06', '2024-06-03 07:18:06'),
(13, 'read role', 'web', '2024-06-03 07:18:06', '2024-06-03 07:18:06'),
(14, 'create role', 'web', '2024-06-03 07:18:06', '2024-06-03 07:18:06'),
(15, 'delete permission', 'web', '2024-06-03 07:18:06', '2024-06-03 07:18:06'),
(16, 'update permission', 'web', '2024-06-03 07:18:06', '2024-06-03 07:18:06'),
(17, 'read permission', 'web', '2024-06-03 07:18:06', '2024-06-03 07:18:06'),
(18, 'create permission', 'web', '2024-06-03 07:18:06', '2024-06-03 07:18:06');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint NOT NULL,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'web', '2024-06-03 07:18:06', '2024-06-03 07:18:06'),
(2, 'admin', 'web', '2024-06-03 07:18:06', '2024-06-03 07:18:06'),
(3, 'operator', 'web', '2024-06-03 07:18:06', '2024-06-03 07:18:06');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ext` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` enum('information','contact','payment','email','api') COLLATE utf8mb4_unicode_ci DEFAULT 'information',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `name`, `type`, `ext`, `category`, `created_at`, `updated_at`) VALUES
(1, 'app_name', 'Absensi', 'Application Short Name', 'text', NULL, 'information', '2024-06-03 07:18:06', '2024-06-12 10:35:56'),
(2, 'app_short_name', 'SMPIT FITRAH INSANI 3', 'Application Name', 'text', NULL, 'information', '2024-06-03 07:18:06', '2024-06-12 10:35:56'),
(3, 'app_logo', 'storage/SMP.png', 'Application Logo', 'file', 'png', 'information', '2024-06-03 07:18:06', '2024-06-12 10:35:56'),
(4, 'app_favicon', 'storage/SMP.png', 'Application Favicon', 'file', 'png', 'information', '2024-06-03 07:18:06', '2024-06-12 10:35:56'),
(5, 'app_loading_gif', 'storage/SMP.png', 'Application Loading Image', 'file', 'gif', 'information', '2024-06-03 07:18:06', '2024-06-12 10:35:56'),
(6, 'app_map_loaction', 'https://www.google.com/maps/place/Kajen,+Kec.+Kajen,+Kabupaten+Pekalongan,+Jawa+Tengah/@-7.0319606,109.5291791,13z/data=!3m1!4b1!4m5!3m4!1s0x2e6fe01fab873f61:0xc109484cee38731e!8m2!3d-7.0269252!4d109.5811772', 'Application Map Location', 'textarea', NULL, 'contact', '2024-06-03 07:18:06', '2024-06-03 07:18:06');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint UNSIGNED NOT NULL,
  `grades_id` bigint NOT NULL,
  `student_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `grades_id`, `student_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Irfan Jaya', '2024-06-07 17:06:25', '2024-06-07 17:06:25'),
(2, 1, 'Mustofa', '2024-06-07 17:07:12', '2024-06-07 17:07:12'),
(3, 2, 'Suherman', '2024-06-12 10:27:48', '2024-06-12 10:27:48'),
(4, 7, 'Juwita', '2024-06-12 10:28:36', '2024-06-12 10:28:36');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint UNSIGNED NOT NULL,
  `name_subjects` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name_subjects`, `created_at`, `updated_at`) VALUES
(1, 'Matematika', '2024-06-03 07:39:27', '2024-06-03 07:39:27'),
(2, 'Fisika', '2024-06-03 07:39:39', '2024-06-03 07:39:39'),
(4, 'Bahasa Indonesia', '2024-06-12 10:27:16', '2024-06-12 10:27:16');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint UNSIGNED NOT NULL,
  `subjects_id` bigint NOT NULL,
  `teachers_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `subjects_id`, `teachers_name`, `created_at`, `updated_at`) VALUES
(1, 2, '1', '2024-06-06 04:52:13', '2024-06-06 04:52:13'),
(2, 1, '2', '2024-06-06 05:17:40', '2024-06-06 05:17:40'),
(4, 2, '5', '2024-06-12 10:26:04', '2024-06-12 10:26:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', 'superadmin@superadmin.com', NULL, '$2y$10$OUs4dVz7h7gcB1FbglNFbuyyxJCTIYfEMXHeYCw5pePPoeg609GW.', 'JKaaqd3RL8bPv7V5qGeUh1VDZYUJk12WFAeMkX7z5H9zbZJVWg0sA9j3cbtu', '2024-06-03 07:18:06', '2024-06-03 07:18:06'),
(2, 'Admin', 'admin@admin.com', NULL, '$2y$10$JaJLcn.0CfnysQV0BEMW.OAL/kIVW.DsPKQNA/er9s2Fog2BN0FH.', NULL, '2024-06-03 07:18:06', '2024-06-03 07:18:06'),
(3, 'Operator', 'operator@operator.com', NULL, '$2y$10$XFZajJeIyHMpzR5dKIBzR.ZA8nSnvyXtbLlh/oovVJpDYPTfpTgTO', NULL, '2024-06-03 07:18:06', '2024-06-03 07:18:06'),
(4, 'Maman', 'maman@gmail.com', NULL, '$2y$10$YL0HjomvVDsE1N6XeTYs7.4iyZEkBZDI17ozc4UD7862oBUXvQUPa', NULL, '2024-06-12 10:24:30', '2024-06-12 10:24:30'),
(5, 'Tatang', 'tatang@gmail.com', NULL, '$2y$10$.d/j4EJRfz7HoPXnmi1ewuSfcljwcRk/CiqGcgUW1Q3HeDSo9SOea', 'OYkoMgoe0oZ6iG1KzOw8IzYtdUXrsO5ToMPCKdnX2h8a76GjKe3Moqn1b6sH', '2024-06-12 10:25:42', '2024-06-12 10:25:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

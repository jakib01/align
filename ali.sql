-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2025 at 02:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aligned`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `admin_name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'rudy', 'rudy@gmail.com', NULL, '$2y$10$9LSFNWt7cXhFnHdJ2u0D4OuOBHhvAmMR8ji67p6qsAW.C4iYezFVi', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `candidate_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `skill_assesment_score` int(11) DEFAULT 0,
  `value_assesment_score` int(11) DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `candidate_name`, `email`, `skill_assesment_score`, `value_assesment_score`, `email_verified_at`, `password`, `created_at`, `updated_at`) VALUES
(1, 'rudy', 'rudy@gmail.com', 60, 70, NULL, '$2y$10$9LSFNWt7cXhFnHdJ2u0D4OuOBHhvAmMR8ji67p6qsAW.C4iYezFVi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `membership_id` int(255) NOT NULL,
  `job_posts_count` int(255) NOT NULL,
  `employers_name` varchar(255) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`id`, `membership_id`, `job_posts_count`, `employers_name`, `contact_name`, `email`, `email_verified_at`, `password`, `created_at`, `updated_at`) VALUES
(1, 3, 6, 'rudy', 'rudy', 'rudy@gmail.com', NULL, '$2y$10$9LSFNWt7cXhFnHdJ2u0D4OuOBHhvAmMR8ji67p6qsAW.C4iYezFVi', NULL, NULL);

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
-- Table structure for table `hours`
--

CREATE TABLE `hours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hours` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hours`
--

INSERT INTO `hours` (`id`, `hours`, `created_at`, `updated_at`) VALUES
(1, 'Standard', NULL, NULL),
(2, 'Flexible', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `industries` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `industries`, `created_at`, `updated_at`) VALUES
(1, 'Technology', NULL, NULL),
(2, 'Finance', NULL, NULL),
(3, 'HealthCare', NULL, NULL),
(4, 'Education', NULL, NULL),
(5, 'Other', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_applieds`
--

CREATE TABLE `job_applieds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_post_id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `candidate_name` varchar(255) NOT NULL,
  `save_applicant` int(10) DEFAULT NULL,
  `first_interview` int(10) DEFAULT NULL,
  `first_interview_date` datetime DEFAULT NULL,
  `second_interview` int(10) DEFAULT NULL,
  `second_interview_date` datetime DEFAULT NULL,
  `third_interview` int(10) DEFAULT NULL,
  `third_interview_date` datetime DEFAULT NULL,
  `offerletter` int(11) DEFAULT NULL,
  `offerletter_message` varchar(255) DEFAULT NULL,
  `accept_offerletter` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_applieds`
--

INSERT INTO `job_applieds` (`id`, `job_post_id`, `job_title`, `candidate_id`, `candidate_name`, `save_applicant`, `first_interview`, `first_interview_date`, `second_interview`, `second_interview_date`, `third_interview`, `third_interview_date`, `offerletter`, `offerletter_message`, `accept_offerletter`, `created_at`, `updated_at`) VALUES
(23, 4, 'programmer', 1, 'rudy', 1, 1, '2025-01-05 18:27:00', NULL, NULL, 3, '2025-01-01 16:26:00', 1, 'congo, you are hired', 1, '2024-12-25 23:44:10', '2025-01-05 01:42:09'),
(24, 5, 'security', 2, 'kashem', 1, 1, '2025-01-01 16:26:00', 2, '2025-02-06 16:26:00', 3, '2025-01-09 16:27:00', 1, 'congo', NULL, '2024-12-25 23:44:15', '2025-01-05 01:51:22'),
(25, 6, 'software', 1, 'rudy', 1, 1, '2025-02-02 15:24:00', 2, '2025-02-03 17:26:00', 3, '2025-01-10 16:27:00', NULL, NULL, NULL, '2024-12-25 23:44:17', '2024-12-25 23:44:17');

-- --------------------------------------------------------

--
-- Table structure for table `job_locations`
--

CREATE TABLE `job_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_location` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_locations`
--

INSERT INTO `job_locations` (`id`, `job_location`, `created_at`, `updated_at`) VALUES
(1, 'Remote', NULL, NULL),
(2, 'Onsite', NULL, NULL),
(3, 'Hybrid', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_posts`
--

CREATE TABLE `job_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employer_name` varchar(255) NOT NULL,
  `companyname` varchar(255) DEFAULT NULL,
  `job_post_id` int(255) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `seniority_level_id` int(11) NOT NULL,
  `salary_range` varchar(255) NOT NULL,
  `industry_id` int(11) NOT NULL,
  `job_location_id` int(11) NOT NULL,
  `working_pattern_id` int(11) NOT NULL,
  `hours_id` int(11) NOT NULL,
  `sponsorship` varchar(255) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `role_exists_text` longtext NOT NULL,
  `role_exists_involve` longtext NOT NULL,
  `is_deleted` int(11) DEFAULT NULL,
  `approve` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_posts`
--

INSERT INTO `job_posts` (`id`, `employer_name`, `companyname`, `job_post_id`, `job_title`, `seniority_level_id`, `salary_range`, `industry_id`, `job_location_id`, `working_pattern_id`, `hours_id`, `sponsorship`, `skill_id`, `role_exists_text`, `role_exists_involve`, `is_deleted`, `approve`, `created_at`, `updated_at`) VALUES
(4, 'xyx', 'hsbc', 8789, 'programmer', 3, '50k-100k', 3, 2, 2, 2, 'Yes', 3, 'it\'s a good job', 'it\'s a good job', NULL, 1, '2024-11-08 23:10:30', '2024-11-21 12:17:15'),
(5, 'manam', 'mnm', 6386, 'security specialist', 2, '50k-100k', 3, 2, 2, 2, 'Yes', 3, 'good job', 'good job', NULL, 1, '2024-11-12 23:02:17', '2024-11-21 12:17:20'),
(6, 'xyz', 'hsbc', 2891, 'software engineer', 3, '50k-100k', 1, 2, 2, 2, 'Yes', 1, 'it\'s a good job', 'it\'s a good job', NULL, 1, '2024-11-13 17:28:37', '2024-11-21 12:17:21'),
(7, 'jabri', 'jabri', 130, 'jabri', 2, '50k-100k', 2, 2, 2, 2, 'Yes', 3, 'jabri', 'jabri', NULL, 0, '2024-11-15 21:48:58', '2024-11-20 16:04:44'),
(8, 'uhuhiu', 'iuhihuihu', 7721, 'jkjlkj', 3, '50k-100k', 3, 2, 2, 2, 'Yes', 3, 'ijijijo', 'kjkjhkjh', NULL, 1, '2024-11-16 16:29:24', '2024-11-16 16:29:24'),
(9, 'refref', 'frefre', 5142, 'frefre', 3, '50k-100k', 2, 2, 2, 2, 'Yes', 3, 'erfref', 'refref', NULL, 1, '2024-11-21 12:34:11', '2024-11-21 12:34:11'),
(10, 'fdsdfds', 'dsfdsf', 9868, 'dsfdsf', 3, '50k-100k', 1, 2, 2, 2, 'Yes', 4, 'sdfdsf', 'sdfdsf', NULL, 0, '2024-11-24 21:21:01', '2024-12-13 01:22:40');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `job_post_limit` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `name`, `job_post_limit`, `created_at`, `updated_at`) VALUES
(1, 'basic', 5, NULL, NULL),
(2, 'premium', 10, NULL, NULL),
(3, 'vip', 15, NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_10_11_150914_create_employers_table', 2),
(6, '2024_10_16_162603_create_candidates_table', 3),
(7, '2024_10_24_194605_create_seniority_levels_table', 4),
(8, '2024_10_24_195031_create_salary__ranges_table', 4),
(9, '2024_10_24_195115_create_industries_table', 4),
(10, '2024_10_24_195139_create_job__locations_table', 4),
(11, '2024_10_24_195227_create_working__patterns_table', 4),
(12, '2024_10_24_195303_create_hours_table', 4),
(13, '2024_10_24_195342_create_skill__lists_table', 4),
(14, '2024_10_24_200721_create_job__posts_table', 5),
(15, '2024_10_28_005536_create_admins_table', 6),
(16, '2024_10_24_195031_create_salary_ranges_table', 7),
(17, '2024_11_03_175949_create_sponsorships_table', 8),
(18, '2024_11_15_125428_create_memberships_table', 8),
(19, '2024_11_23_210940_create_jobs_applied_table', 9),
(20, '2024_11_23_222207_create_skills_matching_score_table', 10),
(21, '2024_11_23_222228_create_values_matching_score_table', 10),
(22, '2024_12_21_165500_create_interviews_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary_ranges`
--

CREATE TABLE `salary_ranges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `salary_range` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salary_ranges`
--

INSERT INTO `salary_ranges` (`id`, `salary_range`, `created_at`, `updated_at`) VALUES
(1, '0-50k', NULL, NULL),
(2, '50k-100k', NULL, NULL),
(3, '50k-100k', NULL, NULL),
(4, '100k+', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seniority_levels`
--

CREATE TABLE `seniority_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seniority_level` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seniority_levels`
--

INSERT INTO `seniority_levels` (`id`, `seniority_level`, `created_at`, `updated_at`) VALUES
(1, 'Junior', NULL, NULL),
(2, 'Mid', NULL, NULL),
(3, 'Senior', NULL, NULL),
(4, 'Lead', NULL, NULL),
(5, 'Manager', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `skill_lists`
--

CREATE TABLE `skill_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `skills` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skill_lists`
--

INSERT INTO `skill_lists` (`id`, `skills`, `created_at`, `updated_at`) VALUES
(1, 'HTML', NULL, NULL),
(2, 'CSS', NULL, NULL),
(3, 'JAVASCRIPT', NULL, NULL),
(4, 'BOOTSTRAP', NULL, NULL),
(5, 'React', NULL, NULL),
(6, 'Node.JS', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sponsorships`
--

CREATE TABLE `sponsorships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'forid', 'forid@gmail.com', NULL, '$2y$10$R/I3QBgUpizNjj9b4UsJMOgnZmzu1T2WWO60mwXjhaNv.4dLEuaF2', NULL, '2024-10-11 13:37:17', '2024-10-11 13:37:17');

-- --------------------------------------------------------

--
-- Table structure for table `working_patterns`
--

CREATE TABLE `working_patterns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `working_pattern` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `working_patterns`
--

INSERT INTO `working_patterns` (`id`, `working_pattern`, `created_at`, `updated_at`) VALUES
(1, 'Full-time', NULL, NULL),
(2, 'Part-time', NULL, NULL),
(3, 'Contract', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `candidates_email_unique` (`email`);

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employers_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hours`
--
ALTER TABLE `hours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_applieds`
--
ALTER TABLE `job_applieds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_locations`
--
ALTER TABLE `job_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_posts`
--
ALTER TABLE `job_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `salary_ranges`
--
ALTER TABLE `salary_ranges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seniority_levels`
--
ALTER TABLE `seniority_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill_lists`
--
ALTER TABLE `skill_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsorships`
--
ALTER TABLE `sponsorships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `working_patterns`
--
ALTER TABLE `working_patterns`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hours`
--
ALTER TABLE `hours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `job_applieds`
--
ALTER TABLE `job_applieds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `job_locations`
--
ALTER TABLE `job_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job_posts`
--
ALTER TABLE `job_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_ranges`
--
ALTER TABLE `salary_ranges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `seniority_levels`
--
ALTER TABLE `seniority_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `skill_lists`
--
ALTER TABLE `skill_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sponsorships`
--
ALTER TABLE `sponsorships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `working_patterns`
--
ALTER TABLE `working_patterns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

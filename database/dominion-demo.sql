-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2018 at 06:50 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dominion`
--

-- --------------------------------------------------------

--
-- Table structure for table `billings`
--

CREATE TABLE `billings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `visit_id` int(10) UNSIGNED DEFAULT NULL,
  `billing_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(8,2) NOT NULL,
  `discount` double(8,2) DEFAULT NULL,
  `total` double(8,2) DEFAULT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billings`
--

INSERT INTO `billings` (`id`, `user_id`, `visit_id`, `billing_name`, `amount`, `discount`, `total`, `is_paid`, `created_at`, `updated_at`) VALUES
(1, 1, 14, 'Billing Name 0', 400102.00, NULL, NULL, 0, '2018-08-03 13:27:39', NULL),
(2, 1, 10, 'Billing Name 1', 222265.00, NULL, NULL, 0, '2018-08-03 13:27:40', '2018-08-03 14:58:20'),
(3, 1, 7, 'Billing Name 2', 159752.00, NULL, NULL, 1, '2018-08-03 13:27:40', NULL),
(4, 1, 20, 'Billing Name 3', 347291.00, NULL, NULL, 1, '2018-08-03 13:27:40', NULL),
(5, 1, 12, 'Billing Name 4', 829.00, NULL, NULL, 0, '2018-08-03 13:27:40', NULL),
(6, 1, 4, 'Billing Name 5', 102645.00, NULL, NULL, 1, '2018-08-03 13:27:40', NULL),
(7, 1, 23, 'Billing Name 6', 480113.00, NULL, NULL, 1, '2018-08-03 13:27:40', NULL),
(8, 1, 18, 'Billing Name 7', 309447.00, NULL, NULL, 0, '2018-08-03 13:27:40', NULL),
(9, 1, 1, 'Billing Name 8', 33994.00, NULL, NULL, 0, '2018-08-03 13:27:40', NULL),
(10, 1, 20, 'Billing Name 9', 337258.00, NULL, NULL, 1, '2018-08-03 13:27:40', '2018-08-03 14:47:51'),
(11, 1, 17, 'Billing Name 10', 447043.00, NULL, NULL, 0, '2018-08-03 13:27:40', NULL),
(12, 1, 4, 'Billing Name 11', 239894.00, NULL, NULL, 0, '2018-08-03 13:27:40', NULL),
(13, 1, 11, 'Billing Name 12', 209279.00, NULL, NULL, 0, '2018-08-03 13:27:40', NULL),
(14, 1, 14, 'Billing Name 13', 199427.00, NULL, NULL, 1, '2018-08-03 13:27:40', NULL),
(15, 1, 11, 'Billing Name 14', 311125.00, NULL, NULL, 1, '2018-08-03 13:27:40', NULL),
(16, 1, 4, 'Billing Name 15', 106739.00, NULL, NULL, 1, '2018-08-03 13:27:40', NULL),
(17, 1, 15, 'Billing Name 16', 225234.00, NULL, NULL, 0, '2018-08-03 13:27:40', NULL),
(18, 1, 22, 'Billing Name 17', 364712.00, NULL, NULL, 0, '2018-08-03 13:27:40', NULL),
(19, 1, 16, 'Billing Name 18', 120875.00, NULL, NULL, 1, '2018-08-03 13:27:40', NULL),
(20, 1, 9, 'Billing Name 19', 22044.00, NULL, NULL, 1, '2018-08-03 13:27:40', NULL),
(21, 1, 20, 'Billing Name 20', 493874.00, NULL, NULL, 0, '2018-08-03 13:27:40', NULL),
(22, 1, 6, 'Billing Name 21', 102784.00, NULL, NULL, 1, '2018-08-03 13:27:40', NULL),
(23, 1, 24, 'Billing Name 22', 75229.00, NULL, NULL, 0, '2018-08-03 13:27:40', NULL),
(24, 1, 19, 'Billing Name 23', 344062.00, NULL, NULL, 0, '2018-08-03 13:27:40', NULL),
(25, 1, 12, 'Billing Name 24', 297569.00, NULL, NULL, 0, '2018-08-03 13:27:40', '2018-08-03 14:47:34');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `appointment_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2013_03_28_152007_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2018_03_28_151540_create_patients_table', 1),
(5, '2018_03_28_151607_create_bookings_table', 1),
(6, '2018_03_28_151619_create_messages_table', 1),
(7, '2018_03_28_151844_create_visits_table', 1),
(8, '2018_04_06_191500_create_visit_doctors_table', 1),
(9, '2018_04_06_191542_create_surgeries_table', 1),
(10, '2018_05_05_185007_create_surgery_names_table', 1),
(11, '2018_05_09_191801_create_posts_table', 1),
(12, '2018_05_28_152834_create_billings_table', 1),
(13, '2018_06_21_113303_create_permissions_table', 1),
(14, '2018_06_21_115900_create_user_permissions_table', 1);

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
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `file_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `religion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_of_origin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LGA` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_of_kin_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_of_kin_relationship` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_of_kin_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_of_kin_phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genotype` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `user_id`, `file_number`, `first_name`, `last_name`, `phone_number`, `email`, `sex`, `marital_status`, `date_of_birth`, `religion`, `address`, `nationality`, `state_of_origin`, `LGA`, `occupation`, `office_address`, `next_of_kin_name`, `next_of_kin_relationship`, `next_of_kin_address`, `next_of_kin_phone_number`, `blood_group`, `weight`, `height`, `genotype`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'DMC000001', 'Olayi', 'Codenon', '0816655950', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$cOM28uSWvOsIQ.MwUdJIoO9J.aU.AQJyA3F1q6P7rPLjyIajnhK4m', NULL, '2018-08-03 13:27:33', NULL),
(2, 1, 'DMC000002', 'Olayin', 'Codenoni', '0816655951', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$Xued046DUM8Py5MpzLxFOuULQ0S0HABR.4Os1RE2OC.gU5Xu8RLWS', NULL, '2018-08-03 13:27:33', NULL),
(3, 1, 'DMC000003', 'Ola', 'Codenon', '0816655952', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$JTaJr6PDSUnYZ7N3KUfYgOOSWA4I2A2/3SILNkI3/lFQKolwtgDqa', NULL, '2018-08-03 13:27:34', NULL),
(4, 1, 'DMC000004', 'Olayink', 'Codenoni', '0816655953', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$yTTSc1Cn5HzUyAdEJWoIquro0AuXXDRw4qenYK/wIpV0jgQd2lST.', NULL, '2018-08-03 13:27:34', NULL),
(5, 1, 'DMC000005', 'Ola', 'Codenon', '0816655954', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$lKimWe8bU99fdHSTEwADBOMQpdHp2wcb8j8o6/uvy2eCF1ybqDAaq', NULL, '2018-08-03 13:27:34', NULL),
(6, 1, 'DMC000006', 'Olayink', 'Codenoni', '0816655955', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$IW3.feeJFM.bsAodUaRUDeeYISh6jmZryOlv45PZXCBTM92kzVinq', NULL, '2018-08-03 13:27:34', NULL),
(7, 1, 'DMC000007', 'Olayink', 'Codeno', '0816655956', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$wYI7/idGNEmqSNWzOi7XAuoHv/IOWECF5vmWPf1ilmD/VRJ/3eY/e', NULL, '2018-08-03 13:27:34', NULL),
(8, 1, 'DMC000008', 'Olayinka', 'Coden', '0816655957', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$hF3Y6ROR/5omVJGkKhVRH.cYSKPiPsU2IlsxkRXyn7XLQ1OlOs.K.', NULL, '2018-08-03 13:27:34', NULL),
(9, 1, 'DMC000009', 'Olayink', 'Codeno', '0816655958', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$03wzsdOs98BGW6Qw8JVbt.sjWzcbvTmi9xRD3g/ECMHkftlN.DAsG', NULL, '2018-08-03 13:27:35', NULL),
(10, 1, 'DMC0000010', 'Ola', 'Codenon', '0816655959', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$cvWWv/oEh2rfIAek38hfu.75074Asg/dVcHatg8.MlIBjkPAB0UBy', NULL, '2018-08-03 13:27:35', NULL),
(11, 1, 'DMC000011', 'Ola', 'Codenon', '08166559510', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$ZitIRYmsMHFUtZcZsFpVH.fOED6fd/uIt0gOOlwfmvkC0gee9olki', NULL, '2018-08-03 13:27:35', NULL),
(12, 1, 'DMC000012', 'Olay', 'Codenon', '08166559511', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$UAqgUv1B2yqIzz8s3zWiqe5xPwr3kgRLQoLVdfg2nzZ0XV0t8se2u', NULL, '2018-08-03 13:27:35', NULL),
(13, 1, 'DMC000013', 'Ola', 'Codenon', '08166559512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$Ek6nI0LQp6vsRtO59Xpf2.68PeHAKm3nPMb8UNqfBRWlfTFvOFL62', NULL, '2018-08-03 13:27:36', NULL),
(14, 1, 'DMC000014', 'Ola', 'Codenon', '08166559513', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$Q/cbcm8Jrt6HYSh0ZK3de.7cD7J1ycOyOQq7v..zRoL1LhXUwY4Te', NULL, '2018-08-03 13:27:36', NULL),
(15, 1, 'DMC000015', 'Olayink', 'Codenon', '08166559514', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$PKe3zvtfZNRXvbDN0pzMcuLd8mc4VV1o8yYBQSbH4lHvLbww/axBy', NULL, '2018-08-03 13:27:36', NULL),
(16, 1, 'DMC000016', 'Olayin', 'Codeno', '08166559515', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$h/bZBmLy5/jdhHrJ45PlXegILrVeFCJtLDqZ3a2YG.L/MkdS3lk/K', NULL, '2018-08-03 13:27:37', NULL),
(17, 1, 'DMC000017', 'Olayink', 'Codenoni', '08166559516', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$/qgbv.9mBPYJM99QJiThdO7snSudCPRKHOoWG/KSAxjRAvlI061k2', NULL, '2018-08-03 13:27:37', NULL),
(18, 1, 'DMC000018', 'Olayinka', 'Codenoni', '08166559517', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$9jy8QU41q0pxKxbEh0dOFuJ/gJvCwMSKfyg2l2K39PLrVozMJ.2HK', NULL, '2018-08-03 13:27:37', NULL),
(19, 1, 'DMC000019', 'Olayinka', 'Codenon', '08166559518', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$DxO93xvkHtlpX6u7ak1uEOvMT.pi99JyOFe5e6Ru8euTgNDKsxRL.', NULL, '2018-08-03 13:27:37', NULL),
(20, 1, 'DMC000020', 'Olayin', 'Codeno', '08166559519', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$Nbb832wv35FX5kfT09ZD1uvr/4ZA5yesoiYQFjMzcMGCNAvI3Nqgq', NULL, '2018-08-03 13:27:37', NULL),
(21, 1, 'DMC000021', 'Olayink', 'Codenon', '08166559520', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$ZEJAfuiNHL2pm2c8U/lpQO1s7kG8idpVbD/XmRUstnAZEk5iAxrGK', NULL, '2018-08-03 13:27:38', NULL),
(22, 1, 'DMC000022', 'Olayink', 'Coden', '08166559521', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$2w3Clq.UcLERuN2yCokB2Oi6dOO7yW/6fgZySr7jcfwCgsii35tg2', NULL, '2018-08-03 13:27:38', NULL),
(23, 1, 'DMC000023', 'Ola', 'Coden', '08166559522', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$MgOlJIaetTpdbxfgEVTCfOApYoHUJA/QhZCIxrnzHnGX4QiX65Zdq', NULL, '2018-08-03 13:27:38', NULL),
(24, 1, 'DMC000024', 'Olayinka', 'Coden', '08166559523', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$KqaWHRXTjSF7vFt7GFmMd.DdIEiSnHiUcy/OwJGDkFkOFlHpLjhOm', NULL, '2018-08-03 13:27:38', NULL),
(25, 1, 'DMC000025', 'Olayink', 'Codeno', '08166559524', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$lXakswcMk49T7DTdUGlY5ealaabZy7j2CqHqT0f2nLoKPEh7Bzzfq', NULL, '2018-08-03 13:27:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `table` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permit` int(10) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'ADMIN ROLE TO PERMIT',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `table`, `action`, `permit`, `created_at`, `updated_at`) VALUES
(1, 'billings', 'view', 4, '2018-08-03 13:27:32', NULL),
(2, 'billings', 'create', 4, '2018-08-03 13:27:32', NULL),
(3, 'billings', 'update', 4, '2018-08-03 13:27:32', NULL),
(4, 'billings', 'delete', 1, '2018-08-03 13:27:32', NULL),
(5, 'patients', 'view', 4, '2018-08-03 13:27:32', NULL),
(6, 'patients', 'create', 4, '2018-08-03 13:27:32', NULL),
(7, 'patients', 'update', 4, '2018-08-03 13:27:32', NULL),
(8, 'patients', 'delete', 1, '2018-08-03 13:27:32', NULL),
(9, 'permissions', 'view', 1, '2018-08-03 13:27:32', NULL),
(10, 'permissions', 'create', 1, '2018-08-03 13:27:32', NULL),
(11, 'permissions', 'update', 1, '2018-08-03 13:27:32', NULL),
(12, 'permissions', 'delete', 1, '2018-08-03 13:27:32', NULL),
(13, 'posts', 'view', 3, '2018-08-03 13:27:32', NULL),
(14, 'posts', 'create', 3, '2018-08-03 13:27:32', NULL),
(15, 'posts', 'update', 3, '2018-08-03 13:27:32', NULL),
(16, 'posts', 'delete', 3, '2018-08-03 13:27:32', NULL),
(17, 'surgeries', 'view', 4, '2018-08-03 13:27:32', NULL),
(18, 'surgeries', 'create', 4, '2018-08-03 13:27:32', NULL),
(19, 'surgeries', 'update', 4, '2018-08-03 13:27:32', NULL),
(20, 'surgeries', 'delete', 1, '2018-08-03 13:27:32', NULL),
(21, 'surgery_names', 'view', 4, '2018-08-03 13:27:32', NULL),
(22, 'surgery_names', 'create', 4, '2018-08-03 13:27:32', NULL),
(23, 'surgery_names', 'update', 4, '2018-08-03 13:27:32', NULL),
(24, 'surgery_names', 'delete', 4, '2018-08-03 13:27:32', NULL),
(25, 'users', 'view', 1, '2018-08-03 13:27:32', NULL),
(26, 'users', 'create', 1, '2018-08-03 13:27:32', NULL),
(27, 'users', 'update', 1, '2018-08-03 13:27:32', NULL),
(28, 'users', 'delete', 1, '2018-08-03 13:27:32', NULL),
(29, 'user_permissions', 'view', 1, '2018-08-03 13:27:32', NULL),
(30, 'user_permissions', 'create', 1, '2018-08-03 13:27:32', NULL),
(31, 'user_permissions', 'update', 1, '2018-08-03 13:27:32', NULL),
(32, 'user_permissions', 'delete', 1, '2018-08-03 13:27:32', NULL),
(33, 'visits', 'view', 4, '2018-08-03 13:27:32', NULL),
(34, 'visits', 'create', 4, '2018-08-03 13:27:32', NULL),
(35, 'visits', 'update', 4, '2018-08-03 13:27:32', NULL),
(36, 'visits', 'delete', 1, '2018-08-03 13:27:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN', '2018-08-03 13:27:32', NULL),
(2, 'SURGEON', '2018-08-03 13:27:32', NULL),
(3, 'DOCTOR', '2018-08-03 13:27:32', NULL),
(4, 'STAFF', '2018-08-03 13:27:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `surgeries`
--

CREATE TABLE `surgeries` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `visit_id` int(10) UNSIGNED NOT NULL,
  `surgery_id` int(10) UNSIGNED DEFAULT NULL,
  `surgery_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surgery_date` date DEFAULT NULL,
  `complications` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surgeries`
--

INSERT INTO `surgeries` (`id`, `user_id`, `visit_id`, `surgery_id`, `surgery_name`, `surgery_date`, `complications`, `created_at`, `updated_at`) VALUES
(1, 1, 3, NULL, 'Nephrotomy', '2018-08-03', NULL, '2018-08-03 13:27:39', NULL),
(2, 1, 10, NULL, 'Renal', '2018-08-03', 'complication information1', '2018-08-03 13:27:39', NULL),
(3, 1, 12, NULL, 'Amniotomy', '2018-08-03', 'complication information2', '2018-08-03 13:27:39', NULL),
(4, 1, 2, NULL, 'Lymphadenectomy', '2018-08-03', NULL, '2018-08-03 13:27:39', NULL),
(5, 1, 25, NULL, 'Cardiovascular', '2018-08-03', 'complication information4', '2018-08-03 13:27:39', NULL),
(6, 1, 3, NULL, 'Amygdalohippocampectomy', '2018-08-03', 'complication information5', '2018-08-03 13:27:39', NULL),
(7, 1, 23, NULL, 'Nervous system', '2018-08-03', 'complication information6', '2018-08-03 13:27:39', NULL),
(8, 1, 25, NULL, 'Ureterostomy', '2018-08-03', NULL, '2018-08-03 13:27:39', NULL),
(9, 1, 8, NULL, 'Esophagectomy', '2018-08-03', NULL, '2018-08-03 13:27:39', NULL),
(10, 1, 2, NULL, 'Myomectomy', '2018-08-03', 'complication information9', '2018-08-03 13:27:39', NULL),
(11, 1, 7, NULL, 'Suprapubic cystostomy', '2018-08-03', 'complication information10', '2018-08-03 13:27:39', NULL),
(12, 1, 22, NULL, 'Nervous system', '2018-08-03', 'complication information11', '2018-08-03 13:27:39', NULL),
(13, 1, 6, NULL, 'Neurectomy', '2018-08-03', NULL, '2018-08-03 13:27:39', NULL),
(14, 1, 14, NULL, 'Craniotomy', '2018-08-03', NULL, '2018-08-03 13:27:39', NULL),
(15, 1, 18, NULL, 'Penectomy', '2018-08-03', 'complication information14', '2018-08-03 13:27:39', NULL),
(16, 1, 18, NULL, 'Proctocolectomy', '2018-08-03', 'complication information15', '2018-08-03 13:27:39', NULL),
(17, 1, 12, NULL, 'Hypophysectomy', '2018-08-03', 'complication information16', '2018-08-03 13:27:39', NULL),
(18, 1, 13, NULL, 'Coccygectomy', '2018-08-03', NULL, '2018-08-03 13:27:39', NULL),
(19, 1, 5, NULL, 'Gastroenterostomy', '2018-08-03', NULL, '2018-08-03 13:27:39', NULL),
(20, 1, 2, NULL, 'Bursectomy', '2018-08-03', NULL, '2018-08-03 13:27:39', NULL),
(21, 1, 21, NULL, 'Hysterectomy', '2018-08-03', NULL, '2018-08-03 13:27:39', NULL),
(22, 1, 21, NULL, 'Osteotomy', '2018-08-03', NULL, '2018-08-03 13:27:39', NULL),
(23, 1, 8, 9, 'Venotomy', '2018-08-03', NULL, '2018-08-03 13:27:39', NULL),
(24, 1, 17, NULL, 'Discectomy', '2018-08-03', NULL, '2018-08-03 13:27:39', NULL),
(25, 1, 6, NULL, 'Tendon transfer', '2018-08-03', 'complication information24', '2018-08-03 13:27:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `surgery_names`
--

CREATE TABLE `surgery_names` (
  `id` int(10) UNSIGNED NOT NULL,
  `surgery_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surgery_names`
--

INSERT INTO `surgery_names` (`id`, `surgery_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Genital', NULL, '2018-08-03 13:27:38', NULL),
(2, 'Female', NULL, '2018-08-03 13:27:38', NULL),
(3, 'Cervicectomy', NULL, '2018-08-03 13:27:38', NULL),
(4, 'Clitoridectomy', NULL, '2018-08-03 13:27:39', NULL),
(5, 'Hysterectomy', NULL, '2018-08-03 13:27:39', NULL),
(6, 'Myomectomy', NULL, '2018-08-03 13:27:39', NULL),
(7, 'Oophorectomy', NULL, '2018-08-03 13:27:39', NULL),
(8, 'Salpingectomy', NULL, '2018-08-03 13:27:39', NULL),
(9, 'Salpingoophorectomy', NULL, '2018-08-03 13:27:39', NULL),
(10, 'Vaginectomy', NULL, '2018-08-03 13:27:39', NULL),
(11, 'Vulvectomy', NULL, '2018-08-03 13:27:39', NULL),
(12, 'Male', NULL, '2018-08-03 13:27:39', NULL),
(13, 'Gonadectomy', NULL, '2018-08-03 13:27:39', NULL),
(14, 'Orchiectomy', NULL, '2018-08-03 13:27:39', NULL),
(15, 'Penectomy', NULL, '2018-08-03 13:27:39', NULL),
(16, 'Posthectomy', NULL, '2018-08-03 13:27:39', NULL),
(17, 'Prostatectomy', NULL, '2018-08-03 13:27:39', NULL),
(18, 'Varicocelectomy', NULL, '2018-08-03 13:27:39', NULL),
(19, 'Vasectomy', NULL, '2018-08-03 13:27:39', NULL),
(20, 'Musculoskeletal', NULL, '2018-08-03 13:27:39', NULL),
(21, 'Bursectomy', NULL, '2018-08-03 13:27:39', NULL),
(22, 'Amputation', NULL, '2018-08-03 13:27:39', NULL),
(23, 'Hemicorporectomy', NULL, '2018-08-03 13:27:39', NULL),
(24, 'Hemipelvectomy', NULL, '2018-08-03 13:27:39', NULL),
(25, 'Nervous system', NULL, '2018-08-03 13:27:39', NULL),
(26, 'CNS', NULL, '2018-08-03 13:27:39', NULL),
(27, 'Decompressive craniectomy', NULL, '2018-08-03 13:27:39', NULL),
(28, 'Hemispherectomy', NULL, '2018-08-03 13:27:39', NULL),
(29, 'Anterior temporal lobectomy', NULL, '2018-08-03 13:27:39', NULL),
(30, 'Hypophysectomy', NULL, '2018-08-03 13:27:39', NULL),
(31, 'Amygdalohippocampectomy', NULL, '2018-08-03 13:27:39', NULL),
(32, 'Laminectomy', NULL, '2018-08-03 13:27:39', NULL),
(33, 'Corpectomy', NULL, '2018-08-03 13:27:39', NULL),
(34, 'Facetectomy', NULL, '2018-08-03 13:27:39', NULL),
(35, 'PNS', NULL, '2018-08-03 13:27:39', NULL),
(36, 'Ganglionectomy', NULL, '2018-08-03 13:27:39', NULL),
(37, 'Sympathectomy / Endoscopic thoracic sympathectomy', NULL, '2018-08-03 13:27:39', NULL),
(38, 'Neurectomy', NULL, '2018-08-03 13:27:39', NULL),
(39, 'Nerve transfer', NULL, '2018-08-03 13:27:39', NULL),
(40, 'Ear', NULL, '2018-08-03 13:27:39', NULL),
(41, 'Stapedectomy', NULL, '2018-08-03 13:27:39', NULL),
(42, 'Mastoidectomy', NULL, '2018-08-03 13:27:39', NULL),
(43, 'Eye', NULL, '2018-08-03 13:27:39', NULL),
(44, 'Photorefractive keratectomy', NULL, '2018-08-03 13:27:39', NULL),
(45, 'Trabeculectomy', NULL, '2018-08-03 13:27:39', NULL),
(46, 'Iridectomy', NULL, '2018-08-03 13:27:39', NULL),
(47, 'Vitrectomy', NULL, '2018-08-03 13:27:39', NULL),
(48, 'Gastrointestinal', NULL, '2018-08-03 13:27:39', NULL),
(49, 'Glossectomy', NULL, '2018-08-03 13:27:39', NULL),
(50, 'Esophagectomy', NULL, '2018-08-03 13:27:39', NULL),
(51, 'Gastrectomy', NULL, '2018-08-03 13:27:39', NULL),
(52, 'Appendectomy', NULL, '2018-08-03 13:27:39', NULL),
(53, 'Proctocolectomy', NULL, '2018-08-03 13:27:39', NULL),
(54, 'Colectomy', NULL, '2018-08-03 13:27:39', NULL),
(55, 'Hepatectomy', NULL, '2018-08-03 13:27:39', NULL),
(56, 'Cholecystectomy', NULL, '2018-08-03 13:27:39', NULL),
(57, 'Pancreatectomy / Pancreaticoduodenectomy', NULL, '2018-08-03 13:27:39', NULL),
(58, 'Respiratory', NULL, '2018-08-03 13:27:39', NULL),
(59, 'Rhinectomy', NULL, '2018-08-03 13:27:39', NULL),
(60, 'Laryngectomy', NULL, '2018-08-03 13:27:39', NULL),
(61, 'Pneumonectomy', NULL, '2018-08-03 13:27:39', NULL),
(62, 'Endocrine', NULL, '2018-08-03 13:27:39', NULL),
(63, 'Thyroidectomy', NULL, '2018-08-03 13:27:39', NULL),
(64, 'Parathyroidectomy', NULL, '2018-08-03 13:27:39', NULL),
(65, 'Adrenalectomy', NULL, '2018-08-03 13:27:39', NULL),
(66, 'Pinealectomy', NULL, '2018-08-03 13:27:39', NULL),
(67, 'Renal', NULL, '2018-08-03 13:27:39', NULL),
(68, 'Nephrectomy', NULL, '2018-08-03 13:27:39', NULL),
(69, 'Cystectomy', NULL, '2018-08-03 13:27:39', NULL),
(70, 'Lymphatic', NULL, '2018-08-03 13:27:39', NULL),
(71, 'Tonsillectomy', NULL, '2018-08-03 13:27:39', NULL),
(72, 'Adenoidectomy', NULL, '2018-08-03 13:27:39', NULL),
(73, 'Thymectomy', NULL, '2018-08-03 13:27:39', NULL),
(74, 'Splenectomy', NULL, '2018-08-03 13:27:39', NULL),
(75, 'Lymphadenectomy', NULL, '2018-08-03 13:27:39', NULL),
(76, 'Adenectomy', NULL, '2018-08-03 13:27:39', NULL),
(77, 'Breast', NULL, '2018-08-03 13:27:39', NULL),
(78, 'Lumpectomy', NULL, '2018-08-03 13:27:39', NULL),
(79, 'Mastectomy', NULL, '2018-08-03 13:27:39', NULL),
(80, 'Bone / joint', NULL, '2018-08-03 13:27:39', NULL),
(81, 'Coccygectomy', NULL, '2018-08-03 13:27:39', NULL),
(82, 'Ostectomy', NULL, '2018-08-03 13:27:39', NULL),
(83, 'Femoral head ostectomy', NULL, '2018-08-03 13:27:39', NULL),
(84, 'Astragalectomy', NULL, '2018-08-03 13:27:39', NULL),
(85, 'Discectomy', NULL, '2018-08-03 13:27:39', NULL),
(86, 'Synovectomy', NULL, '2018-08-03 13:27:39', NULL),
(87, 'Ungrouped', NULL, '2018-08-03 13:27:39', NULL),
(88, 'Embolectomy', NULL, '2018-08-03 13:27:39', NULL),
(89, 'Endarterectomy', NULL, '2018-08-03 13:27:39', NULL),
(90, 'Frenectomy', NULL, '2018-08-03 13:27:39', NULL),
(91, 'Gingivectomy', NULL, '2018-08-03 13:27:39', NULL),
(92, 'Lobectomy', NULL, '2018-08-03 13:27:39', NULL),
(93, 'Panniculectomy', NULL, '2018-08-03 13:27:39', NULL),
(94, 'Pericardiectomy', NULL, '2018-08-03 13:27:39', NULL),
(95, 'Ostomy', NULL, '2018-08-03 13:27:39', NULL),
(96, 'Gastrostomy', NULL, '2018-08-03 13:27:39', NULL),
(97, 'Percutaneous endoscopic gastrostomy', NULL, '2018-08-03 13:27:39', NULL),
(98, 'Gastroduodenostomy', NULL, '2018-08-03 13:27:39', NULL),
(99, 'Gastroenterostomy', NULL, '2018-08-03 13:27:39', NULL),
(100, 'Ileostomy', NULL, '2018-08-03 13:27:39', NULL),
(101, 'Jejunostomy', NULL, '2018-08-03 13:27:39', NULL),
(102, 'Colostomy', NULL, '2018-08-03 13:27:39', NULL),
(103, 'Cholecystostomy', NULL, '2018-08-03 13:27:39', NULL),
(104, 'Hepatoportoenterostomy', NULL, '2018-08-03 13:27:39', NULL),
(105, 'Urogenital', NULL, '2018-08-03 13:27:39', NULL),
(106, 'Nephrostomy', NULL, '2018-08-03 13:27:39', NULL),
(107, 'Ureterostomy', NULL, '2018-08-03 13:27:39', NULL),
(108, 'Cystostomy', NULL, '2018-08-03 13:27:39', NULL),
(109, 'Suprapubic cystostomy', NULL, '2018-08-03 13:27:39', NULL),
(110, 'Urostomy', NULL, '2018-08-03 13:27:39', NULL),
(111, 'Ventriculostomy', NULL, '2018-08-03 13:27:39', NULL),
(112, 'Dacryocystorhinostomy', NULL, '2018-08-03 13:27:39', NULL),
(113, 'Otomy', NULL, '2018-08-03 13:27:39', NULL),
(114, 'Amniotomy', NULL, '2018-08-03 13:27:39', NULL),
(115, 'Clitoridotomy', NULL, '2018-08-03 13:27:39', NULL),
(116, 'Hysterotomy', NULL, '2018-08-03 13:27:39', NULL),
(117, 'Hymenotomy', NULL, '2018-08-03 13:27:39', NULL),
(118, 'Episiotomy', NULL, '2018-08-03 13:27:39', NULL),
(119, 'Meatotomy', NULL, '2018-08-03 13:27:39', NULL),
(120, 'Nephrotomy', NULL, '2018-08-03 13:27:39', NULL),
(121, 'Craniotomy', NULL, '2018-08-03 13:27:39', NULL),
(122, 'Pallidotomy', NULL, '2018-08-03 13:27:39', NULL),
(123, 'Thalamotomy', NULL, '2018-08-03 13:27:39', NULL),
(124, 'Lobotomy', NULL, '2018-08-03 13:27:39', NULL),
(125, 'Bilateral cingulotomy', NULL, '2018-08-03 13:27:39', NULL),
(126, 'Cordotomy', NULL, '2018-08-03 13:27:39', NULL),
(127, 'Rhizotomy', NULL, '2018-08-03 13:27:39', NULL),
(128, 'Laminotomy', NULL, '2018-08-03 13:27:39', NULL),
(129, 'Foraminotomy', NULL, '2018-08-03 13:27:39', NULL),
(130, 'Axotomy', NULL, '2018-08-03 13:27:39', NULL),
(131, 'Vagotomy', NULL, '2018-08-03 13:27:39', NULL),
(132, 'Myringotomy', NULL, '2018-08-03 13:27:39', NULL),
(133, 'Radial keratotomy', NULL, '2018-08-03 13:27:39', NULL),
(134, 'Myotomy', NULL, '2018-08-03 13:27:39', NULL),
(135, 'Tenotomy', NULL, '2018-08-03 13:27:39', NULL),
(136, 'Fasciotomy', NULL, '2018-08-03 13:27:39', NULL),
(137, 'Escharotomy', NULL, '2018-08-03 13:27:39', NULL),
(138, 'Osteotomy', NULL, '2018-08-03 13:27:39', NULL),
(139, 'Arthrotomy', NULL, '2018-08-03 13:27:39', NULL),
(140, 'Tendon transfer', NULL, '2018-08-03 13:27:39', NULL),
(141, 'Heller myotomy', NULL, '2018-08-03 13:27:39', NULL),
(142, 'Pyloromyotomy', NULL, '2018-08-03 13:27:39', NULL),
(143, 'Anal sphincterotomy', NULL, '2018-08-03 13:27:39', NULL),
(144, 'Lateral internal sphincterotomy', NULL, '2018-08-03 13:27:39', NULL),
(145, 'Sinusotomy', NULL, '2018-08-03 13:27:39', NULL),
(146, 'Cricothyrotomy', NULL, '2018-08-03 13:27:39', NULL),
(147, 'Bronchotomy', NULL, '2018-08-03 13:27:39', NULL),
(148, 'Thoracotomy', NULL, '2018-08-03 13:27:39', NULL),
(149, 'Thyrotomy', NULL, '2018-08-03 13:27:39', NULL),
(150, 'Tracheotomy', NULL, '2018-08-03 13:27:39', NULL),
(151, 'Cardiovascular', NULL, '2018-08-03 13:27:39', NULL),
(152, 'Cardiotomy', NULL, '2018-08-03 13:27:39', NULL),
(153, 'Phlebotomy', NULL, '2018-08-03 13:27:39', NULL),
(154, 'Arteriotomy', NULL, '2018-08-03 13:27:39', NULL),
(155, 'Venotomy', NULL, '2018-08-03 13:27:39', NULL),
(156, 'Laparotomy', NULL, '2018-08-03 13:27:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `identity_number` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('MALE','FEMALE') COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_picture` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'img/default.png',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `role_id`, `identity_number`, `gender`, `date_of_birth`, `phone`, `address`, `state`, `country`, `job`, `profile_picture`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tunji', 'Oyeniran', 'oyenirantunji2339@gmail.com', '$2y$10$kxfGeX93LofmdTNUerr.K.f7dMpP8lorVZ8x9ooZAT7yBpcaEFcgS', 4, NULL, 'MALE', NULL, '090', NULL, NULL, NULL, NULL, 'img/default.png', NULL, '2018-08-03 13:27:32', NULL),
(2, 'Test', 'Admin', 'test@admin.com', '$2y$10$uSr2hU8CCZ0.X84wc1bhP.8PEkMWqYo8cTtoFUmEJSIJ5xqx79raS', 4, NULL, 'MALE', NULL, '080', NULL, NULL, NULL, NULL, 'img/default.png', NULL, '2018-08-03 13:27:32', NULL),
(3, 'Test', 'Staff', 'test@staff.com', '$2y$10$.lVYAQJOWbn4BKnCYJRbg.4uMclVFNGYW.5OX754HwsvYwL0ypplW', 1, NULL, 'FEMALE', NULL, '080', NULL, NULL, NULL, NULL, 'img/default.png', NULL, '2018-08-03 13:27:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_permissions`
--

CREATE TABLE `user_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `table` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjects` text COLLATE utf8mb4_unicode_ci,
  `objects` text COLLATE utf8mb4_unicode_ci,
  `assessment` text COLLATE utf8mb4_unicode_ci,
  `plans` text COLLATE utf8mb4_unicode_ci,
  `summary` text COLLATE utf8mb4_unicode_ci,
  `successful_delivery` tinyint(1) NOT NULL DEFAULT '0',
  `discharged_on` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`id`, `user_id`, `patient_id`, `type`, `title`, `subjects`, `objects`, `assessment`, `plans`, `summary`, `successful_delivery`, `discharged_on`, `created_at`, `updated_at`) VALUES
(1, 1, 18, 'CONSULTATION', 'CONSULTATION Visit Test 0', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro vitae, quidem odit eum qui in, nostrum reiciendis explicabo veritatis ipsum, vel labore laboriosam consectetur enim iste molestias aliquam ducimus voluptates!', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro vitae, quidem odit eum qui in, nostrum reiciendis explicabo veritatis ipsum, vel labore laboriosam consectetur enim iste molestias aliquam ducimus voluptates!', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro vitae, quidem odit eum qui in, nostrum reiciendis explicabo veritatis ipsum, vel labore laboriosam consectetur enim iste molestias aliquam ducimus voluptates!', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro vitae, quidem odit eum qui in, nostrum reiciendis explicabo veritatis ipsum, vel labore laboriosam consectetur enim iste molestias aliquam ducimus voluptates!', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro vitae, quidem odit eum qui in, nostrum reiciendis explicabo veritatis ipsum, vel labore laboriosam consectetur enim iste molestias aliquam ducimus voluptates!', 0, NULL, '2018-08-03 13:27:38', '2018-08-03 15:49:34'),
(2, 1, 14, 'CONSULTATION', 'CONSULTATION Visit Test 1', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2018-08-03 13:27:38', NULL),
(3, 1, 18, 'DELIVERY', 'DELIVERY Visit Test 2', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2018-08-03 13:27:38', NULL),
(4, 1, 5, 'CONSULTATION', 'CONSULTATION Visit Test 3', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2018-08-03 13:27:38', NULL),
(5, 1, 25, 'CONSULTATION', 'CONSULTATION Visit Test 4', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2018-08-03 13:27:38', NULL),
(6, 1, 8, 'CONSULTATION', 'CONSULTATION Visit Test 5', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2018-08-03 13:27:38', NULL),
(7, 1, 20, 'EMERGENCY', 'EMERGENCY Visit Test 6', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2018-08-03 13:27:38', NULL),
(8, 1, 10, 'EMERGENCY', 'EMERGENCY Visit Test 7', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2018-08-03 13:27:38', NULL),
(9, 1, 22, 'EMERGENCY', 'EMERGENCY Visit Test 8', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2018-08-03 13:27:38', NULL),
(10, 1, 10, 'CONSULTATION', 'CONSULTATION Visit Test 9', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2018-08-03 13:27:38', NULL),
(11, 1, 14, 'EMERGENCY', 'EMERGENCY Visit Test 10', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2018-08-03 13:27:38', NULL),
(12, 1, 9, 'DELIVERY', 'DELIVERY Visit Test 11', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2018-08-03 13:27:38', NULL),
(13, 1, 23, 'OTHERS', 'OTHERS Visit Test 12', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2018-08-03 13:27:38', NULL),
(14, 1, 10, 'EMERGENCY', 'EMERGENCY Visit Test 13', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2018-08-03 13:27:38', NULL),
(15, 1, 8, 'CONSULTATION', 'CONSULTATION Visit Test 14', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2018-08-03 13:27:38', NULL),
(16, 1, 16, 'OTHERS', 'OTHERS Visit Test 15', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2018-08-03 13:27:38', NULL),
(17, 1, 13, 'OTHERS', 'OTHERS Visit Test 16', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2018-08-03 13:27:38', NULL),
(18, 1, 18, 'CONSULTATION', 'CONSULTATION Visit Test 17', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2018-08-03 13:27:38', NULL),
(19, 1, 13, 'OTHERS', 'OTHERS Visit Test 18', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2018-08-03 13:27:38', NULL),
(20, 1, 10, 'DELIVERY', 'DELIVERY Visit Test 19', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2018-08-03 13:27:38', NULL),
(21, 1, 24, 'CONSULTATION', 'CONSULTATION Visit Test 20', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2018-08-03 13:27:38', NULL),
(22, 1, 12, 'EMERGENCY', 'EMERGENCY Visit Test 21', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2018-08-03 13:27:38', NULL),
(23, 1, 14, 'OTHERS', 'OTHERS Visit Test 22', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2018-08-03 13:27:38', NULL),
(24, 1, 23, 'EMERGENCY', 'EMERGENCY Visit Test 23', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2018-08-03 13:27:38', NULL),
(25, 1, 20, 'EMERGENCY', 'EMERGENCY Visit Test 24', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2018-08-03 13:27:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visit_doctors`
--

CREATE TABLE `visit_doctors` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `visit_id` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billings`
--
ALTER TABLE `billings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `billings_user_id_index` (`user_id`),
  ADD KEY `billings_visit_id_index` (`visit_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
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
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patients_user_id_index` (`user_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_user_id_index` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surgeries`
--
ALTER TABLE `surgeries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surgeries_user_id_index` (`user_id`),
  ADD KEY `surgeries_visit_id_index` (`visit_id`),
  ADD KEY `surgeries_surgery_id_index` (`surgery_id`);

--
-- Indexes for table `surgery_names`
--
ALTER TABLE `surgery_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_index` (`role_id`);

--
-- Indexes for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_permissions_user_id_index` (`user_id`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visits_user_id_index` (`user_id`),
  ADD KEY `visits_patient_id_index` (`patient_id`);

--
-- Indexes for table `visit_doctors`
--
ALTER TABLE `visit_doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visit_doctors_user_id_index` (`user_id`),
  ADD KEY `visit_doctors_visit_id_index` (`visit_id`),
  ADD KEY `visit_doctors_doctor_id_index` (`doctor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billings`
--
ALTER TABLE `billings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `surgeries`
--
ALTER TABLE `surgeries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `surgery_names`
--
ALTER TABLE `surgery_names`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_permissions`
--
ALTER TABLE `user_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `visit_doctors`
--
ALTER TABLE `visit_doctors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `billings`
--
ALTER TABLE `billings`
  ADD CONSTRAINT `billings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `billings_visit_id_foreign` FOREIGN KEY (`visit_id`) REFERENCES `visits` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `surgeries`
--
ALTER TABLE `surgeries`
  ADD CONSTRAINT `surgeries_surgery_id_foreign` FOREIGN KEY (`surgery_id`) REFERENCES `surgeries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `surgeries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `surgeries_visit_id_foreign` FOREIGN KEY (`visit_id`) REFERENCES `visits` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD CONSTRAINT `user_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `visits`
--
ALTER TABLE `visits`
  ADD CONSTRAINT `visits_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `visits_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `visit_doctors`
--
ALTER TABLE `visit_doctors`
  ADD CONSTRAINT `visit_doctors_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `visit_doctors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `visit_doctors_visit_id_foreign` FOREIGN KEY (`visit_id`) REFERENCES `visits` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

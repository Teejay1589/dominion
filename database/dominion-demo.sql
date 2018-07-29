-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2018 at 03:17 PM
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
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(8,2) NOT NULL,
  `discount` double(8,2) DEFAULT NULL,
  `total` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(12, '2018_05_28_152834_create_billings_table', 1);

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

INSERT INTO `patients` (`id`, `user_id`, `first_name`, `last_name`, `phone_number`, `email`, `sex`, `marital_status`, `date_of_birth`, `religion`, `address`, `nationality`, `state_of_origin`, `LGA`, `occupation`, `office_address`, `next_of_kin_name`, `next_of_kin_relationship`, `next_of_kin_address`, `next_of_kin_phone_number`, `blood_group`, `weight`, `height`, `genotype`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Olayi', 'Codenon', '0816655950', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$YCrb1Lehgh6Hr1g16VKKeucvNVVG9Jw6LGA3XjjxXGlwzV/wiN7nm', NULL, '2018-07-29 12:16:29', NULL),
(2, 1, 'Olayinka', 'Codenoni', '0816655951', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$A6n.Ccxe1hjrkJ.CUlPHy.3bxOUwGhCX8p7wG6b6DGMV6XRUVqd72', NULL, '2018-07-29 12:16:29', NULL),
(3, 1, 'Olayinka', 'Codenoni', '0816655952', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$HPtIWe4RkTJaEqzW2TsxxuthucBpc4QgIgQ2Yhy2u98p2q8jyyXhm', NULL, '2018-07-29 12:16:29', NULL),
(4, 1, 'Olayink', 'Codenon', '0816655953', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$HYGduyrZ88sC7PsMr4ZQ9.VsefwDiFiFbuyc75vWN16JVcxCOxUZy', NULL, '2018-07-29 12:16:29', NULL),
(5, 1, 'Ola', 'Codenoni', '0816655954', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$HVUalV0CEGFPr9W5IjW4kOvaSC0frktJrx2xFgGa0Dro2ZTeoFvYq', NULL, '2018-07-29 12:16:29', NULL),
(6, 1, 'Olay', 'Codeno', '0816655955', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$7snEE2G/I/9SCIxP2e0Vb.6GdBm.w3FHsYQhzKSIip/ra8q7HkL/6', NULL, '2018-07-29 12:16:29', NULL),
(7, 1, 'Olayi', 'Codenoni', '0816655956', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$ysWmR4ikh4507kIzCZdWk.3DNv4gPerBY4LO/MLhD08XlAN9QGkpK', NULL, '2018-07-29 12:16:29', NULL),
(8, 1, 'Ola', 'Coden', '0816655957', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$m9ieRulCRKiQ56cb/I3.Qu9n8.AEqLhySGbeSnvhW8N4sYWvpFJjC', NULL, '2018-07-29 12:16:30', NULL),
(9, 1, 'Olay', 'Codeno', '0816655958', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$GTkVvlO/RRAIKehHVM/rL.DWfkgW7jGRNwUJPwIqhk4sAol8zMTem', NULL, '2018-07-29 12:16:30', NULL),
(10, 1, 'Olayi', 'Codenon', '0816655959', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$7vY1qjGGKK9Xr/lsZh6wdeJzHdN.aGIrnRsQ61WjZN4OIbEobCWBe', NULL, '2018-07-29 12:16:30', NULL),
(11, 1, 'Olayinka', 'Codeno', '08166559510', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$3J9LfFAwvQAuvjvYw6k8.eBQxsxWrqpkL5Pp9rZHdCTV4BR3uVdkO', NULL, '2018-07-29 12:16:30', NULL),
(12, 1, 'Olayinka', 'Codenoni', '08166559511', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$Og7oSJQQDD96NfFsPhIJ2u8GkAW2mSnq360SzJzMA2dWh1FRNo4OC', NULL, '2018-07-29 12:16:30', NULL),
(13, 1, 'Olayinka', 'Codeno', '08166559512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$YGjbMpnbS6c/lRF3ho8i8uOQGGfFhU2ymXNq4KzFpiwXxznQphbky', NULL, '2018-07-29 12:16:30', NULL),
(14, 1, 'Olayin', 'Codenoni', '08166559513', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$OIiDVV2GPwL1qHW7Nrdp.O0qCRrXV97rlWVHsZXD4z05YlKnVFjSC', NULL, '2018-07-29 12:16:30', NULL),
(15, 1, 'Olayinka', 'Codeno', '08166559514', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$jx1mil4WvrSuLA.eWuTGGegnKtv/yZWIk8Uq.QeVwkIQKExuAMQlO', NULL, '2018-07-29 12:16:30', NULL),
(16, 1, 'Olayin', 'Codenoni', '08166559515', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$SdTBBSNeEDEnRUY5Ov9SuuffdYCDiotrBj3UuxUwvA1cVNuug3Y7.', NULL, '2018-07-29 12:16:31', NULL),
(17, 1, 'Olayinka', 'Codenon', '08166559516', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$ZaGBn2Fdl1skacwgT.nkHumJVXhXpeU4NymphShGVAhMBokCn/rxe', NULL, '2018-07-29 12:16:31', NULL),
(18, 1, 'Olay', 'Codenon', '08166559517', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$Up5P5DNKnZm30WSeGz5e/ufHRTD8tsMRARrPmB2YV3vgbhFhzy2L6', NULL, '2018-07-29 12:16:31', NULL),
(19, 1, 'Olayinka', 'Codenoni', '08166559518', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$uq9ZZB5k9g5ny4wGe1o6Bu1RZdGRPTK0DWgUwSp6UQVehoPqadMRC', NULL, '2018-07-29 12:16:31', NULL),
(20, 1, 'Ola', 'Codenoni', '08166559519', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$LUCb5i.jy5a9Nky6ldrFBu9eBESuKYkyvwHJ/JglXyLQxuHkkiJW6', NULL, '2018-07-29 12:16:31', NULL),
(21, 1, 'Olayinka', 'Coden', '08166559520', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$JUPOuETS9q0dkqogKckLbO2XQJ1U4trBxuPBxxpPst1tQlZC1tErW', NULL, '2018-07-29 12:16:31', NULL),
(22, 1, 'Olayin', 'Codenon', '08166559521', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$UxRVjkpFTtXt4wPfIi0eXe1lKKoM/J.t5AsVheFxqnPAclFuse612', NULL, '2018-07-29 12:16:31', NULL),
(23, 1, 'Ola', 'Codeno', '08166559522', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$3GUtQzgFQ.FTjc1MM44PtOfI10RCntntqMKWaIVOGq7CnDosLOh1u', NULL, '2018-07-29 12:16:31', NULL),
(24, 1, 'Olay', 'Codeno', '08166559523', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$OeyeQwfoeBh52pJ51faTHeBGXB9wQ/v5.03XpW6ZecRJdcRUtWB0e', NULL, '2018-07-29 12:16:32', NULL),
(25, 1, 'Olayinka', 'Codeno', '08166559524', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$Cijfwnm4raQ.zmQ7PzGPf.RYWuT104iQVSFJX4zVtnLg8iCzIvKDe', NULL, '2018-07-29 12:16:32', NULL);

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

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `body`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Blog Post Test', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat temporibus atque quibusdam dolores libero tempore eum laborum, id voluptatem illo debitis veniam, tenetur amet non unde nulla architecto. Beatae, dolorem!', 'blog-post-test', NULL, '2018-07-28 02:47:17', '2018-07-28 02:47:17'),
(2, 1, 'Blog Post Test2', '<h1>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</h1>\r\n\r\n<p><strong>Pellentesque habitant morbi tristique</strong> senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. <em>Aenean ultricies mi vitae est.</em> Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, <code>commodo vitae</code>, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. <a href=\"#\">Donec non enim</a> in turpis pulvinar facilisis. Ut felis.</p>\r\n\r\n<h2>Header Level 2</h2>\r\n\r\n<ol>\r\n	<li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>\r\n	<li>Aliquam tincidunt mauris eu risus.</li>\r\n</ol>\r\n\r\n<blockquote><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.</p></blockquote>\r\n\r\n<h3>Header Level 3</h3>\r\n\r\n<ul>\r\n	<li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>\r\n	<li>Aliquam tincidunt mauris eu risus.</li>\r\n</ul>\r\n\r\n<pre><code>\r\n#header h1 a { \r\n	display: block; \r\n	width: 300px; \r\n	height: 80px; \r\n}\r\n</code></pre>', 'blog-post-test2', NULL, '2018-07-28 03:02:19', '2018-07-28 03:02:19');

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
(1, 'STAFF', '2018-07-29 12:16:28', NULL),
(2, 'DOCTOR', '2018-07-29 12:16:28', NULL),
(3, 'SURGEON', '2018-07-29 12:16:28', NULL),
(4, 'ADMIN', '2018-07-29 12:16:28', NULL);

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
(1, 1, 5, NULL, 'Femoral head ostectomy', '2018-07-11', NULL, '2018-07-28 01:51:32', '2018-07-28 01:51:32');

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
(1, 'Genital', NULL, '2018-07-29 12:16:32', NULL),
(2, 'Female', NULL, '2018-07-29 12:16:32', NULL),
(3, 'Cervicectomy', NULL, '2018-07-29 12:16:32', NULL),
(4, 'Clitoridectomy', NULL, '2018-07-29 12:16:32', NULL),
(5, 'Hysterectomy', NULL, '2018-07-29 12:16:32', NULL),
(6, 'Myomectomy', NULL, '2018-07-29 12:16:32', NULL),
(7, 'Oophorectomy', NULL, '2018-07-29 12:16:32', NULL),
(8, 'Salpingectomy', NULL, '2018-07-29 12:16:32', NULL),
(9, 'Salpingoophorectomy', NULL, '2018-07-29 12:16:32', NULL),
(10, 'Vaginectomy', NULL, '2018-07-29 12:16:32', NULL),
(11, 'Vulvectomy', NULL, '2018-07-29 12:16:32', NULL),
(12, 'Male', NULL, '2018-07-29 12:16:32', NULL),
(13, 'Gonadectomy', NULL, '2018-07-29 12:16:32', NULL),
(14, 'Orchiectomy', NULL, '2018-07-29 12:16:32', NULL),
(15, 'Penectomy', NULL, '2018-07-29 12:16:32', NULL),
(16, 'Posthectomy', NULL, '2018-07-29 12:16:32', NULL),
(17, 'Prostatectomy', NULL, '2018-07-29 12:16:32', NULL),
(18, 'Varicocelectomy', NULL, '2018-07-29 12:16:32', NULL),
(19, 'Vasectomy', NULL, '2018-07-29 12:16:32', NULL),
(20, 'Musculoskeletal', NULL, '2018-07-29 12:16:32', NULL),
(21, 'Bursectomy', NULL, '2018-07-29 12:16:32', NULL),
(22, 'Amputation', NULL, '2018-07-29 12:16:32', NULL),
(23, 'Hemicorporectomy', NULL, '2018-07-29 12:16:32', NULL),
(24, 'Hemipelvectomy', NULL, '2018-07-29 12:16:32', NULL),
(25, 'Nervous system', NULL, '2018-07-29 12:16:32', NULL),
(26, 'CNS', NULL, '2018-07-29 12:16:32', NULL),
(27, 'Decompressive craniectomy', NULL, '2018-07-29 12:16:32', NULL),
(28, 'Hemispherectomy', NULL, '2018-07-29 12:16:32', NULL),
(29, 'Anterior temporal lobectomy', NULL, '2018-07-29 12:16:32', NULL),
(30, 'Hypophysectomy', NULL, '2018-07-29 12:16:32', NULL),
(31, 'Amygdalohippocampectomy', NULL, '2018-07-29 12:16:32', NULL),
(32, 'Laminectomy', NULL, '2018-07-29 12:16:32', NULL),
(33, 'Corpectomy', NULL, '2018-07-29 12:16:32', NULL),
(34, 'Facetectomy', NULL, '2018-07-29 12:16:32', NULL),
(35, 'PNS', NULL, '2018-07-29 12:16:32', NULL),
(36, 'Ganglionectomy', NULL, '2018-07-29 12:16:32', NULL),
(37, 'Sympathectomy / Endoscopic thoracic sympathectomy', NULL, '2018-07-29 12:16:32', NULL),
(38, 'Neurectomy', NULL, '2018-07-29 12:16:32', NULL),
(39, 'Nerve transfer', NULL, '2018-07-29 12:16:32', NULL),
(40, 'Ear', NULL, '2018-07-29 12:16:32', NULL),
(41, 'Stapedectomy', NULL, '2018-07-29 12:16:32', NULL),
(42, 'Mastoidectomy', NULL, '2018-07-29 12:16:32', NULL),
(43, 'Eye', NULL, '2018-07-29 12:16:32', NULL),
(44, 'Photorefractive keratectomy', NULL, '2018-07-29 12:16:32', NULL),
(45, 'Trabeculectomy', NULL, '2018-07-29 12:16:32', NULL),
(46, 'Iridectomy', NULL, '2018-07-29 12:16:32', NULL),
(47, 'Vitrectomy', NULL, '2018-07-29 12:16:32', NULL),
(48, 'Gastrointestinal', NULL, '2018-07-29 12:16:32', NULL),
(49, 'Glossectomy', NULL, '2018-07-29 12:16:32', NULL),
(50, 'Esophagectomy', NULL, '2018-07-29 12:16:32', NULL),
(51, 'Gastrectomy', NULL, '2018-07-29 12:16:32', NULL),
(52, 'Appendectomy', NULL, '2018-07-29 12:16:32', NULL),
(53, 'Proctocolectomy', NULL, '2018-07-29 12:16:32', NULL),
(54, 'Colectomy', NULL, '2018-07-29 12:16:32', NULL),
(55, 'Hepatectomy', NULL, '2018-07-29 12:16:32', NULL),
(56, 'Cholecystectomy', NULL, '2018-07-29 12:16:32', NULL),
(57, 'Pancreatectomy / Pancreaticoduodenectomy', NULL, '2018-07-29 12:16:32', NULL),
(58, 'Respiratory', NULL, '2018-07-29 12:16:32', NULL),
(59, 'Rhinectomy', NULL, '2018-07-29 12:16:32', NULL),
(60, 'Laryngectomy', NULL, '2018-07-29 12:16:32', NULL),
(61, 'Pneumonectomy', NULL, '2018-07-29 12:16:32', NULL),
(62, 'Endocrine', NULL, '2018-07-29 12:16:32', NULL),
(63, 'Thyroidectomy', NULL, '2018-07-29 12:16:32', NULL),
(64, 'Parathyroidectomy', NULL, '2018-07-29 12:16:32', NULL),
(65, 'Adrenalectomy', NULL, '2018-07-29 12:16:32', NULL),
(66, 'Pinealectomy', NULL, '2018-07-29 12:16:32', NULL),
(67, 'Renal', NULL, '2018-07-29 12:16:32', NULL),
(68, 'Nephrectomy', NULL, '2018-07-29 12:16:32', NULL),
(69, 'Cystectomy', NULL, '2018-07-29 12:16:32', NULL),
(70, 'Lymphatic', NULL, '2018-07-29 12:16:32', NULL),
(71, 'Tonsillectomy', NULL, '2018-07-29 12:16:32', NULL),
(72, 'Adenoidectomy', NULL, '2018-07-29 12:16:32', NULL),
(73, 'Thymectomy', NULL, '2018-07-29 12:16:32', NULL),
(74, 'Splenectomy', NULL, '2018-07-29 12:16:32', NULL),
(75, 'Lymphadenectomy', NULL, '2018-07-29 12:16:32', NULL),
(76, 'Adenectomy', NULL, '2018-07-29 12:16:32', NULL),
(77, 'Breast', NULL, '2018-07-29 12:16:32', NULL),
(78, 'Lumpectomy', NULL, '2018-07-29 12:16:32', NULL),
(79, 'Mastectomy', NULL, '2018-07-29 12:16:32', NULL),
(80, 'Bone / joint', NULL, '2018-07-29 12:16:32', NULL),
(81, 'Coccygectomy', NULL, '2018-07-29 12:16:32', NULL),
(82, 'Ostectomy', NULL, '2018-07-29 12:16:32', NULL),
(83, 'Femoral head ostectomy', NULL, '2018-07-29 12:16:32', NULL),
(84, 'Astragalectomy', NULL, '2018-07-29 12:16:32', NULL),
(85, 'Discectomy', NULL, '2018-07-29 12:16:32', NULL),
(86, 'Synovectomy', NULL, '2018-07-29 12:16:32', NULL),
(87, 'Ungrouped', NULL, '2018-07-29 12:16:32', NULL),
(88, 'Embolectomy', NULL, '2018-07-29 12:16:32', NULL),
(89, 'Endarterectomy', NULL, '2018-07-29 12:16:32', NULL),
(90, 'Frenectomy', NULL, '2018-07-29 12:16:32', NULL),
(91, 'Gingivectomy', NULL, '2018-07-29 12:16:32', NULL),
(92, 'Lobectomy', NULL, '2018-07-29 12:16:32', NULL),
(93, 'Panniculectomy', NULL, '2018-07-29 12:16:32', NULL),
(94, 'Pericardiectomy', NULL, '2018-07-29 12:16:32', NULL),
(95, 'Ostomy', NULL, '2018-07-29 12:16:32', NULL),
(96, 'Gastrostomy', NULL, '2018-07-29 12:16:32', NULL),
(97, 'Percutaneous endoscopic gastrostomy', NULL, '2018-07-29 12:16:32', NULL),
(98, 'Gastroduodenostomy', NULL, '2018-07-29 12:16:32', NULL),
(99, 'Gastroenterostomy', NULL, '2018-07-29 12:16:32', NULL),
(100, 'Ileostomy', NULL, '2018-07-29 12:16:32', NULL),
(101, 'Jejunostomy', NULL, '2018-07-29 12:16:33', NULL),
(102, 'Colostomy', NULL, '2018-07-29 12:16:33', NULL),
(103, 'Cholecystostomy', NULL, '2018-07-29 12:16:33', NULL),
(104, 'Hepatoportoenterostomy', NULL, '2018-07-29 12:16:33', NULL),
(105, 'Urogenital', NULL, '2018-07-29 12:16:33', NULL),
(106, 'Nephrostomy', NULL, '2018-07-29 12:16:33', NULL),
(107, 'Ureterostomy', NULL, '2018-07-29 12:16:33', NULL),
(108, 'Cystostomy', NULL, '2018-07-29 12:16:33', NULL),
(109, 'Suprapubic cystostomy', NULL, '2018-07-29 12:16:33', NULL),
(110, 'Urostomy', NULL, '2018-07-29 12:16:33', NULL),
(111, 'Ventriculostomy', NULL, '2018-07-29 12:16:33', NULL),
(112, 'Dacryocystorhinostomy', NULL, '2018-07-29 12:16:33', NULL),
(113, 'Otomy', NULL, '2018-07-29 12:16:33', NULL),
(114, 'Amniotomy', NULL, '2018-07-29 12:16:33', NULL),
(115, 'Clitoridotomy', NULL, '2018-07-29 12:16:33', NULL),
(116, 'Hysterotomy', NULL, '2018-07-29 12:16:33', NULL),
(117, 'Hymenotomy', NULL, '2018-07-29 12:16:33', NULL),
(118, 'Episiotomy', NULL, '2018-07-29 12:16:33', NULL),
(119, 'Meatotomy', NULL, '2018-07-29 12:16:33', NULL),
(120, 'Nephrotomy', NULL, '2018-07-29 12:16:33', NULL),
(121, 'Craniotomy', NULL, '2018-07-29 12:16:33', NULL),
(122, 'Pallidotomy', NULL, '2018-07-29 12:16:33', NULL),
(123, 'Thalamotomy', NULL, '2018-07-29 12:16:33', NULL),
(124, 'Lobotomy', NULL, '2018-07-29 12:16:33', NULL),
(125, 'Bilateral cingulotomy', NULL, '2018-07-29 12:16:33', NULL),
(126, 'Cordotomy', NULL, '2018-07-29 12:16:33', NULL),
(127, 'Rhizotomy', NULL, '2018-07-29 12:16:33', NULL),
(128, 'Laminotomy', NULL, '2018-07-29 12:16:33', NULL),
(129, 'Foraminotomy', NULL, '2018-07-29 12:16:33', NULL),
(130, 'Axotomy', NULL, '2018-07-29 12:16:33', NULL),
(131, 'Vagotomy', NULL, '2018-07-29 12:16:33', NULL),
(132, 'Myringotomy', NULL, '2018-07-29 12:16:33', NULL),
(133, 'Radial keratotomy', NULL, '2018-07-29 12:16:33', NULL),
(134, 'Myotomy', NULL, '2018-07-29 12:16:33', NULL),
(135, 'Tenotomy', NULL, '2018-07-29 12:16:33', NULL),
(136, 'Fasciotomy', NULL, '2018-07-29 12:16:33', NULL),
(137, 'Escharotomy', NULL, '2018-07-29 12:16:33', NULL),
(138, 'Osteotomy', NULL, '2018-07-29 12:16:33', NULL),
(139, 'Arthrotomy', NULL, '2018-07-29 12:16:33', NULL),
(140, 'Tendon transfer', NULL, '2018-07-29 12:16:33', NULL),
(141, 'Heller myotomy', NULL, '2018-07-29 12:16:33', NULL),
(142, 'Pyloromyotomy', NULL, '2018-07-29 12:16:33', NULL),
(143, 'Anal sphincterotomy', NULL, '2018-07-29 12:16:33', NULL),
(144, 'Lateral internal sphincterotomy', NULL, '2018-07-29 12:16:33', NULL),
(145, 'Sinusotomy', NULL, '2018-07-29 12:16:33', NULL),
(146, 'Cricothyrotomy', NULL, '2018-07-29 12:16:33', NULL),
(147, 'Bronchotomy', NULL, '2018-07-29 12:16:33', NULL),
(148, 'Thoracotomy', NULL, '2018-07-29 12:16:33', NULL),
(149, 'Thyrotomy', NULL, '2018-07-29 12:16:33', NULL),
(150, 'Tracheotomy', NULL, '2018-07-29 12:16:33', NULL),
(151, 'Cardiovascular', NULL, '2018-07-29 12:16:33', NULL),
(152, 'Cardiotomy', NULL, '2018-07-29 12:16:33', NULL),
(153, 'Phlebotomy', NULL, '2018-07-29 12:16:33', NULL),
(154, 'Arteriotomy', NULL, '2018-07-29 12:16:33', NULL),
(155, 'Venotomy', NULL, '2018-07-29 12:16:33', NULL),
(156, 'Laparotomy', NULL, '2018-07-29 12:16:33', NULL);

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
(1, 'Tunji', 'Oyeniran', 'oyenirantunji2339@gmail.com', '$2y$10$iYsRIuS4UbAyjwKCm/5oNeYd91MyYDMwuZqrk3YFpaVE43mROYRBO', 4, NULL, 'MALE', NULL, '090', NULL, NULL, NULL, NULL, 'img/default.png', NULL, '2018-07-29 12:16:28', NULL),
(2, 'Test', 'Admin', 'test@admin.com', '$2y$10$lI/ENx9eJBy5SKY1uK6sqeuqQviAXWqbESJCGuPJMFv.z5pYU2kSe', 4, NULL, 'MALE', NULL, '080', NULL, NULL, NULL, NULL, 'img/default.png', NULL, '2018-07-29 12:16:28', NULL),
(3, 'Test', 'Staff', 'test@staff.com', '$2y$10$UY4pJ.5IQJN2FyRNbhriIenDp0xiEhuyGX.hy8Be6GpJTf9XnJ1Z.', 1, NULL, 'FEMALE', NULL, '080', NULL, NULL, NULL, NULL, 'img/default.png', NULL, '2018-07-29 12:16:28', NULL);

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
  `successful_delivery` tinyint(1) NOT NULL DEFAULT '0',
  `discharged_on` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`id`, `user_id`, `patient_id`, `type`, `title`, `subjects`, `objects`, `assessment`, `plans`, `successful_delivery`, `discharged_on`, `created_at`, `updated_at`) VALUES
(1, NULL, 7, 'DELIVERY', 'DELIVERY Visit Test 0', NULL, NULL, NULL, NULL, 1, NULL, '2018-07-29 12:16:32', NULL),
(2, NULL, 17, 'OTHERS', 'OTHERS Visit Test 1', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-29 12:16:32', NULL),
(3, NULL, 12, 'CONSULTATION', 'CONSULTATION Visit Test 2', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-29 12:16:32', NULL),
(4, NULL, 12, 'OTHERS', 'OTHERS Visit Test 3', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-29 12:16:32', NULL),
(5, NULL, 7, 'EMERGENCY', 'EMERGENCY Visit Test 4', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-29 12:16:32', NULL),
(6, NULL, 19, 'EMERGENCY', 'EMERGENCY Visit Test 5', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-29 12:16:32', NULL),
(7, NULL, 9, 'EMERGENCY', 'EMERGENCY Visit Test 6', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-29 12:16:32', NULL),
(8, NULL, 10, 'EMERGENCY', 'EMERGENCY Visit Test 7', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-29 12:16:32', NULL),
(9, NULL, 13, 'EMERGENCY', 'EMERGENCY Visit Test 8', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-29 12:16:32', NULL),
(10, NULL, 5, 'OTHERS', 'OTHERS Visit Test 9', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-29 12:16:32', NULL),
(11, NULL, 9, 'CONSULTATION', 'CONSULTATION Visit Test 10', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-29 12:16:32', NULL),
(12, NULL, 1, 'EMERGENCY', 'EMERGENCY Visit Test 11', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-29 12:16:32', NULL),
(13, NULL, 8, 'EMERGENCY', 'EMERGENCY Visit Test 12', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-29 12:16:32', NULL),
(14, NULL, 14, 'CONSULTATION', 'CONSULTATION Visit Test 13', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-29 12:16:32', NULL),
(15, NULL, 2, 'EMERGENCY', 'EMERGENCY Visit Test 14', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-29 12:16:32', NULL),
(16, NULL, 17, 'OTHERS', 'OTHERS Visit Test 15', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-29 12:16:32', NULL),
(17, NULL, 20, 'CONSULTATION', 'CONSULTATION Visit Test 16', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-29 12:16:32', NULL),
(18, NULL, 13, 'EMERGENCY', 'EMERGENCY Visit Test 17', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-29 12:16:32', NULL),
(19, NULL, 2, 'DELIVERY', 'DELIVERY Visit Test 18', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-29 12:16:32', NULL),
(20, NULL, 14, 'EMERGENCY', 'EMERGENCY Visit Test 19', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-29 12:16:32', NULL),
(21, NULL, 15, 'DELIVERY', 'DELIVERY Visit Test 20', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-29 12:16:32', NULL),
(22, NULL, 14, 'DELIVERY', 'DELIVERY Visit Test 21', NULL, NULL, NULL, NULL, 1, NULL, '2018-07-29 12:16:32', NULL),
(23, NULL, 23, 'OTHERS', 'OTHERS Visit Test 22', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-29 12:16:32', NULL),
(24, NULL, 23, 'OTHERS', 'OTHERS Visit Test 23', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-29 12:16:32', NULL),
(25, NULL, 21, 'EMERGENCY', 'EMERGENCY Visit Test 24', NULL, NULL, NULL, NULL, 0, NULL, '2018-07-29 12:16:32', NULL);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `surgeries`
--
ALTER TABLE `surgeries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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

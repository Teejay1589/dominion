-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2018 at 05:41 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `patient_id` int(11) NOT NULL,
  `admission` int(11) NOT NULL,
  `consultation` int(11) NOT NULL,
  `doctor` int(11) NOT NULL,
  `surgeon` int(11) NOT NULL,
  `operation` int(11) NOT NULL,
  `delivery` int(11) NOT NULL,
  `medicine` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `vat` int(11) NOT NULL,
  `service` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `total` int(11) NOT NULL,
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
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symptoms` text COLLATE utf8mb4_unicode_ci,
  `treatment` text COLLATE utf8mb4_unicode_ci,
  `medicine` text COLLATE utf8mb4_unicode_ci,
  `is_consultation` tinyint(1) NOT NULL DEFAULT '0',
  `is_emergency` tinyint(1) NOT NULL DEFAULT '0',
  `is_delivery` tinyint(1) NOT NULL DEFAULT '0',
  `is_success` tinyint(1) NOT NULL DEFAULT '0',
  `discharged_on` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `case_doctors`
--

CREATE TABLE `case_doctors` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `case_id` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL,
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
(23, '2018_05_05_185007_create_surgery_names_table', 1),
(70, '2013_03_28_152007_create_roles_table', 2),
(71, '2014_10_12_000000_create_users_table', 2),
(72, '2014_10_12_100000_create_password_resets_table', 2),
(73, '2018_03_28_151540_create_patients_table', 2),
(74, '2018_03_28_151607_create_bookings_table', 2),
(75, '2018_03_28_151619_create_messages_table', 2),
(76, '2018_03_28_151834_create_billings_table', 2),
(77, '2018_03_28_151844_create_cases_table', 2),
(78, '2018_03_28_151855_create_sms_table', 2),
(79, '2018_04_06_191500_create_case_doctors_table', 2),
(80, '2018_04_06_191542_create_surgeries_table', 2),
(81, '2018_05_09_191801_create_posts_table', 2);

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
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('UNKNOWN','MALE','FEMALE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'UNKNOWN',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_of_kin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_of_kin_telephone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 1, 'Experience in primary care — and how to improve it', 'It may not be surprising that most people don’t love going to the doctor, however this comes with a critical consequence for employers: employees who aren’t engaged in their health or avoid seeking medical care altogether because of negative perceptions or past experiences are more likely to be unprepared when they do need care.\r\n\r\nIn our new report, we highlight findings from a recent survey: 48% of employees ended up at urgent care and 46% at the ER for non-critical reasons.  And nearly 1 in 5 people didn’t have a healthcare provider they see regularly.\r\n\r\nNow more than ever, employers should focus on the total experience of their health ecosystem. We believe there’s a key to boosting employer-sponsored healthcare engagement that’s often overlooked: an extraordinary patient experience.\r\nThe business cost of poor care experiences\r\n\r\nA poor healthcare experience isn’t a trivial matter. When employees are faced with prohibitively high costs, low-quality care, and accessibility obstacles, they often stop proactively tending to their health. That’s when employers risk facing downstream effects:\r\n\r\n    Decreased health engagement: When the patient experience is a challenge every step of the way, employees are unlikely to seek and may even avoid care — including preventive care.\r\n    Lost productivity: Lack of access to primary care can mean more time spent waiting for an appointment or in waiting rooms rather than healthy and in the office. Worse, if they avoid seeking medical care because of past experiences, this could force employees to compromise their health and potentially the well-being of those around them leading to high-cost claims and absenteeism.\r\n    Higher costs: When employees aren’t engaging proactively with their healthcare options, they’re more likely to be unprepared when they do need care. The result? More high-cost claims by heading to urgent care or the ER for basic needs instead of to in-network primary care providers.\r\n\r\nThe goal for employers should be to engage employees when they’re healthy and in the position to take advantage of and understand the health services available to them.\r\nThe solution: An extraordinary patient experience\r\n\r\nExperience isn’t just about the office visit or a doctor’s bedside manner — it’s inherently embedded in every step of the healthcare journey from the moment before booking the appointment, to the experience of receiving one-on-one care, and to the personalized and thoughtful follow-up.\r\n\r\nUpleveling the healthcare experience at all of these touchpoints has far-reaching benefits. Aside from improved productivity, engagement, and company culture for the employee, dependents reap rewards, too. A healthcare program that addresses family care in an integrated way and gives patients easy access to personalized primary care and lower costs means the whole family is more likely to be successful in reaching their health goals.\r\n\r\nExtraordinary, patient-centered care is possible, but it requires going above and beyond the industry standard.\r\n\r\nThe core attributes of person-first, patient-centered care\r\n\r\nPatient-centered care has nothing to do with logistics and protocol and everything to do with designing a healthcare system that meaningfully engages patients and providers. In short, it’s all about human connection. Truly innovative and high-quality health care stays true to five core attributes:\r\n\r\n    High accessibility. Providing employees care when they need it in the form of same- or next-day appointments is crucial. Offering a variety of channels to receive that care is equally critical — office visits are just one piece of the puzzle. Thoughtfully designed virtual appointments, emails, and phone consultations can all contribute to a truly accessible model and drive better health.\r\n    Engaged providers. It’s important that providers are salaried and not compensated on the volume of procedures billed. This leads not only to appointments that are too short and unnecessary visits but also to an overall negative patient experience (not to mention provider burnout). Lightening a provider’s patient load and eliminating wasteful referral behaviors or duplicative testing allows them to focus on getting to know each patient better and provide more personalized, higher value care.\r\n    Hospitality mindset. A thoughtfully curated, stress-free experience allows patients to feel more comfortable and open. From a cheerful greeting at check in to cozy flannel gowns in welcoming, modern exam rooms — the details matter. Patients should feel like they’re checking in to a five-star hotel, not trying to get their license renewed at the DMV.', 'experience-in-primary-care', '1527476988.jpg', '2018-05-28 02:09:49', '2018-05-28 02:09:49'),
(2, 1, 'A better patient', 'Ever walked out of your doctor’s office with something still on your mind? Maybe you feel like you didn’t describe your symptoms clearly enough, or you forgot to mention one concern altogether. It happens more often than you think, and it’s frustrating to patients and providers alike (we want to make sure all your concerns are being addressed!). However, you can avoid walking out feeling like you missed something with a little bit of preparation and education.\r\n\r\nHere are a few ways to make sure your provider gets the information they need.\r\n1. Find a provider you can be honest with\r\n\r\nOne of the best ways to get the most out of office visits is to make sure you’re seeing the right provider. Within your first few visits, you should feel like you’re building a rapport, sharing honest conversation, and putting everything on the table for your provider to absorb. Don’t feel like you have to be the “perfect patient” — the best patient is an honest one. And our providers won’t judge. Even if you think something sounds a little off the wall, trust me — we’ve heard it before.\r\n\r\nStill holding back? Just admit it. Tell your provider you’re feeling anxious but want to make sure you’re communicating clearly. It’s important for providers to hear! And if you just can’t open up, it may be time to find a new provider. After all, you’re there to be taken care of — not to put on a performance.\r\n2. Set the agenda\r\n\r\nIt may sound more appropriate for a business meeting, but coming into your appointment with an agenda can ensure you cover everything you want to discuss. When most patients come to see me, they have one or two big items on their mind but often think of other issues as the visit progresses. Since all of those concerns and symptoms add up to the proper diagnosis, having that information written down before the visit can help us make the most of our time together.\r\n\r\nBefore you come in, try to make a list of one to three top concerns you want to cover. If you have more, that’s fine, too — but be prepared to work with your provider to prioritize what’s most important and what can wait for a follow-up visit.\r\n3. Understand the structure of an office visit\r\n\r\nAn office visit isn’t just sitting down to chat –there’s a structure behind it. Setting the agenda is the first step, followed by a medical history. Expect to get asked about how long your symptoms have been going on, what makes them better or worse, or what other factors have had an impact on them. From there, I’ll conduct a physical exam and discuss possible diagnoses and treatment plans. While this all may seem straightforward, it’s important to know what’s going on so you and your provider are on the same page and able to work together.\r\n4. Don’t go overboard on the research\r\n\r\nIt’s hard to resist the urge to Google your symptoms. But if you’re spending hours digging through the dark corners of the internet, you’re doing yourself a disservice. Often, the nonspecific information available online can lead patients to believe a small problem is something far more dire.\r\n\r\nThat said, there are studies that recommend patients research ahead of time in order to help point their provider in the right direction. It doesn’t need to be excessive — if you spend 15 minutes educating yourself on treatment options or clarifying specific symptoms ahead of the visit, that’s completely adequate. Not sure where to look? Just ask. I’m always happy to share some of my favorite resources.\r\n5. Arrive early\r\n\r\nI love having longer appointments with my patients at One Medical, but sometimes, it doesn’t matter how long the visit is — it just doesn’t feel like enough time. So, I encourage my patients to maximize their time by arriving early. Although we ask patients to arrive five minutes before their appointment, arriving 10 to 15 minutes early allows our admin team to get you checked in, process your insurance information, and answer questions. Some patients also find it helpful to to take a few quiet moments before their visit to relax and mentally prepare. Our comfortable and homey waiting areas are designed to be perfect for just that.\r\n6. Partner with your provider\r\n\r\nAs a patient, it’s important to remember that you’re part of your own care team. Several studies have suggested that shared decision making improves clinical outcomes. So, you should expect to have your provider ask for your input on their proposed treatment plan — and they really do want to hear your thoughts on it. Provider-patient relationships aren’t authoritative like they were 40 years ago. If your provider suggests physical therapy for an injury but you know you won’t have time to go regularly, tell them so you can develop an alternate treatment plan together.\r\n\r\nPartnering with your provider means you should expect to put some work in, as well. Take notes, and ask questions if you don’t understand something. Participation is key to making sure you get the right care. At One Medical, the partnership between providers and patients is at the center of everything we do — we believe that the best care comes from working together towards your health goals.', 'a-better-patient', '1527477405.jpg', '2018-05-28 02:16:45', '2018-05-28 02:16:45');

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
(1, 'STAFF', NULL, NULL),
(2, 'DOCTOR', NULL, NULL),
(3, 'SURGEON', NULL, NULL),
(4, 'ADMIN', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
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
-- Table structure for table `surgeries`
--

CREATE TABLE `surgeries` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `case_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `started_at` datetime DEFAULT NULL,
  `ended_at` datetime DEFAULT NULL,
  `is_success` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `surgery_names`
--

CREATE TABLE `surgery_names` (
  `id` int(10) UNSIGNED NOT NULL,
  `surgery_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '', 'Awoleke', 'awoleke@dominionmc.org', '$2y$10$FN4A.qMg45Hq8sUDuaei.eDDB2nC5hqi2laZiTKvyZPeDfjuC5x2G', 4, NULL, 'MALE', NULL, '090', NULL, NULL, NULL, NULL, 'img/default.png', NULL, NULL, NULL),
(2, 'Test', 'Admin', 'test@admin.com', '$2y$10$vMiWkGDcg8LhIYh5v42FCuoErRY.b.l1s8pdbAg0dAJj7dELylRv.', 4, NULL, 'MALE', NULL, '080', NULL, NULL, NULL, NULL, 'img/default.png', NULL, NULL, NULL),
(3, 'Test', 'Staff', 'test@staff.com', '$2y$10$J9NZ5KBEG0SvAXp6hKzXaOKlGKjPWmLdbJASBxwJIFyYlYbb9aqeu', 1, NULL, 'FEMALE', NULL, '080', NULL, NULL, NULL, NULL, 'img/default.png', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billings`
--
ALTER TABLE `billings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cases_user_id_index` (`user_id`),
  ADD KEY `cases_patient_id_index` (`patient_id`);

--
-- Indexes for table `case_doctors`
--
ALTER TABLE `case_doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `case_doctors_user_id_index` (`user_id`),
  ADD KEY `case_doctors_case_id_index` (`case_id`),
  ADD KEY `case_doctors_doctor_id_index` (`doctor_id`);

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
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surgeries`
--
ALTER TABLE `surgeries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surgeries_user_id_index` (`user_id`),
  ADD KEY `surgeries_case_id_index` (`case_id`);

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
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `case_doctors`
--
ALTER TABLE `case_doctors`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `surgeries`
--
ALTER TABLE `surgeries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `surgery_names`
--
ALTER TABLE `surgery_names`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cases`
--
ALTER TABLE `cases`
  ADD CONSTRAINT `cases_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`),
  ADD CONSTRAINT `cases_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `case_doctors`
--
ALTER TABLE `case_doctors`
  ADD CONSTRAINT `case_doctors_case_id_foreign` FOREIGN KEY (`case_id`) REFERENCES `cases` (`id`),
  ADD CONSTRAINT `case_doctors_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `case_doctors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `surgeries`
--
ALTER TABLE `surgeries`
  ADD CONSTRAINT `surgeries_case_id_foreign` FOREIGN KEY (`case_id`) REFERENCES `cases` (`id`),
  ADD CONSTRAINT `surgeries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

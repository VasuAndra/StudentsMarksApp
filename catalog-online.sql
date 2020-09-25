-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 16, 2019 at 06:48 PM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.17-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catalog-online`
--

-- --------------------------------------------------------

--
-- Table structure for table `course-professor`
--

CREATE TABLE `course-professor` (
  `professor_id` bigint(20) NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam` int(11) NOT NULL DEFAULT '0',
  `course_presence` int(11) NOT NULL DEFAULT '0',
  `course_homework` int(11) NOT NULL DEFAULT '0',
  `course_activity` int(11) NOT NULL DEFAULT '0',
  `test` int(11) NOT NULL DEFAULT '0',
  `seminar_presence` int(11) NOT NULL DEFAULT '0',
  `seminar_homework` int(11) NOT NULL DEFAULT '0',
  `seminar_activity` int(11) NOT NULL DEFAULT '0',
  `colloquy` int(11) NOT NULL DEFAULT '0',
  `lab_presence` int(11) NOT NULL DEFAULT '0',
  `lab_homework` int(11) NOT NULL DEFAULT '0',
  `lab_activity` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course-professor`
--

INSERT INTO `course-professor` (`professor_id`, `course_id`, `id`, `exam`, `course_presence`, `course_homework`, `course_activity`, `test`, `seminar_presence`, `seminar_homework`, `seminar_activity`, `colloquy`, `lab_presence`, `lab_homework`, `lab_activity`, `created_at`, `updated_at`) VALUES
(3, 3, 14, 3, 0, 2, 0, 2, 0, 3, 0, 0, 0, 0, 0, NULL, NULL),
(4, 4, 15, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, NULL, '2019-04-22 12:07:43');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `semester` tinyint(1) NOT NULL,
  `domain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialization` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `year`, `semester`, `domain`, `specialization`, `created_at`, `updated_at`) VALUES
(3, 'Algebra', 1, 1, 'Informatica', 'Informatica', NULL, NULL),
(4, 'Programare Procedurala', 1, 1, 'Informatica', 'Informatica', NULL, NULL),
(5, 'Geometrie Computationala', 2, 2, 'Informatica', 'Informatica', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `exam` int(11) NOT NULL DEFAULT '0',
  `course_presence` int(11) NOT NULL DEFAULT '0',
  `course_homework` int(11) NOT NULL DEFAULT '0',
  `course_activity` int(11) NOT NULL DEFAULT '0',
  `test` int(11) NOT NULL DEFAULT '0',
  `seminar_presence` int(11) NOT NULL DEFAULT '0',
  `seminar_homework` int(11) NOT NULL DEFAULT '0',
  `seminar_activity` int(11) NOT NULL DEFAULT '0',
  `colloquy` int(11) NOT NULL DEFAULT '0',
  `lab_presence` int(11) NOT NULL DEFAULT '0',
  `lab_homework` int(11) NOT NULL DEFAULT '0',
  `lab_activity` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profesor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `final_grade` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `student_id`, `course_id`, `exam`, `course_presence`, `course_homework`, `course_activity`, `test`, `seminar_presence`, `seminar_homework`, `seminar_activity`, `colloquy`, `lab_presence`, `lab_homework`, `lab_activity`, `created_at`, `updated_at`, `profesor_id`, `final_grade`) VALUES
(7, 5, 3, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 3, 0),
(8, 5, 4, 2, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, NULL, NULL, 4, 4),
(9, 4, 4, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_04_14_130237_create_professors_table', 1),
(4, '2019_04_14_131254_create_courses_table', 1),
(5, '2019_04_14_131537_create_students_table', 1),
(6, '2019_04_14_132005_create_course-professor_table', 1),
(7, '2019_04_14_134043_create_marks_table', 1),
(8, '2019_04_20_115545_alter_users_table', 1),
(9, '2019_04_21_130444_alter_table_marks', 2),
(10, '2019_04_22_122019_add_semester_info', 3),
(11, '2019_04_22_122410_add_final_grade_marks', 4),
(12, '2019_04_27_153920_add_admin', 5);

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
-- Table structure for table `professors`
--

CREATE TABLE `professors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CNP` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `professors`
--

INSERT INTO `professors` (`id`, `firstName`, `lastName`, `CNP`, `address`, `email`, `password`, `created_at`, `updated_at`) VALUES
(3, 'Ionela', 'Stan', '2345678912345', 'Str Florilor', 'ionela.stan@gmail.com', '$2y$10$weq2hVRrxixkTLKQ2hjwF.hcBGglATw/bmq9SbGMGk7.24ZAMnO9a', NULL, NULL),
(4, 'Silviu', 'Rusu', '1234567891234', 'Str. PLopilor', 'silviu.rusu@gmail.com', '$2y$10$h/zWlf6CmZ8Li6ng8WDoE.YejFCro0z2ItYU2rL7wKio4b0T1g6ai', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fatherName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `domain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialization` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` int(11) NOT NULL,
  `CNP` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `semester` tinyint(1) NOT NULL DEFAULT '0',
  `previos_semester_mark` double NOT NULL DEFAULT '0',
  `current_semester_mark` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstName`, `lastName`, `fatherName`, `country`, `city`, `year`, `domain`, `specialization`, `group`, `CNP`, `address`, `email`, `password`, `created_at`, `updated_at`, `semester`, `previos_semester_mark`, `current_semester_mark`) VALUES
(4, 'Maria', 'Popescu', 'Ion', 'Romania', 'Ploiesti', 1, 'Informatica', 'Informatica', 131, '2345678912345', 'Str PLopilor', 'maria.popescu@gmail.com', '$2y$10$CGLBQ4p2V1rOXcaEicvuw.JDJgEqUsavJqboxo.SKpl/4vJuKi6b2', NULL, NULL, 0, 9, 7.5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profesor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `student_id`, `profesor_id`, `isAdmin`) VALUES
(3, 'Maria', 'Popescu', 'maria.popescu@gmail.com', NULL, '$2y$10$CGLBQ4p2V1rOXcaEicvuw.JDJgEqUsavJqboxo.SKpl/4vJuKi6b2', NULL, NULL, NULL, 4, NULL, 0),
(6, 'Silviu', 'Rusu', 'silviu.rusu@gmail.com', NULL, '$2y$10$h/zWlf6CmZ8Li6ng8WDoE.YejFCro0z2ItYU2rL7wKio4b0T1g6ai', NULL, NULL, NULL, NULL, 4, 0),
(7, 'admin', 'admin', 'admin@email.com', NULL, '$2y$10$SmIe.yh0dj7.P7JQ9QXko./iFfEC1JzwSiVrAbg97tYUMKuEGfZXK', NULL, NULL, NULL, NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course-professor`
--
ALTER TABLE `course-professor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_professor_professor_id_course_id_unique` (`professor_id`,`course_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `marks_student_id_course_id_unique` (`student_id`,`course_id`);

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
-- Indexes for table `professors`
--
ALTER TABLE `professors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `professors_email_unique` (`email`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `course-professor`
--
ALTER TABLE `course-professor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `professors`
--
ALTER TABLE `professors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

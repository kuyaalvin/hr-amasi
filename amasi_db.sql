-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 22, 2018 at 04:50 PM
-- Server version: 10.2.8-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amasi_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `employee_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_number` char(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mothers_maiden_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provincial_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone_number` char(9) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number1` char(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number2` char(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date NOT NULL,
  `birth_place` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emergency_contact_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_contact_number` char(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_contact_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `civil_status` enum('Single','Married') COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_dependencies` tinyint(3) UNSIGNED DEFAULT NULL,
  `citizenship` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('Male','Female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `sss_id` char(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phic_id` char(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hdmf_id` char(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tin_id` char(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` char(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biometric_id` char(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payroll_type` enum('Weekly','Monthly') COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_started` date NOT NULL,
  `date_hired` date DEFAULT NULL,
  `date_terminated` date DEFAULT NULL,
  `employment_type` enum('Agency','Regular') COLLATE utf8mb4_unicode_ci NOT NULL,
  `referred_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `walk_in` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Terminated','AWOL','Deceased','Others') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `position_id` int(10) UNSIGNED DEFAULT NULL,
  `project_id` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`employee_id`),
  UNIQUE KEY `employees_id_number_unique` (`id_number`),
  UNIQUE KEY `employees_account_number_unique` (`account_number`),
  UNIQUE KEY `employees_biometric_id_unique` (`biometric_id`),
  KEY `employees_position_id_foreign` (`position_id`),
  KEY `employees_project_id_foreign` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_10_16_165946_create_users_table', 1),
(2, '2017_10_16_170023_create_positions_table', 1),
(3, '2017_10_16_170047_create_projects_table', 1),
(4, '2017_10_16_170115_create_employees_table', 1),
(5, '2017_10_26_115006_add_foreign_keys', 1),
(6, '2017_11_04_164658_add_system_admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

DROP TABLE IF EXISTS `positions`;
CREATE TABLE IF NOT EXISTS `positions` (
  `position_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`position_id`),
  UNIQUE KEY `positions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `project_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_in` time DEFAULT NULL,
  `time_out` time DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`project_id`),
  UNIQUE KEY `projects_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `token`) VALUES
(1, 'root', '$2y$10$qCkFg5p4EgQ1qq.tTbbx/eaCGcphyDYfAVm7h4zI8gARUcDpPaBVy', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`position_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `employees_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE IF NOT EXISTS `employees` (
  `employee_id` int(10) UNSIGNED NOT NULL primary key AUTO_INCREMENT,
  `id_number` char(8) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `mothers_maiden_name` varchar(50) DEFAULT NULL,
  `city_address` varchar(255) NOT NULL,
  `provincial_address` varchar(255) DEFAULT NULL,
  `telephone_number` char(9) DEFAULT NULL,
  `mobile_number1` char(13) DEFAULT NULL,
  `mobile_number2` char(13) DEFAULT NULL,
  `birthdate` date NOT NULL,
  `birth_place` varchar(50) NOT NULL,
  `emergency_contact_name` varchar(50) DEFAULT NULL,
  `emergency_contact_number` char(13) DEFAULT NULL,
  `emergency_contact_address` varchar(255) DEFAULT NULL,
  `civil_status` enum('Single','Married') NOT NULL,
  `number_of_dependencies` tinyint(3) UNSIGNED DEFAULT NULL,
  `citizenship` varchar(30) NOT NULL,
  `religion` varchar(30) DEFAULT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `sss_id` char(12) DEFAULT NULL,
  `phic_id` char(14) DEFAULT NULL,
  `hdmf_id` char(14) DEFAULT NULL,
  `tin_id` char(15) DEFAULT NULL,
  `account_number` char(25) DEFAULT NULL,
  `biometric_id` char(4) DEFAULT NULL,
  `payroll_type` enum('Weekly','Monthly') NOT NULL,
  `date_started` date NOT NULL,
  `date_hired` date DEFAULT NULL,
  `date_terminated` date DEFAULT NULL,
  `employment_type` enum('Agency','Regular') NOT NULL,
  `referred_by` varchar(50) DEFAULT NULL,
  `walk_in` varchar(50) DEFAULT NULL,
  `status` enum('Active','Terminated','AWOL','Deceased','Others') NOT NULL DEFAULT 'Active',
  `position_id` int(10) UNSIGNED DEFAULT NULL,
  `project_id` int(10) UNSIGNED DEFAULT NULL);

CREATE TABLE IF NOT EXISTS `positions` (
  `position_id` int(10) UNSIGNED NOT NULL primary key AUTO_INCREMENT,
  `name` varchar(50) NOT NULL);

CREATE TABLE IF NOT EXISTS `projects` (
  `project_id` int(10) UNSIGNED NOT NULL primary key AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `time_in` time DEFAULT NULL,
  `time_out` time DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1);

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) UNSIGNED NOT NULL primary key AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL);

INSERT INTO `users` (`user_id`, `username`, `password`, `token`) VALUES
(1, 'root', '$2y$10$qCkFg5p4EgQ1qq.tTbbx/eaCGcphyDYfAVm7h4zI8gARUcDpPaBVy', NULL);

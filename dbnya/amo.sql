-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 05, 2021 at 02:55 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amo`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

DROP TABLE IF EXISTS `assets`;
CREATE TABLE IF NOT EXISTS `assets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `asset_code` text NOT NULL,
  `picture` text NOT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `price` bigint(20) NOT NULL,
  `date_purchase` date NOT NULL,
  `serial_number` text NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Ready',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `supplier_id` (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `name`, `asset_code`, `picture`, `detail`, `price`, `date_purchase`, `serial_number`, `supplier_id`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'Laptop Dell Inspiron', '', '', 'RAM 4GB Processor Core i7', 5500000, '2021-10-04', '123123001', 1, 'Ready', '2021-10-14 07:44:43', NULL, '2021-10-14 08:31:12', 1, NULL, 1),
(2, 'Laptop Dell Inspiron', 'LDELL00001', '1634692671dell.jpeg', 'RAM 4GB Processor Core i7', 6500000, '2021-10-05', '123123001', 1, 'Broken', '2021-10-14 07:46:23', '2021-10-31 19:43:51', NULL, 1, 1, NULL),
(3, 'Laptop Acer Aspire', 'LACER00001', '1634194324acer.jpg', 'RAM 1GB Processor Intel Core', 3000000, '2021-10-04', '998541324', 1, 'Lost', '2021-10-14 13:52:04', '2021-11-03 10:06:21', NULL, 1, 1, NULL),
(4, 'Laptop Asus FX503', 'LASUSFX50300001', '1634194437asus.jpg', 'RAM 4GB Processor Core i5', 4500000, '2021-10-05', '998541321', 1, 'Lent', '2021-10-14 13:53:57', '2021-10-27 20:13:28', NULL, 1, NULL, NULL),
(5, 'Printer HP Deskjet 2201', 'PHPD10001', '1635095047printer_hp.jpg', 'Printer HP Deskjet tinta cartridge', 800000, '2021-10-25', '441231132', 1, 'Lent', '2021-10-25 00:04:07', '2021-11-01 08:15:50', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `location_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `location_id` (`location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `location_id`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'IT', 1, '2021-10-11 14:50:05', NULL, NULL, 1, NULL, NULL),
(2, 'Administration', 1, '2021-10-11 15:16:44', NULL, NULL, 1, NULL, NULL),
(3, 'General', 1, '2021-10-11 15:17:30', NULL, NULL, 1, NULL, NULL),
(4, 'okdwoapp', 2, '2021-10-11 15:17:50', '2021-10-11 15:18:04', '2021-10-11 15:18:13', 1, 1, 1),
(5, 'Administration', 2, '2021-10-11 15:18:54', NULL, NULL, 1, NULL, NULL),
(6, 'Default', 1, '2021-11-01 07:35:32', NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `nip` bigint(20) NOT NULL,
  `position_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `place_of_birth` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `nip`, `position_id`, `department_id`, `place_of_birth`, `date_of_birth`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'Wahyu Arya Pambudi', 101112351, 10, 1, 'Karawang', '1998-06-14', '2021-10-12 12:39:35', NULL, NULL, 1, NULL, NULL),
(2, 'Dewi Ayu Lestari', 1011123452, 10, 2, 'Jakarta', '1999-07-12', '2021-10-12 12:52:55', NULL, NULL, 1, NULL, NULL),
(3, 'Joko Candra', 1011123453, 4, 3, 'Semarang', '1990-07-17', '2021-10-12 12:54:19', NULL, NULL, 1, NULL, NULL),
(4, 'Yuumachan dwa', 23131301230, 8, 3, 'Jakarta', '2021-10-14', '2021-10-12 12:54:50', '2021-10-12 12:54:59', '2021-10-12 12:55:07', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `lent`
--

DROP TABLE IF EXISTS `lent`;
CREATE TABLE IF NOT EXISTS `lent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `date_lent` date NOT NULL,
  `date_lent_returned` date NOT NULL,
  `note_lent` varchar(255) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `date_returned` date DEFAULT NULL,
  `note_returned` varchar(255) DEFAULT NULL,
  `fine` bigint(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `asset_id` (`asset_id`),
  KEY `employee_id` (`employee_id`),
  KEY `department_id` (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lent`
--

INSERT INTO `lent` (`id`, `asset_id`, `employee_id`, `department_id`, `date_lent`, `date_lent_returned`, `note_lent`, `status`, `date_returned`, `note_returned`, `fine`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(2, 3, 1, 6, '2021-10-23', '2021-10-24', NULL, 'Returned', '2021-10-25', 'Terlambat', 20000, '2021-10-23 08:36:36', '2021-10-25 00:14:11', NULL, 1, 1, NULL),
(4, 4, 2, 2, '2021-10-23', '2021-10-25', '', 'Returned', '2021-10-27', NULL, 20000, '2021-10-23 10:09:58', '2021-10-27 20:05:49', NULL, 1, 1, NULL),
(5, 4, 3, 6, '2021-10-27', '2021-10-29', 'Keperluan Keja', 'Lent', NULL, NULL, NULL, '2021-10-27 20:13:28', NULL, NULL, 1, NULL, NULL),
(6, 5, 2, 2, '2021-11-01', '2021-11-30', 'Pemakaian bersama', 'Lent', NULL, NULL, NULL, '2021-11-01 08:15:50', NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `province` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `postcode` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`, `state`, `province`, `district`, `postcode`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'Kantor Pusat', 'Indonesia', 'Jawa Barat', 'Karawang', 41374, '2021-10-03 10:54:04', NULL, NULL, 1, NULL, NULL),
(2, 'Kantor Cabang Surabaya', 'Indonesia', 'Jawa Timur', 'Surabaya', 41380, '2021-10-03 10:57:01', '2021-10-03 16:27:35', NULL, 1, 1, NULL),
(3, 'testing', 'Jawa Barat', 'mana', 'ok', 41374, '2021-10-11 10:40:48', NULL, '2021-10-11 10:57:30', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

DROP TABLE IF EXISTS `position`;
CREATE TABLE IF NOT EXISTS `position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `name`, `detail`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'Direksi', 'Pimpinan Perusahaan', '2021-10-11 20:16:34', '2021-10-11 20:17:44', NULL, 1, 1, NULL),
(2, 'Direktur Utama', 'Pemimpin Tertinggi', '2021-10-11 20:18:49', NULL, NULL, 1, NULL, NULL),
(3, 'Direktur Keuangan', '', '2021-10-11 20:19:23', NULL, NULL, 1, NULL, NULL),
(4, 'Direktur', '', '2021-10-11 20:20:49', NULL, NULL, 1, NULL, NULL),
(5, 'Direktur Personalia', '', '2021-10-11 20:21:03', NULL, NULL, 1, NULL, NULL),
(6, 'Manajer', '', '2021-10-11 20:21:11', NULL, NULL, 1, NULL, NULL),
(7, 'Manajer Personalia', '', '2021-10-11 20:21:22', NULL, NULL, 1, NULL, NULL),
(8, 'Manajer Pemasaran', '', '2021-10-11 20:21:44', NULL, NULL, 1, NULL, NULL),
(9, 'Manajer Pabrik', '', '2021-10-11 20:21:53', NULL, NULL, 1, NULL, NULL),
(10, 'Staff', '', '2021-10-11 20:22:26', NULL, NULL, 1, NULL, NULL),
(11, 'Operator', '', '2021-10-11 20:22:36', NULL, NULL, 1, NULL, NULL),
(12, 'testing 1', '', '2021-10-11 20:26:09', NULL, '2021-10-12 08:05:40', 1, NULL, 1),
(13, 'testing 2', '', '2021-10-11 20:26:20', NULL, '2021-10-12 08:05:48', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `repair`
--

DROP TABLE IF EXISTS `repair`;
CREATE TABLE IF NOT EXISTS `repair` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_id` int(11) NOT NULL,
  `repair_by` varchar(255) NOT NULL,
  `start_repair` date NOT NULL,
  `end_repair` date NOT NULL,
  `cost` bigint(20) NOT NULL,
  `note_repair` varchar(255) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `asset_id` (`asset_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `repair`
--

INSERT INTO `repair` (`id`, `asset_id`, `repair_by`, `start_repair`, `end_repair`, `cost`, `note_repair`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 3, 'Komputer Solusi Mandiri', '2021-10-27', '2021-10-29', 300000, 'Perbaikan Layar', 'Repaired', '2021-10-27 20:14:51', '2021-10-27 20:14:21', NULL, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'Toko Jaya Komputer', '2021-10-11 11:28:51', '2021-10-11 11:30:35', NULL, 1, 1, NULL),
(2, 'Toko Kursi Adijaya', '2021-10-11 11:31:21', NULL, NULL, 1, NULL, NULL),
(3, 'dwap', '2021-10-11 11:31:30', NULL, '2021-10-11 11:31:36', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `picture` varchar(255) NOT NULL DEFAULT 'd3.jpg',
  `about` varchar(255) NOT NULL DEFAULT 'Tell who you are to the world',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_email` (`email`),
  UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  UNIQUE KEY `uc_remember_selector` (`remember_selector`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `picture`, `about`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$10$NJ2mWSgCLAH/r75Ci85/kOVeQtL4ymk2plgmc5E6fmRTeOeY.6dLy', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1636072800, 1, 'Wahyu Arya', 'Pambudi', 'ADMIN', '0', '1634696659ganteng.jpg', 'Saya adalah seorang web developer, saya menguasai bahasa pemrograman PHP, HTML, CSS, Javascript, dan SQL.'),
(3, '::1', NULL, '$2y$10$DqYg/vwV0tYHrBLIoTWaWuD2jVQH0g1rExGzSsoQHQBkkuIosreQu', 'dew@dew.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1634480934, 1636079756, 1, 'Dewi Ayu', 'Lestari', 'PT Edmi Manufacturing Indonesia', '087299104289', 'admin.jpg', 'Tell who you are to the world');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(14, 1, 1),
(15, 1, 2),
(13, 3, 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `_lent`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `_lent`;
CREATE TABLE IF NOT EXISTS `_lent` (
`id` int(11)
,`asset_name` mediumtext
,`borrower` varchar(392)
,`date_lent` date
,`date_lent_returned` date
,`note_lent` varchar(255)
,`status` varchar(20)
,`date_returned` date
,`note_returned` varchar(255)
,`fine` bigint(20)
,`created_at` datetime
,`updated_at` datetime
);

-- --------------------------------------------------------

--
-- Structure for view `_lent`
--
DROP TABLE IF EXISTS `_lent`;

DROP VIEW IF EXISTS `_lent`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `_lent`  AS  select `a`.`id` AS `id`,concat(`b`.`name`,' (',`b`.`asset_code`,')') AS `asset_name`,(case when (`a`.`department_id` = 6) then concat(`c`.`name`,' (',`c`.`nip`,')') else concat(`d`.`name`,' Department - ',concat(`c`.`name`,' (',`c`.`nip`,')')) end) AS `borrower`,`a`.`date_lent` AS `date_lent`,`a`.`date_lent_returned` AS `date_lent_returned`,`a`.`note_lent` AS `note_lent`,`a`.`status` AS `status`,`a`.`date_returned` AS `date_returned`,`a`.`note_returned` AS `note_returned`,`a`.`fine` AS `fine`,`a`.`created_at` AS `created_at`,`a`.`updated_at` AS `updated_at` from (((`lent` `a` left join `assets` `b` on((`a`.`asset_id` = `b`.`id`))) left join `employee` `c` on((`a`.`employee_id` = `c`.`id`))) left join `department` `d` on((`a`.`department_id` = `d`.`id`))) where isnull(`a`.`deleted_at`) ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assets`
--
ALTER TABLE `assets`
  ADD CONSTRAINT `supplier_id_assets_fk` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `location_id_depfk` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `lent`
--
ALTER TABLE `lent`
  ADD CONSTRAINT `lent_asset_id_fk` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `lent_department_id_fk` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `lent_employee_id_fk` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `repair`
--
ALTER TABLE `repair`
  ADD CONSTRAINT `repair_asset_id` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

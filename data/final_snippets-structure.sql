-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Aug 28, 2024 at 04:53 PM
-- Server version: 11.2.2-MariaDB
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_snippets`
--

-- --------------------------------------------------------

--
-- Table structure for table `snippets_users`
--

DROP TABLE IF EXISTS `snippets_users`;
CREATE TABLE IF NOT EXISTS `snippets_users` (
  `snip_user_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `snip_user_login` varchar(64) NOT NULL,
  `snip_user_pass` varchar(255) NOT NULL,
  `snip_user_surname` varchar(255) NOT NULL,
  `snip_user_email` varchar(128) NOT NULL,
  `snip_user_recovery` varchar(255) NOT NULL,
  `snip_user_permissions` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  PRIMARY KEY (`snip_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `snip_html_code`
--

DROP TABLE IF EXISTS `snip_html_code`;
CREATE TABLE IF NOT EXISTS `snip_html_code` (
  `snip_html_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `snip_html_title` varchar(64) NOT NULL,
  `snip_html_desc` varchar(256) NOT NULL,
  `snip_html_img` varchar(256) NOT NULL,
  `snip_html_code` text NOT NULL,
  PRIMARY KEY (`snip_html_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `snip_html_has_code`
--

DROP TABLE IF EXISTS `snip_html_has_code`;
CREATE TABLE IF NOT EXISTS `snip_html_has_code` (
  `snip_has_html_id` smallint(5) UNSIGNED NOT NULL,
  `snip_has_code_id` smallint(5) UNSIGNED NOT NULL,
  PRIMARY KEY (`snip_has_html_id`,`snip_has_code_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `snip_main_code`
--

DROP TABLE IF EXISTS `snip_main_code`;
CREATE TABLE IF NOT EXISTS `snip_main_code` (
  `snip_code_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `snip_code_title` varchar(64) NOT NULL,
  `snip_code_desc` varchar(256) NOT NULL,
  `snip_code_code` text NOT NULL,
  `snip_code_type` varchar(32) NOT NULL,
  `snip_code_link` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`snip_code_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `snip_unix_code`
--

DROP TABLE IF EXISTS `snip_unix_code`;
CREATE TABLE IF NOT EXISTS `snip_unix_code` (
  `snip_unix_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `snip_unix_title` varchar(128) NOT NULL,
  `snip_unix_desc` varchar(255) NOT NULL,
  `snip_unix_code` text NOT NULL,
  PRIMARY KEY (`snip_unix_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

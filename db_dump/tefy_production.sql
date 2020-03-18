-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2020 at 08:09 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tefy_production`
--

-- --------------------------------------------------------

--
-- Table structure for table `admissions`
--

CREATE TABLE `admissions` (
  `id` int(11) NOT NULL,
  `application_id` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `referer_id` int(11) DEFAULT NULL,
  `child_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `medium` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `actual_price` float NOT NULL,
  `discount` float NOT NULL,
  `walet_less` float DEFAULT NULL,
  `total` float NOT NULL,
  `discount_id` int(11) NOT NULL,
  `coupon` int(11) NOT NULL,
  `reason` text NOT NULL,
  `admission_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=Application Failed,1=Application Submitted,2=Application is being reviewed,3=Admission Approved,4=Admission Fee Payment,5=Admission Confirmation,6=Admission Canceled',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `desc` text NOT NULL,
  `ratings` longtext NOT NULL,
  `keywords` text NOT NULL,
  `short_note` text NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blog_reviews`
--

CREATE TABLE `blog_reviews` (
  `id` int(11) NOT NULL,
  `review` varchar(250) NOT NULL,
  `rating` decimal(10,0) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blog_review_replay`
--

CREATE TABLE `blog_review_replay` (
  `id` int(11) NOT NULL,
  `review` varchar(250) NOT NULL,
  `rating` decimal(10,0) NOT NULL,
  `blog_review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE `bookmarks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modeifed_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted, 1=Active, 2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `modified_at`, `row_status`) VALUES
(1, 'Primary School', '2019-10-18 11:11:53', NULL, 1),
(2, 'Secondary School', '2019-10-18 11:12:07', NULL, 1),
(3, 'Day Care', '2019-10-21 06:45:51', NULL, 1),
(4, 'International School', '2019-10-21 07:03:06', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `childs`
--

CREATE TABLE `childs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `father` varchar(60) NOT NULL,
  `mother` varchar(60) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `c_number` varchar(20) NOT NULL,
  `previous_school` varchar(100) NOT NULL,
  `previous_class` int(11) NOT NULL,
  `join_class` int(11) NOT NULL,
  `relation` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `activities` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `created_at`, `modified_at`, `row_status`) VALUES
(1, 'Nursery', '2019-10-18 11:12:37', NULL, 1),
(2, 'L.K.G', '2019-10-18 11:12:47', NULL, 1),
(3, 'U.K.G', '2019-10-18 11:12:58', NULL, 1),
(4, '1st Class', '2019-10-18 11:13:23', NULL, 1),
(5, '2nd Class', '2019-10-18 11:13:35', NULL, 1),
(6, '3th Class', '2019-10-18 11:13:41', NULL, 1),
(7, '4th Class', '2019-10-18 11:13:48', NULL, 1),
(8, '5th Class', '2019-10-18 11:14:33', NULL, 1),
(9, '6th Class', '2019-10-18 11:14:39', NULL, 1),
(10, '7th Class', '2019-10-18 11:14:52', NULL, 1),
(11, '8th Class', '2019-10-18 11:14:58', NULL, 1),
(12, '9th Class', '2019-10-18 11:15:04', NULL, 1),
(13, '10th Class', '2019-10-18 11:15:10', NULL, 1),
(14, '11th Class', '2019-10-21 06:36:00', NULL, 1),
(15, '12th Class', '2019-10-21 06:36:43', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `curriculum`
--

CREATE TABLE `curriculum` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `curriculum`
--

INSERT INTO `curriculum` (`id`, `name`, `created_at`, `modified_at`, `row_status`) VALUES
(1, 'SSC', '2019-10-18 11:09:58', NULL, 1),
(2, 'CBSE', '2019-10-18 11:10:11', '2019-10-21 12:04:10', 1),
(3, 'ICSE', '2019-10-18 11:10:18', NULL, 1),
(4, 'IBS', '2019-10-21 06:33:57', '2019-10-21 12:04:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `file_ext` varchar(5) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `name`, `file_ext`, `created_at`, `modified_at`, `row_status`) VALUES
(1, 'A/C Class Room', 'png', '2019-10-19 11:04:34', '2019-10-23 18:24:47', 0),
(2, 'A/C Busses', 'png', '2019-10-19 11:04:34', '2019-10-23 18:24:50', 0),
(3, 'Lunch Provision in Fee', 'jpeg', '2019-10-19 11:04:35', '2019-10-23 18:24:52', 0),
(4, 'Ground', 'jpeg', '2019-10-19 11:04:36', '2019-10-23 18:24:54', 0),
(5, 'CCTV Surveillance', 'png', '2019-10-19 11:04:37', '2019-10-23 18:24:58', 0),
(6, 'Labs', 'png', '2019-10-19 11:04:38', '2019-10-23 18:25:00', 0),
(7, 'Digi-smart Classes', 'png', '2019-10-19 11:04:39', '2019-10-23 18:25:02', 0),
(8, 'Library', 'png', '2019-10-19 11:04:40', '2019-10-23 18:25:08', 0),
(9, 'Auditorium', 'png', '2019-10-19 11:04:41', '2019-10-23 18:25:14', 0),
(10, 'Medical Facility', 'png', '2019-10-19 11:04:42', '2019-10-23 18:25:17', 0),
(11, 'Canteen', 'png', '2019-10-19 11:04:43', '2019-10-23 18:25:19', 0),
(12, 'Music Rooms', 'png', '2019-10-21 06:53:33', '2019-10-23 18:25:20', 0),
(13, 'ground', 'jpeg', '2019-10-22 10:02:02', '2019-10-22 15:32:25', 0),
(14, 'A/C Class Room', 'png', '2019-10-23 12:57:52', NULL, 1),
(15, 'A/C Busses', 'png', '2019-10-23 12:57:52', '2019-10-26 23:06:37', 0),
(16, 'Lunch Provision in Fee', 'jpeg', '2019-10-23 12:57:53', '2019-10-26 23:06:41', 0),
(17, 'Ground', 'jpeg', '2019-10-23 12:57:54', '2019-10-26 23:11:17', 0),
(18, 'CCTV Surveillance', 'png', '2019-10-23 12:57:55', '2019-10-26 23:12:15', 0),
(19, 'Labs', 'png', '2019-10-23 12:57:56', '2019-10-26 23:13:58', 0),
(20, 'Digi-smart Classes', 'png', '2019-10-23 12:57:57', '2019-10-26 23:15:24', 0),
(21, 'Library', 'png', '2019-10-23 12:57:58', '2019-10-26 23:16:45', 0),
(22, 'Auditorium', 'png', '2019-10-23 12:57:59', '2019-10-26 23:18:01', 0),
(23, 'Medical Facility', 'png', '2019-10-23 12:58:00', '2019-10-26 23:06:51', 0),
(24, 'Canteen', 'png', '2019-10-23 12:58:02', '2019-10-26 23:19:24', 0),
(25, 'Bus', 'jpeg', '2019-10-26 09:05:20', NULL, 1),
(26, 'Lunch Provision', 'png', '2019-10-26 17:34:57', NULL, 1),
(27, 'Medical', 'png', '2019-10-26 17:36:19', NULL, 1),
(28, 'Play Ground', 'png', '2019-10-26 17:41:02', NULL, 1),
(29, 'CCTV Surveillance', 'png', '2019-10-26 17:42:08', NULL, 1),
(30, 'Computer Labs', 'png', '2019-10-26 17:43:42', NULL, 1),
(31, 'Science Labs', 'png', '2019-10-26 17:43:54', NULL, 1),
(32, 'Digi-smart Classes', 'png', '2019-10-26 17:45:11', NULL, 1),
(33, 'Library', 'jpeg', '2019-10-26 17:46:40', NULL, 1),
(34, 'Auditorium', 'jpeg', '2019-10-26 17:47:56', NULL, 1),
(35, 'Canteen', 'png', '2019-10-26 17:49:35', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `get_in_touch`
--

CREATE TABLE `get_in_touch` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 2 COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `code` varchar(10) NOT NULL,
  `unique_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `code`, `unique_id`) VALUES
(1, 'admin', 'Administrator', '', ''),
(2, 'student', 'General User', 'TEFY', '');

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `id` int(11) NOT NULL,
  `school_name` varchar(60) NOT NULL,
  `school_code` varchar(20) NOT NULL,
  `school_type` enum('Boys','Girls','Co-Education','') NOT NULL,
  `hostels` enum('Only for Boys','Only for Girls','For Boys & Girls','No') NOT NULL,
  `school_format` enum('Only Day Scholars','Only Hostel','Both','') NOT NULL,
  `category` varchar(60) NOT NULL,
  `medium` varchar(60) NOT NULL,
  `keywords` longtext NOT NULL,
  `curriculum` int(11) NOT NULL,
  `class` varchar(60) NOT NULL,
  `price_from` float NOT NULL,
  `transport_fee` float NOT NULL,
  `landmark` text NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `address` text NOT NULL,
  `address_url` longtext NOT NULL,
  `founders_name` varchar(250) NOT NULL,
  `brand_name` varchar(250) NOT NULL,
  `no_of_branches` varchar(250) NOT NULL,
  `est_year` varchar(250) NOT NULL,
  `est_branch_year` varchar(250) NOT NULL,
  `faculty_exp` varchar(250) NOT NULL,
  `alumni` varchar(250) NOT NULL,
  `principal_number` varchar(20) NOT NULL,
  `telephone_number` varchar(20) NOT NULL,
  `school_email` varchar(60) NOT NULL,
  `video` varchar(100) NOT NULL,
  `vision` text NOT NULL,
  `description` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `website` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `youtube` varchar(100) NOT NULL,
  `amenities` varchar(60) NOT NULL,
  `opening_hours` longtext NOT NULL,
  `bus_routes` longtext NOT NULL,
  `sports` longtext NOT NULL,
  `admission_procedure` text NOT NULL,
  `achievements` longtext NOT NULL,
  `class_name` longtext NOT NULL,
  `admission_fee` longtext NOT NULL,
  `tution_fee` longtext NOT NULL,
  `admission_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=Closed, 1=Opened',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted, 1=Active, 2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `listing_banner`
--

CREATE TABLE `listing_banner` (
  `id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `image` varchar(60) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modeifed_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `listing_gallery`
--

CREATE TABLE `listing_gallery` (
  `id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `image` varchar(60) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modeifed_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medium`
--

CREATE TABLE `medium` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medium`
--

INSERT INTO `medium` (`id`, `name`, `created_at`, `modified_at`, `row_status`) VALUES
(1, 'English', '2019-10-18 11:08:19', NULL, 1),
(2, 'Hindi', '2019-10-18 11:08:54', NULL, 1),
(3, 'Telugu', '2019-10-18 11:09:04', '2020-01-04 17:46:02', 1),
(4, 'Urdu/Arabic', '2019-10-18 11:09:20', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `orderId` varchar(30) NOT NULL,
  `orderAmount` float NOT NULL,
  `referenceId` varchar(30) NOT NULL,
  `txStatus` varchar(30) NOT NULL,
  `paymentMode` varchar(30) NOT NULL,
  `txMsg` varchar(100) NOT NULL,
  `txTime` datetime NOT NULL,
  `signature` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `promo_codes`
--

CREATE TABLE `promo_codes` (
  `id` int(11) NOT NULL,
  `promo_title` varchar(100) NOT NULL,
  `promo_code` varchar(20) NOT NULL,
  `promo_type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Tefy, 2=All Schools, 3=Few Schools',
  `promo_label` varchar(100) NOT NULL,
  `school` text NOT NULL,
  `class` text NOT NULL,
  `valid_from` date NOT NULL,
  `valid_to` date NOT NULL,
  `discount_type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=Amount, 2=Percentage',
  `discount` int(11) DEFAULT NULL,
  `desc` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `review` varchar(250) NOT NULL,
  `rating` decimal(10,0) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `school_class_prices`
--

CREATE TABLE `school_class_prices` (
  `id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `admission_fee` float NOT NULL,
  `tution_fee` float NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `setting_type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_by` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  `row_status_cd` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0-Deleted 1-Active 2-Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `setting_type`, `description`, `created_by`, `created_at`, `modified_by`, `modified_at`, `row_status_cd`) VALUES
(1, 'system_name', 'Tefy', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(2, 'system_title', 'Tefy', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(3, 'address', 'Hyderabad', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(4, 'mobile', 'xxxxxxxxxx', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(5, 'system_email', 'info@tefy.com', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(6, 'email_password', 'Tefy@123', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(7, 'sms_username', 'sohailshaik@tefy.in', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(8, 'sms_sender', 'TEFYIN', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(9, 'sms_hash', 'MPG8RwyQXYg-PQrzVs2kZ5QtrXALuPSy3lXqce3zHF', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(10, 'privacy', '<p style=\"text-align:center\"><span style=\"font-size:28px\"><strong><strong>Privacy Policy</strong></strong></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>This Privacy Policy agreement is effective as&nbsp;of:&nbsp;October&nbsp;20th, 2019</p>\r\n\r\n<p>One7 Incredic Services&nbsp;Private Limited (&ldquo;the Company /One7 Incredic/ We / Us / TEFY&rdquo;) is committed&nbsp;in operating&nbsp;<a href=\"http://www.tefy.in/\" target=\"_blank\">this</a>&nbsp;website with the highest ethical standards and appropriate internal controls. Your privacy is important to us and maintaining your trust is paramount. This Privacy Policy explains how we collect, use, and disclose information about you. By using our website and affiliated services, you consent to the terms of our privacy policy (&ldquo;Privacy Policy&rdquo;) in addition to our Terms of Use. We encourage you to read this Privacy Policy regarding the collection, use, and disclosure of your information. If you are not comfortable with any of the terms or policies described in this Privacy Policy, you may choose to discontinue usage of our website. This Privacy Policy shall be subject to our Terms of Use available&nbsp;<a href=\"http://tefy.in/terms-and-conditions\" target=\"_blank\">here.</a></p>\r\n\r\n<p>From time to time, we may supplement this Privacy Policy with additional information relating to a particular interaction that we may have with you.</p>\r\n\r\n<h4><strong>Collection of Personal Information</strong></h4>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp; Pursuant to the services provided by us, we will ask you to provide certain information as a part of the registration process. We will collect this information through various means and in various places through the&nbsp;Web Services, including account registration forms, contact us forms, or when you otherwise interact with us. We will ask you to provide only such information lawfully and operationally required for the Services and necessary to be collected by us for effectively providing the same.</p>\r\n\r\n<p>&ldquo;Personal information&rdquo; is defined to include information that whether on its own or in combination with other information may be used to readily identify or contact you such&nbsp;as:&nbsp;name, address, email address, phone number etc.</p>\r\n\r\n<p>The collection and maintenance of any such data/information shall be subject to this Privacy Policy.</p>\r\n\r\n<ul>\r\n	<li>Information we collect as you access and use our services</li>\r\n</ul>\r\n\r\n<p>We will also collect information relating to your use of our website through the use of various technologies. For example, when you visit our website, we may log certain information such as your IP address, browser type, mobile operating system, manufacturer and model of your mobile device, geolocation, preferred language, access time, and time spent. We will also collect information about the pages you view within our sites and other actions you take while visiting our website. Collecting information in this manner allows us to collect statistics about our website usage and effectiveness, personalise your experience whilst you are on our website, as well as customize our interactions with you and also assist in business development to enhance and expand the scope of the App Services.</p>\r\n\r\n<p>We also maintain some records of Users who contact us for support, for the purpose of responding to such queries and other related activities. However, we do not provide this information to any third party without your permission, or utilize the same for any purposes not set out hereunder.</p>\r\n\r\n<ul>\r\n	<li>Information third parties provide about you</li>\r\n</ul>\r\n\r\n<p>As part of activating an account with TEFY, we may request your consent to connect with your email account for purposes of&nbsp;verification.</p>\r\n\r\n<p>Please note that this giving this consent is not mandatory and is completely voluntary.</p>\r\n\r\n<p>We hereby confirm that no other personal information or emails, will be accessed.&nbsp;</p>\r\n\r\n<p><strong>Use of Personal Information</strong></p>\r\n\r\n<p>The following paragraphs describe in more detail how we propose to use your personal information.</p>\r\n\r\n<h4>Personalising your Experience on our website</h4>\r\n\r\n<p>We may use information we collect about you to provide you with a personalised experience on our website, such as providing you with content in which you may be interested and making navigation on our sites easier.</p>\r\n\r\n<p>As you access and use TEFY, we may request access&nbsp; your location to show schools through the specific location.&nbsp;</p>\r\n\r\n<h4>Use of Information in the Social Computing Environment</h4>\r\n\r\n<p>We provide social computing tools on our website to enable online sharing and collaboration among members who have registered to use them. These include forums, wikis, blogs, and other social media platforms.</p>\r\n\r\n<p>When registering to use these tools, you will be asked to provide certain personal information. Registration information that is not automatically made available to other participants as part of your profile will be subject to and protected in accordance with this Privacy Policy.</p>\r\n\r\n<p>Any other content you post, such as pictures, information, opinions, or any other type of personal information that you make available to other participants on these social platforms, is not subject to this Privacy Policy. Rather, such content is subject to the terms of use of those platforms, and any additional guidelines and privacy information provided in relation to their use. We strongly urge to refer to them to better understand yours, ours, and other parties&rsquo; rights and obligations with regard to such content. We would also like to emphasise that the content you post on any such social computing platforms may be made available to others inside and outside our website/app.</p>\r\n\r\n<h4><strong>Information Security and Accuracy</strong></h4>\r\n\r\n<p>We intend to protect your personal information and to maintain its accuracy as confirmed by you.&nbsp;One7 Incredic implements reasonable physical, administrative, and technical safeguards to help us protect your personal information from unauthorised access, use, and disclosure.&nbsp;</p>\r\n\r\n<h4><strong>Online Advertising</strong></h4>\r\n\r\n<p>One7 Incredic&nbsp;does not deliver third party online advertisements on the website but we advertise our activities and organizational goals on other websites. We may collaborate with other website/app operators as well as network advertisers to do so. We request you to read and understand such concerned third party privacy policies to understand their practices relating to advertising, including what type of information they may collect about your internet usage.&nbsp;One7 Incredic&nbsp;does not provide any information relating to your usage of the website/app to such website operators or network advertisers.</p>\r\n\r\n<h4><strong>Links to third-party websites/apps</strong></h4>\r\n\r\n<p>One7 Incredic&nbsp;website/app may contain links to third party websites/apps that are not affiliated with One7 Incredic.&nbsp;One7 Incredic is not responsible for the privacy practices or the content of those other websites, or for any acts/ omissions by such third parties in the course of your transaction with them.</p>\r\n\r\n<h4><strong>Notices</strong></h4>\r\n\r\n<p>Any dispute over privacy is subject to this Privacy Policy and our Terms of Use, including limitations on damages, resolution of disputes, and application of the laws of India.</p>\r\n\r\n<h4><strong>Changes to Privacy Policy</strong></h4>\r\n\r\n<p>One7 Incredic reserves the right to change this policy from time to time. Any changes shall be effective immediately upon the posting of the revised Privacy Policy. If we make any material changes, we will post a notice for 30 days at the top of this page notifying users when this Privacy Policy is updated or modified. We encourage you to periodically review this page for latest information on our privacy practices.</p>\r\n\r\n<h4><strong>Privacy Questions and Access</strong></h4>\r\n\r\n<p>If you have questions, concerns, or suggestions regarding our Privacy Policy, we can be reached using the contact information on our &ldquo;Contact Us&rdquo; page or at&nbsp;<a href=\"http://mailto:support@tefy.in/\" target=\"_blank\">support@tefy.in</a>.</p>\r\n\r\n<p>In certain cases, you may have the ability to view or edit your personal information online. In the event your information is not accessible online and you wish to obtain a copy of particular information you provided to One7 Incredic, or if you become aware the information is incorrect and you would like us to correct it, please contact us immediately.</p>\r\n\r\n<p>Before&nbsp;One7 Incredic&nbsp;is able to provide you with any information or correct any inaccuracies, however, we may ask you to verify your identity and to provide other details to help us to respond to your request. We will contact you within 30 days of your request.</p>\r\n', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(11, 'terms', '<p style=\"text-align:center\"><span style=\"font-size:36px\"><strong>Terms of Use</strong></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>This website is operated by&nbsp;One7 Incredic Services Pvt Ltd. Throughout the site, the terms &ldquo;we&rdquo;, &ldquo;us&rdquo; and &ldquo;our&rdquo; refer to&nbsp;One7 Incredic Services Pvt Ltd&nbsp;this website, including all information, &nbsp;and services available from this site to you, the user, conditioned upon your acceptance of all terms, conditions, policies and notices stated here. These Terms apply to all user in the site, including without limitation users who are browsers, vendors, customers, merchants, and/ or contributors of content.</p>\r\n\r\n<p>By accessing or using this website you agree to be bound by these Terms of Service.</p>\r\n\r\n<p>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;By agreeing to these Terms of Service, you are at the age of majority in your state or province and you have given the consent to allow minors to use this site.&nbsp;</p>\r\n\r\n<p>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You agree to promptly update your account and other personal information, including your email address so that we can contact as to when needed.</p>\r\n\r\n<p>3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;We have the right to refuse service to anyone for any reason at any time.</p>\r\n\r\n<p>4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You agree not to exploit any portion of the Service, use of the Service, or access to the Service or any contact on the website through which the service is provided, without our consent.</p>\r\n\r\n<p>5.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The Information that is made available on the site is according to information provided by the school to us, we are not responsible for any inaccuracy in the information provided.&nbsp;</p>\r\n\r\n<p>6.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;We reserve the right to modify the information of the site at any time, you agree to monitor any updates in our site.</p>\r\n\r\n<p>7.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Charges for our services may change without any prior notice, We hold the right to any modification or discontinuation of any service.</p>\r\n\r\n<p>8.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;We reserve no right for any third-party services for any modification, price change, suspension or discontinuance of the Service.</p>\r\n\r\n<p>9.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;We do not warrant that the quality of any products, services, information, or that any errors in the Third-party vendors service will be corrected.&nbsp;</p>\r\n\r\n<p>10.&nbsp;&nbsp;&nbsp;Certain content, products and services available via our Service may include materials from third-parties. Third-party links on this site may direct you to third-party websites that are not affiliated with us and we do not hold any liability for any information or service provided by third party.</p>\r\n\r\n<p>11.&nbsp;&nbsp;&nbsp;We hold the right to limit the sales of our products or Services to any person, geographic region or jurisdiction. We reserve the right to limit the quantities of any products or services that we offer.</p>\r\n\r\n<p>12.&nbsp;&nbsp;&nbsp;If, at our request, you send certain specific submissions (for example reviews) or without a request from us you send creative ideas, suggestions, proposals, plans, or other materials, whether online, by email, by postal mail, or otherwise (collectively, &#39;comments&#39;), you agree that we may, at any time, without restriction, edit, copy, publish, distribute, translate and otherwise use in any medium any comments that you forward to us. We are and shall be under no obligation to maintain any comments in confidence; &nbsp;to pay compensation for any comments, or to respond to any comments.</p>\r\n\r\n<p>13.&nbsp;&nbsp;&nbsp;You agree that your comments will not violate any right of any third-party, including copyright, trademark, privacy, personality or other personal or proprietary right.</p>\r\n\r\n<p>14.&nbsp;&nbsp;&nbsp;You further agree that your comments will not contain libellous or otherwise unlawful, abusive or obscene material, or contain any computer virus or other malware that could in any way affect the operation of the Service or any related website if any cases will attract to legal actions from us.</p>\r\n\r\n<p>15.&nbsp;&nbsp;&nbsp;Occasionally there may be information on our site or in the Service that contains typographical errors, inaccuracies We reserve the right to correct any errors, inaccuracies or omissions, and to change or update information.</p>\r\n\r\n<p>16.&nbsp;&nbsp;&nbsp;In addition to other prohibitions as set forth in the Terms of Service, you are prohibited from using the site or its content: &nbsp;for any unlawful purpose; &nbsp;to solicit others to perform or participate in any unlawful acts; &nbsp;to violate any international, federal, provincial or state regulations, rules, laws, or local ordinances; We reserve the right to terminate your use of the Service or any related website for violating any of the prohibited uses.</p>\r\n\r\n<p>17.&nbsp;&nbsp;&nbsp;We do not guarantee, represent or warrant that your use of our service will be uninterrupted, timely, secure or error-free.</p>\r\n\r\n<p>18.&nbsp;&nbsp;&nbsp;We do not warrant that the results that may be obtained from the use of the service will be accurate or reliable, usage of the services will be under your own risk.</p>\r\n\r\n<p>19.&nbsp;&nbsp;&nbsp;You agree to compensate to&nbsp;One7 Incredic Services Pvt. Ltd&nbsp;due to or arising out of your breach of these Terms of Service or the documents they incorporate by reference or your violation of any law or the rights of a third-party.&nbsp;</p>\r\n\r\n<p>20.&nbsp;&nbsp;&nbsp;In the event that any provision of these Terms of Service is determined to be unlawful, void or unenforceable, the unenforceable portion shall be deemed to be severed from these Terms of Service, such determination shall not affect the validity and enforceability of any other remaining provisions.</p>\r\n\r\n<p>21.&nbsp;&nbsp;&nbsp;These Terms of Service are effective unless and until terminated by either you or us. You may terminate these Terms of Service at any time by notifying us at&nbsp;<a href=\"mailto:support@tefy.in\" target=\"_blank\">support@tefy.in</a>&nbsp;that you no longer wish to use our Services, or when you cease using our site.</p>\r\n\r\n<p>22.&nbsp;&nbsp;&nbsp;These Terms of Service and any separate agreements whereby we provide you Services shall be governed by and construed in accordance with the laws of India and jurisdiction of Hyderabad, Telangana.</p>\r\n\r\n<p>Questions about the Terms of Service should be sent to us at&nbsp;<a href=\"mailto:support@tefy.in\" target=\"_blank\">support@tefy.in</a>.</p>\r\n', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(12, 'facebook', 'http://fb.comd', 'System', '2019-07-22 14:05:08', NULL, '0000-00-00 00:00:00', 1),
(13, 'twiter', 'http://g.com', 'System', '2019-07-22 14:05:08', NULL, '0000-00-00 00:00:00', 1),
(14, 'youtube', 'http://g.com', 'System', '2019-07-22 14:05:08', NULL, '0000-00-00 00:00:00', 1),
(15, 'whatsapp_number', 'xxxxxxxxxx', 'System', '2019-09-27 06:53:07', NULL, '0000-00-00 00:00:00', 1),
(16, 'about_us', '<p style=\"text-align:center\"><span style=\"color:#000000\"><span style=\"font-size:20px\"><strong>ABOUT US</strong></span></span></p>\r\n\r\n<p style=\"text-align:center\"><strong>TEFY</strong> - <strong>T</strong>ransition <strong>E</strong>asy <strong>F</strong>or <strong>Y</strong>ou</p>\r\n\r\n<p style=\"text-align: center;\">We at TEFY, are young minds driven to make a child&rsquo;s educational experience a cakewalk.</p>\r\n\r\n<p style=\"text-align: center;\">So it&rsquo;s about time that you gallop to find a perfect school for your precious child. You hit up google, but it&rsquo;s so generic! Parents, with the limited googled information available to them, make a choice with their fingers crossed.</p>\r\n\r\n<p style=\"text-align: center;\">Stop guessing, now.</p>\r\n\r\n<p style=\"text-align: center;\">Every child is a unique snowflake, we at TEFY recognise and cherish that. TEFY gives you the power to make an informed decision suiting your needs, by providing comprehensive details, trusted reviews and ratings about every school.</p>\r\n\r\n<p style=\"text-align: center;\">TEFY will do the hard work for you in finding all the best institutions all over India and the smart work of finding and sorting the best one which suits your kids, learning style, and location, etc.</p>\r\n\r\n<p style=\"text-align: center;\">We bring you the best, among the best schools which perfectly fit your child&rsquo;s unique skill set while empowering you with vital information about every school&rsquo;s curriculum, fee, facilities along with the convenience of GPS based school search and customised sorting.</p>\r\n\r\n<p style=\"text-align: center;\">We do extensive analysis on a school&rsquo;s data and integrate it with feedback from our large community of parents and students, for nuanced insights which will help enrich your TEFY experience.</p>\r\n', 'System', '2019-10-25 07:13:03', NULL, NULL, 1),
(17, 'refer_money', '50', '', '2020-01-04 09:22:36', NULL, NULL, 1),
(18, 'smtp_port', '587', '', '2020-01-13 07:33:40', NULL, NULL, 1),
(19, 'smtp_host', 'mail.akshayacomputers.com', '', '2020-01-13 07:33:40', NULL, NULL, 1),
(20, 'smtp_username', 'info@akshayacomputers.com', '', '2020-01-13 07:33:40', NULL, NULL, 1),
(21, 'smtp_password', 'akshaya@123', '', '2020-01-13 07:33:40', NULL, NULL, 1),
(23, 'google_client_id', '631401232828-0fcqq6ink5s87i2jm8ltae6e8379gva1.apps.googleusercontent.com', '', '2020-01-28 06:32:29', NULL, NULL, 1),
(24, 'google_client_secret', 'kVJoPg5-Yjb1SBi8CziosAet', '', '2020-01-28 06:32:29', NULL, NULL, 1),
(25, 'google_redirect_uri', '', '', '2020-01-28 06:32:29', NULL, NULL, 1),
(26, 'google_api_key', '', '', '2020-01-28 06:32:29', NULL, NULL, 1),
(27, 'cashfree_payment_mode', 'TEST', '', '2020-02-05 10:33:35', NULL, NULL, 1),
(28, 'cashfree_secret_key', 'b52d32f895cd59ea095dbc3b64cfe409d307338f', '', '2020-02-05 10:33:35', NULL, NULL, 1),
(29, 'cashfree_appId', '1178807ba5d6ccdb14397ae7288711', '', '2020-02-05 10:33:35', NULL, NULL, 1),
(30, 'instagram', 'http://g.com', '', '2020-02-05 11:18:50', NULL, NULL, 1),
(31, 'linkedin', 'http://g.com', '', '2020-02-05 11:18:50', NULL, NULL, 1),
(32, 'pinterest', 'http://g.com', '', '2020-02-05 11:18:50', NULL, NULL, 1),
(33, 'tumblr', 'http://g.com', '', '2020-02-05 11:18:50', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `used_promo_codes`
--

CREATE TABLE `used_promo_codes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `coupon` varchar(20) NOT NULL,
  `discount` int(11) NOT NULL,
  `discount_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `unique_id` varchar(20) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `active_phone` tinyint(1) NOT NULL DEFAULT 0,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `walet_amount` float DEFAULT NULL,
  `registered_by` varchar(30) NOT NULL DEFAULT 'Normal',
  `row_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Deleted, 1=Active, 2=Inactive',
  `modified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `unique_id`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `active_phone`, `first_name`, `last_name`, `company`, `phone`, `walet_amount`, `registered_by`, `row_status`, `modified_at`) VALUES
(1, '127.0.0.1', 'TEFYADMIN', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', 'AvLbVyiY8sGoTkLMndmwju6869380d3025056ee3', 1571308877, NULL, 1268889823, 1581575571, 1, 0, 'Admin', 'istrator', 'ADMIN', '8121815502', NULL, 'Normal', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_says`
--

CREATE TABLE `users_says` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `desc` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admissions`
--
ALTER TABLE `admissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_reviews`
--
ALTER TABLE `blog_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_review_replay`
--
ALTER TABLE `blog_review_replay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `childs`
--
ALTER TABLE `childs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `curriculum`
--
ALTER TABLE `curriculum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `get_in_touch`
--
ALTER TABLE `get_in_touch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listing_banner`
--
ALTER TABLE `listing_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listing_gallery`
--
ALTER TABLE `listing_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medium`
--
ALTER TABLE `medium`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo_codes`
--
ALTER TABLE `promo_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_class_prices`
--
ALTER TABLE `school_class_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `used_promo_codes`
--
ALTER TABLE `used_promo_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `users_says`
--
ALTER TABLE `users_says`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admissions`
--
ALTER TABLE `admissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_reviews`
--
ALTER TABLE `blog_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_review_replay`
--
ALTER TABLE `blog_review_replay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `childs`
--
ALTER TABLE `childs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `curriculum`
--
ALTER TABLE `curriculum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `get_in_touch`
--
ALTER TABLE `get_in_touch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listing_banner`
--
ALTER TABLE `listing_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listing_gallery`
--
ALTER TABLE `listing_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `medium`
--
ALTER TABLE `medium`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promo_codes`
--
ALTER TABLE `promo_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_class_prices`
--
ALTER TABLE `school_class_prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `used_promo_codes`
--
ALTER TABLE `used_promo_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `users_says`
--
ALTER TABLE `users_says`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

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

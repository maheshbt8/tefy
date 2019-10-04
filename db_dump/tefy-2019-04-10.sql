-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2019 at 01:42 PM
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
-- Database: `tefy`
--

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
(1, 'Pre School', '2019-10-04 16:52:49', NULL, 1),
(2, 'Play School', '2019-10-04 16:52:52', NULL, 1),
(3, 'High School', '2019-10-04 16:52:57', NULL, 1),
(4, 'Others', '2019-10-04 16:53:01', NULL, 1);

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
(1, '1-10 th', '2019-10-04 16:53:49', NULL, 1),
(2, '1-7 th ', '2019-10-04 16:53:58', NULL, 1),
(3, '1-12 th', '2019-10-04 16:54:12', NULL, 1),
(4, 'Intermediat', '2019-10-04 16:54:20', NULL, 1),
(5, 'Degree', '2019-10-04 16:54:25', NULL, 1),
(6, 'B.Tech', '2019-10-04 16:54:34', NULL, 1);

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
(1, 'SSC', '2019-09-19 13:03:07', NULL, 1),
(2, 'CBSE', '2019-09-19 13:03:07', NULL, 1),
(3, 'CISCE', '2019-09-19 13:03:07', NULL, 1),
(4, 'Others', '2019-09-19 15:06:21', NULL, 1);

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
(1, 'Bus', 'png', '2019-10-04 16:55:50', NULL, 1),
(2, 'A/C Class Rooms', 'png', '2019-10-04 16:56:46', NULL, 1);

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
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `id` int(11) NOT NULL,
  `school_name` varchar(60) NOT NULL,
  `school_code` varchar(20) NOT NULL,
  `school_type` enum('Boys','Girls','Co-Education','') NOT NULL,
  `hostels` enum('Boys','Girls','Both','') NOT NULL,
  `school_format` enum('day_scholars','hostel','both','') NOT NULL,
  `category` varchar(60) NOT NULL,
  `medium` varchar(60) NOT NULL,
  `keywords` longtext NOT NULL,
  `curriculum` int(11) NOT NULL,
  `class` varchar(60) NOT NULL,
  `landmark` text NOT NULL,
  `latitude` decimal(10,0) NOT NULL,
  `longitude` decimal(10,0) NOT NULL,
  `address` text NOT NULL,
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
  `admission_procedure` text NOT NULL,
  `achievements` longtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted, 1=Active, 2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`id`, `school_name`, `school_code`, `school_type`, `hostels`, `school_format`, `category`, `medium`, `keywords`, `curriculum`, `class`, `landmark`, `latitude`, `longitude`, `address`, `founders_name`, `brand_name`, `no_of_branches`, `est_year`, `est_branch_year`, `faculty_exp`, `alumni`, `principal_number`, `telephone_number`, `school_email`, `video`, `vision`, `description`, `phone`, `website`, `email`, `facebook`, `twitter`, `youtube`, `amenities`, `opening_hours`, `bus_routes`, `admission_procedure`, `achievements`, `created_at`, `modified_at`, `row_status`) VALUES
(1, 'Vikas', 'VKSCH', 'Co-Education', '', 'both', '[\"1\",\"2\",\"3\"]', '[\"1\",\"2\",\"3\"]', 'Viksa,Vikas School, High School', 2, '[\"3\",\"5\",\"6\"]', 'Vikas School Road, Krishnaja Hills, Nizampet, Hyderabad, Telangana, India', '18', '78', 'Plot #B4, Nallagandla Residential Complex, \r\nHUDA Layout Aparna Cyber Life Opposite Lane,\r\n Nallagandla, Serilingampally, \r\nHyderabad, Telangana-500019', 'Vikas', 'Vikas & co', '5 Branches in Hyderabad', '2000', 'Recently Opended in SR Nagar', '10', 'Nothing', '8121815502', '040-5564452', 'vikas@gmail.com', 'https://www.youtube.com/embed/Yw2B_fG9AzQ', 'Our founder Chairman Late Sri Koteswara Rao, focussed on the change in educational system which we all look forward to. The holistic development of a student through a splendid campus was born-named Vikas. The philosophy of holy germination came into existence with parents confidence in us.', 'Vikas-The concept school is a center of total balanced environment focusing on shaping children into leaders of tomorrow. We offer concept and comprehensive-centered education through a developmental approach. Our school environment promotes order, independence, a love for learning, a connection to the world and a sense of social responsibility.\r\n\r\nVikas aims at high academic excellence, based on a sound value system, through a team of committed faculty, so that students can compete in a global environment in all domains, become responsible human beings and make a meaningful contribution to the future.\r\nEducation is the process of facilitating learning skills, values, beliefs, and habits and also equipping self with knowledge. Presently, education is determined with the number of certificates or medals one owns. By just attending classes and getting to know about that particular subject cannot be termed as getting educated. Education is getting firm beliefs and values. Every system has flaws in it, so also in present educational system. But every mistake can be rectified and made into that perfect solution that we expect, and this outlook is knowledge which we get from right education and Vikas is the pioneer in getting it right.\r\n\r\nThe history of the school proved our strong presence with numerous awards to name a few…. for the past few years. This year achieving more, already we have been running strong in Hyderabad winning the overall trophies wherever we step in academics, sports, literary and cultural.\r\n\r\n“Every child is creative and unique” – Keeping this in mind and giving more and more opportunities to explore the potentials, Vikas- The Concept School showed its maximum participation in all events.\r\n\r\n“Medals are the result of determination, hard work and perseverance”\r\nThe presence of parents amplifies the spirit of achieving more after all we nourish parents dream into reality.', '8121815502', 'https://vikasconcept.com', 'vikas@gmail.com', '', '', '', '[\"1\"]', '{\"opening_time\":[\"06 AM\",\"03 AM\",\"03 AM\",\"04 AM\",\"03 AM\",\"02 AM\",\"03 AM\"],\"closing_time\":[\"04 AM\",\"03 AM\",\"04 AM\",\"04 AM\",\"06 AM\",\"05 AM\",\"04 AM\"]}', 'Route1, Route2, Route3', '<p>Online<br />\r\nOffline/Walkin:<br />\r\nTest Date:2019 OCT 25</p>\r\n', '[\"Achievements1\",\"Achievements2\",\"Achievements3\"]', '2019-10-04 17:08:29', NULL, 1);

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

--
-- Dumping data for table `listing_banner`
--

INSERT INTO `listing_banner` (`id`, `listing_id`, `image`, `created_at`, `modeifed_at`, `row_status`) VALUES
(1, 1, '2500 X 719.jpg', '2019-10-04 17:08:29', NULL, 1),
(2, 1, 'banner_01.png', '2019-10-04 17:08:29', NULL, 1),
(3, 1, 'feature category images 210x270px.jpg', '2019-10-04 17:08:29', NULL, 1);

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

--
-- Dumping data for table `listing_gallery`
--

INSERT INTO `listing_gallery` (`id`, `listing_id`, `image`, `created_at`, `modeifed_at`, `row_status`) VALUES
(1, 1, '2500 X 719.jpg', '2019-10-04 17:08:29', NULL, 1),
(2, 1, 'banner_01.png', '2019-10-04 17:08:29', NULL, 1),
(3, 1, 'feature category images 210x270px.jpg', '2019-10-04 17:08:29', NULL, 1);

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
(1, 'English', '2019-10-04 16:53:13', NULL, 1),
(2, 'Hindi', '2019-10-04 16:53:19', NULL, 1),
(3, 'Telugu', '2019-10-04 16:53:27', NULL, 1);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
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
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1570171849, 1, 'Admin', 'istrator', 'ADMIN', '0');

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
(1, 1, 1),
(2, 1, 2);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `curriculum`
--
ALTER TABLE `curriculum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `listing_banner`
--
ALTER TABLE `listing_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `listing_gallery`
--
ALTER TABLE `listing_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medium`
--
ALTER TABLE `medium`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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

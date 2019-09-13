-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2019 at 04:56 PM
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
  `school_title` varchar(60) NOT NULL,
  `category` text NOT NULL,
  `keywords` longtext NOT NULL,
  `latitude` decimal(10,0) NOT NULL,
  `longitude` decimal(10,0) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zipcode` varchar(6) NOT NULL,
  `address` text NOT NULL,
  `description` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `website` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `google_plus` varchar(100) NOT NULL,
  `amenities` longtext NOT NULL,
  `opening_hours` longtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted, 1=Active, 2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`id`, `school_title`, `category`, `keywords`, `latitude`, `longitude`, `city`, `state`, `zipcode`, `address`, `description`, `phone`, `website`, `email`, `facebook`, `twitter`, `google_plus`, `amenities`, `opening_hours`, `created_at`, `modified_at`, `row_status`) VALUES
(1, '0dsfsdfds', 'Pre School', 'fdfdfd,fdsfsdfd,fdsgdasfds,dfdsfasfd', '0', '0', 'Hyderabad', 'Hyderabad', '500038', 'Hyderabadf', 'dsafdsffadsfdsfdsf\r\ndfdsfdsfhbdsfhbsd\r\ndhfbdsbfdhsfjkdbfds\r\nkdbfjdfjds', '1231231232', 'https://sujithreddygreptho.wixsite.com/blog', 'maheshbt.grepthor@gmail.com', 'sdsdsd', 'sdsds', 'maddji@g.com', '[\"Elevator in building\",\"Friendly Environment\",\"Play Ground\",\"Indoor Space for Games\",\"Free parking on premises\",\"A\\/C Classes\",\"Buses for All Routes\"]', '{\"1\":{\"m_opening\":\"2 AM\",\"m_closing\":\"2 AM\"},\"2\":{\"t_opening\":\"2 AM\",\"t_closing\":\"4 AM\"},\"3\":{\"w_opening\":\"4 AM\",\"w_closing\":\"3 AM\"},\"4\":{\"th_opening\":\"3 AM\",\"th_closing\":\"3 AM\"},\"5\":{\"f_opening\":\"3 AM\",\"f_closing\":\"2 AM\"},\"6\":{\"sa_opening\":\"2 AM\",\"sa_closing\":\"3 AM\"},\"7\":{\"s_opening\":\"3 AM\",\"s_closing\":\"4 AM\"}}', '2019-09-13 20:15:10', NULL, 1),
(2, 'dfdfd', 'Pre School', 'dsdsd,sdsds,sddsds,sdsd', '0', '0', 'Hyderabad', 'fgdfsfdsf', '215155', 'dsfdsf, ffdsfdsf', 'sadasdasdsadsadsadsadasd\r\nad\r\nasfdasfdsf\r\n\r\nfdsfdsfgdsf\r\ndsfdfds', '1231231232', 'https://sujithreddygreptho.wixsite.com/blog', 'maddji@g.com', 'sdsdsd', 'sdsds', 'maheshbt.grepthor@gmail.com', '[\"Elevator in building\",\"Friendly Environment\",\"Play Ground\",\"Indoor Space for Games\",\"Free parking on premises\",\"A\\/C Classes\",\"Buses for All Routes\"]', '{\"1\":{\"m_opening\":\"2 AM\",\"m_closing\":\"1 AM\"},\"2\":{\"t_opening\":\"2 AM\",\"t_closing\":\"1 AM\"},\"3\":{\"w_opening\":\"2 AM\",\"w_closing\":\"1 AM\"},\"4\":{\"th_opening\":\"2 AM\",\"th_closing\":\"4 AM\"},\"5\":{\"f_opening\":\"2 AM\",\"f_closing\":\"3 AM\"},\"6\":{\"sa_opening\":\"1 AM\",\"sa_closing\":\"1 AM\"},\"7\":{\"s_opening\":\"2 AM\",\"s_closing\":\"3 AM\"}}', '2019-09-13 20:23:37', NULL, 1);

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
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1268889823, 1, 'Admin', 'istrator', 'ADMIN', '0');

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
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
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
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

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

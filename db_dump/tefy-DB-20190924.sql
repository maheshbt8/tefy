-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2019 at 09:31 AM
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
(1, 'Pre School', '2019-09-19 15:55:42', NULL, 1),
(2, 'Play School', '2019-09-19 15:55:54', NULL, 1),
(3, 'High School', '2019-09-19 15:56:04', NULL, 1);

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
(1, '1st - 10th', '2019-09-19 13:06:14', NULL, 1),
(2, '11th - 12th', '2019-09-19 13:06:14', NULL, 1),
(3, 'Inter', '2019-09-19 15:10:43', NULL, 1),
(4, 'I', '2019-09-21 17:02:16', NULL, 1),
(5, 'II', '2019-09-21 17:02:22', NULL, 1),
(6, 'III', '2019-09-21 17:02:26', NULL, 1),
(7, 'IV', '2019-09-21 17:02:30', NULL, 1),
(8, 'V', '2019-09-21 17:02:33', NULL, 1);

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
(1, 'dsdsd', 'png', '2019-09-19 15:39:57', NULL, 1);

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

--
-- Dumping data for table `get_in_touch`
--

INSERT INTO `get_in_touch` (`id`, `name`, `email`, `mobile`, `message`, `created_at`, `modified_at`, `row_status`) VALUES
(1, 'mahesh', 'maheshbt.grepthor@gmail.com', '1231231235', 'fdsfadfsfdsf', '2019-09-21 16:33:55', NULL, 2),
(2, 'viikas', 'dklsjdflk@gmail.com', '444', 'sss', '2019-09-21 17:12:48', NULL, 2);

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
  `category` varchar(60) NOT NULL,
  `keywords` longtext NOT NULL,
  `curriculum` int(11) NOT NULL,
  `class` varchar(60) NOT NULL,
  `landmark` text NOT NULL,
  `latitude` decimal(10,0) NOT NULL,
  `longitude` decimal(10,0) NOT NULL,
  `address` text NOT NULL,
  `video` varchar(100) NOT NULL,
  `vision` text NOT NULL,
  `description` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `website` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `google_plus` varchar(100) NOT NULL,
  `amenities` varchar(60) NOT NULL,
  `opening_hours` longtext NOT NULL,
  `achievements` longtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted, 1=Active, 2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`id`, `school_name`, `school_code`, `school_type`, `category`, `keywords`, `curriculum`, `class`, `landmark`, `latitude`, `longitude`, `address`, `video`, `vision`, `description`, `phone`, `website`, `email`, `facebook`, `twitter`, `google_plus`, `amenities`, `opening_hours`, `achievements`, `created_at`, `modified_at`, `row_status`) VALUES
(1, 'Nalanda High School', '', 'Boys', 'High School', 'Nalanda,Nalanda High School,High School', 0, '', '', '0', '0', 'Sr Nager', '', '', 'Nalanda is educational group predominantly based in South Indian states of Andhra Pradesh and Karnataka. Established in 1988 by the four founding fathers of Nalanda group, it has 7 Units under which it offers academic and extension programs. Nalanda educational institutes promote the concept of a holistic approach towards education and production of globally competent and locally efficient individuals.\r\n\r\nWhen the conventional teaching methodology became ineffective in meeting today’s requirements, there came up a need for a new approach to education. It should satiate the needs in all domains like finding the skills within them, effective communication, stress-free learning from the orthodox rote learning where the focus lies merely in the academic excellence rather than the well all-rounded development of the child, and social responsibility. The forethought was made already and a squad of innovators founded NALANDA VIDYA NIKETHAN, the ground for evolution with a touch of Learner-centric teaching methodology called Self learning.', '040-514669555', 'https://nalanda.edu.in', 'nalanda@nalanda.edu.in', 'http://www.fb.com', 'http://www.twiter.com', 'http://www.googleplus.com', '[\"Elevator in building\",\"Friendly Environment\",\"Play Ground\"', '{\"1\":{\"m_opening\":\"10 AM\",\"m_closing\":\"5 PM\"},\"2\":{\"t_opening\":\"10 AM\",\"t_closing\":\"5 PM\"},\"3\":{\"w_opening\":\"10 AM\",\"w_closing\":\"5 PM\"},\"4\":{\"th_opening\":\"10 AM\",\"th_closing\":\"5 PM\"},\"5\":{\"f_opening\":\"10 AM\",\"f_closing\":\"5 PM\"},\"6\":{\"sa_opening\":\"10 AM\",\"sa_closing\":\"5 PM\"},\"7\":{\"s_opening\":\"Closed\",\"s_closing\":\"Closed\"}}', '', '2019-09-16 17:40:25', NULL, 1),
(2, 'Narayana', '', 'Boys', 'Pre School & High School', 'Narayana,Narayana High School,High School', 0, '', '', '0', '0', 'Ameerpet', '', '', 'With 40 years of Academic Excellency….. The Narayana Group is Asia’s largest educational conglomerate with over 360,000 students and 35,000 experienced teaching and non-teaching faculty in over 560 centres. Spread across 13 states, Narayana is hosting a bouquet of schools, junior colleges, engineering, medical and management institutions, coaching centres along with IAS training academy, has already set a benchmark in academic excellence by continuously delivering top and matchless results in Intra and International competitive examinations.', '040-55236155', 'https://www.narayanaschools.in/', 'info@narayanaschools.in', 'http://fb.com', 'http://twiter.com', 'http://googleplus.com', '[\"Elevator in building\",\"Friendly Environment\",\"Play Ground\"', '{\"1\":{\"m_opening\":\"9 AM\",\"m_closing\":\"4 PM\"},\"2\":{\"t_opening\":\"9 AM\",\"t_closing\":\"4 PM\"},\"3\":{\"w_opening\":\"9 AM\",\"w_closing\":\"4 PM\"},\"4\":{\"th_opening\":\"9 AM\",\"th_closing\":\"4 PM\"},\"5\":{\"f_opening\":\"9 AM\",\"f_closing\":\"4 PM\"},\"6\":{\"sa_opening\":\"9 AM\",\"sa_closing\":\"4 PM\"},\"7\":{\"s_opening\":\"Closed\",\"s_closing\":\"Closed\"}}', '', '2019-09-16 17:43:58', NULL, 1),
(3, 'my school', '', 'Boys', '[\"1\",\"2\"]', 'Nalanda,Nalanda High School,High School', 1, '[\"1\",\"2\"]', 'Grepthor Software Solutions Pvt Ltd, Patrika Nagar, Madhapur, Hyderabad, Telangana, India', '17', '78', 'Hyderabad', 'http://my/dfdsfdsf', 'fdasfsddsfsdfasdf', 'dsfadsfdsfdsafadsfdsf', '8121815502', 'https://sujithreddygreptho.wixsite.com/blog', 'mahi@gmail.com', 'sdsdsd', 'sdsds', 'mahi8@gmail.com', '[\"1\"]', '{\"opening_time\":[\"01 AM\",\"01 AM\",\"01 AM\",\"01 AM\",\"01 AM\",\"01 AM\",\"Closed\"],\"closing_time\":[\"01 AM\",\"01 AM\",\"01 AM\",\"01 AM\",\"01 AM\",\"01 AM\",\"Closed\"]}', '', '2019-09-20 12:11:07', NULL, 1),
(4, 'my school', '', 'Boys', '[\"1\",\"2\"]', 'Nalanda,Nalanda High School,High School', 1, '[\"1\",\"2\"]', 'Grepthor Software Solutions Pvt Ltd, Patrika Nagar, Madhapur, Hyderabad, Telangana, India', '17', '78', 'Hyderabad', 'http://my/dfdsfdsf', 'fdasfsddsfsdfasdf', 'dsfadsfdsfdsafadsfdsf', '8121815502', 'https://sujithreddygreptho.wixsite.com/blog', 'mahi@gmail.com', 'sdsdsd', 'sdsds', 'mahi8@gmail.com', '[\"1\"]', '{\"opening_time\":[\"01 AM\",\"01 AM\",\"01 AM\",\"01 AM\",\"01 AM\",\"01 AM\",\"Closed\"],\"closing_time\":[\"01 AM\",\"01 AM\",\"01 AM\",\"01 AM\",\"01 AM\",\"01 AM\",\"Closed\"]}', '', '2019-09-20 12:12:04', NULL, 1),
(5, 'my school', '', 'Boys', '[\"1\",\"2\"]', 'Nalanda,Nalanda High School,High School', 1, '[\"1\",\"2\"]', 'Grepthor Software Solutions Pvt Ltd, Patrika Nagar, Madhapur, Hyderabad, Telangana, India', '17', '78', 'Hyderabad', 'http://my/dfdsfdsf', 'fdasfsddsfsdfasdf', 'dsfadsfdsfdsafadsfdsf', '8121815502', 'https://sujithreddygreptho.wixsite.com/blog', 'mahi@gmail.com', 'sdsdsd', 'sdsds', 'mahi8@gmail.com', '[\"1\"]', '{\"opening_time\":[\"01 AM\",\"01 AM\",\"01 AM\",\"01 AM\",\"01 AM\",\"01 AM\",\"Closed\"],\"closing_time\":[\"01 AM\",\"01 AM\",\"01 AM\",\"01 AM\",\"01 AM\",\"01 AM\",\"Closed\"]}', '', '2019-09-20 12:14:35', NULL, 1),
(6, 'my school', '', 'Boys', '[\"1\",\"2\"]', 'Nalanda,Nalanda High School,High School', 1, '[\"1\",\"2\"]', 'Grepthor Software Solutions Pvt Ltd, Patrika Nagar, Madhapur, Hyderabad, Telangana, India', '17', '78', 'Hyderabad', 'http://my/dfdsfdsf', 'fdasfsddsfsdfasdf', 'dsfadsfdsfdsafadsfdsf', '8121815502', 'https://sujithreddygreptho.wixsite.com/blog', 'mahi@gmail.com', 'sdsdsd', 'sdsds', 'mahi8@gmail.com', '[\"1\"]', '{\"opening_time\":[\"01 AM\",\"01 AM\",\"01 AM\",\"01 AM\",\"01 AM\",\"01 AM\",\"Closed\"],\"closing_time\":[\"01 AM\",\"01 AM\",\"01 AM\",\"01 AM\",\"01 AM\",\"01 AM\",\"Closed\"]}', '', '2019-09-20 12:15:07', NULL, 1),
(7, 'my school', '', 'Boys', '[\"1\",\"2\"]', 'Nalanda,Nalanda High School,High School', 1, '[\"1\",\"2\"]', 'Grepthor Software Solutions Pvt Ltd, Patrika Nagar, Madhapur, Hyderabad, Telangana, India', '17', '78', 'Hyderabad', 'http://my/dfdsfdsf', 'fdasfsddsfsdfasdf', 'dsfadsfdsfdsafadsfdsf', '8121815502', 'https://sujithreddygreptho.wixsite.com/blog', 'mahi@gmail.com', 'sdsdsd', 'sdsds', 'mahi8@gmail.com', '[\"1\"]', '{\"opening_time\":[\"01 AM\",\"01 AM\",\"01 AM\",\"01 AM\",\"01 AM\",\"01 AM\",\"Closed\"],\"closing_time\":[\"01 AM\",\"01 AM\",\"01 AM\",\"01 AM\",\"01 AM\",\"01 AM\",\"Closed\"]}', '', '2019-09-20 12:15:15', NULL, 1),
(8, 'my school', '', 'Boys', '[\"1\",\"2\"]', 'Nalanda,Nalanda High School,High School', 1, '[\"1\",\"2\"]', 'Grepthor Software Solutions Pvt Ltd, Patrika Nagar, Madhapur, Hyderabad, Telangana, India', '17', '78', 'Hyderabad', 'http://my/dfdsfdsf', 'fdasfsddsfsdfasdf', 'dsfadsfdsfdsafadsfdsf', '8121815502', 'https://sujithreddygreptho.wixsite.com/blog', 'mahi@gmail.com', 'sdsdsd', 'sdsds', 'mahi8@gmail.com', '[\"1\"]', '{\"opening_time\":[\"01 AM\",\"01 AM\",\"01 AM\",\"01 AM\",\"01 AM\",\"01 AM\",\"Closed\"],\"closing_time\":[\"01 AM\",\"01 AM\",\"01 AM\",\"01 AM\",\"01 AM\",\"01 AM\",\"Closed\"]}', '', '2019-09-20 12:15:48', NULL, 1),
(9, 'gfgfdg', '', 'Boys', '[\"1\",\"2\"]', 'Nalanda,Nalanda High School,High School', 2, '[\"1\",\"2\",\"3\"]', 'Ashok Nanglia(Director DSFDC, President SC/ST Cell AAP), Gali No 33, Block D, 65/66, Madangir, New Delhi, Delhi, India', '29', '77', 'dsfdsf\r\nffdsfdsf', 'http://fb.com', 'dffafdsfadsfdsafasdfdffafdsfadsfdsafasdfdffafdsfadsfdsafasdfdffafdsfadsfdsafasdfdffafdsfadsfdsafasdfdffafdsfadsfdsafasdfdffafdsfadsfdsafasdfdffafdsfadsfdsafasdfdffafdsfadsfdsafasdfdffafdsfadsfdsafasdfdffafdsfadsfdsafasdfdffafdsfadsfdsafasdf', 'dfdasfdsfdasfdsf', '1231231232', 'https://sujithreddygreptho.wixsite.com/blog', 'maddji@g.com', 'sdsdsd', 'sdsds', 'maji@g.com', '[\"1\"]', '{\"opening_time\":[\"01 AM\",\"01 AM\",\"01 AM\",\"01 AM\",\"01 AM\",\"11 AM\",\"04 AM\"],\"closing_time\":[\"02 AM\",\"01 AM\",\"02 AM\",\"03 AM\",\"04 AM\",\"08 PM\",\"08 AM\"]}', '', '2019-09-20 12:19:30', NULL, 1),
(10, 'Vikas High School', '', 'Boys', '[\"1\",\"2\",\"3\"]', 'Beeramguda,play school,concept school', 1, '[\"1\",\"2\"]', 'Vikas The Concept School, Bollaram Road, Krishnaja Hills, Bachupally, Hyderabad, Telangana, India', '18', '78', 'Bachupallu', 'https://youtu.be/DTzDn5uItj8', 'Good great concept', 'akls;djfjlahsdfjklhakjlsdhfkjlahsdjklfhakjldhfkjlahsdkjlf', '1234567899', 'tefy.in', '', '', '', '', '[\"1\"]', '{\"opening_time\":[\"09 AM\",\"04 AM\",\"05 AM\",\"01 AM\",\"02 AM\",\"04 AM\",\"02 AM\"],\"closing_time\":[\"05 PM\",\"08 AM\",\"07 AM\",\"02 AM\",\"04 AM\",\"03 AM\",\"04 AM\"]}', '[\"IIT\",\"NIT\"]', '2019-09-21 16:57:04', NULL, 1),
(11, 'Vikas', 'fdfdf', 'Boys', '[\"1\",\"2\"]', 'madhapur', 2, '[\"4\",\"5\",\"6\",\"7\"]', 'Vikas High School, Kalpana Nagar, Narayan Nagar, Swami Vivekanand Nagar, Shahada, Maharashtra, India', '22', '74', 'Maharastra', '', 'Vikas-The Concept School is a dream manifested out of the vast experience of training young minds to meet global challenges by Sri. S. Koteswara Rao, Founder-Director of Guntur Vikas group of educational institutions, to set a trend in conceptualized teaching and thereby elevating the school to international standards. “Holistic Education Beyond Schooling”—being the motto, the school aims to rise above the ordinary by developing education which can transform lives and empower the child to confidently cope with the challenges as he/she grows up and emerges successful in life…\r\nSri. S. Kotesware Rao, is a catalyst in the making – who works with rare passion and bravery, with a sparkle in his eyes, totally devoted to bringing about excellence in education by making a difference, impacting young minds, thereby creating a legacy. Success is important, but Significance is more important.\r\n\r\nVision\r\nThe aim of the institution is to usher in a generation of human excellence with appropriate values, a deep sense of aesthetic appreciation, an astute political consciousness, a logical social awareness and above all sensitivity towards universal brotherhood of mankind. Critical thinking, effective communication, creative thinking, problem solving and decision making are the life skills which every young Vikasian aspires to achieve.\r\nOur vision is to provide a happy, caring and stimulating environment with a technological orientation across the whole curriculum, which maximizes individual potential and ensures students of all ability levels are well equipped to meet the challenges of education, work and life.\r\n\r\nMission\r\nThe mission therefore is set:-\r\n\r\nTowards providing a congenial atmosphere and full-fledged infrastructure to the students research needs and project work,\r\nTowards the development of habits—cleanliness—personal and surrounding, at home, in school, elsewhere.\r\nTowards the development of study habits—so as to become an independent learner who is self-reliant, optimistic and resourceful\r\nTowards the development of appropriate personal values leading to the growth of personal integrity and the courage to stand for his/her conviction on genuinely human concern in word and action.\r\nTowards the development of a scientific temper as critical learners.\r\nTo prepare each student for a responsible social life with a sense of commitment towards himself/herself, towards his/her family and towards the nation, is the ultimate goal of Vikasian education.\r\n\r\n', 'Vikas-The Concept School is a dream manifested out of the vast experience of training young minds to meet global challenges by Sri. S. Koteswara Rao, Founder-Director of Guntur Vikas group of educational institutions, to set a trend in conceptualized teaching and thereby elevating the school to international standards. “Holistic Education Beyond Schooling”—being the motto, the school aims to rise above the ordinary by developing education which can transform lives and empower the child to confidently cope with the challenges as he/she grows up and emerges successful in life…\r\nSri. S. Kotesware Rao, is a catalyst in the making – who works with rare passion and bravery, with a sparkle in his eyes, totally devoted to bringing about excellence in education by making a difference, impacting young minds, thereby creating a legacy. Success is important, but Significance is more important.\r\n\r\nVision\r\nThe aim of the institution is to usher in a generation of human excellence with appropriate values, a deep sense of aesthetic appreciation, an astute political consciousness, a logical social awareness and above all sensitivity towards universal brotherhood of mankind. Critical thinking, effective communication, creative thinking, problem solving and decision making are the life skills which every young Vikasian aspires to achieve.\r\nOur vision is to provide a happy, caring and stimulating environment with a technological orientation across the whole curriculum, which maximizes individual potential and ensures students of all ability levels are well equipped to meet the challenges of education, work and life.\r\n\r\nMission\r\nThe mission therefore is set:-\r\n\r\nTowards providing a congenial atmosphere and full-fledged infrastructure to the students research needs and project work,\r\nTowards the development of habits—cleanliness—personal and surrounding, at home, in school, elsewhere.\r\nTowards the development of study habits—so as to become an independent learner who is self-reliant, optimistic and resourceful\r\nTowards the development of appropriate personal values leading to the growth of personal integrity and the courage to stand for his/her conviction on genuinely human concern in word and action.\r\nTowards the development of a scientific temper as critical learners.\r\nTo prepare each student for a responsible social life with a sense of commitment towards himself/herself, towards his/her family and towards the nation, is the ultimate goal of Vikasian education.\r\n\r\n', '', '', '', '', '', '', '[\"1\"]', '{\"opening_time\":[\"02 AM\",\"02 AM\",\"Closed\",\"Closed\",\"Closed\",\"01 AM\",\"Closed\"],\"closing_time\":[\"03 AM\",\"Closed\",\"Closed\",\"Closed\",\"Closed\",\"09 PM\",\"09 PM\"]}', '[\"hi\",\"2222\"]', '2019-09-21 17:07:32', NULL, 1);

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
(1, 4, 'IMG_20190502_091544.jpg', '2019-09-20 12:12:04', NULL, 1),
(2, 7, 'IMG_20190502_091544.jpg', '2019-09-20 12:15:15', NULL, 1),
(3, 8, 'IMG_20190502_091544.jpg', '2019-09-20 12:15:48', NULL, 1),
(4, 9, 'IMG-20180709-WA0020.jpg', '2019-09-20 12:19:30', NULL, 1),
(5, 9, 'IMG_20180531_171302.jpg', '2019-09-20 12:19:30', NULL, 1),
(6, 9, 'IMG_20190502_091544.jpg', '2019-09-20 12:19:30', NULL, 1),
(7, 10, 'banner_01.png', '2019-09-21 16:57:04', NULL, 1),
(8, 11, 'banner_01.png', '2019-09-21 17:07:32', NULL, 1),
(9, 1, '', '2019-09-23 13:25:46', NULL, 1);

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

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `review`, `rating`, `listing_id`, `user_id`, `created_at`, `modified_at`, `row_status`) VALUES
(1, 'hi this is for testing', '4', 1, 1, '2019-09-21 14:55:37', NULL, 1),
(2, 'hi this is for testing2', '2', 1, 1, '2019-09-21 14:55:37', NULL, 1),
(3, 'hi this is for testing 3', '5', 1, 1, '2019-09-21 14:55:37', NULL, 1);

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
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1569217952, 1, 'Admin', 'istrator', 'ADMIN', '0');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `curriculum`
--
ALTER TABLE `curriculum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `get_in_touch`
--
ALTER TABLE `get_in_touch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `listing_gallery`
--
ALTER TABLE `listing_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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

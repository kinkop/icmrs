-- phpMyAdmin SQL Dump
-- version 4.3.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 29, 2015 at 07:09 AM
-- Server version: 5.5.38-0ubuntu0.12.04.1
-- PHP Version: 5.5.17-2+deb.sury.org~precise+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `icmrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_notifications`
--

CREATE TABLE IF NOT EXISTS `admin_notifications` (
  `id` int(10) unsigned NOT NULL,
  `type` enum('conference') COLLATE utf8_unicode_ci NOT NULL,
  `action` enum('register') COLLATE utf8_unicode_ci NOT NULL,
  `element_id` int(10) unsigned NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `readed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `conferences`
--

CREATE TABLE IF NOT EXISTS `conferences` (
  `id` int(10) unsigned NOT NULL,
  `code` varchar(100) DEFAULT NULL,
  `url_slug` varchar(100) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `image_file` varchar(255) NOT NULL,
  `conference_date` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `conferences`
--

INSERT INTO `conferences` (`id`, `code`, `url_slug`, `name`, `location`, `status`, `image_file`, `conference_date`, `created_at`, `updated_at`) VALUES
(1, 'ICMSR 2015', '2015/ICMSR', 'International Conference on Multidisciplinary Studies and Research', 'Bangkok, Thailand', 1, 'conference_1.jpg', ' July, 21-22, 2015', '2014-10-01 00:00:00', '2014-11-02 10:14:07');

-- --------------------------------------------------------

--
-- Table structure for table `conference_details`
--

CREATE TABLE IF NOT EXISTS `conference_details` (
  `id` int(10) unsigned NOT NULL,
  `conference_id` int(10) unsigned DEFAULT NULL,
  `information` mediumtext,
  `objectives` mediumtext,
  `important_dates` text,
  `call_for_papers` text,
  `committees` text,
  `venue_short_information` text NOT NULL,
  `venue_information` text,
  `venue_lat` varchar(50) DEFAULT NULL,
  `venue_lng` varchar(50) DEFAULT NULL,
  `key_notes` text NOT NULL,
  `organization` text NOT NULL,
  `fees` mediumtext NOT NULL,
  `listener_register_detail` mediumtext NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `conference_details`
--

INSERT INTO `conference_details` (`id`, `conference_id`, `information`, `objectives`, `important_dates`, `call_for_papers`, `committees`, `venue_short_information`, `venue_information`, `venue_lat`, `venue_lng`, `key_notes`, `organization`, `fees`, `listener_register_detail`, `created_at`, `updated_at`) VALUES
(1, 1, '<p class="1" style="margin-bottom:0cm;margin-bottom:.0001pt"><span new="" style="font-size:12.0pt;line-height:107%;font-family:" times="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;The 1st&nbsp; International Conference on Multidisciplinary Studies and Research (ICMRS 2015) is conferences for discuss, share ideas and visions for the future of applied physics, materials science and material application. The purpose of the conferences is also engaged the worldwide community in a collective effort to widen apply these researches in both conventional and new applications.<o:p></o:p></span></p>\r\n\r\n<p class="1" style="margin-bottom:0cm;margin-bottom:.0001pt"><span new="" style="font-size:12.0pt;line-height:107%;font-family:" times="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; It is our great pleasure to invite you for 1st ICMRS (ICMRS 2015) conference. The concept of this conference will be organized in the small but effective and high quality style. The program is designed to Physical Science and Mathematics, Medical Sciences, Chemical and Pharmaceutical Sciences, Agricultural Science and Biology, Sociology, Information Technology and Communication Science, Political Sciences and Public, Education, Administration, Economics, Law, Philosophies, and Engineering and Research IndustryEngineering and Research Industry in our next generation by the discussion of the most recent advances. <o:p></o:p></span></p>\r\n\r\n<p class="1" style="margin-bottom:0cm;margin-bottom:.0001pt"><span new="" style="font-size:12.0pt;line-height:107%;font-family:" times="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Please accept my invitation for the ICMRS 2015 conference that will be held in Bangkok, which is the capital and the most populous city of Thailand.&nbsp; The major prospect for this conference is to provide and excellent opportunity for interactions and amicabilities within the participants from every corner of the world who is in the field of Physical Science and Mathematics, Medical Sciences, Chemical and Pharmaceutical Sciences, Agricultural Science and Biology, Sociology, Information Technology and Communication Science, Political Sciences and Public, Education, Administration, Economics, Law, Philosophies, and Engineering and Research IndustryEngineering and Research Industry researches and development.<o:p></o:p></span></p>\r\n', '<p>objectives 2222222222222222</p>\r\n\r\n<p>33333333333333</p>\r\n\r\n<p>444444444444</p>\r\n\r\n<p><strong>5555555555555555555</strong></p>\r\n', 'important_dates', 'call_for_papersHoliday Inn Paris Montparnasse Avenue Du Maine, 79-81 Paris, 75014 France Tel: ++33-1-43201393 Fax: ++33-1-43209560', '<p><span style="color: rgb(121, 121, 121); font-family: ''Open Sans'', sans-serif; font-size: 16px; line-height: 22.8571434020996px;">Committees</span></p>\r\n', 'Holiday Inn Paris Montparnasse Avenue Du Maine, 79-81 Paris, 75014 France Tel: ++33-1-43201393 Fax: ++33-1-43209560', 'Holiday Inn Paris Montparnasse Avenue Du Maine, 79-81 Paris, 75014 France Tel: ++33-1-43201393 Fax: ++33-1-43209560', '13.730286', '100.541843', '<p><span style="color: rgb(121, 121, 121); font-family: ''Open Sans'', sans-serif; font-size: 16px; line-height: 22.8571434020996px;">Key Notes</span></p>\r\n', '<p><span style="color: rgb(121, 121, 121); font-family: ''Open Sans'', sans-serif; font-size: 16px; line-height: 22.8571434020996px;">Organization</span></p>\r\n', '<p>10000 435646546546456546</p>\r\n\r\n<p>54645654645645654645645645</p>\r\n', 'listener_register_detail', '2014-10-01 00:00:00', '2014-11-02 10:14:07');

-- --------------------------------------------------------

--
-- Table structure for table `conference_fees`
--

CREATE TABLE IF NOT EXISTS `conference_fees` (
  `id` int(10) unsigned NOT NULL,
  `conference_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text,
  `price` double(11,2) DEFAULT NULL,
  `early_price` double(11,2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `conference_listeners`
--

CREATE TABLE IF NOT EXISTS `conference_listeners` (
  `id` int(10) unsigned NOT NULL,
  `conference_register_id` int(10) unsigned NOT NULL,
  `conference_listener_status_id` int(10) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `conference_listener_statuses`
--

CREATE TABLE IF NOT EXISTS `conference_listener_statuses` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cls` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `conference_listener_statuses`
--

INSERT INTO `conference_listener_statuses` (`id`, `name`, `cls`) VALUES
(1, 'Register', '');

-- --------------------------------------------------------

--
-- Table structure for table `conference_papers`
--

CREATE TABLE IF NOT EXISTS `conference_papers` (
  `id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `conference_register_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paper_type` enum('abstract','review','original_research','full') COLLATE utf8_unicode_ci NOT NULL,
  `presentation_type` enum('oral','poster') COLLATE utf8_unicode_ci NOT NULL,
  `conference_topic_id` int(10) unsigned NOT NULL,
  `authors` text COLLATE utf8_unicode_ci NOT NULL,
  `abstract` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `refs` text COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `file1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `conference_paper_status_id` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `conference_paper_statuses`
--

CREATE TABLE IF NOT EXISTS `conference_paper_statuses` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cls` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `conference_paper_statuses`
--

INSERT INTO `conference_paper_statuses` (`id`, `name`, `cls`) VALUES
(1, 'Paper submission', ''),
(2, 'Sent invite later', ''),
(3, 'Review paper', '');

-- --------------------------------------------------------

--
-- Table structure for table `conference_registers`
--

CREATE TABLE IF NOT EXISTS `conference_registers` (
  `id` int(10) unsigned NOT NULL,
  `conference_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `type` enum('author','listener') DEFAULT NULL,
  `registered_date` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `registered_by` int(10) unsigned NOT NULL DEFAULT '0',
  `admin_readed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `conference_slides`
--

CREATE TABLE IF NOT EXISTS `conference_slides` (
  `id` int(10) unsigned NOT NULL,
  `conference_id` int(10) unsigned NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sorting` int(10) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `conference_slides`
--

INSERT INTO `conference_slides` (`id`, `conference_id`, `link`, `file`, `sorting`, `created_at`, `updated_at`) VALUES
(3, 1, 'http://blognone.com', 'conference_1_slide_3.jpg', 3, '2014-10-23 04:36:36', '2014-11-02 10:17:48'),
(7, 1, 'http://www.ssru.ac.th', 'conference_1_slide_7.jpg', 4, '2014-11-02 10:37:36', '2014-11-02 10:37:36');

-- --------------------------------------------------------

--
-- Table structure for table `conference_topics`
--

CREATE TABLE IF NOT EXISTS `conference_topics` (
  `id` int(10) unsigned NOT NULL,
  `parent_topic_id` int(10) unsigned NOT NULL,
  `conference_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `conference_topics`
--

INSERT INTO `conference_topics` (`id`, `parent_topic_id`, `conference_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'Physical Science and Mathematics', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 0, 1, 'Medical Sciences', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 0, 1, 'Chemical and Pharmaceutical Sciences', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 0, 1, 'Agricultural Science and Biology\r\n', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 0, 1, 'Sociology', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 0, 1, 'Information Technology and Communication Science', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 0, 1, 'Political Sciences and Public Administration', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 0, 1, 'Education', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 0, 1, 'Economics', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 0, 1, 'Law', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 0, 1, 'Philosophies', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 0, 1, 'Engineering and Research Industry', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 1, 1, 'Mathematics and statistics', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 1, 1, 'Physics', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 1, 1, 'Astronomy', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 1, 1, 'Earth and space science', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 1, 1, 'Geology', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 1, 1, 'Hydrology', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 1, 1, 'Oceanography', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 1, 1, 'Meteorology', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 1, 1, 'Oceanography', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 1, 1, 'Environmental physics and other relevant subjects.', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 2, 1, 'Including Medical Sciences', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 2, 1, 'Public Health Medicine', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 2, 1, 'Medical Technology', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 2, 1, 'Nursing Science ', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 2, 1, 'Dentistry', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 2, 1, 'Medical Social Sciences and other relevant subjects.', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 3, 1, 'Inorganic chemistry', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 3, 1, 'Organic chemistry', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 3, 1, 'Biochemistry', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 3, 1, 'Industrial Chemistry', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 3, 1, 'Food Chemistry', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 3, 1, 'Polymer chemistry', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 3, 1, 'Analytical Chemistry', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 3, 1, 'Petrochemistry', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 3, 1, 'Environmental chemistry', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 3, 1, 'Technical chemistry', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 3, 1, 'Nuclear chemistry', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 3, 1, 'Physical chemistry', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 3, 1, 'Biological chemistry', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 3, 1, 'Pharmaceutical chemistry and pharmaceutical analysis', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 3, 1, 'Pharmaceutical Industry', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 3, 1, 'Pharmaceutics', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 3, 1, 'Pharmacology and toxicology', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 3, 1, 'Pharmaceutical industry and Biopharmaceutics and other relevant subjects.', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 4, 1, 'Plant Resource', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 4, 1, 'Pest Management', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 4, 1, 'Animal Resource', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 4, 1, 'Fisheries Resource', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 4, 1, 'Forest Resource', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 4, 1, 'Water for Agriculture', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 4, 1, 'Agricultural Industry', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 4, 1, 'Agricultural Business', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 4, 1, 'Agricultural System', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 4, 1, 'Agricultural Mechanics and Engineering', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 4, 1, 'Soil Resource', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 4, 1, 'Agricultural Environment', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 4, 1, 'Biological Science and other relevant subjects.', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 5, 1, 'Sociology', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 5, 1, 'Population Science', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 5, 1, 'Anthropology', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 5, 1, 'Social Psychology', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 5, 1, 'Social Problem and Social Administration', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 5, 1, 'Criminology', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 5, 1, 'Justice System', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 5, 1, 'Human Ecology and Social Ecology', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 5, 1, 'Social Development', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 5, 1, 'Local  Wisdom, Social Geology', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 5, 1, 'Gender Equality Studies', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 6, 1, 'Computer Science', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 6, 1, 'Telecommunication', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 6, 1, 'Satellite Communication', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 6, 1, 'Network Communication', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 6, 1, 'Distant Perception and Exploration', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 6, 1, 'Geographic Information System', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 6, 1, 'Information Science', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 6, 1, 'Communication Science', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 6, 1, 'Library Science', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 6, 1, 'Museum Technique and Curatorship and other relevant subjects.', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 5, 1, 'Folkloristics and other relevant subjects.', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 7, 1, 'International Relations', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 7, 1, 'Policy Studies', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 7, 1, 'Political Ideology', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 7, 1, 'Institution', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 7, 1, 'Political Life', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 7, 1, 'Political Sociology', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 7, 1, 'Political System', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 7, 1, 'Political Theory', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 7, 1, 'Public Administration', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 7, 1, 'Public Opinion', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 7, 1, 'Security Strategy', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 7, 1, 'Political Economy and other relevant subjects.', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 8, 1, 'Basics of Education', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 8, 1, 'Curriculum and Instruction', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 8, 1, 'Measurement and Assessment', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 8, 1, 'Educational Technology', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 8, 1, 'Psychology and Educational Guidance', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 8, 1, 'Non-Formal Education', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 8, 1, 'Special Education', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 8, 1, 'Physical Education and other relevant subjects.', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 9, 1, 'Economics', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 9, 1, 'Commerce', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 9, 1, 'Business Administration', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 9, 1, 'Accounting and other relevant subjects.', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 10, 1, 'Public Law', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 10, 1, 'Private Law', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 10, 1, 'Criminal Law', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 10, 1, 'Economic Law', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 10, 1, 'Business Law', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 10, 1, 'International Law', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 10, 1, 'Procedural Law and other relevant subjects.', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 11, 1, 'Philosophies', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 11, 1, 'History', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 11, 1, 'Archaeology', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 11, 1, 'Literature', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 11, 1, 'Fine Arts', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 11, 1, 'Languages', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 11, 1, 'Architecture', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 11, 1, 'Religions and other relevant subjects.', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 12, 1, 'Science and Technology', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 12, 1, 'Basics of Engineering', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 12, 1, 'Engineering', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 12, 1, 'Research Industry and other relevant subjects.', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE IF NOT EXISTS `contents` (
  `id` int(10) unsigned NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `alias`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 'contact', 'Contact', '<p>Contact</p>\r\n\r\n<p><span style="line-height: 20.7999992370605px;">Contact</span></p>\r\n\r\n<p><span style="line-height: 20.7999992370605px;">Contact</span></p>\r\n\r\n<p><span style="line-height: 20.7999992370605px;">Contact</span></p>\r\n\r\n<p><span style="line-height: 20.7999992370605px;">Contact</span></p>\r\n\r\n<p><span style="line-height: 20.7999992370605px;">Contact</span></p>\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(10) unsigned NOT NULL,
  `code` char(10) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`) VALUES
(1, 'th', 'Thailand');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `user_group_id` int(10) unsigned NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `invited_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `is_set_password` tinyint(1) NOT NULL DEFAULT '1',
  `confirm_register_token` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `remember_token`, `user_group_id`, `status`, `created_at`, `updated_at`, `invited_user_id`, `is_set_password`, `confirm_register_token`) VALUES
(3, 'admin', '$2y$10$/CFihnUIAteESdQz1Hw5tetRoRAUyYC4v/L1tUpiHC6wJlJGOsa7i', 'admin', 'bNUUEEmVRxJ0a6FTwYv8zsJHAyTwNgumWjeGZIPnQohPNhn0eYYd9aUWBvqo', 2, 1, '2014-09-28 08:21:09', '2015-03-29 06:15:20', 0, 1, ''),
(8, 'pakinmankong@gmail.com', '$2y$10$.OkP3pNlleiZcqmN4RX6p.1WkJD.CgXpGclVn7FJrKydT6YcSEEAS', 'pakinmankong@gmail.com', 'vOMST2qqqSA11wAvxzxD5cVU2JX5JHtXAHtI16YOrvQIt1T03HxhJMnYKFwu', 4, 1, '2014-10-26 06:38:45', '2015-03-29 07:07:52', 0, 1, ''),
(9, 'test@gmail.com', '$2y$10$hbV1oO4..9RDK.zbOhx.buUeqmz4L0fq9gKhoHOSscfGJyDCa0iju', 'test@gmail.com', 'hFahhtkDFTlKR0WvuSDExkNOHneVkFpSD73Wj6L8IZKrktynHcf9M98qz5Le', 4, 1, '2014-10-31 02:33:40', '2014-10-31 02:33:57', 0, 1, ''),
(10, 'sdfdf@gmail.com', '$2y$10$6XWaxb55n197qpKQOXj1Fu3buvdLDmp.ZMNKIvE8Kt/Yg4ROFQedu', 'sdfdf@gmail.com', 'fkr57ZGqwNDm3qMN3Ew7W154ZrRclbbC6gX0SxhJEqxHzBxdlDsvuhQ5LGwc', 4, 1, '2014-11-02 07:11:20', '2014-11-02 07:12:32', 0, 1, ''),
(11, 'mascha_nu@hotmail.com', '$2y$10$nvFBXjMrAe7PIO9f6ki47uGDD5G0ZDtyIMOY7ZtMH/W/OmLznc9sC', 'mascha_nu@hotmail.com', 'uQXSP1qnPH4pCCINYD3EsZFdB97ilbfP6gC1495fdp6GPlQCUZxm28O7dRv1', 4, 1, '2014-11-02 07:13:42', '2014-12-21 06:30:34', 0, 1, ''),
(12, 'sadsadsdsa@gmail.com', '$2y$10$oBArRCvMvsvyYRt7cwMfRep0xXg8JSaXcLxxdtF0XZmt0hPOi2Uri', 'sadsadsdsa@gmail.com', NULL, 4, 1, '2014-11-02 07:14:02', '2014-11-02 07:14:02', 0, 1, ''),
(14, 'research.wutthikorn@gmail.com', '$2y$10$6JaR5Smg0Qw1AnOnQCZ20.60YUr3pkWbN5YyFsiZqE85SsW51pRKu', 'research.wutthikorn@gmail.com', NULL, 4, 1, '2014-12-08 05:21:53', '2014-12-08 05:21:53', 0, 1, ''),
(18, 'pakin1@gmail.com', '$2y$10$M.vT4bfmjEeWaBzI5cPQvOfhQpJWuLwMXFdG.f7NYHfopNlGGACuW', 'pakin1@gmail.com', NULL, 4, 0, '2015-01-11 10:04:11', '2015-01-11 10:04:11', 8, 0, ''),
(19, 'pakin_comsci03@hotmail.com', '$2y$10$5wRvj784P4wL5vz3DPE51eE1SxjPURCAMY00LtjQguJaCHc2YxbMC', 'pakin_comsci03@hotmail.com', 'DiJuVqDCEP8vYVq1Tr14ljJ1d1gwBmOqXv6jNzEsPDSiqSupzNr9aXjEJL8j', 4, 0, '2015-03-29 06:29:36', '2015-03-29 06:30:34', 8, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `department` varchar(150) DEFAULT NULL,
  `institution` varchar(150) DEFAULT NULL,
  `city` varchar(150) DEFAULT NULL,
  `country_id` int(10) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `title`, `first_name`, `last_name`, `department`, `institution`, `city`, `country_id`, `created_at`, `updated_at`) VALUES
(3, 3, 'Mr.', 'Admin', 'Admin', 'Programmer2', 'Attendee2', 'Bangkok Thailand', 1, '2014-09-28 08:21:09', '2014-10-26 06:28:05'),
(6, 8, 'Mr.', 'ภาคิณ', 'มั่นคง', 'Programmer', 'Attendee', 'Bangkok Thailand', 1, '2014-10-26 06:38:45', '2014-10-31 02:33:06'),
(7, 9, 'Mr.', 'ddd', 'ddd', 'dd', 'ddd', 'sdsd', 1, '2014-10-31 02:33:40', '2014-10-31 02:33:40'),
(8, 10, 'Mr.', 'dddd', 'ddd', 'dd', 'dd', 'dsfsd', 1, '2014-11-02 07:11:20', '2014-11-02 07:11:20'),
(9, 11, 'Mr.', 'Anuphan', 'Suttimarn', 'ssru', 'ssru', 'thaialand', 1, '2014-11-02 07:13:42', '2014-11-02 07:13:42'),
(10, 12, 'Mr.', 'asdsad', 'sadsadsa', 'dsad', 'sadsad', 'sadsad', 1, '2014-11-02 07:14:02', '2014-11-02 07:14:02'),
(12, 14, 'Mr.', 'Wutthikorn', 'Malikong', 'Institute for Research and Development', 'Suan Sunandha Rajabhat University', 'Bangkok', 1, '2014-12-08 05:21:53', '2014-12-08 05:21:53'),
(16, 18, '', 'Firstname', 'Lastname', '', '', '', 1, '2015-01-11 10:04:11', '2015-01-11 10:04:11'),
(17, 19, '', 'Pakin', 'Mankong', '', '', '', 1, '2015-03-29 06:29:36', '2015-03-29 06:29:36');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE IF NOT EXISTS `user_groups` (
  `id` int(10) unsigned NOT NULL,
  `alias` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `alias`, `name`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'Super Admin', NULL, NULL),
(2, 'admin', 'Admin', NULL, NULL),
(3, 'reviewer', 'Reviewer', NULL, NULL),
(4, 'user', 'User', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conferences`
--
ALTER TABLE `conferences`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `url_slug` (`url_slug`);

--
-- Indexes for table `conference_details`
--
ALTER TABLE `conference_details`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_conference_details_conferences1_idx` (`conference_id`);

--
-- Indexes for table `conference_fees`
--
ALTER TABLE `conference_fees`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_conference_fees_conferences1_idx` (`conference_id`);

--
-- Indexes for table `conference_listeners`
--
ALTER TABLE `conference_listeners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conference_listener_statuses`
--
ALTER TABLE `conference_listener_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conference_papers`
--
ALTER TABLE `conference_papers`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `conference_paper_statuses`
--
ALTER TABLE `conference_paper_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conference_registers`
--
ALTER TABLE `conference_registers`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_conference_registers_users1_idx` (`user_id`), ADD KEY `fk_conference_registers_conferences1_idx` (`conference_id`);

--
-- Indexes for table `conference_slides`
--
ALTER TABLE `conference_slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conference_topics`
--
ALTER TABLE `conference_topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `coubtriescol_UNIQUE` (`code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username_UNIQUE` (`username`), ADD UNIQUE KEY `email_UNIQUE` (`email`), ADD KEY `fk_users_user_groups_idx` (`user_group_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_user_details_users1_idx` (`user_id`), ADD KEY `fk_user_details_countries1_idx` (`country_id`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `alias_UNIQUE` (`alias`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `conferences`
--
ALTER TABLE `conferences`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `conference_details`
--
ALTER TABLE `conference_details`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `conference_fees`
--
ALTER TABLE `conference_fees`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `conference_listeners`
--
ALTER TABLE `conference_listeners`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `conference_listener_statuses`
--
ALTER TABLE `conference_listener_statuses`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `conference_papers`
--
ALTER TABLE `conference_papers`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `conference_paper_statuses`
--
ALTER TABLE `conference_paper_statuses`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `conference_registers`
--
ALTER TABLE `conference_registers`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `conference_slides`
--
ALTER TABLE `conference_slides`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `conference_topics`
--
ALTER TABLE `conference_topics`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `conference_details`
--
ALTER TABLE `conference_details`
ADD CONSTRAINT `fk_conference_details_conferences1` FOREIGN KEY (`conference_id`) REFERENCES `conferences` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `conference_fees`
--
ALTER TABLE `conference_fees`
ADD CONSTRAINT `fk_conference_fees_conferences1` FOREIGN KEY (`conference_id`) REFERENCES `conferences` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `conference_registers`
--
ALTER TABLE `conference_registers`
ADD CONSTRAINT `fk_conference_registers_conferences1` FOREIGN KEY (`conference_id`) REFERENCES `conferences` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_conference_registers_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `fk_users_user_groups` FOREIGN KEY (`user_group_id`) REFERENCES `user_groups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
ADD CONSTRAINT `fk_user_details_countries1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_user_details_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

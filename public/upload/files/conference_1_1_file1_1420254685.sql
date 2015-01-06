-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2014 at 06:58 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `container_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
`id` int(10) unsigned NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `accountscol` varchar(45) DEFAULT NULL,
  `service_fees` decimal(20,2) DEFAULT NULL,
  `rate` decimal(20,2) DEFAULT NULL,
  `getting_paid` varchar(255) DEFAULT NULL,
  `pay_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `containers`
--

CREATE TABLE IF NOT EXISTS `containers` (
`id` int(10) unsigned NOT NULL,
  `seal_no` varchar(255) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `height` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `container_fixs`
--

CREATE TABLE IF NOT EXISTS `container_fixs` (
`id` int(10) unsigned NOT NULL,
  `container_id` int(10) unsigned NOT NULL,
  `fix_location` text,
  `status` tinyint(1) DEFAULT NULL,
  `send_date` datetime DEFAULT NULL,
  `container_service_compnay_id` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `container_service_companies`
--

CREATE TABLE IF NOT EXISTS `container_service_companies` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` text,
  `telephone` char(20) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `address` text,
  `telephone` char(20) DEFAULT NULL,
  `contact_person` varchar(200) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
`id` int(10) unsigned NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `address` text,
  `telephone` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_infos`
--

CREATE TABLE IF NOT EXISTS `shipping_infos` (
`id` int(10) unsigned NOT NULL,
  `job_no` varchar(255) DEFAULT NULL,
  `ship_date` datetime DEFAULT NULL,
  `ship_location` text,
  `detail` text,
  `car_no` varchar(200) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ships`
--

CREATE TABLE IF NOT EXISTS `ships` (
`id` int(10) unsigned NOT NULL,
  `vessels` varchar(200) DEFAULT NULL,
  `voyage` text,
  `port` varchar(200) DEFAULT NULL,
  `destination` varchar(200) DEFAULT NULL,
  `etd` datetime DEFAULT NULL,
  `eta` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `containers`
--
ALTER TABLE `containers`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `seal_no_UNIQUE` (`seal_no`);

--
-- Indexes for table `container_fixs`
--
ALTER TABLE `container_fixs`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_container_fixs_containers_idx` (`container_id`), ADD KEY `fk_container_fixs_container_service_companies1_idx` (`container_service_compnay_id`);

--
-- Indexes for table `container_service_companies`
--
ALTER TABLE `container_service_companies`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_infos`
--
ALTER TABLE `shipping_infos`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `job_no_UNIQUE` (`job_no`);

--
-- Indexes for table `ships`
--
ALTER TABLE `ships`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `containers`
--
ALTER TABLE `containers`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `container_fixs`
--
ALTER TABLE `container_fixs`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `container_service_companies`
--
ALTER TABLE `container_service_companies`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shipping_infos`
--
ALTER TABLE `shipping_infos`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ships`
--
ALTER TABLE `ships`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `container_fixs`
--
ALTER TABLE `container_fixs`
ADD CONSTRAINT `fk_container_fixs_container_service_companies1` FOREIGN KEY (`container_service_compnay_id`) REFERENCES `container_service_companies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_container_fixs_containers` FOREIGN KEY (`container_id`) REFERENCES `containers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

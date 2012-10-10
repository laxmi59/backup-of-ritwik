-- phpMyAdmin SQL Dump
-- version 2.9.0.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Nov 22, 2010 at 12:07 PM
-- Server version: 5.0.27
-- PHP Version: 5.2.0
-- 
-- Database: `booking`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `cal_admin`
-- 

CREATE TABLE `cal_admin` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(50) collate latin1_general_ci NOT NULL,
  `password` varchar(30) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `cal_admin`
-- 

INSERT INTO `cal_admin` (`id`, `username`, `password`) VALUES 
(1, 'admin', 'admin');

-- --------------------------------------------------------

-- 
-- Table structure for table `cal_booking`
-- 

CREATE TABLE `cal_booking` (
  `bid` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `slot_id` int(11) NOT NULL,
  `ser_id` int(11) NOT NULL,
  `sloot_time` datetime NOT NULL,
  PRIMARY KEY  (`bid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `cal_booking`
-- 

INSERT INTO `cal_booking` (`bid`, `user_id`, `slot_id`, `ser_id`, `sloot_time`) VALUES 
(1, 1, 1, 1, '2010-11-10 09:10:00'),
(2, 2, 8, 1, '2010-11-23 09:00:00'),
(3, 3, 5, 1, '2010-11-18 09:00:00');

-- --------------------------------------------------------

-- 
-- Table structure for table `cal_booklist`
-- 

CREATE TABLE `cal_booklist` (
  `vid` int(11) NOT NULL auto_increment,
  `vdate` varchar(11) collate latin1_general_ci NOT NULL,
  `vtime` varchar(30) collate latin1_general_ci NOT NULL,
  `vfname` varchar(50) collate latin1_general_ci NOT NULL,
  `vlname` varchar(50) collate latin1_general_ci NOT NULL,
  `vmail` varchar(100) collate latin1_general_ci NOT NULL,
  `vcost` varchar(10) collate latin1_general_ci NOT NULL,
  `vphone` varchar(20) collate latin1_general_ci NOT NULL,
  `vmobile` varchar(20) collate latin1_general_ci NOT NULL,
  `company` varchar(50) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`vid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `cal_booklist`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `cal_company`
-- 

CREATE TABLE `cal_company` (
  `id` int(11) NOT NULL auto_increment,
  `companyname` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `company_mail` varchar(50) NOT NULL,
  `business_type` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `cal_company`
-- 

INSERT INTO `cal_company` (`id`, `companyname`, `password`, `company_mail`, `business_type`, `date`) VALUES 
(2, '3one', '3one', '3one@yopmail.com', 1, '2010-11-08'),
(4, 'Health Super', 'healthsuper', 'anita@corporatehealth4life.com.au', 1, '2010-11-09'),
(5, 'ANZ', 'anz', 'anita@corporatehealth4life.com.au', 2, '2010-11-09');

-- --------------------------------------------------------

-- 
-- Table structure for table `cal_services`
-- 

CREATE TABLE `cal_services` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) collate latin1_general_ci NOT NULL,
  `date` date NOT NULL,
  `consumer_info` varchar(30) collate latin1_general_ci NOT NULL,
  `facts_info` varchar(30) collate latin1_general_ci NOT NULL,
  `consent_info` varchar(100) collate latin1_general_ci NOT NULL,
  `additional_info` varchar(100) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `cal_services`
-- 

INSERT INTO `cal_services` (`id`, `name`, `date`, `consumer_info`, `facts_info`, `consent_info`, `additional_info`) VALUES 
(1, 'Flu Vaccination', '2010-10-22', 'consumer1.pdf', 'facts1.pdf', 'consent1.pdf', 'additional1.pdf'),
(4, 'Health Check', '2010-11-09', '', '', '', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `cal_site`
-- 

CREATE TABLE `cal_site` (
  `id` int(11) NOT NULL auto_increment,
  `state` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `name` varchar(100) collate latin1_general_ci NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `cal_site`
-- 

INSERT INTO `cal_site` (`id`, `state`, `company`, `name`, `date`) VALUES 
(1, 4, 2, 'test', '2010-11-08'),
(3, 3, 4, 'william st', '2010-11-09'),
(4, 4, 4, 'james  st', '2010-11-09'),
(5, 3, 5, 'epping', '2010-11-09'),
(6, 3, 5, 'south morang', '2010-11-09'),
(7, 5, 5, 'parkville', '2010-11-09');

-- --------------------------------------------------------

-- 
-- Table structure for table `cal_slots`
-- 

CREATE TABLE `cal_slots` (
  `id` int(11) NOT NULL auto_increment,
  `company` int(11) NOT NULL,
  `site` int(11) NOT NULL,
  `address` varchar(100) collate latin1_general_ci NOT NULL,
  `service` int(11) NOT NULL,
  `available` varchar(30) collate latin1_general_ci NOT NULL,
  `trading` varchar(30) collate latin1_general_ci NOT NULL,
  `start_time` time NOT NULL,
  `date` date NOT NULL,
  `persons` int(11) NOT NULL,
  `merid` varchar(2) collate latin1_general_ci NOT NULL,
  `date1` date NOT NULL,
  `place` varchar(200) collate latin1_general_ci NOT NULL,
  `sloot_time` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=11 ;

-- 
-- Dumping data for table `cal_slots`
-- 

INSERT INTO `cal_slots` (`id`, `company`, `site`, `address`, `service`, `available`, `trading`, `start_time`, `date`, `persons`, `merid`, `date1`, `place`, `sloot_time`) VALUES 
(1, 2, 1, 'yyyy', 1, '7', '9 to 5', '09:10:00', '2010-11-10', 8, 'AM', '2010-11-08', 'test', '2010-11-10 09:10:00'),
(5, 4, 3, '1/14 william st', 1, '7', '9-4', '09:00:00', '2010-11-18', 8, 'AM', '2010-11-09', 'lvl 4 rm 2.8', '2010-11-18 09:00:00'),
(6, 4, 3, '1/14 william st', 1, '8', '9-4', '09:15:00', '2010-11-18', 8, 'AM', '2010-11-09', 'lvl 4 rm 2.8', '2010-11-18 09:15:00'),
(8, 5, 5, 'epping', 1, '7', '9-12', '09:00:00', '2010-11-23', 8, 'AM', '2010-11-09', 'lvl 10', '2010-11-23 09:00:00'),
(9, 5, 5, 'epping', 1, '8', '9-12', '09:30:00', '2010-11-23', 8, 'AM', '2010-11-09', 'lvl 10', '2010-11-23 09:30:00'),
(10, 5, 6, 'south morang', 1, '8', '10-12', '10:00:00', '2010-11-24', 8, 'AM', '2010-11-09', 'lvl 8', '2010-11-24 10:00:00');

-- --------------------------------------------------------

-- 
-- Table structure for table `cal_state`
-- 

CREATE TABLE `cal_state` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(30) collate latin1_general_ci NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `cal_state`
-- 

INSERT INTO `cal_state` (`id`, `name`, `date`) VALUES 
(4, 'QLD', '2010-10-24'),
(3, 'VIC', '2010-10-24'),
(5, 'W.A', '2010-10-24');

-- --------------------------------------------------------

-- 
-- Table structure for table `cal_users`
-- 

CREATE TABLE `cal_users` (
  `user_id` int(11) NOT NULL auto_increment,
  `company_id` int(10) NOT NULL,
  `username` varchar(50) collate latin1_general_ci NOT NULL,
  `user_fname` varchar(50) collate latin1_general_ci NOT NULL,
  `user_lname` varchar(50) collate latin1_general_ci NOT NULL,
  `user_mail` varchar(100) collate latin1_general_ci NOT NULL,
  `password` varchar(20) collate latin1_general_ci NOT NULL,
  `user_phone` varchar(20) collate latin1_general_ci NOT NULL,
  `user_mobile` varchar(20) collate latin1_general_ci NOT NULL,
  `date` date NOT NULL,
  `bsb` varchar(50) collate latin1_general_ci NOT NULL,
  `business_unit` varchar(50) collate latin1_general_ci NOT NULL,
  `emp_id` varchar(50) collate latin1_general_ci NOT NULL,
  `division` varchar(100) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `cal_users`
-- 

INSERT INTO `cal_users` (`user_id`, `company_id`, `username`, `user_fname`, `user_lname`, `user_mail`, `password`, `user_phone`, `user_mobile`, `date`, `bsb`, `business_unit`, `emp_id`, `division`) VALUES 
(1, 2, '3oneuser', '3oneuser', '3oneuser', '3oneuser@yopmail.com', '3oneuser', '3423434', '324324324', '2010-11-08', '', '', '', ''),
(2, 5, 'anitagolob', 'anita', 'golob', 'anita@corporatehealth4life.com.au', 'anita', '94045868', '0408393368', '2010-11-09', '', '', '', ''),
(3, 5, 'webkos', 'Nick', 'Kos', 'nick@webkos.com.au', 'batman', '61390057718', '0411111111', '2010-11-11', '', '', '', '');

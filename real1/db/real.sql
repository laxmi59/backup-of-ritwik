-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 15, 2009 at 09:42 AM
-- Server version: 5.0.67
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `real`
--

-- --------------------------------------------------------

--
-- Table structure for table `real-area`
--

CREATE TABLE IF NOT EXISTS `real-area` (
  `aid` int(11) NOT NULL auto_increment,
  `cid` int(11) NOT NULL,
  `name` varchar(100) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`aid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=82 ;

--
-- Dumping data for table `real-area`
--

INSERT INTO `real-area` (`aid`, `cid`, `name`) VALUES
(1, 82, 'JagannayakPur'),
(2, 82, 'Ramarao pet'),
(3, 82, 'Temple Street'),
(4, 82, ' 100 Buildings Center '),
(5, 82, '50 Buildings Center'),
(6, 82, 'APSP'),
(7, 82, 'Ashok Nagar'),
(8, 82, 'Atchampet Junction'),
(9, 82, 'Ayodyanagar'),
(10, 82, 'Balaji Cheruvu'),
(11, 82, 'Beach Road'),
(12, 82, 'Bhanugudi Junction'),
(13, 82, 'Bhaskar Nagar'),
(14, 82, 'Big Market Street'),
(15, 82, 'Cheediga'),
(16, 82, 'Cinema Hall Road'),
(17, 82, 'Collectorate'),
(18, 82, 'Commercial Road'),
(19, 82, 'Court Office'),
(20, 82, 'Dairyform Center'),
(21, 82, 'Dummulapeta'),
(22, 82, 'Engineering College'),
(23, 82, 'Gaigolupadu'),
(24, 82, 'Gandhi Nagar'),
(25, 82, 'Gangaraju Nagar'),
(26, 82, 'Ganjamvari Street'),
(27, 82, 'Godari Gunta'),
(28, 82, 'Gold Market Center'),
(29, 82, 'Government Hospital'),
(30, 82, 'Indrapalem'),
(31, 82, 'J Ramaraopeta'),
(32, 82, 'Jawhar Street'),
(33, 82, 'Kacheripeta'),
(34, 82, 'Karnamgari Junction'),
(35, 82, 'Kondayyapalem'),
(36, 82, 'Kovvada'),
(37, 82, 'Madhavapatnam'),
(38, 82, 'Madura Nagar'),
(39, 82, 'Main Road'),
(40, 82, 'Majestic Street'),
(41, 82, 'MSN Chartis'),
(42, 82, 'Nagamallithota Junction'),
(43, 82, 'Narasannanagar'),
(44, 82, 'Nemam'),
(45, 82, 'NFCL Road'),
(46, 82, 'Ontimamidi Junction'),
(47, 82, 'P R College Road'),
(48, 82, 'Pallamraju Nagar'),
(49, 82, 'Panasapadu'),
(50, 82, 'Penumarthy Road'),
(51, 82, 'Port Railway Station'),
(52, 82, 'Postal Colony'),
(53, 82, 'Pratap Nagar'),
(54, 82, 'R R Road'),
(55, 82, 'Railway Station Road'),
(56, 82, 'Ramakrishnaraopeta'),
(57, 82, 'Ramanayyapeta'),
(58, 82, 'Rammohanraja Nagar'),
(59, 82, 'Rayudupalem'),
(60, 82, 'Recharlapeta'),
(61, 82, 'RTC Complex Road'),
(62, 82, 'RTO Office Road'),
(63, 82, 'S Atchutapuram'),
(64, 82, 'Salipeta'),
(65, 82, 'Sambhamurthynagar'),
(66, 82, 'Santhinagar'),
(67, 82, 'Sarpavaram Junction'),
(68, 82, 'Sasikanthnagar'),
(69, 82, 'Sri Nagar'),
(70, 82, 'Sriram Nagar'),
(71, 82, 'Suryanarayanapuram'),
(72, 82, 'Suryaraopet'),
(73, 82, 'Tammavaram'),
(74, 82, 'Tilak Street'),
(75, 82, 'Timmapuram'),
(76, 82, 'Turangi'),
(77, 82, 'Vakalapudi'),
(78, 82, 'Valasapakala'),
(79, 82, 'Venkat Nagar'),
(80, 82, 'Vidyut Nagar'),
(81, 82, 'Wharf Road');

-- --------------------------------------------------------

--
-- Table structure for table `real-city`
--

CREATE TABLE IF NOT EXISTS `real-city` (
  `cid` int(11) NOT NULL auto_increment,
  `cids` int(11) NOT NULL,
  `city_name` varchar(100) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=159 ;

--
-- Dumping data for table `real-city`
--

INSERT INTO `real-city` (`cid`, `cids`, `city_name`) VALUES
(1, 101, 'Ahmedabad'),
(2, 101, 'Bangalore'),
(3, 101, 'Chennai'),
(4, 101, 'Delhi'),
(5, 101, 'Gurgaon'),
(6, 101, 'Hyderabad'),
(7, 101, 'Kolkata'),
(8, 101, 'Mumbai'),
(9, 101, 'Noida'),
(10, 101, 'Pune'),
(11, 101, 'Agartala'),
(12, 101, 'Agra'),
(13, 101, 'Ahmednagar'),
(14, 101, 'Aizawal'),
(15, 101, 'Ajmer'),
(16, 101, 'Aligarh'),
(17, 101, 'Allahabad'),
(18, 101, 'Ambala'),
(19, 101, 'Amritsar'),
(20, 101, 'Anand'),
(21, 101, 'Ankleshwar'),
(22, 101, 'Asansol'),
(23, 101, 'Aurangabad'),
(24, 101, 'Bahgalpur'),
(25, 101, 'Bareilly'),
(26, 101, 'Baroda'),
(27, 101, 'Belgaum'),
(28, 101, 'Bellary'),
(29, 101, 'Bharuch'),
(30, 101, 'Bhatinda'),
(31, 101, 'Bhavanagar'),
(32, 101, 'Bharathidasan'),
(33, 101, 'Bhilaigarh'),
(34, 101, 'Bhopal'),
(35, 101, 'Bhubaneswar'),
(36, 101, 'Bhuj'),
(37, 101, 'Bidar'),
(38, 101, 'Billaspur'),
(39, 101, 'Bokaro'),
(40, 101, 'Calicut'),
(41, 101, 'Chandigarh'),
(42, 101, 'Coimbatore'),
(43, 101, 'Cuttack'),
(44, 101, 'Delhousie'),
(45, 101, 'Dhaman'),
(46, 101, 'Dehradun'),
(47, 101, 'Dhanbad'),
(48, 101, 'Dharmasala'),
(49, 101, 'Dharwad'),
(50, 101, 'Dispur'),
(51, 101, 'Durga pur'),
(52, 101, 'Ernakulam'),
(53, 101, 'Erode'),
(54, 101, 'Faizabad'),
(55, 101, 'Faridabad'),
(56, 101, 'Gandhinagar'),
(57, 101, 'Gangtok'),
(58, 101, 'Ghaziabad'),
(59, 101, 'Goa'),
(60, 101, 'Gorakhpur'),
(61, 101, 'Gulbarga'),
(62, 101, 'Guntur'),
(63, 101, 'Guwahati'),
(64, 101, 'Gwalior'),
(65, 101, 'Hamirpur'),
(66, 101, 'Haldia'),
(67, 101, 'Hisar'),
(68, 101, 'Hosur'),
(69, 101, 'Hubli'),
(70, 101, 'Impal'),
(71, 101, 'Indore'),
(72, 101, 'Itanagar'),
(73, 101, 'Jabalpur'),
(74, 101, 'Jaipur'),
(75, 101, 'Jaiselmer'),
(76, 101, 'Jalander'),
(77, 101, 'Jalgaion'),
(78, 101, 'Jammu'),
(79, 101, 'Jamnagar'),
(80, 101, 'Jamshadpur'),
(81, 101, 'Jodhpur'),
(82, 101, 'Kakinada'),
(83, 101, 'Kandla'),
(84, 101, 'Kannur'),
(85, 101, 'Kanpur'),
(86, 101, 'Karnal'),
(87, 101, 'Kavarathi'),
(88, 101, 'Khargpur'),
(89, 101, 'Kochi'),
(90, 101, 'Kohima'),
(91, 101, 'Kolar'),
(92, 101, 'Kolhapur'),
(93, 101, 'Kolam'),
(94, 101, 'Kota'),
(95, 101, 'Kottayam'),
(96, 101, 'Kulu manali'),
(97, 101, 'Kurnool'),
(98, 101, 'Kurukshetra'),
(99, 101, 'Lucknow'),
(100, 101, 'Ludhiana'),
(101, 101, 'Madurai'),
(102, 101, 'Mangalore'),
(103, 101, 'Mathura'),
(104, 101, 'Meerut'),
(105, 101, 'Mohali'),
(106, 101, 'Moradabad'),
(107, 101, 'Mysore'),
(108, 101, 'Nagercoil'),
(109, 101, 'Nagpur'),
(110, 101, 'Nasik'),
(111, 101, 'Nellore'),
(112, 101, 'Nizamabad'),
(113, 101, 'Ooty'),
(114, 101, 'Pallakool'),
(115, 101, 'Panipat'),
(116, 101, 'Paradeep'),
(117, 101, 'Pathonkot'),
(118, 101, 'Patiala'),
(119, 101, 'Patna'),
(120, 101, 'Pondicherry'),
(121, 101, 'Porbandhar'),
(122, 101, 'Port blair'),
(123, 101, 'Puri'),
(124, 101, 'Quilion'),
(125, 101, 'Raipur'),
(126, 101, 'Rajahmundry'),
(127, 101, 'Rajkot'),
(128, 101, 'Ranchi'),
(129, 101, 'Rohtak'),
(130, 101, 'Roorkee'),
(131, 101, 'Salem'),
(132, 101, 'Shilling'),
(133, 101, 'Shimla'),
(134, 101, 'Sholapur'),
(135, 101, 'Silchar'),
(136, 101, 'Siliguri'),
(137, 101, 'Silvassa'),
(138, 101, 'Srinagar'),
(139, 101, 'Surat'),
(140, 101, 'Suratkal'),
(141, 101, 'Tanzavur'),
(142, 101, 'Thrissur'),
(143, 101, 'Tirunalveli'),
(144, 101, 'Tirupathi'),
(145, 101, 'Tiruvanthapuram'),
(146, 101, 'Trichy'),
(147, 101, 'Tuticorin'),
(148, 101, 'Udaipur'),
(149, 101, 'Ujjain'),
(150, 101, 'Vadodara'),
(151, 101, 'Valsad'),
(152, 101, 'Vapi'),
(153, 101, 'Varanasi'),
(154, 101, 'Vellore'),
(155, 101, 'Vijayawada'),
(156, 101, 'Visakhapatnam'),
(157, 101, 'Warangal');

-- --------------------------------------------------------

--
-- Table structure for table `real-city-old`
--

CREATE TABLE IF NOT EXISTS `real-city-old` (
  `cid` int(11) NOT NULL auto_increment,
  `city_name` varchar(100) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `real-city-old`
--

INSERT INTO `real-city-old` (`cid`, `city_name`) VALUES
(1, 'Kakinada'),
(2, 'Rajamundry');

-- --------------------------------------------------------

--
-- Table structure for table `real-countries`
--

CREATE TABLE IF NOT EXISTS `real-countries` (
  `cid` int(6) NOT NULL auto_increment,
  `value` varchar(250) NOT NULL default '',
  PRIMARY KEY  (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=248 ;

--
-- Dumping data for table `real-countries`
--

INSERT INTO `real-countries` (`cid`, `value`) VALUES
(1, 'Afghanistan'),
(2, 'Aringland Islands'),
(3, 'Albania'),
(4, 'Algeria'),
(5, 'American Samoa'),
(6, 'Andorra'),
(7, 'Angola'),
(8, 'Anguilla'),
(9, 'Antarctica'),
(10, 'Antigua and Barbuda'),
(11, 'Argentina'),
(12, 'Armenia'),
(13, 'Aruba'),
(14, 'Australia'),
(15, 'Austria'),
(16, 'Azerbaijan'),
(17, 'Bahamas'),
(18, 'Bahrain'),
(19, 'Bangladesh'),
(20, 'Barbados'),
(21, 'Belarus'),
(22, 'Belgium'),
(23, 'Belize'),
(24, 'Benin'),
(25, 'Bermuda'),
(26, 'Bhutan'),
(27, 'Bolivia'),
(28, 'Bosnia and Herzegovina'),
(29, 'Botswana'),
(30, 'Bouvet Island'),
(31, 'Brazil'),
(32, 'British Indian Ocean territory'),
(33, 'Brunei Darussalam'),
(34, 'Bulgaria'),
(35, 'Burkina Faso'),
(36, 'Burundi'),
(37, 'Cambodia'),
(38, 'Cameroon'),
(39, 'Canada'),
(40, 'Cape Verde'),
(41, 'Cayman Islands'),
(42, 'Central African Republic'),
(43, 'Chad'),
(44, 'Chile'),
(45, 'China'),
(46, 'Christmas Island'),
(47, 'Cocos (Keeling) Islands'),
(48, 'Colombia'),
(49, 'Comoros'),
(50, 'Congo'),
(51, 'Congo'),
(52, ' Democratic Republic'),
(53, 'Cook Islands'),
(54, 'Costa Rica'),
(55, 'Ivory Coast (Ivory Coast)'),
(56, 'Croatia (Hrvatska)'),
(57, 'Cuba'),
(58, 'Cyprus'),
(59, 'Czech Republic'),
(60, 'Denmark'),
(61, 'Djibouti'),
(62, 'Dominica'),
(63, 'Dominican Republic'),
(64, 'East Timor'),
(65, 'Ecuador'),
(66, 'Egypt'),
(67, 'El Salvador'),
(68, 'Equatorial Guinea'),
(69, 'Eritrea'),
(70, 'Estonia'),
(71, 'Ethiopia'),
(72, 'Falkland Islands'),
(73, 'Faroe Islands'),
(74, 'Fiji'),
(75, 'Finland'),
(76, 'France'),
(77, 'French Guiana'),
(78, 'French Polynesia'),
(79, 'French Southern Territories'),
(80, 'Gabon'),
(81, 'Gambia'),
(82, 'Georgia'),
(83, 'Germany'),
(84, 'Ghana'),
(85, 'Gibraltar'),
(86, 'Greece'),
(87, 'Greenland'),
(88, 'Grenada'),
(89, 'Guadeloupe'),
(90, 'Guam'),
(91, 'Guatemala'),
(92, 'Guinea'),
(93, 'Guinea-Bissau'),
(94, 'Guyana'),
(95, 'Haiti'),
(96, 'Heard and McDonald Islands'),
(97, 'Honduras'),
(98, 'Hong Kong'),
(99, 'Hungary'),
(100, 'Iceland'),
(101, 'India'),
(102, 'Indonesia'),
(103, 'Iran'),
(104, 'Iraq'),
(105, 'Ireland'),
(106, 'Israel'),
(107, 'Italy'),
(108, 'Jamaica'),
(109, 'Japan'),
(110, 'Jordan'),
(111, 'Kazakhstan'),
(112, 'Kenya'),
(113, 'Kiribati'),
(114, 'Korea (north)'),
(115, 'Korea (south)'),
(116, 'Kuwait'),
(117, 'Kyrgyzstan'),
(118, 'Lao People''s Democratic Republic'),
(119, 'Latvia'),
(120, 'Lebanon'),
(121, 'Lesotho'),
(122, 'Liberia'),
(123, 'Libyan Arab Jamahiriya'),
(124, 'Liechtenstein'),
(125, 'Lithuania'),
(126, 'Luxembourg'),
(127, 'Macao'),
(128, 'Macedonia'),
(129, 'Madagascar'),
(130, 'Malawi'),
(131, 'Malaysia'),
(132, 'Maldives'),
(133, 'Mali'),
(134, 'Malta'),
(135, 'Marshall Islands'),
(136, 'Martinique'),
(137, 'Mauritania'),
(138, 'Mauritius'),
(139, 'Mayotte'),
(140, 'Mexico'),
(141, 'Micronesia'),
(142, 'Moldova'),
(143, 'Monaco'),
(144, 'Mongolia'),
(145, 'Montserrat'),
(146, 'Morocco'),
(147, 'Mozambique'),
(148, 'Myanmar'),
(149, 'Namibia'),
(150, 'Nauru'),
(151, 'Nepal'),
(152, 'Netherlands'),
(153, 'Netherlands Antilles'),
(154, 'New Caledonia'),
(155, 'New Zealand'),
(156, 'Nicaragua'),
(157, 'Niger'),
(158, 'Nigeria'),
(159, 'Niue'),
(160, 'Norfolk Island'),
(161, 'Northern Mariana Islands'),
(162, 'Norway'),
(163, 'Oman'),
(164, 'Pakistan'),
(165, 'Palau'),
(166, 'Palestinian Territories'),
(167, 'Panama'),
(168, 'Papua New Guinea'),
(169, 'Paraguay'),
(170, 'Peru'),
(171, 'Philippines'),
(172, 'Pitcairn'),
(173, 'Poland'),
(174, 'Portugal'),
(175, 'Puerto Rico'),
(176, 'Qatar'),
(177, 'Runion'),
(178, 'Romania'),
(179, 'Russian Federation'),
(180, 'Rwanda'),
(181, 'Saint Helena'),
(182, 'Saint Kitts and Nevis'),
(183, 'Saint Lucia'),
(184, 'Saint Pierre and Miquelon'),
(185, 'Saint Vincent and the Grenadines'),
(186, 'Samoa'),
(187, 'San Marino'),
(188, 'Sao Tome and Principe'),
(189, 'Saudi Arabia'),
(190, 'Senegal'),
(191, 'Serbia and Montenegro'),
(192, 'Seychelles'),
(193, 'Sierra Leone'),
(194, 'Singapore'),
(195, 'Slovakia'),
(196, 'Slovenia'),
(197, 'Solomon Islands'),
(198, 'Somalia'),
(199, 'South Africa'),
(200, 'South Georgia and the South Sandwich Islands'),
(201, 'Spain'),
(202, 'Sri Lanka'),
(203, 'Sudan'),
(204, 'Suriname'),
(205, 'Svalbard and Jan Mayen Islands'),
(206, 'Swaziland'),
(207, 'Sweden'),
(208, 'Switzerland'),
(209, 'Syria'),
(210, 'Taiwan'),
(211, 'Tajikistan'),
(212, 'Tanzania'),
(213, 'Thailand'),
(214, 'Togo'),
(215, 'Tokelau'),
(216, 'Tonga'),
(217, 'Trinidad and Tobago'),
(218, 'Tunisia'),
(219, 'Turkey'),
(220, 'Turkmenistan'),
(221, 'Turks and Caicos Islands'),
(222, 'Tuvalu'),
(223, 'Uganda'),
(224, 'Ukraine'),
(225, 'United Arab Emirates'),
(226, 'United Kingdom'),
(227, 'United States of America'),
(228, 'Uruguay'),
(229, 'Uzbekistan'),
(230, 'Vanuatu'),
(231, 'Vatican City'),
(232, 'Venezuela'),
(233, 'Vietnam'),
(234, 'Virgin Islands (British)'),
(235, 'Virgin Islands (US)'),
(236, 'Wallis and Futuna Islands'),
(237, 'Western Sahara'),
(238, 'Yemen'),
(239, 'Zaire'),
(240, 'Zambia'),
(241, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `real-features`
--

CREATE TABLE IF NOT EXISTS `real-features` (
  `fid` int(11) NOT NULL auto_increment,
  `name` varchar(100) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`fid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `real-features`
--

INSERT INTO `real-features` (`fid`, `name`) VALUES
(1, 'Power Backup'),
(2, 'Lift'),
(3, 'Rain Water Harvesting'),
(4, 'Club'),
(5, 'Swimming Pool'),
(6, 'Security'),
(7, 'Reserved Parking'),
(8, 'Gym'),
(9, 'Servant Quarters'),
(10, 'Park'),
(11, 'Vaastu Compliant');

-- --------------------------------------------------------

--
-- Table structure for table `real-list`
--

CREATE TABLE IF NOT EXISTS `real-list` (
  `list_id` int(11) NOT NULL auto_increment,
  `r_id` int(11) NOT NULL,
  `list_gid` varchar(10) collate latin1_general_ci NOT NULL,
  `list_type` varchar(10) collate latin1_general_ci NOT NULL,
  `list_property` varchar(100) collate latin1_general_ci NOT NULL,
  `list_project` varchar(100) collate latin1_general_ci NOT NULL,
  `list_country` varchar(100) collate latin1_general_ci NOT NULL,
  `list_city` varchar(100) collate latin1_general_ci NOT NULL,
  `list_location` varchar(100) collate latin1_general_ci NOT NULL,
  `list_lat` decimal(10,7) NOT NULL,
  `list_lng` decimal(10,7) NOT NULL,
  `list_area` varchar(50) collate latin1_general_ci NOT NULL,
  `list_price` int(11) NOT NULL,
  `list_pricing` varchar(5) collate latin1_general_ci NOT NULL,
  `list_bedroom` int(11) NOT NULL,
  `list_floor_no` int(11) NOT NULL,
  `list_floors` int(11) NOT NULL,
  `list_age` int(11) NOT NULL,
  `list_items` varchar(50) collate latin1_general_ci NOT NULL,
  `list_face` varchar(20) collate latin1_general_ci NOT NULL,
  `list_own` varchar(50) collate latin1_general_ci NOT NULL,
  `list_features` varchar(100) collate latin1_general_ci NOT NULL,
  `list_desc` text collate latin1_general_ci NOT NULL,
  `list_date` date NOT NULL,
  `list_status` varchar(2) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`list_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `real-list`
--

INSERT INTO `real-list` (`list_id`, `r_id`, `list_gid`, `list_type`, `list_property`, `list_project`, `list_country`, `list_city`, `list_location`, `list_lat`, `list_lng`, `list_area`, `list_price`, `list_pricing`, `list_bedroom`, `list_floor_no`, `list_floors`, `list_age`, `list_items`, `list_face`, `list_own`, `list_features`, `list_desc`, `list_date`, `list_status`) VALUES
(1, 2, 'LS67692', '1', '2', 'abc', 'India', 'Kakinada', 'mayuri', 16.9514677, 82.2368503, '24/30', 100000, 'yes', 2, 11, 2, 1, 'furnished', 'East', '1', '1,4', 'sdfsdfsdf', '2009-06-05', 'n'),
(2, 2, 'LS25736', '1', '2', 'abcd', 'India', 'kakinada', 'banugudi', 16.9695443, 82.2369371, '24/30', 10000, 'yes', 2, 11, 1, 1, 'furnished', 'North East', '1', '1,4', 'dsfdsf', '2009-06-05', 'n'),
(3, 4, 'LS67174', '1', '2', 'abc', 'India', 'kakinada', 'temple street', 16.9469828, 82.2319472, '24/30', 100000, 'yes', 2, 11, 3, 1, 'furnished', 'East', '1', '1,2', 'asdfadsf', '2009-06-09', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `real-list1`
--

CREATE TABLE IF NOT EXISTS `real-list1` (
  `list_id` int(11) NOT NULL auto_increment,
  `r_id` int(11) NOT NULL,
  `list_gid` varchar(10) collate latin1_general_ci NOT NULL,
  `list_type` varchar(10) collate latin1_general_ci NOT NULL,
  `list_property` varchar(100) collate latin1_general_ci NOT NULL,
  `list_project` varchar(100) collate latin1_general_ci NOT NULL,
  `list_country` varchar(100) collate latin1_general_ci NOT NULL,
  `list_city` varchar(100) collate latin1_general_ci NOT NULL,
  `list_location` varchar(100) collate latin1_general_ci NOT NULL,
  `list_lat` decimal(10,7) NOT NULL,
  `list_lng` decimal(10,7) NOT NULL,
  `list_area` varchar(50) collate latin1_general_ci NOT NULL,
  `list_price` int(11) NOT NULL,
  `list_pricing` varchar(5) collate latin1_general_ci NOT NULL,
  `list_bedroom` int(11) NOT NULL,
  `list_floor_no` int(11) NOT NULL,
  `list_floors` int(11) NOT NULL,
  `list_age` int(11) NOT NULL,
  `list_items` varchar(50) collate latin1_general_ci NOT NULL,
  `list_face` varchar(20) collate latin1_general_ci NOT NULL,
  `list_own` varchar(50) collate latin1_general_ci NOT NULL,
  `list_features` varchar(100) collate latin1_general_ci NOT NULL,
  `list_desc` text collate latin1_general_ci NOT NULL,
  `list_date` date NOT NULL,
  `list_status` varchar(2) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`list_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `real-list1`
--

INSERT INTO `real-list1` (`list_id`, `r_id`, `list_gid`, `list_type`, `list_property`, `list_project`, `list_country`, `list_city`, `list_location`, `list_lat`, `list_lng`, `list_area`, `list_price`, `list_pricing`, `list_bedroom`, `list_floor_no`, `list_floors`, `list_age`, `list_items`, `list_face`, `list_own`, `list_features`, `list_desc`, `list_date`, `list_status`) VALUES
(1, 2, 'LS87831', '3', '2', 'sdfa1', 'asfsdf1', '1', '1', 0.0000000, 0.0000000, '301', 1001, 'yes', 3, 9, 9, 1, 'furnished', 'East', '3', '1,2,6,10', 'asfasdfsfsdfa1', '2009-02-24', 'a'),
(2, 2, 'LS37857', '3', '3', 'abc1', 'abc2', '1', '2', 0.0000000, 0.0000000, '20', 100, 'yes', 3, 12, 3, 1, 'semi', 'North East', '3', '1,2,3', 'asdfsdfadsfasdfasdf', '2009-02-24', 'a'),
(3, 2, 'LS63486', '1', '3', 'asdfsd', 'sfasdf', '1', '2', 0.0000000, 0.0000000, 'sfds', 32, 'yes', 2, 11, 4, 1, 'furnished', 'East', '1', '1,4,7,10', 'dsfsdfasfsdfdsf', '2009-03-18', 'd'),
(4, 2, 'LS36925', '1', '2', 'sdfa', 'asfsd', '1', '2', 0.0000000, 0.0000000, 'asfd', 324324, 'yes', 1, 13, 2, 1, 'furnished', 'North', '1', '1,2,7,10', 'asfadsfasfsdf', '2009-03-18', 'n'),
(5, 2, 'LS61811', '1', '3', 'sdfasd', 'India', '0', '0', 18.8768986, 79.4369841, '34', 34324, 'yes', 4, 13, 4, 2, 'semi', 'North West', '2', '1,2,5,7', 'asdfasfasdf', '2009-06-04', 'n'),
(6, 0, 'LS67527', '1', '2', 'abc', 'India', '0', '0', 16.9514677, 82.2368503, '34', 234234, '', 2, 12, 2, 2, 'semi', 'North East', '2', '4,7', 'sdafsdfasdf', '2009-06-04', 'n'),
(7, 0, 'LS27418', '1', '4', 'safsdf', 'India', '0', '0', 16.9695443, 82.2369371, '34', 234234, 'yes', 2, 6, 2, 5, 'semi', 'North East', '3', '4,7,10', 'sdfasfasdf', '2009-06-04', 'n'),
(8, 2, 'LS25253', '1', '2', 'abc', 'India', 'kakinada', 'mayuri', 16.9514677, 82.2368503, '24', 33434, 'yes', 2, 11, 3, 1, 'furnished', 'East', '1', '1,4', 'sdfsdf', '2009-06-05', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `real-property`
--

CREATE TABLE IF NOT EXISTS `real-property` (
  `pid` int(11) NOT NULL auto_increment,
  `pname` varchar(100) collate latin1_general_ci NOT NULL,
  `ptype` int(11) NOT NULL,
  `p_group` varchar(5) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `real-property`
--

INSERT INTO `real-property` (`pid`, `pname`, `ptype`, `p_group`) VALUES
(1, ' Residential Properties', 0, '1'),
(2, 'Apartment', 1, ''),
(3, 'Plot/Land', 1, ''),
(4, 'Builder Floor', 1, ''),
(5, 'Bungalow/Villa', 1, ''),
(6, 'Farm House', 1, ''),
(7, 'Service/Studio Apartment', 1, ''),
(8, 'Other Residential', 1, ''),
(9, 'Commercial Properties', 0, '2'),
(10, 'Land', 2, ''),
(11, 'Office', 2, ''),
(12, 'Business Centre', 2, ''),
(13, 'Warehouse/Godown', 2, ''),
(14, 'Industrial setup', 2, ''),
(15, 'Shop', 2, ''),
(16, 'Other Commercial', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `real-property1`
--

CREATE TABLE IF NOT EXISTS `real-property1` (
  `pid` int(11) NOT NULL auto_increment,
  `pname` varchar(100) collate latin1_general_ci NOT NULL,
  `ptype` int(11) NOT NULL,
  PRIMARY KEY  (`pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `real-property1`
--

INSERT INTO `real-property1` (`pid`, `pname`, `ptype`) VALUES
(1, 'Apartment', 1),
(2, 'Plot/Land', 1),
(3, 'Builder Floor', 1),
(4, 'Bungalow/Villa', 1),
(5, 'Farm House', 1),
(6, 'Service/Studio Apartment', 1),
(7, 'Other Residential', 1),
(8, 'Land', 2),
(9, 'Office', 2),
(10, 'Business Centre', 2),
(11, 'Warehouse/Godown', 2),
(12, 'Industrial setup', 2),
(13, 'Shop', 2),
(14, 'Other Commercial', 2);

-- --------------------------------------------------------

--
-- Table structure for table `real-reg`
--

CREATE TABLE IF NOT EXISTS `real-reg` (
  `r_id` int(11) NOT NULL auto_increment,
  `r_un` varchar(50) collate latin1_general_ci NOT NULL,
  `r_pw` varchar(50) collate latin1_general_ci NOT NULL,
  `r_name` varchar(100) collate latin1_general_ci NOT NULL,
  `r_cname` varchar(100) collate latin1_general_ci NOT NULL,
  `r_addr` varchar(100) collate latin1_general_ci NOT NULL,
  `r_web` varchar(100) collate latin1_general_ci NOT NULL,
  `country` varchar(100) collate latin1_general_ci NOT NULL,
  `location` varchar(100) collate latin1_general_ci NOT NULL,
  `r_email` varchar(50) collate latin1_general_ci NOT NULL,
  `r_ph1` int(11) NOT NULL,
  `r_ph2` int(11) NOT NULL,
  `r_type` varchar(5) collate latin1_general_ci NOT NULL,
  `sent1` varchar(5) collate latin1_general_ci NOT NULL,
  `sent2` varchar(5) collate latin1_general_ci NOT NULL,
  `r_date` date NOT NULL,
  `r_income` varchar(50) collate latin1_general_ci NOT NULL,
  `r_img` varchar(100) collate latin1_general_ci NOT NULL,
  `r_status` varchar(5) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`r_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `real-reg`
--

INSERT INTO `real-reg` (`r_id`, `r_un`, `r_pw`, `r_name`, `r_cname`, `r_addr`, `r_web`, `country`, `location`, `r_email`, `r_ph1`, `r_ph2`, `r_type`, `sent1`, `sent2`, `r_date`, `r_income`, `r_img`, `r_status`) VALUES
(1, 'admin', 'admin', 'admin', '', '', '', '101', '82', 'rama.3one@gmail.com', 32424, 23423, 'a', '', '', '2009-03-14', '', '', 'admin'),
(2, 'rama', 'rama', 'rama', 'rama', 'rama', 'rama', '101', '6', 'rama.kotni@gmail.com', 34234, 0, '1', '', '', '2009-03-16', 'Less Than 2 Lac', '', 'a'),
(4, 'laxmi', '123456', 'laxmi', '', '', '', '101', '82', 'rama.kotni@gmail.com', 1111111, 0, '1', 'on', '', '2009-06-09', '', '', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `real-requirement`
--

CREATE TABLE IF NOT EXISTS `real-requirement` (
  `req_id` int(11) NOT NULL auto_increment,
  `r_id` int(11) NOT NULL,
  `req_type` varchar(5) collate latin1_general_ci NOT NULL,
  `req_property` varchar(50) collate latin1_general_ci NOT NULL,
  `req_city` varchar(100) collate latin1_general_ci NOT NULL,
  `req_area` varchar(100) collate latin1_general_ci NOT NULL,
  `req_bedroom` int(11) NOT NULL,
  `req_budject1` int(11) NOT NULL,
  `req_budject2` int(11) NOT NULL,
  `req_place` int(11) NOT NULL,
  `req_time` int(11) NOT NULL,
  `req_loan` varchar(5) collate latin1_general_ci NOT NULL,
  `req_loan_amt` int(11) NOT NULL,
  `req_job` varchar(50) collate latin1_general_ci NOT NULL,
  `req_income` int(11) NOT NULL,
  `req_name` varchar(50) collate latin1_general_ci NOT NULL,
  `req_ph1` int(11) NOT NULL,
  `req_ph2` int(11) NOT NULL,
  `req_email` varchar(50) collate latin1_general_ci NOT NULL,
  `req_floder` varchar(50) collate latin1_general_ci NOT NULL,
  `req_date` date NOT NULL,
  `req_status` varchar(2) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`req_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `real-requirement`
--

INSERT INTO `real-requirement` (`req_id`, `r_id`, `req_type`, `req_property`, `req_city`, `req_area`, `req_bedroom`, `req_budject1`, `req_budject2`, `req_place`, `req_time`, `req_loan`, `req_loan_amt`, `req_job`, `req_income`, `req_name`, `req_ph1`, `req_ph2`, `req_email`, `req_floder`, `req_date`, `req_status`) VALUES
(1, 2, '1', '4', 'Kakinada', 'temple street', 2, 5000, 10000, 0, 2, 'yes', 10000, 'Salaried', 0, 'rama', 11111, 22222, 'rama', 'rama', '2009-02-21', 'a'),
(2, 2, '1', '2', 'Kakinada', 'temple street', 2, 10000, 15000, 100, 3, 'yes', 10000, 'Self Employed', 10000, 'sfa', 0, 0, 'sdfasd', 'asdfsdf', '2009-02-21', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `real_builders`
--

CREATE TABLE IF NOT EXISTS `real_builders` (
  `build_id` int(11) NOT NULL auto_increment,
  `build_city` varchar(100) NOT NULL,
  `build_img` varchar(200) NOT NULL,
  `buid_date` date NOT NULL,
  PRIMARY KEY  (`build_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `real_builders`
--

INSERT INTO `real_builders` (`build_id`, `build_city`, `build_img`, `buid_date`) VALUES
(1, 'kakinada', '3one1.JPG', '2009-06-08'),
(2, 'kakinada', '3one1.JPG', '2009-06-08'),
(3, 'kakinada', '3one1.JPG', '2009-06-08'),
(4, 'kakinada', '3one.JPG', '2009-06-08'),
(5, 'kkd', '3one1.JPG', '2009-06-08');

-- --------------------------------------------------------

--
-- Table structure for table `real_projects`
--

CREATE TABLE IF NOT EXISTS `real_projects` (
  `proj_id` int(11) NOT NULL auto_increment,
  `proj_city` varchar(100) NOT NULL,
  `proj_img` varchar(200) NOT NULL,
  `proj_date` date NOT NULL,
  PRIMARY KEY  (`proj_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `real_projects`
--

INSERT INTO `real_projects` (`proj_id`, `proj_city`, `proj_img`, `proj_date`) VALUES
(1, 'kakinada', '3one1.JPG', '2009-06-08'),
(2, 'kakinada', '3one1.JPG', '2009-06-08'),
(3, 'kakinada', '3one1.JPG', '2009-06-08'),
(4, 'kakinada', '3one1.JPG', '2009-06-08'),
(5, 'kakinada', '3one1.JPG', '2009-06-08');

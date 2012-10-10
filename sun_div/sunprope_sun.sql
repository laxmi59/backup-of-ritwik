-- phpMyAdmin SQL Dump
-- version 2.11.9.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 22, 2009 at 05:47 AM
-- Server version: 5.0.77
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sunprope_sun`
--

-- --------------------------------------------------------

--
-- Table structure for table `real-admin`
--

CREATE TABLE IF NOT EXISTS `real-admin` (
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
-- Dumping data for table `real-admin`
--

INSERT INTO `real-admin` (`r_id`, `r_un`, `r_pw`, `r_name`, `r_cname`, `r_addr`, `r_web`, `country`, `location`, `r_email`, `r_ph1`, `r_ph2`, `r_type`, `sent1`, `sent2`, `r_date`, `r_income`, `r_img`, `r_status`) VALUES
(1, 'admin', 'admin', 'admin', '', '', '', '101', '82', 'rama.3one@gmail.com', 32424, 23423, 'a', '', '', '2009-03-14', '', '', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `real-area`
--

CREATE TABLE IF NOT EXISTS `real-area` (
  `aid` int(11) NOT NULL auto_increment,
  `cid` int(11) NOT NULL,
  `name` varchar(100) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`aid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=83 ;

--
-- Dumping data for table `real-area`
--

INSERT INTO `real-area` (`aid`, `cid`, `name`) VALUES
(1, 1, 'JagannayakPur'),
(2, 1, 'Ramarao pet'),
(3, 1, 'Temple Street'),
(4, 1, ' 100 Buildings Center '),
(5, 1, '50 Buildings Center'),
(6, 1, 'APSP'),
(7, 1, 'Ashok Nagar'),
(8, 1, 'Atchampet Junction'),
(9, 1, 'Ayodyanagar'),
(10, 1, 'Balaji Cheruvu'),
(11, 1, 'Beach Road'),
(12, 1, 'Bhanugudi Junction'),
(13, 1, 'Bhaskar Nagar'),
(14, 1, 'Big Market Street'),
(15, 1, 'Cheediga'),
(16, 1, 'Cinema Road'),
(17, 1, 'Collectorate'),
(18, 1, 'Commercial Road'),
(19, 1, 'Court Office'),
(20, 1, 'Dairyform Center'),
(21, 1, 'Dummulapeta'),
(22, 1, 'Engineering College'),
(23, 1, 'Gaigolupadu'),
(24, 1, 'Gandhi Nagar'),
(25, 1, 'Gangaraju Nagar'),
(26, 1, 'Ganjamvari Street'),
(27, 1, 'Godari Gunta'),
(28, 1, 'Gold Market Center'),
(29, 1, 'Government Hospital'),
(30, 1, 'Indrapalem'),
(31, 1, 'J Ramaraopeta'),
(32, 1, 'Jawhar Street'),
(33, 1, 'Kacheripeta'),
(34, 1, 'Karnamgari Junction'),
(35, 1, 'Kondayyapalem'),
(36, 1, 'Kovvada'),
(37, 1, 'Madhavapatnam'),
(38, 1, 'Madura Nagar'),
(39, 1, 'Main Road'),
(40, 1, 'Majestic Street'),
(41, 1, 'MSN Chartis'),
(42, 1, 'Nagamallithota Junction'),
(43, 1, 'Narasannanagar'),
(44, 1, 'Nemam'),
(45, 1, 'NFCL Road'),
(46, 1, 'Ontimamidi Junction'),
(47, 1, 'P R College Road'),
(48, 1, 'Pallamraju Nagar'),
(49, 1, 'Panasapadu'),
(50, 1, 'Penumarthy Road'),
(51, 1, 'Port Railway Station'),
(52, 1, 'Postal Colony'),
(53, 1, 'Pratap Nagar'),
(54, 1, 'R R Road'),
(55, 1, 'Railway Station Road'),
(56, 1, 'Ramakrishnaraopeta'),
(57, 1, 'Ramanayyapeta'),
(58, 1, 'Rammohanraja Nagar'),
(59, 1, 'Rayudupalem'),
(60, 1, 'Recharlapeta'),
(61, 1, 'RTC Complex Road'),
(62, 1, 'RTO Office Road'),
(63, 1, 'S Atchutapuram'),
(64, 1, 'Salipeta'),
(65, 1, 'Sambhamurthynagar'),
(66, 1, 'Santhinagar'),
(67, 1, 'Sarpavaram Junction'),
(68, 1, 'Sasikanthnagar'),
(69, 1, 'Sri Nagar'),
(70, 1, 'Sriram Nagar'),
(71, 1, 'Suryanarayanapuram'),
(72, 1, 'Suryaraopet'),
(73, 1, 'Tammavaram'),
(74, 1, 'Tilak Street'),
(75, 1, 'Timmapuram'),
(76, 1, 'Turangi'),
(77, 1, 'Vakalapudi'),
(78, 1, 'Valasapakala'),
(79, 1, 'Venkat Nagar'),
(80, 1, 'Vidyut Nagar'),
(81, 1, 'Wharf Road'),
(82, 1, 'Naga Vanam');

-- --------------------------------------------------------

--
-- Table structure for table `real-city`
--

CREATE TABLE IF NOT EXISTS `real-city` (
  `cid` int(11) NOT NULL auto_increment,
  `cids` int(11) NOT NULL,
  `city_name` varchar(100) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `real-city`
--

INSERT INTO `real-city` (`cid`, `cids`, `city_name`) VALUES
(1, 0, 'Kakinada');

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
  `post_by` varchar(10) collate latin1_general_ci NOT NULL,
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=174 ;

--
-- Dumping data for table `real-list`
--

INSERT INTO `real-list` (`list_id`, `r_id`, `post_by`, `list_gid`, `list_type`, `list_property`, `list_project`, `list_country`, `list_city`, `list_location`, `list_lat`, `list_lng`, `list_area`, `list_price`, `list_pricing`, `list_bedroom`, `list_floor_no`, `list_floors`, `list_age`, `list_items`, `list_face`, `list_own`, `list_features`, `list_desc`, `list_date`, `list_status`) VALUES
(1, 1, 'user', 'LS29591', '3', '2', '', 'India', 'Kakinada', 'Temple Street', 16.9469828, 82.2319472, '222', 0, '', 0, 0, 0, 0, 'select', '', 'select', '', '', '2009-07-01', 'n'),
(2, 1, 'user', 'LS88118', '3', '3', '', 'India', 'Kakinada', 'Ramarao pet', 16.9580459, 82.2354180, '333', 0, 'yes', 3, 0, 0, 0, 'select', 'North West', '2', '', 'adwad', '2009-07-01', 'a'),
(3, 1, 'user', 'LS34344', '3', '6', '', 'India', 'Kakinada', 'R R Road', 16.9821198, 82.2494888, '333', 0, 'yes', 0, 0, 0, 0, 'select', 'West', '1', '', '333 sq yard house with west facing with car parking and fully designid with altak.in rr road near kapu kalyana mandapam in kakinada', '2009-07-01', 'a'),
(4, 1, 'user', 'LS47756', '3', '5', '', 'India', 'Kakinada', 'Madura Nagar', 16.9695443, 82.2369371, '101', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', '101 sq yards New building in good residential area at madura nagar. near gokulam, kakinada.', '2009-07-01', 'a'),
(5, 1, 'user', 'LS15132', '3', '5', '', 'India', 'Kakinada', 'Vidyut Nagar', 16.9847979, 82.2316468, '45*70', 0, 'yes', 0, 0, 0, 0, 'select', 'East', '1', '', '350 sq yards building with east facing and clear documentaion.SBI colony vidyut nagar.\r\nHighlights: Park view site, DTC approval', '2009-07-01', 'a'),
(6, 0, 'admin', 'LS89667', '3', '2', 'dsf', 'India', 'Kakinada', 'Temple Street', 16.9469828, 82.2319472, '24/30', 0, 'yes', 0, 0, 0, 0, 'select', 'East', '1', '', 'asdfasdf\r\nasdfsdf\r\nasdfsd', '2009-07-03', 'a'),
(7, 0, 'admin', 'LS99943', '3', '7', 'dsfds', 'India', 'Kakinada', 'APSP', 17.0082753, 82.2515393, '50*40', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'sdfdsfsdfsdf\r\nsdfdsf\r\nsdfsdf\r\ndsfdsf', '2009-07-04', 'a'),
(8, 0, 'admin', 'LS95354', '3', '3', 'DTCP APPROVED PLOTS WITH CLEAR TITLE', 'India', 'Kakinada', 'Sarpavaram Junction', 16.9695443, 82.2369371, '1800 TO 6000 PER SQ Y', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'DTCP PLOT IN JCH LAYOUTS AT KAKINADA\r\nnear maduranagar\r\nsarpavaram road\r\ntimmapuram back dide\r\nnear kiran eye hospital\r\nachampeta', '2009-07-07', 'a'),
(9, 0, 'admin', 'LS35458', '3', '3', '', 'India', 'Kakinada', 'Vidyut Nagar', 16.9847979, 82.2316468, '45 X 70 = 350 SQ yards ', 0, 'yes', 0, 0, 0, 0, 'select', 'East', 'select', '10', 'Offered: SBI Colony\r\nVyduguth nagar bank colony\r\n\r\nD.T.C approval\r\n45 X 70 = 350 SQ yards ( East facing )\r\n\r\nWith up – Star Building\r\n\r\nClear Documents\r\n\r\nHigh light : Park View site\r\n\r\n', '2009-07-07', 'a'),
(10, 0, 'admin', 'LS55594', '3', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '45 X 70 = 350 SQ yards', 0, 'yes', 0, 0, 0, 0, 'select', 'East', 'select', '10', 'Offered: SBI Colony\r\nVyduguth nagar bank colony\r\n\r\nD.T.C approval\r\n45 X 70 = 350 SQ yards ( East facing )\r\n\r\nWith up – Star Building\r\n\r\nClear Documents\r\n\r\nHigh light : Park View site\r\n', '2009-07-07', 'a'),
(11, 0, 'admin', 'LS35876', '3', '2', '', 'India', 'kakinada', 'Bhanugudi Junction', 16.9697142, 82.2384300, '', 0, 'yes', 2, 14, 0, 0, 'select', '', 'select', '', 'Offered: 3 Shops Commercial Property\r\none mini shop one 2 bed room flat up star 3 bed flat\r\nlocation : Near Bhanugudi Junction\r\n\r\n', '2009-07-07', 'a'),
(12, 0, 'admin', 'LS57186', '3', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '30 X 75 .....', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: Land : 250 SQ YARD land near Bank Of Maharashtra, Sarapavaram\r\n\r\nLength : 30 X 75 .....', '2009-07-07', 'a'),
(13, 0, 'admin', 'LS66845', '3', '3', '', 'India', 'Kakinada', 'Ashok Nagar', 16.9695443, 82.2369371, '57 X 87 = 580 SQ yards', 0, 'yes', 0, 0, 0, 0, 'select', 'East', 'select', '', 'Offered: Near Ashok nagar Andhra Bank\r\n\r\n57 X 87 = 580 SQ yards\r\nEast Facing\r\nExcelent Location Top Residential Aria\r\n', '2009-07-07', 'a'),
(14, 0, 'admin', 'LS85532', '3', '3', '', 'India', 'Kakinada', 'Vakalapudi', 17.0028250, 82.2624037, '45 X 60 syd', 0, 'yes', 0, 0, 0, 0, 'select', 'South', 'select', '', 'Offered: Vakalapudi\r\nNear Cinema Hall\r\n45 X 60 syd\r\nSouth Face\r\n60” Feet Road\r\nHyd D.T.P Lay out\r\nClear Documents\r\n', '2009-07-07', 'a'),
(15, 0, 'admin', 'LS67692', '3', '3', '', 'India', 'Kakinada', 'Vidyut Nagar', 16.9847979, 82.2316468, '500 SQ Yards ', 0, 'yes', 0, 0, 0, 0, 'select', 'North East', 'select', '', ' Offered: SBI Colony\r\nVidyuth nagar bank colony\r\n500 SQ Yards North East Corner\r\nWith Building\r\n', '2009-07-07', 'a'),
(16, 0, 'admin', 'LS57136', '3', '3', '', 'India', 'Kakinada', 'Madura Nagar', 16.9695443, 82.2369371, '101 Sq Yards ', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', ' Offered: 101 Sq Yards\r\n600 STF\r\nNew Building\r\nMadhura Nagar\r\nNear Gokulam\r\nGOOD Residential aria\r\n', '2009-07-07', 'a'),
(17, 0, 'admin', 'LS79722', '3', '3', '', 'India', 'Kakinada', 'Bhanugudi Junction', 16.9697142, 82.2384300, '', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: Near Bhanugudi Jn…\r\nResidential Apartments …. ', '2009-07-07', 'a'),
(18, 0, 'admin', 'LS47527', '3', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '', 0, '', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: PLOTS IN KAKINADA RANGING FROM Rs.1,500/- PER SQ.YD TO Rs.20,000/- PER SQ.YD D.T.P.C LAYOUT APPROVED PLOTS EITHER FOR INVESTMENT OR FOR READY FOR CONSTRUCTION\r\nCHOICE IS YOURS,CONSULTANCY IS OURS\r\nYOU NAME IT AND YOU GOT IT', '2009-07-07', 'a'),
(19, 0, 'admin', 'LS84161', '3', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, ' 325 Square Yards', 0, 'yes', 0, 0, 0, 0, 'select', 'North West', 'select', '', 'Offered: 325 Square Yards North West Corner Plot for sale at V.S.Lakshmi College backside at reasonable rate ', '2009-07-07', 'a'),
(20, 0, 'admin', 'LS55694', '3', '3', '', 'India', 'Kakinada', 'Sambhamurthynagar', 16.9695443, 82.2369371, ' 418 Sqare Yards', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: 418 Sqare Yards plot for sale at Sambamurthy Nagar kakiandalease include a detailed description of the item including any accessories, warranty, age, defects, and payment requirements or information. For your own safety, please do not include any contact information. Your buyers will be able to email you from your ad.\r\n', '2009-07-07', 'a'),
(21, 0, 'admin', 'LS52126', '3', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, ' 325 Square Yards', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: 325 Square Yards plot for sale at V S lakshmi College back side', '2009-07-07', 'a'),
(22, 0, 'admin', 'LS71678', '3', '3', '', 'India', 'Kakinada', '', 16.9451810, 82.2386470, '500 SQUARE YARDS', 0, 'yes', 0, 0, 0, 0, 'select', 'North West', 'select', '', 'Offered: A RESIDENTIAL LAND OF 500 SQUARE YARDS IN POSH LOCALITY AT SIDDHARTHA NAGAR NEAR MILITARY CANTTEN WITH NORTH WEST ROADS FACING AT 4 LANES JUNCTION IS READY FOR IMMEDIATE SALE . ', '2009-07-07', 'a'),
(23, 0, 'admin', 'LS51262', '3', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '500 square yards', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: we are having a site of 500 square yards at siddhartha nagar .it is for sale interested people ', '2009-07-07', 'a'),
(24, 0, 'admin', 'LS59857', '3', '3', '', 'India', 'Kakinada', 'Sarpavaram Junction', 16.9695443, 82.2369371, '197 yards,', 0, 'yes', 2, 11, 0, 0, 'select', 'West', 'select', '', 'Offered: 197 yards, west facing 2 bed room individual building ar sarpavaram village, near sarpavaram panchayati office for sale', '2009-07-07', 'a'),
(25, 0, 'admin', 'LS93725', '3', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '300 sq y', 5500, 'yes', 0, 0, 0, 0, 'select', 'East', 'select', '', 'Offered: it is near achampeta jn\r\nEAST FACING PLOT\r\nRATE--5500 PER SQ Y', '2009-07-07', 'a'),
(26, 0, 'admin', 'LS63334', '3', '3', '', 'India', 'Kakinada', 'Ramarao pet', 16.9580459, 82.2354180, '', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '7', 'Offered: Apartment for sale in Heart of the town KKD at Ramarao pet Kakinada.\r\nAll Hi-fi amenties included car parking at Ramarao pet Kakinada - Central locality. walkable distance to hospital railwaystation, school and offices.', '2009-07-07', 'a'),
(27, 0, 'admin', 'LS26519', '3', '3', '', 'India', 'Kakinada', 'Sarpavaram Junction', 16.9695443, 82.2369371, '', 1600, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: adb road\r\npitapuram road\r\nsarpavaram road\r\nkiran eye hospital road\r\n\r\nRATE--1600 to 6000PER SQ Y', '2009-07-07', 'a'),
(28, 0, 'admin', 'LS72642', '3', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '418 SQ Y', 2800, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: RATE--2800 PER SQ Y', '2009-07-07', 'a'),
(29, 0, 'admin', 'LS37831', '3', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '', 1600, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: one km away from pitapuram road\r\nRATE--1600 PER SQ Y', '2009-07-07', 'a'),
(30, 0, 'admin', 'LS23384', '3', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '', 4300, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: RATE--4300 PER SQ Y', '2009-07-07', 'a'),
(31, 0, 'admin', 'LS23779', '3', '3', '', 'India', 'Kakinada', 'Valasapakala', 16.9847979, 82.2316468, '300 sq yds,', 0, 'yes', 0, 0, 0, 0, 'select', 'East', 'select', '', 'Offered: For Sale House site East facing 300 sq yds,\r\n45ft x 60ft, in Valasapakala Kakinada .', '2009-07-07', 'a'),
(32, 0, 'admin', 'LS25218', '3', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: Good Investment for long term Goal!\r\n2 sites are available at Nannayya Univ, Rs.1,300/sq.yd.', '2009-07-07', 'a'),
(33, 0, 'admin', 'LS92719', '3', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: Location! Location! Growing City...\r\nFew sites are available at Medical College, Rs.2,200/sq.yd. ', '2009-07-07', 'a'),
(34, 0, 'admin', 'LS21159', '3', '3', '', 'India', 'Kakinada', 'Madura Nagar', 16.9695443, 82.2369371, ' 209 AND 418 SQ Y PLOTS ', 1800, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: 209 AND 418 SQ Y PLOTS AVAILABLE\r\nRATE--1800 TO 6000 PER SQ Y\r\nDTCP APPROVED PLOTS WITH CLEAR TITLE\r\nareas:near maduranagar\r\nsarpavaram road\r\ntimmapuram back dide\r\nnear kiran eye hospital\r\nachampeta', '2009-07-07', 'a'),
(35, 0, 'admin', 'LS57831', '', '16', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '300 Sq Yards  200 Sq Yards  400 Sq Yards  300 Sq Y', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: Near Goukulam\r\n\r\nHouse site Like\r\n\r\n300 Sq Yards\r\n\r\n200 Sq Yards\r\n\r\n400 Sq Yards\r\n\r\n300 Sq Yards\r\n\r\n350 Sq Yards ', '2009-07-07', 'a'),
(36, 0, 'admin', 'LS34325', '3', '13', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '10', '', '2009-07-07', 'a'),
(37, 0, 'admin', 'LS64456', '3', '15', '', 'India', 'Kakinada', 'Bhanugudi Junction', 16.9697142, 82.2384300, '', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: 3 Shops Commercial Property\r\none mini shop one 2 bed room flat up star 3 bed flat\r\nlocation : Near Bhanugudi Junction', '2009-07-07', 'a'),
(38, 0, 'admin', 'LS55396', '3', '10', '', 'India', 'Kakinada', 'Sarpavaram Junction', 16.9695443, 82.2369371, '250 SQ YARD', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: Land : 250 SQ YARD land near Bank Of Maharashtra, Sarapavaram\r\n\r\nLength : 30 X 75 .....', '2009-07-07', 'a'),
(39, 0, 'admin', 'LS75325', '3', '10', '', 'India', 'Kakinada', 'Ashok Nagar', 16.9695443, 82.2369371, '57 X 87 = 580 SQ yards', 0, 'yes', 0, 0, 0, 0, 'select', 'East', 'select', '', 'Offered: Near Ashok nagar Andhra Bank\r\n\r\n57 X 87 = 580 SQ yards\r\nEast Facing\r\nExcelent Location Top Residential Aria ', '2009-07-07', 'a'),
(40, 0, 'admin', 'LS43629', '3', '10', '', 'India', 'Kakinada', 'Vakalapudi', 17.0028250, 82.2624037, '45 X 60 syd', 0, 'yes', 0, 0, 0, 0, 'select', 'South', 'select', '', 'Offered: Vakalapudi\r\nNear Cinema Hall\r\n45 X 60 syd\r\nSouth Face\r\n60” Feet Road\r\nHyd D.T.P Lay out\r\nClear Documents\r\n', '2009-07-07', 'a'),
(41, 0, 'admin', 'LS25691', '3', '10', '', 'India', 'Kakinada', 'Vidyut Nagar', 16.9847979, 82.2316468, '500 SQ Yards', 0, 'yes', 0, 0, 0, 0, 'select', 'North East', 'select', '', 'Offered: SBI Colony\r\nVidyuth nagar bank colony\r\n500 SQ Yards North East Corner\r\nWith Building\r\n', '2009-07-07', 'a'),
(42, 0, 'admin', 'LS52225', '3', '10', '', 'India', 'Select City', 'Madura Nagar', 16.9695443, 82.2369371, '101 Sq Yards', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: 101 Sq Yards\r\n600 STF\r\nNew Building\r\nMadhura Nagar\r\nNear Gokulam\r\nGOOD Residential aria ', '2009-07-07', 'a'),
(43, 0, 'admin', 'LS74549', '3', '2', '', 'India', 'Kakinada', 'Bhanugudi Junction', 16.9697142, 82.2384300, '', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: Near Bhanugudi Jn…\r\nResidential Apartments …. ', '2009-07-07', 'a'),
(44, 0, 'admin', 'LS19222', '3', '11', '', 'India', 'Kakinada', 'Bhanugudi Junction', 16.9697142, 82.2384300, '2000 ', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: 2000 Sq. ft Office building with car parking available for rent in very prominent location, Bhanugudi Junction, Kakinada,AP. ', '2009-07-07', 'a'),
(45, 0, 'admin', 'LS29952', '3', '10', '', 'India', 'Kakinada', 'Main Road', 16.9695443, 82.2369371, ' 6.500 sq yards ', 35, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: 6.500 sq yards fully commercial site at sarpavaram junction,\r\noffered price 35,000/- per sq yard', '2009-07-07', 'a'),
(46, 0, 'admin', 'LS39959', '3', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: BUILDINGS NEWLY CONSTRUCTED,OLD,TOO OLD\r\nEAST-WEST-NORTH-SOUTH...OR CORNER HOUSES\r\nALL YOU HAVE TO DO IS JUST ARRANGE A SITE VISIT,AND HAVE A LOOK AT THE PROPERTIES\r\nON YOUR REQUEST WE WILL SEND YOU THE IMAGES AND THE LOCATION TROUGH GOOGLE EARTH ', '2009-07-07', 'a'),
(47, 0, 'admin', 'LS92684', '3', '3', '', 'India', 'Kakinada', 'Vakalapudi', 17.0028250, 82.2624037, ' 196 sq.yd ', 0, 'yes', 0, 0, 0, 0, 'select', 'South', 'select', '', 'Offered: 196 sq.yd south facing in vakalapudi is available for Rs.7,000/- per sq.yd\r\nthird plot from main road', '2009-07-07', 'a'),
(48, 0, 'admin', 'LS94746', '3', '3', '', 'India', 'Kakinada', 'APSP', 17.0082753, 82.2515393, '200 sq.yd ', 0, 'yes', 0, 0, 0, 0, 'select', 'South', 'select', '', 'Offered: 200 sq.yd south facing ,30*60 are the measurements ,road facing 40feet,sixth plot from pithapuram road,opposite state bank of hyd A.P.S.P camp\r\nprice is Rs.8,300/- per sq.yd[negotiable]\r\nfast registration preferred', '2009-07-07', 'a'),
(49, 0, 'admin', 'LS99788', '3', '6', '', 'India', 'Kakinada', 'Vakalapudi', 17.0028250, 82.2624037, '266 sqyards', 0, 'yes', 0, 0, 0, 0, 'select', 'East', 'select', '', 'Offered: 2bhk house for sale.\r\n\r\nDetails:\r\n\r\nFacing - West\r\nbuilt up area - 1210\r\nLand Area - 266 sqyards\r\nAddress:\r\nsrinivasa nagar,\r\nvakalapudi\r\nkakinada', '2009-07-07', 'a'),
(50, 0, 'admin', 'LS68426', '1', '5', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '', 0, '', 2, 0, 0, 0, 'select', '', 'select', '7', 'Offered: A BEAUTIFUL NEWLY REMODELED DELUXE HOUSE AVALIABLE FOR RENT.\r\n2 SPACIOUS BEDROOMS,DINING HALL,\r\nCUTE KITCHEN,\r\nCAR PARKING FACILITY,\r\nARROUND 40 FEET ROAD.\r\nRENT =====[2200-2500]\r\n"WILL BE GIVEN TO ANY BACHLOERS ,OFFICIE EXECUTIVES,OR FOR FAMILY', '2009-07-07', 'a'),
(51, 0, 'admin', 'LS26769', '1', '6', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '', 3000, 'yes', 2, 0, 0, 0, 'select', '', 'select', '7', 'Offered: A BEAUTIFUL NEWLY REMODELED DELUXE HOUSE AVALIABLE FOR RENT.\r\n2 SPACIOUS BEDROOMS,(WITH A/C FACILITY)\r\nSPACIOUS HALL,\r\nCUTE KITCHEN,\r\nCAR PARKING FACILITY,\r\nARROUND 40 FEET ROAD.\r\nRENT =====[3000-3200]INCLUDING WATER CHARGES ', '2009-07-07', 'a'),
(52, 0, 'admin', 'LS65896', '3', '2', '', 'India', 'Kakinada', 'Ramarao pet', 16.9580459, 82.2354180, '', 0, '', 0, 0, 0, 0, 'select', '', 'select', '7', 'Offered: Apartment for sale in Heart of the city at Ramarao pet Kakinada.\r\nAll Hi-fi amenties included car parking at Ramarao pet Kakinada - Central locality for walkable distance to hospital railwaystation, school and offices.', '2009-07-07', 'a'),
(53, 0, 'admin', 'LS86724', '1', '6', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '', 3000, 'yes', 2, 0, 0, 0, 'select', '', 'select', '7', 'Offered: A BEAUTIFUL NEWLY REMODELED DELUXE HOUSE AVALIABLE FOR RENT.\r\n2 SPACIOUS BEDROOMS,(WITH A/C FACILITY)\r\nSPACIOUS HALL,\r\nCUTE KITCHEN,\r\nCAR PARKING FACILITY,\r\nARROUND 40 FEET ROAD.\r\nRENT =====[3000-3200]INCLUDING WATER CHARGES ', '2009-07-07', 'a'),
(54, 0, 'admin', 'LS12996', '3', '3', '', 'India', 'Kakinada', 'Vakalapudi', 17.0028250, 82.2624037, '600sq.yd', 0, 'yes', 0, 0, 0, 0, 'select', 'East', 'select', '', ' 600sq.yd East Vakalapudi - 04:43 am, 19 June, 2009 - 6 views   	 \r\nOffered: 600sq.yd east facing in vakalapudi is for sale price is Rs.3,500/- per sq.yd\r\n90*60are the measurements', '2009-07-07', 'a'),
(55, 0, 'admin', 'LS37825', '3', '3', '', 'India', 'Kakinada', 'Sarpavaram Junction', 16.9695443, 82.2369371, '100sq.yd', 0, 'yes', 0, 0, 0, 0, 'select', 'East', 'select', '', 'Offered: 100sq.yd in lalitha nagar near sarpavaram junction,is available for Rs.13,000/- per sq.yd,plot is east facing', '2009-07-07', 'a'),
(56, 0, 'admin', 'LS79789', '3', '5', '', 'India', 'Kakinada', 'Vidyut Nagar', 16.9847979, 82.2316468, '70*65 [70--north, 65--east]', 75, 'yes', 3, 0, 0, 0, 'select', 'North East', 'select', '', 'Offered: 1.this plot is East and North facing,\r\n2.north has 80 feet road\r\n3.east has 33 feet road\r\n4.dimensions of the plot are 70*65 [70--north, 65--east]\r\n5.building is 15 years old\r\n6.house is in pretty good condition,\r\n7. 3 bed room, hall ,kitchen,garden etc.....\r\nPRICE OF THIS BUILDING IS 75 LAKH RUPEES', '2009-07-07', 'a'),
(57, 0, 'admin', 'LS79932', '3', '3', '', 'India', 'Kakinada', 'Atchampet Junction', 16.9695443, 82.2369371, '200sq.yd', 0, 'yes', 0, 0, 0, 0, 'select', 'East', 'select', '', 'Offered: EAST FACING PLOT IN JANACHAITANYA LAYOUT\r\nIN ATCHEMPET JUNCTION ,IS AVAILABLE\r\nFOR Rs.3,000/- PER SQ.YD,PLOT IS VERY NEAR TO THE ADB ROAD', '2009-07-07', 'a'),
(58, 0, 'admin', 'LS67193', '3', '', '', 'India', 'Kakinada', 'Pratap Nagar', 16.9719596, 82.2216538, '222sq.yd', 0, 'yes', 0, 0, 0, 0, 'select', 'East', 'select', '', 'Offered: East facing plot near pratapnagar water tank,40*50 are the measurements,\r\nprice is Rs.8,000/- per sq.yd', '2009-07-07', 'a'),
(59, 0, 'admin', 'LS35794', '3', '3', '', 'India', 'Kakinada', 'Suryaraopet', 16.9695443, 82.2369371, '', 0, 'yes', 2, 0, 0, 0, 'select', '', 'select', '', 'Offered: 2 bedroomed flats for sale near basavareddivari veedhi parallel road of 2 town police station road suryaraopeta ', '2009-07-07', 'a'),
(60, 0, 'admin', 'LS17352', '3', '6', '', 'India', 'Kakinada', 'Sarpavaram Junction', 16.9695443, 82.2369371, '66.00 Sqyds', 10, 'yes', 0, 0, 0, 5, 'select', '', 'select', '', 'Offered: "HOUSE FOR SALE"\r\nOffered: E.W.S-103,A.P.I.I.C Ltd, Independent House East facing.Double Portion.Very near to Rajiv gandhi degree\r\ncollege, Sarpavaram Junction.\r\nArea : 66.00 Sqyds\r\nBuilt up Area: 226 sft\r\nPrice : 10 Lakhs\r\nWater facility: Well, Muncipality water along with tank\r\nConstrunction type : Pillar construction\r\nThe construction is almost 5 years old and is ideal for\r\n\r\ndevelopment 2/3 storied building\r\nThe property has provision for bank loans\r\n', '2009-07-07', 'a'),
(61, 0, 'admin', 'LS41616', '3', '2', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '7', 'Offered: Apartment for sale in Heart of the city at Ramarao pet Kakinada.\r\nAll Hi-fi amenties included car parking at Ramarao pet Kakinada - Central locality for walkable distance to hospital railwaystation, school and offices.', '2009-07-07', 'a'),
(62, 0, 'admin', 'LS84656', '3', '3', '', 'India', 'Kakinada', 'Bhanugudi Junction', 16.9697142, 82.2384300, '', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: the most luxarious flats at bhanugudi jn. kakinada. spacious rooms, well ventilation and lighting, optimum location for residence, with all aminities , take advantage of recession and buy your dream flat at very cheaper price ', '2009-07-07', 'a'),
(63, 0, 'admin', 'LS32685', '3', '2', '', 'India', 'Kakinada', 'Bhanugudi Junction', 16.9697142, 82.2384300, '', 0, 'yes', 2, 1, 0, 0, 'select', '', 'select', '', 'Offered: Two Bedroom, Hall, Kitchen Apartment on the first floor available for immediate sale.\r\n\r\n1.5 kms from Bhanugudi Junction, close to Medical college hostel/RMC ground, opposite to Kalyani Apartments A&B block. Expected price 12 Laks\r\n', '2009-07-07', 'a'),
(64, 0, 'admin', 'LS47185', '3', '6', '', 'India', 'Kakinada', 'Sarpavaram Junction', 16.9695443, 82.2369371, '40*60=266 sq.yd', 55, 'yes', 0, 0, 0, 0, 'select', 'East', 'select', '', 'Offered: east facing house in lalithanagar colony near sarpavaram junction is available for 55 lakh rupees.\r\nmeasurements are 40*60=266 sq.yd\r\nprice is negotiable\r\nsingle floor', '2009-07-07', 'a'),
(65, 0, 'admin', 'LS14939', '', '', '', 'India', 'Select City', 'Vakalapudi', 16.9695443, 82.2369371, '172sq.yd', 32, 'yes', 0, 0, 0, 0, 'furnished', '', 'select', '10', 'Offered: building in nagarjuna nagar bank colony in\r\nganuguchettu junction is for sale\r\n172sq.yd-completely furnished building\r\nmakrine marble flooring,car parking,\r\nfourth house from vakalapudi mainroad.\r\nprice is 32lakh rupees .', '2009-07-07', 'a'),
(66, 0, 'admin', 'LS82389', '3', '4', '', 'India', 'Kakinada', 'Ramanayyapeta', 16.9695443, 82.2369371, '45*60=300 SQ.YD', 50, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: TWO STORED BUILDING NEAR RAMANAYYAPETA MARKET WITH FOUR PORTIONS.\r\nWITH MEASUREMENTS 45*60=300 SQ.YD\r\nIS AVAILABLE FOR 50LAKH RUPEES', '2009-07-07', 'a'),
(67, 0, 'admin', 'LS92228', '3', '3', '', 'India', 'Kakinada', 'Vidyut Nagar', 16.9847979, 82.2316468, '538sq.yd', 75, 'yes', 0, 0, 0, 0, 'select', 'North East', 'select', '', 'Offered: north-east house in vidyutnagar\r\n538sq.yd-north facing80 ft road\r\neast facing 33ft road\r\nprice is 75lakh rupees', '2009-07-07', 'a'),
(68, 0, 'admin', 'LS69788', '3', '3', '', 'India', 'Kakinada', 'Atchampet Junction', 16.9695443, 82.2369371, '200 sq.yd ', 0, 'yes', 0, 0, 0, 0, 'select', 'East', 'select', '', 'Offered: 200 sq.yd east facing plot in ADB road near atchempet and koppavarm junction\r\n2km from atchempet junction towards samarlakota is available', '2009-07-07', 'a'),
(69, 0, 'admin', 'LS53753', '3', '3', '', 'India', 'Kakinada', 'Main Road', 16.9695443, 82.2369371, '300 sq.yd', 0, 'yes', 0, 0, 0, 0, 'select', 'West', 'select', '', 'Offered: 300 sq.yd,WEST FACING ,45*60 ARE THE MEASUREMENTS-LOCATED ON 5 BUILDINGS CENTER MAIN ROAD\r\nNEAR CHAITANYA COLLEGE\r\nPRICE IS Rs.15,000/- PER SQ.YD', '2009-07-07', 'a'),
(70, 0, 'admin', 'LS23563', '3', '3', '', 'India', 'Kakinada', 'Gangaraju Nagar', 16.9695443, 82.2369371, '500 sq.yd ', 0, 'yes', 0, 0, 0, 0, 'select', 'East', 'select', '', 'Offered: 500 sq.yd east facing in vydhyanagar\r\nnear gangarajunagar[ending]\r\ncomes under vakalapudi panchayat\r\nprice is Rs.7,500/- per sq.yd[negotiable]', '2009-07-07', 'a'),
(71, 0, 'admin', 'LS57982', '3', '5', '', 'India', 'Kakinada', 'APSP', 17.0082753, 82.2515393, '150 SQ.YD', 25, 'yes', 2, 0, 0, 0, 'select', 'East', 'select', '7', 'Offered: EAST FACING HOUSE IN 150 SQ.YD .\r\nOPPOSITE A.P.S.P ,WALKABLE DISTANCE FROM MAIN ROAD, PLINTH AREA IS 900SFT.MARBLE FLOORING,DOUBLE BED ROOM,CAR PARKING,HALL ,KITCHEN AND OTHER FACILITIES AVAILABLE\r\nPRICE IS 25 LAKH', '2009-07-07', 'a'),
(72, 0, 'admin', 'LS84965', '3', '2', '', 'India', 'Select City', '', 16.9695443, 82.2369371, '600 SQ.YD ', 0, 'yes', 0, 0, 0, 0, 'select', 'North West', 'select', '4', 'Offered: 600 SQ.YD FACING WEST AND NORTH, ADJACENT TO THE BOATCLUB IS AVAILABLE\r\nPRICE IS Rs.9,500/- PER SQ.YD\r\n+ Rs.900/- PER SQ.YD FOR BETTERMENT CHARGES FOR MORE ', '2009-07-07', 'a'),
(73, 0, 'admin', 'LS83495', '3', '3', '', 'India', 'Select City', '', 16.9695443, 82.2369371, ' 1750SQ.YD', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: WEST FACING PLOT 1750SQ.YD ON NH 214\r\nAT ATCHEMPET JUNCTION ,OPPOSITE KOKILA RESTAURANT.PRICE IS Rs.16,000/- PER SQ.YD ', '2009-07-07', 'a'),
(74, 0, 'admin', 'LS63937', '3', '10', '', 'India', 'Kakinada', 'Sarpavaram Junction', 16.9695443, 82.2369371, '6.500 sq yards', 35, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: 6.500 sq yards fully commercial site at sarpavaram junction,\r\noffered price 35,000/- per sq yard', '2009-07-07', 'a'),
(75, 0, 'admin', 'LS19362', '3', '10', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, ' 5 acres land', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: 5 acres land at A.D.B road near nookalamma temple, this is totally filled by gravel', '2009-07-07', 'a'),
(76, 0, 'admin', 'LS33221', '3', '5', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '', 0, '', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: Finance available for Clear Titled Flats and Houses with good interest rates.', '2009-07-07', 'a'),
(77, 0, 'admin', 'LS41822', '3', '10', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '6 ACRES ', 80, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: 6 ACRES NEAR GREEN PARK STAR HOTEL UNDER CONSTRUCTION IN ADB ROAD KAKINADA IS AVAILABLE .NO WORRY OF ROAD EXTENSION,PURE DOCUMENT,OFFERED FOR LESS PRICE COMPARED TO OTHERS, EITHER FOR INVESTMENT OR FOR LAYOUT THIS LAND IS SUITABLE EXACTLY PRICE PER SQ.YD IN THIS AREA IS Rs.4,200/- AT PRESENT- AND THE EXPECTED PRICE OF THE 6 ACRE IS 80LAKH RUPEES PER ACRE[NEGOTIABLE] ', '2009-07-07', 'a'),
(78, 0, 'admin', 'LS37469', '3', '5', '', 'India', 'Kakinada', 'Gangaraju Nagar', 16.9695443, 82.2369371, '266SQ.YD', 50, 'yes', 2, 0, 0, 0, 'select', 'West', 'select', '7', 'Offered: WEST FACING HOUSE IN PADMA NAGAR NEAR GANGARAJU NAGAR IS FOR SALE.\r\nMARBLE FLOORING DOUBLE BEDROOM,CAR PARKING\r\nAND OTHER FACILITIES AVAILABLE.\r\n40*60 ARE THE MEASUREMENTS=266SQ.YD\r\nPRICE IS 50 LAKH RUPEES [NEGOTIABLE]', '2009-07-07', 'a'),
(79, 0, 'admin', 'LS19695', '3', '3', '', 'India', 'Kakinada', 'Gangaraju Nagar', 16.9695443, 82.2369371, '266SQ.YD', 50, 'yes', 2, 0, 0, 0, 'select', 'West', 'select', '7', 'Offered: WEST FACING HOUSE IN PADMA NAGAR NEAR GANGARAJU NAGAR IS FOR SALE.\r\nMARBLE FLOORING DOUBLE BEDROOM,CAR PARKING\r\nAND OTHER FACILITIES AVAILABLE.\r\n40*60 ARE THE MEASUREMENTS=266SQ.YD\r\nPRICE IS 50 LAKH RUPEES [NEGOTIABLE]', '2009-07-07', 'a'),
(80, 0, 'admin', 'LS52853', '3', '3', '', 'India', 'Kakinada', 'Vakalapudi', 17.0028250, 82.2624037, '1500 SQ.YD', 6000, 'yes', 0, 0, 0, 0, 'select', 'North', 'select', '', 'Offered: 1500 SQ.YD NORTH FACING\r\nNEAR VAKALAPUDI\r\nPRICE IS 6000 PER SQ.YD', '2009-07-07', 'a'),
(81, 0, 'admin', 'LS87456', '3', '', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, ' 480 sq.yd', 3400, 'yes', 0, 0, 0, 0, 'select', 'East', 'select', '', 'Offered: East 240+240=480 D.T.P Layout measurements are 80*60\r\nroad facing is 33ft\r\nnear chiatanya college\r\nprice is 3400/-per sq.yd ', '2009-07-07', 'a'),
(82, 0, 'admin', 'LS77492', '3', '3', '', 'India', 'Kakinada', 'Valasapakala', 16.9695443, 82.2369371, '332sq.yd ', 0, 'yes', 0, 0, 0, 0, 'select', 'South East', 'select', '', 'Offered: 332sq.yd East And South facing plot\r\nD.T.P.C approved layout 1/2 km from ganuguchettu junction [valasapakala]price is Rs.7,000/- per sq.yd\r\n', '2009-07-07', 'a'),
(83, 0, 'admin', 'LS92784', '3', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, ' 200sq.yd', 0, 'yes', 0, 0, 0, 0, 'select', 'South', 'select', '', 'Offered: 200sq.yd-facing south-30*60 are the measurements,road is 40feet, sixth plot from NH 214[pithapuram road].\r\nprice of the plot is Rs.8,500/- per sq.yd\r\nopposite state bank of hyderabad [APSP]\r\n', '2009-07-07', 'a'),
(84, 0, 'admin', 'LS74365', '3', '', '', 'India', 'Select City', '', 16.9695443, 82.2369371, '110 Sqyds', 15, 'yes', 1, 0, 0, 0, 'select', 'North', 'select', '', 'Offered: Offered: LIG , Independent house North Facing with 1 bedroom, hall, kitchen & dining.Very near to Rajiv gandhi degree college, Sarpavaram Junction.\r\nArea : 110 Sqyds\r\nBuilt up Area: 700 sft\r\nPrice : 15 Lakhs\r\nWater facility: Well, Muncipality water along with tank\r\nConstrunction type : Pillar construction\r\nThe construction is almost 15 years old and is ideal for development 2/3 storied building\r\nThe property has provision for bank loans', '2009-07-07', 'a'),
(85, 0, 'admin', 'LS47511', '1', '2', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '', 0, 'yes', 2, 0, 0, 0, 'select', '', 'select', '7', 'Offered: - New Construction Apartment for rent with 2 bedroom, it is located at Veerabhadra puram\r\n- carparking facility\r\n- Near by Arts College\r\n- Rent is Rs.4400/-', '2009-07-07', 'a'),
(86, 0, 'admin', 'LS29746', '3', '3', '', 'India', 'Kakinada', 'Main Road', 16.9695443, 82.2369371, '110 Sq. Yds', 25, 'yes', 0, 0, 0, 0, 'select', 'North East', 'select', '', 'Offered: 110 Sq. Yds North East corner plot with 2 BHK Independent Building, marble flooring at Dwaraka Nagar Main Road, 0.5 km from KKD Railway Station is for sale for 25 laksh.', '2009-07-07', 'a'),
(87, 0, 'admin', 'LS99963', '1', '5', '', 'India', 'Kakinada', 'Gangaraju Nagar', 16.9695443, 82.2369371, '', 0, 'yes', 2, 0, 0, 0, 'select', '', 'select', '2,7', 'Offered: It is a big 2bhk with 1100 sq.ft. balcony on 5th floor with lift and car park. This house is near gangaraju nagar very close to the road that goes to vakalapudi and also walking distance from vidhyanjali school. with garden and park area in the front and wide corridors and stair case.\r\n\r\nthe flat is with 2 bed rooms 2 bath rooms with all jaguar fittings and royal paints with marble and vitrified finish tiles, false ceiling and good lightting system.\r\nRent : 3500\r\nin the building already other flats rented between 3500-4500.', '2009-07-07', 'a'),
(88, 0, 'admin', 'LS76851', '3', '5', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '220 sq.yd', 60, 'yes', 0, 0, 3, 0, 'select', 'North', 'select', '7', 'Offered: north facing house three floors\r\nnagarjuna bank colony\r\nnewly constructed in 220 sq.yd\r\nthree floors, car parking\r\nand other facilities available\r\nprice is 60lakh rupees [negotiable]', '2009-07-07', 'a'),
(89, 0, 'admin', 'LS37661', '3', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '298 sq.yd', 0, 'yes', 0, 0, 0, 0, 'select', 'North', 'select', '3', 'Offered: North facing plot=40*64=298 sq.yd\r\nNagarjuna bank colony,\r\nnear siddhartha hospital\r\nwalkable distance from Ganuguchettu\r\nsurrounded by buildings,\r\ndrainage facility available\r\nprice is Rs.10,000/- per sq.yd=Rs.29,80,000/- [negotiable price]', '2009-07-07', 'a'),
(90, 0, 'admin', 'LS17379', '3', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '2 Acres', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: 2 Acres of land near Pithapuram near bypass is for sale.', '2009-07-07', 'a'),
(91, 0, 'admin', 'LS34492', '3', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '600 sq yrds ', 14, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: Hi,\r\nI have 600 sq yrds for sale at ashok nagar, it is excellent location and very good for appartment construction.\r\nThe price is 14,000 per sq yrd', '2009-07-07', 'a'),
(92, 0, 'admin', 'LS62765', '3', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '460SQ.YD ', 0, 'yes', 0, 0, 0, 0, 'select', 'North West', 'select', '', 'Offered: 460SQ.YD D.T.P.C APPROVED LAYOUT\r\nFACING NORTH WEST\r\n70*60 ARE THE MEASUREMENTS\r\n4TH SITE FROM THE A.D.B ROAD\r\nPRICE IS Rs.4,700/-PER SQ.YD', '2009-07-07', 'a'),
(93, 0, 'admin', 'LS19531', '3', '3', '', 'India', 'Kakinada', 'Atchampet Junction', 16.9695443, 82.2369371, '650SQ.YD', 0, 'yes', 0, 0, 0, 0, 'select', 'South East', 'select', '', 'Offered: 650SQ.YD-SOUTH EAST FACING\r\nDTPC APPROVED LAYOUT PRICE IS Rs.2500/- PER SQ.YD-2KM FROM ATCHEMPET JUNCTION', '2009-07-07', 'a'),
(94, 0, 'admin', 'LS36687', '3', '3', '', 'India', 'Kakinada', 'Atchampet Junction', 16.9695443, 82.2369371, '400SQ.YD', 2500, 'yes', 0, 0, 0, 0, 'select', 'West', 'select', '', 'Offered: 400SQ.YD -D.T.P.C APPROVED LAYOUT\r\nWEST FACING 33FEET ROAD-2KM FROM ATCHEMPET JUNCTION-PRICE IS 2500/-PER SQ.YD', '2009-07-07', 'a'),
(95, 0, 'admin', 'LS71255', '3', '3', '', 'India', 'Kakinada', 'Atchampet Junction', 16.9695443, 82.2369371, '480 SQ.YD', 0, 'yes', 0, 0, 0, 0, 'select', 'North', 'select', '', 'Offered: NORTH FACING PLOT-480 SQ.YD-D.T.P.C APPROVED LAYOUT-2KM FROM ATCHEMPET JUNCTION-PRICE IS Rs.2700/-PER SQ.YD\r\nLOCATED IN RESIDENTIAL AREA', '2009-07-07', 'a'),
(96, 0, 'admin', 'LS58768', '3', '3', '', 'India', 'Kakinada', 'Atchampet Junction', 16.9695443, 82.2369371, '480 SQ.YD', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: NORTH FACING PLOT-480 SQ.YD-D.T.P.C APPROVED LAYOUT-2KM FROM ATCHEMPET JUNCTION-PRICE IS Rs.2700/-PER SQ.YD\r\nLOCATED IN RESIDENTIAL AREA', '2009-07-07', 'a'),
(97, 0, 'admin', 'LS79956', '3', '3', '', 'India', 'Kakinada', '', 16.9451810, 82.2386470, '', 0, 'yes', 0, 0, 0, 0, 'select', 'North East', 'select', '', 'Offered: D.T.P.C approved layout,2km from atchempet junction-facing NORTH-EAST-WEST\r\n90*120 are the measurements\r\nprice is Rs.2500/-per sq.yd[negotiable]\r\nall the three directions are surrounded\r\n33feet roads--behind GTR institute\r\nkoppavaram junction-kakinada', '2009-07-07', 'a'),
(98, 0, 'admin', 'LS33144', '3', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '400Sq.yd', 0, 'yes', 0, 0, 0, 0, 'select', 'North East', 'select', '', 'Offered: PLots in g.p.r 2\r\nNorth east,400Sq.yd\r\nmeasuring 60*61\r\nRs.3,000/-per sq.yd\r\nabove metioned price are negotiable', '2009-07-07', 'a'),
(99, 0, 'admin', 'LS47599', '3', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '213 sq.yd', 0, 'yes', 0, 0, 0, 0, 'select', 'North', 'select', '', 'Offered: PLot in g.p.r 2\r\nplot no:6, price is Rs.2,300/-measuring 33*55,\r\n213 sq.yd north facing\r\nabove metioned price are negotiable', '2009-07-07', 'a'),
(100, 0, 'admin', 'LS76669', '3', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '366sq.yd', 0, 'yes', 0, 0, 0, 0, 'select', 'South', 'select', '', 'Offered: PLot in g.p.r 2\r\n366sq.yd plot no:152, measuring 40*55,Facing south,price is Rs.2,200/-per sq.the above metioned price are negotiable', '2009-07-07', 'a'),
(101, 0, 'admin', 'LS47394', '3', '14', '', 'India', 'Kakinada', 'Vakalapudi', 17.0028250, 82.2624037, ' 60cents=2880sq.yd', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: 60cents=2880sq.yd, right in front of the reliance work shop in vakalapudi kakinada\r\neast will be facing the 100ft road\r\nprice expected by the farmer is rs.3200 per\r\nsq.yd\r\n1.Reliance industries\r\n2.Agarwal refineries\r\n3.Shalimar refineries\r\n4.Natural bio diesel\r\nare some of the industries right infront of the land', '2009-07-07', 'a'),
(102, 0, 'admin', 'LS22482', '3', '14', '', 'India', 'Select City', '', 16.9695443, 82.2369371, ' 96cents= 4608sq.yd', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: 96cents= 4608sq.yd, right in front of the reliance work shop in vakalapudi kakinada\r\neast will be facing the 100ft road\r\nprice expected by the farmer is 1cr\r\n1.Reliance industries\r\n2.Agarwal refineries\r\n3.Shalimar refineries\r\n4.Natural bio diesel\r\nare some of the industries right infront of the land', '2009-07-07', 'a'),
(103, 0, 'admin', 'LS17397', '3', '3', '', 'India', 'Kakinada', 'Atchampet Junction', 16.9695443, 82.2369371, '550sq.yd[approx]', 0, 'yes', 0, 0, 0, 0, 'select', 'North East', 'select', '', 'Offered: North east facing plot in DTPC approved layout behind Saibaba Temple, timmapuram\r\natchempet junction\r\n550sq.yd[approx]\r\n83*60 are the measurements', '2009-07-07', 'a'),
(104, 0, 'admin', 'LS18639', '3', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '266 sq.yd', 6500, 'yes', 0, 0, 0, 0, 'select', 'North East', 'select', '', 'Offered: 266 sq.yd,facing north east\r\nin maruthi nagar layout\r\nprice is 6500/- per sq.yd', '2009-07-07', 'a'),
(105, 0, 'admin', 'LS49751', '3', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '', 0, 'yes', 0, 0, 0, 0, 'select', 'North', 'select', '', 'Offered: PLots in g.p.r 2\r\n366sq.yd\r\nplot no:152,measuring 40*55,Facing south,price is Rs.2,200/-per sq.yd\r\nplot no:6, price is Rs.2,300/-,measuring 33*55,213 sq.yd north facing.\r\nNorth east,400Sq.yd,measuring 60*61,Rs.3,000/-per sq.yd\r\nall the above metioned prices are negotiable', '2009-07-07', 'a'),
(106, 0, 'admin', 'LS82957', '3', '12', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '920 SQ YDS', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: COMMERCIAL PLOT= 920 SQ YDS (DTCP APPROVED) OPPOSITE NEW KAKINDA RAILWAY STATION SUITABLE FOR HOTEL/COMMERCIAL COMPLEX. THIS IS THE ONLY VACANT PLOT AVAILABLE OPP NEW KAKINADA RAILWAY STATION. EXP PRICE Rs 20 000 per yard', '2009-07-07', 'a'),
(107, 0, 'admin', 'LS21796', '3', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '37'' X 60'' - 247 SQ.YDS', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: 33'' FT ROAD - WEST FACING\r\n\r\n37'' X 60'' - 247 SQ.YDS\r\n\r\nJANACHAITHANYA LAYOUT\r\nBEHIND JEWEL MEADOWS\r\nBESIDE BIG BUILDING AND LANDMARK BUILDINGS IN THE LAYOUT\r\n\r\nRs. 6000/Sq.Yd', '2009-07-07', 'a'),
(108, 0, 'admin', 'LS96835', '3', '3', '', 'India', 'Kakinada', 'Sarpavaram Junction', 16.9695443, 82.2369371, '266++266==532 sq.yd', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: 266++266==532 sq.yd D.T.P layout North Facing 80*60 are the measurements,\r\nroad facing is 80ft\r\nopposite Subhaniketan School\r\nSarpavaram junction kakinada\r\nprice is Rs.5,400/- per sq.yd', '2009-07-07', 'a'),
(109, 0, 'admin', 'LS87294', '3', '3', '', 'India', 'Kakinada', '', 16.9451810, 82.2386470, '50 acres', 20, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: 50 acres is available ,near Aditya Engineering college near peddapuram for\r\n20 lakh each acre', '2009-07-07', 'a'),
(110, 0, 'admin', 'LS61459', '3', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, ' 50 acres', 18, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: 50 acres is available ,near Aditya Engineering college near peddapuram for\r\n18 lakh each acre', '2009-07-07', 'a'),
(111, 0, 'admin', 'LS85174', '3', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '50 acres ', 35, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: 50 acres of land is available in kakinada\r\nat unduru junction @ 35lakh per acre\r\nclear title lands,', '2009-07-07', 'a'),
(112, 0, 'admin', 'LS75434', '3', '5', '', 'India', 'Select City', '', 16.9695443, 82.2369371, '130 sq yds', 33, 'yes', 0, 0, 0, 0, 'furnished', 'North West', 'select', '7', 'Offered: located area vaidya nagar, north west corner, 130 sq yds, upstair building, total SFT 1500, marble flooring, altek cieling, well furniture, car parking, rate :33 lacs,', '2009-07-07', 'a'),
(113, 0, 'admin', 'LS48491', '3', '3', '', 'India', 'Kakinada', 'Valasapakala', 16.9695443, 82.2369371, '175 sq yds', 30, 'yes', 0, 0, 0, 0, 'select', 'West', 'select', '7', 'Offered: very near sarpavaram juction, located area sudha nagar, west facing, 175 sq yds, 1100 SFT, car parking, marble flooring, altek ceiling, 2BHK, RATE :30 lacs\r\n', '2009-07-08', 'a'),
(114, 0, 'admin', 'LS74996', '3', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, ' 240 sq yds', 0, 'yes', 0, 0, 0, 0, 'select', 'West', 'select', '', 'Offered: located opp meenakshi theatre, west facing, 240 sq yds, per sq yd 3100/-', '2009-07-08', 'a'),
(115, 0, 'admin', 'LS31892', '3', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '400 sq yds', 0, 'yes', 0, 0, 0, 0, 'select', 'South West', 'select', '', 'Offered: very near atchampet junction, 214 highway facing, DTCP aprooval, south west corner, 50*70=400 sq yds, per sq yd 3700/-', '2009-07-08', 'a'),
(116, 0, 'admin', 'LS47378', '3', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '40*60=266sq yds', 0, 'yes', 0, 0, 0, 0, 'select', 'South', 'select', '', 'Offered: DTCP approoval, 160 feet road, south facing,40*60=266sq yds, located area gpr phase 2, adb road,price per sq yd 2700/-', '2009-07-08', 'a'),
(117, 0, 'admin', 'LS46615', '3', '3', '', 'India', 'Kakinada', 'Ramarao pet', 16.9580459, 82.2354180, '550 sft', 8, 'yes', 0, 3, 0, 10, 'select', 'North', 'select', '2', 'Offered: very near rlystation, opp raja tank,2BHK,third floor, lift facility, 8 years old, no car parking, 550 sft,north facing,fla cost 8 lacs.', '2009-07-08', 'a'),
(118, 0, 'admin', 'LS46269', '3', '3', '', 'India', 'Kakinada', 'APSP', 17.0082753, 82.2515393, '220 sq yds each plot', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: dtcp approoval plots, all facings avaible, minimum 220 sq yds each plot,ready for sale four roads block, total 1500 sq yds.', '2009-07-08', 'a'),
(119, 0, 'admin', 'LS54537', '3', '3', '', 'India', 'Kakinada', 'Sarpavaram Junction', 16.9695443, 82.2369371, '247 Yds -1000 Sft -25L ', 25, 'yes', 3, 0, 0, 0, 'select', 'West', 'select', '', '\r\nOffered:\r\n\r\n3Bed Rooms + Hall + Kitchen + Car Parking\r\n\r\n- 247 Yds\r\n- 1000 Sft\r\n- 25Lacs\r\n- Nr. Jewel Meadows, Sarpavaram Road.\r\n- WEST Facing\r\n- Premium Specifications\r\n- Designer Elevation By Architect,\r\n- Structures by Civil Engineer\r\n\r\nSpecifications Brief:\r\n1. TEAK MAIN DOOR with GODREZ LOCK\r\n2. 2'' X 2'' VITRIFIED TILES\r\n3. Electrification with FINOLEX wires and LEGRAND MODULAR switches\r\n4. Exteriors with ASIAN PAINTS\r\n5. Kitchen with STEEL SINK, GRANITE platform\r\n6. Designer Toilets with HINDWARE Sanitary and JAQUAR Taps.\r\n\r\nTotal Cost - 25 Lacs\r\n', '2009-07-08', 'a'),
(120, 0, 'admin', 'LS66578', '3', '3', '', 'India', 'Kakinada', 'Sarpavaram Junction', 16.9695443, 82.2369371, '120 Yds -800Sft -16L', 16, 'yes', 2, 0, 0, 0, 'select', 'North', 'select', '', 'Offered:\r\nNorth Facing - Premium Specifications\r\n\r\nDesigner Elevation By Architect, Structures by Civil Engineer\r\n\r\n2 Bed rooms + Hall + Kitchen + Car parking\r\n\r\n1. TEAK MAIN DOOR with GODREZ LOCK\r\n2. 2'' X 2'' VITRIFIED TILES\r\n3. Electrification with FINOLEX wires and LEGRAND MODULAR switches\r\n4. Exteriors with ASIAN PAINTS\r\n5. Kitchen with STEEL SINK, GRANITE platform\r\n6. Designer Toilets with HINDWARE Sanitary and JAQUAR Taps.\r\n\r\nTotal Cost - 16 Lacs\r\n', '2009-07-08', 'a'),
(121, 0, 'admin', 'LS96194', '3', '3', '', 'India', 'Kakinada', 'Madura Nagar', 16.9695443, 82.2369371, '245 SQ YARDS', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: AT MADHURA NAGAR KAKINADA,IDEAL COLLEGE BACK SIDE, FULL DCTP APPROVED.,245 SQ YARDS WITH 40 FEET ROAD, ', '2009-07-08', 'a'),
(122, 0, 'admin', 'LS48739', '3', '5', '', 'India', 'Kakinada', 'Sarpavaram Junction', 16.9695443, 82.2369371, '110 Sqyds', 15, 'yes', 1, 0, 0, 0, 'select', 'North', 'select', '', 'Offered: LIG , Independent house North Facing with 1 bedroom, hall, kitchen & dining.Very near to Rajiv gandhi degree college, Sarpavaram Junction.\r\nArea : 110 Sqyds\r\nBuilt up Area: 700 sft\r\nPrice : 15 Lakhs\r\nWater facility: Well, Muncipality water along with tank\r\nConstrunction type : Pillar construction\r\nThe construction is almost 15 years old and is ideal for development 2/3 storied building\r\nThe property has provision for bank loans\r\nNote: Agents please excuse , we are not intrested in any commision based transactions\r\nOwner', '2009-07-08', 'a'),
(123, 0, 'admin', 'LS56821', '3', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '33 acres ', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: 33 acres of land is for sale in Tallarevu. Genuine buyers please contact immediately.\r\n', '2009-07-08', 'a'),
(124, 0, 'admin', 'LS46552', '3', '3', '', 'India', 'Kakinada', 'Main Road', 16.9695443, 82.2369371, '', 0, 'yes', 2, 0, 0, 0, 'select', '', 'select', '', 'Offered: 2 BED ROOMED FLATS FOR SALE IN MAIN ROAD OF KAKINADA', '2009-07-08', 'a'),
(125, 0, 'admin', 'LS85797', '3', '3', '', 'India', 'Kakinada', 'Sarpavaram Junction', 16.9695443, 82.2369371, '220 sq yards', 1500, 'yes', 0, 0, 0, 0, 'select', 'East', 'select', '', 'Offered: 220 sq yards east facing site at sarpavaram nearly sarpavaram jn (3km sarpavaram jn to site)\r\noffering rate 1500/-(nego)\r\nmeaserments east 33', '2009-07-08', 'a'),
(126, 0, 'admin', 'LS55599', '3', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, ': 160sq.yards', 0, 'yes', 0, 0, 0, 0, 'select', 'North', 'select', '', 'For Sale: 160sq.yards site for sale near NFCL road.The site is North facing and is located in the NFCL road.It has two schools Lotus National School and New Life Public school situated on both sides.Kakinadas famous college V.S.Lakshmi Degree College is situated very near to this site.', '2009-07-08', 'a'),
(127, 0, 'admin', 'LS66191', '', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'For Sale: A reliable name in kakinada realestate for 100% legality and genuine sites we take only one persent commission to BUY or SELL any property.', '2009-07-08', 'a'),
(128, 0, 'admin', 'LS16212', '3', '3', '', 'India', 'Kakinada', 'Madura Nagar', 16.9695443, 82.2369371, '240sqy.', 0, '', 0, 0, 0, 0, 'select', 'North', 'select', '', 'For Sale: madhura nagar DTCP layout (JANACHAITANYA)north facing 240sqy.\r\n36*60 opp open space 2km to veerkamal theatre.', '2009-07-08', 'a'),
(129, 0, 'admin', 'LS23827', '3', '3', '', 'India', 'Kakinada', 'Atchampet Junction', 16.9695443, 82.2369371, ' 200sq yards ', 0, '', 0, 0, 0, 0, 'select', '', 'select', '', 'For Sale: 2KM to actchampet junction beside NGO colony and police colony 400 sq yards two roads north and south two plots 36*50 200sq yards each easy access to ADB road good investment up land sweet water per sq yard 2500/-', '2009-07-08', 'a'),
(130, 0, 'admin', 'LS46873', '3', '3', '', 'India', 'Select City', '', 16.9695443, 82.2369371, '58 sq yards', 0, 'yes', 0, 0, 0, 0, 'select', 'North', 'select', '', 'For Sale: 5KM TO actchampet junction GPR phase 2 DTP layout 33 feet road very near ADB road 58 sq yards 21*25 total site cost 99000/-RS north facing ', '2009-07-08', 'a'),
(131, 0, 'admin', 'LS38616', '3', '3', '', 'India', 'Kakinada', 'Ramarao pet', 16.9580459, 82.2354180, ' 800 sft ', 16, 'yes', 2, 13, 0, 0, 'select', 'East', 'select', '7', 'For Sale: east facing 800 sft ground floor 2bed room hall kitchen pooja room with car parking opp DSP office near officers club and R&B guest house\r\nprice :16 lacs (including regestration charges)', '2009-07-08', 'a'),
(132, 0, 'admin', 'LS69629', '3', '3', '', 'India', 'Kakinada', 'Madura Nagar', 16.9695443, 82.2369371, '240sq yards', 0, 'yes', 0, 0, 0, 0, 'select', 'North', 'select', '', 'For Sale: 2KM to "KARANAMGARI JUNCTION" madhura nagar "JANACHAITANYA" DTP layout north facing 33 ft road 36*60 240sq yards sq yard cost 2550/-', '2009-07-08', 'a'),
(133, 0, 'admin', 'LS93693', '3', '3', '', 'India', 'Kakinada', 'Atchampet Junction', 16.9695443, 82.2369371, '210 sq yards', 0, 'yes', 0, 0, 0, 0, 'select', 'North', 'select', '', 'For Sale: 3 km to acthampet junction backside meenakshi theatre DTP layout north facing 36*52.6 =210 sq yards per sqy 1000/-RS', '2009-07-08', 'a'),
(134, 0, 'admin', 'LS65548', '3', '3', '', 'India', 'Kakinada', 'Narasannanagar', 16.9695443, 82.2369371, '990 sft', 0, 'yes', 0, 1, 0, 0, 'select', 'East', 'select', '', 'For Sale: 1 km to rly station east facing first floor 990 sft well furnised cupboards lift facility locaction "NARASANNA NAGAR"', '2009-07-08', 'a'),
(135, 0, 'admin', 'LS82576', '3', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, ' 980 sft ', 13, 'yes', 3, 0, 0, 0, 'select', 'East', 'select', '2', 'For Sale: very near rly station and vegitable market east facing 980 sft third floor lift facility flat cost 12.5 lacs', '2009-07-08', 'a'),
(136, 0, 'admin', 'LS45883', '3', '3', '', 'India', 'Kakinada', 'Gandhi Nagar', 16.9662011, 82.2243712, ' 330 sq yds ', 14000, 'yes', 0, 0, 0, 0, 'select', 'East', 'select', '', 'For Sale: near to gandhi nagar park and venkateswaraswamy temple east facing 330 sq yds (45*66) 33ft road rate 14000/-per sq yd', '2009-07-08', 'a'),
(137, 0, 'admin', 'LS53473', '3', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '266 sq yd each plot', 0, 'yes', 0, 0, 0, 0, 'select', 'East', 'select', '', 'For Sale: south&east corner and east facing two sites 40*60 266 sq yd each plot. very near ADB road beside ASM public school per sq yd 2250/-', '2009-07-08', 'a'),
(138, 0, 'admin', 'LS56639', '3', '3', '', 'India', 'Kakinada', 'Atchampet Junction', 16.9580459, 82.2354180, '361 sq yds ', 0, 'yes', 0, 0, 0, 0, 'select', 'North East', 'select', '', 'For Sale: 50*65=361 sq yds north&west corner 33 ft and 40 ft road society DTP layout 1 km to "ACTCHAMPET JUNCTION" towards east per sq yd 3200/-', '2009-07-08', 'a'),
(139, 0, 'admin', 'LS14847', '3', '3', '', 'India', 'Kakinada', 'Atchampet Junction', 16.9695443, 82.2369371, '200 YDS', 0, 'yes', 0, 0, 0, 0, 'select', 'East', 'select', '1', 'For Sale: 10 km to bhanugudi junction 4 km to actchampet junction DTP layout east facing 33 ft road club house elactricity very good investment per sq yd 1800/-', '2009-07-08', 'a');
INSERT INTO `real-list` (`list_id`, `r_id`, `post_by`, `list_gid`, `list_type`, `list_property`, `list_project`, `list_country`, `list_city`, `list_location`, `list_lat`, `list_lng`, `list_area`, `list_price`, `list_pricing`, `list_bedroom`, `list_floor_no`, `list_floors`, `list_age`, `list_items`, `list_face`, `list_own`, `list_features`, `list_desc`, `list_date`, `list_status`) VALUES
(140, 0, 'admin', 'LS44856', '3', '3', '', 'India', 'Kakinada', 'Railway Station Road', 16.9695443, 82.2369371, '', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Please Choose a Type -: 920 yards s/w corner dtcp approved plot(venkateswara nagar) opposite "kakinada new railway station".suitable for hotel/guest houses."this is the only vacant plot in front of new railway station.\r\nrs 15000per yard. ', '2009-07-08', 'a'),
(141, 0, 'admin', 'LS81281', '3', '3', '', 'India', 'Kakinada', 'Beach Road', 16.9695443, 82.2369371, '300 sq yards', 1700, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: A plot beside Reliance petrolium, on beach road, which is going to be flourished in near future. Proposed Hiway near to the plot, gives boom to your investment.\r\ndetails: 300 sq yards\r\nland Mark: Opposite to Ship breaking unit.\r\nPrice: 1700/- per sq. yard', '2009-07-08', 'a'),
(142, 0, 'admin', 'LS33159', '1', '5', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '1450sqft', 0, 'yes', 2, 0, 0, 0, 'select', '', 'select', '', 'For Rent: Independent 2 bed room House(1450sqft) with vacant land in Siddarth Nagar, near Kamma Kalyana mandapam for rent as office/guest house/residence.', '2009-07-08', 'a'),
(143, 0, 'admin', 'LS81772', '3', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '275 sq yds', 0, 'yes', 0, 0, 0, 0, 'select', 'North East', 'select', '', 'For Sale: For Sale: 55*45=275 sq yds north&east corner 33 ft road in suma enclave DTP approved layout opposit to GIET engineering college on NH-5 near rajahmundry per sq yd 3500/-', '2009-07-08', 'a'),
(144, 0, 'admin', 'LS51148', '3', '3', '', 'India', 'Kakinada', 'Port Railway Station', 16.9438562, 82.2437296, '1200 sq. yards ', 0, 'yes', 0, 0, 0, 0, 'select', 'East', 'select', '', 'Offered: 1200 sq. yards near Dairy form centre towards Port Rail Station.useful for companies 100 feet road facing (East).\r\n900 sq. yards near Vakalapudi mail raod useful for companies for lease or for sale.', '2009-07-08', 'a'),
(145, 0, 'admin', 'LS96249', '3', '5', '', 'India', 'Kakinada', 'Vakalapudi', 17.0028250, 82.2624037, '1200 sft in 266 SqYards.', 36, 'yes', 2, 0, 0, 0, 'furnished', 'East', 'select', '7', 'Offered: West facing 2Br Independent house for sale in srinivasa nagar,vakalapudi,kakinada.\r\nBuilt up area 1200 sft in 266 SqYards.\r\nwith wood work and Marble floring.\r\nCar parking is available.\r\nRate - 36 Lacs.', '2009-07-08', 'a'),
(146, 0, 'admin', 'LS76533', '3', '2', '', 'India', 'Kakinada', 'Gandhi Nagar', 16.9662011, 82.2243712, '', 0, 'yes', 0, 0, 5, 0, 'select', '', 'select', '', 'Offered: Offered:2bed,3bed luxury apartment for sale(1st,3rd,4th,5th floors), gandhi nager opp; gandhi nagar park , modern dwaraka residency, gandhi nager ,kakinada ', '2009-07-08', 'a'),
(147, 0, 'admin', 'LS46927', '3', '2', '', 'India', 'Kakinada', 'Gandhi Nagar', 16.9662011, 82.2243712, '', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: apartment for gandhi nager opp; gandhi nagar park , modern dwaraka residency, gandhi nager ,kakinada', '2009-07-08', 'a'),
(148, 0, 'admin', 'LS75446', '3', '3', '', 'India', 'Kakinada', 'Ramarao pet', 16.9580459, 82.2354180, '6OO SFT', 105000, 'yes', 0, 1, 0, 0, 'furnished', 'North', 'select', '2', 'Offered: NORTH FACING, 6OO SFT, LIFT FACILITY, FIRST FLOOR, WELL FURNISHED, SEELING POP, ALTEK PAINT, FLAT COST 105000/-', '2009-07-08', 'a'),
(149, 0, 'admin', 'LS69423', '3', '3', '', 'India', 'Kakinada', 'Sarpavaram Junction', 16.9695443, 82.2369371, '', 0, 'yes', 2, 0, 0, 0, 'select', '', 'select', '2,7,10', 'Offered: 2 BHK With Vitrified flooring ,false ceiling, lighting arrangement, 2 toilets westren and indian. hall dining area kitchen 2 Bedrooms, 1 Balcony wash area and dry area. good garden around for kids play . Dedicated Carpark area. The apartment building has residents working in Reliance,ONGC and Educational Institutes. fully functional lift.', '2009-07-08', 'a'),
(150, 0, 'admin', 'LS79665', '3', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '266 Sq yards', 12, 'yes', 0, 0, 0, 0, 'select', 'South', 'select', '', 'Offered: 266 Sq yards south facing plot at Superior Employees Colony first street, Opposite to Water Tank near Dairy Form Center. 12,000/- per sq yard. ', '2009-07-08', 'a'),
(151, 0, 'admin', 'LS93119', '3', '10', '', 'India', 'Kakinada', 'Bhanugudi Junction', 16.9697142, 82.2384300, '1300sqyards ', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: 1300sqyards Commercial site located at 100mtrs from Bhanu gudi jn. towards railway station, available for sale.', '2009-07-08', 'a'),
(152, 0, 'admin', 'LS63416', '3', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '310 Sq yards', 10, 'yes', 0, 0, 0, 0, 'select', 'South', 'select', '', 'Offered: 310 Sq yards south face site at rajeswari nager, 10,000/- per sq yards,', '2009-07-08', 'a'),
(153, 0, 'admin', 'LS48532', '3', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '333 sq yds', 0, 'yes', 0, 0, 0, 0, 'select', 'East', 'select', '', 'Offered: Gpr phase 1, east facing, 40*56=333 sq yds, each sq yd 1750/-, LP NO 73/2000. ', '2009-07-08', 'a'),
(154, 0, 'admin', 'LS81542', '3', '5', '', 'India', 'Kakinada', 'Vakalapudi', 17.0028250, 82.2624037, '1200 sft in 266 SqYards.', 36, 'yes', 0, 0, 0, 0, 'furnished', 'West', 'select', '7', 'Offered: West facing 2Br Independent house for sale in srinivasa nagar,vakalapudi,kakinada.\r\nBuilt up area 1200 sft in 266 SqYards.\r\nwith wood work and Marble floring.\r\nCar parking is available.\r\nRate - 36 Lacs.', '2009-07-08', 'a'),
(155, 0, 'admin', 'LS42559', '3', '3', '', 'India', 'Kakinada', 'Main Road', 16.9695443, 82.2369371, '416Sq.Ydd ', 1, 'yes', 0, 0, 0, 0, 'select', 'North', 'select', '', 'Offered: For Sale\r\nSuitable for Apartment/Shopping Complex\r\n416Sq.Ydd North Facing(52X72)Square Bit(40 Feet Road)\r\n52Feet(Road.Facing)Length\r\n72Feet(Depth) Breadth\r\nSalipeta,Indanavari Street\r\nKakinada-533001', '2009-07-08', 'a'),
(156, 0, 'admin', 'LS31689', '3', '3', '', 'India', 'Kakinada', 'Railway Station Road', 16.9695443, 82.2369371, '', 0, 'yes', 2, 0, 0, 0, 'select', 'South', 'select', '', 'Offered: two bed roomed and duplex flat for sale in main road of kakinada . it is a group housing it conisists of seven flats all over it is located on railway station to rtc complex road south facing .', '2009-07-08', 'a'),
(157, 0, 'admin', 'LS28311', '3', '3', '', 'India', 'Kakinada', 'Atchampet Junction', 16.9695443, 82.2369371, '800(SY)', 3000, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: 800(SY)SITE FOR SALE NEAR ABD ROAD,ATCHAMPETA.WE ARE LOOKING TO SELL THE SITE AT 3000/SY ONLY.SITE LOCATED AT 3 FACINGS(NORTH,SOUTH,WEST),THE SITE HAVING 100 FEATS ROAD,THE SITE MEASUREMENTS 150" * 70.THE SITE IS VERY NEAR TO THE ATCHAMPETA-SAMARLAKOTA ADB ROAD.THE ASM SCHOOL IS SITYUATED NEAR THE SITE AND SOME INDUSTRIES AND COLLEGES ALSO WILL BE CONSTRUCTING. FULL DOCUMENTARY AND JENUNE SITE.', '2009-07-08', 'a'),
(158, 0, 'admin', 'LS81474', '3', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, '', 0, 'yes', 2, 0, 0, 0, 'select', '', 'select', '7', 'Offered: NEW 2 Bedroom Hall Kitchen FLAT 800Sq.ft FOR IMMEDIATE SALE,READY FOR OCCUPATION.CAR PARKING FACILITY AVAILABLE.Near Achytapuram Gate.', '2009-07-08', 'a'),
(159, 0, 'admin', 'LS99735', '3', '3', '', 'India', 'Kakinada', 'Vidyut Nagar', 16.9847979, 82.2316468, ' 750YARDS', 6500, '', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: DTP APPROVED LAY OUT SITES AT IDEAL COLLEGE BACK SIDE 3 SITES TOTAL YARDS 750YARDS, ALL SITES ARE SOUTH FACES,MESSURMENT 33X(67&69&71) , 6500/-PER SQ YARD ', '2009-07-08', 'a'),
(160, 0, 'admin', 'LS71279', '3', '3', '', 'India', 'Kakinada', 'Atchampet Junction', 16.9695443, 82.2369371, '200 SQ Yard', 2500, 'yes', 0, 0, 0, 0, 'select', '', 'select', '7', 'Offered: 200 SQ Yard Plot at Atchempeta beside Vinayaka temple.\r\n\r\nPrice: 2500 per Sq.Yard\r\n\r\nVery near to main road.\r\n', '2009-07-08', 'a'),
(161, 0, 'admin', 'LS92869', '3', '4', '', 'India', 'Kakinada', 'Main Road', 16.9695443, 82.2369371, '240 Sqyds', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: A 3 storey builing located in the heart of the city. Near to Vijaya Lakshmi Hospital, Main Road. Has got all the amenities.240 Sqyds ', '2009-07-08', 'a'),
(162, 0, 'admin', 'LS17854', '3', '3', '', 'India', 'Kakinada', 'Vakalapudi', 17.0028250, 82.2624037, '267 sq yards', 0, 'yes', 0, 0, 0, 0, 'select', 'West', 'select', '', 'Offered: West face, 40 ft x 60 ft= 267 sq yards.2nd street, Ganganagar, Back side of Surymahal (cine theatre).All leading Industries are near to 2 to 3kms. price: per sy 8,000/-\r\nwe will preffer the nearest offerers. ', '2009-07-08', 'a'),
(163, 0, 'admin', 'LS57191', '3', '10', '', 'India', 'Kakinada', 'Sarpavaram Junction', 16.9695443, 82.2369371, '226 yard ', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: A 226 yard Site for sale. just 1-2 kms away from Sarpavaram junction, kakinada.', '2009-07-08', 'a'),
(164, 0, 'admin', 'LS99663', '3', '3', '', 'India', 'Kakinada', 'Gandhi Nagar', 16.9662011, 82.2243712, '333sq', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: For on outright Sale of House on 500sq Yds plot+adjsent 333sq plot on main road near Ganghi Statue (RHS)\r\nExpected a minimum of Rs25000.00 per sq yd', '2009-07-08', 'a'),
(165, 0, 'admin', 'LS57193', '3', '3', '', 'India', 'Kakinada', 'Ramanayyapeta', 16.9695443, 82.2369371, ' 278 sq. yards', 0, 'yes', 0, 0, 0, 0, 'select', 'East', 'select', '', 'Offered: East facing 278 sq. yards 40 X 63 site located at Friends\r\nColony Near Ramanayya Peta is available for sale ', '2009-07-08', 'a'),
(166, 0, 'admin', 'LS63179', '3', '3', '', 'India', 'Kakinada', 'Gandhi Nagar', 16.9662011, 82.2243712, '', 0, 'yes', 2, 3, 0, 0, 'not', '', 'select', '2,7', 'Offered: New Deluxe Flat 3rd floor 2 Bed Room,Hall,Kitchen,Generator Backup for Lift & Common areas,Individual Walls Car Parking,Elevation Teak Door,Malaysian Sal Wood Finishing Windows,Marble Flooring to Entire Flat,Granite Flatform to Kitchen at Gandhi Nagar Park ', '2009-07-08', 'a'),
(167, 0, 'admin', 'LS65768', '3', '3', '', 'India', 'Kakinada', 'Sarpavaram Junction', 16.9695443, 82.2369371, '267 sqyds ', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: DTCP layout south facing 40*60=267 sqyds per sq yd 4800/- very near sarpavaram juction ready to construction usha kiran layout', '2009-07-08', 'a'),
(168, 0, 'admin', 'LS99634', '3', '3', '', 'India', 'Kakinada', 'Sarpavaram Junction', 16.9695443, 82.2369371, '200 sq yds', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: very near sarpavaram junction just 2 km north facing 30*60=200 sq yds per sq yd 5300/- ushakiran layout', '2009-07-08', 'a'),
(169, 0, 'admin', 'LS84868', '3', '3', '', 'India', 'Kakinada', 'Gandhi Nagar', 16.9662011, 82.2243712, '', 0, 'yes', 2, 3, 0, 0, 'select', '', 'select', '1,2,7', 'Offered: New Deluxe Flat 3rd floor 2 Bed Room,Hall,Kitchen,Generator Backup for Lift & Common areas with Car Parking,Elevation Teak Door,Malaysian Sal Wood Finishing Windows,Marble Flooring to Entire Flat,Granite Flatform to Kitchen at Gandhi Nagar Park For Sale Rs18lac', '2009-07-08', 'a'),
(170, 0, 'admin', 'LS76697', '3', '3', '', 'India', 'Kakinada', 'Gandhi Nagar', 16.9662011, 82.2243712, '', 0, 'yes', 2, 3, 0, 0, 'semi', '', 'select', '1,2,7', 'Offered: New Deluxe Flat 3rd floor 2 Bed Room,Hall,Kitchen,Generator Backup for Lift&Common areas with Car Parking,Elevation Teak Door,Malaysian Sal Wood Finishing Windows,Marble Flooring,Granite Flatform to Kitchen @Gandhi Nagar Park ', '2009-07-08', 'a'),
(171, 0, 'admin', 'LS88713', '3', '3', '', 'India', 'Kakinada', 'Atchampet Junction', 16.9695443, 82.2369371, '86 sq.yards', 0, 'yes', 0, 0, 0, 0, 'select', 'West', 'select', '', 'Offered: West Face\r\n86 sq.yards\r\nAdjacent to ADB Road\r\nNear Achampet Junction\r\nPitapuram Road', '2009-07-08', 'a'),
(172, 0, 'admin', 'LS35123', '3', '3', '', 'India', 'Kakinada', '', 16.9695443, 82.2369371, ' 245 Yards Plot', 0, 'yes', 0, 0, 0, 0, 'select', '', 'select', '', 'Offered: 245 Yards Plot, near Uma Mano Vikas Kendram, Kakinada for Sale.\r\nExpected price Rs.3500/-, slightly negotiable.', '2009-07-08', 'a'),
(173, 0, 'admin', 'LS83255', '3', '2', 'Apartment', 'India', 'Kakinada', 'Naga Vanam', 16.9695443, 82.2369371, '700', 9, 'No', 1, 13, 3, 2, 'furnished', 'North', '1', '1,2,3,6,9', '', '2009-07-21', 'a');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `real-reg`
--

INSERT INTO `real-reg` (`r_id`, `r_un`, `r_pw`, `r_name`, `r_cname`, `r_addr`, `r_web`, `country`, `location`, `r_email`, `r_ph1`, `r_ph2`, `r_type`, `sent1`, `sent2`, `r_date`, `r_income`, `r_img`, `r_status`) VALUES
(1, 'rama', 'rama59', 'rama', '', '', '', '101', '1', 'rama.3one@gmail.com', 2147483647, 0, '1', '', '', '2009-06-30', '', '', 'a'),
(2, 'sudeepthi', 'sudeepthi', 'sudeepthi', '', '', '', '101', '82', 'rv.sudeepthi@gmail.com', 2147483647, 0, '1', '', '', '2009-07-08', '', '', 'n'),
(3, 'prakash', 'prakash', 'prakash', 'prakash consultancy', 'kakinada', '', '101', '82', 'prakash@3one.in', 2147483647, 0, '4', 'on', 'on', '2009-07-21', '', '', 'n');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `real-requirement`
--


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
(1, 'kakinada', 'image.jpg', '2009-06-08'),
(2, 'kakinada', 'image1.jpg', '2009-06-08'),
(3, 'kakinada', 'image2.jpg', '2009-06-08'),
(4, 'kakinada', 'image3.jpg', '2009-06-08'),
(5, 'kkd', 'image4.jpg', '2009-06-08');

-- --------------------------------------------------------

--
-- Table structure for table `real_builders1`
--

CREATE TABLE IF NOT EXISTS `real_builders1` (
  `build_id` int(11) NOT NULL auto_increment,
  `build_city` varchar(100) NOT NULL,
  `build_img` varchar(200) NOT NULL,
  `buid_date` date NOT NULL,
  PRIMARY KEY  (`build_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `real_builders1`
--

INSERT INTO `real_builders1` (`build_id`, `build_city`, `build_img`, `buid_date`) VALUES
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `real_projects`
--

INSERT INTO `real_projects` (`proj_id`, `proj_city`, `proj_img`, `proj_date`) VALUES
(1, 'kakinada', 'images.jpg', '2009-06-08'),
(2, 'kakinada', 'images1.jpg', '2009-06-08'),
(3, 'kakinada', 'images4.jpg', '2009-06-08'),
(4, 'kakinada', 'images2.jpg', '2009-06-08'),
(5, 'kakinada', 'images3.jpg', '2009-06-08'),
(6, 'kakinada', 'tory.jpg', '2009-07-01'),
(7, 'kakinada', 'images.jpeg', '2009-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `real_projects1`
--

CREATE TABLE IF NOT EXISTS `real_projects1` (
  `proj_id` int(11) NOT NULL auto_increment,
  `proj_city` varchar(100) NOT NULL,
  `proj_img` varchar(200) NOT NULL,
  `proj_date` date NOT NULL,
  PRIMARY KEY  (`proj_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `real_projects1`
--

INSERT INTO `real_projects1` (`proj_id`, `proj_city`, `proj_img`, `proj_date`) VALUES
(1, 'kakinada', '3one1.JPG', '2009-06-08'),
(2, 'kakinada', '3one1.JPG', '2009-06-08'),
(3, 'kakinada', '3one1.JPG', '2009-06-08'),
(4, 'kakinada', '3one1.JPG', '2009-06-08'),
(5, 'kakinada', '3one1.JPG', '2009-06-08');

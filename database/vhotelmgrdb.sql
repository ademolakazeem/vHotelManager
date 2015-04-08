-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2015 at 12:53 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vhotelmgrdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_log_tbl`
--

CREATE TABLE IF NOT EXISTS `audit_log_tbl` (
  `comp_name` varchar(30) NOT NULL,
  `userFullname` varchar(255) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `datelog` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip_addr` varchar(20) NOT NULL,
  `operation` longtext NOT NULL,
  `host` varchar(200) NOT NULL,
  `referer` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit_log_tbl`
--

INSERT INTO `audit_log_tbl` (`comp_name`, `userFullname`, `user_id`, `datelog`, `ip_addr`, `operation`, `host`, `referer`) VALUES
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-04-06 01:29:19', '::1', 'User Oluwagbemiro Diamond Successfully logged out', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/index.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-04-06 01:29:41', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php?r=bG9nb3V0'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-04-06 11:41:31', '::1', 'User admin added a new room feature - 1', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/room_setup.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-04-06 11:49:07', '::1', 'User admin added a new room feature - 2', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/room_setup.php');

-- --------------------------------------------------------

--
-- Table structure for table `bar_setup_tbl`
--

CREATE TABLE IF NOT EXISTS `bar_setup_tbl` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_type` varchar(255) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `item_rate` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `threshold` int(11) NOT NULL,
  `created_date` timestamp NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `bar_setup_tbl`
--

INSERT INTO `bar_setup_tbl` (`item_id`, `item_type`, `item_name`, `item_rate`, `quantity`, `threshold`, `created_date`) VALUES
(1, 'Drink', 'Champagne ', '30', 40, 30, '2015-03-26 16:06:15'),
(2, 'Drink', '33 Lergar Beer', '20,000', 500, 400, '2015-03-26 17:41:31');

-- --------------------------------------------------------

--
-- Table structure for table `bar_tbl`
--

CREATE TABLE IF NOT EXISTS `bar_tbl` (
  `bar_item_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity_bought` int(11) NOT NULL,
  `rate` double NOT NULL,
  `total` double NOT NULL,
  `attended_to_by` varchar(255) NOT NULL,
  `date_bought` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hall_feature_tbl`
--

CREATE TABLE IF NOT EXISTS `hall_feature_tbl` (
  `hall_feature_id` int(11) NOT NULL AUTO_INCREMENT,
  `feature_name` varchar(225) NOT NULL,
  `feature_description` text NOT NULL,
  `feature_rate` varchar(200) NOT NULL,
  `created_date` timestamp NOT NULL,
  PRIMARY KEY (`hall_feature_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `hall_feature_tbl`
--

INSERT INTO `hall_feature_tbl` (`hall_feature_id`, `feature_name`, `feature_description`, `feature_rate`, `created_date`) VALUES
(1, 'Ambassador Bolaji Raimi Hall', '&lt;p&gt;Full tight Air Conditional&lt;/p&gt;\r\n\r\n&lt;p&gt;50,000 capacity&lt;/p&gt;\r\n\r\n&lt;p&gt;70,000 Seats&lt;/p&gt;\r\n\r\n&lt;p&gt;Pulpit among others&lt;/p&gt;\r\n', '40', '2015-03-24 18:36:38'),
(2, 'Chief Fortune Diamond Hall', '&lt;p&gt;100,000 Seats&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;Full tight Air conditional&lt;/p&gt;\r\n\r\n&lt;p&gt;Flat Screen Televisions and projector&lt;/p&gt;\r\n', '100,000', '2015-03-24 18:47:17');

-- --------------------------------------------------------

--
-- Table structure for table `hall_reservation_tbl`
--

CREATE TABLE IF NOT EXISTS `hall_reservation_tbl` (
  `hall_reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(250) NOT NULL,
  `client_address` text NOT NULL,
  `client_email` varchar(50) NOT NULL,
  `client_phone` varchar(50) NOT NULL,
  `purpose_of_use` varchar(255) NOT NULL,
  `date_time_start` datetime NOT NULL,
  `date_time_end` datetime NOT NULL,
  `feature_id` int(11) NOT NULL,
  `rate` double NOT NULL,
  `hall_id` int(11) NOT NULL,
  PRIMARY KEY (`hall_reservation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hall_setup_tbl`
--

CREATE TABLE IF NOT EXISTS `hall_setup_tbl` (
  `hall_id` int(11) NOT NULL AUTO_INCREMENT,
  `hall_number` varchar(200) NOT NULL,
  `hall_name` varchar(255) NOT NULL,
  `hall_feature_id` int(11) NOT NULL,
  `availability` varchar(50) NOT NULL,
  `created_date` timestamp NOT NULL,
  PRIMARY KEY (`hall_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `hall_setup_tbl`
--

INSERT INTO `hall_setup_tbl` (`hall_id`, `hall_number`, `hall_name`, `hall_feature_id`, `availability`, `created_date`) VALUES
(1, '', 'dsafadf', 1, 'Available', '2015-03-25 13:52:11'),
(2, '', 'Victor Olatunde Presidential Hall', 2, 'Available', '2015-03-25 13:54:58');

-- --------------------------------------------------------

--
-- Table structure for table `roles_tbl`
--

CREATE TABLE IF NOT EXISTS `roles_tbl` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `acclevel` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `roles_tbl`
--

INSERT INTO `roles_tbl` (`id`, `name`, `acclevel`) VALUES
(1, 'Administrator', 1),
(2, 'Manager', 2),
(3, 'Receptionist', 3),
(4, 'Chairman', 4);

-- --------------------------------------------------------

--
-- Table structure for table `room_feature_tbl`
--

CREATE TABLE IF NOT EXISTS `room_feature_tbl` (
  `feature_id` int(11) NOT NULL AUTO_INCREMENT,
  `feature_name` varchar(200) NOT NULL,
  `full_description` text NOT NULL,
  `rate` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`feature_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `room_feature_tbl`
--

INSERT INTO `room_feature_tbl` (`feature_id`, `feature_name`, `full_description`, `rate`, `created_date`) VALUES
(6, 'Double Standard', 'Double bed for family, standard bathroom and toilet, flatscreen TV, etc', '0', '2015-03-21 13:39:47'),
(7, 'Standard Room', 'family bed, reading table, flatscreentv,etc', '0', '2015-03-21 13:41:19'),
(14, 'Deluxe Standard', '&lt;ul&gt;\r\n	&lt;li style=&quot;line-height: 20.7999992370605px;&quot;&gt;Family bed&lt;/li&gt;\r\n	&lt;li style=&quot;line-height: 20.7999992370605px;&quot;&gt;Reading table&lt;/li&gt;\r\n	&lt;li style=&quot;line-height: 20.7999992370605px;&quot;&gt;Flatscreentv&lt;/li&gt;\r\n	&lt;li style=&quot;line-height: 20.7999992370605px;&quot;&gt;Fridge&lt;/li&gt;\r\n	&lt;li style=&quot;line-height: 20.7999992370605px;&quot;&gt;Hot bath&lt;/li&gt;\r\n	&lt;li style=&quot;line-height: 20.7999992370605px;&quot;&gt;Automatic A/C&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', '20,000', '2015-03-23 14:29:06'),
(15, 'Royal Suite', '&lt;p&gt;Family bed&lt;/p&gt;\r\n\r\n&lt;p&gt;Hot Bath&lt;/p&gt;\r\n\r\n&lt;p&gt;Flatscreen Television&lt;/p&gt;\r\n\r\n&lt;p&gt;Mirror&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n', '30,000', '2015-03-23 23:04:54');

-- --------------------------------------------------------

--
-- Table structure for table `room_reservation_tbl`
--

CREATE TABLE IF NOT EXISTS `room_reservation_tbl` (
  `room_reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(200) NOT NULL,
  `client_address` varchar(100) NOT NULL,
  `client_phone` int(11) NOT NULL,
  `client_email` int(11) NOT NULL,
  `room_number` int(11) NOT NULL,
  `rate` double NOT NULL,
  `number_of_people` int(11) NOT NULL,
  `date_time_in` datetime NOT NULL,
  `number_of_days` int(11) NOT NULL,
  `date_time_out` datetime NOT NULL,
  `visit_purpose` text NOT NULL,
  `car_reg_number` varchar(50) NOT NULL,
  `car_model` varchar(50) NOT NULL,
  `car_color` varchar(50) NOT NULL,
  `attended_to_by` int(11) NOT NULL,
  PRIMARY KEY (`room_reservation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `room_setup_tbl`
--

CREATE TABLE IF NOT EXISTS `room_setup_tbl` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_number` int(11) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `floor_number` varchar(100) NOT NULL,
  `feature_id` int(11) NOT NULL,
  `availability` varchar(50) NOT NULL,
  `created_date` timestamp NOT NULL,
  PRIMARY KEY (`room_id`),
  UNIQUE KEY `room_number` (`room_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `room_setup_tbl`
--

INSERT INTO `room_setup_tbl` (`room_id`, `room_number`, `room_name`, `floor_number`, `feature_id`, `availability`, `created_date`) VALUES
(1, 1, 'Room 1', '', 6, 'Available', '2015-04-06 10:50:13'),
(3, 2, 'Room 2', '', 7, 'Available', '2015-04-06 10:50:18');

-- --------------------------------------------------------

--
-- Table structure for table `user_permission_tbl`
--

CREATE TABLE IF NOT EXISTS `user_permission_tbl` (
  `username` varchar(200) NOT NULL,
  `permission_id` int(11) NOT NULL,
  KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_permission_tbl`
--

INSERT INTO `user_permission_tbl` (`username`, `permission_id`) VALUES
('Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE IF NOT EXISTS `users_tbl` (
  `id` int(35) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `dep` varchar(50) NOT NULL,
  `acclevel` varchar(5) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city_town` varchar(70) NOT NULL,
  `imagepath` varchar(255) NOT NULL,
  `imagepathavatar` varchar(255) NOT NULL,
  `phone` varchar(18) NOT NULL,
  `datereg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `about_me` text NOT NULL,
  `updated_date` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `acclevel` (`acclevel`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`id`, `username`, `user_id`, `fname`, `lname`, `password`, `sex`, `dob`, `dep`, `acclevel`, `email`, `address`, `city_town`, `imagepath`, `imagepathavatar`, `phone`, `datereg`, `about_me`, `updated_date`) VALUES
(1, 'Admin', 'VHM201204041144458372', 'Oluwagbemiro', 'Diamond', 'd96ada9f959d34d7d9a00c74fd2ffbb662a6646e', 'Male', '07-02-1989', 'ICT', '1', 'diamonddemola@yahoo.co.uk', 'No 666, Forbes Crescent, Lekki                                          ', 'Lagos', '../../imgs/uploads/user/VHM201204041144458372_moril.jpg', '../../imgs/uploads/userAvatar/VHM201204041144458372_moril.jpg', '0802334563453434', '2012-12-09 00:58:32', 'Vibrant, Articulate, Astute and Talented Young Software Engineer.                                                                                        ', '2015-04-05 11:58:50'),
(4, 'forbes.diamond', 'VHM201504031144458372', 'Forbes Diamond', '', 'bc6540f4a42842eee3374ddc9c66f7ddf1581d1f', 'Male', '03-04-2015', '', '2', 'w.ademola.kazeem@gmail.com', '&lt;p&gt;No 1, Ademola Diamond crescent,&lt;/p&gt;\r\n', '', '', '', '07038548808', '2015-04-03 10:44:45', '', '0000-00-00 00:00:00'),
(5, 'johnson.cooker', 'VHM201504032028048512', 'Johnson Cooker', '', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', ' &gt;-', '26-08-1993', '', '4', 'johnson.cooker@gmail.com', '&lt;p&gt;No 4354, Oriade street Magodo&lt;/p&gt;\r\n', '', '', '', '07038548889', '2015-04-03 19:28:04', '', '0000-00-00 00:00:00'),
(6, 'Mathew.Davids', 'VHM201504032032295739', 'Mathew Davids', '', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', ' &gt;-', '01-02-2012', '', '3', 'mathew.davids@gmail.com', '&lt;p&gt;No 4354, Lucan Island, Ijebu&lt;/p&gt;\r\n', '', '', '', '07038545589', '2015-04-03 19:32:29', '', '0000-00-00 00:00:00'),
(7, 'DavidsBabayi', 'VHM201504032036162434', 'Davids Babayi', '', '8cb2237d0679ca88db6464eac60da96345513964', ' &gt;-', '01-05-1979', '', '4', 'DavidsBabayi@gmail.com', '&lt;p&gt;No 4354, Lucan Island, Ijebu&lt;/p&gt;\r\n', '', '', '', '07038545589', '2015-04-03 19:36:16', '', '0000-00-00 00:00:00'),
(8, 'BabayiAudu', 'VHM201504032049083132', 'Babayi Audu', '', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', ' &gt;-', '01-02-1996', '', '4', 'BabayiAudu@gmail.com', '&lt;p&gt;afasdfaf&lt;/p&gt;\r\n', '', '', '', '07038445589', '2015-04-03 19:49:08', '', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2015 at 07:52 PM
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
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-04-06 11:49:07', '::1', 'User admin added a new room feature - 2', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/room_setup.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-04-06 16:03:40', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php?r=dWFz'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-04-06 16:04:17', '::1', 'User Oluwagbemiro Diamond Successfully logged out', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/index.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-04-06 16:04:18', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php?r=bG9nb3V0'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-04-06 16:08:30', '::1', 'User Oluwagbemiro Diamond Successfully logged out', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/index.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-04-06 16:08:32', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php?r=bG9nb3V0'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-04-07 16:14:15', '::1', 'User Oluwagbemiro Diamond Successfully logged out', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/profile.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-04-07 16:14:24', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php?r=dWFz'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-04-09 15:28:44', '::1', 'User Oluwagbemiro Diamond Successfully logged out', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/room_reservation.php?room_number=1'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-04-09 15:28:58', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-04-12 00:00:05', '::1', 'User admin added a new user - admin', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/room_reservation.php?room_number=1'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-04-12 00:16:39', '::1', 'User admin added a new room feature - 200', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/room_setup.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-04-12 00:17:27', '::1', 'User admin added a new room feature - 300', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/room_setup.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-04-12 00:18:32', '::1', 'User admin added a new room feature - 201', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/room_setup.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-04-12 01:24:33', '::1', 'User admin added a new user - admin', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/room_reservation.php?room_number=200'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-04-12 01:45:36', '::1', 'User admin added a new user - admin', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/room_reservation.php?room_number=300'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-04-12 02:02:26', '::1', 'User admin added a new user - admin', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/room_reservation.php?room_number=300'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-04-12 02:05:10', '::1', 'User admin added a new user - admin', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/room_reservation.php?room_number=201'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-04-12 02:15:45', '::1', 'User admin added a new user - admin', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/room_reservation.php?room_number=201'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-04-12 02:25:09', '::1', 'User admin added a new user - admin', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/room_reservation.php?room_number=300'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-04-12 02:30:20', '::1', 'User admin added a new user - admin', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/room_reservation.php?room_number=201'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-04-12 02:35:21', '::1', 'User admin added a new user - admin', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/room_reservation.php?room_number=200'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-04-14 19:18:39', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-04-16 19:25:52', '::1', 'User admin added a new hall information - Johnson Jack Banquet Hall', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/hall_setup.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-04-16 19:33:27', '::1', 'User admin added a new hall information - Airforce Modern Hall', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/hall_setup.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-04-17 22:09:13', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-04-17 22:27:05', '::1', 'User admin added a new user - admin', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/hall_reservation.php?hall_number=2'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-01 08:59:03', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-03 12:46:55', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-03 13:00:19', '::1', 'User Oluwagbemiro Diamond Successfully logged out', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/profile-edit.php');

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
  `quantity_available` int(11) NOT NULL,
  `threshold` int(11) NOT NULL,
  `created_by` varchar(200) NOT NULL,
  `created_date` timestamp NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `bar_setup_tbl`
--

INSERT INTO `bar_setup_tbl` (`item_id`, `item_type`, `item_name`, `item_rate`, `quantity`, `quantity_available`, `threshold`, `created_by`, `created_date`) VALUES
(1, 'Drink', 'Champagne ', '10000', 100, 100, 30, '', '2015-04-19 10:13:43'),
(2, 'Drink', '33 Lergar Beer', '370', 1000, 1000, 400, '', '2015-04-19 10:12:49');

-- --------------------------------------------------------

--
-- Table structure for table `bar_tbl`
--

CREATE TABLE IF NOT EXISTS `bar_tbl` (
  `bar_item_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity_sold` int(11) NOT NULL,
  `rate` double NOT NULL,
  `total` double NOT NULL,
  `attended_to_by` varchar(255) NOT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bar_tbl`
--

INSERT INTO `bar_tbl` (`bar_item_id`, `item_id`, `quantity_sold`, `rate`, `total`, `attended_to_by`, `date_created`, `date_updated`) VALUES
(0, 2, 200, 370, 74, 'admin', '2015-05-01 23:05:23', '2015-05-01 22:05:23'),
(0, 2, 10, 370, 3, 'admin', '2015-05-02 11:52:05', '2015-05-02 10:52:05');

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
(1, 'Standard Hall', 'Full tight Air Conditional', '40', '2015-04-16 15:09:33'),
(2, 'Diamond Banquet Hall', 'Full tight Air conditional, Flat Screen Televisions and projector\r\n', '100,000', '2015-04-16 15:15:31');

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
  `start_date` varchar(255) NOT NULL,
  `startTime` time NOT NULL,
  `no_of_days` int(11) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `end_time` time NOT NULL,
  `feature_id` int(11) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `hall_number` int(11) NOT NULL,
  `price_paid` varchar(255) NOT NULL,
  `attended_to_by` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`hall_reservation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `hall_reservation_tbl`
--

INSERT INTO `hall_reservation_tbl` (`hall_reservation_id`, `client_name`, `client_address`, `client_email`, `client_phone`, `purpose_of_use`, `start_date`, `startTime`, `no_of_days`, `end_date`, `end_time`, `feature_id`, `rate`, `hall_number`, `price_paid`, `attended_to_by`, `created_date`) VALUES
(1, 'Jackson Cooper', 'Union Building, No 389, Broad street, Lagos                                                                                                ', 'Jackson.Cooper@cooperfield.com', '08077112345', ' Wedding                                                                                       ', '17-04-2015', '22:23:30', 3, '20-04-2015', '22:23:30', 0, '100000', 2, '300,000.00', 'admin', '2015-04-17 22:27:05');

-- --------------------------------------------------------

--
-- Table structure for table `hall_setup_tbl`
--

CREATE TABLE IF NOT EXISTS `hall_setup_tbl` (
  `hall_number` int(11) NOT NULL AUTO_INCREMENT,
  `hall_name` varchar(255) NOT NULL,
  `hall_feature_id` int(11) NOT NULL,
  `availability` varchar(50) NOT NULL,
  `created_date` timestamp NOT NULL,
  PRIMARY KEY (`hall_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `hall_setup_tbl`
--

INSERT INTO `hall_setup_tbl` (`hall_number`, `hall_name`, `hall_feature_id`, `availability`, `created_date`) VALUES
(1, 'Yatch Hall', 1, 'Available', '2015-04-16 18:26:36'),
(2, 'Victor Olatunde Presidential Hall', 2, 'Available', '2015-04-16 18:27:00'),
(3, 'Johnson Jack Banquet Hall', 2, 'Available', '2015-04-16 19:25:52'),
(4, 'Airforce Modern Hall', 2, 'Available', '2015-04-16 19:33:27');

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
  `discounts` varchar(250) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`feature_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `room_feature_tbl`
--

INSERT INTO `room_feature_tbl` (`feature_id`, `feature_name`, `full_description`, `rate`, `discounts`, `created_date`) VALUES
(6, 'Double Standard', 'Double bed for family, standard bathroom and toilet, flatscreen TV, etc', '5500', '', '2015-03-21 13:39:47'),
(7, 'Standard Room', 'family bed, reading table, flatscreentv,etc', '0', '', '2015-03-21 13:41:19'),
(14, 'Deluxe Standard', '&lt;ul&gt;\r\n	&lt;li style=&quot;line-height: 20.7999992370605px;&quot;&gt;Family bed&lt;/li&gt;\r\n	&lt;li style=&quot;line-height: 20.7999992370605px;&quot;&gt;Reading table&lt;/li&gt;\r\n	&lt;li style=&quot;line-height: 20.7999992370605px;&quot;&gt;Flatscreentv&lt;/li&gt;\r\n	&lt;li style=&quot;line-height: 20.7999992370605px;&quot;&gt;Fridge&lt;/li&gt;\r\n	&lt;li style=&quot;line-height: 20.7999992370605px;&quot;&gt;Hot bath&lt;/li&gt;\r\n	&lt;li style=&quot;line-height: 20.7999992370605px;&quot;&gt;Automatic A/C&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', '20,000', '', '2015-03-23 14:29:06'),
(15, 'Royal Suite', '&lt;p&gt;Family bed&lt;/p&gt;\r\n\r\n&lt;p&gt;Hot Bath&lt;/p&gt;\r\n\r\n&lt;p&gt;Flatscreen Television&lt;/p&gt;\r\n\r\n&lt;p&gt;Mirror&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n', '30,000', '', '2015-03-23 23:04:54');

-- --------------------------------------------------------

--
-- Table structure for table `room_reservation_tbl`
--

CREATE TABLE IF NOT EXISTS `room_reservation_tbl` (
  `room_reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(200) NOT NULL,
  `client_address` varchar(100) NOT NULL,
  `client_phone` varchar(255) NOT NULL,
  `client_email` varchar(150) NOT NULL,
  `room_number` int(11) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `number_of_people` int(11) NOT NULL,
  `date_in` varchar(100) NOT NULL,
  `time_in` time NOT NULL,
  `number_of_days` int(11) NOT NULL,
  `date_out` varchar(100) NOT NULL,
  `time_out` time NOT NULL DEFAULT '12:00:00',
  `visit_purpose` text NOT NULL,
  `car_reg_number` varchar(50) NOT NULL,
  `car_model` varchar(50) NOT NULL,
  `car_color` varchar(50) NOT NULL,
  `price_paid` varchar(255) NOT NULL,
  `attended_to_by` varchar(250) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`room_reservation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `room_reservation_tbl`
--

INSERT INTO `room_reservation_tbl` (`room_reservation_id`, `client_name`, `client_address`, `client_phone`, `client_email`, `room_number`, `rate`, `number_of_people`, `date_in`, `time_in`, `number_of_days`, `date_out`, `time_out`, `visit_purpose`, `car_reg_number`, `car_model`, `car_color`, `price_paid`, `attended_to_by`, `date_created`) VALUES
(6, 'safawef', '          asfasdfas                                                                                 ', '2147483647', 'a.b@cem.now', 201, '30', 2, '0000-00-00', '02:15:00', 5, '0000-00-00', '12:00:00', 'Business', 'asdfasdfa', 'asfdasfdsa', 'asdfasfassadf', '150', 'admin', '2015-04-12 02:15:45'),
(7, 'Johnson Ashaolu', 'No 29, Ashaolu Avenue, Festac Town, Ede                                                             ', '08037659910', 'johnson.ashaolu@vhotelmanager.com', 300, '20000', 2, '12-04-2015', '02:23:15', 2, '14-04-2015', '12:00:00', 'Other', 'BH-343-FTD', 'Range Rover Sport 2015 model', 'White', '40', 'admin', '2015-04-12 02:25:09'),
(8, 'Olumide Ajayi', 'No 480, Akinyele Villa, Esa Oke, Ilesha, Osun State Nigeria                                         ', '08077154410', 'oajayi@vhotelmanager.com', 201, '30000', 2, '12-04-2015', '02:28:15', 3, '15-04-2015', '12:00:00', 'Business', 'IS-343-FOB', 'E-Class Benz 2017', 'Green', '90000', 'admin', '2015-04-12 02:30:20'),
(9, 'Adewole Kayode', 'No 89, Jackson street, London         ', '08077112345', 'adewole.kayode@vhotelmanager.com', 200, '20,000.00', 3, '12-04-2015', '02:33:30', 5, '17-04-2015', '12:00:00', 'Business', 'YQ-343-KAZ', 'Volkswagen Bettle', 'Pink', '100,000.00', 'admin', '2015-04-12 02:35:21');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `room_setup_tbl`
--

INSERT INTO `room_setup_tbl` (`room_id`, `room_number`, `room_name`, `floor_number`, `feature_id`, `availability`, `created_date`) VALUES
(1, 1, 'Room 1', '', 6, 'Available', '2015-04-06 10:50:13'),
(3, 2, 'Room 2', '', 7, 'Available', '2015-04-06 10:50:18'),
(4, 200, 'Room200', '', 14, 'Available', '2015-04-12 00:16:38'),
(5, 300, 'Room300', '', 14, 'Available', '2015-04-12 00:17:27'),
(6, 201, 'Room 201', '', 15, 'Available', '2015-04-12 00:18:32');

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

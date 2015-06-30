-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2015 at 11:20 AM
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
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-03 13:00:19', '::1', 'User Oluwagbemiro Diamond Successfully logged out', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/profile-edit.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-10 19:36:48', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-12 14:23:11', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-12 15:08:35', '::1', 'User admin added a new user - admin', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/new_bar_item.php?item_id=2'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-12 20:48:27', '::1', 'User Oluwagbemiro Diamond Successfully logged out', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/hall_reservation.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-12 20:49:04', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-13 18:52:02', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php?r=ZmFpbGVk'),
('FORBESDIAMOND', 'Demo Verde', 'VHM201204041144458372', '2015-05-17 22:43:53', '::1', 'User admin updated client information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_room_reservation.php?clt_id=6&room_number=300'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-18 14:14:26', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-18 14:50:34', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Demo Verde', 'VHM201204041144458372', '2015-05-18 15:14:49', '::1', 'User Demo Verde Successfully logged out', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/bar_setup.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-18 15:16:39', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-18 16:37:42', '::1', 'User admin updated client information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_room_reservation.php?clt_id=6&room_number=201'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-18 18:42:56', '::1', 'User admin updated client information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_room_reservation.php?clt_id=6'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-18 18:43:56', '::1', 'User admin updated client information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_room_reservation.php?clt_id=6'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-19 09:41:15', '::1', 'User admin updated client information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_room_reservation.php?clt_id=7&room_number=1'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-21 09:32:10', '::1', 'User admin updated client:Jackson CooperII hall information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_hall_reservation.php?clt_id=1&hall_number=4'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-22 13:43:12', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-24 17:58:16', '::1', 'User admin added a new Bar Item information - Eva Water', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/bar_setup.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-24 17:59:28', '::1', 'User admin added a new Bar Item information - Shawarma', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/bar_setup.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-24 18:09:04', '::1', 'User admin added a new Bar Item information - Chicken and Chips Big', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/bar_setup.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-24 18:09:25', '::1', 'User admin added a new Bar Item information - Chicken and Chips Medium', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/bar_setup.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-24 18:09:55', '::1', 'User admin added a new Bar Item information - Fish and Chips Big', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/bar_setup.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-24 18:10:06', '::1', 'User admin added a new Bar Item information - Fish and Chips Medium', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/bar_setup.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-24 18:10:29', '::1', 'User admin added a new user - admin', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/new_bar_item.php?item_id=3'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-24 18:20:49', '::1', 'User admin added a new user - admin', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/new_bar_item.php?item_id=4'),
('FORBESDIAMOND', 'Isola Ademola', 'VHM201204041144458372', '2015-05-25 18:16:01', '::1', 'User Demola added a new user - Demola', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/new_bar_item.php?item_id=1'),
('FORBESDIAMOND', 'Isola Ademola', 'VHM201204041144458372', '2015-05-25 18:16:13', '::1', 'User Demola added a new user - Demola', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/new_bar_item.php?item_id=2'),
('FORBESDIAMOND', 'Isola Ademola', 'VHM201204041144458372', '2015-05-25 18:16:19', '::1', 'User Demola added a new user - Demola', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/new_bar_item.php?item_id=3'),
('FORBESDIAMOND', 'Isola Ademola', 'VHM201204041144458372', '2015-05-25 18:16:26', '::1', 'User Demola added a new user - Demola', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/new_bar_item.php?item_id=5'),
('FORBESDIAMOND', 'Isola Ademola', 'VHM201204041144458372', '2015-05-25 18:16:32', '::1', 'User Demola added a new user - Demola', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/new_bar_item.php?item_id=6'),
('FORBESDIAMOND', 'Isola Ademola', 'VHM201204041144458372', '2015-05-25 18:16:39', '::1', 'User Demola added a new user - Demola', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/new_bar_item.php?item_id=7'),
('FORBESDIAMOND', 'Isola Ademola', 'VHM201204041144458372', '2015-05-25 18:16:46', '::1', 'User Demola added a new user - Demola', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/new_bar_item.php?item_id=8'),
('FORBESDIAMOND', 'Isola Ademola', 'VHM201204041144458372', '2015-05-25 18:23:55', '::1', 'User Demola added a new user - Demola', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/new_bar_item.php?item_id=1'),
('FORBESDIAMOND', 'Isola Ademola', 'VHM201204041144458372', '2015-05-25 18:26:29', '::1', 'User Demola added a new user - Demola', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/new_bar_item.php?item_id=1'),
('FORBESDIAMOND', 'Isola Ademola', 'VHM201204041144458372', '2015-05-25 18:28:45', '::1', 'User Demola added a new user - Demola', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/new_bar_item.php?item_id=1'),
('FORBESDIAMOND', 'Isola Ademola', 'VHM201204041144458372', '2015-05-25 18:34:05', '::1', 'User Demola added a new user - Demola', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/new_bar_item.php?item_id=1'),
('FORBESDIAMOND', 'Isola Ademola', 'VHM201204041144458372', '2015-05-25 18:47:31', '::1', 'User Demola added a new user - Demola', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/new_bar_item.php?item_id=2'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-26 14:59:50', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-26 15:43:40', '::1', 'User admin updated :Deluxe Standard II  room feature information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_room_feature.php?accfea_id=14'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-27 12:17:02', '::1', 'User admin updated :Double Standard room feature information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_room_feature.php?accfea_id=6'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-27 12:19:34', '::1', 'User admin updated :Double Standard room feature information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_room_feature.php?accfea_id=6'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-27 19:28:28', '::1', 'User admin added a new Bar Item information - Rice and Chicken', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/bar_setup.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-27 19:28:48', '::1', 'User admin added a new user - admin', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/new_bar_item.php?item_id=9'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-28 15:06:13', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-28 15:30:34', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-28 17:38:39', '::1', 'User admin updated :Room203 room setup information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_room_setup.php?room_id=4'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-30 13:28:15', '::1', 'User admin updated :Room 2 room setup information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_room_setup.php?room_id=3'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-30 13:28:34', '::1', 'User admin updated :Room203 room setup information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_room_setup.php?room_id=4'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-30 13:28:46', '::1', 'User admin updated :Room 201 room setup information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_room_setup.php?room_id=6'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-30 13:29:03', '::1', 'User admin updated :Room 201 room setup information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_room_setup.php?room_id=6'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-30 13:29:24', '::1', 'User admin updated :Room 2 room setup information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_room_setup.php?room_id=3'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-30 13:29:38', '::1', 'User admin updated :Room 201 room setup information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_room_setup.php?room_id=6'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-30 13:29:51', '::1', 'User admin updated :Room 201 room setup information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_room_setup.php?room_id=6'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-30 13:30:20', '::1', 'User admin updated :Room 202 room setup information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_room_setup.php?room_id=6'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-30 14:19:46', '::1', 'User admin updated :Royal Suite room feature information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_room_feature.php?accfea_id=15'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-31 19:32:47', '::1', 'User admin updated :Diamond Banquet Hall hall feature information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_hall_feature.php?hallFea_id=2'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-05-31 19:48:44', '::1', 'User admin updated :Standard Hall hall feature information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_hall_feature.php?hallFea_id=1'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-02 10:19:59', '::1', 'User admin updated :Revd Father Mike Akgboghiran Hall room setup information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_hall_setup.php?hall_number=4'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-02 10:23:20', '::1', 'User admin updated :Johnson Jack Banquet Hall room setup information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_hall_setup.php?hll_Number=3'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-03 15:39:51', '::1', 'User admin updated :Diamond Banquet hall feature information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_hall_feature.php?hallFea_id=2'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-03 15:42:19', '::1', 'User admin updated :Diamond Banquet III hall feature information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_hall_feature.php?hallFea_id=2'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-03 15:42:35', '::1', 'User admin updated :Diamond Banquet III hall feature information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_hall_feature.php?hallFea_id=2'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-03 15:42:52', '::1', 'User admin updated :Diamond Banquet III hall feature information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_hall_feature.php?hallFea_id=2'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-03 15:43:00', '::1', 'User admin updated :Diamond Banquet III hall feature information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_hall_feature.php?hallFea_id=2'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-03 15:43:07', '::1', 'User admin updated :Diamond Banquet III hall feature information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_hall_feature.php?hallFea_id=2'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-03 15:43:31', '::1', 'User admin updated :Diamond Banquet III hall feature information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_hall_feature.php?hallFea_id=2'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-03 15:43:33', '::1', 'User admin updated :Diamond Banquet III hall feature information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_hall_feature.php?hallFea_id=2'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-03 15:44:19', '::1', 'User admin updated :Diamond Banquet hall feature information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_hall_feature.php?hallFea_id=2'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-04 13:04:04', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-04 13:04:23', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-04 13:28:28', '::1', 'User admin updated :33 Lergar Beer item setup information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_bar_setup.php?itm_id=2'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-04 13:28:40', '::1', 'User admin updated :33 Lergar Beer item setup information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_bar_setup.php?itm_id=2'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-04 13:46:33', '::1', 'User admin updated :33 Lergar Beer item setup information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_bar_setup.php?itm_id=2'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-04 16:02:34', '::1', 'User admin added a new room feature - Standard Twin Room', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/room_feature_setup.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-04 16:47:39', '::1', 'User admin updated :Standard Twin Room room feature information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_room_feature.php?accfea_id=16'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-04 17:48:05', '::1', 'User admin added a new user - admin', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/room_reservation.php?room_number=300'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-05 10:27:57', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php?r=dWFz'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-05 16:23:56', '::1', 'User admin added a new user - admin', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/room_reservation.php?room_number=2'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-05 16:24:54', '::1', 'User admin updated room availability to Available - admin for room number:2', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/show_update_reservation_checkins.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-05 16:24:54', '::1', 'User admin updated room availability to Available - admin for room number:300', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/show_update_reservation_checkins.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-05 16:36:00', '::1', 'User admin updated client information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_room_reservation.php?clt_id=11'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-05 17:04:17', '::1', 'User admin updated client information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_room_reservation.php?clt_id=11'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-05 17:12:31', '::1', 'User admin updated room availability to Available - admin for room number:2', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/show_update_reservation_checkins.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-05 17:12:31', '::1', 'User admin updated room availability to Available - admin for room number:300', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/show_update_reservation_checkins.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-07 09:55:52', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-07 20:57:14', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-07 21:22:57', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-07 21:24:43', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-07 21:50:33', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-07 23:12:33', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php?r=ZW1wdHk='),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-07 23:16:27', '::1', 'User Oluwagbemiro Diamond Successfully logged out', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/index.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-07 23:16:29', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php?r=bG9nb3V0'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-08 14:59:47', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-08 14:59:50', '::1', 'User Oluwagbemiro Diamond Successfully logged out', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/index.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-08 14:59:51', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php?r=bG9nb3V0'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-08 18:26:50', '::1', 'User admin added a company information - Lanleyin International Hotel', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/company_information.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-08 18:27:01', '::1', 'User Oluwagbemiro Diamond Successfully logged out', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/index.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-08 18:28:28', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-09 09:36:07', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-09 09:43:04', '::1', 'User admin added a company information - New Age Hotel', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/company_information.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-09 11:13:48', '::1', 'User admin uploaded picture for company idVHM201506091043045565', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/company_image_upload.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-09 11:15:04', '::1', 'User admin uploaded picture for company idVHM201506091043045565', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/company_image_upload.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-10 13:20:21', '::1', 'User admin updated :Deluxe Standard II  room feature information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_room_feature.php?accfea_id=14'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-10 13:21:04', '::1', 'User admin updated :Double Standard room feature information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_room_feature.php?accfea_id=6'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-10 13:21:45', '::1', 'User admin updated :Standard Room room feature information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_room_feature.php?accfea_id=7'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-10 13:22:06', '::1', 'User admin updated :Royal Suite room feature information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_room_feature.php?accfea_id=15'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-10 13:22:18', '::1', 'User admin updated :Standard Twin Room room feature information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_room_feature.php?accfea_id=16'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-11 08:04:52', '::1', 'User admin updated :Diamond Banquet hall feature information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_hall_feature.php?hallFea_id=2'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-11 08:05:06', '::1', 'User admin updated :Standard Hall hall feature information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_hall_feature.php?hallFea_id=1'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-11 08:05:54', '::1', 'User admin updated :Diamond Banquet hall feature information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_hall_feature.php?hallFea_id=2'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-11 08:33:24', '::1', 'User admin updated client:Jackson CooperII hall information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_hall_reservation.php?clt_id=1'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-11 12:23:11', '::1', 'User admin updated :Room 1 room setup information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_room_setup.php?room_id=1'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-11 12:23:22', '::1', 'User admin updated :Room 2 room setup information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_room_setup.php?room_id=3'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-11 12:23:29', '::1', 'User admin updated :Room 202 room setup information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_room_setup.php?room_id=6'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-11 12:23:35', '::1', 'User admin updated :Room203 room setup information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_room_setup.php?room_id=4'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-11 12:23:41', '::1', 'User admin updated :Room300 room setup information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_room_setup.php?room_id=5'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-11 12:23:43', '::1', 'User admin updated :Room300 room setup information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_room_setup.php?room_id=5'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-11 12:42:11', '::1', 'User admin updated :Yatch Hall room setup information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_hall_setup.php?hll_Number=1'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-11 12:42:18', '::1', 'User admin updated :Victor Olatunde Presidential Hall room setup information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_hall_setup.php?hll_Number=2'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-12 18:46:15', '172.24.8.131', 'User Admin Successfully logged in', '172.24.8.123:8889', 'http://172.24.8.123:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-12 18:48:51', '172.24.8.107', 'User admin Successfully logged in', '172.24.8.123:8889', 'http://172.24.8.123:8889/vHotelManager/admin/admin_content/login.php?r=ZmFpbGVk'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-12 18:56:06', '172.24.8.107', 'User admin updated :Fish and Chips Big item setup information', '172.24.8.123:8889', 'http://172.24.8.123:8889/vHotelManager/admin/admin_content/manage_bar_setup.php?itm_id=7'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-12 18:57:01', '172.24.8.107', 'User admin updated :Chicken and Chips Big item setup information', '172.24.8.123:8889', 'http://172.24.8.123:8889/vHotelManager/admin/admin_content/manage_bar_setup.php?itm_id=5'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-12 19:00:47', '172.24.8.107', 'User admin updated :Chicken and Chips Big item setup information', '172.24.8.123:8889', 'http://172.24.8.123:8889/vHotelManager/admin/admin_content/manage_bar_setup.php?itm_id=5'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-12 19:01:11', '172.24.8.107', 'User admin updated :Fish and Chips Medium item setup information', '172.24.8.123:8889', 'http://172.24.8.123:8889/vHotelManager/admin/admin_content/manage_bar_setup.php?itm_id=8'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-12 19:01:45', '172.24.8.107', 'User admin updated :Fish and Chips Medium item setup information', '172.24.8.123:8889', 'http://172.24.8.123:8889/vHotelManager/admin/admin_content/manage_bar_setup.php?itm_id=8'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-12 19:02:05', '172.24.8.107', 'User admin updated :Fish and Chips Big item setup information', '172.24.8.123:8889', 'http://172.24.8.123:8889/vHotelManager/admin/admin_content/manage_bar_setup.php?itm_id=7'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-13 17:10:56', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-13 17:40:57', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-13 17:45:05', '::1', 'User admin updated :33 Lergar Beer item setup information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_bar_setup.php?itm_id=2'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-13 17:45:23', '::1', 'User admin updated :Champagne  item setup information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_bar_setup.php?itm_id=1'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-13 17:45:37', '::1', 'User admin updated :Chicken and Chips Big item setup information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_bar_setup.php?itm_id=5'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-13 17:48:26', '::1', 'User admin updated :Chicken and Chips Medium item setup information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_bar_setup.php?itm_id=6'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-13 18:44:35', '::1', 'User admin Updated company information - VHM201506091043045565', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/update_company_information.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-13 18:47:31', '::1', 'User admin added a company information - Diamond Palace Hotel', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/update_company_information.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-13 18:59:22', '::1', 'User admin uploaded picture for company idVHM201506131947317179', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/company_image_upload.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-15 15:38:04', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-15 16:48:42', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-15 16:52:00', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-15 17:35:11', '::1', 'User Oluwagbemiro Diamond Successfully logged out', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/index.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-15 18:10:10', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-15 19:21:02', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-16 16:51:55', '::1', 'User Oluwagbemiro Diamond Successfully logged out', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/user_registration.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-16 18:05:03', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-19 18:28:14', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-20 07:07:59', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-20 10:43:30', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-20 10:44:41', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-20 10:48:38', '::1', 'User admin Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-20 11:13:23', '::1', 'User admin updated own profile information. ', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/profile-edit.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-20 11:14:23', '::1', 'User admin updated own profile information. ', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/profile-edit.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-20 11:14:42', '::1', 'User admin updated own profile information. ', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/profile-edit.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-20 11:15:33', '::1', 'User admin updated own profile information. ', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/profile-edit.php'),
('FORBESDIAMOND', 'Oluwagbemiro Diamond', 'VHM201204041144458372', '2015-06-20 11:15:39', '::1', 'User Oluwagbemiro Diamond Successfully logged out', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/profile-edit.php'),
('FORBESDIAMOND', 'Oluwagbemiro    Diamond', 'VHM201204041144458372', '2015-06-20 11:15:53', '::1', 'User diamonddemola Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php?r=ZmFpbGVk'),
('FORBESDIAMOND', 'Oluwagbemiro    Diamond', 'VHM201204041144458372', '2015-06-20 11:23:27', '::1', 'User diamonddemola updated own profile information. ', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/profile-edit.php'),
('FORBESDIAMOND', 'Oluwagbemiro    Diamond', 'VHM201204041144458372', '2015-06-21 10:01:05', '::1', 'User diamonddemola added a new user - diamonddemola', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/room_reservation.php?room_number=1'),
('FORBESDIAMOND', 'Oluwagbemiro    Diamond', 'VHM201204041144458372', '2015-06-21 12:30:14', '::1', 'User diamonddemola added a new permission (page) information - Dashboard', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Oluwagbemiro    Diamond', 'VHM201204041144458372', '2015-06-21 12:31:33', '::1', 'User diamonddemola added a new permission (page) information - Company Manager', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Oluwagbemiro    Diamond', 'VHM201204041144458372', '2015-06-21 12:32:14', '::1', 'User diamonddemola added a new permission (page) information - User Manager', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Oluwagbemiro    Diamond', 'VHM201204041144458372', '2015-06-21 12:35:04', '::1', 'User diamonddemola added a new permission (page) information - Room Manager', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Oluwagbemiro    Diamond', 'VHM201204041144458372', '2015-06-21 12:35:57', '::1', 'User diamonddemola added a new permission (page) information - Hall Manager', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Oluwagbemiro    Diamond', 'VHM201204041144458372', '2015-06-21 12:36:38', '::1', 'User diamonddemola added a new permission (page) information - Bar Manager', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Oluwagbemiro    Diamond', 'VHM201204041144458372', '2015-06-21 12:37:05', '::1', 'User diamonddemola added a new permission (page) information - The Reservations', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Oluwagbemiro    Diamond', 'VHM201204041144458372', '2015-06-21 12:37:31', '::1', 'User diamonddemola added a new permission (page) information - The Halls', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Oluwagbemiro    Diamond', 'VHM201204041144458372', '2015-06-21 12:37:56', '::1', 'User diamonddemola added a new permission (page) information - The Bar', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php');
INSERT INTO `audit_log_tbl` (`comp_name`, `userFullname`, `user_id`, `datelog`, `ip_addr`, `operation`, `host`, `referer`) VALUES
('FORBESDIAMOND', 'Oluwagbemiro    Diamond', 'VHM201204041144458372', '2015-06-21 12:38:14', '::1', 'User diamonddemola added a new permission (page) information - General Report', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Oluwagbemiro    Diamond', 'VHM201204041144458372', '2015-06-21 12:41:00', '::1', 'User diamonddemola added a new permission (page) information - Data Upload', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Oluwagbemiro    Diamond', 'VHM201204041144458372', '2015-06-22 13:03:10', '::1', 'User Oluwagbemiro    Diamond Successfully logged out', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-22 13:04:59', '::1', 'User BabayiAudu Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php?r=ZmFpbGVk'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-22 13:42:13', '::1', 'User BabayiAudu Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php?r=ZmFpbGVk'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-22 14:12:03', '::1', 'User BabayiAudu Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-22 17:19:41', '::1', 'User BabayiAudu Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-22 17:21:00', '::1', 'User Babayi Audu  Successfully logged out', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/index.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-22 17:21:02', '::1', 'User BabayiAudu Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php?r=bG9nb3V0'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-22 18:19:15', '::1', 'User BabayiAudu added a new permission (page) information - Create/Update Company Information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-22 18:20:58', '::1', 'User BabayiAudu added a new permission (page) information - Upload Company Image', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-23 08:30:06', '::1', 'User babayiAudu Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php?r=ZmFpbGVk'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-23 08:32:12', '::1', 'User BabayiAudu added a new permission (page) information - Add New User', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-23 12:05:58', '::1', 'User BabayiAudu added a new permission (page) information - Create Permission', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-23 12:06:28', '::1', 'User BabayiAudu added a new permission (page) information - View/Update Permission', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-23 12:20:06', '::1', 'User BabayiAudu added a new permission (page) information - Room Features Setup', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-23 12:20:42', '::1', 'User BabayiAudu added a new permission (page) information - Room Setup', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-23 16:49:46', '::1', 'User Babayi Audu  Successfully logged out', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/index.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-23 16:49:50', '::1', 'User Babayi Audu  Successfully logged out', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/update_company_information.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-23 16:50:02', '::1', 'User babayiAudu Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php?r=ZW1wdHk='),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-23 16:57:01', '::1', 'User BabayiAudu Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php?r=bG9nb3V0'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-24 07:14:36', '::1', 'User BabayiAudu added a new permission (page) information - Update Room Features', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-24 07:15:09', '::1', 'User BabayiAudu added a new permission (page) information - Update Room Information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-24 07:15:29', '::1', 'User BabayiAudu added a new permission (page) information - View Room Features', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-24 07:15:47', '::1', 'User BabayiAudu added a new permission (page) information - View Room Information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-24 07:16:32', '::1', 'User BabayiAudu added a new permission (page) information - Hall Features Setup', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-24 10:23:22', '::1', 'User BabayiAudu added a new permission (page) information - Update Permission', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-25 17:14:12', '::1', 'User BabayiAudu updated an existing permission (page) information to - Update Hall Features', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_permission_setup.php?p_id=24'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-25 17:15:02', '::1', 'User BabayiAudu updated an existing permission (page) information to - Room Setup', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_permission_setup.php?p_id=18'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-25 17:26:23', '::1', 'User BabayiAudu updated an existing permission (page) information to - Create User', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_permission_setup.php?p_id=14'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-25 17:36:06', '::1', 'User BabayiAudu added a new permission (page) information - View Hall Features', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-25 17:36:24', '::1', 'User BabayiAudu added a new permission (page) information - View Hall Information', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-25 17:37:05', '::1', 'User BabayiAudu added a new permission (page) information - Bar Setup', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-25 17:37:55', '::1', 'User BabayiAudu added a new permission (page) information - Update Bar', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-25 17:38:25', '::1', 'User BabayiAudu updated an existing permission (page) information to - Create Bar', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_permission_setup.php?p_id=27'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-25 17:39:16', '::1', 'User BabayiAudu added a new permission (page) information - View Bar', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-25 17:39:51', '::1', 'User BabayiAudu added a new permission (page) information - Create Reservation', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-25 17:40:29', '::1', 'User BabayiAudu added a new permission (page) information - Update Reservation', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-25 17:40:46', '::1', 'User BabayiAudu added a new permission (page) information - View Reservation', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-25 17:41:08', '::1', 'User BabayiAudu added a new permission (page) information - Checked in Clients', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-25 17:41:23', '::1', 'User BabayiAudu added a new permission (page) information - Checked out Clients', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-26 13:36:24', '::1', 'User BabayiAudu added a new permission (page) information - Create Hall', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-26 13:44:52', '::1', 'User BabayiAudu added a new permission (page) information - Update Hall', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-26 13:45:15', '::1', 'User BabayiAudu added a new permission (page) information - View Hall', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-26 13:46:05', '::1', 'User BabayiAudu added a new permission (page) information - Create new Bar Item', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-26 13:46:40', '::1', 'User BabayiAudu added a new permission (page) information - Update existing Bar Item', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-26 13:47:13', '::1', 'User BabayiAudu added a new permission (page) information - View Bar Items', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-26 13:52:01', '::1', 'User BabayiAudu updated an existing permission (page) information to - View Bar Items', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_permission_setup.php?p_id=40'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-26 13:53:46', '::1', 'User BabayiAudu updated an existing permission (page) information to - View Bar Items', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_permission_setup.php?p_id=40'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-26 14:04:44', '::1', 'User BabayiAudu updated an existing permission (page) information to - Update existing Bar Item', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_permission_setup.php?p_id=39'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-26 14:55:55', '::1', 'User BabayiAudu updated an existing permission (page) information to - Create new Bar Item', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_permission_setup.php?p_id=38'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-26 14:57:27', '::1', 'User BabayiAudu updated an existing permission (page) information to - View Hall', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_permission_setup.php?p_id=37'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-26 14:58:26', '::1', 'User BabayiAudu updated an existing permission (page) information to - Update Hall', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/manage_permission_setup.php?p_id=36'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-26 15:51:29', '::1', 'User BabayiAudu added a new permission (page) information - Room Setup Report', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-26 15:52:18', '::1', 'User BabayiAudu added a new permission (page) information - Room Feature Report', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-26 15:53:49', '::1', 'User BabayiAudu added a new permission (page) information - Room Reservation Report', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-26 15:54:08', '::1', 'User BabayiAudu added a new permission (page) information - Hall Setup Report', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-26 15:54:22', '::1', 'User BabayiAudu added a new permission (page) information - Hall Feature Report', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-26 15:54:38', '::1', 'User BabayiAudu added a new permission (page) information - Hall Reservation Report', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-26 15:54:54', '::1', 'User BabayiAudu added a new permission (page) information - Bar Report', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-26 15:55:08', '::1', 'User BabayiAudu added a new permission (page) information - Bar Setup Report', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', 'Babayi Audu ', 'VHM201504032049083132', '2015-06-26 16:22:51', '::1', 'User Babayi Audu  Successfully logged out', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/permission_setup.php'),
('FORBESDIAMOND', ' Oluwagbemiro     Diamond', 'VHM201204041144458372', '2015-06-26 16:38:42', '::1', 'User diamonddemola Successfully logged in', 'localhost:8889', 'http://localhost:8889/vHotelManager/admin/admin_content/login.php?r=ZmFpbGVk'),
('FORBESDIAMOND', ' Oluwagbemiro     Diamond', 'VHM201204041144458372', '2015-06-26 16:39:51', '172.24.8.90', 'User diamonddemola Successfully logged in', '172.24.8.123:8889', 'http://172.24.8.123:8889/vHotelManager/admin/admin_content/login.php?r=ZmFpbGVk'),
('FORBESDIAMOND', ' Oluwagbemiro     Diamond', 'VHM201204041144458372', '2015-06-26 16:46:08', '172.24.26.55', 'User diamonddemola Successfully logged in', '172.24.8.123:8889', 'http://172.24.8.123:8889/vHotelManager/admin/admin_content/login.php'),
('FORBESDIAMOND', ' Oluwagbemiro     Diamond', 'VHM201204041144458372', '2015-06-29 09:56:51', '172.24.8.105', 'User diamonddemola Successfully logged in', '172.24.8.123:8889', 'http://172.24.8.123:8889/vHotelManager/admin/admin_content/login.php?r=dWFz');

-- --------------------------------------------------------

--
-- Table structure for table `bar_setup_history_tbl`
--

CREATE TABLE IF NOT EXISTS `bar_setup_history_tbl` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_type` varchar(255) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `item_rate` varchar(255) NOT NULL,
  `quantity` varchar(250) NOT NULL,
  `quantity_available` varchar(250) NOT NULL,
  `threshold` varchar(250) NOT NULL,
  `created_by` varchar(200) NOT NULL,
  `created_date` timestamp NOT NULL,
  `updated_date` timestamp NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `bar_setup_history_tbl`
--

INSERT INTO `bar_setup_history_tbl` (`item_id`, `item_type`, `item_name`, `item_rate`, `quantity`, `quantity_available`, `threshold`, `created_by`, `created_date`, `updated_date`, `status`) VALUES
(1, 'Drink', 'Champagne ', '10000', '100', '96', '30', '', '2015-05-25 17:30:11', '2015-05-25 18:34:05', ''),
(2, 'Drink', '33 Lergar Beer', '370', '1000', '998', '400', '', '2015-05-25 17:30:24', '2015-05-25 18:47:31', ''),
(3, 'Drink', 'Eva Water', '100', '100', '100', '10', 'admin', '2015-05-25 17:30:59', '2015-05-25 17:30:59', ''),
(5, 'Food', 'Chicken and Chips Big', '2,000', '200', '200', '5', 'admin', '2015-05-25 17:33:32', '2015-05-25 17:33:32', ''),
(6, 'Food', 'Chicken and Chips Medium', '1,500', '200', '200', '5', 'admin', '2015-05-25 17:33:19', '2015-05-25 17:33:19', ''),
(7, 'Food', 'Fish and Chips Big', '2,500', '200', '200', '5', 'admin', '2015-05-25 17:33:43', '2015-05-25 17:33:43', ''),
(8, 'Food', 'Fish and Chips Medium', '2,000', '200', '200', '5', 'admin', '2015-05-25 17:33:55', '2015-05-25 17:33:55', ''),
(9, 'Food', 'Rice and Chicken', '900', '500', '499', '10', 'admin', '2015-05-27 19:28:28', '2015-05-27 19:28:48', ''),
(10, 'Drink', '33 Lergar Beer', '370', '0.00', '998.00', '400.00', 'admin', '2015-06-04 13:28:28', '0000-00-00 00:00:00', 'Update: After Updating an item information'),
(11, 'Drink', '33 Lergar Beer', '370', '0.00', '998.00', '400.00', 'admin', '2015-06-04 13:28:40', '0000-00-00 00:00:00', 'Update: After Updating an item information'),
(12, 'Drink', '33 Lergar Beer', '370', '500.00', '998.00', '400.00', 'admin', '2015-06-04 13:46:33', '0000-00-00 00:00:00', 'Update: After Updating an item information'),
(13, 'Food', 'Fish and Chips Big', '2,500', '0', '200', '5', 'admin', '2015-06-12 18:56:06', '0000-00-00 00:00:00', 'Update: After Updating an item information'),
(14, 'Food', 'Chicken and Chips Big', '2,000', '0', '200', '5', 'admin', '2015-06-12 18:57:01', '0000-00-00 00:00:00', 'Update: After Updating an item information'),
(15, 'Food', 'Chicken and Chips Big', '2000', '0', '200', '5', 'admin', '2015-06-12 19:00:47', '0000-00-00 00:00:00', 'Update: After Updating an item information'),
(16, 'Food', 'Fish and Chips Medium', '2000', '0', '200', '5', 'admin', '2015-06-12 19:01:11', '0000-00-00 00:00:00', 'Update: After Updating an item information'),
(17, 'Food', 'Fish and Chips Medium', '2000', '0', '200', '5', 'admin', '2015-06-12 19:01:45', '0000-00-00 00:00:00', 'Update: After Updating an item information'),
(18, 'Food', 'Fish and Chips Big', '2500', '0', '200', '5', 'admin', '2015-06-12 19:02:05', '0000-00-00 00:00:00', 'Update: After Updating an item information'),
(19, 'Drink', '33 Lergar Beer', '370', '0', '1498', '400', 'admin', '2015-06-13 17:45:05', '0000-00-00 00:00:00', 'Update: After Updating an item information'),
(20, 'Drink', 'Champagne ', '10000', '0', '96', '30', 'admin', '2015-06-13 17:45:23', '0000-00-00 00:00:00', 'Update: After Updating an item information'),
(21, 'Food', 'Chicken and Chips Big', '2000', '0', '200', '5', 'admin', '2015-06-13 17:45:37', '0000-00-00 00:00:00', 'Update: After Updating an item information'),
(22, 'Food', 'Chicken and Chips Medium', '1500', '0', '200', '5', 'admin', '2015-06-13 17:48:25', '0000-00-00 00:00:00', 'Update: After Updating an item information');

-- --------------------------------------------------------

--
-- Table structure for table `bar_setup_tbl`
--

CREATE TABLE IF NOT EXISTS `bar_setup_tbl` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_type` varchar(255) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `item_rate` varchar(255) NOT NULL,
  `quantity` varchar(250) NOT NULL,
  `quantity_available` varchar(250) NOT NULL,
  `threshold` varchar(250) NOT NULL,
  `created_by` varchar(200) NOT NULL,
  `created_date` timestamp NOT NULL,
  `updated_date` timestamp NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `bar_setup_tbl`
--

INSERT INTO `bar_setup_tbl` (`item_id`, `item_type`, `item_name`, `item_rate`, `quantity`, `quantity_available`, `threshold`, `created_by`, `created_date`, `updated_date`) VALUES
(1, 'Drink', 'Champagne ', '10000', '100', '96', '30', 'admin', '2015-05-25 17:30:11', '2015-06-13 17:45:23'),
(2, 'Drink', '33 Lergar Beer', '370', '1500', '1498', '400', 'admin', '2015-06-07 08:43:00', '2015-06-13 17:45:05'),
(3, 'Drink', 'Eva Water', '100', '100', '100', '10', 'admin', '2015-05-25 17:30:59', '2015-05-25 17:30:59'),
(5, 'Food', 'Chicken and Chips Big', '2000', '200', '200', '5', 'admin', '2015-05-25 17:33:32', '2015-06-13 17:45:37'),
(6, 'Food', 'Chicken and Chips Medium', '1500', '200', '200', '5', 'admin', '2015-06-13 16:48:06', '2015-06-13 17:48:25'),
(7, 'Food', 'Fish and Chips Big', '2500', '200', '200', '5', 'admin', '2015-05-25 17:33:43', '2015-06-12 19:02:05'),
(8, 'Food', 'Fish and Chips Medium', '2000', '200', '200', '5', 'admin', '2015-05-25 17:33:55', '2015-06-12 19:01:45'),
(9, 'Food', 'Rice and Chicken', '900', '500', '499', '10', 'admin', '2015-05-27 19:28:28', '2015-05-27 19:28:48');

-- --------------------------------------------------------

--
-- Table structure for table `bar_tbl`
--

CREATE TABLE IF NOT EXISTS `bar_tbl` (
  `bar_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `quantity_sold` int(11) NOT NULL,
  `rate` varchar(200) NOT NULL,
  `total` varchar(255) NOT NULL,
  `attended_to_by` varchar(255) NOT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`bar_item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `bar_tbl`
--

INSERT INTO `bar_tbl` (`bar_item_id`, `item_id`, `quantity_sold`, `rate`, `total`, `attended_to_by`, `date_created`, `date_updated`) VALUES
(19, 1, 4, '10000', '40000', 'Demola', '2015-05-25 18:34:05', '2015-05-25 17:34:05'),
(20, 2, 2, '370', '740', 'Demola', '2015-05-25 18:47:31', '2015-05-25 17:47:31'),
(21, 9, 1, '900', '900', 'admin', '2015-05-27 19:28:48', '2015-05-27 18:28:48');

-- --------------------------------------------------------

--
-- Table structure for table `company_info_tbl`
--

CREATE TABLE IF NOT EXISTS `company_info_tbl` (
  `coy_id` varchar(255) NOT NULL,
  `coy_name` varchar(255) NOT NULL,
  `coy_address` text NOT NULL,
  `coy_phone` varchar(20) NOT NULL,
  `coy_email` varchar(100) NOT NULL,
  `web_address` varchar(150) NOT NULL,
  `coy_image` text NOT NULL,
  `maker` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL,
  `date_updated` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_info_tbl`
--

INSERT INTO `company_info_tbl` (`coy_id`, `coy_name`, `coy_address`, `coy_phone`, `coy_email`, `web_address`, `coy_image`, `maker`, `date_created`, `date_updated`) VALUES
('VHM201506131947317179', 'Diamond Palace Hotel', 'No 293, Forbes Diamond Street, Lekki Phase 1, Lagos State Nigeria\r\n                                              \r\n                                              ', '08033433333', 'info@dpalacehotel.com', 'http://www.dpalacehotel.com', '../../imgs/uploads/coy/VHM201506131947317179_verdes logo.png', 'admin', '2015-06-13 18:47:31', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hall_feature_tbl`
--

CREATE TABLE IF NOT EXISTS `hall_feature_tbl` (
  `hall_feature_id` int(11) NOT NULL AUTO_INCREMENT,
  `feature_name` varchar(225) NOT NULL,
  `feature_description` text NOT NULL,
  `feature_rate` varchar(200) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `price_paid` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL,
  `updated_date` timestamp NOT NULL,
  `created_by` varchar(200) NOT NULL,
  PRIMARY KEY (`hall_feature_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `hall_feature_tbl`
--

INSERT INTO `hall_feature_tbl` (`hall_feature_id`, `feature_name`, `feature_description`, `feature_rate`, `discount`, `price_paid`, `created_date`, `updated_date`, `created_by`) VALUES
(1, 'Standard Hall', 'Full tight Air Conditional', '60000', '3999', '56001', '2015-04-16 15:09:33', '2015-06-11 08:05:06', 'admin'),
(2, 'Diamond Banquet', 'Full tight Air conditional, Flat Screen Televisions and projector\r\n', '120000', '5000', '115000', '2015-04-16 15:15:31', '2015-06-11 08:05:54', 'admin');

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
  `updated_date` timestamp NOT NULL,
  PRIMARY KEY (`hall_reservation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `hall_reservation_tbl`
--

INSERT INTO `hall_reservation_tbl` (`hall_reservation_id`, `client_name`, `client_address`, `client_email`, `client_phone`, `purpose_of_use`, `start_date`, `startTime`, `no_of_days`, `end_date`, `end_time`, `feature_id`, `rate`, `hall_number`, `price_paid`, `attended_to_by`, `created_date`, `updated_date`) VALUES
(1, 'Jackson CooperII', 'Union Building, No 389, Broad street, Lagos, Nigeria                                                                                            ', 'Jackson.Co0oper@cooperfield.com', '08099789034', 'Wedding Introduction and Ceremony', '17-04-2015', '08:33:15', 2, '20-04-2015', '22:23:30', 0, '100000', 2, '200000', 'admin', '2015-04-17 22:27:05', '2015-06-11 08:33:24');

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
  `updated_date` timestamp NOT NULL,
  `maker` varchar(200) NOT NULL,
  PRIMARY KEY (`hall_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `hall_setup_tbl`
--

INSERT INTO `hall_setup_tbl` (`hall_number`, `hall_name`, `hall_feature_id`, `availability`, `created_date`, `updated_date`, `maker`) VALUES
(1, 'Yatch Hall', 1, 'Available', '2015-04-16 18:26:36', '2015-06-11 12:42:11', 'admin'),
(2, 'Victor Olatunde Presidential Hall', 2, 'Available', '2015-04-16 18:27:00', '2015-06-11 12:42:18', 'admin'),
(3, 'Johnson Jack Banquet Hall', 1, 'Available', '2015-04-16 19:25:52', '2015-06-02 10:23:20', 'admin'),
(4, 'Revd Father Mike Akgboghiran Hall', 2, 'Not Available', '2015-04-16 19:33:27', '2015-06-02 10:19:59', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `permissions_tbl`
--

CREATE TABLE IF NOT EXISTS `permissions_tbl` (
  `perm_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `page_name` text NOT NULL,
  `page_url` text NOT NULL,
  `parent_id` bigint(20) NOT NULL,
  `logo_name` text NOT NULL,
  `created_date` timestamp NOT NULL,
  `maker` varchar(200) NOT NULL,
  `updated_date` timestamp NOT NULL,
  PRIMARY KEY (`perm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `permissions_tbl`
--

INSERT INTO `permissions_tbl` (`perm_id`, `page_name`, `page_url`, `parent_id`, `logo_name`, `created_date`, `maker`, `updated_date`) VALUES
(1, 'Dashboard', 'index.php', 0, 'fa fa-dashboard', '2015-06-21 12:30:14', 'diamonddemola', '0000-00-00 00:00:00'),
(2, 'Company Manager', 'javascript:;', 0, 'fa fa-cogs', '2015-06-21 12:31:33', 'diamonddemola', '0000-00-00 00:00:00'),
(3, 'User Manager', 'javascript:;', 0, 'fa fa-cogs', '2015-06-21 12:32:14', 'diamonddemola', '0000-00-00 00:00:00'),
(4, 'Room Manager', 'javascript:;', 0, 'fa fa-cogs', '2015-06-21 12:35:04', 'diamonddemola', '0000-00-00 00:00:00'),
(5, 'Hall Manager', 'javascript:;', 0, 'fa fa-cogs', '2015-06-21 12:35:57', 'diamonddemola', '0000-00-00 00:00:00'),
(6, 'Bar Manager', 'javascript:;', 0, 'fa fa-cogs', '2015-06-21 12:36:38', 'diamonddemola', '0000-00-00 00:00:00'),
(7, 'The Reservations', 'javascript:;', 0, 'fa fa-tasks', '2015-06-21 12:37:05', 'diamonddemola', '0000-00-00 00:00:00'),
(8, 'The Halls', 'javascript:;', 0, 'fa fa-laptop', '2015-06-21 12:37:31', 'diamonddemola', '0000-00-00 00:00:00'),
(9, 'The Bar', 'javascript:;', 0, 'fa fa-glass', '2015-06-21 12:37:56', 'diamonddemola', '0000-00-00 00:00:00'),
(10, 'General Report', 'javascript:;', 0, 'fa fa-bar-chart-o', '2015-06-21 12:38:14', 'diamonddemola', '0000-00-00 00:00:00'),
(11, 'Data Upload', 'javascript:;', 0, 'fa fa-upload', '2015-06-21 12:41:00', 'diamonddemola', '0000-00-00 00:00:00'),
(12, 'Update Company Information', 'update_company_information.php', 2, '', '2015-06-23 07:24:09', 'BabayiAudu', '2015-06-23 07:24:09'),
(13, 'Upload Company Image', 'company_image_upload.php', 2, '', '2015-06-22 18:20:58', 'BabayiAudu', '0000-00-00 00:00:00'),
(14, 'Create User', 'user_registration.php', 3, '3', '2015-06-23 08:32:12', 'BabayiAudu', '2015-06-25 17:26:23'),
(15, 'Create Permission', 'permission_setup.php', 3, '', '2015-06-23 12:05:58', 'BabayiAudu', '0000-00-00 00:00:00'),
(16, 'View/Update Permission', 'show_update_permission.php', 3, '', '2015-06-23 12:06:28', 'BabayiAudu', '0000-00-00 00:00:00'),
(17, 'Room Features Setup', 'room_feature_setup.php', 4, '', '2015-06-23 12:20:06', 'BabayiAudu', '0000-00-00 00:00:00'),
(18, 'Room Setup', 'room_setup.php', 4, '3', '2015-06-23 12:20:42', 'BabayiAudu', '2015-06-25 17:15:02'),
(19, 'Update Room Features', 'show_update_room_features.php', 4, '', '2015-06-24 07:14:36', 'BabayiAudu', '0000-00-00 00:00:00'),
(20, 'Update Room Information', 'show_update_room_info.php', 4, '', '2015-06-24 07:15:08', 'BabayiAudu', '0000-00-00 00:00:00'),
(21, 'View Room Features', 'view_room_feature.php', 4, '', '2015-06-24 07:15:28', 'BabayiAudu', '0000-00-00 00:00:00'),
(22, 'View Room Information', 'view_room_info.php', 4, '', '2015-06-24 07:15:47', 'BabayiAudu', '0000-00-00 00:00:00'),
(23, 'Hall Features Setup', 'hall_feature_setup.php', 5, '', '2015-06-24 07:16:32', 'BabayiAudu', '0000-00-00 00:00:00'),
(24, 'Update Hall Features', 'show_update_hall_features.php', 5, '3', '2015-06-24 10:23:22', 'BabayiAudu', '2015-06-25 17:14:12'),
(25, 'View Hall Features', 'view_hall_features.php', 5, '', '2015-06-25 17:36:06', 'BabayiAudu', '0000-00-00 00:00:00'),
(26, 'View Hall Information', 'view_hall_info.php', 5, '', '2015-06-25 17:36:24', 'BabayiAudu', '0000-00-00 00:00:00'),
(27, 'Create Bar', 'bar_setup.php', 6, '6', '2015-06-25 17:37:05', 'BabayiAudu', '2015-06-25 17:38:25'),
(28, 'Update Bar', 'show_update_bar_setup.php', 6, '', '2015-06-25 17:37:54', 'BabayiAudu', '0000-00-00 00:00:00'),
(29, 'View Bar', 'view_bar.php', 6, '', '2015-06-25 17:39:16', 'BabayiAudu', '0000-00-00 00:00:00'),
(30, 'Create Reservation', 'room_reservation.php', 7, '', '2015-06-25 17:39:51', 'BabayiAudu', '0000-00-00 00:00:00'),
(31, 'Update Reservation', 'show_update_reservation.php', 7, '', '2015-06-25 17:40:29', 'BabayiAudu', '0000-00-00 00:00:00'),
(32, 'View Reservation', 'view_update_reservation.php', 7, '', '2015-06-25 17:40:46', 'BabayiAudu', '0000-00-00 00:00:00'),
(33, 'Checked in Clients', 'show_update_reservation_checkins.php', 7, '', '2015-06-25 17:41:08', 'BabayiAudu', '0000-00-00 00:00:00'),
(34, 'Checked out Clients', 'show_update_reservation_checkouts.php', 7, '', '2015-06-25 17:41:23', 'BabayiAudu', '0000-00-00 00:00:00'),
(35, 'Create Hall', 'hall_reservation.php', 8, '', '2015-06-26 13:36:23', 'BabayiAudu', '0000-00-00 00:00:00'),
(36, 'Update Hall', 'show_update_hall.php', 8, '0', '2015-06-26 13:44:51', 'BabayiAudu', '2015-06-26 14:58:26'),
(37, 'View Hall', 'view_hall_reservation.php', 8, '0', '2015-06-26 13:45:14', 'BabayiAudu', '2015-06-26 14:57:27'),
(38, 'Create new Bar Item', 'new_bar_item.php', 9, '0', '2015-06-26 13:46:05', 'BabayiAudu', '2015-06-26 14:55:55'),
(39, 'Update existing Bar Item', 'show_update_bar.php', 9, '0', '2015-06-26 13:46:40', 'BabayiAudu', '2015-06-26 14:04:44'),
(40, 'View Bar Items', 'view_bar.php', 9, '0', '2015-06-26 13:47:12', 'BabayiAudu', '2015-06-26 13:53:46'),
(41, 'Room Setup Report', 'room_setup_report.php', 10, '', '2015-06-26 15:51:29', 'BabayiAudu', '0000-00-00 00:00:00'),
(42, 'Room Feature Report', 'room_feature_report.php', 10, '', '2015-06-26 15:52:18', 'BabayiAudu', '0000-00-00 00:00:00'),
(43, 'Room Reservation Report', 'room_reservation_report.php', 10, '', '2015-06-26 15:53:49', 'BabayiAudu', '0000-00-00 00:00:00'),
(44, 'Hall Setup Report', 'hall_setup_report.php', 10, '', '2015-06-26 15:54:08', 'BabayiAudu', '0000-00-00 00:00:00'),
(45, 'Hall Feature Report', 'hall_feature_report.php', 10, '', '2015-06-26 15:54:22', 'BabayiAudu', '0000-00-00 00:00:00'),
(46, 'Hall Reservation Report', 'hall_reservation_report.php', 10, '', '2015-06-26 15:54:38', 'BabayiAudu', '0000-00-00 00:00:00'),
(47, 'Bar Report', 'bar_report.php', 10, '', '2015-06-26 15:54:54', 'BabayiAudu', '0000-00-00 00:00:00'),
(48, 'Bar Setup Report', 'bar_setup_report.php', 10, '', '2015-06-26 15:55:08', 'BabayiAudu', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions_tbl`
--

CREATE TABLE IF NOT EXISTS `role_permissions_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `perm_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL,
  `maker` varchar(200) NOT NULL,
  `updated_date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roles_tbl`
--

CREATE TABLE IF NOT EXISTS `roles_tbl` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_date` timestamp NOT NULL,
  `maker` varchar(200) NOT NULL,
  `updated_date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `roles_tbl`
--

INSERT INTO `roles_tbl` (`id`, `name`, `created_date`, `maker`, `updated_date`) VALUES
(1, 'Administrator', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(2, 'Manager', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(3, 'Receptionist', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(4, 'Chairman', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `room_feature_tbl`
--

CREATE TABLE IF NOT EXISTS `room_feature_tbl` (
  `feature_id` int(11) NOT NULL AUTO_INCREMENT,
  `feature_name` varchar(200) NOT NULL,
  `full_description` text NOT NULL,
  `rate` varchar(255) NOT NULL,
  `discount` varchar(250) NOT NULL DEFAULT '0',
  `price_paid` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL,
  `created_by` varchar(250) NOT NULL,
  PRIMARY KEY (`feature_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `room_feature_tbl`
--

INSERT INTO `room_feature_tbl` (`feature_id`, `feature_name`, `full_description`, `rate`, `discount`, `price_paid`, `created_date`, `updated_date`, `created_by`) VALUES
(6, 'Double Standard', 'Double bed for family, standard bathroom and toilet, flatscreen TV, etc', '8700', '1000', '7700', '2015-03-21 13:39:47', '2015-06-10 13:21:04', 'admin'),
(7, 'Standard Room', 'family bed, reading table, flatscreentv,etc', '60000', '10000', '50000', '2015-03-21 13:41:19', '2015-06-10 13:21:45', 'admin'),
(14, 'Deluxe Standard II ', 'Flatscreentv, Automatic A/C, Standard bed and all', '20000', '5000', '15000', '2015-03-23 14:29:06', '2015-06-10 13:20:21', 'admin'),
(15, 'Royal Suite', 'Hot Bath, Flatscreen Television, Mirror, Royal Bed\r\n', '30000', '3300', '26700', '2015-03-23 23:04:54', '2015-06-10 13:22:06', 'admin'),
(16, 'Standard Twin Room', 'Fitted with wooden flooring, this air-conditioned room features a flat-screen TV with cable channels and a private bathroom with a hairdryer. \r\nA writing desk and an electric kettle are included.\r\n\r\n Air conditioning \r\nHair dryer \r\nPrivate bathroom\r\nAir Conditioner\r\nInternet.', '15000', '1500', '13500', '2015-06-04 17:02:34', '2015-06-10 13:22:18', 'admin');

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
  `date_updated` timestamp NOT NULL,
  `status` varchar(50) NOT NULL,
  `actual_checked_out_date` timestamp NOT NULL,
  PRIMARY KEY (`room_reservation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `room_reservation_tbl`
--

INSERT INTO `room_reservation_tbl` (`room_reservation_id`, `client_name`, `client_address`, `client_phone`, `client_email`, `room_number`, `rate`, `number_of_people`, `date_in`, `time_in`, `number_of_days`, `date_out`, `time_out`, `visit_purpose`, `car_reg_number`, `car_model`, `car_color`, `price_paid`, `attended_to_by`, `date_created`, `date_updated`, `status`, `actual_checked_out_date`) VALUES
(10, 'Omolara Gold', 'No 5609, Olaseinde street, Surulere, Lagos                                                          ', '08077112345', 'omolara.gold@gmail.com', 300, '20000', 2, '03-06-2015', '17:44:30', 3, '05-06-2015', '12:00:00', 'Business', 'ABJ-890 GG ', 'Lexus Jeep 2015', 'Red', '60000', 'admin', '2015-06-04 17:48:05', '2015-06-07 08:59:06', 'Checked Out', '2015-06-07 08:59:06'),
(11, 'Gabriel Audacious', 'No 390G, Saudaunna street, Jos, Plateau State                                                       ', '07036683924', 'gabriel.aud@dva.tv', 2, '15000', 2, '10-06-2015', '17:04:00', 2, '05-06-2015', '12:00:00', 'Checked In', 'GAB 234 JJ', 'Toyota Corrolla 2016 Model', 'White', '30000', 'admin', '2015-06-05 16:23:55', '2015-06-07 08:58:12', 'Checked Out', '2015-06-07 08:58:12'),
(12, 'Ballish Bobson', 'No 3434, Ibiza Street, Ibizza, Peckam, London.                                                      ', '08059678590', 'b.bobson@gmail.com', 1, '7700', 2, '20-06-2015', '17:44:15', 2, '22-06-2015', '12:00:00', 'Business', 'JJJ 494 AA', 'Volkswagen Vento', 'Green', '15400', 'diamonddemola', '2015-06-21 10:01:04', '0000-00-00 00:00:00', 'Checked In', '0000-00-00 00:00:00');

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
  `updated_date` timestamp NOT NULL,
  `maker` varchar(255) NOT NULL,
  PRIMARY KEY (`room_id`),
  UNIQUE KEY `room_number` (`room_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `room_setup_tbl`
--

INSERT INTO `room_setup_tbl` (`room_id`, `room_number`, `room_name`, `floor_number`, `feature_id`, `availability`, `created_date`, `updated_date`, `maker`) VALUES
(1, 1, 'Room 1', '', 6, 'Not Available', '2015-04-06 10:50:13', '2015-06-21 10:01:04', 'admin'),
(3, 2, 'Room 2', '', 14, 'Available', '2015-06-04 16:40:27', '2015-06-11 12:23:22', 'admin'),
(4, 203, 'Room203', '', 6, 'Available', '2015-04-12 00:16:38', '2015-06-11 12:23:35', 'admin'),
(5, 300, 'Room300', '', 14, 'Available', '2015-04-12 00:17:27', '2015-06-11 12:23:43', 'admin'),
(6, 202, 'Room 202', '', 15, 'Available', '2015-04-12 00:18:32', '2015-06-11 12:23:28', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles_tbl`
--

CREATE TABLE IF NOT EXISTS `user_roles_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL,
  `maker` varchar(200) NOT NULL,
  `updated_date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `acclevel` int(11) NOT NULL,
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
(1, 'diamonddemola', 'VHM201204041144458372', ' Oluwagbemiro', '    Diamond', 'e23a741d5ffbc156c464814c2d92474cf0cfeb8e', 'Male', '07-02-1989', 'ICT', 1, 'diamonddemola@yahoo.co.uk', '        ', 'Lagos', '../../imgs/uploads/user/VHM201204041144458372_moril.jpg', '../../imgs/uploads/userAvatar/VHM201204041144458372_moril.jpg', '0802334563453434', '2012-12-09 00:58:32', '                                                                                                                                                                                        Vibrant, Articulate, Astute and Talented Young Software Engineer.                                                                                                                                                                                                                                                                ', '2015-06-26 15:24:43'),
(4, 'forbes.diamond', 'VHM201504031144458372', 'Forbes Diamond', '', 'bc6540f4a42842eee3374ddc9c66f7ddf1581d1f', 'Male', '03-04-2015', '', 2, 'w.ademola.kazeem@gmail.com', '&lt;p&gt;No 1, Ademola Diamond crescent,&lt;/p&gt;\r\n', '', '', '', '07038548808', '2015-04-03 10:44:45', '', '0000-00-00 00:00:00'),
(5, 'johnson.cooker', 'VHM201504032028048512', 'Johnson Cooker', '', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', ' &gt;-', '26-08-1993', '', 4, 'johnson.cooker@gmail.com', '&lt;p&gt;No 4354, Oriade street Magodo&lt;/p&gt;\r\n', '', '', '', '07038548889', '2015-04-03 19:28:04', '', '0000-00-00 00:00:00'),
(6, 'Mathew.Davids', 'VHM201504032032295739', 'Mathew Davids', '', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', ' &gt;-', '01-02-2012', '', 3, 'mathew.davids@gmail.com', '&lt;p&gt;No 4354, Lucan Island, Ijebu&lt;/p&gt;\r\n', '', '', '', '07038545589', '2015-04-03 19:32:29', '', '0000-00-00 00:00:00'),
(7, 'DavidsBabayi', 'VHM201504032036162434', 'Davids Babayi', '', '8cb2237d0679ca88db6464eac60da96345513964', ' &gt;-', '01-05-1979', '', 4, 'DavidsBabayi@gmail.com', '&lt;p&gt;No 4354, Lucan Island, Ijebu&lt;/p&gt;\r\n', '', '', '', '07038545589', '2015-04-03 19:36:16', '', '0000-00-00 00:00:00'),
(8, 'BabayiAudu', 'VHM201504032049083132', 'Babayi Audu', '', 'e23a741d5ffbc156c464814c2d92474cf0cfeb8e', ' &gt;-', '01-02-1996', '', 4, 'BabayiAudu@gmail.com', '&lt;p&gt;afasdfaf&lt;/p&gt;\r\n', '', '', '', '07038445589', '2015-04-03 19:49:08', '', '2015-06-22 12:04:45');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

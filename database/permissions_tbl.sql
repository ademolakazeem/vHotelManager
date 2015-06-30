-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2015 at 11:18 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `vhotelmgrdb`
--

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

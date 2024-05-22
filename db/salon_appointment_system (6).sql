-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2024 at 02:25 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salon_appointment_system`
--
CREATE DATABASE IF NOT EXISTS `salon_appointment_system` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `salon_appointment_system`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_users`
--

DROP TABLE IF EXISTS `tbl_admin_users`;
CREATE TABLE IF NOT EXISTS `tbl_admin_users` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `admin_password` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin_users`
--

INSERT INTO `tbl_admin_users` (`admin_id`, `admin_username`, `admin_password`) VALUES
(3, 'admin', '$2y$10$i9A3NA7bnN3hsXA2AyYG1uG/dOpzP7QVL8LqEfedo5DcNFt/G1js6');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookings`
--

DROP TABLE IF EXISTS `tbl_bookings`;
CREATE TABLE IF NOT EXISTS `tbl_bookings` (
  `booking_id` int NOT NULL AUTO_INCREMENT,
  `booking_user` int NOT NULL,
  `booking_service` int NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` time(6) NOT NULL,
  `booking_status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1',
  `booking_stylist` int NOT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_bookings`
--

INSERT INTO `tbl_bookings` (`booking_id`, `booking_user`, `booking_service`, `booking_date`, `booking_time`, `booking_status`, `booking_stylist`) VALUES
(136, 10, 17, '2024-05-30', '17:00:00.000000', '1', 10),
(137, 10, 17, '2024-05-30', '17:00:00.000000', '1', 16),
(138, 10, 17, '2024-05-31', '17:00:00.000000', '1', 16);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking_services`
--

DROP TABLE IF EXISTS `tbl_booking_services`;
CREATE TABLE IF NOT EXISTS `tbl_booking_services` (
  `service_id` int NOT NULL AUTO_INCREMENT,
  `service` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `service_cost` int NOT NULL,
  `image` text COLLATE utf8mb4_general_ci,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_booking_services`
--

INSERT INTO `tbl_booking_services` (`service_id`, `service`, `service_cost`, `image`, `isActive`) VALUES
(1, 'Hair Cut 12', 1001, 'assets/haircut.jpg', 1),
(2, 'Hair Color', 1000, 'assets/color.jpg', 1),
(3, 'Hair Brazilian', 20004, 'assets/brazilian.jpg', 1),
(4, 'Hair Highlights', 1400, 'assets/highlights.jpg', 1),
(5, 'Hair Perm', 1400, 'assets/permhair.jpg', 1),
(6, 'Hair Extension', 3500, 'assets/extension.webp', 1),
(7, 'Blow Dry', 1000, 'assets/blowdry.jpg', 1),
(8, 'Keratin Treatment', 2500, 'assets/keratin.jpg', 1),
(9, 'Hair Styling', 3500, 'assets/hairstyles.webp', 1),
(17, 'Capybara hair', 1500, 'assets/66423c76a940d_290064242_338216045171719_4813439717183705903_n.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking_status`
--

DROP TABLE IF EXISTS `tbl_booking_status`;
CREATE TABLE IF NOT EXISTS `tbl_booking_status` (
  `booking_status_id` int NOT NULL AUTO_INCREMENT,
  `booking_status` varchar(11) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`booking_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_booking_status`
--

INSERT INTO `tbl_booking_status` (`booking_status_id`, `booking_status`) VALUES
(1, 'upcoming'),
(2, 'done'),
(3, 'canceled');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_content_about`
--

DROP TABLE IF EXISTS `tbl_content_about`;
CREATE TABLE IF NOT EXISTS `tbl_content_about` (
  `content` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_content_about`
--

INSERT INTO `tbl_content_about` (`content`) VALUES
(0x54657374696e672031);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_content_contact`
--

DROP TABLE IF EXISTS `tbl_content_contact`;
CREATE TABLE IF NOT EXISTS `tbl_content_contact` (
  `contact` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `contact_info` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_content_contact`
--

INSERT INTO `tbl_content_contact` (`contact`, `contact_info`) VALUES
('name', 'Recover hair'),
('address', 'blk 78 lot 123 bagong ahon, cebu'),
('number', '09139549850'),
('email', 'hair@me.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_history`
--

DROP TABLE IF EXISTS `tbl_history`;
CREATE TABLE IF NOT EXISTS `tbl_history` (
  `booking_id` int DEFAULT NULL,
  `booking_user` int DEFAULT NULL,
  `booking_service` int DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `booking_time` time DEFAULT NULL,
  `booking_status` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_history`
--

INSERT INTO `tbl_history` (`booking_id`, `booking_user`, `booking_service`, `booking_date`, `booking_time`, `booking_status`) VALUES
(85, 10, 8, '2023-12-12', '09:00:00', 2),
(86, 10, 9, '2023-12-20', '05:00:00', 2),
(87, 10, 3, '2023-12-28', '09:00:00', 2),
(88, 10, 9, '2023-12-30', '09:00:00', 2),
(91, 10, 8, '2023-12-13', '11:00:00', 2),
(89, 10, 9, '2023-12-21', '05:00:00', 2),
(90, 10, 0, '2023-12-27', '09:00:00', 2),
(92, 10, 8, '2023-12-27', '01:00:00', 2),
(93, 10, 0, '2023-12-21', '09:00:00', 2),
(95, 10, 1, '2023-12-20', '01:00:00', 2),
(94, 10, 9, '2023-12-21', '03:00:00', 2),
(96, 10, 3, '2023-12-29', '01:00:00', 2),
(98, 9, 6, '2023-12-20', '01:00:00', 2),
(97, 10, 8, '2023-12-20', '03:00:00', 2),
(102, 9, 8, '2023-12-25', '05:00:00', 2),
(105, 10, 8, '2023-12-28', '01:00:00', 2),
(100, 9, 8, '2023-12-29', '11:00:00', 2),
(99, 9, 8, '2024-01-03', '05:00:00', 2),
(103, 9, 9, '2024-01-03', '05:00:00', 2),
(106, 10, 8, '2024-02-20', '05:00:00', 2),
(107, 10, 8, '2024-04-01', '09:00:00', 2),
(112, 10, 8, '2024-01-31', '05:00:00', 2),
(111, 10, 2, '2024-02-01', '11:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_messages`
--

DROP TABLE IF EXISTS `tbl_messages`;
CREATE TABLE IF NOT EXISTS `tbl_messages` (
  `mess_id` int NOT NULL AUTO_INCREMENT,
  `mess_sender` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `mess_email` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `mess_content` longblob NOT NULL,
  PRIMARY KEY (`mess_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_messages`
--

INSERT INTO `tbl_messages` (`mess_id`, `mess_sender`, `mess_email`, `mess_content`) VALUES
(9, 'Prince', 'asdfasdfafaf@yahoo.com', 0x617364666166646166),
(10, 'prince', 'rockybalbonys@gmail.com', 0x7761686173646866686164666861),
(11, 'prince', 'rockybalbonys@gmail.com', 0x7761686173646866686164666861),
(12, 'Prince', 'rocky@wahaha.com', 0x74657374696e67),
(13, 'Prince', 'rocky@wahaha.com', 0x74657374696e672031),
(14, 'Prince', 'rocky@wahaha.com', 0x6578616d706c65),
(15, 'asdfasdfa', 'rocky@wahaha.com', 0x617364666173646661736664),
(16, 'asdfasdfa', 'rocky@wahaha.com', 0x617364666173646661736664);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stylists`
--

DROP TABLE IF EXISTS `tbl_stylists`;
CREATE TABLE IF NOT EXISTS `tbl_stylists` (
  `stylist_id` int NOT NULL AUTO_INCREMENT,
  `stylist_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`stylist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_stylists`
--

INSERT INTO `tbl_stylists` (`stylist_id`, `stylist_name`) VALUES
(10, 'Rockyhh'),
(11, 'Elmer'),
(15, 'Goliath'),
(16, 'Hagorn');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_password` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_firstname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_lastname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_gender` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `user_phonenumber` varchar(11) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_email`, `user_password`, `user_firstname`, `user_lastname`, `user_gender`, `user_phonenumber`) VALUES
(9, 'mangtomas@yahoo.com', '$2y$10$D3UvgPY7tnM7/hO0tfkaLuhunrlD3EwVxkcF5gVXGt3AeIgaLXxvW', 'Mang', ' Tomas', '', ' 0913434531'),
(10, 'rockybalbonys@gmail.com', '$2y$10$irZOr6gOMdJmSCbRsAboDueyU0P40cjG8yHrjhRcUaTpzlfEVsjk6', 'Rocky', ' Balbonys', '', ' 0911111111'),
(11, 'manghose@gmail.com', '$2y$10$p4pDMAshvTqSCjrjvv8w/O6aLUznhzACKlNXlOne1K7ayX5arW6HO', 'Mang', ' Hose', '', ' 0914345473'),
(12, 'thomason@gmail.com', '$2y$10$Sfqrf6C/f2GTaVgP4xr12eVUEWgrstwJ/JRN/YsfaJTmziD9eCCYa', 'Thomason', ' McKinley', '', ' 0934131111'),
(13, 'binato@gmail.com', '$2y$10$/8gZj.qyxCgFGdKHbEI3beHnPGxvIwGpm/p0vmZpqugF55T8sw6ry', 'Mang', 'bato', '', '09123123123'),
(14, 'mangjacinto@gmail.com', '$2y$10$NJw38MpwkaMy6vNYxNPd0erM01po0rAG8bUyz6kUjd6SBf1a0q/rK', 'Mang', 'jacinto', '', '09128361762'),
(15, 'admin@gmail.com', '$2y$10$h4qsX/S7eccUh16QxZq8bOXe4fVe.eZ8dLjbP9ULLOJ9L21O6lyAy', 'admin', 'admin', '', '03566446646');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

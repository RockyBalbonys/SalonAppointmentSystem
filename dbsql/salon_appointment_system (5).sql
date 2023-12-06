-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2023 at 03:19 PM
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

CREATE TABLE `tbl_admin_users` (
  `admin_id` int NOT NULL,
  `admin_username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `admin_password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin_users`
--

INSERT INTO `tbl_admin_users` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookings`
--

CREATE TABLE `tbl_bookings` (
  `booking_id` int NOT NULL,
  `booking_user` int NOT NULL,
  `booking_service` int NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` time(6) NOT NULL,
  `booking_status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_bookings`
--

INSERT INTO `tbl_bookings` (`booking_id`, `booking_user`, `booking_service`, `booking_date`, `booking_time`, `booking_status`) VALUES
(19, 1, 3, '0000-00-00', '00:00:00.000000', '1'),
(20, 1, 1, '2023-12-21', '21:40:00.000000', '1'),
(21, 3, 0, '2023-12-14', '17:33:00.000000', '1'),
(22, 3, 0, '2023-12-14', '17:33:00.000000', '1'),
(23, 3, 0, '2023-12-14', '17:33:00.000000', '1'),
(24, 3, 4, '2023-12-16', '20:00:00.000000', '1'),
(25, 6, 1, '2023-12-29', '13:56:00.000000', '1'),
(26, 1, 1, '2023-12-31', '12:45:00.000000', '1'),
(27, 1, 1, '2023-12-31', '12:45:00.000000', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking_services`
--

CREATE TABLE `tbl_booking_services` (
  `service_id` int NOT NULL,
  `service` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `service_cost` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_booking_services`
--

INSERT INTO `tbl_booking_services` (`service_id`, `service`, `service_cost`) VALUES
(1, 'Haircut', 1100),
(2, 'Hair Rebond', 1200),
(3, 'Hair Color', 1000),
(4, 'Hair Brazilian', 2000),
(5, 'Hair Highlights', 1400);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking_status`
--

CREATE TABLE `tbl_booking_status` (
  `booking_status_id` int NOT NULL,
  `booking_status` varchar(11) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_booking_status`
--

INSERT INTO `tbl_booking_status` (`booking_status_id`, `booking_status`) VALUES
(1, 'upcoming'),
(2, 'done'),
(3, 'deleted');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gender`
--

CREATE TABLE `tbl_gender` (
  `gender_id` int NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_gender`
--

INSERT INTO `tbl_gender` (`gender_id`, `gender`) VALUES
(1, 'male'),
(2, 'female'),
(3, 'others');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int NOT NULL,
  `user_email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_firstname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_lastname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_gender` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `user_phonenumber` varchar(11) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_email`, `user_password`, `user_firstname`, `user_lastname`, `user_gender`, `user_phonenumber`) VALUES
(1, 'rockybalbonys@gmail.com', 'wahaha', 'Rocky', 'Balbonys', '1', '09999999999'),
(2, 'thomason@gmail.com', 'wahaha1', 'Thomason', 'McKinley', '1', '09123456789'),
(3, 'analyn@gmail.com', 'wahaha2', 'Analyn', 'Muko', '3', '09192913123'),
(4, 'larrybato@gmail.com', 'wahaha123', 'Larry', ' bato', '1', ' 0917356284'),
(5, 'harrypota@yahoo.com', 'wahaha5', 'Harry', ' Potter', '3', ' 0937548975'),
(6, 'prince@yahoo.com', 'wahaha', 'prince', ' lawrence', '', ' 0917356284');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin_users`
--
ALTER TABLE `tbl_admin_users`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_booking_services`
--
ALTER TABLE `tbl_booking_services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `tbl_booking_status`
--
ALTER TABLE `tbl_booking_status`
  ADD PRIMARY KEY (`booking_status_id`);

--
-- Indexes for table `tbl_gender`
--
ALTER TABLE `tbl_gender`
  ADD PRIMARY KEY (`gender_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin_users`
--
ALTER TABLE `tbl_admin_users`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  MODIFY `booking_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_booking_services`
--
ALTER TABLE `tbl_booking_services`
  MODIFY `service_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_booking_status`
--
ALTER TABLE `tbl_booking_status`
  MODIFY `booking_status_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_gender`
--
ALTER TABLE `tbl_gender`
  MODIFY `gender_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

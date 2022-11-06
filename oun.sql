-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2022 at 02:59 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oun`
--

-- --------------------------------------------------------

--
-- Table structure for table `babysitter`
--

CREATE TABLE `babysitter` (
  `name` varchar(20) NOT NULL,
  `national_ID` int(10) NOT NULL,
  `phoneNo` int(10) NOT NULL,
  `password` varchar(128) NOT NULL,
  `gender` enum('Female','Male') NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `bio` varchar(500) NOT NULL,
  `sitter_image` varchar(500) NOT NULL DEFAULT 'images\\prpic.png',
  `average_rate` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `babysitter`
--

INSERT INTO `babysitter` (`name`, `national_ID`, `phoneNo`, `password`, `gender`, `age`, `email`, `city`, `bio`, `sitter_image`, `average_rate`) VALUES
('najla', 111, 2147483647, '674f3c2c1a8a6f90461e8a66fb5550ba', 'Female', 21, 'najla@gmail.com', 'riyadh', 'good cook ', 'prpic.png', NULL),
('noura', 333, 4, '202cb962ac59075b964b07152d234b70', 'Female', 22, 'noura@gmail.com', 'riyadh', 'yes', 'prpic.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(10) NOT NULL,
  `request_id` int(10) NOT NULL,
  `offer_id` int(10) NOT NULL,
  `review` varchar(500) DEFAULT NULL,
  `rating` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `offer_id` int(10) NOT NULL,
  `babysitter_id` int(10) NOT NULL,
  `request_id` int(10) NOT NULL,
  `price` float NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `parent_id` int(10) NOT NULL,
  `parent_image` varchar(500) DEFAULT 'prpic.png',
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `city` varchar(20) DEFAULT NULL,
  `district` varchar(20) DEFAULT NULL,
  `street` varchar(20) DEFAULT NULL,
  `buildingNo` varchar(20) DEFAULT NULL,
  `phoneNo` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`parent_id`, `parent_image`, `name`, `email`, `password`, `city`, `district`, `street`, `buildingNo`, `phoneNo`) VALUES
(2, 'prpic.png', 'nesreen', 'nesreen@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'riyadh', 'alyasmeen', 'tbo', '19A', 568585559);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(10) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `numOfKids` int(11) NOT NULL,
  `kid_name` varchar(100) NOT NULL,
  `kid_age` int(11) NOT NULL,
  `service_type` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `parent_id`, `numOfKids`, `kid_name`, `kid_age`, `service_type`, `date`, `start_time`, `end_time`) VALUES
(4, 2, 1, 'noura', 5, 'babysitting', '2022-11-16', '04:48:00', '06:00:00'),
(7, 2, 1, 'faisal', 7, 'cooking', '2022-11-16', '06:50:00', '10:04:00'),
(8, 2, 1, 'yas', 1, 'babysitting', '2022-11-24', '06:22:00', '09:22:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `babysitter`
--
ALTER TABLE `babysitter`
  ADD PRIMARY KEY (`national_ID`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `order_id` (`request_id`),
  ADD KEY `offer_id` (`offer_id`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`offer_id`),
  ADD KEY `babysitter_id` (`babysitter_id`),
  ADD KEY `request_id` (`request_id`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`parent_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `offer_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `parent_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `request` (`request_id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`offer_id`) REFERENCES `offer` (`offer_id`);

--
-- Constraints for table `offer`
--
ALTER TABLE `offer`
  ADD CONSTRAINT `offer_ibfk_1` FOREIGN KEY (`babysitter_id`) REFERENCES `babysitter` (`national_ID`),
  ADD CONSTRAINT `offer_ibfk_2` FOREIGN KEY (`request_id`) REFERENCES `request` (`request_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2022 at 05:57 PM
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
  `password` varchar(20) NOT NULL,
  `gender` enum('Female','Male') NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `major` varchar(30) NOT NULL,
  `academic_qual` enum('bachelors','masters','phd') NOT NULL,
  `experience_years` int(11) NOT NULL,
  `skills` varchar(100) NOT NULL,
  `languages` varchar(100) NOT NULL,
  `extra_info` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `babysitter`
--

INSERT INTO `babysitter` (`name`, `national_ID`, `phoneNo`, `password`, `gender`, `age`, `email`, `city`, `major`, `academic_qual`, `experience_years`, `skills`, `languages`, `extra_info`) VALUES
('renad', 11186852, 565690033, '5678', 'Female', 20, 'renad@gmail.com', 'riyadh', 'education', 'bachelors', 5, 'tutoring', 'arabic -english', 'idk'),
('deema', 111863522, 5642333, '1234', 'Female', 20, 'deema@gmail.com', 'riyadh', 'swe', 'bachelors', 3, 'cooking', 'arabic -english', 'idk');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `kid_id` int(10) NOT NULL,
  `review` varchar(500) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `date` date NOT NULL,
  `babysitter_id` int(10) NOT NULL,
  `parent_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `kid_id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `gender` enum('Female','Male') NOT NULL,
  `age` int(2) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`kid_id`, `name`, `gender`, `age`, `email`) VALUES
(1, 'lulu', 'Female', 3, 'nesreen@gmail.com'),
(2, 'fahad', 'Male', 6, 'sara@gmail.com'),
(3, 'ahmad', 'Male', 4, 'taif@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `price` float NOT NULL,
  `service_type` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `parent_image` blob NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `street` varchar(20) NOT NULL,
  `buildingNo` varchar(20) NOT NULL,
  `phoneNo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`parent_image`, `name`, `email`, `password`, `city`, `district`, `street`, `buildingNo`, `phoneNo`) VALUES
('', 'nesreen', 'nesreen@gmail.com', '1234', 'riyadh', 'alyasmeen', 'turki', '19A', 568585559),
('', 'sara', 'sara@gmail.com', '5678', 'riyadh', 'alnafel', 'street3', '12', 56783737),
('', 'taif', 'taif@gmail.com', '91011', 'riyadh', 'alhamra', 'mdri', '6', 5649304);

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
  ADD KEY `order_id` (`order_id`),
  ADD KEY `kid_id` (`kid_id`),
  ADD KEY `babysitter_id` (`babysitter_id`),
  ADD KEY `parent_email` (`parent_email`);

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`kid_id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `kid_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`kid_id`) REFERENCES `children` (`kid_id`),
  ADD CONSTRAINT `bookings_ibfk_3` FOREIGN KEY (`babysitter_id`) REFERENCES `babysitter` (`national_ID`),
  ADD CONSTRAINT `bookings_ibfk_4` FOREIGN KEY (`parent_email`) REFERENCES `parent` (`email`);

--
-- Constraints for table `children`
--
ALTER TABLE `children`
  ADD CONSTRAINT `children_ibfk_1` FOREIGN KEY (`email`) REFERENCES `parent` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

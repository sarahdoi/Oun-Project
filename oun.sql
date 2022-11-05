-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2022 at 09:22 PM
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
  `sitter_image` varchar(500) NOT NULL DEFAULT 'images\\prpic.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `babysitter`
--

INSERT INTO `babysitter` (`name`, `national_ID`, `phoneNo`, `password`, `gender`, `age`, `email`, `city`, `bio`, `sitter_image`) VALUES
('www1', 11, 11, 'c4ca4238a0b923820dcc509a6f75849b', 'Female', 11, 'df11sa@gmail.com', '1', '11', '1667667998flowchart11.png'),
('fff', 6666, 66, '1679091c5a880faf6fb5e6087eb1b2dc', 'Female', 66, '666dfsa@gmail.com', 'vv', '66', 'prpic.png'),
('aaa', 111111, 111, 'c4ca4238a0b923820dcc509a6f75849b', 'Female', 111, 'dfs111a@gmail.com', '1', '11', '1667669099flowchart11.png'),
('sss', 444444, 4, 'a87ff679a2f3e71d9181a67b7542122c', 'Female', 44, '4ca@gmail.com', 'vfv', 'fffff', 'prpic.png'),
('55555555555', 5555555, 5555555, 'e4da3b7fbbce2345d7772b0674a318d5', 'Female', 55, '55ca@gmail.com', 'v', '555', 'prpic.png'),
('aaa', 11113311, 1131, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'Female', 111, 'dfs3111a@gmail.com', '1', '11', 'prpic.png'),
('sss', 12323213, 3223, 'c81e728d9d4c2f636f067f89cc14862c', 'Female', 32, 'dfsfsa@gmail.com', 'f', 'ded', 'images\\prpic.png'),
('444444', 44444444, 444444, 'c81e728d9d4c2f636f067f89cc14862c', 'Female', 44, 'dfsfsa4444@gmail.com', '4', '44', 'prpic.png'),
('www', 123232133, 32233, '0cc175b9c0f1b6a831c399e269772661', 'Male', 22, 'dfsfsdsca@gmail.com', 'v', 'dd', 'prpic.png'),
('test2', 2147483647, 322332, '0cc175b9c0f1b6a831c399e269772661', 'Male', 22, 'ca@gmail.com', 'v', 'dd', 'prpic.png');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(10) NOT NULL,
  `request_id` int(10) NOT NULL,
  `babysitter_id` int(10) NOT NULL,
  `parent_id` int(10) NOT NULL,
  `price` float NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `review` varchar(500) NOT NULL,
  `rating` float NOT NULL
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
(1, 0, 2, 'aziz', 7, 'babysitting', '2022-11-05', '16:00:00', '00:00:00'),
(2, 0, 2, 'aziz', 7, 'babysitting', '2022-11-05', '16:00:00', '19:00:00'),
(3, 1, 2, 'do', 3, 'babysitting', '2022-11-09', '23:06:00', '23:10:00');

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
  ADD KEY `babysitter_id` (`babysitter_id`),
  ADD KEY `parent_id` (`parent_id`);

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
  ADD PRIMARY KEY (`request_id`);

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
  MODIFY `parent_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `request` (`request_id`),
  ADD CONSTRAINT `bookings_ibfk_3` FOREIGN KEY (`babysitter_id`) REFERENCES `babysitter` (`national_ID`),
  ADD CONSTRAINT `bookings_ibfk_4` FOREIGN KEY (`parent_id`) REFERENCES `parent` (`parent_id`);

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

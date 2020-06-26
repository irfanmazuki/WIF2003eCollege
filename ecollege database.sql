-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2020 at 11:51 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecollege`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `section` varchar(128) NOT NULL,
  `activity` varchar(128) NOT NULL,
  `cur_date` datetime NOT NULL,
  `status` varchar(128) NOT NULL DEFAULT 'Pending',
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `section`, `activity`, `cur_date`, `status`, `email`) VALUES
(1, 'SUKMUM', 'Swimming', '2020-06-24 14:46:34', 'Pending', 'irfan@gmail.com'),
(2, 'SUKMUM', 'Kayak', '2020-06-24 14:46:34', 'Pending', 'irfan@gmail.com'),
(3, 'SUKMUM', 'Futsal', '2020-06-24 14:46:34', 'Pending', 'kishen@gmail.com'),
(7, 'SUKMUM', 'Swimming', '2020-06-24 14:51:47', 'Pending', 'rohana@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `aplications`
--

CREATE TABLE `aplications` (
  `id` int(11) NOT NULL,
  `checkin` varchar(255) NOT NULL,
  `checkout` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `roomtype` varchar(255) NOT NULL,
  `datee` timestamp NOT NULL DEFAULT current_timestamp(),
  `purpose` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aplications`
--

INSERT INTO `aplications` (`id`, `checkin`, `checkout`, `phone`, `email`, `roomtype`, `datee`, `purpose`, `status`) VALUES
(47, '2020-07-02', '', 0, 'kishen@gmail.com', 'double', '2020-06-22 19:06:30', 'ahahha', 'Pending'),
(54, '2020-06-25', '2020-06-29', 1117975766, 'irfan@gmail.com', 'singles', '2020-06-23 14:28:37', 'IKUT LAH', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `lodgereport`
--

CREATE TABLE `lodgereport` (
  `reportID` int(10) NOT NULL,
  `matric` tinytext NOT NULL,
  `category` longtext NOT NULL,
  `rep_type` longtext NOT NULL,
  `details` longtext NOT NULL,
  `rep_location` longtext NOT NULL,
  `dateLodged` text NOT NULL,
  `rating` int(10) NOT NULL,
  `status` int(10) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lodgereport`
--

INSERT INTO `lodgereport` (`reportID`, `matric`, `category`, `rep_type`, `details`, `rep_location`, `dateLodged`, `rating`, `status`, `email`) VALUES
(24706640, 'WIF180009', 'bedroom', 'no-wifi', 'Wifi xde oi', 'Bilik saya', '2020-06-22 11:06:38pm', 0, 0, 'kishen@gmail.com'),
(27890627, 'wif180044', 'toilet', 'broken', 'Pintu pecah', 'Aras 4', '2020-06-20 05:09:46am', 5, 2, 'irfan@gmail.com'),
(61221831, 'wif180044', 'toilet', 'water leaking', 'Please fix asap', 'aras 6', '2020-06-19 10:07:47pm', 2, 2, 'rohana@gmail.com'),
(74488613, 'wif180044', 'comittee room', 'no-wifi', 'I can\'t find wifi here', 'LG', '2020-06-20 05:13:59am', 3, 1, 'irfan@gmail.com'),
(99052582, 'WIF180044', '', '', 'jja', '', '2020-06-24 05:49:45pm', 0, 0, 'irfan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `gender` tinytext NOT NULL,
  `matric` tinytext NOT NULL,
  `ic` tinytext NOT NULL,
  `phone` tinytext NOT NULL,
  `nationality` tinytext NOT NULL,
  `country` tinytext NOT NULL,
  `address` longtext NOT NULL,
  `city` tinytext NOT NULL,
  `state` tinytext NOT NULL,
  `poscode` tinytext NOT NULL,
  `r_college` longtext NOT NULL,
  `room` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `password` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `fullname`, `gender`, `matric`, `ic`, `phone`, `nationality`, `country`, `address`, `city`, `state`, `poscode`, `r_college`, `room`, `email`, `password`) VALUES
(123, 'Muhammad Irfan bin Mazuki', 'male', 'WIF180044', '990904115245', '01117975766', 'National Citizen', 'Malaysia', 'B-177, Kampung Tanjung', 'Kuala Terengganu', 'Terengganu', '21020', 'KK11', 'B-147', 'irfan@gmail.com', '$2y$10$TIWJkb2nekpxqfZbXk1pJe5pcHvNDR2XEUBrwm73mD1DOP8RTWGPi'),
(124, 'Rohana binti Yusof', 'female', 'OIC190011', '80112021281', '0199666517', 'Foreigner', 'South Korea', 'B-177, Kampung Tanjung', 'Kuala Terengganu', 'Terengganu', '21020', 'KK8', 'B-147', 'rohana@gmail.com', '$2y$10$haQyETRaL2DQYUjKXJ2eCOFvRlH7i8GRvEuupdHnz3qRmXreuP4UG'),
(127, 'Kishen Kumar', 'male', 'WIF180009', '991201012933', '0148281129', 'National Citizen', 'Malaysia', 'Taman Bahagia', 'Cheras', 'Selangor', '41070', 'KK8', 'A-100', 'kishen@gmail.com', '$2y$10$96.l1eLZNEpZL3m/KR5HMub/Bnu1z1O8uqu0A./tpjb8Q5SYP4NZ2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aplications`
--
ALTER TABLE `aplications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lodgereport`
--
ALTER TABLE `lodgereport`
  ADD PRIMARY KEY (`reportID`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `aplications`
--
ALTER TABLE `aplications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

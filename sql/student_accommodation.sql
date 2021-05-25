-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2021 at 11:57 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_accommodation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `fullName` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `signupDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `fullName`, `email`, `password`, `signupDate`) VALUES
(1, 'Manish Bharti', 'admin@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-05-24 16:01:07'),
(2, 'Admin2', 'admin@mail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-05-24 16:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `roomId` int(11) NOT NULL,
  `roomType` varchar(20) NOT NULL,
  `roomLocation` varchar(100) NOT NULL,
  `monthlyCharge` float NOT NULL DEFAULT 0,
  `roomAllocated` int(11) NOT NULL DEFAULT 0,
  `paymentStatus` int(11) NOT NULL DEFAULT 0,
  `roomAdditionTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`roomId`, `roomType`, `roomLocation`, `monthlyCharge`, `roomAllocated`, `paymentStatus`, `roomAdditionTime`) VALUES
(2, '1BHK', 'Delhi', 1500, 1, 0, '2021-05-25 10:52:21'),
(3, '3BHK', 'Mumbai', 2500, 1, 0, '2021-05-25 10:52:21'),
(5, '2BHK', 'Kolkata', 3000, 0, 0, '2021-05-25 15:20:14'),
(6, '2BHK', 'Kolkata', 10.5, 0, 0, '2021-05-25 15:23:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `fullName` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `signupDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `fullName`, `email`, `password`, `signupDate`) VALUES
(1, 'Manish Bharti User', 'mbharti@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-05-24 16:04:17'),
(2, 'Mano User', 'mano123@mail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-05-24 16:04:17'),
(3, 'cwecew', 'Joyeeta2@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-05-24 23:38:58'),
(4, 'Joyeeta Dash', 'Joyeeta@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-05-24 23:58:15'),
(7, 'Ganesh Kumar', 'ganesh@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-05-25 14:38:33'),
(8, 'Jovita', 'jovita@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-05-25 14:39:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`roomId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `roomId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

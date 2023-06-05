-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2022 at 04:57 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`ID`, `NAME`, `EMAIL`, `PASSWORD`) VALUES
(1, 'Ali', 'ali@gmail.com', 'ali@123'),
(2, 'Hira', 'hira@gmail.com', 'hira@123');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `PRICE` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `NAME`, `PRICE`) VALUES
(1, 'Zinger Burger', 350),
(2, 'Pizza', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `FNAME` varchar(50) NOT NULL,
  `LNAME` varchar(50) NOT NULL,
  `AGE` tinyint(4) NOT NULL,
  `GENDER` varchar(50) NOT NULL,
  `CITY` varchar(50) NOT NULL,
  `IMAGE_PATH` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `FNAME`, `LNAME`, `AGE`, `GENDER`, `CITY`, `IMAGE_PATH`) VALUES
(1, 'Usman', 'Hameed', 24, 'Male', 'Karachi', 'images/QuxqGxX-assassins-creed-3-wallpapers.jpg'),
(3, 'Bilal', 'Amir', 24, 'Male', 'Lahore', 'images/QuxqGxX-assassins-creed-3-wallpapers.jpg'),
(4, 'Zain', 'Khawar', 26, 'Male', 'Karachi', 'images/WhatsApp Image 2021-07-14 at 5.28.18 PM.jpeg'),
(5, 'Fahad', 'Ahmed', 24, 'Male', 'Lahore', 'images/WhatsApp Image 2021-07-14 at 5.28.18 PM.jpeg'),
(6, 'Rida', 'Arshad', 23, 'Female', 'Karachi', 'images/QuxqGxX-assassins-creed-3-wallpapers.jpg'),
(7, 'Danish', 'Arshad', 20, 'Male', 'Lahore', 'images/QuxqGxX-assassins-creed-3-wallpapers.jpg'),
(8, 'Ali', 'Gujjar', 27, 'Male', 'Karachi', 'images/WhatsApp Image 2021-07-14 at 5.28.18 PM.jpeg'),
(9, 'Maryum', 'Atif', 24, 'Female', 'Lahore', 'images/WhatsApp Image 2021-07-14 at 5.28.18 PM.jpeg'),
(10, 'Bisma', 'Shehzad', 21, 'Female', 'Karachi', 'images/QuxqGxX-assassins-creed-3-wallpapers.jpg'),
(12, 'Amir', 'Siddique', 26, 'Male', 'Peshawar', 'images/QuxqGxX-assassins-creed-3-wallpapers.jpg'),
(13, 'Anas', 'Khan', 19, 'Male', 'Karachi', 'images/WhatsApp Image 2021-07-14 at 5.28.18 PM.jpeg'),
(14, 'Abdul', 'Basit', 28, 'Male', 'Karachi', 'images/WhatsApp Image 2021-07-14 at 5.28.18 PM.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

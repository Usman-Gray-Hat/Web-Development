-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2022 at 05:40 PM
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
-- Database: `usman`
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
(1, 'Usman', 'usman@gmail.com', 'Usman@123'),
(2, 'Bilal', 'bilal@gmail.com', 'Bilal@123');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `AGE` tinyint(4) NOT NULL,
  `GENDER` varchar(50) NOT NULL,
  `CITY` varchar(50) NOT NULL,
  `IMAGE_PATH` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `NAME`, `AGE`, `GENDER`, `CITY`, `IMAGE_PATH`) VALUES
(1, 'Asif Ali', 26, 'Male', 'Islamabad', 'images/asifAli.jpg'),
(2, 'Babar Azam', 24, 'Male', 'Lahore', 'images/babar.jpg'),
(3, 'Muhammad Amir', 27, 'Male', 'Karachi', 'images/amir.jpg'),
(4, 'Faheem Ashraf', 25, 'Male', 'Islamabad', 'images/faheem.jpg'),
(5, 'Fakhar Zaman', 30, 'Male', 'Lahore', 'images/fakhar.jpg'),
(6, 'Fawad Alam', 32, 'Male', 'Karachi', 'images/fawad.jpg'),
(7, 'Muhammad Hafeez', 32, 'Male', 'Lahore', 'images/hafeez.jpg'),
(8, 'Muhammad Rizwan', 31, 'Male', 'Peshawar', 'images/rizwan.jpg'),
(9, 'Haris Rauf', 23, 'Male', 'Lahore', 'images/haris.jpg'),
(10, 'Shadab Khan', 25, 'Male', 'Islamabad', 'images/shadab.jpg'),
(11, 'Shaheen Afridi', 24, 'Male', 'Lahore', 'images/shaheen.jpg'),
(12, 'Shoaib Malik', 34, 'Male', 'Peshawar', 'images/shoaibMalik.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

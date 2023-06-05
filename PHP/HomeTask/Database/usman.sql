-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2022 at 04:16 PM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `FNAME` varchar(50) NOT NULL,
  `LNAME` varchar(50) NOT NULL,
  `AGE` tinyint(4) NOT NULL,
  `GENDER` varchar(50) NOT NULL,
  `CITY` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `IMAGE_PATH` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `FNAME`, `LNAME`, `AGE`, `GENDER`, `CITY`, `EMAIL`, `PASSWORD`, `IMAGE_PATH`) VALUES
(7, 'Babar', 'Azam', 27, 'Male', 'Karachi', 'babar@gmail.com', 'Babar123', 'images/babar.jpg'),
(12, 'Muhammad', 'Rizwan', 29, 'Male', 'Karachi', 'rizwan@gmail.com', 'Rizwan@123', 'images/rizwan.jpg'),
(13, 'Muhammad', 'Amir', 26, 'Male', 'Lahore', 'amir@gmail.com', 'Amir@123', 'images/amir.jpg'),
(14, 'Asif', 'Ali', 28, 'Male', 'Islamabad', 'asif@gmail.com', 'Asif@123', 'images/asifAli.jpg'),
(15, 'Faheem', 'Ashraf', 23, 'Male', 'Islamabad', 'faheem@gmail.com', 'Faheem@123', 'images/faheem.jpg'),
(16, 'Fakhar', 'Zaman', 30, 'Male', 'Lahore', 'fakhar@gmail.com', 'Fakhar@123', 'images/fakhar.jpg'),
(17, 'Fawad', 'Alam', 32, 'Male', 'Peshawar', 'fawad@hotmail.com', 'Fawad@123', 'images/fawad.jpg'),
(18, 'Muhammad', 'Hafeez', 33, 'Male', 'Lahore', 'hafeez@gmail.com', 'Hafeez@123', 'images/hafeez.jpg'),
(19, 'Haris', 'Rauf', 24, 'Male', 'Karachi', 'haris@gmail.com', 'Haris@123', 'images/haris.jpg'),
(20, 'Shadab', 'Khan', 24, 'Male', 'Islamabad', 'shaddy@yahoo.com', 'Shadab@123', 'images/shadab.jpg'),
(21, 'Shaheen', 'Afridi', 22, 'Male', 'Karachi', 'shaheen@hotmail.com', 'Shaheen@123', 'images/shaheen.jpg'),
(22, 'Shoaib', 'Malik', 34, 'Male', 'Peshawar', 'shoaib@yahoo.com', 'Shoaib@123', 'images/shoaibMalik.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

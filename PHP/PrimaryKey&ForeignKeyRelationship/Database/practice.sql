-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2023 at 05:41 PM
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
-- Database: `practice`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`) VALUES
(1, 'Usman Hameed', 'usmanhameed1790@gmail.com', '9dd4e461268c8034f5c8564e155c67a6'),
(2, 'Anas Waseem', 'anas_waq@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(3, 'Bilal Amir', 'bilalamir90@gmail.com', '92eb5ffee6ae2fec3ad71c777531578f');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `age` tinyint(4) DEFAULT NULL,
  `qualification` varchar(50) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `gender`, `age`, `qualification`, `admin_id`) VALUES
(1, 'Shadab Khan', 'Male', 22, 'Bachelors', 1),
(2, 'Fakhar Zaman', 'Male', 34, 'BBA', 1),
(3, 'Babar Azam', 'Male', 29, 'Masters', 2),
(4, 'Shaheen Afridi', 'Male', 22, 'Bachelors', 2),
(5, 'Maham Malik', 'Female', 23, 'Software Engineer', 3),
(6, 'Naseem Shah', 'Male', 21, 'Intermediate', 3),
(7, 'Ayesha Tarrar Khan', 'Female', 27, 'MBA', 1),
(8, 'Muzammil Khan Niazi', 'Male', 25, 'BSCS', 2),
(9, 'Rida Arshad', 'Female', 24, 'BCOM', 1),
(10, 'Bushra Khan', 'Female', 23, 'BBA', 2),
(11, 'Saad Rajpoot', 'Male', 26, 'Media Sciences', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2023 at 12:00 AM
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
-- Database: `load_more`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `age` tinyint(4) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `salary` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `gender`, `age`, `email`, `city`, `salary`) VALUES
(1, 'Usman Hameed', 'Male', 24, 'usman@gmail.com', 'Karachi', '250000'),
(2, 'Bilal Amir', 'Male', 25, 'bilal@gmail.com', 'Lahore', '250000'),
(3, 'Talha Chaudhary', 'Male', 25, 'talha@gmail.com', 'Lahore', '400000'),
(4, 'Shahzaib Khan', 'Male', 25, 'sk@gmail.com', 'Karachi', '300000'),
(5, 'Rida Arshad', 'Female', 22, 'rida@gmail.com', 'Faisalabad', '90000'),
(6, 'Raheel Azam', 'Male', 26, 'raheel@gmail.com', 'Karachi', '100000'),
(7, 'Zain Khawar', 'Male', 23, 'zain@gmail.com', 'Karachi', '130000'),
(8, 'Aiman Nasir', 'Female', 24, 'aiman@gmail.com', 'Faisalabad', '250000'),
(9, 'Taha Maqsood', 'Male', 21, 'taha@gmail.com', 'Karachi', '300000'),
(10, 'Rabia Waheed', 'Female', 24, 'rabia@gmail.com', 'Karachi', '75000'),
(11, 'Aashir Ali Khan', 'Male', 24, 'aashir@gmail.com', 'Karachi', '200000'),
(12, 'Farhan Ali', 'Male', 25, 'farhan@gmail.com', 'Karachi', '500000'),
(13, 'Sawera Arif', 'Female', 23, 'sawera@gmail.com', 'Karachi', '100000'),
(14, 'Danish Arshad', 'Male', 26, 'danish@gmail.com', 'Lahore', '250000'),
(15, 'Arif Ali', 'Male', 22, 'arif@gmail.com', 'Faisalabad', '80000'),
(16, 'Tooba Iqbal Qureshi', 'Female', 25, 'tooba@gmail.com', 'Quetta', '300000'),
(17, 'Nouman Khan', 'Male', 23, 'nouman@gmail.com', 'Quetta', '120000'),
(18, 'Babar Azam', 'Male', 28, 'babar@gmail.com', 'Lahore', '250000'),
(19, 'Fahad Ahmed', 'Male', 24, 'fahad@gmail.com', 'Faisalabad', '250000'),
(20, 'Maryum Atif', 'Female', 24, 'maryum@gmail.com', 'Faisalabad', '250000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

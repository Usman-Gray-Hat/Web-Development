-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2022 at 04:15 PM
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
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` tinyint(4) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `age`, `gender`, `email`, `address`) VALUES
(101, 'Usman Hameed', 24, 'Male', 'usmanhameed1790@gmail.com', 'Bahria Town'),
(102, 'Bilal Amir', 25, 'Male', 'bilalamir@gmail.com', 'DHA Phase 6'),
(103, 'Rida Arshad', 22, 'Female', 'ridaarshad@gmail.com', 'Defense Khayban-e-Ittehad'),
(104, 'Taha Maqsood', 20, 'Male', 'tahamaqsood@gmail.com', 'Malir Cantt'),
(105, 'Erum Khan', 25, 'Female', 'erumkhan@gmail.com', 'Saadi Town'),
(106, 'Usman Khan', 27, 'Male', 'usmankhan@gmail.com', 'Gulistan-e-Johar'),
(107, 'Maham Malik', 21, 'Female', 'mahammalik@gmail.com', 'Gulshan-e-Iqbal'),
(108, 'Raheel Azam', 26, 'Male', 'raheelazam@gmail.com', 'Gulshan-e-Iqbal'),
(109, 'Talha Chaudhary', 25, 'Male', 'talhachaudhary@gmail.com', 'DHA Phase 7'),
(110, 'Maheen Shahid', 23, 'Female', 'maheenshahid@gmail.com', 'Gulshan-e-Maymaar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

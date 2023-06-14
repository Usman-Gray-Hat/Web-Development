-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2023 at 01:48 AM
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
-- Database: `star_ratings`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `average_rating` varchar(50) DEFAULT NULL,
  `total_reviews` bigint(20) DEFAULT NULL,
  `description` varchar(600) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `average_rating`, `total_reviews`, `description`) VALUES
(1, 'Amazon Web Services', '3.4', 7, 'Amazon Web Services (AWS) is a comprehensive cloud computing platform offered by Amazon.com. It provides a wide range of services that enable individuals and businesses to build and deploy applications and services in the cloud, without the need for physical infrastructure.'),
(2, 'Linux Cyber Security', '3', 2, '\nLinux cyber security refers to the practices, technologies, and measures implemented to protect Linux-based systems and networks from cyber threats, vulnerabilities, and unauthorized access. Linux, being an open-source operating system, is widely used in servers, embedded devices, and many other computing environments, making it an attractive target for malicious actors.'),
(3, 'Networking', '3', 4, 'Networking refers to the practice of connecting computer systems and devices together to facilitate communication and the exchange of information. It involves the design, implementation, management, and maintenance of hardware, software, and protocols that enable data transfer between devices within a network.');

-- --------------------------------------------------------

--
-- Table structure for table `course_ratings`
--

CREATE TABLE `course_ratings` (
  `id` int(11) NOT NULL,
  `course_name` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `review` varchar(900) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_ratings`
--

INSERT INTO `course_ratings` (`id`, `course_name`, `username`, `email`, `contact`, `review`, `rating`, `date_created`) VALUES
(1, 'Amazon Web Services', 'Usman Hameed', 'usmanhameed1790@gmail.com', '7418526565', 'best ', 5, '2023-06-14 20:39:49'),
(2, 'Amazon Web Services', 'taha', 'taha@gmail.com', '3454353', 'bad', 2, '2023-06-14 23:03:07'),
(3, 'Amazon Web Services', 'Usman 11', 'usmanhameed1790@gmail.com', '7418526565', 'need to improve', 1, '2023-06-14 23:03:23'),
(4, 'Networking', 'vv', 'usmanhameed1790@gmail.com', '7418526565', 'khatarnak course', 5, '2023-06-14 20:40:57'),
(5, 'Networking', 'll', 'usmanhameed1790@gmail.com', '7418526565', 'fuk', 1, '2023-06-14 20:41:17'),
(6, 'Amazon Web Services', 'Usman Hameed', 'usmanhameed1790@gmail.com', '7418526565', 'h', 5, '2023-06-14 21:21:01'),
(7, 'Amazon Web Services', 'Usman', 'usmanhameed1790@gmail.com', '7418526565', 'h', 5, '2023-06-14 21:21:31'),
(8, 'Amazon Web Services', 'Usman', 'usmanhameed1790@gmail.com', '7418526565', 'h', 2, '2023-06-14 21:46:16'),
(9, 'Networking', 'Umer', 'usmanhameed1790@gmail.com', '7418526565', 'adasdasdas', 3, '2023-06-14 21:46:48'),
(10, 'Linux Cyber Security', 'Usman Hameed', 'usmanhameed1790@gmail.com', '7418526565', 'good', 4, '2023-06-14 21:47:13'),
(11, 'Linux Cyber Security', 'Usman', 'usmanhameed1790@gmail.com', '7418526565', 'g', 2, '2023-06-14 21:49:35'),
(12, 'Networking', 'basit', 'we@gmail.com', '7418526565', 'asda', 3, '2023-06-14 21:49:57'),
(13, 'Amazon Web Services', 'Zain', 'zed@gmail.com', '6589551', 'bomb', 4, '2023-06-14 21:50:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_ratings`
--
ALTER TABLE `course_ratings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_ratings`
--
ALTER TABLE `course_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

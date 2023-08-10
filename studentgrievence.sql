-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2023 at 06:12 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srkrcollege`
--

-- --------------------------------------------------------

--
-- Table structure for table `studentgrievence`
--

CREATE TABLE `studentgrievence` (
  `gid` int(11) NOT NULL,
  `sname` varchar(20) NOT NULL,
  `studentname` varchar(50) NOT NULL,
  `register_number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `department` varchar(5) NOT NULL,
  `year` varchar(5) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `gtype` varchar(30) NOT NULL,
  `grievence` varchar(200) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentgrievence`
--

INSERT INTO `studentgrievence` (`gid`, `sname`, `studentname`, `register_number`, `email`, `department`, `year`, `gender`, `gtype`, `grievence`, `status`) VALUES
(2, 'Aayapa', 'Shiva', '21B91A6201', 'rksspraveen.789@gmail.com', 'CSE', '2024', 'other', 'Ragging Related', 'Rama', 1),
(3, 'Chatrathi', 'Ravi Kumar Satya Sai Praveen', '21B91A6206', 'ravikumar_csd@srkrec.edu.in', 'CSE', '2025', 'Femal', 'Ragging Related', 'sddd', 1),
(4, 'Ohm', 'Shiva Bhavani', '21B91A6202', 'ravikumar_csd@srkrec.edu.in', 'CSE', '2025', 'Femal', 'Hostel Related', 'Rama Krishna Garu ame', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `studentgrievence`
--
ALTER TABLE `studentgrievence`
  ADD PRIMARY KEY (`gid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `studentgrievence`
--
ALTER TABLE `studentgrievence`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

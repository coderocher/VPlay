-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2023 at 08:12 PM
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
-- Database: `vplay`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bid` int(11) NOT NULL,
  `bdate` date DEFAULT NULL,
  `accno` int(11) DEFAULT NULL,
  `sno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bid`, `bdate`, `accno`, `sno`) VALUES
(101, '2023-07-25', 101, 1),
(102, '2023-07-25', 103, 2),
(103, '2023-07-26', 102, 2),
(104, '2023-07-27', 102, 1),
(105, '2023-07-27', 103, 1),
(106, '2023-07-27', 103, 2),
(107, '2023-07-27', 104, 2),
(108, '2023-07-27', 105, 5),
(109, '2023-07-27', 105, 5),
(116, '2023-07-28', 102, 1),
(117, '2023-07-28', 102, 1),
(118, '2023-07-30', 102, 2),
(119, '2023-09-11', 105, 4),
(120, '2023-09-15', 105, 1),
(121, '2023-09-15', 105, 4);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `ACCNO` int(11) NOT NULL,
  `NAME` varchar(30) DEFAULT NULL,
  `EMAIL` varchar(30) DEFAULT NULL,
  `PHONE` int(18) DEFAULT NULL,
  `USERNAME` varchar(30) DEFAULT NULL,
  `PASSWORD` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ACCNO`, `NAME`, `EMAIL`, `PHONE`, `USERNAME`, `PASSWORD`) VALUES
(101, 'admin', 'admin@gmail.com', 625891347, 'adminvplay', 'vplay@123'),
(102, 'Saina Nehwal', 'saina@gmail.com', 648925713, 'iamsaina', 'saina@89ay'),
(103, 'Virat Kohli', 'virat@gmail.com', 612345678, 'thenameisvirat', 'Virushka'),
(104, 'Sunil Chhetri', 'sunil@yahoo.com', 657689234, 'footballGOAT', 'chhetri@123'),
(105, 'P V Sindhu', 'sindhu@gmail.com', 2147483647, 'sindhusindhu', 'Sindhu@vplay');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `sno` int(11) DEFAULT NULL,
  `slot` varchar(10) DEFAULT NULL,
  `num_of_courts` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`sno`, `slot`, `num_of_courts`) VALUES
(1, 'Morning', 1),
(1, 'Noon', 0),
(1, 'Evening', 0),
(2, 'Morning', 0),
(2, 'Noon', 0),
(2, 'Evening', 0),
(3, 'Morning', 0),
(3, 'Noon', 0),
(3, 'Evening', 0),
(4, 'Morning', 0),
(4, 'Noon', 0),
(4, 'Evening', 1),
(5, 'Morning', 0),
(5, 'Noon', 0),
(5, 'Evening', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sport`
--

CREATE TABLE `sport` (
  `sno` int(11) NOT NULL,
  `sname` varchar(20) DEFAULT NULL,
  `num_of_courts` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sport`
--

INSERT INTO `sport` (`sno`, `sname`, `num_of_courts`) VALUES
(1, 'Badminton', 4),
(2, 'Football', 2),
(3, 'Cricket', 5),
(4, 'Golf', 1),
(5, 'BasketBall', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `sno` (`sno`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ACCNO`);

--
-- Indexes for table `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`sno`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`sno`) REFERENCES `sport` (`sno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

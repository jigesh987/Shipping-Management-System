-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2022 at 04:47 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dnvproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admindatabase`
--

CREATE TABLE `admindatabase` (
  `admin` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admindatabase`
--

INSERT INTO `admindatabase` (`admin`, `password`) VALUES
('system', 'system');

-- --------------------------------------------------------

--
-- Table structure for table `container_table`
--

CREATE TABLE `container_table` (
  `source` varchar(200) NOT NULL,
  `destination` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `size` varchar(200) NOT NULL,
  `customer_email` varchar(200) NOT NULL,
  `phonenumber` varchar(200) NOT NULL,
  `Date_and_time` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `order_id` int(200) NOT NULL,
  `cargo_weight` varchar(200) NOT NULL,
  `DOD` varchar(200) NOT NULL,
  `userid` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `container_table`
--

INSERT INTO `container_table` (`source`, `destination`, `type`, `size`, `customer_email`, `phonenumber`, `Date_and_time`, `name`, `order_id`, `cargo_weight`, `DOD`, `userid`) VALUES
('Mundra Port, Gujarat', 'Mumbai Port, Maharashtra', 'Standard', '20 ft', 'nishantmangliya26@gmail.com', '8888888888', '2022-04-13 12:50:57', 'NISHANT MANGLIYA', 65, '1200kg', '2022-05-15', 151);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `userid` int(100) NOT NULL,
  `username` varchar(200) NOT NULL,
  `userage` varchar(200) NOT NULL,
  `useremail` varchar(200) NOT NULL,
  `date_of_birth` date NOT NULL,
  `usergender` varchar(200) NOT NULL,
  `userphone` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`userid`, `username`, `userage`, `useremail`, `date_of_birth`, `usergender`, `userphone`, `password`, `date`) VALUES
(151, 'NISHANT MANGLIYA', '23', 'nishantmangliya26@gmail.com', '1999-10-14', 'male', '8888888888', 'laptoptablet', '2022-04-13 12:47:53');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `receiver` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `body` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `comment` varchar(500) NOT NULL,
  `date` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phoneoremail` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`comment`, `date`, `name`, `phoneoremail`) VALUES
('Please make your service little bit fast', '2022-04-13 12:42:01', 'pukhraj', 'pukhraj@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `container_table`
--
ALTER TABLE `container_table`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `useremail` (`useremail`),
  ADD UNIQUE KEY `userphone` (`userphone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `container_table`
--
ALTER TABLE `container_table`
  MODIFY `order_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `userid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `container_table`
--
ALTER TABLE `container_table`
  ADD CONSTRAINT `container_table_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `customer` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

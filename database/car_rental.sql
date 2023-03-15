-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2021 at 11:01 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--
use car_rental;

CREATE TABLE `booking` (
  `number` varchar(100) NOT NULL,
  `custname` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`number`, `custname`, `date`) VALUES
('rj19cb2365', 'navya', '2021-08-31'),
('rj19nm3698', 'nmczjcks', '2021-08-29'),
('rj19nm4521', 'iojwd', '2021-08-07');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `sno` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `number` varchar(10) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `image` varchar(200) NOT NULL,
  `type` varchar(100) NOT NULL,
  `rent` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`sno`, `name`, `number`, `status`, `image`, `type`, `rent`) VALUES
(1, 'innova', 'rj19ub3456', 1, 'image\\innova.jpg', 'luxury', 25),
(2, 'alto', 'rj19sn3445', 1, 'image/alto.png', 'mini', 8),
(4, 'eeco', 'rj19ub4278', 1, 'image/eeco.jpg', 'family', 13),
(5, 'ertiga', 'rj19ub1125', 1, 'image/ertiga.jpg', 'family', 13),
(6, 'nexon', 'rj19uc7856', 1, 'image/nexon.jpg', 'regular', 10),
(8, 'Thar', 'rj19dc0101', 1, 'image/thar.jpg', 'offroad', 50),
(11, 'zest', 'rj52bv5142', 1, 'image/zest.png', 'regular', 12);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('sarthik', 'sarthik31'),
('rounak', 'rony78'),
('saurabh', '3516');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `phone` int(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(40) NOT NULL,
  `number` varchar(10) NOT NULL,
  `dlno` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`firstname`, `lastname`, `gender`, `phone`, `address`, `email`, `number`, `dlno`) VALUES
('sadffdsaasfd', 'asd', 'Other', 2147483647, 'asd', 'sarthik@asd', '', 'dsfafafrwr352'),
('sadffdsaasfd``', 'asd', 'Female', 2147483647, 'asd', 'saurabhbissa88@gmail.com', '', 'dsfafafrwr352'),
('asd', 'sdafsdfsda', 'male', 2147483647, 'ad', 'saurabhbissa88@gmail.com', '', 'dsfafafrwr352');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

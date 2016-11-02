-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2015 at 08:21 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sammys_toys`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin` int(2) NOT NULL,
  `userID` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin`, `userID`, `password`) VALUES
(1, 'Admin', '15021994');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `ProductID` int(2) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Product_Price` float NOT NULL,
  `Shipping_Cost` float NOT NULL,
  `Quantity` int(2) NOT NULL,
  `Product_Image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `Name`, `Description`, `Product_Price`, `Shipping_Cost`, `Quantity`, `Product_Image`) VALUES
(1, 'Minion Bag', 'Double layered insulation bag made out of nylon, uses are mainly for school.', 16, 5, 50, 'bag_.jpg'),
(2, 'Minion Hoodie', 'Long sleeved hoodie, for teenagers and young adults of any gender.', 20, 5, 50, 'hoodie_.jpg'),
(3, 'Minion Piggy Bank', 'Standing at 14cm, this piggy bank is made of plastic and rubber, with the bottom as the opening.', 15, 5, 50, 'piggy_.jpg'),
(4, 'Minion Tumbler', '800ml eco-friendly plastic tumbler with lid.', 25, 5, 50, 'tumbler_.jpg'),
(5, 'Minion Pendrive', 'Weighing 25g, made of plastic and rubber which holds 16GB capacity.', 53, 5, 50, 'pendrive_.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_ID` int(3) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` int(20) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `usertype` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_ID`, `name`, `address`, `phone`, `sex`, `email`, `password`, `usertype`) VALUES
(1, 'Admin', 'No 43 Jalan SP 6/2, Saujana Puchong.', 123456789, 'Male', 'jay@gmail.com', '15021994', 1),
(2, 'Sammy', 'No 43 Jalan SP 6/2, Saujana Puchong.', 125438796, 'Male', 'holydevil@yahoo.com', '1502', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

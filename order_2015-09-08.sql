-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2015 at 08:03 AM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `coredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL,
  `firstName` varchar(80) NOT NULL,
  `lastName` varchar(80) NOT NULL,
  `userId` int(30) NOT NULL,
  `orderId` int(11) NOT NULL,
  `package` varchar(20) NOT NULL,
  `type_package` varchar(10) NOT NULL,
  `totalPrice` decimal(10,2) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `dateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `firstName`, `lastName`, `userId`, `orderId`, `package`, `type_package`, `totalPrice`, `status`, `dateTime`) VALUES
(1, 'muhammad azrul ', 'jamil', 1, 3456789, 'PKGT12015', '', '80.00', 0, '2015-09-08 03:00:33'),
(2, 'muhammad azrul ', 'jamil', 0, 98765, 'PKGT12015', '', '80.00', 0, '2015-09-07 15:31:56'),
(3, 'muhammad azrul ', 'jamil', 0, 71234, 'PKGT302015', '', '45.31', 0, '2015-09-07 16:58:33'),
(4, 'muhammad azrul ', 'jamil', 0, 2323232, 'PKGT12015', '', '80.00', 0, '2015-09-08 02:26:39'),
(6, 'wqewew', 'wewqe', 0, 2131231, 'PKGT12015', '', '80.00', 0, '2015-09-08 03:11:33'),
(7, 'muhammad azrul ', 'jamil', 0, 332432432, 'PKGT12015', '', '80.00', 0, '2015-09-08 03:58:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 30, 2018 at 11:05 AM
-- Server version: 5.7.22-0ubuntu18.04.1
-- PHP Version: 7.2.7-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SMIS2`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `detail` text NOT NULL,
  `delete_status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `branch`, `address`, `detail`, `delete_status`) VALUES
(1, 'Uriri Institute', 'Uriri Business Block', 'OOP\r\nJAVA\r\nC#\r\nPython', '0'),
(2, 'Migori Youth Empowerment', 'Location: Huduma Centre', 'Computer Training and Application Packages', '0');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(255) NOT NULL,
  `stdid` varchar(255) NOT NULL,
  `introduction` int(255) DEFAULT '0',
  `os` int(255) NOT NULL DEFAULT '0',
  `msword` int(255) NOT NULL DEFAULT '0',
  `msexcel` int(255) NOT NULL DEFAULT '0',
  `msaccess` int(255) NOT NULL DEFAULT '0',
  `mspowerpoint` int(255) NOT NULL DEFAULT '0',
  `mspublishing` int(255) NOT NULL DEFAULT '0',
  `internet` int(255) NOT NULL DEFAULT '0',
  `submitdate` datetime NOT NULL,
  `transaction_remark` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `stdid`, `introduction`, `os`, `msword`, `msexcel`, `msaccess`, `mspowerpoint`, `mspublishing`, `internet`, `submitdate`, `transaction_remark`) VALUES
(1, '1', 99, 88, 77, 66, 55, 44, 33, 22, '2018-07-15 00:00:00', 'PASS'),
(3, '2', 85, 68, 48, 84, 62, 73, 57, 92, '2018-07-22 00:00:00', 'DISTINCTION'),
(4, '3', 87, 54, 82, 91, 48, 57, 66, 53, '2018-07-16 00:00:00', 'CREDIT'),
(5, '4', 55, 68, 74, 0, 0, 0, 0, 0, '2018-07-16 00:00:00', 'Pass'),
(6, '5', 0, 0, 0, 0, 0, 0, 0, 0, '2018-07-17 00:00:00', NULL),
(7, '6', 0, 0, 0, 0, 0, 0, 0, 0, '2018-07-24 00:00:00', NULL),
(8, '7', 0, 0, 0, 0, 0, 0, 0, 0, '2018-07-24 00:00:00', NULL),
(9, '8', 0, 0, 0, 0, 0, 0, 0, 0, '2018-07-23 00:00:00', NULL),
(10, '9', 0, 0, 0, 0, 0, 0, 0, 0, '2018-07-24 00:00:00', NULL),
(11, '10', 58, 0, 0, 0, 0, 0, 0, 0, '2018-07-24 00:00:00', ''),
(12, '11', 0, 0, 0, 0, 0, 0, 0, 0, '2018-07-24 00:00:00', NULL),
(13, '12', 84, 54, 0, 0, 0, 0, 0, 0, '2018-07-30 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `fees_transaction`
--

CREATE TABLE `fees_transaction` (
  `id` int(255) NOT NULL,
  `stdid` varchar(255) NOT NULL,
  `paid` int(255) NOT NULL,
  `submitdate` datetime NOT NULL,
  `transcation_remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees_transaction`
--

INSERT INTO `fees_transaction` (`id`, `stdid`, `paid`, `submitdate`, `transcation_remark`) VALUES
(1, '1', 1000, '2018-07-15 00:00:00', 'Installment 1'),
(2, '2', 3000, '2018-07-22 00:00:00', 'Fully Paid'),
(3, '1', 1000, '2018-07-15 00:00:00', 'Installment 2'),
(4, '1', 500, '2018-07-15 00:00:00', 'installment 3'),
(5, '3', 1500, '2018-07-16 00:00:00', 'installment 1'),
(6, '4', 2500, '2018-07-16 00:00:00', ''),
(7, '5', 1900, '2018-07-17 00:00:00', 'installment 1'),
(8, '5', 600, '2018-07-17 00:00:00', 'installment 2'),
(9, '6', 0, '2018-07-24 00:00:00', 'Not Paid'),
(10, '7', 1500, '2018-07-24 00:00:00', 'installment 1'),
(11, '8', 2000, '2018-07-23 00:00:00', 'installment 1'),
(12, '9', 2450, '2018-07-24 00:00:00', 'installment 1'),
(13, '10', 1500, '2018-07-24 00:00:00', 'installment 1'),
(14, '11', 1200, '2018-07-24 00:00:00', 'installment 1'),
(15, '9', 350, '2018-07-24 00:00:00', 'installment 2'),
(16, '12', 1000, '2018-07-30 00:00:00', 'Installment one'),
(17, '12', 500, '2018-07-24 00:00:00', 'installment 2'),
(18, '4', 500, '2018-07-30 00:00:00', 'final installment');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(255) NOT NULL,
  `emailid` varchar(255) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `joindate` datetime NOT NULL,
  `about` text NOT NULL,
  `contact` varchar(255) NOT NULL,
  `fees` int(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `balance` int(255) NOT NULL,
  `delete_status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `emailid`, `sname`, `joindate`, `about`, `contact`, `fees`, `branch`, `balance`, `delete_status`) VALUES
(1, '', 'Mabeyah Humphrey', '2018-07-15 00:00:00', '', '0719136107', 3000, '1', 500, '0'),
(2, '', 'Crispin Mainya', '2018-07-22 00:00:00', '', '0715753947', 3000, '1', 0, '0'),
(3, '', 'Harold Finch', '2018-07-16 00:00:00', '', '0719136108', 3000, '1', 1500, '0'),
(4, '', 'Tony Jnr', '2018-07-16 00:00:00', '', '0798200017', 3000, '2', 0, '0'),
(5, '', 'Mike Tyson', '2018-07-17 00:00:00', '', '0715158762', 3000, '2', 500, '0'),
(6, '', 'Otieno Omollo', '2018-07-24 00:00:00', '', '0712852963', 3000, '1', 3000, '0'),
(7, '', 'John Reece', '2018-07-24 00:00:00', '', '0747859632', 3000, '1', 1500, '0'),
(8, 'awino@test.test', 'Awinoh Mary', '2018-07-16 00:00:00', 'short', '0714895742', 3000, '2', 1000, '0'),
(9, '', 'Dan Otieno', '2018-07-24 00:00:00', '', '0700000000', 3000, '2', 200, '0'),
(10, '', 'Jack Wilshere', '2018-07-24 00:00:00', '', '0789524741', 3000, '1', 1500, '0'),
(11, '', 'Eden Hazard', '2018-07-24 00:00:00', '', '0715753947', 3000, '2', 1800, '0'),
(12, '', 'Janet Ndere', '2018-07-30 00:00:00', '', '0703687102', 3000, '2', 1500, '0');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `emailid` varchar(255) NOT NULL,
  `lastlogin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `emailid`, `lastlogin`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Lewa', 'lewa@gmail.com', '0000-00-00 00:00:00'),
(2, 'guest', 'guest', 'guest', '101', '2018-07-11 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '$2y$10$u.gYx5nvVKdkIv61GDPq8.8kLNxu9K7UlegMnByzqe/CnlBdKIqKW', '2018-07-19 11:00:39'),
(2, 'guest', '$2y$10$97aNHrh/jnyS1mGL8a6NS.zIKoDHsSqYo/pT5YfKXhcSpYCJ5jtYe', '2018-07-24 14:53:28'),
(10, 'test1', '$2y$10$MEjrg2xS7K2CbMQu29HcyuIcqyp5bNq/g4rNUfd9rdkE0xX4j2Mpe', '2018-07-26 11:23:54'),
(11, 'test', '$2y$10$h5wzpRLrqVY0aOoPxAzNSOUnwUAgPIzkrdYbMHlVsJmax7XFUP//K', '2018-07-27 10:56:21'),
(12, 'janet', '$2y$10$n881ozlk/tijP40MCOnnCOUdTQI0ML68rgNaq8iZfcievIjOo5/Ca', '2018-07-27 10:59:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_transaction`
--
ALTER TABLE `fees_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `fees_transaction`
--
ALTER TABLE `fees_transaction`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

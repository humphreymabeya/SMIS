-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 31, 2018 at 01:54 PM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

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
(2, 'Migori Youth Empowerment', 'Location: Huduma Centre', 'Computer Training and Application Packages', '0'),
(3, 'Kehancha institute', 'Migori Sirare Road\r\nBox No. 789\r\nContact: 0754324553', 'Certificate Course in ICT', '0'),
(4, 'Gusii Institute of Technology', 'Box 1006 Kisii\r\nMwalimu Sacco Plaza, 4th floor', 'Basic Application Packages\r\nIntroduction to Programming\r\nBasic Network Principles', '0'),
(5, 'Machakos Institute Of Technology', 'box 1152 Machakos\r\nNext to Cathedral', 'Offers computer application packages', '0');

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
(1, '1', 54, 88, 77, 66, 55, 53, 74, 78, '2018-07-15 00:00:00', ''),
(3, '2', 85, 68, 48, 84, 62, 73, 57, 92, '2018-07-22 00:00:00', 'DISTINCTION'),
(4, '3', 87, 54, 82, 91, 48, 57, 66, 53, '2018-07-16 00:00:00', 'CREDIT'),
(5, '4', 55, 68, 74, 0, 0, 0, 0, 0, '2018-07-16 00:00:00', 'Pass'),
(6, '5', 0, 0, 0, 0, 0, 0, 0, 0, '2018-07-17 00:00:00', NULL),
(7, '6', 0, 0, 0, 0, 0, 0, 0, 0, '2018-07-24 00:00:00', NULL),
(8, '7', 0, 0, 0, 0, 0, 0, 0, 0, '2018-07-24 00:00:00', NULL),
(9, '8', 56, 75, 100, 0, 0, 0, 0, 0, '2018-07-23 00:00:00', ''),
(10, '9', 82, 84, 58, 78, 58, 60, 92, 64, '2018-07-24 00:00:00', ''),
(11, '10', 58, 87, 52, 48, 54, 67, 43, 80, '2018-07-24 00:00:00', 'Cleared'),
(12, '11', 0, 0, 0, 0, 0, 0, 0, 0, '2018-07-24 00:00:00', NULL),
(13, '12', 84, 54, 0, 0, 0, 0, 0, 0, '2018-07-30 00:00:00', 'PASS'),
(14, '13', 56, 68, 88, 68, 50, 69, 81, 48, '2018-08-20 00:00:00', ''),
(15, '14', 0, 0, 0, 0, 0, 0, 0, 0, '2018-08-29 00:00:00', NULL),
(16, '15', 56, 48, 79, 59, 99, 67, 60, 70, '2018-09-05 00:00:00', ''),
(17, '16', 89, 90, 87, 68, 98, 67, 86, 57, '2018-09-26 00:00:00', ''),
(18, '17', 57, 78, 79, 86, 67, 89, 98, 45, '2018-10-22 00:00:00', ''),
(19, '18', 67, 98, 96, 45, 76, 54, 78, 56, '2018-11-09 00:00:00', '');

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
(18, '4', 500, '2018-07-30 00:00:00', 'final installment'),
(19, '1', 500, '2018-08-03 00:00:00', 'last installment'),
(20, '3', 1000, '2018-08-08 00:00:00', 'installment 2'),
(21, '10', 1000, '2018-08-15 00:00:00', 'installment 2'),
(22, '13', 1000, '2018-08-20 00:00:00', 'installment 1'),
(23, '3', 500, '2018-08-20 00:00:00', 'final installment'),
(24, '14', 3000, '2018-08-29 00:00:00', 'Fully Paid'),
(25, '15', 1500, '2018-09-05 00:00:00', 'installment 1'),
(26, '15', 500, '2018-09-05 00:00:00', 'installment 2'),
(27, '5', 500, '2018-09-05 00:00:00', 'final installment'),
(28, '15', 1000, '2018-09-07 00:00:00', 'Full fee paid'),
(29, '7', 1000, '2018-09-19 00:00:00', '2 installment'),
(30, '16', 1000, '2018-09-26 00:00:00', 'installment 1'),
(31, '16', 500, '2018-09-27 00:00:00', ''),
(32, '17', 1000, '2018-10-22 00:00:00', 'installmnt 1'),
(33, '17', 1800, '2018-10-22 00:00:00', 'instlmnt 2'),
(34, '17', 200, '2018-10-30 00:00:00', 'last instmnt'),
(35, '18', 1000, '2018-11-09 00:00:00', 'installment 1'),
(36, '18', 500, '2018-11-09 00:00:00', 'installment 2'),
(37, '18', 1500, '2018-11-09 00:00:00', 'cleared');

-- --------------------------------------------------------

--
-- Table structure for table `salary_payment`
--

CREATE TABLE `salary_payment` (
  `id` int(255) NOT NULL,
  `staffid` varchar(255) NOT NULL,
  `salary_paid` int(255) NOT NULL,
  `pay_month` varchar(255) NOT NULL,
  `pay_year` varchar(255) NOT NULL,
  `submitdate` datetime NOT NULL,
  `transaction_remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary_payment`
--

INSERT INTO `salary_payment` (`id`, `staffid`, `salary_paid`, `pay_month`, `pay_year`, `submitdate`, `transaction_remark`) VALUES
(1, '2', 3000, 'September', '2018', '2018-09-12 00:00:00', 'sep salary fully paid'),
(2, '1', 45000, 'July', '2018', '2018-09-12 00:00:00', 'July salary paid'),
(3, '8', 28000, 'September', '2018', '2018-09-12 00:00:00', 'September salary fully paid'),
(4, '5', 3000, 'August', '2018', '2018-09-12 00:00:00', 'August salary fully paid'),
(5, '1', 45000, 'August', '2018', '2018-08-03 00:00:00', 'August Salary Paid'),
(6, '1', 45000, 'September', '2018', '2018-09-14 00:00:00', 'September Salary Paid'),
(7, '7', 2111, 'October', '2018', '2018-11-02 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(255) NOT NULL,
  `emailid` varchar(255) NOT NULL,
  `iname` varchar(255) NOT NULL,
  `joindate` datetime NOT NULL,
  `about` text NOT NULL,
  `contact` varchar(255) NOT NULL,
  `idno` varchar(255) NOT NULL,
  `salary` int(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `remark` text NOT NULL,
  `delete_status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `emailid`, `iname`, `joindate`, `about`, `contact`, `idno`, `salary`, `branch`, `remark`, `delete_status`) VALUES
(1, '', 'Mabeya Humphrey', '2018-08-24 00:00:00', '', '0719136107', '32654435', 45000, '5', '', '0'),
(2, '', 'John Doee', '2018-08-22 00:00:00', '', '0719136108', '5897554', 3000, '3', '', '0'),
(3, '', 'omollo ', '2018-08-22 00:00:00', '', '0798200017', '0', 3000, '4', '', '1'),
(4, '', 'omollo ', '2018-08-24 00:00:00', '', '0719136107', '12345678', 3000, '4', '', '0'),
(5, '', 'otieno', '2018-08-09 00:00:00', '', '0719136107', '12345678', 3000, '4', '', '0'),
(6, '', 'humph', '2018-08-30 00:00:00', '', '0715158762', '44789628', 4000, '2', 'monthly salary\r\nexcluded tax', '0'),
(7, '', 'me', '2018-07-12 00:00:00', '', '0798200017', '32653769', 2111, '3', '', '0'),
(8, '', 'Peter Ciira', '2018-09-04 00:00:00', '', '0715753947', '32654435', 28000, '3', '', '0'),
(9, '', 'Mick Dean ', '2018-12-07 00:00:00', '', '0700345678', '60008734', 5600, '3', 'First Salary', '0');

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
(1, '', 'Mabeya Humphrey', '2018-07-15 00:00:00', '', '0719136107', 3000, '1', 0, '0'),
(2, '', 'Crispin Mainya', '2018-07-22 00:00:00', '', '0715753947', 3000, '1', 0, '0'),
(3, '', 'Harold Finch', '2018-07-16 00:00:00', '', '0719136108', 3000, '1', 0, '0'),
(4, '', 'Tony Jnr', '2018-07-16 00:00:00', '', '0798200017', 3000, '2', 0, '0'),
(5, '', 'Mike Tyson', '2018-07-17 00:00:00', '', '0715158762', 3000, '2', 0, '0'),
(6, '', 'Otieno Omollo', '2018-07-24 00:00:00', '', '0712852963', 3000, '1', 3000, '0'),
(7, '', 'John Reece', '2018-07-24 00:00:00', '', '0747859632', 3000, '1', 500, '0'),
(8, 'awino@test.test', 'Awinoh Mary', '2018-07-16 00:00:00', 'short', '0714895742', 3000, '2', 1000, '0'),
(9, '', 'Dan Otieno', '2018-07-24 00:00:00', '', '0700000000', 3000, '2', 200, '0'),
(10, '', 'Jack Wilshere', '2018-07-24 00:00:00', '', '0789524741', 3000, '1', 500, '0'),
(11, '', 'Eden Hazard', '2018-07-24 00:00:00', '', '0715753947', 3000, '2', 1800, '0'),
(12, '', 'Janet Ndere', '2018-07-30 00:00:00', '', '0703687102', 3000, '2', 1500, '0'),
(13, 'magdaline.ndere@git.ac.ke', 'Magdaline Ndere', '2018-08-20 00:00:00', '', '0798272005', 3000, '4', 2000, '0'),
(14, 'harris.harry@smis.ac.ke', 'Harris Harry', '2018-08-29 00:00:00', '', '0789741525', 3000, '4', 0, '1'),
(15, '', 'Beryl Odhiambo', '2018-09-05 00:00:00', '', '0740503254', 3000, '5', 0, '0'),
(16, '', 'Juliet Minoo', '2018-09-26 00:00:00', '', '0705377595', 3000, '2', 1500, '0'),
(17, '', 'Anne Abby', '2018-10-22 00:00:00', '', '0714852963', 3000, '5', 0, '0'),
(18, '', 'Candy', '2018-11-09 00:00:00', '', '0706453443', 3000, '5', 0, '0');

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
(1, 'Admin', '$2y$10$aFyODiTtPXkC6zIlH7qTQOTWqgi3fLISQj8kaiC7Hafk2h6uldnLe', '2018-07-19 11:00:39'),
(2, 'guest', '$2y$10$97aNHrh/jnyS1mGL8a6NS.zIKoDHsSqYo/pT5YfKXhcSpYCJ5jtYe', '2018-07-24 14:53:28'),
(10, 'test1', '$2y$10$qIPGGJUzwk2Sr/4HC2bZpeWOVE/WNq1BqRHE4U8w6PHSueogyDgO6', '2018-07-26 11:23:54'),
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
-- Indexes for table `salary_payment`
--
ALTER TABLE `salary_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `fees_transaction`
--
ALTER TABLE `fees_transaction`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `salary_payment`
--
ALTER TABLE `salary_payment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

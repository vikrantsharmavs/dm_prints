-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2022 at 02:24 PM
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
-- Database: `dmprints`
--

-- --------------------------------------------------------

--
-- Table structure for table `actualstock`
--

CREATE TABLE `actualstock` (
  `asid` int(11) NOT NULL,
  `lotNumber` varchar(255) DEFAULT NULL,
  `newLotNumber` varchar(50) DEFAULT NULL,
  `numberMeter` double DEFAULT NULL,
  `stockDone` varchar(25) NOT NULL DEFAULT 'No',
  `creation_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actualstock`
--

INSERT INTO `actualstock` (`asid`, `lotNumber`, `newLotNumber`, `numberMeter`, `stockDone`, `creation_date`) VALUES
(1, '101', '2222', 100, 'Yes', '2022-06-20 06:35:33'),
(2, '101', '2222', 200, 'No', '2022-06-20 06:35:33'),
(3, '101', '2222', 101, 'No', '2022-06-20 06:35:33'),
(4, '101', '2222', 150, 'Yes', '2022-06-20 06:35:33');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `cid` int(11) NOT NULL,
  `color_name` varchar(255) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`cid`, `color_name`, `creation_date`, `updated_date`, `status`) VALUES
(1, 'Red', '2022-06-02 06:04:57', '2022-06-02 06:05:04', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE `party` (
  `pid` int(11) NOT NULL,
  `party_name` varchar(255) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`pid`, `party_name`, `creation_date`, `updated_date`, `status`) VALUES
(1, 'Vikrant Sharma', '2022-06-02 06:24:21', NULL, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `quality`
--

CREATE TABLE `quality` (
  `qid` int(11) NOT NULL,
  `quality_name` varchar(255) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quality`
--

INSERT INTO `quality` (`qid`, `quality_name`, `creation_date`, `updated_date`, `status`) VALUES
(1, 'Euraopian', '2022-06-02 05:59:23', '2022-06-02 06:24:12', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `receiving`
--

CREATE TABLE `receiving` (
  `rid` int(11) NOT NULL,
  `max_num` int(11) NOT NULL DEFAULT 0,
  `receiving_id` varchar(255) DEFAULT NULL,
  `receivingDate` date DEFAULT NULL,
  `partyName` varchar(255) DEFAULT NULL,
  `lotNumber` varchar(255) DEFAULT NULL,
  `quality` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `width` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `begNumber` double DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receiving`
--

INSERT INTO `receiving` (`rid`, `max_num`, `receiving_id`, `receivingDate`, `partyName`, `lotNumber`, `quality`, `color`, `weight`, `width`, `unit`, `begNumber`, `creation_date`, `updated_date`, `status`) VALUES
(1, 1, 'REC-00001', '2022-06-20', 'Vikrant Sharma', '101', 'Euraopian', 'Red', '2020*2000', NULL, 'KG', 10, '2022-06-20 06:31:55', NULL, 'Active'),
(2, 1, 'REC-00001', '2022-06-20', 'Vikrant Sharma', '102', 'Euraopian', 'Red', '2020*2000', NULL, 'KG', 5, '2022-06-20 06:31:55', NULL, 'Active'),
(4, 2, 'REC-00002', '2022-06-20', 'Vikrant Sharma', '202', 'Euraopian', 'Red', '2020*2000', '25 FEET', 'PCS', 652, '2022-06-20 07:12:28', NULL, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `receivingbag`
--

CREATE TABLE `receivingbag` (
  `rbid` int(11) NOT NULL,
  `lotNumber` varchar(50) NOT NULL,
  `begInch` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receivingbag`
--

INSERT INTO `receivingbag` (`rbid`, `lotNumber`, `begInch`) VALUES
(1, '101', 11),
(2, '101', 22),
(3, '101', 33),
(4, '101', 44),
(5, '101', 55),
(6, '101', 66),
(7, '101', 77),
(8, '101', 88),
(9, '101', 99),
(10, '101', 101);

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `sid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `superstatus` varchar(25) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`sid`, `username`, `password`, `superstatus`) VALUES
(1, 'admin', '$2y$10$EnUUHkBNinPn1bh9jUAycOErdsfiqJgJ/xEcu4UIu8.HrblRml6LC', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `uid` int(11) NOT NULL,
  `unit_name` varchar(255) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`uid`, `unit_name`, `creation_date`, `updated_date`, `status`) VALUES
(1, 'PCS', '2022-06-02 06:04:57', '2022-06-13 04:12:55', 'Active'),
(2, 'KG', '2022-06-13 04:13:03', NULL, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `weight`
--

CREATE TABLE `weight` (
  `wid` int(11) NOT NULL,
  `weight_name` varchar(255) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weight`
--

INSERT INTO `weight` (`wid`, `weight_name`, `creation_date`, `updated_date`, `status`) VALUES
(1, '2020*2000', '2022-06-02 06:04:57', '2022-06-02 06:32:10', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `width`
--

CREATE TABLE `width` (
  `wid` int(11) NOT NULL,
  `width_name` varchar(255) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `width`
--

INSERT INTO `width` (`wid`, `width_name`, `creation_date`, `updated_date`, `status`) VALUES
(1, '25 FEET', '2022-06-02 06:04:57', '2022-06-20 06:58:52', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actualstock`
--
ALTER TABLE `actualstock`
  ADD PRIMARY KEY (`asid`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `party`
--
ALTER TABLE `party`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `quality`
--
ALTER TABLE `quality`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `receiving`
--
ALTER TABLE `receiving`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `receivingbag`
--
ALTER TABLE `receivingbag`
  ADD PRIMARY KEY (`rbid`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `weight`
--
ALTER TABLE `weight`
  ADD PRIMARY KEY (`wid`);

--
-- Indexes for table `width`
--
ALTER TABLE `width`
  ADD PRIMARY KEY (`wid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actualstock`
--
ALTER TABLE `actualstock`
  MODIFY `asid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `party`
--
ALTER TABLE `party`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quality`
--
ALTER TABLE `quality`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `receiving`
--
ALTER TABLE `receiving`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `receivingbag`
--
ALTER TABLE `receivingbag`
  MODIFY `rbid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `weight`
--
ALTER TABLE `weight`
  MODIFY `wid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `width`
--
ALTER TABLE `width`
  MODIFY `wid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

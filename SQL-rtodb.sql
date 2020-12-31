-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2016 at 11:21 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rtodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`username`, `password`) VALUES
('swaraliatuljoshi@gmail.com', '#42kavita');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` varchar(20) NOT NULL,
  `bid` varchar(20) NOT NULL,
  `location` text NOT NULL,
  `address` text NOT NULL,
  `phoneno` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `change_address`
--

CREATE TABLE `change_address` (
  `vehicleregno` varchar(20) NOT NULL,
  `currentaddress` text NOT NULL,
  `newaddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `driver_licence`
--

CREATE TABLE `driver_licence` (
  `name` text NOT NULL,
  `dob` date NOT NULL,
  `sex` text NOT NULL,
  `address` varchar(200) NOT NULL,
  `phoneno` varchar(20) NOT NULL,
  `licenceid` varchar(20) NOT NULL,
  `type` text NOT NULL,
  `issuedate` date NOT NULL,
  `expirydate` date NOT NULL,
  `applno` int(255) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver_licence`
--

INSERT INTO `driver_licence` (`name`, `dob`, `sex`, `address`, `phoneno`, `licenceid`, `type`, `issuedate`, `expirydate`, `applno`, `username`) VALUES
('asdfgh', '1996-05-02', 'female', 'aasddf', '9972326944', '77777777', '2 Wheeler Learner''s', '2016-11-29', '2016-11-29', 2, 'swaraliatuljoshi1@gmail.com'),
('qwerty', '1996-05-02', 'male', 'asdfgh', '9971245976', '', '2 Wheeler Learner''s', '0000-00-00', '0000-00-00', 9, 'swaraliatuljoshi@gmail.com'),
('Swarali Joshi', '1996-05-02', 'female', 'RT Nagar, Bangalore', '9972326947', '12345678', '2 Wheeler Learner''s', '2016-11-29', '2017-11-29', 1, 'swaraliatuljoshi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `driver_loan`
--

CREATE TABLE `driver_loan` (
  `licenceid` varchar(20) NOT NULL,
  `loanid` varchar(20) NOT NULL,
  `amount` float NOT NULL,
  `period` float NOT NULL,
  `loanissuedate` date NOT NULL,
  `issuebank` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver_loan`
--

INSERT INTO `driver_loan` (`licenceid`, `loanid`, `amount`, `period`, `loanissuedate`, `issuebank`) VALUES
('11111111', '1010', 100000, 2, '2016-11-29', 'HDFC');

-- --------------------------------------------------------

--
-- Table structure for table `masterpass`
--

CREATE TABLE `masterpass` (
  `vehicleregno` varchar(20) NOT NULL,
  `masterpassid` varchar(20) NOT NULL,
  `issuedate` date NOT NULL,
  `expirydate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permit`
--

CREATE TABLE `permit` (
  `vehicleregno` varchar(20) NOT NULL,
  `permitid` varchar(20) NOT NULL,
  `issuedate` date NOT NULL,
  `region` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permit`
--

INSERT INTO `permit` (`vehicleregno`, `permitid`, `issuedate`, `region`) VALUES
('KA-04-BC-5585', '12345678', '2016-11-29', 'Karnataka');

-- --------------------------------------------------------

--
-- Table structure for table `rto_office`
--

CREATE TABLE `rto_office` (
  `id` varchar(20) NOT NULL,
  `loacation` text NOT NULL,
  `phoneno` varchar(10) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transfer_ownership`
--

CREATE TABLE `transfer_ownership` (
  `vehicleregno` varchar(20) NOT NULL,
  `currentowner` text NOT NULL,
  `newowner` text NOT NULL,
  `phoneno` varchar(20) NOT NULL,
  `sex` text NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`username`, `password`) VALUES
('swaraliatuljoshi1@gmail.com', '#42kavita'),
('swaraliatuljoshi@gmail.com', '#42kavita');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `licenceid` varchar(50) NOT NULL,
  `vehicleregno` varchar(50) NOT NULL,
  `chassisno` varchar(50) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`licenceid`, `vehicleregno`, `chassisno`, `type`) VALUES
('', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_registration`
--

CREATE TABLE `vehicle_registration` (
  `applno` int(11) NOT NULL,
  `vehicleregno` varchar(20) NOT NULL,
  `vehiclechassisno` varchar(20) NOT NULL,
  `type` text NOT NULL,
  `ownernumber` varchar(20) NOT NULL,
  `ownername` text NOT NULL,
  `date` date NOT NULL,
  `sex` text NOT NULL,
  `address` text NOT NULL,
  `age` int(20) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_registration`
--

INSERT INTO `vehicle_registration` (`applno`, `vehicleregno`, `vehiclechassisno`, `type`, `ownernumber`, `ownername`, `date`, `sex`, `address`, `age`, `username`) VALUES
(1, 'KA-04-BC-5585', '', 'normal', '9972326947', 'Swarali Joshi', '2016-11-29', 'female', 'RT Nagar, Bangalore', 0, 'swaraliatuljoshi@gmail.com'),
(2, 'KA-04-BC-9999', '', 'transport', '99723267777', 'kavita', '2016-11-29', 'female', 'RT Nagar', 0, 'swaraliatuljoshi3@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_tax`
--

CREATE TABLE `vehicle_tax` (
  `applno` int(11) NOT NULL,
  `vehicleregno` varchar(20) NOT NULL,
  `type` text NOT NULL,
  `challanno` varchar(10) NOT NULL,
  `amount` int(11) NOT NULL,
  `paiddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_tax`
--

INSERT INTO `vehicle_tax` (`applno`, `vehicleregno`, `type`, `challanno`, `amount`, `paiddate`) VALUES
(1, 'KA-04-BC-5585', 'normal', '1111', 1000, '2016-11-29'),
(2, 'KA-04-BC-5586', 'normal', '2222', 2000, '2016-11-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`,`bid`);

--
-- Indexes for table `change_address`
--
ALTER TABLE `change_address`
  ADD PRIMARY KEY (`vehicleregno`);

--
-- Indexes for table `driver_licence`
--
ALTER TABLE `driver_licence`
  ADD PRIMARY KEY (`licenceid`,`applno`),
  ADD UNIQUE KEY `applno` (`applno`);

--
-- Indexes for table `driver_loan`
--
ALTER TABLE `driver_loan`
  ADD PRIMARY KEY (`licenceid`,`loanid`);

--
-- Indexes for table `masterpass`
--
ALTER TABLE `masterpass`
  ADD PRIMARY KEY (`vehicleregno`,`masterpassid`);

--
-- Indexes for table `permit`
--
ALTER TABLE `permit`
  ADD PRIMARY KEY (`vehicleregno`,`permitid`);

--
-- Indexes for table `rto_office`
--
ALTER TABLE `rto_office`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfer_ownership`
--
ALTER TABLE `transfer_ownership`
  ADD PRIMARY KEY (`vehicleregno`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`chassisno`,`vehicleregno`);

--
-- Indexes for table `vehicle_registration`
--
ALTER TABLE `vehicle_registration`
  ADD PRIMARY KEY (`applno`,`vehicleregno`,`vehiclechassisno`),
  ADD UNIQUE KEY `applno` (`applno`);

--
-- Indexes for table `vehicle_tax`
--
ALTER TABLE `vehicle_tax`
  ADD PRIMARY KEY (`applno`,`vehicleregno`,`challanno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `driver_licence`
--
ALTER TABLE `driver_licence`
  MODIFY `applno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `vehicle_registration`
--
ALTER TABLE `vehicle_registration`
  MODIFY `applno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vehicle_tax`
--
ALTER TABLE `vehicle_tax`
  MODIFY `applno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

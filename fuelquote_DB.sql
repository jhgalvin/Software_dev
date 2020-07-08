-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2020 at 11:51 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fuelquote_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `companyprofile`
--

CREATE TABLE `companyprofile` (
  `company_ID` int(6) NOT NULL,
  `companyName` varchar(50) DEFAULT NULL,
  `companyAddress1` varchar(100) DEFAULT NULL,
  `companyAddress2` varchar(100) DEFAULT NULL,
  `companyCity` varchar(100) DEFAULT NULL,
  `companyState` varchar(2) DEFAULT NULL,
  `companyZipCode` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companyprofile`
--

INSERT INTO `companyprofile` (`company_ID`, `companyName`, `companyAddress1`, `companyAddress2`, `companyCity`, `companyState`, `companyZipCode`) VALUES
(10000, 'Fuel Maxx', '4800 Calhoun Rd', '', 'Houston', '', 77004);

--
-- Triggers `companyprofile`
--
DELIMITER $$
CREATE TRIGGER `duplicate_company` BEFORE INSERT ON `companyprofile` FOR EACH ROW BEGIN
	IF(EXISTS(SELECT 1 from companyprofile WHERE
		companyName = NEW.companyName)) THEN
		SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Company profile already exists.';
	END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `companyquote`
--

CREATE TABLE `companyquote` (
  `quote_ID` int(6) NOT NULL,
  `company_ID` int(6) NOT NULL,
  `gallons_Requested` decimal(6,2) UNSIGNED NOT NULL,
  `delivery_Date` date NOT NULL DEFAULT current_timestamp(),
  `suggested_Price` decimal(10,2) UNSIGNED NOT NULL,
  `total_amt_Due` decimal(10,2) UNSIGNED NOT NULL,
  `delivery_Address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companyquote`
--

INSERT INTO `companyquote` (`quote_ID`, `company_ID`, `gallons_Requested`, `delivery_Date`, `suggested_Price`, `total_amt_Due`, `delivery_Address`) VALUES
(600000, 100000, '100.00', '2020-05-13', '1000.00', '1072.50', '');

--
-- Triggers `companyquote`
--
DELIMITER $$
CREATE TRIGGER `out_of_date_quote` BEFORE INSERT ON `companyquote` FOR EACH ROW BEGIN
	IF(NEW.delivery_Date < Now()) THEN
		SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Quote date is in the past';
	END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `logincredentials`
--

CREATE TABLE `logincredentials` (
  `company_ID` int(6) NOT NULL,
  `company_User` varchar(20) NOT NULL,
  `company_Pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logincredentials`
--

INSERT INTO `logincredentials` (`company_ID`, `company_User`, `company_Pass`) VALUES
(10000, 'Fuel_Maxx', 'password');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companyprofile`
--
ALTER TABLE `companyprofile`
  ADD PRIMARY KEY (`company_ID`),
  ADD KEY `company_ID` (`company_ID`);

--
-- Indexes for table `companyquote`
--
ALTER TABLE `companyquote`
  ADD PRIMARY KEY (`quote_ID`),
  ADD KEY `company_ID` (`company_ID`);

--
-- Indexes for table `logincredentials`
--
ALTER TABLE `logincredentials`
  ADD PRIMARY KEY (`company_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companyquote`
--
ALTER TABLE `companyquote`
  MODIFY `quote_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=600001;

--
-- AUTO_INCREMENT for table `logincredentials`
--
ALTER TABLE `logincredentials`
  MODIFY `company_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100001;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `companyprofile`
--
ALTER TABLE `companyprofile`
  ADD CONSTRAINT `companyprofile_ibfk_1` FOREIGN KEY (`company_ID`) REFERENCES `logincredentials` (`company_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

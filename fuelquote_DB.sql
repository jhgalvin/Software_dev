-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jul 02, 2020 at 11:21 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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

DROP TABLE IF EXISTS `companyprofile`;
CREATE TABLE IF NOT EXISTS `companyprofile` (
  `company_ID` int(6) NOT NULL,
  `companyName` varchar(50) DEFAULT NULL,
  `companyAddress1` varchar(100) DEFAULT NULL,
  `companyAddress2` varchar(100) DEFAULT NULL,
  `companyCity` varchar(100) DEFAULT NULL,
  `companyState` varchar(2) DEFAULT NULL,
  `companyZipCode` int(9) DEFAULT NULL,
  PRIMARY KEY (`company_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `companyprofile`
--

INSERT INTO `companyprofile` (`company_ID`, `companyName`, `companyAddress1`, `companyAddress2`, `companyCity`, `companyState`, `companyZipCode`) VALUES
(10000, 'Fuel Maxx ', '4800 Calhoun Rd', NULL, 'Houston', 'TX', 77004);

-- --------------------------------------------------------

--
-- Table structure for table `companyquote`
--

DROP TABLE IF EXISTS `companyquote`;
CREATE TABLE IF NOT EXISTS `companyquote` (
  `quote_ID` int(6) NOT NULL AUTO_INCREMENT,
  `company_ID` int(6) NOT NULL,
  `gallons_Requested` decimal(6,2) UNSIGNED NOT NULL,
  `delivery_Date` date NOT NULL,
  `suggested_Price` decimal(10,2) UNSIGNED NOT NULL,
  `total_amt_Due` decimal(10,2) UNSIGNED NOT NULL,
  `delivery_Address` varchar(200) NOT NULL,
  PRIMARY KEY (`quote_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=600001 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `companyquote`
--

INSERT INTO `companyquote` (`quote_ID`, `company_ID`, `gallons_Requested`, `delivery_Date`, `suggested_Price`, `total_amt_Due`, `delivery_Address`) VALUES
(600000, 100000, '100.00', '2020-05-13', '1000.00', '1072.50', '');

-- --------------------------------------------------------

--
-- Table structure for table `logincredentials`
--

DROP TABLE IF EXISTS `logincredentials`;
CREATE TABLE IF NOT EXISTS `logincredentials` (
  `company_ID` int(6) NOT NULL AUTO_INCREMENT,
  `company_User` varchar(20) NOT NULL,
  `company_Pass` varchar(20) NOT NULL,
  PRIMARY KEY (`company_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=100001 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `logincredentials`
--

INSERT INTO `logincredentials` (`company_ID`, `company_User`, `company_Pass`) VALUES
(100000, 'Fuel_Maxx', 'password');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

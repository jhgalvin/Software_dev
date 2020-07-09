-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 09, 2020 at 08:23 PM
-- Server version: 10.4.10-MariaDB
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
  PRIMARY KEY (`company_ID`),
  KEY `company_ID` (`company_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companyprofile`
--

INSERT INTO `companyprofile` (`company_ID`, `companyName`, `companyAddress1`, `companyAddress2`, `companyCity`, `companyState`, `companyZipCode`) VALUES
(100003, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Triggers `companyprofile`
--
DROP TRIGGER IF EXISTS `duplicate_company`;
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

DROP TABLE IF EXISTS `companyquote`;
CREATE TABLE IF NOT EXISTS `companyquote` (
  `quote_ID` int(6) NOT NULL AUTO_INCREMENT,
  `company_ID` int(6) NOT NULL,
  `gallons_Requested` decimal(6,2) UNSIGNED NOT NULL,
  `delivery_Date` date NOT NULL DEFAULT current_timestamp(),
  `suggested_Price` decimal(10,2) UNSIGNED NOT NULL,
  `total_amt_Due` decimal(10,2) UNSIGNED NOT NULL,
  `delivery_Address1` varchar(100) NOT NULL,
  `delivery_Address2` varchar(100) DEFAULT NULL,
  `delivery_City` varchar(100) NOT NULL,
  `delivery_State` varchar(2) NOT NULL,
  `delivery_ZipCode` int(9) NOT NULL,
  PRIMARY KEY (`quote_ID`),
  KEY `company_ID` (`company_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=600005 DEFAULT CHARSET=utf8mb4;

--
-- Triggers `companyquote`
--
DROP TRIGGER IF EXISTS `out_of_date_quote`;
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

DROP TABLE IF EXISTS `logincredentials`;
CREATE TABLE IF NOT EXISTS `logincredentials` (
  `company_ID` int(6) NOT NULL AUTO_INCREMENT,
  `company_User` varchar(20) NOT NULL,
  `company_Pass` varchar(255) NOT NULL,
  PRIMARY KEY (`company_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=100005 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logincredentials`
--

INSERT INTO `logincredentials` (`company_ID`, `company_User`, `company_Pass`) VALUES
(100003, 'EncryptTest', '$1$pFKchYfK$xejje0OCRLhALDk2PM5GI/');

--
-- Triggers `logincredentials`
--
DROP TRIGGER IF EXISTS `PROFILE_CREATION`;
DELIMITER $$
CREATE TRIGGER `PROFILE_CREATION` AFTER INSERT ON `logincredentials` FOR EACH ROW BEGIN
    INSERT INTO companyprofile (company_ID) VALUES (NEW.company_ID);
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `UNIQUE_USERNAME`;
DELIMITER $$
CREATE TRIGGER `UNIQUE_USERNAME` BEFORE INSERT ON `logincredentials` FOR EACH ROW BEGIN
IF(EXISTS(SELECT 1 FROM logincredentials WHERE
         company_User = NEW.company_User))
THEN
    SIGNAL SQLSTATE VALUE '45000'
    SET MESSAGE_TEXT = 'This Username Has Already Been Taken.';
    END IF;
    END
$$
DELIMITER ;

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

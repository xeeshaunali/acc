-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 16, 2024 at 08:55 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surety-35303437cf71`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc`
--

DROP TABLE IF EXISTS `acc`;
CREATE TABLE IF NOT EXISTS `acc` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `underSection` varchar(100) DEFAULT NULL,
  `courtname` varchar(100) DEFAULT NULL,
  `casecateg` varchar(100) DEFAULT NULL,
  `caseno` int(50) DEFAULT NULL,
  `year` varchar(15) DEFAULT NULL,
  `suretyname` varchar(150) DEFAULT NULL,
  `accused` varchar(150) DEFAULT NULL,
  `cnic` bigint(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `crimeno` int(15) DEFAULT NULL,
  `crimeyear` int(15) DEFAULT NULL,
  `suretyaccepted` date DEFAULT NULL,
  `suretyreturned` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `amount` int(250) DEFAULT NULL,
  `remarks` varchar(250) DEFAULT NULL,
  `ps` varchar(100) DEFAULT NULL,
  `file` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=126 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acc`
--


-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

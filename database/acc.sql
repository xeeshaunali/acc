-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 11, 2024 at 09:15 AM
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
-- Database: `acc`
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
) ENGINE=MyISAM AUTO_INCREMENT=123 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acc`
--

INSERT INTO `acc` (`id`, `underSection`, `courtname`, `casecateg`, `caseno`, `year`, `suretyname`, `accused`, `crimeno`, `crimeyear`, `suretyaccepted`, `suretyreturned`, `status`, `amount`, `remarks`, `ps`, `file`) VALUES
(106, NULL, 'DJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, NULL, 'DJ', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, NULL, 'DJ', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, NULL, 'DJ', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, NULL, 'DJ', 'criminal', NULL, NULL, '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, NULL, 'DJ', 'criminal', 1, '2023', '1212', '1212', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(112, NULL, 'DJ', 'criminal', 1, '1', '1', '1', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(113, '1', 'DJ', 'criminal', 1, '1', '1', '1', 1, 1, NULL, NULL, NULL, NULL, NULL, 'Jamshoro', NULL),
(114, '1', 'DJ', 'criminal', 1, '1', '1', '1', 1, 1, '0001-01-01', '0001-01-01', NULL, NULL, NULL, 'Jamshoro', NULL),
(115, '1', 'DJ', 'criminal', 1, '1', '1', '1', 1, 1, '0001-01-01', '0001-01-01', NULL, 1, NULL, 'Jamshoro', NULL),
(116, '302', 'DJ', 'criminal', 1, '2024', 'Xee', 'Ali', 1, 2024, '2024-05-10', '2024-05-10', NULL, 5000, NULL, 'Jamshoro', NULL),
(117, '302', 'DJ', 'criminal', 300, '2023', 'Xeeeeeee', 'Aliiiiii', 301, 2023, '2024-05-10', '2024-05-10', 'LyingWithClerk', 30000, 'sadsadasdsd', 'Railway', NULL),
(118, '302', 'DJ', 'criminal', 500, '2024', 'DFDSFSD', 'sddsdf', 500, 2024, '2023-05-10', NULL, 'LyingWithRecord', 500000, '12121', 'Jamshoro', NULL),
(119, '302 PPC', 'DJ', 'criminal', 1, '2024', 'Ahad Khan DC', 'Ahad Khan DC', 0, 2024, '2024-05-11', NULL, 'AtAccountsBr', 5000, 'Accepted', 'Jamshoro', NULL),
(120, '1', 'DJ', 'criminal', 1, '1', '1', '1', 1, 1, '2024-05-01', '2024-05-10', 'Returned', 1, '1sadsad', 'Jamshoro', NULL),
(121, '1', 'DJ', 'criminal', 1, '1', '1', '1', 1, 1, '0001-01-01', NULL, 'AtAccountsBr', 1, '1', 'Jamshoro', NULL),
(122, '302', 'DJ', 'criminal', 11, '2024', 'Xeeshaun', 'Ali', 11, 2024, '2024-05-11', NULL, 'AtAccountsBr', 50000, 'HC-AbAb Solvency Certificate', 'Jamshoro', NULL);

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

-- phpMyAdmin SQL Dump
-- version 4.7.8
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 26, 2018 at 12:48 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finalwebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `Person` varchar(128) NOT NULL,
  `Date` varchar(128) NOT NULL,
  `Time` varchar(128) NOT NULL,
  `DRNS` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`Person`, `Date`, `Time`, `DRNS`) VALUES
('TJamesson796969', '2018-04-27', '08:00:00', 'Dr Judith Davis'),
('TJamesson796969', '2018-04-27', '08:20:00', 'Dr Judith Davis');

-- --------------------------------------------------------

--
-- Table structure for table `majorvalue`
--

CREATE TABLE `majorvalue` (
  `Username` varchar(128) NOT NULL,
  `Firstname` varchar(128) NOT NULL,
  `Lastname` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `majorvalue`
--

INSERT INTO `majorvalue` (`Username`, `Firstname`, `Lastname`) VALUES
('Wrathlou944856', 'Will', 'Rathlou'),
('TJamesson796969', 'Thomas', 'Jamesson');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `Username` varchar(128) NOT NULL,
  `Prescribed Item` varchar(128) NOT NULL,
  `Quantity Remaining` int(2) NOT NULL,
  `ID` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`Username`, `Prescribed Item`, `Quantity Remaining`, `ID`) VALUES
('TJamesson796969', 'Ketamin', 0, 'TJamesson7969691'),
('TJamesson796969', 'Antibiotics', 0, 'TJamesson7969692');

-- --------------------------------------------------------

--
-- Table structure for table `testresults`
--

CREATE TABLE `testresults` (
  `Username` varchar(128) NOT NULL,
  `ResultDate` varchar(128) NOT NULL,
  `TestType` varchar(128) NOT NULL,
  `Result` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `Username` varchar(128) NOT NULL,
  `Password` varchar(128) NOT NULL,
  `Clearance` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`Username`, `Password`, `Clearance`) VALUES
('Wrathlou944856', 'password', 'root'),
('TJamesson796969', 'penutbutter', 'visitor');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

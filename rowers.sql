-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2020 at 10:07 PM
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
-- Database: `rowers`
--

-- --------------------------------------------------------

--
-- Table structure for table `athletes`
--

CREATE TABLE `athletes` (
  `Name` text NOT NULL,
  `Gender` varchar(1) NOT NULL,
  `Experience` int(11) NOT NULL,
  `Date Joined` date NOT NULL,
  `isCoxswain` tinyint(1) NOT NULL,
  `CWID` int(11) NOT NULL,
  `Dues Paid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `practices`
--

CREATE TABLE `practices` (
  `Athlete` text NOT NULL,
  `Date` DATE NOT NULL,
  `Type` text NOT NULL,
  `Total Time` int(11) NOT NULL,
  `Total Distance` int(11) NOT NULL,
  `Average Split` int(11) NOT NULL,
  `Average Rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `splits`
--

CREATE TABLE `splits` (
  `Athlete` text NOT NULL,
  `Date` DATE NOT NULL,
  `Type` text NOT NULL,
  `Split Number` int(11) NOT NULL,
  `Average Rate` int(11) NOT NULL,
  `500 Split` int(11) NOT NULL,
  `Distance` int(11) NOT NULL,
  `Total Time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `squads`
--

CREATE TABLE `squads` (
  `Experience` text NOT NULL,
  `Gender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

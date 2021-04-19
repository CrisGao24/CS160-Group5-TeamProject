-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 19, 2021 at 02:12 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id16310459_smartcity5`
--

-- --------------------------------------------------------

--
-- Table structure for table `ActivityAddress`
--

CREATE TABLE `ActivityAddress` (
  `ActivityID` int(20) NOT NULL,
  `Country` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `State` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `City` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Street` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Zipcode` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ActivityAddress`
--

INSERT INTO `ActivityAddress` (`ActivityID`, `Country`, `State`, `City`, `Street`, `Zipcode`) VALUES
(8, 'US', 'CA', 'Santa Clara', 'aaaaaa Cout', 95051),
(13, 'United States', 'CA', 'San Jose', '11111 Street', 95132),
(15, 'United States', 'CA', 'PLEASANTON', '576 Street', 94566),
(16, 'United States', 'CA', 'Santa Clara', '789', 94432);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ActivityAddress`
--
ALTER TABLE `ActivityAddress`
  ADD PRIMARY KEY (`ActivityID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 19, 2021 at 02:13 AM
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
-- Table structure for table `UserAddress`
--

CREATE TABLE `UserAddress` (
  `UserID` int(20) NOT NULL,
  `Country` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `State` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `City` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Street` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Zipcode` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `UserAddress`
--

INSERT INTO `UserAddress` (`UserID`, `Country`, `State`, `City`, `Street`, `Zipcode`) VALUES
(1, 'US', 'CA', 'Santa Clara', '385 Ct', 95051);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `UserAddress`
--
ALTER TABLE `UserAddress`
  ADD PRIMARY KEY (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

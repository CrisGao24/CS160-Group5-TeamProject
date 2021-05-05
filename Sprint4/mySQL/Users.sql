-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 05, 2021 at 06:43 AM
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
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `UserID` int(20) NOT NULL,
  `Email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Firstnm` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Lastnm` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Points` int(10) NOT NULL DEFAULT 0,
  `salt1` int(20) NOT NULL,
  `salt2` int(20) NOT NULL,
  `hash` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`UserID`, `Email`, `Password`, `Firstnm`, `Lastnm`, `Points`, `salt1`, `salt2`, `hash`) VALUES
(1, 'chaijinyin@gmail.com', '11111', 'Jinyin', 'Chai', 0, 201, 645, '383015d777909a4e3e5dc3bca59f866c'),
(2, 'manager@gmail.com', '22222', 'Manager', 'Manager', 0, 741, 718, '33e57c5e55b969d3c44a952a846e8b57'),
(13, '123@example.com', 'password', 'test', 'test', 0, 233, 719, '81f57f7b283e1888349c38e515ef7e2a'),
(14, 'abc@gmail.com', 'aaaaa', 'abc', 'abc', 0, 601, 846, '04be551df25e7f10071cb538dc83c3a4'),
(15, 'lilylee@sjsu.edu', '11111', 'Lily', 'Lee', 0, 189, 307, '8b2b4dc91c729daa04d1217cbbd148b2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `UserID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

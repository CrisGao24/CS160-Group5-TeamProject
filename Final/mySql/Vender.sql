-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 15, 2021 at 05:13 AM
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
-- Table structure for table `Vender`
--

CREATE TABLE `Vender` (
  `VenderID` int(20) NOT NULL,
  `Email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Firstnm` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Lastnm` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Points` int(11) NOT NULL,
  `salt1` int(20) NOT NULL,
  `salt2` int(20) NOT NULL,
  `hash` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lockVender` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Vender`
--

INSERT INTO `Vender` (`VenderID`, `Email`, `Password`, `Firstnm`, `Lastnm`, `Points`, `salt1`, `salt2`, `hash`, `lockVender`) VALUES
(1, 'qqq@gmail.com', '11111', 'QQQ', 'AAA', 50, 831, 857, '21f0220a957a4413ca6625cf0c48b589', 0),
(2, 'jennyyan54@gmail.com', '22222', 'Jieni', 'Yan', 0, 430, 75, '9eb49b74c9644b0aaa772ca9b85ec146', 0),
(3, 'hello@gmail.com', '33333', 'Q', 'W', 0, 511, 994, '98b0658079c5ed560b2c8ced443d7373', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Vender`
--
ALTER TABLE `Vender`
  ADD PRIMARY KEY (`VenderID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Vender`
--
ALTER TABLE `Vender`
  MODIFY `VenderID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 15, 2021 at 05:10 AM
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
-- Table structure for table `Activity`
--

CREATE TABLE `Activity` (
  `ActivityID` int(20) NOT NULL,
  `VenderID` int(20) NOT NULL,
  `Name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Type` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `MaxAge` int(5) DEFAULT NULL,
  `MinAge` int(5) DEFAULT NULL,
  `Cost` int(10) NOT NULL,
  `Image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Activity`
--

INSERT INTO `Activity` (`ActivityID`, `VenderID`, `Name`, `Type`, `MaxAge`, `MinAge`, `Cost`, `Image`, `detail`) VALUES
(8, 1, 'Basketball', 'sports', 70, 5, 15, 'basketball.jpg', 'The best place to play basketball, basketball fans from 5 to 70 years old will enjoy playing. \r\nOnly $15, \"The basketball world\" will bring you passion and happiness!'),
(15, 1, 'Painting', 'arts', 80, 3, 50, 'painting.jpeg', 'Whether you are a beginner or a professional painter, you can immerse yourself here. We provide professional painting equipment, as well as professional teachers. \r\nFor only $50, come and join the world of painting!'),
(16, 1, 'Drama', 'entertainment', 80, 5, 60, 'drama.jpeg', 'Does the heavy life make you feel tired? \r\nHave you ever had a moment when you wanted to escape your daily life? \r\nCome and watch a drama! Forget yourself and enter another world to feel the happiness and sorrow of others. Every week, we have professional theatrical troupes from all over the country. \r\nClick on the details to check it out!\r\n'),
(37, 2, 'Tennis', 'sports', 60, 80, 30, 'Tennis.jpeg', 'Enjoy the movement of swinging a racket! \r\nHere you can also make like-minded friends! For only $30, you can enjoy an afternoon of fun!'),
(46, 2, 'Swimming', 'sports', 65, 5, 45, 'swimming.jpeg', 'Come and join us!\r\nYou will meet many like-minded people here！\r\nOnly $45, you can make friends and fit yourself!\r\nRegister now!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Activity`
--
ALTER TABLE `Activity`
  ADD PRIMARY KEY (`ActivityID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Activity`
--
ALTER TABLE `Activity`
  MODIFY `ActivityID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

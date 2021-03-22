
-- --------------------------------------------------------

--
-- Table structure for table `Activity`
--

CREATE TABLE `Activity` (
  `ActivityId` int(20) NOT NULL,
  `Name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `VenderId` int(20) NOT NULL,
  `Cost` int(20) NOT NULL,
  `Type` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `MinAge` int(5) NOT NULL,
  `MaxAge` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

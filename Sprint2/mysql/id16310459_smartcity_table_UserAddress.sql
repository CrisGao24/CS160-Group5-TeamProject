
-- --------------------------------------------------------

--
-- Table structure for table `UserAddress`
--

CREATE TABLE `UserAddress` (
  `UserId` int(20) NOT NULL,
  `Country` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `State` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `City` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Street` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Zipcode` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `UserAddress`
--

INSERT INTO `UserAddress` (`UserId`, `Country`, `State`, `City`, `Street`, `Zipcode`) VALUES
(5, 'US', 'CA', 'Santa Clara', '1111111', '95051');

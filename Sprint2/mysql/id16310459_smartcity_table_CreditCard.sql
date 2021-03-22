
-- --------------------------------------------------------

--
-- Table structure for table `CreditCard`
--

CREATE TABLE `CreditCard` (
  `UserId` int(20) NOT NULL,
  `CardNumber` int(30) NOT NULL,
  `ExpireDate` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `CVC` int(5) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------

--
-- Table structure for table `ActivityAddress`
--

CREATE TABLE `ActivityAddress` (
  `VenderId` int(20) NOT NULL,
  `Country` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `State` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `City` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Street` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Zipcode` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

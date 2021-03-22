
-- --------------------------------------------------------

--
-- Table structure for table `Vender`
--

CREATE TABLE `Vender` (
  `VenderId` int(20) NOT NULL,
  `Email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Firstnm` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Lastnm` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Points` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Vender`
--

INSERT INTO `Vender` (`VenderId`, `Email`, `Password`, `Firstnm`, `Lastnm`, `Points`) VALUES
(1, 'zzz@gmail.com', '11111', 'qqq', 'aaa', 0),
(2, 'rte@g.com', '11111', 'ttt', 'yyy', 0),
(3, '123ertert@1df', '11111', 'eeee', 'rrrr', 0);

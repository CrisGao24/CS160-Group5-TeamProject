
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
  `Points` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`UserID`, `Email`, `Password`, `Firstnm`, `Lastnm`, `Points`) VALUES
(5, 'chaijinyin@gmail.com', '11111', 'Jinyin', 'Chai', 9),
(7, 'jieniyan@gmail.com', '123131', 'Jieni', 'Yan', 0),
(9, 'aaa@gmail.com', '12345', 'AAAA', 'BBBB', 0),
(11, 'qqq@gmail.com', '12345', 'QQQ', 'WWW', 0),
(13, 'hello@qq.com', 'yanjieni', 'wwwww', 'qq', 0),
(14, 'cvbvcbcvb@gcc', '11111', 'asdfdsf', 'aaa', 0);

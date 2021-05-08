-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 10, 2021 at 04:11 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `watchdog`
--

-- --------------------------------------------------------

--
-- Table structure for table `residentsdata`
--

DROP TABLE IF EXISTS `residentsdata`;
CREATE TABLE IF NOT EXISTS `residentsdata` (
  `ruserid` int NOT NULL AUTO_INCREMENT,
  `rfullname` varchar(30) NOT NULL,
  `remailid` varchar(30) NOT NULL,
  `rphoneno` varchar(10) NOT NULL,
  `rwing` varchar(10) NOT NULL,
  `rroomno` varchar(10) NOT NULL,
  PRIMARY KEY (`ruserid`),
  UNIQUE KEY `remailid` (`remailid`),
  UNIQUE KEY `rphoneno` (`rphoneno`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `residentsdata`
--

INSERT INTO `residentsdata` (`ruserid`, `rfullname`, `remailid`, `rphoneno`, `rwing`, `rroomno`) VALUES
(61, 'vineet poojary', 'poojaryvineetdinesh@gmail.com', '8433621215', 'b', '101'),
(63, 'lalita poojary', 'lalitapoojary@gmail.com', '8452071739', 'b', '102'),
(65, 'suprabhat ', 'suprabhat@gmail.com', '9619890168', 'b', '103'),
(67, 'nivin reshith', 'nivinreshith@gmail.com', '9987497461', 'c', '101'),
(69, 'Dinesh Poojary', 'dineshpoojary@gmail.com', '9594545315', 'a', '101'),
(71, 'Disha Poojary ', 'dishapoojary@gmail.com', '9969465780', 'a', '101'),
(73, 'shabari salian', 'shabarisalian@gmail.com', '9167166259', 'a', '102');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userid` int NOT NULL AUTO_INCREMENT,
  `username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(20) NOT NULL,
  `usertype` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `usertype`) VALUES
(15, 'admin', 'admin', 'admin'),
(84, 'poojaryvineetdinesh@gmail.com', '8433621215', 'resident'),
(85, 'lalitapoojary@gmail.com', '8452071739', 'resident'),
(86, 'suprabhat@gmail.com', '123', 'resident'),
(87, 'security01@gmail.com', '159', 'security guard'),
(88, 'nivinreshith@gmail.com', '123', 'resident'),
(89, 'dineshpoojary@gmail.com', '9594545315', 'resident'),
(90, 'dishapoojary@gmail.com', '9969465780', 'resident'),
(91, 'sujatapoojary@gmail,com', '9969465780', 'resident'),
(93, 'shabarisalian@gmail.com', '9167166259', 'resident');

-- --------------------------------------------------------

--
-- Table structure for table `visitorsdata`
--

DROP TABLE IF EXISTS `visitorsdata`;
CREATE TABLE IF NOT EXISTS `visitorsdata` (
  `vuserid` int NOT NULL AUTO_INCREMENT,
  `vfullname` varchar(30) NOT NULL,
  `vemailid` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `vphoneno` varchar(10) NOT NULL,
  `vaddress` text NOT NULL,
  PRIMARY KEY (`vuserid`),
  KEY `vfullname` (`vfullname`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `visitorsdata`
--

INSERT INTO `visitorsdata` (`vuserid`, `vfullname`, `vemailid`, `vphoneno`, `vaddress`) VALUES
(50, 'vineet poojary', 'poojaryvineetdinesh@gmail.com', '8433621215', 'marol'),
(54, 'shabari salian', 'shabarisalian@gmail.com', '9167166259', 'chakala'),
(58, 'sujit poojary', 'sujitpoojary@gmail.com', '7506541517', 'marol');

-- --------------------------------------------------------

--
-- Table structure for table `visitorsrecord`
--

DROP TABLE IF EXISTS `visitorsrecord`;
CREATE TABLE IF NOT EXISTS `visitorsrecord` (
  `vuserid` int NOT NULL,
  `vwing` varchar(1) NOT NULL,
  `vroomno` varchar(5) NOT NULL,
  `vreason` varchar(20) NOT NULL,
  `vtimein` varchar(25) NOT NULL,
  `vtimeout` varchar(25) NOT NULL,
  KEY `vuserid` (`vuserid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `visitorsrecord`
--
ALTER TABLE `visitorsrecord`
  ADD CONSTRAINT `visitorsrecord_ibfk_1` FOREIGN KEY (`vuserid`) REFERENCES `visitorsdata` (`vuserid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

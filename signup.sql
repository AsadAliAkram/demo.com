-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 14, 2017 at 03:14 PM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE IF NOT EXISTS `signup` (
  `uid` int(20) NOT NULL AUTO_INCREMENT,
  `ufname` varchar(30) NOT NULL,
  `ulname` varchar(30) NOT NULL,
  `umname` varchar(30) NOT NULL,
  `umail` varchar(40) NOT NULL,
  `upass` varchar(20) NOT NULL,
  `ucat` int(10) NOT NULL,
  `uimage` varchar(1000) NOT NULL,
  `uccode` int(20) NOT NULL,
  `ustatus` int(10) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `umail` (`umail`,`upass`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`uid`, `ufname`, `ulname`, `umname`, `umail`, `upass`, `ucat`, `uimage`, `uccode`, `ustatus`) VALUES
(1, 'Asad', 'Akram', 'Ali', 'asad@gmail.com', '12345', 1, 'index.jpg', 0, 1),
(2, 'Asad', 'Akram', 'Ali', 'asad@gmail.com', '123456', 0, 'Koala.jpg', 0, 1),
(3, 'Asad', 'Akram', 'Ali', 'asad@gmail.com', 'zxcvb', 1, '14_august_facebook_cover.png', 0, 1),
(4, 'Asad', 'Akram', 'Ali', 'asad@gmail.com', 'qwert', 0, 'pak-day-640x480.jpg', 0, 1),
(15, 'Admin', 'Admin', 'Super', 'admin@gmail.com', 'admin12345', 2, 'images.jpeg', 0, 1),
(16, 'Test', 'Account', 'a', 'test@test.com', 'Test123#', 1, 'images.jpeg', 4664, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

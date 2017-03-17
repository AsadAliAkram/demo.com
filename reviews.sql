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
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `rid` int(20) NOT NULL AUTO_INCREMENT,
  `preview` varchar(500) NOT NULL,
  `pid` int(20) NOT NULL,
  `poid` int(20) NOT NULL,
  `uid` int(20) NOT NULL,
  `rdate` date NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`rid`, `preview`, `pid`, `poid`, `uid`, `rdate`) VALUES
(17, 'DHSHSHTRHSTR', 32, 0, 1, '0000-00-00'),
(84, '2nd Review', 28, 0, 3, '2001-03-17'),
(85, '3rd  Review', 28, 0, 3, '2001-03-17'),
(99, 'fmxjmxyjmxyj', 28, 2, 1, '2002-03-17'),
(100, 'hdteeehehejhe', 31, 4, 2, '2002-03-17'),
(101, 'sdasdasga', 27, 2, 16, '2006-03-17'),
(102, 'xzgdrtzdhx', 28, 2, 16, '2006-03-17');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

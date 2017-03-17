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
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `pid` int(20) NOT NULL AUTO_INCREMENT,
  `pname` varchar(50) NOT NULL,
  `pimage` varchar(1000) NOT NULL,
  `pcategory` varchar(50) NOT NULL,
  `prealprice` float NOT NULL,
  `pquantity` int(20) NOT NULL,
  `pdiscription` varchar(500) NOT NULL,
  `pownername` varchar(50) NOT NULL,
  `pownid` int(20) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `pname`, `pimage`, `pcategory`, `prealprice`, `pquantity`, `pdiscription`, `pownername`, `pownid`) VALUES
(35, 'Long Coat', '$_57.jpg', 'Fashon', 1500, 10, 'Long Coat of gray color..', 'Asad 1-6', 2),
(36, 'Long Coat', '-font-b-Grey-b-font-badges-font-b-pea-b-font-font-b-coats-b.jpg', 'Fashon', 2000, 5, 'Long Coat of color black..', 'Asad 1-6', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 14, 2017 at 02:54 PM
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
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=157 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `user_id`) VALUES
(142, 1),
(143, 1),
(144, 1),
(145, 0),
(146, 0),
(147, 0),
(148, 0),
(149, 0),
(150, 0),
(151, 0),
(152, 0),
(153, 0),
(154, 0),
(155, 0),
(156, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
  `oitems_id` int(20) NOT NULL AUTO_INCREMENT,
  `order_id` int(20) NOT NULL,
  `products_id` int(30) NOT NULL,
  `quantity` int(30) NOT NULL,
  PRIMARY KEY (`oitems_id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`oitems_id`, `order_id`, `products_id`, `quantity`) VALUES
(39, 142, 27, 4),
(40, 142, 27, 4),
(41, 142, 27, 4),
(42, 143, 28, 2),
(43, 143, 28, 2),
(44, 143, 28, 2),
(45, 144, 28, 2),
(46, 144, 28, 2),
(47, 144, 28, 2),
(48, 145, 0, 0),
(49, 145, 0, 0),
(50, 146, 0, 0),
(51, 147, 0, 0),
(52, 147, 0, 0),
(53, 147, 0, 0),
(54, 148, 0, 0),
(55, 148, 0, 0),
(56, 148, 0, 0),
(57, 149, 0, 0),
(58, 149, 0, 0),
(59, 149, 0, 0),
(60, 150, 0, 0),
(61, 150, 0, 0),
(62, 150, 0, 0),
(63, 151, 0, 0),
(64, 151, 0, 0),
(65, 151, 0, 0),
(66, 152, 0, 0),
(67, 152, 0, 0),
(68, 152, 0, 0),
(69, 153, 0, 0),
(70, 153, 0, 0),
(71, 153, 0, 0),
(72, 154, 0, 0),
(73, 154, 0, 0),
(74, 154, 0, 0),
(75, 155, 0, 0),
(76, 155, 0, 0),
(77, 155, 0, 0),
(78, 156, 0, 0),
(79, 156, 0, 0),
(80, 156, 0, 0);

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

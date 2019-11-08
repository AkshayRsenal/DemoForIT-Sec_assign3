-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 16, 2016 at 05:49 AM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `social_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `age` int(3) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `salary` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `gender`, `age`, `qualification`, `salary`) VALUES
(1, 'aniket', 'm', 21, 'BSC', 12000),
(3, 'ram', 'm', 32, 'ssc', 280000),
(14, 'pooja', 'm', 22, 'Bcom', 120000),
(13, 'Akshay', 'm', 30, 'MA', 700000),
(10, 'viral', 'm', 25, 'ACA', 250000),
(18, 'monika', 'f', 25, 'BA', 250000),
(26, 'manisha', 'f', 18, 'SSC', 100000),
(28, 'Rakesh Gaikwad', 'm', 26, 'SSC', 96000);

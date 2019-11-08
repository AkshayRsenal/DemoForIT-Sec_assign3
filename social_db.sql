-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2019 at 06:30 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `reg_no` varchar(100) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `age` int(3) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `salary` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `reg_no`, `gender`, `age`, `qualification`, `salary`) VALUES
(1, 'aniket', '', 'm', 21, 'BSC', 12000),
(3, 'ram', '', 'm', 32, 'ssc', 280000),
(14, 'pooja', '', 'm', 22, 'Bcom', 120000),
(13, 'Akshay', '', 'm', 30, 'MA', 700000),
(10, 'viral', '', 'm', 25, 'ACA', 250000),
(18, 'monika', '', 'f', 25, 'BA', 250000),
(26, 'manisha', '', 'f', 18, 'SSC', 100000),
(28, 'Rakesh Gaikwad', '', 'm', 26, 'SSC', 96000),
(29, 'adsfs', 'SJ634284', 'm', 25, 'bt', 45555),
(30, 'adsfs', 'SJ982567', 'm', 33, 'BE', 34444),
(31, 'tester dsa', 'SJ219627', 'm', 32, 'dsd', 231111);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

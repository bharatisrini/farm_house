-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2015 at 07:12 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `farmhouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_detox_program`
--

CREATE TABLE IF NOT EXISTS `farmhouse_detox_program` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `detox_id` int(5) NOT NULL,
  `detox_name` varchar(50) NOT NULL,
  `detox_items` text NOT NULL,
  `detox_price` decimal(11,4) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_cahnged` datetime NOT NULL,
  PRIMARY KEY (`trans_id`,`detox_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `farmhouse_detox_program`
--

INSERT INTO `farmhouse_detox_program` (`trans_id`, `detox_id`, `detox_name`, `detox_items`, `detox_price`, `ip`, `date_added`, `date_cahnged`) VALUES
(1, 1, 'Detox-A', 'GREEN ELIXIR,INTERNAL FIX,BEAUTY GLOW,SPICY LEMONADE,BEET IT,HORCHATA', '258.0000', '125.0.0.1', '2015-02-09 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 'Detox-B', 'GREEN ELIXIR,GREEN ELIXIR, GREEN ELIXIR,INTERNAL FIX,BEAUTY GLOW,SPICY LEMONADE', '258.0000', '125.0.0.1', '2015-02-09 22:14:06', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

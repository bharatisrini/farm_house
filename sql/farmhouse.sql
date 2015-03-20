-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2015 at 02:58 PM
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
-- Table structure for table `farmhoue_detox_cart_temp`
--

CREATE TABLE IF NOT EXISTS `farmhoue_detox_cart_temp` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `detox_id` int(11) NOT NULL,
  `detox_name` varchar(25) NOT NULL,
  `no_people` int(5) NOT NULL,
  `day_detox` int(5) NOT NULL,
  `order_same_amount` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `total_amount` decimal(15,4) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_admin_login`
--

CREATE TABLE IF NOT EXISTS `farmhouse_admin_login` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `email` varchar(96) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `logged_in_time` datetime NOT NULL,
  `logged_out_time` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`trans_id`),
  KEY `email` (`email`),
  KEY `ip` (`ip`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `farmhouse_admin_login`
--

INSERT INTO `farmhouse_admin_login` (`trans_id`, `admin_id`, `email`, `ip`, `logged_in_time`, `logged_out_time`, `status`, `type`) VALUES
(1, 1, 'anm@gmail.com', '10.0.0.8', '2015-03-19 09:58:44', '0000-00-00 00:00:00', 1, 'admin'),
(2, 1, 'anm@gmail.com', '10.0.0.15', '2015-03-20 10:08:45', '0000-00-00 00:00:00', 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_admin_registration`
--

CREATE TABLE IF NOT EXISTS `farmhouse_admin_registration` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(96) NOT NULL,
  `telephone` varchar(32) NOT NULL,
  `password` varchar(40) NOT NULL,
  `address` text,
  `ip` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_added` datetime NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `farmhouse_admin_registration`
--

INSERT INTO `farmhouse_admin_registration` (`admin_id`, `firstname`, `lastname`, `email`, `telephone`, `password`, `address`, `ip`, `status`, `date_added`, `type`) VALUES
(1, 'Manu', 'Adapa', 'anm@gmail.com', '9652163209', 'f13bb1bed03db9d68a7d9a48aafeec78', '#50-15-10,akp,vsp', '10.0.0.8', 1, '2015-03-19 09:58:28', 'admin'),
(2, 'Priya', 'Vemuri', 'priyave@yahoo.com', '9849416542', 'b670e492ea57159477c0466c08ad0bc5', 'adjdbhfvsdji', '10.0.0.15', 1, '2015-03-20 01:07:32', 'dispatch');

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_admin_temp_insert_prg`
--

CREATE TABLE IF NOT EXISTS `farmhouse_admin_temp_insert_prg` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `prod_id` int(6) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(6) NOT NULL,
  `price` double NOT NULL DEFAULT '0',
  `id_total` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_carrier_details`
--

CREATE TABLE IF NOT EXISTS `farmhouse_carrier_details` (
  `carrier_id` int(11) NOT NULL AUTO_INCREMENT,
  `carrier_name` varchar(40) NOT NULL,
  `carrier_address` varchar(96) NOT NULL,
  `city` varchar(40) NOT NULL,
  `state` varchar(40) NOT NULL,
  `mobile` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `contact_person` varchar(40) NOT NULL,
  `date_added` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`carrier_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_country_language`
--

CREATE TABLE IF NOT EXISTS `farmhouse_country_language` (
  `countrylang_id` int(6) NOT NULL AUTO_INCREMENT,
  `country` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `selected` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`countrylang_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `farmhouse_country_language`
--

INSERT INTO `farmhouse_country_language` (`countrylang_id`, `country`, `language`, `selected`) VALUES
(1, 'Eng', 'Eng', 0),
(2, 'Chi', 'Chi', 1),
(3, 'Rus', 'Rus', 0);

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_credit_card_details`
--

CREATE TABLE IF NOT EXISTS `farmhouse_credit_card_details` (
  `card_id` int(11) NOT NULL AUTO_INCREMENT,
  `card_name` varchar(25) NOT NULL,
  `bank_name` varchar(25) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  PRIMARY KEY (`card_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `farmhouse_credit_card_details`
--

INSERT INTO `farmhouse_credit_card_details` (`card_id`, `card_name`, `bank_name`, `image`, `status`, `date_added`, `date_modified`) VALUES
(1, 'visa', 'visa', 'visa.png', 0, '2015-03-19 00:00:00', '0000-00-00 00:00:00'),
(2, 'mastercard', 'mastercard', 'mastercard.png', 0, '2015-03-19 00:00:00', '0000-00-00 00:00:00'),
(3, 'hsbc', 'hsbc', 'hsbc.png', 0, '2015-03-19 00:00:00', '0000-00-00 00:00:00'),
(4, 'bank-of-beijing', 'bank-of-beijing', 'bank-of-beijing.png', 0, '2015-03-19 00:00:00', '0000-00-00 00:00:00'),
(5, 'bank-of-china', 'bank-of-china', 'bank-of-china.png', 0, '2015-03-19 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_customer`
--

CREATE TABLE IF NOT EXISTS `farmhouse_customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(96) NOT NULL,
  `telephone` varchar(32) NOT NULL,
  `password` varchar(40) NOT NULL,
  `address` text,
  `ip` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_added` datetime NOT NULL,
  `city` varchar(25) NOT NULL,
  `district` varchar(25) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `farmhouse_customer`
--

INSERT INTO `farmhouse_customer` (`customer_id`, `firstname`, `lastname`, `email`, `telephone`, `password`, `address`, `ip`, `status`, `date_added`, `city`, `district`) VALUES
(1, 'nandini', 'bayya', 'nandy.2992@gmail.com', '987654321', '262eacb694460a5e39413197ef50d6f2', 'd.no:1-208/1\nhgdfukhhkj\nsdhjsaghlhkj', '10.0.0.14', 1, '2015-03-19 01:00:54', 'Beijing', 'Xuhui'),
(2, 'Manohar', 'Adapa', 'manu1@gmail.com', '9848022338', '4d36bbb707be4bbc97fd28af68c1fbfd', '#50-10,\npark street.', '10.0.0.8', 1, '2015-03-20 10:27:45', 'Beijing', 'Fengtai '),
(3, 'Ram', 'Adapa', 'arg@gmail.com', '9948001122', '61dd86c2dc75c3f569ec619bd283a33f', '#44-43,\nBank Street', '10.0.0.8', 1, '2015-03-20 12:00:53', 'Shanghai', 'Xuhui'),
(4, 'hussain', 'tahzeeb', 'hussain@gmail.com', '575762571625', '827ccb0eea8a706c4c34a16891f84e7b', 'uyqwetgfjwgf hgdv', '10.0.0.13', 1, '2015-03-20 01:12:46', 'Beijing', 'Chaoyang'),
(5, 'bhaskar', 'bhaskar', 'bbhakar.321@gmail.com', '8121388886', 'e776db715b807d7fc675764a415e9c23', 'yguftyj hai 4490-03 hai hai', '10.0.0.26', 1, '2015-03-20 01:14:49', 'Shanghai', 'Fengtai '),
(6, 'bhaskar', 'bhaskar', 'bbhaskar.321@gmail.com', '8121388886', '3aa17c5ad32c639e398379910eabdb42', ' dsadsa sajdas;ld kd;lsakd', '10.0.0.26', 1, '2015-03-20 01:16:40', 'Chongqing', 'Xuhui'),
(7, 'bala', 'bhaskar', 'veerni.321@gmail.com', '8121388886', 'bb64ab6790b8b25c76aeadf8b9e5ded4', 'fkljfk lkdsj fjdsa sdaj djf a fsaj ', '10.0.0.26', 1, '2015-03-20 01:19:54', 'Shanghai', 'Xuhui');

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_customer_address`
--

CREATE TABLE IF NOT EXISTS `farmhouse_customer_address` (
  `trans_id` int(5) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `address` varchar(25) NOT NULL,
  `address_district` varchar(255) NOT NULL,
  `address_city` varchar(255) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `countrylang_id` int(6) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `farmhouse_customer_address`
--

INSERT INTO `farmhouse_customer_address` (`trans_id`, `customer_id`, `address_id`, `address`, `address_district`, `address_city`, `firstname`, `lastname`, `countrylang_id`) VALUES
(1, 1, 1, 'd.no:1-208/1\nhgdfukhhkj\ns', 'Xuhui', 'Beijing', '', '', 0),
(2, 1, 2, 'vizag', 'Fengtai ', 'Shanghai', '', '', 0),
(3, 2, 1, '#50-10,\npark street.', 'Fengtai ', 'Beijing', '', '', 0),
(4, 3, 1, '#44-43,\nBank Street', 'Xuhui', 'Shanghai', '', '', 0),
(5, 4, 1, 'uyqwetgfjwgf hgdv', 'Chaoyang', 'Beijing', '', '', 0),
(6, 5, 1, 'yguftyj hai 4490-03 hai h', 'Fengtai ', 'Shanghai', '', '', 0),
(7, 6, 1, ' dsadsa sajdas;ld kd;lsak', 'Xuhui', 'Chongqing', '', '', 0),
(8, 0, 1, '', 'Fengtai ', 'Shanghai', '', '', 0),
(9, 7, 1, 'fkljfk lkdsj fjdsa sdaj d', 'Xuhui', 'Shanghai', '', '', 0),
(10, 4, 2, '', 'Fengtai ', 'Shanghai', '', '', 0),
(11, 7, 2, 'resytr', 'Fengtai ', 'Chongqing', '', '', 0),
(12, 7, 3, 'hgfg', 'Xuhui', 'Beijing', '', '', 0),
(13, 0, 1, 'dfgsdg', 'Fengtai ', 'Beijing', '', '', 0),
(14, 1, 3, 'erwre', 'Fengtai ', 'Shanghai', '', '', 0),
(15, 1, 4, '4234', 'Chaoyang', 'Shanghai', '', '', 0),
(16, 1, 5, 'fdsh', 'Fengtai ', 'Chongqing', '', '', 0),
(17, 1, 6, 'sder', 'Xuhui', 'Chongqing', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_customer_login`
--

CREATE TABLE IF NOT EXISTS `farmhouse_customer_login` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `email` varchar(96) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `logged_in_time` datetime NOT NULL,
  `logged_out_time` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`trans_id`),
  KEY `email` (`email`),
  KEY `ip` (`ip`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `farmhouse_customer_login`
--

INSERT INTO `farmhouse_customer_login` (`trans_id`, `customer_id`, `email`, `ip`, `logged_in_time`, `logged_out_time`, `status`) VALUES
(1, 1, 'nandy.2992@gmail.com', '10.0.0.14', '2015-03-19 01:01:02', '2015-03-20 02:37:29', 0),
(2, 1, 'nandy.2992@gmail.com', '127.0.0.1', '2015-03-20 05:38:28', '2015-03-20 02:37:29', 0),
(3, 2, 'manu1@gmail.com', '10.0.0.8', '2015-03-20 10:27:59', '2015-03-20 12:15:04', 0),
(4, 1, 'nandy.2992@gmail.com', '10.0.0.14', '2015-03-20 11:30:01', '2015-03-20 02:37:29', 0),
(5, 1, 'nandy.2992@gmail.com', '10.0.0.14', '2015-03-20 11:48:22', '2015-03-20 02:37:29', 0),
(6, 1, 'nandy.2992@gmail.com', '10.0.0.14', '2015-03-20 11:56:53', '2015-03-20 02:37:29', 0),
(7, 3, 'arg@gmail.com', '10.0.0.8', '2015-03-20 12:01:11', '2015-03-20 12:53:58', 0),
(8, 2, 'manu1@gmail.com', '10.0.0.8', '2015-03-20 12:01:49', '2015-03-20 12:15:04', 0),
(9, 1, 'nandy.2992@gmail.com', '127.0.0.1', '2015-03-20 12:03:31', '2015-03-20 02:37:29', 0),
(10, 3, 'arg@gmail.com', '10.0.0.8', '2015-03-20 12:18:03', '2015-03-20 12:53:58', 0),
(11, 1, 'nandy.2992@gmail.com', '10.0.0.14', '2015-03-20 12:20:27', '2015-03-20 02:37:29', 0),
(12, 3, 'arg@gmail.com', '10.0.0.8', '2015-03-20 12:30:38', '2015-03-20 12:53:58', 0),
(13, 1, 'nandy.2992@gmail.com', '10.0.0.14', '2015-03-20 12:31:44', '2015-03-20 02:37:29', 0),
(14, 1, 'nandy.2992@gmail.com', '10.0.0.14', '2015-03-20 12:34:54', '2015-03-20 02:37:29', 0),
(15, 3, 'arg@gmail.com ', '10.0.0.8', '2015-03-20 12:36:37', '2015-03-20 12:53:58', 0),
(16, 3, 'arg@gmail.com', '10.0.0.8', '2015-03-20 12:39:32', '2015-03-20 12:53:58', 0),
(17, 3, 'arg@gmail.com', '10.0.0.8', '2015-03-20 12:40:35', '2015-03-20 12:53:58', 0),
(18, 3, 'arg@gmail.com', '10.0.0.8', '2015-03-20 12:42:38', '2015-03-20 12:53:58', 0),
(19, 3, 'arg@gmail.com', '10.0.0.8', '2015-03-20 12:43:17', '2015-03-20 12:53:58', 0),
(20, 3, 'arg@gmail.com', '10.0.0.8', '2015-03-20 12:43:21', '2015-03-20 12:53:58', 0),
(21, 3, 'arg@gmail.com', '10.0.0.8', '2015-03-20 12:43:56', '2015-03-20 12:53:58', 0),
(22, 1, 'nandy.2992@gmail.com', '10.0.0.14', '2015-03-20 12:45:04', '2015-03-20 02:37:29', 0),
(23, 1, 'nandy.2992@gmail.com', '10.0.0.14', '2015-03-20 12:50:39', '2015-03-20 02:37:29', 0),
(24, 1, 'nandy.2992@gmail.com', '10.0.0.14', '2015-03-20 12:52:57', '2015-03-20 02:37:29', 0),
(25, 1, 'nandy.2992@gmail.com', '10.0.0.14', '2015-03-20 01:05:56', '2015-03-20 02:37:29', 0),
(26, 1, 'nandy.2992@gmail.com', '10.0.0.14', '2015-03-20 01:10:44', '2015-03-20 02:37:29', 0),
(27, 3, 'arg@gmail.com', '10.0.0.8', '2015-03-20 01:12:24', '0000-00-00 00:00:00', 1),
(28, 4, 'hussain@gmail.com', '10.0.0.13', '2015-03-20 01:13:04', '0000-00-00 00:00:00', 1),
(29, 1, 'nandy.2992@gmail.com', '10.0.0.14', '2015-03-20 01:16:47', '2015-03-20 02:37:29', 0),
(30, 1, 'nandy.2992@gmail.com', '10.0.0.14', '2015-03-20 01:19:19', '2015-03-20 02:37:29', 0),
(31, 7, 'veerni.321@gmail.com', '10.0.0.26', '2015-03-20 01:20:16', '2015-03-20 01:21:17', 0),
(32, 7, 'veerni.321@gmail.com', '10.0.0.26', '2015-03-20 01:21:48', '0000-00-00 00:00:00', 1),
(33, 1, 'nandy.2992@gmail.com', '127.0.0.1', '2015-03-20 01:27:46', '2015-03-20 02:37:29', 0),
(34, 1, 'nandy.2992@gmail.com', '10.0.0.8', '2015-03-20 01:28:16', '2015-03-20 02:37:29', 0),
(35, 1, 'nandy.2992@gmail.com', '127.0.0.1', '2015-03-20 01:33:22', '2015-03-20 02:37:29', 0),
(36, 1, 'nandy.2992@gmail.com', '10.0.0.14', '2015-03-20 01:35:38', '2015-03-20 02:37:29', 0),
(37, 1, 'nandy.2992@gmail.com', '10.0.0.14', '2015-03-20 01:36:48', '2015-03-20 02:37:29', 0),
(38, 7, 'veerni.321@gmail.com', '10.0.0.8', '2015-03-20 01:43:01', '0000-00-00 00:00:00', 1),
(39, 1, 'nandy.2992@gmail.com', '10.0.0.14', '2015-03-20 02:24:56', '2015-03-20 02:37:29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_debit_card_details`
--

CREATE TABLE IF NOT EXISTS `farmhouse_debit_card_details` (
  `card_id` int(11) NOT NULL AUTO_INCREMENT,
  `card_name` varchar(25) NOT NULL,
  `bank_name` varchar(25) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  PRIMARY KEY (`card_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `farmhouse_debit_card_details`
--

INSERT INTO `farmhouse_debit_card_details` (`card_id`, `card_name`, `bank_name`, `image`, `status`, `date_added`, `date_modified`) VALUES
(1, 'visa', 'visa', 'visa.png', 0, '2015-03-19 00:00:00', '0000-00-00 00:00:00'),
(2, 'mastercard', 'mastercard', 'mastercard.png', 0, '2015-03-19 00:00:00', '0000-00-00 00:00:00'),
(3, 'hsbc', 'hsbc', 'hsbc.png', 0, '2015-03-19 00:00:00', '0000-00-00 00:00:00'),
(4, 'abc-bank', 'abc-bank', 'abc-bank.png', 0, '2015-03-19 00:00:00', '0000-00-00 00:00:00'),
(5, 'bank-ceb', 'bank-ceb', 'bank-ceb.png', 0, '2015-03-19 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_delivery_schedule`
--

CREATE TABLE IF NOT EXISTS `farmhouse_delivery_schedule` (
  `trans_id` int(5) NOT NULL AUTO_INCREMENT,
  `order_id` int(5) NOT NULL,
  `customer_id` int(5) NOT NULL,
  `product_type` varchar(15) CHARACTER SET utf8 NOT NULL,
  `delivery_date` text CHARACTER SET utf8 NOT NULL,
  `delivery_address` text CHARACTER SET utf8 NOT NULL,
  `delivery_status` int(5) NOT NULL,
  `delivered_date` text CHARACTER SET utf8 NOT NULL,
  `address_delivered` text CHARACTER SET utf8 NOT NULL,
  `carrier_id` int(5) NOT NULL,
  `no_people` int(10) NOT NULL,
  `no_detox` int(10) NOT NULL,
  `tmp_trans_id` int(10) NOT NULL,
  `tmp_life_id` int(10) unsigned NOT NULL,
  `program_name` varchar(50) NOT NULL,
  `program_type` varchar(50) NOT NULL,
  `ip` varchar(40) NOT NULL,
  PRIMARY KEY (`trans_id`),
  KEY `carrier_id` (`carrier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=288 ;

--
-- Dumping data for table `farmhouse_delivery_schedule`
--

INSERT INTO `farmhouse_delivery_schedule` (`trans_id`, `order_id`, `customer_id`, `product_type`, `delivery_date`, `delivery_address`, `delivery_status`, `delivered_date`, `address_delivered`, `carrier_id`, `no_people`, `no_detox`, `tmp_trans_id`, `tmp_life_id`, `program_name`, `program_type`, `ip`) VALUES
(254, 6502415, 7, 'AMINO HYDRATE', '2015-03-20', ' 1', 0, '', '', 0, 0, 0, 0, 0, '', 'Retail', ''),
(255, 6502415, 7, 'THE REHYDRATOR', '2015-03-20', ' 1', 0, '', '', 0, 0, 0, 0, 0, '', 'Retail', ''),
(256, 6502415, 7, 'BEET IT', '2015-03-20', ' 1', 0, '', '', 0, 0, 0, 0, 0, '', 'Retail', ''),
(257, 6502415, 7, 'HORCHATA', '2015-03-20', ' 1', 0, '', '', 0, 0, 0, 0, 0, '', 'Retail', ''),
(258, 3478763, 7, 'BEET IT', '2015-03-20', ' 1', 0, '', '', 0, 0, 0, 0, 0, '', 'Retail', ''),
(259, 3478763, 7, 'HORCHATA', '2015-03-20', ' 1', 0, '', '', 0, 0, 0, 0, 0, '', 'Retail', ''),
(260, 6770662, 1, 'DETOX -A', '2015-03-21', '2', 0, '', '', 0, 1, 1, 65, 0, 'A', 'Detox', '10.0.0.14'),
(261, 6770662, 1, 'DETOX -A', '2015-03-24', '4', 0, '', '', 0, 1, 1, 65, 0, 'A', 'Detox', '10.0.0.14'),
(262, 6770662, 1, 'DETOX -A', '2015-03-26', '1', 0, '', '', 0, 1, 1, 65, 0, 'A', 'Detox', '10.0.0.14'),
(263, 6770662, 1, 'DETOX -A', '2015-03-21', '1', 0, '', '', 0, 2, 1, 65, 0, 'A', 'Detox', '10.0.0.14'),
(264, 6770662, 1, 'DETOX -A', '2015-03-24', '1', 0, '', '', 0, 2, 1, 65, 0, 'A', 'Detox', '10.0.0.14'),
(265, 6770662, 1, 'DETOX -A', '2015-03-26', '1', 0, '', '', 0, 2, 1, 65, 0, 'A', 'Detox', '10.0.0.14'),
(266, 6770662, 1, 'DETOX -A', '2015-03-21', '1', 0, '', '', 0, 3, 1, 65, 0, 'A', 'Detox', '10.0.0.14'),
(267, 6770662, 1, 'DETOX -A', '2015-03-24', '1', 0, '', '', 0, 3, 1, 65, 0, 'A', 'Detox', '10.0.0.14'),
(268, 6770662, 1, 'DETOX -A', '2015-03-26', '1', 0, '', '', 0, 3, 1, 65, 0, 'A', 'Detox', '10.0.0.14'),
(269, 6770662, 1, 'DETOX -A', '2015-03-21', '1', 0, '', '', 0, 4, 1, 65, 0, 'A', 'Detox', '10.0.0.14'),
(270, 6770662, 1, 'DETOX -A', '2015-03-24', '1', 0, '', '', 0, 4, 1, 65, 0, 'A', 'Detox', '10.0.0.14'),
(271, 6770662, 1, 'DETOX -A', '2015-03-26', '1', 0, '', '', 0, 4, 1, 65, 0, 'A', 'Detox', '10.0.0.14'),
(272, 0, 1, 'DETOX -A', '2015-03-21', '1', 0, '', '', 0, 1, 1, 67, 0, 'A', 'Detox', '10.0.0.14'),
(273, 0, 1, 'DETOX -A', '2015-03-24', '1', 0, '', '', 0, 1, 1, 67, 0, 'A', 'Detox', '10.0.0.14'),
(274, 0, 1, 'DETOX -A', '2015-03-21', '1', 0, '', '', 0, 2, 1, 67, 0, 'A', 'Detox', '10.0.0.14'),
(275, 0, 1, 'DETOX -A', '2015-03-24', '1', 0, '', '', 0, 2, 1, 67, 0, 'A', 'Detox', '10.0.0.14');

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_detox_program`
--

CREATE TABLE IF NOT EXISTS `farmhouse_detox_program` (
  `detox_id` int(11) NOT NULL AUTO_INCREMENT,
  `detox_name` varchar(50) NOT NULL,
  `detox_items` text NOT NULL,
  `detox_item_id` text NOT NULL,
  `detox_price` decimal(11,0) NOT NULL,
  `title_1` varchar(100) NOT NULL,
  `discription_1` text NOT NULL,
  `ip` varchar(40) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_cahnged` datetime NOT NULL,
  `countrylang_id` varchar(6) NOT NULL,
  PRIMARY KEY (`detox_id`,`detox_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `farmhouse_detox_program`
--

INSERT INTO `farmhouse_detox_program` (`detox_id`, `detox_name`, `detox_items`, `detox_item_id`, `detox_price`, `title_1`, `discription_1`, `ip`, `date_added`, `date_cahnged`, `countrylang_id`) VALUES
(28, 'DETOX -A', 'GREEN ELIXIR,INTERNAL FIX,BEAUTY GLOW,SPICY LEMONADE,BEET IT,HORCHATA', '1,2,3,4,5,6', '195', 'DETOX -A', 'DETOX -A', '127.0.0.1', '2015-03-20 00:00:00', '0000-00-00 00:00:00', '1'),
(30, 'DETOX -A', ' &#32511;&#33394;&#33647;&#21058;,&#20869;&#22266;&#23450;&#65292;&#32654;&#23481;&#28949;&#21457;,&#36771;&#26592;&#27308;&#27700;,&#29980;&#33756;IT,&#27431;&#27965;&#22612;', '1,2,3,4,5,6', '195', 'DETOX -A', 'DETOX -A', '127.0.0.1', '2015-03-20 00:00:00', '0000-00-00 00:00:00', '2');

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_detox_temp_items`
--

CREATE TABLE IF NOT EXISTS `farmhouse_detox_temp_items` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(10,0) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_footer`
--

CREATE TABLE IF NOT EXISTS `farmhouse_footer` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `heading` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `placeholder` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `button_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `carrers` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `carrers_link` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contactus` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contactus_link` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `copyright` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `countrylang_id` int(6) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `farmhouse_footer`
--

INSERT INTO `farmhouse_footer` (`trans_id`, `heading`, `placeholder`, `button_name`, `carrers`, `carrers_link`, `contactus`, `contactus_link`, `copyright`, `countrylang_id`, `status`) VALUES
(1, 'STAY INFORMED. JOIN OUR NEWSLETTER', 'Enter your Email Address', 'SEND', 'Careers', 'careers.php', 'Contact Us', 'contactus.php', 'Copyright © 2014 Farmhouse Juice Hospitality Group China.', 1, 0),
(2, '&#38568;&#26178;&#20102;&#35299;&#12290;&#35330;&#38321;&#38651;&#23376;&#26399;&#21002;', '&#36664;&#20837;&#24744;&#30340;&#38651;&#23376;&#37109;&#20214;&#22320;&#22336;', '&#30332;&#36865;', '&#25307;&#32856;', 'careers.php', '&#32879;&#32363;&#25105;&#20497;', 'contactus.php', '&#29256;&#27402;© 2014&#24180;&#36786;&#23478;&#27138;&#26524;&#27713;&#37202;&#24215;&#38598;&#22296;&#20013;&#22283;', 2, 0),
(3, '&#1041;&#1091;&#1076;&#1100;&#1090;&#1077; &#1074; &#1082;&#1091;&#1088;&#1089;&#1077; . &#1055;&#1086;&#1076;&#1087;&#1080;&#1096;&#1080;&#1090;&#1077;&#1089;&#1100; &#1085;&#1072; &#1085;&#1072;&#1096;&#1091; &#1088;&#1072;&#1089;&#1089;&#1099;&#1083;&#', '&#1042;&#1074;&#1077;&#1076;&#1080;&#1090;&#1077; &#1089;&#1074;&#1086;&#1081; &#1101;&#1083;&#1077;&#1082;&#1090;&#1088;&#1086;&#1085;&#1085;&#1099;&#1081; &#1072;&#1076;&#1088;&#1077;&#1089;', '&#1054;&#1058;&#1055;&#10', '&#1050;&#1072;&#1088;&#1100;&#1077;&#1088;&#1072;', 'careers.php', '&#1057;&#1074;&#1103;&#1079;&#1072;&#1090;&#1100;&#1089;&#1103; &#1057; &#1053;&#1072;&#1084;&#1080;', 'contactus.php', 'Copyright Â © 2014 &#1040;&#1075;&#1088;&#1086;&#1090;&#1091;&#1088;&#1080;&#1079;&#1084; &#1057;&#1086;&#1082; Hospitality Group &#1050;&#1080;&#1090;&#1072;&#1081;', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_gift_card_details`
--

CREATE TABLE IF NOT EXISTS `farmhouse_gift_card_details` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `quantity` int(4) NOT NULL DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  `price` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_hydrator_details`
--

CREATE TABLE IF NOT EXISTS `farmhouse_hydrator_details` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `quantity` int(4) NOT NULL DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  `price` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `weight` decimal(15,8) NOT NULL DEFAULT '0.00000000',
  `ingredients` text NOT NULL,
  `benifits` text NOT NULL,
  `nutritional_content` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `image2` varchar(255) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_index`
--

CREATE TABLE IF NOT EXISTS `farmhouse_index` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `image1` varchar(100) DEFAULT NULL,
  `heading1` varchar(255) DEFAULT NULL,
  `discription1` text,
  `image2` varchar(100) DEFAULT NULL,
  `heading2` varchar(255) DEFAULT NULL,
  `discription2` text,
  `image3` varchar(100) DEFAULT NULL,
  `heading3` varchar(255) DEFAULT NULL,
  `discription3` text,
  `date_added` datetime DEFAULT NULL,
  `countrylang_id` int(6) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `farmhouse_index`
--

INSERT INTO `farmhouse_index` (`trans_id`, `image1`, `heading1`, `discription1`, `image2`, `heading2`, `discription2`, `image3`, `heading3`, `discription3`, `date_added`, `countrylang_id`) VALUES
(1, 'images/food-bg.jpg', 'FARMHOUSE JUICE', 'Whether you are looking to supplement a meal or to just enjoy as a stand alone beverage each of our juice combinations are designed to help detoxifying purify the mind and body,using freshly pressed vegetable and fruit juices. We believe in being practica', 'images/buy-now.jpg', 'SAMPLE HEADING', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce pellentes risus in enim porta aliquam aenean at felis.', 'images/detox-fruit.jpg', 'SAMPLE HEADING', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce pellentes risus in enim porta aliquam aenean at felis.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce pellentes risus in enim porta aliquam aenean at felis.', NULL, 1),
(2, 'images/food-bg.jpg', '&#36786;&#33674;&#26524;&#27713;', '&#28961;&#35542;&#24744;&#26159;&#24819;&#35036;&#20805;&#19968;&#38931;&#39151;&#65292;&#25110;&#32773;&#21482;&#26159;&#20139;&#21463;&#20316;&#28858;&#19968;&#20491;&#29544;&#31435;&#30340;&#39154;&#26009;&#25105;&#20497;&#27599;&#20491;&#27713;&#32068;&#21512;&#65292;&#26088;&#22312;&#24171;&#21161;&#25490;&#27602;&#28136;&#21270;&#24515;&#38728;&#21644;&#36523;&#39636;&#65292;&#29992;&#39854;&#27048;&#34092;&#33756;&#21644;&#26524;&#27713;&#12290;&#25105;&#20497;&#30456;&#20449;&#65292;&#22312;&#21209;&#23526;&#65292;&#22240;&#27492;&#25105;&#20497;&#24050;&#32147;&#24819;&#20986;&#20102;&#34092;&#33756;&#21917;1.5&#21315;&#20811;&#30340;&#30332;&#21806;&#32773;&#19968;&#20491;&#21451;&#22909;&#30340;&#31995;&#32113;&#65292;&#20006;&#19988;&#36969;&#29992;&#26044;&#25152;&#26377;&#29151;&#39178;&#30340;&#29983;&#27963;&#26041;&#24335;&#12290;&#36786;&#23478;&#27138;&#26524;&#27713;&#35475;&#35328;&#65292;&#35731;&#24744;&#8203;&#8203;&#27599;&#22825;&#30340;&#35370;&#21839;&#24744;&#26368;&#21916;&#24859;&#30340;&#21407;&#26009;&#21644;&#26410;&#32147;&#39640;&#28331;&#28040;&#27602;&#30340;&#26524;&#27713;&#32068;&#21512;&#12290;\r\n', 'images/buy-now.jpg', '&#27171;&#21697;&#33322;&#21521;', '&#32085;&#27578;&#23384;&#26377;&#24754;&#22352;&#38463;&#26757;&#24503;&#32085;&#27578;&#23384;&#26377;&#24754;&#22352;&#38463;&#26757;&#24503;\r\n', 'images/detox-fruit.jpg', '&#27171;&#21697;&#33322;&#21521;', '&#23384;&#26377;&#24754;&#22352;&#38463;&#26757;&#24503;&#65292;&#30340;&#35987;&#12290;\r\n', NULL, 2),
(3, 'images/food-bg.jpg', '&#1044;&#1054;&#1052; &#1057;&#1054;&#1050;', '&#1045;&#1089;&#1083;&#1080; &#1074;&#1099; &#1080;&#1097;&#1077;&#1090;&#1077; , &#1095;&#1090;&#1086;&#1073;&#1099; &#1076;&#1086;&#1087;&#1086;&#1083;&#1085;&#1080;&#1090;&#1100; &#1090;&#1088;&#1072;&#1087;&#1077;&#1079;&#1091; &#1080;&#1083;&#1080; &#1087;&#1088;&#1086;&#1089;&#1090;&#1086; &#1085;&#1072;&#1089;&#1083;&#1072;&#1078;&#1076;&#1072;&#1090;&#1100;&#1089;&#1103; &#1082;&#1072;&#1082; &#1089;&#1072;&#1084;&#1086;&#1089;&#1090;&#1086;&#1103;&#1090;&#1077;&#1083;&#1100;&#1085;&#1099;&#1081; &#1085;&#1072;&#1087;&#1080;&#1090;&#1086;&#1082; &#1082;&#1072;&#1078;&#1076;&#1099;&#1081; &#1080;&#1079; &#1085;&#1072;&#1096;&#1080;&#1093; &#1082;&#1086;&#1084;&#1073;&#1080;&#1085;&#1072;&#1094;&#1080;&#1081; &#1089;&#1086;&#1082;&#1086;&#1074; &#1088;&#1072;&#1079;&#1088;&#1072;&#1073;&#1086;&#1090;&#1072;&#1085;&#1099;, &#1095;&#1090;&#1086;&#1073;&#1099; &#1087;&#1086;&#1084;&#1086;&#1095;&#1100; &#1076;&#1077;&#1090;&#1086;&#1082;&#1089;&#1080;&#1082;&#1072;&#1094;&#1080;&#1080; &#1086;&#1095;&#1080;&#1089;&#1090;&#1080;&#1090;&#1100; &#1091;&#1084; &#1080; &#1090;&#1077;&#1083;&#1086; , &#1080;&#1089;&#1087;&#1086;&#1083;&#1100;&#1079;&#1091;&#1103; &#1089;&#1074;&#1077;&#1078;&#1077;&#1074;&#1099;&#1078;&#1072;&#1090;&#1099;&#1093; &#1086;&#1074;&#1086;&#1097;&#1085;&#1099;&#1093; &#1080; &#1092;&#1088;&#1091;&#1082;&#1090;&#1086;&#1074;&#1099;&#1093; &#1089;&#1086;&#1082;&#1086;&#1074;. &#1052;&#1099; &#1074;&#1077;&#1088;&#1080;&#1084; &#1074; &#1087;&#1088;&#1072;&#1082;&#1090;&#1080;&#1095;&#1077;&#1089;', 'images/buy-now.jpg', '&#1055;&#1056;&#1048;&#1052;&#1045;&#1056; &#1050;&#1059;&#1056;&#1057;&#1040;', 'Lm Ipsum &#1073;&#1086;&#1083;&#1100; &#1089;&#1080;&#1076;&#1077;&#1090;&#1100; &#1040;&#1084;&#1077;&#1090; , consectetur adipiscing &#1069;&#1083;&#1080;&#1090; . Fusce pellentes &#1087;&#1079;&#1080;&#1079; &#1074; enim Porta aliquam aenean &#1074; Felis \r\n', 'images/detox-fruit.jpg', '&#1055;&#1056;&#1048;&#1052;&#1045;&#1056; &#1050;&#1059;&#1056;&#1057;&#1040;', 'Ipsum &#1073;&#1086;&#1083;&#1100; &#1089;&#1080;&#1076;&#1077;&#1090;&#1100; &#1040;&#1084;&#1077;&#1090;\r\n', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_info_faq`
--

CREATE TABLE IF NOT EXISTS `farmhouse_info_faq` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `why_button_name` varchar(25) NOT NULL,
  `why_heading` varchar(225) NOT NULL,
  `why_image` varchar(50) NOT NULL,
  `why_discription` text NOT NULL,
  `how_button_name` varchar(25) NOT NULL,
  `how_heading` varchar(225) NOT NULL,
  `how_image` varchar(50) NOT NULL,
  `how_discription` text NOT NULL,
  `tips_button_name` varchar(25) NOT NULL,
  `tips_heading` varchar(225) NOT NULL,
  `tips_image` varchar(50) NOT NULL,
  `tips_discription` text NOT NULL,
  `story_button_name` varchar(25) NOT NULL,
  `story_heading` varchar(22) NOT NULL,
  `story_image` varchar(50) NOT NULL,
  `story_discription` text NOT NULL,
  `tech_button_name` varchar(25) NOT NULL,
  `tech_heading` varchar(225) NOT NULL,
  `tech_image` varchar(50) NOT NULL,
  `tech_discription` text NOT NULL,
  `countrylang_id` int(6) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `farmhouse_info_faq`
--

INSERT INTO `farmhouse_info_faq` (`trans_id`, `why_button_name`, `why_heading`, `why_image`, `why_discription`, `how_button_name`, `how_heading`, `how_image`, `how_discription`, `tips_button_name`, `tips_heading`, `tips_image`, `tips_discription`, `story_button_name`, `story_heading`, `story_image`, `story_discription`, `tech_button_name`, `tech_heading`, `tech_image`, `tech_discription`, `countrylang_id`) VALUES
(1, 'WHY', 'WHY DO THE FARMHOUSE JUICE CLEANSE?', 'images/why.jpg', 'Because your’re obviously smart and know that the most obvious answer is usually the right one: eating whole, unadulterated food that’s packed with enzymes will allow your body to cleanse itself. And, the only potentially severe side effect of this program is finally fitting into your “skinny” jeans.', 'HOW', 'HOW DOES THE FARMHOUSE JUICE CLEANSE WORK?', 'images/how.jpg', 'As the result of the pollutants in the air we breathe and chemicals in the food and water we consume, the body accumulates “toxins.” Every once in while the body needs to rid itself of these toxins. When the tissues release these materials, they enter into the bloodstream, which is the cause of all those “detox symptoms.” Farmhouse Juice is a NUTRITIONAL Cleanse that is effective in helping the body detoxify itself and move through this “low” or detox cycle faster and with fewer symptoms. Cleansing is recommended for many illnesses, as it gives the body the rest it needs to recover. Take away the work of digesting food, and one allows the system to rid itself of old toxins while facilitating healing. Depending on the length of the Farmhouse Juice Cleanse, it accomplishes different things.', 'TIPS', 'TIPS', 'images/tips.jpg', ' \r\n\r\n1-day Farmhouse Juice Cleanse aids in a quick spark of your system.\r\n3-day Farmhouse Juice Cleanse helps the body rid itself of old built up matter and cleanses the blood.\r\n5-day Farmhouse Juice Cleanse starts the process of rebuilding and healing the immune system.\r\n10-day Farmhouse Juice Cleanse will take care of problems before they arise and fight off degenerative diseases.\r\n \r\n\r\nThis is not A “fast” is something different, our cleanse is a nutritional one. It’s about nourishment, NOT deprivation. Our live juice cleanse both removes toxins and promotes healing simply by supplying the blood with vitamins, minerals and enzymes that one is able to easily assimilate.\r\n\r\nIt took years to wear your body down, and it will take time to build it back up to its prime condition. But it can be done. When you start to feel unwell, cleanse and feel better.', 'STORY', 'SAMPLE HEADING', 'images/story.jpg', 'Whether you are looking to supplement a meal or to just enjoy as a stand alone beverage each of our juice combinations are designed to help detoxifying purify the mind and body,using freshly pressed vegetable and fruit juices. We believe in being practica', 'TECH', 'OUR TECHNOLOGY', 'images/tech.jpg', 'Whether you are looking to supplement a meal or to just enjoy as a stand alone beverage each of our juice combinations are designed to help detoxifying purify the mind and body,using freshly pressed vegetable and fruit juices. We believe in being practica', 1),
(2, '&#28858;&#20160;&#40636;', '&#28858;&#20160;&#40636;&#36786;&#33293;JUICE&#28165;&#27927;&#65311;', 'images/why.jpg', '&#22240;&#28858;&#24744;&#38656;&#35201;&#30340;&#20449;&#24687;&#39023;&#28982;&#32880;&#26126;&#65292;&#30693;&#36947;&#65292;&#26368;&#26126;&#39023;&#30340;&#31572;&#26696;&#36890;&#24120;&#26159;&#27491;&#30906;&#30340;&#65306;&#21507;&#20840;&#65292;&#36889;&#26159;&#25824;&#28415;&#20102;&#37238;&#32020;&#31929;&#30340;&#39135;&#29289;&#21487;&#20197;&#35731;&#20320;&#30340;&#36523;&#39636;&#28165;&#28500;&#26412;&#36523;&#12290;&#32780;&#19988;&#65292;&#36889;&#19968;&#35336;&#21123;&#30340;&#21807;&#19968;&#28507;&#22312;&#30340;&#22196;&#37325;&#30340;&#21103;&#20316;&#29992;&#32066;&#26044;&#35037;&#20462;&#25104;&#20320;&#30340;“&#39592;&#24863;”&#29275;&#20180;&#35122;&#12290;\r\n', '&#24590;&#40636;&#27171;', '&#22914;&#20309;&#36786;&#33293;JUICE&#28165;&#28500;&#24037;&#20316;&#65311;', 'images/how.jpg', '&#30001;&#26044;&#31354;&#27683;&#20013;&#30340;&#27745;&#26579;&#29289;&#65292;&#25105;&#20497;&#21628;&#21560;&#21644;&#21270;&#23416;&#21697;&#22312;&#39135;&#21697;&#21644;&#27700;&#65292;&#25105;&#20497;&#28040;&#32791;&#30340;&#32080;&#26524;&#65292;&#39636;&#20839;&#31309;&#32047;“&#30340;&#27602;&#32032;&#12290; ”&#27599;&#19968;&#27425;&#65292;&#32780;&#36523;&#39636;&#38656;&#35201;&#25850;&#33067;&#36889;&#20123;&#27602;&#32032;&#26412;&#36523;&#12290;&#30070;&#32068;&#32340;&#37323;&#25918;&#36889;&#20123;&#26448;&#26009;&#20013;&#65292;&#23427;&#20497;&#36914;&#20837;&#21040;&#34880;&#27969;&#20013;&#65292;&#36889;&#26159;&#25152;&#26377;&#36889;&#20123;&#30340;&#21407;&#22240;“&#25490;&#27602;&#30151;&#29376;&#12290; ”&#36786;&#23478;&#27713;&#26159;&#19968;&#31278;&#29151;&#39178;&#28136;&#21270;&#33021;&#26377;&#25928;&#22320;&#24171;&#21161;&#36523;&#39636;&#35299;&#27602;&#26412;&#36523;&#21644;&#31227;&#21205;&#36890;&#36942;&#36889;&#20491;“&#20302;”&#25110;&#25490;&#27602;&#36913;&#26399;&#26356;&#24555;&#30340;&#36895;&#24230;&#21644;&#26356;&#23569;&#30340;&#30151;&#29376;&#12290;&#28500;&#38754;&#25512;&#34214;&#29992;&#26044;&#35377;&#22810;&#30142;&#30149;&#65292;&#39135;&#21697;&#65292;&#21644;&#19968;&#20491;&#20801;&#35377;&#31995;&#32113;&#25850;&#33067;&#33290;&#27602;&#32032;&#26412;&#36523;&#65292;&#21516;&#26178;&#20419;&#36914;&#30290;&#21512;&#12290;&#21462;&#27770;&#26044;&#36786;&#23478;&#26524;&#27713;&#28136;&#21270;&#30340;&#38263;&#24230;&#65292;&#23427;&#23526;&#29694;&#19981;&#21516;&#30340;&#20107;&#24773;&#12290;\r\n', '&#23574;', '1&#22825;&#36786;&#33674;&#27713;&#28500;&#38754;&#36628;&#21161;&#24037;&#20855;&#22312;&#24744;&#30340;&#31995;&#32113;&#30340;&#24555;&#36895;&#28779;&#33457;&#12290; &#28858;&#26399;3&#22825;&#30340;&#36786;&#23478;&#2713', 'images/tips.jpg', '&#36523;&#39636;&#25490;&#38500;&#33290;&#24314;&#31435;&#20107;&#20214;&#26412;&#36523;', '&#25925;&#20107;', '&#27171;&#21697;&#3332', 'images/story.jpg', '&#28961;&#35542;&#24744;&#26159;&#24819;&#35036;&#20805;&#19968;&#38931;&#39151;&#65292;&#25110;&#32773;&#21482;&#26159;&#20139;&#21463;&#20316;&#28858;&#19968;&#20491;&#29544;&#31435;&#30340;&#39154;&#26009;&#25105;&#20497;&#27599;&#20491;&#27713;&#32068;&#21512;&#65292;&#26088;&#22312;&#24171;&#21161;&#25490;&#27602;&#28136;&#21270;&#24515;&#38728;&#21644;&#36523;&#39636;&#65292;&#29992;&#39854;&#27048;&#34092;&#33756;&#21644;&#26524;&#27713;&#12290;&#25105;&#20497;&#30456;&#20449;&#65292;&#22312;&#21209;&#23526;&#65292;&#22240;&#27492;&#25105;&#20497;&#24050;&#32147;&#24819;&#20986;&#20102;&#34092;&#33756;&#21917;1.5&#21315;&#20811;&#30340;&#30332;&#21806;&#32773;&#19968;&#20491;&#21451;&#22909;&#30340;&#31995;&#32113;&#65292;&#20006;&#19988;&#36969;&#29992;&#26044;&#25152;&#26377;&#29151;&#39178;&#30340;&#29983;&#27963;&#26041;&#24335;&#12290;&#36786;&#23478;&#27138;&#26524;&#27713;&#35475;&#35328;&#65292;&#35731;&#24744;&#8203;&#8203;&#27599;&#22825;&#30340;&#35370;&#21839;&#24744;&#26368;&#21916;&#24859;&#30340;&#21407;&#26009;&#21644;&#26410;&#32147;&#39640;&#28331;&#28040;&#27602;&#30340;&#26524;&#27713;&#32068;&#21512;&#12290;\r\n', '&#39640;&#31185;&#25216;', '&#25105;&#20497;&#30340;&#25216;&#34899;', 'images/tech.jpg', '&#28961;&#35542;&#24744;&#26159;&#24819;&#35036;&#20805;&#19968;&#38931;&#39151;&#65292;&#25110;&#32773;&#21482;&#26159;&#20139;&#21463;&#20316;&#28858;&#19968;&#20491;&#29544;&#31435;&#30340;&#39154;&#26009;&#25105;&#20497;&#27599;&#20491;&#27713;&#32068;&#21512;&#65292;&#26088;&#22312;&#24171;&#21161;&#25490;&#27602;&#28136;&#21270;&#24515;&#38728;&#21644;&#36523;&#39636;&#65292;&#29992;&#39854;&#27048;&#34092;&#33756;&#21644;&#26524;&#27713;&#12290;&#25105;&#20497;&#30456;&#20449;&#65292;&#22312;&#21209;&#23526;&#65292;&#22240;&#27492;&#25105;&#20497;&#24050;&#32147;&#24819;&#20986;&#20102;&#34092;&#33756;&#21917;1.5&#21315;&#20811;&#30340;&#30332;&#21806;&#32773;&#19968;&#20491;&#21451;&#22909;&#30340;&#31995;&#32113;&#65292;&#20006;&#19988;&#36969;&#29992;&#26044;&#25152;&#26377;&#29151;&#39178;&#30340;&#29983;&#27963;&#26041;&#24335;&#12290;&#36786;&#23478;&#27138;&#26524;&#27713;&#35475;&#35328;&#65292;&#35731;&#24744;&#8203;&#8203;&#27599;&#22825;&#30340;&#35370;&#21839;&#24744;&#26368;&#21916;&#24859;&#30340;&#21407;&#26009;&#21644;&#26410;&#32147;&#39640;&#28331;&#28040;&#27602;&#30340;&#26524;&#27713;&#32068;&#21512;&#12290;\r\n', 2),
(3, '&#1087;&#1086;&#1095;&#10', '&#1055;&#1054;&#1063;&#1045;&#1052;&#1059;&#1044;&#1054;&#1052; &#1057;&#1054;&#1050; &#1086;&#1095;&#1080;&#1089;&#1090;&#1080;&#1090;&#1100; ?', 'images/why.jpg', '&#1055;&#1086;&#1090;&#1086;&#1084;&#1091; &#1095;&#1090;&#1086; &#1074;&#1099; &#1082;&#1072;&#1082; &#1088;&#1072;&#1079; &#1086;&#1095;&#1077;&#1074;&#1080;&#1076;&#1085;&#1086;, &#1091;&#1084;&#1085;&#1099;&#1077; &#1080; &#1079;&#1085;&#1072;&#1102;&#1090; , &#1095;&#1090;&#1086;&#1089;&#1072;&#1084;&#1099;&#1081; &#1086;&#1095;&#1077;&#1074;&#1080;&#1076;&#1085;&#1099;&#1081; &#1086;&#1090;&#1074;&#1077;&#1090; , &#1082;&#1072;&#1082; &#1087;&#1088;&#1072;&#1074;&#1080;&#1083;&#1086;,&#1087;&#1088;&#1072;&#1074;&#1072;&#1103; : &#1077;&#1089;&#1090;&#1100; &#1094;&#1077;&#1083;&#1086;&#1077;, &#1095;&#1080;&#1089;&#1090;&#1077;&#1081;&#1096;&#1080;&#1081; &#1077;&#1076;&#1072;, &#1082;&#1086;&#1090;&#1086;&#1088;&#1091;&#1102; &#1091;&#1087;&#1072;&#1082;&#1086;&#1074;&#1072;&#1085; &#1089; &#1087;&#1086;&#1084;&#1086;&#1097;&#1100;&#1102; &#1092;&#1077;&#1088;&#1084;&#1077;&#1085;&#1090;&#1086;&#1074; &#1087;&#1086;&#1079;&#1074;&#1086;&#1083;&#1080;&#1090; &#1074;&#1072;&#1096;&#1077; &#1090;&#1077;&#1083;&#1086;, &#1095;&#1090;&#1086;&#1073;&#1099; &#1086;&#1095;&#1080;&#1089;&#1090;&#1080;&#1090;&#1100; &#1089;&#1077;&#1073;&#1103; . &#1048;,&#1090;&#1086;&#1083;&#1100;&#1082;&#1086; &#1087;&#1086;&#1090;&#1077;&#1085;&#1094;&#1080;&#1072;&#1083;&#1100;&#1085;&#1086; &#1089;&#1077;&#1088;&#1100;&#1077;&#1079;&#1085;&#1099;&#1084; &#1087;&#1086;&#1073;&#1086;&#1095;&#1085;&#1099;&#1084; &#1101;&#1092;&#1092;&#1077;&#1082;&#1090;&#1086;&#1084; &#1101;&#1090;&#1086;&#1081; &#1087;&#1088;&#1086;&#1075;&#1088;&#1072;&#1084;&#1084;&#1099; , &#1085;&#1072;&#1082;&#1086;&#1085;&#1077;&#1094;, &#1074;&#1087;&#1080;&#1089;&#1099;&#1074;&#1072;&#1077;&#1090;&#1089;&#1103; &#1074; &#1074;&#1072;&#1096; " &#1091;&#1079;&#1082;&#1080;&#1077; " &#1076;&#1078;&#1080;&#1085;&#1089;&#1099;.\r\n', '&#1082;&#1072;&#1082;', '&#1050;&#1072;&#1082;&#1080;&#1084; &#1086;&#1073;&#1088;&#1072;&#1079;&#1086;&#1084; &#1044;&#1054;&#1052; &#1057;&#1054;&#1050; &#1086;&#1095;&#1080;&#1089;&#1090;&#1080;&#1090;&#1100; &#1088;&#1072;&#1073;&#1086;&#1090;&#1', 'images/how.jpg', '&#1042; &#1088;&#1077;&#1079;&#1091;&#1083;&#1100;&#1090;&#1072;&#1090;&#1077; &#1079;&#1072;&#1075;&#1088;&#1103;&#1079;&#1085;&#1103;&#1102;&#1097;&#1080;&#1093; &#1074;&#1077;&#1097;&#1077;&#1089;&#1090;&#1074; &#1074; &#1074;&#1086;&#1079;&#1076;&#1091;&#1093;&#1077;, &#1082;&#1086;&#1090;&#1086;&#1088;&#1099;&#1084; &#1084;&#1099; &#1076;&#1099;&#1096;&#1080;&#1084;, &#1080; &#1093;&#1080;&#1084;&#1080;&#1095;&#1077;&#1089;&#1082;&#1080;&#1093; &#1074;&#1077;&#1097;&#1077;&#1089;&#1090;&#1074; &#1074; &#1087;&#1080;&#1097;&#1077; &#1080; &#1074;&#1086;&#1076;&#1077; , &#1082;&#1086;&#1090;&#1086;&#1088;&#1091;&#1102; &#1084;&#1099; &#1087;&#1086;&#1090;&#1088;&#1077;&#1073;&#1083;&#1103;&#1077;&#1084; ,&#1086;&#1088;&#1075;&#1072;&#1085;&#1080;&#1079;&#1084; &#1085;&#1072;&#1082;&#1072;&#1087;&#1083;&#1080;&#1074;&#1072;&#1077;&#1090; " &#1090;&#1086;&#1082;&#1089;&#1080;&#1085;&#1099; ". &#1050;&#1072;&#1078;&#1076;&#1099;&#1081; &#1088;&#1072;&#1079; &#1074; &#1090;&#1086; &#1074;&#1088;&#1077;&#1084;&#1103;&#1086;&#1088;&#1075;&#1072;&#1085;&#1080;&#1079;&#1084; &#1085;&#1091;&#1078;&#1076;&#1072;&#1077;&#1090;&#1089;&#1103; , &#1095;&#1090;&#1086;&#1073;&#1099; &#1080;&#1079;&#1073;&#1072;&#1074;&#1080;&#1090;&#1100;&#1089;&#1103; &#1086;&#1090; &#1101;&#1090;&#1080;&#1093; &#1090;&#1086;&#1082;&#1089;&#1080;&#1085;&#1086;&#1074; . &#1050;&#1086;&#1075;&#1076;&#1072; &#1090;&#1082;&#1072;&#1085;&#1080; &#1086;&#1089;&#1074;&#1086;&#1073;&#1086;&#1076;&#1080;&#1090;&#1100; &#1101;&#1090;&#1080; &#1084;&#1072;&#1090;&#1077;&#1088;&#1080;&#1072;&#1083;&#1099; , &#1086;&#1085;&#1080; &#1074;&#1093;&#1086;&#1076;&#1103;&#1090; &#1074; &#1082;&#1088;&#1086;&#1074;&#1100; , &#1095;&#1090;&#1086; &#1080; &#1103;&#1074;&#1083;&#1103;&#1077;&#1090;&#1089;&#1103; &#1087;&#1088;&#1080;&#1095;&#1080;&#1085;&#1086;&#1081; &#1074;&#1089;&#1077;&#1093; &#1101;&#1090;&#1080;&#1093; "&#1089;&#1080;&#1084;&#1087;&#1090;&#1086;&#1084;&#1086;&#1074; &#1076;&#1077;&#1090;&#1086;&#1082;&#1089;&#1080;&#1082;&#1072;&#1094;&#1080;&#1080; . " &#1044;&#1086;&#1084; &#1057;&#1086;&#1082;&#1055;&#1080;&#1097;&#1077;&#1074;&#1072;&#1103; &#1086;&#1095;&#1080;&#1089;&#1090;&#1080;&#1090;&#1100; , &#1082;&#1086;&#1090;&#1086;&#1088;&#1086;&#1077; &#1103;&#1074;&#1083;&#1103;&#1077;&#1090;&#1089;&#1103; &#1101;&#1092;&#1092;&#1077;&#1082;&#1090;&#1080;&#1074;&#1085;&#1099;&#1084; &#1074; &#1087;&#1086;&#1084;&#1086;&#1097;&#1080;&#1090;&#1077;&#1083;&#1072; &#1076;&#1077;&#1090;&#1086;&#1082;&#1089;&#1080;&#1082;&#1072;&#1094;&#1080;&#1080; &#1089;&#1072;&#1084;&#1086;&#1075;&#1086; &#1089;&#1077;&#1073;&#1103; &#1080; &#1076;&#1074;&#1080;&#1075;&#1072;&#1090;&#1100;&#1089;&#1103; &#1095;&#1077;&#1088;&#1077;&#1079; &#1101;&#1090;&#1086; " &#1085;&#1080;&#1079;&#1082;&#1080;&#1081;" &#1080;&#1083;&#1080; &#1076;&#1077;&#1090;&#1086;&#1082;&#1089;&#1080;&#1082;&#1072;&#1094;&#1080;&#1080; &#1094;&#1080;&#1082;&#1083;&#1072; &#1073;&#1099;&#1089;&#1090;&#1088;&#1077;&#1077; &#1080; &#1089; &#1084;&#1077;&#1085;&#1100;&#1096;&#1080;&#1084; &#1082;&#1086;&#1083;&#1080;&#1095;&#1077;&#1089;&#1090;&#1074;&#1086;&#1084; &#1089;&#1080;&#1084;&#1087;&#1090;&#1086;&#1084;&#1086;&#1074; . &#1054;&#1095;&#1080;&#1097;&#1077;&#1085;&#1080;&#1077; &#1088;&#1077;&#1082;&#1086;&#1084;&#1077;&#1085;&#1076;&#1091;&#1077;&#1090;&#1089;&#1103; &#1076;&#1083;&#1103; &#1084;&#1085;&#1086;&#1075;&#1080;&#1093; &#1073;&#1086;&#1083;&#1077;&#1079;&#1085;&#1077;&#1081; , &#1090;&#1072;&#1082; &#1082;&#1072;&#1082; &#1086;&#1085;&#1072; &#1076;&#1072;&#1077;&#1090; &#1086;&#1088;&#1075;&#1072;&#1085;&#1080;&#1079;&#1084;&#1091;&#1086;&#1090;&#1076;&#1099;&#1093;&#1072; &#1086;&#1085; &#1076;&#1086;&#1083;&#1078;&#1077;&#1085; &#1074;&#1086;&#1089;&#1089;&#1090;&#1072;&#1085;&#1086;&#1074;&#1080;&#1090;&#1100;&#1089;&#1103;. &#1047;&#1072;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1088;&#1072;&#1073;&#1086;&#1090;&#1091; &#1087;&#1077;&#1088;&#1077;&#1074;&#1072;&#1088;&#1080;&#1074;&#1072;&#1085;&#1080;&#1103; &#1087;&#1080;&#1097;&#1080; , &#1080; &#1086;&#1076;&#1080;&#1085; &#1087;&#1086;&#1079;&#1074;&#1086;&#1083;&#1103;&#1077;&#1090; &#1089;&#1080;&#1089;&#1090;&#1077;&#1084;&#1077; , &#1095;&#1090;&#1086;&#1073;&#1099; &#1080;&#1079;&#1073;&#1072;&#1074;&#1080;&#1090;&#1100;&#1089;&#1103; &#1086;&#1090; &#1089;&#1090;&#1072;&#1088;&#1099;&#1093; &#1090;&#1086;&#1082;&#1089;&#1080;&#1085;&#1086;&#1074; &#1087;&#1088;&#1080; &#1086;&#1073;&#1083;&#1077;&#1075;&#1095;&#1077;&#1085;&#1080;&#1080; &#1080;&#1089;&#1094;&#1077;&#1083;&#1077;&#1085;&#1080;&#1077;. &#1042; &#1079;&#1072;&#1074;&#1080;&#1089;&#1080;&#1084;&#1086;&#1089;&#1090;&#1080; &#1086;&#1090; &#1076;&#1083;&#1080;&#1085;&#1099; &#1089;&#1086;&#1082;&#1072; &#1086;&#1095;&#1080;&#1089;&#1090;&#1080;&#1090;&#1100; &#1076;&#1086;&#1084;, &#1086;&#1085; &#1074;&#1099;&#1087;&#1086;&#1083;&#1085;&#1103;&#1077;&#1090; &#1088;&#1072;&#1079;&#1085;&#1099;&#1077; &#1074;&#1077;&#1097;&#1080;.\r\n', '&#1055;&#1054;&#1063;&#10', '&#1055;&#1054;&#1063;&#1045;&#1052;', 'images/tips.jpg', '1 &#1076;&#1077;&#1085;&#1100; &#1040;&#1075;&#1088;&#1086;&#1090;&#1091;&#1088;&#1080;&#1079;&#1084; &#1089;&#1086;&#1082; &#1054;&#1095;&#1080;&#1089;&#1090;&#1080; &#1087;&#1086;&#1084;&#1086;&#1075;&#1072;&#1077;&#1090; &#1074; &#1073;&#1099;&#1089;&#1090;&#1088;&#1086;&#1081; &#1080;&#1089;&#1082;&#1088;&#1099; &#1074;&#1072;&#1096;&#1077;&#1081; &#1089;&#1080;&#1089;&#1090;&#1077;&#1084;&#1099;.\r\n3 -&#1076;&#1085;&#1077;&#1074;&#1085;&#1099;&#1081; &#1040;&#1075;&#1088;&#1086;&#1090;&#1091;&#1088;&#1080;&#1079;&#1084; &#1089;&#1086;&#1082; &#1086;&#1095;&#1080;&#1097;&#1072;&#1077;&#1090; &#1087;&#1086;&#1084;&#1086;&#1075;&#1072;&#1077;&#1090;&#1086;&#1088;&#1075;&#1072;&#1085;&#1080;&#1079;&#1084;&#1091; &#1080;&#1079;&#1073;&#1072;&#1074;&#1080;&#1090;&#1100;&#1089;&#1103; &#1086;&#1090; &#1089;&#1090;&#1072;&#1088;&#1086;&#1081; &#1079;&#1072;&#1089;&#1090;&#1088;&#1086;&#1077;&#1085;&#1085;&#1086;&#1081; &#1084;&#1072;&#1090;&#1077;&#1088;&#1080;&#1080; &#1080; &#1086;&#1095;&#1080;&#1097;&#1072;&#1077;&#1090; &#1082;&#1088;&#1086;&#1074;&#1100;.\r\n5 -&#1076;&#1085;&#1077;&#1074;&#1085;&#1099;&#1081; &#1040;&#1075;&#1088;&#1086;&#1090;&#1091;&#1088;&#1080;&#1079;&#1084; &#1089;&#1086;&#1082; &#1086;&#1095;&#1080;&#1097;&#1072;&#1077;&#1090; &#1085;&#1072;&#1095;&#1080;&#1085;&#1072;&#1077;&#1090;&#1089;&#1103; &#1087;&#1088;&#1086;&#1094;&#1077;&#1089;&#1089; &#1074;&#1086;&#1089;&#1089;&#1090;&#1072;&#1085;&#1086;&#1074;&#1083;&#1077;&#1085;&#1080;&#1103; &#1080; &#1079;&#1072;&#1078;&#1080;&#1074;&#1083;&#1077;&#1085;&#1080;&#1103; &#1080;&#1084;&#1084;&#1091;&#1085;&#1085;&#1091;&#1102; &#1089;&#1080;&#1089;&#1090;&#1077;&#1084;&#1091;.\r\n10 -&#1076;&#1085;&#1077;&#1074;&#1085;&#1072;&#1103; &#1040;&#1075;&#1088;&#1086;&#1090;&#1091;&#1088;&#1080;&#1079;&#1084; &#1057;&#1086;&#1082; Cleanse &#1073;&#1091;&#1076;&#1077;&#1090; &#1079;&#1072;&#1073;&#1086;&#1090;&#1080;&#1090;&#1100;&#1089;&#1103; &#1086; &#1087;&#1088;&#1086;&#1073;&#1083;&#1077;&#1084;&#1072;&#1093; &#1076;&#1086; &#1080;&#1093; &#1074;&#1086;&#1079;&#1085;&#1080;&#1082;&#1085;&#1086;&#1074;&#1077;&#1085;&#1080;&#1103; &#1080; &#1073;&#1086;&#1088;&#1086;&#1090;&#1100;&#1089;&#1103; &#1089; &#1076;&#1077;&#1075;&#1077;&#1085;&#1077;&#1088;&#1072;&#1090;&#1080;&#1074;&#1085;&#1099;&#1084;&#1080; &#1079;&#1072;&#1073;&#1086;&#1083;&#1077;&#1074;&#1072;&#1085;&#1080;&#1103;&#1084;&#1080; .\r\n\r\n', '&#1080;&#1089;&#1090;&#10', '&#1055;&#1056;&#1048;&', 'images/story.jpg', '&#1045;&#1089;&#1083;&#1080; &#1074;&#1099; &#1080;&#1097;&#1077;&#1090;&#1077; , &#1095;&#1090;&#1086;&#1073;&#1099; &#1076;&#1086;&#1087;&#1086;&#1083;&#1085;&#1080;&#1090;&#1100; &#1090;&#1088;&#1072;&#1087;&#1077;&#1079;&#1091; &#1080;&#1083;&#1080; &#1087;&#1088;&#1086;&#1089;&#1090;&#1086; &#1085;&#1072;&#1089;&#1083;&#1072;&#1078;&#1076;&#1072;&#1090;&#1100;&#1089;&#1103; &#1082;&#1072;&#1082; &#1089;&#1072;&#1084;&#1086;&#1089;&#1090;&#1086;&#1103;&#1090;&#1077;&#1083;&#1100;&#1085;&#1099;&#1081; &#1085;&#1072;&#1087;&#1080;&#1090;&#1086;&#1082; &#1082;&#1072;&#1078;&#1076;&#1099;&#1081; &#1080;&#1079; &#1085;&#1072;&#1096;&#1080;&#1093; &#1082;&#1086;&#1084;&#1073;&#1080;&#1085;&#1072;&#1094;&#1080;&#1081; &#1089;&#1086;&#1082;&#1086;&#1074; &#1088;&#1072;&#1079;&#1088;&#1072;&#1073;&#1086;&#1090;&#1072;&#1085;&#1099;, &#1095;&#1090;&#1086;&#1073;&#1099; &#1087;&#1086;&#1084;&#1086;&#1095;&#1100; &#1076;&#1077;&#1090;&#1086;&#1082;&#1089;&#1080;&#1082;&#1072;&#1094;&#1080;&#1080; &#1086;&#1095;&#1080;&#1089;&#1090;&#1080;&#1090;&#1100; &#1091;&#1084; &#1080; &#1090;&#1077;&#1083;&#1086; , &#1080;&#1089;&#1087;&#1086;&#1083;&#1100;&#1079;&#1091;&#1103; &#1089;&#1074;&#1077;&#1078;&#1077;&#1074;&#1099;&#1078;&#1072;&#1090;&#1099;&#1093; &#1086;&#1074;&#1086;&#1097;&#1085;&#1099;&#1093; &#1080; &#1092;&#1088;&#1091;&#1082;&#1090;&#1086;&#1074;&#1099;&#1093; &#1089;&#1086;&#1082;&#1086;&#1074;. &#1052;&#1099; &#1074;&#1077;&#1088;&#1080;&#1084; &#1074; &#1087;&#1088;&#1072;&#1082;&#1090;&#1080;&#1095;&#1077;&#1089;', '&#1090;&#1077;&#1093;&#10', '&#1053;&#1072;&#1096;&#1072; &#1090;&#1077;&#1093;&#1085;&#1086;&#1083;&#1086;&#1075;&#1080;&#1103;', 'images/tech.jpg', '&#1045;&#1089;&#1083;&#1080; &#1074;&#1099; &#1080;&#1097;&#1077;&#1090;&#1077; , &#1095;&#1090;&#1086;&#1073;&#1099; &#1076;&#1086;&#1087;&#1086;&#1083;&#1085;&#1080;&#1090;&#1100; &#1090;&#1088;&#1072;&#1087;&#1077;&#1079;&#1091; &#1080;&#1083;&#1080; &#1087;&#1088;&#1086;&#1089;&#1090;&#1086; &#1085;&#1072;&#1089;&#1083;&#1072;&#1078;&#1076;&#1072;&#1090;&#1100;&#1089;&#1103; &#1082;&#1072;&#1082; &#1089;&#1072;&#1084;&#1086;&#1089;&#1090;&#1086;&#1103;&#1090;&#1077;&#1083;&#1100;&#1085;&#1099;&#1081; &#1085;&#1072;&#1087;&#1080;&#1090;&#1086;&#1082; &#1082;&#1072;&#1078;&#1076;&#1099;&#1081; &#1080;&#1079; &#1085;&#1072;&#1096;&#1080;&#1093; &#1082;&#1086;&#1084;&#1073;&#1080;&#1085;&#1072;&#1094;&#1080;&#1081; &#1089;&#1086;&#1082;&#1086;&#1074; &#1088;&#1072;&#1079;&#1088;&#1072;&#1073;&#1086;&#1090;&#1072;&#1085;&#1099;, &#1095;&#1090;&#1086;&#1073;&#1099; &#1087;&#1086;&#1084;&#1086;&#1095;&#1100; &#1076;&#1077;&#1090;&#1086;&#1082;&#1089;&#1080;&#1082;&#1072;&#1094;&#1080;&#1080; &#1086;&#1095;&#1080;&#1089;&#1090;&#1080;&#1090;&#1100; &#1091;&#1084; &#1080; &#1090;&#1077;&#1083;&#1086; , &#1080;&#1089;&#1087;&#1086;&#1083;&#1100;&#1079;&#1091;&#1103; &#1089;&#1074;&#1077;&#1078;&#1077;&#1074;&#1099;&#1078;&#1072;&#1090;&#1099;&#1093; &#1086;&#1074;&#1086;&#1097;&#1085;&#1099;&#1093; &#1080; &#1092;&#1088;&#1091;&#1082;&#1090;&#1086;&#1074;&#1099;&#1093; &#1089;&#1086;&#1082;&#1086;&#1074;. &#1052;&#1099; &#1074;&#1077;&#1088;&#1080;&#1084; &#1074; &#1087;&#1088;&#1072;&#1082;&#1090;&#1080;&#1095;&#1077;&#1089;', 3);

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_juice_details`
--

CREATE TABLE IF NOT EXISTS `farmhouse_juice_details` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `quantity` int(4) NOT NULL DEFAULT '1',
  `image` varchar(255) DEFAULT NULL,
  `price` decimal(15,0) NOT NULL DEFAULT '0',
  `weight` decimal(15,0) NOT NULL DEFAULT '0',
  `ingredients` text NOT NULL,
  `benifits` text NOT NULL,
  `nutritional_content` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `image2` varchar(255) NOT NULL,
  `product_type` varchar(25) NOT NULL,
  `countrylang_id` int(6) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `discription` text NOT NULL,
  `name_lang` varchar(25) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `farmhouse_juice_details`
--

INSERT INTO `farmhouse_juice_details` (`trans_id`, `product_id`, `name`, `quantity`, `image`, `price`, `weight`, `ingredients`, `benifits`, `nutritional_content`, `status`, `date_added`, `date_modified`, `image2`, `product_type`, `countrylang_id`, `heading`, `discription`, `name_lang`) VALUES
(1, 1, 'GREEN ELIXIR', 0, 'double-big-bottle-1.jpg', '30', '500', 'kale,spinach,romaine,parsley,celery,cucumber,apple,ginger,lemon', 'detox,cleanse,nourish', 'Multivitamins,Antioxidants\r\n', 0, '2015-03-19 00:00:00', '0000-00-00 00:00:00', 'single-big2-bottle-1.jpg', 'juice', 1, '', '', 'GREEN ELIXIR'),
(2, 2, 'INTERNAL FIX', 0, 'double-big-bottle-2.jpg', '31', '500', 'pineapple,apple,mint\r\n', 'detox,cleanse,nourish', 'Multivitamins,Antioxidants', 0, '2015-03-19 00:00:00', '0000-00-00 00:00:00', 'single-big2-bottle-2.jpg', 'juice', 1, '', '', 'INTERNAL FIX'),
(3, 3, 'BEAUTY GLOW', 0, 'double-big-bottle-3.jpg', '32', '500', 'apple,cucumber,celery,lime,ginger\r\n', 'detox,cleanse,nourish', 'Multivitamins,Antioxidants\r\n', 0, '2015-03-19 00:00:00', '0000-00-00 00:00:00', 'single-big2-bottle-3.jpg', 'juice', 1, '', '', 'BEAUTY GLOW'),
(4, 4, 'SPICY LEMONADE', 0, 'double-big-bottle-4.jpg', '33', '500', 'green kumquart,lime,lemon,ginger,agave nectar\r\n', 'detox,cleanse,nourish', 'Multivitamins,Antioxidants', 0, '2015-03-19 00:00:00', '0000-00-00 00:00:00', 'single-big2-bottle-4.jpg', 'juice', 1, '', '', 'SPICY LEMONADE'),
(5, 5, 'BEET IT', 0, 'double-big-bottle-5.jpg', '34', '500', 'beet,carrot,apple,ginger,lemon\r\n', 'detox,cleanse,nourish', 'Multivitamins,Antioxidants\r\n', 0, '2015-03-19 00:00:00', '0000-00-00 00:00:00', 'single-big2-bottle-5.jpg', 'juice', 1, '', '', 'BEET IT'),
(6, 6, 'HORCHATA', 0, 'double-big-bottle-6.jpg', '35', '500', 'cashew milk,vanilla specks,cinnamon,agave nectar\r\n', 'detox,cleanse,nourish', 'Multivitamins,Antioxidants', 0, '2015-03-19 00:00:00', '0000-00-00 00:00:00', 'single-big2-bottle-6.jpg', 'juice', 1, '', '', 'HORCHATA'),
(7, 7, 'AMINO HYDRATE', 0, 'double-big-bottle-7.jpg', '40', '500', 'coconut water,chia seeds\r\n', 'detox,cleanse,nourish', 'Multivitamins,Antioxidants', 0, '2015-03-19 00:00:00', '0000-00-00 00:00:00', 'single-bottle-rotated-7.png', 'hydration', 1, '', '', 'AMINO HYDRATE'),
(8, 8, 'THE REHYDRATOR', 0, 'double-big-bottle-8.jpg', '45', '5', 'young thai,coconut water', 'detox,cleanse,nourish', 'Multivitamins,Antioxidants', 0, '2015-03-19 00:00:00', '0000-00-00 00:00:00', 'single-bottle-rotated-8.png', 'hydration', 1, '', '', 'THE REHYDRATOR'),
(13, 1, '&#32511;&#33394;&#33647;', 0, 'double-big-bottle-1.jpg', '30', '500', '&#32701;&#34915;&#29976;&#34013;,&#33760;&#33756;,&#29983;&#33756;,&#39321;&#33756;,&#33465;&#33756;,&#40644;&#29916;,&#33529;&#26524;,&#29983;&#23004;,&#26592;&#27308;', '&#25490;&#27602;,&#20928;&#21270;,&#28363;&#20859;', '&#22810;&#31181;&#32500;&#29983;&#32032;,&#25239;&#27687;&#21270;&#21058;', 0, '2015-03-20 00:00:00', '0000-00-00 00:00:00', 'single-big2-bottle-1.jpg', 'juice', 2, '', '', 'GREEN ELIXIR'),
(14, 2, '&#20869;&#37096;&#19977;&', 0, 'double-big-bottle-2.jpg', '31', '500', '&#33760;&#33821;,&#33529;&#26524;,&#34180;&#33655;\r\n', '&#25490;&#27602;&#65292;&#20928;&#21270;&#65292;&#28363;&#20859;\r\n', '&#22810;&#31181;&#32500;&#29983;&#32032;&#65292;&#25239;&#27687;&#21270;&#21058;\r\n', 0, '2015-03-20 00:00:00', '0000-00-00 00:00:00', 'single-big2-bottle-2.jpg', 'juice', 2, '', '', 'INTERNAL FIX'),
(15, 3, '&#32654;&#22899;&#21457;&', 0, 'double-big-bottle-3.jpg', '32', '500', '&#33529;&#26524;,&#40644;&#29916;,&#33465;&#33756;,&#37240;&#27225;,&#23004;\r\n', '&#25490;&#27602;,&#20928;&#21270;,&#28363;&#20859;\r\n', '&#22810;&#31181;&#32500;&#29983;&#32032;,&#25239;&#27687;&#21270;&#21058;\r\n', 0, '2015-03-20 00:00:00', '0000-00-00 00:00:00', 'single-big2-bottle-3.jpg', 'juice', 2, '', '', 'BEAUTY GLOW'),
(16, 4, '&#36771;&#26592;&#27308;&', 0, 'double-big-bottle-4.jpg', '33', '500', '&#32511;&#33394;,&#32511;&#29748;,&#37240;&#27225;,&#26592;&#27308;	&#23004;,&#40857;&#33292;&#20848;&#33457;&#34588;\r\n', '&#25490;&#27602;,&#20928;&#21270;,&#28363;&#20859;\r\n', '&#22810;&#31181;&#32500;&#29983;&#32032;,&#25239;&#27687;&#21270;&#21058;\r\n', 0, '2015-03-20 00:00:00', '0000-00-00 00:00:00', 'single-big2-bottle-4.jpg', 'juice', 2, '', '', 'SPICY LEMONADE'),
(17, 5, '&#29980;&#33756;', 0, 'double-big-bottle-5.jpg', '34', '500', '&#29980;&#33756;,&#32993;&#33821;&#21340;,&#33529;&#26524;,&#23004;,&#26592;&#27308;\r\n', '&#25490;&#27602;,&#20928;&#21270;,&#28363;&#20859;\r\n', '&#22810;&#31181;&#32500;&#29983;&#32032;,&#25239;&#27687;&#21270;&#21058;\r\n', 0, '2015-03-20 00:00:00', '0000-00-00 00:00:00', 'single-big2-bottle-5.jpg', 'juice', 2, '', '', 'BEET IT'),
(18, 6, '&#27431;&#27965;&#22612;', 0, 'double-big-bottle-6.jpg', '35', '500', '&#33136;&#26524;&#22902;,&#39321;&#33609;&#26001;&#28857;,&#32905;&#26690;,&#40857;&#33292;&#20848;&#33457;&#34588;\r\n', '&#25490;&#27602;,&#20928;&#21270;,&#28363;&#20859;\r\n', '&#22810;&#31181;&#32500;&#29983;&#32032;,&#25239;&#27687;&#21270;&#21058;\r\n', 0, '2015-03-20 00:00:00', '0000-00-00 00:00:00', 'single-big-bottle-6.jpg', 'juice', 2, '', '', 'HORCHATA'),
(19, 7, '&#27688;&#22522;&#27700;&', 0, 'double-big-bottle-7.jpg', '40', '500', '&#26928;&#23376;&#27700;,&#22025;&#31181;&#23376;\r\n', '&#25490;&#27602;,&#20928;&#21270;,&#28363;&#20859;\r\n', '&#22810;&#31181;&#32500;&#29983;&#32032;,&#25239;&#27687;&#21270;&#21058;\r\n', 0, '2015-03-20 00:00:00', '0000-00-00 00:00:00', 'single-bottle-rotated-7.png', 'hydration', 2, '', '', 'AMINO HYDRATE'),
(20, 8, '&#20877;&#27700;&#21270;', 0, 'double-big-bottle-8.jpg', '45', '500', '&#24180;&#36731;&#30340;&#27888;&#22269;,&#26928;&#23376;&#27700;\r\n', '&#25490;&#27602;,&#20928;&#21270;,&#28363;&#20859;\r\n', '&#22810;&#31181;&#32500;&#29983;&#32032;,&#25239;&#27687;&#21270;&#21058;\r\n', 0, '2015-03-20 00:00:00', '0000-00-00 00:00:00', 'single-bottle-rotated-8.png', 'hydration', 2, '', '', 'THE REHYDRATOR'),
(21, 8, '&#20877;&#27700;&#21270;', 0, 'double-big-bottle-8.jpg', '45', '500', '&#24180;&#36731;&#30340;&#27888;&#22269;,&#26928;&#23376;&#27700;\r\n', '&#25490;&#27602;,&#20928;&#21270;,&#28363;&#20859;\r\n', '&#22810;&#31181;&#32500;&#29983;&#32032;,&#25239;&#27687;&#21270;&#21058;\r\n', 0, '2015-03-20 00:00:00', '0000-00-00 00:00:00', 'single-bottle-rotated-8.png', 'hydration', 2, '', '', 'THE REHYDRATOR');

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_lifestyle_program`
--

CREATE TABLE IF NOT EXISTS `farmhouse_lifestyle_program` (
  `lifestyle_id` int(11) NOT NULL AUTO_INCREMENT,
  `lifestyle_name` varchar(50) NOT NULL,
  `lifestyle_items` text NOT NULL,
  `lifestyle_items_id` text NOT NULL,
  `lifestyle_price` decimal(11,0) NOT NULL,
  `title_1` varchar(100) NOT NULL,
  `discription_1` text NOT NULL,
  `ip` varchar(40) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_cahnged` datetime NOT NULL,
  `countrylang_id` varchar(6) NOT NULL,
  PRIMARY KEY (`lifestyle_id`,`lifestyle_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `farmhouse_lifestyle_program`
--

INSERT INTO `farmhouse_lifestyle_program` (`lifestyle_id`, `lifestyle_name`, `lifestyle_items`, `lifestyle_items_id`, `lifestyle_price`, `title_1`, `discription_1`, `ip`, `date_added`, `date_cahnged`, `countrylang_id`) VALUES
(9, 'Beauty', 'GREEN ELIXIR,INTERNAL FIX,BEAUTY GLOW,SPICY LEMONADE,BEET IT,HORCHATA', '1,2,3,4,5,6', '195', 'Beauty', 'Beauty', '127.0.0.1', '2015-03-20 00:00:00', '0000-00-00 00:00:00', '1'),
(11, '&#32654;&#22899;', ' \r\n&#32511;&#33394;&#33647;&#21058;,&#20869;&#22266;&#23450;&#65292;&#32654;&#23481;&#28949;&#21457;,&#36771;&#26592;&#27308;&#27700;,&#29980;&#33756;IT,&#27431;&#27965;&#22612;', '1,2,3,4,5,6', '195', '&#32654;&#22899;', '&#32654;&#22899;', '127.0.0.1', '2015-03-20 00:00:00', '0000-00-00 00:00:00', '2');

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_lifestyle_program_items`
--

CREATE TABLE IF NOT EXISTS `farmhouse_lifestyle_program_items` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `program_id` int(11) NOT NULL,
  `program_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_menu`
--

CREATE TABLE IF NOT EXISTS `farmhouse_menu` (
  `trans_id` int(6) NOT NULL AUTO_INCREMENT,
  `menu_name1` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `menu_name2` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `menu_name3` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `menu_name4` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `menu_name5` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `menu_name6` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `menu_name7` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `menu_name8` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `menu_name9` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `menu_name10` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `menu_name11` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `menu_name12` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `menu_name13` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `menu_name14` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `menu_name15` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `menu_link1` varchar(255) DEFAULT NULL,
  `menu_link2` varchar(255) DEFAULT NULL,
  `menu_link3` varchar(255) DEFAULT NULL,
  `menu_link4` varchar(255) DEFAULT NULL,
  `menu_link5` varchar(255) DEFAULT NULL,
  `menu_link6` varchar(255) DEFAULT NULL,
  `menu_link7` varchar(255) DEFAULT NULL,
  `menu_link8` varchar(255) DEFAULT NULL,
  `menu_link9` varchar(255) DEFAULT NULL,
  `menu_link10` varchar(255) DEFAULT NULL,
  `menu_link11` varchar(255) DEFAULT NULL,
  `menu_link12` varchar(255) DEFAULT NULL,
  `menu_link13` varchar(255) DEFAULT NULL,
  `menu_link14` varchar(255) DEFAULT NULL,
  `menu_link15` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `countrylang_id` int(6) NOT NULL,
  PRIMARY KEY (`trans_id`,`menu_name1`,`menu_name2`,`menu_name3`,`menu_name4`,`menu_name5`,`menu_name6`,`menu_name7`,`menu_name8`,`menu_name9`,`menu_name10`,`menu_name11`,`menu_name12`,`menu_name13`,`menu_name14`,`menu_name15`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `farmhouse_menu`
--

INSERT INTO `farmhouse_menu` (`trans_id`, `menu_name1`, `menu_name2`, `menu_name3`, `menu_name4`, `menu_name5`, `menu_name6`, `menu_name7`, `menu_name8`, `menu_name9`, `menu_name10`, `menu_name11`, `menu_name12`, `menu_name13`, `menu_name14`, `menu_name15`, `menu_link1`, `menu_link2`, `menu_link3`, `menu_link4`, `menu_link5`, `menu_link6`, `menu_link7`, `menu_link8`, `menu_link9`, `menu_link10`, `menu_link11`, `menu_link12`, `menu_link13`, `menu_link14`, `menu_link15`, `status`, `countrylang_id`) VALUES
(1, 'JUICE', 'FARMHOUSE LIFESTYLE', 'DETOX', ' INFO AND F.A.Q', ' LOGIN ', ' SIGN UP', 'VIEW ORDERS', 'RECHEDULE ORDER', 'LOGOUT', '', '', '', '', '', '', 'jucie.php', 'lifestyle.php', 'detox.php', 'info.php', 'front.php', 'signup.php', 'view_order_details.php', 'edit_order_details.php', 'logout.php', '', '', '', '', '', '', 0, 1),
(2, '&#26524;&#27713;', '&#36786;&#33674;&#29983;&', '&#25490;&#27602;', '&#20449;&#24687;&#21644;&', '&#30331;&#37636;', '&#22577;&#21517;', '&#26597;&#30475;&#35330;&', '&#37325;&#26032;&#23433;&', '&#35387;&#37559;', '', '', '', '', '', '', 'jucie.php', 'lifestyle.php', 'detox.php', 'info.php', 'front.php', 'signup.php', 'view_order_details.php', 'edit_order_details.php', 'logout.php', '', '', '', '', '', '', 0, 2),
(3, '&#1089;&#1086;&#1082;', '&#1044;&#1054;&#1052; &#1', '&#1044;&#1077;&#1090;&#10', '&#1080;&#1085;&#1092;&#10', '&#1047;&#1040;&#1051;&#10', '&#1047;&#1040;&#1056;&#10', '&#1052;&#1086;&#1080; &#1', '&#1087;&#1077;&#1088;&#10', '&#1042;&#1067;&#1061;&#10', '', '', '', '', '', '', 'jucie.php', 'lifestyle.php', 'detox.php', 'info.php', 'front.php', 'signup.php', 'view_order_details.php', 'edit_order_details.php', 'logout.php', '', '', '', '', '', '', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_no_detox`
--

CREATE TABLE IF NOT EXISTS `farmhouse_no_detox` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `no_detox` int(5) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `farmhouse_no_detox`
--

INSERT INTO `farmhouse_no_detox` (`trans_id`, `no_detox`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20),
(21, 21),
(22, 22),
(23, 23),
(24, 24),
(25, 25),
(26, 26),
(27, 27),
(28, 28),
(29, 29),
(30, 30),
(31, 31),
(32, 32),
(33, 33),
(34, 34),
(35, 35),
(36, 36),
(37, 37),
(38, 38),
(39, 39),
(40, 40),
(41, 41),
(42, 42),
(43, 43),
(44, 44),
(45, 45),
(46, 46),
(47, 47),
(48, 48),
(49, 49),
(50, 50),
(51, 51),
(52, 1),
(53, 2),
(54, 3),
(55, 4);

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_no_lifestyle`
--

CREATE TABLE IF NOT EXISTS `farmhouse_no_lifestyle` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `no_lifestyle` int(5) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `farmhouse_no_lifestyle`
--

INSERT INTO `farmhouse_no_lifestyle` (`trans_id`, `no_lifestyle`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_no_people`
--

CREATE TABLE IF NOT EXISTS `farmhouse_no_people` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `no_people` int(5) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `farmhouse_no_people`
--

INSERT INTO `farmhouse_no_people` (`trans_id`, `no_people`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_order`
--

CREATE TABLE IF NOT EXISTS `farmhouse_order` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `order_name` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_type` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` decimal(15,0) NOT NULL DEFAULT '0',
  `quantity_ordered` int(11) NOT NULL,
  `product_total` decimal(15,0) NOT NULL DEFAULT '0',
  `ordered_num_of_people` int(11) NOT NULL,
  `ordered_day_beauty` int(11) NOT NULL,
  `ordered_grand_total` decimal(15,0) NOT NULL DEFAULT '0',
  `order_same_amount_for_everybody` varchar(5) NOT NULL DEFAULT 'yes',
  `payment_type` varchar(25) NOT NULL,
  `payment_method` varchar(25) NOT NULL,
  `card_name` varchar(25) NOT NULL,
  `delivery_address` text NOT NULL,
  `ip` varchar(40) NOT NULL,
  `date_added` datetime NOT NULL,
  `gift_card_no` varchar(25) NOT NULL,
  `status` int(3) NOT NULL,
  `delivery_dates` text NOT NULL,
  `customer_id` int(11) NOT NULL,
  `program_name` varchar(50) NOT NULL,
  `program_type` varchar(50) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `farmhouse_order`
--

INSERT INTO `farmhouse_order` (`trans_id`, `order_id`, `order_name`, `product_id`, `product_type`, `product_name`, `product_price`, `quantity_ordered`, `product_total`, `ordered_num_of_people`, `ordered_day_beauty`, `ordered_grand_total`, `order_same_amount_for_everybody`, `payment_type`, `payment_method`, `card_name`, `delivery_address`, `ip`, `date_added`, `gift_card_no`, `status`, `delivery_dates`, `customer_id`, `program_name`, `program_type`) VALUES
(44, 1048673, 'bala bhaskar', 1, 'Detox', 'DETOX-A', '195', 36, '7020', 4, 9, '0', 'yes', 'Pay on delivery', '', '', '1,1,1', '', '2015-03-20 17:56:16', '', 0, '2015-03-21,2015-03-25,2015-03-27', 7, 'C', 'Detox'),
(40, 5983621, 'bala bhaskar', 4, 'Retail', 'SPICY LEMONADE', '33', 2, '66', 0, 0, '0', 'yes', 'Pay on delivery', '', '', ' ', '', '2015-03-20 17:53:22', '', 0, '2015-03-20', 7, '', 'Retail'),
(41, 5983621, 'bala bhaskar', 6, 'Retail', 'HORCHATA', '35', 4, '140', 0, 0, '0', 'yes', 'Pay on delivery', '', '', ' ', '', '2015-03-20 17:53:22', '', 0, '2015-03-20', 7, '', 'Retail'),
(42, 5983621, 'bala bhaskar', 1, 'Detox', 'DETOX-A', '195', 12, '2340', 2, 6, '0', 'yes', 'Pay on delivery', '', '', '1,1', '', '2015-03-20 17:53:22', '', 0, '2015-03-21,2015-03-23', 7, 'B', 'Detox'),
(43, 5983621, 'bala bhaskar', 1, 'LifeStyle', 'BEAUTY', '195', 14, '2730', 2, 7, '0', 'yes', 'Pay on delivery', '', '', '1,1,1', '', '2015-03-20 17:53:22', '', 0, '2015-03-21,2015-03-25,2015-03-27', 7, 'C', 'LifeStyle'),
(39, 1728293, 'hussain tahzeeb', 1, 'Detox', 'DETOX-A', '195', 12, '2340', 2, 6, '0', 'yes', 'Pay on delivery', '', '', '1,1', '', '2015-03-20 17:51:23', '', 0, '2015-03-21,2015-03-24', 4, 'A', 'Detox'),
(38, 1728293, 'hussain tahzeeb', 8, 'Retail', 'THE REHYDRATOR', '45', 5, '225', 0, 0, '0', 'yes', 'Pay on delivery', '', '', ' 1', '', '2015-03-20 17:51:23', '', 0, '2015-03-20', 4, '', 'Retail'),
(37, 9616092, 'Ram Adapa', 1, 'LifeStyle', 'BEAUTY', '195', 4, '780', 1, 4, '0', 'yes', 'Pay online', '', 'mastercard', '1,1', '', '2015-03-20 17:50:28', '', 0, '2015-03-21,2015-03-24', 3, 'A', 'LifeStyle'),
(36, 9616092, 'Ram Adapa', 1, 'Detox', 'DETOX-A', '195', 10, '1950', 2, 5, '0', 'yes', 'Pay online', '', 'mastercard', '1,1', '', '2015-03-20 17:50:28', '', 0, '2015-03-21,2015-03-24', 3, 'A', 'Detox'),
(35, 9616092, 'Ram Adapa', 7, 'Retail', 'AMINO HYDRATE', '40', 1, '40', 0, 0, '0', 'yes', 'Pay online', '', 'mastercard', ' 1', '', '2015-03-20 17:50:28', '', 0, '2015-03-20', 3, '', 'Retail'),
(34, 8139972, 'hussain tahzeeb', 1, 'LifeStyle', 'BEAUTY', '195', 8, '1560', 2, 4, '0', 'yes', 'Pay on delivery', '', '', '1', '', '2015-03-20 17:48:50', '', 0, '', 4, '', 'LifeStyle'),
(33, 8139972, 'hussain tahzeeb', 2, 'Retail', 'INTERNAL FIX', '31', 4, '124', 0, 0, '0', 'yes', 'Pay on delivery', '', '', ' 1', '', '2015-03-20 17:48:49', '', 0, '2015-03-20', 4, '', 'Retail'),
(32, 8139972, 'hussain tahzeeb', 4, 'Retail', 'SPICY LEMONADE', '33', 4, '132', 0, 0, '0', 'yes', 'Pay on delivery', '', '', ' 1', '', '2015-03-20 17:48:49', '', 0, '2015-03-20', 4, '', 'Retail'),
(45, 7188138, 'nandini bayya', 5, 'Retail', 'BEET IT', '34', 5, '170', 0, 0, '0', 'yes', 'Pay on delivery', '', '', ' ', '', '2015-03-20 18:01:35', '', 0, '2015-03-20', 1, '', 'Retail'),
(46, 7188138, 'nandini bayya', 5, 'Retail', 'BEET IT', '34', 5, '170', 0, 0, '0', 'yes', 'Pay on delivery', '', '', ' ', '', '2015-03-20 18:01:35', '', 0, '2015-03-20', 1, '', 'Retail'),
(47, 7188138, 'nandini bayya', 1, 'Detox', 'DETOX-A', '195', 42, '8190', 2, 21, '0', 'yes', 'Pay on delivery', '', '', '1', '', '2015-03-20 18:01:35', '', 0, '', 1, '', 'Detox'),
(48, 7188138, 'nandini bayya', 2, 'LifeStyle', 'ENERGY', '130', 24, '3120', 3, 8, '0', 'yes', 'Pay on delivery', '', '', '1,1,1', '', '2015-03-20 18:01:35', '', 0, '2015-03-21,2015-03-25,2015-03-27', 1, 'C', 'LifeStyle'),
(49, 6502415, 'bala bhaskar', 7, 'Retail', 'AMINO HYDRATE', '40', 1, '40', 0, 0, '0', 'yes', 'Pay on delivery', '', '', ' 1', '', '2015-03-20 18:13:15', '', 0, '2015-03-20', 7, '', 'Retail'),
(50, 6502415, 'bala bhaskar', 8, 'Retail', 'THE REHYDRATOR', '45', 1, '45', 0, 0, '0', 'yes', 'Pay on delivery', '', '', ' 1', '', '2015-03-20 18:13:15', '', 0, '2015-03-20', 7, '', 'Retail'),
(51, 6502415, 'bala bhaskar', 5, 'Retail', 'BEET IT', '34', 1, '34', 0, 0, '0', 'yes', 'Pay on delivery', '', '', ' 1', '', '2015-03-20 18:13:15', '', 0, '2015-03-20', 7, '', 'Retail'),
(52, 6502415, 'bala bhaskar', 6, 'Retail', 'HORCHATA', '35', 2, '70', 0, 0, '0', 'yes', 'Pay on delivery', '', '', ' 1', '', '2015-03-20 18:13:15', '', 0, '2015-03-20', 7, '', 'Retail'),
(53, 3478763, 'bala bhaskar', 5, 'Retail', 'BEET IT', '34', 5, '170', 0, 0, '0', 'yes', 'Pay online', 'Debit Card', 'visa', ' 1', '', '2015-03-20 18:15:10', '', 0, '2015-03-20', 7, '', 'Retail'),
(54, 3478763, 'bala bhaskar', 6, 'Retail', 'HORCHATA', '35', 3, '105', 0, 0, '0', 'yes', 'Pay online', 'Debit Card', 'visa', ' 1', '', '2015-03-20 18:15:10', '', 0, '2015-03-20', 7, '', 'Retail'),
(55, 6770662, 'nandini bayya', 28, 'Detox', 'DETOX -A', '195', 28, '5460', 4, 7, '0', 'yes', 'Pay online', '', 'visa', '2,4,1', '', '2015-03-20 18:56:03', '', 0, '2015-03-21,2015-03-24,2015-03-26', 1, 'A', 'Detox'),
(56, 4713492, 'Ram Adapa', 28, 'Detox', 'DETOX -A', '195', 36, '7020', 3, 12, '0', 'yes', 'Pay online', '', 'mastercard', '1,1,1,1', '', '2015-03-20 19:19:08', '', 0, '2015-03-21,2015-03-24,2015-03-26,2015-03-28', 3, 'A', 'Detox');

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_order_num_master`
--

CREATE TABLE IF NOT EXISTS `farmhouse_order_num_master` (
  `trans_id` int(11) NOT NULL DEFAULT '1',
  `order_id` int(15) DEFAULT '0',
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_product_multi_language`
--

CREATE TABLE IF NOT EXISTS `farmhouse_product_multi_language` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `ingredients` text NOT NULL,
  `benifits` text NOT NULL,
  `nutritional_content` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `product_type` varchar(25) NOT NULL,
  `countrylang_id` int(6) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_program_items`
--

CREATE TABLE IF NOT EXISTS `farmhouse_program_items` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `program_id` int(11) NOT NULL,
  `program_name` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `program_type` varchar(45) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=83 ;

--
-- Dumping data for table `farmhouse_program_items`
--

INSERT INTO `farmhouse_program_items` (`trans_id`, `program_id`, `program_name`, `product_id`, `product_name`, `status`, `program_type`) VALUES
(71, 0, 'DETOX -A', 1, 'GREEN ELIXIR', 1, 'Detox'),
(72, 0, 'DETOX -A', 2, 'INTERNAL FIX', 1, 'Detox'),
(73, 0, 'DETOX -A', 3, 'BEAUTY GLOW', 1, 'Detox'),
(74, 0, 'DETOX -A', 4, 'SPICY LEMONADE', 1, 'Detox'),
(75, 0, 'DETOX -A', 5, 'BEET IT', 1, 'Detox'),
(76, 0, 'DETOX -A', 6, 'HORCHATA', 1, 'Detox'),
(77, 0, 'Beauty', 1, 'GREEN ELIXIR', 1, 'Lifestyle'),
(78, 0, 'Beauty', 2, 'INTERNAL FIX', 1, 'Lifestyle'),
(79, 0, 'Beauty', 3, 'BEAUTY GLOW', 1, 'Lifestyle'),
(80, 0, 'Beauty', 4, 'SPICY LEMONADE', 1, 'Lifestyle'),
(81, 0, 'Beauty', 5, 'BEET IT', 1, 'Lifestyle'),
(82, 0, 'Beauty', 6, 'HORCHATA', 1, 'Lifestyle');

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_schedule_delivery_program`
--

CREATE TABLE IF NOT EXISTS `farmhouse_schedule_delivery_program` (
  `trans_id` int(6) NOT NULL AUTO_INCREMENT,
  `program_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `day_delivery` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`trans_id`,`program_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_temp_cart_fh`
--

CREATE TABLE IF NOT EXISTS `farmhouse_temp_cart_fh` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_image_url` varchar(255) DEFAULT NULL,
  `product_price` int(11) NOT NULL DEFAULT '0',
  `no_items` int(11) NOT NULL,
  `total_item_amount` int(11) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `product_id` varchar(10) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `customer_id` varchar(50) NOT NULL,
  `ordered_num_of_people` int(11) NOT NULL,
  `ordered_day_beauty` int(11) NOT NULL,
  `ordered_grand_total` decimal(15,4) NOT NULL,
  `order_same_amount_for_everybody` varchar(5) NOT NULL,
  `payment_method` varchar(25) NOT NULL,
  `payment_type` varchar(25) NOT NULL,
  `card_name` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL,
  `order_name` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `gift_card_no` varchar(25) NOT NULL,
  `temp_order_no` int(11) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=68 ;

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_temp_schedule_detox`
--

CREATE TABLE IF NOT EXISTS `farmhouse_temp_schedule_detox` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `detox_id` int(5) NOT NULL,
  `detox_name` varchar(50) DEFAULT NULL,
  `detox_price` int(11) NOT NULL DEFAULT '0',
  `no_people` int(11) NOT NULL,
  `no_days_detox` int(11) NOT NULL,
  `detox_hydrator_id` int(11) NOT NULL,
  `detox_hydrator_qty` int(11) NOT NULL,
  `detox_hydrator_price` decimal(15,0) NOT NULL,
  `detox_total` decimal(15,0) NOT NULL,
  `ordered_date` datetime NOT NULL,
  `delivery_start_date` datetime NOT NULL,
  `detox_person_no` varchar(10) NOT NULL,
  `delivery_dates` text NOT NULL,
  `ip` varchar(40) NOT NULL,
  `status` int(1) NOT NULL,
  `delivery_address` text NOT NULL,
  `payment_method` varchar(15) NOT NULL,
  `payment_type` varchar(25) NOT NULL,
  `card_name` varchar(25) NOT NULL,
  `product_image_url` text NOT NULL,
  `address_id` text NOT NULL,
  `program_name` varchar(50) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `farmhouse_temp_schedule_detox`
--

INSERT INTO `farmhouse_temp_schedule_detox` (`trans_id`, `customer_id`, `detox_id`, `detox_name`, `detox_price`, `no_people`, `no_days_detox`, `detox_hydrator_id`, `detox_hydrator_qty`, `detox_hydrator_price`, `detox_total`, `ordered_date`, `delivery_start_date`, `detox_person_no`, `delivery_dates`, `ip`, `status`, `delivery_address`, `payment_method`, `payment_type`, `card_name`, `product_image_url`, `address_id`, `program_name`) VALUES
(67, 1, 28, 'DETOX -A', 195, 2, 6, 0, 0, '0', '2340', '2015-03-20 19:00:02', '0000-00-00 00:00:00', '2', '2015-03-21,2015-03-24', '10.0.0.14', 0, '1', '', '', '', '', '1,1', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_temp_schedule_lifestyle`
--

CREATE TABLE IF NOT EXISTS `farmhouse_temp_schedule_lifestyle` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `lifestyle_id` int(5) NOT NULL,
  `lifestyle_name` varchar(50) DEFAULT NULL,
  `lifestyle_price` int(11) NOT NULL DEFAULT '0',
  `no_people` int(11) NOT NULL,
  `no_days_beauty` int(11) NOT NULL,
  `lifestyle_total` decimal(15,0) NOT NULL,
  `ordered_date` datetime NOT NULL,
  `delivery_start_date` datetime NOT NULL,
  `lifestyle_person_no` varchar(10) NOT NULL,
  `delivery_dates` text NOT NULL,
  `ip` varchar(40) NOT NULL,
  `status` int(1) NOT NULL,
  `delivery_address` text NOT NULL,
  `payment_method` varchar(25) NOT NULL,
  `payment_type` varchar(25) NOT NULL,
  `card_name` varchar(25) NOT NULL,
  `program_name` varchar(50) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_third_party_payment_details`
--

CREATE TABLE IF NOT EXISTS `farmhouse_third_party_payment_details` (
  `tpp_id` int(11) NOT NULL AUTO_INCREMENT,
  `tpp_name` varchar(25) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  PRIMARY KEY (`tpp_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_user_city`
--

CREATE TABLE IF NOT EXISTS `farmhouse_user_city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(25) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `farmhouse_user_city`
--

INSERT INTO `farmhouse_user_city` (`city_id`, `city_name`) VALUES
(1, 'Beijing'),
(2, 'Shanghai'),
(3, 'Chongqing');

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_user_detox_program`
--

CREATE TABLE IF NOT EXISTS `farmhouse_user_detox_program` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(50) NOT NULL,
  `detox_name` varchar(50) NOT NULL,
  `detox_items` text NOT NULL,
  `detox_price` decimal(11,0) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_cahnged` datetime NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `farmhouse_user_detox_program`
--

INSERT INTO `farmhouse_user_detox_program` (`trans_id`, `customer_id`, `detox_name`, `detox_items`, `detox_price`, `ip`, `date_added`, `date_cahnged`) VALUES
(1, '2', 'Detox-Myown-2', 'GREEN ELIXIR,INTERNAL FIX,BEAUTY GLOW', '93', '10.0.0.8', '2015-03-20 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_user_district`
--

CREATE TABLE IF NOT EXISTS `farmhouse_user_district` (
  `district_id` int(11) NOT NULL AUTO_INCREMENT,
  `district` varchar(25) NOT NULL,
  PRIMARY KEY (`district_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `farmhouse_user_district`
--

INSERT INTO `farmhouse_user_district` (`district_id`, `district`) VALUES
(1, 'Fengtai '),
(2, 'Xuhui'),
(3, 'Chaoyang');

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_user_lifestyle_program`
--

CREATE TABLE IF NOT EXISTS `farmhouse_user_lifestyle_program` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(50) NOT NULL,
  `lifestyle_name` varchar(50) NOT NULL,
  `lifestyle_items` text NOT NULL,
  `lifestyle_price` decimal(11,0) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_cahnged` datetime NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `farmhouse_user_lifestyle_program`
--

INSERT INTO `farmhouse_user_lifestyle_program` (`trans_id`, `customer_id`, `lifestyle_name`, `lifestyle_items`, `lifestyle_price`, `ip`, `date_added`, `date_cahnged`) VALUES
(1, '2', 'LS-Myown-2', 'GREEN ELIXIR,INTERNAL FIX,BEAUTY GLOW,SPICY LEMONADE,BEET IT,HORCHATA', '195', '10.0.0.8', '2015-03-20 00:00:00', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

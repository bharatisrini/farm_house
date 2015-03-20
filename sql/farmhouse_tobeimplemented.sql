-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2015 at 07:28 AM
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
  `detox_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_people` int(5) NOT NULL,
  `day_detox` int(5) NOT NULL,
  `order_same_amount` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `total_amount` decimal(15,4) NOT NULL,
  `date_added` datetime NOT NULL,
  `countrylang_id` int(6) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_admin_login`
--

CREATE TABLE IF NOT EXISTS `farmhouse_admin_login` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `email` varchar(96) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip` varchar(40) NOT NULL,
  `logged_in_time` datetime NOT NULL,
  `logged_out_time` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `type` varchar(30) NOT NULL,
  `countrylang_id` int(6) NOT NULL,
  PRIMARY KEY (`trans_id`),
  KEY `email` (`email`),
  KEY `ip` (`ip`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=98 ;


-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_admin_registration`
--

CREATE TABLE IF NOT EXISTS `farmhouse_admin_registration` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(96) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(40) NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_added` datetime NOT NULL,
  `type` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `countrylang_id` int(6) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_admin_temp_insert_prg`
--

CREATE TABLE IF NOT EXISTS `farmhouse_admin_temp_insert_prg` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `prod_id` int(6) NOT NULL,
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `qty` int(6) NOT NULL,
  `price` double NOT NULL DEFAULT '0',
  `id_total` int(6) NOT NULL,
  `countrylang_id` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=79 ;

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_carrier_details`
--

CREATE TABLE IF NOT EXISTS `farmhouse_carrier_details` (
  `carrier_id` int(11) NOT NULL AUTO_INCREMENT,
  `carrier_name` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `carrier_address` varchar(96) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `city` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `state` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `mobile` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `contact_person` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `countrylang_id` int(6) NOT NULL,
  PRIMARY KEY (`carrier_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;


--
-- Table structure for table `farmhouse_credit_card_details`
--

CREATE TABLE IF NOT EXISTS `farmhouse_credit_card_details` (
  `card_id` int(11) NOT NULL AUTO_INCREMENT,
  `card_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `countrylang_id` int(6) NOT NULL,
  PRIMARY KEY (`card_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=84 ;

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_customer`
--

CREATE TABLE IF NOT EXISTS `farmhouse_customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(96) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_added` datetime NOT NULL,
  `city` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `countrylang_id` int(6) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_customer_address`
--

CREATE TABLE IF NOT EXISTS `farmhouse_customer_address` (
  `trans_id` int(5) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `address` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_district` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_city` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `countrylang_id` int(6) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;


-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_customer_login`
--

CREATE TABLE IF NOT EXISTS `farmhouse_customer_login` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `email` varchar(96) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip` varchar(40) NOT NULL,
  `logged_in_time` datetime NOT NULL,
  `logged_out_time` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `countrylang_id` int(6) NOT NULL,
  PRIMARY KEY (`trans_id`),
  KEY `email` (`email`),
  KEY `ip` (`ip`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=152 ;

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_debit_card_details`
--

CREATE TABLE IF NOT EXISTS `farmhouse_debit_card_details` (
  `card_id` int(11) NOT NULL AUTO_INCREMENT,
  `card_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `countrylang_id` int(6) NOT NULL,
  PRIMARY KEY (`card_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=82 ;

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_delivery_schedule`
--

CREATE TABLE IF NOT EXISTS `farmhouse_delivery_schedule` (
  `trans_id` int(5) NOT NULL AUTO_INCREMENT,
  `order_id` int(5) NOT NULL,
  `customer_id` int(5) NOT NULL,
  `product_type` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `delivery_date` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `delivery_address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `delivery_status` int(5) NOT NULL,
  `delivered_date` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_delivered` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `carrier_id` int(5) NOT NULL,
  `no_people` int(10) NOT NULL,
  `no_detox` int(10) NOT NULL,
  `tmp_trans_id` int(10) NOT NULL,
  `tmp_life_id` int(10) unsigned NOT NULL,
  `countrylang_id` int(6) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=188 ;


--
-- Table structure for table `farmhouse_detox_program`
--

CREATE TABLE IF NOT EXISTS `farmhouse_detox_program` (
  `trans_id` int(5) NOT NULL AUTO_INCREMENT,
  `detox_id` int(11) NOT NULL,
  `detox_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `detox_items` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `detox_price` decimal(11,0) NOT NULL,
  `title_1` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `discription_1` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_2` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `discription_2` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_3` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `discription_3` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip` varchar(40) CHARACTER SET utf8 NOT NULL,
  `date_added` datetime NOT NULL,
  `date_cahnged` datetime NOT NULL,
  `countrylang_id` int(6) NOT NULL,
  PRIMARY KEY (`detox_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_detox_temp_items`
--

CREATE TABLE IF NOT EXISTS `farmhouse_detox_temp_items` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(10,0) NOT NULL,
  `countrylang_id` int(6) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_gift_card_details`
--

CREATE TABLE IF NOT EXISTS `farmhouse_gift_card_details` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` int(4) NOT NULL DEFAULT '0',
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `countrylang_id` int(6) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=66 ;

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_info_faq`
--

CREATE TABLE IF NOT EXISTS `farmhouse_info_faq` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `why_heading` varchar(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `why_image` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `why_discription` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `how_heading` varchar(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `how_image` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `how_discription` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tips_heading` varchar(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tips_image` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tips_discription` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `story_heading` varchar(22) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `story_image` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `story_discription` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tech_heading` varchar(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tech_image` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tech_discription` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `countrylang_id` int(6) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_juice_details`
--

CREATE TABLE IF NOT EXISTS `farmhouse_juice_details` (
  `trans_id` int(5) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `name` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` int(4) NOT NULL DEFAULT '1',
  `image` varchar(255) DEFAULT NULL,
  `price` decimal(15,0) NOT NULL DEFAULT '0',
  `weight` decimal(15,0) NOT NULL DEFAULT '0',
  `ingredients` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `benifits` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `nutritional_content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `product_type` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `countrylang_id` int(6) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;


-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_lifestyle_program`
--

CREATE TABLE IF NOT EXISTS `farmhouse_lifestyle_program` (
  `trans_id` int(5) NOT NULL AUTO_INCREMENT,
  `lifestyle_id` int(11) NOT NULL,
  `lifestyle_name` varchar(50) NOT NULL,
  `lifestyle_items` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `lifestyle_price` decimal(11,0) NOT NULL,
  `title_1` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `discription_1` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_2` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `discription_2` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_3` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `discription_3` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip` varchar(40) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_cahnged` datetime NOT NULL,
  `countrylang_id` int(6) NOT NULL,
  PRIMARY KEY (`lifestyle_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

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
  `order_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `product_type` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_price` decimal(15,0) NOT NULL DEFAULT '0',
  `quantity_ordered` int(11) NOT NULL,
  `product_total` decimal(15,0) NOT NULL DEFAULT '0',
  `ordered_num_of_people` int(11) NOT NULL,
  `ordered_day_beauty` int(11) NOT NULL,
  `ordered_grand_total` decimal(15,0) NOT NULL DEFAULT '0',
  `order_same_amount_for_everybody` varchar(5) NOT NULL DEFAULT 'yes',
  `payment_type` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_method` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `card_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `delivery_address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip` varchar(40) NOT NULL,
  `date_added` datetime NOT NULL,
  `gift_card_no` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(3) NOT NULL,
  `delivery_dates` text NOT NULL,
  `customer_id` int(11) NOT NULL,
  `countrylang_id` int(6) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=127 ;

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
  `product_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ordered_num_of_people` int(11) NOT NULL,
  `ordered_day_beauty` int(11) NOT NULL,
  `ordered_grand_total` decimal(15,4) NOT NULL,
  `order_same_amount_for_everybody` varchar(5) NOT NULL,
  `payment_method` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_type` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `card_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` datetime NOT NULL,
  `order_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text NOT NULL,
  `gift_card_no` varchar(25) NOT NULL,
  `temp_order_no` int(11) NOT NULL,
  `countrylang_id` int(6) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=134 ;

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_temp_schedule_detox`
--

CREATE TABLE IF NOT EXISTS `farmhouse_temp_schedule_detox` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `detox_id` int(5) NOT NULL,
  `detox_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
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
  `payment_method` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_type` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `card_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_image_url` text NOT NULL,
  `address_id` text NOT NULL,
  `countrylang_id` int(6) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=134 ;


-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_temp_schedule_lifestyle`
--

CREATE TABLE IF NOT EXISTS `farmhouse_temp_schedule_lifestyle` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `lifestyle_id` int(5) NOT NULL,
  `lifestyle_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
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
  `payment_method` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_type` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `card_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `countrylang_id` int(6) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;


-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_third_party_payment_details`
--

CREATE TABLE IF NOT EXISTS `farmhouse_third_party_payment_details` (
  `tpp_id` int(11) NOT NULL AUTO_INCREMENT,
  `tpp_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `countrylang_id` int(6) NOT NULL,
  PRIMARY KEY (`tpp_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=65 ;


--
-- Table structure for table `farmhouse_user_city`
--

CREATE TABLE IF NOT EXISTS `farmhouse_user_city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `countrylang_id` int(6) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;


-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_user_detox_program`
--

CREATE TABLE IF NOT EXISTS `farmhouse_user_detox_program` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(50) NOT NULL,
  `detox_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `detox_items` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `detox_price` decimal(11,0) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_cahnged` datetime NOT NULL,
  `countrylang_id` int(6) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;


--
-- Table structure for table `farmhouse_user_district`
--

CREATE TABLE IF NOT EXISTS `farmhouse_user_district` (
  `district_id` int(11) NOT NULL AUTO_INCREMENT,
  `district` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `countrylang_id` int(6) NOT NULL,
  PRIMARY KEY (`district_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;


-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_user_lifestyle_program`
--

CREATE TABLE IF NOT EXISTS `farmhouse_user_lifestyle_program` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `lifestyle_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `lifestyle_items` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `lifestyle_price` decimal(11,0) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_cahnged` datetime NOT NULL,
  `countrylang_id` int(6) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

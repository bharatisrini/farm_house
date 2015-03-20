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
-- Table structure for table `country_language`
--

CREATE TABLE IF NOT EXISTS `country_language` (
  `countrylang_id` int(6) NOT NULL AUTO_INCREMENT,
  `country` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`countrylang_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=98 ;

--
-- Dumping data for table `farmhouse_admin_login`
--

INSERT INTO `farmhouse_admin_login` (`trans_id`, `admin_id`, `email`, `ip`, `logged_in_time`, `logged_out_time`, `status`, `type`) VALUES
(92, 7, 'priyave@yahoo.com', '10.0.0.7', '2015-03-10 08:24:26', '2015-03-10 08:47:49', 0, 'admin'),
(93, 7, 'priyave@yahoo.com', '10.0.0.10', '2015-03-10 08:26:22', '2015-03-10 08:47:49', 0, 'admin'),
(94, 7, 'priyave@yahoo.com', '10.0.0.10', '2015-03-10 08:26:50', '2015-03-10 08:47:49', 0, 'admin'),
(95, 7, 'priyave@yahoo.com', '10.0.0.10', '2015-03-10 08:35:50', '2015-03-10 08:47:49', 0, 'admin'),
(96, 7, 'priyave@yahoo.com', '10.0.0.11', '2015-03-10 01:46:21', '0000-00-00 00:00:00', 1, 'admin'),
(97, 11, 'y@y.com', '10.0.0.7', '2015-03-11 05:59:22', '0000-00-00 00:00:00', 1, 'dispatch');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `farmhouse_admin_registration`
--

INSERT INTO `farmhouse_admin_registration` (`admin_id`, `firstname`, `lastname`, `email`, `telephone`, `password`, `address`, `ip`, `status`, `date_added`, `type`) VALUES
(7, 'Priya', 'Vemuri', 'priyave@yahoo.com', '9849416542', '62856258c4194ced8a4bfdb9a05d2f37', 'Mig-204, H.B.Colony, Visakhapatnam', '10.0.0.11', 1, '2015-03-10 08:23:24', 'admin'),
(8, 'Nandini', 'Bayye', 'nandini.2992@yahoo.com', '8914567524', '9e5162a0e1636fa46f6f7aab8faaca45', 'Flat no 107, Kalyan Towers, Visakhapatnam', '10.0.0.11', 1, '2015-03-10 10:20:40', 'dispatch'),
(9, 'sss', 'sss', 'sss@gmail.com', '9999999', '9f6e6800cfae7749eb6c486619254b9c', 'sdafndasfndjf', '10.0.0.5', 1, '2015-03-10 07:23:26', 'production'),
(10, 'dispatchadmin', 'dispatchadmin', 'dispatchadmin@dispatchadmin.com', '88888888', '9dd4e461268c8034f5c8564e155c67a6', 'disptacher admin', '10.0.0.7', 1, '2015-03-11 05:48:42', 'dispatch'),
(11, 'y', 'y', 'y@y.com', '2222222', '415290769594460e2e485922904f345d', 'yyyy', '10.0.0.7', 1, '2015-03-11 05:59:05', 'dispatch');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=79 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `farmhouse_carrier_details`
--

INSERT INTO `farmhouse_carrier_details` (`carrier_id`, `carrier_name`, `carrier_address`, `city`, `state`, `mobile`, `email`, `contact_person`, `date_added`, `status`) VALUES
(1, 'Farm House Hand delivery', '600/F, 465 Fuzhou Lu', 'near Guangdong Lu', 'Metro Line 2 Nanjing Dong Lu metro ln', '76589456', 'farmhousedispctcher@gmail.com', 'farmhouse', '2015-02-23 11:06:37', 1);

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
-- Dumping data for table `farmhouse_country_language`
--

INSERT INTO `farmhouse_country_language` (`countrylang_id`, `country`, `language`, `selected`) VALUES
(9, 'In', 'Eng', 1),
(10, 'Ch', 'Chi', 0),
(21, 'RUS', 'RUS', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=84 ;

--
-- Dumping data for table `farmhouse_credit_card_details`
--

INSERT INTO `farmhouse_credit_card_details` (`card_id`, `card_name`, `bank_name`, `image`, `status`, `date_added`, `date_modified`) VALUES
(80, 'Priya', 'SBI', 'bank-visa.png', 0, '2015-03-10 00:00:00', '0000-00-00 00:00:00'),
(81, 'Nandini', 'Canara', 'bank-mastercard.png', 0, '2015-03-10 00:00:00', '0000-00-00 00:00:00'),
(82, 'Manohar', 'ICICI', 'bank-visa.png', 0, '2015-03-10 00:00:00', '0000-00-00 00:00:00'),
(83, 'Suseela', 'IDBI', 'bank-mastercard.png', 0, '2015-03-10 00:00:00', '0000-00-00 00:00:00');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `farmhouse_customer`
--

INSERT INTO `farmhouse_customer` (`customer_id`, `firstname`, `lastname`, `email`, `telephone`, `password`, `address`, `ip`, `status`, `date_added`, `city`, `district`) VALUES
(26, ' 我 七 岁', '我 八 岁', '我 八 岁@ 我 七 岁.com', '三四', 'd16fb36f0911f878998c136191af705e', '我 八 岁@ 我 七 岁.com\n 我 七 岁\n我 八 岁\n三四', '127.0.0.1', 1, '2015-03-05 06:01:45', '', ''),
(27, 'xxx', 'xxx', 'xx@xx.com', '7032033814', 'd16fb36f0911f878998c136191af705e', 'xxxxx', '127.0.0.1', 1, '2015-03-05 09:12:42', 'vizag', 'andhra'),
(28, '半糖', '半糖', '半糖@yyy.com', '半糖', 'd16fb36f0911f878998c136191af705e', '半糖', '127.0.0.1', 1, '2015-03-06 05:54:31', '', ''),
(29, '柳橙汁', '柳橙汁', '柳橙汁@divya.com', '柳橙汁 柳橙汁 柳橙汁 ', 'd16fb36f0911f878998c136191af705e', '柳橙汁', '127.0.0.1', 1, '2015-03-06 07:50:20', '', ''),
(30, 'rqwe', 'qer', 'wqre', '234', 'd16fb36f0911f878998c136191af705e', 'rrewt', '127.0.0.1', 1, '2015-03-06 08:18:06', 'vizag', 'telagana'),
(31, '矿泉水', '矿泉水', '[object HTMLInputElement]', '87678687', 'd16fb36f0911f878998c136191af705e', '矿泉水', '127.0.0.1', 1, '2015-03-06 08:23:17', '矿泉水', '黑咖啡'),
(32, '黑咖啡 黑咖啡', '黑咖啡 黑咖啡', 'xxx@xxxxx.com', '黑咖啡黑咖啡', 'd16fb36f0911f878998c136191af705e', '黑咖啡黑咖啡黑咖啡黑咖啡 黑咖啡黑咖啡黑咖啡黑咖啡 黑咖啡黑咖啡黑咖啡', '127.0.0.1', 1, '2015-03-07 05:53:56', 'vizag', 'telagana'),
(33, '葡萄酒', '葡萄酒', 'sss@sss.com', '葡萄酒', 'd16fb36f0911f878998c136191af705e', '葡萄酒', '127.0.0.1', 1, '2015-03-07 06:23:06', '西瓜汁', '茶'),
(34, '葡萄酒 葡萄酒 葡萄酒', '葡萄酒 葡萄酒 葡萄酒 ', 'vvv@vvv.com', '葡萄酒葡萄酒葡萄酒', 'd16fb36f0911f878998c136191af705e', '葡萄酒 葡萄酒 葡萄酒 葡萄酒 葡萄酒 葡萄酒', '127.0.0.1', 1, '2015-03-07 06:25:19', '西瓜汁', '茶'),
(35, '葡萄酒 葡萄酒 葡萄酒 葡萄酒 葡萄酒 葡萄酒 葡萄酒 葡萄酒 ', '葡萄酒 葡萄酒 葡萄酒 葡萄酒 葡萄酒 ', 'vvv2@vvv.com', '葡萄酒葡萄酒葡萄酒葡萄酒', 'd16fb36f0911f878998c136191af705e', '葡萄酒 葡萄酒 葡萄酒 葡萄酒 葡萄酒 葡萄酒 葡萄酒 葡萄酒 葡萄酒 葡萄酒 葡萄酒 葡萄酒 葡萄酒 葡萄酒 葡萄酒 葡萄酒 ', '127.0.0.1', 1, '2015-03-07 06:26:47', '西瓜汁', '乌龙茶'),
(36, 'Manu', 'Manu', 'Manu1234@gmail.com', '9652163209', '803ac18e63e2d46d45ea7c634e095372', '#50-15-10,\nakkayyapalem,\nvisakhapatnam-16', '10.0.0.10', 1, '2015-03-10 10:22:39', 'Vizag', 'Visakhapatnam'),
(37, 'nandini', 'bayya', 'nandy.2992@gmail.com', '987654321', 'b32d2f803cdc6a8f95311f645654f7ad', 'd.no:17-108\nasdhjj\nkjhkash', '10.0.0.7', 1, '2015-03-10 10:44:41', 'Vizag', 'Visakhapatnam'),
(38, 'ram', 'kumar', 'ram.relangi@gmail.com', '9618189948', '4641999a7679fcaef2df0e26d11e3c72', 'fdgdfgd', '127.0.0.1', 1, '2015-03-10 12:03:21', 'vizag', 'andhra'),
(39, 'Manohar', 'Adapa', 'anm@gmail.com', '9876543210', 'f13bb1bed03db9d68a7d9a48aafeec78', '#45-43a-24/2,\nSrinivasnagar,\nVisakhapatnam', '10.0.0.10', 1, '2015-03-10 01:58:39', 'Vizag', 'Visakhapatnam'),
(40, 'user', 'user', 'user@yahoo.com', '32345235', '202cb962ac59075b964b07152d234b70', 'fsdfgfd', '127.0.0.1', 1, '2015-03-10 02:33:46', 'Vijayanagaram', 'Vijayanagaram'),
(41, 'ssr', 'rao', 'ssr@gmail.com', '999999999999', '47bce5c74f589f4867dbd57e9ca9f808', 'aaaaaaaaaa\naaaaaaaaaaaaa\na\nxxxx', '127.0.0.1', 1, '2015-03-10 06:32:19', 'çŸ¿æ³‰æ°´', 'ä¹Œé¾™èŒ¶'),
(42, 'ssr', 'ssr', 'ssr1@gmail.com', '999999999999', '9486b0c37ac7d674f865a8d4a3209fe6', 'jjjj sdaf', '127.0.0.1', 1, '2015-03-10 06:36:41', 'è¥¿ç“œæ±', 'vizag'),
(43, 'Srinivasa', 'Saraswatula', 'bharati.srini@gmail.com', '7032033807', '8d6ef2a18692f1c6eda731f0ee6dc7f6', 'Dr. No : 7/31, Endada Road, Opposite to Krishna Towers, Behind Trendz Harmony apartments, Rushikonda, Visakhapatnam , AP - India ', '127.0.0.1', 1, '2015-03-11 02:54:50', 'Vizag', 'Visakhapatnam'),
(44, 'abc', 'abc', 'abc@abc.com', '99999999999', '900150983cd24fb0d6963f7d28e17f72', '7-31/1, Endada road , opposite to Krishna towers, Rushikinda, Visakhapatnem . Andhra Pradesh - India', '10.0.0.7', 1, '2015-03-11 05:51:10', 'Vizag', 'Visakhapatnam');

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
  PRIMARY KEY (`trans_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `farmhouse_customer_address`
--

INSERT INTO `farmhouse_customer_address` (`trans_id`, `customer_id`, `address_id`, `address`, `address_district`, `address_city`) VALUES
(39, 36, 1, '#50-15-10,\nakkayyapalem,\n', 'Visakhapatnam', 'Vizag'),
(40, 37, 1, 'd.no:17-108\nasdhjj\nkjhkas', 'Visakhapatnam', 'Vizag'),
(41, 38, 1, 'fdgdfgd', 'andhra', 'vizag'),
(42, 39, 1, '#45-43a-24/2,\nSrinivasnag', 'Visakhapatnam', 'Vizag'),
(43, 40, 1, 'fsdfgfd', 'Vijayanagaram', 'Vijayanagaram'),
(44, 41, 1, 'aaaaaaaaaa\naaaaaaaaaaaaa\n', 'ä¹Œé¾™èŒ¶', 'çŸ¿æ³‰æ°´'),
(45, 42, 1, 'jjjj sdaf', 'vizag', 'è¥¿ç“œæ±'),
(46, 43, 1, 'Dr. No : 7/31, Endada Roa', 'Visakhapatnam', 'Vizag'),
(47, 44, 1, '7-31/1, Endada road , opp', 'Visakhapatnam', 'Vizag'),
(48, 44, 2, 'sgnkjng', 'Vijayanagaram', 'New China Town city');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=152 ;

--
-- Dumping data for table `farmhouse_customer_login`
--

INSERT INTO `farmhouse_customer_login` (`trans_id`, `customer_id`, `email`, `ip`, `logged_in_time`, `logged_out_time`, `status`) VALUES
(87, 36, 'Manu1234@gmail.com', '10.0.0.10', '2015-03-10 10:23:03', '2015-03-10 02:16:58', 0),
(88, 36, 'Manu1234@gmail.com', '10.0.0.10', '2015-03-10 10:25:52', '2015-03-10 02:16:58', 0),
(89, 36, 'Manu1234@gmail.com', '10.0.0.10', '2015-03-10 10:26:53', '2015-03-10 02:16:58', 0),
(90, 36, 'Manu1234@gmail.com', '10.0.0.10', '2015-03-10 10:27:52', '2015-03-10 02:16:58', 0),
(91, 36, 'Manu1234@gmail.com', '10.0.0.10', '2015-03-10 10:35:37', '2015-03-10 02:16:58', 0),
(92, 36, 'Manu1234@gmail.com', '10.0.0.10', '2015-03-10 10:36:18', '2015-03-10 02:16:58', 0),
(93, 36, 'Manu1234@gmail.com', '10.0.0.10', '2015-03-10 10:38:04', '2015-03-10 02:16:58', 0),
(94, 36, 'Manu1234@gmail.com', '10.0.0.10', '2015-03-10 10:38:39', '2015-03-10 02:16:58', 0),
(95, 36, 'Manu1234@gmail.com', '10.0.0.10', '2015-03-10 10:39:30', '2015-03-10 02:16:58', 0),
(96, 36, 'Manu1234@gmail.com', '10.0.0.10', '2015-03-10 10:44:23', '2015-03-10 02:16:58', 0),
(97, 36, 'Manu1234@gmail.com', '10.0.0.10', '2015-03-10 10:44:56', '2015-03-10 02:16:58', 0),
(98, 36, 'Manu1234@gmail.com', '10.0.0.10', '2015-03-10 10:45:27', '2015-03-10 02:16:58', 0),
(99, 36, 'Manu1234@gmail.com', '10.0.0.10', '2015-03-10 10:46:13', '2015-03-10 02:16:58', 0),
(100, 36, 'Manu1234@gmail.com', '10.0.0.10', '2015-03-10 10:47:10', '2015-03-10 02:16:58', 0),
(101, 37, 'nandy.2992@gmail.com', '10.0.0.7', '2015-03-10 10:47:30', '2015-03-10 01:46:06', 0),
(102, 36, 'Manu1234@gmail.com', '10.0.0.10', '2015-03-10 10:47:52', '2015-03-10 02:16:58', 0),
(103, 37, 'nandy.2992@gmail.com', '10.0.0.7', '2015-03-10 10:48:51', '2015-03-10 01:46:06', 0),
(104, 37, 'nandy.2992@gmail.com', '10.0.0.7', '2015-03-10 10:49:32', '2015-03-10 01:46:06', 0),
(105, 36, 'Manu1234@gmail.com', '10.0.0.10', '2015-03-10 10:49:39', '2015-03-10 02:16:58', 0),
(106, 37, 'nandy.2992@gmail.com', '10.0.0.7', '2015-03-10 10:50:45', '2015-03-10 01:46:06', 0),
(107, 37, 'nandy.2992@gmail.com', '10.0.0.7', '2015-03-10 10:53:13', '2015-03-10 01:46:06', 0),
(108, 37, 'nandy.2992@gmail.com', '10.0.0.7', '2015-03-10 10:53:42', '2015-03-10 01:46:06', 0),
(109, 36, 'Manu1234@gmail.com', '10.0.0.10', '2015-03-10 10:55:51', '2015-03-10 02:16:58', 0),
(110, 36, 'Manu1234@gmail.com', '10.0.0.10', '2015-03-10 11:03:53', '2015-03-10 02:16:58', 0),
(111, 36, 'Manu1234@gmail.com', '10.0.0.10', '2015-03-10 11:21:02', '2015-03-10 02:16:58', 0),
(112, 36, 'Manu1234@gmail.com', '10.0.0.10', '2015-03-10 12:15:02', '2015-03-10 02:16:58', 0),
(113, 36, 'Manu1234@gmail.com', '10.0.0.10', '2015-03-10 12:16:14', '2015-03-10 02:16:58', 0),
(114, 37, 'nandy.2992@gmail.com', '10.0.0.7', '2015-03-10 12:17:13', '2015-03-10 01:46:06', 0),
(115, 38, 'ram.relangi@gmail.com', '127.0.0.1', '2015-03-10 12:18:02', '2015-03-10 01:46:38', 0),
(116, 37, 'nandy.2992@gmail.com', '10.0.0.7', '2015-03-10 12:22:20', '2015-03-10 01:46:06', 0),
(117, 37, 'nandy.2992@gmail.com', '10.0.0.7', '2015-03-10 12:24:17', '2015-03-10 01:46:06', 0),
(118, 36, 'Manu1234@gmail.com', '10.0.0.10', '2015-03-10 12:24:46', '2015-03-10 02:16:58', 0),
(119, 38, 'ram.relangi@gmail.com', '127.0.0.1', '2015-03-10 12:25:00', '2015-03-10 01:46:38', 0),
(120, 37, 'nandy.2992@gmail.com', '10.0.0.7', '2015-03-10 12:26:32', '2015-03-10 01:46:06', 0),
(121, 38, 'ram.relangi@gmail.com', '127.0.0.1', '2015-03-10 12:30:36', '2015-03-10 01:46:38', 0),
(122, 37, 'nandy.2992@gmail.com', '10.0.0.7', '2015-03-10 12:31:20', '2015-03-10 01:46:06', 0),
(123, 38, 'ram.relangi@gmail.com', '127.0.0.1', '2015-03-10 12:32:42', '2015-03-10 01:46:38', 0),
(124, 37, 'nandy.2992@gmail.com', '10.0.0.7', '2015-03-10 12:35:28', '2015-03-10 01:46:06', 0),
(125, 37, 'nandy.2992@gmail.com', '10.0.0.7', '2015-03-10 12:37:58', '2015-03-10 01:46:06', 0),
(126, 36, 'Manu1234@gmail.com', '10.0.0.10', '2015-03-10 12:45:14', '2015-03-10 02:16:58', 0),
(127, 37, 'nandy.2992@gmail.com', '10.0.0.7', '2015-03-10 01:02:06', '2015-03-10 01:46:06', 0),
(128, 37, 'nandy.2992@gmail.com', '10.0.0.10', '2015-03-10 01:06:49', '2015-03-10 01:46:06', 0),
(129, 37, 'nandy.2992@gmail.com', '10.0.0.10', '2015-03-10 01:08:09', '2015-03-10 01:46:06', 0),
(130, 36, 'Manu1234@gmail.com', '10.0.0.10', '2015-03-10 01:09:49', '2015-03-10 02:16:58', 0),
(131, 36, 'Manu1234@gmail.com', '10.0.0.10', '2015-03-10 01:14:45', '2015-03-10 02:16:58', 0),
(132, 37, 'nandy.2992@gmail.com', '10.0.0.7', '2015-03-10 01:25:52', '2015-03-10 01:46:06', 0),
(133, 37, 'nandy.2992@gmail.com', '10.0.0.7', '2015-03-10 01:47:30', '0000-00-00 00:00:00', 1),
(134, 36, 'Manu1234@gmail.com', '10.0.0.10', '2015-03-10 01:49:43', '2015-03-10 02:16:58', 0),
(135, 36, 'Manu1234@gmail.com', '10.0.0.10', '2015-03-10 01:53:00', '2015-03-10 02:16:58', 0),
(136, 39, 'anm@gmail.com', '10.0.0.10', '2015-03-10 01:59:11', '2015-03-11 05:15:16', 0),
(137, 39, 'anm@gmail.com', '10.0.0.10', '2015-03-10 01:59:54', '2015-03-11 05:15:16', 0),
(138, 39, 'anm@gmail.com', '10.0.0.7', '2015-03-10 02:07:15', '2015-03-11 05:15:16', 0),
(139, 36, 'Manu1234@gmail.com', '10.0.0.10', '2015-03-10 02:10:25', '2015-03-10 02:16:58', 0),
(140, 36, 'Manu1234@gmail.com', '10.0.0.10', '2015-03-10 02:11:17', '2015-03-10 02:16:58', 0),
(141, 36, 'Manu1234@gmail.com', '10.0.0.10', '2015-03-10 02:13:55', '2015-03-10 02:16:58', 0),
(142, 36, 'Manu1234@gmail.com', '10.0.0.10', '2015-03-10 02:15:49', '2015-03-10 02:16:58', 0),
(143, 39, 'anm@gmail.com', '10.0.0.10', '2015-03-10 02:17:22', '2015-03-11 05:15:16', 0),
(144, 36, 'Manu1234@gmail.com', '10.0.0.10', '2015-03-10 02:27:55', '0000-00-00 00:00:00', 1),
(145, 40, 'user@yahoo.com', '127.0.0.1', '2015-03-10 02:33:59', '2015-03-10 06:31:15', 0),
(146, 39, 'anm@gmail.com', '10.0.0.10', '2015-03-10 03:22:19', '2015-03-11 05:15:16', 0),
(147, 42, 'ssr1@gmail.com', '127.0.0.1', '2015-03-10 06:36:58', '2015-03-10 07:36:14', 0),
(148, 43, 'bharati.srini@gmail.com', '127.0.0.1', '2015-03-11 02:55:37', '2015-03-11 04:42:50', 0),
(149, 39, 'anm@gmail.com', '10.0.0.10', '2015-03-11 05:14:23', '2015-03-11 05:15:16', 0),
(150, 39, 'anm@gmail.com', '10.0.0.10', '2015-03-11 05:15:50', '0000-00-00 00:00:00', 1),
(151, 44, 'abc@abc.com', '10.0.0.7', '2015-03-11 05:51:22', '0000-00-00 00:00:00', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=82 ;

--
-- Dumping data for table `farmhouse_debit_card_details`
--

INSERT INTO `farmhouse_debit_card_details` (`card_id`, `card_name`, `bank_name`, `image`, `status`, `date_added`, `date_modified`) VALUES
(78, '5460012354678541', 'SBI', 'bank-visa.png', 0, '2015-03-10 00:00:00', '0000-00-00 00:00:00'),
(79, '4560017189415412', 'Canara', 'bank-mastercard.png', 0, '2015-03-10 00:00:00', '0000-00-00 00:00:00'),
(80, '6541951008456213', 'ICICI', 'bank-visa.png', 0, '2015-03-10 00:00:00', '0000-00-00 00:00:00'),
(81, '7891456312038741', 'IDBI', 'bank-mastercard.png', 0, '2015-03-10 00:00:00', '0000-00-00 00:00:00');

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
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=188 ;

--
-- Dumping data for table `farmhouse_delivery_schedule`
--

INSERT INTO `farmhouse_delivery_schedule` (`trans_id`, `order_id`, `customer_id`, `product_type`, `delivery_date`, `delivery_address`, `delivery_status`, `delivered_date`, `address_delivered`, `carrier_id`, `no_people`, `no_detox`, `tmp_trans_id`, `tmp_life_id`) VALUES
(164, 0, 44, 'Detox-Middle Ag', '2015-03-11', '1', 0, '', '', 0, 1, 1, 133, 0),
(165, 0, 44, 'Detox-Middle Ag', '2015-03-14', '1', 0, '', '', 0, 1, 1, 133, 0),
(166, 0, 44, 'Detox-Middle Ag', '2015-03-16', '1', 0, '', '', 0, 1, 1, 133, 0),
(167, 0, 44, 'Detox-Middle Ag', '2015-03-18', '1', 0, '', '', 0, 1, 1, 133, 0),
(168, 0, 44, 'Detox-Middle Ag', '2015-03-21', '1', 0, '', '', 0, 1, 1, 133, 0),
(169, 0, 44, 'Detox-Middle Ag', '2015-03-23', '1', 0, '', '', 0, 1, 1, 133, 0),
(170, 0, 44, 'Detox-Middle Ag', '2015-03-11', '1', 0, '', '', 0, 2, 1, 133, 0),
(171, 0, 44, 'Detox-Middle Ag', '2015-03-14', '1', 0, '', '', 0, 2, 1, 133, 0),
(172, 0, 44, 'Detox-Middle Ag', '2015-03-16', '1', 0, '', '', 0, 2, 1, 133, 0),
(173, 0, 44, 'Detox-Middle Ag', '2015-03-18', '1', 0, '', '', 0, 2, 1, 133, 0),
(174, 0, 44, 'Detox-Middle Ag', '2015-03-21', '1', 0, '', '', 0, 2, 1, 133, 0),
(175, 0, 44, 'Detox-Middle Ag', '2015-03-23', '1', 0, '', '', 0, 2, 1, 133, 0),
(176, 0, 44, 'Detox-Middle Ag', '2015-03-11', '1', 0, '', '', 0, 3, 1, 133, 0),
(177, 0, 44, 'Detox-Middle Ag', '2015-03-14', '1', 0, '', '', 0, 3, 1, 133, 0),
(178, 0, 44, 'Detox-Middle Ag', '2015-03-16', '1', 0, '', '', 0, 3, 1, 133, 0),
(179, 0, 44, 'Detox-Middle Ag', '2015-03-18', '1', 0, '', '', 0, 3, 1, 133, 0),
(180, 0, 44, 'Detox-Middle Ag', '2015-03-21', '1', 0, '', '', 0, 3, 1, 133, 0),
(181, 0, 44, 'Detox-Middle Ag', '2015-03-23', '1', 0, '', '', 0, 3, 1, 133, 0),
(182, 0, 44, 'Detox-Middle Ag', '2015-03-11', '1', 0, '', '', 0, 4, 1, 133, 0),
(183, 0, 44, 'Detox-Middle Ag', '2015-03-14', '1', 0, '', '', 0, 4, 1, 133, 0),
(184, 0, 44, 'Detox-Middle Ag', '2015-03-16', '1', 0, '', '', 0, 4, 1, 133, 0),
(185, 0, 44, 'Detox-Middle Ag', '2015-03-18', '1', 0, '', '', 0, 4, 1, 133, 0),
(186, 0, 44, 'Detox-Middle Ag', '2015-03-21', '1', 0, '', '', 0, 4, 1, 133, 0),
(187, 0, 44, 'Detox-Middle Ag', '2015-03-23', '1', 0, '', '', 0, 4, 1, 133, 0);

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_detox_details`
--

CREATE TABLE IF NOT EXISTS `farmhouse_detox_details` (
  `detox_id` int(11) NOT NULL AUTO_INCREMENT,
  `detox_name` varchar(25) NOT NULL,
  `product_id1` int(4) NOT NULL DEFAULT '0',
  `product_name1` varchar(25) NOT NULL,
  `product_id2` int(4) NOT NULL DEFAULT '0',
  `product_name2` varchar(25) NOT NULL,
  `product_id3` int(4) NOT NULL DEFAULT '0',
  `product_name3` varchar(25) NOT NULL,
  `product_id4` int(4) NOT NULL DEFAULT '0',
  `product_name4` varchar(25) NOT NULL,
  `product_id5` int(4) NOT NULL DEFAULT '0',
  `product_name5` varchar(25) NOT NULL,
  `product_id6` int(4) NOT NULL DEFAULT '0',
  `product_name6` varchar(25) NOT NULL,
  `product_id7` int(4) NOT NULL DEFAULT '0',
  `product_name7` varchar(25) NOT NULL,
  `product_id8` int(4) NOT NULL DEFAULT '0',
  `product_name8` varchar(25) NOT NULL,
  `price` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  PRIMARY KEY (`detox_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=67 ;

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_detox_program`
--

CREATE TABLE IF NOT EXISTS `farmhouse_detox_program` (
  `detox_id` int(11) NOT NULL AUTO_INCREMENT,
  `detox_name` varchar(50) NOT NULL,
  `detox_items` text NOT NULL,
  `detox_price` decimal(11,0) NOT NULL,
  `title_1` varchar(100) NOT NULL,
  `discription_1` text NOT NULL,
  `title_2` varchar(100) NOT NULL,
  `discription_2` text NOT NULL,
  `title_3` varchar(100) NOT NULL,
  `discription_3` text NOT NULL,
  `ip` varchar(40) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_cahnged` datetime NOT NULL,
  PRIMARY KEY (`detox_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `farmhouse_detox_program`
--

INSERT INTO `farmhouse_detox_program` (`detox_id`, `detox_name`, `detox_items`, `detox_price`, `title_1`, `discription_1`, `title_2`, `discription_2`, `title_3`, `discription_3`, `ip`, `date_added`, `date_cahnged`) VALUES
(1, 'Old Age ', 'appy fizz,orange juice', '60', 'Tile -1 for Old Age', 'Description 1 for old age', 'Title 2 for Old Age ', 'Description 2 for Old Age', 'Title 3 for Old Age', 'Description 3 Old Age', '10.0.0.11', '2015-03-10 00:00:00', '0000-00-00 00:00:00'),
(2, 'Middle Age', 'maaza,appy fizz,orange juice', '80', 'Tilte 1 for Middle Age', 'Description 1 for middle age', 'Title 2 for MIddle Age', 'Description 2 for Middle Age', 'Title 3 for middle age', 'description 3 for middle age', '10.0.0.11', '2015-03-10 00:00:00', '0000-00-00 00:00:00'),
(3, 'Youth', 'cococola,sprite,maaza', '60', 'Title 1 for Youth', 'Description 1 for Youth', 'Title 2 for Youth', 'Description 2 for youth', 'Title 3 for Youth', 'Description 3 for Youth', '10.0.0.11', '2015-03-10 00:00:00', '0000-00-00 00:00:00'),
(4, 'Children', 'maaza,appy fizz,orange juice', '80', 'Title 1 for Children', 'Description 1 for Children', 'Title 2 for Children', 'Description 2 for Children', 'Title 3 for Children', 'Description 3 for Children', '10.0.0.11', '2015-03-10 00:00:00', '0000-00-00 00:00:00'),
(6, 'Detox for Adults', 'cococola,sprite,sprite,maaza,orange juice,orange juice', '130', 'Detox for Adults', 'Detox for Adults', 'Detox for Adults', 'Detox for Adults', 'Detox for Adults', 'Detox for Adults', '10.0.0.7', '2015-03-11 00:00:00', '0000-00-00 00:00:00');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `farmhouse_gift_card_details`
--

INSERT INTO `farmhouse_gift_card_details` (`product_id`, `name`, `quantity`, `image`, `price`, `status`, `date_added`, `date_modified`) VALUES
(62, 'Priya', 1, 'double-big-bottle-9.jpg', '90.0000', 0, '2015-03-10 00:00:00', '0000-00-00 00:00:00'),
(63, 'Nandini', 2, 'double-big-bottle-9.jpg', '100.0000', 0, '2015-03-10 00:00:00', '0000-00-00 00:00:00'),
(64, 'Manohar', 3, 'double-big-bottle-9.jpg', '200.0000', 0, '2015-03-10 00:00:00', '0000-00-00 00:00:00'),
(65, 'Suseela', 1, 'double-big-bottle-9.jpg', '80.0000', 0, '2015-03-10 00:00:00', '0000-00-00 00:00:00');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=71 ;

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_info_faq`
--

CREATE TABLE IF NOT EXISTS `farmhouse_info_faq` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `why_heading` varchar(225) NOT NULL,
  `why_image` varchar(50) NOT NULL,
  `why_discription` text NOT NULL,
  `how_heading` varchar(225) NOT NULL,
  `how_image` varchar(50) NOT NULL,
  `how_discription` text NOT NULL,
  `tips_heading` varchar(225) NOT NULL,
  `tips_image` varchar(50) NOT NULL,
  `tips_discription` text NOT NULL,
  `story_heading` varchar(22) NOT NULL,
  `story_image` varchar(50) NOT NULL,
  `story_discription` text NOT NULL,
  `tech_heading` varchar(225) NOT NULL,
  `tech_image` varchar(50) NOT NULL,
  `tech_discription` text NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_juice_details`
--

CREATE TABLE IF NOT EXISTS `farmhouse_juice_details` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `farmhouse_juice_details`
--

INSERT INTO `farmhouse_juice_details` (`product_id`, `name`, `quantity`, `image`, `price`, `weight`, `ingredients`, `benifits`, `nutritional_content`, `status`, `date_added`, `date_modified`, `image2`, `product_type`) VALUES
(1, 'cococola', 1, 'double-big-bottle-5.jpg', '20', '0', 'ingredients cococola', 'benefits cococola', 'nutritional content', 0, '2015-03-10 00:00:00', '0000-00-00 00:00:00', 'single-big-bottle-5.jpg', 'juice'),
(2, 'sprite', 1, 'double-big-bottle-1.jpg', '20', '0', 'ingredients sprite', 'benefits sprite', 'nutritional content sprite', 0, '2015-03-10 00:00:00', '0000-00-00 00:00:00', 'single-big-bottle-1.jpg', 'juice'),
(3, 'maaza', 1, 'double-big-bottle-2.jpg', '20', '0', 'ingredients maaza', 'BENEFITS MAAZA', 'nutritional content maaza', 0, '2015-03-10 00:00:00', '0000-00-00 00:00:00', 'single-big2-bottle-2.jpg', 'juice'),
(4, 'appy fizz', 1, 'double-big-bottle-6.jpg', '30', '0', 'ingredients  appy fizz', 'benefits appy fizz', 'nutritional content appy fizz', 0, '2015-03-10 00:00:00', '0000-00-00 00:00:00', 'single-bottle-rotated-6.png', 'juice'),
(5, 'orange juice', 1, 'double-big-bottle-4.jpg', '30', '0', 'ingredients orange juice', 'benefits orange juice', 'nutritional content orange juice', 0, '2015-03-10 00:00:00', '0000-00-00 00:00:00', 'single-big2-bottle-2.jpg', 'juice'),
(6, 'Slice', 1, 'double-big-bottle-4.jpg', '80', '0', '0', '0', 'Slice', 0, '2015-03-10 00:00:00', '0000-00-00 00:00:00', 'single-big2-bottle-4.jpg', 'juice'),
(7, 'Maaza', 2, 'double-big-bottle-7.jpg', '40', '300', 'gOOD FOR HEALTH', 'gOOD bENEFITS', 'gOOD nc', 0, '2015-03-11 00:00:00', '0000-00-00 00:00:00', 'single-big2-bottle-7.jpg', 'juice');

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_lifestyle_details`
--

CREATE TABLE IF NOT EXISTS `farmhouse_lifestyle_details` (
  `lifestyle_id` int(11) NOT NULL AUTO_INCREMENT,
  `lifestyle_name` varchar(25) NOT NULL,
  `product_id1` int(4) NOT NULL DEFAULT '0',
  `product_name1` varchar(25) NOT NULL,
  `product_id2` int(4) NOT NULL DEFAULT '0',
  `product_name2` varchar(25) NOT NULL,
  `product_id3` int(4) NOT NULL DEFAULT '0',
  `product_name3` varchar(25) NOT NULL,
  `product_id4` int(4) NOT NULL DEFAULT '0',
  `product_name4` varchar(25) NOT NULL,
  `product_id5` int(4) NOT NULL DEFAULT '0',
  `product_name5` varchar(25) NOT NULL,
  `product_id6` int(4) NOT NULL DEFAULT '0',
  `product_name6` varchar(25) NOT NULL,
  `product_id7` int(4) NOT NULL DEFAULT '0',
  `product_name7` varchar(25) NOT NULL,
  `product_id8` int(4) NOT NULL DEFAULT '0',
  `product_name8` varchar(25) NOT NULL,
  `price` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  PRIMARY KEY (`lifestyle_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61 ;

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_lifestyle_program`
--

CREATE TABLE IF NOT EXISTS `farmhouse_lifestyle_program` (
  `lifestyle_id` int(11) NOT NULL AUTO_INCREMENT,
  `lifestyle_name` varchar(50) NOT NULL,
  `lifestyle_items` text NOT NULL,
  `lifestyle_price` decimal(11,0) NOT NULL,
  `title_1` varchar(100) NOT NULL,
  `discription_1` text NOT NULL,
  `title_2` varchar(100) NOT NULL,
  `discription_2` text NOT NULL,
  `title_3` varchar(100) NOT NULL,
  `discription_3` text NOT NULL,
  `ip` varchar(40) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_cahnged` datetime NOT NULL,
  PRIMARY KEY (`lifestyle_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `farmhouse_lifestyle_program`
--

INSERT INTO `farmhouse_lifestyle_program` (`lifestyle_id`, `lifestyle_name`, `lifestyle_items`, `lifestyle_price`, `title_1`, `discription_1`, `title_2`, `discription_2`, `title_3`, `discription_3`, `ip`, `date_added`, `date_cahnged`) VALUES
(3, 'Old Age ', 'maaza,appy fizz,orange juice', '80', 'Title 1 for Old Age', 'Description 1 for Old age', 'Title 2 for Old age', 'Description 2 for Old age', 'Title 3 for Old age', 'Description 3 for Old age', '10.0.0.11', '2015-03-10 00:00:00', '0000-00-00 00:00:00'),
(4, 'Middle Age', 'sprite,maaza,appy fizz', '70', 'Title 1 for Middle Age', 'Description 1 for Middle Age', 'Title 2 for Middle Age', 'Description 2for Middle Age', 'Title 3 for Middle Age', 'Description 3 for Middle Age', '10.0.0.11', '2015-03-10 00:00:00', '0000-00-00 00:00:00'),
(5, 'Youth', 'cococola,sprite,maaza', '60', 'Title 1 for Youth', 'Description 1 for Youth', 'Title 2 for Youth', 'Description 2 for Youth', 'Title 3 for Youth', 'Description 3 for Youth', '10.0.0.11', '2015-03-10 00:00:00', '0000-00-00 00:00:00'),
(6, 'Children', 'sprite,appy fizz,orange juice', '80', 'Title 1 for Children', 'Desription 1 for children', 'Title 2 for Children', 'Desription 2 for children', 'Title 3 for Children', 'Desription 3 for children', '10.0.0.11', '2015-03-10 00:00:00', '0000-00-00 00:00:00'),
(7, 'Old Age ', 'maaza,appy fizz,orange juice', '80', 'Title 1 for Old age', 'Description 1 for Old Age', 'Title 2 for Old age', 'Description 2 for Old Age', 'Title 3 for Old age', 'Description 3 for Old Age', '10.0.0.11', '2015-03-10 00:00:00', '0000-00-00 00:00:00'),
(8, 'Life Style For ever 21', 'cococola,sprite,orange juice,orange juice,Maaza', '120', 'Life Style For ever 21', 'Life Style For ever 21', 'Life Style For ever 21', 'Life Style For ever 21', 'Life Style For ever 21', 'Life Style For ever 21', '10.0.0.7', '2015-03-11 00:00:00', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=134 ;

--
-- Dumping data for table `farmhouse_temp_cart_fh`
--

INSERT INTO `farmhouse_temp_cart_fh` (`trans_id`, `product_image_url`, `product_price`, `no_items`, `total_item_amount`, `ip`, `product_id`, `product_name`, `customer_id`, `ordered_num_of_people`, `ordered_day_beauty`, `ordered_grand_total`, `order_same_amount_for_everybody`, `payment_method`, `payment_type`, `card_name`, `date_added`, `order_name`, `address`, `gift_card_no`, `temp_order_no`) VALUES
(119, 'product_images/double-big-bottle-5.jpg', 20, 0, 0, '127.0.0.1', '1', 'cococola', '40', 0, 0, '0.0000', '', '', '', '', '2015-03-10 19:21:14', '******', 'fsdfgfd', '', 0),
(121, 'product_images/double-big-bottle-6.jpg', 30, 0, 0, '127.0.0.1', '4', 'appy fizz', '40', 0, 0, '0.0000', '', '', '', '', '2015-03-10 19:43:29', '******', 'fsdfgfd', '', 0),
(122, 'product_images/double-big-bottle-5.jpg', 20, 0, 0, '10.0.0.10', '1', 'cococola', '36', 0, 0, '0.0000', '', '', '', '', '2015-03-10 19:50:58', '******', '#50-15-10,\nakkayyapalem,\nvisakhapatnam-16', '', 0),
(125, 'product_images/double-big-bottle-1.jpg', 20, 0, 0, '127.0.0.1', '2', 'sprite', '40', 0, 0, '0.0000', '', '', '', '', '2015-03-10 20:43:29', '******', 'fsdfgfd', '', 0);

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
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=134 ;

--
-- Dumping data for table `farmhouse_temp_schedule_detox`
--

INSERT INTO `farmhouse_temp_schedule_detox` (`trans_id`, `customer_id`, `detox_id`, `detox_name`, `detox_price`, `no_people`, `no_days_detox`, `detox_hydrator_id`, `detox_hydrator_qty`, `detox_hydrator_price`, `detox_total`, `ordered_date`, `delivery_start_date`, `detox_person_no`, `delivery_dates`, `ip`, `status`, `delivery_address`, `payment_method`, `payment_type`, `card_name`, `product_image_url`, `address_id`) VALUES
(131, 39, 1, 'Detox-Old Age ', 60, 3, 6, 0, 0, '0', '1080', '2015-03-11 09:52:32', '0000-00-00 00:00:00', '3', '2015-03-11,2015-03-14', '10.0.0.10', 0, '1', 'Debit Card', 'Pay online', '4560017189415412,bank-mas', '', '1,1'),
(133, 44, 2, 'Detox-Middle Age', 80, 4, 16, 0, 0, '0', '5120', '2015-03-11 10:59:14', '0000-00-00 00:00:00', '4', '2015-03-11,2015-03-14,2015-03-16,2015-03-18,2015-03-21,2015-03-23', '10.0.0.7', 0, '1', '', '', '', '', '1,1,1,1,1,1');

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
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `farmhouse_temp_schedule_lifestyle`
--

INSERT INTO `farmhouse_temp_schedule_lifestyle` (`trans_id`, `customer_id`, `lifestyle_id`, `lifestyle_name`, `lifestyle_price`, `no_people`, `no_days_beauty`, `lifestyle_total`, `ordered_date`, `delivery_start_date`, `lifestyle_person_no`, `delivery_dates`, `ip`, `status`, `delivery_address`, `payment_method`, `payment_type`, `card_name`) VALUES
(18, 36, 5, 'Youth', 60, 1, 1, '60', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '2015-03-11', '', 0, '1', '', '', '');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `farmhouse_third_party_payment_details`
--

INSERT INTO `farmhouse_third_party_payment_details` (`tpp_id`, `tpp_name`, `image`, `status`, `date_added`, `date_modified`) VALUES
(61, 'Divya', 'bank-alipay.png', 0, '2015-03-10 00:00:00', '0000-00-00 00:00:00'),
(62, 'Shirisha', 'bank-alipay.png', 0, '2015-03-10 00:00:00', '0000-00-00 00:00:00'),
(63, 'Niha', 'bank-alipay.png', 0, '2015-03-10 00:00:00', '0000-00-00 00:00:00'),
(64, 'Haritha', 'bank-alipay.png', 0, '2015-03-10 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_user_city`
--

CREATE TABLE IF NOT EXISTS `farmhouse_user_city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(25) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `farmhouse_user_city`
--

INSERT INTO `farmhouse_user_city` (`city_id`, `city_name`) VALUES
(3, 'vizag'),
(4, 'Hyderabad'),
(5, '&#30719;&#27849;&#27700;'),
(6, '&#35199;&#29916;&#27713;'),
(7, 'vizag'),
(8, 'Srikakulam'),
(9, 'Vizag'),
(10, 'Vijyanagaram'),
(11, 'Srikakulam'),
(12, 'Ongole'),
(13, 'Vizag'),
(14, 'Vijayanagaram'),
(15, 'Srikakulam'),
(16, 'New China Town city'),
(17, 'China city 2');

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
(1, '40', 'Detox-Myown-40', 'sprite,maaza', '40', '127.0.0.1', '2015-03-10 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `farmhouse_user_district`
--

CREATE TABLE IF NOT EXISTS `farmhouse_user_district` (
  `district_id` int(11) NOT NULL AUTO_INCREMENT,
  `district` varchar(25) NOT NULL,
  PRIMARY KEY (`district_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `farmhouse_user_district`
--

INSERT INTO `farmhouse_user_district` (`district_id`, `district`) VALUES
(3, 'andhra'),
(4, 'telagana'),
(5, '&#21322;&#31958;'),
(6, '&#40657;&#21654;&#21857;'),
(7, '&#33590;'),
(8, '&#20044;&#40857;&#33590;'),
(9, 'vizag'),
(10, 'Visakhapatnam'),
(11, 'Vijayanagaram'),
(12, 'Srikakulam'),
(13, 'Ongole'),
(16, 'Visakhapatnam'),
(17, 'Vijayanagaram'),
(18, 'Srikakulam'),
(19, 'china new district');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `farmhouse_user_lifestyle_program`
--

INSERT INTO `farmhouse_user_lifestyle_program` (`trans_id`, `customer_id`, `lifestyle_name`, `lifestyle_items`, `lifestyle_price`, `ip`, `date_added`, `date_cahnged`) VALUES
(1, '43', 'LS-Myown-43', 'maaza,appy fizz,orange juice,Slice,sprite,cococola', '200', '127.0.0.1', '2015-03-11 00:00:00', '0000-00-00 00:00:00'),
(2, '44', 'LS-Myown-44', 'sprite,orange juice,appy fizz,Maaza', '120', '10.0.0.7', '2015-03-11 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `internet_shop`
--

CREATE TABLE IF NOT EXISTS `internet_shop` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `img` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `img` (`img`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

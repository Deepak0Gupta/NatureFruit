-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 11, 2020 at 09:15 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `vkey` varchar(45) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `createdate` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `phone_number` bigint(255) NOT NULL DEFAULT '0',
  `date_of_birth` varchar(20) NOT NULL DEFAULT '00',
  `birthday_month` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`uid`, `username`, `password`, `email`, `vkey`, `verified`, `createdate`, `phone_number`, `date_of_birth`, `birthday_month`) VALUES
(7, 'relwinesthak', '25d55ad283aa400af464c76d713c07ad', 'relwinesthak123@gmai.com', '5fa4d3043cbe6af7a67a1dc55dc1829a', 1, '2019-12-13 06:43:45.068449', 1234567890, '2000-08-10', '08-10'),
(6, 'deepak123', '25d55ad283aa400af464c76d713c07ad', 'dg82680100@gmail.com', 'aa0a7c97b2c498287da468ce4bc45c7d', 1, '2019-12-07 09:31:31.092689', 8268010014, '2008-12-19', '12-19'),
(13, 'Deepak Gupta', '25d55ad283aa400af464c76d713c07ad', 'dg82680100@gmail.com', '100966856792246840620', 1, '2019-12-20 09:25:35.351272', 8268010014, '2000-08-28', '08-28'),
(15, 'manishpal', '05256cf70826bea62176cc87f245c184', 'mandy678pal@gmail.com', 'e1123378bcda98e46fa85f3d6ffcf685', 1, '2019-12-31 11:39:29.032363', 3698521479, '2020-01-04', ''),
(16, 'acelon123', '6ef98fcede6dc471fff101a6f1b8ab32', 'acelon12321@gmail.com', 'fb7001c0935ebb15bbaff129f032382c', 1, '2019-12-31 11:43:32.911143', 0, '1998-01-16', ''),
(21, 'Deepak Gupta', 'bbf3ae96c4292724ff533b55e764054f', 'dg82680100@gmail.com', '100966856792246840620', 1, '2020-09-28 09:03:00.082575', 0, '00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

DROP TABLE IF EXISTS `admin_login`;
CREATE TABLE IF NOT EXISTS `admin_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL DEFAULT 'admin',
  `password` varchar(20) NOT NULL DEFAULT 'admin',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES
(1, 'nature', 'fruit');

-- --------------------------------------------------------

--
-- Table structure for table `apriori-algorithm`
--

DROP TABLE IF EXISTS `apriori-algorithm`;
CREATE TABLE IF NOT EXISTS `apriori-algorithm` (
  `product_name` varchar(50) NOT NULL,
  `recoment` varchar(50) NOT NULL,
  `confidance` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apriori-algorithm`
--

INSERT INTO `apriori-algorithm` (`product_name`, `recoment`, `confidance`) VALUES
('Oranges,Papayas', 'Indian Apples', '100'),
('Oranges,Papayas', 'Indian Peirs', '100'),
('Oranges,Papayas', 'Indian Peirs,Indian Apples', '100'),
('Oranges,Indian Peirs,Papayas', 'Indian Apples', '100'),
('Indian Peirs,Indian Apples', 'Papayas', '100'),
('Indian Peirs,Indian Apples', 'Oranges', '100'),
('Indian Peirs,Indian Apples', 'Oranges,Papayas', '100'),
('Oranges,Indian Apples', 'Papayas', '100'),
('Oranges,Indian Apples', 'Indian Peirs', '100'),
('Oranges,Indian Apples', 'Indian Peirs,Papayas', '100'),
('Oranges,Indian Peirs,Indian Apples', 'Papayas', '100'),
('Oranges', 'Indian Peirs', '100'),
('Oranges,Papayas,Indian Apples', 'Indian Peirs', '100'),
('Indian Peirs,Papayas,Indian Apples', 'Oranges', '100'),
('Sapota(Chiku),Red Grapes', 'Sweet Lemon', '100'),
('Indian Peirs,Sapota(Chiku)', 'Sweet Lemon', '75'),
('Indian Peirs,Sapota(Chiku),Red Grapes', 'Sweet Lemon', '100'),
('Sweet Lemon,Red Grapes', 'Sapota(Chiku)', '100'),
('Indian Peirs,Sweet Lemon', 'Sapota(Chiku)', '75'),
('Indian Peirs,Sweet Lemon,Red Grapes', 'Sapota(Chiku)', '100'),
('Indian Figs', 'Musk Mellon', '80'),
('Musk Mellon', 'Indian Figs', '100'),
('Red Grapes,Musk Mellon', 'Indian Figs', '100'),
('Red Grapes,Musk Mellon', 'Indian Peirs', '100'),
('Red Grapes,Musk Mellon', 'Indian Peirs,Indian Figs', '100'),
('Indian Peirs,Musk Mellon', 'Indian Figs', '100'),
('Indian Peirs,Musk Mellon', 'Red Grapes', '100'),
('Indian Peirs,Musk Mellon', 'Red Grapes,Indian Figs', '100'),
('Indian Peirs,Red Grapes,Musk Mellon', 'Indian Figs', '100'),
('Red Grapes,Indian Figs', 'Musk Mellon', '100'),
('Red Grapes,Indian Figs', 'Indian Peirs', '100'),
('Red Grapes,Indian Figs', 'Indian Peirs,Musk Mellon', '100'),
('Indian Peirs,Indian Figs', 'Musk Mellon', '100'),
('Indian Peirs,Indian Figs', 'Red Grapes', '100'),
('Indian Peirs,Indian Figs', 'Red Grapes,Musk Mellon', '100'),
('Indian Peirs,Red Grapes,Indian Figs', 'Musk Mellon', '100'),
('Indian Peirs,Musk Mellon,Indian Figs', 'Red Grapes', '100'),
('Red Grapes,Musk Mellon,Indian Figs', 'Indian Peirs', '100'),
('Kiwi fruit,Sweet Lemon', 'Dragon Fruit', '100'),
('Sweet Lemon,Dragon Fruit', 'Kiwi fruit', '100'),
('Kiwi fruit,Papayas', 'RoyalGala Apples', '100'),
('Kiwi fruit,RoyalGala Apples', 'Papayas', '100'),
('Â Oranges', 'Black Graphes', '100'),
('Â Oranges', 'Pomogranet', '100'),
('Â Oranges', 'Pomogranet,Black Graphes', '100'),
('Pomogranet,Black Graphes', 'Â Oranges', '100'),
('Pomogranet,Â Oranges', 'Black Graphes', '100'),
('Black Graphes,Â Oranges', 'Pomogranet', '100'),
('PLUM,Sweet Lemon', 'Red Grapes', '100'),
('PLUM,Sweet Lemon', 'Sapota(Chiku)', '100'),
('PLUM,Sweet Lemon', 'Sapota(Chiku),Red Grapes', '100'),
('PLUM,Sapota(Chiku)', 'Red Grapes', '100'),
('PLUM,Sapota(Chiku)', 'Sweet Lemon', '100'),
('PLUM,Sapota(Chiku)', 'Sweet Lemon,Red Grapes', '100'),
('PLUM,Sapota(Chiku),Sweet Lemon', 'Red Grapes', '100'),
('PLUM,Red Grapes', 'Sweet Lemon', '100'),
('PLUM,Red Grapes', 'Sapota(Chiku)', '100'),
('PLUM,Red Grapes', 'Sapota(Chiku),Sweet Lemon', '100'),
('PLUM,Sapota(Chiku),Red Grapes', 'Sweet Lemon', '100'),
('PLUM,Sweet Lemon,Red Grapes', 'Sapota(Chiku)', '100'),
('PLUM,RoyalGala Apples', 'Custered Apples', '100'),
('Custered Apples,RoyalGala Apples', 'PLUM', '100'),
('Sapota(Chiku),Green Graphes', 'Indian Oranges', '100'),
('Indian Oranges,Green Graphes', 'Sapota(Chiku)', '100'),
('Red Grapes,Papayas', 'Indian Apples', '100'),
('Red Grapes,Indian Apples', 'Papayas', '100'),
('Indian Oranges,Musk Mellon', 'Indian Figs', '100'),
('Indian Oranges,Indian Figs', 'Musk Mellon', '100'),
('Indian Apples,Strawberry', 'Green Graphes', '100'),
('Indian Apples,Green Graphes', 'Strawberry', '100'),
('Strawberry,Green Graphes', 'Indian Apples', '100'),
('Blue Berry', 'Durian Fruit', '100'),
('Durian Fruit', 'Blue Berry', '100'),
('Washington Apples,Durian Fruit', 'Blue Berry', '100'),
('Washington Apples,Blue Berry', 'Durian Fruit', '100'),
('Avacados,Durian Fruit', 'Blue Berry', '100'),
('Avacados,Durian Fruit', 'Dragon Fruit', '100'),
('Avacados,Durian Fruit', 'Dragon Fruit,Blue Berry', '100'),
('Dragon Fruit,Durian Fruit', 'Blue Berry', '100'),
('Dragon Fruit,Durian Fruit', 'Avacados', '100'),
('Dragon Fruit,Durian Fruit', 'Avacados,Blue Berry', '100'),
('Dragon Fruit,Avacados,Durian Fruit', 'Blue Berry', '100'),
('Avacados,Blue Berry', 'Durian Fruit', '100'),
('Avacados,Blue Berry', 'Dragon Fruit', '100'),
('Avacados,Blue Berry', 'Dragon Fruit,Durian Fruit', '100'),
('Dragon Fruit,Blue Berry', 'Durian Fruit', '100'),
('Dragon Fruit,Blue Berry', 'Avacados', '100'),
('Dragon Fruit,Blue Berry', 'Avacados,Durian Fruit', '100'),
('Dragon Fruit,Avacados,Blue Berry', 'Durian Fruit', '100'),
('Avacados', 'Dragon Fruit', '100'),
('Dragon Fruit,Durian Fruit,Blue Berry', 'Avacados', '100'),
('Avacados,Durian Fruit,Blue Berry', 'Dragon Fruit', '100'),
('Strawberry,Custered Apples', 'Black Graphes', '100'),
('Strawberry,Black Graphes', 'Custered Apples', '100'),
('Custered Apples,Black Graphes', 'Strawberry', '100');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(50) NOT NULL,
  `product_id` int(50) NOT NULL,
  `product_title` varchar(20) NOT NULL,
  `p_quantity` varchar(50) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `product_id` (`product_id`),
  KEY `uid_2` (`uid`),
  KEY `product_title` (`product_title`)
) ENGINE=MyISAM AUTO_INCREMENT=130 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(100) NOT NULL AUTO_INCREMENT,
  `cat_title` text NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'onsale'),
(2, 'apples'),
(3, 'rarefruits'),
(4, 'mostpurchsed'),
(5, 'seasnalfruits'),
(6, 'newproduct');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

DROP TABLE IF EXISTS `chats`;
CREATE TABLE IF NOT EXISTS `chats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `user` longtext NOT NULL,
  `chatbot` longtext NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=95 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `username`, `user`, `chatbot`, `date`) VALUES
(87, 'acelon123', 'what should i buy today', '1', '2020-01-21 14:39:41'),
(92, 'deepak123', 'how are you', 'i am fine', '2020-02-01 06:49:04'),
(91, 'deepak123', 'will i get the fresh fruits ?', 'yes you will', '2020-02-01 06:48:56');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

DROP TABLE IF EXISTS `contactus`;
CREATE TABLE IF NOT EXISTS `contactus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(45) NOT NULL,
  `massage` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `massage`) VALUES
(1, 'deepakgupta', 'dg82680100@gmail.com', 'hi my name  is deepak'),
(2, 'deepakgupta', 'dg82680100@gmail.com', 'hi my name  is deepak'),
(3, 'deepakgupta', 'dg82680100@gmail.com', 'hi my name  is deepak'),
(4, 'deepakgupta', 'dg82680100@gmail.com', 'hello i am deepak'),
(5, 'deepakgupta', 'dg82680100@gmail.com', 'hello i am deepak'),
(6, 'deepak123', 'dg82680100@gmail.com', 'hello testing for email'),
(7, 'deepak123', 'dg82680100@gmail.com', 'hello manish'),
(8, 'deepak gupta', 'dg82680100@gmail.com', 'hello thank you'),
(9, 'deepak gupta', 'dg82680100@gmail.com', 'hello my name is deepak');

-- --------------------------------------------------------

--
-- Table structure for table `dataset`
--

DROP TABLE IF EXISTS `dataset`;
CREATE TABLE IF NOT EXISTS `dataset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(20) NOT NULL,
  `pqty` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dataset`
--

INSERT INTO `dataset` (`id`, `pname`, `pqty`) VALUES
(7, 'Pomogranet', 1),
(6, 'Kiwi fruit', 5),
(3, 'Kiwi fruit', 1),
(4, 'Sapota(Chiku)', 1),
(5, 'Papayas', 1),
(8, 'Kiwi fruit', 1),
(9, 'Indian Figs', 1),
(10, 'Pomogranet', 1),
(11, 'Kiwi fruit', 1),
(12, 'Indian Figs', 1),
(13, 'Pomogranet', 1),
(14, 'Sweet Lemon', 1),
(15, 'Kiwi fruit', 1),
(16, 'Pomogranet', 1),
(17, 'Kiwi fruit', 1),
(18, 'Indian Peirs', 1),
(19, 'Papayas', 1),
(20, 'Red Grapes', 1),
(21, 'PLUM', 1),
(22, 'Musk Mellon', 1),
(23, 'Indian Oranges', 1),
(24, 'Indian Figs', 1),
(25, 'Strawberry', 1),
(26, 'Papayas', 1),
(27, 'Indian Figs', 1),
(28, 'Sweet Lemon', 1),
(29, 'Indian Apples', 1),
(30, 'Pomogranet', 1),
(31, 'Kiwi fruit', 1),
(32, 'Red Grapes', 1),
(33, 'Sweet Lemon', 1),
(34, 'Indian Peirs', 1),
(35, 'Sapota(Chiku)', 1),
(36, 'Indian Figs', 1),
(37, 'PLUM', 1),
(38, 'Red Grapes', 1),
(39, 'Sweet Lemon', 1),
(40, 'Indian Peirs', 1),
(41, 'Sapota(Chiku)', 1),
(42, 'Musk Mellon', 1),
(43, 'Indian Figs', 1),
(44, 'PLUM', 1),
(45, 'Red Grapes', 1),
(46, 'Sweet Lemon', 1),
(47, 'Indian Peirs', 1),
(48, 'Sapota(Chiku)', 1),
(49, 'Musk Mellon', 1),
(50, 'Indian Figs', 1),
(51, 'PLUM', 1),
(52, 'Red Grapes', 1),
(53, 'Sweet Lemon', 1),
(54, 'Indian Peirs', 1),
(55, 'Sapota(Chiku)', 1),
(56, 'Musk Mellon', 1),
(57, 'Indian Figs', 1),
(58, 'PLUM', 1),
(59, 'Red Grapes', 1),
(60, 'Sweet Lemon', 1),
(61, 'Indian Peirs', 1),
(62, 'Sapota(Chiku)', 1),
(63, 'Musk Mellon', 1),
(64, 'Black Graphes', 1),
(65, 'Indian Peirs', 1),
(66, 'Sapota(Chiku)', 1),
(67, 'Sweet Lemon', 1),
(68, 'Indian Peirs', 1),
(69, 'Papayas', 1),
(70, 'Sapota(Chiku)', 1),
(71, 'Indian Peirs', 1),
(72, 'Sweet Lemon', 1),
(73, 'Sapota(Chiku)', 1),
(74, 'Indian Peirs', 1),
(75, 'Pomogranet', 1),
(76, 'Indian Peirs', 3);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `product_name` longtext NOT NULL,
  `total_price` int(11) NOT NULL,
  `product_total_price` int(11) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL DEFAULT 'Kandivali (West),Mumbai - 400067',
  `order_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `username`, `product_name`, `total_price`, `product_total_price`, `address1`, `city`, `order_date`) VALUES
(31, 'deepak123', 'Pomogranet(2)', 330, 300, 'sai nager tulasker wadi', 'Kandivali (West),Mumbai - 400067', '2020-01-20 17:09:52.866117'),
(32, 'deepak123', 'Kiwi fruit(1)', 231, 210, 'dfghjk,jmnmnmnhhhhtrtght', 'Kandivali (West),Mumbai - 400067', '2020-01-20 17:55:19.931129'),
(33, 'deepak123', 'Avacados(5)', 3540, 3000, '123, sai nager ', 'Kandivali (West),Mumbai - 400067', '2020-01-23 12:54:48.728981'),
(34, 'deepak123', 'Pomogranet(1), Indian Peirs(1)', 375, 318, 'asdfghjksdfghjmfg', 'Kandivali (West),Mumbai - 400067', '2020-02-03 08:07:07.620869'),
(35, 'deepak123', 'Indian Peirs(1)', 198, 168, 'dfghjn,nkhbjjjjjjj', 'Kandivali (West),Mumbai - 400067', '2020-02-03 08:19:35.189854'),
(36, 'deepak123', 'Pomogranet(1), Kiwi fruit(1)', 425, 360, 'mere ghar pe', 'Kandivali (West),Mumbai - 400067', '2020-02-03 08:20:26.619478'),
(37, 'deepak123', 'Sweet Lemon(1), Pomogranet(1)', 472, 400, 'la dgjdfkhcv vcvcfhfd', 'Kandivali (West),Mumbai - 400067', '2020-02-03 08:23:35.404969'),
(38, 'deepak123', 'Kiwi fruit(1), Sapota(Chiku)(1), Papayas(1)', 519, 440, 'ghxghjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 'Kandivali (West),Mumbai - 400067', '2020-02-03 08:39:04.747267'),
(39, 'deepak123', 'Pomogranet(1), Kiwi fruit(1), Indian Figs(1)', 720, 610, '793, sai nager tulasker wadi ', 'Kandivali (West),Mumbai - 400067', '2020-03-01 13:25:11.353184'),
(40, 'deepak123', 'Pomogranet(1), Sweet Lemon(1), Kiwi fruit(1)', 720, 610, 'tcfdfhidhifgjdfgrhdfh', 'Kandivali (West),Mumbai - 400067', '2020-03-01 13:26:41.507432'),
(41, 'deepak123', 'Pomogranet(1), Kiwi fruit(1), Indian Peirs(1)', 623, 528, 'lihifdgkldfnldfnldfnldfnldfnldfnldfnldfnldfnldfnldfnldfnldfn', 'Kandivali (West),Mumbai - 400067', '2020-03-01 13:28:05.345478'),
(42, 'deepak123', 'Papayas(1), Red Grapes(1), PLUM(1)', 684, 580, 'iouiuyhfgdsdbvcnnnnnnn', 'Kandivali (West),Mumbai - 400067', '2020-03-01 13:30:13.789572'),
(43, 'deepak123', 'Musk Mellon(1), Indian Oranges(1), Indian Figs(1)', 578, 490, 'olkujyhtgbfvtmhthtnfgnrrhrg', 'Kandivali (West),Mumbai - 400067', '2020-03-01 13:32:55.294242'),
(44, 'deepak123', 'Strawberry(1), Papayas(1)', 448, 380, 'poiuhgfdasdcvb kjhgcfdhdf', 'Kandivali (West),Mumbai - 400067', '2020-03-01 13:33:46.657031'),
(45, 'deepak123', 'Indian Figs(1), Sweet Lemon(1)', 590, 500, 'uhgbcnzvvvvvvvvvvv', 'Kandivali (West),Mumbai - 400067', '2020-03-01 13:34:18.131930'),
(46, 'deepak123', 'Indian Apples(1), Pomogranet(1), Kiwi fruit(1)', 614, 520, 'siugfgmdkfgjldjldfbjdffb', 'Kandivali (West),Mumbai - 400067', '2020-04-01 10:45:29.224898'),
(47, 'deepak123', 'Indian Figs(1), PLUM(1), Red Grapes(1), Sweet Lemon(1), Indian Peirs(1), Sapota(Chiku)(1), Musk Mellon(1)', 1650, 1398, 'bvzxghfgnfxfhn xfgffgjxfgjfgj', 'Kandivali (West),Mumbai - 400067', '2020-04-01 10:52:34.353303'),
(48, 'deepak123', 'Black Graphes(1), Indian Peirs(1)', 411, 348, 'yhifyihvhkb ur7 d dt utd  r', 'Kandivali (West),Mumbai - 400067', '2020-04-01 11:35:00.801492'),
(49, 'deepak123', 'Sapota(Chiku)(1), Sweet Lemon(1), Indian Peirs(1)', 670, 568, 'ikdytdytdytdytdytmb xfffhgzfgn zdfhgdghfn ', 'Kandivali (West),Mumbai - 400067', '2020-04-01 11:36:45.692671'),
(50, 'deepak123', 'Papayas(1), Sapota(Chiku)(1), Indian Peirs(1)', 470, 398, 'guguvh hoyifg dlihl d foiyfghdfgndf', 'Kandivali (West),Mumbai - 400067', '2020-04-01 11:38:22.413150'),
(51, 'deepak123', 'Sweet Lemon(1), Sapota(Chiku)(1), Indian Peirs(1)', 670, 568, 'khhkbzdb dfvbhkvsd bdskvh  dvhkdsgs', 'Kandivali (West),Mumbai - 400067', '2020-04-01 11:51:18.215244'),
(52, 'Deepak Gupta', 'Pomogranet(1), Indian Peirs(3)', 772, 654, '108, harrittage parodi number 1 sai nagar', 'Kandivali (West),Mumbai - 400067', '2020-09-28 09:04:51.100762');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(100) NOT NULL AUTO_INCREMENT,
  `product_cat` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `product_quantity` int(50) NOT NULL,
  `product_discount` varchar(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`product_id`),
  KEY `product_cat` (`product_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_title`, `product_price`, `product_desc`, `product_image`, `active`, `product_quantity`, `product_discount`) VALUES
(1, 1, '  Oranges', 248, 'big and jucy oranges of egypt              ', 'ORANGE.jpg', 1, 0, '25'),
(2, 1, 'Indian Peirs', 240, 'fresh jusy peirs form north india                                                            ', 'PEIRS.jpg', 1, 1, '30'),
(3, 1, 'Kiwi fruit', 300, 'fresh zespery kiwis from newzeland', 'KIWI.jpg', 1, 0, '30'),
(4, 1, 'Pomogranet', 200, 'big and jusy pomogranets of india', 'POMOGRANET.jpg', 1, 10, '25'),
(5, 6, 'Papayas', 80, 'sweet and fresh papayas', 'papaya.jpg', 1, 36, '0'),
(6, 6, 'Sapota(Chiku)', 150, 'fresh and big sapotas fom Gujrat                 ', 'sapota fruit.jpg', 1, 10, '0'),
(7, 6, 'Sweet Lemon', 250, 'Best Sweet Lemons from panjab   ', 'MOSAMBI.jpg', 1, 14, '0'),
(8, 6, 'Red Grapes', 250, 'Imported Red Grephes From Australiya             ', 'grapes-red-globe.jpg', 1, 23, '0'),
(10, 6, 'Indian Oranges', 160, 'fresh oranges from nagpur                   ', 'Indian Oranges.jpg', 1, 19, '0'),
(11, 6, 'Musk Mellon', 80, 'fresh and jusy musk mellons from north india                                 ', 'MUSK MELLON1.jpg', 1, 38, '0'),
(12, 6, 'Indian Figs', 250, 'Best high Quality indian figs               ', 'figs.jpg', 1, 1, '0'),
(13, 2, 'Indian Apples', 160, 'Best Top Quality Kashmir Apples         ', 'apple_red_delicious.jpg', 1, 19, '0'),
(14, 2, 'RoyalGala Apples', 200, 'Best Top Quality RoyalGala Apples Apples             ', 'APPLE ROYAL GALA.jpg', 1, 25, '0'),
(15, 2, 'Washington Apples', 240, 'Best Top Quality Washington Apples             ', 'Washington Apples.jpg', 1, 25, '0'),
(16, 2, 'Green Apples', 280, 'Best Top Quality Green Apples                 ', 'greenapple.jpg', 1, 20, '0'),
(17, 3, 'Dragon Fruit', 200, 'dragon fruit is very use full when you are suffring from dengue or maleria', 'dragon-fruit.jpg', 1, 15, '0'),
(19, 3, 'Durian Fruit', 600, 'the king of fruit Durian ', 'Durian.jpg', 1, 5, '0'),
(20, 3, 'Avacados', 600, 'creamy and big Avacados ', 'AVACADO.jpg', 1, 0, '0'),
(21, 3, 'Blue Berry', 800, 'fresh imported and  high quality Blue Berry of US', 'Blue Berry.jpg', 1, 5, '0'),
(24, 4, 'Green Graphes', 150, 'high quality GreenGrephes of india     ', 'Green Grapes.jpg', 1, 20, '0'),
(27, 5, 'Strawberry', 300, 'red and jucy Strawberry of mahabaleshwer', 'Strawberry.jpg', 1, 9, '0'),
(32, 5, 'Black Graphes', 180, 'high quality Black  Grephes of india                ', 'Black Grapes.jpg', 1, 19, '0'),
(33, 5, 'Green Graphes', 150, 'high quality GreenGrephes of india              ', 'Green Grapes.jpg', 1, 20, '0'),
(34, 5, 'Custered Apples', 140, 'Best Top Quality Custered Apples                  ', 'Custared Apple.JPG', 1, 20, '0'),
(35, 6, 'PLUM', 250, 'fresh imported PLUMS from south africa                ', 'PLUM.jpg', 1, 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` longtext NOT NULL,
  `answer` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `question`, `answer`) VALUES
(1, 'hello', 'hello sir how can i halp u'),
(2, 'how are you', 'i am fine'),
(3, 'what is your name', 'i am deepak the chatbot'),
(4, 'who made you', 'master deepak'),
(5, 'who is your creator', 'master deepak'),
(6, 'what should i buy today', 'You should try this:- http://localhost/project-php/index.php'),
(7, 'show my shopping cart', 'as your wish:- http://localhost/project-php/viewcart.php'),
(8, 'can you recement me somthing', 'I think you should try this:- http://localhost/project-php/index.php'),
(9, 'show me todays discount', 'as your wish:- http://localhost/project-php/index.php'),
(10, 'i want some fruits for my friends for gift can you halp me', 'yes i will halp you:- http://localhost/project-php/Most%20purchsed.php'),
(11, 'show my wish list', 'as your wish:- http://localhost/project-php/wishlist.php '),
(12, 'show my profile', 'as your wish:- http://localhost/project-php/profile.php '),
(13, 'show my orders', 'as your wish:- http://localhost/project-php/order-history.php '),
(14, 'i want to login', 'as your wish:- http://localhost/project-php/login.php '),
(15, 'can you tell me about this website', 'Sure, this is a naturefruit.com where you can get hte fresh fruits with in 6 hours and here you will also get the discounts\r\n'),
(16, 'will i get the fresh fruits ?', 'yes you will'),
(21, 'can you help me', 'yess i will'),
(22, 'who are you', 'i am deepak the chatbot'),
(23, 'can you tell me the todays discount', 'yes sure: - http://localhost/project-php/index.php'),
(24, 'hi', 'hello sir'),
(25, 'hai', 'hello sir');

-- --------------------------------------------------------

--
-- Table structure for table `wish_list`
--

DROP TABLE IF EXISTS `wish_list`;
CREATE TABLE IF NOT EXISTS `wish_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(255) NOT NULL,
  `product_id` int(100) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_image` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wish_list`
--

INSERT INTO `wish_list` (`id`, `uid`, `product_id`, `product_title`, `product_image`) VALUES
(5, 6, 7, 'Sweet Lemon', 'MOSAMBI.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`product_cat`) REFERENCES `categories` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

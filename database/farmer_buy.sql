-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 08, 2021 at 05:41 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `farmer_buy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `acc_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `acc_no`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3 ', '21112233');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'Vegtables'),
(2, 'Rice'),
(3, 'Fruits'),
(4, 'Greens'),
(5, 'Spices'),
(6, 'Seeds'),
(7, 'Grains'),
(8, 'Flowers');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `Seller` varchar(30) NOT NULL,
  `product` varchar(50) NOT NULL,
  `product_image` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `location` varchar(30) NOT NULL,
  `stype` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `catid`, `Seller`, `product`, `product_image`, `price`, `quantity`, `description`, `location`, `stype`) VALUES
(1, 1, '', 'Tomato', 'download (9).jpg', 50, 96, 'Tomato Plant', 'omr', 'Red soil'),
(2, 1, '', 'Brinjal', 'download (11).jpg', 50, 50, 'Brinjal Plant', 'KK NAGAR', 'Dry Soil'),
(3, 2, '', 'Rice Plant1', 'images (19).jpg', 80, 50, 'Rice Plant is good for this soil', 'Tambaram', 'Red soil'),
(4, 2, '', 'IR20', 'images (20).jpg', 50, 100, 'IR Type Is good for this soil', 'KK NAGAR', 'Clay Soil'),
(5, 3, '', 'Guava', 'images (53).jpg', 80, 50, 'Guava Plants', 'ecr', 'Black Soil'),
(6, 5, '', 'Tamrind', 'images (38).jpg', 100, 43, 'Tamrind Plant', 'ecr', 'Clay Soil'),
(7, 3, '', 'Orange', 'images (46).jpg', 80, 50, 'Orange Plant', 'haryana', 'Red Soil'),
(8, 3, '', 'Apple', 'download (42).jpg', 200, 29, 'apple for loam soil', 'Kashmir', 'loam'),
(9, 8, '', 'Rose', 'download (24).jpg', 80, 49, 'Rose', 'chennai', 'Clay Soil'),
(10, 8, '', 'Jasmine', 'download (31).jpg', 80, 30, 'Jasmine for Clay Soil', 'omr', 'Clay Soil'),
(11, 6, '', 'Seed1', 'images (14).jpg', 100, 50, 'Seed', 'KK NAGAR', 'Red soil'),
(12, 3, '', 'Strawberry', 'images (51).jpg', 100, 100, 'Strawberry', 'chennai', 'Clay Soil'),
(13, 1, '', 'Tomato', 'download (8).jpg', 100, 60, 'tomato plants', 'KK NAGAR', 'Red soil'),
(14, 1, '', 'Tomato', 'download (9).jpg', 50, 100, 'Tomato Plant', 'omr', 'Red soil'),
(15, 1, '', 'Brinjal', 'download (11).jpg', 50, 50, 'Brinjal Plant', 'KK NAGAR', 'Dry Soil'),
(16, 2, '', 'Rice Plant1', 'images (19).jpg', 80, 50, 'Rice Plant is good for this soil', 'Tambaram', 'Red soil'),
(17, 2, '', 'IR20', 'images (20).jpg', 50, 100, 'IR Type Is good for this soil', 'KK NAGAR', 'Clay Soil'),
(18, 3, '', 'Guava', 'images (53).jpg', 80, 50, 'Guava Plants', 'ecr', 'Black Soil'),
(19, 5, '', 'Tamrind', 'images (38).jpg', 100, 43, 'Tamrind Plant', 'ecr', 'Clay Soil'),
(20, 3, '', 'Orange', 'images (46).jpg', 80, 50, 'Orange Plant', 'haryana', 'Red Soil'),
(21, 3, '', 'Apple', 'download (42).jpg', 200, 29, 'apple for loam soil', 'Kashmir', 'loam'),
(22, 8, '', 'Rose', 'download (24).jpg', 80, 49, 'Rose', 'chennai', 'Clay Soil'),
(23, 8, '', 'Jasmine', 'download (31).jpg', 80, 30, 'Jasmine for Clay Soil', 'omr', 'Clay Soil'),
(24, 6, '', 'Seed1', 'images (14).jpg', 100, 50, 'Seed', 'KK NAGAR', 'Red soil'),
(25, 3, '', 'Strawberry', 'images (51).jpg', 100, 100, 'Strawberry', 'Kashmir', 'Clay Soil'),
(26, 1, '', 'Tomato', 'download (8).jpg', 100, 60, 'tomato plants', '', ''),
(27, 3, '', 'Orange', 'images (46).jpg', 80, 50, 'Orange Plant', 'haryana', 'Red Soil'),
(28, 3, '', 'Apple', 'download (42).jpg', 200, 29, 'apple for loam soil', 'Kashmir', 'Red soil'),
(29, 8, '', 'Rose', 'download (24).jpg', 80, 49, 'Rose', 'chennai', 'Black Soil'),
(30, 8, '', 'Jasmine', 'download (31).jpg', 80, 30, 'Jasmine for Clay Soil', 'omr', 'loam'),
(31, 6, '', 'Seed1', 'images (14).jpg', 100, 50, 'Seed', 'KK NAGAR', 'Red soil'),
(32, 3, '', 'Strawberry', 'images (51).jpg', 100, 100, 'Strawberry', 'chennai', 'Clay Soil'),
(33, 8, '', 'Brinjal', 'download (24).jpg', 80, 49, 'Rose', 'chennai', 'Black Soil'),
(34, 8, '', 'Jasmine', 'download (31).jpg', 80, 30, 'Jasmine for Clay Soil', 'omr', 'loam'),
(35, 6, '', 'Seed1', 'images (14).jpg', 100, 50, 'Seed', 'KK NAGAR', 'Red soil'),
(36, 3, '', 'Strawberry', 'images (51).jpg', 100, 100, 'Strawberry', 'chennai', 'Clay Soil'),
(37, 8, '', 'Rose', 'download (24).jpg', 80, 49, 'Rose', 'chennai', 'Black Soil'),
(38, 8, '', 'Jasmine', 'download (31).jpg', 80, 30, 'Jasmine for Clay Soil', 'omr', 'loam'),
(39, 6, '', 'Seed1', 'images (14).jpg', 100, 50, 'Seed', 'KK NAGAR', 'Red soil'),
(40, 3, '', 'Strawberry', 'images (51).jpg', 100, 100, 'Strawberry', 'chennai', 'Clay Soil'),
(41, 8, '', 'Rose', 'download (24).jpg', 80, 49, 'Rose', 'chennai', 'Black Soil'),
(42, 8, '', 'Jasmine', 'download (31).jpg', 80, 30, 'Jasmine for Clay Soil', 'omr', 'loam'),
(43, 6, '', 'Seed1', 'images (14).jpg', 100, 50, 'Seed', 'KK NAGAR', 'Red soil'),
(44, 3, '', 'Strawberry', 'images (51).jpg', 100, 100, 'Strawberry', 'chennai', 'Clay Soil'),
(45, 3, '', 'Strawberry', 'images (51).jpg', 100, 100, 'Strawberry', 'chennai', 'Clay Soil'),
(46, 8, '', 'Rose', 'download (24).jpg', 80, 49, 'Rose', 'chennai', 'Black Soil'),
(47, 8, '', 'Jasmine', 'download (31).jpg', 80, 30, 'Jasmine for Clay Soil', 'omr', 'loam'),
(48, 6, '', 'Seed1', 'images (14).jpg', 100, 50, 'Seed', 'KK NAGAR', 'Red soil'),
(49, 3, '', 'Strawberry', 'images (51).jpg', 100, 100, 'Strawberry', 'chennai', 'Clay Soil'),
(50, 3, '', 'Strawberry', 'images (51).jpg', 100, 100, 'Strawberry', 'chennai', 'Clay Soil'),
(51, 8, '', 'Rose', 'download (24).jpg', 80, 49, 'Rose', 'chennai', 'Black Soil'),
(52, 8, '', 'Jasmine', 'download (31).jpg', 80, 30, 'Jasmine for Clay Soil', 'omr', 'loam'),
(53, 6, '', 'Seed1', 'images (14).jpg', 100, 50, 'Seed', 'KK NAGAR', 'Red soil'),
(54, 3, '', 'Strawberry', 'images (51).jpg', 100, 100, 'Strawberry', 'chennai', 'Clay Soil'),
(55, 3, '', 'Strawberry', 'images (51).jpg', 100, 100, 'Strawberry', 'chennai', 'Clay Soil'),
(56, 8, '', 'Rose', 'download (24).jpg', 80, 49, 'Rose', 'chennai', 'Black Soil'),
(57, 8, '', 'Jasmine', 'download (31).jpg', 80, 30, 'Jasmine for Clay Soil', 'omr', 'loam'),
(58, 6, '', 'Seed1', 'images (14).jpg', 100, 50, 'Seed', 'KK NAGAR', 'Red soil'),
(59, 3, '', 'Strawberry', 'images (51).jpg', 100, 100, 'Strawberry', 'chennai', 'Clay Soil'),
(60, 3, '', 'Strawberry', 'images (51).jpg', 100, 100, 'Strawberry', 'andhra', 'Clay Soil'),
(61, 8, '', 'Rose', 'download (24).jpg', 80, 49, 'Rose', 'chennai', 'Black Soil'),
(62, 8, '', 'Jasmine', 'download (31).jpg', 80, 30, 'Jasmine for Clay Soil', 'omr', 'loam'),
(63, 6, '', 'Seed1', 'images (14).jpg', 100, 50, 'Seed', 'KK NAGAR', 'Red soil'),
(64, 3, '', 'Strawberry', 'images (51).jpg', 100, 100, 'Strawberry', 'andhra', 'Clay Soil'),
(65, 3, '', 'Strawberry', 'images (51).jpg', 100, 100, 'Strawberry', 'chennai', 'Clay Soil'),
(66, 8, '', 'Rose', 'download (24).jpg', 80, 49, 'Rose', 'chennai', 'Black Soil'),
(67, 8, '', 'Jasmine', 'download (31).jpg', 80, 30, 'Jasmine for Clay Soil', 'omr', 'loam'),
(68, 6, '', 'Seed1', 'images (14).jpg', 100, 50, 'Seed', 'KK NAGAR', 'Red soil'),
(69, 3, '', 'Strawberry', 'images (51).jpg', 100, 100, 'Strawberry', 'chennai', 'Clay Soil'),
(70, 3, '', 'Strawberry', 'images (51).jpg', 100, 100, 'Strawberry', 'andhra', 'Clay Soil'),
(71, 8, '', 'Rose', 'download (24).jpg', 80, 49, 'Rose', 'chennai', 'Black Soil'),
(72, 8, '', 'Jasmine', 'download (31).jpg', 80, 30, 'Jasmine for Clay Soil', 'omr', 'loam'),
(73, 6, '', 'Seed1', 'images (14).jpg', 100, 50, 'Seed', 'KK NAGAR', 'Red soil'),
(74, 3, '', 'Strawberry', 'images (51).jpg', 100, 100, 'Strawberry', 'chennai', 'Clay Soil'),
(75, 3, '', 'Strawberry', 'images (51).jpg', 100, 100, 'Strawberry', 'chennai', 'Clay Soil'),
(76, 8, '', 'Rose', 'download (24).jpg', 80, 49, 'Rose', 'chennai', 'Black Soil'),
(77, 8, '', 'Jasmine', 'download (31).jpg', 80, 30, 'Jasmine for Clay Soil', 'omr', 'loam'),
(78, 6, '', 'Seed1', 'images (14).jpg', 100, 50, 'Seed', 'KK NAGAR', 'Red soil'),
(79, 3, '', 'Strawberry', 'images (51).jpg', 100, 100, 'Strawberry', 'chennai', 'Clay Soil'),
(80, 3, '', 'Strawberry', 'images (51).jpg', 100, 100, 'Strawberry', 'chennai', 'Clay Soil'),
(81, 8, '', 'Rose', 'download (24).jpg', 80, 49, 'Rose', 'chennai', 'Black Soil'),
(82, 8, '', 'Jasmine', 'download (31).jpg', 80, 30, 'Jasmine for Clay Soil', 'omr', 'loam'),
(83, 6, '', 'Seed1', 'images (14).jpg', 100, 50, 'Seed', 'KK NAGAR', 'Red soil'),
(84, 3, '', 'Strawberry', 'images (51).jpg', 100, 100, 'Strawberry', 'chennai', 'Clay Soil'),
(85, 3, '', 'Strawberry', 'images (51).jpg', 100, 100, 'Strawberry', 'chennai', 'Clay Soil'),
(86, 8, '', 'Rose', 'download (24).jpg', 80, 49, 'Rose', 'chennai', 'Black Soil'),
(87, 8, '', 'Jasmine', 'download (31).jpg', 80, 30, 'Jasmine for Clay Soil', 'omr', 'loam'),
(88, 6, '', 'Seed1', 'images (14).jpg', 100, 50, 'Seed', 'KK NAGAR', 'Red soil'),
(89, 3, '', 'Strawberry', 'images (51).jpg', 100, 100, 'Strawberry', 'chennai', 'Clay Soil'),
(90, 3, '', 'Strawberry', 'images (51).jpg', 100, 100, 'Strawberry', 'chennai', 'Clay Soil'),
(91, 8, '', 'Rose', 'download (24).jpg', 80, 49, 'Rose', 'chennai', 'Black Soil'),
(92, 8, '', 'Jasmine', 'download (31).jpg', 80, 30, 'Jasmine for Clay Soil', 'omr', 'loam'),
(93, 6, '', 'Seed1', 'images (14).jpg', 100, 50, 'Seed', 'KK NAGAR', 'Red soil'),
(94, 3, '', 'Strawberry', 'images (51).jpg', 100, 100, 'Strawberry', 'chennai', 'Clay Soil'),
(95, 3, '', 'Strawberry', 'images (51).jpg', 100, 100, 'Strawberry', 'chennai', 'Clay Soil'),
(96, 8, '', 'Rose', 'download (24).jpg', 80, 49, 'Rose', 'chennai', 'Black Soil'),
(97, 8, '', 'Jasmine', 'download (31).jpg', 80, 30, 'Jasmine for Clay Soil', 'omr', 'loam'),
(98, 6, '', 'Seed1', 'images (14).jpg', 100, 50, 'Seed', 'KK NAGAR', 'Red soil'),
(99, 3, '', 'Strawberry', 'images (51).jpg', 100, 100, 'Strawberry', 'chennai', 'Clay Soil'),
(100, 3, 'surya', 'Strawberry', 'images (51).jpg', 100, 98, 'Strawberry', 'chennai', 'Clay Soil'),
(101, 1, 'surya', 'Carrot', '', 20, 87, 'carrot', 'Salem', '');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `utype` varchar(20) NOT NULL,
  `name` varchar(25) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `pincode` bigint(20) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `acc_no` varchar(30) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `secret_code` varchar(50) NOT NULL,
  `rdate` date NOT NULL,
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `utype`, `name`, `gender`, `address`, `pincode`, `contact`, `email`, `bank_name`, `acc_no`, `username`, `password`, `secret_code`, `rdate`) VALUES
(3, 'farmer', 'Kannan', 'Male', 'sdsd', 345435, 9934566123, 'kan@gmail.com', 'SBI', '2232332434', 'kannan', '1234', '', '2021-11-02'),
(2, 'user', 'Kumar', 'Male', 'Salem', 345435, 9934443214, 'kumar@gmail.com', 'IB', '2564356347', 'kumar', '1234', '', '2021-11-02'),
(4, 'user', 'Ram', 'Male', 'fddf', 443434, 2332323233, 'ram@gmail.com', 'SBI', '2232332435', 'ram', '1234', '', '2021-11-02'),
(1, 'farmer', 'Surya', 'Male', 'dd nagar', 443434, 9976570006, 'surya@gmail.com', 'SBI', '2232332433', 'surya', '1234', '', '2021-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `user_purchase`
--

CREATE TABLE `user_purchase` (
  `id` int(11) NOT NULL auto_increment,
  `catergory` varchar(25) NOT NULL,
  `Seller` varchar(30) NOT NULL,
  `pname` varchar(25) NOT NULL,
  `price` int(55) NOT NULL,
  `uqut` int(55) NOT NULL,
  `uname` varchar(25) NOT NULL,
  `pid` int(11) NOT NULL,
  `nid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `day1` int(11) NOT NULL,
  `month1` varchar(20) NOT NULL,
  `year1` int(11) NOT NULL,
  `rdate` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user_purchase`
--

INSERT INTO `user_purchase` (`id`, `catergory`, `Seller`, `pname`, `price`, `uqut`, `uname`, `pid`, `nid`, `status`, `day1`, `month1`, `year1`, `rdate`) VALUES
(1, '1', 'surya', 'Carrot', 20, 5, 'kumar', 1, 101, 1, 2, 'Nov', 2021, '2021-11-02 15:04:20'),
(5, '1', 'surya', 'Carrot', 20, 2, 'ram', 1, 101, 1, 2, 'Nov', 2021, '2021-11-02 23:04:03'),
(6, '3', 'surya', 'Strawberry', 100, 2, 'ram', 1, 100, 1, 2, 'Nov', 2021, '2021-11-02 23:04:03'),
(7, '1', 'surya', 'Carrot', 20, 2, 'ram', 2, 101, 1, 7, 'Nov', 2021, '2021-11-07 11:28:48');

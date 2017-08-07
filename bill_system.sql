-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 09, 2017 at 10:19 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `bill_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill_info`
--

CREATE TABLE `bill_info` (
  `bill_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `product_type` varchar(100) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `tax` varchar(11) NOT NULL,
  `vat` varchar(11) NOT NULL,
  `discount` varchar(11) NOT NULL,
  `mode_of_payment` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_info`
--

INSERT INTO `bill_info` (`bill_id`, `name`, `address`, `phone`, `email`, `product_type`, `product_name`, `price`, `quantity`, `tax`, `vat`, `discount`, `mode_of_payment`, `status`) VALUES
(1, 'Ankit', '12,sector-12', '81268676', 'asd@gmail.com', 'Electronic', 'TV', 20000, 2, '', '', '', 'card', 1),
(2, 'Ankit', '12,sector-12', '81268676', 'asd@gmail.com', 'Phone', 'Iphone', 50000, 1, '', '', '', 'card', 1),
(3, 'Ankit', '12,sector-12', '81268676', 'asd@gmail.com', 'Phone', 'OPPO', 7000, 4, '', '', '', 'card', 1),
(4, 'Rajiv', '23,sectro-12', '812631823', 'rajiv@gmail.com', 'Phone', 'Sony', 2459, 2, '', '', '', 'cheque', 0),
(5, 'Rajiv', '23,sectro-12', '812631823', 'rajiv@gmail.com', 'Phone', 'Micromax', 7450, 4, '', '', '', 'cheque', 0),
(6, 'Rajiv', '23,sectro-12', '812631823', 'rajiv@gmail.com', 'Electronic', 'LED', 34559, 1, '', '', '', 'cheque', 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'ankit', '47bce5c74f589f4867dbd57e9ca9f808');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill_info`
--
ALTER TABLE `bill_info`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill_info`
--
ALTER TABLE `bill_info`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
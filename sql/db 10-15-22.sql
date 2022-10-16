-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 15, 2022 at 06:35 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos-cps353`
--

-- --------------------------------------------------------

--
-- Table structure for table `keys_table`
--

CREATE TABLE `keys_table` (
  `USER_ID` int(11) NOT NULL,
  `ROLE_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_data`
--

CREATE TABLE `product_data` (
  `PROD_ID` int(10) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_desc` varchar(255) NOT NULL,
  `prod_price` varchar(255) NOT NULL,
  `prod_quantity` int(10) NOT NULL,
  `VENDOR_ID` int(11) NOT NULL,
  `PRODUCT_CATEGORY` int(11) NOT NULL,
  `prod_date_purchased` varchar(30) NOT NULL,
  `prod_purchase_cost` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_data`
--

INSERT INTO `product_data` (`PROD_ID`, `prod_name`, `prod_desc`, `prod_price`, `prod_quantity`, `VENDOR_ID`, `PRODUCT_CATEGORY`, `prod_date_purchased`, `prod_purchase_cost`) VALUES
(1, 'Basketball - Large', '*basketball description*', '$5.00', 6, 0, 0, '', ''),
(2, 'Indoor Soccer Ball', '*Soccer Ball Description', '$5.00', 3, 0, 0, '', ''),
(3, 'Racquetball Racquet', '*Racquetball Description*', '$3.50', 6, 0, 0, '', ''),
(4, 'Basketball-Small', '*Basketball Description*', '$5.00', 6, 0, 0, '', ''),
(5, 'Football', '*Football Description*', '$5.00', 4, 0, 0, '', ''),
(6, 'Indoor Soccer Ball', '*Soccer Ball Description*', '$5.00', 3, 0, 0, '', ''),
(7, 'Jump Rope', '*Jump Rope Description*', '$2.00', 3, 0, 0, '', ''),
(8, 'Raquetball Racquet', '*Raquetball Raquetball Description*', '$1.50', 6, 0, 0, '', ''),
(9, 'Raquetball', '*Raquetball Description*', '$1.00', 4, 0, 0, '', ''),
(10, 'Volleyballs', '*Volleyball Description*', '$5.00', 4, 0, 0, '', ''),
(11, 'Frisbee', '*Frisbee Description*', '$1.00', 2, 0, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `ROLE_ID` int(10) NOT NULL,
  `role_title` varchar(30) NOT NULL,
  `ACCESS_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `USER_DATA` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip` int(15) NOT NULL,
  `phone1` varchar(30) NOT NULL,
  `phone2` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `USER_ID` int(11) NOT NULL,
  `uname` varchar(25) NOT NULL,
  `passcode` varchar(25) NOT NULL,
  `ROLE_ID` int(11) NOT NULL,
  `elogs` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keys_table`
--
ALTER TABLE `keys_table`
  ADD UNIQUE KEY `ROLE_ID` (`ROLE_ID`),
  ADD KEY `USER_ID` (`USER_ID`);

--
-- Indexes for table `product_data`
--
ALTER TABLE `product_data`
  ADD PRIMARY KEY (`PROD_ID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ROLE_ID`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`USER_DATA`),
  ADD KEY `USER_ID` (`USER_ID`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`USER_ID`),
  ADD KEY `ROLE_ID` (`ROLE_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_data`
--
ALTER TABLE `product_data`
  MODIFY `PROD_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `ROLE_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `USER_DATA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

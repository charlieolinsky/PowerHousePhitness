-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 21, 2022 at 12:25 AM
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
-- Table structure for table `access_rules`
--

CREATE TABLE `access_rules` (
  `ACCESS_ID` int(11) NOT NULL,
  `home_page` tinyint(1) NOT NULL,
  `login_page` tinyint(1) NOT NULL,
  `register_page` tinyint(1) NOT NULL,
  `account_info_page` tinyint(1) NOT NULL,
  `my services_page` tinyint(1) NOT NULL,
  `employee_portal_rental` tinyint(1) NOT NULL,
  `employee_portal_invent` tinyint(1) NOT NULL,
  `reports_page` tinyint(1) NOT NULL,
  `memberships_page` tinyint(1) NOT NULL,
  `classes_page` tinyint(1) NOT NULL,
  `checkout_page` tinyint(1) NOT NULL,
  `cart_page` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ORDER_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `grand_total` double NOT NULL,
  `date_order_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `ORDER_DETAIL_ID` int(11) NOT NULL,
  `ORDER_ID` int(11) NOT NULL,
  `PRODUCT_ID` int(11) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `line_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_data`
--

CREATE TABLE `product_data` (
  `PROD_ID` int(10) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_desc` varchar(255) NOT NULL,
  `prod_image` varchar(255) NOT NULL,
  `prod_price` varchar(255) NOT NULL,
  `prod_quantity` int(10) NOT NULL,
  `VENDOR_ID` int(11) NOT NULL,
  `prod_date_purchased` varchar(30) NOT NULL,
  `prod_purchase_cost` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_data`
--

INSERT INTO `product_data` (`PROD_ID`, `prod_name`, `prod_desc`, `prod_image`, `prod_price`, `prod_quantity`, `VENDOR_ID`, `prod_date_purchased`, `prod_purchase_cost`) VALUES
(1, 'Basketball - Large', '*basketball description*', '', '$5.00', 6, 0, '', ''),
(2, 'Indoor Soccer Ball', '*Soccer Ball Description', '', '$5.00', 3, 0, '', ''),
(3, 'Racquetball Racquet', '*Racquetball Description*', '', '$3.50', 6, 0, '', ''),
(4, 'Basketball-Small', '*Basketball Description*', '', '$5.00', 6, 0, '', ''),
(5, 'Football', '*Football Description*', '', '$5.00', 4, 0, '', ''),
(6, 'Indoor Soccer Ball', '*Soccer Ball Description*', '', '$5.00', 3, 0, '', ''),
(7, 'Jump Rope', '*Jump Rope Description*', '', '$2.00', 3, 0, '', ''),
(8, 'Raquetball Racquet', '*Raquetball Raquetball Description*', '', '$1.50', 6, 0, '', ''),
(9, 'Raquetball', '*Raquetball Description*', '', '$1.00', 4, 0, '', ''),
(10, 'Volleyballs', '*Volleyball Description*', '', '$5.00', 4, 0, '', ''),
(11, 'Frisbee', '*Frisbee Description*', '', '$1.00', 2, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `prod_quantity`
--

CREATE TABLE `prod_quantity` (
  `PROD_Q_ID` int(50) NOT NULL,
  `PROD_ID` int(50) NOT NULL,
  `prod_instock` int(50) NOT NULL,
  `prod_rented` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `vendor_id`
--

CREATE TABLE `vendor_id` (
  `VENDOR_ID` int(11) NOT NULL,
  `v_name` int(11) NOT NULL,
  `v_address1` int(11) NOT NULL,
  `v_address2` int(11) NOT NULL,
  `v_city` int(11) NOT NULL,
  `v_state` int(11) NOT NULL,
  `v_zip` int(11) NOT NULL,
  `v_contact_name` int(11) NOT NULL,
  `v_contact_email` int(11) NOT NULL,
  `v_contact_phone` int(11) NOT NULL,
  `v_contact_fax` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_rules`
--
ALTER TABLE `access_rules`
  ADD PRIMARY KEY (`ACCESS_ID`);

--
-- Indexes for table `keys_table`
--
ALTER TABLE `keys_table`
  ADD UNIQUE KEY `ROLE_ID` (`ROLE_ID`),
  ADD KEY `USER_ID` (`USER_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ORDER_ID`),
  ADD KEY `USER_ID` (`USER_ID`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`ORDER_DETAIL_ID`),
  ADD KEY `ORDER_ID` (`ORDER_ID`),
  ADD KEY `PRODUCT_ID` (`PRODUCT_ID`);

--
-- Indexes for table `product_data`
--
ALTER TABLE `product_data`
  ADD PRIMARY KEY (`PROD_ID`),
  ADD KEY `VENDOR_ID` (`VENDOR_ID`);

--
-- Indexes for table `prod_quantity`
--
ALTER TABLE `prod_quantity`
  ADD PRIMARY KEY (`PROD_Q_ID`),
  ADD KEY `PRODUCT_ID` (`PROD_ID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ROLE_ID`),
  ADD KEY `ACCESS_ID` (`ACCESS_ID`);

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
-- Indexes for table `vendor_id`
--
ALTER TABLE `vendor_id`
  ADD PRIMARY KEY (`VENDOR_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ORDER_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `ORDER_DETAIL_ID` int(11) NOT NULL AUTO_INCREMENT;

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keys_table`
--
ALTER TABLE `keys_table`
  ADD CONSTRAINT `keys_table_ibfk_1` FOREIGN KEY (`ROLE_ID`) REFERENCES `user_login` (`ROLE_ID`);

--
-- Constraints for table `prod_quantity`
--
ALTER TABLE `prod_quantity`
  ADD CONSTRAINT `prod_quantity_ibfk_1` FOREIGN KEY (`PROD_ID`) REFERENCES `product_data` (`PROD_ID`);

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`ROLE_ID`) REFERENCES `keys_table` (`ROLE_ID`),
  ADD CONSTRAINT `roles_ibfk_2` FOREIGN KEY (`ACCESS_ID`) REFERENCES `access_rules` (`ACCESS_ID`);

--
-- Constraints for table `user_data`
--
ALTER TABLE `user_data`
  ADD CONSTRAINT `user_data_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user_login` (`USER_ID`);

--
-- Constraints for table `vendor_id`
--
ALTER TABLE `vendor_id`
  ADD CONSTRAINT `vendor_id_ibfk_1` FOREIGN KEY (`VENDOR_ID`) REFERENCES `product_data` (`VENDOR_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

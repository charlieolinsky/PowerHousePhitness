-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 06, 2022 at 09:45 PM
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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CART_ID` int(11) NOT NULL,
  `ORDER_ID` int(11) NOT NULL,
  `PROD_ID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `item_cost` double NOT NULL
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
-- Table structure for table `order_data`
--

CREATE TABLE `order_data` (
  `ORDER_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `order_time` varchar(255) NOT NULL,
  `grand_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `prod-data`
--

CREATE TABLE `prod-data` (
  `PROD_ID` int(11) NOT NULL,
  `prod_name` varchar(255) DEFAULT NULL,
  `prod_desc` varchar(255) DEFAULT NULL,
  `prod_image` varchar(255) DEFAULT NULL,
  `prod_price` double DEFAULT NULL,
  `prod_quantity` int(11) DEFAULT NULL,
  `VENDOR_ID` int(11) NOT NULL,
  `prod_date_purchased` varchar(255) NOT NULL,
  `prod_purchase_cost` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prod-data`
--

INSERT INTO `prod-data` (`PROD_ID`, `prod_name`, `prod_desc`, `prod_image`, `prod_price`, `prod_quantity`, `VENDOR_ID`, `prod_date_purchased`, `prod_purchase_cost`) VALUES
(19, 'Basketball - Large', 'This is a regulation sized basketball ', '../UI/images/prod_images/basketball.jpg', 5, 6, 1, '10/23/2022', 20.99),
(20, 'Basketball-Small', '*Basketball Description*', '../UI/images/prod_images/basketball-small.jpg', 5, 6, 1, '', 15.99),
(21, 'Soccer Ball', '*Soccer Ball Description', '../UI/images/prod_images/soccerball.jpg', 5, 3, 1, '', 19.99),
(22, 'Racquetball Racquet', '*Racquetball Description*', '../UI/images/prod_images/racquetballracket.jpg', 3.5, 6, 2, '', 10),
(23, 'Racquetballs', '*Raquetball Description*', '../UI/images/prod_images/racquetballs.jpg', 1, 4, 2, '', 5),
(24, 'Football', '*Football Description*', '../UI/images/prod_images/football.jpg', 5, 4, 1, '', 20.99),
(25, 'Jump Rope', '*Jump Rope Description*', '../UI/images/prod_images/jumprope.jpg', 2, 3, 3, '', 7.5),
(26, 'Volleyballs', '*Volleyball Description*', '../UI/images/prod_images/volleyball.jpg', 5, 4, 1, '', 15.99),
(27, 'Frisbee', '*Frisbee Description*', '../UI/images/prod_images/frisbee.jpg', 1, 2, 3, '', 12),
(30, 'Badminton Raquette ', 'This is a Raquette', '', 3, 4, 2, '10/28/22', 7),
(31, 'Badminton Birdie ', 'This is a pack of 4 ', '', 2.5, 10, 3, '9/30/22', 5),
(32, 'Resistance Band', 'This is a medium resistance', '', 2, 10, 2, '10/29/22', 8.5),
(33, 'Stop Watch', '', '', 1, 5, 2, '', 4.5),
(34, 'Kan Jam', 'This is a Kan Jam Set', '', 10.99, 2, 3, '10/30/22', 25),
(35, 'Kickball', 'This is a kickball', '', 3.5, 3, 1, '11/2/22', 7),
(75, 'test 45345', 'desc', '', 2.5, 10, 1, '2', 22);

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
  `v_name` varchar(255) NOT NULL,
  `v_address1` varchar(255) NOT NULL,
  `v_address2` varchar(255) NOT NULL,
  `v_city` varchar(255) NOT NULL,
  `v_state` varchar(255) NOT NULL,
  `v_zip` int(11) NOT NULL,
  `v_contact_name` varchar(255) NOT NULL,
  `v_contact_email` varchar(255) NOT NULL,
  `v_contact_phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor_id`
--

INSERT INTO `vendor_id` (`VENDOR_ID`, `v_name`, `v_address1`, `v_address2`, `v_city`, `v_state`, `v_zip`, `v_contact_name`, `v_contact_email`, `v_contact_phone`) VALUES
(1, 'Baskets, Balls, and More ', '323 South Road', ' ', 'Poughkeepsie', 'NY', 12601, 'Peter Smith', 'p.smith@bbandm.com', '845-999-9901'),
(2, 'Sports Goods Inc', '84 Mullberry Road', ' ', 'Beacon', 'NY', 12652, 'Abby Kruz', 'abby.kruz@sportsgoods.com', '845-999-9902'),
(3, 'NY Sports Gear', '2390 West Ave', '3 ', 'Yonkers', 'NY', 13045, 'Micheal Brandy', 'brandym@nysportsgear.com', '845-999-9903');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_rules`
--
ALTER TABLE `access_rules`
  ADD PRIMARY KEY (`ACCESS_ID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CART_ID`),
  ADD KEY `ORDER_ID` (`ORDER_ID`),
  ADD KEY `PROD_ID` (`PROD_ID`);

--
-- Indexes for table `keys_table`
--
ALTER TABLE `keys_table`
  ADD UNIQUE KEY `ROLE_ID` (`ROLE_ID`),
  ADD KEY `USER_ID` (`USER_ID`);

--
-- Indexes for table `order_data`
--
ALTER TABLE `order_data`
  ADD PRIMARY KEY (`ORDER_ID`),
  ADD KEY `USER_ID` (`USER_ID`);

--
-- Indexes for table `prod-data`
--
ALTER TABLE `prod-data`
  ADD PRIMARY KEY (`PROD_ID`),
  ADD KEY `VENDOR_ID` (`VENDOR_ID`);

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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `CART_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_data`
--
ALTER TABLE `order_data`
  MODIFY `ORDER_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prod-data`
--
ALTER TABLE `prod-data`
  MODIFY `PROD_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

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
-- AUTO_INCREMENT for table `vendor_id`
--
ALTER TABLE `vendor_id`
  MODIFY `VENDOR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keys_table`
--
ALTER TABLE `keys_table`
  ADD CONSTRAINT `keys_table_ibfk_1` FOREIGN KEY (`ROLE_ID`) REFERENCES `user_login` (`ROLE_ID`);

--
-- Constraints for table `prod-data`
--
ALTER TABLE `prod-data`
  ADD CONSTRAINT `prod-data_ibfk_1` FOREIGN KEY (`VENDOR_ID`) REFERENCES `vendor_id` (`VENDOR_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

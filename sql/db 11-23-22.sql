-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 23, 2022 at 08:05 PM
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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ORDER_ID` int(5) NOT NULL,
  `USER_ID` int(3) NOT NULL,
  `grand_total` decimal(4,2) NOT NULL,
  `order_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `ORDER_ID` int(11) NOT NULL,
  `PROD_ID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `item_cost` decimal(4,2) NOT NULL
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
  `prod_price` float(4,2) DEFAULT NULL,
  `prod_quantity` int(11) DEFAULT NULL,
  `VENDOR_ID` int(11) DEFAULT NULL,
  `prod_date_purchased` varchar(255) DEFAULT NULL,
  `prod_purchase_cost` decimal(4,2) DEFAULT NULL,
  `total_rented` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prod-data`
--

INSERT INTO `prod-data` (`PROD_ID`, `prod_name`, `prod_desc`, `prod_image`, `prod_price`, `prod_quantity`, `VENDOR_ID`, `prod_date_purchased`, `prod_purchase_cost`, `total_rented`) VALUES
(19, 'Basketball - Large', 'This is a size 7 basketball with 29.5\" circumference', '../UI/images/prod_images/basketball.jpg', 5.50, 6, 1, '10/23/2022', '20.99', 0),
(20, 'Basketball-Small', 'This is a size 6 basketball with 28.5\" circumference', '../UI/images/prod_images/basketball-small.jpg', 5.00, 6, 1, '10/28/22', '15.99', 0),
(21, 'Soccer Ball', 'This is a size 5 soccer ball with a 28\" circumference ', '../UI/images/prod_images/soccerball.jpg', 5.00, 4, 1, '10/28/22', '19.99', 0),
(22, 'Racquetball Racquet', 'This is a pack of 4 racquets ', '../UI/images/prod_images/racquetballracket.jpg', 6.50, 6, 3, '11/5/22', '10.00', 0),
(23, 'Racquetballs', 'This is a pack of 6 Racquetballs ', '../UI/images/prod_images/racquetballs.jpg', 3.50, 4, 3, '9/30/22', '9.99', 0),
(24, 'Football', 'This is a size 5 football with a 28\" circumference ', '../UI/images/prod_images/football.jpg', 5.00, 4, 1, '11/8/22', '20.99', 0),
(25, 'Jump Rope', 'This is a standard sized jump rope', '../UI/images/prod_images/jumprope.jpg', 2.99, 3, 2, '9/30/22', '7.50', 0),
(26, 'Volleyball', 'This is a size 5 volleyball with a 26\" circumference ', '../UI/images/prod_images/volleyball.jpg', 5.00, 4, 1, '10/15/22', '15.99', 1),
(27, 'Frisbee', 'This is a standard sized Frisbee ', '../UI/images/prod_images/frisbee.jpg', 3.50, 4, 2, '11/2/22', '12.00', 0),
(30, 'Badminton Racket', 'Racket rentals come in a pack of 4 ', '../UI/images/prod_images/badmintonracket.jpg', 4.50, 4, 3, '10/28/22', '7.00', 0),
(31, 'Badminton Birdie ', 'Birdies come in a pack of 4 ', '../UI/images/prod_images/birdie.jpg', 3.00, 10, 3, '9/30/22', '5.00', 0),
(32, 'Resistance Band', '5 bands of various resistance. X-Heavy, Heavy, Medium, Light, X-Light', '../UI/images/prod_images/resistancebands.jpg', 3.50, 10, 2, '10/29/22', '8.50', 0),
(33, 'Stop Watch', '', '../UI/images/prod_images/stopwatch.jpg', 1.00, 5, 2, '', '4.50', 0),
(34, 'Kan Jam', 'This KanJam Set includes 2 \"kans\" and 1 frisbee', '../UI/images/prod_images/kanjam.jpg', 15.00, 2, 2, '10/30/22', '25.00', 0),
(35, 'Kickball', 'This is a rubber kickball', '../UI/images/prod_images/kickball.jpg', 4.00, 3, 1, '11/2/22', '7.00', 0),
(120, 'Agility Ladder', 'This is a 15 foot long, 20 inch wide ladder.', '../UI/images/prod_images/agilityladder.jpg', 8.00, 2, 3, '11/7/22', '15.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `ADD_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `is_billing` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `USER_ID` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `passcode` varchar(60) NOT NULL,
  `roles` tinyint(1) NOT NULL DEFAULT 1,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`USER_ID`, `email`, `passcode`, `roles`, `fname`, `lname`) VALUES
(10, 'brianna@gmail.com', '$2y$10$/XrehT7yROP5.t4FMcdqD.s/VzlEkkxxYDD.5D1Ub1dwkYd7mCnva', 1, 'Brianna', 'Smith'),
(11, 'cory@gmail.com', '$2y$10$kfnnNi4GU/NQGH8hRdbHJOU0v0AV77dekjDZRgmYnJ5ynZXviam3q', 1, 'Corey', 'Smith'),
(12, 'dan@gmail.com', '$2y$10$1gaP1lge0UbXHqjLMKqHlO2jh5Sm/3YaHn5wIqk/Q1egTE7Il/olK', 2, 'Dan', 'Smith'),
(17, 'bee@gmail.com', '$2y$10$0E3FqfVQvF8wMYKegLwIXOsZywxrUdq/cFvY8uGidYGy4F7p6OsAi', 1, 'Bee', 'Kurzum');

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
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ORDER_ID`),
  ADD KEY `USER_ID` (`USER_ID`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`ORDER_ID`,`PROD_ID`),
  ADD KEY `ORDER_ID` (`ORDER_ID`),
  ADD KEY `PROD_ID` (`PROD_ID`);

--
-- Indexes for table `prod-data`
--
ALTER TABLE `prod-data`
  ADD PRIMARY KEY (`PROD_ID`),
  ADD KEY `VENDOR_ID` (`VENDOR_ID`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`ADD_ID`),
  ADD KEY `USER_ID` (`USER_ID`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`USER_ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vendor_id`
--
ALTER TABLE `vendor_id`
  ADD PRIMARY KEY (`VENDOR_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prod-data`
--
ALTER TABLE `prod-data`
  MODIFY `PROD_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `ADD_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `vendor_id`
--
ALTER TABLE `vendor_id`
  MODIFY `VENDOR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user_table` (`USER_ID`);

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`PROD_ID`) REFERENCES `prod-data` (`PROD_ID`),
  ADD CONSTRAINT `cart_items_ibfk_2` FOREIGN KEY (`ORDER_ID`) REFERENCES `cart` (`ORDER_ID`);

--
-- Constraints for table `prod-data`
--
ALTER TABLE `prod-data`
  ADD CONSTRAINT `prod-data_ibfk_1` FOREIGN KEY (`VENDOR_ID`) REFERENCES `vendor_id` (`VENDOR_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_address`
--
ALTER TABLE `user_address`
  ADD CONSTRAINT `user_address_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user_table` (`USER_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

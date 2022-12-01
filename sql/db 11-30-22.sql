-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 01, 2022 at 02:55 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

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
  `tax` decimal(4,2) DEFAULT NULL,
  `sub_total` decimal(4,2) DEFAULT NULL,
  `grand_total` decimal(4,2) NOT NULL,
  `order_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`ORDER_ID`, `USER_ID`, `tax`, `sub_total`, `grand_total`, `order_date`) VALUES
(156, 33, NULL, NULL, '1.00', '2022-11-27'),
(844, 17, NULL, NULL, '5.00', '2022-11-27'),
(876, 20, NULL, NULL, '29.00', '2022-11-25'),
(955, 31, NULL, NULL, '16.50', '2022-11-26'),
(1632, 17, NULL, NULL, '5.50', '2022-11-27'),
(1651, 20, NULL, NULL, '20.50', '2022-11-25'),
(1993, 17, NULL, NULL, '11.00', '2022-11-27'),
(2113, 33, NULL, NULL, '4.00', '2022-11-27'),
(2427, 33, NULL, NULL, '3.50', '2022-11-27'),
(2447, 17, NULL, NULL, '5.00', '2022-11-27'),
(2458, 17, NULL, NULL, '15.00', '2022-11-28'),
(2753, 17, NULL, NULL, '10.99', '2022-11-25'),
(2992, 17, NULL, NULL, '8.50', '2022-11-25'),
(3371, 17, NULL, NULL, '5.50', '2022-11-27'),
(3435, 33, NULL, NULL, '4.00', '2022-11-27'),
(3443, 17, NULL, NULL, '2.00', '2022-11-27'),
(3766, 17, NULL, NULL, '5.50', '2022-11-27'),
(3890, 17, NULL, NULL, '14.50', '2022-11-27'),
(4164, 33, NULL, NULL, '1.00', '2022-11-27'),
(4844, 31, NULL, NULL, '5.50', '2022-11-26'),
(5159, 20, NULL, NULL, '22.50', '2022-11-25'),
(5297, 33, NULL, NULL, '5.50', '2022-11-26'),
(5716, 33, NULL, NULL, '5.00', '2022-11-27'),
(5796, 33, NULL, NULL, '5.50', '2022-11-27'),
(5824, 17, NULL, NULL, '8.50', '2022-11-28'),
(5842, 33, NULL, NULL, '15.00', '2022-11-27'),
(5884, 17, NULL, NULL, '5.00', '2022-11-27'),
(6179, 17, NULL, NULL, '5.00', '2022-11-27'),
(6771, 17, NULL, NULL, '5.50', '2022-11-27'),
(6854, 17, NULL, NULL, '5.00', '2022-11-27'),
(6915, 17, NULL, NULL, '3.00', '2022-11-28'),
(7363, 33, NULL, NULL, '5.00', '2022-11-26'),
(7564, 17, NULL, NULL, '5.00', '2022-11-27'),
(7593, 33, NULL, NULL, '16.00', '2022-11-26'),
(7903, 17, NULL, NULL, '5.00', '2022-11-28'),
(8125, 29, NULL, NULL, '17.50', '2022-11-25'),
(8575, 17, NULL, NULL, '5.00', '2022-11-27'),
(8614, 17, NULL, NULL, '5.00', '2022-11-28'),
(8796, 17, NULL, NULL, '3.00', '2022-11-27'),
(9112, 17, NULL, NULL, '5.50', '2022-11-27'),
(9117, 20, NULL, NULL, '10.00', '2022-11-25'),
(9147, 32, NULL, NULL, '5.50', '2022-11-26'),
(9299, 17, NULL, NULL, '5.50', '2022-11-27'),
(9336, 33, NULL, NULL, '3.00', '2022-11-27');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `ORDER_ID` int(11) NOT NULL,
  `PROD_ID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `item_cost` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`ORDER_ID`, `PROD_ID`, `quantity`, `item_cost`) VALUES
(156, 33, 1, '1.00'),
(844, 20, 1, '5.00'),
(876, 19, 1, '5.50'),
(876, 21, 1, '5.00'),
(876, 27, 1, '3.50'),
(876, 34, 1, '15.00'),
(955, 19, 3, '16.50'),
(1632, 19, 1, '5.50'),
(1651, 22, 1, '6.50'),
(1651, 23, 1, '3.50'),
(1651, 30, 1, '4.50'),
(1651, 31, 2, '6.00'),
(1993, 19, 2, '11.00'),
(2113, 35, 1, '4.00'),
(2427, 32, 1, '3.50'),
(2447, 20, 1, '5.00'),
(2458, 34, 1, '15.00'),
(2753, 25, 1, '2.99'),
(2753, 120, 1, '8.00'),
(2992, 26, 1, '5.00'),
(2992, 27, 1, '3.50'),
(3371, 19, 1, '5.50'),
(3435, 35, 1, '4.00'),
(3443, 33, 2, '2.00'),
(3766, 19, 1, '5.50'),
(3890, 19, 2, '11.00'),
(3890, 23, 1, '3.50'),
(4164, 33, 1, '1.00'),
(4844, 19, 1, '5.50'),
(5159, 21, 2, '10.00'),
(5159, 32, 1, '3.50'),
(5159, 33, 1, '1.00'),
(5159, 120, 1, '8.00'),
(5297, 19, 1, '5.50'),
(5716, 21, 1, '5.00'),
(5796, 19, 1, '5.50'),
(5824, 21, 1, '5.00'),
(5824, 27, 1, '3.50'),
(5842, 34, 1, '15.00'),
(5884, 20, 1, '5.00'),
(6179, 20, 1, '5.00'),
(6771, 19, 1, '5.50'),
(6854, 20, 1, '5.00'),
(6915, 31, 1, '3.00'),
(7363, 21, 1, '5.00'),
(7564, 21, 1, '5.00'),
(7593, 19, 2, '5.00'),
(7593, 20, 1, '5.00'),
(7903, 20, 1, '5.00'),
(8125, 19, 1, '5.50'),
(8125, 26, 1, '5.00'),
(8125, 27, 2, '7.00'),
(8575, 24, 1, '5.00'),
(8614, 21, 1, '5.00'),
(8796, 31, 1, '3.00'),
(9112, 19, 1, '5.50'),
(9117, 20, 2, '10.00'),
(9147, 19, 1, '5.50'),
(9299, 19, 1, '5.50'),
(9336, 31, 1, '3.00');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `CLASS_ID` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `iuid` int(11) NOT NULL COMMENT 'Instructor User ID',
  `class_description` varchar(255) DEFAULT NULL,
  `class_image` varchar(255) DEFAULT NULL,
  `current_capacity` int(11) NOT NULL DEFAULT 0,
  `class_max_capacity` int(11) NOT NULL,
  `start_time` varchar(50) NOT NULL,
  `end_time` varchar(50) NOT NULL,
  `class_day` varchar(255) NOT NULL,
  `is_full` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`CLASS_ID`, `class_name`, `iuid`, `class_description`, `class_image`, `current_capacity`, `class_max_capacity`, `start_time`, `end_time`, `class_day`, `is_full`) VALUES
(10, 'Yoga', 10, 'Incorporates yoga postures, poses, gentle movement sequences, breath work, supported silent meditation, and guided relaxation to support increased awareness and mindfulness of the breath and body', 'yoga-class.webp', 0, 30, '07:00', '09:00', 'Monday', 1),
(11, 'Boxing', 10, 'Teaches the basic boxing stance, footwork, and skills while also gradually building up your stamina, strength, and endurance. This includes a cardio warmup, core work, and various boxing exercises followed by short recovery periods', 'boxing-class.webp', 0, 30, '09:00', '10:30', 'Wednesday', 1),
(12, 'Power Fitness', 17, 'A blend of cardio and weights with a primary focus on improving overall strength. It incorporates high volume (reps) and low resistance (weight) workouts with short rest intervals and is geared to improve muscle tone and definition', 'powerfitness-class.jpeg', 0, 30, '07:00', '09:00', 'Tuesday', 1),
(13, 'Aerobics', 12, 'Aims to work all muscle groups with a variety of strengthening and conditioning exercises for a complete workout. This includes circuit training, cardio exercises, body weight exercises and finishes with core training and stretching', 'aerobics-class.jpeg', 0, 30, '11:30', '15:30', 'Wednesday', 1),
(14, 'Cardio', 29, 'An interval training sequence with high-intensity exercises. Starts with a warm-up followed by a cardio segment that gradually increases in intensity. It focuses on building cardiovascular fitness while improving muscular strength and endurance', 'cardio-class2.webp', 0, 30, '14:00', '15:30', 'Thursday', 1),
(15, 'Body Work', 30, 'Combines traditional and modern Pilates mat exercises to improve muscular balance and strength, fluidity and length. You will build a stronger core and improve posture using props such as mini-stability balls, therabands, bolsters or foam rollers', 'bodyWork-class.jpeg', 0, 30, '11:00', '17:20', 'Friday', 1),
(17, 'Powerlifting', 17, 'For powerlifters looking to increase their muscularity and improve their max. This program is built around developing skill and strength using competition lifts, and aims to improve the most one can lift in their squat, bench press, and deadlift', 'powerlifting-class.jpeg', 0, 15, '15:00', '18:00', 'Tuesday', 1),
(18, 'Crossfit', 10, 'A strength and conditioning workout class that is made up of functional movements performed at a high intensity level. These movements include actions that you perform in your day-to-day life, like squatting, pulling, pushing, and more', 'crossfit-class2.jpeg', 0, 30, '14:00', '16:00', 'Saturday', 1),
(19, 'Hot Yoga', 19, 'A movement based practice, flowing movement with breath. It is practiced in a hot room (95-105 degrees) focusing on linking breath and poses, and ending with a guided meditation that allows you to unwind your mind and finish relaxed and refreshed', 'hotyoga-class.jpeg', 0, 30, '17:30', '20:00', 'Saturday', 1),
(32, 'Zumba', 17, 'An interval workout of aerobic fitness exercises based on Latin American dance rhythms. The class moves between high and low-intensity dance movements that are simple and designed to get your heart rate up and boost cardio endurance', 'zumba-class.jpeg', 0, 45, '16:00', '18:00', 'Wednesday', 1);

-- --------------------------------------------------------

--
-- Table structure for table `class_attendance`
--

CREATE TABLE `class_attendance` (
  `ATTENDEE_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `CLASS_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `MEMBERSHIP_ID` int(11) NOT NULL,
  `membership_type` varchar(255) NOT NULL,
  `membership_cost` decimal(4,2) NOT NULL,
  `membership_duration` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PAYMENT_ID` int(11) NOT NULL,
  `ORDER_ID` int(11) NOT NULL,
  `amount_paid` int(11) NOT NULL,
  `payment_date` int(11) NOT NULL,
  `payment_time` int(11) NOT NULL,
  `payment_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `total_rented` int(2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prod-data`
--

INSERT INTO `prod-data` (`PROD_ID`, `prod_name`, `prod_desc`, `prod_image`, `prod_price`, `prod_quantity`, `VENDOR_ID`, `prod_date_purchased`, `prod_purchase_cost`, `total_rented`) VALUES
(19, 'Basketball - Large', 'This is a size 7 basketball with 29.5\" circumference', '../UI/images/prod_images/basketball.jpg', 5.50, 3, 1, '10/23/2022', '20.99', 4),
(20, 'Basketball-Small', 'This is a size 6 basketball with 28.5\" circumference', '../UI/images/prod_images/basketball-small.jpg', 5.00, 2, 1, '10/28/22', '15.99', 5),
(21, 'Soccer Ball', 'This is a size 5 soccer ball with a 28\" circumference ', '../UI/images/prod_images/soccerball.jpg', 5.00, 6, 1, '10/28/22', '19.99', 3),
(22, 'Racquetball Racquet', 'This is a pack of 4 racquets ', '../UI/images/prod_images/racquetballracket.jpg', 6.50, 6, 3, '11/5/22', '10.00', 0),
(23, 'Racquetballs', 'This is a pack of 6 Racquetballs ', '../UI/images/prod_images/racquetballs.jpg', 3.50, 3, 3, '9/30/22', '9.99', 1),
(24, 'Football', 'This is a size 5 football with a 28\" circumference ', '../UI/images/prod_images/football.jpg', 5.00, 4, 1, '11/8/22', '20.99', 2),
(25, 'Jump Rope', 'This is a standard sized jump rope', '../UI/images/prod_images/jumprope.jpg', 2.99, 3, 2, '11/21/22', '7.50', 0),
(26, 'Volleyball', 'This is a size 5 volleyball with a 26\" circumference ', '../UI/images/prod_images/volleyball.jpg', 5.00, 4, 1, '10/15/22', '15.99', 0),
(27, 'Frisbee', 'This is a standard sized Frisbee ', '../UI/images/prod_images/frisbee.jpg', 3.50, 4, 2, '11/2/22', '12.00', 0),
(30, 'Badminton Racket', 'Racket rentals come in a pack of 4 ', '../UI/images/prod_images/badmintonracket.jpg', 4.50, 4, 3, '10/28/22', '7.00', 0),
(31, 'Badminton Birdie ', 'Birdies come in a pack of 4 ', '../UI/images/prod_images/birdie.jpg', 3.00, 7, 3, '9/30/22', '5.00', 5),
(32, 'Resistance Band', '5 bands of various resistance. X-Heavy, Heavy, Medium, Light, X-Light', '../UI/images/prod_images/resistancebands.jpg', 3.50, 9, 2, '10/29/22', '8.50', 1),
(33, 'Stop Watch', 'This is a standard stopwatch ', '../UI/images/prod_images/stopwatch.jpg', 1.00, 3, 2, '', '4.50', 4),
(34, 'Kan Jam', 'This KanJam Set includes 2 \"kans\" and 1 frisbee', '../UI/images/prod_images/kanjam.jpg', 15.00, 1, 2, '10/30/22', '25.00', 1),
(35, 'Kickball', 'This is a rubber kickball', '../UI/images/prod_images/kickball.jpg', 4.00, 3, 1, '11/2/22', '7.00', 0),
(120, 'Agility Ladder', 'This is a 15 foot long, 20 inch wide ladder.', '../UI/images/prod_images/agilityladder.jpg', 8.00, 2, 3, '11/7/22', '15.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `ADD_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `st` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `is_billing` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`ADD_ID`, `USER_ID`, `address1`, `address2`, `city`, `st`, `zip`, `is_billing`) VALUES
(1, 29, '123 Smith Road ', 'Apt 3', 'New Paltz', 'NY', '12561', 0),
(2, 30, '2508 Main St ', '', 'Highland', 'NY', '12528', 0),
(3, 31, '44 Pleasant Ave ', 'Apt 6', 'Poughkeepsie ', 'ny', '12603', 0),
(4, 32, '52 Berry Lane ', '', 'New Paltz', 'NY', '12561', 0),
(5, 33, '82 Horsebarn Hill ', '', 'Kingston ', 'ny ', '12401', 0);

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
  `lname` varchar(30) NOT NULL,
  `MEMBERSHIP_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`USER_ID`, `email`, `passcode`, `roles`, `fname`, `lname`, `MEMBERSHIP_ID`) VALUES
(10, 'brianna@gmail.com', '$2y$10$/XrehT7yROP5.t4FMcdqD.s/VzlEkkxxYDD.5D1Ub1dwkYd7mCnva', 1, 'Brianna', 'Smith', NULL),
(12, 'dan@gmail.com', '$2y$10$1gaP1lge0UbXHqjLMKqHlO2jh5Sm/3YaHn5wIqk/Q1egTE7Il/olK', 2, 'Dan', 'Smith', NULL),
(17, 'bee@gmail.com', '$2y$10$0E3FqfVQvF8wMYKegLwIXOsZywxrUdq/cFvY8uGidYGy4F7p6OsAi', 5, 'Bee', 'Kurzum', NULL),
(19, 'jdom@gmail.com', '$2y$12$xmVjLQpuk1B5t7/ycpkm7.cT3UZu2ACeqhsF.y1jxiWxnJ9GCEHRe', 1, 'Jeo', 'Dom', NULL),
(20, 'test@gmail.com', '$2y$12$rxQb5DcWOQJuWJXGpBofDe0lsO22.TS31pU.gtGaHEvV5Vf8wxzHy', 5, 'Test', 'Name', NULL),
(29, 'olamide@gmail.com', '$2y$12$sWlY6lRxsnHVkQpd.HSVKewKWgUijbofDjKw9VTBYKplLqc1PDYni', 1, 'Olamide', 'Kumapayi', NULL),
(30, 'erica@gmail.com', '$2y$12$WWNDOUceuTsUcX733FeVtu3tYVGfKG6SwjWE78MJTwt2bokQqYtMO', 2, 'Erica', 'Dubie', NULL),
(31, 'beesanne@gmail.com', '$2y$12$uZMuGIIRHS1wF0y.wdGYie5fSWE3KbaBabwwijpVMtKazU6LW5VMO', 3, 'Beesanne ', 'Kurzum', NULL),
(32, 'christina@gmail.com', '$2y$12$E.0j.IaiA0md11OG6O86Cugml6FwLbb/EObZ0vDR6gkqsbUme8XS6', 4, 'Christina ', 'Rodriguez ', NULL),
(33, 'charlie@gmail.com', '$2y$12$bMMGyXt06JJHiqF0owiDmu2UGIlnAbV4Ldq8rfiOd/D6QpQ6Jiuo6', 5, 'Charlie', 'Olinsky', NULL),
(34, 'user@gmail.com', '$2y$12$73GmxLAqhIOE5ercnjr0JubYaBSAa9i0CtDOg/K6OuRp2kcKKhF5C', 1, 'Testuser ', 'User', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendor_id`
--

INSERT INTO `vendor_id` (`VENDOR_ID`, `v_name`, `v_address1`, `v_address2`, `v_city`, `v_state`, `v_zip`, `v_contact_name`, `v_contact_email`, `v_contact_phone`) VALUES
(1, 'Baskets, Balls, and More ', '323 South Road', ' ', 'Poughkeepsie', 'NY', 12601, 'Peter Smith', 'p.smith@bbandm.com', '845-999-9901'),
(2, 'Sports Goods Inc', '84 Mullberry Road', ' ', 'Beacon', 'NY', 12652, 'Abby Kruz', 'abby.kruz@sportsgoods.com', '845-999-9902'),
(3, 'NY Sports Gear', '2390 West Ave', '3 ', 'Yonkers', 'NY', 13045, 'Micheal Brandy', 'brandym@nysportsgear.com', '845-999-9903');

-- --------------------------------------------------------

--
-- Table structure for table `z_reports`
--

CREATE TABLE `z_reports` (
  `Z_REP_ID` int(11) NOT NULL,
  `todays_date` date NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_net` decimal(4,2) NOT NULL,
  `total_tax` decimal(4,2) NOT NULL,
  `total_sales` decimal(4,2) NOT NULL,
  `total_debit` decimal(4,2) NOT NULL,
  `total_credit` decimal(4,2) NOT NULL,
  `total_discounts` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`CLASS_ID`),
  ADD KEY `iuid` (`iuid`);

--
-- Indexes for table `class_attendance`
--
ALTER TABLE `class_attendance`
  ADD PRIMARY KEY (`ATTENDEE_ID`),
  ADD KEY `USER_ID` (`USER_ID`),
  ADD KEY `CLASS_ID` (`CLASS_ID`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`MEMBERSHIP_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PAYMENT_ID`),
  ADD KEY `ORDER_ID` (`ORDER_ID`);

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
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `MEMBERSHIP_ID` (`MEMBERSHIP_ID`);

--
-- Indexes for table `vendor_id`
--
ALTER TABLE `vendor_id`
  ADD PRIMARY KEY (`VENDOR_ID`);

--
-- Indexes for table `z_reports`
--
ALTER TABLE `z_reports`
  ADD PRIMARY KEY (`Z_REP_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `CLASS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `class_attendance`
--
ALTER TABLE `class_attendance`
  MODIFY `ATTENDEE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `MEMBERSHIP_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PAYMENT_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prod-data`
--
ALTER TABLE `prod-data`
  MODIFY `PROD_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `ADD_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `vendor_id`
--
ALTER TABLE `vendor_id`
  MODIFY `VENDOR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `z_reports`
--
ALTER TABLE `z_reports`
  MODIFY `Z_REP_ID` int(11) NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`iuid`) REFERENCES `user_table` (`USER_ID`);

--
-- Constraints for table `class_attendance`
--
ALTER TABLE `class_attendance`
  ADD CONSTRAINT `class_attendance_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `class_attendance` (`ATTENDEE_ID`),
  ADD CONSTRAINT `class_attendance_ibfk_2` FOREIGN KEY (`CLASS_ID`) REFERENCES `classes` (`CLASS_ID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`ORDER_ID`) REFERENCES `cart` (`ORDER_ID`);

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

--
-- Constraints for table `user_table`
--
ALTER TABLE `user_table`
  ADD CONSTRAINT `user_table_ibfk_1` FOREIGN KEY (`MEMBERSHIP_ID`) REFERENCES `membership` (`MEMBERSHIP_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

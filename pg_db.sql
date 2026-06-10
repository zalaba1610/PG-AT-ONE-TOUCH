-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 01, 2024 at 08:44 AM
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
-- Database: `pg_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tb`
--

DROP TABLE IF EXISTS `admin_tb`;
CREATE TABLE IF NOT EXISTS `admin_tb` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_username` varchar(50) NOT NULL,
  `a_password` varchar(20) NOT NULL,
  `a_image` varchar(100) NOT NULL,
  `a_lastvisit` datetime NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_tb`
--

INSERT INTO `admin_tb` (`a_id`, `a_username`, `a_password`, `a_image`, `a_lastvisit`) VALUES
(1, 'minal', '1234', 'a.jpg', '2024-02-20 13:14:09');

-- --------------------------------------------------------

--
-- Table structure for table `area_tb`
--

DROP TABLE IF EXISTS `area_tb`;
CREATE TABLE IF NOT EXISTS `area_tb` (
  `ar_id` int(11) NOT NULL AUTO_INCREMENT,
  `ar_name` varchar(50) NOT NULL,
  `ar_status` enum('Active','Deactive') NOT NULL,
  `ar_cdate` datetime NOT NULL,
  `ar_udate` datetime NOT NULL,
  PRIMARY KEY (`ar_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area_tb`
--

INSERT INTO `area_tb` (`ar_id`, `ar_name`, `ar_status`, `ar_cdate`, `ar_udate`) VALUES
(1, 'Infocity', 'Active', '2024-02-08 14:36:37', '2024-02-08 14:36:37'),
(2, 'Kudasan', 'Active', '2024-02-08 14:36:47', '2024-02-08 14:36:47'),
(3, 'Sector-8', 'Active', '2024-02-08 14:37:04', '2024-02-08 14:37:04'),
(4, 'Rayasan', 'Active', '2024-02-08 14:37:30', '2024-02-08 14:37:30'),
(5, 'Sargasan', 'Active', '2024-02-08 14:37:57', '2024-02-08 14:37:57'),
(6, 'Sector-2', 'Active', '2024-02-08 14:38:33', '2024-02-08 14:38:33'),
(7, 'Sector-4', 'Active', '2024-02-08 14:39:24', '2024-02-08 14:39:24'),
(8, 'Randesan', 'Active', '2024-02-08 14:40:04', '2024-02-08 14:40:04'),
(9, 'Sector-28', 'Active', '2024-02-08 14:40:18', '2024-02-08 14:40:18'),
(10, 'Sector-5', 'Active', '2024-02-08 14:41:07', '2024-02-08 14:41:07');

-- --------------------------------------------------------

--
-- Table structure for table `booking_tb`
--

DROP TABLE IF EXISTS `booking_tb`;
CREATE TABLE IF NOT EXISTS `booking_tb` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `pg_id` int(11) NOT NULL,
  `o_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `b_pgrent` int(11) NOT NULL,
  `b_servicename` varchar(255) DEFAULT NULL,
  `b_serviceprice` int(11) NOT NULL,
  `b_total` int(11) NOT NULL,
  `b_status` enum('Pending','Confirm','Cancel') NOT NULL,
  `b_cdate` datetime NOT NULL,
  `b_udate` datetime NOT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_tb`
--

INSERT INTO `booking_tb` (`b_id`, `pg_id`, `o_id`, `u_id`, `b_pgrent`, `b_servicename`, `b_serviceprice`, `b_total`, `b_status`, `b_cdate`, `b_udate`) VALUES
(1, 4, 1, 4, 5500, '', 0, 5500, 'Pending', '2024-02-20 13:56:37', '2024-02-20 13:56:37'),
(2, 35, 3, 4, 5500, '', 0, 5500, 'Pending', '2024-02-20 14:34:12', '2024-02-20 14:34:12'),
(3, 31, 2, 2, 7000, 'Wi-Fi,Food,AC,', 500, 7500, 'Cancel', '2024-02-20 15:16:18', '2024-02-21 14:15:14'),
(4, 31, 2, 2, 7000, 'Wi-Fi,Food,', 0, 7000, 'Pending', '2024-02-20 15:17:05', '2024-02-20 15:17:05'),
(5, 31, 2, 2, 7000, 'Wi-Fi,Food,Laundry,', 300, 7300, 'Pending', '2024-02-21 13:59:17', '2024-02-21 13:59:17'),
(6, 31, 2, 2, 7000, 'Wi-Fi,Food,Laundry,', 300, 7300, 'Pending', '2024-03-01 13:27:43', '2024-03-01 13:27:43');

-- --------------------------------------------------------

--
-- Table structure for table `category_tb`
--

DROP TABLE IF EXISTS `category_tb`;
CREATE TABLE IF NOT EXISTS `category_tb` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(50) NOT NULL,
  `cat_image` varchar(100) NOT NULL,
  `cat_status` enum('Active','Deactive') NOT NULL,
  `cat_cdate` datetime NOT NULL,
  `cat_udate` datetime NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_tb`
--

INSERT INTO `category_tb` (`cat_id`, `cat_name`, `cat_image`, `cat_status`, `cat_cdate`, `cat_udate`) VALUES
(1, '1BHK', 'cat-1.jpg', 'Active', '2024-02-08 15:08:59', '2024-02-08 15:08:59'),
(2, '2BHK', 'cat-2.jpg', 'Active', '2024-02-08 15:09:20', '2024-02-08 15:09:20'),
(3, '3BHK', 'cat-3.jpeg', 'Active', '2024-02-08 15:09:36', '2024-02-08 15:09:36');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_tb`
--

DROP TABLE IF EXISTS `feedback_tb`;
CREATE TABLE IF NOT EXISTS `feedback_tb` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  `pg_id` int(11) NOT NULL,
  `f_name` varchar(50) DEFAULT NULL,
  `f_contact` bigint(22) DEFAULT NULL,
  `f_msg` text NOT NULL,
  `f_type` enum('Query','Review') NOT NULL,
  `f_status` enum('Show','Hide') NOT NULL,
  `f_cdate` datetime NOT NULL,
  `f_udate` datetime NOT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_tb`
--

INSERT INTO `feedback_tb` (`f_id`, `u_id`, `pg_id`, `f_name`, `f_contact`, `f_msg`, `f_type`, `f_status`, `f_cdate`, `f_udate`) VALUES
(1, 0, 0, 'Bhavsar Mansi', 9725557988, 'This PG is absolutely superb, the staff are friendly and helpful.The facillities are cleaned daily,rooms are spacious,large locker for the bigger backpacks. ', 'Query', 'Show', '2024-02-08 15:40:25', '2024-02-08 15:40:56'),
(2, 0, 0, 'Gadhiya Minal', 8733830514, 'Good location and clean rooms.Everything works well in kitchen and bathroom.The staff are very friendly and trying to help in every way.', 'Query', 'Show', '2024-02-08 15:43:57', '2024-02-08 15:48:35'),
(3, 0, 0, 'Zala Rina', 7043833861, 'It was in a great area,next to green line,everything is accessable.The room was clean,the bathroom and the kitchen as well.', 'Query', 'Show', '2024-02-08 15:48:23', '2024-02-08 15:48:33'),
(4, 0, 0, NULL, NULL, 'Good location and clean rooms.Everything works well in kitchen and bathroom.The staff are very friendly and trying to help in every way.', 'Review', 'Hide', '2024-02-19 16:16:48', '2024-02-19 16:16:48'),
(5, 0, 0, NULL, NULL, 'This PG is absolutely superb, the staff are friendly and helpful.The facillities are cleaned daily,rooms are spacious,large locker for the bigger backpacks. ', 'Review', 'Hide', '2024-02-19 16:18:30', '2024-02-19 16:18:30'),
(6, 0, 30, NULL, NULL, 'It was in a great area,next to green line,everything is accessable.The room was clean,the bathroom and the kitchen as well.', 'Review', 'Hide', '2024-02-19 16:20:21', '2024-02-19 16:20:21'),
(7, 1, 32, NULL, NULL, 'Good location and clean rooms.Everything works well in kitchen and bathroom.The staff are very friendly and trying to help in every way.', 'Review', 'Hide', '2024-02-19 16:22:56', '2024-02-19 16:22:56'),
(8, 4, 9, NULL, NULL, 'This PG is absolutely superb, the staff are friendly and helpful.The facillities are cleaned daily,rooms are spacious,large locker for the bigger backpacks. ', 'Review', 'Hide', '2024-02-20 10:15:19', '2024-02-20 10:15:19'),
(9, 2, 31, NULL, NULL, 'good', 'Review', 'Hide', '2024-03-01 13:27:14', '2024-03-01 13:27:14');

-- --------------------------------------------------------

--
-- Table structure for table `owner_tb`
--

DROP TABLE IF EXISTS `owner_tb`;
CREATE TABLE IF NOT EXISTS `owner_tb` (
  `o_id` int(11) NOT NULL AUTO_INCREMENT,
  `o_name` varchar(50) NOT NULL,
  `o_contact` bigint(22) NOT NULL,
  `o_add` text NOT NULL,
  `o_image` varchar(100) NOT NULL,
  `o_idproof` varchar(100) NOT NULL,
  `o_password` varchar(20) NOT NULL,
  `o_status` enum('Active','Deactive') NOT NULL,
  `o_cdate` datetime NOT NULL,
  `o_udate` datetime NOT NULL,
  PRIMARY KEY (`o_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner_tb`
--

INSERT INTO `owner_tb` (`o_id`, `o_name`, `o_contact`, `o_add`, `o_image`, `o_idproof`, `o_password`, `o_status`, `o_cdate`, `o_udate`) VALUES
(1, 'Bhavsar Mansi', 9725557988, 'B-15 Pratik Tenament,India colony,Bapunagar,Ahmedabad.', 'mansi-1.jpg', 'id.jpg', 'm@1234', 'Active', '2024-02-08 15:13:06', '2024-02-21 14:33:32'),
(2, 'Gadhiya Minal', 8733830514, 'C-21 Krushnadham soi,Vastral road ,Ahmedabad.', 'minal1.jpg', 'id.jpg', 'minal123', 'Active', '2024-02-08 15:14:35', '2024-02-20 15:18:01'),
(3, 'Zala Rina', 7043833861, 'C-15 Param pinak,Naroda,Ahmedabad.', 'rina.jpg', 'id.jpg', 'r@123', 'Active', '2024-02-08 15:15:53', '2024-02-16 10:59:37');

-- --------------------------------------------------------

--
-- Table structure for table `payment_tb`
--

DROP TABLE IF EXISTS `payment_tb`;
CREATE TABLE IF NOT EXISTS `payment_tb` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `b_id` int(11) NOT NULL,
  `p_amount` int(11) NOT NULL,
  `p_status` enum('Success','Failed') NOT NULL,
  `p_cdate` datetime NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_tb`
--

INSERT INTO `payment_tb` (`p_id`, `b_id`, `p_amount`, `p_status`, `p_cdate`) VALUES
(1, 1, 5500, 'Success', '2024-02-20 14:05:36'),
(2, 2, 5500, 'Failed', '2024-02-20 14:34:12'),
(3, 3, 7500, 'Failed', '2024-02-20 15:16:18'),
(4, 4, 7000, 'Failed', '2024-02-20 15:17:05'),
(5, 5, 7300, 'Success', '2024-02-21 14:00:00'),
(6, 6, 7300, 'Failed', '2024-03-01 13:27:43');

-- --------------------------------------------------------

--
-- Table structure for table `pg_tb`
--

DROP TABLE IF EXISTS `pg_tb`;
CREATE TABLE IF NOT EXISTS `pg_tb` (
  `pg_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `ar_id` int(11) NOT NULL,
  `o_id` int(11) NOT NULL,
  `pg_name` varchar(50) NOT NULL,
  `pg_add` text NOT NULL,
  `pg_details` text NOT NULL,
  `pg_image1` varchar(100) NOT NULL,
  `pg_image2` varchar(100) NOT NULL,
  `pg_image3` varchar(100) NOT NULL,
  `pg_capacity` varchar(20) NOT NULL,
  `pg_rent` int(11) NOT NULL,
  `pg_status` enum('Active','Deactive') NOT NULL,
  `pg_cdate` datetime NOT NULL,
  `pg_udate` datetime NOT NULL,
  PRIMARY KEY (`pg_id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pg_tb`
--

INSERT INTO `pg_tb` (`pg_id`, `cat_id`, `ar_id`, `o_id`, `pg_name`, `pg_add`, `pg_details`, `pg_image1`, `pg_image2`, `pg_image3`, `pg_capacity`, `pg_rent`, `pg_status`, `pg_cdate`, `pg_udate`) VALUES
(1, 1, 1, 1, 'Royal PG', 'Tapas Marg, Zone 3, Plot No 38, Infocity,Gandhinagar-382355', 'Move into Accommodation FOR PG, a professionally managed PG home in the Infocity, Gandhinagar. Located in a safe neighborhood, this unisex PG offers various modern amenities for your comfort, such as TV, AC, Food, Power Backup, Wi-Fi etc.', 'pg-1.jpg', 'pg1.jpg', 'pg2.jpg', 'Single', 8000, 'Active', '2024-02-12 12:27:22', '2024-02-12 12:27:22'),
(2, 1, 2, 1, 'Sai Ram PG', 'Palm Road, Hotel Prominent Corporate Residency, Kudasan, Gandhinagar-382421 ', 'Move into Capital PG, A Professionally Managed PG Home in the Sargasan, Gandhinagar. Located in a Safe Neighborhood, This Male PG offers Various Modern Amenities For Your Comfort, Such as TV, AC, Food, Wi-Fi, etc. ', 'pg(2).jpg', 'pg2.jpg', 'pg3.webp', 'Single', 6000, 'Active', '2024-02-12 12:33:23', '2024-02-12 12:33:23'),
(3, 1, 3, 1, 'Krishna PG', 'GH Road, Pathikashram Nilaya, Sector 8, Gandhinagar-382007 ', 'Move into Capital PG, A Professionally Managed PG Home in the Sargasan, Gandhinagar. Located in a Safe Neighborhood, This Male PG offers Various Modern Amenities For Your Comfort, Such as TV, AC, Food, Wi-Fi, etc. ', 'pg(3).jpg', 'pg4.jpg', 'pg2.jpg', 'Single', 5000, 'Active', '2024-02-12 12:36:35', '2024-02-12 12:36:35'),
(4, 1, 4, 1, 'Devnagari', 'Palm Road, Hotel Prominent Corporate Residency, Rayasan, Gandhinagar- 382421 ', 'Move into Capital PG, A Professionally Managed PG Home in the Rayasan, Gandhinagar. Located in a Safe Neighborhood, This Male PG offers Various Modern Amenities For Your Comfort, Such as TV, AC, Food, Wi-Fi, etc.', 'pg(4).jpg', 'pg7.avif', 'pg9', 'Single', 5500, 'Active', '2024-02-12 12:40:49', '2024-02-12 12:40:49'),
(5, 2, 1, 1, 'The Star PG', 'Tapas Marg, Zone 3, Plot No 38, Infocity,Gandhinagar-382355', 'Move into Accommodation FOR PG, a professionally managed PG home in the Infocity, Gandhinagar. Located in a safe neighborhood, this unisex PG offers various modern amenities for your comfort, such as TV, AC, Food, Power Backup, Wi-Fi etc.', 'pg-1.jpg', 'pg7.avif', 'pg10', 'Double', 7000, 'Active', '2024-02-12 12:44:36', '2024-02-16 10:12:05'),
(6, 2, 2, 1, 'Harmony Living  PG', 'Palm Road, Hotel Prominent Corporate Residency, Kudasan, Gandhinagar-382421', 'Move into Capital PG, A Professionally Managed PG Home in the Sargasan, Gandhinagar. Located in a Safe Neighborhood, This Male PG offers Various Modern Amenities For Your Comfort, Such as TV, AC, Food, Wi-Fi, etc.', 'pg(3).jpg', 'pg12.jpg', 'pg3.webp', 'Double', 6000, 'Active', '2024-02-12 12:46:14', '2024-02-16 10:13:15'),
(7, 2, 3, 1, 'Happy PG', 'GH Road, Pathikashram Nilaya, Sector 8, Gandhinagar-382007', 'Move into Capital PG, A Professionally Managed PG Home in the Sargasan, Gandhinagar. Located in a Safe Neighborhood, This Male PG offers Various Modern Amenities For Your Comfort, Such as TV, AC, Food, Wi-Fi, etc.', 'pg(2).jpg', 'pg5.webp', 'pg11.webp', 'Double', 9000, 'Active', '2024-02-12 12:47:30', '2024-02-16 10:14:40'),
(8, 2, 4, 1, 'Dwarkadhish PG', 'Palm Road, Hotel Prominent Corporate Residency, Rayasan, Gandhinagar- 382421', 'Move into Capital PG, A Professionally Managed PG Home in the Rayasan, Gandhinagar. Located in a Safe Neighborhood, This Male PG offers Various Modern Amenities For Your Comfort, Such as TV, AC, Food, Wi-Fi, etc.', 'pg(4).jpg', 'pg3.webp', 'pg8.jpg', 'Double', 4000, 'Active', '2024-02-12 12:48:58', '2024-02-16 10:16:23'),
(9, 3, 7, 1, 'The Nest PG', 'Palm Road, Hotel Prominent Corporate Residency, Sector-4, Gandhinagar-382421', 'Move into Capital PG, A Professionally Managed PG Home in the Sargasan, Gandhinagar. Located in a Safe Neighborhood, This Male PG offers Various Modern Amenities For Your Comfort, Such as TV, AC, Food, Wi-Fi, etc.', 'pg(7).webp', 'pg6', 'pg9', 'Triple', 6000, 'Active', '2024-02-12 12:52:53', '2024-02-16 10:16:48'),
(10, 3, 8, 1, 'The Skylon PG', 'Tapas Marg, Zone 3, Plot No 38, Randesan,Gandhinagar-382355	', 'Move into Capital PG, A Professionally Managed PG Home in the Sargasan, Gandhinagar. Located in a Safe Neighborhood, This Male PG offers Various Modern Amenities For Your Comfort, Such as TV, AC, Food, Wi-Fi, etc.', 'pg(5).jpg', 'pg2.jpg', 'pg12.jpg', 'Triple', 5000, 'Active', '2024-02-12 12:54:15', '2024-02-16 10:19:09'),
(11, 3, 10, 1, 'Sai Ram PG', 'Tapas Marg, Zone 3, Plot No 40, Sector-5,Gandhinagar-382355	', 'Move into Accommodation FOR PG, a professionally managed PG home in the Infocity, Gandhinagar. Located in a safe neighborhood, this unisex PG offers various modern amenities for your comfort, such as TV, AC, Food, Power Backup, Wi-Fi etc. This PG has single, double, triple occupancy types. This PG is nearby major commercial and educational hubs. Please contact the seller to book this fast selling high in demand PG stay.', 'pg(3).jpg', 'pg3.webp', 'pg11.webp', 'Triple', 7000, 'Active', '2024-02-12 13:05:10', '2024-02-12 13:05:10'),
(12, 3, 5, 1, 'Ashopalav PG', 'Tapas Marg, Zone 5, Plot No 38, Sargasan,Gandhinagar-382355', 'Move into Accommodation FOR PG, a professionally managed PG home in the Infocity, Gandhinagar. Located in a safe neighborhood, this unisex PG offers various modern amenities for your comfort, such as TV, AC, Food, Power Backup, Wi-Fi etc.', 'pg(2).jpg', 'pg11.webp', 'pg10', 'Triple', 5000, 'Active', '2024-02-12 14:42:08', '2024-02-16 10:20:13'),
(13, 3, 1, 2, 'Krishna PG', 'GIFT City Near Gift Tower 1 Gandhinagar, Infocity Gandhinagar- 382355', 'Move into Accommodation FOR PG, a professionally managed PG home in the Infocity, Gandhinagar. Located in a safe neighborhood, this unisex PG offers various modern amenities for your comfort, such as TV, AC, Food, Power Backup, Wi-Fi etc. This PG has single, double, triple occupancy types. This PG is nearby major commercial and educational hubs. Please contact the seller to book this fast selling high in demand PG stay.', 'pg(2).jpg', 'pg7.jpg', 'pg2.jpg', 'Triple', 7000, 'Active', '2024-02-12 15:01:49', '2024-02-12 15:02:46'),
(14, 3, 2, 2, 'Rameshwar', 'CHOKDI, 6th Floor Sarthak Pulse Mall, Kudasan, Gandhinagar, India, 382421', 'Move into Accommodation FOR PG, a professionally managed PG home in the Infocity, Gandhinagar. Located in a safe neighborhood, this unisex PG offers various modern amenities for your comfort, such as TV, AC, Food, Power Backup, Wi-Fi etc. This PG has single, double, triple occupancy types. This PG is nearby major commercial and educational hubs. Please contact the seller to book this fast selling high in demand PG stay', 'pg(1).jpeg', 'pg3.jpg', 'pg6.jpeg', 'Triple', 6000, 'Active', '2024-02-12 15:06:08', '2024-02-12 15:06:08'),
(15, 3, 3, 2, 'Sunshine', 'K Road, Behind HP Petrol Pump, Near Siddharth Bungalows, New Vavol, Gandhinagar, Gujarat, 382016, Sector 6, Gandhinagar, India, 38201', 'Move into Capital PG, A Professionally Managed PG Home in the Sargasan, Gandhinagar. Located in a Safe Neighborhood, This Male PG offers Various Modern Amenities For Your Comfort, Such as TV, AC, Food, Wi-Fi, etc. This PG has Triple, Four, and Other Occupancy types. This PG is Nearby Major Commercial and Educational hubs. Please contact the seller to book this fast selling high in demand PG stay. ', 'pg(3).jpg', 'pg4.jpg', 'pg6.jpeg', 'Triple', 5000, 'Active', '2024-02-12 15:36:57', '2024-02-12 15:39:29'),
(16, 3, 4, 2, 'Samarpan', 'Tapas Marg, Zone 3, Plot No 38, GIFT City, Rayasan,Gandhinagar- 382355', 'Move into Capital PG, A Professionally Managed PG Home in the Sargasan, Gandhinagar. Located in a Safe Neighborhood, This Male PG offers Various Modern Amenities For Your Comfort, Such as TV, AC, Food, Wi-Fi, etc. This PG has Triple, Four, and Other Occupancy types. This PG is Nearby Major Commercial and Educational hubs. Please contact the seller to book this fast selling high in demand PG stay.', 'pg(4).jpg', 'cat-2.jpg', 'cat-3.jpeg', 'Triple', 6000, 'Active', '2024-02-12 15:45:54', '2024-02-12 15:45:54'),
(17, 1, 10, 3, 'The Best PG', 'Near Siddharth Bungalows, New Vavol, Gandhinagar, Gujarat, 382016, Sector 5, Gandhinagar-382016', 'Move into Capital PG, A Professionally Managed PG Home in the Sargasan, Gandhinagar. Located in a Safe Neighborhood, This Male PG offers Various Modern Amenities For Your Comfort, Such as TV, AC, Food, Wi-Fi, etc. This PG has Triple, Four, and Other Occupancy types. This PG is Nearby Major Commercial and Educational hubs. Please contact the seller to book this fast selling high in demand PG stay. ', 'pg(5).webp', 'pg8.jpg', 'pg5.jpeg', 'Single', 6000, 'Active', '2024-02-12 15:54:20', '2024-02-12 15:54:20'),
(18, 1, 6, 3, 'Shriji PG', 'Plot No-23, 8th, 9th and 10th Floor, Skyline, Opp.Ramkatha Ground, Sector-11,Gandhinagar- 382 011', 'Move into Accommodation FOR PG, a professionally managed PG home in the Infocity, Gandhinagar. Located in a safe neighborhood, this unisex PG offers various modern amenities for your comfort, such as TV, AC, Food, Power Backup, Wi-Fi etc. This PG has single, double, triple occupancy types. This PG is nearby major commercial and educational hubs. Please contact the seller to book this fast selling high in demand PG stay. ', 'pg(4).jpg', 'pg1.jpeg', 'cat-1.jpg', 'Single', 5500, 'Active', '2024-02-12 16:00:19', '2024-02-12 16:00:19'),
(19, 1, 8, 3, 'M.B PG', 'Block F/502.Shree Rang Aroma, Dholeshwer Mahadev Road, Randesan, Gandhinagar- 382426 \r\n', 'A  professionally managed PG home in the Randesan, Gandhinagar. Located in a safe neighborhood, this unisex PG offers various modern amenities for your comfort, such as Food, Power Backup, Wi-Fi etc. This PG has double, triple, four occupancy types. This PG is nearby major commercial and educational hubs. Please contact the seller to book this fast selling high in demand PG stay.', 'pg(1).jpeg', 'pg2.jpg', 'cat-3.jpeg', 'Single', 8000, 'Active', '2024-02-12 16:08:46', '2024-02-12 16:08:46'),
(20, 1, 2, 3, 'Om PG', '\r\n 2nd floor shyam sukan complex, bhaijipura char rasta, cross, PDPU Rd, Kudasan, Gandhinagar- 382421', 'a professionally managed PG home in the Gandhinagar, Gandhinagar. Located in a safe neighborhood, this male PG offers various modern amenities for your comfort, such as TV etc. This PG has double occupancy types. This PG is nearby major commercial and educational hubs. Please contact the seller to book this fast selling high in demand PG stay. ', 'pg(3).jpg', 'pg7.jpg', 'cat-1.jpg', 'Single', 5000, 'Active', '2024-02-12 16:12:07', '2024-02-12 16:12:07'),
(21, 2, 9, 2, 'No.1 PG', 'Plot No-627, Sector 28, Gandhinagar- 382028 \r\n', 'ully Furnished PG with AC for male working professionals inside infocity township no brokerage  Single and double occupancy both is available. Rent is 5150 for twin sharing and 10000 for single room fully refundable deposit is 1.5 months of rent. Society Maintenance is included in rent. Meal and consumables are not included in rent The apartment has all amenities like 3 acs All rooms Ro Double bed with wardrobes in each rooms Instant geyser in 2 attached bathrooms Large tv Fridge Gas pipeline Sofaset.', 'pg(5).webp', 'cat-2.jpg', 'pg1.jpeg', 'Double', 6500, 'Active', '2024-02-12 16:17:59', '2024-02-12 16:17:59'),
(22, 2, 5, 2, 'Radhe PG', 'Tapas Marg, Zone 5, Plot No 38, Sargasan,Gandhinagar-382355', 'Move into Accommodation FOR PG, a professionally managed PG home in the Infocity, Gandhinagar. Located in a safe neighborhood, this unisex PG offers various modern amenities for your comfort, such as TV, AC, Food, Power Backup, Wi-Fi etc.', 'pg(4).jpg', 'pg4.jpg', 'pg7.jpg', 'Double', 6500, 'Active', '2024-02-12 16:49:01', '2024-02-12 16:49:01'),
(23, 2, 6, 2, 'Devnagari', 'Plot No-23, 8th, 9th and 10th Floor, Skyline, Opp.Ramkatha Ground, Sector-2,Gandhinagar- 382 011', 'Move into Accommodation FOR PG, a professionally managed PG home in the Infocity, Gandhinagar. Located in a safe neighborhood, this unisex PG offers various modern amenities for your comfort, such as TV, AC, Food, Power Backup, Wi-Fi etc.', 'pg(1).jpeg', 'pg7.jpg', 'pg8.jpg', 'Double', 6200, 'Active', '2024-02-12 16:51:26', '2024-02-12 16:52:33'),
(24, 2, 10, 2, 'Royal PG', 'Plot No-25, 8th and 10th Floor, Skyline, Opp.Ramkatha Ground, Sector-5,Gandhinagar- 382 011', 'Move into Capital PG, A Professionally Managed PG Home in the Sargasan, Gandhinagar. Located in a Safe Neighborhood, This Male PG offers Various Modern Amenities For Your Comfort, Such as TV, AC, Food, Wi-Fi, etc. This PG has Triple, Four, and Other Occupancy types. This PG is Nearby Major Commercial and Educational hubs. Please contact the seller to book this fast selling high in demand PG stay. ', 'pg(2).jpg', 'pg1.jpeg', 'pg3.jpg', 'Double', 8000, 'Active', '2024-02-12 16:54:13', '2024-02-12 16:57:18'),
(25, 3, 5, 3, 'The Capital PG', 'Tapas Marg, Zone 5, Plot No 40, Sargasan,Gandhinagar-382355', 'Move into Accommodation FOR PG, a professionally managed PG home in the Infocity, Gandhinagar. Located in a safe neighborhood, this unisex PG offers various modern amenities for your comfort, such as TV, AC, Food, Power Backup, Wi-Fi etc. This PG has single, double, triple occupancy types. This PG is nearby major commercial and educational hubs. Please contact the seller to book this fast selling high in demand PG stay.', 'pg(2).jpg', 'pg3.jpg', 'pg8.jpg', 'Triple', 7000, 'Active', '2024-02-12 17:07:28', '2024-02-12 17:07:28'),
(26, 3, 1, 3, 'Gurukul PG', '4th Floor Super Mall 1 Nr Police Chowki , Infocity, Gandhinagar, India, 382421\r\n', ' A Professionally Managed PG Home in the Sargasan, Gandhinagar. Located in a Safe Neighborhood, This Male PG offers Various Modern Amenities For Your Comfort, Such as TV, AC, Food, Wi-Fi, etc. This PG has Triple, Four, and Other Occupancy types. This PG is Nearby Major Commercial and Educational hubs. Please contact the seller to book this fast selling high in demand PG stay. ', 'pg(5).webp', 'cat-1.jpg', 'pg1.jpeg', 'Triple', 5000, 'Active', '2024-02-12 17:10:39', '2024-02-12 17:10:39'),
(27, 3, 9, 3, 'Star Accommodation PG', 'Plot No-627, Sector 28, Gandhinagar- 382028', 'Move into The Best PG, A Professionally Managed PG Home in Sector 8, Gandhinagar. Located in a Safe Neighborhood, This Male PG offers Various Modern Amenities For Your Comfort, Such as AC, Food, Power Backup, Wi-Fi, etc. This PG has Single, Double, Triple, and Four Occupancy types. This PG is near major Commercial and Educational hubs. Please Contact the Seller to Book this Fast-selling high in Demand PG Stay. less', 'pg(3).jpg', 'cat-3.jpeg', 'pg6.jpeg', 'Triple', 6500, 'Active', '2024-02-12 17:16:04', '2024-02-12 17:16:04'),
(28, 3, 7, 3, 'Ganesh PG', 'Palm Road, Hotel Prominent Corporate Residency, Sector-4, Gandhinagar-382421', 'A Professionally Managed PG Home in Sector 8, Gandhinagar. Located in a Safe Neighborhood, This Male PG offers Various Modern Amenities For Your Comfort, Such as AC, Food, Power Backup, Wi-Fi, etc. This PG has Single, Double, Triple, and Four Occupancy types. This PG is near major Commercial and Educational hubs. Please Contact the Seller to Book this Fast-selling high in Demand PG Stay. ', 'pg(1).jpeg', 'pg4.jpg', 'pg7.jpg', 'Triple', 8000, 'Active', '2024-02-12 17:17:44', '2024-02-12 17:17:44'),
(29, 1, 8, 2, 'Roommate PG', 'Tapas Marg, Zone 3, Plot No 38, Randesan,Gandhinagar-382355	', 'A Professionally Managed PG Home in the Sargasan, Gandhinagar. Located in a Safe Neighborhood, This Male PG offers Various Modern Amenities For Your Comfort, Such as TV, AC, Food, Wi-Fi, etc. This PG has Triple, Four, and Other Occupancy types. This PG is Nearby Major Commercial and Educational hubs. Please contact the seller to book this fast selling high in demand PG stay', 'pg(4).jpg', 'pg3.jpg', 'cat-1.jpg', 'Single', 8500, 'Active', '2024-02-12 17:21:57', '2024-02-12 17:21:57'),
(30, 1, 3, 2, 'Well-Come PG', 'GH Road, Pathikashram Nilaya, Sector 8, Gandhinagar-382007 ', 'a professionally managed Paying Guest home in the Infocity, Gandhinagar. Located in a safe neighborhood, this female Paying Guest offers various modern amenities for your comfort, such as TV, etc. This Paying Guest has double occupancy types. This Paying Guest is nearby major commercial and educational hubs. Please contact the seller to book this fast-selling high in demand Paying Guest stay', 'pg(2).jpg', 'cat-2.jpg', 'pg8.jpg', 'Single', 5000, 'Active', '2024-02-12 17:28:06', '2024-02-12 17:28:06'),
(31, 1, 7, 2, 'Gurukrupa PG', 'GH-Road, Behind HP Petrol Pump, Near Siddharth Bungalows, New Vavol, Sector-4,Gandhinagar-382016', 'Move into Capital PG, A Professionally Managed PG Home in the Sargasan, Gandhinagar. Located in a Safe Neighborhood, This Male PG offers Various Modern Amenities For Your Comfort, Such as TV, AC, Food, Wi-Fi, etc. This PG has Triple, Four, and Other Occupancy types. This PG is Nearby Major Commercial and Educational hubs. Please contact the seller to book this fast selling high in demand PG stay. ', 'pg(2).jpg', 'cat-2.jpg', 'pg2.jpg', 'Single', 7000, 'Active', '2024-02-15 11:38:59', '2024-02-15 11:38:59'),
(32, 1, 10, 2, 'Vrundawan PG', 'GH- Road,Near Sikhar Bungalows, Sector-5,Gandhinagar- 382016, ', 'Move into Capital PG, A Professionally Managed PG Home in the Sargasan, Gandhinagar. Located in a Safe Neighborhood, This Male PG offers Various Modern Amenities For Your Comfort, Such as TV, AC, Food, Wi-Fi, etc. This PG has Triple, Four, and Other Occupancy types. This PG is Nearby Major Commercial and Educational hubs. Please contact the seller to book this fast selling high in demand PG stay. ', 'pg(4).jpg', 'cat-3.jpeg', 'pg7.jpg', 'Single', 6000, 'Active', '2024-02-15 11:41:23', '2024-02-15 11:43:34'),
(33, 2, 5, 3, 'Shiv PG', 'Tapas Marg, Zone 5, Plot No 38, Sargasan,Gandhinagar-382355', ' A Professionally Managed PG Home in Sector 8, Gandhinagar. Located in a Safe Neighborhood, This Male PG offers Various Modern Amenities For Your Comfort, Such as AC, Food, Power Backup, Wi-Fi, etc. This PG has Single, Double, Triple, and Four Occupancy types. This PG is near major Commercial and Educational hubs. Please Contact the Seller to Book this Fast-selling high in Demand PG Stay.', 'pg(3).jpg', 'pg3.jpg', 'pg4.jpg', 'Double', 5000, 'Active', '2024-02-15 11:47:11', '2024-02-15 11:51:57'),
(34, 2, 4, 3, 'Gokul PG', 'Palm Road, Hotel Shyam Corporate Residency, Rayasan, Gandhinagar- 382421', 'A Professionally Managed PG Home in Sector 8, Gandhinagar. Located in a Safe Neighborhood, This Male PG offers Various Modern Amenities For Your Comfort, Such as AC, Food, Power Backup, Wi-Fi, etc. This PG has Single, Double, Triple, and Four Occupancy types. This PG is near major Commercial and Educational hubs. Please Contact the Seller to Book this Fast-selling high in Demand PG Stay.', 'pg(1).jpeg', 'pg8.jpg', 'pg1.jpeg', 'Double', 6500, 'Active', '2024-02-15 11:49:01', '2024-02-15 11:56:54'),
(35, 2, 1, 3, 'Nisargs PG', 'Tapas Marg, Zone 3, Plot No 30, Infocity,Gandhinagar-382355', 'A Professionally Managed PG Home in Sector 8, Gandhinagar. Located in a Safe Neighborhood, This Male PG offers Various Modern Amenities For Your Comfort, Such as AC, Food, Power Backup, Wi-Fi, etc. This PG has Single, Double, Triple, and Four Occupancy types. This PG is near major Commercial and Educational hubs. Please Contact the Seller to Book this Fast-selling high in Demand PG Stay.', 'pg(5).webp', 'cat-1.jpg', 'pg2.jpg', 'Double', 5500, 'Active', '2024-02-15 11:51:20', '2024-02-15 11:54:57'),
(36, 2, 2, 3, 'Sky PG', '\r\nPDPU Road, 2nd floor shyam sukan complex, bhaijipura char rasta, cross, PDPU Rd, Kudasan, Gandhinagar- 382421', ' A Professionally Managed PG Home in Sector 8, Gandhinagar. Located in a Safe Neighborhood, This Male PG offers Various Modern Amenities For Your Comfort, Such as AC, Food, Power Backup, Wi-Fi, etc. This PG has Single, Double, Triple, and Four Occupancy types. This PG is near major Commercial and Educational hubs. Please Contact the Seller to Book this Fast-selling high in Demand PG Stay.', 'pg(2).jpg', 'pg6.jpeg', 'pg1.jpeg', 'Double', 4000, 'Active', '2024-02-15 11:56:41', '2024-02-15 11:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `service_tb`
--

DROP TABLE IF EXISTS `service_tb`;
CREATE TABLE IF NOT EXISTS `service_tb` (
  `sr_id` int(11) NOT NULL AUTO_INCREMENT,
  `pg_id` int(11) NOT NULL,
  `sr_name` varchar(50) NOT NULL,
  `sr_type` enum('Free','Paid') NOT NULL,
  `sr_price` int(11) NOT NULL,
  `sr_status` enum('Active','Deactive') NOT NULL,
  `sr_cdate` datetime NOT NULL,
  `sr_udate` datetime NOT NULL,
  PRIMARY KEY (`sr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=145 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_tb`
--

INSERT INTO `service_tb` (`sr_id`, `pg_id`, `sr_name`, `sr_type`, `sr_price`, `sr_status`, `sr_cdate`, `sr_udate`) VALUES
(1, 1, 'Wi-Fi', 'Free', 0, 'Active', '2024-02-16 10:06:34', '2024-02-16 10:06:34'),
(2, 1, 'AC', 'Paid', 500, 'Active', '2024-02-16 10:06:43', '2024-02-16 10:06:43'),
(3, 1, 'Food', 'Free', 0, 'Active', '2024-02-16 10:06:52', '2024-02-16 10:06:52'),
(4, 1, 'Laundry', 'Paid', 300, 'Active', '2024-02-16 10:07:03', '2024-02-16 10:07:03'),
(5, 2, 'Wi-Fi', 'Free', 0, 'Active', '2024-02-16 10:07:14', '2024-02-16 10:07:14'),
(6, 2, 'AC', 'Paid', 500, 'Active', '2024-02-16 10:07:25', '2024-02-16 10:07:25'),
(7, 2, 'Food', 'Free', 0, 'Active', '2024-02-16 10:07:33', '2024-02-16 10:07:33'),
(8, 2, 'Laundry', 'Paid', 300, 'Active', '2024-02-16 10:07:43', '2024-02-16 10:07:43'),
(9, 3, 'Wi-Fi', 'Free', 0, 'Active', '2024-02-16 10:08:20', '2024-02-16 10:08:20'),
(10, 3, 'AC', 'Paid', 500, 'Active', '2024-02-16 10:08:29', '2024-02-16 10:08:29'),
(11, 3, 'Food', 'Free', 0, 'Active', '2024-02-16 10:08:39', '2024-02-16 10:08:39'),
(12, 3, 'Laundry', 'Paid', 300, 'Active', '2024-02-16 10:08:51', '2024-02-16 10:08:51'),
(13, 4, 'Wi-Fi', 'Free', 0, 'Active', '2024-02-16 10:09:02', '2024-02-16 10:09:02'),
(14, 4, 'AC', 'Paid', 500, 'Active', '2024-02-16 10:09:11', '2024-02-16 10:09:11'),
(15, 4, 'Food', 'Free', 0, 'Active', '2024-02-16 10:09:21', '2024-02-16 10:09:21'),
(16, 4, 'Laundry', 'Paid', 300, 'Active', '2024-02-16 10:09:30', '2024-02-16 10:09:30'),
(17, 5, 'Wi-Fi', 'Free', 0, 'Active', '2024-02-16 10:10:14', '2024-02-16 10:10:14'),
(18, 5, 'AC', 'Paid', 500, 'Active', '2024-02-16 10:10:25', '2024-02-16 10:10:25'),
(19, 5, 'Food', 'Free', 0, 'Active', '2024-02-16 10:10:37', '2024-02-16 10:10:37'),
(20, 5, 'Laundry', 'Paid', 300, 'Active', '2024-02-16 10:10:46', '2024-02-16 10:10:46'),
(21, 6, 'Wi-Fi', 'Free', 0, 'Active', '2024-02-16 10:20:33', '2024-02-16 10:20:33'),
(22, 6, 'AC', 'Paid', 500, 'Active', '2024-02-16 10:20:41', '2024-02-16 10:20:41'),
(23, 6, 'Food', 'Free', 0, 'Active', '2024-02-16 10:20:49', '2024-02-16 10:20:49'),
(24, 6, 'Laundry', 'Paid', 300, 'Active', '2024-02-16 10:20:58', '2024-02-16 10:20:58'),
(25, 7, 'Wi-Fi', 'Free', 0, 'Active', '2024-02-16 10:21:09', '2024-02-16 10:21:09'),
(26, 7, 'AC', 'Paid', 500, 'Active', '2024-02-16 10:21:18', '2024-02-16 10:21:18'),
(27, 7, 'Food', 'Free', 0, 'Active', '2024-02-16 10:21:30', '2024-02-16 10:21:30'),
(28, 7, 'Laundry', 'Paid', 300, 'Active', '2024-02-16 10:21:42', '2024-02-16 10:21:42'),
(29, 8, 'Wi-Fi', 'Free', 0, 'Active', '2024-02-16 10:21:51', '2024-02-16 10:21:51'),
(30, 8, 'AC', 'Paid', 500, 'Active', '2024-02-16 10:22:02', '2024-02-16 10:22:02'),
(31, 8, 'Food', 'Free', 0, 'Active', '2024-02-16 10:22:11', '2024-02-16 10:22:11'),
(32, 8, 'Laundry', 'Paid', 300, 'Active', '2024-02-16 10:22:21', '2024-02-16 10:22:21'),
(33, 9, 'Wi-Fi', 'Free', 0, 'Active', '2024-02-16 10:22:30', '2024-02-16 10:22:30'),
(34, 9, 'AC', 'Paid', 500, 'Active', '2024-02-16 10:22:40', '2024-02-16 10:22:40'),
(35, 9, 'Food', 'Free', 0, 'Active', '2024-02-16 10:22:50', '2024-02-16 10:22:50'),
(36, 9, 'Laundry', 'Paid', 300, 'Active', '2024-02-16 10:23:02', '2024-02-16 10:23:02'),
(37, 10, 'Wi-Fi', 'Free', 0, 'Active', '2024-02-16 10:23:20', '2024-02-16 10:23:20'),
(38, 10, 'AC', 'Paid', 500, 'Active', '2024-02-16 10:23:39', '2024-02-16 10:23:39'),
(39, 10, 'Food', 'Free', 0, 'Active', '2024-02-16 10:23:48', '2024-02-16 10:23:48'),
(40, 10, 'Laundry', 'Paid', 300, 'Active', '2024-02-16 10:23:59', '2024-02-16 10:23:59'),
(41, 11, 'Wi-Fi', 'Free', 0, 'Active', '2024-02-16 10:24:10', '2024-02-16 10:24:10'),
(42, 11, 'AC', 'Paid', 500, 'Active', '2024-02-16 10:24:28', '2024-02-16 10:24:28'),
(43, 11, 'Food', 'Free', 0, 'Active', '2024-02-16 10:24:39', '2024-02-16 10:24:39'),
(44, 11, 'Laundry', 'Paid', 300, 'Active', '2024-02-16 10:25:02', '2024-02-16 10:25:02'),
(45, 12, 'Wi-Fi', 'Free', 0, 'Active', '2024-02-16 10:25:18', '2024-02-16 10:25:18'),
(46, 12, 'AC', 'Paid', 500, 'Active', '2024-02-16 10:25:28', '2024-02-16 10:25:28'),
(47, 12, 'Food', 'Free', 0, 'Active', '2024-02-16 10:25:41', '2024-02-16 10:25:41'),
(48, 1, 'Laundry', 'Paid', 300, 'Active', '2024-02-16 10:25:59', '2024-03-01 13:35:30'),
(49, 13, 'Wi-Fi', 'Free', 0, 'Active', '2024-02-16 10:29:10', '2024-02-16 10:29:10'),
(50, 13, 'AC', 'Paid', 500, 'Active', '2024-02-16 10:29:18', '2024-02-16 10:29:18'),
(51, 13, 'Food', 'Free', 0, 'Active', '2024-02-16 10:29:28', '2024-02-16 10:29:28'),
(52, 13, 'Laundry', 'Paid', 300, 'Active', '2024-02-16 10:29:42', '2024-02-16 10:29:42'),
(53, 14, 'Wi-Fi', 'Free', 0, 'Active', '2024-02-16 10:29:51', '2024-02-16 10:29:51'),
(54, 14, 'AC', 'Paid', 500, 'Active', '2024-02-16 10:30:02', '2024-02-16 10:30:02'),
(55, 14, 'Food', 'Free', 0, 'Active', '2024-02-16 10:30:13', '2024-02-16 10:30:13'),
(56, 14, 'Laundry', 'Paid', 300, 'Active', '2024-02-16 10:30:25', '2024-02-16 10:30:25'),
(57, 15, 'Wi-Fi', 'Free', 0, 'Active', '2024-02-16 10:30:48', '2024-02-16 10:30:48'),
(58, 15, 'AC', 'Paid', 500, 'Active', '2024-02-16 10:31:07', '2024-02-16 10:31:07'),
(59, 15, 'Food', 'Free', 0, 'Active', '2024-02-16 10:31:16', '2024-02-16 10:31:16'),
(60, 15, 'Laundry', 'Paid', 300, 'Active', '2024-02-16 10:31:27', '2024-02-16 10:31:27'),
(61, 16, 'Wi-Fi', 'Free', 0, 'Active', '2024-02-16 10:31:41', '2024-02-16 10:31:41'),
(62, 16, 'AC', 'Paid', 500, 'Active', '2024-02-16 10:32:00', '2024-02-16 10:32:00'),
(63, 16, 'Food', 'Free', 0, 'Active', '2024-02-16 10:32:09', '2024-02-16 10:32:09'),
(64, 16, 'Laundry', 'Paid', 300, 'Active', '2024-02-16 10:32:18', '2024-02-16 10:32:18'),
(65, 21, 'Wi-Fi', 'Free', 0, 'Active', '2024-02-16 10:32:56', '2024-02-16 10:32:56'),
(66, 21, 'AC', 'Paid', 500, 'Active', '2024-02-16 10:33:05', '2024-02-16 10:33:05'),
(67, 21, 'Food', 'Free', 0, 'Active', '2024-02-16 10:33:15', '2024-02-16 10:33:15'),
(68, 21, 'Laundry', 'Paid', 300, 'Active', '2024-02-16 10:33:32', '2024-02-16 10:33:32'),
(69, 22, 'Wi-Fi', 'Free', 0, 'Active', '2024-02-16 10:33:47', '2024-02-16 10:33:47'),
(70, 22, 'AC', 'Paid', 500, 'Active', '2024-02-16 10:33:57', '2024-02-16 10:33:57'),
(71, 22, 'Food', 'Free', 0, 'Active', '2024-02-16 10:34:10', '2024-02-16 10:34:10'),
(72, 22, 'Laundry', 'Paid', 300, 'Active', '2024-02-16 10:34:26', '2024-02-16 10:34:26'),
(73, 23, 'Wi-Fi', 'Free', 0, 'Active', '2024-02-16 10:34:39', '2024-02-16 10:34:39'),
(74, 23, 'AC', 'Paid', 500, 'Active', '2024-02-16 10:35:06', '2024-02-16 10:35:06'),
(75, 23, 'Food', 'Free', 0, 'Active', '2024-02-16 10:35:23', '2024-02-16 10:35:23'),
(76, 23, 'Laundry', 'Paid', 300, 'Active', '2024-02-16 10:35:35', '2024-02-16 10:35:35'),
(77, 24, 'Wi-Fi', 'Free', 0, 'Active', '2024-02-16 10:35:47', '2024-02-16 10:35:47'),
(78, 24, 'AC', 'Paid', 500, 'Active', '2024-02-16 10:36:01', '2024-02-16 10:36:01'),
(79, 24, 'Food', 'Free', 0, 'Active', '2024-02-16 10:36:14', '2024-02-16 10:36:14'),
(80, 24, 'Laundry', 'Paid', 300, 'Active', '2024-02-16 10:36:29', '2024-02-16 10:36:29'),
(81, 29, 'Wi-Fi', 'Free', 0, 'Active', '2024-02-16 10:36:40', '2024-02-16 10:36:40'),
(82, 29, 'AC', 'Paid', 500, 'Active', '2024-02-16 10:36:49', '2024-02-16 10:36:49'),
(83, 29, 'Food', 'Free', 0, 'Active', '2024-02-16 10:36:58', '2024-02-16 10:36:58'),
(84, 29, 'Laundry', 'Paid', 300, 'Active', '2024-02-16 10:37:07', '2024-02-16 10:37:07'),
(85, 30, 'Wi-Fi', 'Free', 0, 'Active', '2024-02-16 10:37:17', '2024-02-16 10:37:17'),
(86, 30, 'AC', 'Paid', 500, 'Active', '2024-02-16 10:37:29', '2024-02-16 10:37:29'),
(87, 30, 'Food', 'Free', 0, 'Active', '2024-02-16 10:37:45', '2024-02-16 10:37:45'),
(88, 30, 'Laundry', 'Paid', 300, 'Active', '2024-02-16 10:37:55', '2024-02-16 10:37:55'),
(89, 31, 'Wi-Fi', 'Free', 0, 'Active', '2024-02-16 10:38:07', '2024-02-16 10:38:07'),
(90, 31, 'AC', 'Paid', 500, 'Active', '2024-02-16 10:38:17', '2024-02-16 10:38:17'),
(91, 31, 'Food', 'Free', 0, 'Active', '2024-02-16 10:38:32', '2024-02-16 10:38:32'),
(92, 31, 'Laundry', 'Paid', 300, 'Active', '2024-02-16 10:38:42', '2024-02-16 10:38:42'),
(93, 32, 'Wi-Fi', 'Free', 0, 'Active', '2024-02-16 10:38:57', '2024-02-16 10:38:57'),
(94, 32, 'AC', 'Paid', 500, 'Active', '2024-02-16 10:39:08', '2024-02-16 10:39:08'),
(95, 32, 'Food', 'Free', 0, 'Active', '2024-02-16 10:39:18', '2024-02-16 10:39:18'),
(96, 32, 'Laundry', 'Paid', 300, 'Active', '2024-02-16 10:39:28', '2024-02-16 10:39:28'),
(97, 17, 'Wi-Fi', 'Free', 0, 'Active', '2024-02-16 10:40:45', '2024-02-16 10:40:45'),
(98, 17, 'AC', 'Paid', 500, 'Active', '2024-02-16 10:40:55', '2024-02-16 10:40:55'),
(99, 17, 'Food', 'Free', 0, 'Active', '2024-02-16 10:41:05', '2024-02-16 10:41:05'),
(100, 17, 'Laundry', 'Paid', 300, 'Active', '2024-02-16 10:41:17', '2024-02-16 10:41:17'),
(101, 18, 'Wi-Fi', 'Free', 0, 'Active', '2024-02-16 10:41:26', '2024-02-16 10:41:26'),
(102, 18, 'AC', 'Paid', 500, 'Active', '2024-02-16 10:41:36', '2024-02-16 10:41:36'),
(103, 18, 'Food', 'Free', 0, 'Active', '2024-02-16 10:41:49', '2024-02-16 10:41:49'),
(104, 18, 'Laundry', 'Paid', 300, 'Active', '2024-02-16 10:41:59', '2024-02-16 10:41:59'),
(105, 19, 'Wi-Fi', 'Free', 0, 'Active', '2024-02-16 10:42:10', '2024-02-16 10:42:10'),
(106, 19, 'AC', 'Paid', 500, 'Active', '2024-02-16 10:42:21', '2024-02-16 10:42:21'),
(107, 19, 'Food', 'Free', 0, 'Active', '2024-02-16 10:42:45', '2024-02-16 10:42:45'),
(108, 19, 'Laundry', 'Paid', 300, 'Active', '2024-02-16 10:43:00', '2024-02-16 10:43:00'),
(109, 20, 'Wi-Fi', 'Free', 0, 'Active', '2024-02-16 10:43:11', '2024-02-16 10:43:11'),
(110, 20, 'AC', 'Paid', 500, 'Active', '2024-02-16 10:43:22', '2024-02-16 10:43:22'),
(111, 20, 'Food', 'Free', 0, 'Active', '2024-02-16 10:43:48', '2024-02-16 10:43:48'),
(112, 20, 'Laundry', 'Paid', 300, 'Active', '2024-02-16 10:43:57', '2024-02-16 10:43:57'),
(113, 25, 'Wi-Fi', 'Free', 0, 'Active', '2024-02-16 10:44:33', '2024-02-16 10:44:33'),
(114, 25, 'AC', 'Paid', 500, 'Active', '2024-02-16 10:44:44', '2024-02-16 10:44:44'),
(115, 25, 'Food', 'Free', 0, 'Active', '2024-02-16 10:44:54', '2024-02-16 10:44:54'),
(116, 25, 'Laundry', 'Paid', 300, 'Active', '2024-02-16 10:45:09', '2024-02-16 10:45:09'),
(117, 26, 'Wi-Fi', 'Free', 0, 'Active', '2024-02-16 10:45:23', '2024-02-16 10:45:23'),
(118, 26, 'AC', 'Paid', 500, 'Active', '2024-02-16 10:45:35', '2024-02-16 10:45:35'),
(119, 26, 'Food', 'Free', 0, 'Active', '2024-02-16 10:45:52', '2024-02-16 10:45:52'),
(120, 26, 'Laundry', 'Paid', 300, 'Active', '2024-02-16 10:46:07', '2024-02-16 10:46:07'),
(121, 27, 'Wi-Fi', 'Free', 0, 'Active', '2024-02-16 10:46:19', '2024-02-16 10:46:19'),
(122, 27, 'AC', 'Paid', 500, 'Active', '2024-02-16 10:46:27', '2024-02-16 10:46:27'),
(123, 27, 'Food', 'Free', 0, 'Active', '2024-02-16 10:46:35', '2024-02-16 10:46:35'),
(124, 27, 'Laundry', 'Paid', 300, 'Active', '2024-02-16 10:46:45', '2024-02-16 10:46:45'),
(125, 28, 'Wi-Fi', 'Free', 0, 'Active', '2024-02-16 10:46:56', '2024-02-16 10:46:56'),
(126, 28, 'AC', 'Paid', 500, 'Active', '2024-02-16 10:47:05', '2024-02-16 10:47:05'),
(127, 28, 'Food', 'Free', 0, 'Active', '2024-02-16 10:47:13', '2024-02-16 10:47:13'),
(128, 28, 'Laundry', 'Paid', 300, 'Active', '2024-02-16 10:47:29', '2024-02-16 10:47:29'),
(129, 33, 'Wi-Fi', 'Free', 0, 'Active', '2024-02-16 10:47:37', '2024-02-16 10:47:37'),
(130, 33, 'AC', 'Paid', 500, 'Active', '2024-02-16 10:47:47', '2024-02-16 10:47:47'),
(131, 33, 'Food', 'Free', 0, 'Active', '2024-02-16 10:47:58', '2024-02-16 10:47:58'),
(132, 33, 'Laundry', 'Paid', 300, 'Active', '2024-02-16 10:48:09', '2024-02-16 10:48:09'),
(133, 34, 'Wi-Fi', 'Free', 0, 'Active', '2024-02-16 10:48:19', '2024-02-16 10:48:19'),
(134, 34, 'AC', 'Paid', 500, 'Active', '2024-02-16 10:48:27', '2024-02-16 10:48:27'),
(135, 34, 'Food', 'Free', 0, 'Active', '2024-02-16 10:48:38', '2024-02-16 10:48:38'),
(136, 34, 'Laundry', 'Paid', 300, 'Active', '2024-02-16 10:48:48', '2024-02-16 10:48:48'),
(137, 35, 'Wi-Fi', 'Free', 0, 'Active', '2024-02-16 10:49:06', '2024-02-16 10:49:06'),
(138, 35, 'AC', 'Paid', 500, 'Active', '2024-02-16 10:49:15', '2024-02-16 10:49:15'),
(139, 35, 'Food', 'Free', 0, 'Active', '2024-02-16 10:49:25', '2024-02-16 10:49:25'),
(140, 35, 'Laundry', 'Paid', 300, 'Active', '2024-02-16 10:49:33', '2024-02-16 10:49:33'),
(141, 36, 'Wi-Fi', 'Free', 0, 'Active', '2024-02-16 10:49:40', '2024-02-16 10:49:40'),
(142, 36, 'AC', 'Paid', 500, 'Active', '2024-02-16 10:49:48', '2024-02-16 10:49:48'),
(143, 36, 'Food', 'Free', 0, 'Active', '2024-02-16 10:49:56', '2024-02-16 10:49:56'),
(144, 36, 'Laundry', 'Paid', 300, 'Active', '2024-02-16 10:50:04', '2024-02-16 10:50:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_tb`
--

DROP TABLE IF EXISTS `user_tb`;
CREATE TABLE IF NOT EXISTS `user_tb` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(50) NOT NULL,
  `u_contact` bigint(22) NOT NULL,
  `u_image` varchar(100) NOT NULL,
  `u_add` text NOT NULL,
  `u_gender` enum('Female','Male','Other') NOT NULL,
  `u_password` varchar(20) NOT NULL,
  `u_status` enum('Active','Deactive') NOT NULL,
  `u_cdate` datetime NOT NULL,
  `u_udate` datetime NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tb`
--

INSERT INTO `user_tb` (`u_id`, `u_name`, `u_contact`, `u_image`, `u_add`, `u_gender`, `u_password`, `u_status`, `u_cdate`, `u_udate`) VALUES
(1, 'Bhavsar Mansi K', 9725557988, 'mansi-1.jpg', 'B-15 Pratik Tenament,India colony,Bapunagar,Ahmedabad.', 'Female', '12345', 'Active', '2024-02-09 11:43:51', '2024-02-19 13:56:51'),
(2, 'Gadhiya Minal', 8733830514, 'minal1.jpg', 'C-21 Krushnadham society,Vastral road,Ahmedabad.', 'Female', '12345', 'Active', '2024-02-09 11:46:02', '2024-02-19 12:11:53'),
(3, 'Zala Rina', 7043833861, 'rina.jpg', 'C-15 Param Pinak,Naroda,Ahmedabad.', 'Female', 'rina12', 'Active', '2024-02-09 11:47:22', '2024-02-09 11:47:22'),
(4, 'Komal Patel', 9723001502, '13.jpg', '302, 3rd Floor Gandhinagar', 'Male', '12345', 'Active', '2024-02-19 14:02:30', '2024-02-19 14:02:30'),
(5, 'Jenny Polara', 9825907377, 'c4ab6d4b-436e-4f63-a6ec-166517ddbd7a.jpg', 'A-30 Surjit Socity,Bapunagar,Ahmedabad', 'Female', '123456', 'Active', '2024-02-19 15:29:09', '2024-02-19 15:29:09');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

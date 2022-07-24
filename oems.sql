-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2022 at 07:11 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oems`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_master`
--

CREATE TABLE `admin_master` (
  `ADMIN_ID` int(10) NOT NULL,
  `ADMIN_EMAIL` varchar(50) NOT NULL,
  `ADMIN_PASSWORD` varchar(50) NOT NULL,
  `ADMIN_USERNAME` varchar(20) NOT NULL,
  `DATE` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_master`
--

INSERT INTO `admin_master` (`ADMIN_ID`, `ADMIN_EMAIL`, `ADMIN_PASSWORD`, `ADMIN_USERNAME`, `DATE`) VALUES
(1, 'manavshah1011.jk@gmail.com', '9925717005ma', 'manav', '2022-03-19 05:35:08.208821');

-- --------------------------------------------------------

--
-- Table structure for table `brand_master`
--

CREATE TABLE `brand_master` (
  `BRAND_ID` int(10) NOT NULL,
  `SHOPKEEPER_ID` int(10) NOT NULL,
  `BRAND_NAME` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand_master`
--

INSERT INTO `brand_master` (`BRAND_ID`, `SHOPKEEPER_ID`, `BRAND_NAME`) VALUES
(1, 1, 'Apple'),
(2, 1, 'Samsung'),
(4, 1, 'Realme'),
(5, 1, 'Oneplus'),
(6, 1, 'Redmi'),
(7, 1, 'Oppo'),
(8, 1, 'Vivo');

-- --------------------------------------------------------

--
-- Table structure for table `cart_archive_master`
--

CREATE TABLE `cart_archive_master` (
  `CART_ID` int(10) NOT NULL,
  `PRODUCT_ID` int(10) NOT NULL,
  `CUSTOMER_ID` int(10) NOT NULL,
  `QUANTITY` int(10) NOT NULL,
  `DATE` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_archive_master`
--

INSERT INTO `cart_archive_master` (`CART_ID`, `PRODUCT_ID`, `CUSTOMER_ID`, `QUANTITY`, `DATE`) VALUES
(244, 2, 51, 1, '2022-04-11 10:34:20.000000'),
(245, 2, 51, 1, '2022-04-11 10:39:01.000000');

-- --------------------------------------------------------

--
-- Table structure for table `cart_master`
--

CREATE TABLE `cart_master` (
  `CART_ID` int(10) NOT NULL,
  `CUSTOMER_ID` int(10) NOT NULL,
  `PRODUCT_ID` int(10) NOT NULL,
  `QUANTITY` int(10) NOT NULL,
  `DATE` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `cart_master`
--
DELIMITER $$
CREATE TRIGGER `DELETE_CART` BEFORE DELETE ON `cart_master` FOR EACH ROW INSERT INTO cart_archive_master 
SET 
CART_ID=OLD.CART_ID,
PRODUCT_ID=OLD.PRODUCT_ID,
CUSTOMER_ID=OLD.CUSTOMER_ID,
QUANTITY=OLD.QUANTITY,
DATE=OLD.DATE
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `compare_master`
--

CREATE TABLE `compare_master` (
  `COMPARE_ID` int(10) NOT NULL,
  `CUSTOMER_ID` int(10) NOT NULL,
  `PRODUCT_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `compare_master`
--

INSERT INTO `compare_master` (`COMPARE_ID`, `CUSTOMER_ID`, `PRODUCT_ID`) VALUES
(29, 48, 2),
(42, 45, 3),
(43, 45, 1),
(48, 0, 2),
(49, 0, 21);

-- --------------------------------------------------------

--
-- Table structure for table `customer_master`
--

CREATE TABLE `customer_master` (
  `CUSTOMER_ID` int(10) NOT NULL,
  `SHOPKEEPER_ID` int(10) NOT NULL,
  `CUSTOMER_USERNAME` varchar(20) NOT NULL,
  `CUSTOMER_EMAIL` varchar(50) NOT NULL,
  `CUSTOMER_PASSWORD` varchar(50) NOT NULL,
  `FIRST_NAME` varchar(50) NOT NULL,
  `LAST_NAME` varchar(50) NOT NULL,
  `GENDER` varchar(10) NOT NULL,
  `DOB` varchar(50) NOT NULL,
  `ADDRESS` longtext NOT NULL,
  `CITY` varchar(20) NOT NULL,
  `PIN` int(6) NOT NULL,
  `STATE` varchar(20) NOT NULL,
  `COUNTRY` varchar(20) NOT NULL,
  `CONTACT` varchar(10) NOT NULL,
  `DATE` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_master`
--

INSERT INTO `customer_master` (`CUSTOMER_ID`, `SHOPKEEPER_ID`, `CUSTOMER_USERNAME`, `CUSTOMER_EMAIL`, `CUSTOMER_PASSWORD`, `FIRST_NAME`, `LAST_NAME`, `GENDER`, `DOB`, `ADDRESS`, `CITY`, `PIN`, `STATE`, `COUNTRY`, `CONTACT`, `DATE`) VALUES
(46, 1, 'kaxak', 'kaxakdobariya5112001@gmail.com', 'kaxak1234', 'kaxak', 'dobariya', 'male', '2001-11-05', 'Nikol,Ahmedabad', 'Ahmedabad', 380013, 'Gujarat', 'India', '7069478001', '2022-01-29 04:41:37.000000'),
(47, 1, 'yuvraj', 'yuvrajrana2014@gmail.com', 'yuvraj1234', 'yuvraj', 'rana', 'female', '2005-12-14', 'bopal', 'Ahmedabad', 380013, 'Gujarat', 'India', '8488001441', '2022-01-29 05:01:03.000000'),
(51, 1, 'manav', 'manavshah1011.ms@gmail.com', '10112001', 'manav', 'shah', 'male', '2001-11-10', 'usmanpura,ahmedabad', 'Ahmedabad', 380013, 'Gujarat', 'India', '9925717005', '2022-04-11 04:59:34.000000');

-- --------------------------------------------------------

--
-- Table structure for table `order_archive_master`
--

CREATE TABLE `order_archive_master` (
  `ORDER_ID` int(10) NOT NULL,
  `CART_ID` int(10) NOT NULL,
  `CUSTOMER_ID` int(10) NOT NULL,
  `SHOPKEEPER_ID` int(10) NOT NULL,
  `QUANTITY` int(10) NOT NULL,
  `STATUS` varchar(20) NOT NULL DEFAULT 'Deleted',
  `TOTAL` int(10) NOT NULL,
  `DATE` datetime(6) DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_archive_master`
--

INSERT INTO `order_archive_master` (`ORDER_ID`, `CART_ID`, `CUSTOMER_ID`, `SHOPKEEPER_ID`, `QUANTITY`, `STATUS`, `TOTAL`, `DATE`) VALUES
(86, 245, 51, 1, 1, 'Order Processed', 129900, '2022-04-11 10:39:03.000000');

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

CREATE TABLE `order_master` (
  `ORDER_ID` int(10) NOT NULL,
  `CUSTOMER_ID` int(10) NOT NULL,
  `SHOPKEEPER_ID` int(10) NOT NULL,
  `CART_ID` int(10) NOT NULL,
  `QUANTITY` int(10) NOT NULL,
  `TOTAL` varchar(30) NOT NULL,
  `STATUS` varchar(20) NOT NULL,
  `DATE` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `order_master`
--
DELIMITER $$
CREATE TRIGGER `DELETE_ORDER` BEFORE DELETE ON `order_master` FOR EACH ROW INSERT INTO order_archive_master
SET 
ORDER_ID=OLD.ORDER_ID,
CART_ID=OLD.CART_ID,
CUSTOMER_ID=OLD.CUSTOMER_ID,
SHOPKEEPER_ID=OLD.SHOPKEEPER_ID,
QUANTITY=OLD.QUANTITY,
STATUS=OLD.STATUS,
TOTAL=OLD.TOTAL,
DATE=OLD.DATE
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `payment_master`
--

CREATE TABLE `payment_master` (
  `PAYMENT_ID` int(10) NOT NULL,
  `CUSTOMER_ID` int(10) NOT NULL,
  `ORDER_ID` int(10) NOT NULL,
  `PAYMENT_TYPE` varchar(20) NOT NULL,
  `PAYABLE_AMOUNT` varchar(10) NOT NULL,
  `DATETIME` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_master`
--

INSERT INTO `payment_master` (`PAYMENT_ID`, `CUSTOMER_ID`, `ORDER_ID`, `PAYMENT_TYPE`, `PAYABLE_AMOUNT`, `DATETIME`) VALUES
(40, 45, 57, 'Cash on delivery', '129900', '2022-01-27 23:40:15'),
(41, 45, 63, 'Cash on delivery', '129900', '2022-02-07 10:22:57'),
(42, 45, 64, 'Cash on delivery', '102990', '2022-02-07 12:08:02'),
(43, 45, 66, 'Cash on delivery', '102990', '2022-02-07 12:17:29'),
(44, 45, 67, 'Cash on delivery', '129900', '2022-02-07 12:19:08'),
(45, 45, 68, 'Cash on delivery', '129900', '2022-02-12 15:24:56'),
(46, 45, 69, 'Cash on delivery', '129900', '2022-02-13 19:13:12'),
(47, 45, 70, 'Cash on delivery', '129900', '2022-02-14 18:04:42'),
(48, 45, 71, 'Cash on delivery', '69900', '2022-02-14 18:08:38'),
(49, 47, 72, 'Cash on delivery', '129900', '2022-02-15 12:14:32'),
(50, 49, 73, 'Cash on delivery', '129900', '2022-02-16 21:18:50'),
(51, 49, 74, 'Cash on delivery', '79900', '2022-02-19 22:10:22'),
(52, 49, 75, 'Cash on delivery', '36999', '2022-02-19 22:11:11'),
(53, 49, 77, 'Cash on delivery', '46900', '2022-02-19 23:06:21'),
(54, 49, 78, 'Cash on delivery', '69999', '2022-02-19 23:19:23'),
(55, 49, 79, 'Cash on delivery', '46900', '2022-02-19 23:20:03'),
(56, 50, 80, 'Cash on delivery', '129900', '2022-03-07 12:08:05'),
(57, 49, 81, 'Cash on delivery', '129900', '2022-03-21 21:22:38'),
(58, 49, 82, 'Cash on delivery', '129900', '2022-03-22 12:15:27'),
(59, 51, 86, 'Cash on delivery', '129900', '2022-04-11 10:39:58');

-- --------------------------------------------------------

--
-- Table structure for table `product_master`
--

CREATE TABLE `product_master` (
  `PRODUCT_ID` int(10) NOT NULL,
  `SHOPKEEPER_ID` int(10) NOT NULL,
  `BRAND_NAME` varchar(20) NOT NULL,
  `MODEL_NAME` varchar(100) NOT NULL,
  `FEATURES` longtext NOT NULL,
  `QUANTITY` int(10) NOT NULL,
  `IMAGE` varchar(2000) NOT NULL,
  `PRICE` int(30) NOT NULL,
  `DATE` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_master`
--

INSERT INTO `product_master` (`PRODUCT_ID`, `SHOPKEEPER_ID`, `BRAND_NAME`, `MODEL_NAME`, `FEATURES`, `QUANTITY`, `IMAGE`, `PRICE`, `DATE`) VALUES
(1, 1, 'Samsung', 'samsung galaxys20 ultra', 'Quad rear camera-108MP,12GB RAM | 128GB internal,Android v10.0 operating system, Exynos 990 octa core processor,5000 mAh battery.\r\n', 10, 'galaxy-s20_highlights_design_ultra-gray-03.jpg', 102990, '2022-03-21 15:50:22.902093'),
(2, 1, 'Apple', 'iphone 13 pro max', '6Gb ram,A15 bionic ,12+12+12MP camera,4352 mAh battery', 10, 'apple-iphone-13-pro-max-.jpg', 129900, '2022-04-11 05:10:06.010319'),
(3, 1, 'Apple', 'iPhone 13 mini', '4 GB Ram,Apple A15 bionic ,128 bg internal storage,2406 mAh battery,dual 12+12 mp rear camera and 12 mp front camera', 10, '13mini.jpg', 69900, '2022-02-19 16:45:56.132048'),
(4, 1, 'Apple', 'iphone 13', '4 GB RAM, Apple A15 bionic,128 gb internal storage,3227 mAh battery ,dual 12+12 rear camera, 12 mp front camera', 10, '13.jpg', 79900, '2022-02-19 16:45:56.132048'),
(5, 1, 'Apple', 'iPhone 12 Pro Max ', 'Apple A14 Bionic\r\n6 GB RAM\r\n128 GB internal storage\r\n3687 mAh battery\r\nTriple(12+12+12) MP rear, 12 MP Front Camera \r\n', 10, '12promax.jpg', 74900, '2022-03-19 05:19:02.683716'),
(6, 1, 'Apple', 'iPhone 12 Pro', 'Apple A14 Bionic\r\n6 GB RAM\r\n128 GB internal storage\r\n2815 mAh battery\r\nTriple(12+12+12) MP Rear, 12 MP Front Camera    ', 10, '12pro.jpg', 109900, '2022-03-19 05:19:24.309895'),
(7, 1, 'Apple', 'iPhone 12', 'Apple A14 Bionic\r\n4 GB RAM\r\n64 GB internal storage\r\n2815 mAh battery\r\nDual(12+12) MP Rear, 12 MP Front Camera ', 10, '12.jpg', 53999, '2022-03-19 05:19:35.511694'),
(8, 1, 'Apple', 'iPhone 12 mini', 'Apple A14 Bionic\r\n4 GB Ram\r\n64 GB internal storage\r\n2227 mAh battery\r\nDual(12+12) MP Rear,12 MP Front Camera    ', 10, '12mini.jpg', 52900, '2022-03-19 05:19:50.353555'),
(9, 1, 'Apple', 'iPhone 11 Pro Max', 'Apple A13 Bioniic\r\n4 GB Ram\r\n64 GB internal storage\r\n3969 mAh battery\r\ntriple(12+12+12) MP Rear,12 MP Front camera   ', 10, '11promax.jpg', 117100, '2022-03-19 05:20:06.459966'),
(10, 1, 'Apple', 'iPhone 11 Pro', 'Apple A13 Bionic\r\n4 GB RAM\r\n64 GB internal storage \r\n3046 mAh battery\r\ntriple(12+12+12) MP Rear, 12MP front camera ', 10, '11pro.jpg', 106600, '2022-03-19 05:20:21.543683'),
(11, 1, 'Apple', 'iPhone 13 Pro', 'Apple A15 Bionic\r\n6 GB RAM\r\n128 GB internal storage\r\n3095 mAh\r\nbattery\r\nTriple (12+12+12) Mp Rear,12MP Front camera\r\n    ', 10, 'iphone-13-pro-family-hero.png', 119900, '2022-03-19 05:20:42.737421'),
(12, 1, 'Samsung', 'Samsung Galaxy S21 Ultra', '    Samsung Exynos 2100\r\n12 GB RAM\r\n256 GB internal storage\r\n5000 mAh battery\r\nQuad(108+10+10+12) MP Rear,40 MP Front camera\r\n', 10, '16903-18-5.jpg', 93832, '2022-03-19 05:20:58.228434'),
(13, 1, 'Samsung', 'Samsung Galaxy Z Fold 3', 'Qualcomm Snapdragpn 888\r\n12GB RAM \r\n256 Gb internal storage\r\n4400 mAh battery\r\nTriple(12+12+12)MP Rear,Dual(10+4) MP Front camera    ', 10, '17091-145-3.jpg', 149999, '2022-03-19 05:21:18.322255'),
(14, 1, 'Samsung', 'Samsung Galaxy S21 ', 'Samsung Exynos 2100\r\n8 GB RAM\r\n128 GB internal storage\r\n4000 mAh battery\r\nTriple(12+64+12)\r\nMP Rear,10MP Front Camera    ', 10, '16401-109-5.jpg', 59999, '2022-03-19 05:21:34.486101'),
(15, 1, 'Samsung', 'Samsung Galaxy S20 FE 5G', 'Qualcomm Snapdragon 865\r\n8GB RAM\r\n128 GB internal storage\r\n4500 mAg battery\r\nTriple (12+8+12)MP Rear,32MP Front camera    ', 10, '17520-123-5.jpg', 36250, '2022-03-19 05:21:54.589274'),
(16, 1, 'Samsung', 'Samsung Galaxy M32', 'MediaTek Helio G80\r\n4GB RAM\r\n64GB internal storage\r\n6000mAh battery\r\nQuad(64+8+2+2) MP Rear,20 MP Front camera   ', 10, 'Samsung Galaxy M32.jpg', 20999, '2022-03-19 05:22:05.373490'),
(17, 1, 'Samsung', 'Samsung Galaxy M12', 'Samsung Exynos 8 Octa 850\r\n4 GB RAM\r\n64 GB internal storagre\r\n6000 mAh battery\r\nQuad(48+5+2+2)\r\nMP Rear,8MP Front camera   ', 10, '17028-271-1.jpg', 11499, '2022-03-19 05:22:23.897841'),
(18, 1, 'Samsung', 'Samsung Galaxy F62', ' Samsung Exynos 9 Octa 9825\r\n6GB RAM\r\n128GB internal storage\r\n7000 mAh battery   \r\nQuad(64+12+5+5) MP Rear,32 MP Front Camera', 10, '17124-130-1.jpg', 23999, '2022-03-19 05:22:36.271585'),
(19, 1, 'Samsung', 'Samsung Galaxy A52', 'Qualcomm Snapdragon 720G\r\n6GB RAM\r\n128 GB internal storage\r\n4500 mAh battery\r\nQuad(64+12+5+5) MP Rear,32 MP Front Camera    ', 10, '16245-63-1.jpg', 27999, '2022-03-19 05:22:59.667447'),
(20, 1, 'Samsung', 'Galaxy M52 5G', 'Qualcomm Snapdragon 778G\r\n6GB RAM\r\n128 GB internal storage\r\n5000 mAh battery\r\nTriple(64+12+5) MP Rear,32 MP Front camera    ', 10, '17981-88-1.jpg', 26999, '2022-03-19 05:23:11.986393'),
(21, 1, 'Vivo', 'x70 pro', '8 GB RAM,128 GB ROM,50MP +12 MP +12 MP+ 8MP Rear camera ,32 MP front camera ,4450 mAh battery,mediatec dimensity 1200 processor. ', 8, 'vivo x70 pro.png', 46900, '2022-02-19 17:49:31.208492'),
(33, 1, 'Vivo', 'V23 5G ', '12 GB RAM | 256 GB ROM\r\n16.36 cm (6.44 inch) Full HD+ Display\r\n64MP + 8MP + 2MP | 50MP + 8MP Dual Front Camera\r\n4200 mAh Lithium Battery\r\nMediatek Dimensity 920 Processor', 10, 'y23 5g.jpeg', 34990, '2022-02-19 16:45:56.132048'),
(34, 1, 'Vivo', 'vivo Y33s', '8 GB RAM | 128 GB ROM | Expandable Upto 1 TB\r\n16.71 cm (6.58 inch) Full HD+ Display\r\n50MP + 2MP + 2MP | 16MP Front Camera\r\n5000 mAh Lithium Battery\r\nMediaTek Helio G80 Processor', 10, 'y33s.jpeg', 18990, '2022-02-19 16:45:56.132048'),
(35, 1, 'Vivo', 'Y21', '4 GB RAM | 64 GB ROM | Expandable Upto 1 TB\r\n16.54 cm (6.51 inch) HD+ Display\r\n13MP + 2MP | 8MP Front Camera\r\n5000 mAh Lithium Battery\r\nMediatek Helio P35 Processor', 10, 'y21.jpeg', 13990, '2022-02-19 16:45:56.132048'),
(36, 1, 'Vivo', 'y23 pro', '8 GB RAM | 128 GB ROM\r\n16.66 cm (6.56 inch) Full HD+ Display\r\n108MP + 8MP + 2MP | 50MP + 8MP Dual Front Camera\r\n4300 mAh Lithium Battery\r\nMediatek Dimensity 1200 Processor', 10, 'y23 pro.jpeg', 38990, '2022-02-19 16:45:56.132048'),
(37, 1, 'Vivo', 'V21e', '8 GB RAM | 128 GB ROM | Expandable Upto 1 TB\r\n16.36 cm (6.44 inch) Full HD+ Display\r\n64MP + 8MP | 32MP Front Camera\r\n4000 mAh Battery\r\nMediaTek Dimensity 700 Processor', 10, 'V21e.jpeg', 24989, '2022-02-19 16:45:56.132048'),
(38, 1, 'Vivo', 'Y1s', '3 GB RAM | 32 GB ROM | Expandable Upto 256 GB\r\n15.8 cm (6.22 inch) HD+ Display\r\n13MP Rear Camera | 5MP Front Camera\r\n4030 mAh Battery', 10, 'y1s.jpeg', 9490, '2022-02-19 16:45:56.132048'),
(39, 1, 'Vivo', 'Y51A', '8 GB RAM | 128 GB ROM | Expandable Upto 1 TB\r\n16.71 cm (6.58 inch) Full HD+ Display\r\n48MP + 8MP + 2MP | 16MP Front Camera\r\n5000 mAh Li-ion Battery\r\nQualcomm Snapdragon 662 Processor', 10, 'y51a.jpeg', 21990, '2022-02-19 16:45:56.132048'),
(40, 1, 'Vivo', 'Y20G', '6 GB RAM | 128 GB ROM\r\n16.54 cm (6.51 inch) Display\r\n13MP Rear Camera\r\n5000 mAh Battery', 10, 'y20g.jpeg', 18990, '2022-02-19 16:45:56.132048'),
(41, 1, 'Vivo', 'v20', '8 GB RAM | 128 GB ROM | Expandable Upto 1 TB\r\n16.36 cm (6.44 inch) Full HD+ Display\r\n64MP + 8MP + 2MP | 44MP Front Camera\r\n4000 mAh Lithium-ion Battery\r\nQualcomm Snapdragon 720G Processor', 10, 'v20.jpeg', 23274, '2022-02-19 16:45:56.132048'),
(42, 1, 'Oneplus', 'NORD 2 5G', 'Sony IMX 766 50MP+8MP+2MP AI Triple Camera\r\n32MP Front camera\r\n8GB RAM | 128GB internal memory\r\nDual Cell 4500mAH lithium-ion battery\r\nMediaTek Dimensity 1200', 10, 'nord 2.png', 29990, '2022-02-19 16:45:56.132048'),
(43, 1, 'Oneplus', '9RT 5G', '8 GB RAM + 128 GB Storage snapdragon 888 processor  \r\n50mp rear camera , 4500 mAh battery', 10, '9rt 5g.png', 42990, '2022-02-19 16:45:56.132048'),
(44, 1, 'Oneplus', 'NORD CE 5G', '8 GB RAM + 128 GB Storage \r\nsnapdragon 750,64MP triple rear camera,4500mAh battery', 10, 'nord ce 5g.png', 24999, '2022-02-19 16:45:56.132048'),
(45, 1, 'Oneplus', '9 5G', '8 GB RAM + 128 GB Storage,snapdragon 888,64 MP rear camera, 4500mAh battery', 10, '9 5g.png', 42999, '2022-02-19 16:45:56.132048'),
(46, 1, 'Oneplus', '9 PRO 5G', '8 GB RAM + 128 GB Storage,snapdragon 888,64 MP camera,4500 mAh battery.', 10, '9 pro.png', 59990, '2022-02-19 16:45:56.132048'),
(47, 1, 'Oneplus', '9R 5G', '8 GB RAM + 128 GB Storage,48 MP rear camera,4500mAh battery,snapdragon   870', 10, '9r.png', 40990, '2022-02-19 16:45:56.132048'),
(48, 1, 'Oneplus', '8 PRO', '8 GB RAM + 128 GB Storage,snapdragon 865,48 MP main camera,4500mAh battery', 10, '8 pro.png', 48990, '2022-02-19 16:45:56.132048'),
(49, 1, 'Oneplus', '8T', '8 GB RAM + 128 GB Storage,snapgragon 865,48 MP main camera,4500 maH battery', 10, '8t.png', 38999, '2022-02-19 16:45:56.132048'),
(50, 1, 'Oneplus', 'NORD', '6 GB RAM + 64 GB Storage,Quad camera, OIS 48 MP Sony IMX586,32 MP & ultra wide selfie cameras,Snapdragon™ 765G,4500mAh battery', 10, 'nord.png', 24999, '2022-02-19 16:45:56.132048'),
(51, 1, 'Redmi', '11 ULTRA 5G', '12 GB ram 128 gb rom,snapdragon 888,108mp camera,5000mAh battery', 9, '11 ULTRA.png', 69999, '2022-02-19 17:48:53.471125'),
(52, 1, 'Redmi', '11X pro 5G', 'Mi 11X Pro 5G (Cosmic Black, 8GB RAM, 128GB Storage) | Snapdragon 888 | 108MP Camera', 10, '11x pro.jpg', 36999, '2022-02-19 16:45:56.132048'),
(53, 1, 'Redmi', 'REDMI Note 10 Pro', '6 GB RAM | 128 GB ROM | Expandable Upto 512 GB\r\n16.94 cm (6.67 inch) Full HD+ Display\r\n64MP + 8MP + 5MP + 2MP | 16MP Front Camera\r\n5020 mAh Li-Polymer Battery\r\nQualcomm Snapdragon 732G Processor', 10, 'note10pro.webp', 16999, '0000-00-00 00:00:00.000000'),
(54, 1, 'Redmi', 'REDMI Note 10T 5G ', '4 GB RAM | 64 GB ROM\r\n16.66 cm (6.56 inch) Full HD+ Display\r\n48MP Primary Camera + 2MP Macro Lens + 2MP Depth Sensor | 8MP Front Camera\r\n5000 mAh Lithium Polymer Battery\r\nMediatek Dimensity 700 Processor', 10, 'note10t.webp', 13499, '0000-00-00 00:00:00.000000'),
(55, 1, 'Redmi', 'REDMI Note 11S', '6 GB RAM | 64 GB ROM\r\n16.33 cm (6.43 inch) Display\r\n108MP Rear Camera\r\n5000 mAh Battery', 10, 'note11s.webp', 19999, '0000-00-00 00:00:00.000000'),
(56, 1, 'Redmi', 'REDMI 9i Sport', '4 GB RAM | 64 GB ROM | Expandable Upto 512 GB\r\n16.59 cm (6.53 inch) HD+ Display\r\n13MP Rear Camera | 5MP Front Camera\r\n5000 mAh Li-Polymer Battery\r\nMediaTek Helio G25 Processor', 10, '9i.webp', 8799, '0000-00-00 00:00:00.000000'),
(57, 1, 'Redmi', 'REDMI Note 10S', '6 GB RAM | 64 GB ROM | Expandable Upto 512 GB\r\n16.33 cm (6.43 inch) Full HD+ Display\r\n64MP + 8MP + 2MP + 2MP | 13MP Front Camera\r\n5000 mAh Lithium-Ploymer Battery\r\nMediatek Helio G95 Processor', 10, 'note10s.webp', 14999, '0000-00-00 00:00:00.000000'),
(58, 1, 'Redmi', 'REDMI 9 Activ', '4 GB RAM | 64 GB ROM\r\n16.51 cm (6.5 inch) Display\r\n13MP Rear Camera\r\n5000 mAh Battery', 10, '9activ.webp', 10338, '0000-00-00 00:00:00.000000'),
(59, 1, 'Redmi', 'REDMI 10 Prime ', '6 GB RAM | 128 GB ROM | Expandable Upto 512 GB\r\n16.51 cm (6.5 inch) Full HD Display\r\n50MP + 8MP + 2MP + 2MP | 8MP Front Camera\r\n6000 mAh Battery\r\nHelio G88 Processor', 10, 'note10prime.webp', 16400, '0000-00-00 00:00:00.000000'),
(60, 1, 'Redmi', 'REDMI 9 Power', '6 GB RAM | 128 GB ROM\r\n16.59 cm (6.53 inch) Full HD+ Display\r\n48MP + 8MP + 2MP + 2MP | 8MP Front Camera\r\n6000 mAh Battery\r\nQualcomm Snapdragon 662 Processor', 10, '9power.webp', 13499, '0000-00-00 00:00:00.000000'),
(61, 1, 'Realme', 'realme C11 2021', '2 GB RAM | 32 GB ROM | Expandable Upto 256 GB\r\n16.51 cm (6.5 inch) HD+ Display\r\n8MP Rear Camera | 5MP Front Camera\r\n5000 mAh Battery\r\nOcta-core Processor', 10, 'c112021.webp', 7556, '0000-00-00 00:00:00.000000'),
(62, 1, 'Realme', 'realme 8', '4 GB RAM | 128 GB ROM | Expandable Upto 256 GB\r\n16.26 cm (6.4 inch) Full HD+ Display\r\n64MP + 8MP + 2MP + 2MP | 16MP Front Camera\r\n5000 mAh Battery\r\nMediaTek Helio G95 Processor', 10, 'realme8.webp', 16115, '0000-00-00 00:00:00.000000'),
(63, 1, 'Realme', 'realme C21Y', '\r\n4 GB RAM | 64 GB ROM | Expandable Upto 256 GB\r\n16.51 cm (6.5 inch) HD+ Display\r\n13MP + 2MP + 2MP | 5MP Front Camera\r\n5000 mAh Battery\r\nUnisoc T610 Processor', 10, 'c21y.webp', 10499, '0000-00-00 00:00:00.000000'),
(64, 1, 'Realme', 'realme 9i', '4 GB RAM | 64 GB ROM | Expandable Upto 1 TB\r\n16.76 cm (6.6 inch) Full HD+ Display\r\n50MP + 2MP + 2MP | 16MP Front Camera\r\n5000 mAh Lithium ion Battery\r\nQualcomm Snapdragon 680 (SM6225) Processor', 10, 'realme9i.webp', 12499, '0000-00-00 00:00:00.000000'),
(65, 1, 'Oppo', 'OPPO F19s', '6 GB RAM | 128 GB ROM | Expandable Upto 256 GB\r\n16.33 cm (6.43 inch) Full HD+ Display\r\n48MP + 2MP + 2MP | 16MP Front Camera\r\n5000 mAh Battery\r\nQualcomm Snapdragon 662 Processor', 10, 'f19s.webp', 18775, '0000-00-00 00:00:00.000000'),
(66, 1, 'Oppo', 'OPPO Reno7 5G', '8 GB RAM | 256 GB ROM | Expandable Upto 1 TB\r\n16.33 cm (6.43 inch) Full HD Display\r\n64MP + 8MP + 2MP | 32MP Front Camera\r\n4500 mAh Lithium-ion Polymer Battery\r\nMediatek Dimensity 900 Processor', 10, 'reno75g.webp', 28999, '0000-00-00 00:00:00.000000'),
(67, 1, 'Oppo', 'OPPO F17 Pro', '8 GB RAM | 128 GB ROM | Expandable Upto 256 GB\r\n16.33 cm (6.43 inch) Full HD+ Display\r\n48MP + 8MP + 2MP + 2MP | 16MP + 2MP Dual Front Camera\r\n4015 mAh Lithium-ion Battery\r\nMediaTek Helio P95 Processor', 10, 'f17pro.webp', 19990, '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `review_master`
--

CREATE TABLE `review_master` (
  `REVIEW_ID` int(10) NOT NULL,
  `CUSTOMER_ID` int(10) NOT NULL,
  `PRODUCT_ID` int(10) NOT NULL,
  `REVIEWS` longtext NOT NULL,
  `DATE` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review_master`
--

INSERT INTO `review_master` (`REVIEW_ID`, `CUSTOMER_ID`, `PRODUCT_ID`, `REVIEWS`, `DATE`) VALUES
(13, 1, 2, 'this product is ****', '2022-01-27 12:40:15.000000'),
(14, 48, 21, 'Harsh review check', '2022-02-01 15:37:43.000000'),
(15, 49, 13, 'Value for money!!', '2022-02-16 10:02:19.000000'),
(16, 49, 5, 'This product is ****', '2022-02-16 21:04:30.000000'),
(17, 49, 3, 'This product is value for money', '2022-02-19 20:05:34.000000'),
(18, 0, 3, 'this product is ****!!!', '2022-03-07 12:14:22.000000'),
(19, 49, 2, '**** this', '2022-03-22 12:16:15.000000');

-- --------------------------------------------------------

--
-- Table structure for table `shopkeeper_master`
--

CREATE TABLE `shopkeeper_master` (
  `SHOPKEEPER_ID` int(10) NOT NULL,
  `SHOPKEEPER_EMAIL` varchar(50) NOT NULL,
  `SHOPKEEPER_PASSWORD` varchar(50) NOT NULL,
  `SHOPKEEPER_USERNAME` varchar(20) NOT NULL,
  `DATE` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shopkeeper_master`
--

INSERT INTO `shopkeeper_master` (`SHOPKEEPER_ID`, `SHOPKEEPER_EMAIL`, `SHOPKEEPER_PASSWORD`, `SHOPKEEPER_USERNAME`, `DATE`) VALUES
(1, '196330307556.manav.shah@gmail.com', '9925717005ma', 'Manav', '2022-03-19 05:40:24.470533');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_master`
--
ALTER TABLE `admin_master`
  ADD PRIMARY KEY (`ADMIN_ID`),
  ADD UNIQUE KEY `ADMIN_EMAIL` (`ADMIN_EMAIL`);

--
-- Indexes for table `brand_master`
--
ALTER TABLE `brand_master`
  ADD PRIMARY KEY (`BRAND_ID`),
  ADD UNIQUE KEY `BRAND_NAME` (`BRAND_NAME`),
  ADD KEY `SHOPKEEPER_ID` (`SHOPKEEPER_ID`);

--
-- Indexes for table `cart_archive_master`
--
ALTER TABLE `cart_archive_master`
  ADD PRIMARY KEY (`CART_ID`);

--
-- Indexes for table `cart_master`
--
ALTER TABLE `cart_master`
  ADD PRIMARY KEY (`CART_ID`),
  ADD KEY `cart_master_ibfk_2` (`PRODUCT_ID`);

--
-- Indexes for table `compare_master`
--
ALTER TABLE `compare_master`
  ADD PRIMARY KEY (`COMPARE_ID`);

--
-- Indexes for table `customer_master`
--
ALTER TABLE `customer_master`
  ADD PRIMARY KEY (`CUSTOMER_ID`),
  ADD UNIQUE KEY `CUSTOMER_EMAIL` (`CUSTOMER_EMAIL`);

--
-- Indexes for table `order_archive_master`
--
ALTER TABLE `order_archive_master`
  ADD PRIMARY KEY (`ORDER_ID`);

--
-- Indexes for table `order_master`
--
ALTER TABLE `order_master`
  ADD PRIMARY KEY (`ORDER_ID`);

--
-- Indexes for table `payment_master`
--
ALTER TABLE `payment_master`
  ADD PRIMARY KEY (`PAYMENT_ID`);

--
-- Indexes for table `product_master`
--
ALTER TABLE `product_master`
  ADD PRIMARY KEY (`PRODUCT_ID`),
  ADD UNIQUE KEY `MODEL_NAME` (`MODEL_NAME`),
  ADD KEY `BRAND_NAME` (`BRAND_NAME`),
  ADD KEY `SHOPKEEPER_ID` (`SHOPKEEPER_ID`);

--
-- Indexes for table `review_master`
--
ALTER TABLE `review_master`
  ADD PRIMARY KEY (`REVIEW_ID`);

--
-- Indexes for table `shopkeeper_master`
--
ALTER TABLE `shopkeeper_master`
  ADD PRIMARY KEY (`SHOPKEEPER_ID`),
  ADD UNIQUE KEY `SHOPKEEPER_EMAIL` (`SHOPKEEPER_EMAIL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_master`
--
ALTER TABLE `admin_master`
  MODIFY `ADMIN_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brand_master`
--
ALTER TABLE `brand_master`
  MODIFY `BRAND_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart_master`
--
ALTER TABLE `cart_master`
  MODIFY `CART_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `compare_master`
--
ALTER TABLE `compare_master`
  MODIFY `COMPARE_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `customer_master`
--
ALTER TABLE `customer_master`
  MODIFY `CUSTOMER_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `order_master`
--
ALTER TABLE `order_master`
  MODIFY `ORDER_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `payment_master`
--
ALTER TABLE `payment_master`
  MODIFY `PAYMENT_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `product_master`
--
ALTER TABLE `product_master`
  MODIFY `PRODUCT_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `review_master`
--
ALTER TABLE `review_master`
  MODIFY `REVIEW_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `shopkeeper_master`
--
ALTER TABLE `shopkeeper_master`
  MODIFY `SHOPKEEPER_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brand_master`
--
ALTER TABLE `brand_master`
  ADD CONSTRAINT `brand_master_ibfk_1` FOREIGN KEY (`SHOPKEEPER_ID`) REFERENCES `shopkeeper_master` (`SHOPKEEPER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart_master`
--
ALTER TABLE `cart_master`
  ADD CONSTRAINT `cart_master_ibfk_2` FOREIGN KEY (`PRODUCT_ID`) REFERENCES `product_master` (`PRODUCT_ID`);

--
-- Constraints for table `product_master`
--
ALTER TABLE `product_master`
  ADD CONSTRAINT `product_master_ibfk_1` FOREIGN KEY (`SHOPKEEPER_ID`) REFERENCES `shopkeeper_master` (`SHOPKEEPER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

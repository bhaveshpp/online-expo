-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 27, 2020 at 10:48 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ExpoIndia`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `image`) VALUES
(1, 'admin', 'admin@onlineexpo.com', 'Admin@123', 'me4.jpeg'),
(2, 'Akash', 'bhaveshpp11@gmail.com', 'Admin@123', 'WhatsApp_Image_2020-07-15_at_10_20_54_PM.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'school'),
(2, 'education'),
(3, 'college'),
(4, 'car'),
(5, 'Auto'),
(6, 'sport');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `state_id`, `name`, `image`) VALUES
(1, 7, 'Gandhinagar', 'images17.jpg'),
(2, 7, 'Ahemdabad', 'images_(2)24.jpg'),
(5, 7, 'Bhavnagar', 'images_(1)28.jpg'),
(15, 7, 'Rajkot', 'images_(3)21.jpg'),
(19, 15, 'Bombay', 'images_(4)8.jpg'),
(22, 13, 'Chennai', 'images_(1)27.jpg'),
(23, 7, 'Surat', 'download15.jpg'),
(24, 1, 'Visakhapatanam', 'images_(3)20.jpg'),
(25, 1, 'Tirupati', 'images_(4)9.jpg'),
(27, 1, 'Hayderabad', 'images_(1)26.jpg'),
(28, 22, 'Jaipur', 'images_(1)24.jpg'),
(29, 22, 'Kota', 'download14.jpg'),
(30, 22, 'Jodhpur', 'download_(1)9.jpg'),
(31, 15, 'Nasik', 'images_(3)19.jpg'),
(32, 15, 'Aurangabad', 'images_(2)21.jpg'),
(33, 15, 'Thane', 'images_(1)23.jpg'),
(34, 15, 'Nagpur', 'download13.jpg'),
(35, 14, 'Bhopal', 'images_(3)18.jpg'),
(36, 14, 'Indor', 'images_(2)20.jpg'),
(37, 14, 'Gwalier', 'images_(1)22.jpg'),
(38, 14, 'Jabalpur', 'images18.jpg'),
(39, 14, 'Ujjain', 'download_(3)1.jpg'),
(40, 6, 'Ponda', 'images16.jpg'),
(41, 6, 'Panagi', 'images_(2)19.jpg'),
(42, 6, 'pernam', 'images_(1)21.jpg'),
(43, 6, 'canacono', 'download12.jpg'),
(44, 2, 'Itanagar', 'images15.jpg'),
(45, 2, 'Tawang', 'download10.jpg'),
(46, 3, 'Guwahati', 'images_(1)20.jpg'),
(47, 3, 'Jorhat', 'download_(5).jpg'),
(48, 3, 'Tezpur', 'images19.jpg'),
(49, 3, 'Silchar', 'download9.jpg'),
(50, 3, 'Sivasagar', 'images_(3)23.jpg'),
(51, 2, 'ziro', 'download_(4).jpg'),
(52, 2, 'Bomdila', 'download_(2)6.jpg'),
(53, 2, 'Pasighat', 'download_(1)8.jpg'),
(54, 4, 'Patna', 'images14.jpg'),
(55, 4, 'Darbhanga', 'images_(3)17.jpg'),
(56, 4, 'Nalanda', 'images_(2)18.jpg'),
(57, 4, 'Gaya', 'images_(1)19.jpg'),
(58, 4, 'Munger', 'download_(1)7.jpg'),
(59, 5, 'Raipur', 'images_(2)17.jpg'),
(60, 5, 'Bhilai', 'images13.jpg'),
(61, 5, 'Jagdalpur', 'images_(4)7.jpg'),
(62, 5, 'Raigarh', 'images_(3)16.jpg'),
(63, 5, 'Ratanpur', 'images_(1)18.jpg'),
(64, 5, 'Dkamtari', 'download8.jpg'),
(65, 8, 'Chandigarh', 'images_(4)6.jpg'),
(66, 8, 'Gurugram', 'images_(3)15.jpg'),
(67, 8, 'Karnal', 'images_(2)16.jpg'),
(68, 8, 'Panipat', 'images_(1)17.jpg'),
(69, 8, 'Faridabad', 'download_(1)6.jpg'),
(70, 9, 'Shimla', 'images_(5)4.jpg'),
(71, 9, 'Dharamshala', 'images12.jpg'),
(72, 9, 'Manali', 'images_(4)5.jpg'),
(73, 9, 'Dalhousie', 'images_(3)14.jpg'),
(74, 9, 'Mandi', 'images_(2)15.jpg'),
(75, 9, 'Kullu', 'images_(1)16.jpg'),
(76, 10, 'Srinagar', 'images11.jpg'),
(77, 10, 'Jammu', 'images_(1)15.jpg'),
(78, 10, 'Leh', 'download_(1)5.jpg'),
(79, 10, 'Gulmarg', 'images_(2)14.jpg'),
(80, 10, 'Katra', 'download7.jpg'),
(81, 11, 'Ranchi', 'images10.jpg'),
(82, 11, 'Jamshedpur', 'images_(1)14.jpg'),
(83, 11, 'Dhanbad', 'images_(6)1.jpg'),
(84, 11, 'Hazaribagh', 'images_(3)13.jpg'),
(85, 11, 'Deoghar', 'images_(2)13.jpg'),
(86, 12, 'Bengaluru', 'images9.jpg'),
(87, 12, 'Mangalore', 'images_(5)3.jpg'),
(88, 12, 'Hubli', 'images_(3)12.jpg'),
(89, 12, 'Belgaum', 'images_(2)12.jpg'),
(90, 12, 'Bijapur', 'images_(1)13.jpg'),
(91, 13, 'Kochi', 'images8.jpg'),
(92, 13, 'Thiruvananthapuram', 'images_(1)12.jpg'),
(93, 13, 'Alappuzha', 'download6.jpg'),
(94, 13, 'Thrissur', 'download_(2)5.jpg'),
(95, 13, 'Munnar', 'download_(1)4.jpg'),
(96, 16, 'Kakching', 'images7.jpg'),
(97, 16, 'Bishnupur,manipur', 'images_(5)2.jpg'),
(98, 16, 'Moirang', 'images_(3)11.jpg'),
(99, 16, 'Moreh', 'images_(2)11.jpg'),
(100, 16, 'Mayang,Imphal', 'images_(1)11.jpg'),
(101, 17, 'Shillong', 'images6.jpg'),
(102, 17, 'Cherrapunji', 'images_(3)10.jpg'),
(103, 17, 'Mawlynnong', 'images_(2)9.jpg'),
(104, 17, 'Tura', 'images_(1)10.jpg'),
(105, 17, 'Jowai', 'download5.jpg'),
(107, 18, 'Champhai', 'images_(3)8.jpg'),
(108, 18, 'Lunglei', 'images_(1)9.jpg'),
(109, 18, 'Serchhip', 'download4.jpg'),
(110, 18, 'Thenzawl', 'download_(1)3.jpg'),
(111, 19, 'Kohima', 'images5.jpg'),
(112, 19, 'Mokokchung', 'images_(3)7.jpg'),
(114, 19, 'Wokha', 'images_(1)8.jpg'),
(115, 19, 'Zunheboto', 'download3.jpg'),
(116, 20, 'Bhubaneswar', 'images_(5)1.jpg'),
(117, 20, 'Cuttack', 'images_(4)4.jpg'),
(118, 20, 'Puri', 'images_(3)6.jpg'),
(119, 20, 'Sambalpur', 'images_(2)6.jpg'),
(120, 20, 'Berhampur', 'images_(1)7.jpg'),
(121, 21, 'Chandigarh', 'images_(4)3.jpg'),
(122, 21, 'Amritsar', 'images_(3)5.jpg'),
(123, 21, 'Ludhiana', 'images_(2)5.jpg'),
(124, 21, 'Jalandar', 'images_(1)6.jpg'),
(125, 21, 'Patiala', 'download_(2)4.jpg'),
(126, 23, 'Gangtok', 'images_(3)4.jpg'),
(127, 23, 'Namchi', 'images_(2)4.jpg'),
(128, 23, 'Ravangla', 'images_(1)5.jpg'),
(129, 23, 'Pelling', 'download2.jpg'),
(130, 23, 'Lachung', 'download_(2)3.jpg'),
(131, 24, 'Chennai', 'images_(4)2.jpg'),
(132, 24, 'Madurai', 'images_(3)3.jpg'),
(133, 24, 'Coimbatore', 'images_(2)3.jpg'),
(134, 24, 'Tiruchirappalli', 'images_(1)4.jpg'),
(135, 24, 'Ooty', 'download_(1)2.jpg'),
(136, 25, 'Warangal', 'images_(6).jpg'),
(137, 25, 'Karimnagar', 'images_(4)1.jpg'),
(138, 25, 'Khammam', 'images_(3)2.jpg'),
(139, 25, 'Nalgonda', 'images_(2)2.jpg'),
(140, 25, 'Nizamabad', 'images_(1)3.jpg'),
(141, 26, 'Agartala', 'images4.jpg'),
(142, 26, 'Kailashahar', 'images_(1)2.jpg'),
(143, 26, 'Dharmanagar', 'download1.jpg'),
(144, 26, 'Belonia', 'download_(2)2.jpg'),
(145, 26, 'Bishalgarh', 'download_(1)1.jpg'),
(146, 27, 'Lucknow', 'images3.jpg'),
(147, 27, 'Varanasi', 'images_(5).jpg'),
(148, 27, 'Agra', 'images_(3)1.jpg'),
(149, 27, 'Kanpur', 'images_(2)1.jpg'),
(150, 27, 'Allahabad', 'images_(1)1.jpg'),
(151, 28, 'Rishikesh', 'images2.jpg'),
(152, 28, 'Dehradun', 'download.jpg'),
(153, 28, 'Mussoorie', 'download_(3).jpg'),
(154, 28, 'Haridwar', 'download_(2).jpg'),
(155, 28, 'Ranikhet', 'download_(1).jpg'),
(156, 29, 'Kolkata', 'images1.jpg'),
(157, 29, 'Howrah', 'images_(4).jpg'),
(158, 29, 'Durgapur', 'images_(3).jpg'),
(159, 29, 'Darjeeling', 'images_(2).jpg'),
(160, 29, 'Kalimpong', 'images_(1).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `image` text NOT NULL,
  `business` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `password`, `mobile`, `image`, `business`) VALUES
(8, 'Customer', 'user@onlineexpo.com', 'User@123', 1234567890, 'raku1.JPG', '');

-- --------------------------------------------------------

--
-- Table structure for table `exhibition`
--

CREATE TABLE `exhibition` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `category` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `address` text NOT NULL,
  `city` int(11) NOT NULL,
  `helpline` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `start_time` text NOT NULL,
  `end_time` text NOT NULL,
  `stalls` int(11) NOT NULL,
  `exhibitor_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `discription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exhibition`
--

INSERT INTO `exhibition` (`id`, `title`, `category`, `state`, `address`, `city`, `helpline`, `start_date`, `end_date`, `start_time`, `end_time`, `stalls`, `exhibitor_id`, `image`, `status`, `discription`) VALUES
(16, 'IT EXPO', 1, 7, 'vanita vishram 								                                                									                                                ', 1, '(999) 880-9006', '2018-03-24', '2018-03-30', '10:00', '20:00', 50, 10, 'abp-tech-logo.png', 0, 'Content developer, Translator,Trainer,Assistant Professor,Department of communication skiil, Marwadi University.'),
(17, 'TEXTILE EXPO', 3, 7, 'guo								                                                									                                                ', 2, '(888) 888-8888', '2018-03-25', '2018-03-31', '06:07', '16:08', 100, 10, 'telecom-mailing-puzzle1.png', 1, 'To be human, is to be imperfect. We are all flawed, frail and prone to error. This is our undeniable nature. And this adds to the uniqueness of each person. But how do these imperfections affect us? ....'),
(18, 'test', 6, 4, '								                                                	test								                                                									                                                								                                                ', 24, '(999) 999-9999', '2018-03-27', '2018-03-31', '10:04', '22:02', 50, 10, 'abp-tech-logo1.png', 0, 'we are helpfull'),
(21, 'test', 1, 7, '								                                                									                                                	asd								                                                									                                                								                                                								                                                ', 15, '(999) 999-9999', '2018-03-31', '2018-04-07', '07:44', '07:45', 20, 10, 'IP4A5725.JPG', 1, 'tets'),
(22, 'test', 4, 7, 'hii								                                                									                                                ', 2, '(999) 999-9999', '2018-04-04', '2018-04-07', '10:31', '22:31', 50, 10, 'IP4A6145.JPG', 1, 'test'),
(23, 'test2', 5, 7, '	jjjwjw							                                                									                                                ', 2, '(555) 555-5555', '2018-04-01', '2018-04-07', '10:34', '22:34', 100, 10, 'Synnex-Platinum.jpg', 1, 'hihhdihsk'),
(24, 'godk', 4, 7, '				jhdbjkw				                                                									                                                ', 15, '(222) 222-2222', '2018-04-06', '2018-05-05', '10:36', '22:36', 23, 10, '22049788_1638010412890264_3447164696266335569_n.jpg', 1, 'hje'),
(25, 'jk', 3, 4, '19nndk								                                                									                                                ', 24, '(535) 222-2222', '2018-04-03', '2018-04-07', '10:39', '00:38', 9, 10, '19894967_1563839986973974_1278179829186398024_n.png', 1, 'jjjw'),
(26, 'expo test', 3, 7, '123								                                                									                                                ', 2, '(666) 666-6666', '2018-04-06', '2018-04-27', '02:53', '15:54', 100, 10, 'twitter.png', 1, 'ttwll'),
(27, 'itexpo', 2, 4, 'asd', 24, '(999) 999-9999', '2018-04-09', '2018-04-18', '00:18', '12:19', 10, 10, 'TPX2.JPG', 1, 'test'),
(28, 'School detail', 1, 7, 'surat', 23, '(966) 455-7157', '2018-08-27', '2018-08-30', '00:00', '02:10', 2, 10, 'DSC_0928.JPG', 0, 'school managment'),
(29, 'aakash', 2, 7, 'isjhddairyiqsjachskjdh', 23, '(198) 247-2938', '2018-09-19', '2018-09-20', '09:38', '02:48', 100, 10, '3.jpg', 0, 'woiefu9sidfsoiufodifuofi');

-- --------------------------------------------------------

--
-- Table structure for table `exhibition_image`
--

CREATE TABLE `exhibition_image` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `exhibition_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exhibitor`
--

CREATE TABLE `exhibitor` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `image` text NOT NULL,
  `subscription` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exhibitor`
--

INSERT INTO `exhibitor` (`id`, `name`, `email`, `password`, `mobile`, `image`, `subscription`, `status`) VALUES
(25, 'admin', 'exhibitor@onlineexpo.com', 'Exhibitor@123', 1234567890, 'raku1.JPG', '2020-07-26 05:07:12', 1),
(26, 'teat', 'test@mailinator.com', '2907', 1234567890, 'bhavesh-photo.jpg', '2020-07-26 08:35:49', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `exhibition_id` int(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  `transection_id` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `exhibition_id`, `price`, `transection_id`, `date`) VALUES
(1, 27, 1000, 'e2f33a799cbde824ea15', '2018-04-02 11:34:37'),
(2, 26, 1000, '29a9a985cb4e5a23efa9', '2018-04-02 12:01:29'),
(3, 25, 1000, 'f4259b121f58a5fe31cc', '2018-04-02 12:21:46'),
(4, 24, 1000, '90ad1ae11b3612e1058b', '2018-04-02 12:36:35'),
(5, 23, 1000, 'ffe068cac91baa73225e', '2018-04-02 12:38:34'),
(6, 22, 1000, '8af10483977e4b6380d0', '2018-04-02 12:39:33'),
(8, 21, 1000, '9a42e0b012a9f0407378', '2018-04-02 12:41:04'),
(9, 17, 1000, 'e40460a113bdcf25024c', '2018-04-02 12:41:51');

-- --------------------------------------------------------

--
-- Table structure for table `stall`
--

CREATE TABLE `stall` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  `exhibition_id` int(11) NOT NULL,
  `length` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `stalls` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stall`
--

INSERT INTO `stall` (`id`, `category_id`, `price`, `exhibition_id`, `length`, `width`, `stalls`) VALUES
(32, 1, 1000, 16, 7, 5, 12),
(33, 1, 1000, 17, 10, 10, 25),
(34, 4, 10000, 18, 10, 10, 10),
(35, 1, 2000, 18, 10, 10, 30),
(36, 2, 1000, 18, 200, 10, 10),
(37, 3, 1000, 22, 10, 10, 1),
(38, 3, 1992, 23, 19, 100, 2),
(39, 4, 1999, 24, 38, 38, 1),
(40, 2, 3999, 25, 11, 32, 1),
(41, 2, 1123312, 26, 2211, 10001, 2),
(42, 1, 1003, 27, 54, 35, 5),
(43, 4, 2000, 28, 100, 100, 2),
(44, 1, 1000, 29, 15, 15, 20),
(45, 2, 123123, 29, 12, 12, 22);

-- --------------------------------------------------------

--
-- Table structure for table `stall_booking`
--

CREATE TABLE `stall_booking` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `exhibition_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `stall_no` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `transection_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stall_category`
--

CREATE TABLE `stall_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stall_category`
--

INSERT INTO `stall_category` (`id`, `name`, `image`) VALUES
(1, 'silver', 'silver.png'),
(2, 'gold', 'gold.png'),
(3, 'platinum', 'platinum.png'),
(4, 'diamond', 'diamond.png');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `name`) VALUES
(1, '	Andhra Pradesh'),
(2, '	Arunachal Pradesh'),
(3, '	Assam'),
(4, 'Bihar'),
(5, '	Chhattisgarh'),
(6, 'Goa'),
(7, 'Gujarat'),
(8, '	Haryana'),
(9, 'Himachal Pradesh'),
(10, '	Jammu and Kashmir'),
(11, 'Jharkhand'),
(12, '	Karnataka'),
(13, 'Kerala'),
(14, 'Madhya Pradesh'),
(15, '	Maharashtra'),
(16, 'Manipur'),
(17, 'Meghalaya'),
(18, 'Mizoram'),
(19, '	Nagaland'),
(20, '	Odisha'),
(21, 'Punjab'),
(22, 'Rajasthan'),
(23, 'Sikkim'),
(24, 'Tamil Nadu'),
(25, '	Telangana'),
(26, '	Tripura'),
(27, 'Uttar Pradesh'),
(28, 'Uttarakhand'),
(29, 'West Bengal');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `ip` text NOT NULL,
  `count` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `ip`, `count`) VALUES
(1, '192.168.0.105', 3),
(2, '192.168.0.102', 35),
(3, '192.168.0.104', 5),
(4, 'null', 41);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exhibition`
--
ALTER TABLE `exhibition`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`),
  ADD KEY `state` (`state`),
  ADD KEY `city` (`city`);

--
-- Indexes for table `exhibition_image`
--
ALTER TABLE `exhibition_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exhibitor_id` (`exhibition_id`),
  ADD KEY `exhibition_id` (`exhibition_id`);

--
-- Indexes for table `exhibitor`
--
ALTER TABLE `exhibitor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exhibition_id` (`exhibition_id`);

--
-- Indexes for table `stall`
--
ALTER TABLE `stall`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exhibition_id` (`exhibition_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `stall_booking`
--
ALTER TABLE `stall_booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`,`exhibition_id`,`cat_id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `exhibition_id` (`exhibition_id`);

--
-- Indexes for table `stall_category`
--
ALTER TABLE `stall_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `exhibition`
--
ALTER TABLE `exhibition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `exhibition_image`
--
ALTER TABLE `exhibition_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exhibitor`
--
ALTER TABLE `exhibitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stall`
--
ALTER TABLE `stall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `stall_booking`
--
ALTER TABLE `stall_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stall_category`
--
ALTER TABLE `stall_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exhibition`
--
ALTER TABLE `exhibition`
  ADD CONSTRAINT `exhibition_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exhibition_ibfk_2` FOREIGN KEY (`state`) REFERENCES `state` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exhibition_ibfk_3` FOREIGN KEY (`city`) REFERENCES `city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exhibition_image`
--
ALTER TABLE `exhibition_image`
  ADD CONSTRAINT `exhibition_image_ibfk_2` FOREIGN KEY (`exhibition_id`) REFERENCES `exhibition` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`exhibition_id`) REFERENCES `exhibition` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stall`
--
ALTER TABLE `stall`
  ADD CONSTRAINT `stall_ibfk_2` FOREIGN KEY (`exhibition_id`) REFERENCES `exhibition` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stall_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `stall_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stall_booking`
--
ALTER TABLE `stall_booking`
  ADD CONSTRAINT `stall_booking_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stall_booking_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `stall_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stall_booking_ibfk_3` FOREIGN KEY (`exhibition_id`) REFERENCES `exhibition` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

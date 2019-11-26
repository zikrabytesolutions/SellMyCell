-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 25, 2019 at 12:38 AM
-- Server version: 5.7.28
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sellmyce_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `cls_city`
--

CREATE TABLE `cls_city` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `city_icon` mediumtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cls_city`
--

INSERT INTO `cls_city` (`id`, `state_id`, `city_name`, `city_icon`) VALUES
(1, 1, 'Bangalore', 'bangalore.png');

-- --------------------------------------------------------

--
-- Table structure for table `cls_city_pincode`
--

CREATE TABLE `cls_city_pincode` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `area` text COLLATE utf8_unicode_ci NOT NULL,
  `pincode` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cls_city_pincode`
--

INSERT INTO `cls_city_pincode` (`id`, `city_id`, `area`, `pincode`) VALUES
(1, 1, 'Dr. Ambedkar Veedhi S.O', '560001'),
(2, 1, 'Bangalore City S.O', '560002'),
(3, 1, 'Aranya Bhavan S.O', '560003'),
(4, 1, 'Visveswarapuram S.O', '560004'),
(5, 1, 'Jeevanahalli S.O', '560005'),
(6, 1, 'Training Command IAF S.O', '560006'),
(7, 1, 'Air Force Hospital S.O', '560007'),
(8, 1, 'Hulsur Bazaar S.O', '560008'),
(9, 1, 'Bangalore Dist Offices Bldg S.O', '560009'),
(10, 1, 'Bhashyam Circle S.O', '560010'),
(11, 1, 'Jayangar III Block S.O', '560011'),
(12, 1, 'Science Institute S.O', '560012'),
(13, 1, 'Govindapalya S.O', '560013'),
(14, 1, 'Jalahalli East S.O', '560014'),
(15, 1, 'Jalahalli West S.O', '560015'),
(16, 1, 'Krishnarajapuram R S S.O', '560016'),
(17, 1, 'Bangalore Air Port S.O', '560017'),
(18, 1, 'Chamrajpet Bazar S.O', '560018'),
(19, 1, 'Gaviopuram Extension S.O', '560019'),
(20, 1, 'K.P.West S.O', '560020'),
(21, 1, 'Gayathrinagar S.O', '560021'),
(22, 1, 'Goraguntepalya S.O', '560022'),
(23, 1, 'Magadi Road S.O', '560023'),
(24, 1, 'Anandnagar S.O', '560024'),
(25, 1, 'Bangalore Sub Fgn Post S.O', '560025'),
(26, 1, 'Avalahalli S.O', '560026'),
(27, 1, 'Sampangiramnagar S.O', '560027'),
(28, 1, 'Tyagrajnagar S.O', '560028'),
(29, 1, 'Dharmaram College S.O', '560029'),
(30, 1, 'Adugodi S.O', '560030'),
(31, 1, 'P&T Col. Kavalbyrasandra S.O', '560032'),
(32, 1, 'Malkand Lines S.O', '560033'),
(33, 1, 'Agara B.O', '560034'),
(34, 1, 'Devasandra S.O', '560036'),
(35, 1, 'Doddanekkundi S.O', '560037'),
(36, 1, 'Indiranagar Com. Complex S.O', '560038'),
(37, 1, 'Nayandahalli S.O', '560039'),
(38, 1, 'Chandra Lay Out S.O', '560040'),
(39, 1, 'Jayanagar H.O', '560041'),
(40, 1, 'Sivan Chetty Gardens S.O', '560042'),
(41, 1, 'Banaswadi S.O', '560043'),
(42, 1, 'Devarjeevanahalli S.O', '560045'),
(43, 1, 'Benson Town S.O', '560046'),
(44, 1, 'Austin Town S.O', '560047'),
(45, 1, 'Hoodi S.O', '560048'),
(46, 1, 'Bhattarahalli S.O', '560049'),
(47, 1, 'Ashoknagar S.O', '560050'),
(48, 1, 'H.K.P. Road S.O', '560051'),
(49, 1, 'Vasanthnagar S.O', '560052'),
(50, 1, 'Balepete S.O', '560053'),
(51, 1, 'M S R Road S.O', '560054'),
(52, 1, 'Malleswaram West S.O', '560055'),
(53, 1, 'Bnagalore Viswavidalaya S.O', '560056'),
(54, 1, 'Dasarahalli S.O', '560057'),
(55, 1, 'Peenya I Stage S.O', '560058'),
(56, 1, 'Rv Niketan S.O', '560059'),
(57, 1, 'Subramanyapura S.O', '560061'),
(58, 1, 'Doddakallasandra S.O', '560062'),
(59, 1, 'A F Station Yelahanka S.O', '560063'),
(60, 1, 'BSF Campus Yelahanka S.O', '560064'),
(61, 1, 'G.K.V.K. S.O', '560065'),
(62, 1, 'Jeevanbhimanagar S.O', '560066'),
(63, 1, 'Devanagundi B.O', '560067'),
(64, 1, 'Hongasandra B.O', '560068'),
(65, 1, 'Jayangar East S.O', '560069'),
(66, 1, 'Jayanagar West S.O', '560070'),
(67, 1, 'Domlur S.O', '560071'),
(68, 1, 'Nagarbhavi S.O', '560072'),
(69, 1, 'Bagalgunte B.O', '560073'),
(70, 1, 'Kumbalgodu S.O', '560074'),
(71, 1, 'New Thippasandra S.O', '560075'),
(72, 1, 'Bannerghatta Road S.O', '560076'),
(73, 1, 'Kothanur S.O', '560077'),
(74, 1, 'J P Nagar S.O', '560078'),
(75, 1, 'Basaveshwaranagar S.O', '560079'),
(76, 1, 'Sadashivanagar S.O', '560080'),
(77, 1, 'Bannerghatta S.O', '560083'),
(78, 1, 'Kacharakanahalli S.O', '560084'),
(79, 1, 'Banashankari III Stage S.O', '560085'),
(80, 1, 'Avani Sringeri Mutt S.O', '560086'),
(81, 1, 'Gunjur B.O', '560087'),
(82, 1, 'Viswaneedam S.O', '560091'),
(83, 1, 'Amruthahalli S.O', '560092'),
(84, 1, 'C.V.Raman Nagar S.O', '560093'),
(85, 1, 'ISRO Anthariksha Bhavan S.O', '560094'),
(86, 1, 'Koramangala VI Bk S.O', '560095'),
(87, 1, 'Kanteeravanagar S.O', '560096'),
(88, 1, 'Chikkabettahalli B.O', '560097'),
(89, 1, 'Kenchanahalli B.O', '560098'),
(90, 1, 'Muthanallur B.O', '560099'),
(91, 1, 'Electronics City S.O', '560100'),
(92, 1, 'HSR Layout S.O', '560102'),
(93, 1, 'Bellandur S.O', '560103'),
(95, 1, '', '560104');

-- --------------------------------------------------------

--
-- Table structure for table `cls_login`
--

CREATE TABLE `cls_login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cls_login`
--

INSERT INTO `cls_login` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `cls_m_brand`
--

CREATE TABLE `cls_m_brand` (
  `id` int(11) NOT NULL,
  `brand` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `icon` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cls_m_brand`
--

INSERT INTO `cls_m_brand` (`id`, `brand`, `icon`, `is_deleted`) VALUES
(1, 'Apple', 'apple1.png', 0),
(3, 'Google', 'google-logo-png-open-2000.png', 0),
(16, 'One Plus', 'd-0W_twH_400x400.png', 0),
(6, 'Xiaomi', 'mi.png', 0),
(8, 'Oppo', 'Oppo-Logo.png', 0),
(9, 'Realme', '324-3240150_realme-is-a-shenzhen-based-chaines-smartphone-manufacturer.png', 0),
(10, 'Samsung', '580b57fcd9996e24bc43c533.png', 0),
(11, 'Vivo', 'vivo-Phone-logo.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cls_m_mobile`
--

CREATE TABLE `cls_m_mobile` (
  `id` int(11) NOT NULL,
  `varient_id` int(11) NOT NULL,
  `mobile_img` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `mobile_title` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `processor` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `ram_size` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `internal_memory` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `battery` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cls_m_mobile`
--

INSERT INTO `cls_m_mobile` (`id`, `varient_id`, `mobile_img`, `mobile_title`, `processor`, `ram_size`, `internal_memory`, `battery`, `created`, `is_deleted`) VALUES
(1, 10, 'IPhone_53.png', 'Apple Iphone 5 16GB', 'Apple A12 Bionic Processor', '4GB RAM', '64GB Internal Storage', '', '2019-11-22 16:53:00', 0),
(2, 11, 'IPhone_54.png', 'Apple Iphone 5 32GB', 'Apple A12 Bionic Processor', '4GB RAM', '64GB Internal Storage', '', '2019-11-22 16:53:00', 0),
(3, 12, 'IPhone_55.png', 'Apple Iphone 5 64GB', 'Apple A12 Bionic Processor', '4GB RAM', '64GB Internal Storage', '', '2019-11-22 16:53:00', 0),
(4, 13, 'iphone-5c2.png', 'Apple Iphone 5c 16GB', 'Apple A12 Bionic Processor', '4GB RAM', '64GB Internal Storage', '', '2019-11-22 16:53:00', 0),
(5, 14, 'iphone-5c3.png', 'Apple Iphone 5c 32GB', 'Apple A12 Bionic Processor', '4GB RAM', '64GB Internal Storage', '', '2019-11-22 16:53:00', 0),
(6, 15, 'IPhone_5s3.png', 'Apple Iphone 5s 16GB', 'Apple A12 Bionic Processor', '4GB RAM', '64GB Internal Storage', '', '2019-11-22 16:53:00', 0),
(7, 16, 'IPhone_5s4.png', 'Apple Iphone 5s 32GB', 'Apple A12 Bionic Processor', '4GB RAM', '64GB Internal Storage', '', '2019-11-22 16:53:00', 0),
(8, 17, 'IPhone_5s5.png', 'Apple Iphone 5s 64GB', 'Apple A12 Bionic Processor', '4GB RAM', '64GB Internal Storage', '', '2019-11-22 16:53:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cls_m_model`
--

CREATE TABLE `cls_m_model` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `model` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `icon` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cls_m_model`
--

INSERT INTO `cls_m_model` (`id`, `brand_id`, `model`, `icon`, `is_deleted`) VALUES
(31, 3, 'Google Pixel 3', '', 0),
(3, 6, 'Xiaomi MI Series', '', 0),
(4, 6, 'Xiaomi POCO Series', '', 0),
(30, 3, 'Google Pixel 2', '', 0),
(6, 6, 'Xiaomi Redmi Note Series', '', 0),
(7, 6, 'Xiaomi Redmi Note Series', '', 0),
(8, 6, 'Xiaomi Y Series', '', 0),
(9, 6, 'Xiaomi Y Series ', '', 0),
(10, 1, 'Apple Iphone 11', 'iphone11.png', 0),
(11, 1, 'Apple Iphone 11 Pro ', 'iphone-11-pro.png', 0),
(12, 1, 'Apple Iphone 11 Pro Max', 'iphone-11-pro-max.png', 0),
(14, 1, 'Apple Iphone 5', 'IPhone_5.png', 0),
(15, 1, 'Apple Iphone 5c', 'iphone-5c.png', 0),
(16, 1, 'Apple Iphone 5s', 'IPhone_5s.png', 0),
(17, 1, 'Apple Iphone 6', 'IPhone_6.png', 0),
(18, 1, 'Apple Iphone 6 Plus', 'iphone-6s.png', 0),
(19, 1, 'Apple Iphone 6S', 'iphone-6s1.png', 0),
(20, 1, 'Apple Iphone 6S Plus', 'iphone-6s-plus.png', 0),
(21, 1, 'Apple Iphone 7', 'IPhone_7.png', 0),
(22, 1, 'Apple Iphone 7 Plus', 'iphone-7-plus.png', 0),
(23, 1, 'Apple Iphone 8', 'iphone8.png', 0),
(24, 1, 'Apple Iphone 8 Plus', 'iphone8-plus.png', 0),
(25, 1, 'Apple Iphone SE', 'iphone-SE.png', 0),
(26, 1, 'Apple Iphone X', 'apple-iphone-x.png', 0),
(27, 1, 'Apple Iphone XR', 'iphone-xr-red.png', 0),
(28, 1, 'Apple Iphone XS', 'Apple-iPhone-XS.png', 0),
(29, 1, 'Apple Iphone XS Max ', 'iphone-xs-max.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cls_m_pricing`
--

CREATE TABLE `cls_m_pricing` (
  `id` int(11) NOT NULL,
  `mobile_id` int(11) NOT NULL,
  `like_new` float NOT NULL,
  `box_na` float NOT NULL,
  `bill_na` float NOT NULL,
  `charger_na` float NOT NULL,
  `earphone_na` float NOT NULL,
  `warranty_below_3` float NOT NULL,
  `warranty_3_6` float NOT NULL,
  `warranty_6_11` float NOT NULL,
  `warranty_above_11` float NOT NULL,
  `glass_broke` float NOT NULL,
  `display_crack` float NOT NULL,
  `front_camera_fault` float NOT NULL,
  `back_camera_fault` float NOT NULL,
  `battery_fault` float NOT NULL,
  `wifi_fault` float NOT NULL,
  `speaker_fault` float NOT NULL,
  `mic_fault` float NOT NULL,
  `volumn_btn_fault` float NOT NULL,
  `charging_fault` float NOT NULL,
  `power_button_fault` float NOT NULL,
  `fingerprint_fault` float NOT NULL,
  `face_recog_fault` float NOT NULL,
  `looking_new` float NOT NULL,
  `looking_good` float NOT NULL,
  `looking_average` float NOT NULL,
  `looking_average_below` float NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cls_m_pricing`
--

INSERT INTO `cls_m_pricing` (`id`, `mobile_id`, `like_new`, `box_na`, `bill_na`, `charger_na`, `earphone_na`, `warranty_below_3`, `warranty_3_6`, `warranty_6_11`, `warranty_above_11`, `glass_broke`, `display_crack`, `front_camera_fault`, `back_camera_fault`, `battery_fault`, `wifi_fault`, `speaker_fault`, `mic_fault`, `volumn_btn_fault`, `charging_fault`, `power_button_fault`, `fingerprint_fault`, `face_recog_fault`, `looking_new`, `looking_good`, `looking_average`, `looking_average_below`, `is_deleted`) VALUES
(1, 1, 2190, 300, 0, 300, 200, 0, 150, 250, 350, 1000, 1200, 750, 750, 700, 800, 300, 0, 200, 700, 300, 0, 0, 0, 200, 300, 500, 0),
(2, 2, 2700, 300, 0, 300, 200, 0, 150, 250, 350, 1000, 1100, 750, 750, 750, 800, 300, 0, 250, 700, 300, 0, 0, 0, 200, 300, 500, 0),
(3, 3, 3250, 300, 0, 300, 200, 0, 150, 250, 350, 1000, 1200, 850, 850, 800, 900, 400, 0, 350, 800, 300, 0, 0, 0, 200, 300, 500, 0),
(4, 4, 2250, 300, 0, 300, 200, 0, 150, 250, 350, 1000, 1000, 850, 850, 800, 1000, 450, 0, 400, 800, 300, 0, 0, 0, 200, 300, 500, 0),
(5, 5, 2500, 300, 0, 300, 200, 0, 150, 250, 350, 1000, 1200, 900, 900, 850, 1000, 450, 0, 450, 800, 300, 0, 0, 0, 200, 300, 500, 0),
(6, 6, 4100, 300, 0, 300, 200, 0, 150, 250, 350, 1100, 1600, 950, 1000, 1000, 1550, 500, 0, 400, 500, 250, 1300, 0, 0, 200, 300, 500, 0),
(7, 7, 4250, 300, 0, 300, 200, 0, 150, 250, 350, 1100, 1600, 1000, 1000, 1000, 1600, 500, 0, 450, 500, 300, 1400, 0, 0, 200, 300, 500, 0),
(8, 8, 4400, 300, 0, 300, 200, 0, 300, 600, 900, 1100, 1600, 1000, 1000, 1000, 1600, 500, 0, 450, 500, 300, 1400, 0, 0, 300, 500, 900, 0),
(10, 10, 5242, 45, 54, 45, 45, 45, 45, 45, 54, 45, 54, 45, 45, 45, 45, 45, 45, 45, 45, 45, 45, 45, 45, 45, 45, 45, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cls_m_varient`
--

CREATE TABLE `cls_m_varient` (
  `id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `varient` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `icon` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cls_m_varient`
--

INSERT INTO `cls_m_varient` (`id`, `model_id`, `varient`, `icon`, `is_deleted`) VALUES
(1, 10, 'Apple Iphone 11  128GB ', 'iphone11.png', 0),
(2, 10, 'Apple Iphone 11  256GB', 'iphone117.png', 0),
(3, 10, 'Apple Iphone 11  64GB ', 'iphone118.png', 0),
(4, 11, 'Apple Iphone 11 Pro 256GB ', 'iphone-11-pro.png', 0),
(5, 11, 'Apple Iphone 11 Pro 512GB ', 'iphone-11-pro1.png', 0),
(6, 11, 'Apple Iphone 11 Pro 64GB ', 'iphone-11-pro2.png', 0),
(7, 12, 'Apple Iphone 11 Pro Max 256GB ', 'iphone-11-pro-max.png', 0),
(8, 12, 'Apple Iphone 11 Pro Max 64GB ', 'iphone-11-pro-max1.png', 0),
(9, 12, 'Apple Iphone 11 Pro Max 512GB ', 'iphone-11-pro-max4.png', 0),
(10, 14, 'Apple Iphone 5 16GB', 'IPhone_52.png', 0),
(11, 14, 'Apple Iphone 5 32GB', 'IPhone_5.png', 0),
(12, 14, 'Apple Iphone 5 64GB', 'IPhone_51.png', 0),
(13, 15, 'Apple Iphone 5c 16GB', 'iphone-5c.png', 0),
(14, 15, 'Apple Iphone 5c 32GB', 'iphone-5c1.png', 0),
(15, 16, 'Apple Iphone 5s 16GB', 'IPhone_5s.png', 0),
(16, 16, 'Apple Iphone 5s 32GB', 'IPhone_5s1.png', 0),
(17, 16, 'Apple Iphone 5s 64GB', 'IPhone_5s2.png', 0),
(18, 17, 'Apple Iphone 6 128GB', 'IPhone_6.png', 0),
(19, 17, 'Apple Iphone 6 16GB', 'IPhone_61.png', 0),
(20, 17, 'Apple Iphone 6 32GB', 'IPhone_62.png', 0),
(21, 17, 'Apple Iphone 6 64GB ', 'IPhone_63.png', 0),
(22, 18, 'Apple Iphone 6 Plus 128GB ', 'iphone-6s.png', 0),
(23, 18, 'Apple Iphone 6 Plus 16GB ', 'iphone-6s1.png', 0),
(24, 18, 'Apple Iphone 6 Plus 64GB ', 'iphone-6s2.png', 0),
(25, 19, 'Apple Iphone 6S 128GB ', 'iphone-6s3.png', 0),
(26, 19, 'Apple Iphone 6S 16GB', 'iphone-6s4.png', 0),
(27, 19, 'Apple Iphone 6S 32GB ', 'iphone-6s5.png', 0),
(28, 19, 'Apple Iphone 6S 64GB ', 'iphone-6s6.png', 0),
(29, 20, 'Apple Iphone 6S Plus 128GB', 'iphone-6s7.png', 0),
(30, 20, 'Apple Iphone 6S Plus 16GB', 'iphone-6s8.png', 0),
(31, 20, 'Apple Iphone 6S Plus 32GB', 'iphone-6s-plus.png', 0),
(32, 20, 'Apple Iphone 6S Plus 64GB ', 'iphone-6s-plus1.png', 0),
(33, 21, 'Apple Iphone 7 128GB ', 'IPhone_7.png', 0),
(34, 21, 'Apple Iphone 7 256GB', 'IPhone_71.png', 0),
(35, 21, 'Apple Iphone 7 32GB', 'IPhone_72.png', 0),
(36, 22, 'Apple Iphone 7 Plus 128GB ', 'iphone-7-plus.png', 0),
(37, 22, 'Apple Iphone 7 Plus 256GB', 'iphone-7-plus1.png', 0),
(38, 22, 'Apple Iphone 7 Plus 32GB', 'iphone-7-plus2.png', 0),
(39, 23, 'Apple Iphone 8 256GB', 'iphone8.png', 0),
(40, 23, 'Apple Iphone 8 64GB', 'iphone81.png', 0),
(41, 24, 'Apple Iphone 8 Plus 256GB', 'iphone8-plus.png', 0),
(42, 24, 'Apple Iphone 8 Plus 64GB', 'iphone8-plus1.png', 0),
(43, 25, 'Apple Iphone SE 128GB ', 'iphone-SE.png', 0),
(44, 25, 'Apple Iphone SE 16GB', 'iphone-SE1.png', 0),
(45, 25, 'Apple Iphone SE 32GB', 'iphone-SE2.png', 0),
(46, 25, 'Apple Iphone SE 64GB', 'iphone-SE3.png', 0),
(47, 26, 'Apple Iphone X 256GB', 'apple-iphone-x.png', 0),
(48, 26, 'Apple Iphone X 64GB', 'apple-iphone-x1.png', 0),
(49, 27, 'Apple Iphone XR 128GB ', 'iphone-xr-red.png', 0),
(50, 27, 'Apple Iphone XR 256GB ', 'iphone-xr-red1.png', 0),
(51, 27, 'Apple Iphone XR 64GB ', 'iphone-xr-red2.png', 0),
(52, 28, 'Apple Iphone XS 256GB', 'Apple-iPhone-XS.png', 0),
(53, 28, 'Apple Iphone XS 512GB ', 'Apple-iPhone-XS1.png', 0),
(54, 28, 'Apple Iphone XS 64GB ', 'Apple-iPhone-XS2.png', 0),
(55, 29, 'Apple Iphone XS Max  256GB', 'iphone-xs-max.png', 0),
(56, 29, 'Apple Iphone XS Max  512GB ', 'iphone-xs-max1.png', 0),
(57, 29, 'Apple Iphone XS Max  64GB ', 'iphone-xs-max2.png', 0),
(63, 1, 'Xiaomi Black Shark 2 6GB/128GB', '', 0),
(62, 1, 'Xiaomi Black Shark 2 12GB/256GB', '', 0),
(64, 2, 'Xiaomi K20 6GB/128GB', '', 0),
(65, 2, 'Xiaomi K21 6GB/64GB', '', 0),
(66, 2, 'Xiaomi K20 Pro 6GB/128GB', '', 0),
(67, 2, 'Xiaomi K20 Pro 8GB/256GB', '', 0),
(68, 3, 'Xiaomi Mi4i 2GB/16GB', '', 0),
(69, 3, 'Xiaomi Mi4i 2GB/32GB', '', 0),
(70, 3, 'Xiaomi Mi5 3GB/32GB', '', 0),
(71, 3, 'Xiaomi Mi5 3GB/64GB', '', 0),
(72, 3, 'Xiaomi Mi A1 4GB/64GB', '', 0),
(73, 3, 'Xiaomi Mi A2 4GB/64GB', '', 0),
(74, 3, 'Xiaomi Mi A2 6GB/128GB', '', 0),
(75, 3, 'Xiaomi Mi A3 4GB/64GB', '', 0),
(76, 3, 'Xiaomi Mi A3 6GB/128GB', '', 0),
(77, 3, 'Xiaomi Mi Max 3GB/32GB', '', 0),
(78, 3, 'Xiaomi Mi Max  3GB/64GB', '', 0),
(79, 3, 'Xiaomi Mi Max  4GB/128GB', '', 0),
(80, 3, 'Xiaomi Mi Max 2 4GB/128GB', '', 0),
(81, 3, 'Xiaomi Mi Max 2 4GB/32GB', '', 0),
(82, 3, 'Xiaomi Mi Max 2 4GB/64GB', '', 0),
(83, 3, 'Xiaomi Mi Mix 2 6GB/128GB', '', 0),
(86, 4, 'Xiaomi POCO F1 8GB/256GB', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cls_order`
--

CREATE TABLE `cls_order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mobile_id` int(11) NOT NULL,
  `order_number` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `power_on` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `box` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bill` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `charger` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `earphone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `device_age` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `glass_broken` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `touch_issue` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `front_camera_issue` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `back_camera_issue` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `wifi_issue` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `battery_issue` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `speaker_issue` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mice_issue` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `volumn_issue` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `chargingpin_issue` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `power_btn_issue` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `finger_print_issue` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `face_recog_issue` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `device_condition` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `address_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address_first` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `address_second` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `locality` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `city` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `state` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `pincode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `payment_type` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `account_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `beneficiary_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ifsc_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bank_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `upi_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pickup_date` date NOT NULL,
  `pickup_tme_slot` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `final_price` float NOT NULL,
  `referral_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `placed` int(11) NOT NULL,
  `processing` int(11) NOT NULL,
  `onpickup` int(11) NOT NULL,
  `completed` int(11) NOT NULL,
  `is_cancel` int(11) NOT NULL,
  `cancel_time` datetime NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cls_order`
--

INSERT INTO `cls_order` (`id`, `user_id`, `mobile_id`, `order_number`, `power_on`, `box`, `bill`, `charger`, `earphone`, `device_age`, `glass_broken`, `touch_issue`, `front_camera_issue`, `back_camera_issue`, `wifi_issue`, `battery_issue`, `speaker_issue`, `mice_issue`, `volumn_issue`, `chargingpin_issue`, `power_btn_issue`, `finger_print_issue`, `face_recog_issue`, `device_condition`, `address_type`, `address_first`, `address_second`, `locality`, `city`, `state`, `pincode`, `payment_type`, `account_no`, `beneficiary_name`, `ifsc_code`, `bank_name`, `upi_id`, `pickup_date`, `pickup_tme_slot`, `final_price`, `referral_code`, `comment`, `created`, `placed`, `processing`, `onpickup`, `completed`, `is_cancel`, `cancel_time`, `is_deleted`) VALUES
(1, 4, 4, '441574406732', '1', '1', '1', '1', '1', 'below_3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'like_new', 'Office', 'Hx', 'Hcjc', 'Ufuf', 'Bangalore', 'Karnataka', '560069', 'cash', '', '', '', '', '', '2019-11-23', '3 PM - 6 PM', 736379, '', '', '2019-11-22 12:42:12', 1, 1, 1, 1, 0, '0000-00-00 00:00:00', 0),
(2, 1, 5, '1131574419238', '1', '1', '1', '1', '1', 'below_3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'like_new', 'Home', 'MIG - 10', '4th Block', 'Jay Nagar', 'Bangalore', 'Karnataka', '560068', 'upi', '', '', '', '', '123456@sbi', '2019-11-22', '12 PM - 3 PM', 22250, '', '', '2019-11-22 16:10:38', 1, 1, 1, 1, 0, '0000-00-00 00:00:00', 0),
(5, 6, 1, '611574441397', '1', '1', '1', '0', '0', 'above_11', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'like_new', 'Office', 'Ndksksjfhsjsv', 'Hdossjsjd', 'Gsisidid', 'Bangalore', 'Karnataka', '560069', 'cash', '', '', '', '', '', '2019-11-25', '3 PM - 6 PM', 1540, '', '', '2019-11-22 22:19:57', 1, 0, 0, 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cls_redeem`
--

CREATE TABLE `cls_redeem` (
  `id` int(11) NOT NULL,
  `referral_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_first` int(11) NOT NULL,
  `user_second` int(11) NOT NULL,
  `amount_first` int(11) NOT NULL,
  `amount_second` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `is_used_first` int(11) NOT NULL,
  `is_used_second` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_slider`
--

CREATE TABLE `cls_slider` (
  `id` int(11) NOT NULL,
  `slider_img` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cls_slider`
--

INSERT INTO `cls_slider` (`id`, `slider_img`) VALUES
(1, '51aa4dc2c042a96558b2c4c7d86d1cb695c344c3.jpg'),
(2, 'GP-WS5-01711-01_InnerPageBanner-S-768X378.jpg'),
(3, 'banner@2x-630x284.jpg'),
(4, 'c0e6b813083641_562709d70d5de.jpg'),
(5, '58a0999bf05d3_thumb900.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cls_state`
--

CREATE TABLE `cls_state` (
  `id` int(11) NOT NULL,
  `state_name` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cls_state`
--

INSERT INTO `cls_state` (`id`, `state_name`) VALUES
(1, 'Karnataka');

-- --------------------------------------------------------

--
-- Table structure for table `cls_user`
--

CREATE TABLE `cls_user` (
  `id` int(11) NOT NULL,
  `full_name` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `otp` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `is_verified` int(11) NOT NULL,
  `referral_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cls_user`
--

INSERT INTO `cls_user` (`id`, `full_name`, `mobile`, `email`, `otp`, `is_verified`, `referral_code`, `created`) VALUES
(1, 'Osan Kumar Singh', '9752132453', 'osan@gmail.com', '6726', 1, 'XFS7FBNT', '2019-11-21 19:57:30'),
(2, '', '8088856548', '', '2816', 1, 'I39XMHA1', '2019-11-21 21:09:19'),
(3, '', '5555555555', '', '3554', 0, 'J9XUVYPY', '2019-11-21 21:33:51'),
(4, 'Ali', '9901339455', 'Ali@gmail.com', '1468', 1, '76O6HRUG', '2019-11-22 12:40:44'),
(5, 'Tabrez ', '9591242972', 'tabrez1612@gmail.com', '5848', 1, 'GVKEO625', '2019-11-22 17:16:47'),
(6, 'Ali', '9739714051', 'Ali@gmail.com', '6663', 1, '7VGH68O7', '2019-11-22 22:18:42'),
(7, '', '9774141181', '', '5817', 1, 'AT9HZ59B', '2019-11-24 21:02:30');

-- --------------------------------------------------------

--
-- Table structure for table `cls_user_address`
--

CREATE TABLE `cls_user_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `address_first` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `address_second` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `locality` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `city` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `state` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `pincode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cls_user_address`
--

INSERT INTO `cls_user_address` (`id`, `user_id`, `type`, `address_first`, `address_second`, `locality`, `city`, `state`, `pincode`, `is_deleted`) VALUES
(1, 1, 'Home', 'MIG - 10', '4th Block', 'Jay Nagar', 'Bangalore', 'Karnataka', '560068', 0),
(2, 4, 'Office', 'Hx', 'Hcjc', 'Ufuf', 'Bangalore', 'Karnataka', '560069', 0),
(3, 5, 'Office', 'Na', 'Na', 'Na', 'Bangalore', 'Karnataka', '560029', 0),
(4, 6, 'Office', 'Ndksksjfhsjsv', 'Hdossjsjd', 'Gsisidid', 'Bangalore', 'Karnataka', '560069', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cls_user_bank`
--

CREATE TABLE `cls_user_bank` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `account_no` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `benf_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `ifsc_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bank_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `upi_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cls_user_bank`
--

INSERT INTO `cls_user_bank` (`id`, `user_id`, `payment_type`, `account_no`, `benf_name`, `ifsc_code`, `bank_name`, `upi_id`, `created`) VALUES
(1, 1, 'upi', '', '', '', '', '123456@sbi', '2019-11-22 10:40:26');

-- --------------------------------------------------------

--
-- Table structure for table `cls_utils`
--

CREATE TABLE `cls_utils` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cls_utils`
--

INSERT INTO `cls_utils` (`id`, `name`, `value`) VALUES
(1, 'terms_conditions', 'http://sellmycell.in/terms_and_conditions.html'),
(2, 'privacy_policy', 'http://sellmycell.in/privacy_policy.html'),
(3, 'about_us', 'http://sellmycell.in/a.html');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cls_city`
--
ALTER TABLE `cls_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_city_pincode`
--
ALTER TABLE `cls_city_pincode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_login`
--
ALTER TABLE `cls_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_m_brand`
--
ALTER TABLE `cls_m_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_m_mobile`
--
ALTER TABLE `cls_m_mobile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_m_model`
--
ALTER TABLE `cls_m_model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_m_pricing`
--
ALTER TABLE `cls_m_pricing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_m_varient`
--
ALTER TABLE `cls_m_varient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_order`
--
ALTER TABLE `cls_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_redeem`
--
ALTER TABLE `cls_redeem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_slider`
--
ALTER TABLE `cls_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_state`
--
ALTER TABLE `cls_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_user`
--
ALTER TABLE `cls_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_user_address`
--
ALTER TABLE `cls_user_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_user_bank`
--
ALTER TABLE `cls_user_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_utils`
--
ALTER TABLE `cls_utils`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cls_city`
--
ALTER TABLE `cls_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cls_city_pincode`
--
ALTER TABLE `cls_city_pincode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `cls_login`
--
ALTER TABLE `cls_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cls_m_brand`
--
ALTER TABLE `cls_m_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cls_m_mobile`
--
ALTER TABLE `cls_m_mobile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cls_m_model`
--
ALTER TABLE `cls_m_model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `cls_m_pricing`
--
ALTER TABLE `cls_m_pricing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cls_m_varient`
--
ALTER TABLE `cls_m_varient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `cls_order`
--
ALTER TABLE `cls_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cls_redeem`
--
ALTER TABLE `cls_redeem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cls_slider`
--
ALTER TABLE `cls_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cls_state`
--
ALTER TABLE `cls_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cls_user`
--
ALTER TABLE `cls_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cls_user_address`
--
ALTER TABLE `cls_user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cls_user_bank`
--
ALTER TABLE `cls_user_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cls_utils`
--
ALTER TABLE `cls_utils`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

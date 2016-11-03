-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2016 at 10:36 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classified`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateProductView` (IN `productID` INT)  NO SQL
UPDATE product SET product_views = product_views + 1 WHERE product_id = productID$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_firstname` varchar(30) NOT NULL,
  `admin_lastname` varchar(30) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_username` varchar(30) NOT NULL,
  `admin_password` varchar(200) NOT NULL,
  `admin_privilege` varchar(20) NOT NULL,
  `admin_date_added` datetime NOT NULL,
  `admin_last_loged_in` datetime NOT NULL,
  `admin_phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_firstname`, `admin_lastname`, `admin_email`, `admin_username`, `admin_password`, `admin_privilege`, `admin_date_added`, `admin_last_loged_in`, `admin_phone`) VALUES
(1, 'Super', 'Admin', 'admin@admin.com', 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', '', '0000-00-00 00:00:00', '2016-10-25 15:44:47', ''),
(2, 'Adeleke', 'Oladapo', 'adelekeoladapo@gmail.com', 'adelekeoladapo', 'busola1991', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '8020803585'),
(3, 'James', 'Gosline', 'james@gmail.com', 'jamesgoseline', 'password', '', '2016-09-10 11:44:04', '0000-00-00 00:00:00', '8099797979'),
(4, 'Abayomi', 'Samuel', 'sam@gmail.com', 'samboy', 'dbfb4558d59a7600aab407e16375db21', '', '2016-09-10 11:54:20', '0000-00-00 00:00:00', '2348020803585'),
(5, 'Akomolafe', 'Olabisu', 'bisi@gmail.com', 'bisi', '99a802c30403fe2d623d1a17eb36a702', '', '2016-09-14 15:05:10', '0000-00-00 00:00:00', '8020803585'),
(6, 'jk', ',mm.', 'ade@gmail.com', 'johndoe', '5f4dcc3b5aa765d61d8327deb882cf99', '', '2016-09-14 17:37:43', '0000-00-00 00:00:00', '8020803585'),
(7, 'Homebuds', 'Doe', 'ade@gmail.com', 'johndoe', '5f4dcc3b5aa765d61d8327deb882cf99', '', '2016-09-14 17:39:14', '0000-00-00 00:00:00', '8099797979'),
(8, 'Homebuds', 'Doe', 'ade@gmail.com', 'johndoe', '5f4dcc3b5aa765d61d8327deb882cf99', '', '2016-09-14 17:39:52', '0000-00-00 00:00:00', '8099797979');

-- --------------------------------------------------------

--
-- Table structure for table `advert`
--

CREATE TABLE `advert` (
  `advert_id` int(11) NOT NULL,
  `advert_title` varchar(100) NOT NULL,
  `advert_type` varchar(15) NOT NULL,
  `advert_content` varchar(5000) NOT NULL,
  `advert_position` varchar(20) NOT NULL,
  `advert_date_added` datetime NOT NULL,
  `advert_deleted` int(11) NOT NULL,
  `advert_activated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `business_id` int(11) NOT NULL,
  `business_name` varchar(100) NOT NULL,
  `business_description` varchar(500) NOT NULL,
  `business_email` varchar(50) NOT NULL,
  `business_phone` varchar(20) NOT NULL,
  `business_date_registered` datetime NOT NULL,
  `business_location_id` int(11) NOT NULL,
  `business_deleted` int(11) NOT NULL,
  `business_user_id` int(11) NOT NULL,
  `business_image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_slug` varchar(200) NOT NULL,
  `category_parent_id` int(11) NOT NULL,
  `category_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_slug`, `category_parent_id`, `category_image`) VALUES
(1, 'Automobile Services', 'automobile-services', 0, '1-Automobile_Services.png'),
(2, 'Beauty & Salon', 'beauty-salon', 0, '2_-_Beauty_Salon.jpg'),
(3, 'Make-Up & Cosmetics', 'make-up-cosmetics', 0, '3_-_Makeup_Cosmetics.jpg'),
(4, 'Technicians', 'technicians', 0, '4_-_Technicians.jpg'),
(5, 'Internet & Web', 'internet-web', 0, '5_-_Internet_Web.jpg'),
(6, 'Laundry & Cleaning', 'laundry-cleaning', 0, '6_-_Laundry_Cleaning.jpg'),
(7, 'Handy-Man Services', 'handy-man-services', 0, '7_-_HandyMan.jpg'),
(8, 'Mechanic', 'mechanic', 1, ''),
(9, 'Vulcanizer', 'vulcanizer', 1, ''),
(10, 'Car-Towing Services', 'car-towing-services', 1, ''),
(11, 'Beauty Spa', 'beauty-spa', 2, ''),
(12, 'Barber', 'barber', 2, ''),
(13, 'Hair Stylist', 'hair-stylist', 2, ''),
(14, 'Make-Up Artist', 'make-up-artist', 3, ''),
(15, 'Facialist', 'facialist', 3, ''),
(16, 'Beautician', 'beautician', 3, ''),
(17, 'Electrician', 'electrician', 4, ''),
(18, 'Computer Repairer', 'computer-repairer', 4, ''),
(19, 'Mobile Phone Repairer', 'mobile-phone-repairer', 4, ''),
(20, 'Website Designer', 'website-designer', 5, ''),
(21, 'Computer Consultant', 'computer-consultant', 5, ''),
(22, 'Blogger', 'blogger', 5, ''),
(23, 'Internet Researcher', 'internet-researcher', 5, ''),
(24, 'Graphic Designer', 'graphic-designer', 5, ''),
(25, 'Computer Programmer', 'computer-programmer', 5, ''),
(26, 'House Cleaning', 'house-cleaning', 6, ''),
(27, 'Dry Cleaner', 'dry-cleaner', 6, ''),
(28, 'Mobile Car-Wash', 'mobile-car-wash', 6, ''),
(29, 'Carpet-Cleaning', 'carpet-cleaning', 6, ''),
(30, 'Gardener', 'gardener', 6, ''),
(31, 'Pool Cleaning', 'pool-cleaning', 6, ''),
(32, 'Carpenter', 'carpenter', 7, ''),
(33, 'House Painter', 'house-painter', 7, ''),
(34, 'Shoe Cobbler', 'shoe-cobbler', 7, ''),
(35, 'Plumber', 'plumber', 7, ''),
(36, 'Business Services', 'business-services', 0, '8_-_Business_Services.jpg'),
(37, 'Events Management', 'events-management', 0, '9_-EventsParty_Management.jpg'),
(38, 'Travels & Tourism', 'travels-tourism', 0, '10_-_Travel_Tourism.jpg'),
(39, 'Personal Trainer', 'personal-trainer', 0, '11-_Personal_Trainer.jpg'),
(40, 'Children Services', 'children-services', 0, '12_-_Children_Services.jpg'),
(41, 'Freight Brokerage', 'freight-brokerage', 36, ''),
(42, 'Business Consultant', 'business-consultant', 36, ''),
(43, 'Ghost Writer', 'ghost-writer', 36, ''),
(44, 'Market Researcher', 'market-researcher', 36, ''),
(45, 'Public/Motivational Speaker', 'publicmotivational-speaker', 36, ''),
(46, 'Seminar Promoter', 'seminar-promoter', 36, ''),
(47, 'Copyright and Proofreader', 'copyright-and-proofreader', 36, ''),
(48, 'Photographer', 'photographer', 37, ''),
(49, 'Event Planner', 'event-planner', 37, ''),
(50, 'Engager', 'engager', 37, ''),
(51, 'Escort Services', 'escort-services', 37, ''),
(52, 'Funeral Planner (Undertakers)', 'funeral-planner-undertakers', 37, ''),
(53, 'MCs/Comedian/Comedienne', 'mcscomediancomedienne', 37, ''),
(54, 'Business Travel Manager', 'business-travel-manager', 38, ''),
(55, 'Travel Visa & Visa Services', 'travel-visa-visa-services', 38, ''),
(56, 'Car Rental Services', 'car-rental-services', 38, ''),
(57, 'Fitness Instructor', 'fitness-instructor', 39, ''),
(58, 'Self-Defense Instructor', 'self-defense-instructor', 39, ''),
(59, 'Music Tutor', 'music-tutor', 39, ''),
(60, 'Children''s Party Planner', 'childrens-party-planner', 40, ''),
(61, 'Party-Clowns', 'party-clowns', 40, ''),
(62, 'Nanny Placement', 'nanny-placement', 40, ''),
(63, 'Day-Care Services', 'day-care-services', 40, '');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`) VALUES
(1, 'Nigeria'),
(5, 'Ghana'),
(6, 'Liberia');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `image_id` int(11) NOT NULL,
  `image_name` varchar(200) NOT NULL,
  `image_type` varchar(50) NOT NULL,
  `image_size` varchar(20) NOT NULL,
  `image_dimension` varchar(20) NOT NULL,
  `image_url` varchar(500) NOT NULL,
  `image_title` varchar(200) NOT NULL,
  `image_caption` varchar(600) NOT NULL,
  `image_product_id` int(11) NOT NULL,
  `image_date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`image_id`, `image_name`, `image_type`, `image_size`, `image_dimension`, `image_url`, `image_title`, `image_caption`, `image_product_id`, `image_date_created`) VALUES
(1, 'contact-us.jpg', 'jpeg', '208.99', '1364 x 1144', 'C:/xampp/htdocs/classified/assets/images/uploads/contact-us.jpg', 'contact-us', '', 1, '2016-09-09 17:09:40');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `location_country_id` int(11) NOT NULL,
  `location_state_id` int(11) NOT NULL,
  `location_city` varchar(20) NOT NULL,
  `location_address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_country_id`, `location_state_id`, `location_city`, `location_address`) VALUES
(1, 1, 37, 'Garki', 'Area 11'),
(2, 1, 24, 'Gbagada', 'Somewhere in Gbagada, Lagos'),
(3, 1, 1, 'Akure', 'Ondo Road'),
(4, 1, 28, 'Akure', 'St Michael''s School, Oba Ile'),
(5, 1, 23, 'Ilorin', '19A Museum Road, GRA Opp Broadway Hotel, Ilorin'),
(6, 5, 41, 'Illuba', 'Kwesi Village');

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `mail_id` int(11) NOT NULL,
  `mail_sender_id` int(11) DEFAULT NULL,
  `mail_receiver_id` int(11) NOT NULL,
  `mail_title` varchar(100) NOT NULL,
  `mail_content` varchar(5000) NOT NULL,
  `mail_parent_id` int(11) NOT NULL,
  `mail_read` int(11) NOT NULL,
  `mail_deleted` int(11) NOT NULL,
  `mail_date_sent` datetime NOT NULL,
  `mail_sender_name` varchar(100) NOT NULL,
  `mail_sender_email` varchar(50) NOT NULL,
  `mail_sender_phone` varchar(30) NOT NULL,
  `mail_product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `total_price` double NOT NULL,
  `amount_paid` double NOT NULL,
  `amount_credited` double NOT NULL,
  `merchant_ref` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `method` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `used` int(11) NOT NULL,
  `date_used` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `transaction_id`, `total_price`, `amount_paid`, `amount_credited`, `merchant_ref`, `status`, `date`, `method`, `user_id`, `used`, `date_used`) VALUES
(1, '57daa8eae18dc', 1000, 1000, 990, '1', 'Cancelled', '2016-09-15 14:58:17', 'VoguePay', 1, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_description` varchar(5000) NOT NULL,
  `product_price` double NOT NULL,
  `product_slug` varchar(400) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_location_id` int(11) NOT NULL,
  `product_user_id` int(11) NOT NULL,
  `product_date_posted` datetime NOT NULL,
  `product_deleted` int(11) NOT NULL,
  `product_views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_description`, `product_price`, `product_slug`, `product_category_id`, `product_location_id`, `product_user_id`, `product_date_posted`, `product_deleted`, `product_views`) VALUES
(1, 'Classified Ads', 'Get a very nice classified website for free', 0, 'classified-ads', 25, 3, 1, '2016-09-09 17:09:40', 0, 3),
(2, 'Example Ad', 'Descr', 0, 'example-ad', 15, 3, 1, '2016-10-06 03:12:40', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(50) NOT NULL,
  `state_country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`, `state_country_id`) VALUES
(1, 'Abia', 1),
(2, 'Adamawa', 1),
(3, 'Akwa Ibom', 1),
(4, 'Anambra', 1),
(5, 'Bauchi', 1),
(6, 'Benue', 1),
(7, 'Borno', 1),
(8, 'Cross River', 1),
(9, 'Delta', 1),
(10, 'Gombe', 1),
(11, 'Enugu', 1),
(12, 'Bayelsa', 1),
(13, 'Ebonyi', 1),
(14, 'Edo', 1),
(15, 'Ekiti', 1),
(16, 'Imo', 1),
(17, 'Jigawa', 1),
(18, 'Kaduna', 1),
(19, 'Kano', 1),
(20, 'Katsina', 1),
(21, 'Kebbi', 1),
(22, 'Kogi', 1),
(23, 'Kwara', 1),
(24, 'Lagos', 1),
(25, 'Nasarawa', 1),
(26, 'Niger', 1),
(27, 'Ogun', 1),
(28, 'Ondo', 1),
(29, 'Osun', 1),
(30, 'Oyo', 1),
(31, 'Plateau', 1),
(32, 'Rivers', 1),
(33, 'Sokoto', 1),
(34, 'Taraba', 1),
(35, 'Yobe', 1),
(36, 'Zamfara', 1),
(37, 'FCT', 1),
(39, 'Pako', 2),
(40, 'Belina', 2),
(41, 'KWESI', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_firstname` varchar(30) NOT NULL,
  `user_lastname` varchar(30) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_password` varchar(300) NOT NULL,
  `user_phone` varchar(20) NOT NULL,
  `user_date_registered` datetime NOT NULL,
  `user_location_id` int(11) NOT NULL,
  `user_deleted` int(11) NOT NULL,
  `user_account_type` varchar(20) NOT NULL,
  `user_account_boost_date` datetime NOT NULL,
  `user_date_activated` datetime NOT NULL,
  `user_status` varchar(20) NOT NULL,
  `user_date_last_logged_in` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_firstname`, `user_lastname`, `user_email`, `user_username`, `user_password`, `user_phone`, `user_date_registered`, `user_location_id`, `user_deleted`, `user_account_type`, `user_account_boost_date`, `user_date_activated`, `user_status`, `user_date_last_logged_in`) VALUES
(1, 'John', 'Doe', 'johndoe@gmail.com', 'johndoe', '5f4dcc3b5aa765d61d8327deb882cf99', '08102937011', '2016-06-17 13:51:32', 3, 0, '1', '0000-00-00 00:00:00', '2016-07-16 19:48:31', '1', '2016-10-06 03:11:57'),
(2, 'Adebayo', 'Kayode', 'billgates@gmail.com', 'billgates', '5f4dcc3b5aa765d61d8327deb882cf99', '08034275409', '2016-06-17 14:35:32', 2, 0, '2', '0000-00-00 00:00:00', '2016-06-17 14:37:01', '1', '2016-07-14 04:42:15'),
(3, 'Adebayo', 'Kayode', 'adelekeoladapo@gmail.com', 'adelekeoladapo', '99a802c30403fe2d623d1a17eb36a702', '08034275409', '2016-07-11 13:34:38', 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(4, 'Adebayo', 'Kayode', 'joke@gmail.com', 'joke', '5f4dcc3b5aa765d61d8327deb882cf99', '08034275409', '2016-07-16 13:16:12', 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(5, 'Adebayo', 'Kayode', 'aaa@ckk.ccc', 'johndoed', '5f4dcc3b5aa765d61d8327deb882cf99', '08034275409', '2016-07-16 19:35:27', 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(6, 'Obagaye', 'Oluwabusola', '60bitts@gmail.com', 'oluwabusola', 'dbfb4558d59a7600aab407e16375db21', '08034275409', '2016-08-02 08:00:16', 4, 0, '2', '0000-00-00 00:00:00', '2016-08-02 08:01:46', '1', '2016-09-02 06:00:43'),
(7, 'Elijah', 'Morakinyo', 'keycomonline23@gmail.com', 'keycomon123', '8eda5463c53f1faf88b845d3368e49c5', '07065159767', '2016-08-07 06:38:42', 5, 0, '2', '0000-00-00 00:00:00', '2016-08-07 06:42:22', '1', '2016-08-17 05:25:00'),
(8, 'Akin', 'Magneto', 'akinmagnetoinc2015@gmail.com', 'akinmagneto', '8eda5463c53f1faf88b845d3368e49c5', '07078654332', '2016-08-09 02:23:11', 6, 0, '2', '0000-00-00 00:00:00', '2016-08-09 02:33:59', '1', '2016-08-31 09:11:40'),
(9, 'Dolapo', 'Ibikunle', 'keyonline775@yahoo.com', 'DolapoIbikunle', 'd78bc37f8ba8a5a8f6e4cab2ecad2e3a', '', '2016-08-31 10:08:53', 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '2016-08-31 10:23:02');

-- --------------------------------------------------------

--
-- Table structure for table `visit`
--

CREATE TABLE `visit` (
  `visit_id` int(11) NOT NULL,
  `visit_time` datetime NOT NULL,
  `visit_url` varchar(200) NOT NULL,
  `visit_referrer` varchar(200) NOT NULL,
  `visit_device` varchar(100) NOT NULL,
  `visit_browser` varchar(100) NOT NULL,
  `visit_product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_location`
--
CREATE TABLE `v_location` (
`location_id` int(11)
,`location_country_id` int(11)
,`location_state_id` int(11)
,`location_city` varchar(20)
,`location_address` varchar(200)
,`state_id` int(11)
,`state_name` varchar(50)
,`state_country_id` int(11)
,`country_id` int(11)
,`country_name` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_payment`
--
CREATE TABLE `v_payment` (
`payment_id` int(11)
,`transaction_id` varchar(50)
,`total_price` double
,`amount_paid` double
,`amount_credited` double
,`merchant_ref` varchar(20)
,`status` varchar(50)
,`date` datetime
,`method` varchar(30)
,`user_id` int(11)
,`used` int(11)
,`date_used` datetime
,`user_firstname` varchar(30)
,`user_lastname` varchar(30)
,`user_email` varchar(50)
,`user_phone` varchar(20)
,`user_account_type` varchar(20)
,`user_account_boost_date` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_product`
--
CREATE TABLE `v_product` (
`product_id` int(11)
,`product_name` varchar(50)
,`product_description` varchar(5000)
,`product_price` double
,`product_slug` varchar(400)
,`product_category_id` int(11)
,`product_location_id` int(11)
,`product_user_id` int(11)
,`product_date_posted` datetime
,`product_deleted` int(11)
,`product_views` int(11)
,`category_id` int(11)
,`category_name` varchar(50)
,`category_slug` varchar(200)
,`category_parent_id` int(11)
,`location_id` int(11)
,`location_country_id` int(11)
,`location_state_id` int(11)
,`location_city` varchar(20)
,`location_address` varchar(200)
,`state_id` int(11)
,`state_name` varchar(50)
,`state_country_id` int(11)
,`country_id` int(11)
,`country_name` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_user`
--
CREATE TABLE `v_user` (
`user_id` int(11)
,`user_firstname` varchar(30)
,`user_lastname` varchar(30)
,`user_email` varchar(50)
,`user_username` varchar(50)
,`user_password` varchar(300)
,`user_phone` varchar(20)
,`user_date_registered` datetime
,`user_location_id` int(11)
,`user_deleted` int(11)
,`user_account_type` varchar(20)
,`user_account_boost_date` datetime
,`user_date_activated` datetime
,`user_status` varchar(20)
,`user_date_last_logged_in` datetime
,`location_id` int(11)
,`location_country_id` int(11)
,`location_state_id` int(11)
,`location_city` varchar(20)
,`location_address` varchar(200)
,`state_id` int(11)
,`state_name` varchar(50)
,`state_country_id` int(11)
,`country_id` int(11)
,`country_name` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `v_location`
--
DROP TABLE IF EXISTS `v_location`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_location`  AS  select `location`.`location_id` AS `location_id`,`location`.`location_country_id` AS `location_country_id`,`location`.`location_state_id` AS `location_state_id`,`location`.`location_city` AS `location_city`,`location`.`location_address` AS `location_address`,`state`.`state_id` AS `state_id`,`state`.`state_name` AS `state_name`,`state`.`state_country_id` AS `state_country_id`,`country`.`country_id` AS `country_id`,`country`.`country_name` AS `country_name` from ((`location` join `state` on((`location`.`location_state_id` = `state`.`state_id`))) join `country`) where (`location`.`location_country_id` = `country`.`country_id`) ;

-- --------------------------------------------------------

--
-- Structure for view `v_payment`
--
DROP TABLE IF EXISTS `v_payment`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_payment`  AS  select `payment`.`payment_id` AS `payment_id`,`payment`.`transaction_id` AS `transaction_id`,`payment`.`total_price` AS `total_price`,`payment`.`amount_paid` AS `amount_paid`,`payment`.`amount_credited` AS `amount_credited`,`payment`.`merchant_ref` AS `merchant_ref`,`payment`.`status` AS `status`,`payment`.`date` AS `date`,`payment`.`method` AS `method`,`payment`.`user_id` AS `user_id`,`payment`.`used` AS `used`,`payment`.`date_used` AS `date_used`,`user`.`user_firstname` AS `user_firstname`,`user`.`user_lastname` AS `user_lastname`,`user`.`user_email` AS `user_email`,`user`.`user_phone` AS `user_phone`,`user`.`user_account_type` AS `user_account_type`,`user`.`user_account_boost_date` AS `user_account_boost_date` from (`payment` join `user` on((`payment`.`user_id` = `user`.`user_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_product`
--
DROP TABLE IF EXISTS `v_product`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_product`  AS  select `product`.`product_id` AS `product_id`,`product`.`product_name` AS `product_name`,`product`.`product_description` AS `product_description`,`product`.`product_price` AS `product_price`,`product`.`product_slug` AS `product_slug`,`product`.`product_category_id` AS `product_category_id`,`product`.`product_location_id` AS `product_location_id`,`product`.`product_user_id` AS `product_user_id`,`product`.`product_date_posted` AS `product_date_posted`,`product`.`product_deleted` AS `product_deleted`,`product`.`product_views` AS `product_views`,`category`.`category_id` AS `category_id`,`category`.`category_name` AS `category_name`,`category`.`category_slug` AS `category_slug`,`category`.`category_parent_id` AS `category_parent_id`,`v_location`.`location_id` AS `location_id`,`v_location`.`location_country_id` AS `location_country_id`,`v_location`.`location_state_id` AS `location_state_id`,`v_location`.`location_city` AS `location_city`,`v_location`.`location_address` AS `location_address`,`v_location`.`state_id` AS `state_id`,`v_location`.`state_name` AS `state_name`,`v_location`.`state_country_id` AS `state_country_id`,`v_location`.`country_id` AS `country_id`,`v_location`.`country_name` AS `country_name` from ((`product` join `category` on((`product`.`product_category_id` = `category`.`category_id`))) join `v_location` on((`product`.`product_location_id` = `v_location`.`location_id`))) where (`product`.`product_deleted` = 0) ;

-- --------------------------------------------------------

--
-- Structure for view `v_user`
--
DROP TABLE IF EXISTS `v_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_user`  AS  select `user`.`user_id` AS `user_id`,`user`.`user_firstname` AS `user_firstname`,`user`.`user_lastname` AS `user_lastname`,`user`.`user_email` AS `user_email`,`user`.`user_username` AS `user_username`,`user`.`user_password` AS `user_password`,`user`.`user_phone` AS `user_phone`,`user`.`user_date_registered` AS `user_date_registered`,`user`.`user_location_id` AS `user_location_id`,`user`.`user_deleted` AS `user_deleted`,`user`.`user_account_type` AS `user_account_type`,`user`.`user_account_boost_date` AS `user_account_boost_date`,`user`.`user_date_activated` AS `user_date_activated`,`user`.`user_status` AS `user_status`,`user`.`user_date_last_logged_in` AS `user_date_last_logged_in`,`location`.`location_id` AS `location_id`,`location`.`location_country_id` AS `location_country_id`,`location`.`location_state_id` AS `location_state_id`,`location`.`location_city` AS `location_city`,`location`.`location_address` AS `location_address`,`state`.`state_id` AS `state_id`,`state`.`state_name` AS `state_name`,`state`.`state_country_id` AS `state_country_id`,`country`.`country_id` AS `country_id`,`country`.`country_name` AS `country_name` from (((`user` join `location` on((`user`.`user_location_id` = `location`.`location_id`))) join `state` on((`location`.`location_state_id` = `state`.`state_id`))) join `country` on((`location`.`location_country_id` = `country`.`country_id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `advert`
--
ALTER TABLE `advert`
  ADD PRIMARY KEY (`advert_id`);

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`business_id`),
  ADD KEY `business_id` (`business_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`mail_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `visit`
--
ALTER TABLE `visit`
  ADD PRIMARY KEY (`visit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `advert`
--
ALTER TABLE `advert`
  MODIFY `advert_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `business_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `mail_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `visit`
--
ALTER TABLE `visit`
  MODIFY `visit_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Sep 05, 2016 at 04:17 AM
-- Server version: 5.6.28-76.1-log
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `homebuds_homebuds`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`homebuds`@`localhost` PROCEDURE `updateProductView`(IN `productID` INT)
    NO SQL
UPDATE product SET product_views = product_views + 1 WHERE product_id = productID$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_firstname` varchar(30) NOT NULL,
  `admin_lastname` varchar(30) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_username` varchar(30) NOT NULL,
  `admin_password` varchar(200) NOT NULL,
  `admin_privilege` varchar(20) NOT NULL,
  `admin_date_added` datetime NOT NULL,
  `admin_last_loged_in` datetime NOT NULL,
  `admin_phone` varchar(20) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_firstname`, `admin_lastname`, `admin_email`, `admin_username`, `admin_password`, `admin_privilege`, `admin_date_added`, `admin_last_loged_in`, `admin_phone`) VALUES
(1, 'Super', 'Admin', 'admin@admin.com', 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `advert`
--

CREATE TABLE IF NOT EXISTS `advert` (
  `advert_id` int(11) NOT NULL AUTO_INCREMENT,
  `advert_title` varchar(100) NOT NULL,
  `advert_type` varchar(15) NOT NULL,
  `advert_content` varchar(5000) NOT NULL,
  `advert_position` varchar(20) NOT NULL,
  `advert_date_added` datetime NOT NULL,
  `advert_deleted` int(11) NOT NULL,
  `advert_activated` int(11) NOT NULL,
  PRIMARY KEY (`advert_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE IF NOT EXISTS `business` (
  `business_id` int(11) NOT NULL AUTO_INCREMENT,
  `business_name` varchar(100) NOT NULL,
  `business_description` varchar(500) NOT NULL,
  `business_email` varchar(50) NOT NULL,
  `business_phone` varchar(20) NOT NULL,
  `business_date_registered` datetime NOT NULL,
  `business_location_id` int(11) NOT NULL,
  `business_deleted` int(11) NOT NULL,
  `business_user_id` int(11) NOT NULL,
  `business_image_id` int(11) NOT NULL,
  PRIMARY KEY (`business_id`),
  KEY `business_id` (`business_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  `category_slug` varchar(200) NOT NULL,
  `category_parent_id` int(11) NOT NULL,
  `category_image` varchar(100) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

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

CREATE TABLE IF NOT EXISTS `country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(50) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

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

CREATE TABLE IF NOT EXISTS `image` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(200) NOT NULL,
  `image_type` varchar(50) NOT NULL,
  `image_size` varchar(20) NOT NULL,
  `image_dimension` varchar(20) NOT NULL,
  `image_url` varchar(500) NOT NULL,
  `image_title` varchar(200) NOT NULL,
  `image_caption` varchar(600) NOT NULL,
  `image_product_id` int(11) NOT NULL,
  `image_date_created` datetime NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `location_country_id` int(11) NOT NULL,
  `location_state_id` int(11) NOT NULL,
  `location_city` varchar(20) NOT NULL,
  `location_address` varchar(200) NOT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

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

CREATE TABLE IF NOT EXISTS `mail` (
  `mail_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `mail_product_id` int(11) NOT NULL,
  PRIMARY KEY (`mail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_user_id` int(11) NOT NULL,
  `payment_token` varchar(100) NOT NULL,
  `payment_amount` double NOT NULL,
  `payment_date` datetime NOT NULL,
  `payment_expired` int(11) NOT NULL,
  `payment_code` varchar(50) NOT NULL,
  `payment_confirmed` int(11) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_user_id`, `payment_token`, `payment_amount`, `payment_date`, `payment_expired`, `payment_code`, `payment_confirmed`) VALUES
(1, 6, 'tk_AiqvqCkXCn89EAz5DyVqYL', 1000, '2016-08-10 18:41:02', 0, 'HB-UYK9Q94D18E', 1),
(2, 8, 'tk_VuxWJcVZXehwTduEvAExp5', 1000, '2016-08-11 15:08:16', 0, 'HB-3LTDK4YMF69', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50) NOT NULL,
  `product_description` varchar(5000) NOT NULL,
  `product_price` double NOT NULL,
  `product_slug` varchar(400) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_location_id` int(11) NOT NULL,
  `product_user_id` int(11) NOT NULL,
  `product_date_posted` datetime NOT NULL,
  `product_deleted` int(11) NOT NULL,
  `product_views` int(11) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(50) NOT NULL,
  `state_country_id` int(11) NOT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

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

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `user_date_activated` datetime NOT NULL,
  `user_status` varchar(20) NOT NULL,
  `user_date_last_logged_in` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_firstname`, `user_lastname`, `user_email`, `user_username`, `user_password`, `user_phone`, `user_date_registered`, `user_location_id`, `user_deleted`, `user_account_type`, `user_date_activated`, `user_status`, `user_date_last_logged_in`) VALUES
(1, 'John', 'Doe', 'johndoe@gmail.com', 'johndoe', '5f4dcc3b5aa765d61d8327deb882cf99', '08102937011', '2016-06-17 13:51:32', 3, 0, '1', '2016-07-16 19:48:31', '1', '2016-08-12 09:34:19'),
(2, 'Adebayo', 'Kayode', 'billgates@gmail.com', 'billgates', '5f4dcc3b5aa765d61d8327deb882cf99', '08034275409', '2016-06-17 14:35:32', 2, 0, '2', '2016-06-17 14:37:01', '1', '2016-07-14 04:42:15'),
(3, 'Adebayo', 'Kayode', 'adelekeoladapo@gmail.com', 'adelekeoladapo', '99a802c30403fe2d623d1a17eb36a702', '08034275409', '2016-07-11 13:34:38', 0, 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(4, 'Adebayo', 'Kayode', 'joke@gmail.com', 'joke', '5f4dcc3b5aa765d61d8327deb882cf99', '08034275409', '2016-07-16 13:16:12', 0, 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(5, 'Adebayo', 'Kayode', 'aaa@ckk.ccc', 'johndoed', '5f4dcc3b5aa765d61d8327deb882cf99', '08034275409', '2016-07-16 19:35:27', 0, 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(6, 'Obagaye', 'Oluwabusola', '60bitts@gmail.com', 'oluwabusola', 'dbfb4558d59a7600aab407e16375db21', '08034275409', '2016-08-02 08:00:16', 4, 0, '2', '2016-08-02 08:01:46', '1', '2016-09-02 06:00:43'),
(7, 'Elijah', 'Morakinyo', 'keycomonline23@gmail.com', 'keycomon123', '8eda5463c53f1faf88b845d3368e49c5', '07065159767', '2016-08-07 06:38:42', 5, 0, '2', '2016-08-07 06:42:22', '1', '2016-08-17 05:25:00'),
(8, 'Akin', 'Magneto', 'akinmagnetoinc2015@gmail.com', 'akinmagneto', '8eda5463c53f1faf88b845d3368e49c5', '07078654332', '2016-08-09 02:23:11', 6, 0, '2', '2016-08-09 02:33:59', '1', '2016-08-31 09:11:40'),
(9, 'Dolapo', 'Ibikunle', 'keyonline775@yahoo.com', 'DolapoIbikunle', 'd78bc37f8ba8a5a8f6e4cab2ecad2e3a', '', '2016-08-31 10:08:53', 0, 0, '', '0000-00-00 00:00:00', '', '2016-08-31 10:23:02');

-- --------------------------------------------------------

--
-- Table structure for table `visit`
--

CREATE TABLE IF NOT EXISTS `visit` (
  `visit_id` int(11) NOT NULL AUTO_INCREMENT,
  `visit_time` datetime NOT NULL,
  `visit_url` varchar(200) NOT NULL,
  `visit_referrer` varchar(200) NOT NULL,
  `visit_device` varchar(100) NOT NULL,
  `visit_browser` varchar(100) NOT NULL,
  `visit_product_id` int(11) NOT NULL,
  PRIMARY KEY (`visit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_location`
--
CREATE TABLE IF NOT EXISTS `v_location` (
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
CREATE TABLE IF NOT EXISTS `v_payment` (
`payment_id` int(11)
,`payment_user_id` int(11)
,`payment_token` varchar(100)
,`payment_amount` double
,`payment_date` datetime
,`payment_expired` int(11)
,`payment_code` varchar(50)
,`payment_confirmed` int(11)
,`user_id` int(11)
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
,`user_date_activated` datetime
,`user_status` varchar(20)
,`user_date_last_logged_in` datetime
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `v_product`
--
CREATE TABLE IF NOT EXISTS `v_product` (
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
CREATE TABLE IF NOT EXISTS `v_user` (
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

CREATE ALGORITHM=UNDEFINED DEFINER=`homebuds`@`localhost` SQL SECURITY DEFINER VIEW `v_location` AS select `location`.`location_id` AS `location_id`,`location`.`location_country_id` AS `location_country_id`,`location`.`location_state_id` AS `location_state_id`,`location`.`location_city` AS `location_city`,`location`.`location_address` AS `location_address`,`state`.`state_id` AS `state_id`,`state`.`state_name` AS `state_name`,`state`.`state_country_id` AS `state_country_id`,`country`.`country_id` AS `country_id`,`country`.`country_name` AS `country_name` from ((`location` join `state` on((`location`.`location_state_id` = `state`.`state_id`))) join `country`) where (`location`.`location_country_id` = `country`.`country_id`);

-- --------------------------------------------------------

--
-- Structure for view `v_payment`
--
DROP TABLE IF EXISTS `v_payment`;

CREATE ALGORITHM=UNDEFINED DEFINER=`homebuds`@`localhost` SQL SECURITY DEFINER VIEW `v_payment` AS select `payment`.`payment_id` AS `payment_id`,`payment`.`payment_user_id` AS `payment_user_id`,`payment`.`payment_token` AS `payment_token`,`payment`.`payment_amount` AS `payment_amount`,`payment`.`payment_date` AS `payment_date`,`payment`.`payment_expired` AS `payment_expired`,`payment`.`payment_code` AS `payment_code`,`payment`.`payment_confirmed` AS `payment_confirmed`,`user`.`user_id` AS `user_id`,`user`.`user_firstname` AS `user_firstname`,`user`.`user_lastname` AS `user_lastname`,`user`.`user_email` AS `user_email`,`user`.`user_username` AS `user_username`,`user`.`user_password` AS `user_password`,`user`.`user_phone` AS `user_phone`,`user`.`user_date_registered` AS `user_date_registered`,`user`.`user_location_id` AS `user_location_id`,`user`.`user_deleted` AS `user_deleted`,`user`.`user_account_type` AS `user_account_type`,`user`.`user_date_activated` AS `user_date_activated`,`user`.`user_status` AS `user_status`,`user`.`user_date_last_logged_in` AS `user_date_last_logged_in` from (`payment` join `user` on((`payment`.`payment_user_id` = `user`.`user_id`)));

-- --------------------------------------------------------

--
-- Structure for view `v_product`
--
DROP TABLE IF EXISTS `v_product`;

CREATE ALGORITHM=UNDEFINED DEFINER=`homebuds`@`localhost` SQL SECURITY DEFINER VIEW `v_product` AS select `product`.`product_id` AS `product_id`,`product`.`product_name` AS `product_name`,`product`.`product_description` AS `product_description`,`product`.`product_price` AS `product_price`,`product`.`product_slug` AS `product_slug`,`product`.`product_category_id` AS `product_category_id`,`product`.`product_location_id` AS `product_location_id`,`product`.`product_user_id` AS `product_user_id`,`product`.`product_date_posted` AS `product_date_posted`,`product`.`product_deleted` AS `product_deleted`,`product`.`product_views` AS `product_views`,`category`.`category_id` AS `category_id`,`category`.`category_name` AS `category_name`,`category`.`category_slug` AS `category_slug`,`category`.`category_parent_id` AS `category_parent_id`,`v_location`.`location_id` AS `location_id`,`v_location`.`location_country_id` AS `location_country_id`,`v_location`.`location_state_id` AS `location_state_id`,`v_location`.`location_city` AS `location_city`,`v_location`.`location_address` AS `location_address`,`v_location`.`state_id` AS `state_id`,`v_location`.`state_name` AS `state_name`,`v_location`.`state_country_id` AS `state_country_id`,`v_location`.`country_id` AS `country_id`,`v_location`.`country_name` AS `country_name` from ((`product` join `category` on((`product`.`product_category_id` = `category`.`category_id`))) join `v_location` on((`product`.`product_location_id` = `v_location`.`location_id`))) where (`product`.`product_deleted` = 0);

-- --------------------------------------------------------

--
-- Structure for view `v_user`
--
DROP TABLE IF EXISTS `v_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`homebuds`@`localhost` SQL SECURITY DEFINER VIEW `v_user` AS select `user`.`user_id` AS `user_id`,`user`.`user_firstname` AS `user_firstname`,`user`.`user_lastname` AS `user_lastname`,`user`.`user_email` AS `user_email`,`user`.`user_username` AS `user_username`,`user`.`user_password` AS `user_password`,`user`.`user_phone` AS `user_phone`,`user`.`user_date_registered` AS `user_date_registered`,`user`.`user_location_id` AS `user_location_id`,`user`.`user_deleted` AS `user_deleted`,`user`.`user_account_type` AS `user_account_type`,`user`.`user_date_activated` AS `user_date_activated`,`user`.`user_status` AS `user_status`,`user`.`user_date_last_logged_in` AS `user_date_last_logged_in`,`location`.`location_id` AS `location_id`,`location`.`location_country_id` AS `location_country_id`,`location`.`location_state_id` AS `location_state_id`,`location`.`location_city` AS `location_city`,`location`.`location_address` AS `location_address`,`state`.`state_id` AS `state_id`,`state`.`state_name` AS `state_name`,`state`.`state_country_id` AS `state_country_id`,`country`.`country_id` AS `country_id`,`country`.`country_name` AS `country_name` from (((`user` join `location` on((`user`.`user_location_id` = `location`.`location_id`))) join `state` on((`location`.`location_state_id` = `state`.`state_id`))) join `country` on((`location`.`location_country_id` = `country`.`country_id`)));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

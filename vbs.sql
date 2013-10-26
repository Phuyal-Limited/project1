-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 24, 2013 at 08:20 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gcesproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_name` text NOT NULL,
  `ISBN_10` text NOT NULL,
  `ISBN_13` text NOT NULL,
  `authors` text NOT NULL COMMENT 'seperated by comma',
  `description` text NOT NULL,
  `category_id` text NOT NULL COMMENT 'id seperated by comma',
  `publisher` text NOT NULL,
  `image_id` int(11) NOT NULL,
  `language` text NOT NULL,
  `weight` double NOT NULL,
  `delivery_cost_within_city` int(11) NOT NULL,
  `delivery_cost_outof_city` int(11) NOT NULL,
  `published_date` date NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `ISBN_10`, `ISBN_13`, `authors`, `description`, `category_id`, `publisher`, `image_id`, `language`, `weight`, `delivery_cost_within_city`, `delivery_cost_outof_city`, `published_date`) VALUES
(1, 'What Is Contemporary Art?', '0-226-76430-3', '978-0-226-76430-6', 'Terry Smith', 'Terry Smith is the Andrew W. Mellon Professor.', '1, 19', 'The University of Chicago Press', 1, 'English', 0, 15, 75, '2013-10-22');

-- --------------------------------------------------------

--
-- Table structure for table `bookshop`
--

CREATE TABLE IF NOT EXISTS `bookshop` (
  `shop_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `phone` text NOT NULL,
  `specialization` text NOT NULL,
  `image` int(11) NOT NULL,
  `description` text NOT NULL,
  `delivery_cost_within_city` int(11) NOT NULL,
  `delivery_cost_outof_city` int(11) NOT NULL,
  PRIMARY KEY (`shop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cart_books`
--

CREATE TABLE IF NOT EXISTS `cart_books` (
  `cart_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`) VALUES
(1, 'Arts'),
(2, 'Biographies'),
(3, 'Business & Investing'),
(4, 'Children''s Book'),
(5, 'Comics'),
(6, 'Computers & Technology'),
(7, 'Cookbooks'),
(8, 'Hobbies'),
(9, 'Education & School Books'),
(10, 'Foreign Language Books'),
(11, 'Health & Fitness'),
(12, 'History'),
(13, 'Humor & Entertainment'),
(14, 'Literature & Fiction'),
(15, 'Medicine'),
(16, 'Mystery & suspense'),
(17, 'Nonfiction'),
(18, 'Parenting & Relationships'),
(19, 'Politics & Social Sciences'),
(20, 'Professional & Technical'),
(21, 'Religion & Spirituality'),
(22, 'Romance'),
(23, 'Sports'),
(24, 'Travel');

-- --------------------------------------------------------

--
-- Table structure for table `guest_customer`
--

CREATE TABLE IF NOT EXISTS `guest_customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `path` text NOT NULL,
  `alt` text NOT NULL,
  `system_image` tinyint(1) NOT NULL,
  `shared` int(11) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `name`, `path`, `alt`, `system_image`, `shared`) VALUES
(1, 'What is Contemporary Art?', 'assets/img/1.jpg', 'What is Contemporary Art?', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `registered_customer` tinyint(1) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `delivery_address` text NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `registered_customer`
--

CREATE TABLE IF NOT EXISTS `registered_customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `saved_cart`
--

CREATE TABLE IF NOT EXISTS `saved_cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `registered_customer` tinyint(1) NOT NULL,
  `cart_name` text NOT NULL,
  `update_date` date NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shopstock`
--

CREATE TABLE IF NOT EXISTS `shopstock` (
  `stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `store` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `item_no_for_store_ref` text NOT NULL,
  `description` text NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`stock_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `profile_id` int(11) NOT NULL,
  `access_right` int(11) NOT NULL,
  `suspended` tinyint(1) NOT NULL,
  `name` text NOT NULL,
  `avatar` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `password`, `email`, `profile_id`, `access_right`, `suspended`, `name`, `avatar`) VALUES
(1, 'admin', 'admin', 'admin@genesesofts.com', 3, 1, 0, 'Genese', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

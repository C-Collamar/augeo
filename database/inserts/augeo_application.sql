-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2018 at 06:13 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `augeo_application`
--

--
-- Dumping data for table `bid`
--

INSERT INTO `bid` (`bid_id`, `user_id`, `item_id`, `amount`, `timestamp`) VALUES
(1, 2, 1, '7.00', '2018-02-24 03:24:50');

--
-- Dumping data for table `tagged_item`
--

INSERT INTO `tagged_item` (`tagged_item_id`, `tag_id`, `item_id`) VALUES
(1, 2, 1),
(2, 1, 1),
(36, 19, 17),
(37, 23, 17),
(38, 25, 18),
(39, 27, 18),
(40, 24, 18),
(41, 26, 18);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

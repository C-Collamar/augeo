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
-- Database: `augeo_user_end`
--

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `user_id`, `name`, `description`, `initial_price`, `bid_interval`, `view_count`, `timestamp`, `state`) VALUES
(1, 1, 'Xbox 360', 'A home 250GB slim game console developed by Microsoft. As the successor to the original Xbox, it is the second console in the Xbox series nd it\'s super fun to play with.', 5, 5, 0, '2018-01-10 14:53:45', 0),
(17, 1, 'Title 1', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusamus, sapiente.', 10, 5, 0, '2018-03-02 04:33:11', 0),
(18, 1, '&apos;Git out&apos; Poster', 'Audience: For programmers\r\nMaterial: Bond paper\r\nSize: 11 x 13 inch', 15, 10, 0, '2018-03-02 07:37:18', 0);

--
-- Dumping data for table `item_img`
--

INSERT INTO `item_img` (`img_id`, `item_id`, `img_path`) VALUES
(1, 1, 'http://localhost/augeo/data/user/items/1_0.jpg'),
(2, 1, 'http://localhost/augeo/data/user/items/1_1.jpg'),
(3, 1, 'http://localhost/augeo/data/user/items/1_2.jpg'),
(4, 17, 'http://localhost/augeo/data/user/items/17_0.jpg'),
(5, 17, 'http://localhost/augeo/data/user/items/17_1.jpg'),
(6, 18, 'http://localhost/augeo/data/user/items/18_0.jpg');

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`tag_id`, `tag_name`) VALUES
(25, 'funny'),
(2, 'gaming'),
(27, 'git'),
(24, 'meme'),
(26, 'poster'),
(19, 'tag1'),
(23, 'tag2'),
(1, 'xbox');

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `account_id`, `f_name`, `m_name`, `l_name`, `sex`, `bdate`, `zip_code`, `full_address`, `contact_no`, `email`, `profile_img`, `cover_photo`) VALUES
(1, 1, 'Christian', 'Amaranto', 'Collamar', 0, '1998-04-03', '4513', '253 M.L. Quezon Street', '+639876543210', 'christian.collamar@bicol-u.edu.ph', '1.jpg', '1.jpg'),
(2, 2, 'Fname1', 'Mname1', 'Lname1', 0, '1996-08-13', '4065', 'Purok 5\r\nSalvacion, Panabo City', '+638394655901', 'Fname1@example.com', 'user_1.jpg', NULL);

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`account_id`, `username`, `password`, `state`) VALUES
(1, 'user0', 'f78b23d991e1824fabcd6ef5d3fc2c03', 1),
(2, 'user1', '87f5e873e4cc3ebaed6f289303417020', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

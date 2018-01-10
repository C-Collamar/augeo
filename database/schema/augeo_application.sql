-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2018 at 03:20 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `bid_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blocked_bidder`
--

CREATE TABLE `blocked_bidder` (
  `blocked_bidder_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deal`
--

CREATE TABLE `deal` (
  `deal_id` int(11) NOT NULL,
  `bid_id` int(11) NOT NULL,
  `confirmation` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 if confirmed; 0 otherwise',
  `due_date` datetime NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tagged_item`
--

CREATE TABLE `tagged_item` (
  `tagged_item_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_logtime`
--

CREATE TABLE `user_logtime` (
  `logtime_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `logout_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `viewed_tag`
--

CREATE TABLE `viewed_tag` (
  `view_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Used for creating better user preference model';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`bid_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `blocked_bidder`
--
ALTER TABLE `blocked_bidder`
  ADD PRIMARY KEY (`blocked_bidder_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `deal`
--
ALTER TABLE `deal`
  ADD PRIMARY KEY (`deal_id`),
  ADD KEY `bid_id` (`bid_id`);

--
-- Indexes for table `tagged_item`
--
ALTER TABLE `tagged_item`
  ADD PRIMARY KEY (`tagged_item_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `user_logtime`
--
ALTER TABLE `user_logtime`
  ADD PRIMARY KEY (`logtime_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `viewed_tag`
--
ALTER TABLE `viewed_tag`
  ADD PRIMARY KEY (`view_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bid`
--
ALTER TABLE `bid`
  MODIFY `bid_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `blocked_bidder`
--
ALTER TABLE `blocked_bidder`
  MODIFY `blocked_bidder_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `deal`
--
ALTER TABLE `deal`
  MODIFY `deal_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tagged_item`
--
ALTER TABLE `tagged_item`
  MODIFY `tagged_item_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_logtime`
--
ALTER TABLE `user_logtime`
  MODIFY `logtime_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `viewed_tag`
--
ALTER TABLE `viewed_tag`
  MODIFY `view_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bid`
--
ALTER TABLE `bid`
  ADD CONSTRAINT `bid_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `augeo_user_end`.`user` (`user_id`),
  ADD CONSTRAINT `bid_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `augeo_user_end`.`item` (`item_id`);

--
-- Constraints for table `blocked_bidder`
--
ALTER TABLE `blocked_bidder`
  ADD CONSTRAINT `blocked_bidder_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `augeo_user_end`.`user` (`user_id`),
  ADD CONSTRAINT `blocked_bidder_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `augeo_user_end`.`item` (`item_id`);

--
-- Constraints for table `deal`
--
ALTER TABLE `deal`
  ADD CONSTRAINT `deal_ibfk_1` FOREIGN KEY (`bid_id`) REFERENCES `bid` (`bid_id`);

--
-- Constraints for table `tagged_item`
--
ALTER TABLE `tagged_item`
  ADD CONSTRAINT `tagged_item_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `augeo_user_end`.`item` (`item_id`),
  ADD CONSTRAINT `tagged_item_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `augeo_user_end`.`tag` (`tag_id`);

--
-- Constraints for table `user_logtime`
--
ALTER TABLE `user_logtime`
  ADD CONSTRAINT `user_logtime_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `augeo_user_end`.`user` (`user_id`);

--
-- Constraints for table `viewed_tag`
--
ALTER TABLE `viewed_tag`
  ADD CONSTRAINT `viewed_tag_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `augeo_user_end`.`user` (`user_id`),
  ADD CONSTRAINT `viewed_tag_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `augeo_user_end`.`tag` (`tag_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

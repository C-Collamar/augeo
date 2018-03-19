-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2018 at 12:29 PM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_bid` (IN `usr_id` INT(11), IN `itm_id` INT(11), IN `amnt` DECIMAL(12,2))  BEGIN
    INSERT
INTO
    bid(user_id, item_id, amount)
VALUES(usr_id, itm_id, amnt);
SELECT
    bid.timestamp,
    bid.amount,
    user_account.username
FROM
    augeo_application.bid,
    augeo_user_end.user,
    augeo_user_end.user_account
WHERE
    bid.user_id = USER.user_id AND USER.account_id = user_account.account_id AND bid.user_id = usr_id AND bid.item_id = itm_id AND bid.amount = amnt;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `bid_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `amount` decimal(12,2) NOT NULL COMMENT 'in Philippine Peso',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bid`
--

INSERT INTO `bid` (`bid_id`, `user_id`, `item_id`, `amount`, `timestamp`) VALUES
(1, 2, 2, '400.00', '2018-03-19 06:31:36'),
(2, 2, 2, '420.00', '2018-03-19 07:50:18');

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

--
-- Dumping data for table `deal`
--

INSERT INTO `deal` (`deal_id`, `bid_id`, `confirmation`, `due_date`, `timestamp`) VALUES
(1, 2, 1, '2018-03-26 09:08:16', '2018-03-19 08:12:14');

-- --------------------------------------------------------

--
-- Table structure for table `tagged_item`
--

CREATE TABLE `tagged_item` (
  `tagged_item_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tagged_item`
--

INSERT INTO `tagged_item` (`tagged_item_id`, `tag_id`, `item_id`) VALUES
(3, 3, 2),
(4, 4, 2),
(5, 6, 3),
(6, 5, 3),
(7, 7, 4),
(8, 8, 5),
(9, 9, 5),
(10, 10, 6),
(11, 11, 6),
(12, 10, 7),
(13, 12, 7);

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

--
-- Dumping data for table `user_logtime`
--

INSERT INTO `user_logtime` (`logtime_id`, `user_id`, `login_time`, `logout_time`) VALUES
(1, 1, '2018-03-18 17:35:50', '2018-03-18 10:35:50'),
(2, 1, '2018-03-18 18:42:16', '2018-03-18 11:42:16'),
(3, 2, '2018-03-18 18:43:26', '2018-03-18 11:43:26'),
(4, 2, '2018-03-18 18:45:36', '2018-03-18 11:45:36'),
(5, 1, '2018-03-18 18:45:40', '2018-03-18 18:45:40'),
(6, 1, '2018-03-19 03:07:35', '2018-03-18 20:07:35'),
(7, 1, '2018-03-19 04:16:09', '2018-03-18 21:16:09'),
(8, 2, '2018-03-19 04:18:09', '2018-03-18 21:18:09'),
(9, 1, '2018-03-19 04:56:02', '2018-03-18 21:56:02'),
(10, 2, '2018-03-19 05:01:06', '2018-03-18 22:01:06'),
(11, 1, '2018-03-19 05:13:54', '2018-03-18 22:13:54'),
(12, 2, '2018-03-19 05:23:46', '2018-03-18 22:23:46'),
(13, 1, '2018-03-19 05:40:10', '2018-03-18 22:40:10'),
(14, 2, '2018-03-19 05:49:15', '2018-03-18 22:49:15'),
(15, 2, '2018-03-19 05:53:49', '2018-03-18 22:53:49'),
(16, 1, '2018-03-19 05:54:12', '2018-03-18 22:54:12'),
(17, 2, '2018-03-19 06:10:20', '2018-03-18 23:10:20'),
(18, 1, '2018-03-19 06:13:27', '2018-03-18 23:13:27'),
(19, 1, '2018-03-19 06:21:45', '2018-03-18 23:21:45'),
(20, 2, '2018-03-19 06:31:45', '2018-03-18 23:31:45'),
(21, 1, '2018-03-19 06:32:50', '2018-03-18 23:32:50'),
(22, 1, '2018-03-19 06:33:11', '2018-03-18 23:33:11'),
(23, 2, '2018-03-19 06:49:22', '2018-03-18 23:49:22'),
(24, 1, '2018-03-19 06:57:05', '2018-03-18 23:57:05'),
(25, 2, '2018-03-19 07:00:26', '2018-03-19 00:00:26'),
(26, 1, '2018-03-19 07:00:31', '2018-03-19 07:00:31'),
(27, 1, '2018-03-19 07:36:10', '2018-03-19 00:36:10'),
(28, 1, '2018-03-19 07:45:33', '2018-03-19 00:45:33'),
(29, 2, '2018-03-19 08:00:50', '2018-03-19 01:00:50'),
(30, 1, '2018-03-19 08:08:32', '2018-03-19 01:08:32'),
(31, 2, '2018-03-19 08:08:37', '2018-03-19 08:08:37'),
(32, 1, '2018-03-19 11:25:04', '2018-03-19 11:25:04');

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
  ADD KEY `tag_id` (`tag_id`),
  ADD KEY `item_id` (`item_id`);

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
  MODIFY `bid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `blocked_bidder`
--
ALTER TABLE `blocked_bidder`
  MODIFY `blocked_bidder_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `deal`
--
ALTER TABLE `deal`
  MODIFY `deal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tagged_item`
--
ALTER TABLE `tagged_item`
  MODIFY `tagged_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user_logtime`
--
ALTER TABLE `user_logtime`
  MODIFY `logtime_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
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
  ADD CONSTRAINT `tagged_item_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `augeo_user_end`.`tag` (`tag_id`),
  ADD CONSTRAINT `tagged_item_ibfk_3` FOREIGN KEY (`item_id`) REFERENCES `augeo_user_end`.`item` (`item_id`);

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

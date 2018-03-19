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
-- Database: `augeo_user_end`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `LEVENSHTEIN` (`s1` VARCHAR(255) CHARACTER SET utf8, `s2` VARCHAR(255) CHARACTER SET utf8) RETURNS INT(11) BEGIN DECLARE s1_len, s2_len, i, j, c, c_temp, cost INT; DECLARE s1_char CHAR CHARACTER SET utf8; DECLARE cv0, cv1 VARBINARY(256); SET s1_len = CHAR_LENGTH(s1), s2_len = CHAR_LENGTH(s2), cv1 = 0x00, j = 1, i = 1, c = 0; IF (s1 = s2) THEN RETURN (0); ELSEIF (s1_len = 0) THEN RETURN (s2_len); ELSEIF (s2_len = 0) THEN RETURN (s1_len); END IF; WHILE (j <= s2_len) DO SET cv1 = CONCAT(cv1, CHAR(j)), j = j + 1; END WHILE; WHILE (i <= s1_len) DO SET s1_char = SUBSTRING(s1, i, 1), c = i, cv0 = CHAR(i), j = 1; WHILE (j <= s2_len) DO SET c = c + 1, cost = IF(s1_char = SUBSTRING(s2, j, 1), 0, 1); SET c_temp = ORD(SUBSTRING(cv1, j, 1)) + cost; IF (c > c_temp) THEN SET c = c_temp; END IF; SET c_temp = ORD(SUBSTRING(cv1, j+1, 1)) + 1; IF (c > c_temp) THEN SET c = c_temp; END IF; SET cv0 = CONCAT(cv0, CHAR(c)), j = j + 1; END WHILE; SET cv1 = cv0, i = i + 1; END WHILE; RETURN (c); END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `blocklist`
--

CREATE TABLE `blocklist` (
  `blocklist_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `bookmark_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `initial_price` int(11) NOT NULL,
  `bid_interval` int(11) NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 if active, 1 if sold, 2 if deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `user_id`, `name`, `description`, `initial_price`, `bid_interval`, `view_count`, `timestamp`, `state`) VALUES
(2, 1, 'Mossimo Boomer SS Unisex Silver Stainless Steel Strap Ana-Digi Watch MS-1506G-YLW', '* Display: Ana-Digi\r\n* Case Dimension: 5 X 5 X 1.5 cm\r\n* Movement: Japan Quartz\r\n* Durability: 10 ATM\r\n* Dual Time\r\n* Stopwatch, Alarm, and Timer Function\r\n* Day and Date Display\r\n* Backlight Function', 366, 10, 0, '2018-03-17 18:27:21', 1),
(3, 1, 'Badminton Racket', 'Magandang pamalo ng tao', 366, 100, 0, '2018-03-19 06:52:02', 0),
(4, 2, 'Cap', 'This is a cap', 300, 100, 0, '2018-03-19 06:58:47', 0),
(5, 2, 'Bag', 'This is a bag', 999, 50, 0, '2018-03-19 06:59:36', 0),
(6, 1, 'Bracelet', 'This is a bracelet', 360, 20, 0, '2018-03-19 07:01:06', 0),
(7, 1, 'Wallet', 'This is a wallet', 500, 200, 0, '2018-03-19 07:02:15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `item_img`
--

CREATE TABLE `item_img` (
  `img_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `img_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_img`
--

INSERT INTO `item_img` (`img_id`, `item_id`, `img_path`) VALUES
(4, 2, 'http://localhost/augeo/data/user/items/2_0.jpg'),
(5, 2, 'http://localhost/augeo/data/user/items/2_1.jpg'),
(6, 2, 'http://localhost/augeo/data/user/items/2_2.jpg'),
(7, 3, 'http://localhost/augeo/data/user/items/3_0.jpg'),
(8, 3, 'http://localhost/augeo/data/user/items/3_1.jpg'),
(9, 3, 'http://localhost/augeo/data/user/items/3_2.jpg'),
(10, 4, 'http://localhost/augeo/data/user/items/4_0.jpg'),
(11, 4, 'http://localhost/augeo/data/user/items/4_1.jpg'),
(12, 5, 'http://localhost/augeo/data/user/items/5_0.jpg'),
(13, 5, 'http://localhost/augeo/data/user/items/5_1.jpg'),
(14, 6, 'http://localhost/augeo/data/user/items/6_0.jpg'),
(15, 6, 'http://localhost/augeo/data/user/items/6_1.jpg'),
(16, 7, 'http://localhost/augeo/data/user/items/7_0.jpg'),
(17, 7, 'http://localhost/augeo/data/user/items/7_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`tag_id`, `tag_name`) VALUES
(10, '8'),
(8, 'accessory'),
(6, 'badminton'),
(9, 'bag'),
(11, 'bracelet'),
(7, 'cap'),
(3, 'gadget'),
(5, 'sports'),
(12, 'wallet'),
(4, 'wrist-watch');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `sex` tinyint(1) NOT NULL COMMENT '0 for male; 1 otherwise',
  `bdate` date NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `full_address` varchar(255) NOT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `profile_img` varchar(255) DEFAULT NULL,
  `cover_photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `account_id`, `f_name`, `m_name`, `l_name`, `sex`, `bdate`, `zip_code`, `full_address`, `contact_no`, `email`, `profile_img`, `cover_photo`) VALUES
(1, 1, 'Christian', 'Amaranto', 'Collamar', 0, '1998-04-03', '4513', '253 M.L. Quezon Street', '+639876543210', 'christian.collamar@bicol-u.edu.ph', 'http://localhost/augeo/data/user/profile_img/1.jpg', 'http://localhost/augeo/data/user/cover_photo/1.jpg'),
(2, 2, 'Fname1', 'Mname1', 'Lname1', 0, '1996-08-13', '4065', 'Purok 5\r\nSalvacion, Panabo City', '+638394655901', 'Fname1@example.com', 'http://localhost/augeo/data/user/profile_img/2.gif', 'http://localhost/augeo/data/user/cover_photo/2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `account_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 if deactivated; 1 otherwise'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`account_id`, `username`, `password`, `state`) VALUES
(1, 'user0', 'f78b23d991e1824fabcd6ef5d3fc2c03', 1),
(2, 'user1', '87f5e873e4cc3ebaed6f289303417020', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blocklist`
--
ALTER TABLE `blocklist`
  ADD PRIMARY KEY (`blocklist_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`bookmark_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `item_img`
--
ALTER TABLE `item_img`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`tag_id`),
  ADD UNIQUE KEY `tag_name` (`tag_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `unique_username` (`username`),
  ADD UNIQUE KEY `unique_password` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blocklist`
--
ALTER TABLE `blocklist`
  MODIFY `blocklist_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `item_img`
--
ALTER TABLE `item_img`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `blocklist`
--
ALTER TABLE `blocklist`
  ADD CONSTRAINT `blocklist_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`),
  ADD CONSTRAINT `blocklist_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD CONSTRAINT `bookmark_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `bookmark_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `item_img`
--
ALTER TABLE `item_img`
  ADD CONSTRAINT `item_img_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `user_account` (`account_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

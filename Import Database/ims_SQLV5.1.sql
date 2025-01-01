-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2025 at 08:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category`) VALUES
(2, 'Earphone'),
(3, 'Speaker'),
(4, 'Data Cable'),
(14, 'earphone');

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `item_id` int(11) DEFAULT NULL,
  `collection_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`item_id`, `collection_qty`) VALUES
(24, 3),
(23, 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `full_inventory`
-- (See below for the actual view)
--
CREATE TABLE `full_inventory` (
`item_id` int(11)
,`item_title` varchar(200)
,`item_image` varchar(100)
,`price` int(10)
,`quantity` int(10)
,`description` varchar(250)
,`tag` varchar(20)
,`location` varchar(100)
,`category_id` int(11)
,`category` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `item_id` int(11) NOT NULL,
  `item_title` varchar(200) DEFAULT NULL,
  `item_image` varchar(100) DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`item_id`, `item_title`, `item_image`, `price`, `quantity`) VALUES
(4, 'Huawei cup', '../../Images/item/4_20241001_135044.jpg', 11, 14),
(6, 'adsef', '../../Images/item/6_9_SampleJPGImage_1mbmb.jpg', 15, 30),
(9, 'asdf', '../../Images/item/9_SampleJPGImage_1mbmb.jpg', 4, 4),
(10, 'dfgh', '../../Images/item/10_file_example_JPG_100kB.jpg', 3, 1),
(12, 'Leishe gaming mouse', '../../Images/item/12_17277700598198467818982588951540.jpg', 899, 8),
(14, 'Pen', '../../Images/item/14_17277727712225528279271975671867.jpg', 10, 6),
(19, 'Item C', '../../Images/item/19_SampleJPGImage_500kbmb.jpg', 5, 36),
(21, 'Gsbd', '../../Images/item/21_17282007154332362715880198400839.jpg', 8, 90),
(22, 'JBL P PRO 7', '../../Images/item/22_IMG_20241003_135626.jpg', 2600, 4),
(23, 'First dbms structure', '../../Images/item/23_Messenger_creation_BDDA1FF8-9359-4A0F-8DF3-F91953A89A64.jpeg', 60, 20),
(24, 'My Power Type C Earphone e450c, compatible earphone', '../../Images/item/24_mypowear.png', 499, 1);

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `issue_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `issue` varchar(50) NOT NULL,
  `text` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `issue`
--

INSERT INTO `issue` (`issue_id`, `item_id`, `qty`, `issue`, `text`) VALUES
(1, 19, 1, 'Lost', ''),
(2, 9, 4, 'other', 'wrong image');

-- --------------------------------------------------------

--
-- Table structure for table `item_details`
--

CREATE TABLE `item_details` (
  `item_id` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `tag` varchar(20) DEFAULT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item_details`
--

INSERT INTO `item_details` (`item_id`, `description`, `category_id`, `tag`, `location`) VALUES
(4, 'sa', 4, 'New', 'Cup'),
(6, 'sadf', 4, 'Original', 'sadf'),
(9, 'dsafe', 3, 'New', 'aesf'),
(10, 'fdsa', 4, 'Top Selling', 'ef'),
(12, 'Gaming bouse', 4, 'Top Selling', 'DESK'),
(14, 'Noth', 3, 'New', 'My hand'),
(19, 'hk', 3, 'New', '2'),
(21, 'Bsbs', 3, 'New', 'Hhd'),
(22, 'High watt and bass', 3, 'New', 'Rack 1'),
(23, 'Info of project db', 4, 'No Tag', 'Pc'),
(24, 'High quality stereo sound\r\nmetal body\r\nvolume control function\r\nmic, play pause key\r\nselfie function\r\nsupport to all brand', 2, 'Top Selling', 'Drawer 2, Rack 3');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `item_id` int(11) NOT NULL,
  `request_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sold`
--

CREATE TABLE `sold` (
  `transaction_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `sold_date` date NOT NULL,
  `sold_item_title` varchar(100) NOT NULL,
  `sold_price` decimal(11,2) NOT NULL,
  `sold_qty` int(11) NOT NULL,
  `sold_total` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sold`
--

INSERT INTO `sold` (`transaction_id`, `item_id`, `sold_date`, `sold_item_title`, `sold_price`, `sold_qty`, `sold_total`) VALUES
(1, NULL, '2024-10-04', 'Bottle', 25.00, 10, 250.00),
(2, 4, '2024-10-04', 'Huawei cup', 11.00, 13, 143.00),
(3, NULL, '2024-10-04', 'Wireless phone', 2499.00, 3, 7497.00),
(4, 14, '2024-10-04', 'Pen', 10.00, 8, 85.00),
(5, NULL, '2024-10-05', 'Adding test1', 6.00, 3, 18.00),
(6, NULL, '2024-10-05', 'ADD2', 5.00, 1, 5.00),
(7, NULL, '2024-10-05', 'ADD3', 5.00, 2, 10.00),
(8, 14, '2024-10-06', 'Pen', 10.00, 8, 85.00),
(9, NULL, '2024-10-06', 'Cover', 200.00, 1, 200.00),
(10, 14, '2024-10-13', 'Pen', 10.00, 8, 85.00),
(11, 21, '2024-10-13', 'Gsbd', 8.00, 4, 32.00),
(12, 10, '2024-10-13', 'dfgh', 3.00, 2, 6.00),
(13, 22, '2024-10-21', 'JBL P PRO 7', 2600.00, 1, 2600.00),
(14, 24, '2024-10-22', 'My Power Type C Earphone e450c, compatible earphone', 499.00, 4, 1996.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `role` enum('staff','admin','','') NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `role`, `username`, `password`) VALUES
(1, 'admin', 'admin', '$2y$10$UTb1c72qGHglVqFtpmaSPeL0hfC.Dh0EAhQ64N2PB/QsfamEcw.jK'),
(31, 'staff', 'staff1', '$2y$10$cG03ZJnTQraoNc60K6Uo9ubxWqVeekdScD6LgaFzX65mhYieJ1aru'),
(32, 'staff', 'staff2', '$2y$10$ThItAcVjmrN58grDeLGEZOVufVjbAmmd/Iq9dt6q9grZio0jd1HJq'),
(33, 'staff', 'staff3', '$2y$10$OUSs4KJaQ3yHYLnDplLX3uTjv3a8VMX4k.SrR1eNrm8/tlbL7Wvge'),
(36, 'staff', 'staff4', '$2y$10$hIqFdE3JUaI6UhhZSmqH6u1sw02qMKvjX0FiZ/Jf7v9LXj.7Fx7JG');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_category_details_on_inventory`
-- (See below for the actual view)
--
CREATE TABLE `view_category_details_on_inventory` (
`category_id` int(11)
,`total_category_quantity` decimal(32,0)
,`total_category_item` bigint(21)
,`category` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_collection_list`
-- (See below for the actual view)
--
CREATE TABLE `view_collection_list` (
`item_id` int(11)
,`item_title` varchar(200)
,`price` int(10)
,`quantity` int(10)
,`collection_qty` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_issue_items`
-- (See below for the actual view)
--
CREATE TABLE `view_issue_items` (
`issue_id` int(11)
,`item_id` int(11)
,`item_title` varchar(200)
,`quantity` int(10)
,`issue` varchar(50)
,`text` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_requests`
-- (See below for the actual view)
--
CREATE TABLE `view_requests` (
`item_id` int(11)
,`item_title` varchar(200)
,`quantity` int(10)
,`request_qty` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `full_inventory`
--
DROP TABLE IF EXISTS `full_inventory`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `full_inventory`  AS SELECT `inventory`.`item_id` AS `item_id`, `inventory`.`item_title` AS `item_title`, `inventory`.`item_image` AS `item_image`, `inventory`.`price` AS `price`, `inventory`.`quantity` AS `quantity`, `item_details`.`description` AS `description`, `item_details`.`tag` AS `tag`, `item_details`.`location` AS `location`, `category`.`category_id` AS `category_id`, `category`.`category` AS `category` FROM ((`inventory` join `item_details` on(`inventory`.`item_id` = `item_details`.`item_id`)) left join `category` on(`item_details`.`category_id` = `category`.`category_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_category_details_on_inventory`
--
DROP TABLE IF EXISTS `view_category_details_on_inventory`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_category_details_on_inventory`  AS SELECT `c`.`category_id` AS `category_id`, sum(`i`.`quantity`) AS `total_category_quantity`, count(`id`.`category_id`) AS `total_category_item`, `c`.`category` AS `category` FROM (`category` `c` left join (`inventory` `i` join `item_details` `id` on(`i`.`item_id` = `id`.`item_id`)) on(`id`.`category_id` = `c`.`category_id`)) GROUP BY `c`.`category_id` ;

-- --------------------------------------------------------

--
-- Structure for view `view_collection_list`
--
DROP TABLE IF EXISTS `view_collection_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_collection_list`  AS SELECT `i`.`item_id` AS `item_id`, `i`.`item_title` AS `item_title`, `i`.`price` AS `price`, `i`.`quantity` AS `quantity`, `c`.`collection_qty` AS `collection_qty` FROM (`inventory` `i` join `collection` `c` on(`i`.`item_id` = `c`.`item_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_issue_items`
--
DROP TABLE IF EXISTS `view_issue_items`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_issue_items`  AS SELECT `issue`.`issue_id` AS `issue_id`, `inventory`.`item_id` AS `item_id`, `inventory`.`item_title` AS `item_title`, `inventory`.`quantity` AS `quantity`, `issue`.`issue` AS `issue`, `issue`.`text` AS `text` FROM (`inventory` join `issue` on(`inventory`.`item_id` = `issue`.`item_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_requests`
--
DROP TABLE IF EXISTS `view_requests`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_requests`  AS SELECT `inventory`.`item_id` AS `item_id`, `inventory`.`item_title` AS `item_title`, `inventory`.`quantity` AS `quantity`, `request`.`request_qty` AS `request_qty` FROM (`inventory` join `request` on(`inventory`.`item_id` = `request`.`item_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD UNIQUE KEY `item_details_for_collection` (`item_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`issue_id`),
  ADD KEY `issue_of_item` (`item_id`);

--
-- Indexes for table `item_details`
--
ALTER TABLE `item_details`
  ADD UNIQUE KEY `item_details_fkid_1` (`item_id`) USING BTREE,
  ADD KEY `category_id_fk1` (`category_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `sold`
--
ALTER TABLE `sold`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `sold-date` (`sold_date`),
  ADD KEY `sold_item_id_fk1` (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sold`
--
ALTER TABLE `sold`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `collection`
--
ALTER TABLE `collection`
  ADD CONSTRAINT `item_details_for_cart` FOREIGN KEY (`item_id`) REFERENCES `inventory` (`item_id`) ON DELETE CASCADE;

--
-- Constraints for table `issue`
--
ALTER TABLE `issue`
  ADD CONSTRAINT `issue_of_item` FOREIGN KEY (`item_id`) REFERENCES `inventory` (`item_id`) ON DELETE CASCADE;

--
-- Constraints for table `item_details`
--
ALTER TABLE `item_details`
  ADD CONSTRAINT `category_id_fk1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `item_details_fkid_1` FOREIGN KEY (`item_id`) REFERENCES `inventory` (`item_id`) ON DELETE CASCADE;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `item_request_fk1` FOREIGN KEY (`item_id`) REFERENCES `inventory` (`item_id`) ON DELETE CASCADE;

--
-- Constraints for table `sold`
--
ALTER TABLE `sold`
  ADD CONSTRAINT `sold_item_id_fk1` FOREIGN KEY (`item_id`) REFERENCES `inventory` (`item_id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

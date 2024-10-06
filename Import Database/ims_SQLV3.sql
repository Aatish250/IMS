-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2024 at 09:51 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

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
(4, 'Data Cable');

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
(3, 'Item A', '../../Images/item/3_SampleJPGImage_500kbmb.jpg', 5, 4),
(4, 'Item B', '../../Images/item/4_file_example_JPG_100kB.jpg', 7, 4),
(6, 'adsef', '../../Images/item/6_585-KB.png', 12, 30),
(7, 'sadf', '../../Images/item/7_SampleJPGImage_1mbmb.jpg', 10, 10),
(8, 'fefsa', '../../Images/item/8_SampleJPGImage_500kbmb.jpg', 7, 7),
(9, 'asdf', '../../Images/item/9_SampleJPGImage_1mbmb.jpg', 4, 4),
(10, 'df', '../../Images/item/10_file_example_JPG_100kB.jpg', 3, 3);

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
(3, 'asas', 2, 'New', 'b'),
(4, 'sa', 4, '', 'b'),
(6, 'sadf', 4, 'Original', 'sadf'),
(7, 'sadf', 3, 'New', '2'),
(8, 'efas', 3, '', 'sdfasd'),
(9, 'dsafe', 3, 'New', 'aesf'),
(10, 'fdsa', 4, 'New', 'ef');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `item_id` int(11) NOT NULL,
  `request_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`item_id`, `request_qty`) VALUES
(6, 4);

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
(1, NULL, '2024-09-13', 'Title1', 10.00, 2, 20.00),
(2, NULL, '2024-09-14', 'Title2', 20.00, 3, 60.00),
(3, NULL, '2024-09-14', 'Title1', 10.00, 4, 40.00),
(4, NULL, '2024-09-14', 'Title4', 25.00, 3, 75.00),
(5, NULL, '2024-09-15', 'Ttile1', 10.00, 2, 20.00),
(6, NULL, '2024-09-15', 'Title3', 20.00, 3, 60.00),
(7, NULL, '2024-02-03', 'Antique Brass Telescope', 426.00, 1, 426.00),
(8, NULL, '2024-02-05', 'Vintage Leather Suitcase', 190.00, 1, 190.00),
(9, NULL, '2024-02-08', 'Art Deco Table Lamp', 313.00, 1, 313.00),
(10, NULL, '2024-02-10', 'Victorian Cameo Brooch', 79.00, 2, 157.00),
(11, NULL, '2024-02-12', 'Retro Vinyl Record Player', 265.00, 1, 265.00),
(12, NULL, '2024-02-15', 'Antique Pocket Watch', 175.00, 1, 175.00),
(13, NULL, '2024-02-17', 'Vintage Polaroid Camera', 90.00, 1, 90.00),
(14, NULL, '2024-02-19', 'Mid-Century Modern Chair', 399.00, 1, 399.00),
(15, NULL, '2024-02-21', 'Antique Silver Candlesticks', 146.00, 2, 291.00),
(16, NULL, '2024-02-23', 'Vintage Mechanical Typewriter', 211.00, 1, 211.00),
(17, NULL, '2024-02-25', 'Art Nouveau Vase', 287.00, 1, 287.00),
(18, NULL, '2024-02-27', 'Antique Brass Compass', 68.00, 1, 68.00),
(19, NULL, '2024-02-29', 'Vintage Bakelite Radio', 179.00, 1, 179.00),
(20, NULL, '2024-03-02', 'Victorian Lace Fan', 45.00, 3, 136.00),
(21, NULL, '2024-03-04', 'Antique Mahogany Writing Desk', 589.00, 1, 589.00),
(22, NULL, '2024-03-06', 'Vintage Tin Toy Robot', 113.00, 1, 113.00),
(23, NULL, '2024-03-08', 'Art Deco Wall Mirror', 235.00, 1, 235.00),
(24, NULL, '2024-03-10', 'Antique Porcelain Tea Set', 156.00, 1, 156.00),
(25, NULL, '2024-03-12', 'Vintage Leather Camera Bag', 88.00, 1, 88.00),
(26, NULL, '2024-03-14', 'Retro Diner Clock', 69.00, 2, 137.00),
(27, NULL, '2024-03-16', 'Antique Bronze Sculpture', 478.00, 1, 478.00),
(28, NULL, '2024-03-18', 'Vintage Silk Kimono', 196.00, 1, 196.00),
(29, NULL, '2024-03-20', 'Art Nouveau Picture Frame', 90.00, 2, 179.00),
(30, NULL, '2024-03-22', 'Antique Brass Microscope', 345.00, 1, 345.00),
(31, NULL, '2024-03-24', 'Vintage Leather Boxing Gloves', 78.00, 1, 78.00),
(32, NULL, '2024-03-26', 'Victorian Mourning Jewelry', 168.00, 1, 168.00),
(33, NULL, '2024-03-28', 'Antique World Globe', 213.00, 1, 213.00),
(34, NULL, '2024-03-30', 'Vintage Bakelite Telephone', 135.00, 1, 135.00),
(35, NULL, '2024-04-01', 'Art Deco Cocktail Shaker', 99.00, 1, 99.00),
(36, NULL, '2024-04-03', 'Antique Carved Wooden Box', 76.00, 2, 153.00),
(37, NULL, '2024-04-05', 'Vintage Leather Football', 57.00, 1, 57.00),
(38, NULL, '2024-04-07', 'Retro Neon Bar Sign', 289.00, 1, 289.00),
(39, NULL, '2024-04-09', 'Antique Brass Door Knocker', 46.00, 3, 137.00),
(40, NULL, '2024-04-11', 'Vintage Crocodile Handbag', 379.00, 1, 379.00),
(41, NULL, '2024-04-13', 'Art Nouveau Stained Glass Panel', 567.00, 1, 567.00),
(42, NULL, '2024-04-15', 'Antique Porcelain Doll', 124.00, 1, 124.00),
(43, NULL, '2024-04-17', 'Vintage Leather Bound Books', 90.00, 5, 448.00),
(44, NULL, '2024-04-19', 'Art Deco Silver Cigarette Case', 179.00, 1, 179.00),
(45, NULL, '2024-07-15', 'Wireless Bluetooth Earbuds', 80.00, 2, 160.00),
(46, NULL, '2024-08-03', 'Smart Home Security Camera', 130.00, 1, 130.00),
(47, NULL, '2024-08-22', 'Portable Power Bank 10000mAh', 35.00, 3, 105.00),
(48, NULL, '2024-09-01', 'Stainless Steel Water Bottle', 25.00, 4, 100.00),
(49, NULL, '2024-09-10', 'Ergonomic Office Chair', 200.00, 1, 200.00),
(110, NULL, '2024-07-02', 'Wireless Gaming Mouse', 59.99, 1, 59.99),
(111, NULL, '2024-07-05', 'Smart LED Desk Lamp', 45.99, 2, 91.98),
(112, NULL, '2024-07-08', 'Fitness Tracker Watch', 89.99, 1, 89.99),
(113, NULL, '2024-07-11', 'Portable Bluetooth Speaker', 69.99, 1, 69.99),
(114, NULL, '2024-07-14', 'Noise-Cancelling Headphones', 199.99, 1, 199.99),
(115, NULL, '2024-07-17', 'Electric Kettle', 34.99, 2, 69.98),
(116, NULL, '2024-07-20', 'Wireless Charging Pad', 29.99, 3, 89.97),
(117, NULL, '2024-07-23', 'Digital Kitchen Scale', 24.99, 1, 24.99),
(118, NULL, '2024-07-26', 'USB-C Hub Adapter', 39.99, 2, 79.98),
(119, NULL, '2024-07-29', 'Compact Air Purifier', 129.99, 1, 129.99),
(120, NULL, '2024-08-01', 'Mechanical Keyboard', 89.99, 1, 89.99),
(121, NULL, '2024-08-04', 'Wireless Doorbell', 39.99, 1, 39.99),
(122, NULL, '2024-08-07', 'Smart Wi-Fi Plug', 19.99, 4, 79.96),
(123, NULL, '2024-08-10', 'Portable SSD 500GB', 79.99, 1, 79.99),
(124, NULL, '2024-08-13', 'Robot Vacuum Cleaner', 249.99, 1, 249.99),
(125, NULL, '2024-08-16', 'Wireless Ergonomic Mouse', 49.99, 2, 99.98),
(126, NULL, '2024-08-19', 'Smart Thermostat', 149.99, 1, 149.99),
(127, NULL, '2024-08-22', 'Bluetooth Car Adapter', 25.99, 2, 51.98),
(128, NULL, '2024-08-25', 'Portable Laptop Stand', 29.99, 3, 89.97),
(129, NULL, '2024-08-28', 'Wireless Keyboard and Mouse Combo', 59.99, 1, 59.99),
(130, NULL, '2024-08-31', 'Smart Light Bulb Set', 39.99, 2, 79.98),
(131, NULL, '2024-09-03', 'Wireless Gaming Controller', 54.99, 1, 54.99),
(132, NULL, '2024-09-06', 'Portable Monitor 15.6\"', 169.99, 1, 169.99),
(133, NULL, '2024-09-09', 'Wireless Earbuds with Charging Case', 89.99, 1, 89.99),
(134, NULL, '2024-09-12', 'Smart Coffee Maker', 119.99, 1, 119.99),
(135, NULL, '2024-09-15', 'Wireless Vertical Mouse', 39.99, 2, 79.98),
(136, NULL, '2024-09-18', 'Portable Projector', 199.99, 1, 199.99),
(137, NULL, '2024-09-21', 'Smart Door Lock', 159.99, 1, 159.99),
(138, NULL, '2024-09-24', 'Wireless Webcam 1080p', 69.99, 1, 69.99),
(139, NULL, '2024-09-27', 'Smart Scale', 49.99, 2, 99.98),
(160, NULL, '2024-07-03', 'Premium Coffee Beans 500g', 12.49, 2, 24.98),
(161, NULL, '2024-07-10', 'Organic Honey 350ml', 8.75, 3, 26.25),
(162, NULL, '2024-07-17', 'Artisanal Cheese Selection', 15.99, 1, 15.99),
(163, NULL, '2024-07-24', 'Gourmet Chocolate Bar Set', 9.95, 2, 19.90),
(164, NULL, '2024-07-31', 'Extra Virgin Olive Oil 750ml', 14.50, 1, 14.50),
(165, NULL, '2024-08-07', 'Specialty Tea Sampler', 18.75, 1, 18.75),
(166, NULL, '2024-08-14', 'Organic Mixed Nuts 400g', 11.25, 2, 22.50),
(167, NULL, '2024-08-21', 'Handcrafted Pasta Sauce', 6.99, 3, 20.97),
(168, NULL, '2024-08-28', 'Gourmet Sea Salt Collection', 13.50, 1, 13.50),
(169, NULL, '2024-09-04', 'Artisan Bread Loaf', 4.75, 2, 9.50),
(170, NULL, '2024-09-11', 'Premium Spice Set', 22.99, 1, 22.99),
(171, NULL, '2024-09-18', 'Organic Fruit Preserves', 7.25, 2, 14.50),
(172, NULL, '2024-09-25', 'Gourmet Popcorn Kernels', 5.49, 3, 16.47),
(173, NULL, '2024-08-05', 'Specialty Balsamic Vinegar', 16.75, 1, 16.75),
(174, NULL, '2024-08-12', 'Organic Granola Mix', 9.99, 2, 19.98),
(175, NULL, '2024-08-19', 'Artisanal Hot Sauce Set', 14.95, 1, 14.95),
(176, NULL, '2024-08-26', 'Gourmet Dried Mushrooms', 12.99, 1, 12.99),
(177, NULL, '2024-09-02', 'Premium Maple Syrup 250ml', 10.50, 2, 21.00),
(178, NULL, '2024-09-09', 'Organic Herbal Tea Blend', 8.25, 3, 24.75),
(179, NULL, '2024-09-16', 'Gourmet Truffle Oil', 19.99, 1, 19.99),
(180, NULL, '2024-09-17', 'asdf', 20.00, 3, 60.00),
(181, NULL, '2024-09-20', 'title 2', 10.00, 2, 20.00),
(182, NULL, '2024-09-20', 'Title4', 20.00, 3, 60.00);

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
(29, 'staff', 'staff1', '$2y$10$zDg2djVLGvIUq1igjloXxOuu4yqcGH8sZ6p6m6BaA.5qkYPXB8OFO');

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
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`item_id`);

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
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sold`
--
ALTER TABLE `sold`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

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

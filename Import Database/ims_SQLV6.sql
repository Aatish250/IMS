-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2025 at 07:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
(11, 'adapter'),
(7, 'computer accessories'),
(3, 'datacable'),
(12, 'earbuds'),
(2, 'earphone'),
(15, 'joystick'),
(9, 'keypad phone'),
(13, 'light'),
(4, 'radio'),
(14, 'security camera'),
(8, 'smart phone'),
(1, 'speaker');

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
(18, 1);

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
(1, 'USB C to C Power Adapter', '../../Images/item/1_17436056101805466707104985198201.jpg', 850, 8),
(2, 'Abc', '../../Images/item/2_17436062342446339689431327092921.jpg', 650, 12),
(3, 'Zone Charger', '../../Images/item/3_17436068048378258251431677121126.jpg', 650, 12),
(5, 'Zone 65W RC10 Charger', '../../Images/item/5_17436069812035023338595652695396.jpg', 650, 12),
(6, 'Hoco Anti Bending Type C Datacable', '../../Images/item/6_17436073329554851371842027114508.jpg', 450, 10),
(7, 'Golon Radio', '../../Images/item/7_17436076568021419112064283271575.jpg', 1000, 4),
(8, 'Cmik Digital Radio', '../../Images/item/8_17436080249384634934153297827369.jpg', 1200, 3),
(9, 'Golon Radio Rechargeable', '../../Images/item/9_17436082318995439372880099822264.jpg', 1600, 3),
(10, 'Premier Sterio Earphone', '../../Images/item/10_17436085734106210784093796887135.jpg', 350, 15),
(11, ' D power Earphone', '../../Images/item/11_17436089603595316677241917397905.jpg', 350, 12),
(12, 'Yesplus Earphone', '../../Images/item/12_17436090948883482210737766964670.jpg', 650, 8),
(13, 'Ucom Joypad', '../../Images/item/13_17436092979544666927384242287885.jpg', 650, 2),
(14, 'Gamepad Bluetooth', '../../Images/item/14_1743609425882615293878867113961.jpg', 2400, 2),
(15, 'Biagji Gaming Mouse', '../../Images/item/15_174360956878173037300719992187.jpg', 950, 2),
(16, 'Hoco Gaming Wired Mouse', '../../Images/item/16_17436099174775779940754915066136.jpg', 950, 2),
(17, 'Dell Wireless Mouse', '../../Images/item/17_17436100822344759127933187759879.jpg', 850, 1),
(18, 'Solid Wireless Mouse', '../../Images/item/18_17436103001824923867747954590265.jpg', 650, 3),
(19, 'Biagji USB Optical Mouse', '../../Images/item/19_17436104156992132644958520869849.jpg', 350, 5),
(20, 'Jedel Wireless Mouse', '../../Images/item/20_17436105773105397386926743909607.jpg', 650, 4),
(21, 'JBL Boombox', '../../Images/item/21_17436107462494336966559161437343.jpg', 5500, 1),
(22, 'JBL P Pro', '../../Images/item/22_17436110381402909717571020544324.jpg', 2900, 1),
(23, 'Ruilang Multifunctional LED Flashlight', '../../Images/item/23_1743611548794910315357702606324.jpg', 1600, 4),
(24, 'Ruilang Focus Light', '../../Images/item/24_17436117212724757164878140741998.jpg', 2600, 2),
(25, 'Kick Aeropods', '../../Images/item/25_17436119832883504218891785184401.jpg', 2400, 2),
(26, 'Ultima Boom', '../../Images/item/26_17436121598983887528251759669902.jpg', 2500, 1),
(27, 'Boat Airdopes Alpha', '../../Images/item/27_17436122357933293060659696379514.jpg', 3800, 2),
(28, 'Kick AeroPods GT', '../../Images/item/28_1743612687131893480624383065838.jpg', 2900, 2),
(29, 'JBL Harman Mini Portable Speaker', '../../Images/item/29_1743612887878642458231314630216.jpg', 550, 4),
(30, 'EWA AIOE', '../../Images/item/30_17436130035876176550632981618689.jpg', 1600, 4),
(31, 'My Power Metallic Body Earphone', '../../Images/item/31_24_mypowear.png', 550, 8);

--
-- Triggers `inventory`
--
DELIMITER $$
CREATE TRIGGER `after_direct_sell` AFTER UPDATE ON `inventory` FOR EACH ROW update collection
set collection_qty = IF(NEW.quantity < collection_qty, NEW.quantity, collection_qty)
$$
DELIMITER ;

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
(1, '35W USB-C to C Power Adapter (folding pins). ', 11, 'New', 'Show Rack R3'),
(5, 'Fast charge and low temperature', 11, 'No Tag', 'Show Rack R3'),
(6, 'Anti-bending charging datacable.\r\n1m 3A fast charging', 3, 'New', 'Hanger R2'),
(7, 'WORLD RECEIVER\r\n\r\nHIGH SENSITIVITY\r\n\r\n• AM/FM/TV/SW1-2 RADIO\r\n\r\n• HIGH SENSITIVITY\r\n\r\n• 360° AND ULTRA LONG ANTENNA\r\n\r\n• AC:220V/50Hz\r\n\r\nBATTERIES NOT INCLUDED', 4, 'No Tag', 'Rack1 c6R3'),
(8, 'Mobile/Computer/MP3/TF/USB/FM Radio/BT\r\n\r\n■ 3 inches Speaker\r\n\r\n■ Frequency range: FM 87-108 MHz\r\n\r\n■ repeat play', 4, 'No Tag', 'Rack1 C6 R3'),
(9, 'FM/AM/SW 3 BANDS RADIO\r\n\r\n• WITH USB/TF MUSIC PLAYER\r\n\r\n•WITH BT&2.4G AUDIO\r\n\r\n• WITH 3 WAY SPEAKER PLAYER FOR USB-TF-PC LINK\r\n\r\nWITH 18650 LI-BATTERY\r\n\r\n• WITH EARPHONE JACK\r\n\r\n• DC 5V USB CHARGER\r\n\r\nDC:3.7V(18650×1PCS)', 4, 'No Tag', 'Rack 1 C6 R3'),
(10, '• Speaker diameter: 9 mm\r\n\r\n• Frequency range: 20~20000Hz\r\n\r\n• Sensitivity: 108±3dB (at 1KHZ,0.5rms)\r\n\r\n• Impedance: 32 ohms\r\n\r\n• The wire length: 130cm', 2, 'New', 'Hanger1'),
(11, 'Supper Extra Bass: Vibe your rhythm all Day with fantastic heavy bass.\r\n\r\nCompatibility: With the stylish design\r\n\r\nand high-end sound quality, d-power Groovy K28 earphones are compatible with all devices with a standard 3.5 mm jack.\r\n\r\nHands-free co', 2, 'New', 'Hanger1 R2'),
(12, 'Pure sound  YS-308', 2, 'Original', 'Hanger R2'),
(13, '.\r\n\r\n11 fire buttons to control the latest games\r\n\r\nLonger wings. More clear colors for choice\r\n\r\nDigital and analog modes for peak performance\r\n\r\n1.8 meter cord for optimal freedom.\r\n\r\n2 analog controllers that enable you to control 4 separate axes\r', 15, 'No Tag', 'Rack 1 C4 R5'),
(14, '1. The non-professional personnel do not remove\r\n\r\n2 Do not use liquid, fluid or metal objects into the product\r\n\r\n3. Please do not break the product or the great pressure on products\r\n\r\n4. Cannot be used in high temperature and high humidity environ', 15, 'New', 'Rack 1 C4 R5'),
(15, 'BINGJI RACING X8S SWORD MACRO PRO GAMING MOUSE\r\n\r\nRGB CHROMA ILLUMINATION\r\n\r\nThe RACING XBs with the mystical running RGB Chroma lumination on its body side and DPI indicator light which can be personalized to get an impressive and unique look for yo', 7, 'New', 'Rack 1 C4 R1'),
(16, 'Product net weight: 78g\r\n\r\nSize: 121*63*40mm\r\n\r\nWorking current: 30mA\r\n\r\nWorking voltage: 5V\r\n\r\nInterface type: USB-A\r\n\r\nWire specification: diameter 3.0mm*1.4m\r\n\r\nService life: 3 million clicks life\r\n\r\nApplicable to: desktop computer, notebook compu', 7, 'New', 'Rack 1 C4 R1'),
(17, '• Ergonomice desighn for both hands\r\n\r\n• High resolution:2000dpi\r\n\r\n• Up combo interface\r\n\r\n• Compatible with Microsoft Windows 2000/xp/Vista/Win7/Win8/Win10 and Mac', 7, 'Original', 'Rack 1 C4 R1'),
(18, 'The mouse\r\n\r\nWireless experience at a sweet price\r\n\r\n• reliable 2.4GHZ wireless connection\r\n\r\n• curved surface shape can be comfortably controlled all day long\r\n\r\n⚫ optical sensors can be used on a variety of surfaces\r\n\r\n• wireless connection distanc', 7, 'New', 'Rack 1 C4 R1'),
(19, 'SPECIFICATIONS:\r\n\r\nErgonomic design\r\n\r\nUSB interface\r\n\r\n7 Colors Breathing Light\r\n\r\nbuttons: 3 buttons + 1 wheel\r\n\r\nCord length: 1400mm\r\n\r\nScroll wheel act as third button\r\n\r\nButton-life up to 1 million click\r\n\r\nTracking Resolution: 1200dpi\r\n\r\nWorks ', 7, 'New', 'Rack 1 C4 R1'),
(20, '4D wireless office mosue\r\n\r\nDPI:800-1200-1600\r\n\r\nMouse size:105*58*36mm\r\n\r\nWorking distance:10m', 7, 'New', 'Rack 1 C4 R1'),
(21, 'SURPENDINGLY BIG SOUND\r\n\r\nEnjoy crisp, clear sound with big, beautiful\r\n\r\nlow - wherever you go. This super...\r\n\r\nportable speaker with huge personality even lets you play and pause your music without\r\n\r\nPlay on your cell phone.', 1, 'New', 'Rack 1 C1'),
(22, 'Good bass and high volume sound', 1, 'No Tag', 'Rack 1 C1'),
(23, '26650 lithium battery\r\n\r\nT\r\n\r\nSmart power\r\n\r\nLiving waterproof\r\n\r\nTelescopic zoom\r\n\r\nType-C charging\r\nmagnet', 13, 'Top Selling', 'Rack 1 C2'),
(24, 'Heavy Light with 500m+ distance light', 13, 'Original', 'Rack 1 C3'),
(25, 'Bluetooth 5.3\r\n\r\nC\r\n\r\nCall Alert\r\n\r\nQuad Mic with ENC\r\n\r\nSPARK CHARGE 5 min Charge 100 hours\r\n\r\n5 Hours Earbuds backup\r\n\r\n10mm\r\n\r\nDynamic Driver\r\n\r\nType-C Input\r\n\r\nVoice Assistant\r\n\r\nANC\r\n\r\nANC 30db\r\n\r\n50ms Low latency\r\n\r\nTotal Playtime Upto 50hrs\r\n\r', 12, 'New', 'Show Rack R4'),
(26, '13mm\r\n\r\nDrivers\r\n\r\nIPX4\r\n\r\nSweat Resistance\r\n\r\nIWP Tech\r\n\r\nBluetooth v5.3\r\n\r\nSingle Press Voice Assistant\r\n\r\nType C Interface\r\n\r\nQuick Response Touch Controls\r\n\r\nTotal Playback 42H', 12, 'No Tag', 'Show Rack R4'),
(27, 'Dual Mics with ENx™ Toch\r\n\r\nErgonomically Pocketable Design\r\n\r\nIPX5 Water Resistance\r\n\r\nIWPH Technology\r\n\r\nEasy Touch Controls', 12, 'No Tag', 'Show Rack R4'),
(28, 'Gaming mode low latency 37ms. Hd sound. Bluetooth 5.4. 500mAh case battery water resistance IPX5', 12, 'New', 'Show Rack R4'),
(29, 'Model:\r\n\r\nPacking size\r\n\r\n70*40*110MM\r\n\r\n4W\r\n\r\n3\r\n\r\nLoudspeaker Output:\r\n\r\nImpedance\r\n\r\nBattery Capacity:\r\n\r\n300mAh\r\n\r\nBattery Charging Voltage:\r\n\r\n5V[USB]\r\n\r\nPlayback Time\r\n\r\nUp to 2.5 hours\r\n\r\nBattery Charge Time:\r\n\r\nM3\r\n\r\n2 hours', 1, 'Top Selling', 'Rack 1 C6 R2'),
(30, 'Portable and high bass and sound', 1, 'Top Selling', 'Rack 1 C6 R2'),
(31, 'Hd Sound Quality. Stable and strong bass. Built in microphone. Type C', 2, 'Top Selling', 'Hanger 1 R2');

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
(2, NULL, '2024-10-04', 'Huawei cup', 11.00, 13, 143.00),
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
(14, 24, '2024-10-22', 'My Power Type C Earphone e450c, compatible earphone', 499.00, 12, 3992.00),
(15, NULL, '2025-03-25', 'Test Sales 1', 150.00, 3, 450.00),
(16, 24, '2025-03-25', 'My Power Type C Earphone e450c, compatible earphone', 499.00, 12, 3992.00),
(17, 26, '2025-03-28', 'abcde', 2000.00, 11, 22000.00),
(18, 24, '2025-03-28', 'My Power Type C Earphone e450c, compatible earphone', 499.00, 12, 3992.00),
(19, 33, '2025-03-28', 'Adidas Dynamic Pulse - Gents Perfume', 6000.00, 1, 6000.00),
(20, 6, '2025-03-28', 'adsef', 15.00, 12, 210.00),
(21, 36, '2025-04-01', 'Bankai', 3500.00, 2, 7000.00),
(22, 26, '2025-04-02', 'abcde', 2000.00, 11, 22000.00);

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
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `unique_category` (`category`);

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
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `sold`
--
ALTER TABLE `sold`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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

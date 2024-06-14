-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2024 at 12:05 PM
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
-- Database: `dokan`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `uniqueId` text DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `Qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oldorder`
--

CREATE TABLE `oldorder` (
  `id` int(11) NOT NULL,
  `orderId` int(11) DEFAULT NULL,
  `confirmDate` varchar(200) DEFAULT NULL,
  `totalPrice` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `order_unique_id` text NOT NULL,
  `user_unique_id` text NOT NULL,
  `all_product_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL,
  `order_total_price` int(11) NOT NULL,
  `order_user_first_name` varchar(200) NOT NULL,
  `order_user_last_name` varchar(200) NOT NULL,
  `order_user_number` int(11) NOT NULL,
  `order_user_street_address` varchar(200) NOT NULL,
  `order_user_city` varchar(200) NOT NULL,
  `order_user_state` varchar(200) NOT NULL,
  `order_user_zip_code` int(11) NOT NULL,
  `order_user_payment_method` int(11) NOT NULL,
  `order_user_card_number` int(11) NOT NULL,
  `order_user_exp` int(11) NOT NULL,
  `order_user_cvv` int(11) NOT NULL,
  `order_unique_id` varchar(200) NOT NULL,
  `user_unique_id` text NOT NULL,
  `all_product_id` text NOT NULL,
  `user_order_time` varchar(300) NOT NULL,
  `order_delivery_time` varchar(300) NOT NULL,
  `status` int(11) NOT NULL,
  `order_user_email` varchar(300) NOT NULL,
  `user_order_id_qty` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productcatagory`
--

CREATE TABLE `productcatagory` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(500) DEFAULT NULL,
  `categoryQty` int(11) DEFAULT NULL,
  `categoryDescription` varchar(600) DEFAULT NULL,
  `userAuth` int(11) DEFAULT NULL,
  `uniqueId` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productcatagory`
--

INSERT INTO `productcatagory` (`id`, `categoryName`, `categoryQty`, `categoryDescription`, `userAuth`, `uniqueId`) VALUES
(27, 'laptop', 4, 'laptop-all-laptop', 1, '6653e69a69bd127052024074914AM'),
(28, 'desktop', 3, 'desktop-pc-brand-desktop-pc', 1, '6653e69a69bd127052024074914AM'),
(29, 'gaming', 4, 'gaming-component-gaming-console', 1, '6653e69a69bd127052024074914AM'),
(30, 'Monitor ', 4, 'all-monitor', 1, '6653e69a69bd127052024074914AM'),
(31, 'tablet', 4, 'regular-tablet-amazon', 1, '6653e69a69bd127052024074914AM'),
(32, 'camera', 2, 'compact-camera', 1, '6653e69a69bd127052024074914AM');

-- --------------------------------------------------------

--
-- Table structure for table `productdetails`
--

CREATE TABLE `productdetails` (
  `id` int(11) NOT NULL,
  `productName` varchar(600) DEFAULT NULL,
  `productDescription` text DEFAULT NULL,
  `productColor` varchar(300) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `tax` float DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `brand` varchar(500) DEFAULT NULL,
  `shippingClass` varchar(500) DEFAULT NULL,
  `warranty` float DEFAULT NULL,
  `customFields` text DEFAULT NULL,
  `releaseDate` varchar(500) DEFAULT NULL,
  `complianceInfo` text DEFAULT NULL,
  `metaTitle` varchar(700) DEFAULT NULL,
  `metaDescription` varchar(900) DEFAULT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `productImages` text DEFAULT NULL,
  `videos` text DEFAULT NULL,
  `userAuth` int(11) DEFAULT NULL,
  `productQty` int(11) NOT NULL,
  `productStatus` varchar(300) NOT NULL,
  `deliveryComplete` int(11) NOT NULL,
  `previousPrice` int(11) NOT NULL,
  `uniqueId` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productdetails`
--

INSERT INTO `productdetails` (`id`, `productName`, `productDescription`, `productColor`, `category`, `price`, `discount`, `tax`, `weight`, `brand`, `shippingClass`, `warranty`, `customFields`, `releaseDate`, `complianceInfo`, `metaTitle`, `metaDescription`, `keywords`, `productImages`, `videos`, `userAuth`, `productQty`, `productStatus`, `deliveryComplete`, `previousPrice`, `uniqueId`) VALUES
(79, 'Lenovo Tab M10 Plus (3rd Gen) 6GB Ram 10.61 Inch Display Frost Blue Tablet', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam quae error aspernatur laborum perspiciatis. Minus, sapiente? Distinctio dolor architecto voluptates, officia aperiam sit voluptatem hic quas! Dolore, tenetur repudiandae qui quibusdam magnam consequatur soluta distinctio vitae excepturi atque veniam beatae ex repellendus? Sapiente, velit sit alias porro modi officiis odio minima doloribus iusto placeat minus excepturi commodi eos maiores eum eveniet in laborum? Voluptatum tempora suscipit, deserunt, recusandae voluptates laudantium iste distinctio voluptatibus nostrum odio labore. Veniam, dolorum, illum eum magni quos debitis distinctio fuga minus quisquam blanditiis ea optio quis vero assumenda consequuntur explicabo nisi necessitatibus accusantium nemo totam.', '#000000', 31, 23, 0, 0, 0, '', '', 0, '', '14-06-2024 03:04:32 PM', '', '', '', '', 'lenovo-tab-m10-plus-3rd-gen-6gb-ram-1061-inch-11717303679.webp, lenovo-tab-m10-plus-3rd-gen-6gb-ram-1061-inch-21717303680.webp, lenovo-tab-m10-plus-3rd-gen-6gb-ram-1061-inch-31717303680.webp, lenovo-tab-m10-plus-3rd-gen-6gb-ram-1061-inch-41717304340 (1).webp, lenovo-tab-m10-plus-3rd-gen-6gb-ram-1061-inch-41717304340.webp', '', 2, 32, '', 0, 0, '666c06fe2f99714062024030150PM'),
(80, 'Samsung Galaxy Tab A9+ (Wi-Fi) Qualcomm SM6375 Snapdragon 695 5G Octa-Core Processor 4GB RAM, 64GB ROM 11 Inch Silver Tablet #SM-X210NZSAMEA', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam quae error aspernatur laborum perspiciatis. Minus, sapiente? Distinctio dolor architecto voluptates, officia aperiam sit voluptatem hic quas! Dolore, tenetur repudiandae qui quibusdam magnam consequatur soluta distinctio vitae excepturi atque veniam beatae ex repellendus? Sapiente, velit sit alias porro modi officiis odio minima doloribus iusto placeat minus excepturi commodi eos maiores eum eveniet in laborum? Voluptatum tempora suscipit, deserunt, recusandae voluptates laudantium iste distinctio voluptatibus nostrum odio labore. Veniam, dolorum, illum eum magni quos debitis distinctio fuga minus quisquam blanditiis ea optio quis vero assumenda consequuntur explicabo nisi necessitatibus accusantium nemo totam.', '#000000', 31, 123, 0, 0, 0, '', '', 0, '', '14-06-2024 03:06:29 PM', '', '', '', '', 'samsung-galaxy-tab-a9-wi-fi-qualcomm-sm6375-11709371794.webp, samsung-galaxy-tab-a9-wi-fi-qualcomm-sm6375-31709371795.webp, samsung-galaxy-tab-a9-wi-fi-qualcomm-sm6375-41709371795.webp, samsung-galaxy-tab-a9-wi-fi-qualcomm-sm6375-51709371795.webp', '', 2, 6, '', 0, 0, '666c06fe2f99714062024030150PM'),
(81, 'Amazon Fire 7 (9th Gen) (Quad Core 1.3 GHz, 1GB RAM, 16GB Storage, 7 Inch Display) Sage Tablet with Alexa Apps', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam quae error aspernatur laborum perspiciatis. Minus, sapiente? Distinctio dolor architecto voluptates, officia aperiam sit voluptatem hic quas! Dolore, tenetur repudiandae qui quibusdam magnam consequatur soluta distinctio vitae excepturi atque veniam beatae ex repellendus? Sapiente, velit sit alias porro modi officiis odio minima doloribus iusto placeat minus excepturi commodi eos maiores eum eveniet in laborum? Voluptatum tempora suscipit, deserunt, recusandae voluptates laudantium iste distinctio voluptatibus nostrum odio labore. Veniam, dolorum, illum eum magni quos debitis distinctio fuga minus quisquam blanditiis ea optio quis vero assumenda consequuntur explicabo nisi necessitatibus accusantium nemo totam.', '#000000', 31, 21, 0, 0, 0, '', '', 0, '', '14-06-2024 03:08:21 PM', '', '', '', '', 'amazon-fire-7-9th-gen-quad-core-13-ghz-1gb-11715403024.webp, amazon-fire-7-9th-gen-quad-core-13-ghz-1gb-21715403024.webp, amazon-fire-7-9th-gen-quad-core-13-ghz-1gb-31715403024.webp, amazon-fire-7-9th-gen-quad-core-13-ghz-1gb-41715403025.webp, amazon-fire-7-9th-gen-quad-core-13-ghz-1gb-51715403025.webp', '', 2, 0, '', 0, 0, '666c06fe2f99714062024030150PM'),
(82, 'Lenovo Qitian K11 TB-J6C6F (Wifi) Octa Core Mediatek Helio G90T 6GB, 128GB 11 inch 2K IPS Display Slate Grey Tablet #ZAA10001CN', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam quae error aspernatur laborum perspiciatis. Minus, sapiente? Distinctio dolor architecto voluptates, officia aperiam sit voluptatem hic quas! Dolore, tenetur repudiandae qui quibusdam magnam consequatur soluta distinctio vitae excepturi atque veniam beatae ex repellendus? Sapiente, velit sit alias porro modi officiis odio minima doloribus iusto placeat minus excepturi commodi eos maiores eum eveniet in laborum? Voluptatum tempora suscipit, deserunt, recusandae voluptates laudantium iste distinctio voluptatibus nostrum odio labore. Veniam, dolorum, illum eum magni quos debitis distinctio fuga minus quisquam blanditiis ea optio quis vero assumenda consequuntur explicabo nisi necessitatibus accusantium nemo totam.', '#000000', 31, 11, 0, 0, 0, '', '', 0, '', '14-06-2024 03:09:38 PM', '', '', '', '', 'lenovo-qitian-k11-tb-j6c6f-wifi-octa-core-11708601346.webp, lenovo-qitian-k11-tb-j6c6f-wifi-octa-core-21708601346.webp, lenovo-qitian-k11-tb-j6c6f-wifi-octa-core-31708601346.webp', '', 2, 29, '', 0, 0, '666c06fe2f99714062024030150PM'),
(83, 'Lenovo ThinkCentre Neo 50t 12th Gen Intel Core i3 12100 8GB RAM Black Tower Brand PC #11SES0HM00 (8GB RAM + 260W PSU)', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam quae error aspernatur laborum perspiciatis. Minus, sapiente? Distinctio dolor architecto voluptates, officia aperiam sit voluptatem hic quas! Dolore, tenetur repudiandae qui quibusdam magnam consequatur soluta distinctio vitae excepturi atque veniam beatae ex repellendus? Sapiente, velit sit alias porro modi officiis odio minima doloribus iusto placeat minus excepturi commodi eos maiores eum eveniet in laborum? Voluptatum tempora suscipit, deserunt, recusandae voluptates laudantium iste distinctio voluptatibus nostrum odio labore. Veniam, dolorum, illum eum magni quos debitis distinctio fuga minus quisquam blanditiis ea optio quis vero assumenda consequuntur explicabo nisi necessitatibus accusantium nemo totam.', '#000000', 28, 32, 0, 0, 0, '', '', 0, '', '14-06-2024 03:10:45 PM', '', '', '', '', 'lenovo-thinkcentre-neo-50t-12th-gen-intel-core-i3-11698646537.webp, lenovo-thinkcentre-neo-50t-12th-gen-intel-core-i3-21698646537.webp, lenovo-thinkcentre-neo-50t-12th-gen-intel-core-i3-41698646538.webp, lenovo-thinkcentre-neo-50t-12th-gen-intel-core-i3-51698646538.webp', '', 2, 22, '', 0, 0, '666c06fe2f99714062024030150PM'),
(84, 'HP ProDesk 400 G7 MT 10th Gen Intel Core i3 10100 4GB RAM, 1TB HDD Mid Tower Brand PC #31P82PA', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam quae error aspernatur laborum perspiciatis. Minus, sapiente? Distinctio dolor architecto voluptates, officia aperiam sit voluptatem hic quas! Dolore, tenetur repudiandae qui quibusdam magnam consequatur soluta distinctio vitae excepturi atque veniam beatae ex repellendus? Sapiente, velit sit alias porro modi officiis odio minima doloribus iusto placeat minus excepturi commodi eos maiores eum eveniet in laborum? Voluptatum tempora suscipit, deserunt, recusandae voluptates laudantium iste distinctio voluptatibus nostrum odio labore. Veniam, dolorum, illum eum magni quos debitis distinctio fuga minus quisquam blanditiis ea optio quis vero assumenda consequuntur explicabo nisi necessitatibus accusantium nemo totam.', '#000000', 28, 25, 0, 0, 0, '', '', 0, '', '14-06-2024 03:12:09 PM', '', '', '', '', 'hp-prodesk-400-g7-mt-10th-gen-intel-core-i3-10100-21717921235.webp, hp-prodesk-400-g7-mt-10th-gen-intel-core-i3-10100-31717921236.webp, hp-prodesk-400-g7-mt-10th-gen-intel-core-i3-10100-51704697440.webp', '', 2, 66, '', 0, 0, '666c06fe2f99714062024030150PM'),
(85, 'HP ProDesk 400 G7 MT 10th Gen Intel Core i3 10100 8GB RAM 1TB HDD Mid Tower Brand PC #31P84PA', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam quae error aspernatur laborum perspiciatis. Minus, sapiente? Distinctio dolor architecto voluptates, officia aperiam sit voluptatem hic quas! Dolore, tenetur repudiandae qui quibusdam magnam consequatur soluta distinctio vitae excepturi atque veniam beatae ex repellendus? Sapiente, velit sit alias porro modi officiis odio minima doloribus iusto placeat minus excepturi commodi eos maiores eum eveniet in laborum? Voluptatum tempora suscipit, deserunt, recusandae voluptates laudantium iste distinctio voluptatibus nostrum odio labore. Veniam, dolorum, illum eum magni quos debitis distinctio fuga minus quisquam blanditiis ea optio quis vero assumenda consequuntur explicabo nisi necessitatibus accusantium nemo totam.', '#000000', 28, 20, 0, 0, 0, '', '', 0, '', '14-06-2024 03:13:49 PM', '', '', '', '', 'hp-prodesk-400-g7-mt-10th-gen-intel-core-i3-10100-21654601640.webp, hp-prodesk-400-g7-mt-10th-gen-intel-core-i3-10100-41685767036.webp, hp-prodesk-400-g7-mt-10th-gen-intel-core-i3-10100-41716972375.webp', '', 2, 344, '', 0, 0, '666c06fe2f99714062024030150PM'),
(86, 'META Quest 2 128GB All-in-One VR System', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam quae error aspernatur laborum perspiciatis. Minus, sapiente? Distinctio dolor architecto voluptates, officia aperiam sit voluptatem hic quas! Dolore, tenetur repudiandae qui quibusdam magnam consequatur soluta distinctio vitae excepturi atque veniam beatae ex repellendus? Sapiente, velit sit alias porro modi officiis odio minima doloribus iusto placeat minus excepturi commodi eos maiores eum eveniet in laborum? Voluptatum tempora suscipit, deserunt, recusandae voluptates laudantium iste distinctio voluptatibus nostrum odio labore. Veniam, dolorum, illum eum magni quos debitis distinctio fuga minus quisquam blanditiis ea optio quis vero assumenda consequuntur explicabo nisi necessitatibus accusantium nemo totam.', '#000000', 29, 55, 0, 0, 0, '', '', 0, '', '14-06-2024 03:16:14 PM', '', '', '', '', 'meta-quest-2-128gb-all-in-one-vr-51708163345.webp, meta-quest-2-128-gb-all-in-one-vr-system-no-11659770166.webp, meta-quest-2-128-gb-all-in-one-vr-system-no-21659770166.webp, meta-quest-2-128-gb-all-in-one-vr-system-no-31659770167.webp, meta-quest-2-128-gb-all-in-one-vr-system-no-41659770167.webp', '', 1, 5, '', 0, 0, '6653e69a69bd127052024074914AM'),
(87, 'META Quest 2 256GB All-in-One VR System', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam quae error aspernatur laborum perspiciatis. Minus, sapiente? Distinctio dolor architecto voluptates, officia aperiam sit voluptatem hic quas! Dolore, tenetur repudiandae qui quibusdam magnam consequatur soluta distinctio vitae excepturi atque veniam beatae ex repellendus? Sapiente, velit sit alias porro modi officiis odio minima doloribus iusto placeat minus excepturi commodi eos maiores eum eveniet in laborum? Voluptatum tempora suscipit, deserunt, recusandae voluptates laudantium iste distinctio voluptatibus nostrum odio labore. Veniam, dolorum, illum eum magni quos debitis distinctio fuga minus quisquam blanditiis ea optio quis vero assumenda consequuntur explicabo nisi necessitatibus accusantium nemo totam.', '#000000', 29, 32, 0, 0, 0, '', '', 0, '', '14-06-2024 03:16:37 PM', '', '', '', '', 'meta-quest-2-256gb-all-in-one-vr-system-no-11663736690.webp, meta-quest-2-256gb-all-in-one-vr-system-no-21663736690.webp, meta-quest-2-256gb-all-in-one-vr-system-no-31679054913.webp, meta-quest-2-256gb-all-in-one-vr-system-no-41679054913.webp', '', 1, 3, '', 0, 0, '6653e69a69bd127052024074914AM'),
(88, 'META Quest Pro Qualcomm Snapdragon XR2+ Black All-in-One VR System (No Warranty)', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam quae error aspernatur laborum perspiciatis. Minus, sapiente? Distinctio dolor architecto voluptates, officia aperiam sit voluptatem hic quas! Dolore, tenetur repudiandae qui quibusdam magnam consequatur soluta distinctio vitae excepturi atque veniam beatae ex repellendus? Sapiente, velit sit alias porro modi officiis odio minima doloribus iusto placeat minus excepturi commodi eos maiores eum eveniet in laborum? Voluptatum tempora suscipit, deserunt, recusandae voluptates laudantium iste distinctio voluptatibus nostrum odio labore. Veniam, dolorum, illum eum magni quos debitis distinctio fuga minus quisquam blanditiis ea optio quis vero assumenda consequuntur explicabo nisi necessitatibus accusantium nemo totam.', '#000000', 29, 33, 0, 0, 0, '', '', 0, '', '14-06-2024 03:18:18 PM', '', '', '', '', 'meta-quest-pro-qualcomm-snapdragon-xr2-black-11704789071.webp, meta-quest-pro-qualcomm-snapdragon-xr2-black-21704789072.webp, meta-quest-pro-qualcomm-snapdragon-xr2-black-31704789072.webp, meta-quest-pro-qualcomm-snapdragon-xr2-black-41704789072.webp, meta-quest-pro-qualcomm-snapdragon-xr2-black-51704789073.webp, meta-quest-pro-qualcomm-snapdragon-xr2-black-61704789073.webp', '', 1, 7, '', 0, 0, '6653e69a69bd127052024074914AM'),
(89, 'Asus ROG Ally RC71L (2023) Gaming Console #RC71L-NH001W', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam quae error aspernatur laborum perspiciatis. Minus, sapiente? Distinctio dolor architecto voluptates, officia aperiam sit voluptatem hic quas! Dolore, tenetur repudiandae qui quibusdam magnam consequatur soluta distinctio vitae excepturi atque veniam beatae ex repellendus? Sapiente, velit sit alias porro modi officiis odio minima doloribus iusto placeat minus excepturi commodi eos maiores eum eveniet in laborum? Voluptatum tempora suscipit, deserunt, recusandae voluptates laudantium iste distinctio voluptatibus nostrum odio labore. Veniam, dolorum, illum eum magni quos debitis distinctio fuga minus quisquam blanditiis ea optio quis vero assumenda consequuntur explicabo nisi necessitatibus accusantium nemo totam.', '#000000', 29, 44, 0, 0, 0, '', '', 0, '', '14-06-2024 03:19:20 PM', '', '', '', '', 'asus-rog-ally-rc71l-2023-gaming-console-11702104285.webp, asus-rog-ally-rc71l-2023-gaming-console-31702104285.webp, asus-rog-ally-rc71l-2023-gaming-console-41702104285.webp, asus-rog-ally-rc71l-2023-gaming-console-51702104286.webp', '', 1, 8, '', 0, 0, '6653e69a69bd127052024074914AM'),
(90, 'Asus VP247HAE 23.6 inch FHD HDMI, VGA Eye Care Monitor', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam quae error aspernatur laborum perspiciatis. Minus, sapiente? Distinctio dolor architecto voluptates, officia aperiam sit voluptatem hic quas! Dolore, tenetur repudiandae qui quibusdam magnam consequatur soluta distinctio vitae excepturi atque veniam beatae ex repellendus? Sapiente, velit sit alias porro modi officiis odio minima doloribus iusto placeat minus excepturi commodi eos maiores eum eveniet in laborum? Voluptatum tempora suscipit, deserunt, recusandae voluptates laudantium iste distinctio voluptatibus nostrum odio labore. Veniam, dolorum, illum eum magni quos debitis distinctio fuga minus quisquam blanditiis ea optio quis vero assumenda consequuntur explicabo nisi necessitatibus accusantium nemo totam.', '#000000', 30, 26, 0, 0, 0, '', '', 0, '', '14-06-2024 03:21:18 PM', '', '', '', '', 'asus-vp247hae-236-inch-fhd-hdmi-vga-eye-care-11714812593.webp, asus-vp247hae-236-inch-fhd-hdmi-vga-eye-care-21714812593.webp, asus-vp247hae-236-inch-fhd-hdmi-vga-eye-care-31714812594.webp, asus-vp247hae-236-inch-fhd-hdmi-vga-eye-care-41714812594.webp', '', 1, 8, '', 0, 0, '6653e69a69bd127052024074914AM'),
(91, 'LG 19M38A 18.5 Inch HD LED Backlight Monitor (VGA Port)', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam quae error aspernatur laborum perspiciatis. Minus, sapiente? Distinctio dolor architecto voluptates, officia aperiam sit voluptatem hic quas! Dolore, tenetur repudiandae qui quibusdam magnam consequatur soluta distinctio vitae excepturi atque veniam beatae ex repellendus? Sapiente, velit sit alias porro modi officiis odio minima doloribus iusto placeat minus excepturi commodi eos maiores eum eveniet in laborum? Voluptatum tempora suscipit, deserunt, recusandae voluptates laudantium iste distinctio voluptatibus nostrum odio labore. Veniam, dolorum, illum eum magni quos debitis distinctio fuga minus quisquam blanditiis ea optio quis vero assumenda consequuntur explicabo nisi necessitatibus accusantium nemo totam.', '#000000', 30, 45, 0, 0, 0, '', '', 0, '', '14-06-2024 03:22:58 PM', '', '', '', '', 'lg-19m38a-185-inch-hd-led-backlight-monitor-vga-11714815941.webp, lg-19m38a-185-inch-hd-led-backlight-monitor-vga-21714815942.webp, lg-19m38a-185-inch-hd-led-backlight-monitor-vga-41714815942.webp, lg-19m38a-185-inch-hd-led-backlight-monitor-vga-51714815942.webp', '', 1, 11, '', 0, 0, '6653e69a69bd127052024074914AM'),
(92, 'HP P204v 19.5 Inch HD+ LED HDMI, VGA Monitor #5RD66AA', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam quae error aspernatur laborum perspiciatis. Minus, sapiente? Distinctio dolor architecto voluptates, officia aperiam sit voluptatem hic quas! Dolore, tenetur repudiandae qui quibusdam magnam consequatur soluta distinctio vitae excepturi atque veniam beatae ex repellendus? Sapiente, velit sit alias porro modi officiis odio minima doloribus iusto placeat minus excepturi commodi eos maiores eum eveniet in laborum? Voluptatum tempora suscipit, deserunt, recusandae voluptates laudantium iste distinctio voluptatibus nostrum odio labore. Veniam, dolorum, illum eum magni quos debitis distinctio fuga minus quisquam blanditiis ea optio quis vero assumenda consequuntur explicabo nisi necessitatibus accusantium nemo totam.', '#000000', 30, 14, 0, 0, 0, '', '', 0, '', '14-06-2024 03:23:43 PM', '', '', '', '', 'hp-p204v-195-inch-hd-led-hdmi-vga-monitor-51656219348.webp, hp-p204v-195-inch-hd-led-hdmi-vga-monitor-61656219349.webp, hp-p204v-195-inch-hd-led-monitor-hdmi-vga-11574338056.webp, hp-p204v-195-inch-hd-led-monitor-hdmi-vga-21574338056.webp, hp-p204v-195-inch-hd-led-monitor-hdmi-vga-41574338057.webp', '', 1, 5, '', 0, 0, '6653e69a69bd127052024074914AM'),
(93, 'Dell E1920H 18.5 Inch HD (1366x768) WideScreen LED Monitor (DP, VGA)', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam quae error aspernatur laborum perspiciatis. Minus, sapiente? Distinctio dolor architecto voluptates, officia aperiam sit voluptatem hic quas! Dolore, tenetur repudiandae qui quibusdam magnam consequatur soluta distinctio vitae excepturi atque veniam beatae ex repellendus? Sapiente, velit sit alias porro modi officiis odio minima doloribus iusto placeat minus excepturi commodi eos maiores eum eveniet in laborum? Voluptatum tempora suscipit, deserunt, recusandae voluptates laudantium iste distinctio voluptatibus nostrum odio labore. Veniam, dolorum, illum eum magni quos debitis distinctio fuga minus quisquam blanditiis ea optio quis vero assumenda consequuntur explicabo nisi necessitatibus accusantium nemo totam.', '#000000', 30, 31, 0, 0, 0, '', '', 0, '', '14-06-2024 03:24:43 PM', '', '', '', '', 'dell-e1920h-185-inch-hd-1366x768-widescreen-11714813771.webp, dell-e1920h-185-inch-hd-1366x768-widescreen-21714813771.webp, dell-e1920h-185-inch-hd-1366x768-widescreen-41714813772.webp, dell-e1920h-185-inch-hd-1366x768-widescreen-51714813772.webp', '', 1, 9, '', 0, 0, '6653e69a69bd127052024074914AM'),
(94, 'Acer Aspire 3 A315-59-56VC Intel Core i5 1235U 8GB RAM, 512GB SSD 15.6 Inch FHD Display Pure Silver Laptop', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam quae error aspernatur laborum perspiciatis. Minus, sapiente? Distinctio dolor architecto voluptates, officia aperiam sit voluptatem hic quas! Dolore, tenetur repudiandae qui quibusdam magnam consequatur soluta distinctio vitae excepturi atque veniam beatae ex repellendus? Sapiente, velit sit alias porro modi officiis odio minima doloribus iusto placeat minus excepturi commodi eos maiores eum eveniet in laborum? Voluptatum tempora suscipit, deserunt, recusandae voluptates laudantium iste distinctio voluptatibus nostrum odio labore. Veniam, dolorum, illum eum magni quos debitis distinctio fuga minus quisquam blanditiis ea optio quis vero assumenda consequuntur explicabo nisi necessitatibus accusantium nemo totam.', '#000000', 27, 21, 0, 0, 0, '', '', 0, '', '14-06-2024 03:26:15 PM', '', '', '', '', 'acer-aspire-3-a315-59-56vc-intel-core-i5-1235u-11703411518.webp, acer-aspire-3-a315-59-56vc-intel-core-i5-1235u-31703411519.webp, acer-aspire-3-a315-59-56vc-intel-core-i5-1235u-41703411519.webp, acer-aspire-3-a315-59-56vc-intel-core-i5-1235u-51703411520.webp, acer-aspire-3-a315-59-56vc-intel-core-i5-1235u-51717073760.webp', '', 1, 25, '', 0, 0, '6653e69a69bd127052024074914AM'),
(95, 'Gigabyte Gaming G5 KE Intel Core i5 12500H 8GB RAM 512GB SSD 15.6 Inch FHD Display Matte Black Gaming Laptop', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam quae error aspernatur laborum perspiciatis. Minus, sapiente? Distinctio dolor architecto voluptates, officia aperiam sit voluptatem hic quas! Dolore, tenetur repudiandae qui quibusdam magnam consequatur soluta distinctio vitae excepturi atque veniam beatae ex repellendus? Sapiente, velit sit alias porro modi officiis odio minima doloribus iusto placeat minus excepturi commodi eos maiores eum eveniet in laborum? Voluptatum tempora suscipit, deserunt, recusandae voluptates laudantium iste distinctio voluptatibus nostrum odio labore. Veniam, dolorum, illum eum magni quos debitis distinctio fuga minus quisquam blanditiis ea optio quis vero assumenda consequuntur explicabo nisi necessitatibus accusantium nemo totam.', '#000000', 27, 36, 0, 0, 0, '', '', 0, '', '14-06-2024 03:26:34 PM', '', '', '', '', 'gigabyte-gaming-g5-ke-intel-core-i5-12500h-156-11671437317.webp, gigabyte-gaming-g5-ke-intel-core-i5-12500h-156-21671437317.webp, gigabyte-gaming-g5-ke-intel-core-i5-12500h-156-31671437317.webp, gigabyte-gaming-g5-ke-intel-core-i5-12500h-156-41671437318.webp', '', 1, 5, '', 0, 0, '6653e69a69bd127052024074914AM'),
(96, 'Asus VivoBook S15 S513EQ Intel Core i5 1135G7 8GB RAM 512GB SSD 15.6 Inch FHD OLED Display Hearty Gold Laptop', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam quae error aspernatur laborum perspiciatis. Minus, sapiente? Distinctio dolor architecto voluptates, officia aperiam sit voluptatem hic quas! Dolore, tenetur repudiandae qui quibusdam magnam consequatur soluta distinctio vitae excepturi atque veniam beatae ex repellendus? Sapiente, velit sit alias porro modi officiis odio minima doloribus iusto placeat minus excepturi commodi eos maiores eum eveniet in laborum? Voluptatum tempora suscipit, deserunt, recusandae voluptates laudantium iste distinctio voluptatibus nostrum odio labore. Veniam, dolorum, illum eum magni quos debitis distinctio fuga minus quisquam blanditiis ea optio quis vero assumenda consequuntur explicabo nisi necessitatibus accusantium nemo totam.', '#000000', 27, 65, 0, 0, 0, '', '', 0, '', '14-06-2024 03:27:17 PM', '', '', '', '', 'asus-vivobook-s15-s513eq-intel-core-i5-1135g7-8gb-11709614892.webp, asus-vivobook-s15-s513eq-intel-core-i5-1135g7-8gb-21709614892.webp, asus-vivobook-s15-s513eq-intel-core-i5-1135g7-8gb-31709614893.webp', '', 1, 14, '', 0, 0, '6653e69a69bd127052024074914AM'),
(97, 'Chuwi GemiBook XPro Intel Core N100 8GB RAM 256GB SSD 14.1 Inch FHD Display Grey Laptop', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam quae error aspernatur laborum perspiciatis. Minus, sapiente? Distinctio dolor architecto voluptates, officia aperiam sit voluptatem hic quas! Dolore, tenetur repudiandae qui quibusdam magnam consequatur soluta distinctio vitae excepturi atque veniam beatae ex repellendus? Sapiente, velit sit alias porro modi officiis odio minima doloribus iusto placeat minus excepturi commodi eos maiores eum eveniet in laborum? Voluptatum tempora suscipit, deserunt, recusandae voluptates laudantium iste distinctio voluptatibus nostrum odio labore. Veniam, dolorum, illum eum magni quos debitis distinctio fuga minus quisquam blanditiis ea optio quis vero assumenda consequuntur explicabo nisi necessitatibus accusantium nemo totam.', '#000000', 27, 35, 0, 0, 0, '', '', 0, '', '14-06-2024 03:28:02 PM', '', '', '', '', 'chuwi-gemibook-xpro-intel-core-n100-8gb-ram-256gb-11703580649.webp, chuwi-gemibook-xpro-intel-core-n100-8gb-ram-256gb-31703580650.webp, chuwi-gemibook-xpro-intel-core-n100-8gb-ram-256gb-51703580650.webp, chuwi-gemibook-xpro-intel-core-n100-8gb-ram-256gb-71703580651.webp', '', 1, 9, '', 0, 0, '6653e69a69bd127052024074914AM'),
(98, 'Sony ZV-1F 20.1 MP 4K Digital Camera', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam quae error aspernatur laborum perspiciatis. Minus, sapiente? Distinctio dolor architecto voluptates, officia aperiam sit voluptatem hic quas! Dolore, tenetur repudiandae qui quibusdam magnam consequatur soluta distinctio vitae excepturi atque veniam beatae ex repellendus? Sapiente, velit sit alias porro modi officiis odio minima doloribus iusto placeat minus excepturi commodi eos maiores eum eveniet in laborum? Voluptatum tempora suscipit, deserunt, recusandae voluptates laudantium iste distinctio voluptatibus nostrum odio labore. Veniam, dolorum, illum eum magni quos debitis distinctio fuga minus quisquam blanditiis ea optio quis vero assumenda consequuntur explicabo nisi necessitatibus accusantium nemo totam.', '#000000', 32, 36, 0, 0, 0, '', '', 0, '', '14-06-2024 03:29:25 PM', '', '', '', '', 'sony-zv-1f-201-mp-4k-digital-11668232761.webp, sony-zv-1f-201-mp-4k-digital-21668232761.webp, sony-zv-1f-201-mp-4k-digital-31668232761.webp, sony-zv-1f-201-mp-4k-digital-41668232762.webp', '', 1, 8, '', 0, 0, '6653e69a69bd127052024074914AM'),
(99, 'Sony ZV-1 20.1 MP 4K Digital Camera', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam quae error aspernatur laborum perspiciatis. Minus, sapiente? Distinctio dolor architecto voluptates, officia aperiam sit voluptatem hic quas! Dolore, tenetur repudiandae qui quibusdam magnam consequatur soluta distinctio vitae excepturi atque veniam beatae ex repellendus? Sapiente, velit sit alias porro modi officiis odio minima doloribus iusto placeat minus excepturi commodi eos maiores eum eveniet in laborum? Voluptatum tempora suscipit, deserunt, recusandae voluptates laudantium iste distinctio voluptatibus nostrum odio labore. Veniam, dolorum, illum eum magni quos debitis distinctio fuga minus quisquam blanditiis ea optio quis vero assumenda consequuntur explicabo nisi necessitatibus accusantium nemo totam.', '#000000', 32, 96, 0, 0, 0, '', '', 0, '', '14-06-2024 03:30:03 PM', '', '', '', '', 'sony-zv-1-201-mp-4k-digital-11642239009.webp, sony-zv-1-201-mp-4k-digital-21642239009.webp, sony-zv-1-201-mp-4k-digital-31642239010.webp, sony-zv-1-201-mp-4k-digital-41642239010.webp', '', 1, 7, '', 0, 0, '6653e69a69bd127052024074914AM');

-- --------------------------------------------------------

--
-- Table structure for table `usercomment`
--

CREATE TABLE `usercomment` (
  `id` int(11) NOT NULL,
  `name` varchar(300) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `time` varchar(600) DEFAULT NULL,
  `userAuth` int(11) DEFAULT NULL,
  `postId` int(11) DEFAULT NULL,
  `uniqueId` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `pass` varchar(500) DEFAULT NULL,
  `conPass` varchar(500) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `userComment` text DEFAULT NULL,
  `userRoll` int(11) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `img` varchar(600) DEFAULT NULL,
  `uniqueId` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `pass`, `conPass`, `date`, `userComment`, `userRoll`, `email`, `img`, `uniqueId`) VALUES
(48, 'admin', '$2y$10$OquX9WV6CIsqwgTajY.y2.ZH.rGPyFos/CFR4N5UJd/vwCwh2rDYG', '$2y$10$IDxgCp.mgsq1AwjC/QnlAeno7snJeE1m5zA3x8zfRUZWijfHGie6i', '27-05-2024 07:48:58 AM', 'admin', 1, 'admin@gmail.com', NULL, '6653e69a69bd127052024074914AM'),
(68, 'Manager', '$2y$10$GHZDPEJE1X/jpRg3A6VhUOOyVhkvAF37kLFHK7kjeUnqpYHuPBzxK', '$2y$10$MjUH0JfzXQnI0d5Pc8GkKuKVHryb0WrGNiCcsDQusu/FxhV9NHqn.', '14-06-2024 02:59:18 PM', 'Fast manager At this time\r\n', 2, 'manager@gmail.com', '445782839_122123112524280279_5278681660228043620_n.jpg', '666c06fe2f99714062024030150PM'),
(69, 'Md Shafikul Islam', '$2y$10$ZrtS3mLlS2LiX8ErxJXAkuwe2ilt4P0a.ZY3U.YchIEeLkU56ZwxO', '$2y$10$jbaasoBJ4eil2VaxcdT00OFUNLo7Gm8zJ.z6CPo.eXhFwx8p7P0I2', '14-06-2024 03:39:58 PM', 'OutSide User', 4, 'shaifk108@gmail.com', NULL, '666c100a5b06814062024034026PM');

-- --------------------------------------------------------

--
-- Table structure for table `whichlist`
--

CREATE TABLE `whichlist` (
  `id` int(11) NOT NULL,
  `uniqueId` text DEFAULT NULL,
  `productId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `whichlist`
--

INSERT INTO `whichlist` (`id`, `uniqueId`, `productId`) VALUES
(35, '6653e69a69bd127052024074914AM', 81),
(36, '666c100a5b06814062024034026PM', 95);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oldorder`
--
ALTER TABLE `oldorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productcatagory`
--
ALTER TABLE `productcatagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productdetails`
--
ALTER TABLE `productdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usercomment`
--
ALTER TABLE `usercomment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `whichlist`
--
ALTER TABLE `whichlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `oldorder`
--
ALTER TABLE `oldorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `productcatagory`
--
ALTER TABLE `productcatagory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `productdetails`
--
ALTER TABLE `productdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `usercomment`
--
ALTER TABLE `usercomment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `whichlist`
--
ALTER TABLE `whichlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

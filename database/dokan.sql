-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2024 at 01:41 PM
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

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `uniqueId`, `productId`, `Qty`) VALUES
(92, '6653e69a69bd127052024074914AM', 72, 1);

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

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `order_total_price`, `order_user_first_name`, `order_user_last_name`, `order_user_number`, `order_user_street_address`, `order_user_city`, `order_user_state`, `order_user_zip_code`, `order_user_payment_method`, `order_user_card_number`, `order_user_exp`, `order_user_cvv`, `order_unique_id`, `user_unique_id`, `all_product_id`, `user_order_time`, `order_delivery_time`, `status`, `order_user_email`, `user_order_id_qty`) VALUES
(32, 23, 'Md shafikul ', 'islam', 1, 'Mohadevpur', 'Bangladesh', 'naogan', 6520, 1, 0, 0, 0, '666c199724d8314062024042111PM', '666c100a5b06814062024034026PM', '79', '14-06-2024 04:20:57 PM', '', 1, 'oasdjklf@gmail.com', '79,1/');

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
(27, 'laptop', 3, 'laptop-all-laptop Other check', 1, '6653e69a69bd127052024074914AM'),
(28, 'desktop', 3, 'desktop-pc-brand-desktop-pc', 1, '6653e69a69bd127052024074914AM'),
(29, 'gaming', 4, 'gaming-component-gaming-console', 1, '6653e69a69bd127052024074914AM'),
(30, 'Monitor ', 4, 'all-monitor', 1, '6653e69a69bd127052024074914AM'),
(31, 'tablet', 4, 'regular-tablet-amazon', 1, '6653e69a69bd127052024074914AM'),
(32, 'camera', 0, 'compact-camera', 1, '6653e69a69bd127052024074914AM');

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
(79, 'Lenovo Tab M10 Plus (3rd Gen) 6GB Ram 10.61 Inch Display Frost Blue Tablet', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam quae error aspernatur laborum perspiciatis. Minus, sapiente? Distinctio dolor architecto voluptates, officia aperiam sit voluptatem hic quas! Dolore, tenetur repudiandae qui quibusdam magnam consequatur soluta distinctio vitae excepturi atque veniam beatae ex repellendus? Sapiente, velit sit alias porro modi officiis odio minima doloribus iusto placeat minus excepturi commodi eos maiores eum eveniet in laborum? Voluptatum tempora suscipit, deserunt, recusandae voluptates laudantium iste distinctio voluptatibus nostrum odio labore. Veniam, dolorum, illum eum magni quos debitis distinctio fuga minus quisquam blanditiis ea optio quis vero assumenda consequuntur explicabo nisi necessitatibus accusantium nemo totam.', '#000000', 31, 23, 0, 0, 0, '', '', 0, '', '14-06-2024 03:04:32 PM', '', '', '', '', 'lenovo-tab-m10-plus-3rd-gen-6gb-ram-1061-inch-11717303679.webp, lenovo-tab-m10-plus-3rd-gen-6gb-ram-1061-inch-21717303680.webp, lenovo-tab-m10-plus-3rd-gen-6gb-ram-1061-inch-31717303680.webp, lenovo-tab-m10-plus-3rd-gen-6gb-ram-1061-inch-41717304340 (1).webp, lenovo-tab-m10-plus-3rd-gen-6gb-ram-1061-inch-41717304340.webp', '', 2, 31, '', 1, 0, '666c06fe2f99714062024030150PM'),
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
(96, 'Asus VivoBook S15 S513EQ Intel Core i5 1135G7 8GB RAM 512GB SSD 15.6 Inch FHD OLED Display Hearty Gold Laptop', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam quae error aspernatur laborum perspiciatis. Minus, sapiente? Distinctio dolor architecto voluptates, officia aperiam sit voluptatem hic quas! Dolore, tenetur repudiandae qui quibusdam magnam consequatur soluta distinctio vitae excepturi atque veniam beatae ex repellendus? Sapiente, velit sit alias porro modi officiis odio minima doloribus iusto placeat minus excepturi commodi eos maiores eum eveniet in laborum? Voluptatum tempora suscipit, deserunt, recusandae voluptates laudantium iste distinctio voluptatibus nostrum odio labore. Veniam, dolorum, illum eum magni quos debitis distinctio fuga minus quisquam blanditiis ea optio quis vero assumenda consequuntur explicabo nisi necessitatibus accusantium nemo totam.', '#000000', 27, 65, 0, 0, 0, '', '', 0, '', '14-06-2024 03:27:17 PM', '', '', '', '', 'asus-vivobook-s15-s513eq-intel-core-i5-1135g7-8gb-11709614892.webp, asus-vivobook-s15-s513eq-intel-core-i5-1135g7-8gb-21709614892.webp, asus-vivobook-s15-s513eq-intel-core-i5-1135g7-8gb-31709614893.webp', '', 1, 14, '', 0, 0, '6653e69a69bd127052024074914AM');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `heading` varchar(400) NOT NULL,
  `image` text NOT NULL,
  `where_slider` varchar(300) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `heading`, `image`, `where_slider`, `description`) VALUES
(18, 'Fast Test Slider', 'product.jpg', 'homeTop', 'Fast Test Slider'),
(19, 'Othe rtses', 'la-formule-femme-secrete-arrive....png', 'homeTop', 'Othe rtses');

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
  `uniqueId` text NOT NULL,
  `commentSeenId` text NOT NULL,
  `comment_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usercomment`
--

INSERT INTO `usercomment` (`id`, `name`, `comment`, `time`, `userAuth`, `postId`, `uniqueId`, `commentSeenId`, `comment_time`) VALUES
(47, 'Runjila Akter', 'industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop', '24-06-2024 11:29:30 AM', 4, 93, '667903e4e036924062024112804AM', '6653e69a69bd127052024074914AM,667903e4e036924062024112804AM,667a55d621e2e25062024112958AM,', '2024-06-27 07:12:49'),
(50, 'sdfsdf', 'ed the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.', '24-06-2024 12:41:14 PM', 1, 94, '6653e69a69bd127052024074914AM', '6653e69a69bd127052024074914AM,', '2024-06-27 07:12:49'),
(51, 'adsfasf', 'asdfsdafsadfasdf', '24-06-2024 01:20:36 PM', 1, 94, '6653e69a69bd127052024074914AM', '6653e69a69bd127052024074914AM,', '2024-06-27 07:12:49'),
(52, 'sdfsdfdsf', 'sdfsfsdf', '24-06-2024 02:49:20 PM', 1, 96, '6653e69a69bd127052024074914AM', '6653e69a69bd127052024074914AM,667a55d621e2e25062024112958AM,667903e4e036924062024112804AM,', '2024-06-27 07:12:49'),
(53, 'sfsf', 'sfsdf', '24-06-2024 02:49:24 PM', 1, 96, '6653e69a69bd127052024074914AM', '6653e69a69bd127052024074914AM,', '2024-06-27 07:12:49'),
(54, 'sdfsdf', 'sdfsdfsdf', '24-06-2024 02:49:33 PM', 1, 95, '6653e69a69bd127052024074914AM', '6653e69a69bd127052024074914AM,', '2024-06-27 07:12:49'),
(55, 'sfsdf', 'sdfsfsdf', '24-06-2024 02:49:40 PM', 1, 86, '6653e69a69bd127052024074914AM', '6653e69a69bd127052024074914AM,', '2024-06-27 07:12:49'),
(56, 'dfsdf', 'sdfsdf', '24-06-2024 05:33:55 PM', 1, 93, '6653e69a69bd127052024074914AM', '6653e69a69bd127052024074914AM,', '2024-06-27 07:12:49'),
(57, 'sdfsdf', 'sdfsdf', '25-06-2024 02:04:54 PM', 1, 93, '6653e69a69bd127052024074914AM', '6653e69a69bd127052024074914AM,', '2024-06-27 07:12:49'),
(58, 'Test Comment', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', '26-06-2024 11:04:51 AM', 1, 89, '6653e69a69bd127052024074914AM', '6653e69a69bd127052024074914AM,6653e69a69bd127052024074914AM,', '2024-06-27 07:12:49'),
(59, 'Other Test COmmenrt', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#039;Content here, content here&#039;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#039;lorem ipsum&#039; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n', '26-06-2024 11:05:15 AM', 1, 80, '6653e69a69bd127052024074914AM', '6653e69a69bd127052024074914AM,', '2024-06-28 06:50:08'),
(60, 'sfsdf', 'sdfsdf', '26-06-2024 01:17:09 PM', 1, 89, '6653e69a69bd127052024074914AM', '6653e69a69bd127052024074914AM,', '2024-06-27 07:12:49'),
(61, 'dfsdfa', 'adsfasdf', '26-06-2024 01:17:14 PM', 1, 89, '6653e69a69bd127052024074914AM', '6653e69a69bd127052024074914AM,', '2024-06-27 07:12:49'),
(62, 'new comment', 'new comment', '26-06-2024 02:06:44 PM', 1, 95, '6653e69a69bd127052024074914AM', '6653e69a69bd127052024074914AM,', '2024-06-27 07:12:49'),
(63, 'sdfsdf', 'sdfsdfsdf', '26-06-2024 04:11:19 PM', 1, 83, '6653e69a69bd127052024074914AM', '6653e69a69bd127052024074914AM,', '2024-06-28 05:47:01'),
(64, 'fgsdfg', 'dsfgdfsg', '26-06-2024 04:11:35 PM', 1, 83, '6653e69a69bd127052024074914AM', '6653e69a69bd127052024074914AM,', '2024-06-28 05:47:03'),
(65, 'Md shafikul islam', 'loremloremloremloremloremloremloremlorem', '26-06-2024 04:11:51 PM', 1, 83, '6653e69a69bd127052024074914AM', '6653e69a69bd127052024074914AM,', '2024-06-28 06:49:59'),
(66, 'Runjila', 'Runjila RunjilaRunjilaRunjilaRunjilaRunjilaRunjila', '26-06-2024 04:12:17 PM', 1, 83, '6653e69a69bd127052024074914AM', '6653e69a69bd127052024074914AM,', '2024-06-28 06:49:59'),
(67, 'Runjila Akter', 'sdfsdfsd', '26-06-2024 04:56:56 PM', 1, 86, '6653e69a69bd127052024074914AM', '6653e69a69bd127052024074914AM,', '2024-06-27 07:12:49'),
(68, 'simply dummy', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', '26-06-2024 04:58:17 PM', 1, 86, '6653e69a69bd127052024074914AM', '6653e69a69bd127052024074914AM,', '2024-06-27 07:12:49'),
(69, 'essentially unchanged', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', '26-06-2024 04:58:41 PM', 1, 86, '6653e69a69bd127052024074914AM', '6653e69a69bd127052024074914AM,', '2024-06-27 07:12:49'),
(70, 'essentially unchanged', 'essentially unchanged', '26-06-2024 04:58:50 PM', 1, 86, '6653e69a69bd127052024074914AM', '6653e69a69bd127052024074914AM,', '2024-06-27 07:12:49'),
(71, 'essentially unchanged', 'essentially unchangedvessentially unchangedessentially unchangedessentially unchangedessentially unchanged', '26-06-2024 04:58:56 PM', 1, 86, '6653e69a69bd127052024074914AM', '6653e69a69bd127052024074914AM,', '2024-06-27 07:12:49'),
(72, 'sdfgsdfg', 'sfdgsfdgsdg', '27-06-2024 01:14:57 PM', 1, 95, '6653e69a69bd127052024074914AM', '6653e69a69bd127052024074914AM,', '2024-06-27 07:17:46'),
(73, 'wertyreyrte', 'etryertyert', '27-06-2024 01:17:57 PM', 1, 85, '6653e69a69bd127052024074914AM', '', '2024-06-27 07:18:03'),
(74, 'Current tiem ', 'Current tiem Current tiem Current tiem Current tiem ', '27-06-2024 02:45:58 PM', 1, 94, '6653e69a69bd127052024074914AM', '', '2024-06-27 08:46:17'),
(75, 'Current Tiem Check', 'Current Tiem Check Current Tiem Check Current Tiem Check Current Tiem Check', '27-06-2024 02:51:55 PM', 1, 86, '6653e69a69bd127052024074914AM', '6653e69a69bd127052024074914AM,', '2024-06-27 08:53:32'),
(76, 'Check again ', ' other again check comment', '27-06-2024 02:52:12 PM', 1, 86, '6653e69a69bd127052024074914AM', '6653e69a69bd127052024074914AM,', '2024-06-27 08:53:32'),
(77, 'ssdfsf', 'sdfsdf', '27-06-2024 02:52:55 PM', 1, 86, '6653e69a69bd127052024074914AM', '6653e69a69bd127052024074914AM,', '2024-06-28 08:26:47'),
(78, 'sfsdf', 'sdfsdf', '27-06-2024 04:03:22 PM', 1, 93, '6653e69a69bd127052024074914AM', '', '2024-06-27 10:03:36'),
(79, 'sdfsdaf', 'asdfsd', '28-06-2024 10:59:26 AM', 1, 93, '6653e69a69bd127052024074914AM', '', '2024-06-28 04:59:38'),
(80, 'sfsdf', 'sdfsdf', '28-06-2024 12:00:39 PM', 1, 93, '6653e69a69bd127052024074914AM', '', '2024-06-28 06:00:49'),
(81, 'sfsdf', 'sdfsdf', '28-06-2024 12:02:29 PM', 1, 93, '6653e69a69bd127052024074914AM', '', '2024-06-28 06:02:35'),
(82, 'sdfsdf', 'sdfsdfsdfsdf', '28-06-2024 12:12:19 PM', 1, 86, '6653e69a69bd127052024074914AM', '6653e69a69bd127052024074914AM,', '2024-06-28 08:26:47'),
(83, 'Test Commetn', 'Test Commetn', '28-06-2024 12:50:18 PM', 1, 80, '6653e69a69bd127052024074914AM', '', '2024-06-28 06:50:27'),
(84, 'adsfa', 'sdfasdfasf', '28-06-2024 02:14:27 PM', 1, 96, '6653e69a69bd127052024074914AM', '', '2024-06-28 08:14:32'),
(85, 'sdfadfga', 'sdfsadfsdaf', '28-06-2024 02:25:43 PM', 1, 83, '6653e69a69bd127052024074914AM', '', '2024-06-28 08:25:48'),
(86, 'adfasdfa', 'try. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently', '28-06-2024 02:25:51 PM', 1, 89, '6653e69a69bd127052024074914AM', '', '2024-06-28 08:25:57'),
(87, 'sdfasdf', 'try. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently', '28-06-2024 02:25:59 PM', 1, 90, '6653e69a69bd127052024074914AM', '', '2024-06-28 08:26:05'),
(88, 'sdfasdf', 'adsfasdf', '28-06-2024 02:26:30 PM', 1, 81, '6653e69a69bd127052024074914AM', '', '2024-06-28 08:26:35');

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
(82, 'md shafikul islam', '$2y$10$61/NWVXeR2o1J4UzFyIbDOMstqFv51jUWIvMqqFueH7K7xOxIgqly', '$2y$10$8DHlf4Q59vy6.6hKCnfwf.DVfe..VGa0b1ByuLvRuxVRHVCfj7h.G', '24-06-2024 11:26:44 AM', 'OutSide User', 4, 'shafikuluser@gmail.com', NULL, '667903e4e036924062024112804AM'),
(83, 'Manager', '$2y$10$/lfd64GfvSmtOhbadhunzO.QoItCoT4lQyPfR45QUTmDczs6rmxj6', '$2y$10$UI6FdjqT94tTsybjwRW5WeBYiMnoJy4XwLjiLBTdXI50mSxM0zyay', '25-06-2024 11:29:41 AM', 'manager', 2, 'manager@gmail.com', NULL, '667a55d621e2e25062024112958AM');

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
(53, '6679025a0c7b624062024112130AM', 94);

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
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `oldorder`
--
ALTER TABLE `oldorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `productcatagory`
--
ALTER TABLE `productcatagory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `productdetails`
--
ALTER TABLE `productdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `usercomment`
--
ALTER TABLE `usercomment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `whichlist`
--
ALTER TABLE `whichlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

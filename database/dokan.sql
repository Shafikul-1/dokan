-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2024 at 03:49 AM
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
-- Table structure for table `productcatagory`
--

CREATE TABLE `productcatagory` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(500) DEFAULT NULL,
  `categoryQty` int(11) DEFAULT NULL,
  `categoryDescription` varchar(600) DEFAULT NULL,
  `userAuth` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productcatagory`
--

INSERT INTO `productcatagory` (`id`, `categoryName`, `categoryQty`, `categoryDescription`, `userAuth`) VALUES
(10, 'laptop', 2, 'laptop-accessories all', 1),
(15, 'Computer', 1, 'Electronic Product Description', 1),
(16, 'Food Product', 0, 'Food Product Description', 1),
(17, 'Phone', 7, 'Phone ', 1),
(19, 'Accessories', 4, 'accessories Category Description', 1),
(20, 'Camera', 2, 'Camera Category Description', 1);

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
  `previousPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productdetails`
--

INSERT INTO `productdetails` (`id`, `productName`, `productDescription`, `productColor`, `category`, `price`, `discount`, `tax`, `weight`, `brand`, `shippingClass`, `warranty`, `customFields`, `releaseDate`, `complianceInfo`, `metaTitle`, `metaDescription`, `keywords`, `productImages`, `videos`, `userAuth`, `productQty`, `productStatus`, `deliveryComplete`, `previousPrice`) VALUES
(56, 'Havit HV-SK486 USB 2.0 Speaker', 'Key Features\r\nModel: Havit HV-SK486\r\nFrequency: 90 Hz - 20 kHz\r\nImpedance : 4\r\nPower Output : 3W x 2 (RMS)\r\nOperating Voltage: 5V', '#000000', 19, 2300, 0, 0, 0, '', '', 0, '', '25-05-2024 10:46:47 AM', '', '', '', '', 'hv-sk486-01-500x500.webp, video-balun-for-cc-camera-01-500x500.webp', '', 1, 44, 'Pending', 0, 0),
(57, 'Apple MacBook Air (2022) Apple M2 Chip 13.6-Inch Liquid Retina Display 8GB RAM 256GB SSD Space Gray #MLXW3LL/A / MLXW3ZP/A', 'Key Features\r\nMPN: MLXW3LL/A / MLXW3ZP/A\r\nModel: MacBook Air (2022) M2 Chip Model\r\nProcessor: Apple M2 chip, 8-core CPU with 4 performance cores and 4 efficiency cores\r\nRAM: 8GB, Storage: 256GB SSD\r\nDisplay: 13.6&quot; Liquid Retina display (2560 x 1664)\r\nFeatures: Backlit Magic Keyboard and the Touch ID', '#000000', 10, 33650, 0, 0, 0, '', '', 0, '', '25-05-2024 10:47:17 AM', '', '', '', '', 'macbook-air-13-3-inch-500x500.webp, intel-14th-gen-meteor-lake-core-i5-14600k-31697364708.webp, intel-14th-gen-meteor-lake-core-i5-14600k-21697364708.webp', '', 1, 34, 'Pending', 0, 0),
(58, 'Benco C1', 'Key Features\r\nModel: C1\r\nDisplay: 1.77&quot; QQVGA Display\r\nProcessor: MTK6261D Chipset\r\nCamera: Digital Camera\r\nBattery: Li-Ion 1000mAh, removable', '#000000', 17, 5600, 0, 0, 0, '', '', 0, '', '25-05-2024 10:47:54 AM', '', '', '', '', 'c1-gray-500x500.webp, lenovo-ideacentre-3-07iab7-sff-12th-gen-intel-61703740385.webp', '', 1, 34, 'Done', 0, 0),
(59, 'SJCAM SJ4000 Air Full Hd Wi-Fi Waterproof Sports Action Camera', 'Model: H100\r\nDisplay: 1.77&quot; TFT Color Display\r\nCamera: Digital Camera\r\nBattery: Li-Ion 1000mAh, removable\r\nFeatures: 3.5mm Jack, Torch Light, Vibration', '#000000', 17, 3400, 0, 0, 0, '', '', 0, '', '25-05-2024 10:49:19 AM', '', '', '', '', 'h100-01-500x500.webp, c1-gray-500x500_25-05-2024_10_50_02_AM.webp', '', 1, 77, 'Pending', 0, 0),
(60, 'Hallo H100', 'Model: H100\r\nDisplay: 1.77&quot; TFT Color Display\r\nCamera: Digital Camera\r\nBattery: Li-Ion 1000mAh, removable\r\nFeatures: 3.5mm Jack, Torch Light, Vibration', '#000000', 17, 2232, 0, 0, 0, '', '', 0, '', '25-05-2024 10:59:08 AM', '', '', '', '', 'h100-01-500x500_25-05-2024_10_59_35_AM.webp, c1-gray-500x500_25-05-2024_10_59_35_AM.webp', '', 1, 34, 'Pending', 0, 0),
(61, 'Intel 12th Gen Core i5-12400 Budget Desktop PC', 'Model: 12th Gen Desktop PC\r\nIntel 12th Gen Core i5-12400 Alder Lake Processor\r\nMSI PRO H610M-E DDR4 mATX Motherboard\r\nCorsair Vengeance LPX 8GB 3200MHz DDR4 Desktop RAM\r\nTeam MP33 256GB M.2 PCIe SSD', '#000000', 15, 43000, 0, 0, 0, '', '', 0, '', '25-05-2024 11:00:21 AM', '', '', '', '', 'lenovo-ideacentre-3-07iab7-sff-12th-gen-intel-31703740384.webp, lenovo-ideacentre-3-07iab7-sff-12th-gen-intel-11703740383.webp, lenovo-thinkcentre-neo-50s-sff-12th-gen-intel-51700216787.webp', '', 1, 45, 'No Update', 0, 0),
(62, 'Rapoo H120 USB Wired Headphone', 'Model: H120\r\nHigh quality USB digital audio output\r\nThe multiple functions of the remote\r\nMicrophone noise reduction\r\nSmooth HD voice call', '#000000', 19, 23500, 0, 0, 0, '', '', 0, '', '25-05-2024 11:01:50 AM', '', '', '', '', 'h120-3-500x500.jpg, h100-01-500x500_25-05-2024_11_02_27_AM.webp, c1-gray-500x500_25-05-2024_11_02_27_AM.webp', '', 1, 322, 'Pending', 0, 0),
(63, 'SJCAM SJ4000 Air Full Hd Wi-Fi Waterproof Sports Action Camera', 'Model: SJ4000 Air\r\nUp to QHD+ 3200 x 1800 / 30 fps Video\r\n2.0&quot; LTPS LCD Screen\r\nMaximum Storage: 64GB\r\nBattery Capacity: 900 mAh', '#000000', 20, 45300, 0, 0, 0, '', '', 0, '', '25-05-2024 11:04:31 AM', '', '', '', '', 'sj4000-air-04-500x500.jpg, sj4000-air-03-500x500.jpg, sj4000-air-01-500x500.jpg', '', 1, 342, 'No Update', 0, 0),
(64, 'TELESIN Allin BOX Portable Storage Charger for GoPro Hero 9/10/11 with 2 Batteries', 'TELESIN Allin BOX Portable Storage Charger for GoPro Hero 9/10/11 with 2 Batteries\r\nThe TELESIN Allin BOX Portable Storage Charger for GoPro Hero9/10/11 has multiple functions such as card reading, charging, and storage. The closed ALLIN BOX features IP54 waterproof, and your batteries, and TF cards will be stored securely and stably without issues.  It can support 3 batteries to be charged at the same time, fully charged in 2 hours. The portable storage charger can accommodate 3 TF cards and provides a maximum card reading speed of 20Mb/s.The TELESIN Allin BOX Portable Storage Charger is IP54 life waterproof. It is made of Skin-friendly silicone and polyester double core rope, practical and beautiful. TELESIN Allin BOX Portable Charger for GoPro Hero9/10/11 offers no warranty.', '#000000', 20, 2300, 0, 0, 0, '', '', 0, '', '25-05-2024 11:04:56 AM', '', '', '', '', 'allin-box-01-500x500.webp, h120-3-500x500_25-05-2024_11_05_39_AM.jpg, h100-01-500x500_25-05-2024_11_05_39_AM.webp, hv-sk486-01-500x500_25-05-2024_11_05_39_AM.webp', '', 1, 232, 'No Update', 0, 0),
(65, 'Lenovo IdeaPad 1 15AMN7 AMD Athlon 7120U 15.6&quot; FHD Laptop (Sand Color)', 'MPN: 82VG00LDIN\r\nModel: IdeaPad 1 15AMN7\r\nProcessor: AMD Athlon Silver 7120U (2.4 GHz up to 3.5 GHz)\r\nRAM: 8GB DDR5 5500MHz, Storage: 256GB M.2 NVMe SSD\r\nDisplay: 15.6&quot; FHD (1920X1080)\r\nFeatures: Type-C, Privacy shutter', '#000000', 10, 41000, 0, 0, 0, '', '', 0, '', '25-05-2024 11:06:15 AM', '', '', '', '', 'ideapad-1-15amn7-sand-01-500x500.webp, intel-14th-gen-meteor-lake-core-i5-14600k-31697364708_25-05-2024_11_06_44_AM.webp, intel-14th-gen-meteor-lake-core-i5-14600k-21697364708_25-05-2024_11_06_44_AM.webp', '', 1, 78, 'Pending', 0, 0),
(66, 'HONOR Pad X8 3GB RAM 32GB Storage 10.1&quot; Tablet', 'Model: Pad X8\r\nDisplay: 10.1&quot; FHD+ (1920 x 1200)\r\nCPU: MediaTek MT8786 (12nm)\r\nRAM: 3GB, Storage: 32GB\r\nBattery: 5100 mAh, Li-ion Polymer\r\n', '#000000', 17, 34000, 0, 0, 0, '', '', 0, '', '25-05-2024 11:11:20 AM', '', '', '', '', 'pad-x8-neo-mint-01-500x500.webp, ideapad-1-15amn7-sand-01-500x500_25-05-2024_11_11_59_AM.webp, h100-01-500x500_25-05-2024_11_11_59_AM.webp', '', 1, 23, 'No Update', 0, 0),
(67, 'HONOR Pad X8 3GB RAM 32GB Storage 10.1&quot; Tablet', 'Key Features\r\nModel: Pad X8\r\nDisplay: 10.1&quot; FHD+ (1920 x 1200)\r\nCPU: MediaTek MT8786 (12nm)\r\nRAM: 3GB, Storage: 32GB\r\nBattery: 5100 mAh, Li-ion Polymer\r\n', '#000000', 17, 34700, 0, 0, 0, '', '', 0, '', '25-05-2024 11:14:07 AM', '', '', '', '', 'pad-x8-neo-mint-01-500x500_25-05-2024_11_14_26_AM.webp, ideapad-1-15amn7-sand-01-500x500_25-05-2024_11_14_26_AM.webp, h100-01-500x500_25-05-2024_11_14_26_AM.webp', '', 1, 67, 'Pending', 0, 0),
(68, 'Hallo H100 Music', 'Model: H100 Music\r\nDisplay: 1.77&quot; TFT Color Display\r\nCamera: Digital Camera\r\nBattery: Li-Ion 1000mAh, removable\r\nFeatures: 3.5mm Jack, Torch Light, Bluetooth', '#000000', 17, 45600, 0, 0, 0, '', '', 0, '', '25-05-2024 11:14:47 AM', '', '', '', '', 'h100-music-500x500.webp, pad-x8-neo-mint-01-500x500_25-05-2024_11_15_07_AM.webp, macbook-air-13-3-inch-500x500_25-05-2024_11_15_07_AM.webp', '', 1, 23, 'Done', 0, 0),
(69, 'Cheerlux C9 2800 Lumens Mini Projector with Built-in TV Card', 'Model: Cheerlux C9\r\nLCD Panel + LED Lamp\r\nResolution: 1280 x 720\r\nBrightness: 2800 lumens\r\nContrast Ratio: 2000:1\r\n', '#000000', 19, 2300, 0, 0, 0, '', '', 0, '', '26-05-2024 12:02:15 PM', '', '', '', '', 'c9-500x500.jpg, imou-ranger-2-500x500.jpg, ryzen-5-2400g-desktop-pc02-500x500.webp', '', 1, 34, 'Urgent', 0, 0),
(70, 'Epson Perfection V39 II Photo and Document Flatbed Scanner', 'MPN: B11B232501\r\nModel: Epson Perfection V39\r\nType: Flatbed Color Image Scanner\r\nScan Area:8.5 inch x 11.7 inch\r\nResolution: 4800 x 4800 dpi\r\nConnectivity: Hi-Speed USB\r\n', '#000000', 17, 8500, 0, 0, 0, '', '', 0, '', '26-05-2024 12:15:59 PM', '', '', '', '', 'perfection-v39-01-500x500.webp, c9-500x500_26-05-2024_12_16_35_PM.jpg', '', 1, 7657, 'Pending', 0, 0),
(71, 'fdgsdfg', 'sdfgsdfg', '#000000', 19, 345345, 0, 0, 0, '', '', 0, '', '27-05-2024 07:21:15 AM', '', '', '', '', 'athlon-3000g-budget-desktop-pc-01-500x500.webp, user-defult-icon.png', '', 1, 345, 'Shipping', 0, 0);

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
  `postId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usercomment`
--

INSERT INTO `usercomment` (`id`, `name`, `comment`, `time`, `userAuth`, `postId`) VALUES
(22, 'Md ShafikulMd Shafikul', 'sdrgfsgfd', '21-05-2024 12:54:34 PM', 2, 41),
(37, 'Runjila1', 'Runjila1', '26-05-2024 11:50:16 AM', 1, 57),
(38, 'Runjila Akter', 'Bad Product This is', '26-05-2024 11:52:22 AM', 1, 57),
(39, 'Runjila', 'Lenovo best product', '26-05-2024 11:53:54 AM', 1, 65),
(40, 'shaifku;l', 'IOther COmmnet', '26-05-2024 11:56:11 AM', 1, 65),
(41, 'shaifku;l', 'IOther COmmnet', '26-05-2024 11:56:11 AM', 1, 65),
(42, 'Runjila1', 'sdfgsd', '27-05-2024 07:21:44 AM', 1, 71),
(43, 'Runjila', 'fsdaf', '27-05-2024 07:22:25 AM', 1, 62);

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
(47, 'Shafikul', '$2y$10$R6wp4K/ceq2YJcKfgVbaE.9elthol1K/R7tIffZvMTNJXskyZS7Dq', '$2y$10$ZJISxFyo/hhIr.qDr3EY1uo/I8K4FgfAIffXGljuSAjHUi22eGxlW', '27-05-2024 06:48:54 AM', 'Shafikul', 2, 'shafikuls.18288@gmail.com', NULL, '6653d88c85b4427052024064916AM'),
(48, 'admin', '$2y$10$OquX9WV6CIsqwgTajY.y2.ZH.rGPyFos/CFR4N5UJd/vwCwh2rDYG', '$2y$10$IDxgCp.mgsq1AwjC/QnlAeno7snJeE1m5zA3x8zfRUZWijfHGie6i', '27-05-2024 07:48:58 AM', 'admin', 1, 'admin@gmail.com', NULL, '6653e69a69bd127052024074914AM');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `productcatagory`
--
ALTER TABLE `productcatagory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `productdetails`
--
ALTER TABLE `productdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `usercomment`
--
ALTER TABLE `usercomment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

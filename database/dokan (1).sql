-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2024 at 02:14 AM
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
  `userAuth` int(11) DEFAULT NULL,
  `uniqueId` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productcatagory`
--

INSERT INTO `productcatagory` (`id`, `categoryName`, `categoryQty`, `categoryDescription`, `userAuth`, `uniqueId`) VALUES
(19, 'Accessories', 5, 'accessories Category Description', 1, ''),
(20, 'Camera', 2, 'Camera Category Description', 1, ''),
(21, 'Computer', 3, 'Computer', 1, '6653e69a69bd127052024074914AM'),
(22, 'Laptop', 0, 'Laptop', 1, '6653e69a69bd127052024074914AM'),
(24, 'Accrorise', 0, 'Accrorise', 2, '665656d750c2429052024041239AM'),
(25, 'Mobile', 1, 'Mobile', 2, '665656d750c2429052024041239AM'),
(26, 'PC All', 0, 'PC All', 2, '665656d750c2429052024041239AM');

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
(56, 'Havit HV-SK486 USB 2.0 Speaker', 'Key Features\r\nModel: Havit HV-SK486\r\nFrequency: 90 Hz - 20 kHz\r\nImpedance : 4\r\nPower Output : 3W x 2 (RMS)\r\nOperating Voltage: 5V', '#000000', 19, 2300, 0, 0, 0, '', '', 0, '', '25-05-2024 10:46:47 AM', '', '', '', '', 'hv-sk486-01-500x500.webp, video-balun-for-cc-camera-01-500x500.webp', '', 1, 44, 'Pending', 0, 0, ''),
(57, 'Apple MacBook Air (2022) Apple M2 Chip 13.6-Inch Liquid Retina Display 8GB RAM 256GB SSD Space Gray #MLXW3LL/A / MLXW3ZP/A', 'Key Features\r\nMPN: MLXW3LL/A / MLXW3ZP/A\r\nModel: MacBook Air (2022) M2 Chip Model\r\nProcessor: Apple M2 chip, 8-core CPU with 4 performance cores and 4 efficiency cores\r\nRAM: 8GB, Storage: 256GB SSD\r\nDisplay: 13.6&quot; Liquid Retina display (2560 x 1664)\r\nFeatures: Backlit Magic Keyboard and the Touch ID', '#000000', 10, 33650, 0, 0, 0, '', '', 0, '', '25-05-2024 10:47:17 AM', '', '', '', '', 'macbook-air-13-3-inch-500x500.webp, intel-14th-gen-meteor-lake-core-i5-14600k-31697364708.webp, intel-14th-gen-meteor-lake-core-i5-14600k-21697364708.webp', '', 1, 34, 'Pending', 0, 0, ''),
(58, 'Benco C1', 'Key Features\r\nModel: C1\r\nDisplay: 1.77&quot; QQVGA Display\r\nProcessor: MTK6261D Chipset\r\nCamera: Digital Camera\r\nBattery: Li-Ion 1000mAh, removable', '#000000', 17, 5600, 0, 0, 0, '', '', 0, '', '25-05-2024 10:47:54 AM', '', '', '', '', 'c1-gray-500x500.webp, lenovo-ideacentre-3-07iab7-sff-12th-gen-intel-61703740385.webp', '', 1, 34, 'Done', 0, 0, ''),
(59, 'SJCAM SJ4000 Air Full Hd Wi-Fi Waterproof Sports Action Camera', 'Model: H100\r\nDisplay: 1.77&quot; TFT Color Display\r\nCamera: Digital Camera\r\nBattery: Li-Ion 1000mAh, removable\r\nFeatures: 3.5mm Jack, Torch Light, Vibration', '#000000', 17, 3400, 0, 0, 0, '', '', 0, '', '25-05-2024 10:49:19 AM', '', '', '', '', 'h100-01-500x500.webp, c1-gray-500x500_25-05-2024_10_50_02_AM.webp', '', 1, 77, 'Pending', 0, 0, ''),
(60, 'Hallo H100', 'Model: H100\r\nDisplay: 1.77&quot; TFT Color Display\r\nCamera: Digital Camera\r\nBattery: Li-Ion 1000mAh, removable\r\nFeatures: 3.5mm Jack, Torch Light, Vibration', '#000000', 17, 2232, 0, 0, 0, '', '', 0, '', '25-05-2024 10:59:08 AM', '', '', '', '', 'h100-01-500x500_25-05-2024_10_59_35_AM.webp, c1-gray-500x500_25-05-2024_10_59_35_AM.webp', '', 1, 34, 'Pending', 0, 0, ''),
(61, 'Intel 12th Gen Core i5-12400 Budget Desktop PC', 'Model: 12th Gen Desktop PC\r\nIntel 12th Gen Core i5-12400 Alder Lake Processor\r\nMSI PRO H610M-E DDR4 mATX Motherboard\r\nCorsair Vengeance LPX 8GB 3200MHz DDR4 Desktop RAM\r\nTeam MP33 256GB M.2 PCIe SSD', '#000000', 15, 43000, 0, 0, 0, '', '', 0, '', '25-05-2024 11:00:21 AM', '', '', '', '', 'lenovo-ideacentre-3-07iab7-sff-12th-gen-intel-31703740384.webp, lenovo-ideacentre-3-07iab7-sff-12th-gen-intel-11703740383.webp, lenovo-thinkcentre-neo-50s-sff-12th-gen-intel-51700216787.webp', '', 1, 45, 'No Update', 0, 0, ''),
(62, 'Rapoo H120 USB Wired Headphone', 'Model: H120\r\nHigh quality USB digital audio output\r\nThe multiple functions of the remote\r\nMicrophone noise reduction\r\nSmooth HD voice call', '#000000', 19, 23500, 0, 0, 0, '', '', 0, '', '25-05-2024 11:01:50 AM', '', '', '', '', 'h120-3-500x500.jpg, h100-01-500x500_25-05-2024_11_02_27_AM.webp, c1-gray-500x500_25-05-2024_11_02_27_AM.webp', '', 1, 322, 'Pending', 0, 0, ''),
(63, 'SJCAM SJ4000 Air Full Hd Wi-Fi Waterproof Sports Action Camera', 'Model: SJ4000 Air\r\nUp to QHD+ 3200 x 1800 / 30 fps Video\r\n2.0&quot; LTPS LCD Screen\r\nMaximum Storage: 64GB\r\nBattery Capacity: 900 mAh', '#000000', 20, 45300, 0, 0, 0, '', '', 0, '', '25-05-2024 11:04:31 AM', '', '', '', '', 'sj4000-air-04-500x500.jpg, sj4000-air-03-500x500.jpg, sj4000-air-01-500x500.jpg', '', 1, 342, 'No Update', 0, 0, ''),
(64, 'TELESIN Allin BOX Portable Storage Charger for GoPro Hero 9/10/11 with 2 Batteries', 'TELESIN Allin BOX Portable Storage Charger for GoPro Hero 9/10/11 with 2 Batteries\r\nThe TELESIN Allin BOX Portable Storage Charger for GoPro Hero9/10/11 has multiple functions such as card reading, charging, and storage. The closed ALLIN BOX features IP54 waterproof, and your batteries, and TF cards will be stored securely and stably without issues.  It can support 3 batteries to be charged at the same time, fully charged in 2 hours. The portable storage charger can accommodate 3 TF cards and provides a maximum card reading speed of 20Mb/s.The TELESIN Allin BOX Portable Storage Charger is IP54 life waterproof. It is made of Skin-friendly silicone and polyester double core rope, practical and beautiful. TELESIN Allin BOX Portable Charger for GoPro Hero9/10/11 offers no warranty.', '#000000', 20, 2300, 0, 0, 0, '', '', 0, '', '25-05-2024 11:04:56 AM', '', '', '', '', 'allin-box-01-500x500.webp, h120-3-500x500_25-05-2024_11_05_39_AM.jpg, h100-01-500x500_25-05-2024_11_05_39_AM.webp, hv-sk486-01-500x500_25-05-2024_11_05_39_AM.webp', '', 1, 232, 'No Update', 0, 0, ''),
(65, 'Lenovo IdeaPad 1 15AMN7 AMD Athlon 7120U 15.6&quot; FHD Laptop (Sand Color)', 'MPN: 82VG00LDIN\r\nModel: IdeaPad 1 15AMN7\r\nProcessor: AMD Athlon Silver 7120U (2.4 GHz up to 3.5 GHz)\r\nRAM: 8GB DDR5 5500MHz, Storage: 256GB M.2 NVMe SSD\r\nDisplay: 15.6&quot; FHD (1920X1080)\r\nFeatures: Type-C, Privacy shutter', '#000000', 10, 41000, 0, 0, 0, '', '', 0, '', '25-05-2024 11:06:15 AM', '', '', '', '', 'ideapad-1-15amn7-sand-01-500x500.webp, intel-14th-gen-meteor-lake-core-i5-14600k-31697364708_25-05-2024_11_06_44_AM.webp, intel-14th-gen-meteor-lake-core-i5-14600k-21697364708_25-05-2024_11_06_44_AM.webp', '', 1, 78, 'Pending', 0, 0, ''),
(66, 'HONOR Pad X8 3GB RAM 32GB Storage 10.1&quot; Tablet', 'Model: Pad X8\r\nDisplay: 10.1&quot; FHD+ (1920 x 1200)\r\nCPU: MediaTek MT8786 (12nm)\r\nRAM: 3GB, Storage: 32GB\r\nBattery: 5100 mAh, Li-ion Polymer\r\n', '#000000', 17, 34000, 0, 0, 0, '', '', 0, '', '25-05-2024 11:11:20 AM', '', '', '', '', 'pad-x8-neo-mint-01-500x500.webp, ideapad-1-15amn7-sand-01-500x500_25-05-2024_11_11_59_AM.webp, h100-01-500x500_25-05-2024_11_11_59_AM.webp', '', 1, 23, 'No Update', 0, 0, ''),
(67, 'HONOR Pad X8 3GB RAM 32GB Storage 10.1&quot; Tablet', 'Key Features\r\nModel: Pad X8\r\nDisplay: 10.1&quot; FHD+ (1920 x 1200)\r\nCPU: MediaTek MT8786 (12nm)\r\nRAM: 3GB, Storage: 32GB\r\nBattery: 5100 mAh, Li-ion Polymer\r\n', '#000000', 17, 34700, 0, 0, 0, '', '', 0, '', '25-05-2024 11:14:07 AM', '', '', '', '', 'pad-x8-neo-mint-01-500x500_25-05-2024_11_14_26_AM.webp, ideapad-1-15amn7-sand-01-500x500_25-05-2024_11_14_26_AM.webp, h100-01-500x500_25-05-2024_11_14_26_AM.webp', '', 1, 67, 'Pending', 0, 0, ''),
(68, 'Hallo H100 Music', 'Model: H100 Music\r\nDisplay: 1.77&quot; TFT Color Display\r\nCamera: Digital Camera\r\nBattery: Li-Ion 1000mAh, removable\r\nFeatures: 3.5mm Jack, Torch Light, Bluetooth', '#000000', 17, 45600, 0, 0, 0, '', '', 0, '', '25-05-2024 11:14:47 AM', '', '', '', '', 'h100-music-500x500.webp, pad-x8-neo-mint-01-500x500_25-05-2024_11_15_07_AM.webp, macbook-air-13-3-inch-500x500_25-05-2024_11_15_07_AM.webp', '', 1, 23, 'Done', 0, 0, ''),
(69, 'Cheerlux C9 2800 Lumens Mini Projector with Built-in TV Card', 'Model: Cheerlux C9\r\nLCD Panel + LED Lamp\r\nResolution: 1280 x 720\r\nBrightness: 2800 lumens\r\nContrast Ratio: 2000:1\r\n', '#000000', 19, 2300, 0, 0, 0, '', '', 0, '', '26-05-2024 12:02:15 PM', '', '', '', '', 'c9-500x500.jpg, imou-ranger-2-500x500.jpg, ryzen-5-2400g-desktop-pc02-500x500.webp', '', 1, 34, 'Urgent', 0, 0, ''),
(70, 'Epson Perfection V39 II Photo and Document Flatbed Scanner', 'MPN: B11B232501\r\nModel: Epson Perfection V39\r\nType: Flatbed Color Image Scanner\r\nScan Area:8.5 inch x 11.7 inch\r\nResolution: 4800 x 4800 dpi\r\nConnectivity: Hi-Speed USB\r\n', '#000000', 17, 8500, 0, 0, 0, '', '', 0, '', '26-05-2024 12:15:59 PM', '', '', '', '', 'perfection-v39-01-500x500.webp, c9-500x500_26-05-2024_12_16_35_PM.jpg', '', 1, 7657, 'Pending', 0, 0, ''),
(71, 'fdgsdfg', 'sdfgsdfg', '#000000', 19, 345345, 0, 0, 0, '', '', 0, '', '27-05-2024 07:21:15 AM', '', '', '', '', 'athlon-3000g-budget-desktop-pc-01-500x500.webp, user-defult-icon.png', '', 1, 345, 'Shipping', 0, 0, ''),
(72, 'Desktop PC Core i7 3rd Gen 16GB RAM 256GB SSD', 'The lowest price of Desktop pc core i7 3rd gen 16gb ram 256gb ssd in Bangladesh is Tk-19,500/= only. Buy from Dhaka City at low price in Bdstall. There is currently 1 seller.\r\n\r\n', '#000000', 21, 34000, 0, 0, 0, '', '', 0, '', '29-05-2024 04:00:27 AM', '', '', '', '', 'giant_270649.png, perfection-v39-01-500x500_29-05-2024_04_01_13_AM.webp, c9-500x500_29-05-2024_04_01_13_AM.jpg', '', 1, 45, 'Pending', 0, 0, ''),
(73, 'Desktop PC Intel Core i5 3rd Gen 4GB RAM / 500GB HDD', 'Price in Bangladesh\r\nThe lowest price of Desktop pc intel core i5 3rd gen 4gb ram / 500gb hdd in Bangladesh is Tk-13,999/= only. Buy from Dhaka City at low price in Bdstall. There is currently 1 seller.\r\n\r\n', '#000000', 21, 86000, 0, 0, 0, '', '', 0, '', '29-05-2024 04:05:24 AM', '', '', '', '', 'giant_269754.png, giant_270649_29-05-2024_04_05_59_AM.png', '', 2147483647, 23, 'Shipping', 0, 0, ''),
(74, 'Desktop PC Intel Core i5 3rd Gen 4GB RAM / 500GB HDD', 'Price in Bangladesh\r\nThe lowest price of Desktop pc intel core i5 3rd gen 4gb ram / 500gb hdd in Bangladesh is Tk-13,999/= only. Buy from Dhaka City at low price in Bdstall. There is currently 1 seller.\r\n\r\n', '#000000', 21, 86000, 0, 0, 0, '', '', 0, '', '29-05-2024 04:05:24 AM', '', '', '', '', 'giant_269754_29-05-2024_04_06_32_AM.png, giant_270649_29-05-2024_04_06_32_AM.png', '', 1, 23, 'Shipping', 0, 0, '6653e69a69bd127052024074914AM'),
(75, 'Desktop PC Core i3 4th Gen 1TB HDD 19.5&quot; Monitor', 'Price in Bangladesh\r\nThe lowest price of Desktop pc core i3 4th gen 1tb hdd 19.5&quot; monitor in Bangladesh is Tk-15,000/= only. Buy from Narayanganj at low price in Bdstall. There is currently 1 seller.\r\n\r\n', '#000000', 19, 54000, 0, 0, 0, '', '', 0, '', '29-05-2024 04:27:55 AM', '', '', '', '', 'giant_268024.jpg, giant_269754_29-05-2024_04_28_42_AM.png, giant_270649_29-05-2024_04_28_42_AM.png', '', 2, 12, 'Pending', 0, 0, '665656d750c2429052024041239AM'),
(76, 'Kia Sportage 2011', 'Kia Sportage private car features key start, automatic gear transmission, leather seat, hand parking brake, anti-lock braking system, original alloy wheel, LED headlights, front LED fog light, TV / Naki back camera, auto air conditioning, power window.\r\n\r\n', '#000000', 25, 76000, 32, 0, 0, '', '', 0, '', '29-05-2024 04:31:04 AM', '', '', '', '', 'giant_276697.png, giant_268024_29-05-2024_04_31_24_AM.jpg, giant_269754_29-05-2024_04_31_24_AM.png', '', 2, 23, 'No Update', 0, 0, '665656d750c2429052024041239AM');

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
(48, 'admin', '$2y$10$OquX9WV6CIsqwgTajY.y2.ZH.rGPyFos/CFR4N5UJd/vwCwh2rDYG', '$2y$10$IDxgCp.mgsq1AwjC/QnlAeno7snJeE1m5zA3x8zfRUZWijfHGie6i', '27-05-2024 07:48:58 AM', 'admin', 1, 'admin@gmail.com', NULL, '6653e69a69bd127052024074914AM'),
(54, 'manager', '$2y$10$5yaZagPE8tqUnoWYN.n6Puf9fKvC7WSsQwUHvx6KUyRnt5iKJgf6q', '$2y$10$8PVZKLkUlc/yIIILO5lTluDPcZyW5DyZMhUNp5CGfykSLc56KEvKS', '29-05-2024 04:12:06 AM', 'manager', 2, 'manager@gamail.com', NULL, '665656d750c2429052024041239AM'),
(55, 'shifat', '$2y$10$vovVRXo7H4OZTyMjTu8I5u6WnjnKt36uZkrXkAWYAUfT6PBJ.x3LW', '$2y$10$RN5pBAvqlAFlErMKhT.KWOG0dVfZ50GaJBj7Cx5YnkE79eq5nENX.', '29-05-2024 04:12:39 AM', 'shifat', 2, 'shifat@gmail.com', NULL, '665656eb2ea9b29052024041259AM'),
(56, 'runjila', '$2y$10$rvNaHhACROXaWfVWwE7aR.rR9xwun4HcmhMNMyFQPJTWyYEFx56LW', '$2y$10$HSdbO3Dc7A87D4SOvSGSqusYG8GQ2MmPFVD9n8c0pbNdQcrjvpOgi', '29-05-2024 04:12:59 AM', 'runjila', 2, 'runjila@gmail.com', NULL, '665656fb1c4d729052024041315AM'),
(57, 'employee', '$2y$10$dJDeBj2fE68Dy1mlGrqPMelo7GzX8XJjJikyGGsJfOdphlmJvD49C', '$2y$10$jGuTKUI/Slvwk0gZLHclQeH6LGb4n7siHgVkaxdib4XzuQKfSrJEq', '29-05-2024 04:13:15 AM', 'employee', 3, 'employee@gmail.com', NULL, '6656570f3ad2b29052024041335AM'),
(58, 'shafikul', '$2y$10$nZ1B/gwAXCSGgk8.R3bgMeblYBg92em2p0NyHqGEnfAwW9pJAtTG2', '$2y$10$lNzNbzLAunMtMNwLN5ZVwOl9p0l9w6QVy.0HLVPFRDn2jkm1V4eXu', '29-05-2024 04:13:35 AM', 'shafikul', 2, 'shafikul@gmail.com', NULL, '665657290652129052024041401AM'),
(59, 'shafikul', '$2y$10$Z3BwF/0ujVxjVeJT2ZvwBOP3KkJ5BfzYFXs8KkmDz3pIYZZj5oh2K', '$2y$10$0xX9XERnQtnRiAr7j0Zwte6i9rdY/CFo5joheTjewlgpKBtVqT0Ru', '29-05-2024 04:14:01 AM', 'shafikul', 3, 'shafikul@gmail.com', NULL, '6656573c962b229052024041420AM'),
(60, 'runjila', '$2y$10$6o9/ON7MPEbFZE3C5fomo.woDyDvcQ.QR3ayKCBNVXeQdplp.Bw46', '$2y$10$uz4diq5BKfb6JfgACo13dOOzRAByY4.bxrH/r7qifW1EtaBKY1Me.', '29-05-2024 04:14:20 AM', 'runjila', 3, 'runjila@gmail.com', NULL, '66565747d0b1c29052024041431AM'),
(61, 'shifat', '$2y$10$LQUIccskwjF9RhMTFzz2IebUKMTz./0aov9neEtBKkTQ9c83JeZwW', '$2y$10$U8g2FtzCpsRQxujR4RN0uucHGMDaAveYS8FQWiKDQk5kgZTYqjvhu', '29-05-2024 04:14:31 AM', 'shifat', 3, 'shifat@gmail.com', NULL, '66565753ab0eb29052024041443AM'),
(62, 'user', '$2y$10$vhhbOV5IXHIj6L0S7t3V/.RE7BAq6OKdEoghKUCowNBL9RbJO56oS', '$2y$10$X/b.sl4nHwaXkLgDBNjZD.xCA2Kbfz7sQW3wW1oKulHH5Oh1sD7Ze', '29-05-2024 04:14:43 AM', 'user', 4, 'user@gmail.com', NULL, '6656576d2500329052024041509AM'),
(63, 'users', '$2y$10$bv6g7Mgr8jvQRBxHiIdrKeMhektbHax5NkUt9l7Bf3aQUnykj7boq', '$2y$10$I2qM5ePVFxrBVenrbflxGuf4xNOnkXZCWHihUF/3LFzGaZFdHbYJK', '29-05-2024 04:15:09 AM', 'users', 4, 'users@gmail.com', NULL, '6656577e967bb29052024041526AM'),
(64, 'Roholamin', '$2y$10$5xNxAiJhUqEsjiHwP3XV.uGO909qOghd.W4mSGljgFczV5ZebuI1S', '$2y$10$8pxlgtICtJACU2tsUgsyHOKbUjK2.ue6Mi01Sodf8jcUW5HZn4CGu', '29-05-2024 05:00:15 AM', '', 4, 'roholamin@gmail.com', NULL, '665662152d40f29052024050037AM'),
(65, 'Runjila1', '$2y$10$NYDLQ/63CKLiV2jHE7eMf.9pRXNxTxmxKCLbz4wyb24pj8/g5O1ke', '$2y$10$ra8Sq6oLzwcj2bM45mTEjetJ8yKx9gYGK2U3VwP9M7A1wSIzj0rve', '29-05-2024 05:59:44 AM', '', 4, 'Runjila1@gmail.com', NULL, '66567000ebe4a29052024060000AM'),
(66, 'Arifa', '$2y$10$DgSoSk5h2ESihLHW4n9srOJGNsBx/nJd.lqawjCrcnjtwnQEodmsu', '$2y$10$QXJA/c0GLV91tFTr2jf41efytVe05qtS6ymW.Fd18gpbaMfu1d/u6', '29-05-2024 06:03:41 AM', 'OutSide User', 4, 'Arifa@gmail.com', NULL, '665670ed2aa4529052024060357AM');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `productdetails`
--
ALTER TABLE `productdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `usercomment`
--
ALTER TABLE `usercomment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

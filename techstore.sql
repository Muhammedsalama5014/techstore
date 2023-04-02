-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2023 at 02:42 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_super` enum('yes','no') NOT NULL DEFAULT 'no',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `is_super`, `created_at`) VALUES
(1, ' Muhammes salama Muhamed', 'midosalama5014@hotmail.com', '$2y$10$yxEkgDn1lZLmayFhIkdnd.yK78juZIXmd6CYqRtkpX2tl2XqV80rK', 'no', '2023-03-27 14:15:39');

-- --------------------------------------------------------

--
-- Table structure for table `cats`
--

CREATE TABLE `cats` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cats`
--

INSERT INTO `cats` (`id`, `name`, `created_at`) VALUES
(1, 'Laptops', '2023-03-27 14:01:42'),
(2, 'PCs', '2023-03-27 14:01:42'),
(3, 'Mobiles', '2023-03-27 14:01:42');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` enum('pending','approved','canceled') NOT NULL DEFAULT 'pending',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `status`, `created_at`) VALUES
(1, 'salama', 'm@m.com', '01121587634', 'sscascasc', 'approved', '2023-03-28 21:01:06'),
(2, 'sssssssss', '', '123456', '', 'canceled', '2023-03-28 21:04:05'),
(3, 'sss', 'NULL', '123', 'NULL', 'canceled', '2023-03-28 21:09:15'),
(4, 'salama', NULL, '41235666', NULL, 'pending', '2023-03-28 21:12:51'),
(5, 'sasc', NULL, '1233', NULL, 'canceled', '2023-03-29 01:47:28'),
(6, 'acsac', 'm@m.com', '123', NULL, 'pending', '2023-03-30 02:30:34'),
(7, 'Newone', NULL, '123456', NULL, 'canceled', '2023-03-30 02:33:10'),
(8, 'test', 'm@m.com', '123', 'adcascasc', 'pending', '2023-03-30 02:38:58'),
(9, 'test3', 'midosalama5014@hotmail.com', '5565656', 'cascascascasc', 'pending', '2023-03-30 02:58:52'),
(10, 'test4', 'm@m.com', '123', 'scascas', 'pending', '2023-03-30 03:03:54'),
(11, 'Muhammes salama Muhamed', NULL, '01121587634', NULL, 'approved', '2023-03-31 23:22:33');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `qty`) VALUES
(1, 1, 4, 3),
(2, 1, NULL, 4),
(3, 1, 3, 1),
(4, 1, 2, 1),
(5, 1, 4, 1),
(6, 1, NULL, 2),
(7, 1, 2, 4),
(8, 1, 5, 1),
(9, 1, 2, 1),
(10, 1, NULL, 1),
(11, 1, 2, 1),
(12, 1, 6, 1),
(13, 10, 6, 1),
(14, 11, NULL, 4),
(15, 11, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `pieces_no` smallint(6) NOT NULL,
  `img` varchar(255) NOT NULL,
  `cat_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `desc`, `price`, `pieces_no`, `img`, `cat_id`, `created_at`) VALUES
(2, 'ASUS ', 'VivoBook S14 S433EQ-AM0R7W- i7-1165G7-16GB-SSD512GB-MX350-2GB-14 inch FHD-Windows11-Transparent Silver', '15000.00', 30, '2.jpg', 1, '2023-03-28 20:25:28'),
(3, 'HP', 'Lenovo Legion 5-15IMH05H Gaming laptop - Intel Core i7-10750H, 16GB RAM, 1TB HDD', '15000.00', 5, '3.jpg', 1, '2023-03-28 20:25:28'),
(4, 'Dell', 'Lenovo Legion 5-15IMH05H Gaming laptop - Intel Core i7-10750H, 16GB RAM, 1TB HDD', '15000.00', 3, '4.jpg', 1, '2023-03-28 20:25:28'),
(5, 'Thinkcenter', 'Lenovo Legion 5-15IMH05H Gaming laptop - Intel Core i7-10750H, 16GB RAM, 1TB HDD', '15000.00', 20, '5.jpg', 2, '2023-03-28 20:25:28'),
(6, 'geniun', 'Lenovo Legion 5-15IMH05H Gaming laptop - Intel Core i7-10750H, 16GB RAM, 1TB HDD', '15000.00', 3, '6.jpg', 2, '2023-03-28 20:25:28'),
(7, 'gigabit', 'Lenovo Legion 5-15IMH05H Gaming laptop - Intel Core i7-10750H, 16GB RAM, 1TB HDD', '15000.00', 70, '7.jpg', 2, '2023-03-28 20:25:28'),
(8, 'samsung', 'Lenovo Legion 5-15IMH05H Gaming laptop - Intel Core i7-10750H, 16GB RAM, 1TB HDD', '15000.00', 100, '8.jpg', 3, '2023-03-28 20:25:28'),
(9, 'iphone', 'Lenovo Legion 5-15IMH05H Gaming laptop - Intel Core i7-10750H, 16GB RAM, 1TB HDD', '7000.00', 5, '9.jpg', 3, '2023-03-28 20:25:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `cats`
--
ALTER TABLE `cats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cats`
--
ALTER TABLE `cats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `cats` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

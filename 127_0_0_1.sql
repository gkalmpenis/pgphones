-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2019 at 12:39 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pgphones`
--
DROP DATABASE IF EXISTS `pgphones`;
CREATE DATABASE IF NOT EXISTS `pgphones` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `pgphones`;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user_id` int(16) NOT NULL,
  `prod_id` int(64) NOT NULL,
  `quantity` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(8) NOT NULL,
  `cat_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_picture` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'nopicture.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_picture`) VALUES
(1, 'Xiaomi', 'xiaomi.png'),
(2, 'Huawei', 'huawei.jpg'),
(3, 'Samsung', 'samsung.jpg'),
(4, 'Apple', 'apple.png'),
(5, 'Nokia', 'nokia.jpg'),
(6, 'Lg', 'lg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(64) NOT NULL,
  `prod_name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_picture` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'nopicture.png',
  `prod_desc` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Product description',
  `prod_price` double(8,2) NOT NULL,
  `cat_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `prod_picture`, `prod_desc`, `prod_price`, `cat_id`) VALUES
(1, 'Xiaomi Redmi Note 6 Pro (64GB)', 'XiaomiRedmiNote6Pro.png', 'Screen: 6.26\", RAM: 4GB, Space: 64GB, Camera: 12MP + 5MP, Selfie: 20MP, CPU Cores: 4+4 , Manufacturer: Xiaomi', 174.10, 1),
(2, 'Xiaomi Redmi Note 5 (64GB)', 'XiaomiRedmiNote5.png', 'Screen: 5.99\", RAM: 4GB, Space: 64GB, Camera: 12MP + 5MP, Selfie: 13MP, CPU Cores: 8 , Manufacturer: Xiaomi', 160.90, 1),
(3, 'Xiaomi Mi A2 (64GB)', 'XiaomiMiA2.png', 'Screen: 5.99\", RAM: 4GB, Space: 64GB, Camera: 12MP + 20MP, Selfie: 20MP, CPU Cores: 4+4 , Manufacturer: Xiaomi', 178.46, 1),
(4, 'Xiaomi Pocophone F1 (64GB)', 'XiaomiPocophoneF1.png', 'Screen: 6.18\", RAM: 6GB, Space: 64GB, Camera: 12MP + 5MP, Selfie: 20MP, CPU Cores: 4+4 , Manufacturer: Xiaomi', 283.88, 1),
(5, 'Xiaomi Mi 8 (64GB)', 'XiaomiMi8.png', 'Screen: 6.21\", RAM: 6GB, Space: 64GB, Camera: 12MP + 12MP, Selfie: 20MP, CPU Cores: 4+4 , Manufacturer: Xiaomi', 351.58, 1),
(6, 'Xiaomi Redmi S2 (32GB)', 'XiaomiRedmiS2.png', 'Screen: 5.99\", RAM: 3GB, Space: 32GB, Camera: 12MP + 5MP, Selfie: 16MP, CPU Cores: 8 , Manufacturer: Xiaomi', 134.85, 1),
(7, 'Huawei P20 Lite Dual (64GB)', 'HuaweiP20LiteDual.png', 'Screen: 5.84\", RAM: 4GB, Space: 64GB, Camera: 16MP + 2MP, Selfie: 16MP, CPU Cores: 4+4 , Manufacturer: Huawei', 214.58, 2),
(8, 'Huawei P20 Pro Dual (128GB)', 'HuaweiP20ProDual.png', 'Screen: 6.1\", RAM: 6GB, Space: 128GB, Camera: 40MP + 20MP, Selfie: 24MP, CPU Cores: 4+4 , Manufacturer: Huawei', 558.20, 2),
(9, 'Huawei Honor 10 (64GB)', 'HuaweiHonor10.png', 'Screen: 5.84\", RAM: 4GB, Space: 64GB, Camera: 16MP + 24MP, Selfie: 24MP, CPU Cores: 4+4 , Manufacturer: Huawei', 298.83, 2),
(10, 'Samsung Galaxy A7 (2018) Dual (64GB)', 'SamsungGalaxyA7(2018)Dual.png', 'Screen: 6\", RAM: 4GB, Space: 64GB, Camera: 24MP + 8MP, Selfie: 24MP, CPU Cores: 8 , Manufacturer: Samsung', 239.90, 3),
(11, 'Samsung Galaxy S9+ Dual (64GB)', 'SamsungGalaxyS9+Dual.png', 'Screen: 6.2\", RAM: 6GB, Space: 64GB, Camera: 12MP + 12MP, Selfie: 8MP, CPU Cores: 4+4 , Manufacturer: Samsung', 561.18, 3),
(12, 'Samsung Galaxy A6 (2018) Dual (32GB)', 'SamsungGalaxyA6(2018)Dual.png', 'Screen: 5.6\", RAM: 3GB, Space: 32GB, Camera: 16MP, Selfie: 16MP, CPU Cores: 8 , Manufacturer: Samsung', 178.80, 3),
(13, 'Samsung Galaxy Note 9 Dual (128GB)', 'SamsungGalaxyNote9Dual(128GB).png', 'Screen: 6.4\", RAM: 6GB, Space: 128GB, Camera: 12MP + 12MP, Selfie: 8MP, CPU Cores: 4+4 , Manufacturer: Samsung', 711.12, 3),
(14, 'Samsung Galaxy J6 Dual (32GB)', 'SamsungGalaxyJ6Dual.png', 'Screen: 5.6\", RAM: 3GB, Space: 32GB, Camera: 13MP, Selfie: 8MP, CPU Cores: 8 , Manufacturer: Samsung', 140.70, 3),
(15, 'Samsung Galaxy J7 (2017) Duos (16GB)', 'SamsungGalaxyJ7(2017)Duos.png', 'Screen: 5.5\", RAM: 3GB, Space: 16GB, Camera: 13MP, Selfie: 13MP, CPU Cores: 8 , Manufacturer: Samsung', 188.90, 3),
(16, 'Apple iPhone 8 Plus (64GB)', 'AppleiPhone8Plus.png', 'Screen: 5.5\", RAM: 3GB, Space: 64GB, Camera: 12MP + 12MP, Selfie: 7MP, CPU Cores: 4+2 , Manufacturer: Apple', 651.81, 4),
(17, 'Apple iPhone 7 (32GB)', 'AppleiPhone7.png', 'Screen: 4.7\", RAM: 2GB, Space: 32GB, Camera: 12MP, Selfie: 7MP, CPU Cores: 4 , Manufacturer: Apple', 408.90, 4),
(18, 'Apple iPhone XR (64GB)', 'AppleiPhoneXR.png', 'Screen: 6.1\", RAM: 3GB, Space: 64GB, Camera: 12MP, Selfie: 7MP , Manufacturer: Apple', 713.58, 4),
(19, 'Apple iPhone XS Max (64GB)', 'AppleiPhoneXSMax.png', 'Screen: 6.5\", RAM: 4GB, Space: 64GB, Camera: 12MP + 12MP, Selfie: 7MP, CPU Cores: 4+2 , Manufacturer: Apple', 1063.88, 4),
(20, 'Nokia 7 Plus Dual (64GB)', 'Nokia7PlusDual.png', 'Screen: 6\", RAM: 4GB, Space: 64GB, Camera: 12MP + 13MP, Selfie: 16MP, CPU Cores: 4+4 , Manufacturer: Nokia', 259.80, 5),
(21, 'Nokia 105 (2017) Dual', 'Nokia105(2017)Dual.png', 'Screen: 1.8\", Manufacturer: Nokia', 18.50, 5),
(22, 'Nokia 3.1 (16GB)', 'Nokia3.1.png', 'Screen: 5.2\", RAM: 2GB, Space: 16GB, Camera: 13MP, Selfie: 8MP, CPU Cores: 4+4 , Manufacturer: Nokia', 121.05, 5),
(23, 'Nokia 8 (64GB)', 'Nokia8.png', 'Screen: 5.3\", RAM: 4GB, Space: 64GB, Camera: 13MP + 13MP, Selfie: 13MP, CPU Cores: 4+4 , Manufacturer: Nokia', 328.94, 5),
(24, 'LG G7 ThinQ (64GB)', 'LGG7ThinQ.png', 'Screen: 6.1\", RAM: 4GB, Space: 64GB, Camera: 16MP + 16MP, Selfie: 8MP, CPU Cores: 4+4 , Manufacturer: LG', 355.85, 6),
(25, 'LG V30', 'LGV30.png', 'Screen: 6\", RAM: 4GB, Space: 64GB, Camera: 16MP + 13MP, Selfie: 5MP, CPU Cores: 4+4 , Manufacturer: LG', 385.20, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(16) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_number` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `telephone`, `street_name`, `street_number`, `zipcode`, `city`, `country`) VALUES
(-1, 'Anonymous', 'Anonymous', 'Anonymous', 'Anonymous', 'Anonymous', 'Anonymous', 'Anonymous', 'Anonymous', 'Anonymous'),
(1, 'test', 'test@test.com', '1234', '0123456789', 'a', 'a', 'a', 'a', 'a'),
(4, 'Ioannis Gkalmpenis', 'ioannis@gkalmpenis.gr', '123456789', '6912345678', 'Dyrraxiou', '28', '10443', 'Athens', 'Greece');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

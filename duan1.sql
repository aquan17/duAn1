-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 04, 2024 at 06:05 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `cart_item_id` int NOT NULL,
  `cart_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int NOT NULL,
  `category_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Áo Sơ Mi'),
(2, 'Quần jean'),
(3, 'Áo Khoác'),
(4, 'Áo Phông\r\n'),
(5, 'Áo Hoodie'),
(6, 'không xác định');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int NOT NULL,
  `note` varchar(500) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `product_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `note`, `user_id`, `product_id`, `created_at`, `status`) VALUES
(4, '123', 2, 2, '2024-11-25 03:28:28', 1),
(5, 'tuyệt vời', 2, 2, '2024-11-25 03:35:09', 1),
(6, 'đẹp lắm', 2, 2, '2024-11-25 03:39:24', 1),
(7, 'xinh quá', 2, 3, '2024-11-25 03:43:25', 1),
(8, 'go', 2, 2, '2024-11-25 10:27:50', 0),
(9, '1', 2, 2, '2024-11-26 02:09:50', 0),
(10, '1', 2, 2, '2024-11-26 02:40:41', 0),
(11, '1', 2, 2, '2024-11-26 02:40:55', 0),
(12, '12333', 2, 2, '2024-11-26 03:05:30', 0),
(13, 'mua vội', 10, 2, '2024-11-27 02:54:16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `full_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `note` text,
  `total_price` decimal(10,2) DEFAULT NULL,
  `order_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `status`, `full_name`, `address`, `city`, `phone`, `email`, `note`, `total_price`, `order_date`) VALUES

(1, NULL, '1', 'anhquandeptrai', 'quốc oai', 'Hà nội', '0862579104', 'quanpc147@gmail.com', '', '571000.00', NULL),
(2, NULL, NULL, 'huudan', 'quốc oai', 'Hà nội', '0862579104', 'quanpc147@gmail.com', '', '278000.00', '2024-11-26'),
(3, NULL, NULL, 'anhquan', 'quốc oai', 'Hà nội', '0862579104', 'quanpc147@gmail.com', '', '149000.00', '2024-11-26'),
(4, NULL, '6', 'bongnd', 'Số 47 Đường Ấp Nhập 1', 'Hà Nội', '0332356748', 'bong19062005@gmail.com', 'Đẹp', '298000.00', '2024-12-04'),
(5, NULL, NULL, 'bongnd', 'Số 47 Đường Ấp Nhập 1', 'Thọ An', '0332356748', 'bong19062005@gmail.com', 'Đẹp', '358000.00', '2024-12-04');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_item_id` int NOT NULL,
  `order_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `price` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `total_money` int DEFAULT NULL,
  `order_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_item_id`, `order_id`, `product_id`, `price`, `quantity`, `total_money`, `order_code`) VALUES
(22, 1, 2, 149000, 2, 298000, '#8528'),
(23, 1, 7, 144000, 1, 144000, '#8528'),
(24, 1, 3, 129000, 1, 129000, '#8528'),
(25, 2, 2, 149000, 1, 149000, '#5770'),
(26, 2, 3, 129000, 1, 129000, '#5770'),
(27, 3, 2, 149000, 1, 149000, '#9486'),
(28, 4, 2, 149000, 2, 298000, '#8299'),
(29, 5, 3, 129000, 1, 129000, '#1007'),
(30, 5, 8, 229000, 1, 229000, '#1007');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `discount` int DEFAULT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `description` longtext,
  `price` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `classify` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `title`, `discount`, `image`, `description`, `price`, `quantity`, `category_id`, `classify`) VALUES
(2, 'Áo Sơ Mi Nâu', 10, 'product-2.jpg', 'Áo sơ mi màu nâu, chất liệu cotton thoáng mát, thiết kế trẻ trung.', 149000, 50, 1, 1),
(3, 'Quần jean Nam Trơn', 10, 'product-4.png', ' Dáng quan jean nam ống côn trẻ trung ôm body tạo nên form skinny jeans nam cho người mặc túi quần lớn rất thuận tiện cho việc đựng smart phone hoặc ví cỡ bự.', 129000, 50, 2, 2),
(4, 'Quần jean ống rộng', 10, 'product-5.png', NULL, 199000, 50, 2, 2),
(5, 'Áo Thun Phối Thể Thao Simpson', 10, 'product-6.png', NULL, 169000, 50, 4, 3),
(7, 'Áo Khoác Bomber Dù Hai Lớp', 10, 'product-8.png', NULL, 144000, 50, 3, 1),
(8, 'ÁO Hoodie Zip', 10, 'product-9.jpg', NULL, 229000, 50, 5, 2),
(9, 'Áo hoodie nỉ bông DEUNCOOL BASIC', 10, 'product-10.jpg', NULL, 250000, 50, 5, 3),
(11, 'Áo Hoodie Teelab Morning Star Bunny', 10, 'product-12.png', 'good', 319000, 20, 5, 1),
(12, 'Quần jean nam ống rộng quần baggy', 10, 'product-11.png', 'tốt', 145000, 30, 2, 2),
(13, 'Áo Khoác Nam Nữ Unisex By PEABOO', 10, 'product-den.png', NULL, 159000, 50, 5, 3),
(14, 'Áo khoác hoodie nữ zip thông thường ấm cúng bền bỉ', 10, 'product-13.png', NULL, 129000, 50, 5, 1),
(15, 'Áo Khoác Thể Thao Tay Dài Màu Trơn', 10, 'product-14.png', NULL, 162000, 30, 3, 2),
(16, 'Áo khoác dù thể thao 2 lớp chống nắng chống gió thoáng mát', 10, 'product-15.png', NULL, 177000, 50, 3, 3),
(17, 'Áo Khoác Gió 2 lớp Teelab Winter Jacket', 10, 'product-16.png', NULL, 265000, 50, 3, 1),
(18, 'RANMO Áo Khoác hoodie áo khoác Chất lượng thời trang thoải mái', 10, 'product-17.png', NULL, 169000, 30, 3, 2),
(19, 'Áo Khoác JEAN NHUNG TAG Có Túi Trong Phối Viền Bo Chun Form Rộng', 10, 'product-18.png', NULL, 195000, 50, 3, 3),
(20, 'Áo Sơ Mi Tay Ngắn Kẻ Sọc Teelab Graffiti Unisex Form Oversize Local Brand màu Xanh', 10, 'product-19.png', NULL, 135000, 50, 1, 1),
(21, 'Áo sơ mi nam ngắn tay cổ vest form đẹp LADOS 8085 vải đũi thấm hút, sang trọng dễ phối đồ', 10, 'product-20.png', NULL, 139000, 50, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `color_id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `color_name` varchar(50) DEFAULT NULL,
  `color_code` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `price` int DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_img`
--

CREATE TABLE `product_img` (
  `img_id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `size_id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `size_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`size_id`, `product_id`, `size_name`) VALUES
(5, NULL, 'M');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int NOT NULL,
  `role_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'ADMIN'),
(2, 'Khách Hàng');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `cart_id` int NOT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `stat_id` int NOT NULL,
  `total_sales` int DEFAULT NULL,
  `total_orders` int DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `statistics`
--

INSERT INTO `statistics` (`stat_id`, `total_sales`, `total_orders`, `date`) VALUES
(1, 427000, 14, '2024-11-30 00:00:00'),
(2, 427000, 14, '2024-11-30 00:00:00'),
(3, 427000, 14, '2024-11-30 00:00:00'),
(4, 427000, 14, '2024-11-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `phone_number`, `address`, `role_id`) VALUES
(2, 'admin', '123123', 'quanpc2004@gmail.com', '0862579104', 'Xóm 10, Thôn  3, Xã Phượng Cách', 2),
(10, 'anhquan', '123123', 'quanpc147@gmail.com', '0862579104', 'quốc oai', 1),
(11, 'bongnd', '123', 'bong19062005@gmail.com', '0332356748', 'Số 47 Đường Ấp Nhập 1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`cart_item_id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `fk_product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`color_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_img`
--
ALTER TABLE `product_img`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`size_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`stat_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `cart_item_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_item_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `color_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_img`
--
ALTER TABLE `product_img`
  MODIFY `img_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `size_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `cart_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
  MODIFY `stat_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `shopping_cart` (`cart_id`),
  ADD CONSTRAINT `cart_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD CONSTRAINT `product_colors_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `product_details`
--
ALTER TABLE `product_details`
  ADD CONSTRAINT `product_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `product_img`
--
ALTER TABLE `product_img`
  ADD CONSTRAINT `product_img_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD CONSTRAINT `product_sizes_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `shopping_cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

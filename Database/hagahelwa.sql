-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2024 at 06:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hagahelwa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'ahmed', 'samy', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(3, 'omar', 'omar@gmail.com', 'complain', 'Dear [Customer Support],\r\n\r\nI hope this message finds you well. I recently purchased [Product Name] from your website, and while I appreciate the prompt delivery, I wanted to bring to your attention a small issue I encountered.', '2024-02-05 17:06:10');

-- --------------------------------------------------------

--
-- Stand-in structure for view `no_quantity`
-- (See below for the actual view)
--
CREATE TABLE `no_quantity` (
`id` int(11)
,`title` varchar(255)
,`price` varchar(255)
,`description` varchar(255)
,`quantity_available` varchar(255)
,`image` varchar(255)
,`admin_id` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `est_delivery_date` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `date`, `status`, `amount`, `payment_method`, `address`, `city`, `postal_code`, `est_delivery_date`, `user_id`) VALUES
(8, '2024-01-31 17:24:04', 'undelivered', '1450', 'Cash_on_Delivery', 'cairo egypt', 'cairo', '33333', '2024-02-03', 1),
(9, '2024-01-31 22:12:28', 'undelivered', '750', 'visa', 'cairo egypt', 'cairo', '33333', '2024-02-03', 1),
(10, '2024-02-01 14:18:39', 'undelivered', '550', 'Cash_on_Delivery', 'cairo egypt', 'cairo', '33333', '2024-02-04', 1),
(11, '2024-02-01 14:51:34', 'undelivered', '450', 'visa', 'cairo egypt', 'cairo', '33333', '2024-02-04', 4),
(12, '2024-02-01 15:20:08', 'undelivered', '550', 'Cash_on_Delivery', 'cairo egypt', 'cairo', '33333', '2024-02-04', 1),
(13, '2024-02-03 14:10:42', 'undelivered', '750', 'Cash_on_Delivery', 'cairo egypt', 'cairo', '33333', '2024-02-06', 1),
(14, '2024-02-03 15:47:13', 'undelivered', '800', 'Cash_on_Delivery', 'cairo egypt', 'cairo', '33333', '2024-02-06', 1),
(15, '2024-02-03 15:51:48', 'undelivered', '400', 'Cash_on_Delivery', 'cairo egypt', 'cairo', '33333', '2024-02-06', 1),
(16, '2024-02-03 15:54:00', 'undelivered', '400', 'Cash_on_Delivery', 'cairo egypt', 'cairo', '33333', '2024-02-06', 1),
(17, '2024-02-04 20:47:07', 'undelivered', '1100', 'Cash_on_Delivery', 'cairo egypt', 'cairo', '33333', '2024-02-07', 1),
(18, '2024-02-04 21:25:37', 'undelivered', '550', 'visa', 'cairo egypt', 'cairo', '33333', '2024-02-07', 1),
(19, '2024-02-04 22:00:33', 'undelivered', '800', 'Cash_on_Delivery', 'cairo egypt', 'cairo', '33333', '2024-02-07', 1),
(20, '2024-02-05 17:03:26', 'undelivered', '1950', 'visa', 'cairo egypt', 'cairo', '33333', '2024-02-08', 7);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `orderDetails_id` int(11) NOT NULL,
  `product_quantity` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `product_id`, `orderDetails_id`, `product_quantity`, `amount`) VALUES
(9, 12, 8, '1', '750'),
(10, 20, 8, '1', '700'),
(11, 12, 9, '1', '750'),
(12, 8, 10, '1', '550'),
(13, 19, 11, '1', '450'),
(14, 8, 12, '1', '550'),
(15, 12, 13, '1', '750'),
(16, 12, 14, '1', '800'),
(17, 22, 15, '1', '400'),
(18, 22, 16, '1', '400'),
(19, 8, 17, '1', '550'),
(20, 8, 17, '1', '550'),
(21, 8, 18, '1', '550'),
(22, 12, 19, '1', '800'),
(23, 11, 20, '1', '1250'),
(24, 20, 20, '1', '700');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantity_available` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_deleted` varchar(255) NOT NULL DEFAULT 'no',
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `price`, `description`, `quantity_available`, `image`, `is_deleted`, `admin_id`) VALUES
(4, 'Zara', '345', 'shirt', '32', '65afdc503e431_f1.jpg', 'no', 1),
(5, 'Defacto', '450', 'jeans', '30', '65afe0456154a_f7.jpg', 'no', 1),
(7, 'Nike', '360', 'shirt', '32', '65b1303b060fe_f3.jpg', 'no', 1),
(8, 'Active', '550', 'shirt', '26', '65b7ba4c6ad05_f2.jpg', 'no', 1),
(9, 'Zara', '475', 'shirt', '40', '65b7ba709841c_f4.jpg', 'no', 1),
(10, 'Max', '600', 'shirt', '30', '65b7bb6ea4d96_f5.jpg', 'no', 1),
(11, 'Zara', '1250', 'jacket', '6', '65b7bba356ccc_f6.jpg', 'no', 1),
(12, 'Max', '800', 'dress', '30', '65b7bbdf0238f_f8.jpg', 'no', 1),
(13, 'Zara', '550', 'shirt', '29', '65b7bc0f60c2b_n1.jpg', 'no', 1),
(14, 'Defacto', '600', 'shirt', '29', '65b7bc2a24c8e_n2.jpg', 'no', 1),
(15, 'Defacto', '350', 'shirt', '34', '65b7bc518c62b_n3.jpg', 'no', 1),
(16, 'Active', '950', 'shirt', '25', '65b7bc82e1f5a_n4.jpg', 'no', 1),
(17, 'Defacto', '400', 'shirt', '20', '65b7bc9d6e48d_n5.jpg', 'no', 1),
(18, 'Adidas', '355', 'shirt', '29', '65b7bccd432f6_n8.jpg', 'no', 1),
(19, 'Zara', '450', 'shirt', '11', '65b7bce9b1789_n7.jpg', 'no', 1),
(20, 'Defacto', '700', 'shorts', '10', '65b7bd29a1e54_n6.jpg', 'no', 1),
(22, 'Adidas', '400', 'shoes', '6', '65be60d38927b_shoes.jpg', 'yes', 1),
(24, 'Adidas', '300', 'shoes', '0', '65c1137f02d00_shoes2.jpg', 'no', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `status`, `phone_number`, `address`, `created_at`, `admin_id`) VALUES
(1, 'omar', 'haitham', 'omar@gmail.com', '$2y$10$XHZpFIiFPtxmn25LGSllnOEwjTmWXpquq4XTNuhyYIw9KopviD5b2', 'active', '1002531616', 'cairo egypt', '2024-01-21 20:14:46.174875', 1),
(3, 'ahmed', 'sami', 'ahmed@gmail.com', '$2y$10$1igsHw0ekelgPoN99QcD/O2gHixpO23ygcwzGjfixhPiG.SwQzT4O', 'suspended', '1002531612', 'cairo egypt', '2024-01-22 14:21:26.865699', 1),
(4, 'mazen', 'hagag', 'mazen@gmail.com', '$2y$10$hWlZQ6PB4NGaQn/49Gv5c.BGDNsEUmiKyIc6JTb/VxM7SVqMupf1G', 'active', '1002231616', 'cairo egypt', '2024-01-29 15:11:46.675688', 1),
(7, 'sayed', 'omar', 'sayed@gmail.com', '$2y$10$OCsI3FRRqnQ3xEWsvRQHUOWQVXzgKThFIXgQyG3DNcgY.s32m6GIS', 'active', '1002511616', 'cairo egypt', '2024-02-05 17:01:50.336499', 1);

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `lower_name` BEFORE INSERT ON `user` FOR EACH ROW SET NEW.first_name = LOWER(NEW.first_name), 
        NEW.last_name = LOWER(NEW.last_name)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_purchases_details`
-- (See below for the actual view)
--
CREATE TABLE `user_purchases_details` (
`email` varchar(255)
,`name` varchar(511)
,`product_title` varchar(255)
,`product_description` varchar(255)
,`quantity` varchar(255)
,`amount` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `no_quantity`
--
DROP TABLE IF EXISTS `no_quantity`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `no_quantity`  AS SELECT `product`.`id` AS `id`, `product`.`title` AS `title`, `product`.`price` AS `price`, `product`.`description` AS `description`, `product`.`quantity_available` AS `quantity_available`, `product`.`image` AS `image`, `product`.`admin_id` AS `admin_id` FROM `product` WHERE `product`.`quantity_available` = 0 ;

-- --------------------------------------------------------

--
-- Structure for view `user_purchases_details`
--
DROP TABLE IF EXISTS `user_purchases_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_purchases_details`  AS SELECT `u`.`email` AS `email`, concat(`u`.`first_name`,' ',`u`.`last_name`) AS `name`, `p`.`title` AS `product_title`, `p`.`description` AS `product_description`, `op`.`product_quantity` AS `quantity`, `op`.`amount` AS `amount` FROM (((`user` `u` join `order_details` `od` on(`u`.`id` = `od`.`user_id`)) join `order_product` `op` on(`od`.`id` = `op`.`orderDetails_id`)) join `product` `p` on(`op`.`product_id` = `p`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usr_key` (`user_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_key` (`orderDetails_id`),
  ADD KEY `product_key` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `title` (`title`),
  ADD KEY `description` (`description`),
  ADD KEY `image` (`image`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD KEY `admin foreign key` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `usr_key` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_key` FOREIGN KEY (`orderDetails_id`) REFERENCES `order_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_key` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `shopping_cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shopping_cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `admin foreign key` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

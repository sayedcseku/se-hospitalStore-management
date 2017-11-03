-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2017 at 02:34 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit`
--

CREATE TABLE `audit` (
  `id` int(11) NOT NULL,
  `a_date` date NOT NULL,
  `u_id` int(11) NOT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `manufecturer`
--

CREATE TABLE `manufecturer` (
  `id` int(11) NOT NULL,
  `man_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manufecturer`
--

INSERT INTO `manufecturer` (`id`, `man_name`) VALUES
(2, 'A.tech'),
(1, 'A4tech'),
(5, 'Basundhara'),
(3, 'Intel'),
(6, 'Naturas'),
(7, 'Olympic'),
(4, 'Square');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `o_date` date NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'pending',
  `user_id` int(11) NOT NULL,
  `g_date` date DEFAULT NULL,
  `g_amount` int(11) DEFAULT NULL,
  `after_amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `o_date`, `status`, `user_id`, `g_date`, `g_amount`, `after_amount`) VALUES
(1, '2017-08-14', 'approved', 2, '2017-10-31', 2, 0),
(2, '2017-08-15', 'pending', 4, NULL, NULL, 0),
(3, '2017-08-15', 'pending', 4, NULL, NULL, 0),
(4, '2017-09-10', 'pending', 2, NULL, NULL, 0),
(5, '2017-10-24', 'pending', 5, NULL, NULL, 0),
(6, '2017-10-24', 'approved', 5, '2017-10-31', 1, 0),
(7, '2017-10-24', 'pending', 5, NULL, NULL, 0),
(8, '2017-10-24', 'pending', 5, NULL, NULL, 0),
(9, '2017-10-24', 'pending', 5, NULL, NULL, 0),
(10, '2017-10-31', 'pending', 5, NULL, NULL, NULL),
(11, '2017-10-31', 'approved', 5, '2017-10-31', 2, 8),
(12, '2017-10-31', 'pending', 5, NULL, NULL, NULL),
(13, '2017-10-31', 'pending', 5, NULL, NULL, NULL),
(14, '2017-10-31', 'approved', 5, '2017-10-31', 1, 54),
(15, '2017-10-31', 'pending', 5, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `p_name` varchar(150) NOT NULL,
  `p_amount` int(11) NOT NULL DEFAULT '0',
  `specs` varchar(300) NOT NULL,
  `man_id` int(11) NOT NULL,
  `ptype_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `p_name`, `p_amount`, `specs`, `man_id`, `ptype_id`) VALUES
(1, 'Mouse-Usb', 54, 'USB 3.0', 1, 1),
(2, 'Mouse-Ps2', 36, 'PS2 mouse for computer', 1, 1),
(3, 'Mithanol-10', 0, '10% mithanol,500mL', 4, 6),
(4, 'Exercise Book-150', 0, 'margined 150 page exercise book', 5, 2),
(5, 'Pencil -2B', 8, '2B pencil with back erager', 6, 2),
(7, 'Laptop', 10, 'Core i5, 8gb Ram, 2Gb graphix card', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_for_store`
--

CREATE TABLE `product_for_store` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `before_amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_for_store`
--

INSERT INTO `product_for_store` (`id`, `p_id`, `r_id`, `amount`, `before_amount`) VALUES
(1, 1, 1, 10, 0),
(9, 2, 3, 36, 0),
(10, 1, 4, 10, 35),
(11, 1, 1, 10, 45),
(12, 5, 3, 10, 0);

--
-- Triggers `product_for_store`
--
DELIMITER $$
CREATE TRIGGER `incoming_update` BEFORE INSERT ON `product_for_store` FOR EACH ROW BEGIN
  	SET @x = (SELECT products.p_amount FROM products WHERE id = NEW.p_id); 
    UPDATE products SET products.p_amount = (products.p_amount + NEW.amount) WHERE products.id = NEW.p_id;
  END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE `product_order` (
  `id` int(11) NOT NULL,
  `order_no` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `o_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_order`
--

INSERT INTO `product_order` (`id`, `order_no`, `p_id`, `o_amount`) VALUES
(19, 11, 5, 1),
(23, 12, 3, 1),
(27, 14, 1, 1),
(28, 15, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `id` int(11) NOT NULL,
  `type_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`id`, `type_name`) VALUES
(1, 'Computer Related Excessories'),
(2, 'Stationary and others'),
(3, 'Furniture'),
(4, 'Electronics'),
(5, 'Sports'),
(6, 'Chemical and Reagents'),
(7, 'Instruments'),
(8, 'blah');

-- --------------------------------------------------------

--
-- Table structure for table `reciepts`
--

CREATE TABLE `reciepts` (
  `id` int(11) NOT NULL,
  `cmemo_no` varchar(150) NOT NULL,
  `r_date` date NOT NULL,
  `brought_from` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reciepts`
--

INSERT INTO `reciepts` (`id`, `cmemo_no`, `r_date`, `brought_from`) VALUES
(1, 'B12-C45-7PO', '2017-08-14', 'AK IT Solution, Jalil Tower, Dakbangla, Khulna'),
(2, 'B12-N26-36L', '2017-08-15', 'Sohag Book depo, New Market, Khulna'),
(3, 'B12-N26-31P', '2017-08-15', 'Square Pharmaceutical Co, Narayongonj, Dhaka'),
(4, 'k15-l96-p69', '2017-10-09', 'Kazi Enterprize, New market, Khulna');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `r_name` varchar(64) NOT NULL,
  `r_desc` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `r_name`, `r_desc`) VALUES
(4, 'Admin', 'Controls the whole system'),
(5, 'Manager', 'Input most of the data and manages the store '),
(6, 'Customer', 'Customer of the store'),
(7, 'Manager Assistant', 'Help manager to manage the store.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(64) NOT NULL,
  `lname` varchar(64) NOT NULL,
  `address` varchar(150) NOT NULL,
  `email` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `address`, `email`, `username`, `password`, `role_id`) VALUES
(2, 'Abu', 'Sayed', 'KBAH, KU', 'sayed4931@gmail.com', 'admin', 'admin123', 4),
(3, 'Mr.', 'X', 'Boyra, Khulna', 'mrx@test.com', 'manager', 'manager123', 5),
(4, 'Radiology', 'Department', 'Radiology Department, Khulna Medical', 'rd.kmed@test.com', 'user_radiology', 'radio123', 6),
(5, 'Abu', 'Sayed', 'KU', 'sayed@test.com', 'abu_sayed', '123', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit`
--
ALTER TABLE `audit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`u_id`);

--
-- Indexes for table `manufecturer`
--
ALTER TABLE `manufecturer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `man_name` (`man_name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `man_id` (`man_id`),
  ADD KEY `ptype_id` (`ptype_id`);

--
-- Indexes for table `product_for_store`
--
ALTER TABLE `product_for_store`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `r_id` (`r_id`);

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_no_2` (`order_no`),
  ADD KEY `order_no` (`order_no`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reciepts`
--
ALTER TABLE `reciepts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cmemo_no` (`cmemo_no`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `r_name` (`r_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manufecturer`
--
ALTER TABLE `manufecturer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `product_for_store`
--
ALTER TABLE `product_for_store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `reciepts`
--
ALTER TABLE `reciepts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `audit`
--
ALTER TABLE `audit`
  ADD CONSTRAINT `audit_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`ptype_id`) REFERENCES `product_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`man_id`) REFERENCES `manufecturer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_for_store`
--
ALTER TABLE `product_for_store`
  ADD CONSTRAINT `product_for_store_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `reciepts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_for_store_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_order`
--
ALTER TABLE `product_order`
  ADD CONSTRAINT `product_order_ibfk_1` FOREIGN KEY (`order_no`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_order_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

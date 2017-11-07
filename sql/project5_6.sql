-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2017 at 07:07 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project5.6`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `address` varchar(95) NOT NULL,
  `email` varchar(120) DEFAULT NULL,
  `phone` bigint(15) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `address`, `email`, `phone`) VALUES
(1, 'Customer A', 'Address C0', 'customer00@mail.com', 9911223340),
(2, 'Customer B', 'Address C1', 'customer01@mail.com', 9911223341),
(3, 'Customer C', 'Address C2', 'customer02@mail.com', 9911223342),
(4, 'Customer D', 'Address C3', 'customer03@mail.com', 9911223343),
(5, 'Customer E', 'Address C4', 'customer04@mail.com', 9911223344),
(6, 'Customer F', 'Address C5', 'customer05@mail.com', 9911223345),
(7, 'Customer G', 'Address C6', 'customer06@mail.com', 9911223346),
(8, 'Customer H', 'Address C7', 'customer07@mail.com', 9911223347),
(9, 'Customer I', 'Address C8', 'customer08@mail.com', 9911223348),
(10, 'Customer J', 'Address C9', 'customer09@mail.com', 9911223349);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `address` varchar(95) NOT NULL,
  `phone` bigint(15) UNSIGNED NOT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `doj` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `address`, `phone`, `gender`, `doj`) VALUES
(1, 'Employee A', 'Address E0', 123456780, 'M', '2017-01-01'),
(2, 'Employee B', 'Address E1', 123456781, 'F', '2017-01-02'),
(3, 'Employee C', 'Address E2', 123456782, 'M', '2017-01-03'),
(4, 'Employee D', 'Address E3', 123456783, 'F', '2017-01-04'),
(5, 'Employee E', 'Address E4', 123456784, 'M', '2017-01-05'),
(6, 'Employee F', 'Address E5', 123456785, 'F', '2017-01-06'),
(7, 'Employee G', 'Address E6', 123456786, 'M', '2017-01-07'),
(8, 'Employee H', 'Address E7', 123456787, 'F', '2017-01-08'),
(9, 'Employee I', 'Address E8', 123456788, 'M', '2017-01-09'),
(10, 'Employee J', 'Address E9', 123456789, 'F', '2017-01-10');

-- --------------------------------------------------------

--
-- Table structure for table `merchants`
--

CREATE TABLE `merchants` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `address` varchar(95) NOT NULL,
  `email` varchar(120) NOT NULL,
  `phone` bigint(15) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchants`
--

INSERT INTO `merchants` (`id`, `name`, `address`, `email`, `phone`) VALUES
(1, 'Merchant A', 'Address M0', 'merchant00@mail.com', 9945231220),
(2, 'Merchant B', 'Address M1', 'merchant01@mail.com', 9945231221),
(3, 'Merchant C', 'Address M2', 'merchant02@mail.com', 9945231222),
(4, 'Merchant D', 'Address M3', 'merchant03@mail.com', 9945231223),
(5, 'Merchant E', 'Address M4', 'merchant04@mail.com', 9945231224),
(6, 'Merchant F', 'Address M5', 'merchant05@mail.com', 9945231225),
(7, 'Merchant G', 'Address M6', 'merchant06@mail.com', 9945231226),
(8, 'Merchant H', 'Address M7', 'merchant07@mail.com', 9945231227),
(9, 'Merchant I', 'Address M8', 'merchant08@mail.com', 9945231228),
(10, 'Merchant J', 'Address M9', 'merchant09@mail.com', 9945231229);
-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`) VALUES
(1, 'Product A'),
(2, 'Product B'),
(3, 'Product C'),
(4, 'Product D'),
(5, 'Product E'),
(6, 'Product F'),
(7, 'Product G'),
(8, 'Product H'),
(9, 'Product I'),
(10, 'Product J');

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` int(11) NOT NULL,
  `rate` decimal(13,4) UNSIGNED NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `rate`, `date`) VALUES
(1, '29921.0213', '2017-02-01'),
(2, '29941.0516', '2017-02-02'),
(3, '29321.0213', '2017-02-03'),
(4, '28566.5122', '2017-02-04'),
(5, '29644.6324', '2017-02-05'),
(6, '29631.5231', '2017-02-06'),
(7, '29765.3422', '2017-02-07'),
(8, '29991.4234', '2017-02-08'),
(9, '29866.7660', '2017-02-09'),
(10, '28652.9912', '2017-02-10');

-- --------------------------------------------------------

--
-- Table structure for table `sold_items`
--

CREATE TABLE `sold_items` (
  `id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `price` int(7) NOT NULL,
  `dos` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sold_items`
--

INSERT INTO `sold_items` (`id`, `stock_id`, `customer_id`, `employee_id`, `transaction_id`, `price`, `dos`) VALUES
(1, 1, 1, 1, 1, 61233, '2017-10-19 03:35:07');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `weight` int(11) UNSIGNED NOT NULL,
  `purity` int(10) UNSIGNED NOT NULL,
  `dop` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `product_id`, `merchant_id`, `weight`, `purity`, `dop`) VALUES
(1, 1, 1, 12, 12, '2017-09-06 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `weight` int(10) UNSIGNED NOT NULL,
  `purity` int(10) UNSIGNED NOT NULL,
  `rate_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `weight`, `purity`, `rate_id`) VALUES
(1, 12, 22, 1),
(2, 13, 23, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(128) NOT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `employee_id`, `email`, `password`, `admin`) VALUES
(1, 1, 'employee01@mail.com', 'secret', 1),
(2, 2, 'employee02@mail.com', 'secret', 0),
(3, 3, 'employee03@mail.com', 'secret', 1),
(4, 4, 'employee04@mail.com', 'secret', 0),
(5, 5, 'employee05@mail.com', 'secret', 1),
(6, 6, 'employee06@mail.com', 'secret', 0),
(7, 7, 'employee07@mail.com', 'secret', 1),
(8, 8, 'employee08@mail.com', 'secret', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `merchants`
--
ALTER TABLE `merchants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `date` (`date`);

--
-- Indexes for table `sold_items`
--
ALTER TABLE `sold_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `stock_id` (`stock_id`),
  ADD KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_id` (`product_id`),
  ADD KEY `merchant_id` (`merchant_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rate_id` (`rate_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_id` (`employee_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `merchants`
--
ALTER TABLE `merchants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sold_items`
--
ALTER TABLE `sold_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `sold_items`
--
ALTER TABLE `sold_items`
  ADD CONSTRAINT `sold_items_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sold_items_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sold_items_ibfk_3` FOREIGN KEY (`stock_id`) REFERENCES `stocks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sold_items_ibfk_4` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_ibfk_1` FOREIGN KEY (`merchant_id`) REFERENCES `merchants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stocks_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`rate_id`) REFERENCES `rates` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

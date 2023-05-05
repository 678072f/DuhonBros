-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2023 at 12:12 AM
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
-- Database: `duhonbros`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` bigint(8) UNSIGNED NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `product_id` bigint(8) UNSIGNED NOT NULL,
  `customer_id` bigint(8) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint(8) UNSIGNED NOT NULL,
  `product_name` text NOT NULL,
  `item_num` int(4) UNSIGNED NOT NULL,
  `product_description` text NOT NULL,
  `product_status` text NOT NULL,
  `product_price` decimal(7,2) NOT NULL DEFAULT 0.00,
  `product_image` text NOT NULL DEFAULT 'placeholder.png',
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `item_num`, `product_description`, `product_status`, `product_price`, `product_image`, `date_added`) VALUES
(1, 'Burnt Wood Texas Flag', 1000, 'Hand made texas flag made with pine, burnt grain and stained.', 'IN STOCK', '112.00', 'tx_flag.png', '2023-01-21'),
(2, 'Burnt Wood American Flag', 1001, 'American Flag made with pine wood, burnt along the grain, and stained.', 'IN STOCK', '110.00', 'am_flag.png', '2023-01-21'),
(3, 'Test Product', 1111, 'This is a test', 'IN STOCK', '2.00', 'placeholder.png', '2023-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `profiles_id` int(11) NOT NULL,
  `profiles_about` text NOT NULL,
  `profiles_status` text NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`profiles_id`, `profiles_about`, `profiles_status`, `users_id`) VALUES
(1, 'Welcome Daniel! This is the administration panel for DuhonBros. I am the founder of DuhonBros. Test adding database.', 'Logged in as: danielgduhon', 10),
(2, 'Welcome Jonathan! This is the administration panel for DuhonBros.', 'Logged in as: jonathanpduhon', 12),
(3, 'Welcome Morgan! This is the administration panel for DuhonBros.', 'Logged in as: mfholland2001', 13),
(4, 'Welcome Eva! This is the administration panel for DuhonBros.', 'Logged in as: eduhon', 14),
(5, 'Welcome Steven! This is the administration panel for DuhonBros.', 'Logged in as: steve123', 15);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(128) NOT NULL,
  `lname` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `administrator` tinyint(1) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `creation_date` date NOT NULL DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `username`, `password`, `administrator`, `active`, `creation_date`) VALUES
(10, 'Daniel', 'Duhon', 'danielgduhon@gmail.com', 'danielgduhon', '$2y$10$vEMIJ8GVbQAXl.Pn3zN2gesNKodaWSYewgnm8NqOD21lQHs97q9ly', 1, 1, '2023-02-01'),
(12, 'Jonathan', 'Duhon', 'jonathanpduhon@gmail.com', 'jonathanpduhon', '$2y$10$CDeN56xnuwyuWBmMN/K7/.N9NDutghDGEByLkPg81A8/YpfexGOnO', 1, 1, '2023-02-01'),
(13, 'Morgan', 'Holland', 'mfholland2001@gmail.com', 'mfholland2001', '$2y$10$QNBa8ZtOWpTE9ofmQKRANOz.apk5m5Y5t3XIbBjuFjYQ8z5EpqA16', 1, 0, '2023-02-01'),
(14, 'Eva', 'Duhon', 'eva.duhon@gmail.com', 'eduhon', '$2y$10$klfq1yV8Qzjvk4D7hA6Pi.ZsLLD0liojyxQhkwpFRIbaNXOzD6hCe', 0, 0, '2023-02-01'),
(15, 'Steven', 'Bisso', 'steve@example.com', 'steve123', '$2y$10$tve.MZOSXiLFu671g5Ej1.Ij8iGtPlXWN1cKloFLbUjLzg.jZgWCW', 1, 0, '2023-04-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`profiles_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `profiles_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

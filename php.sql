-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 03, 2021 at 12:50 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id_checkout` int(11) NOT NULL,
  `name_user` varchar(50) NOT NULL,
  `name_product` varchar(50) NOT NULL,
  `price_product` int(11) NOT NULL,
  `date_product` date NOT NULL,
  `stock_product` int(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `status` enum('pending','accept','reject') NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id_checkout`, `name_user`, `name_product`, `price_product`, `date_product`, `stock_product`, `address`, `status`, `createdAt`) VALUES
(13, 'riyaraa', 'Mackbook Air 2021', 480000000, '2021-05-02', 2, 'Jalan Krendang no 15', 'pending', '2021-05-01 22:05:06'),
(14, 'johan', 'Mackbook Air 2021', 480000000, '2021-05-03', 2, 'Jalan Krendang no 15', 'pending', '2021-05-03 05:05:10');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `name_product` varchar(100) NOT NULL,
  `price_product` int(11) NOT NULL,
  `category_product` varchar(20) NOT NULL,
  `stock_product` int(11) NOT NULL,
  `desc_product` varchar(100) NOT NULL,
  `release_product` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `name_product`, `price_product`, `category_product`, `stock_product`, `desc_product`, `release_product`) VALUES
(1, 'Mackbook Air 2021', 240000000, 'Elektronik', 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '2021-05-01 17:00:00'),
(2, 'Oppo a53', 2500000, 'Elektronik', 1, 'OPPO A53 dibekali layar Neo-Display 6,5\" refresh rate 90Hz, chipset Snapdragon 460 dipadukan RAM 4GB', '2021-05-01 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `role` enum('customer','admin') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `role`, `created_at`) VALUES
(2, 'kousei', '$2y$10$z72gSZfX.ed7mSxndzrLjut9EHsoBTahYYSfsTVBzkchrPoWxI9Xq', 'arrima kousei', 'customer', '2021-05-01 20:05:29'),
(12, 'rino', '$2y$10$pyeqBwqnXArmh234yRnD4uQqBmw9192Vjj.8RYYfZd8W5ctfdoskO', 'riyaraa', 'admin', '2021-05-01 00:05:35'),
(13, 'johan', '$2y$10$YKNtPBSWltwt7GKOYg0HP.SAbRSJD.Z.lHXXaKLt1vpEB8gNjQqGK', 'johan', 'customer', '2021-05-03 05:05:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id_checkout`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id_checkout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

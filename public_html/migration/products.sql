-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 16, 2022 at 05:16 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stocks`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `sku` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `productType` varchar(11) NOT NULL,
  `size` varchar(50) DEFAULT NULL,
  `weight` varchar(50) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `length` int(11) DEFAULT NULL,
  `width` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sku`, `name`, `price`, `productType`, `size`, `weight`, `height`, `length`, `width`) VALUES
(31, 'GCN-986-427', 'Marathon Runner', 25, 'DVD', '256', NULL, NULL, NULL, NULL),
(38, 'GNM-687-GCN', 'SOFA', 345, 'Furniture', NULL, NULL, 244, 345, 345),
(41, 'SNG-895', 'MY BOOL', 34, 'Book', NULL, '234', NULL, NULL, NULL),
(43, 'EGEB-589-358', 'GREATMAN', 6256, 'DVD', '234', NULL, NULL, NULL, NULL),
(44, 'GRNT-569', 'MINE', 300, 'Furniture', NULL, NULL, 5, 8, 6),
(54, 'MANUNIT-85989', 'GREAT', 234, 'DVD', '3453', NULL, NULL, NULL, NULL),
(69, '2656-895', 'The Dragon', 234, 'DVD', '345', NULL, NULL, NULL, NULL),
(71, '4556-GKN', 'Flat chair', 35, 'Furniture', NULL, NULL, 45, 232, 34),
(73, 'SGM-GHN', 'War and peace', 20, 'Book', NULL, '2', NULL, NULL, NULL),
(74, 'gNM-MNG-856', 'FAILING NATION', 23, 'DVD', '23', NULL, NULL, NULL, NULL),
(76, 'GMN-586', 'GHANA', 23, 'DVD', '34', NULL, NULL, NULL, NULL),
(78, 'SNK-895', 'The Great Power', 34, 'DVD', '345', NULL, NULL, NULL, NULL),
(79, 'rry', 'ryr', 45, 'Furniture', NULL, NULL, 45, 454, 45),
(81, 'GHN-258-GHN', 'Yosiah', 234, 'DVD', '234', NULL, NULL, NULL, NULL),
(83, 'GNHM', 'GREAT', 2345, 'DVD', '345', NULL, NULL, NULL, NULL),
(84, 'DANIAHKS', 'wrwr', 34, 'Furniture', NULL, NULL, 343, 3434, 343),
(86, 'hghgh', 'fgfh', 456, 'DVD', '45', NULL, NULL, NULL, NULL),
(89, 'fdfd', 'dfgd', 45, 'DVD', '34', NULL, NULL, NULL, NULL),
(91, 'SNG-789', 'The Power Tool', 234, 'DVD', '345', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku` (`sku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

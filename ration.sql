-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2024 at 04:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ration`
--

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `card_type` enum('white','blue','pink','yellow') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `rice` varchar(50) NOT NULL,
  `atta` varchar(50) NOT NULL,
  `wheat` varchar(50) NOT NULL,
  `rice_price` decimal(10,2) DEFAULT NULL,
  `atta_price` decimal(10,2) DEFAULT NULL,
  `wheat_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `card_type`, `created_at`, `rice`, `atta`, `wheat`, `rice_price`, `atta_price`, `wheat_price`) VALUES
(5, 'white', '2024-09-26 06:23:48', '1', '0', '0', 19.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `usertype` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`email`, `password`, `usertype`) VALUES
('famischalakkal@gmail.com', 'asdf', 0),
('admin@gmail.com', 'admin123', 3),
('', '', 0),
('famischalakkal@gmail.com', 'asdf', 0),
('chalakkalration@gmail.com', 'asdf', 1),
('chalakkalration@gmail.com', 'asdfg', 1),
('suresh123@gmail.com', 'fyyuiigg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` int(11) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `shop_owner` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `shop_name`, `address`, `contact_number`, `created_at`, `shop_owner`, `email`, `password`) VALUES
(3, 'challakal', 'chalakkal ', '9879879876', '2024-09-26 09:34:40', 'swalih', 'chalakkalration@gmail.com', 'asdfg'),
(4, 'surya stores', 'companypady', '6788768899', '2024-10-05 12:41:27', 'suresh', 'suresh123@gmail.com', 'fyyuiigg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(25) NOT NULL,
  `phno` int(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `address` varchar(100) NOT NULL,
  `pincode` int(10) NOT NULL,
  `rcardno` int(30) NOT NULL,
  `password` varchar(38) NOT NULL,
  `usid` int(10) NOT NULL,
  `card_color` varchar(20) DEFAULT NULL,
  `members` int(11) DEFAULT NULL,
  `ration_card_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `phno`, `email`, `address`, `pincode`, `rcardno`, `password`, `usid`, `card_color`, `members`, `ration_card_image`) VALUES
('Famis Noushad ', 348659345, 'famischalakkal@gmail.com', 'Thottathil kottapurath house', 683105, 2147483647, 'asdf', 5, 'white', 4, 'uploads/card_199913294.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

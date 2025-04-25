-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 25, 2025 at 01:15 PM
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
-- Database: `d'brewista cafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `description`, `submitted_at`) VALUES
(15, 'di', 'upulshanthakodithuwakku@gmail.com', 'df', '2025-04-22 13:13:06'),
(16, 'D&#039; Brewista Cafe', 'dilmiwandanakodithuwakku30@gmail.com', 'hi hlo nama mokdd oyage', '2025-04-24 06:16:35'),
(17, 'D&#039; Brewista Cafe', 'dilmiwandanakodithuwakku30@gmail.com', 'qwertyui', '2025-04-25 09:53:52');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `category`, `price`, `category_id`) VALUES
(4, 'Croissant', 'Desserts', 590.00, NULL),
(5, 'Muffin', 'Desserts', 520.00, NULL),
(6, 'Brownies', 'Desserts', 450.00, NULL),
(7, 'Cheesecake', 'Desserts', 650.00, NULL),
(8, 'Hot Chocolate', 'Non-Coffee', 640.00, NULL),
(9, 'Milkshake', 'Non-Coffee', 600.00, NULL),
(10, 'Smoothie', 'Non-Coffee', 580.00, NULL),
(11, 'Green Tea', 'Non-Coffee', 590.00, NULL),
(13, 'Espresso', 'Coffee', 450.00, NULL),
(14, 'Latte', 'Coffee', 600.00, NULL),
(15, 'Americano', 'Coffee', 430.00, NULL),
(16, 'Coffee Milk', 'Coffee', 300.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_name`, `description`, `image`) VALUES
(2, 'COFFEE', 'Wide range of steaming hot coffee to make you fresh and light.', 'coffee-image.jpg'),
(3, 'NON COFFEE', 'Quench your thirst and refresh your soul with every sip.', 'non-coffee-image.jpg'),
(4, 'DESSERTS', 'Satiate your palate and take you on a culinary treat.', 'desserts-image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(17, 'asp2022076', 'dilmiwandanakodithuwakku30@gmail.com', '$2y$10$0fUsqHkScuM.wvGrHm1m5.paDTYfnnYDfTCsy8rmKxp.7LPxxp4yy'),
(18, 'ASP/2022/076', 'dilmiwandanakodithuwakku30@gmail.com', '$2y$10$RhY9edGCzrd6BEqW01aUQ.4LUnqWPQEShDvLt0QbI9475WMe8ikES');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

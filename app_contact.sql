-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 10, 2024 at 07:22 AM
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
-- Database: `app_contact`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `author_id` int DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `phone` text,
  `address` varchar(255) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `author_id`, `image`, `phone`, `address`, `created_date`, `update_date`, `is_active`) VALUES
(2, 'guri', 'guri528@gmail.com', 2, '1709277525.jpg', '7518563545', 'address', '2024-03-01 12:48:45', '2024-03-01 12:48:45', 1),
(3, 'guri', 'guri5286@gmail.com', 2, '1709279244.jpg', '8527456852', 'address', '2024-03-01 13:17:24', '2024-03-01 13:17:24', 1),
(4, 'gopi singh', 'gopi852@gmai.com', 5, '1709552051.jpg', '8527419635', 'edjkasdmcldamvl;dvm;dlfvm;f', '2024-03-04 17:04:12', '2024-03-04 17:04:12', 1),
(5, 'sumit kumar', 'kumar2010@gmail.com', 2, '1709557411.jpg', '8524563218', 'ifjkbansdlkfmaosd;lvmalzskdvlakdv', '2024-03-04 18:33:31', '2024-03-04 18:33:31', 1),
(6, 'gurnam', 'gur256@gmail.com', 2, '1709714657.jpg', '8596231472', 'address', '2024-03-06 14:14:17', '2024-03-06 14:14:17', 1),
(7, 'harry', 'hrr852@gmai.com', 2, '1709714935.jpg', '8574963215', 'address', '2024-03-06 14:18:55', '2024-03-06 14:18:55', 1),
(8, 'lovely', 'lov@gmai.com', 2, '1709714961.jpg', '8745632189', 'address', '2024-03-06 14:19:21', '2024-03-06 14:19:21', 1),
(10, 'vikas kumar', 'vik852@gmail.com', 2, '1709716914.jpg', '8574859656', 'dfadifukalskdpal;ksdvpoalrjdvoiandv', '2024-03-06 14:51:54', '2024-03-06 14:51:54', 1),
(11, 'monson', 'monson45@gmai.com', 2, '1709829140.jpg', '8745216589', 'dbhfsnjdkmhl,ng;jhk', '2024-03-07 22:02:20', '2024-03-07 22:02:20', 1),
(12, 'lovpreet', 'lov62@gmai.com', 5, '1709829300.jpg', '8524587126', 'dsfhgbnjmklf,;dsavc', '2024-03-07 22:05:00', '2024-03-07 22:05:00', 1),
(13, 'shubham', 'shu520@gmal.com', 3, '1709829476.jpg', '7845145245', 'sdfghjkxcvbnm,dfgyhujn', '2024-03-07 22:07:56', '2024-03-07 22:07:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` text,
  `phone` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `image`, `address`, `created_date`, `updated_date`, `is_active`) VALUES
(1, 'govind kumar', 'gkumar524@gmail.com', '85274', '8527419635', '1709200511.jpg', 'address', '2024-02-29 15:25:11', '2024-02-29 15:25:11', 1),
(2, ' kumar', 'kumar55@gmail.com', '123', '8856419635', '1709201641.jpg', 'address', '2024-02-29 15:44:01', '2024-02-29 15:44:01', 1),
(3, 'vikas', 'vikas123@gmial.com', '123456', '8855226633', '1709541332.jpg', 'address', '2024-03-04 14:05:32', '2024-03-04 14:05:32', 1),
(4, 'gary', 'garry23@gmial.com', '9635', '8524563695', '1709541369.jpg', 'address', '2024-03-04 14:06:09', '2024-03-04 14:06:09', 1),
(5, 'jon', 'jon256@gmial.com', '123', '8529634563', '1709541393.jpg', 'address', '2024-03-04 14:06:33', '2024-03-04 14:06:33', 1),
(6, 'smith', 'smith856@gmial.com', '1256', '8524561235', '1709541421.jpg', 'address', '2024-03-04 14:07:01', '2024-03-04 14:07:01', 1),
(7, 'harish', 'harish8548@gmial.com', '12358', '8524561235', '1709541448.jpg', 'address', '2024-03-04 14:07:28', '2024-03-04 14:07:28', 1),
(8, 'girish', 'gir54ish548@gmial.com', '8569', '9874563215', '1709541482.jpg', 'address', '2024-03-04 14:08:02', '2024-03-04 14:08:02', 1),
(9, 'guri kaur', 'kaur152@gmail.com', '1235', '8527419874', '1710327891.jpg', 'ewafjkcdmakca', '2024-03-13 16:34:51', '2024-03-13 16:34:51', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

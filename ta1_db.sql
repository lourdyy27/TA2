-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2025 at 10:33 PM
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
-- Database: `ta1_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` enum('Pending','In Progress','Completed') NOT NULL DEFAULT 'Pending',
  `priority` enum('Low','Medium','High') NOT NULL DEFAULT 'Medium',
  `due_date` date NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `title`, `description`, `status`, `priority`, `due_date`, `created_at`, `updated_at`, `attachment`) VALUES
(1, 1, 'Terminal Assessment 1', 'Finish the Remaining Work on the Terminal Assessment', 'In Progress', 'High', '2025-05-06', '2025-05-02 17:11:19', '2025-05-02 23:26:21', NULL),
(3, 2, 'kain cat food', 'kain na cat food if mayolam sa lamesa kainin rin', 'In Progress', 'Medium', '0000-00-00', '2025-05-03 01:01:59', '2025-05-03 01:10:57', NULL),
(5, 5, 'asdfgh', 'sdfgh', 'In Progress', 'Medium', '0000-00-00', '2025-06-13 16:18:56', NULL, NULL),
(6, 5, 'asdasdsadas', 'asdasd', 'In Progress', 'Medium', '2025-06-14', '2025-06-13 16:28:23', NULL, NULL),
(8, 6, 'peksyur ni johanne', 'tanginamo johanne', 'Pending', 'High', '0000-00-00', '2025-06-13 17:17:49', '2025-06-13 17:21:15', NULL),
(9, 6, 'asdasd', 'asdasdasdas', 'In Progress', 'High', '2025-06-19', '2025-06-13 17:22:14', NULL, NULL),
(10, 7, 'fsfdhdfh', 'dfhdhdfh', 'In Progress', 'High', '0000-00-00', '2025-06-13 17:36:52', '2025-06-13 17:50:13', '1749836212_3a7fe55fcf0ad31e80ca.jpg'),
(11, 7, 'stop na johanne', 'johanneasdasd', 'Completed', 'Low', '2025-06-21', '2025-06-13 18:03:12', '2025-06-13 18:10:48', '1749838248_72c30eff5a9ec7c89400.jpg'),
(12, 7, 'asdasd', 'asdasdsad', 'In Progress', 'High', '2025-06-21', '2025-06-13 18:11:25', NULL, '1749838285_516224b111e7afa9a7e4.jpg'),
(13, 8, 'asdasd', 'asfasfasf', 'In Progress', 'Medium', '2025-06-27', '2025-06-13 18:38:13', NULL, '1749839893_2c1456f7fcec616ad5a3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `role`) VALUES
(1, 'Amel Guro', 'AmelGuro@gmail.com', '$2y$10$kWjKM0ljy1YiBuBZ/ZmG6ufm5g6Ys0sYhyWir9hnSE..xmCZ45TDG', '2025-05-02 17:10:09', 'user'),
(2, 'PosangMalongkot', 'PosangMalongkot@gmail.com', '$2y$10$ZhCWmR2hKudRsdXqJCi0g.6GQXThvQmrAXepOM39YYIQ6sFZcmYmG', '2025-05-03 01:01:16', 'user'),
(3, 'Quelly', 'Quelly@gmail.com', '$2y$10$.rJkkb3bk1jmhva8Xey2nujQS1kfGc.R6ojkXH4tpqZHdWlc.4SQm', '2025-05-10 01:56:19', 'user'),
(5, 'Amlll', 'Amelbauting2@gmail.com', '$2y$10$4Br2Yx/fktITAQcsIzuOfuMfdH3AEMRHwag5IxpKZRyl2irbDyaCm', '2025-06-13 16:18:45', 'user'),
(6, 'Guro', 'GuroAmel@gmail.com', '$2y$10$9ega70f1JBne.6IsnpuvJ.RGYzwHi3reklRR8C7nmwYriFBldveru', '2025-06-13 17:05:25', 'user'),
(7, 'agay', 'agay@gmail.com', '$2y$10$B2pz640KBJN6ZEV3xNs91uczWuu1dEGJYZRBUdRRrbVNBOzPk3ekS', '2025-06-13 17:33:42', 'user'),
(8, 'Lourd', 'Lourdable@gmail.com', '$2y$10$JgrpI6KvhGOpmPJ/NOnZZu481P.BLrHbUJFANgygvv/LNg/Rsv4.K', '2025-06-13 18:17:28', 'user'),
(9, 'Johanne', 'Johanne@gmail.com', '$2y$10$aQ.501qUcgZTmOmfcdQ3le9dGfGyV.Gfc5//AGvLnDLAu9HB7vkQS', '2025-06-13 18:23:12', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

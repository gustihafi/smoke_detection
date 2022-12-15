-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 15, 2022 at 07:41 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_ksu`
--

-- --------------------------------------------------------

--
-- Table structure for table `dormitory`
--

CREATE TABLE `dormitory` (
  `id_dorm` int(11) NOT NULL,
  `room` varchar(100) NOT NULL,
  `locate_dorm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id_set` int(11) NOT NULL,
  `site_text` varchar(225) NOT NULL,
  `login_text1` varchar(225) NOT NULL,
  `login_text2` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `smoke`
--

CREATE TABLE `smoke` (
  `id_smoke` int(11) NOT NULL,
  `temp_val` varchar(20) NOT NULL,
  `hum_val` varchar(20) NOT NULL,
  `smoke_lvl` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `id_dorm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `id_temp` int(11) NOT NULL,
  `temp_val` varchar(20) NOT NULL,
  `hum_val` varchar(20) NOT NULL,
  `smoke_lvl` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_dorm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`id_temp`, `temp_val`, `hum_val`, `smoke_lvl`, `created_at`, `id_dorm`) VALUES
(1, '27.5', '30', '40', '2022-11-03 06:49:46', 2),
(2, '27.5', '30', '40', '2022-11-03 08:49:41', 2),
(3, '27.5', '30', '40', '2022-11-03 08:52:15', 2),
(4, '27.5', '30', '40', '2022-11-04 02:23:18', 2),
(5, '27.5', '30', '40', '2022-11-04 02:29:55', 2),
(6, '27.5', '30', '40', '2022-11-17 06:27:22', 2),
(7, '27.5', '30', '40', '2022-11-24 07:00:31', 2),
(8, '27.5', '30', '40', '2022-11-24 08:13:40', 2),
(9, '27.5', '30', '40', '2022-11-24 08:13:41', 2),
(10, '27.5', '30', '40', '2022-11-24 08:13:43', 2),
(11, '27.5', '30', '40', '2022-11-24 08:13:45', 2),
(12, '27.5', '30', '40', '2022-11-24 08:13:46', 2),
(13, '27.5', '30', '40', '2022-11-24 08:13:47', 2),
(14, '27.5', '30', '40', '2022-11-24 08:13:49', 2),
(15, '27.5', '30', '40', '2022-11-24 08:13:51', 2),
(16, '27.5', '30', '40', '2022-11-24 08:13:52', 2),
(17, '27.5', '30', '40', '2022-11-24 08:13:54', 2),
(18, '27.5', '30', '40', '2022-11-24 08:13:55', 2),
(19, '27.5', '30', '40', '2022-11-24 08:13:56', 2),
(20, '27.5', '30', '40', '2022-11-24 08:13:57', 2),
(21, '27.5', '30', '40', '2022-11-24 08:13:59', 2),
(22, '27.5', '30', '40', '2022-11-24 08:14:00', 2),
(23, '27.5', '30', '40', '2022-11-24 08:14:01', 2),
(24, '27.5', '30', '40', '2022-11-24 08:14:02', 2),
(25, '27.5', '30', '40', '2022-11-24 08:14:03', 2),
(26, '27.5', '30', '40', '2022-11-24 08:14:04', 2),
(27, '27.5', '30', '40', '2022-11-24 08:14:06', 2),
(28, '27.5', '30', '40', '2022-11-24 08:14:07', 2),
(29, '27.5', '30', '40', '2022-11-24 08:14:08', 2),
(30, '27.5', '30', '40', '2022-11-24 08:14:09', 2),
(31, '27.5', '30', '40', '2022-11-24 08:14:11', 2),
(32, '27.5', '30', '40', '2022-11-24 08:14:12', 2),
(33, '27.5', '30', '40', '2022-11-24 08:14:14', 2),
(34, '27.5', '30', '40', '2022-11-24 08:14:15', 2),
(35, '27.5', '30', '40', '2022-11-24 08:14:16', 2),
(36, '27.5', '30', '40', '2022-11-24 08:14:18', 2),
(37, '27.5', '30', '40', '2022-11-24 08:14:19', 2),
(38, '27.5', '30', '40', '2022-11-24 08:14:20', 2),
(39, '27.5', '30', '40', '2022-11-24 08:14:21', 2),
(40, '27.5', '30', '40', '2022-11-24 08:14:23', 2),
(41, '27.5', '30', '40', '2022-11-24 08:14:25', 2),
(42, '27.5', '30', '40', '2022-11-24 08:14:26', 2),
(43, '27.5', '30', '40', '2022-11-24 08:14:28', 2),
(44, '27.5', '30', '40', '2022-11-24 08:14:29', 2),
(45, '27.5', '30', '40', '2022-11-24 08:14:46', 2),
(46, '27.5', '30', '40', '2022-11-24 08:14:47', 2),
(47, '25.20', '65.80', '262', '2022-11-24 08:32:11', 2),
(48, '25.20', '65.80', '261', '2022-11-24 08:32:12', 2),
(49, '25.00', '66.00', '262', '2022-11-24 08:32:13', 2),
(50, '25.00', '66.00', '261', '2022-11-24 08:32:14', 2),
(51, '25.00', '66.10', '262', '2022-11-24 08:32:15', 2),
(52, '25.00', '66.10', '261', '2022-11-24 08:32:17', 2),
(53, '25.00', '66.10', '262', '2022-11-24 08:32:18', 2),
(54, '25.00', '66.10', '261', '2022-11-24 08:32:19', 2),
(55, '25.00', '66.20', '262', '2022-11-24 08:32:20', 2),
(56, '25.00', '66.20', '262', '2022-11-24 08:32:21', 2),
(57, '25.00', '66.20', '261', '2022-11-24 08:32:23', 2),
(58, '25.00', '66.20', '261', '2022-11-24 08:32:24', 2),
(59, '25.00', '66.20', '261', '2022-11-24 08:32:25', 2),
(60, '25.00', '66.20', '262', '2022-11-24 08:32:26', 2),
(61, '25.00', '66.20', '262', '2022-11-24 08:32:27', 2),
(62, '25.00', '66.20', '262', '2022-11-24 08:32:29', 2),
(63, '25.00', '66.20', '261', '2022-11-24 08:32:30', 2);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`) VALUES
(1),
(1),
(1),
(1),
(1),
(1),
(1),
(1),
(1),
(1),
(1),
(1),
(1),
(1),
(1),
(1),
(1),
(1),
(1),
(1),
(1),
(1),
(1),
(1),
(1),
(1),
(1),
(1),
(1),
(1),
(1),
(1),
(1),
(1),
(1),
(2),
(2),
(2),
(2),
(2),
(2),
(2),
(2),
(2),
(2),
(2),
(2),
(2),
(2),
(2),
(2),
(2),
(2),
(2),
(2),
(2),
(2),
(2),
(2),
(2),
(2),
(2),
(2),
(2),
(2),
(2),
(2),
(2),
(2),
(2),
(2),
(2);

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_create` date NOT NULL,
  `login_date` datetime NOT NULL,
  `image` varchar(225) NOT NULL,
  `pass` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dormitory`
--
ALTER TABLE `dormitory`
  ADD PRIMARY KEY (`id_dorm`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_set`);

--
-- Indexes for table `smoke`
--
ALTER TABLE `smoke`
  ADD PRIMARY KEY (`id_smoke`),
  ADD KEY `id_dorm` (`id_dorm`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id_temp`),
  ADD KEY `id_dorm` (`id_dorm`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dormitory`
--
ALTER TABLE `dormitory`
  MODIFY `id_dorm` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id_set` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `smoke`
--
ALTER TABLE `smoke`
  MODIFY `id_smoke` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `id_temp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

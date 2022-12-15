-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2022 at 08:55 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `dorm_type` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `latitude` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dormitory`
--

INSERT INTO `dormitory` (`id_dorm`, `room`, `dorm_type`, `longitude`, `latitude`) VALUES
(1, '5701', 'South', '120.254508', '22.996859'),
(2, '1405', 'North', '120.2543731', '22.9973739'),
(3, '5921', 'South', '120.254508', '22.996859');

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
(1, '27.5', '30', '40', '2022-11-02 22:49:46', 2),
(2, '27.5', '30', '40', '2022-11-03 00:49:41', 2),
(3, '27.5', '30', '40', '2022-11-03 00:52:15', 2),
(4, '27.5', '30', '40', '2022-11-03 18:23:18', 2),
(5, '27.5', '30', '40', '2022-11-03 18:29:55', 2),
(6, '27.5', '30', '40', '2022-11-16 22:27:22', 2),
(7, '27.5', '30', '40', '2022-11-23 23:00:31', 2),
(8, '27.5', '30', '40', '2022-11-24 00:13:40', 2),
(9, '27.5', '30', '40', '2022-11-24 00:13:41', 2),
(10, '27.5', '30', '40', '2022-11-24 00:13:43', 2),
(11, '27.5', '30', '40', '2022-11-24 00:13:45', 2),
(12, '27.5', '30', '40', '2022-11-24 00:13:46', 2),
(13, '27.5', '30', '40', '2022-11-24 00:13:47', 2),
(14, '27.5', '30', '40', '2022-11-24 00:13:49', 2),
(15, '27.5', '30', '40', '2022-11-24 00:13:51', 2),
(16, '27.5', '30', '40', '2022-11-24 00:13:52', 2),
(17, '27.5', '30', '40', '2022-11-24 00:13:54', 2),
(18, '27.5', '30', '40', '2022-11-24 00:13:55', 2),
(19, '27.5', '30', '40', '2022-11-24 00:13:56', 2),
(20, '27.5', '30', '40', '2022-11-24 00:13:57', 2),
(21, '27.5', '30', '40', '2022-11-24 00:13:59', 2),
(22, '27.5', '30', '40', '2022-11-24 00:14:00', 2),
(23, '27.5', '30', '40', '2022-11-24 00:14:01', 2),
(24, '27.5', '30', '40', '2022-11-24 00:14:02', 2),
(25, '27.5', '30', '40', '2022-11-24 00:14:03', 2),
(26, '27.5', '30', '40', '2022-11-24 00:14:04', 2),
(27, '27.5', '30', '40', '2022-11-24 00:14:06', 2),
(28, '27.5', '30', '40', '2022-11-24 00:14:07', 2),
(29, '27.5', '30', '40', '2022-11-24 00:14:08', 2),
(30, '27.5', '30', '40', '2022-11-24 00:14:09', 2),
(31, '27.5', '30', '40', '2022-11-24 00:14:11', 2),
(32, '27.5', '30', '40', '2022-11-24 00:14:12', 2),
(33, '27.5', '30', '40', '2022-11-24 00:14:14', 2),
(34, '27.5', '30', '40', '2022-11-24 00:14:15', 2),
(35, '27.5', '30', '40', '2022-11-24 00:14:16', 2),
(36, '27.5', '30', '40', '2022-11-24 00:14:18', 2),
(37, '27.5', '30', '40', '2022-11-24 00:14:19', 2),
(38, '27.5', '30', '40', '2022-11-24 00:14:20', 2),
(39, '27.5', '30', '40', '2022-11-24 00:14:21', 2),
(40, '27.5', '30', '40', '2022-11-24 00:14:23', 2),
(41, '27.5', '30', '40', '2022-11-24 00:14:25', 2),
(42, '27.5', '30', '40', '2022-11-24 00:14:26', 2),
(43, '27.5', '30', '40', '2022-11-24 00:14:28', 2),
(44, '27.5', '30', '40', '2022-11-24 00:14:29', 2),
(45, '27.5', '30', '40', '2022-11-24 00:14:46', 2),
(46, '27.5', '30', '40', '2022-11-24 00:14:47', 2),
(47, '25.20', '65.80', '262', '2022-11-24 00:32:11', 2),
(48, '25.20', '65.80', '261', '2022-11-24 00:32:12', 2),
(49, '25.00', '66.00', '262', '2022-11-24 00:32:13', 2),
(50, '25.00', '66.00', '261', '2022-11-24 00:32:14', 2),
(51, '25.00', '66.10', '262', '2022-11-24 00:32:15', 2),
(52, '25.00', '66.10', '261', '2022-11-24 00:32:17', 2),
(53, '25.00', '66.10', '262', '2022-11-24 00:32:18', 2),
(54, '25.00', '66.10', '261', '2022-11-24 00:32:19', 2),
(55, '25.00', '66.20', '262', '2022-11-24 00:32:20', 2),
(56, '25.00', '66.20', '262', '2022-11-24 00:32:21', 2),
(57, '25.00', '66.20', '261', '2022-11-24 00:32:23', 2),
(58, '25.00', '66.20', '261', '2022-11-24 00:32:24', 2),
(59, '25.00', '66.20', '261', '2022-11-24 00:32:25', 2),
(60, '25.00', '66.20', '262', '2022-11-24 00:32:26', 2),
(61, '25.00', '66.20', '262', '2022-11-24 00:32:27', 2),
(62, '25.00', '66.20', '262', '2022-11-24 00:32:29', 2),
(63, '25.00', '66.20', '261', '2022-11-24 00:32:30', 2),
(64, '24.3', '60', '201', '2022-12-15 07:43:08', 1),
(128, '22.9', '63', '300', '2022-12-15 07:44:42', 3);

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

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `user_id`, `token`, `created`) VALUES
(1, 1, '89ad5d99dd1e734e16e419ed6ae46c', '2022-12-08 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_create` date NOT NULL,
  `login_date` datetime DEFAULT NULL,
  `image` varchar(225) DEFAULT NULL,
  `pass` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `date_create`, `login_date`, `image`, `pass`) VALUES
(1, 'Admin', 'admin@admin.com', '2022-11-04', '2022-12-15 14:12:12', NULL, '202cb962ac59075b964b07152d234b70'),
(2, 'Gusti', 'gustiahmadhafiii@gmail.com', '2022-12-01', '2022-12-15 15:55:13', NULL, '202cb962ac59075b964b07152d234b70');

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
  ADD PRIMARY KEY (`id_temp`);

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
  MODIFY `id_dorm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id_temp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

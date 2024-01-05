-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2024 at 04:12 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sulit`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `code` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `code`, `date`) VALUES
(1, 'admin', 'CAC29D7A34687EB14B37068EE4708E7B', 'admin@mail.com', '', '2022-05-27 13:21:52');

-- --------------------------------------------------------

--
-- Table structure for table `cage`
--

CREATE TABLE `cage` (
  `ca_id` int(11) NOT NULL,
  `caname` varchar(255) NOT NULL,
  `live` int(255) NOT NULL,
  `death` int(11) NOT NULL,
  `quarantined` int(11) NOT NULL,
  `dispose` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cage`
--

INSERT INTO `cage` (`ca_id`, `caname`, `live`, `death`, `quarantined`, `dispose`, `date`) VALUES
(10, 'Cage 4', 333, 6, 3, 0, '2023-12-06 13:52:47'),
(64, 'Cage 2', 500, 29, 3, 8, '2023-10-31 06:34:00'),
(78, 'hakdog', 2323, 0, 22, 0, '2023-10-30 04:54:27');

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE `device` (
  `ID` int(11) NOT NULL,
  `Storage` varchar(250) DEFAULT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`ID`, `Storage`, `Date`) VALUES
(3347, 'Low_Storage', '2023-10-16 18:15:38'),
(3348, 'Low_Storage', '2023-10-16 18:16:03'),
(3349, 'Low_Storage', '2023-10-16 18:16:52'),
(3350, 'Low_Storage', '2023-10-16 18:18:10'),
(3351, 'Low_Storage', '2023-10-16 18:19:59'),
(3352, 'Low_Storage', '2023-10-16 18:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `ID` int(11) NOT NULL,
  `Category` varchar(20) NOT NULL,
  `Item` varchar(255) NOT NULL,
  `Cost` decimal(25,2) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`ID`, `Category`, `Item`, `Cost`, `Date`) VALUES
(30, 'Bills', 'Water', '1000.00', '2023-10-16 07:13:54'),
(31, 'Bills', 'Electric', '150.00', '2023-10-16 07:15:07'),
(37, 'Transpo', 'gas', '45.00', '2023-12-16 10:26:48');

-- --------------------------------------------------------

--
-- Table structure for table `livestock`
--

CREATE TABLE `livestock` (
  `rs_id` int(222) NOT NULL,
  `c_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `image` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `livestock`
--

INSERT INTO `livestock` (`rs_id`, `c_id`, `title`, `image`, `address`, `date`) VALUES
(12, 6, 'Pugo egg', '64ca7a08a8c6c.jpg', 'masarap kahit walang manok.\r\n', '2023-08-02 15:45:12'),
(13, 6, 'Pugo meat', '64ca7a47daa66.jpg', 'masarap kahit hilaw', '2023-08-02 15:46:15'),
(14, 6, 'Live pugo', '6518cfe7f1cc7.jpg', '  masarap kahit walang sauce', '2023-10-01 01:48:23'),
(26, 6, 'kambing', '657d538dbec08.jpg', '  asdfghjuyggfchjn ', '2023-12-16 07:36:45');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `m_id` int(11) NOT NULL,
  `materials` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`m_id`, `materials`, `status`, `date`) VALUES
(6, 'haksorgiasfnkwa', 'Inactive', '2023-12-06 10:15:09'),
(7, 'halimaw', 'Inactive', '2023-12-06 10:19:23'),
(9, 'hadksdohfo', 'Inactive', '2023-12-06 10:19:54'),
(10, 'hehehe', 'Inactive', '2023-12-06 11:33:49'),
(11, 'sgfbv ', 'Inactive', '2023-12-06 13:51:56'),
(12, 'haksorgiasfnkwa', 'Inactive', '2023-12-16 02:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `pro_duct`
--

CREATE TABLE `pro_duct` (
  `d_id` int(222) NOT NULL,
  `rs_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pro_duct`
--

INSERT INTO `pro_duct` (`d_id`, `rs_id`, `title`, `stock`, `price`) VALUES
(28, 13, 'dressed meat', 900, '100.00'),
(35, 13, 'tosino', 67, '457.00'),
(36, 13, 'ahs', 43, '67.00');

-- --------------------------------------------------------

--
-- Table structure for table `remark`
--

CREATE TABLE `remark` (
  `id` int(11) NOT NULL,
  `frm_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `remark`
--

INSERT INTO `remark` (`id`, `frm_id`, `status`, `remark`, `remarkDate`) VALUES
(0, 19, 'closed', '', '2023-10-13 20:08:58'),
(1, 2, 'in process', 'none', '2022-05-01 05:17:49'),
(2, 3, 'in process', 'none', '2022-05-27 11:01:30'),
(3, 2, 'closed', 'thank you for your order!', '2022-05-27 11:11:41'),
(4, 3, 'closed', 'none', '2022-05-27 11:42:35'),
(5, 4, 'in process', 'none', '2022-05-27 11:42:55'),
(6, 1, 'rejected', 'none', '2022-05-27 11:43:26'),
(7, 7, 'in process', 'none', '2022-05-27 13:03:24'),
(8, 8, 'in process', 'none', '2022-05-27 13:03:38'),
(9, 9, 'rejected', 'thank you', '2022-05-27 13:03:53'),
(10, 7, 'closed', 'thank you for your ordering with us', '2022-05-27 13:04:33'),
(11, 8, 'closed', 'thanks ', '2022-05-27 13:05:24'),
(12, 5, 'closed', 'none', '2022-05-27 13:18:03'),
(13, 11, 'closed', '', '2023-10-06 06:49:23'),
(14, 12, 'closed', '', '2023-10-06 06:54:57'),
(15, 11, 'closed', '', '2023-10-08 10:26:14'),
(16, 11, 'closed', '', '2023-10-08 14:14:12'),
(17, 13, 'in process', '', '2023-10-10 08:45:40'),
(18, 13, 'in process', '', '2023-10-10 08:48:55'),
(19, 13, 'closed', '', '2023-10-10 09:08:23'),
(20, 21, 'closed', '', '2023-10-10 09:10:54'),
(21, 13, 'closed', '', '2023-10-10 09:15:57'),
(22, 13, 'closed', '', '2023-10-10 09:20:40'),
(23, 21, 'closed', '', '2023-10-10 09:21:12'),
(24, 20, 'closed', '', '2023-10-10 13:33:17'),
(25, 13, 'closed', '', '2023-10-10 13:46:35'),
(26, 20, 'closed', '', '2023-10-10 14:11:25'),
(27, 13, 'closed', '', '2023-10-11 07:14:28'),
(28, 14, 'closed', '', '2023-10-11 08:03:56'),
(29, 20, 'closed', '', '2023-10-11 08:25:40'),
(30, 20, 'closed', '', '2023-10-11 08:35:38'),
(31, 20, 'in process', '', '2023-10-11 08:41:25'),
(32, 20, 'closed', '', '2023-10-11 08:41:34'),
(33, 20, 'in process', '', '2023-10-11 08:43:25'),
(34, 20, 'closed', '', '2023-10-11 08:43:38'),
(35, 20, 'closed', '', '2023-10-11 08:56:26'),
(36, 20, 'closed', '', '2023-10-11 09:00:31'),
(37, 20, 'in process', '', '2023-10-11 09:54:35'),
(38, 20, 'closed', '', '2023-10-11 10:03:22'),
(39, 20, 'closed', '', '2023-10-11 10:06:37'),
(40, 20, 'in process', '', '2023-10-11 10:06:51'),
(41, 20, 'closed', '', '2023-10-11 10:07:09'),
(42, 20, 'in process', '', '2023-10-11 10:08:44'),
(43, 20, 'closed', '', '2023-10-11 10:08:55'),
(44, 20, 'closed', '', '2023-10-11 10:11:37'),
(45, 20, 'in process', '', '2023-10-11 10:11:58'),
(46, 20, 'closed', '', '2023-10-11 10:12:12'),
(47, 20, 'in process', '', '2023-10-11 10:18:07'),
(48, 20, 'closed', '', '2023-10-11 10:18:20'),
(49, 20, 'closed', '', '2023-10-11 10:55:29'),
(50, 20, 'closed', '', '2023-10-11 10:58:49'),
(51, 20, 'closed', '', '2023-10-11 10:59:38'),
(52, 20, 'closed', '', '2023-10-11 11:00:42'),
(53, 20, 'closed', '', '2023-10-11 11:01:29'),
(54, 20, 'closed', '', '2023-10-11 11:02:32'),
(55, 20, 'closed', '', '2023-10-11 11:02:55'),
(56, 20, 'closed', '', '2023-10-11 11:03:54'),
(57, 20, 'closed', '', '2023-10-11 11:28:44'),
(58, 20, 'closed', '', '2023-10-11 11:32:29'),
(59, 20, 'closed', '', '2023-10-11 11:34:11'),
(60, 20, 'in process', '', '2023-10-11 11:34:31'),
(61, 20, 'closed', '', '2023-10-11 11:34:40'),
(62, 20, 'in process', '', '2023-10-11 11:36:08'),
(63, 20, 'closed', '', '2023-10-11 11:36:15'),
(64, 20, 'closed', '', '2023-10-11 11:36:18');

-- --------------------------------------------------------

--
-- Table structure for table `res_category`
--

CREATE TABLE `res_category` (
  `c_id` int(222) NOT NULL,
  `c_name` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `res_category`
--

INSERT INTO `res_category` (`c_id`, `c_name`, `date`) VALUES
(6, 'Pugo', '2023-08-02 13:52:10');

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

CREATE TABLE `supplies` (
  `Sup_ID` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Category` varchar(225) NOT NULL,
  `Product` varchar(255) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Unit` varchar(10) NOT NULL,
  `Expired_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`Sup_ID`, `Date`, `Category`, `Product`, `Quantity`, `Unit`, `Expired_date`) VALUES
(59, '2023-10-15 15:55:54', 'Feeds', 'Betracin', 1, 'Pack', '2023-11-02'),
(60, '2023-10-15 15:56:03', 'Feeds', 'starter', 2, 'Pieces', '2023-11-04'),
(61, '2023-10-15 15:56:47', 'Feeds', 'Betracin', 2, 'Pieces', '2023-10-15'),
(63, '2023-10-15 15:59:43', 'Feeds', 'starter', 2, 'Pieces', '2023-11-03'),
(64, '2023-10-15 15:59:47', 'Feeds', 'starter', 2, 'Pieces', '2023-11-03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `f_name` varchar(222) NOT NULL,
  `l_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `status` int(222) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `address`, `status`, `date`) VALUES
(7, 'Jaime', 'hakdog', 'hakdog', 'hakdo@gmail.com', '910293014013', '6bb02b9216e00e07e59f66787653dd18', 'shvwelkv\r\n', 1, '2023-07-22 10:45:08'),
(8, 'admin', 'admin', 'admin', 'admin@gamil.com', '09120929381', 'e52e7ce4ac2458867d05eaad577560db', '', 1, '2023-07-31 15:32:05'),
(10, 'ron', 'Rona', 'Camalla', 'camallarona3@gmail.com', '09388957027', 'cfa6cde58efa03f781867da644d7237c', 'Palo, Canaman, Camarines Sur', 1, '2023-09-24 22:24:32');

-- --------------------------------------------------------

--
-- Table structure for table `users_orders`
--

CREATE TABLE `users_orders` (
  `o_id` int(222) NOT NULL,
  `u_id` int(222) NOT NULL,
  `d_id` int(11) NOT NULL,
  `title` varchar(222) NOT NULL,
  `quantity` int(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total` int(250) NOT NULL,
  `status` varchar(222) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users_orders`
--

INSERT INTO `users_orders` (`o_id`, `u_id`, `d_id`, `title`, `quantity`, `price`, `total`, `status`, `date`) VALUES
(32, 8, 29, 'ahsljsjcxm', 2, '67.00', 134, 'closed', '2023-12-16 09:57:38'),
(33, 8, 28, 'dressed meat', 2, '100.00', 334, NULL, '2023-12-16 06:35:10'),
(34, 8, 35, 'tosino', 1, '457.00', 457, NULL, '2023-12-16 06:35:55'),
(35, 8, 28, 'dressed meat', 3, '100.00', 300, NULL, '2023-12-16 08:24:45'),
(36, 8, 28, 'dressed meat', 4, '100.00', 400, NULL, '2023-12-16 08:26:35'),
(37, 8, 35, 'tosino', 2, '457.00', 1314, NULL, '2023-12-16 08:26:35'),
(38, 7, 6, 'tosino', 100, '457.00', 45700, 'closed', '2023-01-10 02:48:50'),
(39, 8, 2, 'dressed meat', 400, '100.00', 40000, 'closed', '2023-02-07 02:51:44'),
(40, 9, 4, 'dressed meat', 200, '100.00', 20000, 'closed', '2023-03-16 02:52:32'),
(41, 10, 5, 'tosino', 300, '457.00', 137100, 'closed', '2023-04-07 02:53:27'),
(42, 11, 7, 'tosino', 433, '457.00', 197881, 'closed', '2023-05-02 02:54:41'),
(43, 10, 6, 'dressed meat', 1000, '100.00', 100000, 'closed', '2023-06-12 02:56:23'),
(44, 7, 9, 'tosino', 500, '457.00', 228500, 'closed', '2023-07-05 02:58:20'),
(45, 8, 5, 'tosino', 300, '457.00', 137100, 'closed', '2023-08-15 03:00:19'),
(46, 8, 5, 'tosino', 450, '457.00', 205650, 'closed', '2023-09-27 03:01:57'),
(47, 10, 5, 'tosino', 400, '457.00', 182800, 'closed', '2023-10-11 03:02:53'),
(48, 10, 7, 'dressed meat', 2000, '100.00', 200000, 'closed', '2023-11-14 03:04:07');

-- --------------------------------------------------------

--
-- Table structure for table `walkin_orders`
--

CREATE TABLE `walkin_orders` (
  `w_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `user` varchar(225) NOT NULL,
  `title` varchar(25) NOT NULL,
  `quantity` int(12) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `total` int(250) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `walkin_orders`
--

INSERT INTO `walkin_orders` (`w_id`, `d_id`, `user`, `title`, `quantity`, `price`, `total`, `date`, `status`) VALUES
(1, 2, 'hehe', 'tosino', 5, '457.00', 2285, '2023-01-03 02:19:50', 'Confirm'),
(2, 2, 'haha', 'dressed meat', 10, '100.00', 1000, '2023-02-08 02:21:19', 'Confirm'),
(3, 4, 'cj', 'tosino', 100, '457.00', 45700, '2023-03-03 02:22:09', 'Confirm'),
(4, 5, 'ron', 'tosino', 200, '457.00', 91400, '2023-04-12 02:25:32', 'Confirm'),
(5, 6, 'Jaime', 'dressed meat', 500, '100.00', 50000, '2023-05-10 02:26:52', 'Confirm'),
(6, 7, 'admin', 'tosino', 400, '457.00', 182800, '2023-06-07 02:27:57', 'Confirm'),
(7, 8, 'ron', 'tosino', 50, '457.00', 22850, '2023-07-22 02:29:04', 'Confirm'),
(8, 9, 'Jaime', 'dressed meat', 200, '100.00', 20000, '2023-08-13 02:30:48', 'Confirm'),
(9, 10, 'Jaime', 'tosino', 100, '457.00', 45700, '2023-09-19 02:32:45', 'Confirm'),
(10, 11, 'admin', 'tosino', 250, '457.00', 114250, '2023-10-17 02:37:58', 'Confirm'),
(12, 13, 'Jaime', 'dressed meat', 500, '100.00', 50000, '2023-11-26 02:40:38', 'Confirm'),
(70, 35, 'parabakalaxSz', 'tosino', 3, '457.00', 1371, '2023-12-16 06:31:16', 'Confirm'),
(71, 28, 'efse', 'dressed meat', 444, '100.00', 44400, '2023-12-16 07:33:17', 'Confirm'),
(72, 35, 'parabakalaxSz', 'tosino', 99, '457.00', 451516, '2023-12-16 07:38:42', 'Confirm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `cage`
--
ALTER TABLE `cage`
  ADD PRIMARY KEY (`ca_id`);

--
-- Indexes for table `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `livestock`
--
ALTER TABLE `livestock`
  ADD PRIMARY KEY (`rs_id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `pro_duct`
--
ALTER TABLE `pro_duct`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `remark`
--
ALTER TABLE `remark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `res_category`
--
ALTER TABLE `res_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `supplies`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`Sup_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `users_orders`
--
ALTER TABLE `users_orders`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `walkin_orders`
--
ALTER TABLE `walkin_orders`
  ADD PRIMARY KEY (`w_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cage`
--
ALTER TABLE `cage`
  MODIFY `ca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `device`
--
ALTER TABLE `device`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3353;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `livestock`
--
ALTER TABLE `livestock`
  MODIFY `rs_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pro_duct`
--
ALTER TABLE `pro_duct`
  MODIFY `d_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `res_category`
--
ALTER TABLE `res_category`
  MODIFY `c_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `supplies`
--
ALTER TABLE `supplies`
  MODIFY `Sup_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users_orders`
--
ALTER TABLE `users_orders`
  MODIFY `o_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `walkin_orders`
--
ALTER TABLE `walkin_orders`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

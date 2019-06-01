-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2019 at 04:59 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_info` varchar(15) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` varchar(1) NOT NULL,
  `active_code` varchar(15) NOT NULL,
  `reset_code` varchar(15) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `firstname`, `lastname`, `address`, `contact_info`, `photo`, `status`, `active_code`, `reset_code`, `created_on`) VALUES
(1, 'admin@admin.com', '$2y$10$0SHFfoWzz8WZpdu9Qw//E.tWamILbiNCX7bqhy3od0gvK5.kSJ8N2', 'Code', 'Projects', '', '', 'thanos1.jpg', '1', '', '', '2018-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(13, 9, 10, 1),
(14, 9, 81, 1),
(16, 86, 82, 1),
(19, 90, 83, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cat_slug` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `cat_slug`) VALUES
(1, 'SINGLE ROOM', 'laptops'),
(2, 'BEDSITTER', 'desktop-pc'),
(4, 'ONE BEDROOM', ''),
(5, 'TWO BEDROOM', '');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `sales_id`, `product_id`, `quantity`) VALUES
(14, 9, 11, 2),
(15, 9, 13, 5),
(16, 9, 3, 2),
(17, 9, 1, 3),
(18, 10, 13, 3),
(19, 10, 2, 4),
(20, 10, 19, 5),
(21, 11, 80, 1),
(22, 12, 83, 1),
(23, 13, 81, 1),
(24, 14, 81, 1),
(25, 15, 82, 1),
(26, 16, 82, 1),
(27, 17, 82, 1),
(28, 18, 82, 1),
(29, 19, 82, 1),
(30, 20, 82, 1),
(31, 21, 82, 1),
(32, 22, 82, 1),
(33, 24, 80, 1),
(34, 12, 43, 1),
(35, 13, 84, 1);

-- --------------------------------------------------------

--
-- Table structure for table `landlords`
--

CREATE TABLE `landlords` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` int(1) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `activate_code` varchar(15) NOT NULL,
  `reset_code` varchar(15) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `landlords`
--

INSERT INTO `landlords` (`id`, `email`, `password`, `type`, `firstname`, `lastname`, `address`, `contact_info`, `photo`, `status`, `activate_code`, `reset_code`, `created_on`) VALUES
(1, 'l@gmail.com', '$2y$10$n0/VE0iEV7I5tAPPGQkFKOhJw9oEfUZ0PdM84PozDZY9q.BlKEYWG', 2, 'land', 'lord', '', '', '', 1, '', '', '2019-02-20');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(200) NOT NULL,
  `photo1` varchar(200) NOT NULL,
  `photo2` varchar(200) NOT NULL,
  `date_view` date NOT NULL,
  `counter` int(11) NOT NULL,
  `userid` int(20) DEFAULT NULL,
  `contact` varchar(14) NOT NULL,
  `location` varchar(60) NOT NULL,
  `units` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `slug`, `price`, `photo`, `photo1`, `photo2`, `date_view`, `counter`, `userid`, `contact`, `location`, `units`) VALUES
(43, 1, 'DENNIS', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 'dennis', 24, 'dennis_1553539613.webp', 'dennis_1553539613_1.webp', 'dennis_1553539613_2.webp', '2019-04-01', 5, 33, '486588', 'MUNGONI', '0'),
(44, 1, 'AFRIKANA', '<p>UJGFUHFIONEPROER</p>\r\n', 'afrikana', 5758, 'afrikana_1553612326.webp', 'afrikana1.jpg', 'afrikana2.jpg', '2019-03-14', 1, 28, '09092735719', 'PAVILION', '0'),
(80, 1, 'amo', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 'amo', 1200, 'amo_1553539573.webp', 'amo_1553539573_1.webp', 'amo_1553539573_2.webp', '2019-04-23', 2, 33, '486588', 'PAVILION', '3'),
(81, 2, 'TAP HOSTEL', '<p>JGYJTYJYJ</p>\r\n', 'tap-hostel', 5758, 'tap-hostel_1553612472.jpg', 'tap-hostel1.jpg', 'tap-hostel2.jpg', '2019-03-30', 5, 69, '345678', 'PAVILION', '0'),
(82, 2, 'MWESHAMA', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 'mweshama', 1, 'mweshama_1553612356.webp', 'mweshama1.jpg', 'mweshama2.jpg', '2019-05-08', 1, 84, '653787848', 'MWESHAMA', '3'),
(83, 4, 'WESTERN', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 'western', 6700, 'western_1553612727.webp', 'western_1553612727_1.webp', 'western_1553612727_2.webp', '2019-04-02', 8, 83, '09092735719', 'PAVILION', '3'),
(84, 1, 'ESTERN', '<p>JBFNSKGNPOMPONIUB</p>\r\n', 'estern', 7000, 'estern.webp', 'estern1.webp', 'estern2.webp', '2019-04-02', 4, 87, '09092735719', 'CHUKA', '5'),
(85, 1, 'The Grace', '<div style=\"background:#eeeeee;border:1px solid #cccccc;padding:5px 10px;\"><strong>the grace</strong><br />\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>\r\n', 'grace', 3000, 'grace.webp', 'grace1.webp', 'grace2.webp', '2019-06-01', 3, 89, '079000000', 'masaku', '20'),
(87, 4, 'AMBASSADAUERS', '<div style=\"background:#eeeeee;border:1px solid #cccccc;padding:5px 10px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>\r\n', 'ambassadauers', 1000, 'ambassadauers_1557413111.webp', 'ambassadauers_1557413111_1.jpg', 'ambassadauers_1557413111_2.webp', '2019-04-02', 2, 33, '486588', 'MUNGONI', '5'),
(89, 1, 'AVOUR HOSTELS', '<p>THE BEST HOSTELS EVER</p>\r\n', 'avour-hostels', 12000, 'avour-hostels.webp', 'avour-hostels1.jpg', 'avour-hostels2.webp', '2019-05-08', 1, 33, '07063210488', 'MUNGONI', '7');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pay_id` varchar(50) NOT NULL,
  `sales_date` date NOT NULL,
  `land_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `pay_id`, `sales_date`, `land_id`) VALUES
(13, 15, 'PAYID-LSRU2JQ5BY63647NC441405S', '2019-04-02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` int(1) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `activate_code` varchar(15) NOT NULL,
  `reset_code` varchar(15) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `firstname`, `lastname`, `address`, `contact_info`, `photo`, `status`, `activate_code`, `reset_code`, `created_on`) VALUES
(1, 'admin@admin.com', '$2y$10$WbyVIvCuM4FjVZsQlpH8AOchWunnmBRKvs9DctVhBKEQwQE4bWHWm', 1, 'DENNIS', 'LUMOSI', '', '', 'computer-1185569-1920-1920x1279.jpg', 1, '', '', '2018-05-01'),
(9, 'harry@den.com', '$2y$10$OJXBvULic1/mjyx3b5U7kuwncX/sL5qpjXLQpP0qeIyZeyQKj4nWq', 0, 'Harry', 'Den', 'Silay City, Negros Occidental', '09092735719', 'IMG_20180110_131916.jpg', 1, 'k8FBpynQfqsv', 'wzPGkX5IODlTYHg', '2018-05-09'),
(12, 'christine@gmail.com', '$2y$10$pDlp0u29IVonJ0um7j.92OiGAE/2FecP7DCjxuXGQnKGkljrndRfm', 0, 'Christine', 'becker', 'demo', '7542214500', 'female3.jpg', 1, '', '', '2018-07-09'),
(14, 'chris@gmail.com', '$2y$10$Hwabp/7/l8qw7rOzUGPXVuvvlOmzNMmTmpI3hlb7O4l8jWGWxIC4C', 0, 'chris', 'munene', '', '', '', 1, 'CFVhelEUavSx', 'mQXu6WGHyzSDPAp', '2018-11-19'),
(15, 'kelly@localhost.com', '$2y$10$4KrQSb8D8d4FoSfEs1oV7ueqrWEOU95LzAgUeGQRgPwV526R6tQlC', 0, 'KELY', 'BUKAYA', '', '+254706329586', 'entrepreneur-593378_1920.jpg', 1, 'HjLJAQ2qkNmR', '39iug7B8WRhGvPq', '2019-02-01'),
(16, 'barm@gmail.com', '$2y$10$wyUxAPkRbgA7t3WO9NUy0e17GCe/Rhs0BKxcMjcVJDYPKKx6bmXXC', 0, 'BRAMWEL', 'LWAMBODA', '', '', '', 0, '13whyA2dDUWe', '', '2019-02-05'),
(25, 'eds@gmail.coms', '$2y$10$y49W5ttmHZKgylcexLW4x.mVkOSjhqpoVOP0.ozqec966rrzdz55S', 2, 'swer', 'des', '', '', 'analytics-2697949_1920.jpg', 0, 'fL3BSHKoAFm2', '', '2019-02-08'),
(26, 'etds@gmail.coms', '$2y$10$qWhrAYoiJ99nTu2StBCt5.oKmHzcRj7kHiKZlh5BFTbJ.Jm6Jbrl6', 0, 'denyqe', 'des', '', '', '', 1, 'wlUqQFKh8itn', '', '2019-02-08'),
(27, 'olu@gmail.com', '$2y$10$jdRJa3FVW3YfaUsn/h.7C.IhZ4uvRu6gj7CplgkQqEJdK.4tc7ntS', 0, 'BRAVI', 'OLUKWA', '', '', '', 1, 'uVvwaMiCrXme', '', '2019-02-13'),
(28, 'd@gmail.com', '$2y$10$/bvtJL8rs3MQRzRqmGhP2unXs9iJoAnIigCZywdFjrQriVGlg0YTi', 2, 'DAVID', 'KAMAU', '', '', 'letters-3195048_1920.png', 1, 's9HyMxlNPLjc', '', '2019-02-13'),
(33, 'os@gmail.com', '$2y$10$WbyVIvCuM4FjVZsQlpH8AOchWunnmBRKvs9DctVhBKEQwQE4bWHWm', 2, 'OSWALD', 'PENQ', '186 CHUKA UNIVERSITY', '486588', 'dog-2983021_1920.jpg', 1, 'ERmUWXMxloI4', '82RjmpEyw7DTC3f', '2019-02-20'),
(38, 'v@gmail.com', '$2y$10$iXEa9LUZa49FawQkCRRkH.U1RY97qVu5nV8pX5bzp8oO0EmH.x65i', 2, 'victor', 'onude', '', '', 'laptop-3091427_1920.jpg', 1, '', '', '2019-03-06'),
(64, 'kangatawilson7@gmail.com', '$2y$10$59sf7ftRpwZZ.1i9M3a0p.gvXxPGmbALemRlL78ybvaDDJnRVB4CS', 0, 'DERICK', 'LUMBASI', '', '', '', 0, '6oXrqhuz5AJk', '', '2019-03-12'),
(66, 'mbinya@gmail.com', '$2y$10$FkLCJgTw1/aKneLSXmM8/.kIXxktVmoBEiRGwCEgRXMwVSNdFjLii', 0, 'GRACE', 'MBINYA', '', '', '', 0, 'XCqx41MIKnmk', '', '2019-03-13'),
(67, 'mbnya@gmail.com', '$2y$10$5T5Gz/ptgLuBQS3Yt2c7I.l1jfWQjjvL3zI6WV2QKXea91NjedNtC', 0, 'GRACE', 'MBINYA', '', '', '', 0, '47fVPgAMUobG', '', '2019-03-13'),
(68, 'mnya@gmail.com', '$2y$10$hEIv3EU2HXx032kkpzCVF.gN.vpdRNkitTvaeQqgFNnweJe88Fm.K', 0, 'GRACE', 'MBINYA', '', '', '', 0, 'dca56V9Q4Ppf', '', '2019-03-13'),
(84, 'dev3@localhost.com', '$2y$10$guyt3HMnTAY5s5c.tFhzueRZHWx0WmzxIMHo3cHqnhB3btvegRx.i', 2, 'EMMANUEL', 'ONYARI', 'heg23u', '09092735719', '', 1, 'JZGLNISYzisn', '2WvApuUa8ieG1FL', '2019-03-26'),
(87, 'landlord@localhost.com', '$2y$10$iYmjL3FTMhFkfpfj8tDADO//Csznpz8uOqP4ZzWKcXs.l8vME0oOS', 2, 'DENNIS', 'LUMOSI', '454DFG', '0743565776', 'fourteen2.webp', 1, 'M2xUaTGXHPun', 'awCv1x8j9VL35pk', '2019-03-26'),
(90, 'kelly@localhost.com', '$2y$10$/bjMupyrTkoTxF4dXsGunOcKmBVUXLfO9HRjZtZpMWCd47wvkEoKa', 0, 'kelly', 'kelley', 'chuka', '0600121539', '', 1, 'mxGoHbwRnuJZ', '', '2019-03-28'),
(92, 'herty@localhost', '$2y$10$yu1RtzCuyFmXlCPScNV56eunbMQzXIN0b9Mzfj7W6sXPYBRwkdIme', 2, 'Essie', 'Muthoni', '10100', '0765754754', '', 0, 'mbRL3eXopI2P', '', '2019-03-29'),
(93, 'herty@localhost.com', '$2y$10$JkxRQN1gPNbC0OCh.26uAO8VSr7Eq2VzyWcyyRRc6KQZPuv/nO482', 2, 'Essie', 'Muthoni', '10100', '0765754754', '', 1, 'YeMwBpzFZHrX', '', '2019-03-29'),
(95, 'f@localhost.com', '$2y$10$u687vMmDzC.7TCvyiQeYKOfyNsb8dVcqd7d.bKwF7Fnxihgxmv20.', 0, 'HERT', 'ERRW', '1234', '09092735719', '', 1, 'QLefbOlnu9w7', '', '2019-03-31'),
(96, 'amo@localhost.com', '$2y$10$KZCkd1eaKHOUmWztmxa4megpmyh6mY5ELKjOCmMCJ5lZlfoFa8fey', 0, 'AMOS', 'NYANGOTO', '10172', '0786644545', '', 0, '4FkEHXG9RW3a', '', '2019-04-01'),
(98, 'kw@gmail.com', '$2y$10$8vkQNCWMN9PpM0goTfiDIeZAfG6/rBSx55lsMKyY/KVSxs1RCnZBq', 0, 'gscfd', 'dfer', 'ger', '45345', 'computer-1185569-1920-1920x1279.jpg', 1, '', '', '2019-04-01'),
(101, 'lumocigwad@gmail.com', '$2y$10$WbyVIvCuM4FjVZsQlpH8AOchWunnmBRKvs9DctVhBKEQwQE4bWHWm', 0, 'BRAMWEL', 'LUMOSI', '1234', '0786644545', '', 0, 'iONShKZf5Vde', 'm6RWMBbjySivOYu', '2019-04-02'),
(102, 'dev2@localhost.com', '$2y$10$bMSX5V8nVYxxAvub5XdXv.RbDHIxT4brLFLbd1GkyQwlMVZeeDsmm', 0, 'DENNIS', 'LUMOSI', '10172', '076668', 'den.jpg', 1, 'iQF2xErY3odR', 'GdWz4yF6BTtjhMK', '2019-04-02'),
(103, 'dennis@gmail.com', '$2y$10$/6Mafs84vCTWWLCneXGH.OOPxg2uNlNX/PhXGzwXZpsJkgl12qFw6', 0, 'DENNIS', 'LUMOSI', '1234', '0786644545', '', 1, '', '', '2019-06-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landlords`
--
ALTER TABLE `landlords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `landlords`
--
ALTER TABLE `landlords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

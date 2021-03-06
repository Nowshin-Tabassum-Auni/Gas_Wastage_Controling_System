-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2021 at 07:13 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gas_iot`
--

-- --------------------------------------------------------

--
-- Table structure for table `gas_uses`
--

CREATE TABLE `gas_uses` (
  `id` int(10) NOT NULL,
  `used_gas` int(11) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gas_uses`
--

INSERT INTO `gas_uses` (`id`, `used_gas`, `time`, `date`) VALUES
(103, 5, '14:55:56', '2021-01-12'),
(101, 6, '22:06:14', '2021-01-17'),
(101, 5, '22:08:28', '2021-01-17'),
(101, 2, '22:09:54', '2021-01-17'),
(101, 7, '22:10:57', '2021-01-17'),
(101, 6, '22:15:14', '2021-01-17'),
(101, 5, '22:16:18', '2021-01-17'),
(101, 5, '12:06:14', '2020-12-20'),
(101, 5, '12:06:14', '2020-12-20'),
(101, 5, '13:36:34', '2020-12-28'),
(101, 6, '13:08:18', '2020-12-26'),
(101, 5, '13:56:39', '2020-11-15'),
(101, 5, '08:48:16', '2020-11-29'),
(101, 5, '16:15:59', '2020-10-15'),
(101, 6, '00:00:00', '2020-10-18'),
(103, 4, '07:07:18', '2021-01-18'),
(103, 4, '07:07:18', '2021-01-18'),
(103, 5, '07:12:18', '2021-01-18'),
(103, 8, '07:13:18', '2021-01-18'),
(103, 4, '07:07:18', '2021-02-18'),
(101, 3, '17:06:19', '2020-09-05'),
(101, 4, '15:06:19', '2020-09-09'),
(101, 2, '20:07:21', '2020-09-21'),
(101, 5, '14:09:59', '2020-09-05'),
(101, 4, '17:06:39', '2020-08-07'),
(101, 6, '21:08:19', '2020-07-09'),
(101, 2, '20:16:21', '2020-07-21'),
(101, 2, '14:35:59', '2020-07-05'),
(101, 3, '17:06:39', '2020-08-07'),
(101, 8, '15:06:19', '2020-06-09'),
(101, 1, '20:07:21', '2020-05-21'),
(101, 2, '14:09:59', '2020-05-05'),
(101, 4, '17:06:39', '2020-05-09'),
(101, 3, '15:06:19', '2020-05-06'),
(101, 2, '20:07:21', '2020-04-21'),
(101, 5, '14:09:59', '2020-04-05'),
(101, 10, '17:06:39', '2020-03-07'),
(101, 3, '12:28:19', '2020-03-04'),
(101, 8, '12:07:21', '2020-03-28'),
(101, 2, '14:09:59', '2020-03-05'),
(101, 6, '17:06:39', '2020-02-07'),
(101, 3, '15:06:19', '2020-02-16'),
(101, 2, '20:07:21', '2020-02-29'),
(101, 5, '16:09:59', '2020-01-15'),
(101, 3, '23:06:39', '2020-01-31');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

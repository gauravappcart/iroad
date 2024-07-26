-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2023 at 11:41 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iroad`
--

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 1, NULL, '2023-01-17 07:10:51', '2023-01-17 07:10:51'),
(2, 'Vendors', 1, NULL, NULL, NULL),
(3, 'Incharge', 1, NULL, NULL, NULL),
(4, 'Planning & Billing', 1, NULL, NULL, NULL),
(5, 'Highway', 1, NULL, NULL, NULL),
(6, 'Structure', 1, NULL, NULL, NULL),
(7, 'Store', 1, NULL, NULL, NULL),
(8, 'Purchase', 1, NULL, NULL, NULL),
(9, 'Quality Control', 1, NULL, NULL, NULL),
(10, 'Accounts', 1, NULL, NULL, NULL),
(11, 'HR', 1, NULL, NULL, NULL),
(12, 'P & M', 1, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2023 at 01:42 PM
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `company_id`, `first_name`, `last_name`, `email_id`, `mobile`, `user_role`, `designation_id`, `shop_name`, `password`, `token`, `created_by`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Super', 'Admin', 'admin@gmail.com', NULL, 1, NULL, NULL, '$2y$10$HVII4qusmP59yQ.XEFLjzOOhfjn8CB2/aABLwdU0BrxM7RcpLG2I2', '861bb1ecd3fcabdf83f4dee8430a16f306c3d138', 0, 1, NULL, '2023-07-25 04:54:15', NULL),
(2, 1, 'Manager', 'User', 'manager@gmail.com', '9856321470', 6, 4, NULL, '$2y$10$HVII4qusmP59yQ.XEFLjzOOhfjn8CB2/aABLwdU0BrxM7RcpLG2I2', '60f5821e16932893afd186b1d32023e7a98522fc', 0, 1, NULL, '2023-02-05 23:56:26', NULL),
(17, 1, 'Vendor', NULL, 'test@abc.com', '9856321470', 2, NULL, 'name', '$2y$10$1aURFR7wVE.A9r/0FYiluOYAumxMphRZg1.KzOq6lI.BZwHxcjKDO', NULL, 0, 0, '2023-01-19 06:29:53', '2023-01-19 06:32:12', NULL),
(18, 1, 'Vendor', 'Name', 'suraj@appcart.com', '9856214709', 2, NULL, 'Shop 3', '$2y$10$dWZiMcUu27cDxK1HkKhzZO2hGnFv57vl.LGwzvFM8l0bF95elErky', NULL, 0, 0, '2023-01-19 06:34:58', '2023-02-02 06:29:55', NULL),
(19, 1, 'Vendor', 'shop', 'vendor123@appcart.com', '9874521360', 2, NULL, 'Vendor shop', '$2y$10$KMpMSx29SbxFx4hyBWSEL.1emtbdGvwRS42UaB7BQGJl9MpFJVshy', NULL, 0, 0, '2023-01-30 01:59:02', '2023-01-30 01:59:02', NULL),
(20, 1, 'Suraj', 'Appcart', 'suraj123@appcart.com', '789451320', 5, 3, NULL, '$2y$10$QkF/bwp7XUkM621Y./W/H.fLnlaSFN0Y/XmdtRBk3PvTErmVCIMXe', NULL, 0, 0, '2023-02-02 07:16:01', '2023-02-05 23:51:41', '2023-02-05 23:51:41');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

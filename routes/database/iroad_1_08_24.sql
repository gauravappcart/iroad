-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2024 at 02:55 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

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

-- --------------------------------------------------------

--
-- Table structure for table `activity_tender_item_component_mappings`
--

CREATE TABLE `activity_tender_item_component_mappings` (
  `activity_tender_item_component_id` bigint(20) UNSIGNED NOT NULL,
  `monitor_tender_id` varchar(255) DEFAULT NULL,
  `monitor_activity_id` varchar(255) DEFAULT NULL,
  `tender_item_id` varchar(100) DEFAULT NULL,
  `site_id` varchar(255) DEFAULT NULL,
  `chainage_id` varchar(255) DEFAULT NULL,
  `component_id` varchar(255) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_tender_item_component_mappings`
--

INSERT INTO `activity_tender_item_component_mappings` (`activity_tender_item_component_id`, `monitor_tender_id`, `monitor_activity_id`, `tender_item_id`, `site_id`, `chainage_id`, `component_id`, `created_by`, `updated_by`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(14, '21', '15', '30', '1', '21', '11', 'admin', 'admin', '1', NULL, '2024-06-10 07:33:25', '2024-06-10 07:33:25'),
(15, '21', '15', '31', '1', '21', '11', 'admin', 'admin', '1', NULL, '2024-06-10 07:33:25', '2024-06-10 07:33:25'),
(16, '22', '16', '32', '1', '21', '11', 'admin', 'admin', '1', NULL, '2024-06-10 08:40:07', '2024-06-10 08:40:07'),
(17, '23', '15', '36', '1', '20', '11', 'admin', 'admin', '1', NULL, '2024-06-10 08:44:59', '2024-06-10 08:44:59'),
(18, '24', '16', '37', '1', '20', '11', 'admin', 'admin', '1', NULL, '2024-06-10 09:14:17', '2024-06-10 09:14:17'),
(19, '25', '17', '33', '1', '22', '12', 'admin', 'admin', '1', NULL, '2024-06-10 09:30:01', '2024-06-10 09:30:01'),
(20, '25', '17', '34', '1', '22', '12', 'admin', 'admin', '1', NULL, '2024-06-10 09:30:01', '2024-06-10 09:30:01'),
(21, '25', '17', '35', '1', '22', '12', 'admin', 'admin', '1', NULL, '2024-06-10 09:30:01', '2024-06-10 09:30:01'),
(22, '26', '17', '38', '1', '30', '4', 'admin', 'admin', '1', NULL, '2024-06-28 09:11:34', '2024-06-28 09:11:34'),
(23, '27', '17', '39', '1', '32', '6', 'admin', 'admin', '1', NULL, '2024-07-01 06:48:13', '2024-07-01 06:48:13'),
(24, '28', '18', '40', '1', '32', '6', 'admin', 'admin', '1', NULL, '2024-07-01 06:48:26', '2024-07-01 06:48:26'),
(25, '29', '15', '41', '1', '45', '51', 'admin', 'admin', '1', NULL, '2024-07-01 10:25:23', '2024-07-01 10:25:23'),
(26, '30', '16', '42', '1', '45', '51', 'admin', 'admin', '1', NULL, '2024-07-01 10:25:34', '2024-07-01 10:25:34'),
(27, '31', '18', '43', '1', '47', '3', 'admin', 'admin', '1', NULL, '2024-07-05 06:59:14', '2024-07-05 06:59:14'),
(28, '32', '15', '44', '6', '52', '11', 'admin', 'admin', '1', NULL, '2024-07-24 07:31:07', '2024-07-24 07:31:07'),
(29, '32', '15', '45', '6', '52', '11', 'admin', 'admin', '1', NULL, '2024-07-24 07:31:07', '2024-07-24 07:31:07'),
(30, '32', '15', '46', '6', '52', '11', 'admin', 'admin', '1', NULL, '2024-07-24 07:31:07', '2024-07-24 07:31:07'),
(31, '33', '26', '47', '6', '55', '5', 'admin', 'admin', '1', NULL, '2024-07-24 08:50:11', '2024-07-24 08:50:11'),
(32, '33', '26', '48', '6', '55', '5', 'admin', 'admin', '1', NULL, '2024-07-24 08:50:11', '2024-07-24 08:50:11'),
(33, '34', '18', '49', '6', '56', '4', 'admin', 'admin', '1', NULL, '2024-07-24 08:56:03', '2024-07-24 08:56:03'),
(34, '35', '17', '50', '6', '56', '4', 'admin', 'admin', '1', NULL, '2024-07-24 08:56:22', '2024-07-24 08:56:22'),
(35, '36', '17', '51', '6', '57', '12', 'admin', 'admin', '1', NULL, '2024-07-24 09:01:36', '2024-07-24 09:01:36'),
(36, '37', '25', '52', '6', '58', '9', 'admin', 'admin', '1', NULL, '2024-07-24 09:04:27', '2024-07-24 09:04:27'),
(37, '37', '25', '53', '6', '58', '9', 'admin', 'admin', '1', NULL, '2024-07-24 09:04:27', '2024-07-24 09:04:27'),
(38, '38', '17', '54', '6', '59', '10', 'admin', 'admin', '1', NULL, '2024-07-24 09:13:59', '2024-07-24 09:13:59'),
(39, '38', '17', '55', '6', '59', '10', 'admin', 'admin', '1', NULL, '2024-07-24 09:13:59', '2024-07-24 09:13:59'),
(40, '39', '18', '57', '6', '68', '3', 'admin', 'admin', '1', NULL, '2024-07-24 09:18:09', '2024-07-24 09:18:09'),
(41, '39', '18', '58', '6', '68', '3', 'admin', 'admin', '1', NULL, '2024-07-24 09:18:09', '2024-07-24 09:18:09'),
(42, '40', '16', '59', '6', '66', '51', 'admin', 'admin', '1', NULL, '2024-07-24 09:23:59', '2024-07-24 09:23:59'),
(43, '40', '16', '60', '6', '66', '51', 'admin', 'admin', '1', NULL, '2024-07-24 09:23:59', '2024-07-24 09:23:59'),
(44, '41', '15', '62', '7', '69', '11', 'admin', 'admin', '1', NULL, '2024-07-24 12:15:41', '2024-07-24 12:15:41'),
(45, '42', '15', '63', '7', '70', '64', 'admin', 'admin', '1', NULL, '2024-07-24 13:08:25', '2024-07-24 13:08:25'),
(46, '43', '18', '64', '6', '60', '6', 'admin', 'admin', '1', NULL, '2024-07-26 05:05:22', '2024-07-26 05:05:22'),
(47, '44', '26', '66', '6', '64', '13', 'admin', 'admin', '1', NULL, '2024-07-26 05:10:29', '2024-07-26 05:10:29'),
(48, '44', '26', '67', '6', '64', '13', 'admin', 'admin', '1', NULL, '2024-07-26 05:10:29', '2024-07-26 05:10:29'),
(49, '45', '15', '68', '8', '71', '11', 'admin', 'admin', '1', NULL, '2024-07-26 05:54:09', '2024-07-26 05:54:09'),
(50, '46', '25', '69', '8', '72', '5', 'admin', 'admin', '1', NULL, '2024-07-26 05:56:31', '2024-07-26 05:56:31'),
(51, '46', '25', '70', '8', '72', '5', 'admin', 'admin', '1', NULL, '2024-07-26 05:56:31', '2024-07-26 05:56:31'),
(52, '47', '15', '71', '8', '73', '64', 'admin', 'admin', '1', NULL, '2024-07-26 05:59:01', '2024-07-26 05:59:01'),
(53, '47', '15', '72', '8', '73', '64', 'admin', 'admin', '1', NULL, '2024-07-26 05:59:01', '2024-07-26 05:59:01'),
(54, '48', '15', '73', '9', '74', '11', 'admin', 'admin', '1', NULL, '2024-07-26 06:09:17', '2024-07-26 06:09:17'),
(55, '48', '15', '74', '9', '74', '11', 'admin', 'admin', '1', NULL, '2024-07-26 06:09:17', '2024-07-26 06:09:17'),
(56, '49', '25', '75', '9', '75', '5', 'admin', 'admin', '1', NULL, '2024-07-26 06:10:41', '2024-07-26 06:10:41'),
(57, '49', '25', '76', '9', '75', '5', 'admin', 'admin', '1', NULL, '2024-07-26 06:10:41', '2024-07-26 06:10:41'),
(58, '50', '15', '77', '9', '76', '64', 'admin', 'admin', '1', NULL, '2024-07-26 06:11:43', '2024-07-26 06:11:43'),
(59, '50', '15', '78', '9', '76', '64', 'admin', 'admin', '1', NULL, '2024-07-26 06:11:43', '2024-07-26 06:11:43'),
(60, '51', '17', '79', '9', '77', '12', 'admin', 'admin', '1', NULL, '2024-07-26 06:14:26', '2024-07-26 06:14:26'),
(61, '51', '17', '80', '9', '77', '12', 'admin', 'admin', '1', NULL, '2024-07-26 06:14:26', '2024-07-26 06:14:26'),
(62, '52', '18', '82', '9', '80', '9', 'admin', 'admin', '1', NULL, '2024-07-26 09:07:43', '2024-07-26 09:07:43'),
(63, '53', '15', '83', '10', '94', '11', 'admin', 'admin', '1', NULL, '2024-07-29 12:06:42', '2024-07-29 12:06:42'),
(64, '54', '16', '84', '10', '94', '11', 'admin', 'admin', '1', NULL, '2024-07-29 12:14:09', '2024-07-29 12:14:09'),
(65, '54', '16', '85', '10', '94', '11', 'admin', 'admin', '1', NULL, '2024-07-29 12:14:09', '2024-07-29 12:14:09');

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profit_center` int(11) NOT NULL DEFAULT 2,
  `asset_name` varchar(60) NOT NULL,
  `put_to_use` date DEFAULT NULL,
  `asset_group` int(11) DEFAULT NULL,
  `asset_sub_group` int(11) DEFAULT NULL,
  `assetLocation` int(11) DEFAULT NULL,
  `asset_life_years` int(11) DEFAULT NULL,
  `end_life_date` date DEFAULT NULL,
  `upcoming_maintenance` datetime DEFAULT NULL,
  `maintenance_frequency` varchar(20) DEFAULT NULL,
  `asset_photo` varchar(255) DEFAULT NULL,
  `insurance_cert` varchar(250) DEFAULT NULL,
  `insurance_end` datetime DEFAULT NULL,
  `asset_quantity` varchar(20) DEFAULT NULL,
  `purchase_value` varchar(20) DEFAULT NULL,
  `sale_date` date DEFAULT NULL,
  `sale_value` varchar(20) DEFAULT NULL,
  `sale_description` varchar(2000) DEFAULT NULL,
  `supplier` int(11) DEFAULT NULL,
  `invoice_number` varchar(30) DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `purchase_description` varchar(2000) DEFAULT NULL,
  `invoice_file` varchar(240) DEFAULT NULL,
  `finance_bank_name` varchar(60) DEFAULT NULL,
  `account_no` varchar(30) DEFAULT NULL,
  `loan_amount` varchar(20) DEFAULT NULL,
  `loan_start_date` date DEFAULT NULL,
  `loan_end_date` date DEFAULT NULL,
  `roi` varchar(10) DEFAULT NULL,
  `emi_amount` varchar(20) DEFAULT NULL,
  `emi_date` date DEFAULT NULL,
  `first_gross_value` varchar(20) DEFAULT NULL,
  `addition_during_period` varchar(20) DEFAULT NULL,
  `deduction` varchar(20) DEFAULT NULL,
  `second_gross_value` varchar(20) DEFAULT NULL,
  `acc_dep` varchar(20) DEFAULT NULL,
  `acc_dep2` varchar(20) DEFAULT NULL,
  `dep_deduction` varchar(20) DEFAULT NULL,
  `net_block` varchar(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `profit_center`, `asset_name`, `put_to_use`, `asset_group`, `asset_sub_group`, `assetLocation`, `asset_life_years`, `end_life_date`, `upcoming_maintenance`, `maintenance_frequency`, `asset_photo`, `insurance_cert`, `insurance_end`, `asset_quantity`, `purchase_value`, `sale_date`, `sale_value`, `sale_description`, `supplier`, `invoice_number`, `invoice_date`, `purchase_description`, `invoice_file`, `finance_bank_name`, `account_no`, `loan_amount`, `loan_start_date`, `loan_end_date`, `roi`, `emi_amount`, `emi_date`, `first_gross_value`, `addition_during_period`, `deduction`, `second_gross_value`, `acc_dep`, `acc_dep2`, `dep_deduction`, `net_block`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'AS 1', '2024-06-04', 7, NULL, 1, 3, '2027-06-04', '2024-06-30 00:00:00', 'Monthly', 'public/asset_photo/1/2374eef49932ed22d881ad43e629b042f7649ca4.png', 'public/insurance_cert/1/ecd7c8f7b596c39433b0dc026ab0decc308dbeb5.png', '2025-06-23 00:00:00', '2', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-05 10:14:31', '2024-06-04 12:27:38', '2024-06-05 10:14:31'),
(2, 1, 'AS 1245', '2024-06-04', 7, NULL, 1, 3, '2027-06-04', '2024-06-30 00:00:00', 'Monthly', 'public/asset_photo/2/dd2983a0e57eb024bf50783af122cb4d0e2d7a80.png', 'public/insurance_cert/2/bc5b3673364c0b7bd5d400bb5ceb92d686228174.png', '2025-06-23 00:00:00', '2', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-04 12:32:47', '2024-07-23 11:05:03'),
(3, 2, 'CWIP-1-Asset Palletizing Plant and Machinery( 8th RDF)', '2021-12-21', 8, 5, 1, NULL, NULL, NULL, NULL, 'public/asset_photo/3/42b35903637c612abc8a762789a9bf5b4228dc6c.png', NULL, NULL, '1', '4500000', NULL, NULL, NULL, 1, 'HT 485', '2021-12-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4500000', '7000000', '0', '31000000', NULL, '0', NULL, '31000000', NULL, '2024-06-05 08:57:45', '2024-06-19 12:20:18'),
(4, 2, 'CWIP-2-Asset Palletizing Plant and Machinery( 8th RDF)', '2021-12-29', 8, 5, 1, NULL, NULL, NULL, NULL, 'public/asset_photo/4/8bd9cbaabb75713fdaeda144459db986582b9218.png', NULL, NULL, '1', '1500000', NULL, NULL, NULL, 1, 'HT 504', '2021-12-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1500000', NULL, NULL, NULL, NULL, '0', NULL, '0', NULL, '2024-06-05 08:57:45', '2024-06-19 12:20:18'),
(5, 2, 'CWIP-3-Asset Palletizing Plant and Machinery( 8th RDF)', '2021-03-01', 8, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1850000', NULL, NULL, NULL, 1, NULL, '2021-03-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1850000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-05 08:57:45', '2024-06-05 08:57:45'),
(6, 2, 'CWIP-4-Asset Palletizing Plant and Machinery( 8th RDF)', '2021-01-21', 8, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '3800000', NULL, NULL, NULL, 1, NULL, '2021-01-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3800000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-05 08:57:45', '2024-06-05 08:57:45'),
(7, 2, 'CWIP-5-Asset Palletizing Plant and Machinery( 8th RDF)', '2021-01-25', 8, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '3500000', NULL, NULL, NULL, 1, NULL, '2021-01-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3500000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-05 08:57:45', '2024-06-05 08:57:45'),
(8, 2, 'CWIP-6-Asset Palletizing Plant and Machinery( 8th RDF)', '2022-03-13', 8, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '6000000', NULL, NULL, NULL, 1, NULL, '2022-03-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-05 08:57:45', '2024-06-05 08:57:45'),
(9, 2, 'CWIP-7-Asset Palletizing Plant and Machinery( 8th RDF)', '2022-03-23', 8, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2850000', NULL, NULL, NULL, 1, NULL, '2022-03-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2850000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-05 08:57:45', '2024-06-05 08:57:45'),
(10, 2, 'CWIP-8-Asset Waste to Energy Plant', '2022-03-31', 8, 6, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '17200000', NULL, NULL, NULL, 2, '25/2021-22', '2022-03-31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '17200000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-05 08:57:45', '2024-06-05 08:57:45'),
(11, 2, 'CWIP-9-Asset Waste to Energy Plant', '2022-07-21', 8, 6, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '7500000', NULL, NULL, NULL, 2, '02/2022-23', '2022-07-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7500000', NULL, '24700000', NULL, '0', NULL, '24700000', NULL, '2024-06-05 08:57:45', '2024-06-05 08:57:45'),
(12, 2, 'CWIP-10-Asset Waste to Energy Plant', '2022-08-22', 8, 6, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '900000', NULL, NULL, NULL, 2, '03/2022-23', '2022-08-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '900000', NULL, '900000', NULL, '0', NULL, '900000', NULL, '2024-06-05 08:57:45', '2024-06-05 08:57:45'),
(13, 2, 'CWIP-11-Asset Waste to Energy Plant', '2022-09-12', 8, 6, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1050000', NULL, NULL, NULL, 2, '04/2022-23', '2022-09-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1050000', NULL, '1050000', NULL, '0', NULL, '1050000', NULL, '2024-06-05 08:57:45', '2024-06-05 08:57:45'),
(14, 2, 'CWIP-12-Asset Waste to Energy Plant', '2022-09-17', 8, 6, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2950000', NULL, NULL, NULL, 2, '05/2022-23', '2022-09-17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2950000', NULL, '2950000', NULL, '0', NULL, '2950000', NULL, '2024-06-05 08:57:45', '2024-06-05 08:57:45'),
(15, 2, 'CWIP-13-Asset Waste to Energy Plant', '2022-10-12', 8, 6, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '750000', NULL, NULL, NULL, 2, '06/2022-23', '2022-10-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '750000', NULL, '750000', NULL, '0', NULL, '750000', NULL, '2024-06-05 08:57:45', '2024-06-05 08:57:45'),
(16, 2, 'CWIP-14-Asset Waste to Energy Plant', '2022-10-15', 8, 6, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '7900000', NULL, NULL, NULL, 2, '07/2022-23', '2022-10-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7900000', NULL, '7900000', NULL, '0', NULL, '7900000', NULL, '2024-06-05 08:57:45', '2024-06-05 08:57:45'),
(17, 2, 'CWIP-15-Asset Waste to Energy Plant', '2023-02-25', 8, 6, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '12500000', NULL, NULL, NULL, 2, '12/2022-23', '2023-02-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1250000', NULL, '1250000', NULL, '0', NULL, '1250000', NULL, '2024-06-05 08:57:45', '2024-06-05 08:57:45'),
(18, 2, 'CWIP-16-Asset Waste to Energy Plant', '2023-02-28', 8, 6, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '800000', NULL, NULL, NULL, 2, '13/2022-23', '2023-02-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '800000', NULL, '800000', NULL, '0', NULL, '800000', NULL, '2024-06-05 08:57:45', '2024-06-05 08:57:45'),
(19, 2, 'CWIP-17-Asset EOT Crane 15 Ton Cap ( CWIP)', '2022-03-31', 8, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '6081339', NULL, NULL, NULL, 3, '44565', '2022-03-31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6081339', NULL, '6081339', NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-05 08:57:45', '2024-06-05 08:57:45'),
(20, 2, 'CWIP-18-Asset Ms Pipe Hydro Testing Machine CWIP', '2022-03-31', 8, 8, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '3823200', NULL, NULL, NULL, 4, '44565', '2022-03-31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3823200', NULL, '3823200', NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-05 08:57:45', '2024-06-05 08:57:45'),
(21, 2, 'EI-1-Electrical Transformer 630 KVA', '2022-01-03', 1, NULL, 2, 10, '2032-01-03', NULL, NULL, NULL, NULL, NULL, '1', '1015000', NULL, NULL, NULL, 5, '302', '2022-01-03', '630 KVA Transformer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1015000', NULL, NULL, '1015000', '22728', '124321', NULL, '890679', NULL, '2024-06-05 08:57:45', '2024-06-05 08:57:45'),
(22, 2, 'EI-2-Electrical Transformer 100 KVA', '2021-07-15', 1, NULL, 2, 10, '2031-07-15', NULL, NULL, NULL, NULL, NULL, '1', '112710', NULL, NULL, NULL, 6, 'VE/21-22/120', '2021-07-15', 'Transformer 100 KVA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '112710', NULL, NULL, '112710', '7798', '19084', NULL, '93626', NULL, '2024-06-05 08:57:45', '2024-06-05 08:57:45'),
(23, 2, 'EI-3-Electric Install at Mulund Dumping Ground', '2021-12-01', 1, NULL, 1, 3, '2024-12-01', NULL, NULL, NULL, NULL, NULL, '1', '4137581', NULL, NULL, NULL, 7, 'AVM/21-22/8', '2021-12-01', 'Electrical Installations', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4137581', NULL, NULL, '4137581', '373339', '1781073', NULL, '2356508', NULL, '2024-06-05 08:57:45', '2024-06-05 08:57:45'),
(24, 2, 'EI-4-Electric Work in PEB Indu.Shed', '2021-12-01', 1, NULL, 2, 3, '2024-12-01', NULL, NULL, NULL, NULL, NULL, '1', '2866580', NULL, NULL, NULL, 7, 'AVM/21-22/14,15,17,21', '2021-12-01', 'Electrical Installations', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2866580', NULL, NULL, '2866580', '258655', '1233955', NULL, '1632625', NULL, '2024-06-05 08:57:45', '2024-06-05 08:57:45'),
(25, 2, 'EUD-1-Asset Laptop - 01 (Lenova)', '2019-07-20', 2, NULL, 3, 1, '2020-07-20', NULL, NULL, NULL, NULL, NULL, '1', '39407', NULL, NULL, NULL, 8, 'HO19058470', '2019-07-20', 'LAPTOP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '39407', NULL, NULL, '39407', '39407', '39407', NULL, '0', NULL, '2024-06-05 08:57:45', '2024-06-05 08:57:45'),
(26, 2, 'EUD-2-Asset Laptop - 02 (Lenova)', '2019-11-28', 2, NULL, 3, 1, '2020-11-28', NULL, NULL, NULL, NULL, NULL, '2', '31000', NULL, NULL, NULL, 9, '1757', '2019-11-28', 'LAPTOP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '31000', NULL, NULL, '31000', '31000', '31000', NULL, '0', NULL, '2024-06-05 08:57:45', '2024-06-05 08:57:45'),
(27, 2, 'CWIP-1-Mogal Asset Palletizing Plant and Machinery( 8th RDF)', '2024-12-21', 8, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '4500000', NULL, NULL, NULL, 1, 'HT 485', '2021-12-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4500000', '7000000', '0', '31000000', NULL, '0', NULL, '31000000', NULL, '2024-06-19 12:22:27', '2024-06-19 12:22:27'),
(28, 3, 'Asset MH20FU2818', '2024-06-05', 7, NULL, 3, 20, '2044-06-05', '2024-09-26 00:00:00', 'Half Yearly', 'public/asset_photo/28/b4623eca12b31c811ae07635b385792b80bc512a.jpg', 'public/insurance_cert/28/424a93d5679e715626acfcd1712347083c224cb3.pdf', '2026-10-15 00:00:00', '1', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-09 09:03:25', '2024-07-09 09:19:36'),
(29, 3, 'KOBELCO-140', '2024-07-08', 7, NULL, 3, 4, '2028-07-08', NULL, NULL, NULL, NULL, NULL, '9', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-09 09:28:16', '2024-07-09 09:25:43', '2024-07-09 09:28:16'),
(30, 2, 'EUD-1-Asset Laptop - 01 Dell', '2019-07-20', 2, NULL, 3, 1, '2020-07-20', NULL, NULL, NULL, NULL, NULL, '1', '39407', NULL, NULL, NULL, 8, 'HO19058470', '2019-07-20', 'LAPTOP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '39407', NULL, NULL, '39407', '39407', '39407', NULL, '0', NULL, '2024-07-09 09:32:00', '2024-07-09 09:32:00'),
(31, 2, 'EUD-2-Asset Laptop - 02 HP', '2019-11-28', 2, NULL, 3, 1, '2020-11-28', NULL, NULL, NULL, NULL, NULL, '2', '31000', NULL, NULL, NULL, 9, '1757', '2019-11-28', 'LAPTOP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '31000', NULL, NULL, '31000', '31000', '31000', NULL, '0', NULL, '2024-07-09 09:32:00', '2024-07-09 09:32:00'),
(32, 3, 'computer1', '2024-07-18', 2, NULL, 3, 3, '2027-07-18', NULL, NULL, NULL, NULL, NULL, '10', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-22 11:19:50', '2024-07-22 10:52:06', '2024-07-22 11:19:50'),
(33, 2, 'AS 128', '2024-07-09', 2, NULL, 2, 1, '2025-07-09', NULL, NULL, NULL, 'public/insurance_cert/33/94ac4c446ae79fd0e4b8487607ea1f08c46a7a5c.xlsx', NULL, '100', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-22 11:23:56', '2024-07-23 11:10:29');

-- --------------------------------------------------------

--
-- Table structure for table `assets_group`
--

CREATE TABLE `assets_group` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_name` varchar(80) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assets_group`
--

INSERT INTO `assets_group` (`id`, `group_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Electrical Installations', NULL, '2024-06-03 10:33:18', '2024-06-03 10:33:18'),
(2, 'End User Devices', NULL, '2024-06-03 10:33:18', '2024-06-03 10:33:18'),
(3, 'Furniture & Fixtures', NULL, '2024-06-03 10:33:18', '2024-06-03 10:33:18'),
(4, 'Land & Building', NULL, '2024-06-03 10:33:18', '2024-06-03 10:33:18'),
(5, 'Office Equipments', NULL, '2024-06-03 10:33:18', '2024-06-03 10:33:18'),
(6, 'Plant & Machinery', NULL, '2024-06-03 10:33:18', '2024-06-03 10:33:18'),
(7, 'Vehicles', NULL, '2024-06-03 10:33:18', '2024-06-03 10:33:18'),
(8, 'C-WIP P&M', NULL, '2024-06-03 10:33:18', '2024-06-03 10:33:18');

-- --------------------------------------------------------

--
-- Table structure for table `assets_sub_group`
--

CREATE TABLE `assets_sub_group` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` int(11) NOT NULL,
  `sub_group_name` varchar(80) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assets_sub_group`
--

INSERT INTO `assets_sub_group` (`id`, `group_id`, `sub_group_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 4, 'Temporary Structure', NULL, '2024-06-03 10:34:19', '2024-06-03 10:34:19'),
(2, 6, 'Comm. Constrution Equip', NULL, '2024-06-03 10:34:19', '2024-06-03 10:34:19'),
(3, 6, 'Comm. Vehicle', NULL, '2024-06-03 10:34:19', '2024-06-03 10:34:19'),
(4, 6, 'Earth Moving Equip', NULL, '2024-06-03 10:34:19', '2024-06-03 10:34:19'),
(5, 8, 'Asset Palletizing Plant and Machinery', NULL, '2024-06-03 10:34:19', '2024-06-03 10:34:19'),
(6, 8, 'Asset Waste to Energy Plant', NULL, '2024-06-03 10:34:19', '2024-06-03 10:34:19'),
(7, 8, 'Asset EOT Crane 15 Ton Cap ( CWIP)', NULL, '2024-06-03 10:34:19', '2024-06-03 10:34:19'),
(8, 8, 'Asset Ms Pipe Hydro Testing Machine CWIP', NULL, '2024-06-03 10:34:19', '2024-06-03 10:34:19');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_logo` varchar(50) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`company_id`, `company_name`, `company_logo`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Appcart', NULL, NULL, '2023-01-17 06:48:51', '2023-01-17 06:48:51');

-- --------------------------------------------------------

--
-- Table structure for table `component_chainage_extra_fields`
--

CREATE TABLE `component_chainage_extra_fields` (
  `component_chainage_extra_field_id` bigint(20) UNSIGNED NOT NULL,
  `site_id` varchar(255) DEFAULT NULL,
  `component_id` varchar(255) DEFAULT NULL,
  `chainage_id` varchar(255) DEFAULT NULL,
  `component_extra_field_id` varchar(255) DEFAULT NULL,
  `field_name` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `component_chainage_extra_fields`
--

INSERT INTO `component_chainage_extra_fields` (`component_chainage_extra_field_id`, `site_id`, `component_id`, `chainage_id`, `component_extra_field_id`, `field_name`, `unit`, `quantity`, `created_by`, `updated_by`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(5, '1', '51', '45', '1', 'Extra Field One', 'CM', '35', 'admin', 'admin', '1', NULL, '2024-06-17 06:57:04', '2024-07-04 10:17:36'),
(6, '1', '51', '45', '2', 'Extra Field Two', 'M', '22', 'admin', 'admin', '1', NULL, '2024-06-17 06:57:04', '2024-07-04 10:17:36'),
(7, '6', '51', '66', '1', 'Extra Field One', '2', '200', 'admin', 'admin', '1', NULL, '2024-07-24 06:45:17', '2024-07-24 07:04:17'),
(8, '6', '51', '66', '2', 'Extra Field Two', '3', '300', 'admin', 'admin', '1', NULL, '2024-07-24 06:45:17', '2024-07-24 07:04:17');

-- --------------------------------------------------------

--
-- Table structure for table `component_extra_fields`
--

CREATE TABLE `component_extra_fields` (
  `component_extra_field_id` bigint(20) UNSIGNED NOT NULL,
  `component_id` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `field_name` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `component_extra_fields`
--

INSERT INTO `component_extra_fields` (`component_extra_field_id`, `component_id`, `added_by`, `field_name`, `unit`, `created_by`, `updated_by`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '51', 'admin', 'Extra Field One', '2', 'admin', 'admin', '1', NULL, '2024-06-13 06:03:52', '2024-06-18 06:34:51'),
(2, '51', 'admin', 'Extra Field Two', '3', 'admin', 'admin', '1', NULL, '2024-06-13 10:20:38', '2024-06-18 06:35:02'),
(3, '51', 'project_admin', 'Extra Field Three', '2', 'admin', 'admin', '1', NULL, '2024-06-13 10:20:38', '2024-06-13 11:51:38');

-- --------------------------------------------------------

--
-- Table structure for table `component_monitering_activity_mapping`
--

CREATE TABLE `component_monitering_activity_mapping` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `component_id` int(11) NOT NULL,
  `monitoring_activity_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(100) NOT NULL DEFAULT '1',
  `updated_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `component_monitering_activity_mapping`
--

INSERT INTO `component_monitering_activity_mapping` (`id`, `component_id`, `monitoring_activity_id`, `deleted_at`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(100, 12, 17, NULL, 'admin', 'admin', '2024-06-10 07:17:01', '2024-06-10 07:17:01'),
(101, 12, 18, NULL, 'admin', 'admin', '2024-06-10 07:17:01', '2024-06-10 07:17:01'),
(143, 1, 16, NULL, '1', NULL, '2024-06-13 12:01:16', '2024-06-13 12:01:16'),
(158, 51, 15, '2024-07-29 06:40:22', '1', NULL, '2024-06-18 06:35:02', '2024-07-29 06:40:22'),
(159, 51, 16, '2024-07-29 06:40:22', '1', NULL, '2024-06-18 06:35:02', '2024-07-29 06:40:22'),
(160, 4, 17, NULL, '1', NULL, '2024-06-28 09:09:15', '2024-06-28 09:09:15'),
(161, 4, 18, NULL, '1', NULL, '2024-06-28 09:09:15', '2024-06-28 09:09:15'),
(180, 6, 17, NULL, '1', NULL, '2024-07-04 08:48:56', '2024-07-04 08:48:56'),
(181, 6, 18, NULL, '1', NULL, '2024-07-04 08:48:56', '2024-07-04 08:48:56'),
(182, 3, 18, NULL, '1', NULL, '2024-07-05 06:58:58', '2024-07-05 06:58:58'),
(191, 64, 15, '2024-07-22 05:36:00', '1', NULL, '2024-07-10 11:37:42', '2024-07-22 05:36:00'),
(192, 64, 16, '2024-07-22 05:36:00', '1', NULL, '2024-07-10 11:37:42', '2024-07-22 05:36:00'),
(203, 65, 15, '2024-07-19 10:48:09', '1', NULL, '2024-07-19 10:47:54', '2024-07-19 10:48:09'),
(204, 65, 16, '2024-07-19 10:48:09', '1', NULL, '2024-07-19 10:47:54', '2024-07-19 10:48:09'),
(205, 65, 17, '2024-07-19 10:48:09', '1', NULL, '2024-07-19 10:47:54', '2024-07-19 10:48:09'),
(206, 65, 18, '2024-07-19 10:48:09', '1', NULL, '2024-07-19 10:47:54', '2024-07-19 10:48:09'),
(209, 66, 15, NULL, '1', NULL, '2024-07-23 07:32:17', '2024-07-23 07:32:17'),
(210, 67, 16, '2024-07-29 06:39:02', '1', NULL, '2024-07-23 10:46:25', '2024-07-29 06:39:02'),
(211, 68, 16, '2024-07-24 05:45:38', '1', NULL, '2024-07-23 11:13:39', '2024-07-24 05:45:38'),
(212, 69, 16, '2024-07-24 05:45:47', '1', NULL, '2024-07-23 11:14:32', '2024-07-24 05:45:47'),
(213, 11, 15, NULL, '1', NULL, '2024-07-24 05:31:43', '2024-07-24 05:31:43'),
(214, 11, 16, NULL, '1', NULL, '2024-07-24 05:31:43', '2024-07-24 05:31:43'),
(215, 5, 25, NULL, '1', NULL, '2024-07-24 08:42:20', '2024-07-24 08:42:20'),
(216, 5, 26, NULL, '1', NULL, '2024-07-24 08:42:20', '2024-07-24 08:42:20'),
(217, 9, 18, NULL, '1', NULL, '2024-07-24 08:43:08', '2024-07-24 08:43:08'),
(218, 9, 25, NULL, '1', NULL, '2024-07-24 08:43:08', '2024-07-24 08:43:08'),
(219, 10, 17, NULL, '1', NULL, '2024-07-24 08:43:38', '2024-07-24 08:43:38'),
(220, 8, 16, NULL, '1', NULL, '2024-07-24 08:44:20', '2024-07-24 08:44:20'),
(221, 8, 18, NULL, '1', NULL, '2024-07-24 08:44:20', '2024-07-24 08:44:20'),
(222, 13, 26, NULL, '1', NULL, '2024-07-24 08:46:26', '2024-07-24 08:46:26'),
(223, 7, 15, NULL, '1', NULL, '2024-07-24 08:46:54', '2024-07-24 08:46:54'),
(224, 7, 25, NULL, '1', NULL, '2024-07-24 08:46:54', '2024-07-24 08:46:54'),
(226, 70, 15, '2024-07-29 05:16:30', '1', NULL, '2024-07-29 05:16:18', '2024-07-29 05:16:30'),
(227, 70, 16, '2024-07-29 05:16:30', '1', NULL, '2024-07-29 05:16:18', '2024-07-29 05:16:30'),
(228, 71, 25, '2024-07-29 05:23:14', '1', NULL, '2024-07-29 05:20:13', '2024-07-29 05:23:14'),
(229, 71, 27, '2024-07-29 05:23:14', '1', NULL, '2024-07-29 05:20:13', '2024-07-29 05:23:14'),
(230, 72, 15, '2024-07-29 06:48:04', '1', NULL, '2024-07-29 06:44:14', '2024-07-29 06:48:04'),
(231, 73, 15, '2024-07-29 09:03:59', '1', NULL, '2024-07-29 09:03:13', '2024-07-29 09:03:59'),
(232, 74, 15, NULL, '1', NULL, '2024-07-29 09:04:53', '2024-07-29 09:04:53');

-- --------------------------------------------------------

--
-- Table structure for table `conflicts`
--

CREATE TABLE `conflicts` (
  `conflict_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(11) NOT NULL,
  `site_id` varchar(255) DEFAULT NULL,
  `component_id` varchar(255) DEFAULT NULL,
  `chainage_id` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `conflict_description` varchar(255) DEFAULT NULL,
  `other_reason_title` varchar(255) DEFAULT NULL,
  `confirmed_by` tinyint(4) DEFAULT NULL,
  `confirmed` tinyint(4) DEFAULT NULL,
  `confirmed_date` date DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conflicts`
--

INSERT INTO `conflicts` (`conflict_id`, `company_id`, `site_id`, `component_id`, `chainage_id`, `subject`, `conflict_description`, `other_reason_title`, `confirmed_by`, `confirmed`, `confirmed_date`, `created_by`, `updated_by`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '1', '11', '20', 'Test Subject', 'Test Subject Conflict Descriptions', '', NULL, NULL, NULL, '1', '1', NULL, NULL, '2024-07-30 10:27:32', '2024-08-01 09:01:18'),
(2, 1, '1', '12', '22', 'Test Subject 2', 'Test Subject Conflict Descriptions 2', NULL, NULL, NULL, NULL, '1', '1', NULL, NULL, '2024-07-30 10:27:32', '2024-08-01 06:33:54');

-- --------------------------------------------------------

--
-- Table structure for table `conflicts_media`
--

CREATE TABLE `conflicts_media` (
  `conflict_media_id` bigint(20) UNSIGNED NOT NULL,
  `conflict_id` varchar(255) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `filepath` varchar(255) DEFAULT NULL,
  `fileurl` varchar(255) DEFAULT NULL,
  `thumburl` varchar(255) DEFAULT NULL,
  `filesize` int(11) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `conflicts_resolved_information`
--

CREATE TABLE `conflicts_resolved_information` (
  `conflict_resolved_id` bigint(20) UNSIGNED NOT NULL,
  `conflict_id` varchar(255) DEFAULT NULL,
  `resolved_comment` varchar(255) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conflicts_resolved_information`
--

INSERT INTO `conflicts_resolved_information` (`conflict_resolved_id`, `conflict_id`, `resolved_comment`, `created_by`, `updated_by`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, '1', '1st Comment', '1', '1', '1', NULL, '2024-07-31 10:56:44', '2024-07-31 10:56:44'),
(4, '1', '2nd Comment', '1', '1', '1', NULL, '2024-07-31 10:56:44', '2024-07-31 10:56:44'),
(5, '1', '3rd Comment', '1', '1', '1', NULL, '2024-08-01 06:25:24', '2024-08-01 06:25:24'),
(6, '1', '4th Comment', '1', '1', '1', NULL, '2024-08-01 06:33:54', '2024-08-01 06:33:54'),
(7, '2', 'Test Subject 2 Resolved Comment', '1', '1', '1', NULL, '2024-08-01 06:52:11', '2024-08-01 06:52:11'),
(8, '1', '5th Comment', '1', '1', '1', NULL, '2024-08-01 09:01:18', '2024-08-01 09:01:18'),
(9, '2', 'Test Subject 2 Resolved 2nd Comment', '1', '1', '1', NULL, '2024-08-01 11:04:48', '2024-08-01 11:04:48'),
(10, '2', 'Test Subject 2 Resolved 3rd Comment', '1', '1', '1', NULL, '2024-08-01 11:07:25', '2024-08-01 11:07:25'),
(11, '2', 'Test Subject 2 Resolved 4th Comment', '1', '1', '1', NULL, '2024-08-01 11:08:30', '2024-08-01 11:08:30'),
(12, '2', 'Test Subject 2 Resolved 5th Comment', '1', '1', '1', NULL, '2024-08-01 11:09:35', '2024-08-01 11:09:35'),
(13, '2', 'Test Subject 2 Resolved 6th Comment', '1', '1', '1', NULL, '2024-08-01 11:10:54', '2024-08-01 11:10:54'),
(14, '2', 'Test Subject 2 Resolved 6th Comment', '1', '1', '1', NULL, '2024-08-01 11:13:26', '2024-08-01 11:13:26'),
(15, '2', 'Test Subject 2 Resolved 7th Comment', '1', '1', '1', NULL, '2024-08-01 11:16:24', '2024-08-01 11:16:24'),
(16, '2', 'Test Subject 2 Resolved 8th Comment', '1', '1', '1', NULL, '2024-08-01 11:17:40', '2024-08-01 11:17:40'),
(17, '2', 'Test Subject 2 Resolved 9th Comment', '1', '1', '1', NULL, '2024-08-01 11:23:23', '2024-08-01 11:23:23');

-- --------------------------------------------------------

--
-- Table structure for table `coordinates`
--

CREATE TABLE `coordinates` (
  `coord_id` bigint(20) UNSIGNED NOT NULL,
  `site_id` int(11) DEFAULT NULL,
  `route` int(11) NOT NULL DEFAULT 1,
  `latitude` varchar(60) NOT NULL,
  `longitude` varchar(60) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coordinates`
--

INSERT INTO `coordinates` (`coord_id`, `site_id`, `route`, `latitude`, `longitude`, `deleted_at`, `created_at`, `updated_at`) VALUES
(41, 1, 1, '18.52145778955675', ' 73.85523671762876', NULL, '2023-02-01 04:34:53', '2023-02-01 04:34:53'),
(42, 1, 1, '18.520908439472514', ' 73.85548348085813', NULL, '2023-02-01 04:34:53', '2023-02-01 04:34:53'),
(43, 1, 1, '18.52063376376871', ' 73.8556765999072', NULL, '2023-02-01 04:34:53', '2023-02-01 04:34:53'),
(44, 1, 1, '18.520359087623774', ' 73.85596091406278', NULL, '2023-02-01 04:34:53', '2023-02-01 04:34:53'),
(45, 1, 1, '18.520120017286718', ' 73.85615403311185', NULL, '2023-02-01 04:34:53', '2023-02-01 04:34:53'),
(46, 1, 1, '18.519814820626195', ' 73.85616476194791', NULL, '2023-02-01 04:34:54', '2023-02-01 04:34:54'),
(47, 1, 2, '18.52133062534235', ' 73.85570878641538', NULL, '2023-02-01 04:34:54', '2023-02-01 04:34:54'),
(48, 1, 2, '18.521305192488125', ' 73.85811741011075', NULL, '2023-02-01 04:34:54', '2023-02-01 04:34:54'),
(49, 1, 2, '18.52095930529518', ' 73.85618621962003', NULL, '2023-02-01 04:34:54', '2023-02-01 04:34:54'),
(50, 1, 2, '18.5206490235416', ' 73.85770434992246', NULL, '2023-02-01 04:34:54', '2023-02-01 04:34:54'),
(51, 1, 2, '18.52013527710546', ' 73.85699624674253', NULL, '2023-02-01 04:34:54', '2023-02-01 04:34:54'),
(52, 2, 1, '18.52132045220111', ' 73.85571980861805', NULL, '2023-02-01 06:42:49', '2023-02-01 06:42:49'),
(53, 2, 1, '18.521025430842034', ' 73.85640645412586', NULL, '2023-02-01 06:42:49', '2023-02-01 06:42:49'),
(54, 2, 1, '18.520923699220905', ' 73.85588610557697', NULL, '2023-02-01 06:42:49', '2023-02-01 06:42:49'),
(55, 2, 1, '18.520567638070435', ' 73.85602021602772', NULL, '2023-02-01 06:42:49', '2023-02-01 06:42:49'),
(56, 2, 1, '18.520582897849216', ' 73.85610068229816', NULL, '2023-02-01 06:42:49', '2023-02-01 06:42:49'),
(57, 2, 2, '18.52142727015392', ' 73.85515654472492', NULL, '2023-02-01 06:42:49', '2023-02-01 06:42:49'),
(58, 2, 2, '18.521162768434575', ' 73.85538185028217', NULL, '2023-02-01 06:42:50', '2023-02-01 06:42:50'),
(59, 2, 2, '18.52076601508857', ' 73.8555856981673', NULL, '2023-02-01 06:42:50', '2023-02-01 06:42:50'),
(60, 2, 2, '18.520399780413815', ' 73.8559451141753', NULL, '2023-02-01 06:42:50', '2023-02-01 06:42:50'),
(61, 2, 2, '18.52010984407348', ' 73.85615969089649', NULL, '2023-02-01 06:42:50', '2023-02-01 06:42:50'),
(62, 4, 1, '18.47295770429171', ' 73.8032141909734', NULL, '2024-06-07 11:42:01', '2024-06-07 11:42:01'),
(63, 4, 1, '18.474504451543748', ' 73.8032141909734', NULL, '2024-06-07 11:42:01', '2024-06-07 11:42:01'),
(64, 4, 2, '18.473527560165447', ' 73.8032141909734', NULL, '2024-06-07 11:42:01', '2024-06-07 11:42:01'),
(65, 5, 1, '18.509889401853236', ' 73.82120575996375', NULL, '2024-07-10 11:26:39', '2024-07-10 11:26:39'),
(66, 5, 1, '18.506348875426387', ' 73.82438149543738', NULL, '2024-07-10 11:26:39', '2024-07-10 11:26:39'),
(67, 5, 1, '18.505941913673094', ' 73.8251968869779', NULL, '2024-07-10 11:26:39', '2024-07-10 11:26:39'),
(68, 5, 1, '18.506186090841187', ' 73.8263126859281', NULL, '2024-07-10 11:26:39', '2024-07-10 11:26:39'),
(69, 5, 1, '18.510011487665086', ' 73.8338228711698', NULL, '2024-07-10 11:26:39', '2024-07-10 11:26:39'),
(70, 6, 1, '18.447689417096726', ' 73.8291859550476', NULL, '2024-07-24 06:04:35', '2024-07-24 06:04:35'),
(71, 6, 1, '18.446814148757717', ' 73.82784485054016', NULL, '2024-07-24 06:04:35', '2024-07-24 06:04:35'),
(72, 6, 1, '18.446478288792395', ' 73.82647155952453', NULL, '2024-07-24 06:04:35', '2024-07-24 06:04:35'),
(73, 6, 1, '18.446178049782638', ' 73.82555960845947', NULL, '2024-07-24 06:04:35', '2024-07-24 06:04:35'),
(74, 6, 1, '18.445781122828667', ' 73.8245028181076', NULL, '2024-07-24 06:04:35', '2024-07-24 06:04:35'),
(75, 6, 1, '18.445374017307728', ' 73.8235104007721', NULL, '2024-07-24 06:04:35', '2024-07-24 06:04:35'),
(76, 6, 1, '18.44546052731165', ' 73.82359086704254', NULL, '2024-07-24 06:04:35', '2024-07-24 06:04:35'),
(77, 6, 1, '18.446178049782638', ' 73.82342993450165', NULL, '2024-07-24 06:04:35', '2024-07-24 06:04:35'),
(78, 6, 1, '18.44648337758465', ' 73.82338701915741', NULL, '2024-07-24 06:04:35', '2024-07-24 06:04:35'),
(79, 7, 1, '18.521370979701185', ' 73.84179879905851', NULL, '2024-07-24 12:14:18', '2024-07-24 12:14:18'),
(80, 7, 1, '18.521538836404616', ' 73.84333302261503', NULL, '2024-07-24 12:14:18', '2024-07-24 12:14:18'),
(81, 7, 1, '18.52062325238447', ' 73.84611715557249', NULL, '2024-07-24 12:14:18', '2024-07-24 12:14:18'),
(82, 8, 1, '18.516816971912043', ' 73.768920145019', NULL, '2024-07-26 05:51:58', '2024-07-26 05:51:58'),
(83, 8, 1, '18.514253253537692', ' 73.76934929846138', NULL, '2024-07-26 05:51:58', '2024-07-26 05:51:58'),
(84, 8, 1, '18.51250339195406', ' 73.77055092810005', NULL, '2024-07-26 05:51:58', '2024-07-26 05:51:58'),
(85, 8, 1, '18.510834902615702', ' 73.77222462652534', NULL, '2024-07-26 05:51:58', '2024-07-26 05:51:58'),
(86, 8, 1, '18.509939608947224', ' 73.77355500219673', NULL, '2024-07-26 05:51:58', '2024-07-26 05:51:58'),
(87, 8, 1, '18.508962919603594', ' 73.77540036199898', NULL, '2024-07-26 05:51:58', '2024-07-26 05:51:58'),
(88, 8, 1, '18.508759441955462', ' 73.77673073767036', NULL, '2024-07-26 05:51:58', '2024-07-26 05:51:58'),
(89, 8, 1, '18.508271094612954', ' 73.77870484350532', NULL, '2024-07-26 05:51:58', '2024-07-26 05:51:58'),
(90, 9, 1, '18.519188596511075', ' 73.7744534018524', NULL, '2024-07-26 06:06:43', '2024-07-26 06:06:43'),
(91, 9, 1, '18.518542592751608', ' 73.77446949510649', NULL, '2024-07-26 06:06:43', '2024-07-26 06:06:43'),
(92, 9, 1, '18.51813057333157', ' 73.77437829999998', NULL, '2024-07-26 06:06:43', '2024-07-26 06:06:43'),
(93, 9, 1, '18.517805026421318', ' 73.77435684232786', NULL, '2024-07-26 06:06:43', '2024-07-26 06:06:43'),
(94, 9, 1, '18.51723531783759', ' 73.77442657976225', NULL, '2024-07-26 06:06:43', '2024-07-26 06:06:43'),
(95, 9, 1, '18.51691485592546', ' 73.77444267301634', NULL, '2024-07-26 06:06:43', '2024-07-26 06:06:43'),
(96, 9, 1, '18.516863988900067', ' 73.77444267301634', NULL, '2024-07-26 06:06:43', '2024-07-26 06:06:43'),
(97, 10, 1, '18.445859450825125', ' 73.82475560475463', NULL, '2024-07-29 04:45:08', '2024-07-29 04:45:08'),
(98, 10, 1, '18.446185134398704', ' 73.82552808095092', NULL, '2024-07-29 04:45:08', '2024-07-29 04:45:08'),
(99, 10, 1, '18.44640395270289', ' 73.82622545529479', NULL, '2024-07-29 04:45:08', '2024-07-29 04:45:08'),
(100, 10, 1, '18.44653626130973', ' 73.82682627011413', NULL, '2024-07-29 04:45:08', '2024-07-29 04:45:08'),
(101, 10, 1, '18.446663481027887', ' 73.8274700002777', NULL, '2024-07-29 04:45:08', '2024-07-29 04:45:08'),
(102, 10, 1, '18.446846677256506', ' 73.82793134022826', NULL, '2024-07-29 04:45:08', '2024-07-29 04:45:08'),
(103, 10, 1, '18.44729448943725', ' 73.82862871457213', NULL, '2024-07-29 04:45:08', '2024-07-29 04:45:08');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `is_active` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`, `created_by`, `updated_by`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'HR Department Edit', 'admin', 'admin', '1', NULL, '2024-05-30 05:27:10', '2024-05-30 05:28:29'),
(2, 'Account Department', 'admin', 'admin', '1', NULL, '2024-05-30 06:27:58', '2024-05-30 06:27:58'),
(3, 'Storage Department', 'admin', 'admin', '1', NULL, '2024-05-30 07:13:50', '2024-05-30 07:13:50');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `designation_id` bigint(20) UNSIGNED NOT NULL,
  `designation_name` varchar(60) NOT NULL,
  `is_active` varchar(255) DEFAULT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`designation_id`, `designation_name`, `is_active`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Project Manager', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-30 06:56:17'),
(2, 'Quantity Surveyor', '1', 'admin', 'admin', '2024-07-19 13:04:13', '2024-05-30 06:56:17', '2024-07-19 13:04:13'),
(3, 'Highway Engineer', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-31 10:28:58'),
(4, 'Structural Engineer', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-30 06:56:17'),
(5, 'Store Incharge', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-30 06:56:17'),
(6, 'Asst. Purchase Manager', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-30 06:56:17'),
(7, 'QC Engineer', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-30 06:56:17'),
(8, 'Accountant', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-30 06:56:17'),
(9, 'MD', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-30 06:56:17'),
(10, 'CEO', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-30 06:56:17'),
(11, 'TECHNICAL DIRECTOR', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-30 06:56:17'),
(12, 'TOLL HEAD', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-30 06:56:17'),
(13, 'TECHNICAL HEAD', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-30 06:56:17'),
(14, 'PRO', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-30 06:56:17'),
(15, 'CA', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-30 06:56:17'),
(16, 'SENIOR ACCOUNTANT', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-30 06:56:17'),
(17, 'SENIOR OFFICER ACCOUNTS', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-30 06:56:17'),
(18, 'ACCOUNT EXECUTIVE', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-30 06:56:17'),
(19, 'HR MANAGER', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-30 06:56:17'),
(20, 'HR EXECUTIVE', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-30 06:56:17'),
(21, 'SR.ENGINEER (P & M )', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-30 06:56:17'),
(22, 'PURCHASE EXECUTIVE', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-30 06:56:17'),
(23, 'SENIOR EXECUTIVE-PURCHASE', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-30 06:56:17'),
(24, 'MANAGER TOLL-OPERATIONS', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-30 06:56:17'),
(25, 'LIASONING OFFICER', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-30 06:56:17'),
(26, 'TOLL EXECUITVE', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-30 06:56:17'),
(27, 'TENDER EXECUTIVE', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-30 06:56:17'),
(28, 'PLANNING & BILLING ENGG', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-30 06:56:17'),
(29, 'Jr.ENGG-TENDER', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-30 06:56:17'),
(30, 'QC ENGINEER', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-30 06:56:17'),
(31, 'SITE ENGINEER', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-30 06:56:17'),
(32, 'CIVIL ENGINEER', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-30 06:56:17'),
(33, 'EXECUTIVE-TOLL OPERATIONS', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-30 06:56:17'),
(34, 'FRONT DESK EXECUTIVE', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-30 06:56:17'),
(35, 'TOLL ACCOUNTANT', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-30 06:56:17'),
(36, 'STORE-EXECATIVE', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-30 06:56:17'),
(37, 'ACCOUNT-EXECATIVE', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-30 06:56:17'),
(38, 'QUANTITY SURVEYOY', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-30 06:56:17'),
(39, 'HR-ADMIN', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-30 06:56:17'),
(40, 'SR.ENGG (STRUCTURE)', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-30 06:56:17'),
(41, 'ENGINEER (HIGHWAY)', '1', 'admin', 'admin', NULL, '2024-05-30 06:56:17', '2024-05-30 06:56:17'),
(52, 'PMO', '1', 'admin', 'admin', NULL, '2024-05-30 07:03:38', '2024-05-30 07:03:53'),
(53, 'Senior Project Manager', '1', 'admin', 'admin', NULL, '2024-05-30 07:11:29', '2024-07-23 10:04:35'),
(54, 'tersdftrter', '0', 'admin', 'admin', '2024-07-10 11:02:43', '2024-07-10 11:02:26', '2024-07-10 11:02:43'),
(55, 'rtetet', '1', 'admin', 'admin', '2024-07-10 11:04:01', '2024-07-10 11:03:38', '2024-07-10 11:04:01'),
(56, 'retretef', '1', 'admin', 'admin', '2024-07-10 11:03:55', '2024-07-10 11:03:38', '2024-07-10 11:03:55'),
(57, 'QA2', '0', 'admin', 'admin', '2024-07-22 10:00:57', '2024-07-22 10:00:13', '2024-07-22 10:00:57'),
(58, 'QA2', '1', 'admin', 'admin', '2024-07-23 07:20:19', '2024-07-22 10:01:10', '2024-07-23 07:20:19'),
(59, 'qa4', '1', 'admin', 'admin', '2024-07-29 12:48:18', '2024-07-23 10:54:45', '2024-07-29 12:48:18'),
(60, 'abc', '1', 'admin', 'admin', '2024-07-29 12:49:20', '2024-07-29 12:49:09', '2024-07-29 12:49:20'),
(61, 'pqr', '1', 'admin', 'admin', '2024-07-29 12:49:24', '2024-07-29 12:49:09', '2024-07-29 12:49:24'),
(62, 'qwerty', '1', 'admin', 'admin', '2024-07-29 12:49:27', '2024-07-29 12:49:09', '2024-07-29 12:49:27'),
(63, 'asd', '1', 'admin', 'admin', '2024-07-29 12:49:31', '2024-07-29 12:49:09', '2024-07-29 12:49:31'),
(64, 'abc', '1', 'admin', 'admin', '2024-07-29 13:07:15', '2024-07-29 13:06:33', '2024-07-29 13:07:15'),
(65, 'pqr', '1', 'admin', 'admin', '2024-07-29 13:07:18', '2024-07-29 13:06:33', '2024-07-29 13:07:18'),
(66, 'qwerty', '1', 'admin', 'admin', '2024-07-29 13:07:21', '2024-07-29 13:06:33', '2024-07-29 13:07:21'),
(67, 'asd', '1', 'admin', 'admin', '2024-07-29 13:07:25', '2024-07-29 13:06:33', '2024-07-29 13:07:25');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `labours`
--

CREATE TABLE `labours` (
  `labour_id` bigint(20) UNSIGNED NOT NULL,
  `labour_type` varchar(200) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `labours`
--

INSERT INTO `labours` (`labour_id`, `labour_type`, `created_by`, `updated_by`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Female Collie', 'admin', 'admin', '1', NULL, '2024-05-20 12:52:42', '2024-07-23 06:17:49'),
(2, 'Male Collie', 'admin', 'admin', '1', NULL, '2024-05-21 05:42:36', '2024-05-21 05:53:43'),
(3, 'Semi Skilled', 'admin', 'admin', '1', NULL, '2024-05-21 05:42:43', '2024-05-21 05:57:55'),
(4, 'Low Skilled', 'admin', 'admin', '1', NULL, '2024-05-31 04:40:56', '2024-05-31 04:40:56'),
(5, 'High Skilled', 'admin', 'admin', '1', NULL, '2024-05-31 05:45:14', '2024-07-22 05:52:28'),
(6, 'tetedjkj', 'admin', 'admin', '1', '2024-07-10 08:50:03', '2024-07-10 08:49:45', '2024-07-10 08:50:03'),
(7, 'Add', 'admin', 'admin', '1', '2024-07-19 09:53:35', '2024-07-19 09:53:17', '2024-07-19 09:53:35'),
(8, '000', 'admin', 'admin', '0', '2024-07-19 09:57:27', '2024-07-19 09:56:55', '2024-07-19 09:57:27'),
(9, 'Add22r', 'admin', 'admin', '0', '2024-07-19 10:00:04', '2024-07-19 09:59:04', '2024-07-19 10:00:04'),
(10, 'Add3y', 'admin', 'admin', '0', '2024-07-22 05:51:21', '2024-07-22 05:50:55', '2024-07-22 05:51:21'),
(11, 'Add132', 'admin', 'admin', '0', NULL, '2024-07-23 06:18:04', '2024-07-23 06:19:30'),
(13, 'a', 'admin', 'admin', '1', '2024-07-23 12:39:51', '2024-07-23 09:32:41', '2024-07-23 12:39:51'),
(14, '', 'admin', 'admin', '1', '2024-07-23 12:31:18', '2024-07-23 12:31:14', '2024-07-23 12:31:18'),
(15, 'Addd', 'admin', 'admin', '0', NULL, '2024-07-29 05:08:04', '2024-07-29 06:42:16');

-- --------------------------------------------------------

--
-- Table structure for table `machines`
--

CREATE TABLE `machines` (
  `machine_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `machine_name` varchar(100) NOT NULL,
  `machine_type` bigint(20) UNSIGNED DEFAULT NULL,
  `machine_number` varchar(50) DEFAULT NULL,
  `machine_uid` varchar(50) DEFAULT NULL,
  `machine_hrs` varchar(20) DEFAULT NULL,
  `machine_cost` varchar(40) DEFAULT NULL,
  `machine_cost_per_hrs` varchar(40) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `machines`
--

INSERT INTO `machines` (`machine_id`, `company_id`, `machine_name`, `machine_type`, `machine_number`, `machine_uid`, `machine_hrs`, `machine_cost`, `machine_cost_per_hrs`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(39, 1, 'Truck', 1, '99999', '99999', '9', '9000', '1000', 1, '2024-05-31 05:44:41', '2024-05-31 05:44:41', NULL),
(41, 1, 'Big Truck', 1, '8000', '8900', '9', '9000', '1000', 1, '2024-05-31 06:06:31', '2024-05-31 06:06:31', NULL),
(42, 1, 'Mini Mixer Truck', 1, '7000', '70000', '7', '7000', '1000', 1, '2024-05-31 06:08:44', '2024-05-31 06:08:44', NULL),
(43, 1, 'Big Truck 2 Side', 1, '100044', '80000800', '7', '9000', '1286', 1, '2024-05-31 06:10:11', '2024-05-31 06:10:11', NULL),
(44, 1, 'Big Truck 4 side', 1, '9008', '88888', '8', '8000', '1000', 1, '2024-05-31 06:10:43', '2024-05-31 06:10:43', NULL),
(45, 1, 'Big Truck 6 Side', 1, 'J12356df45678', '2123131654', '8', '6000', '750', 1, '2024-05-31 06:12:04', '2024-05-31 06:12:04', NULL),
(46, 1, 'Big Truck 2', 1, 'MH12345', 'MH12345', '5', '50000', '10000', 1, '2024-05-31 06:13:32', '2024-05-31 06:13:32', NULL),
(47, 1, 'Big Truck 5', 1, '66666', '567575675', '6', '777777', '129630', 1, '2024-05-31 06:20:34', '2024-05-31 06:20:34', NULL),
(48, 1, 'Big Truck 67676', 1, 'MH1122', 'MH1122', '7', '7000', '1000', 1, '2024-05-31 06:22:28', '2024-05-31 06:22:28', NULL),
(49, 1, 'Big Truck 78', 1, 'MH11226', 'MH11226', '8', '80000', '10000', 1, '2024-05-31 06:25:48', '2024-05-31 06:25:48', NULL),
(50, 1, 'sdfsdf', 1, '433453', '535345', '4', '534', '134', 1, '2024-05-31 08:58:09', '2024-05-31 08:58:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `machine_types`
--

CREATE TABLE `machine_types` (
  `mach_type_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `machine_type` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `machine_types`
--

INSERT INTO `machine_types` (`mach_type_id`, `company_id`, `machine_type`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Truck', NULL, '2023-01-06 00:05:07', '2023-01-06 00:05:07'),
(2, 1, 'JCB', NULL, '2023-01-06 00:12:45', '2023-01-06 00:12:45'),
(3, 1, 'Buldoser', NULL, '2023-01-06 00:34:12', '2023-01-06 00:34:12'),
(8, 1, 'Any Type', NULL, '2023-01-30 06:25:41', '2023-01-30 06:25:41');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `material_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `site_id` int(11) NOT NULL,
  `material_name` varchar(100) NOT NULL,
  `material_type` varchar(50) DEFAULT NULL,
  `material_unit` varchar(50) DEFAULT NULL,
  `material_cost` varchar(40) DEFAULT NULL,
  `material_cost_per_unit` varchar(40) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` varchar(40) NOT NULL,
  `updated_by` varchar(40) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`material_id`, `company_id`, `site_id`, `material_name`, `material_type`, `material_unit`, `material_cost`, `material_cost_per_unit`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 1, 1, 'ABC1', '7', '3', '2000', NULL, 1, '1', '1', '2023-01-05 08:33:58', '2024-07-23 06:15:37', NULL),
(8, 1, 0, 'silica', '7', '3', '500', NULL, 1, '', '', '2023-01-05 09:03:54', '2023-01-05 09:04:40', NULL),
(9, 1, 0, 'Rods', '7', '3', '100', NULL, 1, '', '', '2023-01-10 06:39:40', '2023-01-10 06:39:40', NULL),
(14, 10, 0, 'ABC12', '7', '3', '500', NULL, 0, '', '', '2023-01-13 08:00:12', '2024-07-10 07:28:09', NULL),
(16, 1, 0, 'angles', '7', '2', '1000', NULL, 1, '', '', '2023-01-16 03:28:14', '2023-01-23 01:48:12', NULL),
(17, 1, 0, 'ABC2', '13', '4', '100', NULL, 1, '', '', '2023-01-16 03:41:27', '2024-07-10 07:24:58', '2024-07-10 07:24:58'),
(18, 1, 0, 'Steel', '7', '5', '500', NULL, 1, '', '', '2023-01-16 07:08:05', '2023-01-16 07:08:05', NULL),
(28, 1, 4, 'import name', '24', '2', '1000', NULL, 0, '1', '1', '2023-01-30 06:40:39', '2024-07-24 11:22:23', NULL),
(29, 1, 0, 'import name 2', '25', '3', '1200', NULL, 0, '', '', '2023-01-30 06:40:39', '2023-01-30 06:40:39', NULL),
(30, 1, 0, 'sdfsdfs', '7', '3', '500', NULL, 0, '', '', '2023-08-01 07:43:34', '2023-08-01 07:43:34', NULL),
(31, 1, 0, 'Material_33', '26', '1', '22', NULL, 1, '', '', '2024-05-03 07:02:34', '2024-05-03 07:02:34', NULL),
(32, 1, 0, 'Material_337', '28', '3', '44', NULL, 1, '', '', '2024-05-03 07:19:09', '2024-05-03 07:19:09', NULL),
(33, 1, 0, 'River Sand', '13', '3', '100', NULL, 1, '', '', '2024-05-24 05:41:01', '2024-05-24 05:41:01', NULL),
(35, 1, 0, 'M-Mati', '7', '2', NULL, NULL, 0, '', '', '2024-05-24 06:59:46', '2024-05-24 06:59:46', NULL),
(36, 1, 4, 'Motarola', '7', '2', '10', NULL, 1, '1', '1', '2024-05-24 07:25:04', '2024-07-26 11:09:47', NULL),
(37, 1, 0, 'import name99', '29', '3', '100000000', NULL, 0, '', '', '2024-05-24 07:26:24', '2024-05-24 07:26:24', NULL),
(38, 1, 0, 'import name 29999', '30', '3', '199999200', NULL, 0, '', '', '2024-05-24 07:26:24', '2024-05-24 07:26:24', NULL),
(39, 1, 0, 'Samsung', '26', '1', NULL, NULL, 1, '', '', '2024-05-24 10:07:00', '2024-05-24 10:07:00', NULL),
(40, 1, 4, 'Limestone', '26', '3', '10', NULL, 1, '1', '1', '2024-05-24 11:14:52', '2024-07-24 11:26:02', NULL),
(41, 1, 0, 'Basalt', '26', '4', NULL, NULL, 1, '', '', '2024-05-24 11:14:52', '2024-05-24 11:14:52', NULL),
(42, NULL, 0, 'Cement', '31', '3', '600', NULL, 1, '', '', '2024-07-09 10:30:48', '2024-07-09 10:30:48', NULL),
(43, NULL, 0, 'Steel TMT 12mm (Make-ISI)', '32', '2', '500', NULL, 1, '', '', '2024-07-09 10:32:30', '2024-07-09 10:32:30', NULL),
(44, 1, 0, 'Alluminium Staff 6 m Long Both Side marking With Carring Case ', '32', '3', NULL, NULL, 1, '', '', '2024-07-10 07:03:23', '2024-07-10 07:03:23', NULL),
(45, 1, 0, 'M S Plate 25 mm Size 8*4', '32', '3', '98', NULL, 1, '', '', '2024-07-10 07:03:23', '2024-07-10 07:04:53', NULL),
(46, 1, 0, 'Alluminium Staff 6 m Long Both Side marking With Carring Case ', '32', '3', NULL, NULL, 1, '', '', '2024-07-10 07:03:42', '2024-07-10 07:03:42', NULL),
(47, 1, 0, 'M S Plate 25 mm Size 8*4 ', '32', '3', NULL, NULL, 1, '', '', '2024-07-10 07:03:42', '2024-07-10 07:03:42', NULL),
(48, 1, 0, 'Material_222', '30', '2', '700', NULL, 1, '', '', '2024-07-16 06:32:58', '2024-07-16 06:32:58', NULL),
(49, 1, 1, 'Material_2222', '7', '3', '800', NULL, 1, '', '', '2024-07-16 06:33:38', '2024-07-16 06:33:38', NULL),
(50, 1, 1, 'I-Sand', '13', '3', NULL, NULL, 1, '', '', '2024-07-16 07:10:38', '2024-07-16 07:10:38', NULL),
(51, 1, 1, 'II-Sand', '13', '3', '800', NULL, 1, '', '', '2024-07-16 07:16:12', '2024-07-16 09:24:22', NULL),
(55, 1, 1, 'III-Sand', '13', '3', NULL, NULL, 1, '', '', '2024-07-17 09:25:38', '2024-07-17 09:25:38', NULL),
(59, 1, 1, 'IV-Sand', '13', '3', NULL, NULL, 1, '', '', '2024-07-17 09:42:26', '2024-07-17 09:42:26', NULL),
(60, 1, 1, 'V-Sand', '13', '3', NULL, NULL, 1, '', '', '2024-07-17 09:49:35', '2024-07-17 09:49:35', NULL),
(61, 1, 1, 'VI-Sand', '13', '3', NULL, NULL, 1, '', '', '2024-07-17 09:49:39', '2024-07-17 09:49:39', NULL),
(62, 1, 1, 'VII-Sand', '13', '3', NULL, NULL, 1, '', '', '2024-07-17 09:57:17', '2024-07-17 09:57:17', NULL),
(63, 1, 1, 'VIII-Sand', '13', '3', NULL, NULL, 1, '', '', '2024-07-17 10:03:50', '2024-07-17 10:03:50', NULL),
(64, 1, 1, 'VIIII-Sand', '13', '3', NULL, NULL, 1, '', '', '2024-07-17 10:03:55', '2024-07-17 10:03:55', NULL),
(65, 1, 1, 'X-Sand', '13', '3', NULL, NULL, 1, '', '', '2024-07-17 10:20:38', '2024-07-17 10:20:38', NULL),
(66, 1, 1, 'XI-Sand', '13', '3', NULL, NULL, 1, '', '', '2024-07-17 10:20:42', '2024-07-17 10:20:42', NULL),
(67, 1, 1, 'XII-Sand', '13', '3', NULL, NULL, 1, '', '', '2024-07-17 10:21:04', '2024-07-17 10:21:04', NULL),
(68, 1, 1, 'XIII-Sand', '13', '3', NULL, NULL, 1, '', '', '2024-07-17 10:21:38', '2024-07-17 10:21:38', NULL),
(69, 1, 1, 'XIV-Sand', '13', '3', NULL, NULL, 1, '', '', '2024-07-17 11:12:09', '2024-07-17 11:12:09', NULL),
(70, 1, 1, 'XV-Sand', '13', '3', NULL, NULL, 1, '', '', '2024-07-17 11:12:35', '2024-07-17 11:12:35', NULL),
(103, 1, 2, 'Material_2222', '7', '3', '800', NULL, 1, '', '', '2024-07-18 05:29:46', '2024-07-18 05:29:46', NULL),
(104, 1, 2, 'I-Sand', '13', '3', NULL, NULL, 1, '', '', '2024-07-18 05:29:46', '2024-07-18 05:29:46', NULL),
(105, 1, 2, 'II-Sand', '13', '3', '800', NULL, 1, '', '', '2024-07-18 05:29:46', '2024-07-18 05:29:46', NULL),
(106, 1, 2, 'III-Sand', '13', '3', NULL, NULL, 1, '', '', '2024-07-18 05:29:46', '2024-07-18 05:29:46', NULL),
(107, 1, 2, 'IV-Sand', '13', '3', NULL, NULL, 1, '', '', '2024-07-18 05:29:46', '2024-07-18 05:29:46', NULL),
(108, 1, 2, 'V-Sand', '13', '3', NULL, NULL, 1, '', '', '2024-07-18 05:29:46', '2024-07-18 05:29:46', NULL),
(109, 1, 2, 'VI-Sand', '13', '3', NULL, NULL, 1, '', '', '2024-07-18 05:29:46', '2024-07-18 05:29:46', NULL),
(110, 1, 2, 'VII-Sand', '13', '3', NULL, NULL, 1, '', '', '2024-07-18 05:29:46', '2024-07-18 05:29:46', NULL),
(111, 1, 2, 'VIII-Sand', '13', '3', NULL, NULL, 1, '', '', '2024-07-18 05:29:46', '2024-07-18 05:29:46', NULL),
(112, 1, 2, 'VIIII-Sand', '13', '3', NULL, NULL, 1, '', '', '2024-07-18 05:29:46', '2024-07-18 05:29:46', NULL),
(113, 1, 2, 'X-Sand', '13', '3', NULL, NULL, 1, '', '', '2024-07-18 05:29:46', '2024-07-18 05:29:46', NULL),
(114, 1, 2, 'XI-Sand', '13', '3', NULL, NULL, 1, '', '', '2024-07-18 05:29:46', '2024-07-18 05:29:46', NULL),
(115, 1, 2, 'XII-Sand', '13', '3', NULL, NULL, 1, '', '', '2024-07-18 05:29:46', '2024-07-18 05:29:46', NULL),
(116, 1, 2, 'XIII-Sand', '13', '3', NULL, NULL, 1, '', '', '2024-07-18 05:29:46', '2024-07-18 05:29:46', NULL),
(117, 1, 2, 'XIV-Sand', '13', '3', NULL, NULL, 1, '', '', '2024-07-18 05:29:46', '2024-07-18 05:29:46', NULL),
(118, 1, 2, 'XV-Sand', '13', '3', NULL, NULL, 1, '', '', '2024-07-18 05:29:46', '2024-07-18 05:29:46', NULL),
(119, 1, 1, 'PRO-Sand', '13', '3', NULL, NULL, 1, '1', '', '2024-07-18 11:16:34', '2024-07-18 11:16:34', NULL),
(120, 1, 2, 'PRO-Sand', '13', '3', NULL, NULL, 1, '1', '1', '2024-07-18 06:03:33', '2024-07-18 06:03:33', NULL),
(121, 1, 2, 'sand', '13', '2', '100', NULL, 1, '1', '', '2024-07-22 07:23:54', '2024-07-22 07:23:54', NULL),
(122, 1, 5, 'Material_2222', '7', '3', NULL, NULL, 1, '1', '1', '2024-07-22 02:20:31', '2024-07-22 02:20:31', NULL),
(123, 1, 5, 'I-Sand', '13', '3', NULL, NULL, 1, '1', '1', '2024-07-22 02:20:31', '2024-07-22 02:20:31', NULL),
(124, 1, 5, 'II-Sand', '13', '3', NULL, NULL, 1, '1', '1', '2024-07-22 02:20:31', '2024-07-22 02:20:31', NULL),
(125, 1, 5, 'III-Sand', '13', '3', NULL, NULL, 1, '1', '1', '2024-07-22 02:20:31', '2024-07-22 02:20:31', NULL),
(126, 1, 5, 'IV-Sand', '13', '3', NULL, NULL, 1, '1', '1', '2024-07-22 02:20:31', '2024-07-22 02:20:31', NULL),
(127, 1, 5, 'V-Sand', '13', '3', NULL, NULL, 1, '1', '1', '2024-07-22 02:20:31', '2024-07-22 02:20:31', NULL),
(128, 1, 5, 'VI-Sand', '13', '3', NULL, NULL, 1, '1', '1', '2024-07-22 02:20:31', '2024-07-22 02:20:31', NULL),
(129, 1, 5, 'VII-Sand', '13', '3', NULL, NULL, 1, '1', '1', '2024-07-22 02:20:31', '2024-07-22 02:20:31', NULL),
(130, 1, 5, 'VIII-Sand', '13', '3', NULL, NULL, 1, '1', '1', '2024-07-22 02:20:31', '2024-07-22 02:20:31', NULL),
(131, 1, 5, 'VIIII-Sand', '13', '3', NULL, NULL, 1, '1', '1', '2024-07-22 02:20:31', '2024-07-22 02:20:31', NULL),
(132, 1, 5, 'X-Sand', '13', '3', NULL, NULL, 1, '1', '1', '2024-07-22 02:20:31', '2024-07-22 02:20:31', NULL),
(133, 1, 5, 'XI-Sand', '13', '3', NULL, NULL, 1, '1', '1', '2024-07-22 02:20:31', '2024-07-22 02:20:31', NULL),
(134, 1, 5, 'XII-Sand', '13', '3', NULL, NULL, 1, '1', '1', '2024-07-22 02:20:31', '2024-07-22 02:20:31', NULL),
(135, 1, 5, 'XIII-Sand', '13', '3', NULL, NULL, 1, '1', '1', '2024-07-22 02:20:31', '2024-07-22 02:20:31', NULL),
(136, 1, 5, 'XIV-Sand', '13', '3', NULL, NULL, 1, '1', '1', '2024-07-22 02:20:31', '2024-07-22 02:20:31', NULL),
(137, 1, 5, 'XV-Sand', '13', '3', NULL, NULL, 1, '1', '1', '2024-07-22 02:20:31', '2024-07-22 02:20:31', NULL),
(138, 1, 5, 'PRO-Sand', '13', '3', NULL, NULL, 1, '1', '1', '2024-07-22 02:20:31', '2024-07-22 02:20:31', NULL),
(139, 1, 4, 'Material_2222', '7', '3', NULL, NULL, 1, '1', '1', '2024-07-22 03:15:03', '2024-07-22 03:15:03', NULL),
(140, 1, 4, 'I-Sand', '13', '3', NULL, NULL, 1, '1', '1', '2024-07-22 03:15:03', '2024-07-22 03:15:03', NULL),
(141, 1, 4, 'II-Sand', '13', '3', NULL, NULL, 1, '1', '1', '2024-07-22 03:15:03', '2024-07-22 03:15:03', NULL),
(142, 1, 4, 'III-Sand', '13', '3', NULL, NULL, 1, '1', '1', '2024-07-22 03:15:03', '2024-07-22 03:15:03', NULL),
(143, 1, 4, 'IV-Sand', '13', '3', NULL, NULL, 1, '1', '1', '2024-07-22 03:15:03', '2024-07-22 03:15:03', NULL),
(144, 1, 4, 'V-Sand', '13', '3', NULL, NULL, 1, '1', '1', '2024-07-22 03:15:03', '2024-07-22 03:15:03', NULL),
(145, 1, 4, 'VI-Sand', '13', '3', NULL, NULL, 1, '1', '1', '2024-07-22 03:15:03', '2024-07-22 03:15:03', NULL),
(146, 1, 4, 'VII-Sand', '13', '3', NULL, NULL, 1, '1', '1', '2024-07-22 03:15:03', '2024-07-22 03:15:03', NULL),
(147, 1, 4, 'VIII-Sand', '13', '3', NULL, NULL, 1, '1', '1', '2024-07-22 03:15:03', '2024-07-22 03:15:03', NULL),
(148, 1, 4, 'VIIII-Sand', '13', '3', NULL, NULL, 1, '1', '1', '2024-07-22 03:15:03', '2024-07-22 03:15:03', NULL),
(149, 1, 4, 'X-Sand', '13', '3', NULL, NULL, 1, '1', '1', '2024-07-22 03:15:03', '2024-07-22 03:15:03', NULL),
(150, 1, 4, 'XI-Sand', '13', '3', NULL, NULL, 1, '1', '1', '2024-07-22 03:15:03', '2024-07-22 03:15:03', NULL),
(151, 1, 4, 'XII-Sand', '13', '3', NULL, NULL, 1, '1', '1', '2024-07-22 03:15:03', '2024-07-22 03:15:03', NULL),
(152, 1, 4, 'XIII-Sand', '13', '3', NULL, NULL, 1, '1', '1', '2024-07-22 03:15:03', '2024-07-22 03:15:03', NULL),
(153, 1, 4, 'XIV-Sand', '13', '3', NULL, NULL, 1, '1', '1', '2024-07-22 03:15:03', '2024-07-22 03:15:03', NULL),
(154, 1, 4, 'XV-Sand', '13', '3', NULL, NULL, 1, '1', '1', '2024-07-22 03:15:03', '2024-07-22 03:15:03', NULL),
(155, 1, 4, 'PRO-Sand', '13', '3', NULL, NULL, 1, '1', '1', '2024-07-22 03:15:03', '2024-07-22 03:15:03', NULL),
(156, 1, 4, 'sand', '13', '2', NULL, NULL, 1, '1', '1', '2024-07-22 03:15:03', '2024-07-22 03:15:03', NULL),
(157, 1, 1, 'IIE-Sand', '13', '3', '700', NULL, 1, '1', '1', '2024-07-23 09:40:23', '2024-07-23 12:35:58', NULL),
(158, NULL, 2, '1-sand', '13', '2', '2414', NULL, 1, '1', '', '2024-07-23 10:05:05', '2024-07-23 10:23:01', '2024-07-23 10:23:01'),
(159, NULL, 4, 'SAND_100', '24', '3', '1234', NULL, 1, '1', '1', '2024-07-23 10:06:36', '2024-07-23 10:22:53', '2024-07-23 10:22:53'),
(160, NULL, 5, 'HHH', '31', '4', '963', NULL, 1, '1', '', '2024-07-23 10:08:12', '2024-07-23 10:22:47', '2024-07-23 10:22:47'),
(161, NULL, 5, 'ROCK1', '26', '3', '741', NULL, 1, '1', '', '2024-07-23 10:11:17', '2024-07-23 10:22:43', '2024-07-23 10:22:43'),
(162, 1, 1, 'II44-Sand', '13', '3', '600', NULL, 1, '1', '', '2024-07-23 10:13:17', '2024-07-23 10:22:38', '2024-07-23 10:22:38'),
(163, NULL, 4, 'CEMENT10', '31', '3', '666', NULL, 1, '1', '', '2024-07-23 10:15:19', '2024-07-23 10:22:35', '2024-07-23 10:22:35'),
(164, NULL, 2, 'IRON10', '24', '3', '300', NULL, 1, '1', '', '2024-07-23 10:15:53', '2024-07-23 10:22:31', '2024-07-23 10:22:31'),
(165, NULL, 4, 'CEMENT8', '25', '4', '300', NULL, 1, '1', '', '2024-07-23 10:17:12', '2024-07-23 10:22:21', '2024-07-23 10:22:21'),
(166, NULL, 4, 'CEMENT9', '25', '4', '300', NULL, 1, '1', '', '2024-07-23 10:17:41', '2024-07-23 10:22:16', '2024-07-23 10:22:16'),
(167, NULL, 1, 'SANDD', '13', '3', '900', NULL, 1, '1', '', '2024-07-23 10:18:42', '2024-07-23 10:22:12', '2024-07-23 10:22:12'),
(168, 1, 2, 'SAND20', '13', '3', '200', NULL, 1, '1', '', '2024-07-23 10:19:40', '2024-07-23 10:22:08', '2024-07-23 10:22:08'),
(169, 1, 9, 'Steel 1', '7', '2', '10', NULL, 1, '1', '', '2024-07-26 11:59:33', '2024-07-26 11:59:33', NULL),
(170, 1, 8, 'Core steel', '7', '2', '1000', NULL, 1, '1', '1', '2024-07-30 05:09:39', '2024-07-30 05:14:35', NULL),
(171, 1, 9, 'Core steel', '7', '2', NULL, NULL, 1, '1', '1', '2024-07-29 23:45:17', '2024-07-29 23:45:17', NULL),
(172, 1, 6, 'Steel 1', '7', '2', NULL, NULL, 1, '1', '1', '2024-07-29 23:46:22', '2024-07-29 23:46:22', NULL),
(173, 1, 6, 'Core steel', '7', '2', NULL, NULL, 1, '1', '1', '2024-07-29 23:46:22', '2024-07-29 23:46:22', NULL),
(178, 1, 9, 'Steel Rod 45 MM', '7', '2', '850', NULL, 1, '1', '', '2024-07-30 05:21:22', '2024-07-30 05:21:22', NULL),
(179, 1, 8, 'Rock Rock', '26', '3', '500', NULL, 1, '1', '', '2024-07-30 05:23:10', '2024-07-30 05:23:10', NULL),
(181, 1, 8, 'Rockk', '26', '3', '500', NULL, 1, '1', '', '2024-07-30 05:24:28', '2024-07-30 05:24:28', NULL),
(182, 1, 8, 'Rockk ttt', '26', '3', '500', NULL, 1, '1', '', '2024-07-30 05:24:57', '2024-07-30 05:24:57', NULL),
(183, 1, 10, 'Rockk ttt', '26', '3', '500', NULL, 0, '1', '1', '2024-07-30 05:25:16', '2024-07-30 05:28:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `material_types`
--

CREATE TABLE `material_types` (
  `mtype_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `material_type` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `material_types`
--

INSERT INTO `material_types` (`mtype_id`, `company_id`, `material_type`, `deleted_at`, `created_at`, `updated_at`) VALUES
(7, 1, 'Steel Type', NULL, '2023-01-05 08:26:39', '2023-01-05 08:26:39'),
(13, 1, 'Sand Type', NULL, '2023-01-05 09:03:54', '2023-01-05 09:03:54'),
(24, NULL, 'Iron Type', NULL, '2023-01-23 08:19:47', '2023-01-23 08:19:47'),
(25, NULL, 'Cement Type', NULL, '2023-01-23 08:19:47', '2023-01-23 08:19:47'),
(26, NULL, 'Rock Type', NULL, '2024-05-03 07:02:34', '2024-05-03 07:02:34'),
(27, NULL, 'Material_34', NULL, '2024-05-03 07:07:16', '2024-05-03 07:07:16'),
(28, NULL, 'Type_11', NULL, '2024-05-03 07:19:09', '2024-05-03 07:19:09'),
(29, NULL, 'Material Type', NULL, '2024-05-24 07:26:24', '2024-05-24 07:26:24'),
(30, NULL, 'Material Type 2', NULL, '2024-05-24 07:26:24', '2024-05-24 07:26:24'),
(31, NULL, 'cement', NULL, '2024-07-09 10:30:48', '2024-07-09 10:30:48'),
(32, NULL, 'Steel', NULL, '2024-07-09 10:32:30', '2024-07-09 10:32:30');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_04_085943_create_machines_table', 1),
(6, '2023_01_05_072649_create_materials_table', 2),
(7, '2023_01_05_115619_create_vendors_detail_table', 3),
(8, '2023_01_05_121603_create_material_types_table', 3),
(9, '2023_01_06_052031_create_machine_types_table', 4),
(10, '2023_01_06_065951_add_company_id_to_users_table', 5),
(11, '2023_01_06_070336_add_company_id_to_users_table', 5),
(12, '2023_01_06_070818_create_companies_table', 5),
(13, '2023_01_09_055238_add_company_id_to_machines_table', 6),
(14, '2023_01_09_055416_add_company_id_to_materials_table', 6),
(15, '2023_01_09_055549_add_company_id_to_material_types_table', 6),
(16, '2023_01_09_062100_add_company_id_to_machine_types_table', 7),
(17, '2023_01_09_070558_add_company_id_to_vendors_detail_table', 8),
(18, '2023_01_09_073302_change_key_in_machines_table', 9),
(19, '2023_01_09_075429_delete_machine_type_to_machines', 9),
(20, '2023_01_09_080313_add_fk_to_machines_table', 10),
(21, '2023_01_09_080431_add_newfk_to_machines_table', 11),
(22, '2023_01_09_080851_add_newfk_to_machines_table', 11),
(23, '2023_01_09_080945_add_column_to_machines_table', 11),
(24, '2023_01_09_081349_add_fk_to_machines_table', 12),
(25, '2023_01_09_085506_change_fields_in_machines', 13),
(26, '2023_01_09_092957_change_field_as_foreign_in_machines', 14),
(27, '2023_01_09_093526_delete_columns_in_machines', 14),
(28, '2023_01_09_094030_add_foreignkey_columns_in_machines', 15),
(29, '2023_01_11_121444_change_range_to_users_table', 16),
(30, '2023_01_11_121954_change_filed_name_in_users_table', 17),
(31, '2023_01_11_123032_add_token_to_users_table', 18),
(32, '2023_01_11_124001_add_token_field_to_users_table', 19),
(33, '2023_01_17_070753_create_roles_tables', 20),
(34, '2023_01_18_070809_add_shop_name_to_users_table', 21),
(35, '2023_01_19_113149_add_softdelete_to_users_table', 22),
(36, '2023_01_19_113553_add_soft_delete_to_users_table', 23),
(37, '2023_01_20_123134_create_monitoring_activities_table', 24),
(38, '2023_01_24_052517_add_columns_to_materials_table', 25),
(39, '2023_01_24_053758_add_columns_to_machines_table', 26),
(40, '2023_01_31_060357_create_sites_table', 27),
(41, '2023_02_01_065215_add_column_to_sites_table', 28),
(42, '2023_02_01_085400_create_coordinates_table', 29),
(43, '2023_02_01_090403_add_column_to_coordinates_table', 30),
(44, '2023_02_01_093154_rename_project_amount_in_sites_table', 31),
(45, '2023_02_01_093457_rename_project_columns_in_sites_table', 32),
(46, '2023_02_02_071723_designations', 33),
(47, '2023_02_02_071738_create_designations_table', 33),
(48, '2023_02_02_095438_add_column_to_users_table', 34),
(49, '2023_02_02_104004_create_user_sites_table', 35),
(53, '2023_02_09_061422_create_road_components_table', 36),
(54, '2023_07_26_114913_create_road_components_chainage_table', 36),
(55, '2023_08_01_132048_remove_columns_from_users_table', 37),
(56, '2023_08_01_130337_add_token_and_email_columns_to_users_table', 38),
(57, '2023_08_01_132322_2023_08_01_132048_remove_columns_from_users_table', 38),
(58, '2023_08_01_133041_add_token_and_email_column_again_to_users_table', 39),
(59, '2023_08_14_125845_create_tests_table', 40),
(60, '2024_05_07_111247_create_component_monitering_activity_mapping_table', 41),
(61, '2024_05_14_121303_create_tender_items_table', 42),
(62, '2024_05_14_152206_create_units_table', 43),
(63, '2024_05_16_180822_create_monitor_tenders_table', 44),
(64, '2024_05_17_101716_create_activity_tender_item_component_mappings_table', 45),
(65, '2024_05_20_173021_create_labours_table', 46),
(66, '2024_05_22_142136_create_site_plan_activities_table', 47),
(67, '2024_05_23_143524_create_site_plan_labours_table', 48),
(68, '2024_05_24_180402_create_site_plan_materials_table', 49),
(69, '2024_05_29_105244_create_site_plan_machines_table', 50),
(70, '2024_05_30_102054_create_departments_table', 51),
(71, '2023_12_05_094914_create_assets_table', 52),
(72, '2023_12_05_105928_add_columns__to_assets_table', 52),
(73, '2023_12_20_135830_addnewcolumns_to_assets_table', 52),
(74, '2023_12_22_160159_addasset_photo_to_assets_column', 52),
(75, '2024_01_15_144814_add_columns_to_assets_able', 52),
(76, '2024_01_31_124330_addremaining_columns_to_asset_table', 52),
(77, '2024_03_07_121341_addmaintenance_frequency_columns_to_assets_table', 52),
(78, '2023_11_29_073323_create_vehicle_types_table', 53),
(79, '2023_12_05_091953_create_assets_group_table', 53),
(80, '2023_12_05_092301_create_assets_sub_group_table', 53),
(81, '2023_12_06_091802_create_profit_center_table', 53),
(82, '2023_10_30_133615_create_vehicles_table', 54),
(83, '2023_12_05_111129_add_assessgroup_column_to_asset_vehicles_table', 54),
(84, '2023_12_22_105831_addasset_i_d_column_to_vehicles_table', 54),
(85, '2024_01_15_145625_add_columns_to_vehicles_table', 54),
(86, '2024_01_19_174015_create_suppliers_table', 55),
(87, '2024_06_06_113837_create_site_plan_departments_table', 56),
(88, '2024_06_07_115057_create_site_plan_assets_table', 57),
(90, '2024_06_12_174422_create_component_extra_fields_table', 58),
(91, '2024_06_14_164921_create_component_chainage_extra_fields_table', 59),
(94, '2024_07_04_123208_create_site_weekly_plans_table', 60),
(95, '2024_07_05_124741_create_site_weekly_plan_extra_fields_table', 61),
(96, '2024_07_05_172401_create_site_weekly_plan_materials_table', 62),
(97, '2024_07_05_172552_create_site_weekly_plan_machines_table', 63),
(98, '2024_07_05_172852_create_site_weekly_plan_labours_table', 64),
(99, '2024_07_30_144158_create_conflicts_table', 65),
(100, '2024_07_30_153831_create_conflicts_media_table', 66),
(101, '2024_07_30_153857_create_conflicts_resolved_information_table', 67);

-- --------------------------------------------------------

--
-- Table structure for table `monitoring_activities`
--

CREATE TABLE `monitoring_activities` (
  `activity_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(11) NOT NULL,
  `activity_name` varchar(250) NOT NULL,
  `activity_description` varchar(500) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monitoring_activities`
--

INSERT INTO `monitoring_activities` (`activity_id`, `company_id`, `activity_name`, `activity_description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(15, 1, 'Activity 1', 'Activity 1 description', NULL, '2024-06-10 05:15:00', '2024-06-10 05:15:00'),
(16, 1, 'Activity 2', 'Activity 2 Description', NULL, '2024-06-10 05:15:28', '2024-06-10 05:15:28'),
(17, 1, 'Activity 3', 'Activity 3 Description', NULL, '2024-06-10 05:15:48', '2024-06-10 05:15:48'),
(18, 1, 'Activity 4', 'Activity 4 Description', NULL, '2024-06-10 05:16:07', '2024-06-10 05:16:07'),
(25, 1, 'Activity 5', 'abc', NULL, '2024-07-19 11:20:47', '2024-07-24 09:05:45'),
(26, 1, 'Activity 6', 'lorem ipsum', NULL, '2024-07-23 11:31:59', '2024-07-23 11:31:59'),
(28, 1, 'Activity 5', 'lorem ipsum', NULL, '2024-07-29 05:39:19', '2024-07-29 05:39:19'),
(29, 1, 'Activity 42', 'Activity 4 2Desc', NULL, '2024-07-29 06:21:19', '2024-07-29 06:21:19');

-- --------------------------------------------------------

--
-- Table structure for table `monitor_tenders`
--

CREATE TABLE `monitor_tenders` (
  `monitor_tender_id` bigint(20) UNSIGNED NOT NULL,
  `monitor_activity_id` varchar(255) NOT NULL,
  `site_id` varchar(255) NOT NULL,
  `component_id` varchar(100) DEFAULT NULL,
  `chainage_id` varchar(255) NOT NULL,
  `monitored_tender_item` int(11) DEFAULT NULL,
  `monitor_item_unit` int(11) DEFAULT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `is_active` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monitor_tenders`
--

INSERT INTO `monitor_tenders` (`monitor_tender_id`, `monitor_activity_id`, `site_id`, `component_id`, `chainage_id`, `monitored_tender_item`, `monitor_item_unit`, `created_by`, `updated_by`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(21, '15', '1', '11', '21', 31, 6, 'admin', 'admin', '1', NULL, '2024-06-10 07:33:25', '2024-06-10 07:33:25'),
(22, '16', '1', '11', '21', 32, 7, 'admin', 'admin', '1', NULL, '2024-06-10 08:40:07', '2024-06-10 08:40:07'),
(23, '15', '1', '11', '20', 36, 6, 'admin', 'admin', '1', NULL, '2024-06-10 08:44:59', '2024-06-10 08:44:59'),
(24, '16', '1', '11', '20', 37, 6, 'admin', 'admin', '1', NULL, '2024-06-10 09:14:17', '2024-06-10 09:14:17'),
(25, '17', '1', '12', '22', 34, 6, 'admin', 'admin', '1', NULL, '2024-06-10 09:30:01', '2024-06-10 09:30:01'),
(26, '17', '1', '4', '30', 38, 6, 'admin', 'admin', '1', NULL, '2024-06-28 09:11:34', '2024-06-28 09:11:34'),
(27, '17', '1', '6', '32', 39, 7, 'admin', 'admin', '1', NULL, '2024-07-01 06:48:13', '2024-07-01 06:48:13'),
(28, '18', '1', '6', '32', 40, 6, 'admin', 'admin', '1', NULL, '2024-07-01 06:48:26', '2024-07-01 06:48:26'),
(29, '15', '1', '51', '45', 41, 6, 'admin', 'admin', '1', NULL, '2024-07-01 10:25:23', '2024-07-01 10:25:23'),
(30, '16', '1', '51', '45', 42, 7, 'admin', 'admin', '1', NULL, '2024-07-01 10:25:34', '2024-07-01 10:25:34'),
(31, '18', '1', '3', '47', 43, 6, 'admin', 'admin', '1', NULL, '2024-07-05 06:59:14', '2024-07-05 06:59:14'),
(32, '15', '6', '11', '52', 46, 7, 'admin', 'admin', '1', NULL, '2024-07-24 07:31:07', '2024-07-24 07:31:07'),
(33, '26', '6', '5', '55', 48, 6, 'admin', 'admin', '1', NULL, '2024-07-24 08:50:11', '2024-07-24 08:50:11'),
(34, '18', '6', '4', '56', 49, 6, 'admin', 'admin', '1', NULL, '2024-07-24 08:56:03', '2024-07-24 08:56:03'),
(35, '17', '6', '4', '56', 50, 7, 'admin', 'admin', '1', NULL, '2024-07-24 08:56:22', '2024-07-24 08:56:22'),
(36, '17', '6', '12', '57', 51, 6, 'admin', 'admin', '1', NULL, '2024-07-24 09:01:36', '2024-07-24 09:01:36'),
(37, '25', '6', '9', '58', 53, 7, 'admin', 'admin', '1', NULL, '2024-07-24 09:04:27', '2024-07-24 09:04:27'),
(38, '17', '6', '10', '59', 0, 7, 'admin', 'admin', '1', NULL, '2024-07-24 09:13:59', '2024-07-24 09:13:59'),
(39, '18', '6', '3', '68', 58, 6, 'admin', 'admin', '1', NULL, '2024-07-24 09:18:09', '2024-07-24 09:18:09'),
(40, '16', '6', '51', '66', 59, 6, 'admin', 'admin', '1', NULL, '2024-07-24 09:23:59', '2024-07-24 09:23:59'),
(41, '15', '7', '11', '69', 62, 7, 'admin', 'admin', '1', NULL, '2024-07-24 12:15:41', '2024-07-24 12:15:41'),
(42, '15', '7', '64', '70', 63, 7, 'admin', 'admin', '1', NULL, '2024-07-24 13:08:25', '2024-07-24 13:08:25'),
(43, '18', '6', '6', '60', 64, 7, 'admin', 'admin', '1', NULL, '2024-07-26 05:05:22', '2024-07-26 05:05:22'),
(44, '26', '6', '13', '64', 67, 7, 'admin', 'admin', '1', NULL, '2024-07-26 05:10:29', '2024-07-26 05:10:29'),
(45, '15', '8', '11', '71', 68, 6, 'admin', 'admin', '1', NULL, '2024-07-26 05:54:09', '2024-07-26 05:54:09'),
(46, '25', '8', '5', '72', 69, 7, 'admin', 'admin', '1', NULL, '2024-07-26 05:56:31', '2024-07-26 05:56:31'),
(47, '15', '8', '64', '73', 72, 6, 'admin', 'admin', '1', NULL, '2024-07-26 05:59:01', '2024-07-26 05:59:01'),
(48, '15', '9', '11', '74', 73, 7, 'admin', 'admin', '1', NULL, '2024-07-26 06:09:17', '2024-07-26 06:09:17'),
(49, '25', '9', '5', '75', 75, 6, 'admin', 'admin', '1', NULL, '2024-07-26 06:10:41', '2024-07-26 06:10:41'),
(50, '15', '9', '64', '76', 78, 6, 'admin', 'admin', '1', NULL, '2024-07-26 06:11:43', '2024-07-26 06:11:43'),
(51, '17', '9', '12', '77', 80, 6, 'admin', 'admin', '1', NULL, '2024-07-26 06:14:26', '2024-07-26 06:14:26'),
(52, '18', '9', '9', '80', 82, 6, 'admin', 'admin', '1', NULL, '2024-07-26 09:07:43', '2024-07-26 09:07:43'),
(53, '15', '10', '11', '94', 0, 6, 'admin', 'admin', '1', NULL, '2024-07-29 12:06:42', '2024-07-29 12:06:42'),
(54, '16', '10', '11', '94', 85, 6, 'admin', 'admin', '1', NULL, '2024-07-29 12:14:09', '2024-07-29 12:14:09');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profit_center`
--

CREATE TABLE `profit_center` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location` varchar(150) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profit_center`
--

INSERT INTO `profit_center` (`id`, `location`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Mulund', NULL, '2024-06-03 10:35:42', '2024-06-03 10:35:42'),
(2, 'Aurangabad', NULL, '2024-06-03 10:35:42', '2024-06-03 10:35:42'),
(3, 'Pune', NULL, '2024-06-05 08:57:45', '2024-06-05 08:57:45');

-- --------------------------------------------------------

--
-- Table structure for table `project_types`
--

CREATE TABLE `project_types` (
  `project_type_id` int(11) NOT NULL,
  `project_type_name` varchar(150) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_types`
--

INSERT INTO `project_types` (`project_type_id`, `project_type_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Road', 1, '2024-05-03 11:32:44', '2024-05-03 11:32:44'),
(2, 'PipeLine', 1, '2024-05-03 11:33:13', '2024-05-03 11:33:13');

-- --------------------------------------------------------

--
-- Table structure for table `road_components`
--

CREATE TABLE `road_components` (
  `component_id` bigint(20) UNSIGNED NOT NULL,
  `project_type_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `component_name` varchar(60) NOT NULL,
  `component_class` varchar(60) NOT NULL,
  `component_icon_file` varchar(500) DEFAULT NULL,
  `dimentionstype` varchar(500) DEFAULT NULL,
  `created_by` varchar(100) NOT NULL DEFAULT '1',
  `updated_by` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `road_components`
--

INSERT INTO `road_components` (`component_id`, `project_type_id`, `company_id`, `component_name`, `component_class`, `component_icon_file`, `dimentionstype`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Plain Road for RP', 'plain_road', 'assets/images/08-05-2024_file-zip-icon-6846.png', '1,', '1', NULL, NULL, '2024-05-03 11:33:13', '2024-06-13 12:01:16'),
(2, 1, 1, 'Ramp', 'ramp', 'assets/images/08-05-2024_file-zip-icon-6846.png', '2,', '1', NULL, '2024-07-10 10:22:21', '2024-05-03 11:33:13', '2024-07-10 10:22:21'),
(3, 1, 1, 'Vehicular Underpass', 'underpass', 'assets/images/08-05-2024_file-zip-icon-6846.png', '2,', '1', NULL, NULL, '2024-05-03 11:33:13', '2024-07-05 06:58:58'),
(4, 1, 1, 'Grade Seperator', 'grade_separator', 'assets/images/08-05-2024_file-zip-icon-6846.png', '2,', '1', NULL, NULL, '2024-05-03 11:33:13', '2024-06-28 09:09:15'),
(5, 1, 1, 'Flyover', 'flyover', 'assets/images/08-05-2024_file-zip-icon-6846.png', '2,', '1', NULL, NULL, '2024-05-03 11:33:13', '2024-07-24 08:42:20'),
(6, 1, 1, 'Piers', 'piers', 'assets/images/08-05-2024_file-zip-icon-6846.png', '2,', '1', NULL, NULL, '2024-05-03 11:33:13', '2024-07-04 08:48:56'),
(7, 1, 1, 'Super Structure', 'super_structure', 'assets/images/08-05-2024_file-zip-icon-6846.png', '2,', '1', NULL, NULL, '2024-05-03 11:33:13', '2024-07-24 08:46:54'),
(8, 1, 1, 'Plain Road for FP', 'plain_road', 'assets/images/08-05-2024_file-zip-icon-6846.png', '2,', '1', NULL, NULL, '2024-05-03 11:33:13', '2024-07-24 08:44:20'),
(9, 1, 1, 'Major Bridge', 'flyover', 'assets/images/08-05-2024_file-zip-icon-6846.png', '2,', '1', NULL, NULL, '2024-05-03 11:33:13', '2024-07-24 08:43:08'),
(10, 1, 1, 'Minor Bridge', 'flyover', 'assets/images/08-05-2024_file-zip-icon-6846.png', '2,', '1', NULL, NULL, '2024-05-03 11:33:13', '2024-07-24 08:43:38'),
(11, 1, 1, 'Box Culvert', 'plain_road', 'assets/images/08-05-2024_file-zip-icon-6846.png', '2,', '1', NULL, NULL, '2024-05-03 11:33:13', '2024-07-24 05:31:43'),
(12, 1, 1, 'HPC', 'plain_road', 'assets/images/08-05-2024_file-zip-icon-6846.png', '2,', '1', NULL, NULL, '2024-05-03 11:33:13', '2024-05-03 11:33:13'),
(13, 1, 1, 'Slab Culvert', 'flyover', 'assets/images/08-05-2024_file-zip-icon-6846.png', '2,', '1', NULL, NULL, '2024-05-03 11:33:13', '2024-07-24 08:46:26'),
(51, 1, 1, 'Test Road Activity', '', 'assets/images/13-06-2024_Screenshot_20240610_162059_IRoad.jpg', NULL, '1', NULL, NULL, '2024-06-13 06:03:52', '2024-07-29 06:40:22'),
(64, 1, 1, 'Ramp', '', 'assets/images/10-07-2024_ramp_active.png', NULL, '1', NULL, NULL, '2024-07-10 10:27:03', '2024-07-22 05:36:00'),
(65, 2, 1, 'Flyover12', '', 'assets/images/19-07-2024_cube.jpg', NULL, '1', NULL, '2024-07-19 10:48:09', '2024-07-19 10:28:48', '2024-07-19 10:48:09'),
(67, 1, 1, 'Test Road Component', '', 'assets/images/23-07-2024_h4swtzdo2v8d1.jpeg', NULL, '1', NULL, NULL, '2024-07-23 10:46:25', '2024-07-29 06:39:02'),
(68, 2, 1, 'Flyover12', '', 'assets/images/23-07-2024_dummyPic.jpg', NULL, '1', NULL, '2024-07-24 05:45:38', '2024-07-23 11:13:39', '2024-07-24 05:45:38'),
(69, 2, 1, 'pIPELINE123', '', 'assets/images/23-07-2024_dummyPic.jpg', NULL, '1', NULL, '2024-07-24 05:45:47', '2024-07-23 11:14:32', '2024-07-24 05:45:47'),
(70, 1, 1, 'Anythinggg', '', 'assets/images/29-07-2024_cube.jpg', NULL, '1', NULL, '2024-07-29 05:16:30', '2024-07-29 05:15:54', '2024-07-29 05:16:30'),
(71, 1, 1, 'anything', '', 'assets/images/29-07-2024_cube.jpg', NULL, '1', NULL, '2024-07-29 05:23:14', '2024-07-29 05:20:13', '2024-07-29 05:23:14'),
(73, 1, 1, 'anything', '', 'assets/images/29-07-2024_cube.jpg', NULL, '1', NULL, '2024-07-29 09:03:59', '2024-07-29 09:03:13', '2024-07-29 09:03:59'),
(74, 1, 1, 'anything', '', 'assets/images/29-07-2024_cube.jpg', NULL, '1', NULL, '2024-08-25 05:43:47', '2024-07-29 09:04:53', '2024-07-29 09:04:53');

-- --------------------------------------------------------

--
-- Table structure for table `road_components_chainage`
--

CREATE TABLE `road_components_chainage` (
  `chainage_id` bigint(20) UNSIGNED NOT NULL,
  `site_id` int(11) NOT NULL,
  `component_id` int(11) NOT NULL,
  `from_length` varchar(20) DEFAULT NULL,
  `to_length` varchar(20) DEFAULT NULL,
  `chainage_foundation_height` varchar(20) DEFAULT NULL,
  `chainage_pier_height` varchar(20) DEFAULT NULL,
  `chainage_pier_cap_height` varchar(20) DEFAULT NULL,
  `chainage_max_elevation_height` varchar(20) DEFAULT NULL,
  `chainage_max_depth_at_center` varchar(20) DEFAULT NULL,
  `chainage_width` varchar(20) DEFAULT NULL,
  `chainage_thickness` varchar(20) DEFAULT NULL,
  `chainage_height` varchar(20) DEFAULT NULL,
  `from_lat` varchar(30) DEFAULT NULL,
  `from_long` varchar(30) DEFAULT NULL,
  `to_lat` varchar(30) DEFAULT NULL,
  `to_long` varchar(30) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `road_components_chainage`
--

INSERT INTO `road_components_chainage` (`chainage_id`, `site_id`, `component_id`, `from_length`, `to_length`, `chainage_foundation_height`, `chainage_pier_height`, `chainage_pier_cap_height`, `chainage_max_elevation_height`, `chainage_max_depth_at_center`, `chainage_width`, `chainage_thickness`, `chainage_height`, `from_lat`, `from_long`, `to_lat`, `to_long`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(20, 1, 11, '011', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-06-10 07:08:59', '2024-07-24 08:53:06'),
(21, 1, 11, '100', '400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-06-10 07:08:59', '2024-06-10 07:08:59'),
(22, 1, 12, '400', '500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-06-10 07:09:22', '2024-06-10 07:09:22'),
(23, 1, 12, '500', '600', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-06-10 07:09:22', '2024-06-10 07:09:22'),
(30, 1, 4, '200', '300', NULL, NULL, NULL, NULL, '44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-06-11 11:49:35', '2024-07-04 09:54:24'),
(31, 1, 4, '300', '400', NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-06-11 11:49:35', '2024-06-11 11:49:35'),
(32, 1, 6, NULL, NULL, '8', '2', '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-06-11 11:49:35', '2024-06-12 08:54:06'),
(33, 1, 6, NULL, NULL, '6', '888', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-06-11 11:49:35', '2024-06-12 07:30:02'),
(45, 1, 51, '11', '3333', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-06-17 06:57:04', '2024-07-04 10:17:36'),
(46, 1, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-07-04 09:41:28', '2024-07-04 09:27:32', '2024-07-04 09:41:28'),
(47, 1, 3, '30', '60', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '18', NULL, NULL, NULL, NULL, 1, NULL, '2024-07-04 09:49:43', '2024-07-04 10:17:09'),
(49, 6, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-07-24 06:10:39', '2024-07-24 06:08:53', '2024-07-24 06:10:39'),
(50, 6, 11, '0', '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-07-24 06:10:34', '2024-07-24 06:09:35', '2024-07-24 06:10:34'),
(51, 6, 11, '600', '700', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-07-24 06:10:10', '2024-07-24 06:09:35', '2024-07-24 06:10:10'),
(52, 6, 11, '01', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-07-24 06:15:19', '2024-07-26 05:07:32'),
(53, 6, 11, '620', '700', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-07-24 06:16:18', '2024-07-24 06:15:19', '2024-07-24 06:16:18'),
(54, 6, 11, '700', '800', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-07-24 07:18:04', '2024-07-24 06:17:24', '2024-07-24 07:18:04'),
(55, 6, 5, '400', '450', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-07-24 06:19:07', '2024-07-24 06:53:33'),
(56, 6, 4, '50', '150', NULL, NULL, NULL, NULL, '50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-07-24 06:24:38', '2024-07-24 06:54:11'),
(57, 6, 12, '100', '250', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-07-24 06:28:51', '2024-07-24 06:55:12'),
(58, 6, 9, '300', '400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-07-24 06:30:42', '2024-07-24 06:56:08'),
(59, 6, 10, '300', '400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-07-24 06:32:17', '2024-07-24 06:56:46'),
(60, 6, 6, NULL, NULL, '2', '20', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-07-24 06:35:00', '2024-07-24 06:58:02'),
(61, 6, 8, '500', '600', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-07-24 06:37:11', '2024-07-24 06:59:07'),
(62, 6, 1, '330', '350', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-07-24 06:39:19', '2024-07-24 06:59:47'),
(63, 6, 64, '220', '420', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-07-24 06:40:24', '2024-07-24 07:00:30'),
(64, 6, 13, '0', '600', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-07-24 06:41:24', '2024-07-24 07:01:15'),
(65, 6, 7, '301', '400', NULL, NULL, NULL, NULL, NULL, '10', '5', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-07-24 06:43:20', '2024-07-24 07:02:45'),
(66, 6, 51, '100', '200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-07-24 06:45:17', '2024-07-24 07:04:17'),
(67, 6, 67, '144', '244', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-07-24 06:47:55', '2024-07-24 07:05:32'),
(68, 6, 3, '400', '500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL, 1, NULL, '2024-07-24 06:49:31', '2024-07-24 07:06:58'),
(69, 7, 11, '0', '462', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-07-24 12:14:40', '2024-07-26 10:04:04'),
(70, 7, 64, '5', '90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-07-24 13:07:42', '2024-07-24 13:07:42'),
(71, 8, 11, '0', '200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-07-26 05:53:01', '2024-07-26 05:53:01'),
(72, 8, 5, '200', '300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-07-26 05:55:13', '2024-07-26 05:55:13'),
(73, 8, 64, '500', '600', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-07-26 05:58:04', '2024-07-26 05:58:04'),
(74, 9, 11, '0', '200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-07-26 06:07:30', '2024-07-26 06:07:30'),
(75, 9, 5, '200', '300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-07-26 06:07:42', '2024-07-26 06:07:42'),
(76, 9, 64, '500', '600', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-07-26 06:07:59', '2024-07-26 06:07:59'),
(77, 9, 12, '100', '300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-07-26 06:13:35', '2024-07-26 06:13:35'),
(78, 9, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-07-26 09:01:21', '2024-07-26 09:01:03', '2024-07-26 09:01:21'),
(79, 9, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-07-26 09:04:54', '2024-07-26 09:03:04', '2024-07-26 09:04:54'),
(80, 9, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-07-26 09:16:58', '2024-07-26 09:05:05', '2024-07-26 09:16:58'),
(82, 9, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-07-26 09:16:46', '2024-07-26 09:16:33', '2024-07-26 09:16:46'),
(83, 9, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-07-26 09:16:52', '2024-07-26 09:16:33', '2024-07-26 09:16:52'),
(84, 9, 11, '90', '170', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-07-26 09:18:53', '2024-07-26 09:18:53'),
(85, 9, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-07-26 09:33:22', '2024-07-26 09:33:13', '2024-07-26 09:33:22'),
(86, 9, 11, '80', '190', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-07-26 09:44:35', '2024-07-26 09:44:35'),
(87, 9, 4, '100', '170', NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-07-26 09:46:15', '2024-07-26 09:46:15'),
(88, 9, 11, '2', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-07-26 10:42:23', '2024-07-26 10:42:23'),
(89, 9, 11, '11', '23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-07-26 10:56:49', '2024-07-26 10:56:49'),
(90, 9, 5, '2', '33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-07-26 10:57:00', '2024-07-26 10:57:00'),
(91, 9, 5, '22', '333', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-07-26 10:57:50', '2024-07-26 10:57:50'),
(92, 9, 5, '7', '90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-07-26 11:29:57', '2024-07-26 11:29:57'),
(93, 9, 5, '70', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-07-26 11:30:30', '2024-07-26 11:30:30'),
(94, 10, 11, '10', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-07-29 04:48:41', '2024-07-29 04:48:41'),
(95, 1, 71, '0', '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-07-29 06:25:24', '2024-07-29 05:21:03', '2024-07-29 06:25:24'),
(96, 10, 74, '0', '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-07-29 09:05:19', '2024-07-29 09:05:19'),
(97, 10, 11, '0', '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-07-29 12:33:13', '2024-07-29 12:33:13'),
(98, 8, 3, '20', '202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '10', NULL, NULL, NULL, NULL, 1, NULL, '2024-07-29 12:38:27', '2024-07-29 12:40:55');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(20) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `is_active` varchar(255) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `created_by`, `updated_by`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '1', '', '1', NULL, '2024-05-30 08:30:40', '2024-05-30 08:30:40'),
(2, 'Vendors', 'admin', 'admin', '1', NULL, '2024-05-30 08:30:40', '2024-05-30 12:14:24'),
(3, 'Incharge', '1', '', '1', NULL, '2024-05-30 08:30:40', '2024-05-30 08:30:40'),
(4, 'Planning & Billing', '1', '', '1', NULL, '2024-05-30 08:30:40', '2024-05-30 08:30:40'),
(5, 'Highway', '1', '', '1', NULL, '2024-05-30 08:30:40', '2024-05-30 08:30:40'),
(6, 'Structure', '1', '', '1', NULL, '2024-05-30 08:30:40', '2024-05-30 08:30:40'),
(7, 'Store', '1', '', '1', NULL, '2024-05-30 08:30:40', '2024-05-30 08:30:40'),
(8, 'Purchase', '1', '', '1', NULL, '2024-05-30 08:30:40', '2024-05-30 08:30:40'),
(9, 'Quality Control', '1', '', '1', NULL, '2024-05-30 08:30:40', '2024-05-30 08:30:40'),
(10, 'Accounts', 'admin', 'admin', '1', '2024-07-23 07:02:45', '2024-05-30 08:30:40', '2024-07-23 07:02:45'),
(11, 'HR', 'admin', 'admin', '1', NULL, '2024-05-30 08:30:40', '2024-07-22 07:13:33'),
(12, 'P & M', '1', '', '1', NULL, '2024-05-30 08:30:40', '2024-05-30 08:30:40'),
(13, 'Ravan', 'admin', 'admin', '1', NULL, '2024-05-30 08:30:40', '2024-05-30 08:30:40'),
(14, 'Super Ravan', 'admin', 'admin', '0', '2024-07-23 07:19:34', '2024-05-30 08:30:40', '2024-07-23 07:19:34'),
(15, 'rerwrew', 'admin', 'admin', '0', '2024-07-10 10:55:51', '2024-07-10 10:55:45', '2024-07-10 10:55:51'),
(16, 'testst', 'admin', 'admin', '1', '2024-07-10 10:57:34', '2024-07-10 10:56:26', '2024-07-10 10:57:34'),
(17, 'stst', 'admin', 'admin', '1', '2024-07-10 10:57:39', '2024-07-10 10:56:26', '2024-07-10 10:57:39'),
(18, 'Any', 'admin', 'admin', '1', '2024-07-22 07:04:21', '2024-07-22 06:28:45', '2024-07-22 07:04:21'),
(19, 'ABCDE', 'admin', 'admin', '1', '2024-07-22 07:01:16', '2024-07-22 07:00:34', '2024-07-22 07:01:16'),
(20, 'Any', 'admin', 'admin', '0', '2024-07-23 07:18:02', '2024-07-22 07:10:23', '2024-07-23 07:18:02'),
(21, 'Salary Accounts', 'admin', 'admin', '1', NULL, '2024-07-23 07:29:25', '2024-07-23 07:29:25'),
(22, 'QA TEAM', 'admin', 'admin', '1', NULL, '2024-07-23 09:47:32', '2024-07-23 09:48:37'),
(23, 'vaishnavi', 'admin', 'admin', '1', '2024-07-29 12:47:00', '2024-07-29 12:46:46', '2024-07-29 12:47:00'),
(24, 'abc', 'admin', 'admin', '1', '2024-07-29 12:47:04', '2024-07-29 12:46:46', '2024-07-29 12:47:04'),
(25, 'pqr', 'admin', 'admin', '1', '2024-07-29 12:47:08', '2024-07-29 12:46:46', '2024-07-29 12:47:08'),
(26, 'qwerty', 'admin', 'admin', '1', '2024-07-29 12:47:11', '2024-07-29 12:46:46', '2024-07-29 12:47:11'),
(27, 'asd', 'admin', 'admin', '1', '2024-07-29 12:47:20', '2024-07-29 12:46:46', '2024-07-29 12:47:20'),
(28, 'pot', 'admin', 'admin', '0', '2024-07-29 12:59:10', '2024-07-29 12:57:55', '2024-07-29 12:59:10');

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `site_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `site_name` varchar(60) NOT NULL,
  `road_name` varchar(100) NOT NULL,
  `road_length` varchar(30) NOT NULL DEFAULT '0',
  `no_of_junction` int(11) NOT NULL DEFAULT 0,
  `tender_budget` varchar(20) NOT NULL,
  `project_start_date` date DEFAULT NULL,
  `project_end_date` date DEFAULT NULL,
  `design_chainage` varchar(20) DEFAULT NULL,
  `actual_start_date` date DEFAULT NULL,
  `actual_end_date` date DEFAULT NULL,
  `has_started` tinyint(4) NOT NULL DEFAULT 0,
  `is_divided` tinyint(4) NOT NULL DEFAULT 0,
  `has_lhs_started` tinyint(4) NOT NULL DEFAULT 0,
  `lhs_starting_date` date DEFAULT NULL,
  `has_rhs_started` tinyint(4) NOT NULL DEFAULT 0,
  `rhs_starting_date` date DEFAULT NULL,
  `is_further_devided` tinyint(4) NOT NULL DEFAULT 0,
  `has_further_division_started` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`site_id`, `company_id`, `site_name`, `road_name`, `road_length`, `no_of_junction`, `tender_budget`, `project_start_date`, `project_end_date`, `design_chainage`, `actual_start_date`, `actual_end_date`, `has_started`, `is_divided`, `has_lhs_started`, `lhs_starting_date`, `has_rhs_started`, `rhs_starting_date`, `is_further_devided`, `has_further_division_started`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Karve Test Site', 'Pune', '316.38901333161976', 0, '10000000', '2023-02-01', '2023-02-05', '111abcd', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 0, 0, 0, NULL, '2023-02-01 04:06:13', '2023-02-01 04:06:13'),
(2, 1, 'Karve Test Site1', 'Pune, Maharashtra, India', '271.98649518997183', 11, '20000000', '2023-01-31', '2023-02-09', 'Chainage 1', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 0, 0, 0, NULL, '2023-02-01 06:42:49', '2023-12-21 07:32:00'),
(4, 1, 'Warje Bridge-Aambedakr Chowk', 'NDA Road, Shivane, Pune, Maharashtra, IndiaNDA Road, Shivane, Pune, Maharashtra, India', '172.07708680070834', 2, '800000', '2024-06-07', '2024-06-30', '', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 0, 0, 0, NULL, '2024-06-07 11:42:01', '2024-06-07 11:42:01'),
(5, 1, 'Erandwane (Karve Road)', 'Erandwane, Pune, Maharashtra, India', '1330.3868911217794', 7, '20000000000', '2024-07-02', '2025-12-26', '', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 0, 0, 0, NULL, '2024-07-10 11:26:39', '2024-07-10 11:26:39'),
(6, 1, 'Narhe site', 'Narhe, Pune, Maharashtra, India', '626.1774837407659', 10, '9000000', '2024-07-24', '2024-07-30', '10', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 0, 0, 0, NULL, '2024-07-24 06:04:35', '2024-07-24 06:04:35'),
(7, 1, 'Testing Site', 'Apte Road, Shivajinagar, Pune, Maharashtra, India', '462.8164032183935', 2, '9000000000', '2024-07-24', '2024-08-02', '2', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 0, 0, 0, NULL, '2024-07-24 12:14:18', '2024-07-24 12:14:18'),
(8, 1, 'Bavdhan site', 'Bavdhan, Pune, Maharashtra, India', '1402.5778442907003', -1, '10000', '2024-07-19', '2024-07-27', '', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 0, 0, 0, NULL, '2024-07-26 05:51:58', '2024-07-26 05:51:58'),
(9, 1, 'Bavdhan site 2', 'Bavdhan Road, Patil Nagar, Bavdhan, Pune, Maharashtra, India', '258.47460671434953', 2, '20000', '2024-07-26', '2024-07-30', '', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 0, 0, 0, NULL, '2024-07-26 06:06:43', '2024-07-26 06:06:43'),
(10, 1, 'Narhe site 2', 'Narhe Gaon Road, Narhe, Pune, Maharashtra, India', '438.5775505661573', -2, '100000', '2024-07-17', '2024-07-30', '2', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 0, 0, 0, NULL, '2024-07-29 04:45:08', '2024-07-29 04:45:08');

-- --------------------------------------------------------

--
-- Table structure for table `site_plan_activities`
--

CREATE TABLE `site_plan_activities` (
  `site_plan_activity_id` bigint(20) UNSIGNED NOT NULL,
  `site_id` varchar(255) DEFAULT NULL,
  `chainage_id` varchar(255) DEFAULT NULL,
  `component_id` varchar(255) DEFAULT NULL,
  `activity_id` varchar(255) DEFAULT NULL,
  `numbers_of_days` varchar(255) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_plan_activities`
--

INSERT INTO `site_plan_activities` (`site_plan_activity_id`, `site_id`, `chainage_id`, `component_id`, `activity_id`, `numbers_of_days`, `created_by`, `updated_by`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(7, '1', '20', '11', '18', '150', NULL, NULL, NULL, NULL, '2024-07-16 09:04:03', '2024-07-16 09:04:03'),
(8, '1', '20', '11', '17', '160', NULL, NULL, NULL, NULL, '2024-07-16 09:04:03', '2024-07-16 09:04:03'),
(9, '1', '20', '11', '15', '120', NULL, NULL, NULL, NULL, '2024-07-16 09:04:03', '2024-07-16 09:04:03'),
(10, '1', '20', '11', '16', '130', NULL, NULL, NULL, NULL, '2024-07-16 09:04:03', '2024-07-16 09:04:03'),
(11, '6', '52', '11', '15', '122', NULL, NULL, NULL, NULL, '2024-07-24 12:10:51', '2024-07-24 12:10:51'),
(12, '6', '52', '11', '17', '160', NULL, NULL, NULL, NULL, '2024-07-24 12:10:51', '2024-07-24 12:10:51'),
(13, '6', '52', '11', '16', '130', NULL, NULL, NULL, NULL, '2024-07-24 12:10:51', '2024-07-24 12:10:51'),
(14, '6', '52', '11', '25', '60', NULL, NULL, NULL, NULL, '2024-07-24 12:10:51', '2024-07-24 12:10:51'),
(15, '6', '52', '11', '26', '44', NULL, NULL, NULL, NULL, '2024-07-24 12:10:51', '2024-07-24 12:10:51'),
(16, '6', '52', '11', '18', '150', NULL, NULL, NULL, NULL, '2024-07-24 12:10:51', '2024-07-24 12:10:51'),
(21, '7', '69', '11', '15', '7', NULL, NULL, NULL, NULL, '2024-07-24 13:30:30', '2024-07-24 13:30:30'),
(22, '7', '70', '11', '15', '44', NULL, NULL, NULL, NULL, '2024-07-24 13:30:31', '2024-07-24 13:30:31'),
(23, '8', '71', '11', '15', '10', NULL, NULL, NULL, NULL, '2024-07-26 06:05:13', '2024-07-26 06:05:13'),
(24, '8', '72', '11', '25', '11', NULL, NULL, NULL, NULL, '2024-07-26 06:05:13', '2024-07-26 06:05:13'),
(25, '8', '73', '11', '15', '12', NULL, NULL, NULL, NULL, '2024-07-26 06:05:13', '2024-07-26 06:05:13'),
(26, '9', '74', '11', '15', '66', NULL, NULL, NULL, NULL, '2024-07-26 06:12:07', '2024-07-26 12:14:46'),
(27, '9', '75', '11', '25', '22', NULL, NULL, NULL, NULL, '2024-07-26 06:12:07', '2024-07-26 06:15:14'),
(28, '9', '76', '11', '15', '23', NULL, NULL, NULL, NULL, '2024-07-26 06:12:07', '2024-07-26 06:15:14'),
(29, '9', '77', '11', '17', '21', NULL, NULL, NULL, NULL, '2024-07-26 06:14:54', '2024-07-26 06:15:14'),
(30, '9', '80', '11', '18', '33', NULL, NULL, NULL, NULL, '2024-07-26 12:04:04', '2024-07-26 12:04:04');

-- --------------------------------------------------------

--
-- Table structure for table `site_plan_assets`
--

CREATE TABLE `site_plan_assets` (
  `site_plan_vehical_type_id` bigint(20) UNSIGNED NOT NULL,
  `site_id` varchar(255) DEFAULT NULL,
  `vehicle_type_id` varchar(255) DEFAULT NULL,
  `vehical_quantity` varchar(255) DEFAULT NULL,
  `time_hours` varchar(255) DEFAULT NULL,
  `cost_per_hour` varchar(255) DEFAULT NULL,
  `estimated_total` varchar(255) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_plan_assets`
--

INSERT INTO `site_plan_assets` (`site_plan_vehical_type_id`, `site_id`, `vehicle_type_id`, `vehical_quantity`, `time_hours`, `cost_per_hour`, `estimated_total`, `created_by`, `updated_by`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(4, '1', '44', '5', '500', '5003', '12507500', 'admin', 'admin', '1', NULL, '2024-06-18 07:26:54', '2024-06-18 07:33:00'),
(5, '1', '41', '55', '5077', '509', '142130615', 'admin', 'admin', '1', NULL, '2024-06-18 07:26:54', '2024-06-18 07:33:08'),
(6, '6', '4', '10', '12', '200', '24000', 'admin', 'admin', '1', NULL, '2024-07-24 09:29:23', '2024-07-24 09:29:23'),
(7, '6', '5', '2', '5', '500', '5000', 'admin', 'admin', '1', NULL, '2024-07-24 09:29:23', '2024-07-24 09:29:23'),
(8, '9', '1', '7', '80', '80', '44800', 'admin', 'admin', '1', NULL, '2024-07-26 06:48:23', '2024-07-26 06:48:23'),
(9, '9', '3', '1', '4', '55', '220', 'admin', 'admin', '1', NULL, '2024-07-26 12:15:24', '2024-07-26 12:15:24');

-- --------------------------------------------------------

--
-- Table structure for table `site_plan_departments`
--

CREATE TABLE `site_plan_departments` (
  `site_plan_department_id` bigint(20) UNSIGNED NOT NULL,
  `site_id` varchar(255) DEFAULT NULL,
  `department_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_plan_departments`
--

INSERT INTO `site_plan_departments` (`site_plan_department_id`, `site_id`, `department_id`, `user_id`, `created_by`, `updated_by`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(5, '6', '3', NULL, 'admin', 'admin', '1', NULL, '2024-07-24 12:15:51', '2024-07-24 12:15:51'),
(6, '10', '6', NULL, 'admin', 'admin', '1', NULL, '2024-07-29 07:12:58', '2024-07-29 07:15:30'),
(9, '8', '6', '2', 'admin', 'admin', '1', NULL, '2024-07-29 10:00:55', '2024-07-29 10:00:55'),
(10, '8', '8', '20', 'admin', 'admin', '1', NULL, '2024-07-29 10:00:55', '2024-07-29 10:00:55');

-- --------------------------------------------------------

--
-- Table structure for table `site_plan_labours`
--

CREATE TABLE `site_plan_labours` (
  `site_plan_labour_id` bigint(20) UNSIGNED NOT NULL,
  `site_id` varchar(255) DEFAULT NULL,
  `labour_id` varchar(255) DEFAULT NULL,
  `no_of_worker` varchar(255) DEFAULT NULL,
  `no_of_work_days` varchar(255) DEFAULT NULL,
  `cost_per_day` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_plan_labours`
--

INSERT INTO `site_plan_labours` (`site_plan_labour_id`, `site_id`, `labour_id`, `no_of_worker`, `no_of_work_days`, `cost_per_day`, `total`, `created_by`, `updated_by`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(23, '1', '1', '8', '80', '800', '512000', 'admin', 'admin', '1', NULL, '2024-07-16 09:04:52', '2024-07-16 09:04:52'),
(24, '1', '2', '10', '60', '900', '540000', 'admin', 'admin', '1', NULL, '2024-07-16 09:04:52', '2024-07-16 09:04:52'),
(25, '1', '3', '76', '567', '900', '38782800', 'admin', 'admin', '1', NULL, '2024-07-24 05:15:37', '2024-07-24 05:15:37'),
(26, '6', '1', '10', '5', '500', '25000', 'admin', 'admin', '1', NULL, '2024-07-24 09:25:54', '2024-07-24 09:25:54'),
(27, '6', '2', '20', '7', '500', '70000', 'admin', 'admin', '1', NULL, '2024-07-24 09:25:54', '2024-07-24 09:25:54'),
(28, '6', '3', '15', '10', '300', '45000', 'admin', 'admin', '1', NULL, '2024-07-24 09:26:25', '2024-07-24 09:26:25'),
(29, '9', '1', '2', '7', '20', '280', 'admin', 'admin', '1', NULL, '2024-07-26 06:42:19', '2024-07-26 06:42:19'),
(30, '9', '2', '33', '4', '42', '5544', 'admin', 'admin', '1', NULL, '2024-07-26 11:55:52', '2024-07-26 11:55:52');

-- --------------------------------------------------------

--
-- Table structure for table `site_plan_machines`
--

CREATE TABLE `site_plan_machines` (
  `site_plan_machine_id` bigint(20) UNSIGNED NOT NULL,
  `site_id` varchar(255) DEFAULT NULL,
  `machine_type_id` varchar(255) DEFAULT NULL,
  `machine_id` varchar(255) DEFAULT NULL,
  `no_of_machines` varchar(255) DEFAULT NULL,
  `no_of_hours` varchar(255) DEFAULT NULL,
  `machine_cost_pr_hrs` varchar(255) DEFAULT NULL,
  `estimated_total` varchar(255) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site_plan_materials`
--

CREATE TABLE `site_plan_materials` (
  `site_plan_material_id` bigint(20) UNSIGNED NOT NULL,
  `site_id` varchar(255) DEFAULT NULL,
  `material_type_id` varchar(255) DEFAULT NULL,
  `material_id` varchar(255) DEFAULT NULL,
  `material_unit_id` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `rate` varchar(255) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_plan_materials`
--

INSERT INTO `site_plan_materials` (`site_plan_material_id`, `site_id`, `material_type_id`, `material_id`, `material_unit_id`, `quantity`, `rate`, `created_by`, `updated_by`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(13, '1', '7', '5', '3', '80', '900', 'admin', 'admin', '1', NULL, '2024-07-16 09:06:20', '2024-07-16 09:06:20'),
(14, '1', '7', '8', '3', '300', '100', 'admin', 'admin', '1', NULL, '2024-07-16 09:06:20', '2024-07-16 09:06:20'),
(15, '1', '13', '33', '3', '600', '200', 'admin', 'admin', '1', NULL, '2024-07-16 09:06:20', '2024-07-16 09:06:20'),
(16, '6', '13', '33', '3', '20', '2000', 'admin', 'admin', '1', NULL, '2024-07-24 09:27:43', '2024-07-24 09:27:43'),
(17, '6', '7', '8', '3', '100', '5000', 'admin', 'admin', '1', NULL, '2024-07-24 09:28:03', '2024-07-24 09:28:03'),
(18, '9', '7', '8', '3', '2', '200', 'admin', 'admin', '1', NULL, '2024-07-26 06:42:39', '2024-07-26 06:42:39'),
(19, '9', '7', '9', '3', '1', '100', 'admin', 'admin', '1', '2024-07-26 12:00:23', '2024-07-26 06:56:40', '2024-07-26 12:00:23');

-- --------------------------------------------------------

--
-- Table structure for table `site_weekly_plans`
--

CREATE TABLE `site_weekly_plans` (
  `site_weekly_plan_id` bigint(20) UNSIGNED NOT NULL,
  `site_id` varchar(255) DEFAULT NULL,
  `component_id` varchar(255) DEFAULT NULL,
  `chainage_id` varchar(255) DEFAULT NULL,
  `chainage_from_length` varchar(20) DEFAULT NULL,
  `chainage_to_length` varchar(20) DEFAULT NULL,
  `chainage_height` varchar(20) DEFAULT NULL,
  `chainage_max_elevation_height` varchar(20) DEFAULT NULL,
  `chainage_max_depth_at_center` varchar(20) DEFAULT NULL,
  `chainage_foundation_height` varchar(20) DEFAULT NULL,
  `chainage_pier_height` varchar(20) DEFAULT NULL,
  `chainage_pier_cap_height` varchar(20) DEFAULT NULL,
  `chainage_width` varchar(20) DEFAULT NULL,
  `chainage_thickness` varchar(20) DEFAULT NULL,
  `plan_start_date` date DEFAULT NULL,
  `plan_end_date` date DEFAULT NULL,
  `monitor_activity_id` varchar(255) DEFAULT NULL,
  `plain_or_lhs_rhs` tinyint(4) DEFAULT NULL COMMENT '1:plan road|2:lhs road or rhs road',
  `lhs_rhs_both` tinyint(4) DEFAULT NULL COMMENT '1:lhs road|2:rhs road|3:both(lhs and rhs)',
  `lhs_start_date` date DEFAULT NULL,
  `lhs_end_date` date DEFAULT NULL,
  `rhs_start_date` date DEFAULT NULL,
  `rhs_end_date` date DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_weekly_plans`
--

INSERT INTO `site_weekly_plans` (`site_weekly_plan_id`, `site_id`, `component_id`, `chainage_id`, `chainage_from_length`, `chainage_to_length`, `chainage_height`, `chainage_max_elevation_height`, `chainage_max_depth_at_center`, `chainage_foundation_height`, `chainage_pier_height`, `chainage_pier_cap_height`, `chainage_width`, `chainage_thickness`, `plan_start_date`, `plan_end_date`, `monitor_activity_id`, `plain_or_lhs_rhs`, `lhs_rhs_both`, `lhs_start_date`, `lhs_end_date`, `rhs_start_date`, `rhs_end_date`, `created_by`, `updated_by`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1', '11', '20', '0', '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-10', '2024-07-13', '15', 1, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-10 07:08:55', '2024-07-10 07:08:55'),
(3, '1', '11', '20', '1', '33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-11', '2024-07-14', '15', 2, 3, '2024-07-11', '2024-07-16', '2024-07-12', '2024-07-15', 'admin', 'admin', '1', NULL, '2024-07-11 10:08:35', '2024-07-11 10:08:35'),
(4, '1', '4', '30', '200', '210', NULL, NULL, '11', NULL, NULL, NULL, NULL, NULL, '2024-07-22', '2024-07-26', '17', 1, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-11 11:27:29', '2024-07-11 11:27:29'),
(5, '1', '4', '30', '210', '240', NULL, NULL, '12', NULL, NULL, NULL, NULL, NULL, '2024-07-29', '2024-07-31', '17', 2, 3, '2024-08-01', '2024-08-07', '2024-07-29', '2024-07-31', 'admin', 'admin', '1', NULL, '2024-07-11 11:57:03', '2024-07-11 11:57:03'),
(6, '1', '6', '32', NULL, NULL, NULL, NULL, NULL, '1', '1', '2', NULL, NULL, '2024-07-15', '2024-07-19', '18', 1, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-11 12:27:58', '2024-07-11 12:27:58'),
(7, '1', '3', '47', '44', '45', '11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-12', '2024-07-15', '18', 1, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-12 06:55:57', '2024-07-12 06:55:57'),
(8, '1', '3', '47', '31', '40', '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-12', '2024-07-15', '18', 2, 3, '2024-07-15', '2024-07-16', '2024-07-12', '2024-07-18', 'admin', 'admin', '1', NULL, '2024-07-12 07:07:53', '2024-07-12 07:07:53'),
(9, '1', '51', '45', '11', '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-12', '2024-07-15', '15', 1, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-12 07:22:11', '2024-07-12 07:22:11'),
(10, '6', '11', '52', '20', '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-24', '2024-07-31', '15', 1, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-24 10:14:23', '2024-07-24 10:14:23'),
(11, '6', '11', '52', '20', '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-24', '2024-07-31', '15', 1, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-24 10:14:30', '2024-07-24 10:14:30'),
(12, '6', '11', '52', '20', '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-24', '2024-07-31', '15', 1, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-24 10:14:48', '2024-07-24 10:14:48'),
(13, '6', '11', '52', '20', '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-24', '2024-07-31', '15', 1, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-24 10:14:48', '2024-07-24 10:14:48'),
(23, '9', '11', '74', '0', '200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26', '2024-07-31', '15', 1, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-26 06:20:35', '2024-07-26 06:20:35'),
(24, '9', '11', '74', '0', '190', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26', '2024-07-30', '15', 2, 1, '2024-07-27', '2024-07-30', NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-26 06:25:45', '2024-07-26 06:25:45'),
(25, '9', '11', '74', '0', '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-27', '2024-07-30', '15', 2, 2, NULL, NULL, '2024-07-26', '2024-07-30', 'admin', 'admin', '1', NULL, '2024-07-26 06:28:42', '2024-07-26 06:28:42'),
(26, '9', '11', '74', '0', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-31', '2024-07-26', '15', 2, 3, '2024-07-26', '2024-07-31', '2024-07-27', '2024-07-30', 'admin', 'admin', '1', NULL, '2024-07-26 06:34:09', '2024-07-26 06:34:09'),
(27, '9', '5', '75', '220', '290', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26', '2024-07-27', '25', 1, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-26 06:40:48', '2024-07-26 06:40:48');

-- --------------------------------------------------------

--
-- Table structure for table `site_weekly_plan_extra_fields`
--

CREATE TABLE `site_weekly_plan_extra_fields` (
  `site_weekly_plan_extra_field_id` bigint(20) UNSIGNED NOT NULL,
  `site_weekly_plan_id` varchar(255) DEFAULT NULL,
  `site_id` varchar(255) DEFAULT NULL,
  `component_id` varchar(255) DEFAULT NULL,
  `chainage_id` varchar(255) DEFAULT NULL,
  `component_extra_field_id` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_weekly_plan_extra_fields`
--

INSERT INTO `site_weekly_plan_extra_fields` (`site_weekly_plan_extra_field_id`, `site_weekly_plan_id`, `site_id`, `component_id`, `chainage_id`, `component_extra_field_id`, `quantity`, `created_by`, `updated_by`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(7, '9', '1', '51', '45', '5', '22', 'admin', 'admin', '1', NULL, '2024-07-12 07:22:11', '2024-07-12 07:22:11'),
(8, '9', '1', '51', '45', '6', '11', 'admin', 'admin', '1', NULL, '2024-07-12 07:22:11', '2024-07-12 07:22:11');

-- --------------------------------------------------------

--
-- Table structure for table `site_weekly_plan_labours`
--

CREATE TABLE `site_weekly_plan_labours` (
  `site_weekly_plan_labour_id` bigint(20) UNSIGNED NOT NULL,
  `site_weekly_plan_id` varchar(255) DEFAULT NULL,
  `site_id` varchar(255) DEFAULT NULL,
  `component_id` varchar(255) DEFAULT NULL,
  `chainage_id` varchar(255) DEFAULT NULL,
  `labour_id` varchar(255) DEFAULT NULL,
  `labour_quantity` varchar(255) DEFAULT NULL,
  `plain_or_lhs_rhs` tinyint(4) DEFAULT NULL COMMENT '1:plan road|2:lhs road or rhs road',
  `lhs_rhs_both` tinyint(4) DEFAULT NULL COMMENT '1:lhs road|2:rhs road|3:both(lhs and rhs)',
  `lhs_or_rhs_labour` tinyint(1) DEFAULT NULL,
  `lhs_start_date` date DEFAULT NULL,
  `lhs_end_date` date DEFAULT NULL,
  `rhs_start_date` date DEFAULT NULL,
  `rhs_end_date` date DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_weekly_plan_labours`
--

INSERT INTO `site_weekly_plan_labours` (`site_weekly_plan_labour_id`, `site_weekly_plan_id`, `site_id`, `component_id`, `chainage_id`, `labour_id`, `labour_quantity`, `plain_or_lhs_rhs`, `lhs_rhs_both`, `lhs_or_rhs_labour`, `lhs_start_date`, `lhs_end_date`, `rhs_start_date`, `rhs_end_date`, `created_by`, `updated_by`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '11', '20', '1', '5', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-10 07:08:55', '2024-07-10 07:08:55'),
(6, '3', '1', '11', '20', '2', '7', 2, 3, 1, '2024-07-11', '2024-07-11', '2024-07-12', '2024-07-15', 'admin', 'admin', '1', NULL, '2024-07-11 10:08:35', '2024-07-11 10:08:35'),
(7, '3', '1', '11', '20', '1', '17', 2, 3, 1, '2024-07-11', '2024-07-11', '2024-07-12', '2024-07-15', 'admin', 'admin', '1', NULL, '2024-07-11 10:08:35', '2024-07-11 10:08:35'),
(8, '3', '1', '11', '20', '4', '2', 2, 3, 2, '2024-07-11', '2024-07-11', '2024-07-12', '2024-07-15', 'admin', 'admin', '1', NULL, '2024-07-11 10:08:35', '2024-07-11 10:08:35'),
(9, '3', '1', '11', '20', '5', '12', 2, 3, 2, '2024-07-11', '2024-07-11', '2024-07-12', '2024-07-15', 'admin', 'admin', '1', NULL, '2024-07-11 10:08:35', '2024-07-11 10:08:35'),
(10, '4', '1', '4', '30', '2', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-11 11:27:29', '2024-07-11 11:27:29'),
(11, '4', '1', '4', '30', '1', '14', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-11 11:27:29', '2024-07-11 11:27:29'),
(12, '5', '1', '4', '30', '3', '8', 2, 3, 1, '2024-08-01', '2024-08-01', '2024-07-29', '2024-07-31', 'admin', 'admin', '1', NULL, '2024-07-11 11:57:03', '2024-07-11 11:57:03'),
(13, '5', '1', '4', '30', '4', '8', 2, 3, 2, '2024-08-01', '2024-08-01', '2024-07-29', '2024-07-31', 'admin', 'admin', '1', NULL, '2024-07-11 11:57:03', '2024-07-11 11:57:03'),
(14, '6', '1', '6', '32', '5', '77', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-11 12:27:58', '2024-07-11 12:27:58'),
(15, '6', '1', '6', '32', '3', '7', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-11 12:27:58', '2024-07-11 12:27:58'),
(16, '7', '1', '3', '47', '1', '8', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-12 06:55:57', '2024-07-12 06:55:57'),
(17, '8', '1', '3', '47', '2', '35', 2, 3, 1, '2024-07-15', '2024-07-16', '2024-07-12', '2024-07-18', 'admin', 'admin', '1', NULL, '2024-07-12 07:07:53', '2024-07-12 07:07:53'),
(18, '8', '1', '3', '47', '2', '11', 2, 3, 2, '2024-07-15', '2024-07-16', '2024-07-12', '2024-07-18', 'admin', 'admin', '1', NULL, '2024-07-12 07:07:53', '2024-07-12 07:07:53'),
(19, '8', '1', '3', '47', '4', '55', 2, 3, 2, '2024-07-15', '2024-07-16', '2024-07-12', '2024-07-18', 'admin', 'admin', '1', NULL, '2024-07-12 07:07:53', '2024-07-12 07:07:53'),
(20, '9', '1', '51', '45', '4', '22', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-12 07:22:11', '2024-07-12 07:22:11'),
(21, '9', '1', '51', '45', '1', '54', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-12 07:22:11', '2024-07-12 07:22:11'),
(26, '23', '9', '11', '74', '1', '9', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-26 06:20:35', '2024-07-26 06:20:35'),
(27, '24', '9', '11', '74', '1', '4', 2, 1, 1, '2024-07-27', '2024-07-30', NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-26 06:25:45', '2024-07-26 06:25:45'),
(28, '25', '9', '11', '74', '2', '30', 2, 2, 2, NULL, NULL, '2024-07-26', '2024-07-30', 'admin', 'admin', '1', NULL, '2024-07-26 06:28:42', '2024-07-26 06:28:42'),
(29, '26', '9', '11', '74', '3', '4', 2, 3, 1, '2024-07-26', '2024-07-31', '2024-07-27', '2024-07-30', 'admin', 'admin', '1', NULL, '2024-07-26 06:34:09', '2024-07-26 06:34:09'),
(30, '26', '9', '11', '74', '1', '13', 2, 3, 2, '2024-07-26', '2024-07-31', '2024-07-27', '2024-07-30', 'admin', 'admin', '1', NULL, '2024-07-26 06:34:09', '2024-07-26 06:34:09'),
(31, '27', '9', '5', '75', '1', '20', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-26 06:40:48', '2024-07-26 06:40:48');

-- --------------------------------------------------------

--
-- Table structure for table `site_weekly_plan_machines`
--

CREATE TABLE `site_weekly_plan_machines` (
  `site_weekly_plan_machine_id` bigint(20) UNSIGNED NOT NULL,
  `site_weekly_plan_id` varchar(255) DEFAULT NULL,
  `site_id` varchar(255) DEFAULT NULL,
  `component_id` varchar(255) DEFAULT NULL,
  `chainage_id` varchar(255) DEFAULT NULL,
  `machine_id` varchar(255) DEFAULT NULL,
  `machine_quantity` varchar(255) DEFAULT NULL,
  `plain_or_lhs_rhs` tinyint(4) DEFAULT NULL COMMENT '1:plan road|2:lhs road or rhs road',
  `lhs_rhs_both` tinyint(4) DEFAULT NULL COMMENT '1:lhs road|2:rhs road|3:both(lhs and rhs)',
  `lhs_or_rhs_machine` tinyint(1) DEFAULT NULL,
  `lhs_start_date` date DEFAULT NULL,
  `lhs_end_date` date DEFAULT NULL,
  `rhs_start_date` date DEFAULT NULL,
  `rhs_end_date` date DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_weekly_plan_machines`
--

INSERT INTO `site_weekly_plan_machines` (`site_weekly_plan_machine_id`, `site_weekly_plan_id`, `site_id`, `component_id`, `chainage_id`, `machine_id`, `machine_quantity`, `plain_or_lhs_rhs`, `lhs_rhs_both`, `lhs_or_rhs_machine`, `lhs_start_date`, `lhs_end_date`, `rhs_start_date`, `rhs_end_date`, `created_by`, `updated_by`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '11', '20', '2', '5', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-10 07:08:55', '2024-07-10 07:08:55'),
(6, '3', '1', '11', '20', '3', '6', 2, 3, 1, '2024-07-11', '2024-07-11', '2024-07-12', '2024-07-15', 'admin', 'admin', '1', NULL, '2024-07-11 10:08:35', '2024-07-11 10:08:35'),
(7, '3', '1', '11', '20', '28', '16', 2, 3, 1, '2024-07-11', '2024-07-11', '2024-07-12', '2024-07-15', 'admin', 'admin', '1', NULL, '2024-07-11 10:08:35', '2024-07-11 10:08:35'),
(8, '3', '1', '11', '20', '11', '4', 2, 3, 2, '2024-07-11', '2024-07-11', '2024-07-12', '2024-07-15', 'admin', 'admin', '1', NULL, '2024-07-11 10:08:35', '2024-07-11 10:08:35'),
(9, '3', '1', '11', '20', '19', '14', 2, 3, 2, '2024-07-11', '2024-07-11', '2024-07-12', '2024-07-15', 'admin', 'admin', '1', NULL, '2024-07-11 10:08:35', '2024-07-11 10:08:35'),
(10, '4', '1', '4', '30', '28', '2', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-11 11:27:29', '2024-07-11 11:27:29'),
(11, '4', '1', '4', '30', '3', '12', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-11 11:27:29', '2024-07-11 11:27:29'),
(12, '5', '1', '4', '30', '28', '8', 2, 3, 1, '2024-08-01', '2024-08-01', '2024-07-29', '2024-07-31', 'admin', 'admin', '1', NULL, '2024-07-11 11:57:03', '2024-07-11 11:57:03'),
(13, '5', '1', '4', '30', '4', '18', 2, 3, 1, '2024-08-01', '2024-08-01', '2024-07-29', '2024-07-31', 'admin', 'admin', '1', NULL, '2024-07-11 11:57:03', '2024-07-11 11:57:03'),
(14, '5', '1', '4', '30', '30', '9', 2, 3, 2, '2024-08-01', '2024-08-01', '2024-07-29', '2024-07-31', 'admin', 'admin', '1', NULL, '2024-07-11 11:57:03', '2024-07-11 11:57:03'),
(15, '5', '1', '4', '30', '31', '19', 2, 3, 2, '2024-08-01', '2024-08-01', '2024-07-29', '2024-07-31', 'admin', 'admin', '1', NULL, '2024-07-11 11:57:03', '2024-07-11 11:57:03'),
(16, '6', '1', '6', '32', '21', '8', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-11 12:27:58', '2024-07-11 12:27:58'),
(17, '7', '1', '3', '47', '2', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-12 06:55:57', '2024-07-12 06:55:57'),
(18, '8', '1', '3', '47', '28', '55', 2, 3, 1, '2024-07-15', '2024-07-16', '2024-07-12', '2024-07-18', 'admin', 'admin', '1', NULL, '2024-07-12 07:07:53', '2024-07-12 07:07:53'),
(19, '8', '1', '3', '47', '19', '33', 2, 3, 1, '2024-07-15', '2024-07-16', '2024-07-12', '2024-07-18', 'admin', 'admin', '1', NULL, '2024-07-12 07:07:53', '2024-07-12 07:07:53'),
(20, '8', '1', '3', '47', '4', '33', 2, 3, 2, '2024-07-15', '2024-07-16', '2024-07-12', '2024-07-18', 'admin', 'admin', '1', NULL, '2024-07-12 07:07:53', '2024-07-12 07:07:53'),
(21, '9', '1', '51', '45', '28', '54', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-12 07:22:11', '2024-07-12 07:22:11'),
(26, '23', '9', '11', '74', '2', '8', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-26 06:20:35', '2024-07-26 06:20:35'),
(27, '24', '9', '11', '74', '2', '25', 2, 1, 1, '2024-07-27', '2024-07-30', NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-26 06:25:45', '2024-07-26 06:25:45'),
(28, '25', '9', '11', '74', '28', '15', 2, 2, 2, NULL, NULL, '2024-07-26', '2024-07-30', 'admin', 'admin', '1', NULL, '2024-07-26 06:28:42', '2024-07-26 06:28:42'),
(29, '26', '9', '11', '74', '33', '25', 2, 3, 1, '2024-07-26', '2024-07-31', '2024-07-27', '2024-07-30', 'admin', 'admin', '1', NULL, '2024-07-26 06:34:09', '2024-07-26 06:34:09'),
(30, '26', '9', '11', '74', '2', '8', 2, 3, 2, '2024-07-26', '2024-07-31', '2024-07-27', '2024-07-30', 'admin', 'admin', '1', NULL, '2024-07-26 06:34:09', '2024-07-26 06:34:09'),
(31, '27', '9', '5', '75', '2', '20', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-26 06:40:48', '2024-07-26 06:40:48');

-- --------------------------------------------------------

--
-- Table structure for table `site_weekly_plan_materials`
--

CREATE TABLE `site_weekly_plan_materials` (
  `site_weekly_plan_material_id` bigint(20) UNSIGNED NOT NULL,
  `site_weekly_plan_id` varchar(255) DEFAULT NULL,
  `site_id` varchar(255) DEFAULT NULL,
  `component_id` varchar(255) DEFAULT NULL,
  `chainage_id` varchar(255) DEFAULT NULL,
  `material_id` varchar(255) DEFAULT NULL,
  `material_quantity` varchar(255) DEFAULT NULL,
  `plain_or_lhs_rhs` tinyint(4) DEFAULT NULL COMMENT '1:plan road|2:lhs road or rhs road',
  `lhs_rhs_both` tinyint(4) DEFAULT NULL COMMENT '1:lhs road|2:rhs road|3:both(lhs and rhs)',
  `lhs_or_rhs_material` tinyint(1) DEFAULT NULL,
  `lhs_start_date` date DEFAULT NULL,
  `lhs_end_date` date DEFAULT NULL,
  `rhs_start_date` date DEFAULT NULL,
  `rhs_end_date` date DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_weekly_plan_materials`
--

INSERT INTO `site_weekly_plan_materials` (`site_weekly_plan_material_id`, `site_weekly_plan_id`, `site_id`, `component_id`, `chainage_id`, `material_id`, `material_quantity`, `plain_or_lhs_rhs`, `lhs_rhs_both`, `lhs_or_rhs_material`, `lhs_start_date`, `lhs_end_date`, `rhs_start_date`, `rhs_end_date`, `created_by`, `updated_by`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '11', '20', '5', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-10 07:08:55', '2024-07-10 07:08:55'),
(2, '1', '1', '11', '20', '8', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-10 07:08:55', '2024-07-10 07:08:55'),
(7, '3', '1', '11', '20', '5', '5', 2, 3, 1, '2024-07-11', '2024-07-11', '2024-07-12', '2024-07-15', 'admin', 'admin', '1', NULL, '2024-07-11 10:08:35', '2024-07-11 10:08:35'),
(8, '3', '1', '11', '20', '8', '15', 2, 3, 1, '2024-07-11', '2024-07-11', '2024-07-12', '2024-07-15', 'admin', 'admin', '1', NULL, '2024-07-11 10:08:35', '2024-07-11 10:08:35'),
(9, '3', '1', '11', '20', '9', '9', 2, 3, 2, '2024-07-11', '2024-07-11', '2024-07-12', '2024-07-15', 'admin', 'admin', '1', NULL, '2024-07-11 10:08:35', '2024-07-11 10:08:35'),
(10, '3', '1', '11', '20', '16', '19', 2, 3, 2, '2024-07-11', '2024-07-11', '2024-07-12', '2024-07-15', 'admin', 'admin', '1', NULL, '2024-07-11 10:08:35', '2024-07-11 10:08:35'),
(11, '4', '1', '4', '30', '9', '5', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-11 11:27:29', '2024-07-11 11:27:29'),
(12, '4', '1', '4', '30', '8', '15', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-11 11:27:29', '2024-07-11 11:27:29'),
(13, '5', '1', '4', '30', '8', '9', 2, 3, 1, '2024-08-01', '2024-08-01', '2024-07-29', '2024-07-31', 'admin', 'admin', '1', NULL, '2024-07-11 11:57:03', '2024-07-11 11:57:03'),
(14, '5', '1', '4', '30', '16', '19', 2, 3, 1, '2024-08-01', '2024-08-01', '2024-07-29', '2024-07-31', 'admin', 'admin', '1', NULL, '2024-07-11 11:57:03', '2024-07-11 11:57:03'),
(15, '5', '1', '4', '30', '5', '8', 2, 3, 2, '2024-08-01', '2024-08-01', '2024-07-29', '2024-07-31', 'admin', 'admin', '1', NULL, '2024-07-11 11:57:03', '2024-07-11 11:57:03'),
(16, '5', '1', '4', '30', '35', '18', 2, 3, 2, '2024-08-01', '2024-08-01', '2024-07-29', '2024-07-31', 'admin', 'admin', '1', NULL, '2024-07-11 11:57:03', '2024-07-11 11:57:03'),
(17, '5', '1', '4', '30', '40', '188', 2, 3, 2, '2024-08-01', '2024-08-01', '2024-07-29', '2024-07-31', 'admin', 'admin', '1', NULL, '2024-07-11 11:57:03', '2024-07-11 11:57:03'),
(18, '6', '1', '6', '32', '41', '7', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-11 12:27:58', '2024-07-11 12:27:58'),
(19, '6', '1', '6', '32', '31', '17', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-11 12:27:58', '2024-07-11 12:27:58'),
(20, '7', '1', '3', '47', '5', '4', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-12 06:55:57', '2024-07-12 06:55:57'),
(21, '8', '1', '3', '47', '5', '5', 2, 3, 1, '2024-07-15', '2024-07-16', '2024-07-12', '2024-07-18', 'admin', 'admin', '1', NULL, '2024-07-12 07:07:53', '2024-07-12 07:07:53'),
(22, '8', '1', '3', '47', '8', '53', 2, 3, 1, '2024-07-15', '2024-07-16', '2024-07-12', '2024-07-18', 'admin', 'admin', '1', NULL, '2024-07-12 07:07:53', '2024-07-12 07:07:53'),
(23, '8', '1', '3', '47', '9', '33', 2, 3, 2, '2024-07-15', '2024-07-16', '2024-07-12', '2024-07-18', 'admin', 'admin', '1', NULL, '2024-07-12 07:07:53', '2024-07-12 07:07:53'),
(24, '8', '1', '3', '47', '8', '553', 2, 3, 2, '2024-07-15', '2024-07-16', '2024-07-12', '2024-07-18', 'admin', 'admin', '1', NULL, '2024-07-12 07:07:53', '2024-07-12 07:07:53'),
(25, '9', '1', '51', '45', '5', '6', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-12 07:22:11', '2024-07-12 07:22:11'),
(26, '9', '1', '51', '45', '8', '34', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-12 07:22:11', '2024-07-12 07:22:11'),
(27, '10', '6', '11', '52', '5', '2', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-24 10:14:23', '2024-07-24 10:14:23'),
(28, '10', '6', '11', '52', '5', '2', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-24 10:14:23', '2024-07-24 10:14:23'),
(29, '11', '6', '11', '52', '5', '2', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-24 10:14:30', '2024-07-24 10:14:30'),
(30, '11', '6', '11', '52', '5', '2', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-24 10:14:30', '2024-07-24 10:14:30'),
(31, '12', '6', '11', '52', '5', '2', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-24 10:14:48', '2024-07-24 10:14:48'),
(32, '12', '6', '11', '52', '5', '2', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-24 10:14:48', '2024-07-24 10:14:48'),
(33, '13', '6', '11', '52', '5', '2', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-24 10:14:48', '2024-07-24 10:14:48'),
(34, '13', '6', '11', '52', '5', '2', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-24 10:14:48', '2024-07-24 10:14:48'),
(40, '23', '9', '11', '74', '5', '6', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-26 06:20:35', '2024-07-26 06:20:35'),
(41, '24', '9', '11', '74', '5', '20', 2, 1, 1, '2024-07-27', '2024-07-30', NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-26 06:25:45', '2024-07-26 06:25:45'),
(42, '25', '9', '11', '74', '8', '8', 2, 2, 2, NULL, NULL, '2024-07-26', '2024-07-30', 'admin', 'admin', '1', NULL, '2024-07-26 06:28:42', '2024-07-26 06:28:42'),
(43, '26', '9', '11', '74', '16', '11', 2, 3, 1, '2024-07-26', '2024-07-31', '2024-07-27', '2024-07-30', 'admin', 'admin', '1', NULL, '2024-07-26 06:34:09', '2024-07-26 06:34:09'),
(44, '26', '9', '11', '74', '5', '7', 2, 3, 2, '2024-07-26', '2024-07-31', '2024-07-27', '2024-07-30', 'admin', 'admin', '1', NULL, '2024-07-26 06:34:09', '2024-07-26 06:34:09'),
(45, '27', '9', '5', '75', '5', '20', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '1', NULL, '2024-07-26 06:40:48', '2024-07-26 06:40:48');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_name` varchar(250) DEFAULT NULL,
  `gstin` varchar(40) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`, `gstin`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Hi Techno Energy Pvt Ltd Mulund', NULL, NULL, '2024-06-05 08:57:45', '2024-06-05 08:57:45'),
(2, 'Pyrogreen Energy Private Limited', NULL, NULL, '2024-06-05 08:57:45', '2024-06-05 08:57:45'),
(3, 'Shri Om Sai Engineering ', NULL, NULL, '2024-06-05 08:57:45', '2024-06-05 08:57:45'),
(4, 'Sudha Engineering', NULL, NULL, '2024-06-05 08:57:45', '2024-06-05 08:57:45'),
(5, 'Transdelta Transformer ', NULL, NULL, '2024-06-05 08:57:45', '2024-06-05 08:57:45'),
(6, 'Viraj Enterprises', NULL, NULL, '2024-06-05 08:57:45', '2024-06-05 08:57:45'),
(7, 'AVM Technologies & Infrastructure', NULL, NULL, '2024-06-05 08:57:45', '2024-06-05 08:57:45'),
(8, 'DATA CARE CORPORATION', NULL, NULL, '2024-06-05 08:57:45', '2024-06-05 08:57:45'),
(9, 'Technocare Solution', NULL, NULL, '2024-06-05 08:57:45', '2024-06-05 08:57:45');

-- --------------------------------------------------------

--
-- Table structure for table `tender_items`
--

CREATE TABLE `tender_items` (
  `tender_item_id` bigint(20) UNSIGNED NOT NULL,
  `tender_item_info` varchar(255) NOT NULL,
  `site_id` varchar(255) NOT NULL,
  `component_id` varchar(100) DEFAULT NULL,
  `chainage_id` varchar(255) NOT NULL,
  `tender_item_qty` varchar(255) NOT NULL,
  `tender_item_unit` varchar(255) NOT NULL,
  `tender_item_cost` varchar(255) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `is_active` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tender_items`
--

INSERT INTO `tender_items` (`tender_item_id`, `tender_item_info`, `site_id`, `component_id`, `chainage_id`, `tender_item_qty`, `tender_item_unit`, `tender_item_cost`, `created_by`, `updated_by`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(30, 'Tender Item 1', '1', '11', '21', '900', '1', '90', '', '', '1', NULL, '2024-06-10 07:09:53', '2024-06-10 07:09:53'),
(31, 'Tender Item 2', '1', '11', '21', '800', '2', '90', '', '', '1', NULL, '2024-06-10 07:10:07', '2024-06-10 07:10:07'),
(32, 'Tender Item 3', '1', '11', '21', '900', '3', '60', '', '', '1', NULL, '2024-06-10 07:10:19', '2024-06-10 07:10:19'),
(33, 'Tender Item 4', '1', '12', '22', '900', '4', '90', '', '', '1', NULL, '2024-06-10 07:10:49', '2024-06-10 07:10:49'),
(34, 'Tender Item 5', '1', '12', '22', '700', '5', '40', '', '', '1', NULL, '2024-06-10 07:12:18', '2024-06-10 07:12:18'),
(35, 'Tender Item 6', '1', '12', '22', '5000', '7', '150', '', '', '1', NULL, '2024-06-10 07:12:35', '2024-06-10 07:12:35'),
(36, 'Tender Item 7', '1', '11', '20', '900', '4', '90', '', '', '1', NULL, '2024-06-10 08:44:25', '2024-06-10 08:44:25'),
(37, 'Tender Item 8', '1', '11', '20', '170', '3', '88', '', '', '1', NULL, '2024-06-10 09:13:52', '2024-06-10 09:13:52'),
(38, 'Tender Item Description Of 1', '1', '4', '30', '40', '4', '330', 'admin', 'admin', '1', NULL, '2024-06-28 09:11:13', '2024-06-28 09:11:13'),
(39, 'Tender Item 1st July', '1', '6', '32', '90', '3', '90', 'admin', 'admin', '1', NULL, '2024-07-01 06:47:10', '2024-07-01 06:47:10'),
(40, 'TENDER ITEM DESCRIPTION 2nd - 1st July', '1', '6', '32', '9000', '2', '80', 'admin', 'admin', '1', NULL, '2024-07-01 06:47:54', '2024-07-01 06:47:54'),
(41, 'TENDER ITEM DESCRIPTION 1st July 3rd Item', '1', '51', '45', '3', '3', '44', 'admin', 'admin', '1', NULL, '2024-07-01 10:18:45', '2024-07-01 10:18:45'),
(42, 'TENDER ITEM DESCRIPTION 1st july 4th Item', '1', '51', '45', '5', '3', '500', 'admin', 'admin', '1', NULL, '2024-07-01 10:25:10', '2024-07-01 10:25:10'),
(43, 'TENDER ITEM DESCRIPTION 5th July Tender Item 1', '1', '3', '47', '70', '5', '60', 'admin', 'admin', '1', NULL, '2024-07-05 06:55:32', '2024-07-05 06:55:32'),
(44, 'Lorem 11', '6', '11', '52', '10', '2', '20', 'admin', 'admin', '1', NULL, '2024-07-24 07:22:15', '2024-07-24 11:53:24'),
(45, 'Lorem 2', '6', '11', '52', '5', '2', '30', 'admin', 'admin', '1', NULL, '2024-07-24 07:27:09', '2024-07-24 07:27:09'),
(46, 'Lorem 3', '6', '11', '52', '20', '2', '50', 'admin', 'admin', '1', NULL, '2024-07-24 07:27:34', '2024-07-24 07:27:34'),
(47, 'Ipsum1', '6', '5', '55', '10', '4', '5', 'admin', 'admin', '1', NULL, '2024-07-24 08:48:37', '2024-07-24 08:48:37'),
(48, 'Ipsum 2', '6', '5', '55', '2', '6', '10', 'admin', 'admin', '1', NULL, '2024-07-24 08:49:00', '2024-07-24 08:49:00'),
(49, 'tender 1', '6', '4', '56', '4', '5', '4', 'admin', 'admin', '1', NULL, '2024-07-24 08:53:23', '2024-07-24 08:53:23'),
(50, 'tender 2', '6', '4', '56', '58', '3', '6', 'admin', 'admin', '1', NULL, '2024-07-24 08:53:43', '2024-07-24 08:53:43'),
(51, 'tender 1', '6', '12', '57', '3', '2', '3', 'admin', 'admin', '1', NULL, '2024-07-24 09:00:50', '2024-07-24 09:00:50'),
(52, 'major 1', '6', '9', '58', '2', '3', '2', 'admin', 'admin', '1', NULL, '2024-07-24 09:02:57', '2024-07-24 09:03:26'),
(53, 'major 2', '6', '9', '58', '4', '3', '4', 'admin', 'admin', '1', NULL, '2024-07-24 09:03:11', '2024-07-24 09:03:11'),
(54, 'minor 1', '6', '10', '59', '6', '4', '5', 'admin', 'admin', '1', NULL, '2024-07-24 09:10:39', '2024-07-24 09:10:39'),
(55, 'minor 2', '6', '10', '59', '8', '4', '7', 'admin', 'admin', '', NULL, '2024-07-24 09:10:59', '2024-07-24 09:10:59'),
(56, 'minor 3', '6', '10', '59', '4', '3', '3', 'admin', 'admin', '', NULL, '2024-07-24 09:11:21', '2024-07-24 09:11:21'),
(57, 'vehi 1', '6', '3', '68', '7', '3', '6', 'admin', 'admin', '1', NULL, '2024-07-24 09:17:10', '2024-07-24 09:17:10'),
(58, 'vehi 2', '6', '3', '68', '4', '4', '67', 'admin', 'admin', '', NULL, '2024-07-24 09:17:29', '2024-07-24 09:17:29'),
(59, 'TRA 1', '6', '51', '66', '5', '6', '4', 'admin', 'admin', '1', NULL, '2024-07-24 09:20:42', '2024-07-24 09:20:42'),
(60, 'TRA 2', '6', '51', '66', '5', '7', '6', 'admin', 'admin', '1', NULL, '2024-07-24 09:21:10', '2024-07-24 09:21:10'),
(61, 'Test', '6', '11', '52', '33', '2', '11', 'admin', 'admin', '', NULL, '2024-07-24 11:00:44', '2024-07-24 11:00:44'),
(62, 'TENDER ITEM DESCRIPTION 24-7', '7', '11', '69', '60', '2', '900', 'admin', 'admin', '1', NULL, '2024-07-24 12:15:19', '2024-07-24 12:15:19'),
(63, 'testtt', '7', '64', '70', '70', '5', '55', 'admin', 'admin', '1', NULL, '2024-07-24 13:07:58', '2024-07-24 13:07:58'),
(64, 'Piers 1', '6', '6', '60', '2', '3', '10', 'admin', 'admin', '1', NULL, '2024-07-26 05:04:01', '2024-07-26 05:04:56'),
(65, 'Piers 2', '6', '6', '60', '3', '3', '10', 'admin', 'admin', '0', NULL, '2024-07-26 05:04:22', '2024-07-26 05:04:22'),
(66, 'Slab 1', '6', '13', '64', '3', '5', '5', 'admin', 'admin', '1', NULL, '2024-07-26 05:09:11', '2024-07-26 05:09:11'),
(67, 'Slab 2', '6', '13', '64', '6', '6', '8', 'admin', 'admin', '1', NULL, '2024-07-26 05:09:29', '2024-07-26 05:09:29'),
(68, 'BOX 11', '8', '11', '71', '21', '3', '331', 'admin', 'admin', '0', NULL, '2024-07-26 05:53:36', '2024-07-26 10:10:51'),
(69, 'FlyOver 1', '8', '5', '72', '1', '2', '33', 'admin', 'admin', '1', NULL, '2024-07-26 05:55:45', '2024-07-26 05:55:45'),
(70, 'FlyOver 2', '8', '5', '72', '6', '3', '4', 'admin', 'admin', '1', NULL, '2024-07-26 05:56:01', '2024-07-26 05:56:01'),
(71, 'Ramp 1', '8', '64', '73', '4', '5', '4', 'admin', 'admin', '1', NULL, '2024-07-26 05:58:25', '2024-07-26 05:58:25'),
(72, 'Ramp 2', '8', '64', '73', '8', '3', '7', 'admin', 'admin', '1', NULL, '2024-07-26 05:58:40', '2024-07-26 05:58:40'),
(73, 'Boxx 11', '9', '11', '74', '11', '1', '11', 'admin', 'admin', '1', NULL, '2024-07-26 06:08:34', '2024-07-27 08:47:35'),
(74, 'Boxx 2', '9', '11', '74', '6', '5', '6', 'admin', 'admin', '1', NULL, '2024-07-26 06:08:55', '2024-07-27 08:47:39'),
(75, 'FLY 1', '9', '5', '75', '1', '2', '1', 'admin', 'admin', '1', NULL, '2024-07-26 06:10:08', '2024-07-26 06:10:08'),
(76, 'FLY 2', '9', '5', '75', '4', '2', '4', 'admin', 'admin', '1', NULL, '2024-07-26 06:10:20', '2024-07-26 06:10:20'),
(77, 'Rampp 1', '9', '64', '76', '6', '3', '6', 'admin', 'admin', '1', NULL, '2024-07-26 06:11:04', '2024-07-26 06:11:04'),
(78, 'Rampp 2', '9', '64', '76', '4', '4', '4', 'admin', 'admin', '1', NULL, '2024-07-26 06:11:21', '2024-07-26 06:11:21'),
(79, 'HPC 1', '9', '12', '77', '6', '2', '6', 'admin', 'admin', '1', NULL, '2024-07-26 06:13:53', '2024-07-26 06:13:53'),
(80, 'HPC 2', '9', '12', '77', '9', '4', '9', 'admin', 'admin', '1', NULL, '2024-07-26 06:14:07', '2024-07-26 06:14:07'),
(81, 'ttt', '9', '11', '79', '2', '2', '2', 'admin', 'admin', '1', '2024-07-26 09:03:46', '2024-07-26 09:03:37', '2024-07-26 09:03:46'),
(82, 'major 1', '9', '9', '80', '3', '2', '3', 'admin', 'admin', '1', NULL, '2024-07-26 09:05:38', '2024-07-26 09:05:38'),
(83, 'Test', '10', '11', '94', '900', '4', '55', 'admin', 'admin', '1', NULL, '2024-07-29 07:19:15', '2024-07-29 07:19:15'),
(84, 'Test 2', '10', '11', '94', '900', '4', '60', 'admin', 'admin', '1', NULL, '2024-07-29 12:09:41', '2024-07-29 12:13:28'),
(85, 'test 3', '10', '11', '94', '900', '3', '34', 'admin', 'admin', '1', NULL, '2024-07-29 12:13:43', '2024-07-29 12:13:43'),
(86, 'Ramp 3', '8', '64', '73', '3', '2', '3', 'admin', 'admin', '1', NULL, '2024-07-29 12:15:45', '2024-07-29 12:15:45'),
(87, 'ttt', '10', '11', '97', '2', '3', '2', 'admin', 'admin', '1', NULL, '2024-07-29 12:33:53', '2024-07-29 12:33:53'),
(88, 'lorem', '8', '11', '71', 'ipsum', '2', '20', '', '', '1', NULL, '2024-07-29 12:36:08', '2024-07-29 12:36:08'),
(89, 'lorem', '8', '11', '71', 'ipsum', '2', '20', '', '', '1', '2024-07-29 12:37:38', '2024-07-29 12:37:17', '2024-07-29 12:37:38'),
(90, 'abc', '8', '11', '71', 'pqr', '4', '100', '', '', '1', '2024-07-29 12:37:42', '2024-07-29 12:37:17', '2024-07-29 12:37:42');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `site_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `unit_name` varchar(255) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `unit_for` varchar(100) DEFAULT NULL,
  `is_active` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unit_id`, `unit_name`, `created_by`, `updated_by`, `unit_for`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'centimeter', 'admin', 'admin', '1', '1', NULL, '2024-05-14 10:25:01', '2024-07-23 06:47:36'),
(2, 'meters', 'admin', 'admin', '1', '1', NULL, '2024-05-14 10:25:01', '2024-05-30 12:42:42'),
(3, 'kilogram', '1', '1', '1', '1', NULL, '2024-05-14 10:26:31', '2024-05-14 10:26:31'),
(4, 'gram', 'admin', 'admin', '1', '1', NULL, '2024-05-14 10:26:52', '2024-07-23 07:01:04'),
(5, 'Liters', '1', '1', '1', '1', NULL, '2024-05-14 13:01:57', '2024-05-15 08:59:20'),
(6, 'Date', '1', '1', '2', '1', NULL, '2024-05-17 08:47:03', '2024-05-17 08:47:03'),
(7, 'Nos', 'admin', 'admin', '2', '1', NULL, '2024-05-17 08:49:36', '2024-07-22 12:22:24'),
(21, 'Anything M', 'admin', 'admin', '2', '0', NULL, '2024-07-29 05:26:17', '2024-07-29 09:15:25'),
(22, 'Tender unit', 'admin', 'admin', '1', '0', NULL, '2024-07-29 05:32:41', '2024-07-29 09:14:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(11) NOT NULL DEFAULT 0,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `email_id` varchar(50) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `user_role` tinyint(4) NOT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `shop_name` varchar(40) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `token` varchar(50) DEFAULT NULL,
  `api_token` varchar(150) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `company_id`, `first_name`, `last_name`, `email_id`, `email`, `mobile`, `user_role`, `designation_id`, `shop_name`, `password`, `token`, `api_token`, `remember_token`, `created_by`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Super', 'Admin', 'admin@gmail.com', 'admin@gmail.com', NULL, 1, NULL, NULL, '$2y$10$HVII4qusmP59yQ.XEFLjzOOhfjn8CB2/aABLwdU0BrxM7RcpLG2I2', '14f135b1a283ee4f64426bcc72a9008e0e06d062', '3edadbfd19233b7e3c90fab34c12388b129e5585d1dba34911f7218ae9c324c7', NULL, 0, 1, NULL, '2024-08-01 09:00:57', NULL),
(2, 1, 'Manager', 'User', 'manager@gmail.com', NULL, '9856321470', 6, 4, NULL, '$2y$10$HVII4qusmP59yQ.XEFLjzOOhfjn8CB2/aABLwdU0BrxM7RcpLG2I2', '60f5821e16932893afd186b1d32023e7a98522fc', '', NULL, 0, 1, NULL, '2024-07-22 05:01:25', NULL),
(17, 1, 'Vendor', NULL, 'test@abc.com', NULL, '9856321470', 2, NULL, 'name', '$2y$10$n81Fk4P6iBx.oYiPNm2wt.3X4cItlXzX4/am1LySm/AM7eqn.UWjO', NULL, '', NULL, 1, 1, '2023-01-19 06:29:53', '2024-07-29 05:00:49', '2024-07-29 05:00:49'),
(18, 1, 'Suraj', 'Shinde', 'suraj@appcart.com', NULL, '9856214709', 2, NULL, 'Shop 3', '$2y$10$dWZiMcUu27cDxK1HkKhzZO2hGnFv57vl.LGwzvFM8l0bF95elErky', 'bb3a29d79ef5593e3b5c1fe0d3a0c1a66108df1b', '', NULL, 0, 0, '2023-01-19 06:34:58', '2023-07-26 01:57:14', NULL),
(19, 1, 'Sumit', 'shop', 'store@appcart.com', NULL, '9874521360', 7, NULL, 'Vendor shop', '$2y$10$KMpMSx29SbxFx4hyBWSEL.1emtbdGvwRS42UaB7BQGJl9MpFJVshy', '2ad8919885bb5215c9a1c9bb190b4bf7149d9c7e', '', NULL, 0, 1, '2023-01-30 01:59:02', '2023-07-26 03:29:53', NULL),
(20, 1, 'Surajs', 'Appcart', 'purchase@appcart.com', NULL, '7894513207', 8, 3, NULL, '$2y$10$QkF/bwp7XUkM621Y./W/H.fLnlaSFN0Y/XmdtRBk3PvTErmVCIMXe', '0452eeef20d2205072649f19e1f315350f091012', '', NULL, 0, 1, '2023-02-02 07:16:01', '2024-07-19 13:24:18', NULL),
(45, 1, 'Raju', 'Shrivastava', 'raju@yopmail.com', NULL, '9887898789', 12, 1, NULL, '$2y$10$M3jdDiBfixFfutkamNdi8epke0lnvKyW5rkpTcqtwFgQBE5fGOUW.', NULL, '', NULL, 1, 1, '2024-05-30 10:21:13', '2024-07-23 06:11:08', NULL),
(46, 1, 'Amar', 'Singh', 'raj5u@yopmail.com', NULL, '9887898785', 2, NULL, 'Vera Metals', '$2y$10$RVEujNrV2/uK2.Q.7iMfZerEjShBThVOPvRxFD.qiY5Dt2twSxp5O', NULL, '', NULL, 1, 1, '2024-06-06 07:40:53', '2024-07-29 06:20:29', '2024-07-29 06:20:29'),
(47, 1, 'ffgdgdgd', NULL, 'etest@yopmail.com', NULL, '4445435433', 2, NULL, 'fdgdgg', '$2y$10$9nbS4Sme8vcAWajwvl24/uxHA5rY2tk51KFUNpMplcoqRBb4h0kla', NULL, '', NULL, 0, 0, '2024-07-10 10:02:57', '2024-07-10 10:03:25', '2024-07-10 10:03:25'),
(48, 1, 'abc', NULL, 'abc@gmail.com', NULL, '9883898283', 2, NULL, 'abc1', '$2y$10$yuxEGzuleNG5frGmDUYz4OIDkXFzkru4HxU5cOj0RxEd13MD6Ggim', NULL, '', NULL, 1, 0, '2024-07-19 12:48:47', '2024-07-27 09:37:42', '2024-07-27 09:37:42'),
(49, 1, 'abcddd', 'qwertyy', 'ab0c@gmail.com', NULL, '5555555555', 6, 5, NULL, '$2y$10$Fn0SGHpaXuvrlFTEqqpGfe5Pb03XHsPMhLfX2GQDbKnbvH.CqXLWe', NULL, '', NULL, 0, 0, '2024-07-22 05:14:12', '2024-07-22 05:38:28', '2024-07-22 05:38:28'),
(50, 1, 'abcd', 'pqrs', 'ab7c@gmail.com', NULL, '9855656563', 4, 4, NULL, '$2y$10$L4cIPFyBQiJFyxQ4O9eh8ursh1WUqaQSsC2M9TP1hFl94erg3/AXq', NULL, '', NULL, 1, 1, '2024-07-22 05:39:46', '2024-07-23 05:43:26', NULL),
(51, 1, 'abcd', 'pqrs', 'abcd@gmail.com', NULL, '1234567895', 4, 4, NULL, '$2y$10$M12DqGMXuaQOmI4EdDRl3ObcAnmda7/AyZNwD7KrjNmFmLFyZXVD2', NULL, '', NULL, 0, 0, '2024-07-22 05:39:55', '2024-07-22 05:41:47', '2024-07-22 05:41:47'),
(52, 1, 'Vaishnavi', 'Kumbhar', 'pqr@gmail.com', NULL, '9632587415', 6, 4, NULL, '$2y$10$X9qnOu9c.LEZYxItgCcwjut6nEB7UcKyBjJDjeFK2wY/gfbDBh1da', NULL, '', NULL, 0, 0, '2024-07-22 05:41:11', '2024-07-23 07:11:40', '2024-07-23 07:11:40'),
(53, 1, 'Testing', 'User', 'rajuu@yopmail.com', NULL, '9887898789', 5, 5, NULL, '$2y$10$LzoAO4bWGUOWuwqe4ESax.OAeFI7/EaOhySkO/EYa8M6vIZtfOp9K', NULL, '', NULL, 0, 1, '2024-07-23 05:24:24', '2024-07-23 05:24:24', NULL),
(58, 0, 'Rajumani', 'Shrivastava', 'bhupend3av@sansad.nic.in', NULL, '9883898789', 4, 5, NULL, '$2y$10$MOdQcfvfjC0T2CScwxe/iOcoHuqFlycycBCnkTwMBqcZLocPXzLyi', NULL, '', NULL, 1, 1, '2024-07-23 05:49:52', '2024-07-23 05:49:52', NULL),
(59, 0, 'Ram', 'Yadav', 'ceeyadav@sansad.nic.in', NULL, '9883898789', 5, 4, NULL, '$2y$10$Z5Y6uscwRpveF82jeMWRTelgwwrz/l8lyBv2m8brpO2qhDF5AuGfi', NULL, '', NULL, 1, 1, '2024-07-23 05:50:33', '2024-07-23 05:50:33', NULL),
(60, 1, 'John', 'Shrivastava', 'hhraju@yopmail.com', NULL, '9234567895', 5, 5, NULL, '$2y$10$VU7vhO.ybsBYEzrWOIE3LetxCcfRdBi0eTtYg2nnFMo/UPBL3M7ii', NULL, '', NULL, 1, 1, '2024-07-23 05:58:06', '2024-07-23 05:58:06', NULL),
(61, 1, 'Raju', 'Appcart', 'eadav@sansad.nic.in', NULL, '9883898789', 5, 11, NULL, '$2y$10$aA2KXnEEhvEhdDvBn4xI6estC9TxTOAR7cazV4hISmeTz0ZO5KAJO', NULL, '', NULL, 1, 1, '2024-07-23 06:00:09', '2024-07-23 06:00:09', NULL),
(62, 1, 'Johna', 'Doe', 'wwer.yadav@sansad.nic.in', NULL, '9887448789', 5, 7, NULL, '$2y$10$BafSDsDtw0ccs4UPy3D5K.TWeIees8Ujn/TKFmhNkKsFC24c14kmO', NULL, '', NULL, 1, 1, '2024-07-23 06:02:05', '2024-07-23 06:02:05', NULL),
(63, 0, 'Ankita', 'qwerty', 'abce@gmail.com', NULL, '8483897555', 4, 4, NULL, '$2y$10$LcLdbvPF0c9QUualBcUiquNRLLe7m8RQe2N6RY3NDGgpYEOBEgNsG', NULL, '', NULL, 1, 1, '2024-07-23 09:13:27', '2024-07-23 09:27:21', '2024-07-23 09:27:21'),
(64, 0, 'Ankita', 'qwerty', 'abcef@gmail.com', NULL, '8483897555', 4, 4, NULL, '$2y$10$drU.X7yPdDd/t1V12rwtwOgaBlJtaTbKI2wqrKdqhj3G6W0H9eHcC', NULL, '', NULL, 1, 1, '2024-07-23 09:13:42', '2024-07-23 09:30:16', '2024-07-23 09:30:16'),
(65, 0, 'ankita_66 @', 'qwerty_10', 'ankita@yopmail.com', NULL, '8483895684', 4, 5, NULL, '$2y$10$rtrsotlty1ck.sicVVSrWuVUv/ud2kjwi5.x1amgxL7Bwe4BYiu1u', NULL, '', NULL, 1, 1, '2024-07-23 09:15:23', '2024-07-23 09:31:28', NULL),
(66, 0, 'ankita', 'qwerty', 'ankita@gmail.com', NULL, '8483897565', 4, 6, NULL, '$2y$10$HP7hpPpm3pSkpd3ybsrT5.OvjaidK1fOOvaQjwvVOfXlvRXUfTxDq', NULL, '', NULL, 1, 1, '2024-07-23 09:25:25', '2024-07-23 09:27:30', '2024-07-23 09:27:30'),
(67, 1, 'vaishnavi', NULL, 'kumbhar@yopmail.com', NULL, '8486897573', 2, NULL, 'kumbhar', '$2y$10$y210ynrjzlXVZAL2RlRelea5GXGAjRWgbEn4tEsvWKRyY6f9SVduW', NULL, '', NULL, 1, 1, '2024-07-29 05:00:36', '2024-07-29 06:07:56', '2024-07-29 06:07:56'),
(68, 1, 'Vaishnavii', 'Kumbhar', 'abt@yopmail.com', NULL, '9666666664', 3, 1, NULL, '$2y$10$pwG0EetnXZ72/5tEkm8bTehB1D63SCOJw0g1kzuqWQrub9aWrIfK2', NULL, '', NULL, 1, 0, '2024-07-29 05:06:54', '2024-07-29 05:07:29', '2024-07-29 05:07:29'),
(69, 1, 'Qwert', NULL, 'qwerty@yopmail.com', NULL, '8596741236', 2, NULL, 'Kumbhar', '$2y$10$j0aep9DC.BwKOhlZXDt5ruyX/yvYTqasYXSXGCV6scMlu2M83lqN6', NULL, '', NULL, 1, 1, '2024-07-29 06:07:47', '2024-07-29 06:07:47', NULL),
(70, 1, 'anyone', NULL, 'anyone@yopmail.com', NULL, '9563784512', 2, NULL, 'anything', '$2y$10$CurLfvVM.6jluax2QgrzXOMPGFub9OfJ6fjEhoSevWxU4oYKL6HYW', NULL, '', NULL, 1, 0, '2024-07-29 06:20:08', '2024-07-29 06:20:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_sites`
--

CREATE TABLE `user_sites` (
  `user_site_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_sites`
--

INSERT INTO `user_sites` (`user_site_id`, `user_id`, `site_id`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(10, 2, 1, 1, NULL, '2023-02-05 23:41:13', '2023-02-05 23:41:13'),
(15, 20, 2, 1, NULL, '2024-07-19 13:24:18', '2024-07-19 13:24:18'),
(20, 49, 1, 1, NULL, '2024-07-22 05:38:16', '2024-07-22 05:38:16'),
(21, 49, 2, 1, NULL, '2024-07-22 05:38:16', '2024-07-22 05:38:16'),
(22, 52, 1, 1, NULL, '2024-07-22 05:41:11', '2024-07-22 05:41:11'),
(23, 53, 1, 1, NULL, '2024-07-23 05:24:24', '2024-07-23 05:24:24'),
(24, 53, 2, 1, NULL, '2024-07-23 05:24:24', '2024-07-23 05:24:24'),
(25, 50, 1, 1, NULL, '2024-07-23 05:32:56', '2024-07-23 05:32:56'),
(26, 45, 1, 1, NULL, '2024-07-23 06:11:08', '2024-07-23 06:11:08'),
(28, 68, 8, 1, NULL, '2024-07-29 05:07:15', '2024-07-29 05:07:15');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(40) NOT NULL,
  `asset_id` int(11) DEFAULT NULL,
  `make_type` varchar(80) DEFAULT NULL,
  `model_name` varchar(80) DEFAULT NULL,
  `vehicle_no` varchar(20) DEFAULT NULL,
  `registration_end` datetime DEFAULT NULL,
  `vehicle_type` int(11) DEFAULT NULL,
  `asset_group` int(11) DEFAULT NULL,
  `operator` int(11) DEFAULT NULL,
  `profit_center` int(11) DEFAULT NULL,
  `owner` int(11) DEFAULT NULL,
  `book_value` varchar(20) DEFAULT NULL,
  `depreciation_value` varchar(20) DEFAULT NULL,
  `reading_in` varchar(20) DEFAULT NULL,
  `expected_reading` varchar(20) DEFAULT NULL,
  `min_urea_alert` varchar(20) DEFAULT NULL,
  `vehicle_photo` varchar(240) DEFAULT NULL,
  `fitness_certificate` varchar(240) DEFAULT NULL,
  `fitness_end` datetime DEFAULT NULL,
  `serv_repair` varchar(80) DEFAULT NULL,
  `status` varchar(40) DEFAULT NULL,
  `notes` varchar(2000) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `type`, `asset_id`, `make_type`, `model_name`, `vehicle_no`, `registration_end`, `vehicle_type`, `asset_group`, `operator`, `profit_center`, `owner`, `book_value`, `depreciation_value`, `reading_in`, `expected_reading`, `min_urea_alert`, `vehicle_photo`, `fitness_certificate`, `fitness_end`, `serv_repair`, `status`, `notes`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Owned', 2, 'JCB', 'AS MD 2233', 'MH12 UT 4490', NULL, 44, 7, NULL, 1, 1, '1200000', '1100000', 'Km', '10', '1.5', 'public/asset_photo/2/dd2983a0e57eb024bf50783af122cb4d0e2d7a80.png', NULL, '2024-06-30 00:00:00', NULL, 'In Use', NULL, 'Test Descriptions', NULL, '2024-06-04 12:32:47', '2024-07-23 11:05:03'),
(2, 'Owned', 28, 'GK JCB', 'GK JCB', 'MH20FU2818', '2026-10-15 00:00:00', 7, 7, NULL, 3, 1, '50000', '10000', 'Km', '10', '7', 'public/asset_photo/28/b4623eca12b31c811ae07635b385792b80bc512a.jpg', 'public/fitness_certificate/2/39a02908831f6f6b312495161f46ceeac4806d24.pdf', '2024-12-31 00:00:00', NULL, 'In Working', NULL, 'testseststs', NULL, '2024-07-09 09:03:25', '2024-07-09 09:19:36'),
(3, 'Owned', 29, 'EXCAVATOR', 'AJAX', 'MH49AT3714', NULL, 3, 7, NULL, 3, 1, '50000', '5000', 'Km', '10', '10', NULL, NULL, NULL, NULL, 'Idle', NULL, 'czczc', '2024-07-09 09:28:16', '2024-07-09 09:25:43', '2024-07-09 09:28:16');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_types`
--

CREATE TABLE `vehicle_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(80) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_types`
--

INSERT INTO `vehicle_types` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'HYVA', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(2, 'TM', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(3, 'TRAILER', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(4, 'PICKUP', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(5, 'TANKER', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(6, 'EXCAVATOR', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(7, 'BACKHOE LOADER', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(8, 'BACKHOE', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(9, 'TRACTOR', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(10, 'AJAX', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(11, 'JCB3DX', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(12, 'HYDRA', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(13, 'FARANA', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(14, 'JCB-JS-205', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(15, 'XCMGXE500LR', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(16, 'ROLAR', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(17, 'CAMPER', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(18, 'BREAKER', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(19, 'BUCKET', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(20, 'CAR-ERTIGA', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(21, 'TATA-HITACHI-370', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(22, 'TOWER LIGHT DG', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(23, 'DG-125KV', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(24, '82 HP PUMP', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(25, 'DG-500KV', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(26, 'BLASTING', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(27, 'APPE', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(28, 'CAR-BOLERO', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(29, 'CAR-MARAZZO', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(30, 'CAR-SWIFT', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(31, 'CAR-SCALA', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(32, 'CAR-CRETA', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(33, 'CAR-SCROSS', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(34, 'TATA HARRIEAR', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(35, 'XUV 500', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(36, 'SCORPIO S5', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(37, 'GENRATOR', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(38, 'COMP-VIBRATOR', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(39, 'AIR-COMPRESSOR', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(40, 'CONCRETE-PUMP', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(41, 'GROOVE CUTTER', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(42, 'LIFT', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(43, 'STOVE-FOOD (MISC.)', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39'),
(44, 'JCB', NULL, '2024-06-03 10:36:39', '2024-06-03 10:36:39');

-- --------------------------------------------------------

--
-- Table structure for table `vendors_detail`
--

CREATE TABLE `vendors_detail` (
  `vd_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `material_type` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors_detail`
--

INSERT INTO `vendors_detail` (`vd_id`, `company_id`, `user_id`, `material_type`, `material_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(35, 1, 19, 7, 8, NULL, NULL, NULL),
(36, 1, 19, 7, 9, NULL, NULL, NULL),
(92, 1, 18, 7, 5, NULL, NULL, NULL),
(93, 1, 18, 7, 8, NULL, NULL, NULL),
(94, 1, 18, 7, 9, NULL, NULL, NULL),
(106, 1, 47, 24, 28, NULL, NULL, NULL),
(107, 1, 47, 31, 42, NULL, NULL, NULL),
(170, 1, 48, 13, 50, NULL, NULL, NULL),
(171, 1, 48, 13, 104, NULL, NULL, NULL),
(172, 1, 48, 13, 123, NULL, NULL, NULL),
(173, 1, 48, 13, 140, NULL, NULL, NULL),
(174, 1, 46, 7, 9, NULL, NULL, NULL),
(175, 1, 67, 13, 50, NULL, NULL, NULL),
(176, 1, 67, 13, 104, NULL, NULL, NULL),
(177, 1, 67, 13, 123, NULL, NULL, NULL),
(178, 1, 67, 13, 140, NULL, NULL, NULL),
(179, 1, 17, 7, 5, NULL, NULL, NULL),
(180, 1, 69, 7, 5, NULL, NULL, NULL),
(182, 1, 70, 13, 33, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_tender_item_component_mappings`
--
ALTER TABLE `activity_tender_item_component_mappings`
  ADD PRIMARY KEY (`activity_tender_item_component_id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assets_group`
--
ALTER TABLE `assets_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assets_sub_group`
--
ALTER TABLE `assets_sub_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `component_chainage_extra_fields`
--
ALTER TABLE `component_chainage_extra_fields`
  ADD PRIMARY KEY (`component_chainage_extra_field_id`);

--
-- Indexes for table `component_extra_fields`
--
ALTER TABLE `component_extra_fields`
  ADD PRIMARY KEY (`component_extra_field_id`);

--
-- Indexes for table `component_monitering_activity_mapping`
--
ALTER TABLE `component_monitering_activity_mapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conflicts`
--
ALTER TABLE `conflicts`
  ADD PRIMARY KEY (`conflict_id`);

--
-- Indexes for table `conflicts_media`
--
ALTER TABLE `conflicts_media`
  ADD PRIMARY KEY (`conflict_media_id`);

--
-- Indexes for table `conflicts_resolved_information`
--
ALTER TABLE `conflicts_resolved_information`
  ADD PRIMARY KEY (`conflict_resolved_id`);

--
-- Indexes for table `coordinates`
--
ALTER TABLE `coordinates`
  ADD PRIMARY KEY (`coord_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`designation_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `labours`
--
ALTER TABLE `labours`
  ADD PRIMARY KEY (`labour_id`);

--
-- Indexes for table `machines`
--
ALTER TABLE `machines`
  ADD PRIMARY KEY (`machine_id`),
  ADD KEY `machines_machine_type_foreign` (`machine_type`);

--
-- Indexes for table `machine_types`
--
ALTER TABLE `machine_types`
  ADD PRIMARY KEY (`mach_type_id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `material_types`
--
ALTER TABLE `material_types`
  ADD PRIMARY KEY (`mtype_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monitoring_activities`
--
ALTER TABLE `monitoring_activities`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `monitor_tenders`
--
ALTER TABLE `monitor_tenders`
  ADD PRIMARY KEY (`monitor_tender_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profit_center`
--
ALTER TABLE `profit_center`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_types`
--
ALTER TABLE `project_types`
  ADD PRIMARY KEY (`project_type_id`);

--
-- Indexes for table `road_components`
--
ALTER TABLE `road_components`
  ADD PRIMARY KEY (`component_id`);

--
-- Indexes for table `road_components_chainage`
--
ALTER TABLE `road_components_chainage`
  ADD PRIMARY KEY (`chainage_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`site_id`);

--
-- Indexes for table `site_plan_activities`
--
ALTER TABLE `site_plan_activities`
  ADD PRIMARY KEY (`site_plan_activity_id`);

--
-- Indexes for table `site_plan_assets`
--
ALTER TABLE `site_plan_assets`
  ADD PRIMARY KEY (`site_plan_vehical_type_id`);

--
-- Indexes for table `site_plan_departments`
--
ALTER TABLE `site_plan_departments`
  ADD PRIMARY KEY (`site_plan_department_id`);

--
-- Indexes for table `site_plan_labours`
--
ALTER TABLE `site_plan_labours`
  ADD PRIMARY KEY (`site_plan_labour_id`);

--
-- Indexes for table `site_plan_machines`
--
ALTER TABLE `site_plan_machines`
  ADD PRIMARY KEY (`site_plan_machine_id`);

--
-- Indexes for table `site_plan_materials`
--
ALTER TABLE `site_plan_materials`
  ADD PRIMARY KEY (`site_plan_material_id`);

--
-- Indexes for table `site_weekly_plans`
--
ALTER TABLE `site_weekly_plans`
  ADD PRIMARY KEY (`site_weekly_plan_id`);

--
-- Indexes for table `site_weekly_plan_extra_fields`
--
ALTER TABLE `site_weekly_plan_extra_fields`
  ADD PRIMARY KEY (`site_weekly_plan_extra_field_id`);

--
-- Indexes for table `site_weekly_plan_labours`
--
ALTER TABLE `site_weekly_plan_labours`
  ADD PRIMARY KEY (`site_weekly_plan_labour_id`);

--
-- Indexes for table `site_weekly_plan_machines`
--
ALTER TABLE `site_weekly_plan_machines`
  ADD PRIMARY KEY (`site_weekly_plan_machine_id`);

--
-- Indexes for table `site_weekly_plan_materials`
--
ALTER TABLE `site_weekly_plan_materials`
  ADD PRIMARY KEY (`site_weekly_plan_material_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tender_items`
--
ALTER TABLE `tender_items`
  ADD PRIMARY KEY (`tender_item_id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tests_site_id_foreign` (`site_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_sites`
--
ALTER TABLE `user_sites`
  ADD PRIMARY KEY (`user_site_id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors_detail`
--
ALTER TABLE `vendors_detail`
  ADD PRIMARY KEY (`vd_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_tender_item_component_mappings`
--
ALTER TABLE `activity_tender_item_component_mappings`
  MODIFY `activity_tender_item_component_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `assets_group`
--
ALTER TABLE `assets_group`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `assets_sub_group`
--
ALTER TABLE `assets_sub_group`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `component_chainage_extra_fields`
--
ALTER TABLE `component_chainage_extra_fields`
  MODIFY `component_chainage_extra_field_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `component_extra_fields`
--
ALTER TABLE `component_extra_fields`
  MODIFY `component_extra_field_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `component_monitering_activity_mapping`
--
ALTER TABLE `component_monitering_activity_mapping`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `conflicts`
--
ALTER TABLE `conflicts`
  MODIFY `conflict_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `conflicts_media`
--
ALTER TABLE `conflicts_media`
  MODIFY `conflict_media_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conflicts_resolved_information`
--
ALTER TABLE `conflicts_resolved_information`
  MODIFY `conflict_resolved_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `coordinates`
--
ALTER TABLE `coordinates`
  MODIFY `coord_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `designation_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `labours`
--
ALTER TABLE `labours`
  MODIFY `labour_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `machines`
--
ALTER TABLE `machines`
  MODIFY `machine_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `machine_types`
--
ALTER TABLE `machine_types`
  MODIFY `mach_type_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `material_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `material_types`
--
ALTER TABLE `material_types`
  MODIFY `mtype_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `monitoring_activities`
--
ALTER TABLE `monitoring_activities`
  MODIFY `activity_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `monitor_tenders`
--
ALTER TABLE `monitor_tenders`
  MODIFY `monitor_tender_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profit_center`
--
ALTER TABLE `profit_center`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project_types`
--
ALTER TABLE `project_types`
  MODIFY `project_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `road_components`
--
ALTER TABLE `road_components`
  MODIFY `component_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `road_components_chainage`
--
ALTER TABLE `road_components_chainage`
  MODIFY `chainage_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `site_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `site_plan_activities`
--
ALTER TABLE `site_plan_activities`
  MODIFY `site_plan_activity_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `site_plan_assets`
--
ALTER TABLE `site_plan_assets`
  MODIFY `site_plan_vehical_type_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `site_plan_departments`
--
ALTER TABLE `site_plan_departments`
  MODIFY `site_plan_department_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `site_plan_labours`
--
ALTER TABLE `site_plan_labours`
  MODIFY `site_plan_labour_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `site_plan_machines`
--
ALTER TABLE `site_plan_machines`
  MODIFY `site_plan_machine_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `site_plan_materials`
--
ALTER TABLE `site_plan_materials`
  MODIFY `site_plan_material_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `site_weekly_plans`
--
ALTER TABLE `site_weekly_plans`
  MODIFY `site_weekly_plan_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `site_weekly_plan_extra_fields`
--
ALTER TABLE `site_weekly_plan_extra_fields`
  MODIFY `site_weekly_plan_extra_field_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `site_weekly_plan_labours`
--
ALTER TABLE `site_weekly_plan_labours`
  MODIFY `site_weekly_plan_labour_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `site_weekly_plan_machines`
--
ALTER TABLE `site_weekly_plan_machines`
  MODIFY `site_weekly_plan_machine_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `site_weekly_plan_materials`
--
ALTER TABLE `site_weekly_plan_materials`
  MODIFY `site_weekly_plan_material_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tender_items`
--
ALTER TABLE `tender_items`
  MODIFY `tender_item_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unit_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `user_sites`
--
ALTER TABLE `user_sites`
  MODIFY `user_site_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `vendors_detail`
--
ALTER TABLE `vendors_detail`
  MODIFY `vd_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `machines`
--
ALTER TABLE `machines`
  ADD CONSTRAINT `machines_machine_type_foreign` FOREIGN KEY (`machine_type`) REFERENCES `machine_types` (`mach_type_id`);

--
-- Constraints for table `tests`
--
ALTER TABLE `tests`
  ADD CONSTRAINT `tests_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`site_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2024 at 03:03 PM
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
(3, '14', '11', '1', '1', '1', '11', 'admin', 'admin', '1', NULL, '2024-05-21 09:29:23', '2024-05-21 09:29:23'),
(4, '14', '11', '2', '1', '1', '11', 'admin', 'admin', '1', NULL, '2024-05-21 09:29:23', '2024-05-21 09:29:23'),
(5, '15', '13', '3', '1', '1', '11', 'admin', 'admin', '1', NULL, '2024-05-21 11:10:18', '2024-05-21 11:10:18');

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
(63, 11, 11, NULL, '1', NULL, '2024-05-09 04:30:24', '2024-05-09 04:30:38'),
(64, 11, 13, NULL, '1', NULL, '2024-05-09 04:30:24', '2024-05-09 04:30:38'),
(66, 43, 12, NULL, '1', NULL, '2024-05-09 04:33:11', '2024-05-09 05:04:57'),
(67, 45, 10, NULL, '1', NULL, '2024-05-09 05:05:03', '2024-05-09 05:05:03'),
(68, 45, 11, NULL, '1', NULL, '2024-05-09 05:05:03', '2024-05-09 05:05:03'),
(69, 40, 11, NULL, '1', NULL, '2024-05-09 05:05:14', '2024-05-09 05:05:14'),
(70, 40, 12, NULL, '1', NULL, '2024-05-09 05:05:14', '2024-05-09 05:05:14'),
(71, 40, 13, NULL, '1', NULL, '2024-05-09 05:05:14', '2024-05-09 05:05:14'),
(74, 46, 11, NULL, '1', NULL, '2024-05-09 05:48:03', '2024-05-09 05:48:03'),
(75, 46, 12, NULL, '1', NULL, '2024-05-09 05:48:03', '2024-05-09 05:48:03'),
(76, 47, 11, NULL, '1', NULL, '2024-05-09 05:48:27', '2024-05-09 05:48:27'),
(77, 47, 12, NULL, '1', NULL, '2024-05-09 05:48:27', '2024-05-09 05:48:27'),
(80, 48, 12, NULL, '1', NULL, '2024-05-09 06:22:08', '2024-05-09 06:22:08'),
(81, 48, 13, NULL, '1', NULL, '2024-05-09 06:22:08', '2024-05-09 06:22:08'),
(82, 49, 11, NULL, '1', NULL, '2024-05-10 11:16:04', '2024-05-10 11:16:04'),
(83, 49, 12, NULL, '1', NULL, '2024-05-10 11:16:04', '2024-05-10 11:16:04'),
(86, 50, 11, NULL, '1', NULL, '2024-05-10 11:55:46', '2024-05-10 11:55:46'),
(92, 42, 10, NULL, '1', NULL, '2024-05-21 09:05:05', '2024-05-21 09:05:05'),
(93, 42, 11, NULL, '1', NULL, '2024-05-21 09:05:05', '2024-05-21 09:05:05');

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
(61, 2, 2, '18.52010984407348', ' 73.85615969089649', NULL, '2023-02-01 06:42:50', '2023-02-01 06:42:50');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `designation_id` bigint(20) UNSIGNED NOT NULL,
  `designation_name` varchar(60) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`designation_id`, `designation_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Project Manager', NULL, NULL, NULL),
(2, 'Quantity Surveyor', NULL, NULL, NULL),
(3, 'Highway Engineer', NULL, NULL, NULL),
(4, 'Structural Engineer', NULL, NULL, NULL),
(5, 'Store Incharge', NULL, NULL, NULL),
(6, 'Asst. Purchase Manager', NULL, NULL, NULL),
(7, 'QC Engineer', NULL, NULL, NULL),
(8, 'Accountant', NULL, NULL, NULL),
(9, 'MD', NULL, NULL, NULL),
(10, 'CEO', NULL, NULL, NULL),
(11, 'TECHNICAL DIRECTOR', NULL, NULL, NULL),
(12, 'TOLL HEAD', NULL, NULL, NULL),
(13, 'TECHNICAL HEAD', NULL, NULL, NULL),
(14, 'PRO', NULL, NULL, NULL),
(15, 'CA', NULL, NULL, NULL),
(16, 'SENIOR ACCOUNTANT', NULL, NULL, NULL),
(17, 'SENIOR OFFICER ACCOUNTS', NULL, NULL, NULL),
(18, 'ACCOUNT EXECUTIVE', NULL, NULL, NULL),
(19, 'HR MANAGER', NULL, NULL, NULL),
(20, 'HR EXECUTIVE', NULL, NULL, NULL),
(21, 'SR.ENGINEER (P & M )', NULL, NULL, NULL),
(22, 'PURCHASE EXECUTIVE', NULL, NULL, NULL),
(23, 'SENIOR EXECUTIVE-PURCHASE', NULL, NULL, NULL),
(24, 'MANAGER TOLL-OPERATIONS', NULL, NULL, NULL),
(25, 'LIASONING OFFICER', NULL, NULL, NULL),
(26, 'TOLL EXECUITVE', NULL, NULL, NULL),
(27, 'TENDER EXECUTIVE', NULL, NULL, NULL),
(28, 'PLANNING & BILLING ENGG', NULL, NULL, NULL),
(29, 'Jr.ENGG-TENDER', NULL, NULL, NULL),
(30, 'QC ENGINEER', NULL, NULL, NULL),
(31, 'SITE ENGINEER', NULL, NULL, NULL),
(32, 'CIVIL ENGINEER', NULL, NULL, NULL),
(33, 'EXECUTIVE-TOLL OPERATIONS', NULL, NULL, NULL),
(34, 'FRONT DESK EXECUTIVE', NULL, NULL, NULL),
(35, 'TOLL ACCOUNTANT', NULL, NULL, NULL),
(36, 'STORE-EXECATIVE', NULL, NULL, NULL),
(37, 'ACCOUNT-EXECATIVE', NULL, NULL, NULL),
(38, 'QUANTITY SURVEYOY', NULL, NULL, NULL),
(39, 'HR-ADMIN', NULL, NULL, NULL),
(40, 'SR.ENGG (STRUCTURE)', NULL, NULL, NULL),
(41, 'ENGINEER (HIGHWAY)', NULL, NULL, NULL);

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
(1, 'Female Collie', 'admin', 'admin', '1', NULL, '2024-05-20 12:52:42', '2024-05-21 05:54:10'),
(2, 'Male Collie', 'admin', 'admin', '1', NULL, '2024-05-21 05:42:36', '2024-05-21 05:53:43'),
(3, 'Semi Skilled', 'admin', 'admin', '1', NULL, '2024-05-21 05:42:43', '2024-05-21 05:57:55');

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
(1, 1, 'Roller', 3, '64655612311234', '4546x654132', '10', '10000', '1000', 1, '2023-01-04 04:49:45', '2023-01-24 01:47:36', NULL),
(2, NULL, 'Mixer', 1, '64655612312345', 'UID123', '10', '5000', '500', 1, '2023-01-04 05:04:12', '2023-01-06 00:12:27', NULL),
(4, NULL, 'Mixer Name', 1, '123465', '1234566', '10', '1000', '100', 1, '2023-01-06 00:05:27', '2023-01-06 00:13:32', NULL),
(5, 1, 'Mixer name', 3, '123456', '2123131654', '10', '1000', '100', 1, '2023-01-06 00:34:12', '2023-01-06 00:34:12', NULL),
(12, 1, 'Mixer', 1, '123465', '1234566', '10', '145000', '14500', 1, '2023-01-16 04:50:41', '2023-01-16 04:50:41', NULL),
(27, 1, 'JCB1', 8, 'J12356df456', '123654098', '12', '5000001', '416667', 0, '2023-01-30 06:34:33', '2023-02-02 06:29:00', NULL),
(28, 1, 'JCB2', 8, 'J24564654', '12345654', '10', '2000001', '', 0, '2023-01-30 06:34:33', '2023-01-30 06:34:33', NULL),
(29, 1, 'JCB', 8, 'J12356df456', '123654098', '12', '5000001', '', 0, '2023-07-26 01:36:03', '2023-07-26 01:36:03', NULL),
(30, 1, 'JCB4', 8, 'J12356df4561', '1236540980', '12', '5000001', '', 0, '2023-07-26 01:37:49', '2023-07-26 01:37:49', NULL),
(31, 1, 'JCB24', 8, 'J245646540', '1234565410', '10', '2000001', '', 0, '2023-07-26 01:37:49', '2023-07-26 01:37:49', NULL),
(32, 1, 'truck10', 1, 'sdf1231sdf', '123df2sdf', '10', '100000000', '10000000', 0, '2023-08-01 07:42:37', '2023-08-01 07:42:37', NULL);

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
(1, NULL, 'Truck', NULL, '2023-01-06 00:05:07', '2023-01-06 00:05:07'),
(2, NULL, 'JCB', NULL, '2023-01-06 00:12:45', '2023-01-06 00:12:45'),
(3, NULL, 'Buldoser', NULL, '2023-01-06 00:34:12', '2023-01-06 00:34:12'),
(8, NULL, 'Any Type', NULL, '2023-01-30 06:25:41', '2023-01-30 06:25:41');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `material_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `material_name` varchar(100) NOT NULL,
  `material_type` varchar(50) DEFAULT NULL,
  `material_unit` varchar(50) DEFAULT NULL,
  `material_cost` varchar(40) DEFAULT NULL,
  `material_cost_per_unit` varchar(40) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`material_id`, `company_id`, `material_name`, `material_type`, `material_unit`, `material_cost`, `material_cost_per_unit`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 1, 'ABC1', '7', '3', '2000', NULL, 0, '2023-01-05 08:33:58', '2023-02-02 06:09:42', NULL),
(8, 1, 'silica', '7', '3', '500', NULL, 1, '2023-01-05 09:03:54', '2023-01-05 09:04:40', NULL),
(9, 1, 'Rods', '7', '3', '100', NULL, 1, '2023-01-10 06:39:40', '2023-01-10 06:39:40', NULL),
(14, 10, 'ABC1', '7', '3', '500', NULL, 1, '2023-01-13 08:00:12', '2023-01-13 08:00:12', NULL),
(16, 1, 'angles', '7', '2', '1000', NULL, 1, '2023-01-16 03:28:14', '2023-01-23 01:48:12', NULL),
(17, 1, 'ABC2', '13', '4', '100', NULL, 1, '2023-01-16 03:41:27', '2023-02-02 06:29:19', NULL),
(18, 1, 'Steel', '7', '5', '500', NULL, 1, '2023-01-16 07:08:05', '2023-01-16 07:08:05', NULL),
(28, 1, 'import name', '24', '2', '1000', NULL, 0, '2023-01-30 06:40:39', '2023-01-30 06:40:39', NULL),
(29, 1, 'import name 2', '25', '3', '1200', NULL, 0, '2023-01-30 06:40:39', '2023-01-30 06:40:39', NULL),
(30, 1, 'sdfsdfs', '7', '3', '500', NULL, 0, '2023-08-01 07:43:34', '2023-08-01 07:43:34', NULL),
(31, 1, 'Material_33', '26', '1', '22', NULL, 1, '2024-05-03 07:02:34', '2024-05-03 07:02:34', NULL),
(32, 1, 'Material_337', '28', '3', '44', NULL, 1, '2024-05-03 07:19:09', '2024-05-03 07:19:09', NULL),
(33, 1, 'River Sand', '13', '3', '100', NULL, 1, '2024-05-24 05:41:01', '2024-05-24 05:41:01', NULL),
(35, 1, 'Motarola', '7', '2', NULL, NULL, 0, '2024-05-24 06:59:46', '2024-05-24 06:59:46', NULL),
(36, 1, 'Motarola', '7', '2', NULL, NULL, 0, '2024-05-24 07:25:04', '2024-05-24 07:25:04', NULL),
(37, 1, 'import name99', '29', '3', '100000000', NULL, 0, '2024-05-24 07:26:24', '2024-05-24 07:26:24', NULL),
(38, 1, 'import name 29999', '30', '3', '199999200', NULL, 0, '2024-05-24 07:26:24', '2024-05-24 07:26:24', NULL),
(39, 1, 'Samsung', '26', '1', NULL, NULL, 1, '2024-05-24 10:07:00', '2024-05-24 10:07:00', NULL),
(40, 1, 'Limestone', '26', '3', NULL, NULL, 1, '2024-05-24 11:14:52', '2024-05-24 11:14:52', NULL),
(41, 1, 'Basalt', '26', '4', NULL, NULL, 1, '2024-05-24 11:14:52', '2024-05-24 11:14:52', NULL);

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
(30, NULL, 'Material Type 2', NULL, '2024-05-24 07:26:24', '2024-05-24 07:26:24');

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
(68, '2024_05_24_180402_create_site_plan_materials_table', 49);

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
(10, 1, 'activity name', 'description', NULL, '2023-01-23 00:51:52', '2023-01-23 02:01:51'),
(11, 1, 'activity 2', 'desc', NULL, '2023-01-23 00:51:52', '2023-01-23 00:51:52'),
(12, 1, 'activity 21', 'activity 21', NULL, '2024-05-08 05:36:51', '2024-05-08 05:36:51'),
(13, 1, 'activity 22', 'activity 22', NULL, '2024-05-08 05:36:51', '2024-05-08 05:36:51'),
(14, 1, 'Test Activity 15-05-2024', 'Test Activity Description 15-05-2024', NULL, '2024-05-15 05:17:12', '2024-05-15 05:17:12');

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
(14, '11', '1', '11', '1', 0, 6, 'admin', 'admin', '1', NULL, '2024-05-21 09:29:23', '2024-05-21 09:29:23'),
(15, '13', '1', '11', '1', 0, 7, 'admin', 'admin', '1', NULL, '2024-05-21 11:10:18', '2024-05-21 11:10:18');

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
(1, 1, 1, 'Plain Road for RP', 'plain_road', 'assets/images/08-05-2024_file-zip-icon-6846.png', '1,', '1', NULL, NULL, '2024-05-03 11:33:13', '2024-05-03 11:33:13'),
(2, 1, 1, 'Ramp', 'ramp', 'assets/images/08-05-2024_file-zip-icon-6846.png', '2,', '1', NULL, '2023-02-09 06:40:19', '2024-05-03 11:33:13', '2024-05-03 11:33:13'),
(3, 1, 1, 'Vendvar Underpass', 'underpass', 'assets/images/08-05-2024_file-zip-icon-6846.png', '2,', '1', NULL, NULL, '2024-05-03 11:33:13', '2024-05-03 11:33:13'),
(4, 1, 1, 'Grade Seperator', 'grade_separator', 'assets/images/08-05-2024_file-zip-icon-6846.png', '2,', '1', NULL, '2023-02-08 18:30:00', '2024-05-03 11:33:13', '2024-05-03 11:33:13'),
(5, 1, 1, 'Flyover', 'flyover', 'assets/images/08-05-2024_file-zip-icon-6846.png', '2,', '1', NULL, '2023-02-08 18:30:00', '2024-05-03 11:33:13', '2024-05-03 11:33:13'),
(6, 1, 1, 'Piers', 'piers', 'assets/images/08-05-2024_file-zip-icon-6846.png', '2,', '1', NULL, '2023-02-08 18:30:00', '2024-05-03 11:33:13', '2024-05-03 11:33:13'),
(7, 1, 1, 'Super Structure', 'super_structure', 'assets/images/08-05-2024_file-zip-icon-6846.png', '2,', '1', NULL, '2023-02-08 18:30:00', '2024-05-03 11:33:13', '2024-05-03 11:33:13'),
(8, 1, 1, 'Plain Road for FP', 'plain_road', 'assets/images/08-05-2024_file-zip-icon-6846.png', '2,', '1', NULL, NULL, '2024-05-03 11:33:13', '2024-05-03 11:33:13'),
(9, 1, 1, 'Major Bridge', 'flyover', 'assets/images/08-05-2024_file-zip-icon-6846.png', '2,', '1', NULL, NULL, '2024-05-03 11:33:13', '2024-05-03 11:33:13'),
(10, 1, 1, 'Minor Bridge', 'flyover', 'assets/images/08-05-2024_file-zip-icon-6846.png', '2,', '1', NULL, NULL, '2024-05-03 11:33:13', '2024-05-03 11:33:13'),
(11, 1, 1, 'Box Culvert', 'plain_road', 'assets/images/08-05-2024_file-zip-icon-6846.png', '2,', '1', NULL, NULL, '2024-05-03 11:33:13', '2024-05-03 11:33:13'),
(12, 1, 1, 'HPC', 'plain_road', 'assets/images/08-05-2024_file-zip-icon-6846.png', '2,', '1', NULL, NULL, '2024-05-03 11:33:13', '2024-05-03 11:33:13'),
(13, 1, 1, 'Slab Culvert', 'flyover', 'assets/images/08-05-2024_file-zip-icon-6846.png', '2,', '1', NULL, NULL, '2024-05-03 11:33:13', '2024-05-03 11:33:13'),
(40, 1, 1, 'Test Road Activity 1', '', 'assets/images/08-05-2024_file-zip-icon-6846.png', '2,', '1', NULL, NULL, '2024-05-08 11:47:01', '2024-05-09 05:05:14'),
(41, 2, 1, 'Test component', '', 'assets/images/09-05-2024_apps-2-line.png', '2,', '1', NULL, '2024-05-09 04:30:38', '2024-05-09 04:28:20', '2024-05-09 04:30:38'),
(42, 2, 1, 'Test componentuio', '', 'assets/images/09-05-2024_apps-2-line.png', '2,', '1', NULL, NULL, '2024-05-09 04:31:49', '2024-05-21 09:05:05'),
(43, 2, 1, 'dfgdfg', '', 'assets/images/09-05-2024_apps-2-line.png', '2,', '1', NULL, '2024-05-09 05:04:57', '2024-05-09 04:33:11', '2024-05-09 05:04:57'),
(44, 1, 1, 'sdd', '', 'assets/images/09-05-2024_16thJan2024.xlsx', '2,', '1', NULL, '2024-05-09 05:04:44', '2024-05-09 04:59:39', '2024-05-09 05:04:44'),
(45, 1, 1, 'Test Road Activity 21w', '', 'assets/images/09-05-2024_xls-icon-3379.png', '2,', '1', NULL, NULL, '2024-05-09 05:05:03', '2024-05-09 05:05:03'),
(46, 2, 1, 'Test Road Activityqq', '', 'assets/images/09-05-2024_xls-icon-3379.png', '2,', '1', NULL, NULL, '2024-05-09 05:48:03', '2024-05-09 05:48:03'),
(47, 1, 1, 'Test Road Activity 44', '', 'assets/images/09-05-2024_xls-icon-3379.png', '2,', '1', NULL, NULL, '2024-05-09 05:48:27', '2024-05-09 05:48:27'),
(48, 1, 1, 'Test Road Activity Udya At', '', 'assets/images/09-05-2024_xls-icon-3379.png', '2,', '1', NULL, NULL, '2024-05-09 06:21:43', '2024-05-09 06:22:08'),
(49, 2, 1, 'Test Road Activity 2133ww', '', 'assets/images/10-05-2024_file-zip-icon-6846.png', '2,', '1', NULL, NULL, '2024-05-10 11:16:04', '2024-05-10 11:16:04'),
(50, 1, 1, 'Test Road Activitysss', '', 'assets/images/10-05-2024_xls-icon-3379.png', '2,', '1', NULL, NULL, '2024-05-10 11:31:53', '2024-05-10 11:55:46');

-- --------------------------------------------------------

--
-- Table structure for table `road_components_chainage`
--

CREATE TABLE `road_components_chainage` (
  `chainage_id` bigint(20) UNSIGNED NOT NULL,
  `site_id` int(11) NOT NULL,
  `component_id` int(11) NOT NULL,
  `from_length` varchar(20) NOT NULL,
  `to_length` varchar(20) NOT NULL,
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

INSERT INTO `road_components_chainage` (`chainage_id`, `site_id`, `component_id`, `from_length`, `to_length`, `from_lat`, `from_long`, `to_lat`, `to_long`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 11, '2', '120', '18.4893549', '73.8170266', '18.4893549', '73.8170266', 1, NULL, '2023-08-01 02:16:00', '2024-05-14 05:15:50'),
(2, 1, 2, '5', '100', NULL, NULL, NULL, NULL, 1, NULL, '2024-05-02 00:50:06', '2024-05-13 07:42:26'),
(3, 1, 3, '0', '200', NULL, NULL, NULL, NULL, 1, NULL, '2024-05-02 00:50:06', '2024-05-13 07:42:54'),
(4, 1, 11, '77', '200', NULL, NULL, NULL, NULL, 1, '2024-05-14 05:27:57', '2024-05-02 19:22:06', '2024-05-14 05:27:57'),
(5, 1, 12, '900', '1000', NULL, NULL, NULL, NULL, 1, '2024-05-14 05:28:29', '2024-05-02 19:22:06', '2024-05-14 05:28:29'),
(6, 1, 12, '1000', '1100', NULL, NULL, NULL, NULL, 1, NULL, '2024-05-02 19:22:06', '2024-05-02 19:22:06'),
(7, 1, 7, '3', '80', NULL, NULL, NULL, NULL, 1, NULL, '2024-05-09 06:28:13', '2024-05-13 07:39:50'),
(8, 1, 8, '70', '900', NULL, NULL, NULL, NULL, 1, NULL, '2024-05-09 07:33:58', '2024-05-09 07:33:58'),
(9, 2, 12, '44', '444', NULL, NULL, NULL, NULL, 1, NULL, '2024-05-09 07:34:28', '2024-05-09 07:34:28'),
(10, 1, 42, '8', '99', NULL, NULL, NULL, NULL, 1, NULL, '2024-05-10 07:38:24', '2024-05-10 07:38:24'),
(11, 1, 1, '40', '50', NULL, NULL, NULL, NULL, 1, NULL, '2024-05-13 06:56:09', '2024-05-13 06:56:09'),
(12, 1, 1, '1', '100', NULL, NULL, NULL, NULL, 1, NULL, '2024-05-15 05:17:44', '2024-05-15 05:17:44'),
(13, 1, 12, '55', '90', NULL, NULL, NULL, NULL, 1, NULL, '2024-05-17 09:14:17', '2024-05-17 09:14:17'),
(14, 1, 42, '120', '180', NULL, NULL, NULL, NULL, 1, NULL, '2024-05-21 09:05:56', '2024-05-21 09:05:56');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(20) NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 1, 'Karve Test Site', 'Pune', '316.38901333161976', 0, '10', '2023-02-01', '2023-02-05', '111abcd', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 0, 0, 0, NULL, '2023-02-01 04:06:13', '2023-02-01 04:06:13'),
(2, 1, 'Karve Test Site1', 'Pune, Maharashtra, India', '271.98649518997183', 11, '20000', '2023-01-31', '2023-02-09', 'Chainage 1', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 0, 0, 0, NULL, '2023-02-01 06:42:49', '2023-12-21 07:32:00');

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
(3, '1', '1', '11', '11', '909', NULL, NULL, NULL, NULL, '2024-05-22 09:59:24', '2024-05-22 09:59:37'),
(4, '1', '1', '11', '13', '09', NULL, NULL, NULL, NULL, '2024-05-22 09:59:24', '2024-05-22 10:00:16');

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
(5, '1', '1', '50', '5', '500', '125000', 'admin', 'admin', '1', NULL, '2024-05-23 10:31:34', '2024-05-23 12:34:41'),
(6, '1', '2', '89', '8', '800', '569600', 'admin', 'admin', '1', '2024-05-23 12:59:00', '2024-05-23 10:31:34', '2024-05-23 12:59:00'),
(21, '1', '3', '70', '70', '70', '343000', 'admin', 'admin', '1', NULL, '2024-05-23 12:34:41', '2024-05-23 12:34:41'),
(22, '1', '2', '50', '55', '40', '110000', 'admin', 'admin', '1', '2024-05-23 13:02:50', '2024-05-23 13:02:41', '2024-05-23 13:02:50');

-- --------------------------------------------------------

--
-- Table structure for table `site_plan_materials`
--

CREATE TABLE `site_plan_materials` (
  `site_plan_material_id` bigint(20) UNSIGNED NOT NULL,
  `material_type_id` varchar(255) DEFAULT NULL,
  `material_id` varchar(255) DEFAULT NULL,
  `material_unit_id` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
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

INSERT INTO `site_plan_materials` (`site_plan_material_id`, `material_type_id`, `material_id`, `material_unit_id`, `quantity`, `created_by`, `updated_by`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '7', '9', '3', '90', 'admin', 'admin', '1', NULL, '2024-05-24 13:00:51', '2024-05-24 13:00:51'),
(2, '25', '29', '3', '900', 'admin', 'admin', '1', NULL, '2024-05-24 13:00:51', '2024-05-24 13:00:51');

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
(1, 'Testing', '1', '11', '1', '400', '2', '300', '1', '1', '1', NULL, '2024-05-14 03:49:51', '2024-05-14 03:49:51'),
(2, 'Testing Item 2', '1', '11', '1', '2', '1', '324', '', '', '1', NULL, '2024-05-14 05:58:11', '2024-05-14 06:52:24'),
(3, 'Testing Unit Item Userss', '1', '11', '1', '400', '3', '300', '', '', '1', NULL, '2024-05-14 06:36:57', '2024-05-14 06:42:19'),
(4, 'Testing Trendy', '1', '11', '1', '33', '4', '44', '', '', '1', NULL, '2024-05-14 06:53:45', '2024-05-14 06:53:59'),
(5, 'Tender Item 2 15-05-2024', '1', '12', '6', '800', '2', '44', '', '', '1', NULL, '2024-05-15 00:15:35', '2024-05-15 00:15:35'),
(6, 'Tender Item 16-05-2024', '1', '42', '10', '600', '2', '66', '', '', '1', NULL, '2024-05-15 23:45:19', '2024-05-15 23:45:19'),
(7, 'Tender Item 2 16-05-2024', '1', '42', '10', '800', '4', '20', '', '', '1', NULL, '2024-05-15 23:45:46', '2024-05-15 23:45:46'),
(8, 'Tender Item 3 16-05-2024', '1', '42', '10', '800', '5', '50', '', '', '1', NULL, '2024-05-15 23:46:00', '2024-05-15 23:46:00'),
(9, 'Tender Item 4 16-05-2024', '1', '42', '10', '9000', '3', '900', '', '', '1', NULL, '2024-05-15 23:46:22', '2024-05-15 23:46:22'),
(10, 'Tender Item 5 16-05-2024', '1', '42', '10', '700', '3', '800', '', '', '1', NULL, '2024-05-15 23:46:39', '2024-05-15 23:46:39'),
(11, 'Sample Information Tender Item  2', '1', '42', '10', '5000', '1', '700', '', '', '1', NULL, '2024-05-16 10:48:00', '2024-05-16 10:48:00'),
(12, 'Sample Information Tender Item  2', '1', '42', '10', '5000', '1', '700', '', '', '1', NULL, '2024-05-16 11:14:13', '2024-05-16 11:14:13'),
(26, 'Sample Information Tender Item  2', '1', '7', '7', '5000', '1', '700', '', '', '1', NULL, '2024-05-17 12:27:55', '2024-05-17 12:27:55');

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
(1, 'centimeter', 'admin', 'admin', '1', '1', NULL, '2024-05-14 10:25:01', '2024-05-21 05:43:34'),
(2, 'meter', '1', '1', '1', '1', NULL, '2024-05-14 10:25:01', '2024-05-14 10:25:01'),
(3, 'kilogram', '1', '1', '1', '1', NULL, '2024-05-14 10:26:31', '2024-05-14 10:26:31'),
(4, 'gram', '1', '1', '1', '1', NULL, '2024-05-14 10:26:52', '2024-05-14 10:26:52'),
(5, 'Liters', '1', '1', '1', '1', NULL, '2024-05-14 13:01:57', '2024-05-15 08:59:20'),
(6, 'Date', '1', '1', '2', '1', NULL, '2024-05-17 08:47:03', '2024-05-17 08:47:03'),
(7, 'Nos', 'admin', 'admin', '2', '1', NULL, '2024-05-17 08:49:36', '2024-05-17 09:00:27');

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

INSERT INTO `users` (`user_id`, `company_id`, `first_name`, `last_name`, `email_id`, `email`, `mobile`, `user_role`, `designation_id`, `shop_name`, `password`, `token`, `remember_token`, `created_by`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Super', 'Admin', 'admin@gmail.com', 'admin@gmail.com', NULL, 1, NULL, NULL, '$2y$10$HVII4qusmP59yQ.XEFLjzOOhfjn8CB2/aABLwdU0BrxM7RcpLG2I2', 'fe0d334a051f65cd3185749f49cc045d36a67135', NULL, 0, 1, NULL, '2024-05-24 04:08:43', NULL),
(2, 1, 'Manager', 'User', 'manager@gmail.com', NULL, '9856321470', 6, 4, NULL, '$2y$10$HVII4qusmP59yQ.XEFLjzOOhfjn8CB2/aABLwdU0BrxM7RcpLG2I2', '60f5821e16932893afd186b1d32023e7a98522fc', NULL, 0, 1, NULL, '2023-02-05 23:56:26', NULL),
(17, 1, 'Vendor', NULL, 'test@abc.com', NULL, '9856321470', 2, NULL, 'name', '$2y$10$1aURFR7wVE.A9r/0FYiluOYAumxMphRZg1.KzOq6lI.BZwHxcjKDO', NULL, NULL, 0, 0, '2023-01-19 06:29:53', '2023-01-19 06:32:12', NULL),
(18, 1, 'Vendor', 'Name', 'suraj@appcart.com', NULL, '9856214709', 2, NULL, 'Shop 3', '$2y$10$dWZiMcUu27cDxK1HkKhzZO2hGnFv57vl.LGwzvFM8l0bF95elErky', 'bb3a29d79ef5593e3b5c1fe0d3a0c1a66108df1b', NULL, 0, 0, '2023-01-19 06:34:58', '2023-07-26 01:57:14', NULL),
(19, 1, 'Vendor', 'shop', 'store@appcart.com', NULL, '9874521360', 7, NULL, 'Vendor shop', '$2y$10$KMpMSx29SbxFx4hyBWSEL.1emtbdGvwRS42UaB7BQGJl9MpFJVshy', '2ad8919885bb5215c9a1c9bb190b4bf7149d9c7e', NULL, 0, 1, '2023-01-30 01:59:02', '2023-07-26 03:29:53', NULL),
(20, 1, 'Suraj', 'Appcart', 'purchase@appcart.com', NULL, '789451320', 8, 3, NULL, '$2y$10$QkF/bwp7XUkM621Y./W/H.fLnlaSFN0Y/XmdtRBk3PvTErmVCIMXe', '0452eeef20d2205072649f19e1f315350f091012', NULL, 0, 1, '2023-02-02 07:16:01', '2023-07-26 03:25:32', NULL),
(42, 0, NULL, NULL, '', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 0, 0, '2024-05-16 09:46:42', '2024-05-16 09:46:42', NULL),
(43, 0, NULL, NULL, '', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 0, 0, '2024-05-16 09:47:26', '2024-05-16 09:47:26', NULL),
(44, 0, NULL, NULL, '', NULL, NULL, 0, NULL, NULL, '', NULL, NULL, 0, 0, '2024-05-16 09:47:38', '2024-05-16 09:47:38', NULL);

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
(11, 20, 2, 1, NULL, '2023-02-05 23:41:19', '2023-02-05 23:41:19');

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
(87, 1, 17, 7, 5, NULL, NULL, NULL),
(88, 1, 17, 13, 17, NULL, NULL, NULL),
(92, 1, 18, 7, 5, NULL, NULL, NULL),
(93, 1, 18, 7, 8, NULL, NULL, NULL),
(94, 1, 18, 7, 9, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_tender_item_component_mappings`
--
ALTER TABLE `activity_tender_item_component_mappings`
  ADD PRIMARY KEY (`activity_tender_item_component_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `component_monitering_activity_mapping`
--
ALTER TABLE `component_monitering_activity_mapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coordinates`
--
ALTER TABLE `coordinates`
  ADD PRIMARY KEY (`coord_id`);

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
-- Indexes for table `site_plan_labours`
--
ALTER TABLE `site_plan_labours`
  ADD PRIMARY KEY (`site_plan_labour_id`);

--
-- Indexes for table `site_plan_materials`
--
ALTER TABLE `site_plan_materials`
  ADD PRIMARY KEY (`site_plan_material_id`);

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
  MODIFY `activity_tender_item_component_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `component_monitering_activity_mapping`
--
ALTER TABLE `component_monitering_activity_mapping`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `coordinates`
--
ALTER TABLE `coordinates`
  MODIFY `coord_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `designation_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `labours`
--
ALTER TABLE `labours`
  MODIFY `labour_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `machines`
--
ALTER TABLE `machines`
  MODIFY `machine_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `machine_types`
--
ALTER TABLE `machine_types`
  MODIFY `mach_type_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `material_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `material_types`
--
ALTER TABLE `material_types`
  MODIFY `mtype_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `monitoring_activities`
--
ALTER TABLE `monitoring_activities`
  MODIFY `activity_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `monitor_tenders`
--
ALTER TABLE `monitor_tenders`
  MODIFY `monitor_tender_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_types`
--
ALTER TABLE `project_types`
  MODIFY `project_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `road_components`
--
ALTER TABLE `road_components`
  MODIFY `component_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `road_components_chainage`
--
ALTER TABLE `road_components_chainage`
  MODIFY `chainage_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `site_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `site_plan_activities`
--
ALTER TABLE `site_plan_activities`
  MODIFY `site_plan_activity_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `site_plan_labours`
--
ALTER TABLE `site_plan_labours`
  MODIFY `site_plan_labour_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `site_plan_materials`
--
ALTER TABLE `site_plan_materials`
  MODIFY `site_plan_material_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tender_items`
--
ALTER TABLE `tender_items`
  MODIFY `tender_item_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unit_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user_sites`
--
ALTER TABLE `user_sites`
  MODIFY `user_site_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vendors_detail`
--
ALTER TABLE `vendors_detail`
  MODIFY `vd_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

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

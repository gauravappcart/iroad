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
-- Dumping data for table `road_components`
--

INSERT INTO `road_components` (`component_id`, `company_id`, `component_name`, `component_class`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Plain Road for RP', 'plain_road', NULL, NULL, NULL),
(2, 1, 'Ramp', 'ramp', '2023-02-09 06:40:19', NULL, NULL),
(3, 1, 'Vendvar Underpass', 'underpass', NULL, NULL, NULL),
(4, 1, 'Grade Seperator', 'grade_separator', '2023-02-08 18:30:00', NULL, NULL),
(5, 1, 'Flyover', 'flyover', '2023-02-08 18:30:00', NULL, NULL),
(6, 1, 'Piers', 'piers', '2023-02-08 18:30:00', NULL, NULL),
(7, 1, 'Super Structure', 'super_structure', '2023-02-08 18:30:00', NULL, NULL),
(8, 1, 'Plain Road for FP', 'plain_road', NULL, NULL, NULL),
(9, 1, 'Major Bridge', 'flyover', NULL, NULL, NULL),
(10, 1, 'Minor Bridge', 'flyover', NULL, NULL, NULL),
(11, 1, 'Box Culvert', 'plain_road', NULL, NULL, NULL),
(12, 1, 'HPC', 'plain_road', NULL, NULL, NULL),
(13, 1, 'Slab Culvert', 'flyover', NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

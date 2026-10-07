-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2026 at 11:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psp_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `nric` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `program` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `marks` decimal(5,2) DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `nric`, `name`, `program`, `password`, `marks`, `created_at`) VALUES
(2, '050101071234', 'Ali Bin Ahmad', 'Diploma Teknologi Maklumat', '$2y$10$7hFZVkKeNgUlGDIbCQxWsel5v.Y0w8VxXL81U13cgB3IocWWpb9rC', 85.50, '2026-09-09 05:17:24'),
(3, '050202075566', 'Nurul Asyiqin Binti Zulfahmi', 'Diploma Teknologi Maklumat', '$2y$10$7hFZVkKeNgUlGDIbCQxWsel5v.Y0w8VxXL81U13cgB3IocWWpb9rC', 78.50, '2026-09-12 13:39:55'),
(4, '041112089911', 'Muhammad Amirul Bin Azman', 'Diploma Teknologi Maklumat', '$2y$10$7hFZVkKeNgUlGDIbCQxWsel5v.Y0w8VxXL81U13cgB3IocWWpb9rC', 92.00, '2026-09-12 13:39:55'),
(5, '050815073344', 'Tan Wei Ming', 'Diploma Teknologi Maklumat', '$2y$10$7hFZVkKeNgUlGDIbCQxWsel5v.Y0w8VxXL81U13cgB3IocWWpb9rC', 64.20, '2026-09-12 13:39:55'),
(6, '050311025543', 'Siti Sarah Binti Ismail', 'Diploma Teknologi Maklumat', '$2y$10$7hFZVkKeNgUlGDIbCQxWsel5v.Y0w8VxXL81U13cgB3IocWWpb9rC', 88.00, '2026-09-13 07:25:14'),
(7, '041205086612', 'Kavitha A/P Subramaniam', 'Diploma Teknologi Maklumat', '$2y$10$7hFZVkKeNgUlGDIbCQxWsel5v.Y0w8VxXL81U13cgB3IocWWpb9rC', 72.50, '2026-09-13 07:25:14'),
(8, '050719074411', 'Muhammad Danial Bin Radzi', 'Diploma Teknologi Maklumat', '$2y$10$DAeG0n/aH9c5QB0SqqwzX.i/IXFxmy.KPLo2RwzBDFXTFEX7hUgGW', 95.00, '2026-09-13 07:25:14'),
(9, '040923081198', 'Ling Wei Jie', 'Diploma Teknologi Maklumat', '$2y$10$7hFZVkKeNgUlGDIbCQxWsel5v.Y0w8VxXL81U13cgB3IocWWpb9rC', 68.00, '2026-09-13 07:25:14'),
(10, '050130026677', 'Nur Farhana Binti Razak', 'Diploma Teknologi Maklumat', '$2y$10$7hFZVkKeNgUlGDIbCQxWsel5v.Y0w8VxXL81U13cgB3IocWWpb9rC', 81.00, '2026-09-13 07:25:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nric` (`nric`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

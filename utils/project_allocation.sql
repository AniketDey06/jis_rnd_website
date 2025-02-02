-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 31, 2025 at 09:33 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rnd_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `project_allocation`
--

CREATE TABLE `project_allocation` (
  `post_id` int NOT NULL,
  `faculty_id` varchar(50) NOT NULL,
  `progress_report` text,
  `status` enum('0','1','2') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `com_status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `project_allocation`
--

INSERT INTO `project_allocation` (`post_id`, `faculty_id`, `progress_report`, `status`, `com_status`, `created_at`, `updated_at`) VALUES
(7, 'FAC1010', 'progress_report/1738315157_Sorting in Java - 3 Techniques.pdf', '2', '0', '2025-01-31 08:12:22', '2025-01-31 09:19:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project_allocation`
--
ALTER TABLE `project_allocation`
  ADD PRIMARY KEY (`post_id`,`faculty_id`),
  ADD KEY `fk_project_faculty` (`faculty_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project_allocation`
--
ALTER TABLE `project_allocation`
  ADD CONSTRAINT `fk_project_faculty` FOREIGN KEY (`faculty_id`) REFERENCES `faculty_info` (`faculty_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_project_post` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

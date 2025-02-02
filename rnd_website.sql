-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 01, 2025 at 03:48 PM
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
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `faculty_id` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('superadmin','admin') DEFAULT 'admin',
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `login_time` datetime DEFAULT NULL,
  `data_time` datetime DEFAULT NULL,
  `session_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`faculty_id`, `name`, `email`, `password`, `role`, `status`, `created_at`, `updated_at`, `login_time`, `data_time`, `session_token`) VALUES
('ADM-00001', 'Super Admin', 'admin@example.com', '$2y$10$FfMYO8/WXDievZhblf/ZyOwjkE0y.wXdjUWGbXXRifpSG2wc/5vIW', 'superadmin', 'active', '2025-01-28 11:12:14', '2025-02-01 15:38:38', '2025-02-01 21:08:38', '2025-02-01 15:38:38', '345ae911fbbd78d3caa43d62a2805161ce591375dee9398544de4a10f8aa3955');

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `attachment_id` int NOT NULL,
  `post_id` int NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `uploaded_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`attachment_id`, `post_id`, `file_name`, `file_path`, `uploaded_at`) VALUES
(3, 7, '1738352289_money_receipt.pdf', '../../R&D%20website/forms/uploads_post/1738352289_money_receipt.pdf', '2025-01-28 13:14:09'),
(4, 8, 'SE important math.pdf', '../../R&D%20website/forms/uploads_post/1738380252_SE important math.pdf', '2025-02-01 03:24:12'),
(5, 9, 'Job Sequencing with Deadline.pdf', '../../R&D%20website/forms/uploads_post/1738380414_Job Sequencing with Deadline.pdf', '2025-02-01 03:26:54'),
(6, 10, 'SE important math.pdf', '../../R&D%20website/forms/uploads_post/1738380524_SE important math.pdf', '2025-02-01 03:28:44'),
(7, 11, 'SE important math.pdf', '../../R&D%20website/forms/uploads_post/1738380870_SE important math.pdf', '2025-02-01 03:34:30'),
(8, 12, 'time scedule.pdf', '../forms/uploads_post/1738422290_time scedule.pdf', '2025-02-01 15:04:50'),
(9, 13, 'JIS_RFMO.pdf', '../forms/uploads_post/1738423991_JIS_RFMO.pdf', '2025-02-01 15:33:11');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `education_id` int NOT NULL,
  `faculty_id` varchar(50) DEFAULT NULL,
  `institute_name` varchar(150) NOT NULL,
  `university_board` varchar(150) NOT NULL,
  `course` varchar(100) NOT NULL,
  `marks` varchar(50) NOT NULL,
  `passing_year` year NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`education_id`, `faculty_id`, `institute_name`, `university_board`, `course`, `marks`, `passing_year`, `created_at`) VALUES
(1, 'FAC001', 'ABC University', 'ABC Board', 'B.Sc. Computer Science', '8.5 CGPA', '2006', '2025-01-23 07:38:44'),
(2, 'FAC001', 'XYZ University', 'XYZ Board', 'M.Sc. Computer Science', '9.0 CGPA', '2008', '2025-01-23 07:38:44'),
(11, 'FAC002', 'cvb', 'cvb', 'cbv', 'cvb', '2025', '2025-01-23 21:09:38'),
(12, 'FAC003', 'NIT', 'MAKAUT', 'BCA', '10 cgpa', '2025', '2025-01-24 03:43:06'),
(13, 'FAC004', 'NIT', 'MAKAUT', 'BCA', '10 cgpa', '2025', '2025-01-24 04:41:48'),
(14, 'FAC/12345', 'NIT', 'MAKAUT', 'BCA', '10 cgpa', '2025', '2025-01-24 16:55:08'),
(18, 'FAC006', 'NIT', 'MAKAUT', 'BCA', '10 cgpa', '2025', '2025-01-28 10:21:02'),
(19, 'FAC007', 'NIT', 'MAKAUT', 'BCA', '10 cgpa', '2025', '2025-01-28 12:29:46'),
(20, 'FAC1010', 'NIT', 'MAKAUT', 'BCA', '10 cgpa', '2025', '2025-01-31 06:21:51');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_info`
--

CREATE TABLE `faculty_info` (
  `faculty_id` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `institute` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` enum('Male','Female','Others') NOT NULL,
  `password` varchar(255) NOT NULL,
  `department` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `alternate_phone` varchar(15) DEFAULT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `data_time` datetime DEFAULT NULL,
  `session_token` varchar(255) DEFAULT NULL,
  `login_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `faculty_info`
--

INSERT INTO `faculty_info` (`faculty_id`, `name`, `email`, `institute`, `dob`, `address`, `gender`, `password`, `department`, `phone`, `alternate_phone`, `profile_photo`, `created_at`, `updated_at`, `data_time`, `session_token`, `login_time`) VALUES
('FAC/12345', 'jonny', 'santanuraj937@gmail.com', 'NIT', '2025-01-22', 'South 24 parganas, Subhasgram Sukanta Sarani', 'Male', '$2y$10$8S37ogIdAP1vCfd4vpWexuTjKVbjGNoCYXEM1b/v1EuETbiv4mBxS', 'MCA', '8981456797', '1223312211', 'uploads/photo_6793c5ecadb926.17170825.png', '2025-01-24 16:55:08', '2025-01-31 17:23:43', '2025-01-31 17:23:43', 'ea1746d6ad6160d7d07d7d5778dd5189c8f6e2fab7a7656e92d34e21137ad212', '2025-01-31 17:23:43'),
('FAC001', 'John Doe', 'john.doe@example.com', 'JIS K', '1985-05-15', '123 Main St', 'Male', '$2y$10$hashedPasswordHere', 'Computer Science', '9876543210', '9123456789', 'uploads/john_doe.png', '2025-01-23 07:37:54', '2025-01-23 07:37:54', NULL, NULL, NULL),
('FAC002', 'santanu raj', 'test@example.us', 'NIT', '2025-01-24', 'South 24 parganas, Subhasgram Sukanta Sarani', 'Male', '$2y$10$B0o.yppd7mliMI5blN0rf.qoWPrvl3oL.PwSyzi68/Jb/UcUs/Bf6', 'hkjhj', '9330054911', '1223312233', 'uploads/photo_6792b011ea8090.98911771.png', '2025-01-23 21:09:38', '2025-01-26 08:03:33', '2025-01-26 08:03:33', 'e4b0fd19b3c936328eea58985c60e12bbe54f9c5c4aff6d91ffcc560d2124d20', '2025-01-26 08:03:33'),
('FAC003', 'coder', 'san@gmail.com', 'JIS K', '2025-01-24', 'South 24 parganas, Subhasgram Sukanta Sarani', 'Male', '$2y$10$U6KNk5Z3kfCl6qj8oEw.nOZl3995tbW5TMV.sGwL9Rx5TJBQWCxxy', 'MCA', '9330054912', '1223312235', 'uploads/photo_67930c4adc2582.69138092.png', '2025-01-24 03:43:06', '2025-01-30 12:55:56', '2025-01-30 12:55:56', '17f971639a70f2d900c679dd9901f65e69506ad86eeeec42407179403329edea', '2025-01-30 12:55:56'),
('FAC004', 'coder', 'santanuraj75@gmail.com', 'JIS K', '2025-01-24', 'South 24 parganas, Subhasgram Sukanta Sarani', 'Male', '12', 'MCA', '9330054910', '1223312230', 'uploads/photo_67931a0cbd0505.94314027.png', '2025-01-24 04:41:48', '2025-01-24 04:41:48', NULL, NULL, NULL),
('FAC006', 'coder', 'sukdebdas991@gmail.com', 'NIT', '2025-01-28', 'South 24 parganas, Subhasgram Sukanta Sarani', 'Male', '$2y$10$XwmD8t74dWt99pnPF.TCnehvuA16TIKux1iZ8s.P7gTnF2odG9eVy', 'MCA', '9330054915', '9330054919', 'uploads/photo_6798af8e04bfb6.07017504.png', '2025-01-28 10:21:02', '2025-01-28 10:23:16', '2025-01-28 10:23:16', '068d4ad166c77da5f8b95d74bb6f69fd855d88bc50357b6a9af93a04beb93d08', '2025-01-28 10:23:16'),
('FAC007', 'santanu raj', 'admin@util.com', 'NIT', '2025-01-28', 'South 24 parganas, Subhasgram Sukanta Sarani', 'Male', '$2y$10$FfMYO8/WXDievZhblf/ZyOwjkE0y.wXdjUWGbXXRifpSG2wc/5vIW', 'MCA', '9330054929', '1223318899', 'uploads/photo_6798cdba044b87.42000078.png', '2025-01-28 12:29:46', '2025-01-28 16:43:42', '2025-01-28 16:43:42', '189ec169448d09a5dc2bc2ee38d311f85e5b109ef45dc52c3b6ee1a36142ed44', '2025-01-28 16:43:42'),
('FAC1010', 'aniket', 'meaniketdey@gmail.com', 'NIT', '2025-01-31', 'South 24 parganas, Subhasgram Sukanta Sarani', 'Male', '$2y$10$WOagXWIvebsNy02YayXghuWLm5BGMUF4S46JKemdN76sjMhN/25Cq', 'MCA', '1234567891', '1234567892', 'uploads/photo_679c6bfeecf215.15452410.jpg', '2025-01-31 06:21:51', '2025-02-01 11:57:12', '2025-02-01 11:57:12', 'e53baef14b642e07b23ad74d5e1e4806f0a4a134740382badf69d7e60b1de119', '2025-02-01 11:57:12');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `otp` varchar(6) NOT NULL,
  `otp_expiry` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `otp`, `otp_expiry`, `created_at`) VALUES
(1, 'test@example.us', '225075', '2025-01-27 08:45:49', '2025-01-27 08:30:49'),
(2, 'santanuraj937@gmail.com', '266054', '2025-01-27 14:43:40', '2025-01-27 08:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `domain` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `faculty_id` varchar(50) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `domain`, `description`, `file_path`, `faculty_id`, `status`, `created_at`, `updated_at`) VALUES
(7, 'Abcd3', 'ML', 'asdafdsdgds fhgsfhfdg hdgfhj fghjfgjhdsfd nnnn nnnnn nnnnnnn nnnnnnnnn', '../forms/uploads_post/1738352289_money_receipt.pdf', 'ADM-00001', '1', '2025-01-28 13:14:09', '2025-02-01 15:03:27'),
(8, 'Banking System', 'AI', 'This is a importent project', '../forms/uploads_post/1738380252_SE important math.pdf', 'ADM-00001', '1', '2025-02-01 03:24:12', '2025-02-01 15:03:42'),
(9, 'Forensic App', 'AI,ML', 'This is a importent project', '../forms/uploads_post/1738380414_Job Sequencing with Deadline.pdf', 'ADM-00001', '0', '2025-02-01 03:26:54', '2025-02-01 15:03:53'),
(10, 'Voting App', 'AI, ML', 'This is a importent project', '../forms/uploads_post/1738380524_SE important math.pdf', 'ADM-00001', '0', '2025-02-01 03:28:44', '2025-02-01 15:04:03'),
(11, 'Traffic Detaction App', 'AI', 'This is a importent project', '../forms/uploads_post/1738380870_SE important math.pdf', 'ADM-00001', '0', '2025-02-01 03:34:30', '2025-02-01 15:04:13'),
(12, 'Image Recogniser', 'AI, ML, Python', 'this a amazing project', '../forms/uploads_post/1738422290_time scedule.pdf', 'ADM-00001', '1', '2025-02-01 15:04:50', '2025-02-01 15:05:09'),
(13, 'R&D website', 'HTML, CSS, JS, PHP', 'This JIS Group project Made by Aniket and Santanu', '../forms/uploads_post/1738423991_JIS_RFMO.pdf', 'ADM-00001', '0', '2025-02-01 15:33:11', '2025-02-01 15:34:32');

-- --------------------------------------------------------

--
-- Table structure for table `professional_info`
--

CREATE TABLE `professional_info` (
  `prof_id` int NOT NULL,
  `faculty_id` varchar(50) DEFAULT NULL,
  `area_of_interest` text NOT NULL,
  `languages_known` text NOT NULL,
  `skills` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `professional_info`
--

INSERT INTO `professional_info` (`prof_id`, `faculty_id`, `area_of_interest`, `languages_known`, `skills`, `created_at`, `updated_at`) VALUES
(1, 'FAC001', 'Artificial Intelligence, Machine Learning', 'English, Hindi', 'Python, TensorFlow, Keras', '2025-01-23 12:34:41', '2025-01-23 12:34:41'),
(30, 'FAC002', 'sdfds', 'fhgx', 'fgh', '2025-01-23 21:09:38', '2025-01-23 21:09:38'),
(31, 'FAC003', 'AI', 'bengali,english', 'java,R', '2025-01-24 03:43:06', '2025-01-24 03:43:06'),
(32, NULL, 'AI', 'bengali,english', 'java,R', '2025-01-24 04:41:48', '2025-01-24 04:41:48'),
(33, NULL, 'AI', 'bengali,english', 'java,R', '2025-01-24 16:55:08', '2025-01-24 16:55:08'),
(35, NULL, 'AI', 'bengali,english', 'java,R', '2025-01-26 08:59:48', '2025-01-26 08:59:48'),
(36, NULL, 'AI', 'sdfdsf', 'cbfvcbfv', '2025-01-26 09:02:30', '2025-01-26 09:02:30'),
(38, 'FAC006', 'AI', 'bengali,english', 'java,R', '2025-01-28 10:21:02', '2025-01-28 10:21:02'),
(39, 'FAC007', 'AI', 'bengali,english', 'java,R', '2025-01-28 12:29:46', '2025-01-28 12:29:46'),
(40, 'FAC1010', 'AI', 'bengali,english', 'java,R', '2025-01-31 06:21:51', '2025-01-31 06:21:51');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int NOT NULL,
  `faculty_id` varchar(50) DEFAULT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `faculty_id`, `project_name`, `project_description`, `created_at`) VALUES
(1, 'FAC001', 'AI in Healthcare', 'Developed a model to predict disease outbreaks using AI techniques.', '2025-01-23 07:39:05'),
(2, 'FAC001', 'Blockchain in Education', 'Implemented a blockchain solution for secure student credential verification.', '2025-01-23 07:39:05'),
(8, 'FAC002', 'fhg', 'fg', '2025-01-23 21:09:38'),
(9, 'FAC003', 'R&amp;D WEBSITE', 'NOTHING', '2025-01-24 03:43:06'),
(10, 'FAC004', 'R&amp;D WEBSITE', 'NOTHING', '2025-01-24 04:41:48'),
(11, 'FAC/12345', 'R&amp;D WEBSITE', 'NOTHING', '2025-01-24 16:55:08'),
(15, 'FAC006', 'R&amp;D WEBSITE', 'NOTHING', '2025-01-28 10:21:02'),
(16, 'FAC007', 'R&amp;D WEBSITE', 'NOTHING', '2025-01-28 12:29:46'),
(17, 'FAC1010', 'R&amp;D WEBSITE', 'NOTHING', '2025-01-31 06:21:51');

-- --------------------------------------------------------

--
-- Table structure for table `project_allocation`
--

CREATE TABLE `project_allocation` (
  `id` int NOT NULL,
  `post_id` varchar(50) NOT NULL,
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

INSERT INTO `project_allocation` (`id`, `post_id`, `faculty_id`, `progress_report`, `status`, `com_status`, `created_at`, `updated_at`) VALUES
(1, '7', 'FAC1010', 'progress_report/1738318171_ADMIT CARD.pdf', '2', '1', '2025-01-31 10:09:31', '2025-02-01 05:50:38'),
(2, '7', 'FAC1010', 'progress_report/1738318197_database of GEPO.png', '2', '1', '2025-01-31 10:09:57', '2025-02-01 05:50:38'),
(3, '8', 'FAC1010', 'progress_report/1738401973_database of GEPO.png', '2', '1', '2025-02-01 09:26:13', '2025-02-01 11:02:24');

-- --------------------------------------------------------

--
-- Table structure for table `project_applications`
--

CREATE TABLE `project_applications` (
  `post_id` int NOT NULL,
  `poc` varchar(255) NOT NULL,
  `faculty_id` varchar(50) NOT NULL,
  `status` enum('0','1','2') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `project_applications`
--

INSERT INTO `project_applications` (`post_id`, `poc`, `faculty_id`, `status`, `created_at`, `updated_at`) VALUES
(7, 'uploads/1738082679_database of GEPO.png', 'FAC007', '1', '2025-01-28 16:44:39', '2025-01-31 09:23:55'),
(7, 'uploads/1738307728_database of GEPO.png', 'FAC1010', '2', '2025-01-31 07:15:28', '2025-01-31 08:32:04'),
(8, 'uploads/1738396182_database of GEPO.png', 'FAC1010', '2', '2025-02-01 07:49:42', '2025-02-01 08:29:48'),
(9, 'uploads/1738398439_database of GEPO.png', 'FAC1010', '1', '2025-02-01 08:27:19', '2025-02-01 08:27:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`faculty_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`attachment_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`education_id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `faculty_info`
--
ALTER TABLE `faculty_info`
  ADD PRIMARY KEY (`faculty_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `professional_info`
--
ALTER TABLE `professional_info`
  ADD PRIMARY KEY (`prof_id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `project_allocation`
--
ALTER TABLE `project_allocation`
  ADD PRIMARY KEY (`id`,`post_id`),
  ADD KEY `fk_faculty_id` (`faculty_id`);

--
-- Indexes for table `project_applications`
--
ALTER TABLE `project_applications`
  ADD PRIMARY KEY (`post_id`,`faculty_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `attachment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `education_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `professional_info`
--
ALTER TABLE `professional_info`
  MODIFY `prof_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `project_allocation`
--
ALTER TABLE `project_allocation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attachments`
--
ALTER TABLE `attachments`
  ADD CONSTRAINT `attachments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE;

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty_info` (`faculty_id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `admins` (`faculty_id`) ON DELETE CASCADE;

--
-- Constraints for table `professional_info`
--
ALTER TABLE `professional_info`
  ADD CONSTRAINT `professional_info_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty_info` (`faculty_id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty_info` (`faculty_id`) ON DELETE CASCADE;

--
-- Constraints for table `project_allocation`
--
ALTER TABLE `project_allocation`
  ADD CONSTRAINT `fk_faculty_id` FOREIGN KEY (`faculty_id`) REFERENCES `faculty_info` (`faculty_id`);

--
-- Constraints for table `project_applications`
--
ALTER TABLE `project_applications`
  ADD CONSTRAINT `fk_post_id` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

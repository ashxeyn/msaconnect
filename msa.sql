-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2025 at 02:02 AM
-- Server version: 11.4.5-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `msa`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_msa`
--

CREATE TABLE `about_msa` (
  `id` int(11) NOT NULL,
  `mission` text NOT NULL,
  `vision` text NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bylaws`
--

CREATE TABLE `bylaws` (
  `bylaw_id` int(11) NOT NULL,
  `section_no` int(11) NOT NULL,
  `article_no` int(11) NOT NULL,
  `content` text NOT NULL,
  `effective_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bylaw_signatories`
--

CREATE TABLE `bylaw_signatories` (
  `bylaw_id` int(11) NOT NULL,
  `officer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `calendar_activities`
--

CREATE TABLE `calendar_activities` (
  `activity_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `activity_date` date NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calendar_activities`
--

INSERT INTO `calendar_activities` (`activity_id`, `title`, `description`, `activity_date`, `created_by`, `created_at`) VALUES
(1, 'sdfsd', 'fsfsfsz', '2025-04-19', NULL, '2025-04-04 09:37:20'),
(4, 'dfsd', 'sdfs', '2025-04-19', NULL, '2025-04-05 05:33:40'),
(5, 'dfsd', 'sdfs', '2025-04-25', NULL, '2025-04-05 05:37:49'),
(6, 'ds', 'ds', '2025-04-25', NULL, '2025-04-05 05:37:59'),
(10, 'sx', 'asd', '2025-04-26', 1, '2025-04-06 03:01:04'),
(11, 'sheeshable', 'ass', '2025-04-25', 1, '2025-04-06 03:06:47');

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `college_id` int(11) NOT NULL,
  `college_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`college_id`, `college_name`) VALUES
(2, 'CCSSw'),
(3, 'CN'),
(6, 'sd');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `uploaded_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `image`, `description`, `created_at`, `uploaded_by`) VALUES
(4, 'Screenshot 2024-08-28 183144.png', 'ddd', '2025-03-31 07:50:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `executive_officers`
--

CREATE TABLE `executive_officers` (
  `officer_id` int(11) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `position_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `school_year_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `program_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `executive_officers`
--

INSERT INTO `executive_officers` (`officer_id`, `last_name`, `first_name`, `middle_name`, `position_id`, `image`, `school_year_id`, `created_at`, `program_id`) VALUES
(1, 'sadw', 'sAddsds', 'sasdsadadd', 1, 'f7656dd63795611f2caca47e6d0431c1-removebg-preview.png', 1, '2025-02-26 04:10:25', NULL),
(5, 'asd', 'asd', 'asdasdas', 1, '1740546920_9a5c2190-2ba0-45a3-bd54-52b7e9bb404e.jpg', 1, '2025-02-26 05:15:20', NULL),
(6, 'Kulong', 'Ron', '', 4, '1740568054_WIN_20250222_21_54_58_Pro.jpg', 2, '2025-02-26 11:07:34', NULL),
(13, 'ads', 'asdsd', 'asdasd', 14, '', 1, '2025-03-24 12:52:40', NULL),
(14, 'sdfs', 'sdfsd', 'dsfsdf', 15, 'wap.png', 2, '2025-03-25 08:12:17', 3);

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `faq_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `category` enum('General Questions','Events and Activities','Donation and Support','Contact and Support') NOT NULL DEFAULT 'General Questions',
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`faq_id`, `question`, `answer`, `category`, `created_at`) VALUES
(18, 'sad', 'asd', 'Events and Activities', '2025-03-26 16:52:34'),
(22, 'asas', 'asss', 'General Questions', '2025-03-26 17:19:20'),
(23, 'asd', 'sdad', 'General Questions', '2025-03-26 17:21:56'),
(24, 'as', 'asd', 'General Questions', '2025-03-26 17:27:29'),
(25, 's', 's', 'Events and Activities', '2025-03-26 17:29:18'),
(26, 'fvfv', 'fdfvdf', 'Donation and Support', '2025-03-27 03:25:41');

-- --------------------------------------------------------

--
-- Table structure for table `fb_updates`
--

CREATE TABLE `fb_updates` (
  `post_id` varchar(255) NOT NULL,
  `message` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `post_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `friday_prayers`
--

CREATE TABLE `friday_prayers` (
  `prayer_id` int(11) NOT NULL,
  `khutbah_date` date NOT NULL,
  `speaker` varchar(255) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `friday_prayers`
--

INSERT INTO `friday_prayers` (`prayer_id`, `khutbah_date`, `speaker`, `topic`, `location`, `created_by`, `created_at`) VALUES
(1, '2025-04-11', 'ron kulong', 'ewan', 'lab2', 17, '2025-04-06 03:27:48');

-- --------------------------------------------------------

--
-- Table structure for table `officer_positions`
--

CREATE TABLE `officer_positions` (
  `position_id` int(11) NOT NULL,
  `position_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `officer_positions`
--

INSERT INTO `officer_positions` (`position_id`, `position_name`) VALUES
(6, 'Auditor'),
(15, 'Budget and Finance'),
(12, 'Dahwa and Religious Instructions'),
(20, 'Documentation'),
(13, 'Documentation and Publication'),
(3, 'External Vice President'),
(2, 'Internal Vice President'),
(14, 'Logistics and Operations'),
(7, 'P.I.O.'),
(11, 'P.I.O. External'),
(10, 'P.I.O. Internal'),
(1, 'President'),
(8, 'Project Manager'),
(19, 'Publication'),
(21, 'Registration'),
(17, 'Registration and Membership'),
(4, 'Secretary'),
(16, 'Statistics and Evaluations'),
(18, 'Tahara'),
(5, 'Treasurer'),
(9, 'Vice President');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `program_id` int(11) NOT NULL,
  `program_name` varchar(255) NOT NULL,
  `college_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`program_id`, `program_name`, `college_id`) VALUES
(3, 'shheshDD', 2);

-- --------------------------------------------------------

--
-- Table structure for table `school_years`
--

CREATE TABLE `school_years` (
  `school_year_id` int(11) NOT NULL,
  `school_year` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school_years`
--

INSERT INTO `school_years` (`school_year_id`, `school_year`) VALUES
(1, '2023-2024'),
(2, '2024-2025');

-- --------------------------------------------------------

--
-- Table structure for table `student_paid`
--

CREATE TABLE `student_paid` (
  `paid_id` int(11) NOT NULL,
  `no_students` int(11) NOT NULL,
  `school_year_id` int(11) NOT NULL,
  `semester` enum('1st','2nd') NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_paid`
--

INSERT INTO `student_paid` (`paid_id`, `no_students`, `school_year_id`, `semester`, `created_at`) VALUES
(1, 2, 2, '1st', '2025-04-10 11:37:17');

-- --------------------------------------------------------

--
-- Table structure for table `transparency_report`
--

CREATE TABLE `transparency_report` (
  `report_id` int(11) NOT NULL,
  `report_date` date NOT NULL,
  `expense_detail` text NOT NULL,
  `expense_category` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `transaction_type` enum('Cash In','Cash Out') NOT NULL,
  `semester` enum('1st','2nd') NOT NULL,
  `school_year_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transparency_report`
--

INSERT INTO `transparency_report` (`report_id`, `report_date`, `expense_detail`, `expense_category`, `amount`, `transaction_type`, `semester`, `school_year_id`) VALUES
(1, '2025-02-28', 'SHEESH', 'Administrative cost', 5000.00, 'Cash In', '1st', 2),
(2, '2025-03-01', 'aefef', 'FULL TANK', 2000.00, 'Cash Out', '1st', 2),
(3, '2025-02-20', 'sds', 'asdas', 400.00, 'Cash Out', '1st', 2),
(4, '2025-01-16', 'sfsd', 'sdsdfsdfs', 2000.00, 'Cash In', '1st', 2),
(5, '2025-04-09', 'SSS', '', 3333.00, 'Cash In', '1st', 2),
(6, '2025-04-10', 'dasd', 'asdasdad', 200.00, 'Cash Out', '1st', 2),
(7, '2025-04-04', 'fsfs', '', 3234.00, 'Cash In', '2nd', 2),
(9, '2025-04-12', 'shhesh', '', 1000.00, 'Cash In', '1st', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','sub-admin') NOT NULL DEFAULT 'sub-admin',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `position_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `middle_name`, `last_name`, `username`, `email`, `password`, `role`, `created_at`, `position_id`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'admin@wmsu.edu.ph', '$2y$10$cpAg005FgxgFGWv2uauF4egLs8ONXcMUSzOPlbaF0guCcdyOLmGZi', 'admin', '2025-02-23 03:11:49', NULL),
(2, 'Shane', 'admin', 'Jimenez', 'ashxeynx', 'HZ202300259@wmsu.edu.ph', '$2y$10$Aow.SzRWGFBga4v5153m8Oe1IDlKWewGIZ5CPrNELpEJnzOVB4OTS', 'admin', '2025-02-23 04:03:09', NULL),
(3, 'Rone', 'admin', 'Kulong', 'ron', 'admin@gmail.com', '$2y$10$agnEQCmt8ADyI/4a2dtvlOlGkDbbxvo/50I9Av11RQjuwluVKCrOe', 'admin', '2025-02-23 04:04:44', NULL),
(7, 'sheesh', 'admin', 'bnb', 'rronn', 'ron@wmsu.edu.ph', '$2y$10$o4peCliKj4cIXPooJOYOfu8e.MIuwvkWiuTcdMANEH4QIef1QxFO6', 'admin', '2025-02-24 07:24:44', NULL),
(9, 'sfvf', 'admin', 'dfvf', 'manager12', 'dvd@wmsu.edu.ph', '$2y$10$c4Igsr/pEcBpW742vdBvheznDxPHt0NlHkM3K1L8gzqKBBwtaAnIq', 'admin', '2025-02-24 07:32:26', NULL),
(16, 'asdapakingshe', 'asdasfasss', 'adfaef', 'asdfefe', 'HZ2234300259@wmsu.edu.ph', '$2y$10$9r626N9kIa2AynwspQ2qJuFF.jGWTI9eYzBuH8w4inKomC0Uizw/O', 'sub-admin', '2025-02-24 08:37:21', 1),
(17, 'sub', 'sub', 'sub', 'sub', 'sub@wmsu.edu.ph', '$2y$10$5CO4kvwyMDftD4aDxRR3Wu1VNPcQGPIftETFGlOYJDQOcRy8x0uYi', 'sub-admin', '2025-02-24 08:51:33', 2),
(22, 'dcasfafa', 'asdfasfSSS', 'asfaf', 'afsf', 'HZsdsd300259@wmsu.edu.ph', '$2y$10$bRmm3Z9PBKrlazrhTN024epeRX.qGVgUbFZP4VnadXiyRRlLyggMW', 'sub-admin', '2025-03-18 12:30:28', 17);

-- --------------------------------------------------------

--
-- Table structure for table `volunteers`
--

CREATE TABLE `volunteers` (
  `volunteer_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `section` varchar(10) NOT NULL,
  `program_id` int(11) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cor_file` varchar(255) NOT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `volunteers`
--

INSERT INTO `volunteers` (`volunteer_id`, `first_name`, `middle_name`, `last_name`, `year`, `section`, `program_id`, `contact`, `email`, `cor_file`, `status`, `user_id`, `created_at`) VALUES
(6, 'adadasda', 'asdasdas', 'asdasd', 1, 'C', 3, '09926314071', 'HZ202300259@wmsu.edu.ph', '1742888757_webcam-toy-photo30.jpg', 'approved', 1, '2025-03-25 07:45:57'),
(7, 'sdasda', 'dasdasdasdas', 'asasdasdas', 0, 'sa', 3, '09926314071', 'sdfsfd@wmsu.edu.ph', 'wap.png', 'approved', 1, '2025-03-25 07:46:50'),
(8, 'hfhdg', 'dfadsfsdfs', 'sdcsdcsd', 3, 'dvv', 3, '09926314074', 'HZ202300259@wmsu.edu.ph', '', 'pending', NULL, '2025-03-25 07:51:06'),
(9, 'sdfsdf', 'sdfsf', 'sdfsdf', 3, 'dfsdfs', 3, '09926314071', 'HZ20230ff59@wmsu.edu.ph', '', 'pending', NULL, '2025-03-25 07:59:07'),
(10, 'axasx', 'asxas', 'sxaxs', 1, 'asxs', 3, '09926314074', 'sdfsssfd@wmsu.edu.ph', '', 'pending', NULL, '2025-03-25 08:34:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_msa`
--
ALTER TABLE `about_msa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bylaws`
--
ALTER TABLE `bylaws`
  ADD PRIMARY KEY (`bylaw_id`);

--
-- Indexes for table `bylaw_signatories`
--
ALTER TABLE `bylaw_signatories`
  ADD PRIMARY KEY (`bylaw_id`,`officer_id`),
  ADD KEY `officer_id` (`officer_id`);

--
-- Indexes for table `calendar_activities`
--
ALTER TABLE `calendar_activities`
  ADD PRIMARY KEY (`activity_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`college_id`),
  ADD UNIQUE KEY `college_name` (`college_name`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `uploaded_by` (`uploaded_by`);

--
-- Indexes for table `executive_officers`
--
ALTER TABLE `executive_officers`
  ADD PRIMARY KEY (`officer_id`),
  ADD KEY `position_id` (`position_id`),
  ADD KEY `school_year_id` (`school_year_id`),
  ADD KEY `fk_program_id` (`program_id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `fb_updates`
--
ALTER TABLE `fb_updates`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `friday_prayers`
--
ALTER TABLE `friday_prayers`
  ADD PRIMARY KEY (`prayer_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `officer_positions`
--
ALTER TABLE `officer_positions`
  ADD PRIMARY KEY (`position_id`),
  ADD UNIQUE KEY `position_name` (`position_name`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`program_id`),
  ADD UNIQUE KEY `program_name` (`program_name`),
  ADD KEY `college_id` (`college_id`);

--
-- Indexes for table `school_years`
--
ALTER TABLE `school_years`
  ADD PRIMARY KEY (`school_year_id`),
  ADD UNIQUE KEY `school_year` (`school_year`);

--
-- Indexes for table `student_paid`
--
ALTER TABLE `student_paid`
  ADD PRIMARY KEY (`paid_id`),
  ADD KEY `school_year_id` (`school_year_id`);

--
-- Indexes for table `transparency_report`
--
ALTER TABLE `transparency_report`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `school_year_id` (`school_year_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_users_officer_positions` (`position_id`);

--
-- Indexes for table `volunteers`
--
ALTER TABLE `volunteers`
  ADD PRIMARY KEY (`volunteer_id`),
  ADD KEY `program_id` (`program_id`),
  ADD KEY `fk_adminusers` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_msa`
--
ALTER TABLE `about_msa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bylaws`
--
ALTER TABLE `bylaws`
  MODIFY `bylaw_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `calendar_activities`
--
ALTER TABLE `calendar_activities`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `college_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `executive_officers`
--
ALTER TABLE `executive_officers`
  MODIFY `officer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `friday_prayers`
--
ALTER TABLE `friday_prayers`
  MODIFY `prayer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `officer_positions`
--
ALTER TABLE `officer_positions`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `school_years`
--
ALTER TABLE `school_years`
  MODIFY `school_year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_paid`
--
ALTER TABLE `student_paid`
  MODIFY `paid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transparency_report`
--
ALTER TABLE `transparency_report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `volunteers`
--
ALTER TABLE `volunteers`
  MODIFY `volunteer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bylaw_signatories`
--
ALTER TABLE `bylaw_signatories`
  ADD CONSTRAINT `bylaw_signatories_ibfk_1` FOREIGN KEY (`bylaw_id`) REFERENCES `bylaws` (`bylaw_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bylaw_signatories_ibfk_2` FOREIGN KEY (`officer_id`) REFERENCES `executive_officers` (`officer_id`) ON DELETE CASCADE;

--
-- Constraints for table `calendar_activities`
--
ALTER TABLE `calendar_activities`
  ADD CONSTRAINT `calendar_activities_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`uploaded_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `executive_officers`
--
ALTER TABLE `executive_officers`
  ADD CONSTRAINT `executive_officers_ibfk_1` FOREIGN KEY (`position_id`) REFERENCES `officer_positions` (`position_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `executive_officers_ibfk_2` FOREIGN KEY (`school_year_id`) REFERENCES `school_years` (`school_year_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_program_id` FOREIGN KEY (`program_id`) REFERENCES `programs` (`program_id`) ON DELETE SET NULL;

--
-- Constraints for table `friday_prayers`
--
ALTER TABLE `friday_prayers`
  ADD CONSTRAINT `friday_prayers_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL;

--
-- Constraints for table `programs`
--
ALTER TABLE `programs`
  ADD CONSTRAINT `programs_ibfk_1` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`college_id`) ON DELETE CASCADE;

--
-- Constraints for table `student_paid`
--
ALTER TABLE `student_paid`
  ADD CONSTRAINT `student_paid_ibfk_1` FOREIGN KEY (`school_year_id`) REFERENCES `school_years` (`school_year_id`) ON DELETE CASCADE;

--
-- Constraints for table `transparency_report`
--
ALTER TABLE `transparency_report`
  ADD CONSTRAINT `transparency_report_ibfk_1` FOREIGN KEY (`school_year_id`) REFERENCES `school_years` (`school_year_id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_officer_positions` FOREIGN KEY (`position_id`) REFERENCES `officer_positions` (`position_id`) ON DELETE SET NULL;

--
-- Constraints for table `volunteers`
--
ALTER TABLE `volunteers`
  ADD CONSTRAINT `fk_adminusers` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `volunteers_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `programs` (`program_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

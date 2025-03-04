-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2025 at 01:45 PM
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
(1, 'CCS');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'sad', 'sA', 'sa', 1, '1740543025_9a5c2190-2ba0-45a3-bd54-52b7e9bb404e.jpg', 1, '2025-02-26 04:10:25', NULL),
(2, 'Jimenez', 'Shane', 'Duran', 1, '', 1, '2025-02-26 04:11:08', NULL),
(3, 'asd', 'asd', 'asd', 3, '1740546778_476328821_1861332794634994_9100291471033062968_n.jpg', 1, '2025-02-26 05:12:58', NULL),
(4, 'asd', 'asd', 'asdasdas', 1, '1740546797_9a5c2190-2ba0-45a3-bd54-52b7e9bb404e.jpg', 1, '2025-02-26 05:13:17', NULL),
(5, 'asd', 'asd', 'asdasdas', 1, '1740546920_9a5c2190-2ba0-45a3-bd54-52b7e9bb404e.jpg', 1, '2025-02-26 05:15:20', NULL),
(6, 'Kulong', 'Ron', '', 4, '1740568054_WIN_20250222_21_54_58_Pro.jpg', 2, '2025-02-26 11:07:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `faq_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `location` varchar(255) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'BS in Computer Science', 1);

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
(8, 'ron paullan', NULL, 'kulong', 'enorr', '12345@wmsu.edu.ph', '$2y$10$D1Oz8C9NfYDfAZ1ejpev.ejvFuvfunGTYkH37hd.SW0awww70GbQ2', 'sub-admin', '2025-02-24 07:29:11', NULL),
(9, 'sfvf', 'admin', 'dfvf', 'manager12', 'dvd@wmsu.edu.ph', '$2y$10$c4Igsr/pEcBpW742vdBvheznDxPHt0NlHkM3K1L8gzqKBBwtaAnIq', 'admin', '2025-02-24 07:32:26', NULL),
(10, 'assd', NULL, 'asdasd', 'asdas', 'HZ202210259@wmsu.edu.ph', '$2y$10$.KzO.v0vsmmj3SffHhYY3.VUG83M9el6XAubikvBAipBsdU7m/MQS', 'sub-admin', '2025-02-24 07:46:01', NULL),
(11, 'asdd', NULL, 'asdqd', 'asdd', 'asdas@wmsu.edu.ph', '$2y$10$Gxjz.Npic42ijRpbSCHqZe7ROSMNHQ7nbBTc7yemzjVEWFTBIcRdm', 'sub-admin', '2025-02-24 07:46:23', NULL),
(12, 'rertwe', NULL, 'rdthrh', 'dhdrtyer', 'dfhfth@wmsu.edu.ph', '$2y$10$XW9O/0dn0B8Fv0sqVi9hPeQLdgPCtCD/9YMpX1ekVZWOi8nsK2SZq', 'sub-admin', '2025-02-24 07:51:48', NULL),
(13, 'Rone', NULL, 'Kulong', 'paullan', 'paullan@wmsu.edu.ph', '$2y$10$9vvoQ1.OsPnWsGmNSXUHPeQcM6tyaHB2lP6tB9nIp/hAMWIPgNbpG', 'sub-admin', '2025-02-24 08:26:05', NULL),
(14, 'asda', NULL, 'asdasd', 'asdasdas', 'johndoe@wmsu.edu.ph', '$2y$10$J5JORVXlS1HuTEDnKN8jAO29hX8Befzz7xpAMWYZXdxO//DFZqgvG', 'sub-admin', '2025-02-24 08:28:23', NULL),
(15, 'asf', 'adfa', 'dfd', 'sdfsdf', 'sdfsfd@wmsu.edu.ph', '$2y$10$rmHtcnmEM82ck2Krif8grep1SwjNmUQOFSUQ/Othx1rC8hQKGctOK', 'sub-admin', '2025-02-24 08:34:17', NULL),
(16, 'asdasd', 'asdasfa', 'adfaef', 'asdfefe', 'HZ2234300259@wmsu.edu.ph', '$2y$10$9r626N9kIa2AynwspQ2qJuFF.jGWTI9eYzBuH8w4inKomC0Uizw/O', 'sub-admin', '2025-02-24 08:37:21', 1),
(17, 'sub', 'sub', 'sub', 'sub', 'sub@wmsu.edu.ph', '$2y$10$5CO4kvwyMDftD4aDxRR3Wu1VNPcQGPIftETFGlOYJDQOcRy8x0uYi', 'sub-admin', '2025-02-24 08:51:33', 2),
(18, 'sheesh', 'asdasd', 'bnb', 'shhesh', 'Hdd02300259@wmsu.edu.ph', '$2y$10$uUUPK4LYhRzBdVMjK3H40.tiBJLLi3njdnH25eQ8R5u6Lerezw0Nu', 'sub-admin', '2025-02-26 11:04:30', 19);

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
  `registered_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `volunteers`
--

INSERT INTO `volunteers` (`volunteer_id`, `first_name`, `middle_name`, `last_name`, `year`, `section`, `program_id`, `contact`, `email`, `cor_file`, `status`, `registered_by`, `created_at`) VALUES
(1, 'Shane', 'Duran', 'Jimenez', 1, 'C', 1, '09926314071', 'HZ202300259@wmsu.edu.ph', '1740573648_Screenshot 2024-08-28 183144.png', 'pending', NULL, '2025-02-26 12:40:48'),
(2, 'SASD', 'DASD', 'ASDA', 3, 'C', 1, '09926314071', 'HSSD02300259@wmsu.edu.ph', '', 'pending', NULL, '2025-02-26 12:51:16'),
(3, 'Shane', 'sdcsd', 'sdfsd', 2, 'sd', 1, '09926314071', 'H2332300259@wmsu.edu.ph', '', 'pending', NULL, '2025-02-26 12:51:48'),
(4, 'sheesh', '', 'asdasd', 4, 'C', 1, '09926314071', 'HZ209900259@wmsu.edu.ph', '', 'pending', NULL, '2025-02-27 04:40:04');

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
  ADD KEY `created_by` (`created_by`);

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
  ADD KEY `registered_by` (`registered_by`);

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
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `college_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `executive_officers`
--
ALTER TABLE `executive_officers`
  MODIFY `officer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friday_prayers`
--
ALTER TABLE `friday_prayers`
  MODIFY `prayer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `officer_positions`
--
ALTER TABLE `officer_positions`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `school_years`
--
ALTER TABLE `school_years`
  MODIFY `school_year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transparency_report`
--
ALTER TABLE `transparency_report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `volunteers`
--
ALTER TABLE `volunteers`
  MODIFY `volunteer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL;

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
  ADD CONSTRAINT `volunteers_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `programs` (`program_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `volunteers_ibfk_2` FOREIGN KEY (`registered_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

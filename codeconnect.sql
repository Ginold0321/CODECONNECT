-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2024 at 12:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeconnect`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` int(11) NOT NULL,
  `sender_username` varchar(255) NOT NULL,
  `receiver_username` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `sender_username`, `receiver_username`, `message`, `timestamp`) VALUES
(1, 'sheenalicmo', 'ginold_123', 'Hello', '2024-12-14 04:02:13'),
(2, 'sheenalicmo', 'ginold_123', 'I am sheena', '2024-12-14 04:07:24'),
(3, 'sheenalicmo', 'sheenalicmo', 'I am sheena', '2024-12-14 04:07:43'),
(4, 'sheenalicmo', 'sheenalicmo', 'hi sheena', '2024-12-14 07:17:11'),
(5, 'ginold_123', 'sheenalicmo', 'Hello', '2024-12-14 07:22:13'),
(6, 'ginold_123', 'sheenalicmo', 'how are you?', '2024-12-14 07:22:20'),
(7, 'sheenalicmo', 'ginold_123', 'Hello', '2024-12-15 04:21:46');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `username`, `comment`, `created_at`) VALUES
(1, 'sheenalicmo', 'asdasgdasa', '2024-12-15 11:03:24'),
(2, 'sheenalicmo', 'adagfa', '2024-12-15 11:05:28'),
(3, 'sheenalicmo', 'asfafa', '2024-12-15 11:07:51');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_applications`
--

CREATE TABLE `tutor_applications` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `education_level` varchar(50) NOT NULL,
  `teaching_experience` text NOT NULL,
  `it_experience` text NOT NULL,
  `resume_path` varchar(255) NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT 'pending',
  `profile_image` varchar(255) DEFAULT NULL,
  `rating` decimal(3,2) DEFAULT NULL,
  `languages` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutor_applications`
--

INSERT INTO `tutor_applications` (`id`, `first_name`, `last_name`, `phone_number`, `email`, `education_level`, `teaching_experience`, `it_experience`, `resume_path`, `submitted_at`, `status`, `profile_image`, `rating`, `languages`) VALUES
(1, 'Sheena', 'Licmo', '09924661012', 'sdsagasga@gmail.com', 'Associate Degree', 'sgashfga', 'adasfagga', 'uploads/resumes/675eb3f9467d6_ETHICS-Project (1).pdf', '2024-12-15 10:48:25', 'accept', 'uploads/profile_images/675eb3f94601d_360a6ac7-dd24-4edc-a30f-02465969c11a.jpg', NULL, 'Python');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(50) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `PhoneNumber` varchar(12) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `profile_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `FullName`, `Username`, `Email`, `Location`, `PhoneNumber`, `Password`, `profile_image`) VALUES
(1, 'Sheena Licmo', 'sheenalicmo', 'slicmo.workmail@gmail.com', 'Talisay, Batangas', '09924661012', 'Pass_123', 'uploads/try.png'),
(2, 'Ginold Veloso', 'ginold_123', 'ginold_Veloso@gmail.com', 'Tanauan, Batangas', '09276379183', 'Ginold_123', 'uploads/DHCP.png'),
(3, 'Jhomari Villapando', 'Jhomari1', 'jhomari010609@gmail.com', 'Malvar, Batangas', '09276379183', 'Pass_123', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutor_applications`
--
ALTER TABLE `tutor_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tutor_applications`
--
ALTER TABLE `tutor_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

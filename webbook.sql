-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2025 at 11:52 PM
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
-- Database: `webbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(10) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `friend_user_id` int(11) NOT NULL,
  `request` int(10) NOT NULL,
  `accepted` int(1) DEFAULT 0,
  `rejected` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `user_id`, `friend_user_id`, `request`, `accepted`, `rejected`) VALUES
(1, 39942367, 7859770, 0, 1, 0),
(2, 39942367, 22380989, 0, 1, 0),
(3, 7859770, 39942367, 0, 1, 1),
(4, 7859770, 6543672, 1, 1, 0),
(5, 7859770, 39942367, 0, 1, 1),
(6, 7859770, 39942367, 0, 1, 1),
(7, 7859770, 39942367, 0, 1, 1),
(8, 7859770, 39942367, 0, 1, 1),
(9, 7859770, 6543672, 1, 1, 0),
(10, 7859770, 6543672, 1, 1, 0),
(11, 7859770, 6543672, 1, 1, 0),
(12, 39942367, 6543672, 1, 1, 0),
(13, 39942367, 6543672, 1, 1, 0),
(14, 39942367, 6543672, 1, 1, 0),
(15, 39942367, 6543672, 1, 1, 0),
(16, 39942367, 7859770, 0, 1, 0),
(17, 39942367, 7859770, 0, 1, 0),
(18, 39942367, 7859770, 0, 1, 0),
(19, 39942367, 7859770, 0, 1, 0),
(20, 39942367, 7859770, 0, 1, 0),
(21, 39942367, 7859770, 0, 1, 0),
(22, 39942367, 7859770, 0, 1, 0),
(23, 39942367, 7859770, 0, 1, 0),
(24, 39942367, 6543672, 1, 1, 0),
(25, 39942367, 6543672, 1, 1, 0),
(26, 39942367, 6543672, 1, 1, 0),
(27, 39942367, 6543672, 1, 1, 0),
(28, 39942367, 22380989, 0, 1, 0),
(29, 39942367, 22380989, 0, 1, 0),
(30, 39942367, 22380989, 0, 1, 0),
(31, 39942367, 6543672, 1, 1, 0),
(32, 39942367, 6543672, 1, 1, 0),
(33, 39942367, 6543672, 1, 1, 0),
(34, 39942367, 6543672, 1, 1, 0),
(35, 39942367, 23641444, 0, 1, 0),
(36, 39942367, 23641444, 0, 1, 0),
(37, 7859770, 23641444, 0, 1, 0),
(38, 7859770, 23641444, 0, 1, 0),
(39, 7859770, 23641444, 0, 1, 0),
(40, 7859770, 23641444, 0, 1, 0),
(41, 22380989, 39942367, 0, 0, 1),
(42, 22380989, 6543672, 1, 0, 0),
(43, 22380989, 6543672, 1, 0, 0),
(44, 6543672, 39942367, 1, 1, 0),
(45, 6543672, 39942367, 1, 1, 0),
(46, 23641444, 39942367, 0, 1, 0),
(47, 22380989, 23641444, 1, 0, 0),
(48, 22380989, 23641444, 1, 0, 0),
(49, 12278012, 20971401, 0, 1, 0),
(50, 12278012, 31125157, 1, 0, 0),
(51, 12278012, 68115094, 1, 0, 0),
(52, 12278012, 68115094, 1, 0, 0),
(53, 12278012, 68115094, 1, 0, 0),
(54, 12278012, 39942367, 1, 0, 0),
(55, 12278012, 39942367, 1, 0, 0),
(56, 12278012, 39942367, 1, 0, 0),
(57, 12278012, 39942367, 1, 0, 0),
(58, 12278012, 39942367, 1, 0, 0),
(59, 12278012, 39942367, 1, 0, 0),
(60, 12278012, 39942367, 1, 0, 0),
(61, 12278012, 22380989, 1, 0, 0),
(62, 12278012, 22380989, 1, 0, 0),
(63, 68115094, 20971401, 1, 0, 0),
(64, 68115094, 20971401, 1, 0, 0),
(65, 68115094, 39942367, 1, 0, 0),
(66, 68115094, 39942367, 1, 0, 0),
(67, 68115094, 39942367, 1, 0, 0),
(68, 68115094, 31125157, 1, 0, 0),
(69, 68115094, 31125157, 1, 0, 0),
(70, 68115094, 12278012, 1, 0, 0),
(71, 68115094, 12278012, 1, 0, 0),
(72, 68115094, 12278012, 1, 0, 0),
(73, 68115094, 23641444, 1, 0, 0),
(74, 39942367, 12278012, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `status` mediumtext DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`status`, `time`, `user_id`, `id`) VALUES
('how are you', '2025-01-07 20:34:36', 39942367, 1),
('this is my 2nd post', '2025-01-07 20:48:26', 39942367, 3),
('this is my 2nd post', '2025-01-07 21:50:02', 0, 4),
('this is my 2nd post', '2025-01-07 21:55:09', 0, 5),
('A Facebook status is a short post that users can share on their profile to express thoughts, updates', '2025-01-08 02:31:40', 39942367, 6),
('A Facebook status is a short post that users can share on their profile to express thoughts, updates', '2025-01-08 02:31:43', 39942367, 7),
('\"The only limit to our realization of tomorrow is our doubts of today. Keep pushing forward! 💪 #Stay', '2025-01-08 02:32:26', 39942367, 8),
('\"The only limit to our realization of tomorrow is our doubts of today. Keep pushing forward! 💪 #Stay', '2025-01-08 02:32:32', 39942367, 9),
('\"The only limit to our realization of tomorrow is our doubts of today. Keep pushing forward! 💪 #Stay', '2025-01-08 02:32:37', 39942367, 10),
('\"The only limit to our realization of tomorrow is our doubts of today. Keep pushing forward! 💪 #Stay', '2025-01-08 02:32:40', 39942367, 11),
('\"The only limit to our realization of tomorrow is our doubts of today. Keep pushing forward! 💪 #Stay', '2025-01-08 02:32:50', 39942367, 12),
('Starting this week with a positive mindset and endless possibilities. 🌟 Embracing the little moments that make life worthwhile. Grateful for the journey so far, but excited for what’s to come. Sometimes, the best way to find yourself is to lose yourself in new experiences. Taking one step at a time, knowing the best is yet to come. Learning to appreciate the quiet moments of reflection. Surrounding myself with good energy and positive vibes. Hoping for new opportunities and adventures to come my way. Letting go of the things that no longer serve me. Here’s to growth, self-love, and endless dreams. ✨', '2025-01-08 02:36:24', 39942367, 13),
('Tried to be productive today... but Netflix had other plans. 😅 #ProcrastinationLevelExpert', '2025-01-08 02:37:16', 39942367, 14),
('Tried to be productive today... but Netflix had other plans. 😅 #ProcrastinationLevelExpert', '2025-01-08 02:37:24', 39942367, 15),
('Tried to be productive today... but Netflix had other plans. 😅 #ProcrastinationLevelExpert', '2025-01-08 02:37:31', 39942367, 16),
('why duplicating ', '2025-01-08 02:38:14', 39942367, 17),
('why duplicating ', '2025-01-08 02:38:18', 39942367, 18),
('why duplicating ', '2025-01-08 02:38:24', 39942367, 19),
('why duplicating ', '2025-01-08 02:43:19', 39942367, 20),
('', '2025-01-08 02:43:32', 39942367, 21),
('now?', '2025-01-08 02:43:56', 39942367, 22),
('how about now?', '2025-01-08 02:44:29', 39942367, 23),
('how about now?', '2025-01-08 02:44:33', 39942367, 24),
('how about now?', '2025-01-08 02:44:36', 39942367, 25),
('how about now?', '2025-01-08 02:44:42', 39942367, 26),
('how about now?', '2025-01-08 02:44:46', 39942367, 27),
('', '2025-01-08 02:45:04', 39942367, 28),
('whats going on', '2025-01-08 02:45:44', 39942367, 30),
('Albert Einstein\r\n\"The important thing is not to stop questioning. Curiosity has its own reason for existing. One cannot help but be in awe when he contemplates the mysteries of eternity, of life, of the marvelous structure of reality. It is enough if one tries merely to comprehend a little of this mystery every day. Never lose a holy curiosity.\"', '2025-01-08 02:47:15', 39942367, 32),
('my first post\r\n', '2025-01-08 16:32:26', 6543672, 37),
('sdgfgs', '2025-01-08 16:41:55', 7859770, 39),
('this is my first post\r\nsdfds', '2025-01-08 16:42:08', 7859770, 40),
('this is sakif ROy', '2025-01-08 16:43:07', 22380989, 41),
('i am a\r\n', '2025-01-13 17:17:59', 12278012, 46),
('this is a\r\n', '2025-01-13 17:22:18', 12278012, 47),
('this is latest', '2025-01-13 17:24:11', 12278012, 48),
('this is b', '2025-01-13 17:31:14', 20971401, 49),
('this is c', '2025-01-13 17:31:43', 31125157, 50),
('this is d', '2025-01-13 17:32:10', 68115094, 51);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`first_name`, `last_name`, `gender`, `email`, `password`, `user_id`) VALUES
('jamiul', 'islam', 'male', 'lazim_islam@gmail.com', '9806', 6543672),
('sadia', 'islam', 'male', 'sadiaislam9806@gmail.com', '1', 7859770),
('a', 'a', 'male', 'a@gmail.com', 'a', 12278012),
('b', 'b', 'male', 'b@gmail.com', 'b', 20971401),
('sakif', 'roy', 'male', 'sakifroy@gmail.com', '1', 22380989),
('a', 'b', 'male', 'abc@gmail.com', '1', 23641444),
('c', 'c', 'male', 'c@gmail.com', 'c', 31125157),
('Zafir ken', 'Zaman', 'male', 'zafirkenzaman9806@gmail.com', '1', 39942367),
('d', 'd', 'male', 'd@gmail.com', 'd', 68115094);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86314222;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

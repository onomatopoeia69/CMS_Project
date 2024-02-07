-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2024 at 01:24 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_title`) VALUES
(3, 'PHP '),
(4, 'Java '),
(5, 'Ruby '),
(6, 'C#'),
(7, 'C'),
(8, 'C++'),
(25, 'Perl'),
(28, 'HTML'),
(29, 'Fortran'),
(38, 'Swift'),
(39, 'Hadoop');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(7) NOT NULL,
  `comment_post_id` int(7) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(57, 40, 'John Doe', 'JohnDoe@gmail.com', 'I wish that your wish do come true.', 'approved', '2023-12-24 13:02:03'),
(58, 43, 'John Doe', 'JohnDoe@gmail.com', 'Do not ever Give up brother, focus on your goal and do not listen on what others saying just keep practicing. Even the most Excellent programmers in the world doing mistakes but they are keep practicing until you see them as perfect what they are today. Life is not a race its all about timing and perseverance.', 'unapproved', '2024-01-02 01:20:09'),
(59, 42, 'John Doe', 'JohnDoe@gmail.com', 'Don\'t Be sad . Happy New Year', 'unapproved', '2024-01-04 13:36:16'),
(61, 79, 'John Doe', 'test', 'test', 'approved', '2024-01-19 19:43:25'),
(64, 79, 'wdadwa', 'awdwad', 'dawawd', 'approved', '2024-01-21 01:07:20'),
(67, 79, 'wdadwawdadwa', 'awdwad', 'dawawd', 'approved', '2024-01-21 01:09:41'),
(68, 79, 'wdadwawdadwa', 'awdwad', 'dawawd', 'unapproved', '2024-01-21 01:10:25'),
(69, 79, 'sdadsad', 'dasdasd', 'dadawdwad', 'unapproved', '2024-01-21 01:11:09');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_view_counts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_view_counts`) VALUES
(38, 3, 'test', 'test', '2023-12-22', 'avatar3.jpg', '  test                        ', 'PHP', 0, 'Published', 1),
(40, 3, 'DAY 3', 'Carl Langres', '2023-12-24', 'avatar3.jpg', 'please gusto ko nang mag wildrift , sana maayos na ung phone ko                        ', 'PHP', 1, 'Published', 0),
(41, 3, 'BAD NEWS ', 'Carl Langres', '2023-12-30', 'meat2.jpg', 'Sira na ang phone ko totally.... awitttttttttttt             ', 'PHP', 0, 'Published', 0),
(42, 3, 'Happy New Year', 'Carl Langres', '2024-01-01', 'meat2.jpg', 'Happy New Year !!!', 'PHP', 1, 'Published', 1),
(43, 3, 'Exhausted', 'Carl Langres', '2024-01-02', 'sky.jpg', 'Nawawalan na ako ng pagasa , help meeeee!!!!                        ', 'PHP', 1, 'Published', 1),
(79, 3, 'Midnight Code', 'Carl Langres', '2024-01-19', 'avatar3.jpg', '<p>tfyfvgbbuhb</p>', 'qwr', 23, 'Published', 2),
(81, 3, 'test', 'test', '2024-01-24', 'resume.jpg', '<p>test</p>', 'test', 0, 'Published', 6),
(85, 3, 'awdwada', 'wdawdwd', '2024-02-06', '1687230720084.jpg', '<p>dwadw</p>', 'dwadda', 0, 'Published', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `user_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `user_firstname`, `user_lastname`, `user_role`, `email`, `date`, `user_image`) VALUES
(4, 'kar', 'test', 'Carl James', 'Langres', 'admin', 'langrescarljames.student@gmail.com', '2023-12-22 14:38:07', ''),
(7, 'JohnDOOOEEdonnuut', 'test', 'John', 'Doe', 'admin', 'JohnDoe@gmail.com', '2023-12-23 21:06:31', ''),
(20, 'Michael ', '$2y$10$Q/PD3D6Cr2r/6V997JRgNOl43yz5u.4/i8gRU3V3bjeGauqRTpnu.', '', '', 'subscriber', 'micaheljordan@gmail.com', '2024-01-15 21:44:40', ''),
(21, 'erik', '', 'erik', 'matti', 'subscriber', 'erik@gmail.com', '2024-01-16 19:49:58', ''),
(24, 'demo', '$2y$10$aMi65e/Z2TCkqNZvKfcZqekkV1OsNwiT0A379KNc3S6OnMCLAV4PO', 'demo', '', 'subscriber', 'demo@gmail.com', '2024-01-17 18:42:40', ''),
(25, 'boy', 'dwadwadwd', 'C++', 'Language', 'subscriber', 'jerbaks56@gmail.com', '2024-01-25 00:39:14', ''),
(26, 'test', '$2y$10$M7NrQxcp3L0YjRkrsUsf/OgOxkba44WO0eTxNwjMklxbCMIYifKU.', '', '', 'subscriber', 'try@gmail.com', '2024-01-27 00:33:45', ''),
(28, 'test', '$2y$10$BsUBoXU2YhI7Tls8Lh715.yKLD.sh8ZU1KAPb56QAE0gZt8/SCH76', '', '', 'admin', 'testing@gmail.com', '2024-01-30 23:40:59', ''),
(29, 'test', '$2y$10$3DiTXEYgv8rkws3WN9ixBuOCQzdndtsHPxq3eqVAdY166EuDZjwTO', 'carl', 'james', 'admin', 'langrescarljames.student@gmail.com', '2024-01-30 23:46:19', ''),
(30, 'try', '', 'try', '', 'admin', 'trytry@gmail.com', '2024-01-31 00:05:39', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(130, 'hqf71bi5081unid9324mpbgi68', 1707208453);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

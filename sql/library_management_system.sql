-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2021 at 02:23 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(30) NOT NULL,
  `category` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `image` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `writename` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `totalbook` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `category`, `name`, `image`, `writename`, `description`, `totalbook`) VALUES
(1, '2', 'Seed Story', '1545979531_image.png', 'Kholil', 'asd', 10),
(2, '2', 'Bengali_Kings', '1546162954_image.png', 'Zohir Raihan', 'sfsa', 4),
(3, '2', 'Smily Cat', 'bg_3.jpg', 'Rashi', 'Cat Smilling Things', 7),
(4, '2', 'Fan', '1546162728_image.png', 'Farhan Akter', 'You will know how to make a fan', 3),
(5, '2', 'House Maintain', '1546082919_image.png', 'Azad', 'adasd', 0),
(6, '2', 'Eye', '1546139218_image.png', 'Kholil', 'akslfn', 6),
(7, '2', 'Umbrella', '1546161599_image.png', 'Kholil', 'asd', 5),
(8, '2', 'Tiger', '1546139218_image.png', 'Asad', 'asd', 0),
(9, '28', 'Avengers', '1546139218_image.png', 'J. Rouling', 'Thriller', 13),
(10, '29', 'The Reader', 'bg_1.jpg', 'Jack', 'asdsd', 10),
(11, '29', 'Pirate', 'bg_2.jpg', 'Jack Sparrow', 'asdf', 0),
(12, '32', 'Beginner Learining English', 'bg.jpg', 'B K . Walker', 'adsdf', 15);

-- --------------------------------------------------------

--
-- Table structure for table `book_issue`
--

CREATE TABLE `book_issue` (
  `id` int(11) NOT NULL,
  `b_id` int(30) NOT NULL,
  `m_id` int(30) NOT NULL,
  `issue_date` date NOT NULL,
  `expire_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `book_issue`
--

INSERT INTO `book_issue` (`id`, `b_id`, `m_id`, `issue_date`, `expire_date`) VALUES
(66, 3, 6, '2021-07-07', '2021-07-01'),
(126, 5, 7, '2021-07-07', '2021-07-14');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_auto_id` int(20) NOT NULL,
  `id` int(20) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_auto_id`, `id`, `name`) VALUES
(2, 1, 'History'),
(28, 9, 'Comic'),
(29, 2, 'English'),
(30, 4, 'Bangla'),
(31, 5, 'Mathmatics'),
(32, 6, 'IELTS');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(30) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `number` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `blood-group` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `fine` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `name`, `email`, `number`, `dob`, `blood-group`, `fine`) VALUES
(3, 'Marzan Hossain', 'alauddinseeds@gmail.com', '324546457', '1996-12-20', 'A+', 0),
(4, 'a', 'a@gmail.com', '12331', '1996-12-20', 'A+', 0),
(5, 'Marzan Hossain', 'b@gmial.com', '123235345', '2201-12-21', 'B+', 0),
(6, 'd', 'd@gmail.com', '1236123', '1998-02-14', 'B+', 0),
(7, 'z', 'z@gmail.com', '1235647', '2012-12-12', 'A+', 0);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `firstname`, `lastname`, `email`, `username`, `password`) VALUES
(1, 'a', 'b', 'fan@gmail.com', 'a', '123'),
(2, 'b', 'b', 'b@gmail.com', 'b', '123'),
(3, 'c', 'c', 'c@gmail.com', 'c', '123'),
(4, 'd', 'd', 'd@gmail.com', 'd', '123'),
(5, 'c', 'c', 'c@gmial.com', 'c', '123'),
(7, 'Marzan', 'Hossain', 'alauddinseeds@gmail.com', 'Marzan1234eng', '123'),
(8, 'Marzan', 'Hossain', 'alauddinseeds@gmail.com', 'admin', 'admin'),
(9, 'g', 'g', 'g@gmail.com', 'g', '123'),
(10, 'md', 'nahid', 'abc@xyz', 'anahid', '123'),
(11, 'J', 'K', 'z@gmail.com', 'z', '12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_issue`
--
ALTER TABLE `book_issue`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `issue` (`b_id`,`m_id`),
  ADD KEY `m_id` (`m_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_auto_id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `book_issue`
--
ALTER TABLE `book_issue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_auto_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_issue`
--
ALTER TABLE `book_issue`
  ADD CONSTRAINT `book_issue_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `member` (`id`),
  ADD CONSTRAINT `book_issue_ibfk_2` FOREIGN KEY (`b_id`) REFERENCES `book` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

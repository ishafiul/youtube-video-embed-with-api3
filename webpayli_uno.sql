-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 21, 2021 at 09:08 AM
-- Server version: 5.7.33
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webpayli_uno`
--

-- --------------------------------------------------------

--
-- Table structure for table `code`
--

CREATE TABLE `code` (
  `id` int(11) NOT NULL,
  `permit_video` int(11) NOT NULL,
  `validity_price_id` int(11) NOT NULL,
  `uniq_code` varchar(50) NOT NULL,
  `code_user` varchar(50) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `code`
--

INSERT INTO `code` (`id`, `permit_video`, `validity_price_id`, `uniq_code`, `code_user`, `create_date`) VALUES
(1, 2, 15, 'sdf', 'sdfs', '2021-02-21 10:01:30'),
(17, 55, 1, '603211', '', '2021-02-21 12:26:10'),
(18, 57, 2, '12345', '', '2021-02-21 14:01:58');

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `id` int(11) NOT NULL,
  `price_value` float NOT NULL,
  `price_title` varchar(50) NOT NULL,
  `validity_days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`id`, `price_value`, `price_title`, `validity_days`) VALUES
(1, 1.55, '3 Days Trial', 3),
(2, 17.75, '1 Month', 30),
(3, 12.75, '1 Year', 365);

-- --------------------------------------------------------

--
-- Table structure for table `site_info`
--

CREATE TABLE `site_info` (
  `id` int(11) NOT NULL,
  `s_name` varchar(50) NOT NULL,
  `s_title` varchar(50) NOT NULL,
  `s_sub_title` varchar(50) NOT NULL,
  `description` text,
  `txt1_title` varchar(100) NOT NULL,
  `txt1_description` text,
  `txt2_title` varchar(100) NOT NULL,
  `txt2_description` text,
  `txt3_title` varchar(100) NOT NULL,
  `txt3_description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_info`
--

INSERT INTO `site_info` (`id`, `s_name`, `s_title`, `s_sub_title`, `description`, `txt1_title`, `txt1_description`, `txt2_title`, `txt2_description`, `txt3_title`, `txt3_description`) VALUES
(1, 'The Art of Fight', 'The Art of Fight', 'Brazilian Jiu Jitsu - MMA - Judo - Sumbo', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.  Lorem Ipsum is simply dummy text of the printing and typesetting industry.  Lorem Ipsum is simply dummy text of the printing and typesetting industry.  Lorem Ipsum is simply dummy text of the printing and typesetting industry.    ', 'Lorem Ipsum is simply ', '  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Lorem Ipsum is simply ', '   Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Lorem Ipsum is simply ', '     Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.  ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `user_type`, `pass`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `video_info`
--

CREATE TABLE `video_info` (
  `id` int(11) NOT NULL,
  `video_title` varchar(100) NOT NULL,
  `video_thumbnail` varchar(100) NOT NULL,
  `video_price` int(11) NOT NULL,
  `video_code` varchar(50) NOT NULL,
  `yt_title` varchar(100) NOT NULL,
  `paypal_link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video_info`
--

INSERT INTO `video_info` (`id`, `video_title`, `video_thumbnail`, `video_price`, `video_code`, `yt_title`, `paypal_link`) VALUES
(40, 'video1', 'https://i.ytimg.com/vi/32Gfu9KWeMo/hqdefault.jpg', 11, '32Gfu9KWeMo', 'Cocky Tai Chi Master DESTROYED BY MMA Fighter | Fake Martial Arts Masters DESTROYED', ''),
(41, 'video 2', 'https://i.ytimg.com/vi/3UB4Ya5-BJ8/hqdefault.jpg', 22, '3UB4Ya5-BJ8', 'Tai chi Fighter ABSOLUTELY DESTROYS BOXER (EXPOSING FAKES)', ''),
(42, 'video 3', 'https://i.ytimg.com/vi/lwEMYHIglbs/hqdefault.jpg', 33, 'lwEMYHIglbs', 'RANKING Martial Arts Styles! Fighting Style Tier List w/ Sensei Seth', ''),
(43, 'video 4 edit test', 'https://i.ytimg.com/vi/ycs9zCNXjYI/hqdefault.jpg', 10, 'ycs9zCNXjYI', 'McDojo vs Real dojo', ''),
(49, 'video 5', 'https://i.ytimg.com/vi/L4QoE9MHO0s/hqdefault.jpg', 50, 'L4QoE9MHO0s', 'CRAZIEST Transformations in NBA History..', ''),
(50, 'video 6', 'https://i.ytimg.com/vi/K5O0sJ-1LaI/hqdefault.jpg', 20, 'K5O0sJ-1LaI', 'Training With Marine WORLD RECORD Pullup Holder | Michael Eckert', 'www.google.com'),
(51, 'video 7', 'https://i.ytimg.com/vi/VIb0R0hvpys/hqdefault.jpg', 33, 'VIb0R0hvpys', '0 to 5 Pull Ups in 5 Steps - US Marine // Michael Eckert', 'http://www.yahoo.com'),
(53, 'Custom title', 'https://i.ytimg.com/vi/DMsFWMn3eXE/hqdefault.jpg', 20, 'DMsFWMn3eXE', 'Chris Heria VS Super Sergio - BAR WARS 2k16 #4', 'http://www.yahoooooo.com'),
(54, 'title23', 'https://i.ytimg.com/vi/NHj7VHwFBr8/hqdefault.jpg', 232, 'NHj7VHwFBr8', 'Lee Wade Turner VS Jarryd Rubinstein - Bar Wars 2k16 #3', 'http://www.google.com'),
(55, 'Custom title 2', 'https://i.ytimg.com/vi/o18ZJaPVbjw/hqdefault.jpg', 11, 'o18ZJaPVbjw', 'Hannibal For King Full Workout | RAW & UNCUT', 'http://www.google.com'),
(56, '2', 'https://i.ytimg.com/vi/-6Hs4AaZ2Xo/hqdefault.jpg', 22, '-6Hs4AaZ2Xo', 'The Proof does 50 Pull ups and 100 Push ups in under 5 Minutes | Thats Good Money', ''),
(57, '2 The Three Most Critical Concepts of BJJ', 'https://i.ytimg.com/vi/j5RaxEV9fx8/hqdefault.jpg', 10, 'j5RaxEV9fx8', 'The Three Most Critical Concepts of BJJ', 'http://www.gooooogle.com'),
(58, 'Custom Title 3', 'https://i.ytimg.com/vi/O8s_kKCSfeU/hqdefault.jpg', 25, 'O8s_kKCSfeU', 'The Jiu-Jitsu Formula: Principle-Centered BJJ with Rob Biernacki', 'http://www.yahoo.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_info`
--
ALTER TABLE `site_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_info`
--
ALTER TABLE `video_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `code`
--
ALTER TABLE `code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `site_info`
--
ALTER TABLE `site_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `video_info`
--
ALTER TABLE `video_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

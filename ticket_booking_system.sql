-- phpMyAdmin SQL Dump
-- version 4.4.15.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 18, 2022 at 09:40 PM
-- Server version: 5.7.33-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticket_booking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_history`
--

CREATE TABLE IF NOT EXISTS `booking_history` (
  `id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `screen_id` int(11) NOT NULL,
  `seats_booked` text NOT NULL,
  `booked_count` int(11) NOT NULL,
  `booked_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  `updated_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_history`
--

INSERT INTO `booking_history` (`id`, `show_id`, `user_id`, `screen_id`, `seats_booked`, `booked_count`, `booked_date`, `status`, `updated_date`) VALUES
(24, 1, 1, 1, '3', 1, '2022-03-18 21:24:46', 0, '2022-03-18 21:24:46'),
(23, 2, 1, 2, '2', 1, '2022-03-18 19:02:00', 0, '2022-03-18 19:02:00'),
(22, 1, 1, 1, '2', 1, '2022-03-18 17:51:19', 0, '2022-03-18 17:51:19'),
(21, 1, 3, 1, '1', 1, '2022-03-18 17:50:23', 0, '2022-03-18 17:50:23');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `name`) VALUES
(1, 'The Batman');

-- --------------------------------------------------------

--
-- Table structure for table `screens`
--

CREATE TABLE IF NOT EXISTS `screens` (
  `id` int(11) NOT NULL,
  `s_screen_name` varchar(255) NOT NULL,
  `theatre_id` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `screens`
--

INSERT INTO `screens` (`id`, `s_screen_name`, `theatre_id`) VALUES
(3, 'screen 1', 1),
(4, 'screen 2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

CREATE TABLE IF NOT EXISTS `shows` (
  `id` int(11) NOT NULL,
  `show_name` varchar(255) NOT NULL,
  `screen_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `show_time` datetime NOT NULL,
  `seat_count` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`id`, `show_name`, `screen_id`, `movie_id`, `show_time`, `seat_count`) VALUES
(1, 'Matinee', 3, 1, '2022-03-18 02:30:00', 10),
(2, 'Evening show', 4, 1, '2022-03-18 06:30:00', 10);

-- --------------------------------------------------------

--
-- Table structure for table `theatres`
--

CREATE TABLE IF NOT EXISTS `theatres` (
  `id` int(11) NOT NULL,
  `t_name` varchar(255) NOT NULL,
  `address` text
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theatres`
--

INSERT INTO `theatres` (`id`, `t_name`, `address`) VALUES
(1, 'Trinity', 'Pathanamthitta');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `role_type` enum('1','2') NOT NULL DEFAULT '2' COMMENT '1=>admin, 2=>user',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `role_type`, `created_date`, `updated_date`) VALUES
(1, 'alex@gmail.com', '$2y$10$3Y8CNnITUXkgVPHXOT2L9elSK8Tp7wRyKaFAYUt6wvh5OHkENEwOa', 'alex', '2', '2022-03-16 00:33:31', NULL),
(4, 'admin@gmail.com', '$2y$10$oQXlyrVFjpLRvFoXOeITx.fIlWxQgCvVIejBBHLec1sOFUf/0luwO', 'admin', '1', '2022-03-18 07:55:09', NULL),
(3, 'alex1@gmail.com', '$2y$10$BtY/3UXlZ8KRI3RCOsjqfuK/6NLadkPaS8N5L47oG5O9rdUZYR/Oi', 'ronie', '2', '2022-03-18 00:46:51', NULL),
(5, 'sam@gmail.com', '$2y$10$YfvbWUKWg70J4JLspNFmS.02PiSsuhKwKSikAv6RpGfQ4a41e6/xS', 'sam', '2', '2022-03-18 18:00:19', NULL),
(6, 'rony@gmail.com', '$2y$10$flDm/P2OvShrExlFyePUxu24aPW7Qokue/RyydIju1vr7/wfw4MRe', 'rony', '2', '2022-03-18 18:04:54', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_history`
--
ALTER TABLE `booking_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `screens`
--
ALTER TABLE `screens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theatres`
--
ALTER TABLE `theatres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_history`
--
ALTER TABLE `booking_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `screens`
--
ALTER TABLE `screens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `shows`
--
ALTER TABLE `shows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `theatres`
--
ALTER TABLE `theatres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

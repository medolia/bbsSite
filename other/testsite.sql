-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 25, 2018 at 12:09 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


-- Database: `testsite`
--
-- ---------------------------------------------------------
--
-- Table structure for table `users`
--
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Dumping data for table `users`
--
INSERT INTO `users` (`id`, `username`, `password`, `created`) VALUES
(1, 'shehryar', 'MTIzNDU=', '2018-05-25 06:17:14');
-- ---------------------------------------------------------
--
-- Table structure for table `articles`
--
CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `headline` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `comment` varchar(255) DEFAULT 'No Comment',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE InnoDB DEFAULT CHARSET=latin1;
--
-- Dumping data for table `articles`
--
INSERT INTO `articles` (`article_id`, `username`, `headline`, `content`, `created`) VALUES
(1, 'shehryar', `Myterious Lady`, 'While staring at her, I may find it harder to focus on seeking for my inner peace.', '2019-09-12 06:47:25');
-- ---------------------------------------------------------
--
-- Table structure for table `comments`
--
CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE InnoDB DEFAULT CHARSET=latin1;

--
-- dumping data for table `articles`
--
INSERT INTO `comments` (`article_id`, `username`, `headline`, `content`, `created`) VALUES
(1, 'shehryar', `Myterious Lady`, 'While staring at her, I may find it harder to focus on seeking for my inner peace.', '2019-09-12 06:47:25');
--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT ``

COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



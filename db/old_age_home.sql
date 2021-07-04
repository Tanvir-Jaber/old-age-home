-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2019 at 02:08 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `old_age_home`
--
CREATE DATABASE IF NOT EXISTS `old_age_home` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `old_age_home`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `fname` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `lname` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `pnumber` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `pass`, `type`, `fname`, `lname`, `address`, `city`, `country`, `pnumber`) VALUES
(1, 'admin@mail.com', '12345', 'admin', 'Tanvir', 'Hossan', 'Khulsi,CTG', 'Chittagong', 'Bangladesh', '01876826168');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `fullname` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `age` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `gurdianname` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `gurdianpnumber` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `health` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `joindate` date DEFAULT NULL,
  `cost` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_id` text COLLATE utf8_unicode_ci NOT NULL,
  `notification` text COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `status` text COLLATE utf8_unicode_ci DEFAULT 'no',
  `left_member` varchar(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `fullname`, `gender`, `age`, `gurdianname`, `gurdianpnumber`, `address`, `health`, `joindate`, `cost`, `member_id`, `notification`, `status`, `left_member`) VALUES
(4, 'Renuka', 'Male', '50', 'jaber', '01525635898', 'muradpur', 'normal', '2019-11-26', '1500', 'OAH-125', 'no', 'no', 'no'),
(6, 'Tanvir', 'Male', '50', 'Rafa', '01850751714', 'Town', 'normal', '2019-11-05', '5000', 'OAH-126', 'no', 'no', 'no'),
(8, 'Rokibul', 'Male', '52', 'Jaber', '01876826168', 'Muradpur', 'normal', '2019-11-07', '5000', 'OAH-127', 'no', 'no', 'no'),
(9, 'Kulsuma Begum', 'Male', '65', 'Rafiq Uddin', '01878363379', 'Khulsi', 'normal', '2019-11-09', '2000', 'OAH-128', 'no', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `moderator`
--

CREATE TABLE `moderator` (
  `id` int(11) NOT NULL,
  `fullname` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `pnumber` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `approved` text COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `moderator`
--

INSERT INTO `moderator` (`id`, `fullname`, `email`, `address`, `city`, `country`, `pass`, `pnumber`, `type`, `approved`) VALUES
(4, 'Jaber', 'Jaber@mail.com', 'Khulsi', 'Chittagong', 'Bangladesh', '1234', '01878363313', 'moderator', 'yes'),
(19, 'Salek Uddin', 'salek@mail.com', 'Muradpur', 'Chittagong', 'Bangladesh', '1234', '01878363384', 'moderator', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `moneydetails`
--

CREATE TABLE `moneydetails` (
  `amount` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `pnumber` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `transaction` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `moneydetails`
--

INSERT INTO `moneydetails` (`amount`, `pnumber`, `transaction`, `date`, `email`, `id`) VALUES
('5000', '01850751714', '#1234567890', '2019-11-25', 'RM@mail.com', 1),
('5000', '01850751714', '#1234567890', '2019-11-27', 'RM@mail.com', 2),
('1200', '0150751714', '#1234567890', '2019-11-26', 'RM@mail.com', 3),
('1200', '01852454545', '#1258963214', '2019-11-25', 'tan@mail.com', 4),
('2500', '018995588', '#2356987412', '2019-11-09', 'Rafiq@mail.com', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `member_id` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `fullname` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `pass` text COLLATE utf8_unicode_ci NOT NULL,
  `type` text COLLATE utf8_unicode_ci NOT NULL,
  `activate` text COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `member_id`, `fullname`, `email`, `pass`, `type`, `activate`) VALUES
(6, 'OAH-125', 'Rafa', 'RM@mail.com', '1234', 'user', 'yes'),
(7, 'OAH-126', 'Tan', 'tan@mail.com', '1234', 'user', 'yes'),
(8, 'OAH-127', 'Tanvir', 'kader@mail.com', '12345', 'user', 'yes'),
(9, 'OAH-128', 'Rafiq Uddin', 'Rafiq@mail.com', '12345', 'user', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moderator`
--
ALTER TABLE `moderator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moneydetails`
--
ALTER TABLE `moneydetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `moderator`
--
ALTER TABLE `moderator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `moneydetails`
--
ALTER TABLE `moneydetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

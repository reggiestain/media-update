-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2018 at 09:51 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contacts`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_type`
--

CREATE TABLE `contact_type` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_type`
--

INSERT INTO `contact_type` (`id`, `name`, `description`, `created`) VALUES
(1, 'Mobile', '', '2017-02-20 00:00:00'),
(2, 'Home', '', '2017-02-24 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact_type_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_of_birth` varchar(12) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `firstname`, `surname`, `mobile`, `email`, `contact_type_id`, `user_id`, `date_of_birth`, `created`, `modified`) VALUES
(21, 'Reginald ', 'Bossman', '0781304587', 'reggiestain@gmail.com', 1, 12, '03/13/2018', '2018-03-07 21:10:47', '2018-03-07 21:10:47');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(40) NOT NULL DEFAULT '',
  `data` text,
  `expires` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `data`, `expires`) VALUES
('3c0u365qkbcpv3rt3a0aheqdc1', 'Config|a:1:{s:4:"time";i:1487971797;}Flash|a:0:{}Auth|a:1:{s:4:"User";a:3:{s:2:"id";i:1;s:8:"username";s:6:"Reggie";s:7:"created";O:14:"Cake\\I18n\\Time":3:{s:4:"date";s:19:"2017-02-24 21:22:49";s:13:"timezone_type";i:3;s:8:"timezone";s:3:"UTC";}}}', 1488230998),
('4uvbaeeob8a4dkjhhh7o469aa5', 'Config|a:1:{s:4:"time";i:1488058639;}Flash|a:0:{}Auth|a:1:{s:4:"User";a:4:{s:2:"id";i:12;s:5:"email";s:21:"reggiestain@gmail.com";s:6:"mobile";s:0:"";s:7:"created";O:14:"Cake\\I18n\\Time":3:{s:4:"date";s:19:"2017-02-25 12:13:15";s:13:"timezone_type";i:3;s:8:"timezone";s:3:"UTC";}}}', 1488317842),
('bb13r63gtej77i8o91g9qpee24', 'Config|a:1:{s:4:"time";i:1520458661;}Auth|a:0:{}Flash|a:0:{}', 1520717861),
('fad377rmosvsijj1iblvfv11d6', 'Config|a:1:{s:4:"time";i:1488113056;}Auth|a:1:{s:4:"User";a:4:{s:2:"id";i:12;s:5:"email";s:21:"reggiestain@gmail.com";s:6:"mobile";s:0:"";s:7:"created";O:14:"Cake\\I18n\\Time":3:{s:4:"date";s:19:"2017-02-25 12:13:15";s:13:"timezone_type";i:3;s:8:"timezone";s:3:"UTC";}}}Flash|a:0:{}', 1488372258),
('l2r2h8n2shehoh1ilkkfcclc06', 'Config|a:1:{s:4:"time";i:1488061394;}Auth|a:1:{s:4:"User";a:4:{s:2:"id";i:12;s:5:"email";s:21:"reggiestain@gmail.com";s:6:"mobile";s:0:"";s:7:"created";O:14:"Cake\\I18n\\Time":3:{s:4:"date";s:19:"2017-02-25 12:13:15";s:13:"timezone_type";i:3;s:8:"timezone";s:3:"UTC";}}}Flash|a:0:{}', 1488320595);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(120) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created`) VALUES
(12, 'reggiestain@gmail.com', '$2y$10$fyAF9gSIu79XfM0rtTZcAuoCYXsx1adREKi3Q9pUuF.sq84A4kJbu', '2017-02-25 12:13:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_type`
--
ALTER TABLE `contact_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
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
-- AUTO_INCREMENT for table `contact_type`
--
ALTER TABLE `contact_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

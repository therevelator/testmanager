-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 03, 2018 at 10:02 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testmanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `ID` int(150) NOT NULL,
  `ProjectName` varchar(250) COLLATE latin1_bin NOT NULL,
  `CreatedBy` varchar(250) COLLATE latin1_bin NOT NULL,
  `CreatedTime` date NOT NULL,
  `Description` varchar(250) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`ID`, `ProjectName`, `CreatedBy`, `CreatedTime`, `Description`) VALUES
(1, 'test project', 'johnny', '0000-00-00', 'johnny created this for testing purposes'),
(3, 'ionut', 'ionut', '2018-02-14', 'this is a test');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(150) COLLATE latin1_bin NOT NULL,
  `password` varchar(250) COLLATE latin1_bin NOT NULL,
  `ip_address` varchar(40) COLLATE latin1_bin NOT NULL,
  `reg_time` varchar(40) COLLATE latin1_bin NOT NULL,
  `reg_date` varchar(40) COLLATE latin1_bin NOT NULL,
  `email` varchar(100) COLLATE latin1_bin NOT NULL,
  `user_status` varchar(20) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `ip_address`, `reg_time`, `reg_date`, `email`, `user_status`) VALUES
(1, 'ionut', 'pass', '127.127.127.127', '12:00:05', '07-02-2018', 'ionut.apostu@mail.com', ''),
(4, 'Barry.GribbenBOI', 'pass', '127.0.0.1', '02:36:37', '2018-02-08', 'alex.alvarez70@mail.com', ''),
(5, 'john', 'ionut', '127.0.0.1', '03:05:39', '2018-02-08', 'john@john.com', ''),
(6, 'x', 'x', '127.0.0.1', '15:49:01', '2018-02-08', 'x@x.com', ''),
(7, 'n', 'n', '127.0.0.1', '16:33:57', '2018-02-08', 'n@n.com', ''),
(8, 'c', 'c', '127.0.0.1', '16:54:57', '2018-02-08', 'c@c.com', ''),
(9, 'john1', 'password', '127.0.0.1', '00:10:10', '2018-02-09', 'john1@gmail.com', ''),
(10, 'test', 'pass', '127.0.0.1', '00:12:49', '2018-02-09', 'pass', ''),
(11, 'Ionut.Apostu0011', 'password', '127.0.0.1', '23:25:13', '2018-02-08', 'ionut.apostu@banctec.ie', ''),
(12, 'johnny', 'password', '127.0.0.1', '15:54:03', '2018-02-09', 'ionut.n.apostu@gmail.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `ID` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

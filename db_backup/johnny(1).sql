-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 03, 2018 at 10:01 PM
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
-- Database: `johnny`
--

-- --------------------------------------------------------

--
-- Table structure for table `main`
--

CREATE TABLE `main` (
  `mainID` int(11) NOT NULL,
  `mainName` varchar(255) NOT NULL,
  `mainTimeStamp` date NOT NULL,
  `CreatedBy` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main`
--

INSERT INTO `main` (`mainID`, `mainName`, `mainTimeStamp`, `CreatedBy`) VALUES
(13, 'xxxxxx', '2018-01-29', 'john'),
(14, 'skjdshkjsh', '2018-01-30', 'john'),
(15, 'ionut', '2018-02-01', 'john');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isadmin` int(2) NOT NULL,
  `islocked` varchar(5) NOT NULL,
  `ismember` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`userid`, `username`, `password`, `isadmin`, `islocked`, `ismember`) VALUES
(1, 'john', 'pass', 1, 'no', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `ProjectID` int(11) NOT NULL,
  `mainID` int(11) NOT NULL,
  `ProjectName` varchar(255) NOT NULL,
  `CreatedBy` varchar(255) NOT NULL,
  `Section` varchar(255) NOT NULL,
  `issection` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`ProjectID`, `mainID`, `ProjectName`, `CreatedBy`, `Section`, `issection`) VALUES
(49, 0, 'sss', 'ion', 'test', 1),
(67, 0, 'eeeeeee', 'ion', 'test', 1),
(80, 0, 'dsddsdssd', 'ion', '', 0),
(82, 0, 'lll,lskakjkjshdkhskjdj', 'ion', '', 0),
(86, 0, 'johnny', 'john', '', 0),
(92, 0, 'aaa', 'john', '', 0),
(93, 0, 'lkslasklskd', 'john', '', 0),
(98, 0, 'ionut', 'john', '', 0),
(100, 0, 'tets', 'john', '', 0),
(104, 0, 'kjskdsjdsk', 'john', '', 0),
(105, 0, 'hhh', 'john', '', 0),
(106, 0, 'ionut kdkkdkd', 'john', '', 0),
(107, 0, 'ionut', 'john', '', 0),
(108, 0, 'test', 'john', '', 0),
(112, 0, 'johnny', 'john', '', 0),
(113, 0, 'testing', 'john', '', 0),
(114, 0, '444', 'john', '', 0),
(118, 0, 'dsfdsffas', 'john', '', 0),
(119, 0, 'lalskjdlajlsdja', 'john', '', 0),
(120, 0, 'kdsjflsjdf', 'john', '', 0),
(121, 0, 'jfjfjfjjf', 'john', '', 0),
(122, 0, 'sdsdds', 'john', '', 0),
(123, 0, 'john', 'john', '', 0),
(124, 15, 'd', 'john', '', 0),
(125, 15, 'john', 'john', '', 0),
(126, 15, 'ionut', 'john', '', 0),
(127, 1, 'john', 'john', '', 0),
(128, 13, 'john', 'john', '', 0),
(129, 14, 'a', 'john', '', 0),
(130, 14, 'bb', 'john', '', 0),
(131, 14, 'ccc', 'john', '', 0),
(134, 14, 'ffffff', 'john', '', 0),
(135, 13, 'ionut', 'john', '', 0),
(136, 13, 'barry', 'john', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `testcases`
--

CREATE TABLE `testcases` (
  `id` int(255) NOT NULL,
  `casename` varchar(255) NOT NULL,
  `steps` varchar(10000) NOT NULL,
  `expected` varchar(10000) NOT NULL,
  `createdby` varchar(255) NOT NULL,
  `ProjectID` int(255) NOT NULL,
  `CreatedTimestamp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testcases`
--

INSERT INTO `testcases` (`id`, `casename`, `steps`, `expected`, `createdby`, `ProjectID`, `CreatedTimestamp`) VALUES
(11, '', 'johnny', 'fast', 'ion', 67, ''),
(27, '', 'z', 'z', 'ion', 49, ''),
(32, '', 'e', 'eeeee', 'ion', 80, ''),
(35, '', 'kkk', 'jjj', 'ion', 82, ''),
(36, '', 'ljakljsdlakjslkajd', 'jaghdjaghsjdghajddsgjahgd', 'ion', 82, ''),
(39, '', 'step', 'expected', 'john', 49, ''),
(40, '', 'another step', 'another expected', 'john', 49, ''),
(41, '', 'tc01', 'test', 'john', 100, ''),
(42, '', 'tc02', 'save', 'john', 100, ''),
(43, '', 'tc03', 'edit', 'john', 100, ''),
(44, '', 'ksldfhlskdhf', ';zlkjfhvsdh8347r893749r', 'john', 49, ''),
(45, '', 'aa', 'a', 'john', 49, ''),
(46, '', 'aaaaa', 'aaaa', 'john', 49, ''),
(47, '', 'ksdkahksjdhak', 'ksjdhsakjsdhakdsjh', 'john', 49, ''),
(50, '', 'kjdsjkdjkdsjk', 'kdsjkdsjkdsjkj', 'john', 86, '2018-01-28 12:30:10'),
(51, '', 'kjsdjksjkds', 'jkdsjkdsjkdsjksdjk', 'john', 86, '2018-01-28 12:31:07'),
(53, '', 'truteuytutrueturt', 'uyetrutwutruytwrw', 'john', 93, '2018-01-29 18:55:09'),
(54, '', 'Step 1', 'Expected 1', 'john', 112, '2018-01-29 18:55:51'),
(55, '', 'Step 2', 'Expected 2', 'john', 112, '2018-01-29 18:56:03'),
(56, '', 'Step 3', 'Expected 3', 'john', 112, '2018-01-29 18:56:13'),
(57, '', 'Step 4', 'Expected 4', 'john', 112, '2018-01-29 18:56:22'),
(58, '', 'Step 5', 'Expected 5', 'john', 112, '2018-01-29 18:56:34'),
(59, '', 'Step 6', 'Expected 6', 'john', 112, '2018-01-29 18:56:44'),
(60, '', 'Step 7', 'Expected 7', 'john', 112, '2018-01-29 18:56:58'),
(61, '', 'Step 8', 'Expected 8', 'john', 112, '2018-01-29 18:57:08'),
(62, '', 'sdddssddssd', 'sdsdsdsdsd', 'john', 125, '2018-01-30 10:13:02'),
(64, '', 'john', 'john', 'john', 127, '2018-01-30 10:15:25'),
(65, '', 'ion', 'ion', 'john', 127, '2018-01-30 10:28:04'),
(66, '', 'john', 'johnica test', 'john', 127, '2018-01-30 10:28:11'),
(67, '', 'john', 'john', 'john', 127, '2018-01-30 10:28:17'),
(68, '', 'ionut', 'ionut', 'john', 127, '2018-01-30 10:28:30'),
(70, '', 'john', 'john', 'john', 129, '2018-01-30 10:34:40'),
(71, '', 'paul', 'paul', 'john', 129, '2018-01-30 10:34:49'),
(72, '', 'rashid', 'rashid', 'john', 129, '2018-01-30 10:34:57'),
(73, '', 'fiacre', 'fiacre', 'john', 129, '2018-01-30 10:35:06'),
(74, '', 'lakshman', 'lakshman', 'john', 129, '2018-01-30 10:35:19'),
(75, '', 'skjahkahskajhs', 'a,sjhakjshkajshkjahs', 'john', 130, '2018-01-30 11:33:01'),
(76, '', 'ksjdfksjhfkdhf', 'kjdshfkdfhkdjh', 'john', 128, '2018-01-30 12:17:53'),
(78, '', 'john', 'test', 'john', 135, '2018-01-30 16:47:49'),
(79, '', 'steps', 'expected', 'john', 135, '2018-01-30 16:47:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `main`
--
ALTER TABLE `main`
  ADD PRIMARY KEY (`mainID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`ProjectID`),
  ADD KEY `MainID` (`mainID`);

--
-- Indexes for table `testcases`
--
ALTER TABLE `testcases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ProjectID` (`ProjectID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `main`
--
ALTER TABLE `main`
  MODIFY `mainID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `ProjectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `testcases`
--
ALTER TABLE `testcases`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `MainID` FOREIGN KEY (`mainID`) REFERENCES `main` (`mainID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `testcases`
--
ALTER TABLE `testcases`
  ADD CONSTRAINT `ProjectID` FOREIGN KEY (`ProjectID`) REFERENCES `project` (`ProjectID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

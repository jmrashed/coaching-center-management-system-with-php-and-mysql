-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2016 at 09:22 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `famous`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `classname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `classname`) VALUES
(6, 'Six A'),
(7, 'Seven B'),
(8, 'Eight'),
(9, 'Nine'),
(10, 'Ten');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `examname` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `examname`) VALUES
(2, 'Mid'),
(4, 'Final'),
(6, 'CT1'),
(8, 'CT2'),
(10, 'Assignmet1'),
(12, 'Assignmet2');

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

CREATE TABLE `mark` (
  `id` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `examid` int(11) NOT NULL,
  `mark` varchar(100) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `date` date NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `studentid` varchar(30) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `father` varchar(50) NOT NULL,
  `mother` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `classid` int(11) NOT NULL,
  `markid` int(11) NOT NULL,
  `paymentid` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `studentid`, `fullname`, `email`, `password`, `phone`, `gender`, `father`, `mother`, `address`, `classid`, `markid`, `paymentid`, `datetime`) VALUES
(1, 'fa0001', 'Abdullah Masud', 'masud@gmail.com', '123', '01564543532', 'Male', 'Abdullah samad', 'Shiurina', 'Jhenaidah', 8, 0, 0, '2016-07-21 00:00:00'),
(2, 'fa0002', 'Abdullah Masud', 'masud@gmail.com', '345', '01564543532', 'Male', 'Abdullah samad', 'Shiurina', 'Jhenaidah', 9, 0, 0, '2016-07-21 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `subjectname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subjectname`) VALUES
(1, 'Bangla 2nd Paper'),
(2, 'English 1st Paper'),
(5, 'Bangla 1st'),
(6, 'Bangla 2nd'),
(7, 'Math'),
(8, 'Higher Math'),
(9, 'History'),
(10, 'Chemistry'),
(11, 'Biology'),
(12, 'Chemistry 1st'),
(14, 'Social Science 1st Paper'),
(16, 'Islam Shika'),
(17, 'Chemistry'),
(18, 'ICT');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `degree` text NOT NULL,
  `designation` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `joindate` date NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(200) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `fullname`, `degree`, `designation`, `email`, `password`, `gender`, `joindate`, `address`, `phone`, `subjectid`, `datetime`) VALUES
(5, 'Md Rasheduzzaman', 'B. Sc in CSE', 'Professor', 'jmrashed@gmail.com', 'GfBf.987', 'male', '0000-00-00', '1/2, Nurjahan Road, Mohammadpur, Dhaka', '', 0, '2016-07-22 14:28:36'),
(6, 'Md Rasheduzzaman', 'B. Sc in CSE', 'Professor', 'jmrashed@gmail.com', 'GfBf.987', 'male', '0000-00-00', '1/2, Nurjahan Road, Mohammadpur, Dhaka', '', 0, '2016-07-22 14:29:59'),
(7, 'Kalam', 'B. Sc in CSE', 'Ast. Professor', 'Kalam@gmail.com', 'Kalam', 'male', '2016-07-23', '1/2, Nurjahan Road, Mohammadpur, Dhaka', '01910077628', 14, '2016-07-22 14:30:34'),
(8, 'Md Rasheduzzaman', 'B. Sc in CSE', 'Professor', 'jmrashed@gmail.com', 'GfBf.987', 'male', '2016-07-21', '1/2, Nurjahan Road, Mohammadpur, Dhaka', '1910077628', 10, '2016-07-22 15:56:51'),
(10, 'Rohmat Ali', 'HSC', 'Teacher ', 'rohmatjh@gmail.com', 'rohm040366', 'male', '1993-10-04', 'Jhenaidah', '+8801770707217', 18, '2016-07-22 19:50:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

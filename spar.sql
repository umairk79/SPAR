-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2016 at 07:52 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spar`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` varchar(10) NOT NULL,
  `subj1` int(5) DEFAULT NULL,
  `subj2` int(5) DEFAULT NULL,
  `subj3` int(5) DEFAULT NULL,
  `subj4` int(5) DEFAULT NULL,
  `subj5` int(5) DEFAULT NULL,
  `subj6` int(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `subj1`, `subj2`, `subj3`, `subj4`, `subj5`, `subj6`) VALUES
('s01', 3, 3, 3, 3, 3, 3),
('s02', NULL, NULL, NULL, NULL, NULL, NULL),
('s03', 2, 5, 2, 1, 8, 2),
('s04', 4, 5, 3, 5, 4, 6),
('s05', 3, 3, 3, 5, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(3) NOT NULL,
  `studentid` varchar(3) NOT NULL,
  `teacherid` varchar(3) NOT NULL,
  `subject` varchar(10) NOT NULL,
  `comment` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `studentid`, `teacherid`, `subject`, `comment`) VALUES
(1, 's03', 't01', 'sadasd', 'asdsad'),
(2, 's02', 't01', 'sadasd', 'asdsad'),
(3, 's01', 't01', 'sadasd', 'asdsad'),
(4, 's03', 't02', 'sub1', 'need to improve'),
(5, 's04', 't01', 'sadasd', 'asdsad'),
(7, 's05', 't01', 'sadasd', 'asdsad'),
(8, 's04', 't02', 'sub1', 'need to improve');

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE `lectures` (
  `subject` varchar(10) DEFAULT NULL,
  `totallec` int(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`subject`, `totallec`) VALUES
('subject1', 7),
('subject2', 7),
('subject3', 10),
('subject4', 6),
('subject5', 4),
('subject6', 9);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` varchar(10) NOT NULL,
  `uname` varchar(25) DEFAULT NULL,
  `pword` varchar(25) DEFAULT NULL,
  `type` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `uname`, `pword`, `type`) VALUES
('a01', 'kothari', 'huzaifa', 'a'),
('a02', 'khan', 'umair', 'a'),
('a03', 'kuchekar', 'aditya', 'a'),
('s01', 'huzaifa', 'hk30', 's'),
('s02', 'umair', 'uk29', 's'),
('s03', 'aditya', 'ak32', 's'),
('s04', 'mithil', 'gotarne', 's'),
('s05', 'kanishk', 'kaul', 's'),
('t01', 'teacher', 'comps', 't'),
('t02', 'teacher2', 'comps', 't');

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `id` varchar(10) NOT NULL,
  `uid` int(15) DEFAULT NULL,
  `fname` varchar(10) DEFAULT NULL,
  `lname` varchar(10) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `class` varchar(3) DEFAULT NULL,
  `branch` varchar(5) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `phone2` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `email2` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`id`, `uid`, `fname`, `lname`, `address`, `class`, `branch`, `phone`, `phone2`, `email`, `email2`) VALUES
('s01', 2014130031, 'huzaifa', 'kothari', 'andheri(e)', 'TE', 'COMPS', '(+91)9819506251', '(+91)9819012852', 'huzi.kothari@gmail.com', NULL),
('s02', 2014130030, 'umair', 'khan', 'andheri(w)', 'SE', 'IT', '(+91)9833694547', NULL, 'khanumair.79@gmail.com', NULL),
('s03', 2014130033, 'aditya', 'kuchekar', 'mulund (east)', 'TE', 'COMPS', '(+91)8976680225', '9987066654', 'adityakuchekar@gmail.com', 'kuchekaromkar909@gmail.com'),
('s04', 2014130018, 'Mithil', 'Gotarne', 'Cosmos mary  park,Thane', 'SE', 'EXTC', '7788994455', '1122334455', 'mithilgotarne@gmail.com', NULL),
('s05', 2014130028, 'Kanishk', 'Kaul', 'lokhand,kandivli', 'TE', 'ETRX', '3366554477', '8899774455', 'kaulkanishk96@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t1`
--

CREATE TABLE `t1` (
  `id` varchar(10) NOT NULL,
  `subj1` int(5) DEFAULT NULL,
  `subj2` int(5) DEFAULT NULL,
  `subj3` int(5) DEFAULT NULL,
  `subj4` int(5) DEFAULT NULL,
  `subj5` int(5) DEFAULT NULL,
  `subj6` int(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t1`
--

INSERT INTO `t1` (`id`, `subj1`, `subj2`, `subj3`, `subj4`, `subj5`, `subj6`) VALUES
('s01', 10, 8, 6, 4, 2, 0),
('s02', NULL, NULL, NULL, NULL, NULL, NULL),
('s03', 10, 12, 12, 13, 12, 18),
('s04', 12, 13, 10, 12, 16, 10),
('s05', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t2`
--

CREATE TABLE `t2` (
  `id` varchar(10) NOT NULL,
  `subj1` int(5) DEFAULT NULL,
  `subj2` int(5) DEFAULT NULL,
  `subj3` int(5) DEFAULT NULL,
  `subj4` int(5) DEFAULT NULL,
  `subj5` int(5) DEFAULT NULL,
  `subj6` int(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t2`
--

INSERT INTO `t2` (`id`, `subj1`, `subj2`, `subj3`, `subj4`, `subj5`, `subj6`) VALUES
('s01', 12, 14, 16, 18, 20, 20),
('s02', NULL, NULL, NULL, NULL, NULL, NULL),
('s03', 2, 2, 6, 8, 8, 14),
('s04', 12, 13, 16, 14, 18, 20),
('s05', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_details`
--

CREATE TABLE `teacher_details` (
  `id` varchar(3) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_details`
--

INSERT INTO `teacher_details` (`id`, `name`) VALUES
('t01', 'Dr.P Gharpure'),
('t02', 'Dr. Natasha Raul');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

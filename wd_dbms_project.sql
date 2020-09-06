-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2019 at 01:00 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wd_dbms_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `Book_ID` varchar(15) NOT NULL,
  `Book_name` varchar(50) NOT NULL,
  `Book_type` varchar(15) NOT NULL,
  `Author_name` varchar(20) NOT NULL,
  `Copies` int(5) NOT NULL,
  `Subject` varchar(15) NOT NULL,
  `Book_Image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`Book_ID`, `Book_name`, `Book_type`, `Author_name`, `Copies`, `Subject`, `Book_Image`) VALUES
('cn-jour-1', 'Computer Networks Simulation Guide', 'Journal', 'William Stallings', 2, 'CN', ''),
('dbms-rb-1', 'DataBase Management Systems', 'Reference book', 'Balaguruswamy', 10, 'DBMS', ''),
('ds-tb-1', 'Data Structures & Algorithms', 'Text book', 'K. P. Shah', 8, 'DS', ''),
('os-tb-1', 'Operating Systems Basics', 'Text book', 'S. Tannenbaum', 10, 'OS', ''),
('per-ai-1', 'Popular Science - Artificial Intelligence', 'Periodic', 'Wall Periodicals Onl', 3, 'AI', ''),
('sci-fi-1', 'The Silent Patient: No.1 Bestselling crime thrille', 'Fiction book', 'Alex Michaelides', 6, 'SCI-FI', ''),
('story-book-1', 'The Best of Tenali Raman', 'Story book', 'Rungeen Singh', 18, 'History', ''),
('thoc-rb-1', 'Theory of Computation', 'Reference book', 'K. Tewani', 5, 'THOC', 0x75706c6f61642f),
('wd-tb-1', 'Web Designing Using JavaScript', 'Text book', 'T. Marshalls', 5, 'WD', 0x75706c6f61642f),
('wd-tb-2', 'Web Designing Using PHP', 'Text book', 'M. Kumhar', 15, 'WD', '');

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `Issue_ID` int(10) NOT NULL,
  `Member_ID` varchar(15) NOT NULL,
  `Book_ID` varchar(15) NOT NULL,
  `Issue_date` date NOT NULL,
  `Return_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue`
--

INSERT INTO `issue` (`Issue_ID`, `Member_ID`, `Book_ID`, `Issue_date`, `Return_date`) VALUES
(3, '17bce036', 'dbms-rb-1', '2019-11-08', '2019-11-24'),
(4, '17bce035', 'thoc-rb-1', '2019-08-12', '2019-09-19'),
(5, '17bce035', 'dbms-rb-1', '2019-11-06', '2019-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `Member_ID` varchar(15) NOT NULL,
  `Member_Name` varchar(30) NOT NULL,
  `Membership_type` varchar(15) NOT NULL,
  `Joinning_date` date NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Contact_no` int(10) NOT NULL,
  `Password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`Member_ID`, `Member_Name`, `Membership_type`, `Joinning_date`, `Address`, `Contact_no`, `Password`) VALUES
('17bce034', 'Siddharth Jotwani', 'Student', '2017-08-18', 'Aarohi Residency', 2147483647, 'sj123'),
('17bce035', 'Krish Kamani', 'Student', '2019-11-02', 'Porbandar', 2144887592, 'kk123'),
('17bce036', 'Dhruvik Kanada', 'Student', '2019-11-06', 'Ahmedabad', 1234567890, 'dk123'),
('Admin_Lib_ITNU', 'Pramod Makhesana', 'Administration', '2003-01-01', 'ITNU, SG Highway, Abad', 2147483647, 'admin123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`Book_ID`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`Issue_ID`),
  ADD KEY `Book_ID` (`Book_ID`),
  ADD KEY `Member_ID` (`Member_ID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`Member_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
  MODIFY `Issue_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `issue`
--
ALTER TABLE `issue`
  ADD CONSTRAINT `issue_ibfk_1` FOREIGN KEY (`Book_ID`) REFERENCES `books` (`Book_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `issue_ibfk_2` FOREIGN KEY (`Member_ID`) REFERENCES `member` (`Member_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

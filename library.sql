-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2019 at 09:12 PM
-- Server version: 10.3.16-MariaDB
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
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(30) NOT NULL,
  `first` varchar(100) NOT NULL,
  `last` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first`, `last`, `username`, `password`, `email`, `phone`) VALUES
(1, 'Akib', 'Ikbal', 'akib007', '123', 'akibikbal07@gmail.com', '01743172636');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `edition` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bid`, `name`, `author`, `edition`, `status`, `quantity`) VALUES
(1, 'English', 'Javed', '5th', 'Avalible', 5),
(2, 'Math', 'KK', '6th', 'Avalible', 5),
(3, 'Physics', 'KK', '7th', 'Avalible', 3),
(4, 'Fundamental Of CSE', 'RR', '2nd', 'Avalible', 8),
(5, 'Data Structure', 'ZZ', '7th', 'Avalible', 6),
(6, 'Numerical Analysis', 'SS Sastry', '5th', 'Avalible', 5),
(7, 'Differential Calculus', 'BC Das', '51st', 'Avalible', 10),
(8, 'Linear Algebra', 'Md. Abdur Rahman', '1st', 'Avalible', 14);

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

CREATE TABLE `issue_book` (
  `username` varchar(100) NOT NULL,
  `bid` int(100) NOT NULL,
  `bname` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `edition` varchar(100) NOT NULL,
  `issueb` varchar(100) NOT NULL,
  `returnb` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_book`
--

INSERT INTO `issue_book` (`username`, `bid`, `bname`, `author`, `edition`, `issueb`, `returnb`) VALUES
('pollob', 8, 'Linear Algebra', 'Md. Abdur Rahman', '1st', 'NO', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `first` varchar(100) NOT NULL,
  `last` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `roll` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`first`, `last`, `username`, `password`, `roll`, `email`, `phone`) VALUES
('Akib', 'Ikbal', 'akib008', '123456', 171311008, 'akibikbal07@gmail.com', '01521419062'),
('Sadman', 'Pollob', 'pollob', '123456', 171311012, 'sadman@gmail.com', '01743172322'),
('Rafiul ', 'Hasan', 'rafi', '123456', 171311007, 'rafi123@gmail.com', '01743178963'),
('Sakil', 'Sobuj', 'sobuj', '123456', 171311006, 'sakil145@gmail.com', '01743145968'),
('Akith', 'Hasan', 'dhrubo123', '123456', 1713110012, 'dhrubo123@gmail.com', '01521419086');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.0.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 12, 2016 at 07:02 PM
-- Server version: 5.6.11-log
-- PHP Version: 5.3.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sdbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `contact` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`mid`, `name`, `contact`, `email`, `description`) VALUES
(2, 'Salman Ahmed', 1700000000, 'salman@gmail.com', 'I cannot access my student account. Need help asap.'),
(3, 'Tahia Talukdar', 1600000001, 'tahia@hotmail.com', 'I need assistance with the online assignment submission through TurnItIn.'),
(4, 'Muhammad Rashel', 9677056, 'rashel@bacbd.org', 'The BAC server is too slow. Need to maintain or replace.'),
(5, 'Hafizur Rahman', 9677044, 'hafizur@bacbd.org', 'My office PC has crashed. Need help asap.'),
(6, 'Kamrul Hasan', 1600000000, 'hasan@gmail.com', 'I cannot access my student account. Need help ASAP.'),
(7, 'Rukshana Akter', 9677047, 'ruksana@bacbd.org', 'There has been an incident among couple of BAC students in the canteen. Please send security asap.');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `nid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `date` varchar(15) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`nid`, `title`, `date`, `description`) VALUES
(2, 'Notice for Holiday', '12/12/2016', 'BAC will be closed on 13/12/2016 for holiday.'),
(3, 'Study Tour', '28/11/2016', 'Students are requested to buy the study tour tickets from the BAC reception.'),
(4, 'Semester 4 advising', '30/09/2016', 'Advising for the 4th semester 2016 will be held from the 1st to 3rd of October 2016. '),
(5, '3rd Semester Assignment Submis', '05/09/2016', 'All the students of BAC are requested to submit all their due assignments for the 3rd semester by 25');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `user_id` varchar(15) NOT NULL,
  `password` varchar(30) NOT NULL,
  `user_type` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` text NOT NULL,
  `contact` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `school` text NOT NULL,
  `program` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `user_id`, `password`, `user_type`, `email`, `gender`, `contact`, `address`, `school`, `program`) VALUES
(1, 'Superadmin', 'admin', 'admin123', 'admin', '', 'male', 0, '', '', ''),
(2, 'Abu Sajjad', 'Sajjad.A', '101', 'admin', 'sajjad@bacbd.org', 'Male', 9677054, 'House # 28/B, Road # 5\r\nDhanmondi, Dhaka- 1205, Bangladesh', '', ''),
(3, 'Sajjad Halim', 'Halim.S', '102', 'admin', 's.halim@bacbd.org', 'Male', 9677055, 'House # 28/B, Road # 5\r\nDhanmondi, Dhaka- 1205, Bangladesh', '', ''),
(4, 'Muhammad Rashel', 'Rashel.M', '103', 'admin', 'rashel@bacbd.org', 'Male', 9677056, 'House # 28/B, Road # 5\r\nDhanmondi, Dhaka- 1205, Bangladesh', '', ''),
(5, 'Khalada Khair', 'Khair.K', '104', 'admin', 'khalada@bacbd.org', 'Female', 9677057, 'House # 28/B, Road # 5\r\nDhanmondi, Dhaka- 1205, Bangladesh', '', ''),
(6, 'Tasnem Tarannum', 'Tarannum.T', '105', 'admin', 'tasnem@bacbd.org', 'Female', 9677058, 'House # 28/B, Road # 5\r\nDhanmondi, Dhaka- 1205, Bangladesh', '', ''),
(7, 'Hafizur Rahman', 'Rahman.H', '1001', 'faculty', 'hafizur@bacbd.org', 'Male', 9677044, 'House # 28/B, Road # 5\r\nDhanmondi, Dhaka- 1205, Bangladesh', 'Law', ''),
(8, 'Ashiqur Rahman', 'Rahman.A', '1002', 'faculty', 'ashiqur@bacbd.org', 'Male', 9677068, 'House # 28/B, Road # 5\r\nDhanmondi, Dhaka- 1205, Bangladesh', 'Business', ''),
(9, 'Ismat Jahan', 'Jahan.I', '1003', 'faculty', 'ismat@bacbd.org', 'Female', 9677045, 'House # 28/B, Road # 5\r\nDhanmondi, Dhaka- 1205, Bangladesh', 'Business', ''),
(10, 'Afsar Chowdhury', 'Chowdhury.A', '1004', 'faculty', 'afsar@bacbd.org', 'Male', 9677069, 'House # 28/B, Road # 5\r\nDhanmondi, Dhaka- 1205, Bangladesh', 'IT', ''),
(11, 'Farhana Hossain', 'Hossain.F', '1005', 'faculty', 'farhana.hossain@bacbd.org', 'Female', 9677046, 'House # 28/B, Road # 5\r\nDhanmondi, Dhaka- 1205, Bangladesh', 'Law', ''),
(12, 'Rukshana Akter', 'Akter.R', '1006', 'faculty', 'ruksana@bacbd.org', 'Female', 9677047, 'House # 28/B, Road # 5\r\nDhanmondi, Dhaka- 1205, Bangladesh', 'IT', ''),
(13, 'Salman Ahmed', 'Ahmed.S', '10001', 'student', 'salman@gmail.com', 'Male', 1700000000, 'Muhammadpur, Dhaka', 'IT', 'HnD in IT'),
(14, 'Muminur Rahman', 'Rahman.M', '10002', 'student', 'muminur@outlook.com', 'Male', 1700000001, 'Central Road, Dhaka', 'IT', 'HnD in IT'),
(15, 'Humera Amla', 'Amla.H', '10003', 'student', 'humera@yahoo.com', 'Female', 1700000002, 'Dhanmondi, Dhaka', 'Business', 'nD in Business'),
(16, 'Kamrul Hasan', 'Hasan.K', '10004', 'student', 'hasan@gmail.com', 'Male', 1600000000, 'Mirpur, Dhaka', 'Law', 'HnD in LAW'),
(17, 'Tahia Talukdar', 'Talukdar.T', '10005', 'student', 'tahia@hotmail.com', 'Female', 1600000001, 'Green Road, Dhaka', 'IT', 'HnD in IT'),
(18, 'Nazmul Shahadat', 'Shahadat.N', '10006', 'student', 'nazmul@gmail.com', 'Male', 1600000002, 'Kalabagan, Dhaka', 'Law', 'HnD in LAW'),
(19, 'Fahria Rahman', 'Rahman.F', '10007', 'student', 'fahria@hotmail.com', 'Female', 1700000003, 'Panthapath, Dhaka', 'Business', 'HnD in Business'),
(20, 'Gazi Shakil', 'Shakil.G', '10008', 'student', 'shakil@outlook.com', 'Male', 1600000003, 'DIT Road, Dhaka', 'Business', 'HnD in IT'),
(21, 'Tarun Shikdar', 'Shikdar.T', '10009', 'student', 'tarun@yahoo.com', 'Male', 1700000004, 'Savar, Dhaka', 'Law', 'nD in LAW');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

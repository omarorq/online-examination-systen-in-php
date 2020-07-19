-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 15, 2018 at 11:25 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `fname`, `lname`, `email`, `password`) VALUES
(2, 'lakas', 'tama', 'admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
CREATE TABLE IF NOT EXISTS `answer` (
  `qid` text NOT NULL,
  `ansid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`qid`, `ansid`) VALUES
('5b4b075557010', '5b4b07555f4e2'),
('5b4b0755627ab', '5b4b075562f7b'),
('5b4b07556662c', '5b4b075566dfc'),
('5b4b07556ac7d', '5b4b07556c3ed'),
('5b4b075577b88', '5b4b075578358'),
('5b4b2617a0d40', '5b4b2617a18f9'),
('5b4b2617a6332', '5b4b2617a6b02'),
('5b4b28d80f642', '5b4b28d81213b'),
('5b4b28d815403', '5b4b28d815bd3'),
('5b4b2a5ed3c43', '5b4b2a5ed47fb'),
('5b4b2a5ed961c', '5b4b2a5eda1d4'),
('5b4b2a9e9e36b', '5b4b2a9e9ef23'),
('5b4b2a9ea2da4', '5b4b2a9ea48fc');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
CREATE TABLE IF NOT EXISTS `history` (
  `email` varchar(50) NOT NULL,
  `eid` text NOT NULL,
  `score` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`email`, `eid`, `score`, `level`, `sahi`, `wrong`, `date`) VALUES
('rizal@gmail.com', '5b4b26051a4ab', 20, 2, 2, 0, '2018-07-15 10:47:23'),
('maria@gmail.com', '5b4b28c595a7b', 10, 2, 2, 0, '2018-07-15 10:59:01'),
('lakas@gmail.com', '5b4b2a4d6b466', 10, 2, 2, 0, '2018-07-15 11:08:01'),
('isang@gmail.com', '5b4b2a8d29c23', 10, 2, 2, 0, '2018-07-15 11:12:32');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
  `qid` varchar(50) NOT NULL,
  `option` varchar(5000) NOT NULL,
  `optionid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`qid`, `option`, `optionid`) VALUES
('5b4b075557010', 'a', '5b4b07555f4e2'),
('5b4b075557010', 'b', '5b4b07555f4e2'),
('5b4b075557010', 'c', '5b4b07555f4e2'),
('5b4b075557010', 'd', '5b4b07555f4e2'),
('5b4b0755627ab', 'a', '5b4b075562f7b'),
('5b4b0755627ab', 'b', '5b4b075562f7b'),
('5b4b0755627ab', 'c', '5b4b075562f7b'),
('5b4b0755627ab', 'd', '5b4b075562f7b'),
('5b4b07556662c', 'a', '5b4b075566dfc'),
('5b4b07556662c', 'b', '5b4b075566dfc'),
('5b4b07556662c', 'c', '5b4b075566dfc'),
('5b4b07556662c', 'd', '5b4b075566dfc'),
('5b4b07556ac7d', 'a', '5b4b07556c3ed'),
('5b4b07556ac7d', 'b', '5b4b07556c3ed'),
('5b4b07556ac7d', 'c', '5b4b07556c3ed'),
('5b4b07556ac7d', 'd', '5b4b07556c3ed'),
('5b4b075577b88', 'a', '5b4b075578358'),
('5b4b075577b88', 'b', '5b4b075578358'),
('5b4b075577b88', 'c', '5b4b075578358'),
('5b4b075577b88', 'd', '5b4b075578358'),
('5b4b2617a0d40', 'Rabbits', '5b4b2617a18f9'),
('5b4b2617a0d40', 'Marsupials', '5b4b2617a18f9'),
('5b4b2617a0d40', 'Rodents', '5b4b2617a1ce1'),
('5b4b2617a0d40', 'Bats', '5b4b2617a1ce1'),
('5b4b2617a6332', 'Hypothesis', '5b4b2617a6b02'),
('5b4b2617a6332', 'Axiom', '5b4b2617a6b02'),
('5b4b2617a6332', 'Insinuation', '5b4b2617a6b02'),
('5b4b2617a6332', 'Inkling', '5b4b2617a6b02'),
('5b4b28d80f642', 'Rabbits', '5b4b28d81213b'),
('5b4b28d80f642', 'Marsupials', '5b4b28d81213b'),
('5b4b28d80f642', 'Rodents', '5b4b28d81213b'),
('5b4b28d80f642', 'Bats', '5b4b28d81213b'),
('5b4b28d815403', 'Hypothesis', '5b4b28d815bd3'),
('5b4b28d815403', 'Axiom', '5b4b28d815bd3'),
('5b4b28d815403', 'Insinuation', '5b4b28d815bd3'),
('5b4b28d815403', 'Inkling', '5b4b28d815bd3'),
('5b4b2a5ed3c43', 'Rabbits', '5b4b2a5ed47fb'),
('5b4b2a5ed3c43', 'Marsupials', '5b4b2a5ed47fb'),
('5b4b2a5ed3c43', 'Rodents', '5b4b2a5ed47fb'),
('5b4b2a5ed3c43', 'Bats', '5b4b2a5ed47fb'),
('5b4b2a5ed961c', 'Hypothesis', '5b4b2a5eda1d4'),
('5b4b2a5ed961c', 'Axiom', '5b4b2a5eda1d4'),
('5b4b2a5ed961c', 'Insinuation', '5b4b2a5eda1d4'),
('5b4b2a5ed961c', 'Inkling', '5b4b2a5eda1d4'),
('5b4b2a9e9e36b', 'Rabbits', '5b4b2a9e9ef23'),
('5b4b2a9e9e36b', 'Marsupials', '5b4b2a9e9ef23'),
('5b4b2a9e9e36b', 'Rodents', '5b4b2a9e9ef23'),
('5b4b2a9e9e36b', 'Bats', '5b4b2a9e9ef23'),
('5b4b2a9ea2da4', 'Hypothesis', '5b4b2a9ea48fc'),
('5b4b2a9ea2da4', 'Axiom', '5b4b2a9ea48fc'),
('5b4b2a9ea2da4', 'Insinuation', '5b4b2a9ea48fc'),
('5b4b2a9ea2da4', 'Inkling', '5b4b2a9ea48fc');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `eid` text NOT NULL,
  `qid` text NOT NULL,
  `qns` text NOT NULL,
  `choice` int(10) NOT NULL,
  `sn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`eid`, `qid`, `qns`, `choice`, `sn`) VALUES
('5b4b071502da8', '5b4b075557010', 'a?', 4, 1),
('5b4b071502da8', '5b4b0755627ab', 'b?', 4, 2),
('5b4b071502da8', '5b4b07556662c', 'c?', 4, 3),
('5b4b071502da8', '5b4b07556ac7d', 'd?', 4, 4),
('5b4b071502da8', '5b4b075577b88', 'a', 4, 5),
('5b4b26051a4ab', '5b4b2617a0d40', 'a', 4, 1),
('5b4b26051a4ab', '5b4b2617a6332', 'a', 4, 2),
('5b4b28c595a7b', '5b4b28d80f642', 'a', 4, 1),
('5b4b28c595a7b', '5b4b28d815403', 'a', 4, 2),
('5b4b2a4d6b466', '5b4b2a5ed3c43', 'a', 4, 1),
('5b4b2a4d6b466', '5b4b2a5ed961c', 'a', 4, 2),
('5b4b2a8d29c23', '5b4b2a9e9e36b', 'a', 4, 1),
('5b4b2a8d29c23', '5b4b2a9ea2da4', 'a', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
CREATE TABLE IF NOT EXISTS `quiz` (
  `eid` text NOT NULL,
  `title` varchar(100) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `time` bigint(20) NOT NULL,
  `intro` text NOT NULL,
  `tag` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`eid`, `title`, `sahi`, `wrong`, `total`, `time`, `intro`, `tag`, `date`) VALUES
('5b4b26051a4ab', 'Grade7-exam', 10, 0, 2, 5, '', 'science', '2018-07-15 10:46:29'),
('5b4b28c595a7b', 'Grade8-exam', 5, 0, 2, 5, '', '', '2018-07-15 10:58:13'),
('5b4b2a4d6b466', 'Grade9-exam', 5, 0, 2, 5, '', '', '2018-07-15 11:04:45'),
('5b4b2a8d29c23', 'Grade10-exam', 5, 0, 2, 5, '', '', '2018-07-15 11:05:49');

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

DROP TABLE IF EXISTS `rank`;
CREATE TABLE IF NOT EXISTS `rank` (
  `email` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`email`, `score`, `time`) VALUES
('rizal@gmail.com', 20, '2018-07-15 10:47:24'),
('maria@gmail.com', 10, '2018-07-15 10:59:01'),
('lakas@gmail.com', 10, '2018-07-15 11:08:01'),
('isang@gmail.com', 10, '2018-07-15 11:12:32');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

DROP TABLE IF EXISTS `section`;
CREATE TABLE IF NOT EXISTS `section` (
  `section_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `section_name` varchar(50) NOT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `grade` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mob` bigint(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`fname`, `mname`, `lname`, `gender`, `grade`, `email`, `mob`, `password`) VALUES
('Apolinario', 'Mabuhay', 'Mabini', 'M', 'Grade 7', 'apolinario@gmail.com', 9123456789, 'd8860a9ffcc6a7164545c19b5837872b'),
('Isang', 'Bala', 'Lang', 'F', 'Grade 10', 'isang@gmail.com', 9123456789, 'dbc42a5d474170a4585ee2a2e98de9f4'),
('Lakas', 'Tama', 'Nawawala', 'M', 'Grade 9', 'lakas@gmail.com', 9123456789, 'cd4813bf694e116c0f522bde355172a9'),
('Maria', 'Clara', 'Baston', 'F', 'Grade 8', 'maria@gmail.com', 9123456789, '263bce650e68ab4e23f28263760b9fa5'),
('Jose', 'Protacio', 'Rizal', 'M', 'Grade 7', 'rizal@gmail.com', 9123456789, '150fb021c56c33f82eef99253eb36ee1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

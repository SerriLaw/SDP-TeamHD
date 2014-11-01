-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2014 at 08:04 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `volunteering`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE IF NOT EXISTS `activity` (
  `name` varchar(20) NOT NULL,
  `description` varchar(300) NOT NULL,
  `location` varchar(50) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `startTime` varchar(4) NOT NULL,
  `endTime` varchar(4) NOT NULL,
  `eventID` int(10) NOT NULL,
  `activityID` int(10) NOT NULL AUTO_INCREMENT,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`activityID`),
  KEY `eventID` (`eventID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`name`, `description`, `location`, `startDate`, `endDate`, `startTime`, `endTime`, `eventID`, `activityID`, `isActive`) VALUES
('FEIT Stall', 'This is a fun activity!', 'CB 11.4.400', '2014-11-01', '2014-11-08', '0900', '1200', 32, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE IF NOT EXISTS `application` (
  `userID` varchar(10) NOT NULL,
  `roleID` int(10) NOT NULL,
  `dateSubmitted` date NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`userID`,`roleID`),
  KEY `roleID` (`roleID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`userID`, `roleID`, `dateSubmitted`, `status`) VALUES
('11655178', 14, '2014-11-01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `courseID` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `length` int(1) NOT NULL,
  `faculty` varchar(20) NOT NULL,
  `description` varchar(300) NOT NULL,
  PRIMARY KEY (`courseID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseID`, `name`, `length`, `faculty`, `description`) VALUES
('C10143v5', 'Bachelor of Information Technology', 3, 'FEIT', 'This is a cooperative education scholarship in computer information systems developed by uts in in cooperation with a group of leading organizations.');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `eventID` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(300) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `location` varchar(50) NOT NULL,
  `managerID` varchar(10) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`eventID`),
  KEY `managerID` (`managerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eventID`, `name`, `description`, `startDate`, `endDate`, `location`, `managerID`, `isActive`) VALUES
(32, 'UTS Open Day', 'This is a fun event', '2014-11-01', '2014-11-08', 'UTS City Campus', '11111111', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `roleID` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `isPaid` tinyint(1) NOT NULL,
  `description` varchar(300) NOT NULL,
  `requirements` varchar(300) NOT NULL,
  `endDate` date NOT NULL,
  `startDate` date NOT NULL,
  `startTime` varchar(4) NOT NULL,
  `endTime` varchar(4) NOT NULL,
  `hours` int(3) NOT NULL,
  `activityID` int(10) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`roleID`),
  KEY `activityID` (`activityID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleID`, `name`, `isPaid`, `description`, `requirements`, `endDate`, `startDate`, `startTime`, `endTime`, `hours`, `activityID`, `isActive`) VALUES
(14, 'FEIT Stall Manager', 0, 'Manage the FEIT stall throughout UTS Open Day', 'Good communication skills!', '2014-11-08', '2014-11-01', '1000', '1200', 0, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rolehours`
--

CREATE TABLE IF NOT EXISTS `rolehours` (
  `roleID` int(10) NOT NULL,
  `date` date NOT NULL,
  `startTime` varchar(4) NOT NULL,
  `endTime` varchar(4) NOT NULL,
  PRIMARY KEY (`roleID`,`date`,`startTime`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rolehours`
--

INSERT INTO `rolehours` (`roleID`, `date`, `startTime`, `endTime`) VALUES
(14, '2014-11-02', '0900', '1200');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `userID` varchar(10) NOT NULL,
  `department` varchar(10) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`userID`, `department`, `role`) VALUES
('11111111', 'UTS Market', 'System Admin');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `userID` varchar(10) NOT NULL,
  `skills` varchar(300) DEFAULT NULL,
  `experience` varchar(300) DEFAULT NULL,
  `courseID` varchar(10) NOT NULL,
  PRIMARY KEY (`userID`),
  KEY `courseID` (`courseID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`userID`, `skills`, `experience`, `courseID`) VALUES
('11655178', 'Running', 'Marathons', 'C10143v5'),
('12345678', 'ioaso', 'oioias', 'C10143v5');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userID` varchar(10) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `DOB` date DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `userType` int(1) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `firstName`, `lastName`, `email`, `password`, `phone`, `DOB`, `gender`, `userType`, `isActive`) VALUES
('11111111', 'System', 'Admin', 'support@beansprouts.com', 'beansprouts', '95142000', '0001-01-01', 'm', 3, 1),
('11655178', 'Joshua', 'Killen', 'josh.killen@uts.edu.au', 'barrington1', '0430338161', '1994-02-19', 'm', 0, 1),
('12345678', 'Delete', 'Me', 'd@mail.com', 'test', '0430338161', '1994-11-04', 'f', 0, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`eventID`) REFERENCES `event` (`eventID`) ON UPDATE CASCADE;

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `application_ibfk_2` FOREIGN KEY (`roleID`) REFERENCES `role` (`roleID`) ON UPDATE CASCADE;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`managerID`) REFERENCES `user` (`userID`) ON UPDATE CASCADE;

--
-- Constraints for table `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `role_ibfk_3` FOREIGN KEY (`activityID`) REFERENCES `activity` (`activityID`) ON UPDATE CASCADE;

--
-- Constraints for table `rolehours`
--
ALTER TABLE `rolehours`
  ADD CONSTRAINT `rolehours_ibfk_1` FOREIGN KEY (`roleID`) REFERENCES `role` (`roleID`) ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseID`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2014 at 05:43 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`name`, `description`, `location`, `startDate`, `endDate`, `startTime`, `endTime`, `eventID`, `activityID`, `isActive`) VALUES
('Dropsaw', 'Man the Dropsaw', 'Building 4', '2014-10-13', '2014-10-13', '0900', '1200', 17, 1, 1),
('Drill', 'Grow a beard and use a drill', 'Building 11', '2014-10-06', '2014-10-06', '0900', '0900', 17, 2, 1),
('ww', 'qq', 'q', '2014-10-05', '2014-10-06', '1212', '1212', 17, 3, 1),
('Does this get delete', 'Delete me plz', 'Deleted', '2014-10-14', '2014-10-24', '1300', '1600', 30, 4, 1),
('ASRDTFY', 'sryg', 'dg5t', '2014-10-30', '2014-10-31', '1200', '1200', 31, 5, 0),
('awert', 'mnbcx', 'erttryu', '2014-10-29', '2014-10-30', '1200', '1200', 31, 6, 1);

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
('01234567', 6, '2014-10-25', 1),
('11655178', 4, '2014-10-19', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eventID`, `name`, `description`, `startDate`, `endDate`, `location`, `managerID`, `isActive`) VALUES
(17, 'Open day', 'Chance for members of public to screw around in UTS public toliets', '2014-10-15', '2014-10-15', 'UTS city campus', '11655178', 1),
(18, 'tftvtfv', 'tdcrfvtgbyhnuj', '2014-10-08', '2014-10-16', 'sdfgh', '11655178', 1),
(19, 'asdasd', 'asdasd', '2014-10-09', '2014-10-16', 'qwrwef', '11655178', 1),
(20, 'asdad', 'asdasd', '2014-10-10', '2014-10-17', 'dfgh', '11655178', 1),
(21, 'Break the Bank', 'Money be on my mind', '2014-10-07', '2014-10-21', 'Bank of Australia', '11655178', 1),
(30, 'Delete me', 'I want to be deleted', '2014-10-29', '2014-10-30', 'yolo sweg', '11655178', 1),
(31, 'asdg', 'asfde4as', '2014-10-30', '2014-10-31', 'ADS', '11655178', 1);

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
  `hours` int(3) NOT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `userID` varchar(10) DEFAULT NULL,
  `activityID` int(10) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `requiredPeople` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`roleID`),
  KEY `userID` (`userID`),
  KEY `activityID` (`activityID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleID`, `name`, `isPaid`, `description`, `requirements`, `hours`, `rate`, `userID`, `activityID`, `isActive`, `requiredPeople`) VALUES
(4, 'Titit', 0, 'h8', 'm8', 0, '0.00', NULL, 1, 0, 1),
(5, 'Ballin', 0, 'h8', 'm88', 0, '0.00', NULL, 1, 0, 1),
(6, 'PLz delete me', 0, 'Yulla', 'Hulla Mahn', 0, '0.00', NULL, 4, 1, 1),
(7, 'derrolyfe', 1, 'Nice work', 'champo', 0, '1.00', NULL, 4, 0, 1),
(8, 'derrolyfe', 1, 'Nice work', 'champo', 0, '1.00', NULL, 4, 0, 1),
(9, 'Hi', 0, 'hi', 'hi', 0, '0.00', NULL, 4, 0, 1),
(10, 'Merp', 1, 'herro dere', 'merp', 0, '100.00', NULL, 6, 0, 1);

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
(4, '2014-10-22', '0900', '1200'),
(5, '2014-10-22', '0900', '1200'),
(6, '2014-10-01', '1400', '1500'),
(7, '2014-09-05', '1234', '1500'),
(8, '2014-11-11', '1234', '1500'),
(9, '2014-10-29', '0100', '1200'),
(10, '2014-10-29', '1234', '1235');

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
('11655178', 'FEIT1', 'Database Managers');

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
('01234567', 'Flipping Burgers errday', 'Macdonalds14', 'C10143v5');

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
('01234567', 'bao', 'sexy', 'kajck1994@gmail.com', '123456', '0400888666', '1994-04-21', 'm', 0, 1),
('11223344', 'Herp', 'Derp', 'herp', 'mate', '0420373228', '1994-02-19', 'm', 0, 1),
('11223355', '123', 'rswre', '1123123@we.com', 'mate', '1234567812', '2014-10-22', 'm', 0, 1),
('11655177', 'asd', 'asd', 'asdddasdsw@.com', 'mate', '0430338161', '2014-10-14', 'm', 0, 1),
('11655178', 'Joshua', 'Killen', 'killenova1@live.com', 'barrington', '0430338161', '1994-02-19', 'm', 2, 1);

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
  ADD CONSTRAINT `role_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON UPDATE CASCADE,
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

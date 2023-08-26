-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2022 at 04:17 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `profilegenerator`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `EMAIL` varchar(100) NOT NULL,
  `PASSWORD` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`EMAIL`, `PASSWORD`) VALUES
('admin@gmail.com', 'admin@1234');

-- --------------------------------------------------------

--
-- Table structure for table `educationdetails`
--

CREATE TABLE `educationdetails` (
  `ID` int(11) NOT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `EDUCATION` varchar(100) NOT NULL,
  `INSTITUTE_NAME` varchar(500) NOT NULL,
  `START_DATE` varchar(20) NOT NULL,
  `END_DATE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `experiencedetails`
--

CREATE TABLE `experiencedetails` (
  `ID` int(11) NOT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `DESIGNATION` varchar(200) NOT NULL,
  `COMPANY` varchar(100) NOT NULL,
  `CITY` varchar(100) NOT NULL,
  `START_DATE` varchar(20) NOT NULL,
  `END_DATE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logindetails`
--

CREATE TABLE `logindetails` (
  `EMAIL` varchar(200) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `REGISTER_AS` varchar(10) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `projectdetails`
--

CREATE TABLE `projectdetails` (
  `ID` int(11) NOT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `PROJECT_NAME` varchar(500) NOT NULL,
  `YEAR` varchar(20) NOT NULL,
  `DESCRIPTION` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `qualification_details`
--

CREATE TABLE `qualification_details` (
  `ID` int(11) NOT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `DIPLOMA` varchar(200) DEFAULT NULL,
  `BTECH` varchar(200) DEFAULT NULL,
  `MTECH` varchar(200) DEFAULT NULL,
  `PHD` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `resumedetails`
--

CREATE TABLE `resumedetails` (
  `RESUME_ID` int(11) NOT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `NAME` varchar(100) DEFAULT NULL,
  `EMAIL_IN_RESUME` varchar(500) DEFAULT NULL,
  `ADDRESS` varchar(2000) DEFAULT NULL,
  `PHONE` varchar(20) DEFAULT NULL,
  `NATIONALITY` varchar(50) DEFAULT NULL,
  `HOBBIES` varchar(1000) DEFAULT NULL,
  `LANGUAGES_KNOWN` varchar(1000) DEFAULT NULL,
  `PROGRAMING_LANGUAGES_KNOWN` varchar(500) DEFAULT NULL,
  `WEBSITE` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff_details`
--

CREATE TABLE `staff_details` (
  `STAFF_ID` int(11) NOT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `PROFILE_IMAGE` varchar(200) DEFAULT '',
  `DOB` varchar(50) DEFAULT NULL,
  `GENDER` varchar(20) DEFAULT NULL,
  `AGE` int(11) DEFAULT NULL,
  `ABOUT` varchar(5000) DEFAULT NULL,
  `DESIGNATION` varchar(100) DEFAULT NULL,
  `FB_LINK` varchar(500) DEFAULT NULL,
  `INSTA_LINK` varchar(500) DEFAULT NULL,
  `TWITTER_LINK` varchar(500) DEFAULT NULL,
  `LINKEDIN_LINK` varchar(500) DEFAULT NULL,
  `JOB_TYPE` varchar(50) DEFAULT NULL,
  `PEN_NUM` int(11) DEFAULT NULL,
  `EMP_NO` int(11) DEFAULT NULL,
  `PSC` varchar(100) DEFAULT NULL,
  `APPOINTMENT_LETTER` varchar(50) DEFAULT NULL,
  `PHONE` varchar(20) DEFAULT NULL,
  `JOINING_DATE` varchar(50) DEFAULT NULL,
  `REVELING_DATE` varchar(50) DEFAULT 'NA'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `ID` int(11) NOT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `PROFILE_IMAGE` varchar(200) NOT NULL DEFAULT 'profile-img.jpg',
  `DOB` varchar(50) DEFAULT NULL,
  `GENDER` varchar(30) DEFAULT NULL,
  `AGE` int(11) DEFAULT NULL,
  `ABOUT` varchar(2000) DEFAULT NULL,
  `BLOOD_GROUP` varchar(10) DEFAULT NULL,
  `ADMISSION_NO` int(11) DEFAULT NULL,
  `ROLL_NO` int(11) DEFAULT NULL,
  `KTU_ID` varchar(30) DEFAULT NULL,
  `CURRENT_YEAR` int(11) DEFAULT NULL,
  `PHONE` varchar(100) DEFAULT NULL,
  `NATIONALITY` varchar(30) DEFAULT NULL,
  `FB_LINK` varchar(500) DEFAULT NULL,
  `INSTA_LINK` varchar(500) DEFAULT NULL,
  `TWITTER_LINK` varchar(500) DEFAULT NULL,
  `LINKED_IN` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`EMAIL`);

--
-- Indexes for table `educationdetails`
--
ALTER TABLE `educationdetails`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EMAIL_fk` (`EMAIL`);

--
-- Indexes for table `experiencedetails`
--
ALTER TABLE `experiencedetails`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EMAIL_fk` (`EMAIL`);

--
-- Indexes for table `logindetails`
--
ALTER TABLE `logindetails`
  ADD PRIMARY KEY (`EMAIL`);

--
-- Indexes for table `projectdetails`
--
ALTER TABLE `projectdetails`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EMAIL_fk` (`EMAIL`);

--
-- Indexes for table `qualification_details`
--
ALTER TABLE `qualification_details`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EMAIL_fk` (`EMAIL`);

--
-- Indexes for table `resumedetails`
--
ALTER TABLE `resumedetails`
  ADD PRIMARY KEY (`RESUME_ID`),
  ADD KEY `EMAIL_fk` (`EMAIL`);

--
-- Indexes for table `staff_details`
--
ALTER TABLE `staff_details`
  ADD PRIMARY KEY (`STAFF_ID`),
  ADD KEY `EMAIL_FK` (`EMAIL`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EMAIL_fk` (`EMAIL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `educationdetails`
--
ALTER TABLE `educationdetails`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `experiencedetails`
--
ALTER TABLE `experiencedetails`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `projectdetails`
--
ALTER TABLE `projectdetails`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `qualification_details`
--
ALTER TABLE `qualification_details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `resumedetails`
--
ALTER TABLE `resumedetails`
  MODIFY `RESUME_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `staff_details`
--
ALTER TABLE `staff_details`
  MODIFY `STAFF_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `educationdetails`
--
ALTER TABLE `educationdetails`
  ADD CONSTRAINT `educationdetails_ibfk_1` FOREIGN KEY (`EMAIL`) REFERENCES `logindetails` (`EMAIL`);

--
-- Constraints for table `experiencedetails`
--
ALTER TABLE `experiencedetails`
  ADD CONSTRAINT `experiencedetails_ibfk_1` FOREIGN KEY (`EMAIL`) REFERENCES `logindetails` (`EMAIL`);

--
-- Constraints for table `qualification_details`
--
ALTER TABLE `qualification_details`
  ADD CONSTRAINT `qualification_details_ibfk_1` FOREIGN KEY (`EMAIL`) REFERENCES `logindetails` (`EMAIL`);

--
-- Constraints for table `staff_details`
--
ALTER TABLE `staff_details`
  ADD CONSTRAINT `staff_details_ibfk_1` FOREIGN KEY (`EMAIL`) REFERENCES `logindetails` (`EMAIL`);

--
-- Constraints for table `student_details`
--
ALTER TABLE `student_details`
  ADD CONSTRAINT `student_details_ibfk_1` FOREIGN KEY (`EMAIL`) REFERENCES `logindetails` (`EMAIL`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

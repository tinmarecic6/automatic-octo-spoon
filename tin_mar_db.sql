-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2020 at 12:39 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tin_mar_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `Email`
--

CREATE TABLE `Email` (
  `Email_ID` int(11) NOT NULL,
  `Email` varchar(20) COLLATE utf8_croatian_ci NOT NULL,
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Location`
--

CREATE TABLE `Location` (
  `Location_ID` int(11) NOT NULL,
  `Street_address` varchar(30) COLLATE utf8_croatian_ci NOT NULL,
  `Street_no` int(11) NOT NULL,
  `City` varchar(20) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `State` varchar(20) COLLATE utf8_croatian_ci NOT NULL,
  `Zip_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Object`
--

CREATE TABLE `Object` (
  `Object_ID` int(11) NOT NULL,
  `Object_name` varchar(30) COLLATE utf8_croatian_ci NOT NULL,
  `Location_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Object_images`
--

CREATE TABLE `Object_images` (
  `Picture_ID` int(11) NOT NULL,
  `Picture` varchar(20) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `Object_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Phone`
--

CREATE TABLE `Phone` (
  `Phone_ID` int(11) NOT NULL,
  `Phone` varchar(20) COLLATE utf8_croatian_ci NOT NULL,
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Reservation`
--

CREATE TABLE `Reservation` (
  `Reservation_ID` int(11) NOT NULL,
  `Date_from` date NOT NULL,
  `Date_to` date NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Confirmed` tinyint(1) NOT NULL,
  `Object_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `User_ID` int(11) NOT NULL,
  `Username` varchar(20) COLLATE utf8_croatian_ci NOT NULL,
  `First_name` varchar(20) COLLATE utf8_croatian_ci NOT NULL,
  `Last_name` varchar(20) COLLATE utf8_croatian_ci NOT NULL,
  `User_image` varchar(20) COLLATE utf8_croatian_ci NOT NULL,
  `Type_ID` int(11) NOT NULL,
  `Date_of_birth` date NOT NULL,
  `Password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `User_type`
--

CREATE TABLE `User_type` (
  `Type_ID` int(11) NOT NULL,
  `User_type` varchar(20) COLLATE utf8_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Email`
--
ALTER TABLE `Email`
  ADD PRIMARY KEY (`Email_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `Location`
--
ALTER TABLE `Location`
  ADD PRIMARY KEY (`Location_ID`);

--
-- Indexes for table `Object`
--
ALTER TABLE `Object`
  ADD PRIMARY KEY (`Object_ID`),
  ADD KEY `Location_ID` (`Location_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `Object_images`
--
ALTER TABLE `Object_images`
  ADD PRIMARY KEY (`Picture_ID`),
  ADD KEY `Object_ID` (`Object_ID`);

--
-- Indexes for table `Phone`
--
ALTER TABLE `Phone`
  ADD PRIMARY KEY (`Phone_ID`),
  ADD KEY `phone_ibfk_1` (`User_ID`);

--
-- Indexes for table `Reservation`
--
ALTER TABLE `Reservation`
  ADD PRIMARY KEY (`Reservation_ID`),
  ADD KEY `Object_ID` (`Object_ID`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`User_ID`),
  ADD KEY `Type_ID` (`Type_ID`);

--
-- Indexes for table `User_type`
--
ALTER TABLE `User_type`
  ADD PRIMARY KEY (`Type_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Email`
--
ALTER TABLE `Email`
  ADD CONSTRAINT `email_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Object`
--
ALTER TABLE `Object`
  ADD CONSTRAINT `object_ibfk_1` FOREIGN KEY (`Location_ID`) REFERENCES `location` (`Location_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `object_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `Object_images`
--
ALTER TABLE `Object_images`
  ADD CONSTRAINT `object_images_ibfk_1` FOREIGN KEY (`Object_ID`) REFERENCES `object` (`Object_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Phone`
--
ALTER TABLE `Phone`
  ADD CONSTRAINT `phone_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Reservation`
--
ALTER TABLE `Reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`Object_ID`) REFERENCES `object` (`Object_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `User`
--
ALTER TABLE `User`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`Type_ID`) REFERENCES `user_type` (`Type_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `User_type`
--
ALTER TABLE `User_type`
  ADD CONSTRAINT `user_type_ibfk_1` FOREIGN KEY (`Type_ID`) REFERENCES `user` (`User_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2020 at 08:55 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tinmar_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `Email_ID` int(11) NOT NULL,
  `Email` varchar(30) COLLATE utf8_croatian_ci NOT NULL,
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`Email_ID`, `Email`, `User_ID`) VALUES
(3, 'marijahorvat@gmail.com', 8),
(4, 'ivan.matic@yahoo.com', 9),
(5, 'apetr@gmail.com', 10),
(6, 'josiptomic@uniri.hr', 11),
(12, 'tinomargan@gmail.com', 6),
(13, 'tinmarecic@gmail.com', 7);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `Location_ID` int(11) NOT NULL,
  `City` varchar(20) COLLATE utf8_croatian_ci NOT NULL,
  `Zip_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`Location_ID`, `City`, `Zip_code`) VALUES
(3, 'Rijeka', 51000),
(4, 'Zagreb', 10000),
(5, 'Dubrovnik', 20000),
(6, 'Zadar', 23000),
(7, 'Slavonski Brod', 35000);

-- --------------------------------------------------------

--
-- Table structure for table `object`
--

CREATE TABLE `object` (
  `Object_ID` int(11) NOT NULL,
  `Object_name` varchar(30) COLLATE utf8_croatian_ci NOT NULL,
  `Object_desc` text COLLATE utf8_croatian_ci NOT NULL,
  `Price` int(11) NOT NULL,
  `Location_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `object`
--

INSERT INTO `object` (`Object_ID`, `Object_name`, `Object_desc`, `Price`, `Location_ID`, `User_ID`) VALUES
(6, 'Villa Anic', 'A large villa first line by the sea. This is a truly special property as it offers a lot more than a regular villa at a typical location. You have in fact three separate apartments across the three floors making up a complex that rents as one, perfect for different arrangements of larger groups or families.', 229, 5, 6),
(8, 'Villa Slavonija', 'This 5 star Villa is a family run business located in Slavonski Brod, a historic town in the eastern part of Croatia. Its 9 rooms have everything you need to enjoy your stay, including free breakfast, a bar, free Wifi, air-conditioning and is in walking distance from all the landmarks in Slavonski Brod.', 259, 7, 7),
(9, 'Villa Diana', 'Villa Diana has seven units of different sizes, from 20 m² to 87 m², which are divided into two apartments with one bedroom, one deluxe apartment with two bedrooms, a superior studio, two double bedrooms and one superior double room. All apartments and rooms have a private bathroom, LCD/ TV with satelite, Internet access, central heating and air conditioning.', 309, 6, 7),
(10, 'Villa Serena', 'This delightful villa is full of atmosphere – an ancient house restored to high standards to combine the charm and quality of the original house with modern design.  Recently renovated, this accommodation on three floors consists: three double bedrooms with fully equipped en-suite bathrooms on the first floor, lounge / kitchen / dining area with the magnificent terrace on the second floor and master bedroom with an en suite bathroom on the top floor, all with air-conditioning units and ceiling fans. The fifth bedroom is situated on the ground floor. The spacious rooms are comfortably furnished in a modern style with some rustic pieces.', 329, 5, 8),
(11, 'Villa Zagreb', 'Villa Zagreb is suitable for up to 12 people in 5 bedrooms. Ideal for large families and groups of friends. The villa stretches over three floors. Downstairs you will find one bedroom, a gym where you can keep yourself fit, a bathroom and a covered terrace with barbecue. On the mezzanine is a large living room, as well as a dining room and kitchen, bathroom, a bedroom with a single bed, as well as another large terrace with panoramic views. The second floor is reserved for a comfortable sleep, has 3 bedrooms and an additional bathroom.', 349, 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `object_images`
--

CREATE TABLE `object_images` (
  `Picture_ID` int(11) NOT NULL,
  `Picture` varchar(20) COLLATE utf8_croatian_ci NOT NULL,
  `Object_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `object_images`
--

INSERT INTO `object_images` (`Picture_ID`, `Picture`, `Object_ID`) VALUES
(5, '747534653.jpg', 6),
(6, '1778733437.jpg', 6),
(7, '1568071428.jpg', 6),
(8, '1635763770.jpg', 6),
(9, '1369500764.jpg', 6),
(15, '1854726116.jpg', 8),
(16, '852484952.jpg', 8),
(17, '1684153393.jpg', 8),
(18, '1036106949.jpg', 8),
(19, '543307524.jpg', 8),
(20, '1477582779.jpg', 9),
(21, '388030697.jpg', 9),
(22, '1114432682.jpg', 9),
(23, '1868925994.jpg', 9),
(24, '2139867059.jpg', 9),
(25, '1099713797.jpg', 10),
(26, '785242335.jpg', 10),
(27, '1780153232.jpg', 10),
(28, '1056988874.jpg', 10),
(29, '858685105.jpg', 10),
(30, '2041514996.jpg', 11),
(31, '583169016.jpg', 11),
(32, '2083002886.jpg', 11),
(33, '2004326689.jpg', 11),
(34, '204982488.jpg', 11);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `Reservation_ID` int(11) NOT NULL,
  `Date_from` date NOT NULL,
  `Date_to` date NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Confirmed` tinyint(1) NOT NULL,
  `Object_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`Reservation_ID`, `Date_from`, `Date_to`, `Status`, `Confirmed`, `Object_ID`, `User_ID`) VALUES
(13, '2020-07-12', '2020-07-16', 1, 0, 6, 10),
(14, '2020-06-30', '2020-07-07', 1, 0, 9, 11),
(15, '2020-08-17', '2020-08-26', 1, 0, 10, 9),
(16, '2020-07-27', '2020-07-31', 1, 0, 6, 9),
(17, '2020-07-06', '2020-07-13', 1, 0, 10, 6),
(18, '2020-09-01', '2020-09-07', 1, 0, 10, 7);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` int(11) NOT NULL,
  `Username` varchar(20) COLLATE utf8_croatian_ci NOT NULL,
  `First_name` varchar(20) COLLATE utf8_croatian_ci NOT NULL,
  `Last_name` varchar(20) COLLATE utf8_croatian_ci NOT NULL,
  `User_image` varchar(20) COLLATE utf8_croatian_ci NOT NULL,
  `Type_ID` int(11) NOT NULL,
  `Date_of_birth` date NOT NULL,
  `Password` varchar(40) COLLATE utf8_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `Username`, `First_name`, `Last_name`, `User_image`, `Type_ID`, `Date_of_birth`, `Password`) VALUES
(5, 'admin', 'Admin', 'Admin', '', 1, '2020-01-01', '21232f297a57a5a743894a0e4a801fc3'),
(6, 'tinomargan', 'Tino', 'Margan', '', 2, '1995-08-30', 'a7abb85eaf85db125f95d4e656c75e3f'),
(7, 'tinmarecic', 'Tin', 'Marecic', '', 2, '2019-07-09', '3ecffdcbbb3dcefa527942795f05e885'),
(8, 'mhorvat', 'Marija', 'Horvat', '1262416892.jpg', 2, '1993-02-19', '81dc9bdb52d04dc20036dbd8313ed055'),
(9, 'imatic', 'Ivan', 'Matic', '1548690205.jpg', 3, '1994-03-09', 'd21b180434601f478040ce96732546ad'),
(10, 'anap', 'Ana', 'Petrovic', '2105687838.jpg', 3, '1998-03-12', '674f3c2c1a8a6f90461e8a66fb5550ba'),
(11, 'jtomic', 'Josip', 'Tomic', '1441766616.jpg', 3, '1999-10-10', 'c9a57b8c6a09fb4bc306911c445af7e7');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `Type_ID` int(11) NOT NULL,
  `User_type` varchar(20) COLLATE utf8_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`Type_ID`, `User_type`) VALUES
(1, 'Admin'),
(2, 'Host'),
(3, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`Email_ID`),
  ADD KEY `email-user` (`User_ID`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`Location_ID`);

--
-- Indexes for table `object`
--
ALTER TABLE `object`
  ADD PRIMARY KEY (`Object_ID`),
  ADD KEY `object-location` (`Location_ID`),
  ADD KEY `object-user` (`User_ID`);

--
-- Indexes for table `object_images`
--
ALTER TABLE `object_images`
  ADD PRIMARY KEY (`Picture_ID`),
  ADD KEY `object_images-object` (`Object_ID`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`Reservation_ID`),
  ADD KEY `reservation-object` (`Object_ID`),
  ADD KEY `reservation-user_id` (`User_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`),
  ADD UNIQUE KEY `UNIQUE_Username` (`Username`),
  ADD KEY `user-user_type` (`Type_ID`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`Type_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `Email_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `Location_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `object`
--
ALTER TABLE `object`
  MODIFY `Object_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `object_images`
--
ALTER TABLE `object_images`
  MODIFY `Picture_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `Reservation_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `Type_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `email`
--
ALTER TABLE `email`
  ADD CONSTRAINT `email-user` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `object`
--
ALTER TABLE `object`
  ADD CONSTRAINT `object-location` FOREIGN KEY (`Location_ID`) REFERENCES `location` (`Location_ID`),
  ADD CONSTRAINT `object-user` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `object_images`
--
ALTER TABLE `object_images`
  ADD CONSTRAINT `object_images-object` FOREIGN KEY (`Object_ID`) REFERENCES `object` (`Object_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation-object` FOREIGN KEY (`Object_ID`) REFERENCES `object` (`Object_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation-user_id` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user-user_type` FOREIGN KEY (`Type_ID`) REFERENCES `user_type` (`Type_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

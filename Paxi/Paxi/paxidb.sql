-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2017 at 08:36 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paxidb`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `TaxiID` int(15) NOT NULL,
  `CommentID` int(15) NOT NULL,
  `UserID` int(15) NOT NULL,
  `CommentText` varchar(140) DEFAULT NULL,
  `CommentRating` int(11) NOT NULL,
  `CommentDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`TaxiID`, `CommentID`, `UserID`, `CommentText`, `CommentRating`, `CommentDate`) VALUES
(13, 3, 1, 'Cok konforlu guzel bir surus keyfi yasadim', 3, '2017-03-05'),
(14, 4, 2, 'Kibar bir beyefendi', 4, '2017-03-03'),
(15, 5, 3, 'Dikkatli bir surucuydu', 3, '2017-02-05'),
(14, 6, 4, 'Navigasyon kullanmadı yolu uzattı', 5, '2017-06-18'),
(10, 7, 5, 'Taximetre olması gerektiğinden fazla yazdı. Galiba içine bir yazılım yerleştirmiş', 5, '2017-05-05'),
(16, 8, 2, 'Cok konforlu guzel bir surus keyfi yasadim', 5, '2017-07-07'),
(11, 9, 8, 'Berbat bir surucu. Yuregim agzıma geldi', 2, '2017-03-15'),
(12, 10, 7, 'Taxici butun yol konustu. Beni rahatsız etti', 4, '2017-06-11'),
(14, 11, 8, ' guzel bir surus keyfi yasadim. Araba da güzeldi', 3, '2017-02-04'),
(10, 12, 1, '', 0, '2017-02-06');

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `TaxiID` int(15) NOT NULL,
  `UserID` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favourite`
--

INSERT INTO `favourite` (`TaxiID`, `UserID`) VALUES
(10, 3),
(10, 7),
(11, 2),
(11, 6),
(12, 5),
(12, 7),
(13, 1),
(13, 2),
(13, 4),
(14, 3),
(14, 8),
(15, 2),
(16, 5),
(16, 8);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `UserID` int(15) NOT NULL,
  `UserName` varchar(15) CHARACTER SET utf8 NOT NULL,
  `Password` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`UserID`, `UserName`, `Password`) VALUES
(11, 'AtesdeYanayim', '1234567'),
(5, 'canan1992', '23451'),
(4, 'Cansu94', '35267'),
(7, 'ege1453', '54321'),
(2, 'honurbey', '32546'),
(1, 'kebelekkerem', '12345'),
(18, 'Lena91', '123123'),
(12, 'sevdaninSonVuru', '123123'),
(8, 'talatpasa', '32145'),
(3, 'tolgaHan', '36785'),
(6, 'ugur1903', '13542');

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `StationID` int(15) NOT NULL,
  `StationName` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `ZipCode` int(5) NOT NULL,
  `Street` varchar(50) CHARACTER SET utf8 NOT NULL,
  `BuildingNo` int(5) NOT NULL,
  `PhoneNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`StationID`, `StationName`, `ZipCode`, `Street`, `BuildingNo`, `PhoneNumber`) VALUES
(1, 'GultepeTaxi', 34668, 'gultepe ', 3, 2123532534),
(2, 'SelimiyeTaxi', 34669, 'elma ', 11, 4678900),
(3, '4.MuratTaxi', 34667, 'fevzipasa ', 23, 2124589304),
(4, 'BalcovaTaxi', 34666, 'Sair Nesimi', 34, 2395892),
(5, 'CincinTaxi', 34665, 'Nazımpasa', 45, 5679459),
(6, 'KagithaneTaxi', 34662, 'Dergah', 45, 2473456),
(7, 'KosuyoluTaxi', 34661, 'validebag', 13, 4556783);

-- --------------------------------------------------------

--
-- Table structure for table `taxi`
--

CREATE TABLE `taxi` (
  `TaxiID` int(15) NOT NULL,
  `Plate` varchar(9) CHARACTER SET utf8 NOT NULL,
  `ModelYear` int(4) DEFAULT NULL,
  `VehicleID` int(15) NOT NULL,
  `StationID` int(15) NOT NULL,
  `TaxiRating` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taxi`
--

INSERT INTO `taxi` (`TaxiID`, `Plate`, `ModelYear`, `VehicleID`, `StationID`, `TaxiRating`) VALUES
(10, '34 TCY 28', 1998, 1, 1, 4.2),
(11, '34 TRS 56', 2008, 2, 2, 5),
(12, '34 THS 28', 2006, 3, 3, 2.2),
(13, '34 THY 55', 2010, 4, 4, 1.2),
(14, '34 TSU 10', 2015, 5, 5, 3.5),
(15, '34 TKF 20', 2015, 6, 6, 4.5),
(16, '34 TJK 03', 2017, 7, 7, 4.5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(15) NOT NULL,
  `NameOfUser` varchar(45) NOT NULL,
  `SurnameOfUser` varchar(45) NOT NULL,
  `Age` varchar(3) DEFAULT NULL,
  `EmailUser` varchar(45) NOT NULL,
  `Gender` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `NameOfUser`, `SurnameOfUser`, `Age`, `EmailUser`, `Gender`) VALUES
(1, 'Kerem', 'urman', '24', 'kurman1@binghamton.edu', 'Male'),
(2, 'Halil', 'arslan', '25', 'harslan1@binghamton.edu', 'Male'),
(3, 'Tolga', 'Vahap', '24', 'tolga1@binghamton.edu', 'Male'),
(4, 'Cansu', 'Kaya', '22', 'cansu1@binghamton.edu', 'Female'),
(5, 'Canan', 'Ates', '27', 'cananes@bogazici.edu', 'Female'),
(6, 'Ugur', 'Yilmaz', '23', 'ugurlu@hotmail.com', 'Male'),
(7, 'Ege', 'Konuk', '23', 'egekok@gmail.com', 'Male'),
(8, 'Talat', 'Genc', '34', 'tlt123@gmail.com', ''),
(11, 'elcin', 'cavus', '22', 'ecavus1@binghamton.edu', 'Male'),
(12, 'Furkan', 'Dindar', '23', 'fdindar1@binghamton.edu', 'Male'),
(18, 'Lena', 'Oxton', '26', 'lena91@hotmail.com', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `VehicleID` int(15) NOT NULL,
  `Manufacturer` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `Model` varchar(30) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`VehicleID`, `Manufacturer`, `Model`) VALUES
(1, 'opel', 'astra'),
(2, 'opel', 'zafira'),
(3, 'opel', 'meriva'),
(4, 'opel', 'corsa'),
(5, 'fiat', 'doblo'),
(6, 'fiat', 'doblo'),
(7, 'fiat', 'tourneo');

-- --------------------------------------------------------

--
-- Table structure for table `zipcode`
--

CREATE TABLE `zipcode` (
  `ZipCode` int(5) NOT NULL,
  `City` varchar(30) CHARACTER SET utf8 NOT NULL,
  `Country` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zipcode`
--

INSERT INTO `zipcode` (`ZipCode`, `City`, `Country`) VALUES
(34661, 'Istanbul', 'Kosuyolu'),
(34662, 'Istanbul', 'Kagithane'),
(34665, 'Ankara', 'Kizilay'),
(34666, 'İzmir', 'Karsiyaka'),
(34667, 'Kocaeli', 'Kocaeli'),
(34668, 'Istanbul', 'Besiktas'),
(34669, 'Eskisehir', 'Cincin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `TaxiID` (`TaxiID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`TaxiID`,`UserID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`UserName`),
  ADD UNIQUE KEY `UserID` (`UserID`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`StationID`),
  ADD KEY `ZipCode` (`ZipCode`);

--
-- Indexes for table `taxi`
--
ALTER TABLE `taxi`
  ADD PRIMARY KEY (`TaxiID`),
  ADD UNIQUE KEY `Plate` (`Plate`),
  ADD KEY `VehicleID` (`VehicleID`),
  ADD KEY `StationID` (`StationID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `EmailUser` (`EmailUser`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`VehicleID`);

--
-- Indexes for table `zipcode`
--
ALTER TABLE `zipcode`
  ADD PRIMARY KEY (`ZipCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `CommentID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `station`
--
ALTER TABLE `station`
  MODIFY `StationID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `taxi`
--
ALTER TABLE `taxi`
  MODIFY `TaxiID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `VehicleID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`TaxiID`) REFERENCES `taxi` (`TaxiID`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `favourite`
--
ALTER TABLE `favourite`
  ADD CONSTRAINT `favourite_ibfk_1` FOREIGN KEY (`TaxiID`) REFERENCES `taxi` (`TaxiID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `favourite_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON UPDATE CASCADE;

--
-- Constraints for table `register`
--
ALTER TABLE `register`
  ADD CONSTRAINT `register_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON UPDATE CASCADE;

--
-- Constraints for table `station`
--
ALTER TABLE `station`
  ADD CONSTRAINT `station_ibfk_1` FOREIGN KEY (`ZipCode`) REFERENCES `zipcode` (`ZipCode`) ON UPDATE CASCADE;

--
-- Constraints for table `taxi`
--
ALTER TABLE `taxi`
  ADD CONSTRAINT `taxi_ibfk_1` FOREIGN KEY (`VehicleID`) REFERENCES `vehicle` (`VehicleID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `taxi_ibfk_2` FOREIGN KEY (`StationID`) REFERENCES `station` (`StationID`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

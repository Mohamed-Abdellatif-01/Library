-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 14, 2018 at 08:47 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.2.1

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
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `AccountID` int(11) NOT NULL,
  `UserName` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`AccountID`, `UserName`, `Password`, `FirstName`, `LastName`) VALUES
(1, 'admin', '123', 'mohamed', 'ahmed');

-- --------------------------------------------------------

--
-- Table structure for table `bookauthor`
--

CREATE TABLE `bookauthor` (
  `BookID` int(11) NOT NULL,
  `AuthorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookauthor`
--

INSERT INTO `bookauthor` (`BookID`, `AuthorID`) VALUES
(10, 3),
(11, 3),
(10, 4),
(11, 4),
(14, 4),
(9, 5),
(11, 5),
(13, 5),
(14, 5),
(11, 6),
(13, 6),
(14, 6);

-- --------------------------------------------------------

--
-- Table structure for table `books_has_type`
--

CREATE TABLE `books_has_type` (
  `BookID` int(11) NOT NULL,
  `TypeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books_has_type`
--

INSERT INTO `books_has_type` (`BookID`, `TypeID`) VALUES
(9, 1),
(10, 1),
(14, 1),
(9, 2),
(10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `edition`
--

CREATE TABLE `edition` (
  `ISBN` bigint(20) NOT NULL,
  `EditionNum` int(11) NOT NULL,
  `BookID` int(11) NOT NULL,
  `PrintDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `edition`
--

INSERT INTO `edition` (`ISBN`, `EditionNum`, `BookID`, `PrintDate`) VALUES
(12222, 1, 11, '0000-00-00'),
(321321321, 1, 14, '0000-00-00'),
(1111111111111, 1, 9, '0000-00-00'),
(23132133331111, 1, 13, '0000-00-00'),
(111111111111111, 1, 10, '2018-12-29');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `GenreID` int(11) NOT NULL,
  `GenreName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`GenreID`, `GenreName`) VALUES
(1, 'dsadsadsa'),
(2, 'mamamam'),
(3, 'ddddddd'),
(4, 'action'),
(5, 'comedy');

-- --------------------------------------------------------

--
-- Table structure for table `genre_has_books`
--

CREATE TABLE `genre_has_books` (
  `BookID` int(11) NOT NULL,
  `GenreID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genre_has_books`
--

INSERT INTO `genre_has_books` (`BookID`, `GenreID`) VALUES
(10, 1),
(11, 1),
(14, 1),
(10, 2),
(11, 2),
(9, 4),
(9, 5),
(13, 5),
(14, 5);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `BookID` int(11) NOT NULL,
  `BookTittle` text NOT NULL,
  `NumOfPages` int(11) NOT NULL,
  `PublishingDate` date NOT NULL,
  `Quantity` int(11) NOT NULL,
  `BestOfCollection` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`BookID`, `BookTittle`, `NumOfPages`, `PublishingDate`, `Quantity`, `BestOfCollection`) VALUES
(9, 'dsadsadas', 324, '0000-00-00', 222, ''),
(10, 'dsadsadas', 324, '2018-12-29', 222, 'on'),
(11, 'dsadsadas', 324, '0000-00-00', 222, 'on'),
(13, 'aaasddsddssdds', 212, '0000-00-00', 21, ''),
(14, 'dsadsadsadsa', 2121, '0000-00-00', 21, 'on');

-- --------------------------------------------------------

--
-- Table structure for table `libauthors`
--

CREATE TABLE `libauthors` (
  `AuthorID` int(11) NOT NULL,
  `AuthorName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `libauthors`
--

INSERT INTO `libauthors` (`AuthorID`, `AuthorName`) VALUES
(3, 'dsdsadscza'),
(4, 'dsa'),
(5, 'abdalla ashraf'),
(6, 'dsadsadsa');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `TypeID` int(11) NOT NULL,
  `NameOfType` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`TypeID`, `NameOfType`) VALUES
(1, 'E-Book'),
(2, 'Printed Book');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`AccountID`),
  ADD UNIQUE KEY `UserName_UNIQUE` (`UserName`);

--
-- Indexes for table `bookauthor`
--
ALTER TABLE `bookauthor`
  ADD PRIMARY KEY (`BookID`,`AuthorID`),
  ADD KEY `fk_Books_has_Authors_Authors1` (`AuthorID`);

--
-- Indexes for table `books_has_type`
--
ALTER TABLE `books_has_type`
  ADD PRIMARY KEY (`BookID`,`TypeID`),
  ADD KEY `fk_Books_has_Type of Book_Type of Book1` (`TypeID`);

--
-- Indexes for table `edition`
--
ALTER TABLE `edition`
  ADD PRIMARY KEY (`ISBN`),
  ADD KEY `fk_edition_Items1` (`BookID`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`GenreID`);

--
-- Indexes for table `genre_has_books`
--
ALTER TABLE `genre_has_books`
  ADD PRIMARY KEY (`BookID`,`GenreID`),
  ADD KEY `fk_genre_has_Books_genre1` (`GenreID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`BookID`);

--
-- Indexes for table `libauthors`
--
ALTER TABLE `libauthors`
  ADD PRIMARY KEY (`AuthorID`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`TypeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `AccountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `GenreID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `BookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `libauthors`
--
ALTER TABLE `libauthors`
  MODIFY `AuthorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `TypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookauthor`
--
ALTER TABLE `bookauthor`
  ADD CONSTRAINT `fk_Books_has_Authors_Authors1` FOREIGN KEY (`AuthorID`) REFERENCES `libauthors` (`AuthorID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Books_has_Authors_Books` FOREIGN KEY (`BookID`) REFERENCES `items` (`BookID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `books_has_type`
--
ALTER TABLE `books_has_type`
  ADD CONSTRAINT `fk_Books_has_Type of Book_Books1` FOREIGN KEY (`BookID`) REFERENCES `items` (`BookID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Books_has_Type of Book_Type of Book1` FOREIGN KEY (`TypeID`) REFERENCES `type` (`TypeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `edition`
--
ALTER TABLE `edition`
  ADD CONSTRAINT `fk_edition_Items1` FOREIGN KEY (`BookID`) REFERENCES `items` (`BookID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `genre_has_books`
--
ALTER TABLE `genre_has_books`
  ADD CONSTRAINT `fk_genre_has_Books_Books1` FOREIGN KEY (`BookID`) REFERENCES `items` (`BookID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_genre_has_Books_genre1` FOREIGN KEY (`GenreID`) REFERENCES `genre` (`GenreID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

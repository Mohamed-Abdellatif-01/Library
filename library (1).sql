-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 28, 2018 at 04:48 PM
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
(1, 'admin', '123', 'mohamed', 'abdellateef'),
(2, 'mohamed', '123', 'Mohamed', 'Ahmed'),
(4, 'mohamed1', '123', 'Mohamed', 'Ahmed'),
(5, 'sdad', '123', 'modsam', 'fdnsl'),
(6, 'sdad2', '213', 'modsam', 'fdnsl'),
(7, 'ewqewq', 'ewq', 'Mohamed', 'Ahmed'),
(8, 'das', 'dsa', 'dsa', 'dsa'),
(10, 'mohamed12', '12345', 'mohamed', 'ahmed'),
(14, 'mohamed113', '123', 'Mohamed', 'Ahmed'),
(15, 'dsa', 'das', 'dsa', '');

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
(7, 6),
(9, 6),
(13, 6),
(5, 7),
(7, 7),
(9, 7),
(13, 7),
(5, 8),
(6, 8),
(8, 8),
(8, 9);

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
(5, 1),
(6, 1),
(7, 1),
(13, 1),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(13, 2);

-- --------------------------------------------------------

--
-- Table structure for table `edition`
--

CREATE TABLE `edition` (
  `EditionID` int(11) NOT NULL,
  `ISBN` bigint(20) NOT NULL,
  `EditionNum` int(11) NOT NULL,
  `BookID` int(11) NOT NULL,
  `PrintDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `edition`
--

INSERT INTO `edition` (`EditionID`, `ISBN`, `EditionNum`, `BookID`, `PrintDate`) VALUES
(9, 2321312313332, 1, 5, '2018-10-03'),
(14, 11111111111111111, 1, 6, '2018-12-07'),
(15, 5154651, 1, 7, '2017-12-31'),
(16, 5145616512, 1, 8, '2016-12-30'),
(17, 65461320, 1, 9, '2015-09-27'),
(18, 321321, 1, 11, '2018-12-01'),
(20, 23321321312, 1, 13, '2018-12-01');

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
(1, 'action'),
(3, 'romantic'),
(5, 'horror');

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
(5, 1),
(6, 1),
(7, 1),
(13, 1),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 3);

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
(5, 'Harry Potter', 324, '2018-12-14', 22, ''),
(6, 'fndsjnf', 324, '2018-12-13', 22, ''),
(7, 'fewjdfdskln', 3215, '2016-09-29', 55, 'on'),
(8, 'mfdknlsfdslkn', 651654, '2015-10-28', 121, ''),
(9, 'fkdfdsnk', 54546, '2013-10-29', 52, NULL),
(10, 'fdsfds', 54851, '0000-00-00', 0, NULL),
(11, 'dsadsa', 21312, '2018-12-13', 22, NULL),
(13, 'dsadsa', 21312, '2018-12-13', 22, NULL);

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
(6, 'mohamed'),
(7, 'AHMED'),
(8, 'Ashraf'),
(9, 'abdalla');

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
(1, 'Printed Book'),
(2, 'E-Book'),
(3, 'CD'),
(4, 'DVD');

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
  ADD PRIMARY KEY (`EditionID`),
  ADD UNIQUE KEY `ISBN_UNIQUE` (`ISBN`),
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
  MODIFY `AccountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `edition`
--
ALTER TABLE `edition`
  MODIFY `EditionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `GenreID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `BookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `libauthors`
--
ALTER TABLE `libauthors`
  MODIFY `AuthorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `TypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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

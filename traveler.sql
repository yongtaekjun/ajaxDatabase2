-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2017 at 10:12 PM
-- Server version: 10.1.25-MariaDB
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
-- Database: `vacationspot`
--

-- --------------------------------------------------------

--
-- Table structure for table `traveler`
--

CREATE TABLE `traveler` (
  `travelerID` int(11) NOT NULL,
  `travelerName` varchar(20) NOT NULL,
  `travelerLastName` varchar(20) NOT NULL,
  `travelerAge` int(11) NOT NULL,
  `bookingNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `traveler`
--

INSERT INTO `traveler` (`travelerID`, `travelerName`, `travelerLastName`, `travelerAge`, `bookingNumber`) VALUES
(1, 'John', 'Cusack', 39, 1),
(2, 'Brad', 'Pit', 49, 3),
(3, 'George', 'Clooney', 59, 4),
(4, 'Donal', 'Drump', 69, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `traveler`
--
ALTER TABLE `traveler`
  ADD PRIMARY KEY (`travelerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `traveler`
--
ALTER TABLE `traveler`
  MODIFY `travelerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

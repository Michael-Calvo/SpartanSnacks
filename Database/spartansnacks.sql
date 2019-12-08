-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2019 at 12:57 AM
-- Server version: 10.4.8-MariaDB
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
-- Database: `spartansnacks`
--

-- --------------------------------------------------------

--
-- Table structure for table `gocount`
--

CREATE TABLE `gocount` (
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `gocount`
--

TRUNCATE TABLE `gocount`;
--
-- Dumping data for table `gocount`
--

INSERT INTO `gocount` (`count`) VALUES
(4);

-- --------------------------------------------------------

--
-- Table structure for table `spartandata`
--

CREATE TABLE `spartandata` (
  `ID` int(11) NOT NULL,
  `UUID` text NOT NULL,
  `Color` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `spartandata`
--

TRUNCATE TABLE `spartandata`;
--
-- Dumping data for table `spartandata`
--

INSERT INTO `spartandata` (`ID`, `UUID`, `Color`) VALUES
(1, '5dec8d7bdf0ef', 'Orange'),
(2, '5dec8e3ad36e6', 'Green'),
(3, '5ded8adca413d', 'Green'),
(4, '5ded8d6a3110f', 'Green');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `spartandata`
--
ALTER TABLE `spartandata`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `spartandata`
--
ALTER TABLE `spartandata`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

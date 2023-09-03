-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2023 at 10:27 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `julietjamesinteriors`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `CatID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`CatID`, `Name`) VALUES
(1, 'Fabrics'),
(2, 'Clothes'),
(3, 'Shoes');

-- --------------------------------------------------------

--
-- Table structure for table `tblbasket`
--

CREATE TABLE `tblbasket` (
  `OrderID` int(7) NOT NULL,
  `ItemID` int(4) NOT NULL,
  `ItemQuantity` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `BookingID` int(4) UNSIGNED NOT NULL,
  `UserID` int(6) NOT NULL,
  `BookingDateTime` datetime NOT NULL,
  `Price` decimal(5,2) NOT NULL,
  `Payment` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `OrderID` int(7) UNSIGNED NOT NULL,
  `UserID` int(6) NOT NULL,
  `OrderDateTime` datetime NOT NULL,
  `Dispatched` tinyint(1) NOT NULL,
  `Payment` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblstock`
--

CREATE TABLE `tblstock` (
  `ItemID` int(4) UNSIGNED NOT NULL,
  `ItemName` varchar(30) NOT NULL,
  `ItemCategory` varchar(20) NOT NULL,
  `ItemDescription` varchar(200) NOT NULL,
  `ItemImage` varchar(100) NOT NULL,
  `ItemPrice` decimal(5,2) NOT NULL,
  `ItemStock` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `UserID` int(6) UNSIGNED NOT NULL,
  `Role` tinyint(1) NOT NULL DEFAULT 0,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Forename` varchar(20) NOT NULL,
  `Surname` varchar(30) NOT NULL,
  `Postcode` varchar(7) NOT NULL,
  `AddressL1` varchar(50) NOT NULL,
  `AddressL2` varchar(50) NOT NULL,
  `Town` varchar(20) NOT NULL,
  `County` varchar(30) NOT NULL,
  `Phone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`UserID`, `Role`, `Email`, `Password`, `Forename`, `Surname`, `Postcode`, `AddressL1`, `AddressL2`, `Town`, `County`, `Phone`) VALUES
(1, 0, 'shahaleem751@gmail.com', 'Aleem@123', 'Aleem', 'Bukhari', '6000', 'Airport road', 'jamilabad Multan', 'Multan', 'Pakistan', '3006398890'),
(3, 0, 'amasanas42@gmail.com', '$2y$10$3IXxaxkHZ.ugucUKTKPxoOmcWoRqYKL9PQ2J2SSHQDTE3hQTQRvR2', 'amas', 'anas', '60000', 'city multan', 'jamilabad', 'multan', 'pakistan', '03043939393'),
(4, 0, 'amas123@gmail.com', '$2y$10$i2VbzkOFxbRgTNMbT.OzdOnHte1lUPJS05dLhtNbTv2U1sNaMdlZG', 'amas', 'anas', '60000', 'city multan', 'jamilabad', 'multan', 'Pakistan', '3043939393'),
(5, 0, 'asifaqib123@gmail.com', '$2y$10$.9.PO2ZeJi73Sr8Z9PemreeCUlw.g.wR8UXVd/mgck2rnFWY90Sla', 'asif', 'aqib', '60000', 'city multan', 'jamilabad', 'multan', 'Pakistan', '3043939393'),
(7, 0, 'abidkhan123@gmail.com', '$2y$10$eJszN1rk0NNaXDlR5rM8/.mO6Tv6lAghhTy77yGlO4Lp9Ih4IhzZe', 'Abid', 'Khan', '60000', 'city multan', 'jamilabad', 'multan', 'Pakistan', '3043939393');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`CatID`);

--
-- Indexes for table `tblbasket`
--
ALTER TABLE `tblbasket`
  ADD PRIMARY KEY (`OrderID`,`ItemID`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`BookingID`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `tblstock`
--
ALTER TABLE `tblstock`
  ADD PRIMARY KEY (`ItemID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `CatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `BookingID` int(4) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `OrderID` int(7) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblstock`
--
ALTER TABLE `tblstock`
  MODIFY `ItemID` int(4) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `UserID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

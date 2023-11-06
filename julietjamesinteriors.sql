-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2023 at 12:39 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

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
-- Table structure for table `tblbasket`
--

CREATE TABLE `tblbasket` (
  `OrderID` int(7) NOT NULL,
  `ItemID` int(4) NOT NULL,
  `ItemQuantity` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblbasket`
--

INSERT INTO `tblbasket` (`OrderID`, `ItemID`, `ItemQuantity`) VALUES
(0, 1, 1),
(0, 2, 1);

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
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `catID` int(4) UNSIGNED NOT NULL,
  `cat_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`catID`, `cat_name`) VALUES
(1, 'Sandwiches'),
(2, 'Mobiles');

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
-- Table structure for table `tblschedule`
--

CREATE TABLE `tblschedule` (
  `schedule_ID` int(6) UNSIGNED NOT NULL,
  `Date` date NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(20) NOT NULL
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

--
-- Dumping data for table `tblstock`
--

INSERT INTO `tblstock` (`ItemID`, `ItemName`, `ItemCategory`, `ItemDescription`, `ItemImage`, `ItemPrice`, `ItemStock`) VALUES
(1, 'Lemon Sandwich', 'Sandwiches', 'descript here', 'uploadsImg/young-woman-looking-through-hand-frame-against-black-backdrop.jpg', 123.00, 121),
(2, 'Lemon Sandwich', 'Sandwiches', 'descript here', 'uploadsImg/young-woman-looking-through-hand-frame-against-black-backdrop.jpg', 123.00, 121);

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
(7, 1, 'admin@gmail.com', '$2y$10$ZIZWrwl.crrL8842dZlOCeelbgmTWJSbK2te5wzI4dDjNwHhhPRVO', 'admin', 'admin', '66000', 'addrees 1', 'address 2', 'Multan ', 'Pakistan', '0321456456'),
(8, 0, 'user@gmail.com', '$2y$10$ubGx.7RxGeQjoQpV.lc1c.ksDl.G.96jAq0hGpGEdcjKAn5rvWOdK', 'user', 'user', '66700', 'address 1 ', 'address 2', 'Lahore', 'Pakistan', '0312456456');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`catID`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `tblschedule`
--
ALTER TABLE `tblschedule`
  ADD PRIMARY KEY (`schedule_ID`);

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
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `BookingID` int(4) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `catID` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `OrderID` int(7) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblschedule`
--
ALTER TABLE `tblschedule`
  MODIFY `schedule_ID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblstock`
--
ALTER TABLE `tblstock`
  MODIFY `ItemID` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `UserID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2019 at 08:38 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmc`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `Blog_ID` int(11) NOT NULL,
  `Blog_Title` varchar(100) NOT NULL,
  `Title_desc` varchar(100) NOT NULL,
  `img_url` varchar(100) NOT NULL,
  `Main_Desc` text NOT NULL,
  `Date` date NOT NULL,
  `Added_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`Blog_ID`, `Blog_Title`, `Title_desc`, `img_url`, `Main_Desc`, `Date`, `Added_ID`) VALUES
(4, 'What is Recycling?', 'There are some ISO standards related to recycling...', '15173.jpg', 'Recycling is the process of converting waste materials into new materials and objects. It is an alternative to "conventional" waste disposal that can save material and help lower greenhouse gas emissions. Recycling can prevent the waste of potentially useful materials and reduce the consumption of fresh raw materials, thereby reducing: energy usage, air pollution (from incineration), and water pollution (from landfilling). Recycling is a key component of modern waste reduction and is the third component of the "Reduce, Reuse, and Recycle" waste hierarchy. Thus, recycling aims at environmental sustainability by substituting raw material inputs into and redirecting waste outputs out of the economic system. There are some ISO standards related to recycling such as ISO 15270:2008 for plastics waste and ISO 14001:2015 for environmental management control of recycling practice.', '2019-01-02', 1),
(5, 'What are Organic Waste?', 'One of the 5 types of waste...', '2974.jpg', 'Organic waste is another common household. All food waste, garden waste, manure and rotten meat are classified as organic waste. Over time, organic waste is turned into manure by microorganisms. However, this does not mean that you can dispose them anywhere. Organic waste in landfills causes the production of methane, so it must never be simply discarded with general waste. Instead, look to get a green bin or hire a green skin bin or garden bag for proper waste disposal.', '2019-01-02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `description` varchar(200) NOT NULL,
  `location_status` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `lat`, `lng`, `description`, `location_status`) VALUES
(5, 6.919417, 79.847008, 'near the black gate', 0),
(6, 6.919181, 79.847122, 'Near the temple', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `R_ID` int(11) NOT NULL,
  `R_URL` varchar(100) NOT NULL,
  `Location` varchar(100) NOT NULL,
  `Upload_U_ID` int(11) NOT NULL,
  `Post_Status` int(1) NOT NULL,
  `Desciption` text NOT NULL,
  `gps` varchar(100) NOT NULL,
  `Manager_ID` int(11) NOT NULL,
  `Post_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`R_ID`, `R_URL`, `Location`, `Upload_U_ID`, `Post_Status`, `Desciption`, `gps`, `Manager_ID`, `Post_Date`) VALUES
(1, '15400.png', 'Moratuwa', 2, 1, 'dhrsevsk.erjvh.rh;lrkhjvmrtjhknr;khvbdsdvhvrthrthertvrthrt', '', 1, '2018-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `U_ID` int(11) NOT NULL,
  `U_Name` varchar(50) NOT NULL,
  `F_Name` varchar(50) NOT NULL,
  `L_Name` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Active` int(1) NOT NULL,
  `Status` int(2) NOT NULL,
  `Added_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`U_ID`, `U_Name`, `F_Name`, `L_Name`, `password`, `Active`, `Status`, `Added_ID`) VALUES
(1, 'adminuser', 'admin', 'user', '9bce9746013d304df7809242df877ff0', 1, 1, 0),
(2, 'testuser', 'test', 'user', '8bafe8ea5856220ba129e35dbea8f5c4', 1, 0, 0),
(3, 'garbagestaff', 'Garbage', 'Staff', '202cb962ac59075b964b07152d234b70', 1, 3, 1),
(4, 'greencaptain', 'Green', 'captain', '202cb962ac59075b964b07152d234b70', 1, 2, 1),
(7, 'taskforceuser', 'TaskForce', 'User', '202cb962ac59075b964b07152d234b70', 1, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`Blog_ID`),
  ADD KEY `Added_ID` (`Added_ID`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`R_ID`),
  ADD KEY `Upload_U_ID` (`Upload_U_ID`),
  ADD KEY `Manager_ID` (`Manager_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`U_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `Blog_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `R_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `U_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`Added_ID`) REFERENCES `users` (`U_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`Upload_U_ID`) REFERENCES `users` (`U_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

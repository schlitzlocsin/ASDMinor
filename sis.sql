-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2017 at 05:32 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sis2`
--

-- --------------------------------------------------------

--
-- Table structure for table `productledger`
--

CREATE TABLE `productledger` (
  `id` int(11) NOT NULL,
  `ProductCode` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `P_in` int(11) NOT NULL DEFAULT '0',
  `P_out` int(11) NOT NULL DEFAULT '0',
  `invoice` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productledger`
--

INSERT INTO `productledger` (`id`, `ProductCode`, `date`, `P_in`, `P_out`, `invoice`) VALUES
(1, '00011', '2017-12-04', 50, 0, '112233'),
(2, '00011', '2017-12-05', 0, 3, ''),
(3, '00011', '2017-12-05', 0, 9, ''),
(4, '00011', '2017-12-05', 0, 5, ''),
(5, '00011', '2017-12-05', 0, 5, ''),
(6, '00011', '2017-12-05', 0, 1, ''),
(7, '00011', '2017-12-05', 30, 0, '112235'),
(8, '00011', '2017-12-06', 0, 7, ''),
(9, '00011', '2017-12-06', 0, 4, ''),
(10, '00011', '2017-12-06', 0, 13, ''),
(11, '00012', '2017-12-06', 45, 0, '112236'),
(12, '00012', '2017-12-06', 0, 3, ''),
(13, '00012', '2017-12-06', 0, 10, ''),
(14, '00012', '2017-12-06', 20, 0, '112237'),
(15, '00012', '2017-12-07', 0, 2, ''),
(16, '00012', '2017-12-07', 0, 3, ''),
(17, '00012', '2017-12-07', 0, 2, ''),
(18, '00012', '2017-12-07', 0, 1, ''),
(19, '00012', '2017-12-07', 0, 4, ''),
(20, '00012', '2017-12-07', 0, 1, ''),
(21, '00013', '2017-12-06', 55, 0, '112237'),
(22, '00013', '2017-12-07', 0, 2, ''),
(23, '00013', '2017-12-07', 0, 1, ''),
(24, '00013', '2017-12-07', 0, 2, ''),
(25, '00013', '2017-12-07', 0, 1, ''),
(26, '00013', '2017-12-07', 0, 3, ''),
(27, '00013', '2017-12-07', 0, 6, ''),
(28, '00013', '2017-12-07', 15, 0, '112238'),
(29, '00013', '2017-12-08', 0, 11, ''),
(30, '00013', '2017-12-08', 0, 5, ''),
(31, '00014', '2017-12-07', 40, 0, '112238'),
(32, '00014', '2017-12-08', 0, 15, ''),
(33, '00014', '2017-12-08', 0, 10, ''),
(34, '00014', '2017-12-08', 0, 8, ''),
(35, '00014', '2017-12-08', 0, 5, ''),
(36, '00014', '2017-12-08', 0, 5, ''),
(37, '00014', '2017-12-08', 100, 0, '112239'),
(38, '00014', '2017-12-08', 0, 18, ''),
(39, '00014', '2017-12-08', 0, 14, ''),
(40, '00014', '2017-12-08', 0, 2, ''),
(41, '00015', '2017-12-08', 0, 55, '112240'),
(42, '00015', '2017-12-08', 0, 3, ''),
(43, '00015', '2017-12-08', 0, 4, ''),
(44, '00015', '2017-12-08', 0, 2, ''),
(45, '00015', '2017-12-08', 10, 0, '112241'),
(46, '00015', '2017-12-09', 0, 1, ''),
(47, '00015', '2017-12-09', 0, 2, ''),
(48, '00015', '2017-12-09', 0, 1, ''),
(49, '00015', '2017-12-09', 0, 2, ''),
(50, '00015', '2017-12-09', 0, 5, ''),
(51, '00016', '2017-12-09', 65, 0, '112242'),
(52, '00016', '2017-12-09', 0, 6, ''),
(53, '00016', '2017-12-09', 0, 10, ''),
(54, '00016', '2017-12-09', 0, 5, ''),
(55, '00016', '2017-12-09', 5, 0, '112243'),
(56, '00016', '2017-12-09', 0, 14, ''),
(57, '00016', '2017-12-09', 0, 12, ''),
(58, '00016', '2017-12-09', 0, 11, ''),
(59, '00016', '2017-12-09', 0, 7, ''),
(60, '00016', '2017-12-10', 0, 9, ''),
(61, '00017', '2017-12-09', 42, 0, '112244'),
(62, '00017', '2017-12-10', 0, 30, ''),
(63, '00017', '2017-12-10', 50, 0, '112246'),
(64, '00017', '2017-12-10', 0, 2, ''),
(65, '00017', '2017-12-10', 0, 6, ''),
(66, '00017', '2017-12-10', 0, 6, ''),
(67, '00017', '2017-12-10', 0, 5, ''),
(68, '00017', '2017-12-10', 0, 6, ''),
(69, '00017', '2017-12-10', 0, 7, ''),
(70, '00017', '2017-12-10', 0, 2, ''),
(71, '00018', '2017-12-10', 80, 0, '112247'),
(72, '00018', '2017-12-10', 0, 12, ''),
(73, '00018', '2017-12-10', 0, 14, ''),
(74, '00018', '2017-12-11', 0, 9, ''),
(75, '00018', '2017-12-11', 0, 11, ''),
(76, '00018', '2017-12-11', 0, 13, ''),
(77, '00018', '2017-12-11', 0, 3, ''),
(78, '00018', '2017-12-11', 0, 9, ''),
(79, '00018', '2017-12-11', 0, 2, ''),
(80, '00018', '2017-12-11', 10, 0, '112248'),
(81, '00019', '2017-12-11', 55, 0, '112249'),
(82, '00019', '2017-12-11', 0, 5, ''),
(83, '00019', '2017-12-11', 0, 4, ''),
(84, '00019', '2017-12-11', 20, 0, '112250'),
(85, '00019', '2017-12-11', 0, 5, ''),
(86, '00019', '2017-12-11', 0, 2, ''),
(87, '00019', '2017-12-11', 0, 1, ''),
(88, '00019', '2017-12-11', 0, 4, ''),
(89, '00019', '2017-12-11', 0, 2, ''),
(90, '00019', '2017-12-11', 0, 4, ''),
(91, '00020', '2017-12-12', 30, 0, '112252'),
(92, '00020', '2017-12-12', 0, 2, ''),
(93, '00020', '2017-12-12', 0, 4, ''),
(94, '00020', '2017-12-12', 0, 1, ''),
(95, '00020', '2017-12-12', 0, 4, ''),
(96, '00020', '2017-12-12', 30, 0, '112253'),
(97, '00020', '2017-12-12', 0, 2, ''),
(98, '00020', '2017-12-13', 0, 2, ''),
(99, '00020', '2017-12-12', 0, 2, ''),
(100, '00020', '2017-12-12', 0, 1, ''),
(101, '00021', '2017-12-13', 200, 0, '112256'),
(102, '00011', '2017-12-11', 8, 1, '10000'),
(103, '00020', '2017-12-12', 0, 1, '10000'),
(104, '00020', '2017-12-12', 0, 1, '10000'),
(105, '00020', '2017-12-12', 10, 0, '10000'),
(106, '00020', '2017-12-12', 0, 70, '10000'),
(107, '00020', '2017-12-12', 0, 70, '10000'),
(108, '00020', '2017-12-12', 100, 0, '10000'),
(109, '00020', '2017-12-12', 0, 11, '10000'),
(110, '00020', '2017-12-12', 0, 11, '10000'),
(111, '00020', '2017-12-12', 20, 0, '10000'),
(112, '00020', '2017-12-12', 0, 10, '10000'),
(113, '00020', '2017-12-12', 10, 0, '10000'),
(114, '00020', '2017-12-12', 0, 1, '10000'),
(115, '00020', '2017-12-12', 0, 1, ''),
(116, '00015', '2017-12-13', 70, 0, '10000'),
(117, '00016', '2017-12-13', 5, 0, '10000');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `ProductCode` varchar(20) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `ProductDescription` varchar(100) NOT NULL,
  `CompanyName` varchar(20) NOT NULL,
  `Price` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `ProductCode`, `ProductName`, `ProductDescription`, `CompanyName`, `Price`) VALUES
(5, '00020', 'wheel', 'ligid', 'Telstra', 740),
(6, '00011', 'Steering Wheel', 'For steering the wheel', 'Telstra', 490.5),
(7, '00012', 'Side Mirror', 'Side mirror', 'Telstra', 302.39),
(8, '00013', 'Scooter Wheel', 'Scooter Wheel', 'Telstra', 250),
(9, '00014', 'Oil', 'Oil', 'Telstra', 75.95),
(10, '00015', 'Seatbelt', 'So we can be safe', 'Telstra', 200),
(11, '00016', 'Lamp ', 'Light', 'Telsta', 234.1),
(12, '00017', 'Rear view Mirror', '', 'Telstra', 50.8),
(13, '00018', 'Bearing', 'Bearing', 'Telstra', 77.8),
(14, '00019', 'Filter', 'A/C Filter', 'Telstra', 77),
(15, '00021', 'Shiver', 'iro ni sya', 'Boo Fam', 3.14),
(16, '00022', 'Bruno', '& accessories', 'Boo Fam', 22.2),
(17, '00023', 'Human na', 'as in?', 'Boo Fam', 3.14);

-- --------------------------------------------------------

--
-- Table structure for table `reorder`
--

CREATE TABLE `reorder` (
  `CompanyName` varchar(40) DEFAULT NULL,
  `ProductCode` varchar(20) DEFAULT NULL,
  `ProductName` varchar(50) DEFAULT NULL,
  `ContactNumber` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reorder`
--

INSERT INTO `reorder` (`CompanyName`, `ProductCode`, `ProductName`, `ContactNumber`, `Quantity`) VALUES
('Telstra', '00016', 'Lamp', 942, 10),
('Telstra', '00015', 'Seatbelt', 909, 10),
('Telstra', '00020', 'wheel', 939, 5),
('Telstra', '00020', 'wheel', 939, 5),
('Telstra', '00020', 'wheel', 939, 5),
('Telstra', '00016', 'Seatbelt', 939, 3);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `SupplierID` int(11) NOT NULL,
  `CompanyName` varchar(50) NOT NULL,
  `ContactName` varchar(50) NOT NULL,
  `ContactNumber` varchar(11) NOT NULL,
  `CompanyAddress` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`SupplierID`, `CompanyName`, `ContactName`, `ContactNumber`, `CompanyAddress`) VALUES
(2, 'Beatics Scooter Parts and Accessories', 'Alan Cayetano', '8700', 'Davao City, Davao del Sur'),
(3, 'Telstra', 'Shann Kirby Locsin', '00999999', 'sasa'),
(5, 'Boo Fam', 'Boo', '000', 'Yakal St Buhangin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_summary`
-- (See below for the actual view)
--
CREATE TABLE `vw_summary` (
`CompanyName` varchar(20)
,`ProductCode` varchar(20)
,`ProductName` varchar(50)
,`totalInventory` decimal(32,0)
,`totalOut` decimal(32,0)
,`totalDiff` decimal(33,0)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_summary`
--
DROP TABLE IF EXISTS `vw_summary`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_summary`  AS  select `p`.`CompanyName` AS `CompanyName`,`p`.`ProductCode` AS `ProductCode`,`p`.`ProductName` AS `ProductName`,sum(`pl`.`P_in`) AS `totalInventory`,sum(`pl`.`P_out`) AS `totalOut`,(sum(`pl`.`P_in`) - sum(`pl`.`P_out`)) AS `totalDiff` from (`products` `p` left join `productledger` `pl` on((`p`.`ProductCode` = `pl`.`ProductCode`))) group by `p`.`ProductCode` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `productledger`
--
ALTER TABLE `productledger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductCode`),
  ADD UNIQUE KEY `#` (`ProductID`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD UNIQUE KEY `#` (`SupplierID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `productledger`
--
ALTER TABLE `productledger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `SupplierID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

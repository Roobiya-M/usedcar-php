-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2022 at 08:32 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usedcar`
--

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `enqid` int(6) UNSIGNED NOT NULL,
  `buyerid` int(6) UNSIGNED NOT NULL,
  `sellerid` int(6) UNSIGNED NOT NULL,
  `carid` int(6) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` bigint(10) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`enqid`, `buyerid`, `sellerid`, `carid`, `name`, `number`, `message`) VALUES
(8, 73, 71, 4, 'umar', 9876543210, 'iam intersted.please contact'),
(12, 71, 73, 6, 'Anu S', 7865432109, 'hai whats the price'),
(13, 74, 71, 4, 'roobiya', 8976054321, 'hello'),
(14, 74, 73, 6, 'roobiya', 8976054321, 'hai'),
(15, 74, 71, 10, 'roobiya', 8976054321, 'how are you');

-- --------------------------------------------------------

--
-- Table structure for table `sellcar`
--

CREATE TABLE `sellcar` (
  `carid` int(6) UNSIGNED NOT NULL,
  `city` varchar(30) NOT NULL,
  `pincode` int(6) NOT NULL,
  `mfgyear` int(4) NOT NULL,
  `make` varchar(30) NOT NULL,
  `model` varchar(30) NOT NULL,
  `kms` float NOT NULL,
  `noofowners` int(5) NOT NULL,
  `expprize` float NOT NULL,
  `userid` int(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellcar`
--

INSERT INTO `sellcar` (`carid`, `city`, `pincode`, `mfgyear`, `make`, `model`, `kms`, `noofowners`, `expprize`, `userid`) VALUES
(4, 'perumbavoor', 789065, 1994, 'Tata', 'hhuh', 89, 8, 560000, 71),
(6, 'Kannur', 670331, 2000, 'Maruti', 'Swift', 800, 1, 560000, 73),
(10, 'Kannur', 670331, 2003, 'Tata', 'hyundai', 90000, 2, 500000, 71),
(13, 'guygy', 789065, 1994, 'Tata', 'hhuh', 89, 8, 560000, 71),
(14, 'guygy', 789065, 1994, 'Tata', 'hhuh', 89, 8, 560000, 72);

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `uploadid` int(6) UNSIGNED NOT NULL,
  `carimg` varchar(255) NOT NULL,
  `fuel` varchar(255) NOT NULL,
  `colour` varchar(255) NOT NULL,
  `regNo` varchar(255) NOT NULL,
  `insurance` date NOT NULL,
  `message` varchar(255) NOT NULL,
  `carid` int(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`uploadid`, `carimg`, `fuel`, `colour`, `regNo`, `insurance`, `message`, `carid`) VALUES
(2, '../upload/61e2c8699a51b3.19926050.images (3).jpeg', 'Diesel', 'Red', 'kl v2 22222', '2022-12-31', 'jjk', 4),
(7, '../upload/61de5ed83b9f19.89403425.images (4).jpeg', 'Diesel', 'White', 'kl v2 22222', '2021-12-26', 'good condition.', 6),
(11, '../upload/61e2c8d94d92d1.23662981.images.jpeg', 'Petrol', 'Blue', 'kl b7 8900', '2022-01-04', 'hhiuyhui', 10),
(13, '../upload/61e2d6ac6794d4.47337770.images (2).jpeg', 'Petrol', 'Blue', 'kl', '2022-12-31', 'bjhguh', 13),
(14, '../upload/61e3ab7e259443.07737615.Screenshot_20211207-115622_Chrome.jpg', 'Petrol', 'Red', 'kl v2 22222', '2022-01-26', 'jhghjgj', 14);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(6) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `useremail` varchar(50) NOT NULL,
  `usercemail` varchar(50) NOT NULL,
  `userpass` varchar(50) NOT NULL,
  `usermobno` bigint(10) NOT NULL,
  `userphno` bigint(11) DEFAULT NULL,
  `userstate` varchar(30) NOT NULL,
  `usercity` varchar(30) NOT NULL,
  `userstreet` varchar(50) NOT NULL,
  `userpost` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `useremail`, `usercemail`, `userpass`, `usermobno`, `userphno`, `userstate`, `usercity`, `userstreet`, `userpost`) VALUES
(71, 'Anu S', 'anu@gmail.com', 'anu@gmail.com', 'AZaz12@', 7865432109, 654321, 'Kerala', 'Cochin', 'valayanchirangara,Cochin', 683541),
(72, 'MUJEEB', 'mujeeb@gmail.com', 'mujeeb@gmail.com', 'klKL12#', 2147483647, 23, '1', '1', 'guih', 678954),
(73, 'umar', 'umar@gmail.com', 'umar@gmail.com', 'UMum12#', 9876543210, 123456, 'Kerala', 'Cochin', 'Perumbavoor, Ernakulam', 670331),
(74, 'roobiya', 'roobi@gmail.com', 'roobi@gmail.com', 'RBrb12$', 8976054321, 654321, 'Kerala', 'Cochin', 'vvhgg', 678954);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`enqid`),
  ADD KEY `buyerid` (`buyerid`),
  ADD KEY `sellerid` (`sellerid`),
  ADD KEY `carid` (`carid`);

--
-- Indexes for table `sellcar`
--
ALTER TABLE `sellcar`
  ADD PRIMARY KEY (`carid`),
  ADD KEY `foriegn key` (`userid`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`uploadid`),
  ADD KEY `carid` (`carid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `enqid` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sellcar`
--
ALTER TABLE `sellcar`
  MODIFY `carid` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `uploadid` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD CONSTRAINT `enquiry_ibfk_1` FOREIGN KEY (`buyerid`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `enquiry_ibfk_2` FOREIGN KEY (`sellerid`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `enquiry_ibfk_3` FOREIGN KEY (`carid`) REFERENCES `sellcar` (`carid`);

--
-- Constraints for table `sellcar`
--
ALTER TABLE `sellcar`
  ADD CONSTRAINT `foriegn key` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `upload`
--
ALTER TABLE `upload`
  ADD CONSTRAINT `upload_ibfk_1` FOREIGN KEY (`carid`) REFERENCES `sellcar` (`carid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2020 at 12:57 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `otms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(20) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_ID` int(20) NOT NULL,
  `location_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_ID`, `location_name`) VALUES
(1, 'Cox');

-- --------------------------------------------------------

--
-- Table structure for table `residency`
--

CREATE TABLE `residency` (
  `res_ID` int(20) NOT NULL,
  `res_Name` varchar(50) NOT NULL,
  `res_Class` varchar(30) NOT NULL,
  `res_bill` int(30) NOT NULL,
  `location_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `residency`
--

INSERT INTO `residency` (`res_ID`, `res_Name`, `res_Class`, `res_bill`, `location_ID`) VALUES
(1, 'pop', 'lol', 1400, 1);

-- --------------------------------------------------------

--
-- Table structure for table `service_package`
--

CREATE TABLE `service_package` (
  `id` int(20) NOT NULL,
  `package_name` varchar(70) NOT NULL,
  `package_type` varchar(30) NOT NULL,
  `package_price` int(30) NOT NULL,
  `transportation_ID` int(20) NOT NULL,
  `residency_ID` int(20) NOT NULL,
  `tourist_spot_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_package`
--

INSERT INTO `service_package` (`id`, `package_name`, `package_type`, `package_price`, `transportation_ID`, `residency_ID`, `tourist_spot_ID`) VALUES
(6, 'IMA-789', 'gold', 1478, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tourist spot`
--

CREATE TABLE `tourist spot` (
  `tourist_spot_ID` int(20) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `location_type` varchar(40) NOT NULL,
  `location_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tourist spot`
--

INSERT INTO `tourist spot` (`tourist_spot_ID`, `destination`, `location_type`, `location_ID`) VALUES
(1, 'asd', 'erq', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_ID` int(20) NOT NULL,
  `total_cost` int(40) NOT NULL,
  `payment_time` date NOT NULL,
  `user_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_ID`, `total_cost`, `payment_time`, `user_id`) VALUES
(1, 5000, '2020-09-24', 1003),
(2, 50000, '2020-09-25', 1003),
(3, 50000, '2020-09-25', 1003),
(5, 1478, '2020-09-25', 1003),
(6, 1478, '2020-09-25', 1003),
(8, 1478, '2020-09-25', 1003);

-- --------------------------------------------------------

--
-- Table structure for table `transportation`
--

CREATE TABLE `transportation` (
  `transportation_ID` int(20) NOT NULL,
  `transportation_name` varchar(50) NOT NULL,
  `transportation_class` varchar(30) NOT NULL,
  `transportation_type` varchar(30) NOT NULL,
  `ticket_fee` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transportation`
--

INSERT INTO `transportation` (`transportation_ID`, `transportation_name`, `transportation_class`, `transportation_type`, `ticket_fee`) VALUES
(1, 'ABC', 'abc', 'abc', 400);

-- --------------------------------------------------------

--
-- Table structure for table `travel agency`
--

CREATE TABLE `travel agency` (
  `agency_ID` int(20) NOT NULL,
  `agency_name` varchar(50) NOT NULL,
  `agency_email` varchar(50) NOT NULL,
  `agency_mobile` int(30) NOT NULL,
  `agency_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trip`
--

CREATE TABLE `trip` (
  `trip_ID` int(20) NOT NULL,
  `departure_date` date NOT NULL,
  `return_date` date NOT NULL,
  `hotel_nights` int(10) NOT NULL,
  `no_of_people` int(10) NOT NULL,
  `user_ID` int(20) NOT NULL,
  `service_package_ID` int(20) NOT NULL,
  `transaction_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trip`
--

INSERT INTO `trip` (`trip_ID`, `departure_date`, `return_date`, `hotel_nights`, `no_of_people`, `user_ID`, `service_package_ID`, `transaction_ID`) VALUES
(1, '2020-09-26', '2020-09-29', 2, 3, 1003, 6, 5),
(4, '2020-09-28', '2020-09-30', 3, 2, 1003, 6, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_ID` int(20) NOT NULL,
  `user_Name` varchar(30) NOT NULL,
  `user_email_ID` varchar(35) NOT NULL,
  `mobile_No` varchar(30) NOT NULL,
  `user_Address` varchar(50) NOT NULL,
  `user_Password` varchar(20) NOT NULL,
  `role` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_ID`, `user_Name`, `user_email_ID`, `mobile_No`, `user_Address`, `user_Password`, `role`) VALUES
(1001, 'zll', 'zhaoleilei@ceair.com', '13838193921', 'beijing', 'ceair@1234', 'Agency'),
(1002, 'wangqin', 'wqin2@ceair.com', '13492838142', 'shanghai', 'ceair@1234', 'Admin'),
(1003, 'shenyan', 'shenyan4@ceair.com', '18837482741', 'shanghai', 'ceair@1234', 'User'),
(1015, 'fuhang', 'fhang@ceair.com', '134737283914', 'shanghai', 'ceair@1234', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_ID`);

--
-- Indexes for table `residency`
--
ALTER TABLE `residency`
  ADD PRIMARY KEY (`res_ID`),
  ADD KEY `residency_location_fk` (`location_ID`);

--
-- Indexes for table `service_package`
--
ALTER TABLE `service_package`
  ADD PRIMARY KEY (`id`),
  ADD KEY `servicePackage_transportation_fk` (`transportation_ID`),
  ADD KEY `servicePackage_residency_fk` (`residency_ID`),
  ADD KEY `servicePackage_tSpot_fk` (`tourist_spot_ID`);

--
-- Indexes for table `tourist spot`
--
ALTER TABLE `tourist spot`
  ADD PRIMARY KEY (`tourist_spot_ID`),
  ADD KEY `tspot_location_fk` (`location_ID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_ID`),
  ADD KEY `transaction_trip_fk` (`user_id`);

--
-- Indexes for table `transportation`
--
ALTER TABLE `transportation`
  ADD PRIMARY KEY (`transportation_ID`);

--
-- Indexes for table `travel agency`
--
ALTER TABLE `travel agency`
  ADD PRIMARY KEY (`agency_ID`);

--
-- Indexes for table `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`trip_ID`),
  ADD KEY `trip_user_fk` (`user_ID`),
  ADD KEY `trip_servicePackage_fk` (`service_package_ID`),
  ADD KEY `trip_transaction_fk` (`transaction_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_ID`),
  ADD UNIQUE KEY `user_email_ID_unique` (`user_email_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `residency`
--
ALTER TABLE `residency`
  MODIFY `res_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service_package`
--
ALTER TABLE `service_package`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tourist spot`
--
ALTER TABLE `tourist spot`
  MODIFY `tourist_spot_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transportation`
--
ALTER TABLE `transportation`
  MODIFY `transportation_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `travel agency`
--
ALTER TABLE `travel agency`
  MODIFY `agency_ID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trip`
--
ALTER TABLE `trip`
  MODIFY `trip_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1019;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `residency`
--
ALTER TABLE `residency`
  ADD CONSTRAINT `residency_location_fk` FOREIGN KEY (`location_ID`) REFERENCES `location` (`location_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_package`
--
ALTER TABLE `service_package`
  ADD CONSTRAINT `servicePackage_residency_fk` FOREIGN KEY (`residency_ID`) REFERENCES `residency` (`res_ID`),
  ADD CONSTRAINT `servicePackage_tSpot_fk` FOREIGN KEY (`tourist_spot_ID`) REFERENCES `tourist spot` (`tourist_spot_ID`),
  ADD CONSTRAINT `servicePackage_transportation_fk` FOREIGN KEY (`transportation_ID`) REFERENCES `transportation` (`transportation_ID`);

--
-- Constraints for table `tourist spot`
--
ALTER TABLE `tourist spot`
  ADD CONSTRAINT `tspot_location_fk` FOREIGN KEY (`location_ID`) REFERENCES `location` (`location_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `userId_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `trip`
--
ALTER TABLE `trip`
  ADD CONSTRAINT `trip_servicePackage_fk` FOREIGN KEY (`service_package_ID`) REFERENCES `service_package` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trip_transaction_fk` FOREIGN KEY (`transaction_ID`) REFERENCES `transaction` (`transaction_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trip_user_fk` FOREIGN KEY (`user_ID`) REFERENCES `user` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

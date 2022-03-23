-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2021 at 07:20 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vls`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `booking_From_date` date NOT NULL,
  `booking_To_date` date NOT NULL,
  `origin` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `booking_status` varchar(1) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `approved` varchar(1) NOT NULL,
  `decline` varchar(1) NOT NULL DEFAULT '0',
  `comment` varchar(255) NOT NULL,
  `del` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `vehicle_id`, `driver_id`, `booking_From_date`, `booking_To_date`, `origin`, `destination`, `reason`, `booking_status`, `booking_date`, `approved`, `decline`, `comment`, `del`) VALUES
(10, 22, 11, '2021-10-03', '2021-10-03', 'Pretoria', 'Free state', 'personal reasons', '1', '2021-11-01 22:58:38', '1', '0', '', '1'),
(12, 22, 11, '2021-10-10', '2021-10-10', 'Pretoria', 'Free state', 'personal reasons', '1', '0000-00-00 00:00:00', '1', '0', '', '1'),
(14, 23, 11, '2021-11-01', '2021-11-01', 'Pretoria', 'Limpopo', 'hello', '1', '2021-11-01 23:33:44', '0', '1', 'bbvgvb', '0'),
(15, 22, 11, '2021-11-02', '2021-11-03', 'https://www.google.com/maps/place/Tswelopele+Boxer+Superstores/@-25.9779153,28.2176598,15z/data=!4m5!3m4!1s0x1e9569fd17a64d41:0x827135f6e86c5332!8m2!3d-25.970728!4d28.2133482', 'https://www.google.com/maps/place/Tembisa+Clinic/@-25.9779153,28.2176598,15z/data=!4m5!3m4!1s0x1e956bd9d3c418d1:0xc254e615c74007d!8m2!3d-25.986691!4d28.240625', 'jays', '1', '2021-11-08 06:20:05', '0', '1', 'We are sorry,The car you booked went for service.', '0');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `first_name`, `middle_name`, `last_name`, `gender`, `phone`, `email`, `username`, `password`) VALUES
(11, 'Kabelo', 'Mighty', 'Hlungwani', 'Male', '0727780512', 'kabelomighty@gmail.com', 'Kabelo2021', '12eaab111b446b732cc93aa6ba43cf80');

-- --------------------------------------------------------

--
-- Table structure for table `driver_license_detail`
--

CREATE TABLE `driver_license_detail` (
  `license_id` int(11) NOT NULL,
  `driver_id` int(255) NOT NULL,
  `license_no` varchar(255) NOT NULL,
  `expiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver_license_detail`
--

INSERT INTO `driver_license_detail` (`license_id`, `driver_id`, `license_no`, `expiry_date`) VALUES
(2, 11, '4056020089Z0', '2023-02-04');

-- --------------------------------------------------------

--
-- Table structure for table `fleet_officer`
--

CREATE TABLE `fleet_officer` (
  `officer_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fleet_officer`
--

INSERT INTO `fleet_officer` (`officer_id`, `first_name`, `middle_name`, `last_name`, `gender`, `phone`, `username`, `email`, `password`) VALUES
(6, 'Kabelo', 'Mighty', 'Hlungwani', 'Male', '0727780521', 'Kabelo123', 'kabelomighty@gmail.co.za', '12eaab111b446b732cc93aa6ba43cf80');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `manager_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`manager_id`, `first_name`, `middle_name`, `last_name`, `gender`, `phone`, `username`, `email`, `password`) VALUES
(4, 'Kabelo', 'Mighty', 'Hlungwani', 'Male', '0727780521', 'Kabelo001', 'kabelo.m@gmail.com', '12eaab111b446b732cc93aa6ba43cf80');

-- --------------------------------------------------------

--
-- Table structure for table `master`
--

CREATE TABLE `master` (
  `master_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master`
--

INSERT INTO `master` (`master_id`, `first_name`, `middle_name`, `last_name`, `gender`, `phone`, `email`, `username`, `password`) VALUES
(1, 'Meg', 'Steffin', 'Sloan', 'Female', '0727780512', 'meg.slon@gmail.com', 'meg1234', 'c2f073f2a79df19768fc0c6f64a39e83');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicle_id` int(11) NOT NULL,
  `officer_id` int(11) NOT NULL,
  `registration_no` varchar(255) NOT NULL,
  `make` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `mileage` int(11) NOT NULL,
  `max_mileage` decimal(10,0) NOT NULL,
  `fueltype` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `dos` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicle_id`, `officer_id`, `registration_no`, `make`, `color`, `image`, `mileage`, `max_mileage`, `fueltype`, `description`, `dos`, `status`) VALUES
(22, 6, 'YTR67L', 'Toyota', 'Dark Silver', 'Tazz-1.jpeg', 15012, '15012', 'Petrol', 'Excellent', '2021-10-29', '0'),
(23, 6, 'TY 18 GP', 'VW', 'Red', 'vw.jpg', 10000, '100000', 'Diesel', 'Excellent', '2018-03-01', '0'),
(24, 6, 'XYF 23 NP', 'Nissan', 'Silver', 'nisxtrail0907(3)_749_500_70.jpg', 75000, '120000', 'Diesel', 'Excellent', '2020-01-01', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `driver_license_detail`
--
ALTER TABLE `driver_license_detail`
  ADD PRIMARY KEY (`license_id`);

--
-- Indexes for table `fleet_officer`
--
ALTER TABLE `fleet_officer`
  ADD PRIMARY KEY (`officer_id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`manager_id`);

--
-- Indexes for table `master`
--
ALTER TABLE `master`
  ADD PRIMARY KEY (`master_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `driver_license_detail`
--
ALTER TABLE `driver_license_detail`
  MODIFY `license_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fleet_officer`
--
ALTER TABLE `fleet_officer`
  MODIFY `officer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `manager_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `master`
--
ALTER TABLE `master`
  MODIFY `master_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

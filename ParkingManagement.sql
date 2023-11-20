-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 19, 2023 at 07:40 AM
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
-- Database: `ParkingManagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `billId` varchar(20) NOT NULL DEFAULT current_timestamp(),
  `date` datetime NOT NULL,
  `amount` float NOT NULL,
  `owner` varchar(20) NOT NULL,
  `slotId` varchar(10) NOT NULL,
  `Vehicle` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`billId`, `date`, `amount`, `owner`, `slotId`, `Vehicle`) VALUES
('2023-11-18 01:08:35', '2023-11-21 01:00:00', 258.69, 'alpha@gmail.com', '1b', 'zz01zz0101'),
('2023-11-18 01:14:16', '2023-11-18 05:00:00', 13.55, 'lovish@gmail.com', '1h', 'pb14 d0111'),
('2023-11-18 01:14:50', '2023-11-18 12:30:00', 40.51, 'lovish@gmail.com', '3e', 'pb53ad5713'),
('2023-11-18 03:27:32', '2023-11-29 01:00:00', 941.55, 'alpha@gmail.com', '2d', 'as12df1324'),
('2023-11-18 03:32:05', '2023-11-30 12:00:00', 1067.31, 'harshit@gmail.com', '1a', 'up34dw3228');

-- --------------------------------------------------------

--
-- Table structure for table `costumers`
--

CREATE TABLE `costumers` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `costumers`
--

INSERT INTO `costumers` (`name`, `email`, `password`, `phone`) VALUES
('374', 'abc@gmail.com', '56788fyu', '1010102121'),
('tarush', 'alpha@gmail.com', 'mickey', '1231231234'),
('frog', 'frog@gmail.com', 'frog', '9888104141'),
('harshit', 'harshit@gmail.com', 'harshit', '1010202012'),
('ub', 'hihihiha@gmail.com', 'huua', '1212121212'),
('Lovish', 'lovish@gmail.com', 'lovish@22', '9888881021'),
('alpha', 'tarush@gmail.com', 'hello', '9888882138'),
('tarush G', 'tg@gmail.com', '12334', '9888104142');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` datetime NOT NULL DEFAULT current_timestamp(),
  `comment` varchar(100) NOT NULL,
  `user` varchar(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `comment`, `user`, `date`) VALUES
('2023-11-18 03:00:48', 'this is my review', 'alpha@gmail.com', '2023-11-18'),
('2023-11-18 03:08:45', 'great staff!!!', 'lovish@gmail.com', '2023-11-18'),
('2023-11-18 03:10:09', 'This Guy Really Needs Appreciation :D, great work dude!!', 'frog@gmail.com', '2023-11-18'),
('2023-11-18 03:32:57', 'magnificent parking service', 'harshit@gmail.com', '2023-11-18');

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

CREATE TABLE `slots` (
  `slotId` varchar(10) NOT NULL,
  `type` int(11) NOT NULL,
  `floor` int(11) NOT NULL,
  `isBooked` int(11) NOT NULL,
  `bookedTill` datetime NOT NULL,
  `bookedBy` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slots`
--

INSERT INTO `slots` (`slotId`, `type`, `floor`, `isBooked`, `bookedTill`, `bookedBy`) VALUES
('1a', 4, 1, 1, '2023-11-30 12:00:00', 'up34dw3228'),
('1b', 2, 1, 1, '2023-11-21 01:00:00', 'zz01zz0101'),
('1c', 2, 1, 0, '2023-11-16 09:39:59', '0'),
('1d', 4, 1, 0, '2023-11-16 09:39:59', '0'),
('1e', 4, 1, 0, '2023-11-16 09:39:59', '0'),
('1f', 2, 1, 0, '2023-11-16 09:42:05', '0'),
('1g', 2, 1, 0, '2023-11-16 09:42:05', '0'),
('1h', 4, 1, 1, '2023-11-18 05:00:00', 'pb14 d0111'),
('1i', 4, 1, 0, '2023-11-16 09:39:59', '0'),
('1j', 4, 1, 0, '2023-11-16 09:39:59', '0'),
('2a', 2, 2, 0, '2023-11-16 09:43:25', '0'),
('2b', 2, 2, 0, '2023-11-16 09:43:25', '0'),
('2c', 4, 2, 0, '2023-11-16 09:43:25', '0'),
('2d', 4, 2, 1, '2023-11-29 01:00:00', 'as12df1324'),
('2e', 4, 2, 0, '2023-11-16 09:43:25', '0'),
('2f', 4, 2, 0, '2023-11-16 09:43:25', '0'),
('2g', 2, 2, 0, '2023-11-16 09:43:25', '0'),
('2h', 4, 2, 0, '2023-11-16 09:43:25', '0'),
('2i', 2, 2, 0, '2023-11-16 09:43:25', '0'),
('2j', 4, 2, 0, '2023-11-16 09:43:25', '0'),
('3a', 2, 3, 0, '2023-11-16 09:43:25', '0'),
('3b', 4, 3, 0, '2023-11-16 09:43:25', '0'),
('3c', 4, 3, 0, '2023-11-16 09:43:25', '0'),
('3d', 4, 3, 0, '2023-11-16 09:43:25', '0'),
('3e', 2, 3, 1, '2023-11-18 12:30:00', 'pb53ad5713'),
('3f', 2, 3, 0, '2023-11-16 09:43:25', '0'),
('3g', 4, 3, 0, '2023-11-16 09:43:25', '0'),
('3h', 4, 3, 0, '2023-11-16 09:43:25', '0'),
('3i', 2, 3, 0, '2023-11-16 09:43:25', '0'),
('3j', 4, 3, 0, '2023-11-16 09:43:25', '0'),
('4a', 4, 4, 0, '2023-11-16 09:43:25', '0'),
('4b', 4, 4, 0, '2023-11-16 09:43:25', '0'),
('4c', 4, 4, 0, '2023-11-16 09:43:25', '0'),
('4d', 2, 4, 0, '2023-11-16 09:43:25', '0'),
('4e', 2, 4, 0, '2023-11-16 09:43:25', '0'),
('4f', 4, 4, 0, '2023-11-16 09:43:25', '0'),
('4g', 2, 4, 0, '2023-11-16 09:43:25', '0'),
('4h', 4, 4, 0, '2023-11-16 09:43:25', '0'),
('4i', 4, 4, 0, '2023-11-16 09:43:25', '0'),
('4j', 2, 4, 0, '2023-11-16 09:43:25', '0');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `vehicle` varchar(10) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `type` int(11) NOT NULL,
  `isParked` int(11) NOT NULL,
  `parkedAt` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vehicle`, `owner`, `type`, `isParked`, `parkedAt`) VALUES
('as12df1324', 'alpha@gmail.com', 4, 1, '2d'),
('az13qq9808', 'alpha@gmail.com', 2, 1, '1a'),
('fr00og5555', 'frog@gmail.com', 4, 0, '0'),
('hi12go1111', 'alpha@gmail.com', 4, 0, '0'),
('pb14 d0111', 'lovish@gmail.com', 4, 1, '1h'),
('pb53ad5713', 'lovish@gmail.com', 2, 1, '3e'),
('up34dw3228', 'harshit@gmail.com', 4, 1, '1a'),
('zz01zz0101', 'alpha@gmail.com', 2, 1, '1b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`billId`);

--
-- Indexes for table `costumers`
--
ALTER TABLE `costumers`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slots`
--
ALTER TABLE `slots`
  ADD PRIMARY KEY (`slotId`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vehicle`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2021 at 02:49 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `form`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `username`, `email`, `contact`, `password`, `cpassword`, `pic`) VALUES
(0, '', '', '', '', '', ''),
(1, 'Hamidhaseeb', 'Haseebdaniyal2@gmail.com', '03074566042', '2525', '2525', 'upload/3.png'),
(3, 'Alikhan', 'Ali2@gmail.com', '03124623152', 'lost123123', 'lost123123', 'upload/H.PNG'),
(4, 'jhon cris', 'jhon@gmail.com', '+913232466563', 'jhon2212', 'jhon2212', 'upload/Nrem.png'),
(5, 'Waqas', 'Waqas334@g', '032121322312', 'Wi21x12', 'Wi21x12', 'upload/A.png'),
(6, 'Zain khan', 'ZainHr@gmail.com', '0326541232', 'z@in2331', 'z@in2331', 'upload/ini.png'),
(9, 'Daniyal', 'Haseebdaniyal0000123@gmail.com', '0212466645545', '1111111111', '1111111111', 'upload/U.PNG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

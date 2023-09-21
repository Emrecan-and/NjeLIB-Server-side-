-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2023 at 10:44 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `njelib`
--

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `capacity` int(11) NOT NULL,
  `currentuser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`capacity`, `currentuser`) VALUES
(30, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `durum` int(11) NOT NULL,
  `şifre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `durum`, `şifre`) VALUES
(1, 'Emrecan Erkus', 'izhcva@hallgato.uni-neumann.hu', 1, 'e5c4d1491f9d512640e9863be381b9e5'),
(2, 'Tomi K', 'tomad@gmail.cpm', 2, '43a9b1b32ede8662a78259b688ef69da'),
(20, 'Norbi', 'norbi@gmail.com', 0, 'e5c4d1491f9d512640e9863be381b9e5'),
(21, 'Sabi', 'sabi@gmail.com', 0, 'e5c4d1491f9d512640e9863be381b9e5'),
(22, 'Yuri', 'yuri@gmail.com', 0, 'e5c4d1491f9d512640e9863be381b9e5'),
(23, 'koferi', 'koszna.ferenc@nje.hu', 0, 'e807f1fcf82d132f9bb018ca6738a19f'),
(24, 'Süleyman', 'suleyman290401@gmail.com', 0, '7859e0b0952d3602c964d5454f72e078');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

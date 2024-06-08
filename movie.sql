-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2024 at 12:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `pic` varchar(500) NOT NULL,
  `name` varchar(100) NOT NULL,
  `year` char(4) NOT NULL,
  `directed` varchar(200) NOT NULL,
  `quote` varchar(500) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`pic`, `name`, `year`, `directed`, `quote`, `id`) VALUES
('C.jpg', 'Cruella', '2021', 'Craig Gillespie', 'HELLO CRUEL WORLD.', 1),
('EEAAO.jpg', 'Everything Everywhere All At Once', '2022', 'Daniel Scheinert & Daniel Kwan', 'THE UNIVERSE IS SO MUCH BIGGER THAN YOU REALIZE.', 3),
('H.jpg', 'Hereditary', '2018', 'Ari Aster', 'EVERY FAMILY TREE HIDES A SECRET.', 4),
('MR.jpg', 'Marrowbone', '2017', ' Sergio G. Sánchez', 'NO ONE WILL SEPARATE US.', 5),
('M.jpg', 'Midsommar', '2019', 'Ari Aster', 'LET THE FESTIVAL BEGIN.', 6),
('P.jpg', 'Pearl', '2022', 'Ti West', 'PLEASE I&#039;M A STARRR.', 7),
('65e9b50fec5ea.jpg', 'Dune', '2021', 'Denis Villeneuve', 'BEYOND FEAR, DESTINY AWAITS.', 33);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(5, 'davin permana', 'davinpermana64@gmail.com', '$2y$10$rGL4ymUCcohbSyoRKYkGcOcraQ5Eyxy/cLG.fdd2I3.46sW0Ew2Qm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2024 at 06:04 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(6) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `course` varchar(191) NOT NULL,
  `image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `phone`, `course`, `image`) VALUES
(1, 'NAMEE', 'me@email.com', '0000000000011', 'Of Course', '20240506174142_360_F_385547321_gYEFVNgxrA9Eb8EmcoaCbkt1RQjfYwg4-removebg-preview.png'),
(3, 'qwe', 'uuu@gmail.com', '0101010101010100101', 'vulcanizing', '20240506172858_360_F_385547321_gYEFVNgxrA9Eb8EmcoaCbkt1RQjfYwg4-removebg-preview.png'),
(5, 'Logo', 'me@email.com', 'none', 'yeah', '20240506174239_csf logo.png'),
(21, 'Meowo', 'meoew@email.com', '0000000000011', 'pss pss Pss', '20240506173138_cathand.jpg'),
(22, 'Student 1', 'me@email.com', '0000000000011', 'BSIT', '20240506173840_IDPhoto_20230923_204619.jpg'),
(23, 'Student 2', 'MoonlightSB19@email.com', '0101010101010100101', ': D', '20240506174457_Cat-Hands.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

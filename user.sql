-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2021 at 09:15 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stlee_db1`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) NOT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `status` int(15) DEFAULT NULL,
  `otp` varchar(10) NOT NULL,
  `verify` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `phonenumber`, `password`, `email`, `pic`, `status`, `otp`, `verify`) VALUES
(1, 'LEE SIANG TAT', 'lee', '0163770066', '$2y$10$JuEjzRhABj.injPihZFiI.rLWXqgfgm3f0M8w1PknQwAegKsUEQDy', '1191201084@student.mmu.edu.my', '', 1, '145695', 1),
(2, 'LAM KAI ZHE', 'kaizhe', ' 0178854840', '$2y$10$CjBBk7MPrGXRoLhP2G0OQ.BVHJwOblfb5v72IJ0PmJx5ywmanQ1ai', 'lamkaizhe16@gmail.com', 'pic.png', 1, '561789', 1),
(3, ' ', 'Chong Jia Yao', ' ', '$2y$10$3CZR4E.jwtDeXDDRZfByz.uVmY6TkJUob1CW7zGfhldGwG96/zQky', '1191200985@student.mmu.edu.my', NULL, 1, '137854', 1),
(12, ' ', 'jackma', ' ', '$2y$10$u4lv7tAaiWXLgcNouktEneB959/etRlyiQ1oM2p4OayGs.DgB.9qW', '103232@student.mmu.edu.my', 'jackma.png', 1, '965789', 1),
(17, ' ', 'kaisheng', ' ', '$2y$10$KJcmepovkxmgyzpDInAE7OXrmL.GTh7KBmadVdInN5bxY68Colv0C', '11912004236@student.mmu.edu.my', NULL, 1, '251685', 1),
(18, ' ', 'JiaYAo', ' ', '$2y$10$cor1/qjx2jkk2rp6Yo/iGOvYG/J6u7GXB9XI9UZ.wmes1xn6qVYEy', 'jiayaochong@gmail.com', NULL, 1, '955617', 1),
(22, ' ', 'leetat', ' ', '$2y$10$GLc/4K5.WazgfvKPWQD5peStzY4jGY81asDzbp7FmY05BVqaSiqFu', 'siangtatlee7@gmail.com', NULL, 1, '846171', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

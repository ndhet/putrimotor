-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 12, 2024 at 03:34 PM
-- Server version: 10.3.39-MariaDB-0ubuntu0.20.04.2
-- PHP Version: 7.4.3-4ubuntu2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `putrimotor`
--

-- --------------------------------------------------------

--
-- Table structure for table `motor`
--

CREATE TABLE `motor` (
  `id` int(11) NOT NULL,
  `product` varchar(24) NOT NULL,
  `merk` varchar(24) NOT NULL,
  `types` varchar(24) NOT NULL,
  `conditions` varchar(24) NOT NULL,
  `img` varchar(124) NOT NULL,
  `price` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `motor`
--

INSERT INTO `motor` (`id`, `product`, `merk`, `types`, `conditions`, `img`, `price`) VALUES
(1, 'Honda', 'Honda Vario', 'Matic', 'News', 'vario.jpg', '23.000.000'),
(3, 'Honda', 'Honda Beat', 'Matic', 'New', 'ahm-gaul-sideview-deluxe-black-10-03022023-011019.jpg', '23.000.000'),
(6, 'Honda', 'Honda Scoopy ', 'Matic', 'New', 'Scpyy.jpg', '28.000.000'),
(7, 'Honda', 'Honda Vario 160', 'Matic', 'Baru', 'honda_vario_160_15.jpg', '27.000.000'),
(8, 'Honda', 'Honda Stylo', 'Matic', 'Baru', 'honda_stylo_160.jpg', '27.550.000'),
(9, 'Yamaha', 'Yamaha Aerox 155', 'Matic', 'Baru', 'yamaha-aerox-155-connected.jpg', '29.900.000'),
(10, 'Yamaha', 'Yamaha Nmax', 'Matic', 'Baru', 'nmax_150.jpg', '31.620.000'),
(11, 'Yamaha', 'Yamaha Fazzio', 'Matic', 'Baru', 'LUX-Prestige-Silver.jpg', '22.650.000'),
(18, 'Yamaha', 'FreeGo', 'Matic', 'Baru', 'Yamaha Freego.jpg', '25.000.000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(5) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('administrator','customer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
('u0001', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `motor`
--
ALTER TABLE `motor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `motor`
--
ALTER TABLE `motor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

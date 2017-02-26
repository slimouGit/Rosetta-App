-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2017 at 08:12 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rosetta-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `rosetta_data`
--

CREATE TABLE `rosetta_data` (
  `token` varchar(100) DEFAULT NULL,
  `id` int(5) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `de` varchar(100) DEFAULT NULL,
  `fr` varchar(100) DEFAULT NULL,
  `it` varchar(100) DEFAULT NULL,
  `en` varchar(100) DEFAULT NULL,
  `rubrik` varchar(500) DEFAULT NULL,
  `info` varchar(200) DEFAULT NULL,
  `carline` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `rosetta_data`
--

INSERT INTO `rosetta_data` (`token`, `id`, `date`, `de`, `fr`, `it`, `en`, `rubrik`, `info`, `carline`) VALUES
('3281c5e256c1af611fdf9f63e4288385', 105, '2017-02-25 14:52:50', 'Adaptives Bremslicht', 'Luce di stop adattiva', 'Feux de stop adaptatifs', '', 'Serienausstattung', 'Sicherheit', 'ADAM'),
('36073aa967e78f9963b02938ce17a5c6', 106, '2017-02-25 14:53:50', 'Serienausstattung', 'Equipaggiamento di serie', 'Equipement de sÃ©rie', '', '', 'Header', 'General'),
('41325a62138088bd3b025d3361e9d9ca', 123, '2017-02-25 17:16:48', '', '', '', '', 'drrgdsrgfd', '', 'ADAM'),
('5143c0a53f9b43e4b4f03f24e816396d', 104, '2017-02-25 15:32:14', 'Ausstattungen und Preise', 'Equipaggiamenti e prezzi', 'Equipaggiamenti e prezzi', '', 'Titel', '', 'General, Astra ST, Corsa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rosetta_data`
--
ALTER TABLE `rosetta_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rosetta_data`
--
ALTER TABLE `rosetta_data`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

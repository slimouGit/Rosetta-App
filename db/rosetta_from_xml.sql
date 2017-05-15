-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2017 at 07:33 AM
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
-- Table structure for table `rosetta_from_xml`
--

CREATE TABLE `rosetta_from_xml` (
  `id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `de` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `fr` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `it` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `carline` varchar(500) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `rosetta_from_xml`
--

INSERT INTO `rosetta_from_xml` (`id`, `date`, `de`, `fr`, `it`, `carline`) VALUES
(1, '2017-03-08 19:21:25', 'Benzin', '\0Essence', 'Benzina', 'AstraST'),
(2, '2017-03-08 19:21:25', 'Motor', 'Moteur', 'Motore', 'AstraST'),
(3, '2017-03-08 19:21:25', 'Getriebe', 'BoÃ®te', 'Cambio', 'AstraST'),
(4, '2017-03-08 19:21:25', '5-Gang manuell', '\0manuelle â€¨5 vitesses ', 'manuale 5 marce', 'AstraST'),
(5, '2017-03-08 19:21:25', '1.0 Direct Injection Turbo â€©ecoFLEX â€©Start/Stopâ€¨77 kW/105 PS', '\01.0 Direct Injection Turbo â€©ecoFLEX â€©Start/Stopâ€©77 kW/105 ch ', '1.0 Direct Injection Turboâ€©ecoFLEX â€©Start/Stopâ€©77 kW/105 CV ', 'AstraST'),
(6, '2017-03-08 19:30:28', '5-Gang Easytronic® 3.0', 'Easytronic? 3.0 5 vitesses', 'Easytronic® 3.0  5 marce', 'AstraST'),
(7, '2017-03-08 19:21:25', '6-Gang manuell', '\0manuelle â€¨6 vitesses ', 'manuale 6 marce', 'AstraST'),
(8, '2017-03-08 19:21:25', '6-Gang manuell', '\0manuelle â€¨6 vitesses ', 'manuale 6 marce', 'AstraST'),
(9, '2017-03-08 19:21:25', '6-Stufen-â€¨Automatik', 'automatique â€¨6 rapports ', 'automaticoâ€©6 rapporti', 'AstraST'),
(10, '2017-03-08 19:21:25', '6-Gang manuell', '\0manuelle â€¨6 vitesses ', 'manuale 6 marce', 'AstraST'),
(11, '2017-03-08 19:21:25', 'Empfohlene Nettopreise in CHF', 'Prix nets conseillÃ©s en CHF', 'Prezzi netti consigliati in CHF', 'AstraST');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rosetta_from_xml`
--
ALTER TABLE `rosetta_from_xml`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rosetta_from_xml`
--
ALTER TABLE `rosetta_from_xml`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

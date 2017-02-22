-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 22. Feb 2017 um 10:32
-- Server-Version: 10.1.21-MariaDB
-- PHP-Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `firma`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `personen`
--

CREATE TABLE `personen` (
  `name` varchar(30) DEFAULT NULL,
  `vorname` varchar(25) DEFAULT NULL,
  `personalnummer` int(11) NOT NULL,
  `gehalt` double DEFAULT NULL,
  `geburtstag` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `personen`
--

INSERT INTO `personen` (`name`, `vorname`, `personalnummer`, `gehalt`, `geburtstag`) VALUES
('Maier', 'Hans', 6714, 3500, '1962-03-15'),
('Schmitz', 'Peter', 81343, 3750, '1958-04-12'),
('Mertens', 'Julia', 2297, 3621.5, '1959-12-30'),
('Mimi', 'Illmer', 1, 37000.45, '1976-03-06'),
('Oussayfi', 'Salim', 2, 86451.47, '1980-04-26'),
('F', 'e', 23, 2, '0000-00-00');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `personen`
--
ALTER TABLE `personen`
  ADD PRIMARY KEY (`personalnummer`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

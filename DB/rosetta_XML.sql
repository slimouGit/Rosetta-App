-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 08. Mrz 2017 um 17:13
-- Server-Version: 10.1.21-MariaDB
-- PHP-Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `rosetta-app`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rosetta_XML`
--

CREATE TABLE `rosetta_XML` (
  `id` int(5) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vorname` varchar(15) CHARACTER SET utf8 NOT NULL,
  `nachname` varchar(15) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `rosetta_XML`
--

INSERT INTO `rosetta_XML` (`id`, `date`, `vorname`, `nachname`) VALUES
(11, '2017-03-08 13:50:44', 'Mimi', 'Illmer'),
(12, '2017-03-08 13:50:44', 'Salim', 'Oussayfi'),
(13, '2017-03-08 13:50:44', 'Welde', 'Okbe'),
(14, '2017-03-08 13:58:08', 'Martin', 'Schulz'),
(15, '2017-03-08 13:58:43', 'GÃ¼nther', 'HagendaÃŸ');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `rosetta_XML`
--
ALTER TABLE `rosetta_XML`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `rosetta_XML`
--
ALTER TABLE `rosetta_XML`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 22. Feb 2017 um 17:39
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
-- Tabellenstruktur für Tabelle `rosetta_data`
--

CREATE TABLE `rosetta_data` (
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
-- Daten für Tabelle `rosetta_data`
--

INSERT INTO `rosetta_data` (`id`, `date`, `de`, `fr`, `it`, `en`, `rubrik`, `info`, `carline`) VALUES
(4, '2017-02-22 14:25:38', 'Januar', 'Janvier', 'Gennaio', 'January', 'Titel/U4', 'Monat', 'Generel'),
(7, '2017-02-22 14:26:01', 'Februar', 'Fevrier', 'Febbraio', 'February', 'Titel/U4', 'Monat', 'Generel'),
(9, '2017-02-22 16:17:10', 'Leichtmetallfelgen 7 J x 17, 5 Doppelspeichen, Hoch- glanzschwarz, Reifen 215/45 R17, inkl. Sportfah', 'Cerchi in lega leggera 7 J x 17, 5 razze doppie, Nero lucido, pneumatici 215/45 R17, incl. autotelai', 'Calzone', '', 'Fahrwerk und Felgen', 'RZS & 13P', 'Corsa Astra'),
(11, '2017-02-22 16:18:14', 'Cerchi in lega leggera 17Ë', 'Cerchi in lega leggera 17Ë', 'Pizza', '', '', '', ''),
(12, '2017-02-22 11:08:03', 'Innovationen', '', 'Innovazioni', '', 'Pakete und Sonderausstattungen', '', ''),
(16, '2017-02-22 15:59:54', 'Hallo', 'Salut', 'Ciao', 'hello', 'Begruessung', 'Nette sache', ''),
(15, '2017-02-22 14:28:15', 'MÃ¤rz', 'Mars', 'Marzo', 'March', 'Titel/U4', 'Monat', 'Generel'),
(18, '2017-02-22 16:22:15', 'April', 'Avril', 'Aprile', 'April', 'Monat', 'Titel/U4', 'Generel');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `rosetta_data`
--
ALTER TABLE `rosetta_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `rosetta_data`
--
ALTER TABLE `rosetta_data`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

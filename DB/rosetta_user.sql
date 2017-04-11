-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 11. Apr 2017 um 17:07
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
-- Tabellenstruktur für Tabelle `rosetta_user`
--

CREATE TABLE `rosetta_user` (
  `id` int(5) NOT NULL,
  `vorname` varchar(40) CHARACTER SET utf8 NOT NULL,
  `nachname` varchar(40) CHARACTER SET utf8 NOT NULL,
  `passwort` varchar(40) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `rosetta_user`
--

INSERT INTO `rosetta_user` (`id`, `vorname`, `nachname`, `passwort`) VALUES
(1, 'Salim', 'Oussayfi', '26041980'),
(2, 'Salim', 'Oussayfi', '26041980');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `rosetta_user`
--
ALTER TABLE `rosetta_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `rosetta_user`
--
ALTER TABLE `rosetta_user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

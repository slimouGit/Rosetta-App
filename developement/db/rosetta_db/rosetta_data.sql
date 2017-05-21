-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 21. Mai 2017 um 07:45
-- Server-Version: 10.1.21-MariaDB
-- PHP-Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `rosetta_db`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rosetta_data`
--

CREATE TABLE `rosetta_data` (
  `token` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL COMMENT 'eindeutige Kennung erhält jeder Datensatz  bei Initialisierung',
  `data_id` int(10) NOT NULL COMMENT 'ID des Datensatzes',
  `state` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL DEFAULT 'active' COMMENT 'initial ist das Feld auf „acrive“, wird der Datensatz gelöscht, wechselt der Wert auf „deleted“',
  `item_de` text CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci COMMENT 'Text Deutsch',
  `item_de_comment` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci DEFAULT NULL COMMENT 'Kommentar Deutsch',
  `user_de_comment` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci DEFAULT NULL COMMENT 'von wem ist das Kommentar',
  `date_de_comment` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci DEFAULT NULL COMMENT 'Datum des Kommentars (hier als String)',
  `item_fr` text CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci COMMENT 'Text Französisch',
  `item_fr_comment` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci DEFAULT NULL COMMENT 'Kommentar Französisch',
  `user_fr_comment` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci DEFAULT NULL COMMENT 'von wem ist das Kommentar ',
  `date_fr_comment` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci DEFAULT NULL COMMENT 'Datum des Kommentars (hier als String)',
  `item_it` text CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci COMMENT 'Text Italienisch',
  `item_it_comment` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci DEFAULT NULL COMMENT 'Kommentar Italienisch',
  `user_it_comment` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci DEFAULT NULL COMMENT 'von wem ist das Kommentar',
  `date_it_comment` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci DEFAULT NULL COMMENT 'Datum des Kommentars (hier als String)',
  `category` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci DEFAULT NULL COMMENT 'Rubrik des Objekts',
  `info` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci DEFAULT NULL COMMENT 'Info bzw. Objekt-Code',
  `carline` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci DEFAULT 'General' COMMENT 'enthalten in welchen Carlines (= Verlinkung zu PDFs)',
  `user_create` varchar(100) CHARACTER SET ucs2 COLLATE ucs2_general_mysql500_ci DEFAULT NULL COMMENT 'wer hat den Datensatz erstellt (forename surname)',
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'wann wurde der Datensatz erstellt',
  `user_update` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci DEFAULT NULL COMMENT 'wer hat den Datensatz aktualisiert (forename surname)',
  `date_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT 'wann wurde der Datensatz aktualisiert',
  `user_delete` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci DEFAULT NULL COMMENT 'wer hat den Datensatz gelöscht (forename surname)',
  `date_delete` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci DEFAULT NULL COMMENT 'wann wurde der Datensatz gelöscht (hier als String)'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `rosetta_data`
--

INSERT INTO `rosetta_data` (`token`, `data_id`, `state`, `item_de`, `item_de_comment`, `user_de_comment`, `date_de_comment`, `item_fr`, `item_fr_comment`, `user_fr_comment`, `date_fr_comment`, `item_it`, `item_it_comment`, `user_it_comment`, `date_it_comment`, `category`, `info`, `carline`, `user_create`, `date_create`, `user_update`, `date_update`, `user_delete`, `date_delete`) VALUES
('7c8279972dc18f957564ad9c6af4987d', 1, 'active', 'Nur Gepäckraum bis Gepäckraumabdeckung', '1.6 ECOTEC® Start/Stop 85 kW/115 ch', 'Salim Oussayfi', '17.05.2017 06:52', 'Coffre seul jusqu’au cache-coffre', 'Emissions de CO2 liées à la fourniture de carburant et/ou d’électricité en g/km', 'Salim Oussayfi', '17.05.2017 06:52', 'Solo bagagliaio fino alla copertura', 'Thule Dachbox «Pacific 700» / Box tetto Thule «Pacific 700»', 'Salim Oussayfi', '17.05.2017 06:52', 'Benzin Motor', 'UVC', 'General', 'Salim Oussayfi', '2017-05-08 22:00:00', 'Salim Oussayfi', '2017-05-16 22:00:00', 'Salim Oussayfi', '17.05.2017 06:52');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `rosetta_data`
--
ALTER TABLE `rosetta_data`
  ADD PRIMARY KEY (`data_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `rosetta_data`
--
ALTER TABLE `rosetta_data`
  MODIFY `data_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID des Datensatzes', AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

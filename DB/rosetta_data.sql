-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 06. Mrz 2017 um 15:02
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
  `token` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `id` int(5) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `de` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `fr` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `comment_fr` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `it` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `comment_it` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `en` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `rubrik` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `info` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `carline` varchar(500) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Daten für Tabelle `rosetta_data`
--

INSERT INTO `rosetta_data` (`token`, `id`, `date`, `de`, `fr`, `comment_fr`, `it`, `comment_it`, `en`, `rubrik`, `info`, `carline`) VALUES
('5143c0a53f9b43e4b4f03f24e816396d', 104, '2017-03-06 13:45:28', 'Ausstattungen und Preise', 'Equipements et prix', 'Kommentar des Übersetzers', 'Equipaggiamenti e prezzi', '', '', 'Titel', '', 'General, Astra ST, Corsa'),
('3281c5e256c1af611fdf9f63e4288385', 105, '2017-03-06 10:54:47', 'Adaptives Bremslicht', 'Feux de stop adaptatifs', 'ja, das ist so in Ordnung!!', 'Luce di stop adattiva', '', '', 'Serienausstattung', 'Sicherheit', 'General'),
('36073aa967e78f9963b02938ce17a5c6', 106, '2017-03-06 11:46:23', 'Serienausstattung', 'Equipaggiamento di serie', '', 'Equipement de série', '', '', '', 'Header', 'ADAM, Astra ST, MokkaX'),
('87dc17b8ed30a1d9e8a5e75f3640414d', 127, '2017-03-06 09:46:40', 'Opel Original Zubehör', 'Accessoires d`origine Opel', '', 'Accessori originali Opel', '', '', 'Angebote', '', 'General'),
('2946e1f4febce6e96e0aa8c4a0851ebf', 128, '2017-03-06 09:40:54', 'Aluminium-Basisträger', 'Galerie de base en aluminium', NULL, 'Portapacchi base in alluminio', '', '', 'Angebote', '', 'General'),
('d51349bc32310a3eec04e9633c2d0b5b', 129, '2017-02-27 13:08:50', 'Autoteppiche Velours, 4er-Set', 'Tapis en velours, jeu de 4', NULL, 'Tappetini in velluto, set 4 pz.', '', '', 'Angebote', '', 'General'),
('00bd85734c3b8f0341f1f041aa31a7d7', 130, '2017-03-06 10:38:16', 'Schwarz', 'Noirs', NULL, 'Nero', '', '', '', 'Farbe', 'General'),
('ba1525309185e1ae20ef6943e5ec4094', 131, '2017-02-26 13:48:33', 'Braun', 'Bruns', NULL, 'Marrone', '', '', '', 'Farbe', 'General'),
('07c4295ac9116a01341b1cc97bbd8871', 132, '2017-02-26 13:55:30', 'Januar', 'Janvier', NULL, 'Gennaio', '', 'January', 'Titel/U4', 'Monat', 'General'),
('6600df92c07478221cca55a2b5b56af7', 133, '2017-02-26 13:52:46', 'Februar', 'Février', NULL, 'Febbraio', '', 'February', 'Titel/U4', 'Monat', 'General'),
('0919ef5f31c8b2d80f6a44c949efdc28', 134, '2017-03-06 09:41:13', 'März', 'Mars', NULL, 'Marzo', '', 'March', 'Titel/U4', 'Monat', 'General'),
('73c1b5f4b122af577a55b6ddde2eadd0', 135, '2017-02-26 13:53:39', 'April', 'Avril', NULL, 'Aprile', '', 'April', 'Titel/U4', 'Monat', 'General'),
('29cbb35f6ba2b55245213eae2bbb2205', 136, '2017-02-26 13:54:03', 'Mai', 'Mai', NULL, 'Maggio', '', 'May', 'Titel/U4', 'Monat', 'General'),
('117af5901394b3fdfaaedcedc63656ff', 137, '2017-02-26 13:54:29', 'Juni', 'Juin', NULL, 'Giugno', '', 'June', 'Titel/U4', 'Monat', 'General'),
('826a103f7e6f2bcb7a6c7211588173dc', 138, '2017-02-26 13:55:05', 'Juli', 'Juillet', NULL, 'Luglio', '', 'July', 'Titel/U4', 'Monat', 'General'),
('bfd47550b8d1c7e7f481edbe94ae55ab', 141, '2017-03-03 06:20:03', 'Digitaler Radioempfang DAB+', 'Réception radio numérique (DAB+)', 'ja, kann man so schreiben', 'Sistema di ricezione radio digitale (DAB+)', '', '', 'Pakete und Sonderausstattungen', 'U4D', 'Astra HB5, Astra ST'),
('4150c0393147354d01822c393ad4b385', 146, '2017-02-27 12:55:15', 'Einparkhilfe', 'aide au stationnement', NULL, 'assistenza al parcheggio', '', '', '', '', 'General'),
('c3c89da4a0f62c2a463fd9cc4db1809b', 147, '2017-03-03 06:19:41', 'Metallic-Lackierung', 'Peinture métallisée', '', 'Verniciatura metallizzata', '', '', '', '', 'General'),
('4da358934457df2dddec332ee5ccfb05', 148, '2017-02-27 13:06:57', 'Perleffekt-Lackierung', 'Peinture effet perle', NULL, 'Verniciatura ad effetto perlato', '', '', '', '', 'General'),
('81e0463ece383944b1b99ab2050d80fb', 155, '2017-03-06 13:46:35', 'Ausstattungen und Preise', 'Equipements et prix', NULL, 'Equipaggiamenti e prezzi', '', '', '', '', 'General');

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

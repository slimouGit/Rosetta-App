-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 07. Mrz 2017 um 12:04
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
  `carline` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `toTranslate` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Daten für Tabelle `rosetta_data`
--

INSERT INTO `rosetta_data` (`token`, `id`, `date`, `de`, `fr`, `comment_fr`, `it`, `comment_it`, `en`, `rubrik`, `info`, `carline`, `toTranslate`) VALUES
('5143c0a53f9b43e4b4f03f24e816396d', 104, '2017-03-07 10:28:35', 'Ausstattungen und Preise', 'Equipements et prix', 'Kommentar des Übersetzers', 'Equipaggiamenti e prezzi', 'kann man so sagen', '', 'Titel', '', 'General, Astra ST, Corsa', 'false'),
('3281c5e256c1af611fdf9f63e4288385', 105, '2017-03-07 10:28:44', 'Adaptives Bremslicht', 'Feux de stop adaptatifs', 'ja, das ist so in Ordnung!!', 'Luce di stop adattiva', 'passt so', '', 'Serienausstattung', 'Sicherheit', 'General', 'false'),
('36073aa967e78f9963b02938ce17a5c6', 106, '2017-03-07 10:28:51', 'Serienausstattung', 'Equipaggiamento di serie', '', 'Equipement de série', '', '', '', 'Header', 'ADAM, Astra ST, MokkaX', 'false'),
('87dc17b8ed30a1d9e8a5e75f3640414d', 127, '2017-03-07 10:28:58', 'Opel Original Zubehör', 'Accessoires d`origine Opel', '', 'Accessori originali Opel', '', '', 'Angebote', '', 'General', 'false'),
('2946e1f4febce6e96e0aa8c4a0851ebf', 128, '2017-03-07 10:29:05', 'Aluminium-Basisträger', 'Galerie de base en aluminium', NULL, 'Portapacchi base in alluminio', '', '', 'Angebote', '', 'General', 'false'),
('d51349bc32310a3eec04e9633c2d0b5b', 129, '2017-03-07 10:59:37', 'Autoteppiche Velours, 4er-Set', 'Tapis en velours, jeu de 4', 'korrekte Schreibweise', 'Tappetini in velluto, set 4 pz.', '', '', 'Angebote', '', 'ADAM, Astra HB5, Astra ST', 'false'),
('00bd85734c3b8f0341f1f041aa31a7d7', 130, '2017-03-07 10:39:30', 'Schwarz', 'Noirs', NULL, 'Nero', '', '', '', 'Farbe', 'General', 'false'),
('ba1525309185e1ae20ef6943e5ec4094', 131, '2017-03-07 10:29:35', 'Braun', 'Bruns', NULL, 'Marrone', '', '', '', 'Farbe', 'General', 'false'),
('07c4295ac9116a01341b1cc97bbd8871', 132, '2017-03-07 10:29:42', 'Januar', 'Janvier', NULL, 'Gennaio', '', 'January', 'Titel/U4', 'Monat', 'General', 'false'),
('6600df92c07478221cca55a2b5b56af7', 133, '2017-03-07 10:29:49', 'Februar', 'Février', NULL, 'Febbraio', '', 'February', 'Titel/U4', 'Monat', 'General', 'false'),
('0919ef5f31c8b2d80f6a44c949efdc28', 134, '2017-03-07 10:30:31', 'März', 'Mars', NULL, 'Marzo', '', 'March', 'Titel/U4', 'Monat', 'General', 'false'),
('73c1b5f4b122af577a55b6ddde2eadd0', 135, '2017-03-07 10:30:40', 'April', 'Avril', NULL, 'Aprile', '', 'April', 'Titel/U4', 'Monat', 'General', 'false'),
('29cbb35f6ba2b55245213eae2bbb2205', 136, '2017-03-07 10:30:50', 'Mai', 'Mai', NULL, 'Maggio', '', 'May', 'Titel/U4', 'Monat', 'General', 'false'),
('117af5901394b3fdfaaedcedc63656ff', 137, '2017-03-07 10:30:58', 'Juni', 'Juin', NULL, 'Giugno', '', 'June', 'Titel/U4', 'Monat', 'General', 'false'),
('826a103f7e6f2bcb7a6c7211588173dc', 138, '2017-03-07 10:31:06', 'Juli', 'Juillet', NULL, 'Luglio', '', 'July', 'Titel/U4', 'Monat', 'General', 'false'),
('bfd47550b8d1c7e7f481edbe94ae55ab', 141, '2017-03-07 10:31:19', 'Digitaler Radioempfang DAB+', 'Réception radio numérique (DAB+)', 'ja, kann man so schreiben', 'Sistema di ricezione radio digitale (DAB+)', '', '', 'Pakete und Sonderausstattungen', 'U4D', 'Astra HB5, Astra ST', 'false'),
('4150c0393147354d01822c393ad4b385', 146, '2017-03-07 10:31:27', 'Einparkhilfe', 'aide au stationnement', NULL, 'assistenza al parcheggio', '', '', '', '', 'General', 'false'),
('c3c89da4a0f62c2a463fd9cc4db1809b', 147, '2017-03-07 10:31:35', 'Metallic-Lackierung', 'Peinture métallisée', '', 'Verniciatura metallizzata', '', '', '', '', 'General', 'false'),
('4da358934457df2dddec332ee5ccfb05', 148, '2017-03-07 10:31:42', 'Perleffekt-Lackierung', 'Peinture effet perle', NULL, 'Verniciatura ad effetto perlato', '', '', '', '', 'General', 'false'),
('81e0463ece383944b1b99ab2050d80fb', 155, '2017-03-07 10:31:50', 'Ausstattungen und Preise', 'Equipements et prix', NULL, 'Equipaggiamenti e prezzi', '', '', '', '', 'General', 'false'),
('4c9008129ac58e735cb78e1de50f2f8d', 161, '2017-03-07 10:31:59', 'lalala', 'louloulou', NULL, 'lalala', '\"lalala\" scheint ein Eigenname zu sein und kann nicht übersetzt werden', '', '', '', 'ADAM', 'false'),
('8a633229b65e6d9ce83be7ece9a411d2', 162, '2017-03-07 10:32:07', 'Modellübersicht', 'Modèles', 'vereinfacht', 'Panoramica dei modelli', NULL, '', '', 'Header', 'General', 'false'),
('dadfda56eb42921b0ce4643a42dd986d', 165, '2017-03-07 10:32:15', 'Kindersicherung in den hinteren Türen, manuell', '', NULL, '', NULL, NULL, '', '', 'General', 'false'),
('22b1de2144be3accfcb07f6f65041a06', 166, '2017-03-07 10:32:23', 'Reifendruck-Kontrollsystem', '', NULL, '', NULL, NULL, '', '', 'General', 'false'),
('71e4dc24499501092c107ca549470e20', 167, '2017-03-07 10:32:32', 'Seitenaufprallschutz', '', NULL, '', NULL, NULL, '', '', 'General', 'false'),
('2e89e585c631364be04eecbe59f70915', 199, '2017-03-07 10:54:57', 'Fussgängerschutz', '', '', '', NULL, NULL, '', '', 'General', 'true'),
('d29438607453968eca5c6151ed9c6111', 201, '2017-03-07 10:26:20', 'Reifendruck-Kontrollsystem', '', NULL, '', NULL, NULL, '', '', 'General', 'true'),
('781428f0ad80e0b30f2e645558f4d04d', 208, '2017-03-07 10:42:18', 'Sicherheitslenksäule', 'Colonne de direction de sécurité', NULL, '', NULL, NULL, '', '', 'ADAM, Astra ST, Corsa, Zafira', 'false'),
('e9653d151ddf7a349766f13388970c9c', 209, '2017-03-07 10:41:04', 'Sporttaste (nur für Dynamic)', '', NULL, '', NULL, NULL, '', '', 'General', 'true');

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

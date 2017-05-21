-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 17. Apr 2017 um 07:56
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
-- Tabellenstruktur für Tabelle `rosetta_data_deleted`
--

CREATE TABLE `rosetta_data_deleted` (
  `token` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `id` int(5) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `de` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `comment_de` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `comment_de_user` varchar(200) CHARACTER SET ucs2 DEFAULT NULL,
  `fr` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `comment_fr` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `comment_fr_user` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `it` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `comment_it` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `comment_it_user` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `en` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `rubrik` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `info` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `carline` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `toTranslate` varchar(5) CHARACTER SET utf8 DEFAULT NULL,
  `user` varchar(200) CHARACTER SET utf8 NOT NULL DEFAULT 'importiert',
  `updateBy` varchar(200) CHARACTER SET utf8 NOT NULL DEFAULT 'kein Update bisher',
  `create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_by` varchar(200) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Daten für Tabelle `rosetta_data_deleted`
--

INSERT INTO `rosetta_data_deleted` (`token`, `id`, `date`, `de`, `comment_de`, `comment_de_user`, `fr`, `comment_fr`, `comment_fr_user`, `it`, `comment_it`, `comment_it_user`, `en`, `rubrik`, `info`, `carline`, `toTranslate`, `user`, `updateBy`, `create`, `deleted_by`) VALUES
('6932fb64ab828d8a1de1d1461e584583', 3035, '2017-04-15 15:29:20', 'Antiblockiersystem (ABS) mit Kurvenbremskontrolle und Bremsassistent', '', '', 'Syst?me antiblocage des roues (ABS) avec contr?le du freinage en courbe et assistant de freinage', '', '', 'Sistema antibloccaggio (ABS) con controllo della frenata in curva e assistenza alla frenata', '', '', NULL, 'Serienausstattung', 'Sicherheit', 'AstraST', NULL, 'importiert', 'kein Update bisher', '2017-04-15 15:29:20', NULL),
('', 3037, '2017-04-15 15:48:10', '', '', '', '', '', '', '', '', '', NULL, '', '', '', NULL, '', '', '2017-04-15 15:48:10', NULL),
('6932fb64ab828d8a1de1d1461e584583', 3038, '2017-04-15 15:50:49', 'Adaptives Bremslicht', 'Test', 'Salim Oussayfi', 'Feux de stop adaptatifs', 'wasdasd', 'Salim Oussayfi', 'Luce di stop adattiva', '', 'Salim Oussayfi', NULL, 'Serienausstattung', 'Sicherheit', 'ADAM', NULL, 'importiert', 'Claudia Fritz', '2017-04-15 15:50:49', NULL),
('', 3039, '2017-04-15 15:50:54', '', '', '', '', '', '', '', '', '', NULL, '', '', '', NULL, '', '', '2017-04-15 15:50:54', NULL),
('6932fb64ab828d8a1de1d1461e584583', 3040, '2017-04-15 15:56:42', 'Frontairbags, Fahrer und Beifahrer', '', '', 'airbags frontaux, conducteur et passager avant', 'tz', 'Salim Oussayfi', 'airbag frontali, conducente e passeggero', '', '', NULL, 'Serienausstattung', 'Sicherheit', 'AstraST', NULL, 'importiert', 'kein Update bisher', '2017-04-15 15:56:42', 'Salim Oussayfi'),
('25d417a64dfa612cbf5285676d404494', 3041, '2017-04-15 15:58:09', 'Test-Eintrag', '', '', '', '', '', '', '', '', NULL, '', '', 'ADAM', NULL, 'Claudia Fritz', 'kein Update bisher', '2017-04-15 15:58:09', 'Claudia Fritz');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `rosetta_data_deleted`
--
ALTER TABLE `rosetta_data_deleted`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `rosetta_data_deleted`
--
ALTER TABLE `rosetta_data_deleted`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3044;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

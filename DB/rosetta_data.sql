-- phpMyAdmin SQL Dump
-- version 4.2.12
-- http://www.phpmyadmin.net
--
-- Host: rdbms
-- Generation Time: Mar 11, 2017 at 01:18 PM
-- Server version: 5.6.35-log
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `DB2881460`
--

-- --------------------------------------------------------

--
-- Table structure for table `rosetta_data`
--

CREATE TABLE IF NOT EXISTS `rosetta_data` (
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
) ENGINE=InnoDB AUTO_INCREMENT=221 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `rosetta_data`
--

INSERT INTO `rosetta_data` (`token`, `id`, `date`, `de`, `fr`, `comment_fr`, `it`, `comment_it`, `en`, `rubrik`, `info`, `carline`, `toTranslate`) VALUES
('5143c0a53f9b43e4b4f03f24e816396d', 104, '2017-03-11 12:12:07', 'Ausstattungen und Preise', 'Equipements et prix toll', 'Kommentar des Übersetzers', 'Equipaggiamenti e prezzi', 'kann man so sagen', '', 'Titel', 'w', 'General, ADAM, Astra ST, Corsa', 'false'),
('3281c5e256c1af611fdf9f63e4288385', 105, '2017-03-07 10:28:44', 'Adaptives Bremslicht', 'Feux de stop adaptatifs', 'ja, das ist so in Ordnung!!', 'Luce di stop adattiva', 'passt so', '', 'Serienausstattung', 'Sicherheit', 'General', 'false'),
('36073aa967e78f9963b02938ce17a5c6', 106, '2017-03-07 10:28:51', 'Serienausstattung', 'Equipaggiamento di serie', '', 'Equipement de série', '', '', '', 'Header', 'ADAM, Astra ST, MokkaX', 'false'),
('87dc17b8ed30a1d9e8a5e75f3640414d', 127, '2017-03-07 10:28:58', 'Opel Original Zubehör', 'Accessoires d`origine Opel', '', 'Accessori originali Opel', '', '', 'Angebote', '', 'General', 'false'),
('2946e1f4febce6e96e0aa8c4a0851ebf', 128, '2017-03-07 10:29:05', 'Aluminium-Basisträger', 'Galerie de base en aluminium', NULL, 'Portapacchi base in alluminio', '', '', 'Angebote', '', 'General', 'false'),
('d51349bc32310a3eec04e9633c2d0b5b', 129, '2017-03-08 06:05:30', 'Autoteppiche Velours, 4er-Set', 'Tapis en velours, jeu de 4', 'korrekte Schreibweise', 'Tappetini in velluto, set 4 pz.', '', '', 'Angebote', '', 'ADAM, Astra HB5, Astra ST, Movano Van, Vivaro', 'false'),
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
('4150c0393147354d01822c393ad4b385', 146, '2017-03-08 09:05:44', 'Einparkhilfe', 'aide au stationnement', NULL, 'assistenza al parcheggio', '', '', '', '', 'ADAM, Astra HB5', 'false'),
('c3c89da4a0f62c2a463fd9cc4db1809b', 147, '2017-03-07 10:31:35', 'Metallic-Lackierung', 'Peinture métallisée', '', 'Verniciatura metallizzata', '', '', '', '', 'General', 'false'),
('4da358934457df2dddec332ee5ccfb05', 148, '2017-03-07 10:31:42', 'Perleffekt-Lackierung', 'Peinture effet perle', NULL, 'Verniciatura ad effetto perlato', '', '', '', '', 'General', 'false'),
('81e0463ece383944b1b99ab2050d80fb', 155, '2017-03-07 10:31:50', 'Ausstattungen und Preise', 'Equipements et prix', NULL, 'Equipaggiamenti e prezzi', '', '', '', '', 'General', 'false'),
('4c9008129ac58e735cb78e1de50f2f8d', 161, '2017-03-07 10:31:59', 'lalala', 'louloulou', NULL, 'lalala', '"lalala" scheint ein Eigenname zu sein und kann nicht übersetzt werden', '', '', '', 'ADAM', 'false'),
('8a633229b65e6d9ce83be7ece9a411d2', 162, '2017-03-07 10:32:07', 'Modellübersicht', 'Modèles', 'vereinfacht', 'Panoramica dei modelli', NULL, '', '', 'Header', 'General', 'false'),
('dadfda56eb42921b0ce4643a42dd986d', 165, '2017-03-07 14:01:43', 'Kindersicherung in den hinteren Türen, manuell', '', NULL, '', '', NULL, '', '', 'General', 'false'),
('22b1de2144be3accfcb07f6f65041a06', 166, '2017-03-07 10:32:23', 'Reifendruck-Kontrollsystem', '', NULL, '', NULL, NULL, '', '', 'General', 'false'),
('71e4dc24499501092c107ca549470e20', 167, '2017-03-07 10:32:32', 'Seitenaufprallschutz', '', NULL, '', NULL, NULL, '', '', 'General', 'false'),
('2e89e585c631364be04eecbe59f70915', 199, '2017-03-07 11:33:20', 'Fussgängerschutz', '', 'gibt es bereits', '', NULL, NULL, '', '', 'General', 'true'),
('d29438607453968eca5c6151ed9c6111', 201, '2017-03-07 10:26:20', 'Reifendruck-Kontrollsystem', '', NULL, '', NULL, NULL, '', '', 'General', 'true'),
('781428f0ad80e0b30f2e645558f4d04d', 208, '2017-03-07 10:42:18', 'Sicherheitslenksäule', 'Colonne de direction de sécurité', NULL, '', NULL, NULL, '', '', 'ADAM, Astra ST, Corsa, Zafira', 'false'),
('e9653d151ddf7a349766f13388970c9c', 209, '2017-03-07 10:41:04', 'Sporttaste (nur für Dynamic)', '', NULL, '', NULL, NULL, '', '', 'General', 'true'),
('5efd6b6f555b703ab07374839a30b846', 211, '2017-03-07 11:11:56', 'Ablagefach, in der Mittelkonsole', 'Compartiment dans la console centrale', NULL, '', NULL, NULL, '', '', 'General', 'false'),
('d2289588ae1cd80b0ff5202241fb5892', 212, '2017-03-07 11:12:08', 'Ablagefach, in Instrumententafel, Fahrerseite', '', NULL, '', NULL, NULL, '', '', 'General', 'true'),
('40f95e3108f698bf48fac488fc1bec48', 220, '2017-03-11 11:54:08', '', '', NULL, '', NULL, NULL, '', '', 'General', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `rosetta_data_`
--

CREATE TABLE IF NOT EXISTS `rosetta_data_` (
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
) ENGINE=InnoDB AUTO_INCREMENT=164 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `rosetta_data_`
--

INSERT INTO `rosetta_data_` (`token`, `id`, `date`, `de`, `fr`, `comment_fr`, `it`, `comment_it`, `en`, `rubrik`, `info`, `carline`) VALUES
('5143c0a53f9b43e4b4f03f24e816396d', 104, '2017-03-06 14:42:01', 'Ausstattungen und Preise', 'Equipements et prix', 'Kommentar des Übersetzers', 'Equipaggiamenti e prezzi', 'kann man so sagen', '', 'Titel', '', 'General, Astra ST, Corsa'),
('3281c5e256c1af611fdf9f63e4288385', 105, '2017-03-06 14:51:32', 'Adaptives Bremslicht', 'Feux de stop adaptatifs', 'ja, das ist so in Ordnung!!', 'Luce di stop adattiva', 'passt', '', 'Serienausstattung', 'Sicherheit', 'General'),
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
('81e0463ece383944b1b99ab2050d80fb', 155, '2017-03-06 13:46:35', 'Ausstattungen und Preise', 'Equipements et prix', NULL, 'Equipaggiamenti e prezzi', '', '', '', '', 'General'),
('4c9008129ac58e735cb78e1de50f2f8d', 161, '2017-03-07 09:04:33', 'lalala', 'louloulou', NULL, 'lalala', '"lalala" scheint ein Eigenname zu sein und kann nicht übersetzt werden', '', '', '', 'ADAM'),
('8a633229b65e6d9ce83be7ece9a411d2', 162, '2017-03-06 14:58:42', 'Modellübersicht', 'Modèles', 'vereinfacht', 'Panoramica dei modelli', NULL, '', '', 'Header', 'General');

-- --------------------------------------------------------

--
-- Table structure for table `rosetta_items`
--

CREATE TABLE IF NOT EXISTS `rosetta_items` (
`id` int(5) NOT NULL,
  `de` varchar(100) NOT NULL,
  `fr` varchar(100) NOT NULL,
  `it` varchar(100) NOT NULL,
  `en` varchar(100) NOT NULL,
  `info` varchar(200) NOT NULL,
  `carline` varchar(500) NOT NULL,
  `code` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rosetta_items`
--

INSERT INTO `rosetta_items` (`id`, `de`, `fr`, `it`, `en`, `info`, `carline`, `code`) VALUES
(1, 'Januar', 'Janvier', 'Gennaio', 'January', 'Monat', '', ''),
(2, 'Februar', 'Février', 'Febbraio', 'February', 'Monat', '', ''),
(3, 'März', 'Mars', 'Marzo', 'March', 'Monat', '', ''),
(4, 'April', 'Avril', 'Aprile', 'April', 'Monat', '', ''),
(5, 'Mai', 'Mai', 'Maggio', 'May', 'Monat', '', ''),
(6, 'Juni', 'Juin', 'Giugno', 'June', 'Monat', '', ''),
(7, 'Juli', 'Juillet', 'Luglio', 'July', 'Monat', '', ''),
(8, 'August', 'Août', 'Agosto', 'August', 'Monat', '', ''),
(9, 'September', 'Septembre', 'Settembre', 'September', 'Monat', '', ''),
(10, 'Oktober', 'Octobre', 'Ottobre', 'October', 'Monat', '', ''),
(11, 'November', 'Novembre', 'Novembre', 'November', 'Monat', '', ''),
(12, 'Dezember', 'Décembre', 'Dicembre', 'December', 'Monat', '', ''),
(13, 'Ausstattungen und Preise', 'Equipements et prix', 'Equipaggiamenti e prezzi', '', 'Titel', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `rosetta_requirements`
--

CREATE TABLE IF NOT EXISTS `rosetta_requirements` (
  `verbindlichkeit` varchar(4) CHARACTER SET utf8 COLLATE utf8_german2_ci NOT NULL,
`id` int(11) NOT NULL,
  `datum` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `author` varchar(20) CHARACTER SET utf8 COLLATE utf8_german2_ci NOT NULL,
  `titel` varchar(50) CHARACTER SET utf8 COLLATE utf8_german2_ci NOT NULL,
  `beschreibung` text CHARACTER SET utf8 COLLATE utf8_german2_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `rosetta_requirements`
--

INSERT INTO `rosetta_requirements` (`verbindlichkeit`, `id`, `datum`, `author`, `titel`, `beschreibung`) VALUES
('kann', 64, '2017-02-21 19:13:40', 'Salim', 'Zwischenablage', 'EintrÃ¤ge sollen per Klick auf SchaltflÃ¤che in die Zwischenablage gespeichert werden kÃ¶nnen'),
('muss', 65, '2017-02-21 19:59:36', 'Salim', 'Suche', 'Es soll nach EintrÃ¤gen gesucht werden kÃ¶nnen'),
('wird', 66, '2017-03-07 15:50:45', 'Salim', 'Sprachen', 'deutsch, italienisch, franzoesisch'),
('soll', 67, '2017-02-21 19:40:16', 'Salim', 'Carline/Produktcode', 'zu jedem Eintrag soll die Carline und der Produktcode ergÃ¤nzt werden'),
('soll', 68, '2017-02-26 11:46:17', 'Salim', 'Autovervollstaendigung', 'Bei Eingabe in das Suchformular sollen (ab 3 Zeichen) Suchvorschlaege angezeigt werden'),
('muss', 69, '2017-02-26 11:43:27', 'Salim', 'Benutzerverwaltung', 'Alle Nutzer des Systems haben eigenen Account'),
('soll', 71, '2017-02-26 15:09:36', 'Salim', 'Eintraege formatieren', 'evtl. zwei verschiedene Felder pro Sprache =&gt; 1. Headline (bold), 2. Content (auch mit Bullets)'),
('soll', 74, '2017-03-03 14:54:13', 'Claudia', 'Hervorhebung durch Uebersetzer', 'Bei zwei oder mehreren Uebersetzungsvarianten Hervorhebungsmoeglichkeit der bevorzugten Uebersetzung durch den Uebersetzer'),
('soll', 75, '2017-02-27 14:39:42', 'Thomas', 'Nach Carline suchen?', 'Muss man die Begrifflichkeiten einer Carline zuweisen? Besser ohne denn wie oft war eine Begrifflichkeit zu erst nur in einer Carline und wurde dann doch cross-carline eingesetzt.'),
('soll', 76, '2017-02-27 14:40:12', 'Thomas', 'hervorgehobenes Suchwort', 'gesuchtes Wort soll in Ergebnisanzeige hervorgehoben angezeigt werden');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rosetta_data`
--
ALTER TABLE `rosetta_data`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rosetta_data_`
--
ALTER TABLE `rosetta_data_`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rosetta_items`
--
ALTER TABLE `rosetta_items`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rosetta_requirements`
--
ALTER TABLE `rosetta_requirements`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rosetta_data`
--
ALTER TABLE `rosetta_data`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=221;
--
-- AUTO_INCREMENT for table `rosetta_data_`
--
ALTER TABLE `rosetta_data_`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=164;
--
-- AUTO_INCREMENT for table `rosetta_items`
--
ALTER TABLE `rosetta_items`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `rosetta_requirements`
--
ALTER TABLE `rosetta_requirements`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=78;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

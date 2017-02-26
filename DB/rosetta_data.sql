-- phpMyAdmin SQL Dump
-- version 4.2.12
-- http://www.phpmyadmin.net
--
-- Host: rdbms
-- Generation Time: Feb 26, 2017 at 06:06 PM
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
  `token` varchar(100) DEFAULT NULL,
`id` int(5) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `de` varchar(1000) DEFAULT NULL,
  `fr` varchar(1000) DEFAULT NULL,
  `it` varchar(1000) DEFAULT NULL,
  `en` varchar(1000) DEFAULT NULL,
  `rubrik` varchar(500) DEFAULT NULL,
  `info` varchar(200) DEFAULT NULL,
  `carline` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `rosetta_data`
--

INSERT INTO `rosetta_data` (`token`, `id`, `date`, `de`, `fr`, `it`, `en`, `rubrik`, `info`, `carline`) VALUES
('5143c0a53f9b43e4b4f03f24e816396d', 104, '2017-02-26 13:50:01', 'Ausstattungen und Preise', 'Equipaggiamenti e prezzi', 'Equipaggiamenti e prezzi', '', 'Titel', '', 'General, Astra ST, Corsa'),
('3281c5e256c1af611fdf9f63e4288385', 105, '2017-02-26 08:01:02', 'Adaptives Bremslicht', 'Luce di stop adattiva', 'Feux de stop adaptatifs', '', 'Serienausstattung', 'Sicherheit', 'ADAM, Karl, Meriva, Vivaro, Zafira'),
('36073aa967e78f9963b02938ce17a5c6', 106, '2017-02-25 14:53:50', 'Serienausstattung', 'Equipaggiamento di serie', 'Equipement de sÃ©rie', '', '', 'Header', 'General'),
('87dc17b8ed30a1d9e8a5e75f3640414d', 127, '2017-02-26 13:45:02', 'Opel Original ZubehÃ¶r', 'Accessoires dâ€™origine Opel', 'Accessori originali Opel', '', 'Angebote', '', 'General'),
('2946e1f4febce6e96e0aa8c4a0851ebf', 128, '2017-02-26 13:46:22', 'Aluminium-BasistrÃ¤ger', 'Galerie de base en aluminium', 'Portapacchi base in alluminio', '', 'Angebote', '', 'Meriva'),
('d51349bc32310a3eec04e9633c2d0b5b', 129, '2017-02-26 13:47:17', 'Autoteppiche Velours, 4er-Set', 'Tapis en velours, jeu de 4', 'Tappetini in velluto, set 4 pz.', '', 'Angebote', '', 'Meriva'),
('00bd85734c3b8f0341f1f041aa31a7d7', 130, '2017-02-26 13:47:55', 'Schwarz', 'Noirs', 'Nero', '', '', 'Farbe', 'General'),
('ba1525309185e1ae20ef6943e5ec4094', 131, '2017-02-26 13:48:33', 'Braun', 'Bruns', 'Marrone', '', '', 'Farbe', 'General'),
('07c4295ac9116a01341b1cc97bbd8871', 132, '2017-02-26 13:55:30', 'Januar', 'Janvier', 'Gennaio', 'January', 'Titel/U4', 'Monat', 'General'),
('6600df92c07478221cca55a2b5b56af7', 133, '2017-02-26 13:52:46', 'Februar', 'FÃ©vrier', 'Febbraio', 'February', 'Titel/U4', 'Monat', 'General'),
('0919ef5f31c8b2d80f6a44c949efdc28', 134, '2017-02-26 13:53:16', 'MÃ¤rz', 'Mars', 'Marzo', 'March', 'Titel/U4', 'Monat', 'General'),
('73c1b5f4b122af577a55b6ddde2eadd0', 135, '2017-02-26 13:53:39', 'April', 'Avril', 'Aprile', 'April', 'Titel/U4', 'Monat', 'General'),
('29cbb35f6ba2b55245213eae2bbb2205', 136, '2017-02-26 13:54:03', 'Mai', 'Mai', 'Maggio', 'May', 'Titel/U4', 'Monat', 'General'),
('117af5901394b3fdfaaedcedc63656ff', 137, '2017-02-26 13:54:29', 'Juni', 'Juin', 'Giugno', 'June', 'Titel/U4', 'Monat', 'General'),
('826a103f7e6f2bcb7a6c7211588173dc', 138, '2017-02-26 13:55:05', 'Juli', 'Juillet', 'Luglio', 'July', 'Titel/U4', 'Monat', 'General'),
('7ebd0a180caa8e2c5989daf87f06928a', 139, '2017-02-26 14:05:13', '<b>Kommunikations- und Parkpaket IntelliLink 950 im Wert von CHF 2â€™100.00</b> â€“ Radio â€“ 6 Lautsprecher â€“ Farbdisplay in der Mittelkonsole â€“ Fernbedienung am Lenkrad â€“ BluetoothÂ®-Mobiltelefon-Anschluss â€“ Audiostreaming â€“ USB-Anschluss â€“ Bordcomputer erweitert â€“ Navigationssystem mit integriertem Speicher, Kartendarstellung in 2D oder 3D, Strassenkarte Europa, GPS-Modul, dynamische RoutenfÃ¼hrung Ã¼ber Karten- und/oder Pfeildarstellung und Ansage, Kartenanzeige von TMC-Meldungen â€“ DAB+ EmpfÃ¤nger â€“ OnStar1 inkl. automatischer Zieleingabe', 'Pack Communication et Stationnement IntelliLink 950 dâ€™une valeur de CHF 2â€™100.00 â€“ Radio â€“ 6 haut-parleurs â€“ Ecran couleur dans la console centrale â€“ Commandes au volant â€“ Raccordement BluetoothÂ® pour tÃ©lÃ©phone mobile â€“ Audiostreaming â€“ Port USB â€“ Ordinateur de bord Ã©tendu â€“ SystÃ¨me de navigation avec mÃ©moire intÃ©grÃ©e, affichage des cartes en 2D ou 3D, cartes routiÃ¨res pour lâ€™Europe, module GPS, guidage dynamique sur la carte et/ou par flÃ¨ches et synthÃ¨se vocale, affichage sur la carte des messages TMC â€“ RÃ©cepteur DAB+ â€“ OnStar1 avec tÃ©lÃ©chargement dâ€™itinÃ©raire', 'Pacchetto comunicazione e parcheggio IntelliLink 950 del valore di CHF 2â€™100.00 â€“ Radio â€“ 6 altoparlanti â€“ Schermo a colori nella console centrale â€“ Comandi al volante â€“ Connessione BluetoothÂ® per cellulare â€“ Streaming audio â€“ Presa USB â€“ Computer di bordo, funzionalitÃ  estesa â€“ Sistema di navigazione con memoria integrata, visualizzazione mappe in 2D o 3D, mappe Europa, modulo GPS, guida stradale dinamica tramite indicazione su mappae/o frecce e annunci vocali, segnalazioni TMC visualizzate sulla mappa â€“ Ricezione DAB+ â€“ OnStar1 incl. download dellâ€™itinerario', '', 'Pakete und Sonderausstattungen', 'Y3i', 'Meriva'),
('bfd47550b8d1c7e7f481edbe94ae55ab', 141, '2017-02-26 16:33:40', 'Digitaler Radioempfang DAB+', 'RÃ©ception radio numÃ©rique (DAB+)', 'Sistema di ricezione radio digitale (DAB+)', '', 'Pakete und Sonderausstattungen', 'U4D', 'Astra HB5, Astra ST');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rosetta_data`
--
ALTER TABLE `rosetta_data`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rosetta_data`
--
ALTER TABLE `rosetta_data`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=142;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

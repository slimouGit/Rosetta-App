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
-- Tabellenstruktur für Tabelle `rosetta_users`
--

CREATE TABLE `rosetta_users` (
  `user_id` int(10) UNSIGNED NOT NULL COMMENT 'ID des Users',
  `authorization` varchar(5) COLLATE utf8_unicode_ci DEFAULT 'user' COMMENT 'Rechte User -> Differenzierung user/admin',
  `forename` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Vorname',
  `surname` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nachname',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Email des Users',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Password (php password_hash)',
  `create_user` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Erstellzeitpunkt User',
  `update_user` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Änderungszeitpunkt User',
  `password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Temporäre Kennung (openssl_random_pseudo_bytes)',
  `password_date` timestamp NULL DEFAULT NULL COMMENT 'Zeitpunkt der Passwortanfrage'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `rosetta_users`
--

INSERT INTO `rosetta_users` (`user_id`, `authorization`, `forename`, `surname`, `email`, `password`, `create_user`, `update_user`, `password_code`, `password_date`) VALUES
(4, 'user', 'Claudia', 'Fritz', 'c.fritz@typodrom.de', '$2y$10$LKucixdMxu2zQAgbx19X0.to42bSykzSDPnBFl77fJCufYXb5GOKi', '2017-04-12 08:44:21', '2017-04-21 04:49:52', NULL, NULL),
(5, 'admin', 'Salim', 'Oussayfi', 'oussayfi@gmail.com', '$2y$10$jILeRom5H0TNGyOBZKsk4.xUPGb8pa5fagvtzYLDrs6ONQkoyku32', '2017-04-13 07:43:03', '2017-04-21 04:49:34', NULL, NULL);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `rosetta_users`
--
ALTER TABLE `rosetta_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `rosetta_users`
--
ALTER TABLE `rosetta_users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID des Users', AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

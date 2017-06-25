-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 25. Jun 2017 um 07:30
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
  `update_user` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci DEFAULT NULL COMMENT 'Änderungszeitpunkt User',
  `password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Temporäre Kennung (openssl_random_pseudo_bytes)',
  `password_date` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Zeitpunkt der Passwortanfrage'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `rosetta_users`
--

INSERT INTO `rosetta_users` (`user_id`, `authorization`, `forename`, `surname`, `email`, `password`, `create_user`, `update_user`, `password_code`, `password_date`) VALUES
(5, 'admin', 'Salim', 'Oussayfi', 'oussayfi@gmail.com', '$2y$10$7ES8BeffsT1Ds51wVajWVeEu.UzZVgqd2u8oBleNh2YU2.QNIaZZu', '2017-04-13 07:43:03', '18.06.2017 12:14', '11dabce3c67f41779eae15217c9d9426', '2017-06-08 07:20:49'),
(8, 'user', 'Michaela', 'Illmer', 'smartillmer@gmail.com', '$2y$10$db5tSCuBjUV8y7GuCst0feMeTWgHadZNc7O625JANhGoPOITQbReO', '2017-05-25 13:57:10', '16.06.2017 18:58', NULL, NULL),
(9, 'admin', 'Admin', 'Nistrator', 'admin@rosetta-app.de', '$2y$10$p13oaoG3K.lMjfM/vzbSOOs2Sjdm3dabIn8se90obXyxbAUY1zBgG', '2017-05-25 14:06:22', '01.06.2017 06:40', '8b95a38e81792890fae7041d519088c2', '2017-06-06 14:20:48'),
(10, 'user', 'Max', 'Mustermann', 'user@rosetta-app.de', '$2y$10$s9FyJ.igwno12J11pGlsNOD1IW1CbEUKd9.YO8K.C/tajwHQME40y', '2017-05-26 08:15:41', '18.06.2017 12:13', 'b9f7c6dcb2e237e4bbd5dc65d13a6d74', '2017-06-01 21:44:01'),
(11, 'admin', 'Claudia', 'Fritz', 'c.fritz@typodrom.de', '$2y$10$D2cBA2GDmuK8syIYr6OeVeqUtd.mJsALXjvaCjccXwsMJlJG6bm4.', '2017-05-30 19:26:48', '18.06.2017 12:13', NULL, NULL),
(13, 'user', 'Nicole', 'Rohac', 'n.rohac@typodrom.de', '$2y$10$kOr5ddsTSBVKc5q17T4ueOnAI6oXHHuJTe53MXhYf.M0f/C/G5hvW', '2017-05-30 19:40:16', '16.06.2017 19:15', NULL, NULL),
(14, 'user', 'Thomas', 'Schäfer', 't.schaefer@typodrom.de', '$2y$10$s/3nI5Eh9OOAZtDksHB5zu1QJ06L4/G4PVJgZY3rbxPzyNAnnWgLm', '2017-06-25 05:28:59', NULL, NULL, NULL);

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
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID des Users', AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

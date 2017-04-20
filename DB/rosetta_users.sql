-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 20. Apr 2017 um 16:23
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
-- Tabellenstruktur für Tabelle `rosetta_users`
--

CREATE TABLE `rosetta_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `passwort` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vorname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nachname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `passwortcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passwortcode_time` timestamp NULL DEFAULT NULL,
  `authorizations` varchar(5) COLLATE utf8_unicode_ci DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `rosetta_users`
--

INSERT INTO `rosetta_users` (`id`, `email`, `passwort`, `vorname`, `nachname`, `created_at`, `updated_at`, `passwortcode`, `passwortcode_time`, `authorizations`) VALUES
(2, 'smartillmer@gmail.com', '$2y$10$z4korBc14LQfo2T7fgal5uilTdsRoIa81egrS13QpnT0mRLkCfAPC', 'Michaela', 'Illmer', '2017-04-12 07:31:01', NULL, NULL, NULL, 'user'),
(4, 'c.fritz@typodrom.de', '$2y$10$LKucixdMxu2zQAgbx19X0.to42bSykzSDPnBFl77fJCufYXb5GOKi', 'Claudia', 'Fritz', '2017-04-12 08:44:21', NULL, NULL, NULL, 'user'),
(5, 'oussayfi@gmail.com', '$2y$10$TMuMECagaNEeMcc5HSddz.PBWuymc1vx9QOwc5eCqRGzJW1M0RYT2', 'Salim', 'Oussayfi', '2017-04-13 07:43:03', '2017-04-20 14:17:18', NULL, NULL, 'admin'),
(7, 'George@Orwell.net', '$2y$10$3k.bfNwAcN9RSPFK1n6ZkOVJofeqj4gJ0vZMDh7gY3VJBlVzOCxie', 'George', 'Orwell', '2017-04-14 12:59:27', NULL, NULL, NULL, 'user'),
(8, 'max@mustermann.de', '$2y$10$KeMnc2xeZqEGl1wL8uZrCuUseBc0ct9./QsDSzdAAmSnB8BVFskgm', 'Max', 'Mustermann', '2017-04-18 05:03:57', NULL, NULL, NULL, 'user');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `rosetta_users`
--
ALTER TABLE `rosetta_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `rosetta_users`
--
ALTER TABLE `rosetta_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

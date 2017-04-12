<?php

/*Script zum Erstellen einer Datenbank-Tabelle*/

$con = mysqli_connect("","root");

$sql = "CREATE DATABASE IF NOT EXISTS rosetta-app";
mysqli_query($con, $sql);

mysqli_select_db($con, "rosetta-app");

$sql = "CREATE TABLE `rosetta_users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `passwort` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vorname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nachname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`), UNIQUE (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
mysqli_query($con, $sql);

?>
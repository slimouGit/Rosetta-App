<?php
$pdo = new PDO('mysql:host=localhost;dbname=rosetta_db;charset=utf8', 'root', '');

$res = $pdo->query("SELECT * FROM `rosetta_data`");

var_dump($res);

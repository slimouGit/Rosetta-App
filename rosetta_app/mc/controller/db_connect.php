<?php
$pdo = new PDO('mysql:host=localhost;dbname=rosetta_db;charset=utf8', 'root', '');

function showCompleteData(){
    global $pdo;
    return $pdo->query("SELECT * FROM `rosetta_data`");
}


?>
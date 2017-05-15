<?php
session_start();
if(!isset($_SESSION['username'])) {
    die('Bitte zuerst <a href="index.php">einloggen</a>');
}

//Abfrage der Nutzer ID vom Login
$userid = $_SESSION['userid'];
//Abfrage der Nutzer Name vom Login
$username = $_SESSION['username'];

echo "Hallo User {$userid}: ".$username;
?>

<p><a href="logout.php">logout</a></p>

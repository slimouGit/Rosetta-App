<?php
session_start();
if(!isset($_SESSION['username'])) {
    die('Bitte zuerst <a href="login.php">einloggen</a>');
}

//Abfrage der Nutzer Name vom Login
$username = $_SESSION['username'];

echo "Hallo User: ".$username;
?>

<p><a href="logout.php">logout</a></p>

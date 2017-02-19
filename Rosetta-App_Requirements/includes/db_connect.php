<?php
$servername = "127.0.0.1";
$dbname = "rosetta-app";
$username = "root";
$password = "";
?>

<?php
// Verbindung erstellen
$conn = new mysqli($servername, $username, $password, $dbname);
// Pruefen ob erreichbar
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
}
        
?>
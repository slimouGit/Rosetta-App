<?php
$servername = "slimou.de.mysql";
$dbname = "slimou_de";
$username = "slimou_de";
$password = "26041980";
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
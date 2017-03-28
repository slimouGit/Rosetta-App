<?php


//local
$servername = "127.0.0.1";
$dbname = "rosetta-app";
$username = "root";
$password = "";


/*
//online
$servername = "rdbms.strato.de";
$dbname = "DB2881460";
$username = "U2881460";
$password = "Rosetta-App_1";
*/

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
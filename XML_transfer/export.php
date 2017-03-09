<?php

$xmlDoc = new DOMDocument();
$xmlDoc->load("AstraST_001_DFI.xml");
$servername = "localhost"; // Example : localhost
$username     = "root";
$password = "";
$dbname = "rosetta-app";

/*
$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Oops some thing went wrong");
mysqli_select_db($mysql_database, $bd) or die("Oops some thing went wrong");
*/

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Pruefen ob erreichbar
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
}

$xmlObject = $xmlDoc->getElementsByTagName('item');
$itemCount = $xmlObject->length;

for ($i=0; $i < $itemCount; $i++){
    $de = $xmlObject->item($i)->getElementsByTagName('de')->item(0)->childNodes->item(0)->nodeValue;
    $fr  = $xmlObject->item($i)->getElementsByTagName('fr')->item(0)->childNodes->item(0)->nodeValue;
    $it  = $xmlObject->item($i)->getElementsByTagName('it')->item(0)->childNodes->item(0)->nodeValue;
    $carline  = $xmlObject->item($i)->getElementsByTagName('carline')->item(0)->childNodes->item(0)->nodeValue;
    $sql   = "INSERT INTO `rosetta_data` (de, fr, it, carline) VALUES ('$de', '$fr','$it', '$carline')";
    mysqli_query($conn, $sql);
    print "Added Item $i: <br/> $de <br/> $fr<br/> $it<br/> $carline<br/> <br/> ";
}


?>
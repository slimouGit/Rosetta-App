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
    echo "funzte";
}

$xmlObject = $xmlDoc->getElementsByTagName('item');
$itemCount = $xmlObject->length;

for ($i=0; $i < $itemCount; $i++){
    $de = $xmlObject->item($i)->getElementsByTagName('de')->item(0)->childNodes->item(0)->nodeValue;
    $fr  = $xmlObject->item($i)->getElementsByTagName('fr')->item(0)->childNodes->item(0)->nodeValue;
    $sql   = "INSERT INTO `rosetta_data` (de, fr) VALUES ('$de', '$fr')";
    mysqli_query($conn, $sql);
    print "Finished Item $de n<br/>";
}

var_dump($xmlObject);
echo "<br/>";
var_dump($itemCount);

?>
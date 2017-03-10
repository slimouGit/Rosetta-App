<?php


header('Content-Type: text/html; charset=utf-8');

$xmlDoc = new DOMDocument();
$xmlDoc->load("AstraST_001_DFI.xml");
$servername = "localhost";
$username     = "root";
$password = "";
$dbname = "rosetta-app";


$con = mysqli_connect($servername, $username, $password, $dbname);

mysqli_query($con, "SET NAMES SET 'utf8'");
mysqli_query($con, "SET character_set_client = 'utf8'");
mysqli_query($con, "SET character_set_connection = 'utf8'");
mysqli_select_db($con, $dbname);


if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    } else {
}

$xmlObject = $xmlDoc->getElementsByTagName('item');
$itemCount = $xmlObject->length;


for ($i=0; $i < $itemCount; $i++){
    $de = $xmlObject->item($i)->getElementsByTagName('de')->item(0)->childNodes->item(0)->nodeValue;
    $fr  = $xmlObject->item($i)->getElementsByTagName('fr')->item(0)->childNodes->item(0)->nodeValue;
    $it  = $xmlObject->item($i)->getElementsByTagName('it')->item(0)->childNodes->item(0)->nodeValue;
    $carline  = $xmlObject->item($i)->getElementsByTagName('carline')->item(0)->childNodes->item(0)->nodeValue;

    var_dump($de);

    $de = (string)$de;
    $fr = (string)$fr;
    $it = (string)$it;
    $carline = (string)$carline;

    var_dump($de);

    $sql   = "INSERT INTO `rosetta_data` (de, fr, it, carline) VALUES ('$de', '$fr','$it', '$carline')";

    mysqli_query($con, $sql);

    print "Added Item $i: <br/> $de <br/> $fr<br/> $it<br/> $carline<br/> <br/> ";
}


?>
<?php


header('Content-Type: text/html; charset=utf-8');

$xmlDoc = new DOMDocument();
$xmlDoc->load("MOKKA_dfi_008.xml");
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

//Erstellen eines einzigartigen tokens
//dient dazu, wenn der letzte eingetragene Datensatz angezeigt wird
//da hier noch nicht mit der ID gearbeitet werden kann
$token = bin2hex(openssl_random_pseudo_bytes(16));
$token = (string)$token;



$xmlObject = $xmlDoc->getElementsByTagName('item');
$itemCount = $xmlObject->length;



for ($i=0; $i < $itemCount; $i++){
    $de = $xmlObject->item($i)->getElementsByTagName('de')->item(0)->childNodes->item(0)->nodeValue;
    $fr  = $xmlObject->item($i)->getElementsByTagName('fr')->item(0)->childNodes->item(0)->nodeValue;
    $it  = $xmlObject->item($i)->getElementsByTagName('it')->item(0)->childNodes->item(0)->nodeValue;
    $rubrik  = $xmlObject->item($i)->getElementsByTagName('rubrik')->item(0)->childNodes->item(0)->nodeValue;
    $info  = $xmlObject->item($i)->getElementsByTagName('info')->item(0)->childNodes->item(0)->nodeValue;
    $carline  = $xmlObject->item($i)->getElementsByTagName('carline')->item(0)->childNodes->item(0)->nodeValue;



    $sql   = "INSERT INTO `rosetta_data` (token, de, fr, it, rubrik, info, carline) VALUES ('$token', '$de', '$fr','$it','$rubrik', '$info' , '$carline')";

    mysqli_query($con, $sql);

    print "Added Item $i: <br/> $de <br/> $fr<br/> $it<br/> $carline<br/> <br/> ";
}


?>
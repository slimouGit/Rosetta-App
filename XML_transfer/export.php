<?php

$xmlDoc = new DOMDocument();
$xmlDoc->load("AstraST_001_DFI.xml");
$mysql_hostname = "localhost"; // Example : localhost
$mysql_user     = "root";
$mysql_password = "";
$mysql_database = "rosetta-app";

$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Oops some thing went wrong");
mysqli_select_db($mysqli_database, $bd) or die("Oops some thing went wrong");

$xmlObject = $xmlDoc->getElementsByTagName('item');
$itemCount = $xmlObject->length;

for ($i=0; $i < $itemCount; $i++){
    $de = $xmlObject->item($i)->getElementsByTagName('de')->item(0)->childNodes->item(0)->nodeValue;
    $fr  = $xmlObject->item($i)->getElementsByTagName('fr')->item(0)->childNodes->item(0)->nodeValue;
    $sql   = "INSERT INTO `my_table_name` (title, url) VALUES ('$de', '$fr')";
    mysqli_query($sql);
    print "Finished Item $de n<br/>";
}

?>
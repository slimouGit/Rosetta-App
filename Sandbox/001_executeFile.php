<?php
include '001_simpleXML.php';

$movies = new SimpleXMLElement($xmlstr);

echo $movies->movie[1]->plot->test;
echo $movies->movie[0]->genre;
?>
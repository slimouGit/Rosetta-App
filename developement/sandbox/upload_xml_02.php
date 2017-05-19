<?php
//include header
include "elements/header.php";
?>



<?php

?>

    <h2>XML mit Datensätzen hochladen</h2>
    <p>XML-Struktur muss eingehalten werden, d.h. evtl. Erklär-Funktion integrieren</p>

<?php
$target_dir = __DIR__."/";
$fileName = $_FILES["xmlFile"]["name"];
$new_path = $target_dir . $fileName;

echo "Originaldateiname: "
    . $fileName."<br />";

/* Temporaerer Dateiname auf dem Server */
echo "Temporaerer Dateiname: "
    . $_FILES["xmlFile"]["tmp_name"] . "</p>";

copy($_FILES["xmlFile"]["tmp_name"],$new_path);
echo "<p>Datei wurde kopiert in {$target_dir}<br />";

echo "Der neue Pfad lautet: ".$new_path. "<br/>";



importXML($fileName, $username);



function importXML($fileName, $username){

    $xmlDoc = new DOMDocument();
    $xmlDoc->load($fileName);

    //include db connection
    include "include/db_connect.php";


    //Erstellen eines einzigartigen tokens SOLLTE SPAETER GLOBAL LAUFEN!!!
    //dient dazu, wenn der letzte eingetragene Datensatz angezeigt wird
    //da hier noch nicht mit der ID gearbeitet werden kann
    $token = bin2hex(openssl_random_pseudo_bytes(16));
    $token = (string)$token;
    $username = $username;

    $xmlObject = $xmlDoc->getElementsByTagName('item');
    $itemCount = $xmlObject->length;


    for ($i=0; $i < $itemCount; $i++){
        $de = $xmlObject->item($i)->getElementsByTagName('de')->item(0)->childNodes->item(0)->nodeValue;
        $fr  = $xmlObject->item($i)->getElementsByTagName('fr')->item(0)->childNodes->item(0)->nodeValue;
        $it  = $xmlObject->item($i)->getElementsByTagName('it')->item(0)->childNodes->item(0)->nodeValue;
        $rubrik  = $xmlObject->item($i)->getElementsByTagName('rubrik')->item(0)->childNodes->item(0)->nodeValue;
        $info  = $xmlObject->item($i)->getElementsByTagName('info')->item(0)->childNodes->item(0)->nodeValue;
        $carline  = $xmlObject->item($i)->getElementsByTagName('carline')->item(0)->childNodes->item(0)->nodeValue;



        //$sql   = "INSERT INTO `rosetta_data` (token, de, fr, it, rubrik, info, carline, user) VALUES ('$token', '$de', '$fr','$it','$rubrik', '$info' , '$carline', '$username')";

        $sql = "insert rosetta_data"
            . "(token, de, fr, it, rubrik, info, carline, user) values "
            . "('" . $token . "', "  .  "'" . $de . "', " .  "'" . $fr . "', " .  "'" . $it . "', " .  "'" . $rubrik . "', " .  "'" . $info . "', " .  "'" . $carline . "', " .  "'" . $username . "')";


        mysqli_query($con, $sql);

        print "Added Item $i: <br/> $de <br/> $fr<br/> $it<br/> $carline<br/> <br/> ";
    }

}
?>
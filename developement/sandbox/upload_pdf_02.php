<?php
//include header
include "elements/header.php";
?>

<?php
//include db connection
include "include/db_connect.php";
?>

    <h2>Preislisten-PDFs hochladen</h2>
    <p>Schreibweise muss eingehalten werden, d.h. evtl. Erklär-Funktion integrieren</p>

<div class="row">
    <div class="col-sm-4">
    <?php

    $path = getcwd();
    $target_dir = $path."/pl/";



    /* Kontrolldaten */
    echo "<p>Zur Kontrolle:<br />";
    echo "Originaldateiname: "
        . $_FILES["upfile"]["name"] . "<br />";
    $fileName = $_FILES["upfile"]["name"];
    $fileName = strtolower($fileName);

    //Carline Array
    $carlinesArray = array(
        "ADAM",
        "Ampera",
        "Antara",
        "AstraST",
        "AstraNG",
        "Cascada.xml",
        "ComboKastenwagen",
        "ComboPassenger",
        "Corsa",
        "Corsa",
        "GTC_OPC",
        "InsigniaGS",
        "InsigniaST",
        "KARL",
        "Meriva",
        "MokkaX",
        "MovanoCombiBus",
        "MovanoFahrgestell",
        "MovanoVan",
        "Vivaro",
        "Zafira",
    );
    /*
    foreach ($carlinesArray AS $car){
        if (preg_match('/$car/', $fileName)) {$carline = $car;}
    }
    */

    //Carline testen
    if (preg_match('/adam/', $fileName)) {$carline = "ADAM";}
    if (preg_match('/ampera/', $fileName)) {$carline = "Ampera";}
    if (preg_match('/antara/', $fileName)) {$carline = "Antara";}
    if (preg_match('/astrast/', $fileName)) {$carline = "AstraST";}
    if (preg_match('/astrang/', $fileName)) {$carline = "AstraNG";}
    if (preg_match('/cascada/', $fileName)) {$carline = "Cascada.xml";}
    if (preg_match('/kastenwagen/', $fileName)) {$carline = "ComboKastenwagen";}
    if (preg_match('/passenger/', $fileName)) {$carline = "ComboPassenger";}
    if (preg_match('/corsa/', $fileName)) {$carline = "Corsa";}
    if (preg_match('/crossland/', $fileName)) {$carline = "Crossland";}
    if (preg_match('/gtc/', $fileName)) {$carline = "GTC_OPC";}
    if (preg_match('/insigniags/', $fileName)) {$carline = "InsigniaGS";}
    if (preg_match('/insigniast/', $fileName)) {$carline = "InsigniaST";}
    if (preg_match('/karl/', $fileName)) {$carline = "KARL";}
    if (preg_match('/meriva/', $fileName)) {$carline = "Meriva";}
    if (preg_match('/mokka/', $fileName)) {$carline = "MokkaX";}
    if (preg_match('/bus/', $fileName)) {$carline = "MovanoCombiBus";}
    if (preg_match('/fahrgestell/', $fileName)) {$carline = "MovanoFahrgestell";}
    if (preg_match('/van/', $fileName)) {$carline = "MovanoVan";}
    if (preg_match('/vivaro/', $fileName)) {$carline = "Vivaro";}
    if (preg_match('/zafira/', $fileName)) {$carline = "Zafira";}

    //Sprache testen
    if (preg_match('/_df/', $fileName)) {
        $language = "df";
    }else{
        $language = "di";
    }
    //echo $language . "<br/>";
    $language = implode('.', array($language, "pdf"));

    //neuen Namen generieren
    $newFileName = implode('_', array($carline, $language));

    //var_dump($newFileName);

    echo "Neuer Name: " . $newFileName. "<br/>";





    $new_path = $target_dir . $newFileName;


    echo "Dateigroesse: "
        . $_FILES["upfile"]["size"] . "<br />";
    echo "Dateityp: "
        . $_FILES["upfile"]["type"] . "<br />";

    /* Dateiendung extrahieren */
    $dname = explode(".",$_FILES["upfile"]["name"]);
    $ext = $dname[count($dname)-1];

    echo "Dateiendung: $ext<br />";

    /* Temporaerer Dateiname auf dem Server */
    echo "Temporaerer Dateiname: "
        . $_FILES["upfile"]["tmp_name"] . "</p>";


    if($_FILES["upfile"]["size"]>0)
    {
        copy($_FILES["upfile"]["tmp_name"],$new_path);
        echo "<p>Datei wurde kopiert in {$target_dir}<br />";
    }
    else
        echo "<p>Kopierfehler</p>";

    function uploadFile($fileName, $new_path){
        move_uploaded_file ($fileName, $new_path);

        echo "new path: ".$new_path;
    }

    ?>
    </div>
</div>






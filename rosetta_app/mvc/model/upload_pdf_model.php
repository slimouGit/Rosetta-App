<?php
/**
 * Created by PhpStorm.
 * User: salimoussayfi
 * Date: 01.06.17
 * Time: 14:40
 */

include "mvc/model/config.php";


//Pfade initialisieren
$path = getcwd();
$target_dir = $path."/uploaded_data/pricelists/";


//Variablen initialisiseren
$fileName = $_FILES["upfile"]["name"];
$fileName = strtolower($fileName);

$fileSize = $_FILES["upfile"]["size"];
$fileType = $_FILES["upfile"]["type"];


//---------------------------------------------------------------------------------------

/**
 * folgende Loesung ist nicht die eleganteste, da nicht gut wartbar, wenn Carlines hinzukommen oder entfernt werden
 */

$carline;

/*
for($i = 0; $i<count($carlineArray);$i++){

    $carlineArray[$i] = strtolower($carlineArray[$i]);
    var_dump($carlineArray[$i]);
    if (preg_match('/$carlineArray[$i]/', $fileName)) {$carline = $carlineArray[$i];}
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

$language = implode('.', array($language, "pdf"));

//neuen Namen generieren
$fileName = implode('_', array($carline, $language));

//---------------------------------------------------------------------------------------



$new_path = $target_dir . $fileName;

//Klassen-Objekt
require_once "mvc/view/responseObject_view.class.php";
$uploadResponse = new responseObject();


//Pruefung, ob Datei valide
if($_FILES["upfile"]["size"]>0 && strpos($fileType, 'pdf') == true)
{
    copy($_FILES["upfile"]["tmp_name"],$new_path);

    //------------------------------------------------------------------------------------------

    //Meldung wird ausgegeben
     $uploadResponse->uploadResponsePDF($fileName, $fileSize);

    //-----------------------------------------------------------------------------------------------
}
else
    //Meldung wird ausgegeben
    $uploadResponse->response("Fehler", "6", "responseFalse" );

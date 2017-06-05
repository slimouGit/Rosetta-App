<?php
/**
 * Created by PhpStorm.
 * User: salimoussayfi
 * Date: 01.06.17
 * Time: 14:40
 */


//Pfade initialisieren
$path = getcwd();
$target_dir = $path."/uploaded_data/pricelists/";


//Variablen initialisiseren
$fileName = $_FILES["upfile"]["name"];
$fileName = strtolower($fileName);
$fileSize = $_FILES["upfile"]["size"];
$fileType = $_FILES["upfile"]["type"];

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

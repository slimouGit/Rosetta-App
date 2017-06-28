<?php
/**
 * Created by PhpStorm.
 * User: salimoussayfi
 * Date: 01.06.17
 * Time: 12:10
 *
 * Script zum Hochladen von XML-Dateien
 */

//Pfade initialisieren
$path = getcwd();
$target_dir = $path."/";
$fileName = $_FILES["uploadXML"]["name"];
$new_path = $target_dir . $fileName;

copy($_FILES["uploadXML"]["tmp_name"],$new_path);

$xmlDoc = new DOMDocument();
$xmlDoc->load($fileName);

//Erstellen eines einzigartigen tokens SOLLTE SPAETER GLOBAL LAUFEN!!!
//dient dazu, wenn der letzte eingetragene Datensatz angezeigt wird
//da hier noch nicht mit der spaeteren ID gearbeitet werden kann
$token = bin2hex(openssl_random_pseudo_bytes(16));
$token = (string)$token;
$username = $username;
$xmlObject = $xmlDoc->getElementsByTagName('item');
$itemCount = $xmlObject->length;

//-------------------------------------------------------------------------------------------------

for ($i=0; $i < $itemCount; $i++){
    $item_de = $xmlObject->item($i)->getElementsByTagName('item_de')->item(0)->childNodes->item(0)->nodeValue;
    $item_fr  = $xmlObject->item($i)->getElementsByTagName('item_fr')->item(0)->childNodes->item(0)->nodeValue;
    $item_it  = $xmlObject->item($i)->getElementsByTagName('item_it')->item(0)->childNodes->item(0)->nodeValue;
    $category  = $xmlObject->item($i)->getElementsByTagName('category')->item(0)->childNodes->item(0)->nodeValue;
    $info  = $xmlObject->item($i)->getElementsByTagName('info')->item(0)->childNodes->item(0)->nodeValue;
    $carline  = $xmlObject->item($i)->getElementsByTagName('carline')->item(0)->childNodes->item(0)->nodeValue;
    //---------------------------------------------------------------------------------------
    //Daten werden eingefuegt
    $res = $pdo->prepare("INSERT INTO rosetta_data (token, item_de, item_fr, item_it, category, info, carline, user_create) VALUES (:token, :item_de, :item_fr, :item_it, :category, :info, :carline, :user_create)");
    $res->execute(array('token' => $token, 'item_de' => $item_de, 'item_fr' => $item_fr, 'item_it' => $item_it, 'category' => $category, 'info' => $info, 'carline' => $carline, 'user_create' => $username));
}

//------------------------------------------------------------------------------------------

//Meldung wird ausgegeben

//CONTROLLER
require_once "mvc/view/responseObject_view.class.php";
$uploadResponse = new responseObject();
$uploadResponse->uploadResponseXML($fileName, $itemCount);

//-----------------------------------------------------------------------------------------------

//XML wird in anderes Verzeichnis kopiert und anschliessend aus dem urspuenglichen
$path = getcwd();
$source = $path."/".$fileName;
$desk = $path."/uploaded_data/xml/".$fileName;

copy($source,$desk);
unlink($source);

//Datei wieder loeschen, falls keine Daten importiert wurden
if($itemCount==0){
    unlink($desk);
}

?>
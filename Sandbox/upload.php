<?php

$path = getcwd();
$target_dir = $path."/pl/";



/* Kontrolldaten */
echo "<p>Zur Kontrolle:<br />";
echo "Originaldateiname: "
    . $_FILES["upfile"]["name"] . "<br />";
$fileName = $_FILES["upfile"]["name"];

$new_path = $target_dir . $fileName;


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
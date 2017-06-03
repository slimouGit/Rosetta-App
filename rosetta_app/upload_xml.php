<?php
//include header
include "elements/header.php";
?>

<?php
//include db connection
include "mc/controller/db_connect.php";
?>

    <h2>XML mit Datensätzen hochladen</h2>
    <p>XML-Struktur muss eingehalten werden, d.h. evtl. Erklär-Funktion integrieren</p>

    <form enctype="multipart/form-data" action="?upload_xml=1" method="post">
        <div class="row">
            <div class="form-group">
                <label class="col-sm-1 control-label">Datei</label>
                <div class="col-sm-4">
                    <input type="file" class="form-control" name="xmlFile" /></input>
                </div>
            </div>
        </div>

        <div class="row button">
            <div class="form-group">
                <div class="col-sm-1"></div>
                <div class="col-sm-1">
                    <input type="submit" class="btn btn-primary" value="Senden"></input>
                </div>
            </div>
        </div>

    </form>

<?php

?>

    <h2>XML mit Datensätzen hochladen</h2>
    <p>XML-Struktur muss eingehalten werden, d.h. evtl. Erklär-Funktion integrieren</p>

<?php

if(isset($_GET['upload_xml'])) {


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





    echo "in Funktion";

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


    echo "ANGEKOMMEN";
    /*
    foreach ($res AS $row){
        echo "Data: " . $row;
    }
    */
    for ($i=0; $i < $itemCount; $i++){
        $item_de = $xmlObject->item($i)->getElementsByTagName('item_de')->item(0)->childNodes->item(0)->nodeValue;
        $item_fr  = $xmlObject->item($i)->getElementsByTagName('item_fr')->item(0)->childNodes->item(0)->nodeValue;
        $item_it  = $xmlObject->item($i)->getElementsByTagName('item_it')->item(0)->childNodes->item(0)->nodeValue;
        $category  = $xmlObject->item($i)->getElementsByTagName('category')->item(0)->childNodes->item(0)->nodeValue;
        $info  = $xmlObject->item($i)->getElementsByTagName('info')->item(0)->childNodes->item(0)->nodeValue;
        $carline  = $xmlObject->item($i)->getElementsByTagName('carline')->item(0)->childNodes->item(0)->nodeValue;

        //global $res;

        //---------------------------------------------------------------------------------------



        //Daten werden eingefuegt
        $res = $pdo->prepare("INSERT INTO rosetta_data (token, item_de, item_fr, item_it, category, info, carline, user_create) VALUES (:token, :item_de, :item_fr, :item_it, :category, :info, :carline, :user_create)");
        $res->execute(array('token' => $token, 'item_de' => $item_de, 'item_fr' => $item_fr, 'item_it' => $item_it, 'category' => $category, 'info' => $info, 'carline' => $carline, 'user_create' => $username));

        echo "In SCHLEIFE";

        //mysqli_query($con, $sql);

        print "Added Data $i: <br/> $item_de <br/> $item_fr<br/> $item_it<br/> $carline<br/> <br/> ";
    }

}
?>
<?php
include header
include "lib/elements/header.php";
?>


<?php
$path = getcwd();

echo "Der Pfad lautet: " . $path;

//$target_dir = __DIR__."/";
$target_dir = $path."/";
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

$username = "Hans";

importXML($fileName, $username);

echo "Username: " .$username;

function importXML($fileName, $username){

    $xmlDoc = new DOMDocument();
    $xmlDoc->load($fileName);

    //include connection to database
    //include "db_connect.php";

    //Erstellen eines einzigartigen tokens SOLLTE SPAETER GLOBAL LAUFEN!!!
    //dient dazu, wenn der letzte eingetragene Datensatz angezeigt wird
    //da hier noch nicht mit der ID gearbeitet werden kann
    $token = bin2hex(openssl_random_pseudo_bytes(16));
    $token = (string)$token;
    $username = $username;

    global $res;

    $xmlObject = $xmlDoc->getElementsByTagName('data');
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
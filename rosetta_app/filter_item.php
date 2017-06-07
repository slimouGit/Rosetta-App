<?php
//include header
include "lib/elements/header.php";
?>

    <div class="container-fluid content">

<?php
//include connection to database
include "mvc/model/db_connect_model.php";
?>

    <div class="container">
        <div class='row'>
            <h1>Rosetta-App Daten filtern</h1>
        </div>
    </div>
<?php

//------------------------------------------------------------------------------------------

$hideForm ="";

if(!empty($_GET["item_de"])&&$_GET["item_de"]){
    $tempItem = $_GET["item_de"];
}
if(!empty($_GET["item_fr"])&&$_GET["item_fr"]){
    $tempItem = $_GET["item_fr"];
}
if(!empty($_GET["item_it"])&&$_GET["item_it"]){
    $tempItem = $_GET["item_it"];
}

?>


    <div class="container">
        <div class='row'>
            <?php

            //$cat wir mit Spalten definiert, in denen gesucht werden soll
            $cat = 'item_de, item_fr, item_it, category, info, carline';
            $res = $pdo->query("SELECT * FROM rosetta_data WHERE CONCAT_WS('',$cat) LIKE '%" . $tempItem . "%'");

            //pruefen, ob Suche ein Resultat ergibt
            $count = $res->rowCount();

            //CONTROLLER
            if($count == 0){
                echo "Kein Ergebnis für " . $_POST['search'];
            }
            else{
                require "mvc/view/table_items_view.class.php";
                table_items::showData();
            }
            ?>
        </div>
    </div>




<?php
//include header
include "lib/elements/footer.php";
?>
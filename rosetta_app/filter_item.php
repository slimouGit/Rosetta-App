<?php
//include header
include "lib/elements/header.php";
?>

    <div class="container-fluid content">

<?php
//include connection to database
include "mc/controller/db_connect.php";
?>

    <div class="container">
        <div class='row'>
            <h1>Rosetta-App filter item</h1>
        </div>
    </div>
<?php

//------------------------------------------------------------------------------------------

$hideForm ="";

//
if(empty($_GET["data_id"])){
    $_GET["data_id"] = $_POST['data_id'];
    $hideForm = "true";
};

//------------------------------------------------------------------------------------------

//
$tempId = $_GET["data_id"];

//------------------------------------------------------------------------------------------

$res = $pdo->query("SELECT * FROM rosetta_data WHERE data_id LIKE $tempId");

//Abfrage, damit
if(!$hideForm=="true"){

foreach ($res AS $row):
?>
    <form action="?filter_item=1" method = "post">
        <?php

        require_once "mc/model/formularFields.class.php";

        $form = new formular();
        $form->hiddenField("data_id", "" . $row["item_de"] . "");
        $form->inputField("Deutsch", "item_de", "" . $row["item_de"] . "", "", "");
        $form->submitButton("2","Filtern");

    ?>
    </form>
<?php

endforeach;

}
?>
<?php
if(isset($_GET['filter_item'])) {
    $hideForm = "true";
    ?>
    <div class="container">
        <div class='row'>
            <?php

            //$cat wir mit Spalten definiert, in denen gesucht werden soll
            $cat = 'item_de, item_fr, item_it, category, info, carline';
            $res = $pdo->query("SELECT * FROM rosetta_data WHERE CONCAT_WS('',$cat) LIKE '%" . $_POST['item_de'] . "%'");

            //pruefen, ob Suche ein Resultat ergibt
            $count = $res->rowCount();
            if($count == 0){
                echo "Kein Ergebnis für " . $_POST['search'];
            }
            else{
                require "mc/model/table_items.class.php";
                table_items::showData();
            }
            ?>
        </div>
    </div>
    <?php
}
?>



<?php
//include header
include "lib/elements/footer.php";
?>
<?php
//include header
include "lib/elements/header.php";
?>

<?php
//include connection to database
include "mc/controller/db_connect.php";
?>

<?php
//include navigation
include 'lib/elements/navigation.php';
?>

    <div class="container-fluid content">



    <div class="container">
        <div class='row'>
            <h1>Rosetta-Data edit data</h1>
        </div>

        <div class='row'>
            <?php

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

            foreach ($res AS $row):

                //$carline mit Werten aus carline-array belegen zum pruefen in der Klasse formularFields,
                //ob Index im Array vorhanden ist
                $carline =  $row['carline'];
                $carline = array_map('trim', explode(", ", $row['carline']));

                ?>

            <form action="?change_item=1" method = "post">

                <?php

                require_once "mc/model/formularFields.class.php";

                if(!$hideForm=="true"){

                    $form = new formular();

                    $form->hiddenField("data_id", "" . $row["data_id"] . "");
                    $form->inputField("Deutsch", "item_de", "" . $row["item_de"] . "", "", "");
                    $form->inputField("Französisch", "item_fr", "" . $row["item_fr"] . "", "", "");
                    $form->inputField("Italienisch", "item_it", "" . $row["item_it"] . "", "", "");
                    $form->inputField("Rubrik", "category", "" . $row["category"] . "", "", "");
                    $form->inputField("Info", "info", "" . $row["info"] . "", "", "");

                    $form->selectStart("Carline");


                    $form->carlineCheck("ADAM", $carline);
                    $form->carlineCheck("Ampera", $carline);
                    $form->carlineCheck("Antara", $carline);
                    $form->carlineCheck("AstraST", $carline);
                    $form->carlineCheck("AstraNG", $carline);
                    $form->carlineCheck("Cascada", $carline);
                    $form->carlineCheck("ComboKastenwagen", $carline);
                    $form->carlineCheck("ComboPassenger", $carline);
                    $form->carlineCheck("Corsa", $carline);
                    $form->carlineCheck("Crossland", $carline);
                    $form->carlineCheck("GTC_OPC", $carline);
                    $form->carlineCheck("InsigniaLimousine", $carline);
                    $form->carlineCheck("InsigniaOPC", $carline);
                    $form->carlineCheck("InsigniaST", $carline);
                    $form->carlineCheck("KARL", $carline);
                    $form->carlineCheck("Meriva", $carline);
                    $form->carlineCheck("MokkaX", $carline);
                    $form->carlineCheck("MovanoCombiBus", $carline);
                    $form->carlineCheck("MovanoFahrgestell", $carline);
                    $form->carlineCheck("MovanoVan", $carline);
                    $form->carlineCheck("Zafira", $carline);

                    $form->selectFinish();

                    $form->submitButton("Ändern");
                }
                ?>
            </form>
            <?php
            endforeach;
            ?>
        </div>
    </div>

    <div class="container">
        <div class='row'>
            <?php
            if(isset($_GET['change_item'])) {
                $submitted = "true";
                $data_id = $_POST['data_id'];

                //------------------------------------------------------------------------------------------

                //Pruefung, ob checkboxen ausgewaehlt wurden
                if(!empty($_POST['carline'])) {$car = implode(', ', $_POST['carline']);}
                //das Array carline wird ueber implode in $car gespeichert
                if(empty($car)) {$car = 'General';}

                //------------------------------------------------------------------------------------------

                $item_de = $_POST['item_de'];
                $item_fr = $_POST['item_fr'];
                $item_it = $_POST['item_it'];
                $category = $_POST['category'];
                $info = $_POST['info'];

                //------------------------------------------------------------------------------------------

                //Daten werden aktualisiert
                $res = $pdo->prepare("UPDATE rosetta_data SET item_de = :item_de, item_fr = :item_fr, item_it = :item_it, category = :category, info = :info, carline = :carline, user_update = :user_update WHERE data_id = :data_id");
                $result = $res->execute(array('item_de' => $item_de, 'item_fr' => $item_fr, 'item_it' => $item_it, 'data_id'=> $data_id, 'category' => $category, 'info'=> $info, 'carline' => $car, 'user_update' => $username ));

                //------------------------------------------------------------------------------------------

                //Meldung wird ausgegeben
                require_once "mc/model/responseObject.class.php";
                $response = new responseText();
                $response->success("FUNZT");

                //------------------------------------------------------------------------------------------

                //aktualisierter Datensatz wird ausgegeben
                $res = $pdo->query("SELECT * FROM rosetta_data WHERE data_id LIKE $data_id");
                require "mc/model/table_items.class.php";
                table_items::showData();

                //------------------------------------------------------------------------------------------

            }
            ?>
        </div>
    </div>


<?php
//include header
include "lib/elements/footer.php";
?>
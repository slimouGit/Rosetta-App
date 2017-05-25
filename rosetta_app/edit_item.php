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
            ?>

            <form action="?change_item=1" method = "post">

                <?php

                require_once "mc/model/formularFields.class.php";

                //if(empty($hideForm)){$hideForm="false"};
                if(!$hideForm=="true"){

                    $form = new formular();

                    $form->hiddenField("data_id", "" . $row["data_id"] . "");
                    $form->inputField("Deutsch", "item_de", "" . $row["item_de"] . "", "", "");
                    $form->inputField("Französisch", "item_fr", "" . $row["item_fr"] . "", "", "");
                    $form->inputField("Italienisch", "item_it", "" . $row["item_it"] . "", "", "");
                    $form->inputField("Rubrik", "category", "" . $row["category"] . "", "", "");
                    $form->inputField("Info", "info", "" . $row["info"] . "", "", "");

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
                $item_de = $_POST['item_de'];
                $item_fr = $_POST['item_fr'];
                $item_it = $_POST['item_it'];
                $category = $_POST['category'];
                $info = $_POST['info'];

                //------------------------------------------------------------------------------------------

                //Daten werden aktualisiert
                $res = $pdo->prepare("UPDATE rosetta_data SET item_de = :item_de, item_fr = :item_fr, item_it = :item_it, category = :category, info = :info WHERE data_id = :data_id");
                $result = $res->execute(array('item_de' => $item_de, 'item_fr' => $item_fr, 'item_it' => $item_it, 'data_id'=> $data_id, 'category' => $category, 'info'=> $info ));

                //------------------------------------------------------------------------------------------

                //Meldung wird ausgegeben
                require_once "mc/model/responseText.class.php";
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
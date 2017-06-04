<?php
//include header
include "lib/elements/header.php";
?>


<?php
$hideForm ="";

//CONTROLLER
if(empty($_GET["data_id"])){
    $_GET["data_id"] = $_POST['data_id'];
    $hideForm = "true";
};

?>

    <div class="container-fluid content">

        <div class="container">

            <div class='row'>

                <h1>Rosetta-Data delete data</h1>

                <?php

                //------------------------------------------------------------------------------------------

                $tempId = $_GET["data_id"];

                $res = $pdo->query("SELECT * FROM rosetta_data WHERE data_id LIKE $tempId");

                //------------------------------------------------------------------------------------------

                //CONTROLLER
                if(!$hideForm=="true") {

                    //Anzeige des Datensatzes
                    require "mvc/view/table_items_view.class.php";
                    table_items::showData();
                }

                //------------------------------------------------------------------------------------------

                //CONTROLLER
                if(isset($_GET['delete_item'])) {

                    $currentDate = date('d.m.Y H:i');

                     //Daten loeschen ueber Controller delete_item
                     require "mvc/model/delete_item_model.class.php";
                     delete_item::deleteData($username, $currentDate, $tempId);

                     //------------------------------------------------------------------------------------------
                }

                ?>

            </div>
        </div>

        <!------------------------------------------------------------->

        <div class="container">
            <div class='row'>
                <?php
                //CONTROLLER
                if(!$hideForm=="true") {

                    //Meldung wird ausgegeben
                    require_once "mvc/view/responseObject_view.class.php";
                    $response = new responseObject();
                    $response->success("Soll dieser Datensatz wirklich gelöscht werden?");

                }
                ?>
            </div>
        </div>

        <!------------------------------------------------------------->

        <div class="container">
            <div class='row'>
                <form action="?delete_item=1" method = "post">

                    <?php
                    require_once "mvc/view/formularFields_view.class.php";

                    //CONTROLLER
                    if(!$hideForm=="true") {
                        $form = new formular();
                        $form->hiddenField("data_id", "" . $_GET["data_id"] . "");
                        $form->submitButton("0","endgültig löschen");
                    }
                    ?>
                </form>
            </div>
        </div>

        <!------------------------------------------------------------->

    </div><!--ENDE container-fluid content-->

<?php
//include header
include "lib/elements/footer.php";
?>
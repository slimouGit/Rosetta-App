<?php
include "lib/elements/header.php";
?>


<?php
$hideForm ="";

if(empty($_GET["data_id"])){
    $_GET["data_id"] = $_POST['data_id'];
    $hideForm = "true";
};

?>

    <div class="container-fluid content">

        <div class="container">

            <div class='row'>

                <h1>Rosetta-App Daten löschen</h1>

                <?php

                //------------------------------------------------------------------------------------------

                $tempId = $_GET["data_id"];

                //------------------------------------------------------------------------------------------

                require "mvc/model/select_data_model.class.php";

                select_data::select_specificDB("rosetta_data", "data_id", $tempId);

                //------------------------------------------------------------------------------------------

                if(!$hideForm=="true") {

                    //Anzeige des Datensatzes
                    require "mvc/view/table_items_view.class.php";
                    table_items::showData();
                }

                //------------------------------------------------------------------------------------------

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

                if(!$hideForm=="true") {

                    //Meldung wird ausgegeben
                    require_once "mvc/view/responseObject_view.class.php";
                    $response = new responseObject();
                    $response->response("Soll der Eintrag mit der ID {$tempId} wirklich gelöscht werden?","6","responseFalse");

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

                    if(!$hideForm=="true") {
                        $form = new formular();
                        $form->hiddenField("data_id", "" . $_GET["data_id"] . "");
                        $form->submitButton("0","löschen");
                    }
                    ?>
                </form>
            </div>
        </div>

        <!------------------------------------------------------------->

    </div><!--ENDE container-fluid content-->

<?php
include "lib/elements/footer.php";
?>
<?php
//include header
include "lib/elements/header.php";
?>


<?php
$hideForm ="";

//CONTROLLER
if(empty($_GET["user_id"])){
    $_GET["user_id"] = $_POST['user_id'];
    $hideForm = "true";
};

?>

    <div class="container-fluid content">

        <div class="container">

            <div class='row'>

                <h1>Rosetta-Data Nutzer löschen</h1>

                <?php

                //------------------------------------------------------------------------------------------

                $tempId = $_GET["user_id"];

                $res = $pdo->query("SELECT * FROM rosetta_users WHERE user_id LIKE $tempId");

                //------------------------------------------------------------------------------------------

                //CONTROLLER
                if(!$hideForm=="true") {

                    //Anzeige des Datensatzes
                    require "mvc/view/table_user_view.class.php";
                    table_user::showUser($tempId);
                }

                //------------------------------------------------------------------------------------------

                //CONTROLLER
                if(isset($_GET['delete_user'])) {

                    $currentDate = date('d.m.Y H:i');

                    //Daten loeschen ueber Controller delete_item
                    require "mvc/model/delete_user_model.class.php";
                    delete_user::deleteUserData($tempId);

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
                <form action="?delete_user=1" method = "post">

                    <?php
                    require_once "mvc/view/formularFields_view.class.php";

                    //CONTROLLER
                    if(!$hideForm=="true") {
                        $form = new formular();
                        $form->hiddenField("user_id", "" . $_GET["user_id"] . "");
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
<?php
include "lib/elements/header.php";
?>


<?php
$hideForm ="";

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

                //------------------------------------------------------------------------------------------

                require "mvc/model/select_data_model.class.php";
                select_data::select_specificDB("rosetta_users", "user_id", $tempId);

                //------------------------------------------------------------------------------------------

                if(!$hideForm=="true") {

                    //Anzeige des Datensatzes
                    require "mvc/view/table_user_view.class.php";
                    table_user::showUser($tempId);
                }

                //------------------------------------------------------------------------------------------

                if(isset($_GET['delete_user'])) {

                    $currentDate = date('d.m.Y H:i');

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

                if(!$hideForm=="true") {

                    //Meldung wird ausgegeben
                    require_once "mvc/view/responseObject_view.class.php";
                    $response = new responseObject();
                    $response->response("Soll der Nutzer mit der ID {$tempId} wirklich gelöscht werden?","6","responseFalse");

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

                    if(!$hideForm=="true") {
                        $form = new formular();
                        $form->hiddenField("user_id", "" . $_GET["user_id"] . "");
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
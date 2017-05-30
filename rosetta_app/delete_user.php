<?php
//include header
include "lib/elements/header.php";
?>


<?php
$hideForm ="";

//
if(empty($_GET["user_id"])){
    $_GET["user_id"] = $_POST['user_id'];
    $hideForm = "true";
};

?>

    <div class="container-fluid content">

        <div class="container">

            <div class='row'>

                <h1>Rosetta-Data delete user</h1>

                <?php

                //------------------------------------------------------------------------------------------

                $tempId = $_GET["user_id"];

                $res = $pdo->query("SELECT * FROM rosetta_users WHERE user_id LIKE $tempId");

                //------------------------------------------------------------------------------------------

                if(!$hideForm=="true") {

                    //Anzeige des Datensatzes
                    require "mc/model/table_user.class.php";
                    table_user::showUser($tempId);
                }

                //------------------------------------------------------------------------------------------

                if(isset($_GET['delete_user'])) {

                    $currentDate = date('d.m.Y H:i');

                    //Daten loeschen ueber Controller delete_item
                    require "mc/controller/delete_user.class.php";
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
                    require_once "mc/model/responseObject.class.php";
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
                    require_once "mc/model/formularFields.class.php";

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
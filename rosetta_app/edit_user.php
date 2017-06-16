<?php

//include header
include "lib/elements/header.php";
?>

    <!------------------------------------------------------------------------------------------>

    <div class="container-fluid content">

    <div class="container">

        <!------------------------------------------------------------->

        <div class='row'>
            <h1>Rosetta-App Nutzerdaten ändern</h1>
        </div>

        <!------------------------------------------------------------->

        <?php

            $hideForm ="";

            //CONTROLLER
            if(empty($_GET["user_id"])){
                $_GET["user_id"] = $_POST['user_id'];
                //$hideForm = "true";
            };

            //
            if(!$hideForm=="true") {

            //------------------------------------------------------------------------------------------

            //
            $tempId = $_GET["user_id"];
            echo $tempId;

                //------------------------------------------------------------------------------------------

                //Benutzer waehlen ueber Klasse select_data_model.class.php
                require "mvc/model/select_data_model.class.php";
                select_data::select_specificDB("rosetta_users", "user_id", $tempId);

                //------------------------------------------------------------------------------------------

            //
            foreach ($res AS $row):

                ?>

            <div class='row'>
                <div class="formWrapper col-lg-8">
                <div class="formField">

                     <form action="?change_user=1" method = "post">
                        <?php
                        require_once "mvc/view/formularFields_view.class.php";
                            $form = new formular();
                            $form->hiddenField("user_id", "" . $row["user_id"] . "");
                            $form->inputField("Vorname", "forename", "" . $row["forename"] . "", "", "", 2, 8);
                            $form->inputField("Nachname", "surname", "" . $row["surname"] . "", "", "", 2, 8);
                            $form->inputField("Email", "email", "" . $row["email"] . "", "", "", 2, 8);
                            $form->inputField("Authorisation", "authorization", "" . $row["authorization"] . "", "", "", 2, 8);
                            $form->submitButton("2", "senden");
                        ?>
                    </form>
                </div><!--ENDE class="formField"-->
                </div><!--ENDE class="formWrapper col-lg-8"-->
            </div><!--ENDE class='row' -->


                <?php
            endforeach;
            }//Ende if(!$hideForm=="true")
            ?>

        <!------------------------------------------------------>

        <div class="container">
            <div class='row'>
                <?php

                //CONTROLLER
                if(isset($_GET['change_user'])) {
                    //------------------------------------------------------------------------------------------

                    $error = false;
                    $user_id = $_POST['user_id'];
                    $forename = $_POST['forename'];
                    $surname = $_POST['surname'];
                    $email = $_POST['email'];
                    $authorization = $_POST['authorization'];

                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        //Response-Objekt erzeugen
                        require_once "mvc/view/responseObject_view.class.php";
                        $response = new responseObject();
                        $response->response("Bitte eine gültige Email-Adresse eingeben","6","responseFalse");

                        $error = true;
                    }

                    //------------------------------------------------------------------------------------------
                    if(!$error) {
                        //Daten aendern ueber Controller edit_item
                        require "mvc/model/edit_user_model.class.php";
                        edit_user::editUserData($forename, $surname, $email, $authorization, $user_id);

                    }
                    //------------------------------------------------------------------------------------------

                }
                ?>
            </div>
        </div>

        <!------------------------------------------------------>

    </div><!-- ENDE containr -->

    </div><!--ENDE container-fluid content-->


<?php
//include header
include "lib/elements/footer.php";
?>
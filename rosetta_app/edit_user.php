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
                $hideForm = "true";
            };

            //
            if(!$hideForm=="true") {

            //------------------------------------------------------------------------------------------

            //
            $tempId = $_GET["user_id"];
            echo $tempId;

            //
            $res = $pdo->query("SELECT * FROM rosetta_users WHERE user_id LIKE $tempId");

            //
            foreach ($res AS $row):

                ?>

            <div class='row'>
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
                            $form->submitButton("2", "Ändern");
                        ?>
                    </form>
                </div><!--ENDE class="formField"-->
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

                    $user_id = $_POST['user_id'];
                    $forename = $_POST['forename'];
                    $surname = $_POST['surname'];
                    $email = $_POST['email'];
                    $authorization = $_POST['authorization'];

                    //------------------------------------------------------------------------------------------

                    //Daten aendern ueber Controller edit_item
                    require "mvc/model/edit_user_model.class.php";
                    edit_user::editUserData($forename,$surname,$email,$authorization,$user_id);

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
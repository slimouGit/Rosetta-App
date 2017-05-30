<?php

//include header
include "lib/elements/header.php";
?>

    //------------------------------------------------------------------------------------------

    <div class="container-fluid content">

    <div class="container">

        <!------------------------------------------------------------->

        <div class='row'>
            <h1>Rosetta-App edit user</h1>
        </div>

        <!------------------------------------------------------------->

        <div class='row'>
            <div class="formField">

            <?php

            $hideForm ="";

            //nachdem der Button geklicktwurde
            if(empty($_GET["user_id"])){
                $_GET["user_id"] = $_POST['user_id'];
                $hideForm = "true";
            };

            //------------------------------------------------------------------------------------------

            //
            $tempId = $_GET["user_id"];

            $res = $pdo->query("SELECT * FROM rosetta_users WHERE user_id LIKE $tempId");

            foreach ($res AS $row):

                ?>

                 <form action="?change_user=1" method = "post">

                    <?php

                    require_once "mc/model/formularFields.class.php";

                        if(!$hideForm=="true") {

                            $form = new formular();

                            $form->hiddenField("user_id", "" . $row["user_id"] . "");
                            $form->inputField("Vorname", "forename", "" . $row["forename"] . "", "", "", 2, 8);
                            $form->inputField("Nachname", "surname", "" . $row["surname"] . "", "", "", 2, 8);
                            $form->inputField("Email", "email", "" . $row["email"] . "", "", "", 2, 8);
                            $form->inputField("Authorisation", "authorization", "" . $row["authorization"] . "", "", "", 2, 8);

                            $form->submitButton("2", "Ändern");

                        }
                    ?>

                </form>

                 <?php
            endforeach;
            ?>

            </div>
        </div>

        <!------------------------------------------------------>

        <div class="container">
            <div class='row'>
                <?php

                if(isset($_GET['change_user'])) {
                    //------------------------------------------------------------------------------------------

                    $user_id = $_POST['user_id'];
                    $forename = $_POST['forename'];
                    $surname = $_POST['surname'];
                    $email = $_POST['email'];
                    $authorization = $_POST['authorization'];

                    //------------------------------------------------------------------------------------------

                    //Daten aendern ueber Controller edit_item
                    require "mc/controller/edit_user.class.php";
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
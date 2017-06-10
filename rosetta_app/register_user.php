<?php
//include header
include "lib/elements/header.php";
?>

<?php
//include connection to database
include "mvc/model/config.php";
?>

    <div class="container-fluid content">


    <div class="container">

    <!-------------------------------------------------------------->

    <div class='row'>
        <h1>Rosetta-App Nutzer registrieren</h1>
    </div>

    <!------------------------------------------------------------->

    <div class='row'>
        <div class="formWrapper col-lg-8">
            <div class="formField">

                <form action="?register=1" method="post">

                    <?php
                    require_once "mvc/view/formularFields_view.class.php";
                    $form = new formular();
                    $form->inputField("Vorname", "forename", $_POST['forename'], "", "", 2, 8);
                    $form->inputField("Nachname", "surname", $_POST['surname'], "", "", 2,  8);
                    $form->inputField("Email", "email", $_POST['email'], "", "", 2,  8);
                    $form->optionField("Authorisation", "User", "Admin");
                    $form->passwordField("Passwort", "password", $_POST['password'], "", "",2, 8);
                    $form->passwordField("Passwort wiederholen", "password2", $_POST['password2'], "", "", 2,  8);
                    $form->submitButton("2","Registrieren");
                    ?>

                </form>

            </div>
        </div>
    </div>

    <!------------------------------------------------------------->

    <div class="container">
        <div class='row'>

            <?php

            //CONTROLLER
            if(isset($_GET['register'])) {

                //Response-Objekt erzeugen
                require_once "mvc/view/responseObject_view.class.php";
                $response = new responseObject();
                //------------------------------------------------------

                $error = false;
                $forename = $_POST['forename'];
                $surname = $_POST['surname'];
                $authorization = $_POST['authorization'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $password2 = $_POST['password2'];

                if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $response->response("Bitte eine gültige Email-Adresse eingeben","6","responseFalse");

                    $error = true;
                }
                if(strlen($password) == 0) {
                    $response->response("Bitte ein Passwort eingeben","6","responseFalse");
                    $error = true;
                }
                if($password != $password2) {
                    $response->response("Die Passwörter müssen übereinstimmen","6","responseFalse");
                    $error = true;
                }

                //Ueberpruefen, ob Email bereits existiert
                if(!$error) {
                    //$res = $pdo->prepare("SELECT * FROM rosetta_users WHERE email = :email");

                    //------------------------------------------------------------------------------------------

                    //
                    require "mvc/model/select_data_model.class.php";
                    select_data::select_individuelUser("email");

                    //------------------------------------------------------------------------------------------


                    $result = $res->execute(array('email' => $email));
                    $user = $res->fetch();

                    if($user !== false) {
                        $response->response("Diese Email-Adresse ist bereits vergeben","6","responseFalse");
                        $error = true;
                    }
                }

                //Keine Fehler, Nutzer wird registriert
                if(!$error) {
                    $password_hash = password_hash($password, PASSWORD_DEFAULT);

                    //Daten eintragen ueber Controller insert_item
                    require "mvc/model/register_user_model.class.php";
                    register_user::insertUserData($forename,$surname,$authorization,$email,$password_hash);
                }
            }

            ?>
            </div>
        </div>

        <!------------------------------------------------------------->

    </div><!--ENDE container-fluid content-->


<?php
//include header
include "lib/elements/footer.php";
?>
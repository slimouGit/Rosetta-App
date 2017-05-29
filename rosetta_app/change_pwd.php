<?php
//include header
include "lib/elements/header.php";
?>

    <div class="container-fluid content">


    <div class="container">

        <!-------------------------------------------------------------->

        <div class='row'>
            <h1>Rosetta-App change own password</h1>
        </div>

        <!------------------------------------------------------------->

        <div class='row'>
            <div class="formWrapper col-lg-8">
                <div class="formField">

                    <form action="?change_pwd=1" method="post">

                        <?php
                            require_once "mc/model/formularFields.class.php";
                            $form = new formular();
                            $form->passwordField("Passwort", "password", "", "", "", 2, 8);
                            $form->passwordField("Passwort wiederholen", "password2", "", "", "", 2, 8);
                            $form->submitButton("2", "Registrieren");
                        ?>

                    </form>
                </div>
            </div>
        </div>

        <!------------------------------------------------------------->

        <div class="container">
            <div class='row'>
            <?php

            if(isset($_GET['change_pwd'])) {
                $error = false;
                $password = $_POST['password'];
                $password2 = $_POST['password2'];

                if(strlen($password) == 0) {
                    echo 'Bitte ein Passwort angeben<br>';
                    $error = true;
                }
                if($password != $password2) {
                    echo 'Die Passwörter müssen übereinstimmen<br>';
                    $error = true;
                }

                //Keine Fehler, das neue Passwort wird eingetragen
                if(!$error) {

                    $passwordhash = password_hash($password, PASSWORD_DEFAULT);

                    $statement = $pdo->prepare("UPDATE rosetta_users SET password = :passwordhash WHERE user_id = :user_id");
                    $result = $statement->execute(array('passwordhash' => $passwordhash, 'user_id'=> $userid ));

                    if($result) {

                        //Meldung wird ausgegeben
                        require_once "mc/model/responseObject.class.php";
                        $response = new responseObject();
                        $response->response("Das Passwort wurde erfolgreich geändert.", "4", "");
                    }
                }
            }
            ?>
            </div>
        </div>

        <!-------------------------------------------------------------->

    </div>


<?php
//include header
include "lib/elements/footer.php";
?>
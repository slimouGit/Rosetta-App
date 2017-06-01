<?php
//include header
include "lib/elements/header.php";
?>

    <div class="container-fluid content">


    <div class="container">

        <!-------------------------------------------------------------->

        <div class='row'>
            <h1>Rosetta-App change password</h1>
        </div>

        <!------------------------------------------------------------->
        <?php

        //--------------------------------------------------------------------
        //es wird unterschieden, ob der Nutzer ueber die Navigation oder aus "table_user.class" kommt,
        //also, ob er sein eigenes Passwort oder als Administrator das eines Nutzers aendern will

        //$_GET["user_id"] ist leer, wenn ueber Navigation "Passwort ändern" auf Seite gewechselt wird
        if(empty($_GET["user_id"])){
                //$_POST["user_id"] ist leer, wenn nicht ueber hidden-field im Formular uebergeben wurde
                //dann wird $_POST["user_id"] mit der ID des aktuellen Nutzers initialisiert,
                //er aendert also sein eigenes Passwort
                if(empty($_POST['user_id'])){
                    $_POST['user_id'] = $userid;
                }
                $_GET["user_id"] = $_POST['user_id'];
            };

            //$tempId wird mit der uebergebenen ID aus table_user.class initialisiert
            $tempId = $_GET["user_id"];

        //--------------------------------------------------------------------

            $res = $pdo->query("SELECT * FROM rosetta_users WHERE user_id LIKE $tempId");

            //
            foreach ($res AS $row):

                ?>

                <div class='row'>
            <div class="formWrapper col-lg-8">
                <div class="formField">

                    <form action="?change_pwd=1" method="post">

                        <?php
                            require_once "mc/model/formularFields.class.php";
                            $form = new formular();
                            $form->hiddenField("user_id", "" . $row["user_id"] . "");
                            $form->passwordField("Passwort", "password", "", "", "", 2, 8);
                            $form->passwordField("Passwort wiederholen", "password2", "", "", "", 2, 8);
                            $form->submitButton("2", "Registrieren");
                        ?>

                    </form>
                </div>
            </div>
        </div>

        <?php
            endforeach;
            ?>

        <!------------------------------------------------------------->

        <div class="container">
            <div class='row'>
            <?php

            //----------------------------------------------------------------



            //----------------------------------------------------------------

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

                    $res = $pdo->prepare("UPDATE rosetta_users SET password = :passwordhash WHERE user_id = :user_id");
                    $result = $res->execute(array('passwordhash' => $passwordhash, 'user_id'=> $tempId ));

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
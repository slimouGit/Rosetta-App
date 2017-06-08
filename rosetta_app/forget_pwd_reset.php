<?php

//include header
include "lib/elements/headerStart.php";
?>

<?php
//include db connection
include "mvc/model/db_connect_model.php";
?>

<?php
//include navigation
include 'lib/elements/navigation.php';
?>

    <!-------------------------------------------------------------->

    <div class="container-fluid content">


    <div class="container">

        <!-------------------------------------------------------------->

        <div class='row'>
            <h1>Rosetta-App Passwort ändern</h1>
        </div>

        <!------------------------------------------------------------->

        <?php

        //--------------------------------------------------------------------
        //es wird unterschieden, ob der Nutzer ueber die Navigation oder aus "table_user.class" kommt,
        //also, ob er sein eigenes Passwort oder als Administrator das eines Nutzers aendern will

        //CONTROLLER
        //$_GET["user_id"] ist leer, wenn ueber Navigation "Passwort ändern" auf Seite gewechselt wird
        if(empty($_GET["user_id"])){
            //$_POST["user_id"] ist leer, wenn nicht ueber hidden-field im Formular uebergeben wurde
            //dann wird $_POST["user_id"] mit der ID des aktuellen Nutzers initialisiert,

            //er aendert also sein eigenes Passwort
            //CONTROLLER
            if(empty($_POST['user_id'])){
                $_POST['user_id'] = $userid;
            }
            $_GET["user_id"] = $_POST['user_id'];
        };

        //$tempId wird mit der uebergebenen ID aus table_user.class initialisiert
        $tempId = $_GET["user_id"];

        //der uebergebene Code wird in $code abgelegt
        $code = $_GET['code'];

        //------------------------------------------------------------------------------------------

        //Benutzer waehlen ueber Klasse select_data.class.php
        require "mvc/model/select_data.class.php";
        select_data::select_specificDB("rosetta_users", "user_id", $tempId);

        //------------------------------------------------------------------------------------------

        //
        foreach ($res AS $row):

            //CONTROLLER
            //Pruefen, ob der generierte Code mit dem in der Datenbank abgelegten Code uebereinstimmt
            if($code===$row["password_code"]){
            ?>

            <!-------------------------------------------------------------->

            <div class='row'>
                <div class="formWrapper col-lg-8">
                    <div class="formField">

                        <form action="?change_pwd=1" method="post">

                            <?php
                            require_once "mvc/view/formularFields_view.class.php";
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

            <!-------------------------------------------------------------->

            <?php
                }//ENDE if($code===$row["password_code"])
            endforeach;
        ?>

        <!------------------------------------------------------------->

        <div class="container">
            <div class='row'>
                <?php

                //----------------------------------------------------------------

                //CONTROLLER
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

                        //Daten eintragen ueber Controller forget_pwd_mode
                        require "mvc/model/set_pwd_model.class.php";
                        set_pwd::resetPWDCode($passwordhash, $tempId);


                        echo "<a href=\"../index.php\">zum login</a>";
                    }
                }
                ?>

                <!-------------------------------------------------------------->

            </div>
        </div>

        <!-------------------------------------------------------------->

    </div>

    <!-------------------------------------------------------------->

<?php
//include header
include "lib/elements/footer.php";
?>
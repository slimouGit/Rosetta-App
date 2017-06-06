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
include 'lib/elements/navigationStart.php';
?>

<!------------------------------------------>

<div class="container-fluid content">

    <div class="col-lg-12">
        <div class='row'>
            <h1>Passwort vergessen</h1>
        </div>
    </div>

    <!------------------------------------------>

    <?php

    //Funktion generiert einen "zufaelligen" Wert fuer den Passwortcode
    function random_string() {
        if(function_exists('random_bytes')) {
            $bytes = random_bytes(16);
            $str = bin2hex($bytes);
        } else if(function_exists('openssl_random_pseudo_bytes')) {
            $bytes = openssl_random_pseudo_bytes(16);
            $str = bin2hex($bytes);
        } else if(function_exists('mcrypt_create_iv')) {
            //$bytes = mcrypt_create_iv(16, MCRYPT_DEV_URANDOM);
            $bytes = bin2hex(openssl_random_pseudo_bytes(16));
            $str = bin2hex($bytes);
        } else {
            $str = md5(uniqid('rosetta-app', true));
        }
        return $str;
    }

    //-------------------------------------------------

    $showForm = true;

    //-------------------------------------------------

    //CONTROLLER
    if(isset($_GET['send']) ) {
        if(!isset($_POST['email']) || empty($_POST['email'])) {
            $error = "Bitte eine E-Mail-Adresse eintragen";
        } else {
            $statement = $pdo->prepare("SELECT * FROM rosetta_users WHERE email = :email");
            $result = $statement->execute(array('email' => $_POST['email']));
            $user = $statement->fetch();

            //CONTROLLER
            if($user === false) {
                $error = "Kein Benutzer gefunden";
            } else {
                //Überpruefen, ob der User schon einen Passwortcode hat oder ob dieser abgelaufen ist
                $passwordcode = random_string();

                $currentDate = date('Y-m-d H:i:s');

                $user_id = $user['user_id'];
                $user_email = $user['email'];
                $user_forename = $user['forename'];

                //Daten eintragen ueber Controller forget_pwd_mode
                require "mvc/model/set_pwd_model.class.php";
                set_pwd::insertPWDCode($passwordcode, $currentDate, $user_id, $user_email, $user_forename);
                ?>

                <div class="col-lg-12">
                    <div class='row'>
                        <div class="formWrapper col-lg-3">
                            <?php
                            //Meldung wird ausgegeben
                            require_once "mvc/view/responseObject_view.class.php";
                            $response = new responseObject();
                            $response->response("Ein Link wurde an Deine Email geschickt","6","responseSuccess");
                            ?>
                        </div>
                    </div>
                </div>
                <?php


                $showForm = false;
            }
        }
    }

    //------------------------------------------------------

    //CONTROLLER
    if($showForm){

        //CONTROLLER
    //Fehlermeldung
    if(isset($error) && !empty($error)) {
        ?>
        <div class="col-lg-12">
            <div class='row'>
                <div class="formWrapper col-lg-3 response responseFalse">
                    <?php
                    echo $error;
                    ?>
                </div>
            </div>
        </div>
        <?php
    }
    ?>

    <!------------------------------------------>

    <div class="formWrapper col-lg-3">
        <div class="formField">
            <form action="?send=1" method="post">
                <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>"><br>
                <input type="submit" class="btn btn-primary" value="Passwort anfordern">
            </form>
        </div>
    </div>

    <!------------------------------------------>

    <?php
    }; //Endif von if($showForm)
    ?>

    <?php
    //include header
    include "lib/elements/footer.php";
    ?>

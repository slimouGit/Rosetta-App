<?php

//include header
include "lib/elements/headerStart.php";
?>

<?php
//include db connection
include "mc/controller/db_connect.php";
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
            <p>Bitte die Email-Adresse angeben, an die das neue Passwort gesendet werden soll.</p>
        </div>
    </div>

    <!------------------------------------------>

    <?php

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
            //Bitte euer_geheim_string durch einen zufälligen String mit >12 Zeichen austauschen
            $str = md5(uniqid('rosetta-app', true));
        }
        return $str;
    }

    //-------------------------------------------------

    $showForm = true;

    //-------------------------------------------------

    if(isset($_GET['send']) ) {
        if(!isset($_POST['email']) || empty($_POST['email'])) {
            $error = "Bitte eine E-Mail-Adresse eintragen";
        } else {
            $statement = $pdo->prepare("SELECT * FROM rosetta_users WHERE email = :email");
            $result = $statement->execute(array('email' => $_POST['email']));
            $user = $statement->fetch();

            if($user === false) {
                $error = "Kein Benutzer gefunden";
            } else {
                //Überpruefen, ob der User schon einen Passwortcode hat oder ob dieser abgelaufen ist
                $passwordcode = random_string();

                $currentDate = date('Y-m-d H:i:s');

                $res = $pdo->prepare("UPDATE rosetta_users SET password_code = :password_code, password_date = :password_date WHERE user_id = :user_id");
                $result = $res->execute(array('password_code' => $passwordcode, 'password_date' => $currentDate, 'user_id' => $user['user_id']));

                $empfaenger = $user['email'];
                $betreff = "Neues Passwort für deinen Account auf www.rosetta-app.de";
                $from = "From: admin@rosetta-app.de";
                $url_passwordcode = 'http://rosetta-app.de/rosetta_app/forget_pwd_reset.php?user_id='.$user['user_id'].'&code='.$passwordcode;

                $text = 'Hallo '.$user['forename'].',
                    für deinen Account auf www.rosetta-app.de wurde nach einem neuen Passwort gefragt. 
                    Um ein neues Passwort zu vergeben, rufe die folgende Website über den folgenden Link auf:                
                    '. $url_passwordcode .'
                    Sollte dir dein Passwort wieder eingefallen sein oder hast du dies nicht angefordert, so bitte ignoriere diese E-Mail.';

                mail($empfaenger, $betreff, $text, $from);

                echo "Es wurde ein Link an Deine Email gesendet.";
                $showForm = false;
            }
        }
    }

    //------------------------------------------------------

    if($showForm){

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

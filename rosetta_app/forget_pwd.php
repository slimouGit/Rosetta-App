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

<div class="container-fluid content">

    <div class="col-lg-12">
        <div class='row'>
            <h1>Passwort vergessen</h1>
        </div>
    </div>

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


$showForm = true;

if(isset($_GET['send']) ) {
    if(!isset($_POST['email']) || empty($_POST['email'])) {
        $error = "<b>Bitte eine E-Mail-Adresse eintragen</b>";
    } else {
        $statement = $pdo->prepare("SELECT * FROM rosetta_users WHERE email = :email");
        $result = $statement->execute(array('email' => $_POST['email']));
        $user = $statement->fetch();

        if($user === false) {
            $error = "<b>Kein Benutzer gefunden</b>";
        } else {
            //Überprüfe, ob der User schon einen Passwortcode hat oder ob dieser abgelaufen ist
            $passwordcode = random_string();

            $currentDate = date('Y-m-d H:i:s');

            $res = $pdo->prepare("UPDATE rosetta_users SET password_code = :password_code, password_date = :password_date WHERE user_id = :user_id");
            $result = $res->execute(array('password_code' => sha1($passwordcode), 'password_date' => $currentDate, 'user_id' => $user['user_id']));

            $empfaenger = $user['email'];
            $betreff = "Neues Passwort für deinen Account auf www.rosetta-app.de";
            $from = "From: Admin <admin@rosetta-app.de>";
            $url_passwordcode = 'http://rosetta-app.de/rosetta_app/forget_pwd_reset.php?user_id='.$user['user_id'].'&code='.$passwordcode;

            $text = 'Hallo '.$user['forename'].',
für deinen Account auf www.rosetta-app.de wurde nach einem neuen Passwort gefragt. Um ein neues Passwort zu vergeben, rufe innerhalb der nächsten 24 Stunden die folgende Website auf:
'. $url_passwordcode
.'
 
Sollte dir dein Passwort wieder eingefallen sein oder hast du dies nicht angefordert, so bitte ignoriere diese E-Mail.';
            mail($empfaenger, $betreff, $text, $from);

            //echo $url_passwortcode;

            //echo "<br/><a href='".$url_passworcode."'>Link</a><br/>";
            $test = 'forget_pwd_reset.php?user_id='.$user['user_id'].'&code='.$passwordcode;
            echo "<br/><a href='".$test."'>Passwort zuruecksetzen</a><br/>";


            echo "Ein Link um dein Passwort zurückzusetzen wurde an deine E-Mail-Adresse gesendet.";
            $showForm = false;
        }
    }
}

if($showForm):
    ?>

    Gib hier deine E-Mail-Adresse ein, um ein neues Passwort anzufordern.<br><br>

    <?php
    if(isset($error) && !empty($error)) {
        echo $error;
    }
    ?>

    <form action="?send=1" method="post">
        E-Mail:<br>
        <!--<input type="email" name="email" value="<?php echo isset($_POST['email']) ? htmlentities($_POST['email']) : ''; ?>"><br>-->
        <input type="email" name="email" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>"><br>

        <input type="submit" value="Neues Passwort">
    </form>

    <?php
endif; //Endif von if($showForm)
?>
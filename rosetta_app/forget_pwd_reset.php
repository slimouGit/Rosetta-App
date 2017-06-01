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
                $user = $_GET['user_id'];
                echo $user;
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
                        $result = $res->execute(array('passwordhash' => $passwordhash, 'user_id'=> $userid ));

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
/*
if(isset($_GET['reset_pwd'])) {


$user = $_GET['user_id'];

$code = $_GET['code'];

echo "USER: " .$user;
echo "Code: " .sha1($code);
echo "<br/>";
echo "UserCode: " . $user['password_code'];
echo "<br/>";
echo "User:" . $user;
//Abfrage des Nutzers
$res = $pdo->prepare("SELECT * FROM rosetta_users WHERE user_id = :user_id");
$result = $res->execute(array('user_id' => $user));
$user = $res->fetch();

//Überprüfe dass ein Nutzer gefunden wurde und dieser auch ein Passwortcode hat
if($user === null || $user['password_code'] === null) {
    die("Es wurde kein passender Benutzer gefunden");
}

if($user['password_date'] === null || strtotime($user['password_date']) < (time()-24*3600) ) {
    die("Der Code ist nicht mehr gültig");
}


//Überprüfe den Passwortcode
if(sha1($code) != $user['password_code']) {
    die("Der übergebene Code war ungültig.");
}
}

//Der Code war korrekt, der Nutzer darf ein neues Passwort eingeben

if(isset($_GET['reset_pwd'])) {
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $user = $_GET['user_id'];

    echo $user;

    if($password != $password2) {
        echo "Beide Passwörter müssen übereinstimmen";
    } else { //Speichere neues Passwort und lösche den Code
        $passwordhash = password_hash($password, PASSWORD_DEFAULT);

        $res = $pdo->prepare("UPDATE rosetta_users SET password = :passwordhash WHERE user_id = :user_id");
        $result = $res->execute(array('passwordhash' => $passwordhash, 'user_id'=> $user ));

        if($result) {
            die("Dein Passwort wurde erfolgreich geändert");
        }
    }
}
?>

    <h1>Neues Passwort vergeben</h1>
    <form action=?reset_pwd=1" method="post">
        Bitte gib ein neues Passwort ein:<br>
        <input type="password" name="password"><br><br>

        Passwort erneut eingeben:<br>
        <input type="password" name="password2"><br><br>

        <input type="submit" value="Passwort speichern">
    </form>

*/
<?php
//include header
include "lib/elements/header.php";
?>

    <div class="container-fluid content">


    <div class="container">
        <div class='row'>
            <h1>Rosetta-App register user</h1>

        </div>
    </div>

<?php
$tempFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll

if(isset($_GET['register'])) {
    $error = false;
    $forename = $_POST['forename'];
    $surname = $_POST['surname'];
    $authorization = $_POST['authorization'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
        $error = true;
    }
    if(strlen($password) == 0) {
        echo 'Bitte ein Passwort angeben<br>';
        $error = true;
    }
    if($password != $password2) {
        echo 'Die Passwörter müssen übereinstimmen<br>';
        $error = true;
    }

    //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
    if(!$error) {
        $res = $pdo->prepare("SELECT * FROM rosetta_users WHERE email = :email");
        $result = $res->execute(array('email' => $email));
        $user = $res->fetch();

        if($user !== false) {
            echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
            $error = true;
        }
    }

    //Keine Fehler, wir können den Nutzer registrieren
    if(!$error) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $res = $pdo->prepare("INSERT INTO rosetta_users (forename, surname, authorization, email, password) VALUES (:forename, :surname, :authorization, :email, :password)");
        $result = $res->execute(array('forename' => $forename, 'surname' => $surname, 'authorization' => $authorization, 'email' => $email, 'password' => $password_hash));

        if($result) {

            //Meldung wird ausgegeben
            require_once "mc/model/responseObject.class.php";
            $response = new responseText();
            $response->success("Der Nutzer wurde erfolgreich registriert");

            $tempFormular = false;
        } else {
            echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
        }
    }
}

if($tempFormular) {
    ?>

    <form action="?register=1" method="post">

        <?php
        require_once "mc/model/formularFields.class.php";
        $form = new formular();
        $form->inputField("Vorname", "forename", "", "", "");
        $form->inputField("Nachname", "surname", "", "", "");
        $form->inputField("Email", "email", "", "", "");
        $form->optionField("Authorisation", "User", "Admin");
        $form->passwordField("Passwort", "password", "", "", "");
        $form->passwordField("Passwort wiederholen", "password2", "", "", "");
        $form->submitButton("Registrieren");
        ?>

    </form>

    <?php
} //Ende von if($tempFormular)
?>

<?php
//include header
include "lib/elements/footer.php";
?>
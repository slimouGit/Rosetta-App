<?php

session_start();

//include db connection
include "include/db_connect_PDO.php";
//$pdo = new PDO('mysql:host=localhost;dbname=rosetta-app', 'root', '');

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Salim Oussayfi">
    <meta name="description" content="Praxis-Projekt Beuth-Hochschule/Medieninformatik B.Sc.">
    <title>Rosetta-App</title>

    <!-- Bootstrap -->
    <link href="https://slimou.de/___Bootstrap/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/layout.css" rel="stylesheet">
</head>
<body>
<div class="container">

<?php
$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll

if(isset($_GET['register'])) {
    $error = false;
    $vorname = $_POST['vorname'];
    $nachname = $_POST['nachname'];
    $email = $_POST['email'];
    $passwort = $_POST['passwort'];
    $passwort2 = $_POST['passwort2'];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
        $error = true;
    }
    if(strlen($passwort) == 0) {
        echo 'Bitte ein Passwort angeben<br>';
        $error = true;
    }
    if($passwort != $passwort2) {
        echo 'Die Passwörter müssen übereinstimmen<br>';
        $error = true;
    }

    //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
    if(!$error) {
        $statement = $pdo->prepare("SELECT * FROM rosetta_users WHERE email = :email");
        $result = $statement->execute(array('email' => $email));
        $user = $statement->fetch();

        if($user !== false) {
            echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
            $error = true;
        }
    }

    //Keine Fehler, wir können den Nutzer registrieren
    if(!$error) {
        $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);

        $statement = $pdo->prepare("INSERT INTO rosetta_users (vorname, nachname, email, passwort) VALUES (:vorname, :nachname, :email, :passwort)");
        $result = $statement->execute(array('vorname' => $vorname, 'nachname' => $nachname, 'email' => $email, 'passwort' => $passwort_hash));

        if($result) {
            echo 'Der Nutzer wurde erfolgreich registriert. <meta http-equiv="refresh" content="3; URL=rosetta-app.php">';
            $showFormular = false;
        } else {
            echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
        }
    }
}

if($showFormular) {
    ?>

    <form action="?register=1" method="post">

        <div class="row">
            <div class="form-group">
                <label class="col-sm-2 control-label">Vorname</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" size="40" maxlength="250" name="vorname">
                </div>
                <div class="col-sm-4 errorContainer"></div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <label class="col-sm-2 control-label">Nachname</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" size="40" maxlength="250" name="nachname">
                </div>
                <div class="col-sm-4 errorContainer"></div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <label class="col-sm-2 control-label">E-Mail</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" size="40" maxlength="250" name="email">
                </div>
                <div class="col-sm-4 errorContainer"></div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <label class="col-sm-2 control-label">Passwort</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" size="40"  maxlength="250" name="passwort">
                </div>
                <div class="col-sm-4 errorContainer"></div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <label class="col-sm-2 control-label">Passwort wiederholen</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" size="40"  maxlength="250" name="passwort2">
                </div>
                <div class="col-sm-4 errorContainer"></div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-sm-2"></div>
                <div class="col-sm-1">
                    <input type="submit" class="btn btn-primary" value="Abschicken"></input>
                </div>
            </div>
        </div>

    </form>

    <?php
} //Ende von if($showFormular)
?>

</body>
</html>
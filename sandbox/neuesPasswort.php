<?php

//include header
include "elements/header.php";



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

    if(isset($_GET['reset'])) {
        $error = false;
        $passwort = $_POST['passwort'];
        $passwort2 = $_POST['passwort2'];

        if(strlen($passwort) == 0) {
            echo 'Bitte ein Passwort angeben<br>';
            $error = true;
        }
        if($passwort != $passwort2) {
            echo 'Die Passwörter müssen übereinstimmen<br>';
            $error = true;
        }

        //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
        /*
        if(!$error) {
            $statement = $pdo->prepare("SELECT * FROM rosetta_users WHERE email = :email");
            $result = $statement->execute(array('email' => $email));
            $user = $statement->fetch();

            if($user !== false) {
                echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
                $error = true;
            }
        }
    */
        //Keine Fehler, das neue Passwort wird eingetragen
        if(!$error) {
            $passworthash = password_hash($passwort, PASSWORD_DEFAULT);
            $statement = $pdo->prepare("UPDATE rosetta_users SET passwort = :passworthash, passwortcode = NULL, passwortcode_time = NULL WHERE id = :userid");
            $result = $statement->execute(array('passworthash' => $passworthash, 'userid'=> $userid ));

            if($result) {
                die("Dein Passwort wurde erfolgreich geändert");
            }
/*
            if($result) {
                echo 'Du wurdest erfolgreich registriert. <a href="index.php">Zum Login</a>';
                $showFormular = false;
            } else {
                echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
            }
        */
        }
    }

    if($showFormular) {
        ?>

        <form action="?reset=1" method="post">
            <?php
            echo $userid;
            ?>

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
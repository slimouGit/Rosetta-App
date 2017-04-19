<?php
/* Vor Beenden der Session wieder aufnehmen */
session_start();

/* Beenden der Session */
session_destroy();
$_SESSION = array();
?>
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
<div class='row'>
    <h3>Rosetta-App Prototype</h3>
</div>
    <?php
    session_start();

    //include db connection
    include "include/db_connect_PDO.php";
    //$pdo = new PDO('mysql:host=localhost;dbname=rosetta-app', 'root', '');

    if(isset($_GET['login'])) {
        $email = $_POST['email'];
        $passwort = $_POST['passwort'];

        $statement = $pdo->prepare("SELECT * FROM rosetta_users WHERE email = :email");
        $result = $statement->execute(array('email' => $email));
        $user = $statement->fetch();

        //Überprüfung des Passworts
        if ($user !== false && password_verify($passwort, $user['passwort'])) {
            $_SESSION['userid'] = $user['id'];
            $_SESSION['username'] = $user['vorname'] . " " . $user['nachname'];
            die('Login erfolgreich. Weiter zu <a href="rosetta-app.php">internen Bereich</a><meta http-equiv="refresh" content="3; URL=rosetta-app.php">');
        } else {
            $errorMessage = "E-Mail oder Passwort war ungültig<br>";
        }

    }
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Login</title>
    </head>
    <body>

    <?php
    if(isset($errorMessage)) {
        echo $errorMessage;
    }
    ?>

    <form action="?login=1" method="post">

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
                <div class="col-sm-2"></div>
                <div class="col-sm-1">
                    <input type="submit" class="btn btn-primary" value="Abschicken"></input>
                </div>
            </div>
        </div>

        <div class="row"><br>
            <div class="col-sm-2"></div>
            <div class="col-sm-6">
                <!--<p><a href="registrieren.php">keine Zugangsdaten?</a></p>-->
            </div>
        </div>

    </form>
    <p><a href="passwortvergessen.php">Passwort vergessen</a></p>
</body>
</html>

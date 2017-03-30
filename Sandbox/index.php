<?php

session_start();
$verhalten = 0;

if(!isset($_SESSION["username"]) and (!isset($_GET["page"]))){
    $verhalten = 0;
}
if($_GET["page"] == "log"){

    $user = $_POST["user"];
    $passwort = $_POST["passwort"];

    if($user == "admin" and $passwort == "passwort"){

        $_SESSION["username"] = $user;
        $verhalten = 1;

    }else{
        $verhalten = 2;
    }
}
?>
<html>
<head>
    <title>Rosetta-app</title>
    <?php
        if($verhalten==1) {
            ?>
                <meta http-equiv="refresh" content="2 URL=rosetta-app.php"/>
            <?php
        }
    ?>
</head>
<body>
    <?php
        if($verhalten == 0) {
            ?>
                <p>Bitte einloggen:</p>
                <form method="post" action="index.php?page=log">
                    <input type="text" name="user"/>
                    <input type="password" name="passwort"/>
                    <input type="submit" value="Login"/>
                </form>
            <?php
        }
    ?>

    <?php
    if($verhalten==1) {
        ?>
                <p>Login erfolgreich</p>

        <?php
    }
    ?>

    <?php
    if($verhalten ==2) {
        ?>
            <p>Login fehlerhaft.</p>
            <a href="index.php">erneut versuchen</a>
        <?php
    }
    ?>
</body>
</html>


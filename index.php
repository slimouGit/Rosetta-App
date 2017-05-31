<?php

session_start();

//include header
include "rosetta_app/lib/elements/headerStart.php";
?>

<?php
//include connection to database
include "rosetta_app/mc/controller/db_connect.php";
?>

<?php
//include navigation
include 'rosetta_app/lib/elements/navigationStart.php';
?>


<div class="container-fluid content">

    <div class="col-lg-12">
        <div class='row'>
            <h1>Rosetta-App welcome</h1>
        </div>
    </div>
    <?php

    if(isset($_GET['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];


        $res = $pdo->prepare("SELECT * FROM rosetta_users WHERE email = :email");
        $result = $res->execute(array('email' => $email));
        $user = $res->fetch();

        //Überprüfung des Passworts
        if ($user !== false && password_verify($password, $user['password'])) {
            //var_dump($user);
            $_SESSION['userid'] = $user['user_id'];
            $_SESSION['username'] = $user['forename'] . " " . $user['surname'];
            $_SESSION['authorization'] = $user['authorization'];
            die('Login erfolgreich. Weiter zu <a href="rosetta_app/index.php">internen Bereich</a><meta http-equiv="refresh" content="3; URL=rosetta_app/index.php">');
        } else {
            $errorMessage = "E-Mail oder Passwort war ungültig<br>";
        }

    }
    ?>


    <?php
    if(isset($errorMessage)) {
        echo $errorMessage;
    }
    ?>

    <div class="formWrapper col-lg-3">
        <div class="formField">
            <form action="?login=1" method="post">

                <?php
                require_once "rosetta_app/mc/model/formularFields.class.php";
                $form = new formular();
                $form->inputField("", "email", "", "Email", "", 0,  11);
                $form->passwordField("", "password", "Passwort", "", "", 0,  11);
                $form->submitButton("0","Login");
                $form->ahref("rosetta_app/forget_pwd.php","Passwort vergessen");
                ?>


            </form>
        </div>
    </div>

    </body>
    </html>

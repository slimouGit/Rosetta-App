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
            <h1>Passwort zurücksetzen</h1>
        </div>
    </div>




<?php
if(!isset($_GET['user_id']) || !isset($_GET['code'])) {
    die("Es wurde kein Code zum Zurücksetzen des Passworts übermittelt");
}

$user = $_GET['user_id'];
$code = $_GET['code'];

echo "USER: " .$user;

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

//Der Code war korrekt, der Nutzer darf ein neues Passwort eingeben

if(isset($_GET['send'])) {
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if($password != $password2) {
        echo "Beide Passwörter müssen übereinstimmen";
    } else { //Speichere neues Passwort und lösche den Code
        $passwordhash = password_hash($password, PASSWORD_DEFAULT);
        $res = $pdo->prepare("UPDATE rosetta_users SET password = :passwordhash, password_code = NULL, password_date = NULL WHERE user_id = :user_id");
        $result = $res->execute(array('passwordhash' => $passwordhash, 'user_id'=> $user_id ));

        if($result) {
            die("Dein Passwort wurde erfolgreich geändert");
        }
    }
}
?>

    <h1>Neues Passwort vergeben</h1>
    <form action="?send=1&amp;user_id=<?php echo htmlentities($user_id); ?>&amp;code=<?php echo htmlentities($code); ?>" method="post">
        Bitte gib ein neues Passwort ein:<br>
        <input type="password" name="password"><br><br>

        Passwort erneut eingeben:<br>
        <input type="password" name="password2"><br><br>

        <input type="submit" value="Passwort speichern">
    </form>
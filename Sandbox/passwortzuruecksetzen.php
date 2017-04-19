<?php
//include db connection
include "include/db_connect_PDO.php";
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
if(!isset($_GET['userid']) || !isset($_GET['code'])) {
    die("Leider wurde beim Aufruf dieser Website kein Code zum Zurücksetzen deines Passworts übermittelt");
}

$userid = $_GET['userid'];
$code = $_GET['code'];

//Abfrage des Nutzers
$statement = $pdo->prepare("SELECT * FROM rosetta_users WHERE id = :userid");
$result = $statement->execute(array('userid' => $userid));
$user = $statement->fetch();

//Überprüfe dass ein Nutzer gefunden wurde und dieser auch ein Passwortcode hat
if($user === null || $user['passwortcode'] === null) {
    die("Es wurde kein passender Benutzer gefunden");
}

if($user['passwortcode_time'] === null || strtotime($user['passwortcode_time']) < (time()-24*3600) ) {
    die("Dein Code ist leider abgelaufen");
}


//Überprüfe den Passwortcode
if(sha1($code) != $user['passwortcode']) {
    die("Der übergebene Code war ungültig. Stell sicher, dass du den genauen Link in der URL aufgerufen hast.");
}

//Der Code war korrekt, der Nutzer darf ein neues Passwort eingeben

if(isset($_GET['send'])) {
    $passwort = $_POST['passwort'];
    $passwort2 = $_POST['passwort2'];

    if($passwort != $passwort2) {
        echo "Bitte identische Passwörter eingeben";
    } else { //Speichere neues Passwort und lösche den Code
        $passworthash = password_hash($passwort, PASSWORD_DEFAULT);
        $statement = $pdo->prepare("UPDATE rosetta_users SET passwort = :passworthash, passwortcode = NULL, passwortcode_time = NULL WHERE id = :userid");
        $result = $statement->execute(array('passworthash' => $passworthash, 'userid'=> $userid ));

        if($result) {
            die("Dein Passwort wurde erfolgreich geändert");
        }
    }
}
?>

    <h1>Neues Passwort vergeben</h1>
    <form action="?send=1&amp;userid=<?php echo htmlentities($userid); ?>&amp;code=<?php echo htmlentities($code); ?>" method="post">
        Bitte gib ein neues Passwort ein:<br>
        <input type="password" name="passwort"><br><br>

        Passwort erneut eingeben:<br>
        <input type="password" name="passwort2"><br><br>

        <input type="submit" value="Passwort speichern">
    </form>
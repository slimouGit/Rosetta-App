<?php
session_start();

//include db connection
include "db_connect_PDO.php";
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
        die('Login erfolgreich. Weiter zu <a href="geheim.php">internen Bereich</a><meta http-equiv="refresh" content="3; URL=geheim.php">');
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
    E-Mail:<br>
    <input type="email" size="40" maxlength="250" name="email"><br><br>

    Dein Passwort:<br>
    <input type="password" size="40"  maxlength="250" name="passwort"><br>

    <input type="submit" value="Abschicken">

    <p><a href="registrieren.php">keine Zugangsdaten?</a></p>

    <p><a href="createDB.php">Datenbank erstellen</a></p>
</form>
</body>
</html>
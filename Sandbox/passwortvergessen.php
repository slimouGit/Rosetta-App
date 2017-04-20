<?php
//include header
include "elements/header.php";
?>


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
function random_string() {
    if(function_exists('random_bytes')) {
        $bytes = random_bytes(16);
        $str = bin2hex($bytes);
    } else if(function_exists('openssl_random_pseudo_bytes')) {
        $bytes = openssl_random_pseudo_bytes(16);
        $str = bin2hex($bytes);
    } else if(function_exists('mcrypt_create_iv')) {
        //$bytes = mcrypt_create_iv(16, MCRYPT_DEV_URANDOM);
        $bytes = bin2hex(openssl_random_pseudo_bytes(16));
        $str = bin2hex($bytes);
    } else {
        //Bitte euer_geheim_string durch einen zufälligen String mit >12 Zeichen austauschen
        $str = md5(uniqid('rosetta-app', true));
    }
    return $str;
}


$showForm = true;

if(isset($_GET['send']) ) {
    if(!isset($_POST['email']) || empty($_POST['email'])) {
        $error = "<b>Bitte eine E-Mail-Adresse eintragen</b>";
    } else {
        $statement = $pdo->prepare("SELECT * FROM rosetta_users WHERE email = :email");
        $result = $statement->execute(array('email' => $_POST['email']));
        $user = $statement->fetch();

        if($user === false) {
            $error = "<b>Kein Benutzer gefunden</b>";
        } else {
            //Überprüfe, ob der User schon einen Passwortcode hat oder ob dieser abgelaufen ist
            $passwortcode = random_string();
            $statement = $pdo->prepare("UPDATE rosetta_users SET passwortcode = :passwortcode, passwortcode_time = NOW() WHERE id = :userid");
            $result = $statement->execute(array('passwortcode' => sha1($passwortcode), 'userid' => $user['id']));

            $empfaenger = $user['email'];
            $betreff = "Neues Passwort für deinen Account auf www.rosetta-app.de"; //Ersetzt hier den Domain-Namen
            $from = "From: Admin <admin@rosetta-app.de>"; //Ersetzt hier euren Name und E-Mail-Adresse
            //$url_passwortcode = 'http://prototype.rosetta-app.de/passwortzuruecksetzen.php?userid='.$user['id'].'&code='.$passwortcode;
            $url_passwortcode = 'passwortzuruecksetzen.php?userid='.$user['id'].'&code='.$passwortcode;

            $text = 'Hallo '.$user['vorname'].',
für deinen Account auf www.rosetta-app.de wurde nach einem neuen Passwort gefragt. Um ein neues Passwort zu vergeben, rufe innerhalb der nächsten 24 Stunden die folgende Website auf:
'.$url_passworcode.'
 
Sollte dir dein Passwort wieder eingefallen sein oder hast du dies nicht angefordert, so bitte ignoriere diese E-Mail.';
            mail($empfaenger, $betreff, $text, $from);

            //echo $url_passwortcode;

            //echo "<br/><a href='".$url_passworcode."'>Link</a><br/>";
            $test = 'passwortzuruecksetzen.php?userid='.$user['id'].'&code='.$passwortcode;
            echo "<br/><a href='".$test."'>Passwort zuruecksetzen</a><br/>";


            echo "Ein Link um dein Passwort zurückzusetzen wurde an deine E-Mail-Adresse gesendet.";
            $showForm = false;
        }
    }
}

if($showForm):
    ?>

    <h1>Passwort vergessen</h1>
    Gib hier deine E-Mail-Adresse ein, um ein neues Passwort anzufordern.<br><br>

    <?php
    if(isset($error) && !empty($error)) {
        echo $error;
    }
    ?>

    <form action="?send=1" method="post">
        E-Mail:<br>
        <input type="email" name="email" value="<?php echo isset($_POST['email']) ? htmlentities($_POST['email']) : ''; ?>"><br>
        <input type="submit" value="Neues Passwort">
    </form>

    <?php
endif; //Endif von if($showForm)
?>
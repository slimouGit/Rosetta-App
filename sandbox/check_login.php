<?php
/* Session starten oder wieder aufnehmen */
session_start();

/* Falls Aufruf von Login-Seite */
if(isset($_POST["n"]))
{
    /* Falls Name und Passwort korrekt */
    if($_POST["n"] == "admin" && $_POST["p"] == "password"
        || $_POST["n"] == "Salim" && $_POST["p"] == "26041980")
    {
        $_SESSION["n"] = $_POST["n"];
    }
}

/* Kontrolle, ob innerhalb der Session */
if (!isset($_SESSION["n"]))
    exit("<p>Kein Zugang<br /><a href='index.php'>Zum Login</a></p>");
?>

<html>
<body>
<h3>Login erfolgreich</h3>
<?php
/* Begr��ung des Benutzers */
//echo "<p>Hallo " . $_SESSION["n"] . "</p>";
?>
<p><a href="rosetta-app.php">sollte die Weiterleitung nicht funktionieren, hier klicken.</a></p>
<meta http-equiv="refresh" content="3; URL=rosetta-app.php">
</body>
</html>

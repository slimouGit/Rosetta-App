<?php
session_start();
if(!isset($_SESSION['username'])) {
    die('<meta http-equiv="refresh" content="0; URL=error.php">');
}

//Abfrage der Nutzer ID vom Login
$userid = $_SESSION['userid'];
//Abfrage der Nutzer Name vom Login
$username = $_SESSION['username'];
//Abfrage der Rechte
$authorization = $_SESSION['authorization'];

?>

<?php
//include connection to database
include "mvc/model/db_connect_model.php";
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include "meta.php"; ?>
    <?php include "lib/elements/imports.php"; ?>
</head>

<body>

<?php
//include navigation
include 'lib/elements/navigation.php';
?>


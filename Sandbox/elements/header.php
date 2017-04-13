<?php
session_start();
if(!isset($_SESSION['username'])) {
    die('Bitte zuerst <a href="index.php">einloggen</a>');
}

//Abfrage der Nutzer ID vom Login
$userid = $_SESSION['userid'];
//Abfrage der Nutzer Name vom Login
$username = $_SESSION['username'];

echo "Hallo User {$userid}: ".$username;
?>

<?php
header('Content-Type: text/html; charset=utf-8');
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Salim Oussayfi">
        <meta name="description" content="Praxis-Projekt Beuth-Hochschule/Medieninformatik B.Sc.">

        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Rosetta-App</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <!--Autocomplete-->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>


        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>



        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/css/bootstrap.min.css"
              rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js"></script>
        <link href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css"
              rel="stylesheet" type="text/css" />
        <!--<script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"
                type="text/javascript"></script>-->
        <!--bootstrap-multiselect lokal-->
        <script src="lib/bootstrap-multiselect.js" type="text/javascript"></script>

        <!-- Bootstrap -->
        <link href="https://slimou.de/___Bootstrap/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/layout.css" rel="stylesheet">

        <script src="js/script.js"></script>

        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->




    </head>
    <body>
        <?php
        //include navigation
        include 'elements/navigation.php';
        ?>
        <div class="container-fluid content">
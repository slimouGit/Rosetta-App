<?php
include 'includes/db_connect.php';
include 'includes/input_check.php';
include 'includes/db_insert.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Rosetta-App</title>
    <meta charset="utf-8"/>
    <meta name="author" content="Salim Oussayfi">
    <meta name="description" content="Requirements Engineering Praxis-Semester">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap-->
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://slimou.de/___Bootstrap/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Import-->
    <link rel="stylesheet" href="css/layout.css">-->

    <!-- Import fuer JQery Animation fuer Eingabefelder -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!--JQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</head>
<body>
<a href="" id="home"></a>
<div class="container-fluid" id="content">

    <!--------------------------------------------------------------------------------------->
    <!--navbar-->

    <header>

    </header>

    <!--------------------------------------------------------------------------------------->

    <!--------------------------------------------------------------------------------------->
    <!--navtab-->
    <div class="row partition" id="navtab">
        <ul class="nav nav-tabs">
            <li class="active" id="formularItem"><a href="#" id="formularText">Formular ausblenden</a></li>
        </ul>
    </div>
    <!--------------------------------------------------------------------------------------->

    <!--------------------------------------------------------------------------------------->
    <!--formular-->

    <div class="row partition">
        <?php
            include 'views/formular.php';
        ?>
    </div>
    <!--------------------------------------------------------------------------------------->

    <div id="views">

    <!--pageHeader-->

    <div class="row partition">
        <div class="page-header">
            <h1>Requirements <small>Rosetta-App</small></h1>
        </div>
    </div>


    <!--------------------------------------------------------------------------------------->
    <!--table-->

    <div class="row partition">
        <?php
        include 'views/tabelle.php';
        ?>
    </div>
    <!--------------------------------------------------------------------------------------->

    </div>

    <!--------------------------------------------------------------------------------------->
    <!--footer-->

    <footer>
        <a href="#home"><img src="img/home-arrow.png"></a>
    </footer>

    <!--------------------------------------------------------------------------------------->

</div>


</body>
<!---->
<script src="js/liability.js"></script>
<script src="js/animate.js"></script>
</html>

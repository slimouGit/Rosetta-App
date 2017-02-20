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

    <!-- CSS Import
    <link rel="stylesheet" href="css/stylesheet.css">

    <!-- Import fuer JQery Animation fuer Eingabefelder -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!--JQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <style>
        body{margin:0px;padding:0px;}
        header {position:fixed;left:0px;top:0px;width:100%;height:45px;z-index:2000;background-color:#000;color:#fff;padding:10px 0px;text-transform: uppercase;box-shadow: 0px 2px 5px #888888;}
        footer {position:fixed;left:0px;bottom:0px;width:100%;height:45px;z-index:99;background-color:#000;color:#fff;padding:10px 0px;text-transform: uppercase;box-shadow: 0px -2px 5px #888888;}
        #content{padding-bottom:50px;}

        #navtab{position:relative;top:50px;z-index:1000;}
        #formular{position:relative;left:0px;top:50px;height:100%;}

        .error{color:red;}
        .btn-primary {
            color: #fff;
            background-color: #000;
            border-color: #000;
        }
        .btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .open>.dropdown-toggle.btn-primary {
            color: #fff;
            background-color: #ccc;
            border-color: #000;
        }
        .partition{
            padding:0px 10px;margin:10px 0px 10px 0px;
        }
        #views{
            position: relative;
            top:10px;
        }
    </style>

</head>
<body>
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
        <form class="form-horizontal" id="formular" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

            <!--------------------------------------------------------------------------------------->
            <!--verbidlichkeit-->

            <div class="form-group">
                <label for="select" class="col-sm-2 control-label">Verbindlichkeit</label>
                <div class="col-sm-6">
                    <label class="radio-inline">
                        <input type="radio" id="muss" name="verbindlichkeit" <?php if (isset($verbindlichkeit) && $verbindlichkeit=="muss") echo "checked";?> value="muss">muss
                    </label>
                    <label class="radio-inline">
                        <input type="radio" selected id="soll" name="verbindlichkeit" <?php if (isset($verbindlichkeit) && $verbindlichkeit=="muss") echo "checked";?> value="soll">soll
                    </label>
                    <label class="radio-inline">
                        <input type="radio" id="kann" name="verbindlichkeit" <?php if (isset($verbindlichkeit) && $verbindlichkeit=="muss") echo "checked";?> value="kann">kann
                    </label>
                    <label class="radio-inline">
                        <input type="radio" id="wird" name="verbindlichkeit" <?php if (isset($verbindlichkeit) && $verbindlichkeit=="muss") echo "checked";?> value="wird">wird
                    </label>
                </div>
                <div class="col-sm-4 errorContainer">
                    <span class="error"><?php echo $verbindlichkeit_Err;?></span>
                </div>
            </div>

            <!--------------------------------------------------------------------------------------->
            <!--author-->

            <div class="form-group">
                <label for="select" class="col-sm-2 control-label">Author</label>
                <div class="col-sm-6">
                    <select name="author" class="form-control">
                        <option value="" selected="selected">bitte wählen</option>
                        <option value="Claudia">Claudia</option>
                        <option value="Salim">Salim</option>
                        <option value="Thomas">Thomas</option>
                    </select>
                </div>
                <div class="col-sm-4 errorContainer">
                    <span class="error"><?php echo $author_Err;?></span>
                </div>
            </div>

            <!--------------------------------------------------------------------------------------->
            <!--titel-->

            <div class="form-group">
                <label for="titel" class="col-sm-2 control-label">Titel</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="titel" value="<?php echo $titel;?>">
                </div>
                <div class="col-sm-4 errorContainer">
                    <span class="error"><?php echo $titel_Err;?></span>
                </div>
            </div>

            <!--------------------------------------------------------------------------------------->
            <!--beschreibung-->

            <div class="form-group">
                <label for="beschreibung" class="col-sm-2 control-label">Beschreibung</label>
                <div class="col-sm-6">
                    <textarea class="form-control" rows="5" name="beschreibung" value="<?php echo $beschreibung;?>"></textarea>
                </div>
                <div class="col-sm-4 errorContainer">
                    <span class="error"><?php echo $beschreibung_Err;?></span>
                </div>
            </div>

            <!--------------------------------------------------------------------------------------->
            <!--submit-->

            <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" value="eintragen" name="submit">Submit</button>
                </div>
            </div>

            <!--------------------------------------------------------------------------------------->

        </form>
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
        <table class="table table-hover table-responsive" id="tabelle">
            <thead>
            <tr>
                <th class="col-sm-1">Verbidlichkeit</th>
                <th class="col-sm-1">ID</th>
                <th class="col-sm-1">Datum/Uhrzeit</th>
                <th class="col-sm-1">Author</th>
                <th class="col-sm-2">Titel</th>
                <th class="col-sm-6">Beschreibung</th>
            </tr>
            </thead>

            <tbody>
            <!--include data-->
                <?php
                    include 'includes/db_output.php';
                ?>
            </tbody>
        </table>
    </div>
    <!--------------------------------------------------------------------------------------->

    </div>

    <!--------------------------------------------------------------------------------------->
    <!--footer-->

    <footer>

    </footer>

    <!--------------------------------------------------------------------------------------->

</div>


</body>
<!---->
<script src="js/liability.js"></script>
<script src="js/animate.js"></script>
</html>

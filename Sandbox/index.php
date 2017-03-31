<?php
/* Vor Beenden der Session wieder aufnehmen */
session_start();

/* Beenden der Session */
session_destroy();
$_SESSION = array();
?>
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
<div class='row'>
    <h3>Login-Seite</h3>
</div>
<form action="check_login.php" method="post">


<div class="row">
    <div class="form-group">
        <label class="col-sm-1 control-label">Name</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="n" /></input>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group">
        <label class="col-sm-1 control-label">Passwort</label>
        <div class="col-sm-4">
            <input type="password" class="form-control" name="p" /></input>
        </div>
    </div>
</div>

<div class="row button">
    <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-1">
            <input type="submit" class="btn btn-primary" value="Login"></input>
        </div>
    </div>
</div>

</form>
</div>
</body>
</html>

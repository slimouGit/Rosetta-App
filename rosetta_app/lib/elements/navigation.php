<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-exmple-navbar-collapse-1" >
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Rosetta-App</a>
        </div>


        <?php if(isset($_SESSION['username'])) { ?>


        <div class="collapse navbar-collapse navbar-left" id="bs-exmple-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="search_item.php">Suchen</a></li>
                <li><a href="insert_item.php"">Erstellen</a></li>
                <li><a href="upload_pdf.php">PDF hochladen</a></li>
                <li><a href="upload_xml.php">XML hochladen</a></li>


                <?php
                    if(empty($authorization)){$authorization="user";}
                    if($authorization=="admin"){
                ?>


                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administration
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="register_user.php">Nutzer registrieren</a></li>
                        <li><a href="user_complete.php">Benutzer verwalten</a></li>
                        <li><a href="data_complete.php">Daten gesamt</a></li>
                        <li><a href="deleted_items.php">Daten gelöscht</a></li>
                    </ul>
                </li>


                <?php } ?> <!-- ENDE if($authorization=="admin") -->


                <li><a href="logout.php">logout</a></li>
                <li><a href="change_pwd.php">Passwort ändern</a></li>
            </ul>
        </div>


        <?php } ?> <!-- ENDE if(isset($_SESSION['username'])) -->


    </div>
</nav>



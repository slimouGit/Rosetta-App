<?php
//include header
include "lib/elements/header.php";
?>

    <div class="container-fluid content">

    <div class="container">

    <!-------------------------------------------------------------->

    <div class='row'>
        <h1>Rosetta-App search data</h1>
    </div>

    <!------------------------------------------------------------->

    <div class='row'>
        <div class="formWrapper col-lg-8">
            <div class="formField">
                <form action="?search_item=1" method = "post">
                    <div class="col-sm-6 ui-widget">
                        <input type="text" class="form-control" id="skills" name="search" value="<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>" placeholder="Suchbegriff">
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-1">
                                <input type="submit" class="btn btn-primary" value="Suchen">
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <!------------------------------------------------------------->

    <div class="container">
        <div class='row'>
            <?php

            //CONTROLLER
            if(isset($_GET['search_item'])) {
                $error = false;
                if (strlen($_POST['search']) == 0) {
                    echo 'Bitte einen Suchbegriff eingeben<br>';
                    $error = true;
                }
                if (!$error) {
                    //$cat wir mit Spalten definiert, in denen gesucht werden soll
                    //der Eintrag muss auf 'active' gesetzt sein
                    $cat = 'item_de, item_fr, item_it, category, info, carline';
                    $res = $pdo->query("SELECT * FROM rosetta_data WHERE CONCAT_WS('',$cat) LIKE '%" . $_POST['search'] . "%' AND state LIKE 'active'");

                    //pruefen, ob Suche ein Resultat ergibt
                    $count = $res->rowCount();
                    if ($count == 0) {

                        //Meldung wird ausgegeben
                        require_once "mvc/view/responseObject_view.class.php";
                        $response = new responseObject();
                        $response->response("Kein Ergebnis für {$_POST['search']} verfügbar","6","responseFalse");

                    } else {
                        require "mvc/view/table_items_view.class.php";
                        table_items::showData();
                    }
                }
            }
            ?>

        </div>
    </div>

    <!------------------------------------------------------------->

<?php
//include header
include "lib/elements/footer.php";
?>
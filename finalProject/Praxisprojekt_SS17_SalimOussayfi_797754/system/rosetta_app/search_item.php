<?php
//include header
include "lib/elements/header.php";
?>

    <div class="container-fluid content">

    <div class="container">

    <!-------------------------------------------------------------->

    <div class='row'>
        <h1>Rosetta-App Suche</h1>
    </div>

    <!------------------------------------------------------------->

    <div class='row'>
        <div class="formWrapper col-lg-8 ">
            <div class="formField">
                <form action="?search_item=1" method = "post">

                    <!--Inputfeld zur Suche hier nicht uber Klasse implementiert-->
                    <div class="row formMarginBottom">
                    <div class="col-sm-2 control-label">Suchbegriff</div>
                    <div class="col-sm-8 ui-widget">
                        <input type="text" class="form-control" id="skills" name="search" value="<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>" placeholder="Suchbegriff">
                    </div>
                    </div>


                    <div class="row formMarginBottom">
                        <div class="col-sm-2 control-label">suchen in</div>
                        <div class="col-sm-8">
                            <?php
                                //ueber die Checkboxen kann die Suche eingeschraenkt werden
                                require_once "mvc/view/formularFields_view.class.php";
                                $form = new formular();

                                $form->checkboxFiltering("item_de", "Deutsch");
                                $form->checkboxFiltering("item_fr", "Französisch");
                                $form->checkboxFiltering("item_it", "Italienisch");
                                $form->checkboxFiltering("category", "Rubrik");
                                $form->checkboxFiltering("info", "Info");
                                $form->checkboxFiltering("carline", "Carline");
                            ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2 control-label"></div>
                        <div class="form-group">
                            <div class="col-sm-1">
                                <input type="submit" class="btn btn-primary" value="suchen">
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



            //Meldung wird ausgegeben
            require_once "mvc/view/responseObject_view.class.php";
            $response = new responseObject();

            if(isset($_GET['search_item'])) {
                $error = false;

                if (strlen($_POST['search']) == 0) {

                    $response->response("Bitte einen Suchbegriff eingeben","6","responseFalse");

                    $error = true;
                }
                if (!$error) {

                    $tempItem = $_POST['search'];

                    //Pruefung, ob checkboxen ausgewaehlt wurden
                    if(!empty($_POST['searchCategory'])) {
                        //das Array carline wird ueber implode in $car gespeichert
                        $cat = implode(',  ', $_POST['searchCategory']);
                    }
                    //falls keine checkbox aktiv, wird in allen Spalten gesucht
                    if(empty($_POST['searchCategory'])) {
                       $cat = 'item_de, item_fr, item_it, category, info, carline';
                    }

                    require "mvc/model/select_data_model.class.php";
                    select_data::select_searchedData($cat, $tempItem);

                    //pruefen, ob Suche ein Resultat ergibt
                    $count = $res->rowCount();

                    if ($count == 0) {

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
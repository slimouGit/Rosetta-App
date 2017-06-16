<?php
//include header
include "lib/elements/header.php";
?>

    <div class="container-fluid content">

        <div class="container">
            <div class='row'>
                <h1>Rosetta-Data Daten eintragen</h1>
            </div>

            <!------------------------------------------------------------->

            <div class='row'>
                <div class="formWrapper col-lg-8">
                    <div class="formField">
                        <form action="?insert_item=1" method = "post">

                            <?php
                            // EINBINDEN PHP-Klasse mit Formlar-Objekten
                            require_once "mvc/view/formularFields_view.class.php";

                            // Objekt erzeugen
                            $form = new formular();
                            $form->textareaField("Deutsch", "item_de", "",2,  8);
                            $form->textareaField("Französisch", "item_fr", "",2,  8);
                            $form->textareaField("Italienisch", "item_it", "",2,  8);
                            $form->inputField("Rubrik", "category", "", "", "", 2,  8);
                            $form->inputField("Info", "info", "", "", "", 2,  8);

                            $form->selectStart("Carline");
                            $form->checkBox("ADAM");
                            $form->checkBox("Ampera");
                            $form->checkBox("Antara");
                            $form->checkBox("AstraST");
                            $form->checkBox("AstraNG");
                            $form->checkBox("Cascada");
                            $form->checkBox("ComboKastenwagen");
                            $form->checkBox("ComboPassenger");
                            $form->checkBox("Corsa");
                            $form->checkBox("Crossland");
                            $form->checkBox("GTC_OPC");
                            $form->checkBox("InsigniaGS");
                            $form->checkBox("InsigniaST");
                            $form->checkBox("KARL");
                            $form->checkBox("Meriva");
                            $form->checkBox("MokkaX");
                            $form->checkBox("MovanoCombiBus");
                            $form->checkBox("MovanoFahrgestell");
                            $form->checkBox("MovanoVan");
                            $form->checkBox("Zafira");

                            $form->selectFinish();

                            $form->submitButton("2","senden");
                            ?>
                        </form>
                    </div>
                </div>
            </div>

        <!------------------------------------------------------------->

        <div class="container">
            <div class='row'>
                <?php

                //CONTROLLER
                if(isset($_GET['insert_item'])) {

                    //Erstellen eines einzigartigen tokens dient dazu, wenn der letzte eingetragene Datensatz angezeigt wird
                    //da hier noch nicht mit der ID gearbeitet werden kann
                    $token = bin2hex(openssl_random_pseudo_bytes(16));
                    $token = (string)$token;
                    //------------------------------------------------------------------------------------------

                    $item_de = $_POST['item_de'];
                    $item_fr = $_POST['item_fr'];
                    $item_it = $_POST['item_it'];
                    $category = $_POST['category'];
                    $info = $_POST['info'];

                    //------------------------------------------------------------------------------------------

                    //Pruefung, ob checkboxen ausgewaehlt wurden
                    if(!empty($_POST['carline'])) {
                        //das Array carline wird ueber implode in $car gespeichert
                        $car = implode(', ', $_POST['carline']);
                    }
                    //falls keine Carline genannt wurde, wird die Variable mit General belegt
                    if(empty($car)) {
                        $car = 'General';
                    }
                    //------------------------------------------------------------------------------------------

                    //Daten eintragen ueber Controller insert_item
                    require "mvc/model/insert_item_model.class.php";
                    insert_item::insertData($token,$item_de,$item_fr,$item_it,$category,$info,$car,$username);

                    //------------------------------------------------------------------------------------------

                }
                ?>
            </div>
        </div>


        <!------------------------------------------------------------->

    </div><!--ENDE container-fluid content-->

<?php
//include header
include "lib/elements/footer.php";
?>


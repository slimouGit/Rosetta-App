<?php

//include header
include "lib/elements/header.php";
?>


    <div class="container-fluid content">

    <div class="container">

        <!------------------------------------------------------------->

        <div class='row'>
            <h1>Rosetta-App Daten bearbeiten</h1>
        </div>

        <!------------------------------------------------------------->

            <?php

            $hideForm ="";

            //CONTROLLER
            if(empty($_GET["data_id"])){
                $_GET["data_id"] = $_POST['data_id'];
                $hideForm = "true";
            };

            //------------------------------------------------------------------------------------------

            //CONTROLLER
            if(!$hideForm=="true") {

            //------------------------------------------------------------------------------------------

            //
            $tempId = $_GET["data_id"];

            //------------------------------------------------------------------------------------------

            //Daten ausgeben ueber Klasse select_data_model.class.php
            require "mvc/model/select_data_model.class.php";
            select_data::select_specificDB("rosetta_data", "data_id", $tempId);


            //------------------------------------------------------------------------------------------

            foreach ($res AS $row):

                //$carline mit Werten aus carline-array belegen zum pruefen in der Klasse formularFields, ob Index im Array vorhanden ist
                $carline =  $row['carline'];
                $carline = array_map('trim', explode(", ", $row['carline']));

            ?>

            <div class='row'>
                <div class="formField">

                    <form action="?change_item=1" method = "post">

                        <?php

                        require_once "mvc/view/formularFields_view.class.php";

                            $form = new formular();

                            $form->hiddenField("data_id", "" . $row["data_id"] . "");
                            $form->textareaField("Deutsch", "item_de", "" . $row["item_de"] . "",2,  8);
                            $form->textareaField("Französisch", "item_fr", "" . $row["item_fr"] . "",2,  8);
                            $form->textareaField("Italienisch", "item_it", "" . $row["item_it"] . "",2,  8);
                            $form->inputField("Rubrik", "category", "" . $row["category"] . "", "", "", 2,  8);
                            $form->inputField("Info", "info", "" . $row["info"] . "", "", "", 2,  8);

                            $form->selectStart("Carline");


                            $form->carlineCheck("ADAM", $carline);
                            $form->carlineCheck("Ampera", $carline);
                            $form->carlineCheck("Antara", $carline);
                            $form->carlineCheck("AstraST", $carline);
                            $form->carlineCheck("AstraNG", $carline);
                            $form->carlineCheck("Cascada", $carline);
                            $form->carlineCheck("ComboKastenwagen", $carline);
                            $form->carlineCheck("ComboPassenger", $carline);
                            $form->carlineCheck("Corsa", $carline);
                            $form->carlineCheck("Crossland", $carline);
                            $form->carlineCheck("GTC_OPC", $carline);
                            $form->carlineCheck("InsigniaGS", $carline);
                            $form->carlineCheck("InsigniaST", $carline);
                            $form->carlineCheck("KARL", $carline);
                            $form->carlineCheck("Meriva", $carline);
                            $form->carlineCheck("MokkaX", $carline);
                            $form->carlineCheck("MovanoCombiBus", $carline);
                            $form->carlineCheck("MovanoFahrgestell", $carline);
                            $form->carlineCheck("MovanoVan", $carline);
                            $form->carlineCheck("Zafira", $carline);

                            $form->selectFinish();

                            $form->submitButton("2","Ändern");
                        ?>
                    </form>
                </div>
            </div>
            <?php
                endforeach;
                }//Ende if(!$hideForm=="true")
            ?>


    <div class="container">
        <div class='row'>
            <?php
            //CONTROLLER
            if(isset($_GET['change_item'])) {
                $submitted = "true";
                $data_id = $_POST['data_id'];

                //------------------------------------------------------------------------------------------

                //CONTROLLER
                //Pruefung, ob checkboxen ausgewaehlt wurden
                if(!empty($_POST['carline'])) {$car = implode(', ', $_POST['carline']);}
                //das Array carline wird ueber implode in $car gespeichert
                if(empty($car)) {$car = 'General';}

                //------------------------------------------------------------------------------------------

                $item_de = $_POST['item_de'];
                $item_fr = $_POST['item_fr'];
                $item_it = $_POST['item_it'];
                $category = $_POST['category'];
                $info = $_POST['info'];

                //------------------------------------------------------------------------------------------

                //Daten aendern ueber Controller edit_item
                require "mvc/model/edit_item_model.class.php";
                edit_item::editData($item_de,$item_fr,$item_it,$category,$info,$car,$username,$data_id);

                //------------------------------------------------------------------------------------------

            }
            ?>
        </div>
    </div>


<?php
//include header
include "lib/elements/footer.php";
?>
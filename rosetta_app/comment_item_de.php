<?php
//include header
include "lib/elements/header.php";
?>

    <div class="container-fluid content">

        <div class="container">
            <div class='row'>
                <h1>Rosetta-App Kommentar</h1>
            </div>

            <div class='row'>
                <?php

                $hideForm ="";

                if(empty($_GET["data_id"])){
                    $_GET["data_id"] = $_POST['data_id'];
                    $hideForm = "true";
                };

                //------------------------------------------------------------------------------------------

                //
                $tempId = $_GET["data_id"];

                //------------------------------------------------------------------------------------------

                //Daten ausgeben ueber Klasse select_data.class.php
                require "mvc/model/select_data.class.php";
                select_data::select_specificDB("rosetta_data", "data_id", $tempId);

                //------------------------------------------------------------------------------------------

                foreach ($res AS $row):
                    ?>

                    <form action="?change_item=1" method = "post">

                        <?php

                        require_once "mvc/view/formularFields_view.class.php";

                        if(!$hideForm=="true"){

                            $form = new formular();

                            $form->hiddenField("data_id", "" . $row["data_id"] . "");
                            $form->labelField($row["item_de"]);
                            $form->inputField("Kommentar", "item_de_comment", "" . $row["item_de_comment"] . "", "", "", 2,  8);

                            $form->submitButton("2","Kommentieren");
                        }
                        ?>
                    </form>
                    <?php
                endforeach;
                ?>
            </div>
        </div>

        <div class="container">
            <div class='row'>
                <?php

                if(isset($_GET['change_item'])) {
                    $submitted = "true";
                    $data_id = $_POST['data_id'];

                    //------------------------------------------------------------------------------------------

                    $item_de_comment = $_POST['item_de_comment'];

                    //------------------------------------------------------------------------------------------

                    $currentDate = date('d.m.Y H:i');

                    //------------------------------------------------------------------------------------------

                    //Daten aendern ueber Controller edit_item
                    require "mvc/model/comment_item.class.php";
                    comment_item::comment_item_de($item_de_comment,$data_id,$username,$currentDate);

                    //------------------------------------------------------------------------------------------

                }
                ?>
            </div>
    </div>


<?php
//include header
include "lib/elements/footer.php";
?>
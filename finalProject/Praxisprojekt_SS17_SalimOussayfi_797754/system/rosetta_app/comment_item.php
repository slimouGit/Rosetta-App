<?php
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

            if(empty($_GET["language"])){
                $_GET["language"] = $_POST['language'];
                $hideForm = "true";
            };

            //------------------------------------------------------------------------------------------

            $tempId = $_GET["data_id"];

            $language = $_GET["language"];

            $item_language = "item_{$language}";
            $item_language_comment = "{$item_language}_comment";

            //------------------------------------------------------------------------------------------

            //Daten ausgeben ueber Klasse select_data_model.class.php
            require "mvc/model/select_data_model.class.php";
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
                        $form->hiddenField("language", "" . $language . "");
                        $form->labelField($row[$item_language]);
                        $form->inputField("Kommentar", $item_language_comment, "" . $row[$item_language_comment] . "", "", "", 2,  8);

                        $form->submitButton("2","kommentieren");
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

                $item_language_comment = $_POST[$item_language_comment];

                $language = $_POST['language'];

                //------------------------------------------------------------------------------------------

                $currentDate = date('d.m.Y H:i');

                //------------------------------------------------------------------------------------------

                //Daten aendern ueber Controller edit_item
                require "mvc/model/comment_item_model.class.php";
                comment_item::comment_generel_item($language, $item_language_comment,$data_id,$username,$currentDate);

                //------------------------------------------------------------------------------------------

            }
            ?>
        </div>
    </div>


<?php
include "lib/elements/footer.php";
?>


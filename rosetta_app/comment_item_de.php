<?php
//include header
include "lib/elements/header.php";
?>




    <div class="container-fluid content">


    <div class="container">
        <div class='row'>
            <h1>Rosetta-Data comment data</h1>
        </div>

        <div class='row'>
            <?php

            $hideForm ="";

            //
            if(empty($_GET["data_id"])){
                $_GET["data_id"] = $_POST['data_id'];
                $hideForm = "true";
            };

            //------------------------------------------------------------------------------------------

            //
            $tempId = $_GET["data_id"];

            //------------------------------------------------------------------------------------------

            $res = $pdo->query("SELECT * FROM rosetta_data WHERE data_id LIKE $tempId");

            foreach ($res AS $row):
                ?>

                <form action="?change_item=1" method = "post">

                    <?php

                    require_once "mc/model/formularFields.class.php";

                    if(!$hideForm=="true"){

                        $form = new formular();

                        $form->hiddenField("data_id", "" . $row["data_id"] . "");
                        $form->labelField($row["item_de"]);
                        $form->inputField("Kommentar", "item_de_comment", "" . $row["item_de_comment"] . "", "", "");

                        $form->submitButton("Kommentieren");
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

                //Kommentar wird aktualisiert
                $res = $pdo->prepare("UPDATE rosetta_data SET item_de_comment = :item_de_comment, user_de_comment = :user_de_comment, date_de_comment = :date_de_comment WHERE data_id = :data_id");
                $result = $res->execute(array('item_de_comment' => $item_de_comment,  'data_id'=> $data_id, 'user_de_comment'=> $username, 'date_de_comment' => $currentDate ));

                //------------------------------------------------------------------------------------------

                //Meldung wird ausgegeben
                require_once "mc/model/responseObject.class.php";
                $response = new responseText();
                $response->success("Der Eintrag mit der ID {$tempId} wurde erfolgreich kommentiert");

                //------------------------------------------------------------------------------------------

                //aktualisierter Datensatz wird ausgegeben
                $res = $pdo->query("SELECT * FROM rosetta_data WHERE data_id LIKE $data_id");
                require "mc/model/table_items.class.php";
                table_items::showData();

                //------------------------------------------------------------------------------------------

            }
            ?>
        </div>
    </div>


<?php
//include header
include "lib/elements/footer.php";
?>
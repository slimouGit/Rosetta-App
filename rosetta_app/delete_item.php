<?php
//include header
include "lib/elements/header.php";
?>

<?php
//include connection to database
include "mc/controller/db_connect.php";
?>

<?php
//include navigation
include 'lib/elements/navigation.php';
?>

<?php
$hideForm ="";

//
if(empty($_GET["data_id"])){
    $_GET["data_id"] = $_POST['data_id'];
    $hideForm = "true";
};

?>

    <div class="container-fluid content">

        <div class="container">

            <div class='row'>

                <h1>Rosetta-Data delete data</h1>
            </div>
            <div>
                <p>Soll dieser Datensatz wirklich gelöscht werden?</p>
            </div>
        <form action="?delete_item=1" method = "post">

            <?php
                require_once "mc/model/formularFields.class.php";

                if(!$hideForm=="true") {
                    $form = new formular();
                    $form->hiddenField("data_id", "" . $_GET["data_id"] . "");
                    $form->submitButton("0","endgültig löschen");
                }
            ?>
        </form>
    </div>
    </div>

    <div class="container">

        <div class='row'>
            <?php

            $tempId = $_GET["data_id"];

            $res = $pdo->query("SELECT * FROM rosetta_data WHERE data_id LIKE $tempId");

            if(!$hideForm=="true") {
                require "mc/model/table_items.class.php";
                table_items::showData();
            }

             if(isset($_GET['delete_item'])) {

                $currentDate = date('d.m.Y H:i');

                $res = $pdo->prepare("UPDATE rosetta_data SET state = :state_neu, user_delete = :user_delete, date_delete = :date_delete WHERE data_id = $tempId");
                $res->execute(array('state_neu' => 'deleted', 'user_delete' => $username, 'date_delete' => $currentDate));

                //------------------------------------------------------------------------------------------

                //Meldung wird ausgegeben
                require_once "mc/model/responseObject.class.php";
                $response = new responseObject();
                $response->success("Der Eintrag mit der ID {$tempId} wurde erfolgreich gelöscht");

                //------------------------------------------------------------------------------------------
            }

            ?>
        </div>
    </div>

<?php
//include header
include "lib/elements/footer.php";
?>
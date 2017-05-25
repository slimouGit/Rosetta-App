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

        <form action="?delete_item=1" method = "post">

            <?php
                require_once "mc/model/formularFields.class.php";

                if(!$hideForm=="true") {
                    $form = new formular();
                    $form->hiddenField("data_id", "" . $_GET["data_id"] . "");
                    $form->submitButton("endgültig löschen");
                }
            ?>
        </form>
    </div>
    </div>

    <div class="container">

        <div class='row'>
            <?php

            $tempId = $_GET["data_id"];
            echo "id: ". $tempId;
            $res = $pdo->query("SELECT * FROM rosetta_data WHERE data_id LIKE $tempId");

            if(!$hideForm=="true") {
                require "mc/model/table_items.class.php";
                table_items::showData();
            }

             if(isset($_GET['delete_item'])) {
                echo "<br/><br/>{$tempId} kommt an";

                 $res = $pdo->prepare("UPDATE rosetta_data SET state = :state_neu, user_delete = :user_delete WHERE data_id = $tempId");
                 $res->execute(array('state_neu' => 'deleted', 'user_delete' => $username));

                 echo "<br/><br/>{$tempId} wurde gelöscht";
            }

            ?>
        </div>
    </div>

<?php
//include header
include "lib/elements/footer.php";
?>
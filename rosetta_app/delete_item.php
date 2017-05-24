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

    <div class="container-fluid content">

    <div class="container">

        <div class='row'>
            <h1>Rosetta-Data delete data</h1>
        </div>

        <div class='row'>
            <?php

            $tempId = $_GET["data_id"];
            echo "id: ". $tempId;
            $res = $pdo->query("SELECT * FROM rosetta_data WHERE data_id LIKE $tempId");

            require "mc/model/table_items.class.php";
            table_items::showData();

            require "mc/model/deactivate_item.class.php";
            deactivate_item::deleteItem($tempId);

            ?>
        </div>
    </div>

<?php
//include header
include "lib/elements/footer.php";
?>
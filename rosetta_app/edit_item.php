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
            <h1>Rosetta-Data edit data</h1>
        </div>

        <div class='row'>
            <?php

            $tempId = $_GET["data_id"];

            $res = $pdo->query("SELECT * FROM rosetta_data WHERE data_id LIKE $tempId");

                require "mc/model/change_item.class.php";
                change_item::editItem($tempId);

            ?>
        </div>
    </div>


<?php
//include header
include "lib/elements/footer.php";
?>
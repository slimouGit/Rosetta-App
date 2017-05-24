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
            <form action="?deleteItem=1" method = "post">
                <div class="row">
                    <div class="form-group">
                        <div class="col-sm-1">
                            <input type="submit" class="btn btn-primary" value="Abschicken">
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class='row'>
            <?php

            $tempId = $_GET["data_id"];
            echo "id: ". $tempId;
            $res = $pdo->query("SELECT * FROM rosetta_data WHERE data_id LIKE $tempId");

            require "mc/model/deactivate_item.class.php";
            deactivate_item::deleteItem($tempId);

            ?>
        </div>
    </div>

<?php
if(isset($_GET['deleteItem'])) {
    echo "Klappt";
}
?>

<?php
//include header
include "lib/elements/footer.php";
?>
<?php
//include header
include "lib/elements/header.php";
?>


<div class="container-fluid content">

    <div class="container">
        <div class='row'>
            <h1>Rosetta-App deleted data</h1>
            <?php
            $res = $pdo->query("SELECT * FROM `rosetta_data`");
            require "mc/model/table_items.class.php";
            table_items::showDeletedData();
            ?>
        </div>
    </div>


<?php
//include header
include "lib/elements/footer.php";
?>

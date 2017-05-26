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
            <h1>Rosetta-App complete data</h1>
            <?php
            $res = $pdo->query("SELECT * FROM `rosetta_data`");
            require "mc/model/table_items.class.php";
            table_items::showData();
            ?>
        </div>
    </div>


<?php
//include header
include "lib/elements/footer.php";
?>

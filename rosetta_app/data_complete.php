<?php
//include header
include "lib/elements/header.php";
?>

<div class="container-fluid content">

    <!------------------------------------------------------------->

    <div class="container">
        <div class='row'>
            <h1>Rosetta-App gesamte Daten</h1>
            <?php
            $res = $pdo->query("SELECT * FROM `rosetta_data`");
            require "mvc/view/table_items_view.class.php";
            table_items::showData();
            ?>
        </div>
    </div>

    <!------------------------------------------------------------->

</div>

<?php
//include header
include "lib/elements/footer.php";
?>

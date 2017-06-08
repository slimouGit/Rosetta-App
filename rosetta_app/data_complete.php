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

            //------------------------------------------------------------------------------------------

            //
            require "mvc/model/select_data.class.php"   ;
            select_data::select_completeDB("rosetta_data");

            //------------------------------------------------------------------------------------------

            //
            require "mvc/view/table_items_view.class.php";
            table_items::showData();

            //------------------------------------------------------------------------------------------

            ?>
        </div>
    </div>

    <!------------------------------------------------------------->

</div>

<?php
//include header
include "lib/elements/footer.php";
?>

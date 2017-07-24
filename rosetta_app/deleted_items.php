<?php
include "lib/elements/header.php";
?>


<div class="container-fluid content">

    <div class="container">
        <div class='row'>
            <h1>Rosetta-App gelöschte Daten</h1>
            <?php
            //------------------------------------------------------------------------------------------

            require "mvc/model/select_data_model.class.php";
            select_data::select_completeDB("rosetta_data");

            //------------------------------------------------------------------------------------------
            require "mvc/view/table_items_view.class.php";
            table_items::showDeletedData();
            ?>
        </div>
    </div>


<?php
include "lib/elements/footer.php";
?>

<?php
//include header
include "lib/elements/header.php";
?>


    <div class="container-fluid content">

    <div class="container">
        <div class='row'>
            <h1>Rosetta-App Nutzer-Daten</h1>
            <?php
            //------------------------------------------------------------------------------------------

            require "mvc/model/select_data_model.class.php";
            select_data::select_completeDB("rosetta_users");

            //------------------------------------------------------------------------------------------
            require "mvc/view/table_user_view.class.php";
            table_user::showUser();
            ?>
        </div>
    </div>

<?php
//include header
include "lib/elements/footer.php";
?>
<?php
//include header
include "lib/elements/header.php";
?>

<?php
//include connection to database
include "mc/controller/db_connect.php";
?>

    <div class="container">
        <div class='row'>
            <h1>Rosetta-Data complete</h1>
            <?php
            //include table_items
            include "mc/model/table_user.php";
            ?>
        </div>
    </div>

<?php
//include header
include "lib/elements/footer.php";
?>
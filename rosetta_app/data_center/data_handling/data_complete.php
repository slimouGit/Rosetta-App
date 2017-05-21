<?php
//include header
include "../../lib/elements/header.php";
?>

<?php
//include connection to database
include "../../mc/controller/db_connect.php";
?>

    <div class="container">
        <div class='row'>
            <h1>Rosetta-Data complete</h1>
            <?php
            require "../../mc/model/table_items.class.php";
            table_items::showActiveData();
            ?>
        </div>
    </div>


<?php
//include header
include "../../lib/elements/footer.php";
?>

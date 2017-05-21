<?php
//include header
include "../../lib/elements/header.php";
?>

<?php
//include connection to database
include "../../mvc/controller/db_connect.php";
?>

<div class="container">
        <div class='row'>
            <h1>Rosetta-Data complete</h1>
            <?php
            //include table_items
            include "../../mvc/view/table_items.php";
            ?>
        </div>
    </div>

<?php
//include header
include "../../lib/elements/footer.php";
?>

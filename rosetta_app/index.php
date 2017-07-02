<?php
include "lib/elements/header.php";
?>


    <div class="container-fluid content">


    <div class="container">
        <div class='row'>
            <h1>Rosetta-App Dashboard</h1>
         </div>
        <div class="row">
            <?php
            include "mvc/view/dashboard_view.php";
            ?>
        </div>
    </div>

<?php
include "lib/elements/footer.php";
?>
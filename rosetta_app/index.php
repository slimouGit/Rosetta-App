<?php
//include header
include "lib/elements/header.php";
?>


    <div class="container-fluid content">


    <div class="container">
        <div class='row'>
            <h1>Rosetta-App</h1>
            <?php
            echo "Hallo " . $username;
            ?>
        </div>
        <div class="row">
            <?php
            include "mc/model/daeshboard.php";
            ?>
        </div>
    </div>

<?php
//include header
include "lib/elements/footer.php";
?>
<?php

//include header
include "lib/elements/header.php";
?>


    <div class="container-fluid content">

    <div class="container">

        <!------------------------------------------------------------->

        <div class='row'>
            <h1>Rosetta-App edit user</h1>
        </div>

        <!------------------------------------------------------------->

        <div class='row'>
            <p>Kommt an</p>

            <?php
            $tempId = $_GET["user_id"];
            echo $tempId;
            ?>
        </div>
    </div>


    </div>


<?php
//include header
include "lib/elements/footer.php";
?>
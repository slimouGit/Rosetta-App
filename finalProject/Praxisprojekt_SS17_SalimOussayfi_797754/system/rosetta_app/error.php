<?php

//include header
include "lib/elements/headerWithoutSession.php";
?>

<?php
//include db connection
include "mvc/model/db_connect_model.php";
?>

<?php
//include navigation
include 'lib/elements/navigation.php';
?>

<!------------------------------------------>

<div class="container-fluid content">

    <div class="col-lg-12">
        <div class='row'>
            <h1>Du bist noch nicht angemeldet!</h1>
            <p>Bitte zuerst <a href="../index.php">einloggen</a></p>
        </div>
    </div>

</div>

    <?php
    //include header
    include "lib/elements/footer.php";
    ?>

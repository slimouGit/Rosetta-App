<?php
include "lib/elements/headerWithoutSession.php";
include "mvc/model/db_connect_model.php";
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
    include "lib/elements/footer.php";
    ?>


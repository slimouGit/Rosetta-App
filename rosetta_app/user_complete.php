<?php
//include header
include "lib/elements/header.php";
?>


    <div class="container-fluid content">

    <div class="container">
        <div class='row'>
            <h1>Rosetta-App edit user</h1>
            <?php
            $res = $pdo->query("SELECT * FROM `rosetta_users`");
            require "mc/model/table_user.class.php";
            table_user::showUser();
            ?>
        </div>
    </div>

<?php
//include header
include "lib/elements/footer.php";
?>
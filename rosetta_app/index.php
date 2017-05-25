<?php
//include header
include "lib/elements/header.php";
?>

<?php
//include connection to database
include "mc/controller/db_connect.php";
?>

<?php
//include navigation
include 'lib/elements/navigation.php';
?>

    <div class="container-fluid content">


    <div class="container">
        <div class='row'>
            <h1>Rosetta-App</h1>
            <p>logged in as</p>
            <?php
            echo $username;
            ?>
        </div>
    </div>

<?php
//include header
include "lib/elements/footer.php";
?>
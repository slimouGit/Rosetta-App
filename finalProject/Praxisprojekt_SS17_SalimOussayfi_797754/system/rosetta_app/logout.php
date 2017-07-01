<?php
//include header
include "lib/elements/header.php";
?>
<?php
session_start();
session_destroy();

?>

<?php
//include connection to database
include "mvc/model/db_connect_model.php";
?>

<?php
//include navigation
include 'lib/elements/navigation.php';
?>

    <div class="container-fluid content">

    <div class="container">
        <div class='row'>
            <h1>Rosetta-App ausgeloggt</h1>

            <p><a href="../index.php">login</a></p>
        </div>
    </div>

<?php
//include header
include "lib/elements/footer.php";
?>
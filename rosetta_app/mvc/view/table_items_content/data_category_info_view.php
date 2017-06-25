<?php

/**
 * Created by PhpStorm.
 * User: salim
 *
 * Script stellt Inhalt der beiden Spalten Rubrik und Info dar
 */

?>

<!-- Rubrik -->
<div class="col-md-4 white col addedInfo">
    <?php
    if ($tempSearch == false || strstr($_POST['search'], $slash)) {
        echo $row["category"];
    } else {
        echo preg_replace("/" . $_POST['search'] . "/", "<span class='highlight'>" . $_POST['search'] . "</span>", $row["category"]);
    }
    ?>
</div>

<!-- Info -->
<div class="col-md-4 white col addedInfo">
    <?php
    if ($tempSearch == false || strstr($_POST['search'], $slash)) {
        echo $row["info"];
    } else {
        echo preg_replace("/" . $_POST['search'] . "/", "<span class='highlight'>" . $_POST['search'] . "</span>", $row["info"]);
    }
    ?>
</div>
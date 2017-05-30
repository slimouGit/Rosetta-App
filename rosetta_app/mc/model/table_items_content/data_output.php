

<!--Deutscher Text-->
<div class="col-md-4 col itemFieldWrapper">

    <?php
    //Konstrukt, um Datensatz mit individueller ID versehen zu koennen
    echo "<div id=\"de_$id\" class=\"itemField\">";

    if ($tempSearch == false) {
        echo $row["item_de"];
    } else {
        echo preg_replace("/" . $_POST['search'] . "/", "<span class='highlight'>" . $_POST['search'] . "</span>", $row["item_de"]);
    }
    ?>
</div>
</div>


<!--Franzoesischer Text-->
<div class="col-md-4 col itemFieldWrapper">

    <?php
    //Konstrukt, um Datensatz mit individueller ID versehen zu koennen
    echo "<div id=\"fr_$id\" class=\"itemField\">";

    if ($tempSearch == false) {
        echo $row["item_fr"];
    } else {
        echo preg_replace("/" . $_POST['search'] . "/", "<span class='highlight'>" . $_POST['search'] . "</span>", $row["item_fr"]);
    }
    ?>
</div>
</div>


<!--Italienischer Text-->
<div class="col-md-4 col itemFieldWrapper">

    <?php
    //Konstrukt, um Datensatz mit individueller ID versehen zu koennen
    echo "<div id=\"it_$id\" class=\"itemField\">";

    if ($tempSearch == false) {
        echo $row["item_it"];
    } else {
        echo preg_replace("/" . $_POST['search'] . "/", "<span class='highlight'>" . $_POST['search'] . "</span>", $row["item_it"]);
    }
    ?>
</div>
</div>
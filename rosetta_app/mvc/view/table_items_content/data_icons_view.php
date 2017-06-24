<?php

/**
 * Created by PhpStorm.
 * User: salim
 *
 * Script stellt pro Sprache die drei Icons zum Kommentieren, Filtern und Speichern in die Zwischenablage eines Datensatzes dar
 * und uebergibt jeweils die 'data_id' an das Zieldokument bzw. die JavaScript-Funktion copyToClipboard
 */

?>

<!--Icons fuer Deutsch-->
<div class="col-md-4 white col">


    <a name="comment_de" title="Eintrag kommentieren" href="comment_item.php?data_id=<?php echo $row['data_id']?>&language=<?php echo 'de'?>">
        <img src="lib/img/button_comment.png"/>
    </a>

    <a name="comment_de" title="Eintrag filtern" href="filter_item.php?item_de=<?php echo $row['item_de']?>">
        <img src="lib/img/button_search.png"/>
    </a>

    <?php echo "<img onclick=\"copyToClipboard('#de_$id')\" src=\"lib/img/button_copy.png\" class=\"editButton\">"; ?>

</div>


<!--Icons fuer Franzoesisch-->
<div class="col-md-4 white col">

    <a name="comment_fr" title="Eintrag kommentieren" href="comment_item.php?data_id=<?php echo $row['data_id']?>&language=<?php echo 'fr'?>">
         <img src="lib/img/button_comment.png"/>
    </a>

    <a name="comment_de" title="Eintrag filtern" href="filter_item.php?item_fr=<?php echo $row['item_fr']?>">
        <img src="lib/img/button_search.png"/>
    </a>

    <?php echo "<img onclick=\"copyToClipboard('#fr_$id')\" src=\"lib/img/button_copy.png\" class=\"editButton\">"; ?>

</div>


<!--Icons fuer Italienisch-->
<div class="col-md-4 white col">

    <a name="comment_it" title="Eintrag kommentieren" href="comment_item.php?data_id=<?php echo $row['data_id']?>&language=<?php echo 'it'?>">
        <img src="lib/img/button_comment.png"/>
    </a>

    <a name="comment_de" title="Eintrag filtern" href="filter_item.php?item_it=<?php echo $row['item_it']?>">
        <img src="lib/img/button_search.png"/>
    </a>

    <?php echo "<img onclick=\"copyToClipboard('#it_$id')\" src=\"lib/img/button_copy.png\" class=\"editButton\">"; ?>

</div>
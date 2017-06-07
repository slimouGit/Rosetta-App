
<!--Icons fuer Deutsch-->
<div class="col-md-4 white col">

    <a name="comment_de" title="Eintrag kommentieren" href="comment_item_de.php?data_id=<?php echo $row['data_id']?>">
        <img src="lib/img/button_comment.png"/>
    </a>

    <a name="comment_de" title="Eintrag filtern" href="filter_item.php?item_de=<?php echo $row['item_de']?>">
        <img src="lib/img/button_search.png"/>
    </a>

    <?php echo "<img onclick=\"copyToClipboard('#de_$id')\" src=\"lib/img/button_copy.png\" class=\"editButton\">"; ?>

</div>


<!--Icons fuer Franzoesisch-->
<div class="col-md-4 white col">

    <a name="comment_fr" title="Eintrag kommentieren" href="comment_item.php?data_id=<?php echo $row['data_id']?>item_fr=<?php echo $row['item_fr']?>">
        <img src="lib/img/button_comment.png"/>
    </a>

    <a name="comment_de" title="Eintrag filtern" href="filter_item.php?item_fr=<?php echo $row['item_fr']?>">
        <img src="lib/img/button_search.png"/>
    </a>

    <?php echo "<img onclick=\"copyToClipboard('#fr_$id')\" src=\"lib/img/button_copy.png\" class=\"editButton\">"; ?>

</div>


<!--Icons fuer Italienisch-->
<div class="col-md-4 white col">

    <a name="comment_it" title="Eintrag kommentieren" href="comment_item_it.php?data_id=<?php echo $row['data_id']?>">
        <img src="lib/img/button_comment.png"/>
    </a>

    <a name="comment_de" title="Eintrag filtern" href="filter_item.php?item_it=<?php echo $row['item_it']?>">
        <img src="lib/img/button_search.png"/>
    </a>

    <?php echo "<img onclick=\"copyToClipboard('#it_$id')\" src=\"lib/img/button_copy.png\" class=\"editButton\">"; ?>

</div>
<?php


class table_items
{
    public static function showData()
    {
        self::printData("active");
    }

    public static function showDeletedData()
    {
        self::printData("deleted");
    }



    function printData($temp){
        global $res;

        //---------------------------------------
        //Pruefung, ob etwas gesucht wurde
        if(empty($_POST['search'])){
            $_POST['search']="";
            $tempSearch = false;
        }else {
            $tempSearch = true;
        }
        //---------------------------------------

       ?>


        <div class="row">
            <div class="col-md-12 col itemHeader">
                <div class="row">
                    <div class="col-md-3 col"><img src="lib/img/de.jpg"/></div>
                    <div class="col-md-3 col"><img src="lib/img/fr.jpg"/></div>
                    <div class="col-md-3 col"><img src="lib/img/it.jpg"/></div>
                    <div class="col-md-1 col">Rubrik</div>
                    <div class="col-md-1 col">Info</div>
                    <div class="col-md-1 col">Edit</div>
                </div>
            </div>
        </div>



        <?php
            //$id fuer Zwischenspeicherung wird initialisiert
            $id = 0;
            foreach ($res AS $row):

            //in jeder Zeile wird $id inkrementiert
            $id++;

            //Pruefung, ob Datensatz aktiv oder geloescht wurde
            if($row["state"]==$temp) {
        ?>


                <div class="row">

                <div class="col-md-12 col itemWrapper">

                    <div class="row ">

                        <div class="col-md-9">

                            <div class="row">

                                <!--Deutscher Text-->
                                <div class="col-md-4 col itemFieldWrapper">

                                    <?php
                                    //Konstrukt, um Datensatz mit individueller ID versehen zu koennen
                                    echo "
                                    <div id=\"de_$id\" class=\"itemField\">";

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
                                    echo "
                                    <div id=\"fr_$id\" class=\"itemField\">";

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
                                    echo "
                                    <div id=\"it_$id\" class=\"itemField\">";

                                    if ($tempSearch == false) {
                                        echo $row["item_it"];
                                    } else {
                                        echo preg_replace("/" . $_POST['search'] . "/", "<span class='highlight'>" . $_POST['search'] . "</span>", $row["item_it"]);
                                    }
                                    ?>
                                    </div>
                                </div>

                            </div>

                            <!----------------------------------------------->
                            <!-- Kommentieren/Filtern/Kopieren -->
                            <div class="row editLine">

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
                                    <a name="comment_fr" title="Eintrag kommentieren" href="comment_item_fr.php?data_id=<?php echo $row['data_id']?>">
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

                            </div>

                            <!----------------------------------------------->
                            <!-- Kommentare -->
                            <div class="row">
                                <div class="col-md-4 white col comment"><?php echo $row["item_de_comment"]; ?></div>
                                <div class="col-md-4 white col comment"><?php echo $row["item_fr_comment"]; ?></div>
                                <div class="col-md-4 white col comment"><?php echo $row["item_it_comment"]; ?></div>
                            </div>

                            <!-- Kommentare User und Datum -->
                            <div class="row topLine commentInfo">
                                <div class="col-md-2 white col userComment"><?php echo $row["user_de_comment"]; ?></div>
                                <div class="col-md-2 white col dateComment"><?php echo $row["date_de_comment"]; ?></div>
                                <div class="col-md-2 white col userComment"><?php echo $row["user_fr_comment"]; ?></div>
                                <div class="col-md-2 white col dateComment"><?php echo $row["date_fr_comment"]; ?></div>
                                <div class="col-md-2 white col userComment"><?php echo $row["user_it_comment"]; ?></div>
                                <div class="col-md-2 white col dateComment"><?php echo $row["date_it_comment"]; ?></div>
                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="row">

                                <!-- Rubrik -->
                                <div class="col-md-4 white col ">
                                    <?php
                                    if ($tempSearch == false) {
                                        echo $row["category"];
                                    } else {
                                        echo preg_replace("/" . $_POST['search'] . "/", "<span class='highlight'>" . $_POST['search'] . "</span>", $row["category"]);
                                    }
                                    ?>
                                </div>

                                <!-- Info -->
                                <div class="col-md-4 white col ">
                                    <?php
                                    if ($tempSearch == false) {
                                        echo $row["info"];
                                    } else {
                                        echo preg_replace("/" . $_POST['search'] . "/", "<span class='highlight'>" . $_POST['search'] . "</span>", $row["info"]);
                                    }
                                    ?>
                                </div>

                                <!-- Edit -->
                                <div class="col-md-4 white col">
                                    <a href="edit_item.php?data_id=<?php echo $row['data_id']?>"><img src="lib/img/button_edit.png"/></a>
                                    <a href="delete_item.php?data_id=<?php echo $row['data_id']?>"><img src="lib/img/button_delete.png"/></a>
                                </div>
                            </div>

                            <!--Carlines-->
                            <div class="row">
                                <div class="col-md-12 white ">
                                    <span class="carlineHeadline">Enthalten in:</span>
                                    <?php
                                        echo $row["carline"];
                                    ?>
                                </div>
                            </div>

                        </div>

                        <!--unterer Info-Bereich-->
                        <div class="col-md-12">
                            <div class="row itemInfo">

                                <div class="col-md-3 itemBottom col borderRoundBottomLeft">Erstellt von <?php echo $row['user_create']?> am <?php echo date('d.m.Y H:i', strtotime($row['date_create']))?></div>

                                <div class="col-md-3 itemBottom col">
                                    <?php
                                    //Feld wird erst angezeigt, wenn Datum > 1970 ist
                                    $updateYear = date('Y', strtotime($row['date_update']));
                                    if($updateYear>1970){ ?>
                                        Geändert von <?php echo $row['user_update']?> am <?php echo date('d.m.Y H:i', strtotime($row['date_update']));
                                    }else { ?>&nbsp;<?php } ?>
                                </div>

                                <!-- Feld fuer geloeschte Eintraege-->
                                <div class="col-md-3 itemBottom col">
                                    <?php
                                        //dieses Feld ist nur sichtbar, wenn Eintrag geloescht wurde
                                        if($temp=="deleted") { ?>
                                            Gelöscht von <?php echo $row['user_delete'] ?> am <?php echo date('d.m.Y H:i', strtotime($row['date_delete']));
                                    }else { ?>&nbsp;<?php } ?>
                                </div>

                                <div class="col-md-3 itemBottom col borderRoundBottomRight">ID: <?php echo $row['data_id']?></div>
                            </div>
                        </div>

                    </div><!-- row -->

                </div><!-- wrapper -->
                </div>


                <?php
                    }//ENDE if($row["state"]==$temp)
                    endforeach

                ?>


<?php

}
}
?>
<!--Copy to clipboard-->
<script>
    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);

        //kopierten Text in copiedValue speichern
        var copiedValue = $(element).text();
        //Leerzeichen ind copiedValue entfernen
        while (copiedValue.indexOf('  ') > 0) {
            copiedValue = copiedValue.replace('  ', '');
            if(copiedValue.slice(-1)==' '){
                //var deleteSpace = copiedValue.length-1;
                copiedValue = copiedValue.slice(0, copiedValue.length-1);
            }
        }

        $temp.val(copiedValue).select();
        document.execCommand("copy");

        console.log(copiedValue.length-1);
        $temp.remove();
    }
</script>

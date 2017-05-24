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
            foreach ($res AS $row):

            //Pruefung, ob Datensatz aktiv oder geloescht wurde
            if($row["state"]==$temp) {
        ?>


                <div class="row">

                <div class="col-md-12 col itemWrapper">

                    <div class="row ">

                        <div class="col-md-9">

                            <div class="row">

                                <div class="col-md-4 col itemFieldWrapper">
                                    <div class="itemField">
                                        <?php
                                        if ($tempSearch == false) {
                                            echo $row["item_de"];
                                        } else {
                                            echo preg_replace("/" . $_POST['search'] . "/", "<span class='highlight'>" . $_POST['search'] . "</span>", $row["item_de"]);
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="col-md-4 col itemFieldWrapper">
                                    <div class="itemField">
                                    <?php
                                    if ($tempSearch == false) {
                                        echo $row["item_fr"];
                                    } else {
                                        echo preg_replace("/" . $_POST['search'] . "/", "<span class='highlight'>" . $_POST['search'] . "</span>", $row["item_fr"]);
                                    }
                                    ?>
                                    </div>
                                </div>

                                <div class="col-md-4 col itemFieldWrapper">
                                   <div class="itemField">
                                    <?php
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

                                <div class="col-md-4 white col">
                                    <img src="lib/img/button_comment.png"/>
                                    <img src="lib/img/button_search.png"/>
                                    <img src="lib/img/button_copy.png"/>
                                </div>
                                <div class="col-md-4 white col">
                                    <img src="lib/img/button_comment.png"/>
                                    <img src="lib/img/button_search.png"/>
                                    <img src="lib/img/button_copy.png"/>
                                </div>
                                <div class="col-md-4 white col">
                                    <img src="lib/img/button_comment.png"/>
                                    <img src="lib/img/button_search.png"/>
                                    <img src="lib/img/button_copy.png"/>
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

                            <div class="row">
                                <div class="col-md-12 white ">
                                    <span class="carlineHeadline">Enthalten in:</span>
                                    <?php
                                        echo $row["carline"];
                                    ?>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-12">
                            <div class="row itemInfo">
                                <div class="col-md-3 itemBottom col borderRoundBottomLeft">Erstellt von <?php echo $row['user_create']?> am <?php echo date('d.m.Y H:i', strtotime($row['date_create']))?></div>
                                <div class="col-md-3 itemBottom col">Geändert von <?php echo $row['user_update']?> am <?php echo date('d.m.Y H:i', strtotime($row['date_update']))?></div>

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


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

                        <div class="col-md-9 bottomLine">

                            <div class="row">

                                <div class="col-md-4 white col bottomLine">
                                    <?php
                                    if ($tempSearch == false) {
                                        echo $row["item_de"];
                                    } else {
                                        echo preg_replace("/" . $_POST['search'] . "/", "<span class='highlight'>" . $_POST['search'] . "</span>", $row["item_de"]);
                                    }
                                    ?>
                                </div>

                                <div class="col-md-4 white col bottomLine">
                                    <?php
                                    if ($tempSearch == false) {
                                        echo $row["item_fr"];
                                    } else {
                                        echo preg_replace("/" . $_POST['search'] . "/", "<span class='highlight'>" . $_POST['search'] . "</span>", $row["item_fr"]);
                                    }
                                    ?>
                                </div>

                                <div class="col-md-4 white col bottomLine">
                                    <?php
                                    if ($tempSearch == false) {
                                        echo $row["item_it"];
                                    } else {
                                        echo preg_replace("/" . $_POST['search'] . "/", "<span class='highlight'>" . $_POST['search'] . "</span>", $row["item_it"]);
                                    }
                                    ?>
                                </div>
                            </div>

                            <!----------------------------------------------->
                            <!-- Kommentieren/Filtern/Kopieren -->
                            <div class="row">

                                <div class="col-md-4 white col bottomLine">
                                    <img src="lib/img/button_comment.png"/>
                                    <img src="lib/img/button_search.png"/>
                                    <img src="lib/img/button_copy.png"/>
                                </div>
                                <div class="col-md-4 white col bottomLine">
                                    <img src="lib/img/button_comment.png"/>
                                    <img src="lib/img/button_search.png"/>
                                    <img src="lib/img/button_copy.png"/>
                                </div>
                                <div class="col-md-4 white col bottomLine">
                                    <img src="lib/img/button_comment.png"/>
                                    <img src="lib/img/button_search.png"/>
                                    <img src="lib/img/button_copy.png"/>
                                </div>

                            </div>

                            <!----------------------------------------------->
                            <!-- Kommentiere -->
                            <div class="row">
                                <div class="col-md-4 white col bottomLine">comment german</div>
                                <div class="col-md-4 white col bottomLine">comment french</div>
                                <div class="col-md-4 white col bottomLine">comment italien</div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 white col bottomLine">user comment german</div>
                                <div class="col-md-4 white col bottomLine">user comment french</div>
                                <div class="col-md-4 white col bottomLine">user comment italien</div>
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
                                    <img src="lib/img/button_delete.png"/>
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
                            <div class="row ">
                                <div class="col-md-3 itemBottom col borderRoundBottomLeft">user created</div>
                                <div class="col-md-3 itemBottom col">user upated</div>
                                <div class="col-md-3 itemBottom col">user deleted</div>
                                <div class="col-md-3 itemBottom col borderRoundBottomRight">data_id</div>
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


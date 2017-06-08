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

    //---------------------------------------

    function printData($temp){
        global $res;

        //---------------------------------------

        //CONTROLLER
        //Pruefung, ob etwas gesucht wurde
        if(empty($_POST['search'])){
            $_POST['search']="";
            $tempSearch = false;
        }else {
            $tempSearch = true;
        }

        //---------------------------------------

        ?>

        <!-- Kopfzeile Datenausgabe -->
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
        //Slash wird in Variable $slash gespeichert, dient dazu, nicht mit preg_replace zu arbeiten,
        //sobald ein Slash im gesuchten Wort enthalten ist, da dadurch ein Fehler geworfen wird (Stand: 170602)
        $slash = "/";
        ?>


        <?php
            //$id fuer Zwischenspeicherung wird initialisiert
            $id = 0;
            foreach ($res AS $row):

            //in jeder Zeile wird $id inkrementiert
            $id++;

            //CONTROLLER
            //Pruefung, ob Datensatz aktiv oder geloescht wurde
            if($row["state"]==$temp) {
        ?>


                <div class="row">
                    <div class="col-md-12 col itemWrapper">
                        <div class="row ">


                            <div class="col-md-9">
                                <div class="row">
                                    <?php include "table_items_content/data_output_view.php"; ?>
                                </div>
                                <!----------------------------------------------->
                                <!-- Kommentieren/Filtern/Kopieren -->
                                <div class="row editLine">
                                    <?php include "table_items_content/data_icons_view.php"; ?>
                                </div>

                                <!----------------------------------------------->
                                <!-- Kommentare -->
                                <?php include "table_items_content/data_comments_view.php"; ?>
                            </div>



                            <div class="col-md-3">
                                <div class="row">
                                    <?php include "table_items_content/data_category_info_view.php"; ?>
                                    <!-- Eintrag bearbeiten/loeschen -->
                                    <div class="col-md-4 white col">
                                        <?php include "table_items_content/data_edit_item_view.php"; ?>
                                    </div>
                                </div>
                                <!--Carlines-->
                                <div class="row">
                                    <div class="col-md-12 white ">
                                        <span class="carlineHeadline">Enthalten in:</span>
                                        <?php include "table_items_content/data_carline_view.php"; ?>
                                    </div>
                                </div>
                            </div>



                            <!--unterer Info-Bereich-->
                            <div class="col-md-12">
                                <?php include "table_items_content/data_bottomLine_view.php"; ?>
                            </div>



                        </div><!-- row -->
                    </div><!-- wrapper -->
                </div><!-- row -->


                <?php
                    }//ENDE if($row["state"]==$temp)
                    endforeach

                ?>

<?php

    }//ENDE function printData($temp){
}//ENDE class table_items
?>


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

                                <?php include "table_items_content/data_output.php"; ?>

                            </div>


                            <!----------------------------------------------->
                            <!-- Kommentieren/Filtern/Kopieren -->
                            <div class="row editLine">

                                <?php include "table_items_content/data_icons.php"; ?>

                            </div>


                            <!----------------------------------------------->
                            <!-- Kommentare -->

                            <?php include "table_items_content/data_comments.php"; ?>

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

                            <?php include "table_items_content/data_bottomLine.php"; ?>

                        </div>


                    </div><!-- row -->

                </div><!-- wrapper -->
                </div>


                <?php
                    }//ENDE if($row["state"]==$temp)
                    endforeach

                ?>

<?php

    }//ENDE function printData($temp){
}//ENDE class table_items
?>


<!--Script zum Kopieren in die Zwischenablage-->
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

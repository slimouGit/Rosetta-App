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

        <table class="table table-hover table-responsive">
            <thead>
            <tr>
                <th class="col-sm-3"><img src="lib/img/de.jpg"/></th>
                <th class="col-sm-3"><img src="lib/img/fr.jpg"/></th>
                <th class="col-sm-3"><img src="lib/img/it.jpg"/></th>
                <th class="col-sm-2">Rubrik</th>
                <th class="col-sm-2">Info/Code</th>
                <th class="col-sm-1">Edit</th>
            </tr>
            </thead>

            <tbody class="itemRow">

        <?php
            foreach ($res AS $row):

            //Pruefung, ob Datensatz aktiv oder geloescht wurde
            if($row["state"]==$temp) {
        ?>


                <!-- Start 1. Zeile (Inhalt Daten) -->
                <tr>
                    <td>
                        <?php
                        if ($tempSearch == false) {
                            echo $row["item_de"];
                        } else {
                            echo preg_replace("/" . $_POST['search'] . "/", "<span class='highlight'>" . $_POST['search'] . "</span>", $row["item_de"]);
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($tempSearch == false) {
                            echo $row["item_fr"];
                        } else {
                            echo preg_replace("/" . $_POST['search'] . "/", "<span class='highlight'>" . $_POST['search'] . "</span>", $row["item_fr"]);
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($tempSearch == false) {
                            echo $row["item_it"];
                        } else {
                            echo preg_replace("/" . $_POST['search'] . "/", "<span class='highlight'>" . $_POST['search'] . "</span>", $row["item_it"]);
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($tempSearch == false) {
                            echo $row["category"];
                        } else {
                            echo preg_replace("/" . $_POST['search'] . "/", "<span class='highlight'>" . $_POST['search'] . "</span>", $row["category"]);
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($tempSearch == false) {
                            echo $row["info"];
                        } else {
                            echo preg_replace("/" . $_POST['search'] . "/", "<span class='highlight'>" . $_POST['search'] . "</span>", $row["info"]);
                        }
                        ?>
                    </td>
                    <td>
                        <a href="edit_item.php?data_id=<?php echo $row['data_id']?>"><img src="lib/img/button_edit.png"/></a>
                        <img src="lib/img/button_delete.png"/>
                    </td>
                </tr>
                <!-- Ende 1. Zeile (Inhalt Daten) -->


                <!-- Start 2. Zeile (Bedienfelder) -->
                <tr>
                    <td>
                        <img src="lib/img/button_comment.png"/>
                        <img src="lib/img/button_search.png"/>
                        <img src="lib/img/button_copy.png"/>
                    </td>
                    <td>
                        <img src="lib/img/button_comment.png"/>
                        <img src="lib/img/button_search.png"/>
                        <img src="lib/img/button_copy.png"/>
                    </td>
                    <td>
                        <img src="lib/img/button_comment.png"/>
                        <img src="lib/img/button_search.png"/>
                        <img src="lib/img/button_copy.png"/>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <!-- Ende 2. Zeile (Bedienfelder) -->


                <!-- Start 3. Zeile (Kommentare) -->
                <tr>
                    <td>Kommentar</td>
                    <td>Kommentar</td>
                    <td>Kommentar</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <!-- Ende 3. Zeile (Kommentare) -->


                <!-- Start 4. Zeile (Kommentar-Info) -->
                <tr>
                    <td>User (Kommentar/Datum)</td>
                    <td>User (Kommentar/Datum)</td>
                    <td>User (Kommentar/Datum)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <!-- Ende 4. Zeile (Kommentar-Info) -->


                <!-- Start 5. Zeile (Kommentare) -->
                <tr class="userRow">
                    <td>User (Erstellt/Datum)</td>
                    <td>User (geändert/Datum)</td>
                    <td>User (geändert/Datum)</td>
                    <td></td>
                    <td></td>
                    <td>ID</td>
                </tr>
                <!-- Ende 5. Zeile (Kommentare) -->


                <?php
                    }//ENDE if($row["state"]==$temp)
                    endforeach
                ?>

            </tbody>

        </table>
<?php

}
}


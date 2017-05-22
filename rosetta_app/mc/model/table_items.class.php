<?php


class table_items
{
    public static function showData()
    {
        self::printData();
    }



    function printData(){
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
                <th class="col-sm-3">De</a></th>
                <th class="col-sm-3">Fr</th>
                <th class="col-sm-3">It</th>
                <th class="col-sm-2">Rubrik</th>
                <th class="col-sm-2">Info/Code</th>
                <th class="col-sm-2">Edit</th>
            </tr>
            </thead>


        <?php foreach ($res AS $row): ?>

            <tbody class="itemRow">

            <!-- Start 1. Zeile (Inhalt Daten) -->
            <tr>
                <td>
                    <?php
                        if($tempSearch == false){echo $row["item_de"];}
                        else{echo preg_replace("/" . $_POST['search'] . "/", "<span class='highlight'>" . $_POST['search'] . "</span>",$row["item_de"]);}
                    ?>
                </td>
                <td>
                    <?php
                        if($tempSearch == false){echo $row["item_fr"];}
                        else{echo preg_replace("/" . $_POST['search'] . "/", "<span class='highlight'>" . $_POST['search'] . "</span>",$row["item_fr"]);}
                    ?>
                </td>
                <td>
                    <?php
                        if($tempSearch == false){echo $row["item_it"];}
                        else{echo preg_replace("/" . $_POST['search'] . "/", "<span class='highlight'>" . $_POST['search'] . "</span>",$row["item_it"]);}
                    ?>
                </td>
                <td>
                    <?php
                        if($tempSearch == false){echo $row["category"];}
                        else{echo preg_replace("/" . $_POST['search'] . "/", "<span class='highlight'>" . $_POST['search'] . "</span>",$row["category"]);}
                    ?>
                </td>
                <td>
                    <?php
                        if($tempSearch == false){echo $row["info"];}
                        else{echo preg_replace("/" . $_POST['search'] . "/", "<span class='highlight'>" . $_POST['search'] . "</span>",$row["info"]);}
                    ?>
                </td>
                <td>
                </td>
            </tr>
            <!-- Ende 1. Zeile (Inhalt Daten) -->


            <!-- Start 2. Zeile (Bedienfelder) -->
            <tr>
                <td>comment/filter/clipboard</td>
                <td>comment/filter/clipboard</td>
                <td>comment/filter/clipboard</td>
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
            <tr>
                <td>User (Erstellt/Datum)</td>
                <td>User (geändert/Datum)</td>
                <td>User (geändert/Datum)</td>
                <td></td>
                <td></td>
                <td>ID</td>
            </tr>
            <!-- Ende 5. Zeile (Kommentare) -->

            </tbody>

        <?php endforeach ?>
        </table>
<?php

}
}


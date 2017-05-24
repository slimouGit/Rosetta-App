<?php

/**
 * Created by PhpStorm.
 * User: salim
 * Date: 23.05.2017
 * Time: 21:41
 */
class change_item
{
    public static function editData()
    {
        self::editItem($tempId);
    }


    function editItem($tempId){
        global $res;
        echo $tempId . " Kommt an";

        foreach ($res AS $row):
            ?>

            <div class="container">
                <div class='row'>
                    <form action="?change_item=1" method = "post">
                        <input type="hidden" value="<?php $_POST['$tempId'] ?>"/>
                        <div class="col-sm-4">
                            Deutsch
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="skills" name="search" value="<?php echo $row['item_de']; ?>" placeholder="Suchbegriff">
                        </div>
                        <div class="col-sm-4">
                            Französisch
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="skills" name="search" value="<?php echo $row['item_fr']; ?>" placeholder="Suchbegriff">
                        </div>
                        <div class="col-sm-4">
                            Italienisch
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="skills" name="search" value="<?php echo $row['item_it']; ?>" placeholder="Suchbegriff">
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-1">
                                    <input type="submit" class="btn btn-primary" value="Abschicken">
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <?php
            if(isset($_GET['change_item'])) {
                echo $_POST['$tempId'];
            }
            ?>

            <?php
        endforeach;
    }//ENDE editItem
}//ENDE change_item
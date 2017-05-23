<?php

/**
 * Created by PhpStorm.
 * User: salim
 * Date: 23.05.2017
 * Time: 21:41
 */
class change_item
{
    public static function changeData()
    {
        self::modifyData($tempId);
    }


    function modifyData($tempId){
        global $res;
        echo $tempId . " Kommt an";

        foreach ($res AS $row){
            echo "Die gesuchte ID ist " . $row["data_id"];
            echo "<br/>";
            echo "Eintrag ist " . $row["item_de"];
            echo "<br/>";
            echo "Eintrag ist " . $row["user_de_comment"];
        };
    }
}
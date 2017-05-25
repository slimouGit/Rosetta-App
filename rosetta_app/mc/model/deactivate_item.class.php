<?php

/**
 * Created by PhpStorm.
 * User: salim
 * Date: 23.05.2017
 * Time: 21:41
 */
class deactivate_item
{
    public static function deleteData()
    {
        self::deleteItem($tempId);
    }


    function deleteItem($tempId){
        global $res;
        echo "Der Eintrag mit der ID " . $tempId . " wurde gelöscht";

        //include connection to database
        include "mc/controller/db_connect.php";


        $res = $pdo->prepare("UPDATE rosetta_data SET state = :state_neu, user_deleted = :user_deleted WHERE data_id = $tempId");
        $res->execute(array('state_neu' => 'deleted', 'user_deleted' => $username));
    }
}
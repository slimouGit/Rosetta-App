<?php

/**
 * Created by PhpStorm.
 * User: salim
 * Date: 23.05.2017
 * Time: 21:41
 */
class delete_item
{
    public static function deleteData($username, $currentDate, $tempId)
    {
        self::deleteItem($username, $currentDate, $tempId);
    }//ENDE function deleteData

    //---------------------------------------------------------------------------------------

    function deleteItem($username, $currentDate, $tempId){

        global $res;

        //---------------------------------------------------------------------------------------

        //include connection to database
        include "mc/controller/db_connect.php";

        //---------------------------------------------------------------------------------------

        $res = $pdo->prepare("UPDATE rosetta_data SET state = :state_neu, user_delete = :user_delete, date_delete = :date_delete WHERE data_id = $tempId");
        $res->execute(array('state_neu' => 'deleted', 'user_delete' => $username, 'date_delete' => $currentDate));

        //------------------------------------------------------------------------------------------

        //Meldung wird ausgegeben
        require_once "mc/model/responseObject.class.php";
        $response = new responseObject();
        $response->success("Der Eintrag mit der ID {$tempId} wurde erfolgreich gelöscht");

        //------------------------------------------------------------------------------------------

    }//ENDE function deleteItem

}//ENDE function delete_item
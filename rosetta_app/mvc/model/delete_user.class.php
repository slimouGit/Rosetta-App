<?php

/**
 * Created by PhpStorm.
 * User: salim
 * Date: 23.05.2017
 * Time: 21:41
 */
class delete_user
{
    public static function deleteUserData($tempId)
    {
        self::deleteUser($tempId);
    }//ENDE function deleteUser

    //---------------------------------------------------------------------------------------

    function deleteUser($tempId){

        global $res;
        //---------------------------------------------------------------------------------------

        //include connection to database
        include "mvc/model/db_connect.php";

        //---------------------------------------------------------------------------------------

        $res = $pdo->prepare("DELETE FROM rosetta_users WHERE user_id = $tempId");
        $res->execute(array('user_id' => $tempId));


        //------------------------------------------------------------------------------------------

        //Meldung wird ausgegeben

        //CONTROLLER
        require_once "mvc/view/responseObject.class.php";
        $response = new responseObject();
        $response->response("Der Benutzer mit der ID {$tempId} wurde erfolgreich gelöscht","6","responseSuccess");

        //------------------------------------------------------------------------------------------

    }//ENDE function deleteUserData

}//ENDE function delete_user
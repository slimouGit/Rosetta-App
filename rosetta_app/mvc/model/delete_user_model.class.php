<?php

/**
 * Created by PhpStorm.
 * User: salim
 *
 * Klasse entfernt Nutzerdaten aus Datenbank entgültig
 */
class delete_user
{
    /**
     * @param $tempId
     */
    public static function deleteUserData($tempId)
    {
        global $res;
        //---------------------------------------------------------------------------------------

        //include connection to database
        include "mvc/model/db_connect_model.php";

        //---------------------------------------------------------------------------------------

        $res = $pdo->prepare("DELETE FROM rosetta_users WHERE user_id = $tempId");
        $res->execute(array('user_id' => $tempId));


        //------------------------------------------------------------------------------------------

        //Meldung wird ausgegeben

        //CONTROLLER
        require_once "mvc/view/responseObject_view.class.php";
        $response = new responseObject();
        $response->response("Der Benutzer mit der ID {$tempId} wurde erfolgreich gelöscht","6","responseSuccess");

        //------------------------------------------------------------------------------------------

    }//ENDE function deleteUserData

}//ENDE function delete_user
<?php

/**
 * Created by PhpStorm.
 * User: salim
 *
 * Klasse zum Loeschen der Datensaetze
 * es wird lediglich der Eintrag in der Spalte 'state' aktualisiert
 */

class delete_item
{
    /**
     * @param $username
     * @param $currentDate
     * @param $tempId
     */
    public static function deleteData($username, $currentDate, $tempId)
    {
        global $res;

        //---------------------------------------------------------------------------------------

        //include connection to database
        include "mvc/model/db_connect_model.php";

        //---------------------------------------------------------------------------------------

        $res = $pdo->prepare("UPDATE rosetta_data SET state = :state_neu, user_delete = :user_delete, date_delete = :date_delete WHERE data_id = $tempId");
        $res->execute(array('state_neu' => 'deleted', 'user_delete' => $username, 'date_delete' => $currentDate));

        //------------------------------------------------------------------------------------------

        //Meldung wird ausgegeben

        //CONTROLLER
        require_once "mvc/view/responseObject_view.class.php";
        $response = new responseObject();
        $response->response("Der Eintrag mit der ID {$tempId} wurde erfolgreich gelöscht","6","responseSuccess");

        //------------------------------------------------------------------------------------------

    }//ENDE function deleteItem

}//ENDE function delete_item
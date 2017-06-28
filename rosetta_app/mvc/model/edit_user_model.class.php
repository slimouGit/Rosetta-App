<?php

/**
 * Created by PhpStorm.
 * User: salim
 *
 * Klasse speichert geaenderte Nutzerdaten ab
 */

class edit_user
{
    /**
     * @param $forename
     * @param $surname
     * @param $email
     * @param $authorization
     * @param $user_id
     */
    public function editUserData($forename,$surname,$email,$authorization,$user_id){

        global $res;
        $currentDate = date('d.m.Y H:i');
        //---------------------------------------------------------------------------------------

        //include connection to database
        include "mvc/model/db_connect_model.php";

        //---------------------------------------------------------------------------------------

        //Daten werden aktualisiert
        $res = $pdo->prepare("UPDATE rosetta_users SET forename = :forename, surname = :surname, email = :email, authorization = :authorization, update_user = :update_user WHERE user_id = :user_id");
        $res->execute(array('forename' => $forename, 'surname' => $surname, 'email' => $email, 'authorization'=> $authorization, 'update_user'=> $currentDate, 'user_id'=> $user_id));

        //Anzahl der Updates in $number_of_changedRows
        $number_of_changedRows = $res->rowCount();

        //-----------------------------------------------------------------------------------------

        //Meldung wird ausgegeben

        require_once "mvc/view/responseObject_view.class.php";
        $response = new responseObject();

        if($number_of_changedRows>0){
            $response->response("Der Benutzer mit der ID {$user_id} wurde erfolgreich geändert","6","responseSuccess");
        }else{
            $response->response("Der Benutzer mit der ID {$user_id} wurde nicht geändert","6","responseFalse");
        }

        //------------------------------------------------------------------------------------------

        //aktualisierter Datensatz wird ausgegeben
        $res = $pdo->query("SELECT * FROM rosetta_users WHERE user_id LIKE $user_id");

        //CONTROLLER
        require "mvc/view/table_user_view.class.php";
        table_user::showUser();

        //---------------------------------------------------------------------------------------

    }//ENDE function editItem

}//ENDE function edit_item
<?php

/**
 * Created by PhpStorm.
 * User: salim
 * Date: 27.05.2017
 * Time: 22:16
 */
class edit_user
{
    public function editUserData($forename,$surname,$email,$authorization,$user_id){
        self::editUser($forename,$surname,$email,$authorization,$user_id);
    }//ENDE function editData

    //---------------------------------------------------------------------------------------

    function editUser($forename,$surname,$email,$authorization,$user_id){

        global $res;
        $currentDate = date('d.m.Y H:i');
        //---------------------------------------------------------------------------------------

        //include connection to database
        include "mvc/model/db_connect.php";

        //---------------------------------------------------------------------------------------

        //Daten werden aktualisiert
        $res = $pdo->prepare("UPDATE rosetta_users SET forename = :forename, surname = :surname, email = :email, authorization = :authorization, update_user = :update_user WHERE user_id = :user_id");
        $res->execute(array('forename' => $forename, 'surname' => $surname, 'email' => $email, 'authorization'=> $authorization, 'update_user'=> $currentDate, 'user_id'=> $user_id));

        //------------------------------------------------------------------------------------------

        //Meldung wird ausgegeben
        require_once "mvc/view/responseObject.class.php";
        $response = new responseObject();
        $response->response("Der Benutzer mit der ID {$user_id} wurde erfolgreich geändert","6","responseSuccess");

        //------------------------------------------------------------------------------------------

        //aktualisierter Datensatz wird ausgegeben
        $res = $pdo->query("SELECT * FROM rosetta_users WHERE user_id LIKE $user_id");
        require "mvc/view/table_user.class.php";
        table_user::showUser();

        //---------------------------------------------------------------------------------------

    }//ENDE function editItem

}//ENDE function edit_item
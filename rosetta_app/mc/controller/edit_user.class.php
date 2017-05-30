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

        //---------------------------------------------------------------------------------------

        //include connection to database
        include "mc/controller/db_connect.php";

        //---------------------------------------------------------------------------------------

        //Daten werden aktualisiert
        $res = $pdo->prepare("UPDATE rosetta_users SET forename = :forename, surname = :surname, email = :email, authorization = :authorization WHERE user_id = :user_id");
        $res->execute(array('forename' => $forename, 'surname' => $surname, 'email' => $email, 'authorization'=> $authorization, 'user_id'=> $user_id));

        //------------------------------------------------------------------------------------------

        //Meldung wird ausgegeben
        require_once "mc/model/responseObject.class.php";
        $response = new responseObject();
        $response->success("Der Nutzer mit der ID {$user_id} wurde erfolgreich aktualisiert");

        //------------------------------------------------------------------------------------------

        //aktualisierter Datensatz wird ausgegeben
        $res = $pdo->query("SELECT * FROM rosetta_users WHERE user_id LIKE $user_id");
        require "mc/model/table_user.class.php";
        table_user::showUser();

        //---------------------------------------------------------------------------------------

    }//ENDE function editItem

}//ENDE function edit_item
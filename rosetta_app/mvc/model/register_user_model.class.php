<?php

/**
 * Created by PhpStorm.
 * User: salim
 *
 * Klasse erstellt neues Tupel fuer Nutzerdaten in Datenbank
 */

class register_user {
    /**
     * @param $forename
     * @param $surname
     * @param $authorization
     * @param $email
     * @param $password_hash
     */
    public static function insertUserData($forename,$surname,$authorization,$email,$password_hash)
    {
        global $res;

        //---------------------------------------------------------------------------------------

        //include connection to database
        include "mvc/model/db_connect_model.php";

        //---------------------------------------------------------------------------------------

        $res = $pdo->prepare("INSERT INTO rosetta_users (forename, surname, authorization, email, password) VALUES (:forename, :surname, :authorization, :email, :password)");
        $result = $res->execute(array('forename' => $forename, 'surname' => $surname, 'authorization' => $authorization, 'email' => $email, 'password' => $password_hash));

        //CONTROLLER
        //Meldung wird ausgegeben
        require_once "mvc/view/responseObject_view.class.php";
        $response = new responseObject();

        if($result) {

            $response->response("Der Nutzer wurde erfolgreich registriert","6","responseSuccess");

            //------------------------------------------------------------------------------------------

            //Eintrag anzeigen
            $res = $pdo->query("SELECT * FROM rosetta_users WHERE password LIKE '" . $password_hash . "' ");

            //CONTROLLER
            require "mvc/view/table_user_view.class.php";
            table_user::showUser();

            //---------------------------------------------------------------------------------------

        } else {
            $response->response("Beim Speichern ist ein Fehler aufgetreten","6","responseFalse");
        }

    }
}
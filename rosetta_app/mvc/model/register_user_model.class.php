<?php


class register_user {
    public static function insertUserData($forename,$surname,$authorization,$email,$password_hash)
    {
        self::insertUserItem($forename,$surname,$authorization,$email,$password_hash);
    }//ENDE function insertData

    function insertUserItem($forename,$surname,$authorization,$email,$password_hash){
        echo $forename ." " . $surname ." " . $authorization ." " . $email ." " . $password_hash;

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

            //$tempFormular = false;
        } else {
            $response->response("Beim Speichern ist ein Fehler aufgetreten","6","responseFalse");
        }

    }
}
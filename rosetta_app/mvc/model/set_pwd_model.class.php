<?php

/**
 * Created by PhpStorm.
 * User: salim
 * Date: 04.06.2017
 * Time: 13:37
 *
 * Klasse stellt Funktionen zum Erstellen und Aendern des Passworts bereit
 */

class set_pwd
{
    /**
     * @param $passwordcode
     * @param $currentDate
     * @param $user_id
     * @param $user_email
     * @param $user_forename
     */
    public static function insertPWDCode($passwordcode, $currentDate, $user_id, $user_email, $user_forename)
    {
        self::insertTempCode($passwordcode, $currentDate, $user_id, $user_email, $user_forename);
    }//ENDE function insertPWDCode

    /**
     * @param $passwordhash
     * @param $tempId
     */
    public static function resetPWDCode($passwordhash, $tempId)
    {
        self::insertNewPWD($passwordhash, $tempId);
    }//ENDE function resetPWDCode


    //---------------------------------------------------------------------------------------

        /**
         * @param $passwordcode
         * @param $currentDate
         * @param $user_id
         * @param $user_email
         * @param $user_forename
         *
         * Funktion speichert Passwort Code zum Abgleich in DB
         */
        function insertTempCode($passwordcode, $currentDate, $user_id, $user_email, $user_forename){
            global $res;

            //---------------------------------------------------------------------------------------

            //include connection to database
            include "mvc/model/db_connect_model.php";

            //---------------------------------------------------------------------------------------

            $res = $pdo->prepare("UPDATE rosetta_users SET password_code = :password_code, password_date = :password_date WHERE user_id = :user_id");
            $result = $res->execute(array('password_code' => $passwordcode, 'password_date' => $currentDate, 'user_id' => $user_id));

            $empfaenger = $user_email;
            $betreff = "Neues Passwort für deinen Account auf www.rosetta-app.de";
            $from = "From: admin@rosetta-app.de";
            $url_passwordcode = 'http://rosetta-app.de/rosetta_app/forget_pwd_reset.php?user_id='.$user_id.'&code='.$passwordcode;

            $text = 'Hallo '.$user_forename.',
                    für deinen Account auf www.rosetta-app.de wurde nach einem neuen Passwort gefragt. 
                    Um ein neues Passwort zu vergeben, rufe die folgende Website über den folgenden Link auf:                
                    '. $url_passwordcode .'
                    Sollte dir dein Passwort wieder eingefallen sein oder hast du dies nicht angefordert, so bitte ignoriere diese E-Mail.';

            mail($empfaenger, $betreff, $text, $from);
        }//ENDE function insertTempCode()


        //---------------------------------------------------------------------------------------

        /**
         * @param $passwordhash
         * @param $tempId
         *
         * Funktion aktualisiert Passwort in DB
         */
        function insertNewPWD($passwordhash, $tempId){

            global $res;

            //---------------------------------------------------------------------------------------

            //include connection to database
            include "mvc/model/db_connect_model.php";

            //---------------------------------------------------------------------------------------
            $res = $pdo->prepare("UPDATE rosetta_users SET password = :passwordhash WHERE user_id = :user_id");
            $result = $res->execute(array('passwordhash' => $passwordhash, 'user_id'=> $tempId ));

            if($result) {

                //Meldung wird ausgegeben
                require_once "mvc/view/responseObject_view.class.php";
                $response = new responseObject();
                $response->response("Das Passwort wurde erfolgreich geändert.", "4", "");
            }

        }//ENDE function insertNewPWD()
}
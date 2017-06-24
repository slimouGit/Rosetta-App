<?php

/**
 * Created by PhpStorm.
 * User: salim
 *
 * Klasse erstellt neues Tupel fuer Daten in Datenbank
 */

class insert_item
{
    /**
     * @param $token
     * @param $item_de
     * @param $item_fr
     * @param $item_it
     * @param $category
     * @param $info
     * @param $car
     * @param $username
     */
    public static function insertData($token,$item_de,$item_fr,$item_it,$category,$info,$car,$username)
    {
        self::insertItem($token,$item_de,$item_fr,$item_it,$category,$info,$car,$username);
    }//ENDE function insertData

    //---------------------------------------------------------------------------------------

    /**
     * @param $token
     * @param $item_de
     * @param $item_fr
     * @param $item_it
     * @param $category
     * @param $info
     * @param $car
     * @param $username
     */
    function insertItem($token,$item_de,$item_fr,$item_it,$category,$info,$car,$username){

        global $res;

        //---------------------------------------------------------------------------------------

        //include connection to database
        include "mvc/model/db_connect_model.php";

        //---------------------------------------------------------------------------------------

        //Daten werden eingefuegt
        $res = $pdo->prepare("INSERT INTO rosetta_data (token, item_de, item_fr, item_it, category, info, carline, user_create) VALUES (:token, :item_de, :item_fr, :item_it, :category, :info, :carline, :user_create)");
        $res->execute(array('token' => $token, 'item_de' => $item_de, 'item_fr' => $item_fr, 'item_it' => $item_it, 'category' => $category, 'info' => $info, 'carline' => $car, 'user_create' => $username));

        //------------------------------------------------------------------------------------------

        //CONTROLLER
        //Meldung wird ausgegeben
        require_once "mvc/view/responseObject_view.class.php";
        $response = new responseObject();
        $response->response("Der Eintrag wurde erfolgreich erstellt","6","responseSuccess");

        //------------------------------------------------------------------------------------------

        //Eintrag anzeigen
        $res = $pdo->query("SELECT * FROM rosetta_data WHERE token LIKE '" . $token . "' ");

        //CONTROLLER
        require "mvc/view/table_items_view.class.php";
        table_items::showData();

        //---------------------------------------------------------------------------------------

    }//ENDE function insertItem

}//ENDE function insert_item
<?php



class insert_item
{
    public static function insertData($token,$item_de,$item_fr,$item_it,$category,$info,$car,$username)
    {
        self::insertItem($token,$item_de,$item_fr,$item_it,$category,$info,$car,$username);
    }//ENDE function insertData

    //---------------------------------------------------------------------------------------

    function insertItem($token,$item_de,$item_fr,$item_it,$category,$info,$car,$username){

        global $res;

        //---------------------------------------------------------------------------------------

        //include connection to database
        include "mc/controller/db_connect.php";

        //---------------------------------------------------------------------------------------

        //Daten werden eingefuegt
        $res = $pdo->prepare("INSERT INTO rosetta_data (token, item_de, item_fr, item_it, category, info, carline, user_create) VALUES (:token, :item_de, :item_fr, :item_it, :category, :info, :carline, :user_create)");
        $res->execute(array('token' => $token, 'item_de' => $item_de, 'item_fr' => $item_fr, 'item_it' => $item_it, 'category' => $category, 'info' => $info, 'carline' => $car, 'user_create' => $username));

        //------------------------------------------------------------------------------------------

        //Meldung wird ausgegeben
        require_once "mc/model/responseObject.class.php";
        $response = new responseObject();
        $response->success("Der Eintrag wurde erfolgreich erstellt");

        //------------------------------------------------------------------------------------------

        //Eintrag anzeigen
        $res = $pdo->query("SELECT * FROM rosetta_data WHERE token LIKE '" . $token . "' ");
        require "mc/model/table_items.class.php";
        table_items::showData();

        //---------------------------------------------------------------------------------------

    }//ENDE function insertItem

}//ENDE function insert_item
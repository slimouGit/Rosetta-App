<?php

/**
 * Created by PhpStorm.
 * User: salim
 * Date: 27.05.2017
 * Time: 22:16
 */
class edit_item
{
    public function editData($item_de,$item_fr,$item_it,$category,$info,$car,$username,$data_id){
        self::editItem($item_de,$item_fr,$item_it,$category,$info,$car,$username,$data_id);
    }//ENDE function editData

    //---------------------------------------------------------------------------------------

    function editItem($item_de,$item_fr,$item_it,$category,$info,$car,$username,$data_id){

        global $res;

        //---------------------------------------------------------------------------------------

        //include connection to database
        include "mc/controller/db_connect.php";

        //---------------------------------------------------------------------------------------

        //Daten werden aktualisiert
        $res = $pdo->prepare("UPDATE rosetta_data SET state = :state_neu, item_de = :item_de, item_fr = :item_fr, item_it = :item_it, category = :category, info = :info, carline = :carline, user_update = :user_update WHERE data_id = :data_id");
        $res->execute(array('state_neu' => 'active', 'item_de' => $item_de, 'item_fr' => $item_fr, 'item_it' => $item_it, 'data_id'=> $data_id, 'category' => $category, 'info'=> $info, 'carline' => $car, 'user_update' => $username ));

        //------------------------------------------------------------------------------------------

        //Meldung wird ausgegeben
        require_once "mc/model/responseObject.class.php";
        $response = new responseObject();
        $response->success("Der Eintrag mit der ID {$data_id} wurde erfolgreich aktualisiert");

        //------------------------------------------------------------------------------------------

        //aktualisierter Datensatz wird ausgegeben
        $res = $pdo->query("SELECT * FROM rosetta_data WHERE data_id LIKE $data_id");
        require "mc/model/table_items.class.php";
        table_items::showData();

        //---------------------------------------------------------------------------------------

    }//ENDE function editItem

}//ENDE function edit_item
<?php

/**
 * Created by PhpStorm.
 *
 * Klasse schreibt die Kommentare in die Datenbank und gibt Rueckmeldung an den Benutzer
 *
 * User: salimoussayfi
 * Date: 07.06.17
 * Time: 17:22
 */
class comment_item
{
    //Kommentar GENEREL
    public function comment_generel_item($language){
        echo $language;
        global $res;
        include "mvc/model/db_connect_model.php";

        //---------------------------------------------------------------------------------------
        /*
        //Kommentar wird aktualisiert
        $res = $pdo->prepare("UPDATE rosetta_data SET item_de_comment = :item_de_comment, user_de_comment = :user_de_comment, date_de_comment = :date_de_comment WHERE data_id = :data_id");
        $result = $res->execute(array('item_de_comment' => $item_de_comment,  'data_id'=> $data_id, 'user_de_comment'=> $username, 'date_de_comment' => $currentDate ));

        //---------------------------------------------------------------------------------------

        if($result){
            self::giveResponse($data_id);
        }
           */
    }//ENDE function comment_item_de



    //------------------------------------------------------------------------------------------


    //Kommentar DEUTSCH
    public function comment_item_de($item_de_comment,$data_id,$username,$currentDate){

        global $res;
        include "mvc/model/db_connect_model.php";

        //---------------------------------------------------------------------------------------

        //Kommentar wird aktualisiert
        $res = $pdo->prepare("UPDATE rosetta_data SET item_de_comment = :item_de_comment, user_de_comment = :user_de_comment, date_de_comment = :date_de_comment WHERE data_id = :data_id");
        $result = $res->execute(array('item_de_comment' => $item_de_comment,  'data_id'=> $data_id, 'user_de_comment'=> $username, 'date_de_comment' => $currentDate ));

        //---------------------------------------------------------------------------------------

        if($result){
            self::giveResponse($data_id);
        }

    }//ENDE function comment_item_de



    //------------------------------------------------------------------------------------------



    //Kommentar FRANZOESISCH
    public function comment_item_fr($item_fr_comment,$data_id,$username,$currentDate){

        global $res;
        include "mvc/model/db_connect_model.php";

        //---------------------------------------------------------------------------------------

        //Kommentar wird aktualisiert
        $res = $pdo->prepare("UPDATE rosetta_data SET item_fr_comment = :item_fr_comment, user_fr_comment = :user_fr_comment, date_fr_comment = :date_fr_comment WHERE data_id = :data_id");
        $result = $res->execute(array('item_fr_comment' => $item_fr_comment,  'data_id'=> $data_id, 'user_fr_comment'=> $username, 'date_fr_comment' => $currentDate ));

        //---------------------------------------------------------------------------------------

        if($result){
            self::giveResponse($data_id);
        }

    }//ENDE function comment_item_fr



    //------------------------------------------------------------------------------------------



    //Kommentar ITALIENISCH
    public function comment_item_it($item_it_comment,$data_id,$username,$currentDate){

        global $res;
        include "mvc/model/db_connect_model.php";

        //---------------------------------------------------------------------------------------

        //Kommentar wird aktualisiert
        $res = $pdo->prepare("UPDATE rosetta_data SET item_it_comment = :item_it_comment, user_it_comment = :user_it_comment, date_it_comment = :date_it_comment WHERE data_id = :data_id");
        $result = $res->execute(array('item_it_comment' => $item_it_comment,  'data_id'=> $data_id, 'user_it_comment'=> $username, 'date_it_comment' => $currentDate ));

        //---------------------------------------------------------------------------------------

        if($result){
            self::giveResponse($data_id);
        }

    }//ENDE function comment_item_it



    //------------------------------------------------------------------------------------------


    //Funktion gibt Response aus
    public function giveResponse($data_id){

        global $res;
        include "mvc/model/db_connect_model.php";

        //---------------------------------------------------------------------------------------

        //Meldung wird ausgegeben
        require_once "mvc/view/responseObject_view.class.php";
        $response = new responseObject();
        $response->response("Der Eintrag mit der ID {$data_id} wurde erfolgreich kommentiert","6","responseSuccess");

        //------------------------------------------------------------------------------------------

        //aktualisierter Datensatz wird ausgegeben
        $res = $pdo->query("SELECT * FROM rosetta_data WHERE data_id LIKE $data_id");
        require "mvc/view/table_items_view.class.php";
        table_items::showData();

        //------------------------------------------------------------------------------------------

    }
}
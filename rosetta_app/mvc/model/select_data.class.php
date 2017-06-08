<?php

/**
 * Created by PhpStorm.
 * User: salimoussayfi
 * Date: 07.06.17
 * Time: 18:11
 */
class select_data
{
    /*
    public function select_item($tempId){

        global $res;
        include "mvc/model/db_connect_model.php";

        //---------------------------------------------------------------------------------------

        $res = $pdo->query("SELECT * FROM rosetta_data WHERE data_id LIKE $tempId");

        //---------------------------------------------------------------------------------------
    }//ENDE function select_item($tempId)


    //----------------------------------------------------------------------------------------------------


    public function select_completeData(){

        global $res;
        include "mvc/model/db_connect_model.php";

        //---------------------------------------------------------------------------------------

        $res = $pdo->query("SELECT * FROM rosetta_data");

        //---------------------------------------------------------------------------------------
    }//ENDE function select_completeData()



    //----------------------------------------------------------------------------------------------------


    public function select_user($tempId){

        global $res;
        include "mvc/model/db_connect_model.php";

        //---------------------------------------------------------------------------------------

        $res = $pdo->query("SELECT * FROM rosetta_users WHERE user_id LIKE $tempId");

        //---------------------------------------------------------------------------------------
    }//ENDE function select_user($tempId)

    */

    //----------------------------------------------------------------------------------------------------


    public function select_individuelUser($tempValue){

        global $res;
        include "mvc/model/db_connect_model.php";

        //---------------------------------------------------------------------------------------

        $res = $pdo->prepare("SELECT * FROM rosetta_users WHERE $tempValue = :$tempValue");

        //---------------------------------------------------------------------------------------
    }//ENDE function select_user($tempId)


    //----------------------------------------------------------------------------------------------------

    /*
     * Funktion zum Filtern der Daten
     */
    public function select_individuelData($tempItem){

        global $res;
        include "mvc/model/db_connect_model.php";

        //
        $cat = 'item_de, item_fr, item_it, category, info, carline';

        //---------------------------------------------------------------------------------------

        $res = $pdo->query("SELECT * FROM rosetta_data WHERE CONCAT_WS('',$cat) LIKE '%" . $tempItem . "%'");

        //---------------------------------------------------------------------------------------
    }//ENDE function select_individuelData($cat,$tempItem)


    //----------------------------------------------------------------------------------------------------


    public function select_completeDB($db){

        global $res;
        include "mvc/model/db_connect_model.php";

        //---------------------------------------------------------------------------------------

        $res = $pdo->query("SELECT * FROM $db");

        //---------------------------------------------------------------------------------------
    }//ENDE function select_completeDB($db)


    //----------------------------------------------------------------------------------------------------

    public function select_specificDB($db, $column, $value){

        global $res;
        include "mvc/model/db_connect_model.php";

        //---------------------------------------------------------------------------------------

        $res = $pdo->query("SELECT * FROM $db WHERE $column LIKE $value");

        //---------------------------------------------------------------------------------------
    }//ENDE function select_specificDB($db, $column, $value)


    //----------------------------------------------------------------------------------------------------



}
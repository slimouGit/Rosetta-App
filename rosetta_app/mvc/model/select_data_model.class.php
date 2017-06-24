<?php

/**
 * Created by PhpStorm.
 * User: salimoussayfi
 * Date: 07.06.17
 * Time: 18:11
 *
 * Klasse stellt mehrere Funktionen zur Datenbank-Abfrage bereit
 */

class select_data
{

    //----------------------------------------------------------------------------------------------------

    /**
     * @param $tempValue
     */
    public function select_individuelUser($tempValue){

        global $res;
        include "mvc/model/db_connect_model.php";

        $res = $pdo->prepare("SELECT * FROM rosetta_users WHERE $tempValue = :$tempValue");

    }//ENDE function select_user($tempId)


    //----------------------------------------------------------------------------------------------------

    /*
     * Funktion zum Filtern der Daten
     */
    public function select_filteredData($tempItem){

        global $res;
        include "mvc/model/db_connect_model.php";

        $cat = 'item_de, item_fr, item_it, category, info, carline';

        $res = $pdo->query("SELECT * FROM rosetta_data WHERE CONCAT_WS('',$cat) LIKE '%" . $tempItem . "%'");

    }//ENDE function select_individuelData($cat,$tempItem)


    //----------------------------------------------------------------------------------------------------

    /*
     * Funktion zum Suchen der Daten
     */
    public function select_searchedData($tempItem){

        global $res;
        include "mvc/model/db_connect_model.php";

        $cat = 'item_de, item_fr, item_it, category, info, carline';

        $res = $pdo->query("SELECT * FROM rosetta_data WHERE CONCAT_WS('',$cat) LIKE '%" . $tempItem . "%' AND state LIKE 'active'");

    }//ENDE function select_individuelData($cat,$tempItem)


    //----------------------------------------------------------------------------------------------------

    /**
     * @param $db
     */
    public function select_completeDB($db){

        global $res;
        include "mvc/model/db_connect_model.php";

        $res = $pdo->query("SELECT * FROM $db");

    }//ENDE function select_completeDB($db)


    //----------------------------------------------------------------------------------------------------

    /**
     * @param $db
     * @param $column
     * @param $value
     */
    public function select_specificDB($db, $column, $value){

        global $res;
        include "mvc/model/db_connect_model.php";

        $res = $pdo->query("SELECT * FROM $db WHERE $column LIKE $value");

    }//ENDE function select_specificDB($db, $column, $value)


    //----------------------------------------------------------------------------------------------------

}
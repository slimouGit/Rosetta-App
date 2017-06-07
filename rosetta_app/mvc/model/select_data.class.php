<?php

/**
 * Created by PhpStorm.
 * User: salimoussayfi
 * Date: 07.06.17
 * Time: 18:11
 */
class select_data
{
    public function select_item($tempId){

        global $res;
        include "mvc/model/db_connect_model.php";

        //---------------------------------------------------------------------------------------

        $res = $pdo->query("SELECT * FROM rosetta_data WHERE data_id LIKE $tempId");

        //---------------------------------------------------------------------------------------
    }//ENDE function select_item($tempId)
}
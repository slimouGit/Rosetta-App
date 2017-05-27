<?php
/**
 * Created by PhpStorm.
 * User: salim
 * Date: 27.05.2017
 * Time: 17:52
 */

$var = "Dieser Text soll dem Controller übergeben werden";


    require "mc/model/insert_item.class.php";
    insert_item::insertData($var);
?>
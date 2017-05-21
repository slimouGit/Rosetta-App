<?php


class connectData
{
    public static function showCompleteData()
    {
        //include connection to database
        include "db_connect.php";

        $res = $pdo->query("SELECT * FROM `rosetta_data`");

        foreach ($res AS $row){
            var_dump($row);
        };
    }
}
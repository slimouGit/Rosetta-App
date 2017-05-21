<?php


class table_items
{
    public static function showCompleteData()
    {
        self::showData("complete");
    }

    public static function showActiveData()
    {
        self::showData("active");
    }

    public static function showDeletedData()
    {
        self::showData("deleted");
    }

    function showData($temp){

        $path = str_replace("model","controller",__DIR__);
        include $path."/db_connect.php";

        $res = $pdo->query("SELECT * FROM `rosetta_data`");

        foreach ($res AS $row){
            if($row["state"]==$temp) {

                var_dump($row);
                echo "<br/><br/>";

            }
        };
    }
}
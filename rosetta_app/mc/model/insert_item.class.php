<?php

/**
 * Created by PhpStorm.
 * User: salim
 * Date: 27.05.2017
 * Time: 17:51
 */
class insert_item
{
    public static function insertData($var1,$var2,$var3,$var4,$var5,$var6,$var7)
    {
        self::insertItem($var1,$var2,$var3,$var4,$var5,$var6,$var7);
    }


    function insertItem($var1,$var2,$var3,$var4,$var5,$var6,$var7){

        global $res;

        //Erstellen eines einzigartigen tokens dient dazu, wenn der letzte eingetragene Datensatz angezeigt wird
        //da hier noch nicht mit der ID gearbeitet werden kann
        $token = bin2hex(openssl_random_pseudo_bytes(16));
        $token = (string)$token;
        //------------------------------------------------------------------------------------------

        $item_de = $_POST['item_de'];
        $item_fr = $_POST['item_fr'];
        $item_it = $_POST['item_it'];
        $category = $_POST['category'];
        $info = $_POST['info'];

        //------------------------------------------------------------------------------------------
        //Pruefung, ob checkboxen ausgewaehlt wurden
        if(!empty($_POST['carline'])) {
            //das Array carline wird ueber implode in $car gespeichert
            $car = implode(', ', $_POST['carline']);
        }
        //falls keine Carline genannt wurde, wird die Variable mit General belegt
        if(empty($car)) {
            $car = 'General';
        }
        //------------------------------------------------------------------------------------------

        //include connection to database
        include "mc/controller/db_connect.php";

        $res = $pdo->prepare("INSERT INTO rosetta_data (token, item_de, item_fr, item_it, category, info, carline, user_create) VALUES (:token, :item_de, :item_fr, :item_it, :category, :info, :carline, :user_create)");
        $res->execute(array('token' => $token, 'item_de' => $item_de, 'item_fr' => $item_fr, 'item_it' => $item_it, 'category' => $category, 'info' => $info, 'carline' => $car, 'user_create' => $username));

        //Eintrag anzeigen
        $res = $pdo->query("SELECT * FROM rosetta_data WHERE token LIKE '" . $token . "' ");
}

}
<?php
/**
 * Created by PhpStorm.
 * User: salim
 * Date: 06.06.2017
 * Time: 11:54
 */

if(empty($_POST['email'])){
    $_POST['email']="";
}

if(empty($_POST['password'])){
    $_POST['password']="";
}

if(empty($_POST['password2'])){
    $_POST['password2']="";
}

if(empty($_POST['forename'])){
    $_POST['forename']="";
}

if(empty($_POST['surname'])){
    $_POST['surname']="";
}

//carlineArray initialisieren
$carlineArray = array(
    "ADAM",
    "Ampera",
    "Antara",
    "AstraST",
    "AstraNG",
    "Cascada",
    "ComboKastenwagen",
    "ComboPassenger",
    "Corsa",
    "Corsa",
    "GTC_OPC",
    "InsigniaGS",
    "InsigniaST",
    "KARL",
    "Meriva",
    "MokkaX",
    "MovanoCombiBus",
    "MovanoFahrgestell",
    "MovanoVan",
    "Vivaro",
    "Zafira",
);
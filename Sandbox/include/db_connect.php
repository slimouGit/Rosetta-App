<?php


/*
//online
$con = mysqli_connect("rdbms.strato.de","U2881460","Rosetta-App_1");
mysqli_select_db($con, "DB2881460");
*/

//local
$con = mysqli_connect("","root");
//mysqli_query($con, "SET NAMES 'utf8'");

mysqli_query($con, "SET NAMES SET 'utf8'");
mysqli_query($con, "SET character_set_client = 'utf8'");
mysqli_query($con, "SET character_set_connection = 'utf8'");

mysqli_select_db($con, "rosetta-app");

?>
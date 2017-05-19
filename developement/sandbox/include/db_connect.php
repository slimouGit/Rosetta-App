<?php

//local
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'rosetta-app';




/*
//online
$dbHost = 'rdbms.strato.de';
$dbUsername = 'U2881460';
$dbPassword = 'Rosetta-App_1';
$dbName = 'DB2881460';
*/




//connection
$con = mysqli_connect($dbHost,$dbUsername,$dbPassword );
mysqli_query($con, "SET NAMES SET 'utf8'");
mysqli_query($con, "SET character_set_client = 'utf8'");
mysqli_query($con, "SET character_set_connection = 'utf8'");
mysqli_select_db($con, $dbName);



?>
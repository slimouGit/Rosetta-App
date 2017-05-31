<?php


//include db connection
include "include/db_connect.php";


//get search term
$searchTerm = $_GET['term'];

//get matched data from skills table
$res = $pdo->query("SELECT * FROM rosetta_data WHERE item_de LIKE '%".$searchTerm."%' ORDER BY de ASC");
while ($row = $res->fetch()) {
    $data[] = $row['item_de'];
    $data[] = $row['item_fr'];
}

//return json data
echo json_encode($data);
?>
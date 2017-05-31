<?php


//include db connection
include "db_connect.php";

//$searchTem mit Variable "term" aus jquery-ui.js initialisieren
$searchTerm = $_GET['term'];

//
$searchCategory = 'item_de, item_fr, item_it, category, info';

//der Eintrag muss auf 'active' gesetzt sein
$query = $pdo->query("SELECT * FROM rosetta_data WHERE CONCAT_WS('',$searchCategory) LIKE '%".$searchTerm."%' AND state LIKE 'active' ORDER BY item_de ASC");
while ($row = $query->fetch()) {
    $data[] = $row['item_de'];
    $data[] = $row['item_fr'];
    $data[] = $row['item_it'];
}

//JSON-Object zurueckgeben
echo json_encode($data);

?>
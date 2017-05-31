    <?php

    include "db_connect.php";

//get search term
$searchTerm = $_GET['term'];

//get matched data from skills table
$query = $pdo->query("SELECT * FROM rosetta_data WHERE CONCAT_WS('',item_de, item_fr) LIKE '%".$searchTerm."%' ORDER BY item_de ASC");
while ($row = $query->fetch()) {
    $data[] = $row['item_de'];
    $data[] = $row['item_fr'];
}

//return json data
echo json_encode($data);
?>
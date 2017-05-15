<?php
//database configuration
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'rosetta-app';

//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

//get search term
$searchTerm = $_GET['term'];

//get matched data from skills table
$query = $db->query("SELECT * FROM rosetta_data WHERE CONCAT_WS('',de, fr) LIKE '%".$searchTerm."%' ORDER BY de ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['de'];
    $data[] = $row['fr'];
}

//return json data
echo json_encode($data);
?>
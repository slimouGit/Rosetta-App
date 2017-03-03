<?php
//offline

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'rosetta-app';

//online
/*
$dbHost = 'rdbms.strato.de';
$dbUsername = 'U2881460';
$dbPassword = 'Rosetta-App_1';
$dbName = 'DB2881460';
*/

//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

//get search term
$searchTerm = $_GET['term'];

//Pruefung, ob checkboxen ausgewaehlt wurden
if(!empty($_POST['category'])) {
    //das Array carline wird ueber implode in $car gespeichert
    $cat = implode(',  ', $_POST['category']);
}
//falls keine checkbox aktiv, wird in allen Spalten gesucht
if(empty($cat)) {
    $cat = 'de, fr, it, en, rubrik, info, carline';
}


//get matched data from skills table
$query = $db->query("SELECT * FROM rosetta_data WHERE CONCAT_WS('',$cat) LIKE '%".$searchTerm."%' ORDER BY de ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['de'];
    $data[] = $row['fr'];
    $data[] = $row['it'];
    //$data[] = $row['en'];
    //$data[] = $row['rubrik'];
    //$data[] = $row['info'];
    //$data[] = $row['carline'];

}

//return json data
echo json_encode($data);
?>
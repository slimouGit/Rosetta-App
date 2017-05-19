<?php
//include db connection
include "include/db_connect.php";
?>


<?php
//connect with the database
$con = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
//get search term
$searchTerm = $_GET['term'];
//Pruefung, ob checkboxen ausgewaehlt wurden
if(!empty($_POST['category'])) {
    //das Array carline wird ueber implode in $car gespeichert
    $cat = implode(',  ', $_POST['category']);
    //$cat = 'de, fr, it';
}
//falls keine checkbox aktiv, wird in allen Spalten gesucht
if(empty($cat)) {
    $cat = 'de, fr, it';
}
//get matched data from skills table
$query = $con->query("SELECT * FROM rosetta_data WHERE CONCAT_WS('',$cat) LIKE '%".$searchTerm."%' ORDER BY de ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = utf8_encode($row['de']);
    $data[] = utf8_encode($row['fr']);
    $data[] = utf8_encode($row['it']);
    //$data[] = $row['en'];
    //$data[] = $row['rubrik'];
    //$data[] = $row['info'];
    //$data[] = $row['carline'];
}
//return json data
echo json_encode($data);
?>
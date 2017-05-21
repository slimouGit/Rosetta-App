<?php


$res = $pdo->query("SELECT * FROM `rosetta_data`");

foreach ($res AS $row){
    var_dump($row);
};

?>
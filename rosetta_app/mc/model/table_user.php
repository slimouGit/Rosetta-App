<?php

//query
$res = $pdo->query("SELECT * FROM `rosetta_users`");

foreach ($res AS $row){
    var_dump($row);
    echo "<br/><br/>";
};
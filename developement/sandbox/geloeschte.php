<?php
//include header
include "elements/header.php";
?>

<?php
//include db connection
include "include/db_connect.php";
?>

<h2>Daten gelöscht</h2>
<p>Die gelöschten Daten werden angezeigt.</p>

<?php



    //---------------------------------------------------
    //Den Datensatz, der gesucht wurde, anzeigen
    $sql = "select * from rosetta_data_deleted";
    $res = mysqli_query($con, $sql);
    $num = mysqli_num_rows($res);

    //include table
    include "include/view_table_deleted.php";
    //---------------------------------------------------


    //close connection
    mysqli_close($con);

?>

<p>Zurueck zum <a href="index.php">Start</a></p>

<?php
//include footer
include "elements/footer.html";
?>

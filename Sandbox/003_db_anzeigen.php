<?php
//include header
include "elements/header.html";
?>

<?php
//include navigation
include 'elements/navigation.php';
?>

<?php
//include db connection
include "include/connect_db.php";
?>

    <form action = "003_db_aendern_b.php" method = "post">
        <?php

        /* SQL-Abfrage ausfuehren */
        $res = mysqli_query($con, "select * from rosetta_data");


        //include table
        include "include/view_table.php";


        //close connection
        mysqli_close($con);


        /* Anzahl Datensaetze ermitteln und ausgeben */
        $num = mysqli_num_rows($res);
        echo "$num Datensaetze gefunden<br />";
        ?>

        <p><input type="submit" value="anzeigen" /></p>
    </form>

<?php
//include footer
include "elements/footer.html";
?>

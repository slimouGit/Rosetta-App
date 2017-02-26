<?php
//include header
include "elements/header.php";
?>

<?php
//include db connection
include "include/db_connect.php";
?>

    <?php

    if (isset($_POST["auswahl"]))
    {

        //---------------------------------------------------
        //Den Datensatz, der gesucht wurde, anzeigen
        $sql = "select * from rosetta_data";
        $sql .= " where id like '" . $_POST["auswahl"] . "'";
        $res = mysqli_query($con, $sql);
        $num = mysqli_num_rows($res);

        //include table
        include "include/view_table_withoutEdit.php";
        //---------------------------------------------------


       $sql = "delete from rosetta_data where id = '" . $_POST["auswahl"] . "'";
       mysqli_query($con, $sql);

       $num = mysqli_affected_rows($con);

       if ($num>0)
          echo "<p>Der Datensatz wurde geloescht</p>";
       else
          echo "<p>Der Datensatz wurde nicht geloescht</p>";

        //close connection
        mysqli_close($con);
    }
    else
       echo "<p>Es wurde kein Datensatz ausgewaehlt</p>";

    ?>

    <p>Zurueck zur <a href="003_db_loeschen_a.php">Auswahl</a></p>

<?php
//include footer
include "elements/footer.html";
?>

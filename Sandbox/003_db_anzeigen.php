<?php
//include header
include "elements/header.php";
?>

<h2>Ausgabe aller Datensätze</h2>
<p>Dieser Bereich wird später nicht sichtbar sein, weil unübersichtlich (zu viele Daten) und man gelangt ja zu dem relevanten Eintrag über die Suchfunktion</p>

<?php
//include db connection
include "include/db_connect.php";
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
        //echo "$num Datensaetze gefunden<br />";
        ?>
        <!--
        <p><input type="submit" value="anzeigen" /></p>
        <input type="submit" name="calc" value="Find Angle">

        <input  type="submit" value="Ändern" formaction="003_db_aendern_b.php"></button>
        <input  type="submit" value="Löschen" formaction="003_db_loeschen_b.php"></button>
        -->
    </form>

<?php
//include footer
include "elements/footer.html";
?>

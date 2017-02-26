<?php
//include header
include "elements/header.php";
?>

<h2>Ändern eines Eintrags</h2>
<p>Ist später auch nicht nötig, da über Suchergebnis erreichbar</p>

<?php
//include db connection
include "include/db_connect.php";
?>

    <form action = "003_db_aendern_b.php" method = "post">
        <?php

            $res = mysqli_query($con, "select * from rosetta_data");
            $num = mysqli_num_rows($res);

            //include table
            include "include/view_table.php";


            //close connection
            mysqli_close($con);
        ?>
        <!--
        <p><input type="submit" value="anzeigen" /></p>
        -->
    </form>

<?php
//include footer
include "elements/footer.html";
?>

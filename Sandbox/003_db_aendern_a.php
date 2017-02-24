<?php
//include header
include "elements/header.html";
?>

<?php
//include navigation
include 'elements/navigation.php';
?>

<h2>Form control: inline checkbox</h2>
<p>The form below contains three inline checkboxes:</p>

<?php
//include db connection
include "include/connect_db.php";
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

        <p><input type="submit" value="anzeigen" /></p>

    </form>

<?php
//include footer
include "elements/footer.html";
?>

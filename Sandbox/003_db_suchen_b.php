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

    <?php

        $var = $_POST['taskOption'];
        //$var = implode(',', $_POST['taskOption']);

        $sql = "select * from rosetta_data";
        //$sql .= " where $var like '%" . $_POST["search"] . "%' ";
        //$sql .= " where CONCAT_WS($var) like '%" . $_POST["search"] . "%' ";
        $sql .=" WHERE CONCAT_WS('', de, fr, it, en, rubrik, info, carline) LIKE '%" . $_POST["search"] . "%'";

    $res = mysqli_query($con, $sql);
        $num = mysqli_num_rows($res);
        if ($num==0) echo "Keine passenden Datensaetze gefunden";
        else{
        ?>

        <form action = "003_db_aendern_b.php" method = "post">

        <?php

        //include table
        include "include/view_table.php";

        //close connection
        mysqli_close($con);
        ?>

        <p><input type="submit" value="anzeigen" /></p>
        </form>

        <?php
        }
    ?>

<?php
//include footer
include "elements/footer.html";
?>

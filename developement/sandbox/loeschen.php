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

    if (isset($_POST["delete"]))
    {

        //---------------------------------------------------
        //Den Datensatz, der gesucht wurde, anzeigen
        $sql = "select * from rosetta_data";
        $sql .= " where id like '" . $_POST["delete"] . "'";
        $res = mysqli_query($con, $sql);
        $num = mysqli_num_rows($res);

        //include table
        include "include/view_table_withoutEdit.php";
        //---------------------------------------------------

        //Daten werden in Tabelle rosetta_data_deleted gespecihert
        $switch = "select * from rosetta_data where id = '" . $_POST['delete'] . "'";
        $res = mysqli_query($con, $switch);
        $dsatz = mysqli_fetch_assoc($res);


        $switch = "insert rosetta_data_deleted"
            . "(token, de, comment_de, comment_de_user, fr, comment_fr, comment_fr_user, it, comment_it, comment_it_user, rubrik, info, carline, user, updateBy, deleted_by) values "
            . "('" . $dsatz['token'] . "', "  .  "'" . $dsatz['de'] . "', " .  "'" . $dsatz['comment_de'] . "', " .  "'" . $dsatz['comment_de_user'] . "', " .  "'" . $dsatz['fr'] . "', "  .  "'" . $dsatz['comment_fr'] . "', "  .  "'" . $dsatz['comment_fr_user'] . "', " .  "'" . $dsatz['it'] . "', " .  "'" . $dsatz['comment_it'] . "', " .  "'" . $dsatz['comment_it_user'] . "', " .  "'" . $dsatz['rubrik'] . "', " .  "'" . $dsatz['info'] . "', " .  "'" . $dsatz['carline'] . "', " .  "'" . $dsatz['user'] . "', " .  "'" . $dsatz['updateBy'] . "', " .  "'" . $username . "')";

        mysqli_query($con, $switch);

        //---------------------------------------------------------
        //Daten werden aus Tabelle rosetta_data geloescht

        $sql = "delete from rosetta_data where id = '" . $_POST["delete"] . "'";
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

    <p>Zurueck zum <a href="index.php">Start</a></p>

<?php
//include footer
include "elements/footer.html";
?>

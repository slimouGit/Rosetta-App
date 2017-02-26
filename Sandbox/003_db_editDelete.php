<html>
<head>
    <title>Rosetta-App</title>
</head>
<?php
//include header
include "elements/header.php";
?>

<?php
//include db connection
include "include/db_connect.php";
?>

<?php

if (isset($_POST["edit"])) {

    if (($_POST["edit"]) == "update") {
        echo $_POST["edit"];
        $update = $_POST["edit"];

        $sql = "select * from rosetta_data where id = '" . $_POST["edit"] . "'";
        $res = mysqli_query($con, $sql);
        $dsatz = mysqli_fetch_assoc($res);

        echo "<form action = '003_db_aendern_c.php' method = 'post'>";

        echo "<p><input type='hidden' name='id' value='" . $_POST["edit"] . "' /> </p>";
        echo "<p><input name='dts' value='" . $dsatz["de"] . "' /> Deutsch</p>";
        echo "<p><input name='frz' value='" . $dsatz["fr"] . "' /> Französisch</p>";
        echo "<p><input name='itl'  value='" . $dsatz["it"] . "' /> Italienisch</p>";
        echo "<p><input name='eng' value='" . $dsatz["en"] . "' /> Englisch</p>";
        echo "<p><input name='rub' value='" . $dsatz["rubrik"] . "' /> Rubrik</p>";
        echo "<p><input name='inf' value='" . $dsatz["info"] . "' /> Info/</p>";
        echo "<p><input name='car' value='" . $dsatz["carline"] . "' /> Carline</p>";
        echo "<input type='hidden' name='orianr' value='" . $_POST["edit"] . "' />";

        echo "<p><input type='submit' value='Aenderung speichern'>";
        echo "<input type='reset' /></p>";

        echo "</form>";

        //close connection
        mysqli_close($con);
    }
//else
    //echo "<p>Es wurde kein Datensatz zum Bearbeiten ausgewaehlt</p>";
    else {

        echo $_POST["edit"];
        //---------------------------------------------------
        //Den Datensatz, der gesucht wurde, anzeigen
        $sql = "select * from rosetta_data";
        $sql .= " where id like '" . $_POST["edit"] . "'";
        $res = mysqli_query($con, $sql);
        $num = mysqli_num_rows($res);

        //include table
        include "include/view_table_withoutEdit.php";
        //---------------------------------------------------


        $sql = "delete from rosetta_data where id = '" . $_POST["edit"] . "'";
        mysqli_query($con, $sql);

        $num = mysqli_affected_rows($con);

        if ($num > 0)
            echo "<p>Der Datensatz wurde geloescht</p>";
        else
            echo "<p>Der Datensatz wurde nicht geloescht</p>";

        //close connection
        mysqli_close($con);
    }
//else
    //echo "<p>Es wurde kein Datensatz zum Loeschen ausgewaehlt</p>";
}
?>

<?php
//include footer
include "elements/footer.html";
?>


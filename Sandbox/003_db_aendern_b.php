<html>
<head>
    <title>Rosetta-App</title>
</head>
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

    if (isset($_POST["auswahl"]))
    {
        $sql = "select * from rosetta_data where id = '" . $_POST["auswahl"] . "'";
        $res = mysqli_query($con, $sql);
        $dsatz = mysqli_fetch_assoc($res);

        echo "<form action = '003_db_aendern_c.php' method = 'post'>";

            echo "<p><input type='hidden' name='id' value='" . $_POST["auswahl"] . "' /> </p>";
            echo "<p><input name='dts' value='" . $dsatz["de"] . "' /> Deutsch</p>";
            echo "<p><input name='frz' value='" . $dsatz["fr"] . "' /> Französisch</p>";
            echo "<p><input name='itl'  value='" . $dsatz["it"] . "' /> Italienisch</p>";
            echo "<p><input name='eng' value='" . $dsatz["en"] . "' /> Englisch</p>";
            echo "<p><input name='rub' value='" . $dsatz["rubrik"] . "' /> Rubrik</p>";
            echo "<p><input name='inf' value='" . $dsatz["info"] . "' /> Info/</p>";
            echo "<p><input name='car' value='" . $dsatz["carline"] . "' /> Carline</p>";
            echo "<input type='hidden' name='orianr' value='" . $_POST["auswahl"] . "' />";

            echo "<p><input type='submit' value='Aenderung speichern'>";
            echo "<input type='reset' /></p>";

        echo "</form>";

        //close connection
        mysqli_close($con);
    }
    else
       echo "<p>Es wurde kein Datensatz ausgewaehlt</p>";
    ?>

<?php
//include footer
include "elements/footer.html";
?>


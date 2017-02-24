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

//Pruefung, ob checkboxen ausgewaehlt wurden
if(!empty($_POST['carline'])) {
    //das Array carline wird ueber implode in $car gespeichert
    $car = implode(',', $_POST['carline']);
}
//
if(empty($car)) {
    $car = 'General';
}



if (isset($_POST["gesendet"]))
{

    $sql = "insert rosetta_data"
        . "(de, fr, it, en, rubrik, info, carline) values "
        . "('" . $_POST["dts"] . "', "  .  "'" . $_POST["frz"] . "', " .  "'" . $_POST["itl"] . "', " .  "'" . $_POST["eng"] . "', " .  "'" . $_POST["rub"] . "', " .  "'" . $_POST["inf"] . "', " .  "'" . $car . "')";

    mysqli_query($con, $sql);

    $num = mysqli_affected_rows($con);
    if ($num>0)
    {
        echo "<p><font color='#00aa00'>";
        echo "Es wurde 1 Datensatz hinzugefuegt";
        echo "</font></p>";

        echo "<form action = \"003_db_aendern_b.php\" method = \"post\">";

            //---------------------------------------------------
            //Den Datensatz, der ertsellt wurde, anzeigen

            $sql = "select * from rosetta_data";
            $sql .= " where de like '" . $_POST["dts"] . "' ";
            $res = mysqli_query($con, $sql);
            $num = mysqli_num_rows($res);

            //include table
            include "include/view_table.php";
            //---------------------------------------------------

            echo "<p><input type=\"submit\" value=\"anzeigen\" /></p>";

        echo "</form>";

    }
    else
    {
        echo "<p><font color='#ff0000'>";
        echo "Es ist ein Fehler aufgetreten, ";
        echo "es wurde kein Datensatz hinzugefuegt";
        echo "</font></p>";
    }

    //close connection
    mysqli_close($con);

}

?>

<?php
//include footer
include "elements/footer.html";
?>

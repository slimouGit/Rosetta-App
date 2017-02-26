<?php
//include header
include "elements/header.php";
?>

<?php
//include db connection
include "include/db_connect.php";
?>

    <?php

//Pruefung, ob checkboxen ausgewaehlt wurden
if(!empty($_POST['carline'])) {
    //das Array carline wird ueber implode in $car gespeichert
    $car = implode(', ', $_POST['carline']);
}
//
if(empty($car)) {
    $car = 'General';
}

    $sql = "update rosetta_data set id = '" . $_POST["id"] . "',"
        . " de = '" . $_POST["dts"] . "',"
        . " fr = '" . $_POST["frz"] . "',"
        . " it = '" . $_POST["itl"] . "',"
        . " en = '" . $_POST["eng"] . "',"
        . " rubrik = '" . $_POST["rub"] . "',"
        . " info = '" . $_POST["inf"] . "',"
        . " carline = '" . $car . "'"
        . " where id = '" . $_POST["orianr"] . "'";

    mysqli_query($con, $sql);

    $num = mysqli_affected_rows($con);

    if ($num>0)
        echo "<p>Der Datensatz wurde geaendert</p>";
    else
        echo "<p>Der Datensatz wurde nicht geaendert</p>";

    echo "<form action = \"003_db_aendern_b.php\" method = \"post\">";

    //---------------------------------------------------
    //Den Datensatz, der gesucht wurde, anzeigen
    $sql = "select * from rosetta_data";
    $sql .= " where id like '" . $_POST["id"] . "' ";
    $res = mysqli_query($con, $sql);
    $num = mysqli_num_rows($res);

    //include table
    include "include/view_table.php";
    //---------------------------------------------------

    //close connection
    mysqli_close($con);

//echo "<p><input type=\"submit\" value=\"anzeigen\" /></p>";

echo "</form>";

    ?>


<?php
//include footer
include "elements/footer.html";
?>

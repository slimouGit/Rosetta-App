<?php
//include header
include "elements/header.php";
?>

<?php
//include db connection
include "include/db_connect.php";
?>

<h2>Daten erstellt</h2>
<p>Neuer Datensatz wird angezeigt.</p>

<?php

//Pruefung, ob checkboxen ausgewaehlt wurden
if(!empty($_POST['carline'])) {
    //das Array carline wird ueber implode in $car gespeichert
    $car = implode(', ', $_POST['carline']);
}
//falls keine Carline genannt wurde, wird die Variable mit General belegt
if(empty($car)) {
    $car = 'General';
}
/*
if(!empty($_POST['translate'])) {
    $translate = $_POST['translate'];
}else{
    $translate = "false";
}
*/
if(isset($_POST['translate'])) {
    $translate = "true";
}else{
    $translate = "false";
}

//Datum
$datum = date("d.m.Y");
$uhrzeit = date("H:i");
$create = $datum . " " . $uhrzeit . " Uhr";
echo $create;


//echo $_POST['translate'];
//Erstellen eines einzigartigen tokens
//dient dazu, wenn der letzte eingetragene Datensatz angezeigt wird
//da hier noch nicht mit der ID gearbeitet werden kann
$token = bin2hex(openssl_random_pseudo_bytes(16));
$token = (string)$token;


if (isset($_POST["gesendet"]))
{

    $sql = "insert rosetta_data"
        . "(token, de, fr, it, rubrik, info, carline, user) values "
        . "('" . $token . "', "  .  "'" . $_POST["dts"] . "', " .  "'" . $_POST["frz"] . "', " .  "'" . $_POST["itl"] . "', " .  "'" . $_POST["rub"] . "', " .  "'" . $_POST["inf"] . "', " .  "'" . $car . "', " .  "'" . $username . "')";

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
            $sql .= " where token like '" . $token . "' ";
            $res = mysqli_query($con, $sql);
            $num = mysqli_num_rows($res);

            //include table
            include "include/view_table.php";
            //---------------------------------------------------

           // echo "<p><input type=\"submit\" value=\"anzeigen\" /></p>";

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

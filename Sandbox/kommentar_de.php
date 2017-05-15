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



<h2>Kommentar</h2>

<?php

if (isset($_POST['update']) ? $_POST['update'] : '')
{


    $sql = "select * from rosetta_data where id = '" . $_POST['update'] . "'";
    $res = mysqli_query($con, $sql);
    $dsatz = mysqli_fetch_assoc($res);



    echo "<form action = 'kommentar_de.php' method = 'post'>";

    echo "<div class='results'><!--in diesem container werden die Fragezeichen geloescht -->";

    echo "<p><input type='hidden' name='id' value='" . $_POST['update'] . "' /> </p>";
    echo "
                    <div class=\"row\">
                        <div class=\"form-group\">
                            <label class=\"col-sm-2 control-label\">Deutsch</label>
                            <div class=\"col-sm-6\">
                                
                                <input disabled class=\"form-control\" name=\"dts\" value='" . utf8_encode($dsatz["de"]) . "'>
                            </div>
                            <div class=\"col-sm-4 errorContainer\"></div>
                        </div>
                    </div>
            
                    ";

    echo "
                    <div class=\"row\">
                        <div class=\"form-group\">
                            <label class=\"col-sm-2 control-label\">Kommentar</label>
                            <div class=\"col-sm-6\">
                               <!-- <input class=\"form-control\" name=\"com_de\" value='" . utf8_encode($dsatz["comment_de"]) . "'>-->
                                <textarea onkeyup='auto_grow(this)' type='text' class='form-control' name='com_de'>". utf8_encode($dsatz["comment_de"]) ."</textarea>
                            </div>
                            <div class=\"col-sm-4 errorContainer\"></div>
                        </div>
                    </div>
            
                    ";


    echo "<input type='hidden' name='orianr' value='" . $_POST["update"] . "' />";

    echo "
                <div class=\"row button\">
                    <div class=\"form-group\">
                        <div class=\"col-sm-2\"></div>
                        <div class=\"col-sm-1\">
                            <input type=\"submit\" class=\"btn btn-primary\" value=\"Kommentieren\" name=\"kommentar\"></input>
                        </div>
                        
                    </div>
                </div>
                
                ";

    echo "</div>";

    echo "</form>";

    //close connection
    mysqli_close($con);
}
else
    echo "<p>Es wurde kein Datensatz uebergeben, bitte folgende Browser verwenden: Google Chrome, Safari</p>";
?>

<?php

if (isset($_POST["kommentar"])) {

    $sql = "update rosetta_data set id = '" . $_POST["id"] . "',"
        . " comment_de = '" . $_POST["com_de"] . "',"
        . " comment_de_user = '" . $username . "'"
        . " where id = '" . $_POST["orianr"] . "'";



    mysqli_query($con, $sql);

    $num = mysqli_affected_rows($con);

    if ($num>0)
        echo "<p>Der Datensatz wurde geaendert</p>";
    else
        echo "<p>Der Datensatz wurde nicht geaendert</p>";

    echo ">";

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

}
?>

<?php
//include footer
include "elements/footer.html";
?>

<script>
    function auto_grow(element) {
        element.style.height = "5px";
        element.style.height = (element.scrollHeight)+"px";
    }
</script>
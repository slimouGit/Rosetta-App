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



<h2>Daten ändern</h2>
<p>Bestehende Daten werden angezeigt und können geändert werden.</p>

<?php

if (isset($_POST['update']) ? $_POST['update'] : '')
{
    $sql = "select * from rosetta_users where id = '" . $_POST['update'] . "'";
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($res);

    echo $row['vorname']."</br>";
    $authorizations = $row['authorizations'];
    $id = $row['id'];
    var_dump($authorizations);

    echo "
        <form action=\"?update=1\" method=\"post\">
        <input type='hidden' name='id' value='" . $row["id"] . "'>
        <div class=\"row\">
            <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\">Vorname</label>
                <div class=\"col-sm-6\">
                    <input type=\"text\" class=\"form-control\" size=\"40\" maxlength=\"250\" name=\"vorname\" value='" . utf8_encode($row["vorname"]) . "'>
                </div>
                <div class=\"col-sm-4 errorContainer\"></div>
            </div>
        </div>";

    echo "
        <div class=\"row\">
            <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\">Nachname</label>
                <div class=\"col-sm-6\">
                    <input type=\"text\" class=\"form-control\" size=\"40\" maxlength=\"250\" name=\"nachname\" value='" . utf8_encode($row["nachname"]) . "'>
                </div>
                <div class=\"col-sm-4 errorContainer\"></div>
            </div>
        </div>";

    echo "

        <div class=\"row\">
            <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\">E-Mail</label>
                <div class=\"col-sm-6\">
                    <input type=\"email\" class=\"form-control\" size=\"40\" maxlength=\"250\" name=\"email\" value='" . utf8_encode($row["email"]) . "'>
                </div>
                <div class=\"col-sm-4 errorContainer\"></div>
            </div>
        </div>";

    echo "

        <div class=\"row\">
            <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\">Autorisation</label>
                <div class=\"col-sm-6\">
                    <input type=\"text\" class=\"form-control\" size=\"40\" maxlength=\"250\" name=\"authorizations\" value='" . utf8_encode($row["authorizations"]) . "'>
                </div>
                <div class=\"col-sm-4 errorContainer\"></div>
            </div>
        </div>";

    echo "

        <div class=\"row\">
            <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\">Passwort</label>
                <div class=\"col-sm-6\">
                    <input type=\"password\" class=\"form-control\" size=\"40\"  maxlength=\"250\" name=\"passwort\" value='" . utf8_encode($row["passwort"]) . "'>
                </div>
                <div class=\"col-sm-4 errorContainer\"></div>
            </div>
        </div>";

    echo "

        <div class=\"row\">
            <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\">Passwort wiederholen</label>
                <div class=\"col-sm-6\">
                    <input type=\"password\" class=\"form-control\" size=\"40\"  maxlength=\"250\" name=\"passwort2\">
                </div>
                <div class=\"col-sm-4 errorContainer\"></div>
            </div>
        </div>";

    echo "

        <div class=\"row\">
            <div class=\"form-group\">
                <div class=\"col-sm-2\"></div>
                <div class=\"col-sm-1\">
                    <input type=\"submit\" class=\"btn btn-primary\" value=\"Abschicken\"></input>
                </div>
            </div>
        </div>

    </form>";






    //close connection
    mysqli_close($con);
}
else
    echo "<p>Es wurde kein Datensatz ausgewaehlt</p>";
?>

<?php
if(isset($_GET['update'])) {
    echo $_POST['id'] . " Kommt an";
    $id = $_POST['id'];


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

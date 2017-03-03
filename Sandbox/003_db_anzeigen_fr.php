<?php
//include header
include "elements/header.php";
?>

<?php
//include db connection
include "include/db_connect.php";
?>

<h2>Ausgabe aller Datensätze auf Deutsch und Französisch</h2>
<p>Die französische Übersetzung kann vom Übersetzer eingetragen werden.</p>


<script type="text/javascript">
    function send(ak,id)
    {
        if(ak==0)
            document.f.ak.value = "in";
        else if(ak==1)
            document.f.ak.value = "up";
        else if(ak==2)
        {
            if (confirm("Datensatz mit id " + id + " löschen?"))
                document.f.ak.value = "de";
            else
                return;
        }
        document.f.id.value = id;
        document.f.submit();
    }
</script>



<?php


/* Aktion ausf�hren */
if(isset($_POST["ak"]))
{
    /* neu eintragen */
    if($_POST["ak"]=="in")
    {
        /*$sql = "insert rosetta_data"
            . "(id, de, fr) values ('"
            . "('" . $_POST["ident"][0] . "', '" . $_POST["dts"][0] . "', '"  . $_POST["frz"][0] . "')";
        */
        $sql = "INSERT INTO rosetta_data (de, fr, comment_fr)
          VALUES ('" . $_POST["dts"][0] . "', '"  . $_POST["frz"][0] . "', '"  . $_POST["com"][0] . "')";
        mysqli_query($con, $sql);
    }

    /* �ndern */
    else if($_POST["ak"]=="up")
    {
        $id_nr = $_POST["id"];

        $sql = "
                UPDATE rosetta_data SET 
                fr= '" . $_POST["frz"][$id_nr] . "',"
                . "comment_fr = '" . $_POST["com"][$id_nr] . "'"
                . " WHERE id=$id_nr
                ";

        mysqli_query($con, $sql);



    }

    /* l�schen */
    else if($_POST["ak"]=="de")
    {
        $sql = "delete from rosetta_data where id = " . $_POST["id"];
        mysqli_query($con, $sql);
    }
}

/* Formular-Beginn */
echo "<form name='f' action='003_db_anzeigen_fr.php'
               method='post'>";
echo "<input name='ak' type='hidden' />";
echo "<input name='id' type='hidden' />";

/* Tabellen-Beginn */
echo "\n\n<table class=\"table table-hover table-responsive table-striped\">"
    . "<thead>"
    . "<tr>"
    . "<th class=\"col-sm-1\">ID</th>"
    . "<th class=\"col-sm-4\">DE</th>"
    . "<th class=\"col-sm-4\">FR</th>"
    . "<th class=\"col-sm-4\">Kommentar</th>"
    . "<th class=\"col-sm-1\">Aktion</th>"
    . "</tr>"
    . "</thead>";

/* Neuer Eintrag */
echo "\n\n<tr>"
    . "<td><input class='toEdit' name='ident[0]' size='3' /></td>"
    . "<td><input class='toEdit' name='dts[0]' size='40' /></td>"
    . "<td><input class='toEdit' name='frz[0]' size='40' /></td>"
    . "<td><input class='toEdit' name='com[0]' size='40' /></td>"
    . "<td><a href='javascript:send(0,0);'>neu eintragen</a></td>"
    . "</tr>";

/* Anzeigen */
//$res = mysqli_query($con, "select * from rosetta_data where id = 136");
$res = mysqli_query($con, "select * from rosetta_data");

/* Alle vorhandenen Datens�tze */
while ($dsatz = mysqli_fetch_assoc($res))
{
    $id_nr = $dsatz["id"];
    echo "\n\n<tr>"
        . "<td>" . $dsatz["id"] . "</td>"
        . "<td>" . utf8_encode( $dsatz["de"] ) . "</td>"
        . "<td><input class='toEdit' name='frz[$id_nr]' value='" . utf8_encode( $dsatz["fr"] ) . "' size='40' /></td>"
        . "<td><input class='toEdit' name='com[$id_nr]' value='" . utf8_encode( $dsatz["comment_fr"] ) . "' size='40' /></td>"
        . "<td><a href='javascript:send(1,$id_nr);'><img src=\"img/button_agree.png\"></a></td>"
        //. " <a href='javascript:send(2,$id_nr);'><img src=\"img/button_delete.png\"></a></td>"
        . "</tr>";
}
echo "</table>";
echo "</form>";

mysqli_close($con);
?>
</body>
</html>

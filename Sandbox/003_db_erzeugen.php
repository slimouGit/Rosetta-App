<html>
<head>
    <title>Rosetta-App</title>
</head>
<body>
    <?php include 'navigation.php'; ?>

    <?php
    if (isset($_POST["gesendet"]))
    {
        $con = mysqli_connect("","root");
        mysqli_select_db($con, "rosetta-app");

        $sql = "insert rosetta_data"
            . "(de, fr, it, en, rubrik, info, carline) values "
            . "('" . $_POST["dts"] . "', "  .  "'" . $_POST["frz"] . "', " .  "'" . $_POST["itl"] . "', " .  "'" . $_POST["eng"] . "', " .  "'" . $_POST["rub"] . "', " .  "'" . $_POST["inf"] . "', " .  "'" . $_POST["car"] . "')";

        mysqli_query($con, $sql);

        $num = mysqli_affected_rows($con);
        if ($num>0)
        {
            echo "<p><font color='#00aa00'>";
            echo "Es wurde 1 Datensatz hinzugefuegt";
            echo "</font></p>";
        }
        else
        {
            echo "<p><font color='#ff0000'>";
            echo "Es ist ein Fehler aufgetreten, ";
            echo "es wurde kein Datensatz hinzugefuegt";
            echo "</font></p>";
        }

        mysqli_close($con);
    }
    ?>

<form action = "003_db_erzeugen.php" method = "post">
    <p><input name="dts" placeholder="---" /> deutsch</p>
    <p><input name="frz" placeholder="---" /> französisch</p>
    <p><input name="itl" placeholder="---" /> italienisch</p>
    <p><input name="eng" placeholder="---" /> englisch</p>
    <p><input name="rub" placeholder="---" /> Rubrik</p>
    <p><input name="inf" placeholder="---" /> Info</p>
    <p><input name="car" placeholder="---" /> Carline</p>
    <p><input type="submit" name="gesendet" />
        <input type="reset" /></p>
</form>

</body>
</html>

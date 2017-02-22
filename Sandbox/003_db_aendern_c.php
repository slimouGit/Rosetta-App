<html>
<body>

<?php include 'navigation.php'; ?>

<?php
$con = mysqli_connect("","root");
mysqli_select_db($con, "rosetta-app");

$sql = "update rosetta_data set id = '" . $_POST["id"] . "',"
    . " de = '" . $_POST["dts"] . "',"
    . " fr = '" . $_POST["frz"] . "',"
    . " it = '" . $_POST["itl"] . "',"
    . " en = '" . $_POST["eng"] . "',"
    . " rubrik = '" . $_POST["rub"] . "',"
    . " info = '" . $_POST["inf"] . "',"
    . " carline = '" . $_POST["car"] . "'"
    . " where id = '" . $_POST["orianr"] . "'";
mysqli_query($con, $sql);

$num = mysqli_affected_rows($con);
if ($num>0)
    echo "<p>Der Datensatz wurde geaendert</p>";
else
    echo "<p>Der Datensatz wurde nicht geaendert</p>";

mysqli_close($con);
?>
<p>Zurueck zur <a href="003_db_aendern_a.php">Auswahl</a></p>
</body>
</html>

<html>
<head>
    <title>Rosetta-App</title>
</head>
<body>

<?php include 'navigation.php'; ?>

<?php

$con = mysqli_connect("","root");
mysqli_select_db($con, "rosetta-app");

$var = $_POST['taskOption'];

$sql = "select * from rosetta_data";
$sql .= " where $var like '%" . $_POST["search"] . "%' ";

$res = mysqli_query($con, $sql);
$num = mysqli_num_rows($res);
if ($num==0) echo "Keine passenden Datensaetze gefunden";
else{
?>
<form action = "003_db_aendern_b.php" method = "post">
<?php
echo    "<table class=\"table table-hover table-responsive\">".
    "<thead>".

    "<tr>".
    "<th class=\"col-sm-1\">Id</th>".
    "<th class=\"col-sm-2\">De</th>".
    "<th class=\"col-sm-2\">Fr</th>".
    "<th class=\"col-sm-2\">It</th>".
    "<th class=\"col-sm-2\">En</th>".
    "<th class=\"col-sm-2\">Rubrik</th>".
    "<th class=\"col-sm-2\">Info</th>".
    "<th class=\"col-sm-2\">Carline</th>".
    "<th class=\"col-sm-2\">Edit</th>".
    "</tr>".
    "</thead>";

while ($dsatz = mysqli_fetch_assoc($res))
{


    echo    "<tr>".

        "<td>" . $dsatz["id"]        . "</td>".
        "<td>" . $dsatz["de"]        . "</td>".
        "<td>" . $dsatz["fr"]        . "</td>".
        "<td>" . $dsatz["it"]        . "</td>".
        "<td>" . $dsatz["en"]        . "</td>".
        "<td>" . $dsatz["rubrik"]    . "</td>".
        "<td>" . $dsatz["info"]      . "</td>".
        "<td>" . $dsatz["carline"]   . "</td>".
        "<td ><input type='radio' name='auswahl' value='" . $dsatz["id"] . "' /></td>";

    echo    "</tr>";

}
echo    "</table>";

mysqli_close($con);
?>

<p><input type="submit" value="anzeigen" /></p>
</form>

<?php
}
?>

</body>
</html>

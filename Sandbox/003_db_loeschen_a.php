<html>
<body>

<?php include 'navigation.php'; ?>

<form action = "003_db_loeschen_b.php" method = "post">
<?php
   $con = mysqli_connect("","root");
   mysqli_select_db($con, "rosetta-app");

   $res = mysqli_query($con, "select * from rosetta_data");
   $num = mysqli_num_rows($res);

// Tabellenbeginn
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

/* Datensaetze aus Ergebnis ermitteln, */
/* in Array speichern und ausgeben    */
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
<p><input type="submit" value="loeschen" /></p>
</form>
</body>
</html>

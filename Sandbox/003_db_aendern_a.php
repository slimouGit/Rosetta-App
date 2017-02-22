<html>
<head>
    <meta charset="utf-8"/>
    <!-- Bootstrap-->
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://slimou.de/___Bootstrap/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<p>W�hlen Sie aus, welcher Datensatz ge�ndert werden soll:</p>
<form action = "003_db_aendern_b.php" method = "post">
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
<p><input type="submit" value="Datensatz anzeigen" /></p>
    <p>Neuen Datensatz <a href="003_db_erzeugen.php">hinzufuegen</a></p>
</form>
</body>
</html>

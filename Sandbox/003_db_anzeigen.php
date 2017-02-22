<html>
<head>
    <meta charset="utf-8"/>
    <!-- Bootstrap-->
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://slimou.de/___Bootstrap/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
/* Verbindung aufnehmen */
$con = mysqli_connect("","root");

/* Datenbank auswaehlen */
mysqli_select_db($con, "rosetta-app");

/* SQL-Abfrage ausfuehren */
$res = mysqli_query($con, "select * from rosetta_items");

/* Anzahl Datensaetze ermitteln und ausgeben */
$num = mysqli_num_rows($res);
echo "$num Datensaetze gefunden<br />";

echo    "<table class=\"table table-hover table-responsive\">".
    "<thead>".

        "<tr>".
            "<th class=\"col-sm-1\">Id</th>".
            "<th class=\"col-sm-2\">de</th>".
            "<th class=\"col-sm-2\">fr</th>".
            "<th class=\"col-sm-2\">it</th>".
            "<th class=\"col-sm-2\">en</th>".
            "<th class=\"col-sm-2\">info</th>".
            "<th class=\"col-sm-2\">carline</th>".
            "<th class=\"col-sm-2\">code</th>".
        "</tr>".
    "</thead>";

/* Datensaetze aus Ergebnis ermitteln, */
/* in Array speichern und ausgeben    */
while ($dsatz = mysqli_fetch_assoc($res))
{


    echo    "<tr>"

            .   "<td>" . $dsatz["id"]        . "</td>"
            .   "<td>" . $dsatz["de"]        . "</td>"
            .   "<td>" . $dsatz["fr"]        . "</td>"
            .   "<td>" . $dsatz["it"]        . "</td>"
            .   "<td>" . $dsatz["it"]        . "</td>"
            .   "<td>" . $dsatz["info"]      . "</td>"
            .   "<td>" . $dsatz["carline"]   . "</td>"
            .   "<td>" . $dsatz["code"]      . "</td>";

    echo    "</tr>";

}
    echo    "</table>";
/* Verbindung schlie�en */
mysqli_close($con);
?>
</body>
</html>

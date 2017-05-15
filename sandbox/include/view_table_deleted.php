<?php


/**
 * Created by PhpStorm.
 * User: salimoussayfi
 * Date: 23.02.17
 * Time: 09:12
 */
// Tabellenbeginn
echo    "<table class=\"table table-hover table-responsive table-striped\">".
    "<thead>".

    "<tr>".
    "<th class=\"col-sm-1\">Id</th>".
    "<th class=\"col-sm-2\">De</th>".
    "<th class=\"col-sm-2\">Fr</th>".
    "<th class=\"col-sm-2\">It</th>".
    "<th class=\"col-sm-2\">Rubrik</th>".
    "<th class=\"col-sm-2\">Info</th>".
    "<th class=\"col-sm-2\">Carline</th>".
    "<th class=\"col-sm-2\">Gelöscht</th>".
    "<th class=\"col-sm-2\">von</th>".
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
        "<td>" . $dsatz["rubrik"]    . "</td>".
        "<td>" . $dsatz["info"]      . "</td>".
        "<td>" . $dsatz["carline"]   . "</td>".
        "<td>" . $dsatz["date"]   . "</td>".
        "<td>" .  $dsatz["deleted_by"]   . "</td>";

    echo    "</tr>";

}
echo    "</table>";

?>
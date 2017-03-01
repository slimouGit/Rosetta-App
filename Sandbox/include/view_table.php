

<table class="table table-hover table-responsive table-striped">
    <thead>
        <tr>
            <th class="col-sm-1">Id</th>
            <th class="col-sm-2 german">De</a></th>
            <th class="col-sm-2 french">Fr</th>
            <th class="col-sm-2 italy">It</th>
            <th class="col-sm-2 english">En</th>
            <th class="col-sm-2 ">Rubrik</th>
            <th class="col-sm-2">Info</th>
            <th class="col-sm-2">Carline</th>
            <th class="col-sm-2"></th>
            <th class="col-sm-2" colspan="3">Edit</th>
        </tr>
    </thead>
    <tbody class="results">

<?php
/* Datensaetze aus Ergebnis ermitteln, */
/* in Array speichern und ausgeben    */
while ($dsatz = mysqli_fetch_assoc($res))
{


    echo   "<tr>".
        "<td>" . $dsatz["id"]        . "</td>".
        "<td>" . $dsatz["de"]        . "</td>".
        "<td>" . $dsatz["fr"]        . "</td>".
        "<td>" . $dsatz["it"]        . "</td>".
        "<td>" . $dsatz["en"]        . "</td>".
        "<td>" . $dsatz["rubrik"]    . "</td>".
        "<td>" . $dsatz["info"]      . "</td>".
        "<td>" . $dsatz["carline"]   . "</td>".
        "<td>" .  "</td>".
        //"<td ><input type='radio' name='auswahl' class=\"radioButton\" onchange=\"testFunction();\" value='" . $dsatz["id"] . "' /></td>".
        //$id = $dsatz["id"];
        "<td >
            <input  type=\"image\" name='update' value='" . $dsatz["id"] . "' src=\"img/button_edit.png\" class=\"editButton\"  formaction=\"003_db_aendern_b.php\"></button>
        </td>".
        "<td >
            <input  type=\"image\" name='delete' value='" . $dsatz["id"] . "' src=\"img/button_delete.png\" class=\"editButton\"   formaction=\"003_db_loeschen_b.php\"></button>
        </td>";

    echo    "</tr>";

}
?>

</tbody>
    </table>

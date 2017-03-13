

<table class="table table-hover table-responsive table-striped">
    <thead>
        <tr>
            <th class="col-sm-1">Id</th>
            <th class="col-sm-2">De</a></th>
            <th class="col-sm-2">Fr</th>
            <th class="col-sm-2">It</th>
            <!--
            <th class="col-sm-2">En</th>
            -->
            <th class="col-sm-2">Rubrik</th>
            <th class="col-sm-2">Info/Code</th>
            <th class="col-sm-2">Carline</th>
            <th class="col-sm-2"></th>
            <th class="col-sm-2" colspan="3">Edit</th>
        </tr>
    </thead>
    <tbody class="results">

<?php

//$falls nicht ueber die Suchfunktion auf die Daten zugegriffen wird,
//ist $searchWord nicht initialisiert und die Daten werden nicht ausgegeben
if(empty($searchWord)){$searchWord="";};


/* Datensaetze aus Ergebnis ermitteln, */
/* in Array speichern und ausgeben    */
while ($dsatz = mysqli_fetch_assoc($res))
{

    echo   "<tr>".

    "<td>" . $dsatz["id"]        . "</td>".
    "<td>" . utf8_encode(preg_replace("/" . $searchWord. "/", "<span class='highlight'>" . $searchWord . "</span>",$dsatz["de"]))       . "</td>".
    "<td>" . utf8_encode(preg_replace("/" . $searchWord. "/", "<span class='highlight'>" . $searchWord . "</span>",$dsatz["fr"]))      . "</td>".
    "<td>" . utf8_encode(preg_replace("/" . $searchWord. "/", "<span class='highlight'>" . $searchWord . "</span>",$dsatz["it"]))       . "</td>".
    //"<td>" . utf8_encode(preg_replace("/" . $searchWord. "/", "<span class='highlight'>" . $searchWord . "</span>",$dsatz["en"]))      . "</td>".
    "<td>" . utf8_encode(preg_replace("/" . $searchWord. "/", "<span class='highlight'>" . $searchWord . "</span>",$dsatz["rubrik"]))    . "</td>".
    "<td>" . utf8_encode(preg_replace("/" . $searchWord. "/", "<span class='highlight'>" . $searchWord . "</span>",$dsatz["info"]))      . "</td>".

    "<td class='columnCarline'>" .
        "<a href='pl/".$dsatz["carline"]."_df.pdf' target='_blank'>" . $dsatz["carline"] . " (DF)" . "</a> <br/>" .
        "<a href='pl/".$dsatz["carline"]."_di.pdf' target='_blank'>" . $dsatz["carline"] . " (DI)" ."</a> "

        . "</td>".
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
    echo   "<tr>".

        "<td></td>".
        //"<td>".date('d.m.y H:i:s', strtotime($dsatz["date"]))."</td>".
        "<td></td>".
        "<td class='columnCommentTranslator'>" . utf8_encode(preg_replace("/" . $searchWord. "/", "<span class='highlight'>" . $searchWord . "</span>",$dsatz["comment_fr"]))      . "</td>".
        "<td class='columnCommentTranslator'>" . utf8_encode(preg_replace("/" . $searchWord. "/", "<span class='highlight'>" . $searchWord . "</span>",$dsatz["comment_it"]))       . "</td>".
        "<td></td>".
        "<td></td>".
        "<td></td>".
        "<td>" .  "</td>".
        //"<td ><input type='radio' name='auswahl' class=\"radioButton\" onchange=\"testFunction();\" value='" . $dsatz["id"] . "' /></td>".
        //$id = $dsatz["id"];
        "<td ></td>".
        "<td ></td>";

    echo    "</tr>";

}
?>

</tbody>
    </table>

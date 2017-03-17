

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

//falls nicht ueber die Suchfunktion auf die Daten zugegriffen wird,
//ist $searchWord nicht initialisiert und die Daten werden nicht ausgegeben
if(empty($searchWord)){$searchWord="";};

//Slash wird in Variable $slash gespeichert
$slash = "/";

//es wird getestet, ob der Datensatz einen Slash enthaellt
//je nach Ergebnis werden die Daten in seperater Funktion ausgegeben
if(strstr($searchWord, $slash)){
    echo "<br/>"."Slash inside query";
    viewWithSlash($res);
}else{
    viewWithOutSlash($searchWord, $res);
}

//Falls im Datensatz Slash enthalten, wier diese Funktion aufgerufen
function viewWithSlash($res)
{
    /* Datensaetze aus Ergebnis ermitteln, */
    /* in Array speichern und ausgeben    */
    while ($dsatz = mysqli_fetch_assoc($res))
    {
        echo
        "<tr>".
            "<td>" . $dsatz["id"] . "</td>" .
            "<td>" . utf8_encode($dsatz["de"]) . "</td>" .
            "<td>" . utf8_encode($dsatz["fr"]) . "</td>" .
            "<td>" . utf8_encode($dsatz["it"]) . "</td>" .
            "<td class='filter columnCarline'><input type='submit' class='filterLink' name='search' value='" . $dsatz["rubrik"] . "' src='img/button_edit.png' class='editButton'  formaction='003_db_filtern_a.php'></button></td>".
            "<td class='filter columnCarline'><input type='submit' class='filterLink' name='search' value='" . $dsatz["info"] . "' src='img/button_edit.png' class='editButton'  formaction='003_db_filtern_a.php'></button></td>".
        "<td class='columnCarline'>";

        $carlineArray = $dsatz["carline"];
        $carlineArray = explode(', ',$carlineArray);

        //alle referenzierten Carlines werden mit jeweiligem Preislisten-PDF verlinkt
        foreach ($carlineArray as $carKey){
            echo "<a href='pl/".$carKey."_df.pdf' target='_blank'>" . $carKey . " (DF)" . "</a><br/>";
            echo "<a href='pl/".$carKey."_di.pdf' target='_blank'>" . $carKey . " (DI)" . "</a><br/>";
        }
        echo    "</td>";

        echo    "<td >
                    <input  type=\"image\" name='update' value='" . $dsatz["id"] . "' src=\"img/button_edit.png\" class=\"editButton\"  formaction=\"003_db_aendern_b.php\"></button>
                </td>".
                "<td >
                    <input  type=\"image\" name='delete' value='" . $dsatz["id"] . "' src=\"img/button_delete.png\" class=\"editButton\"   formaction=\"003_db_loeschen_b.php\"></button>
                </td>".
                "</tr>";
        }//ENDE WHILE
    }//ENDE viewWithSlash


//Falls im Datensatz KEIN Slash enthalten, wier diese Funktion aufgerufen
function viewWithOutSlash($searchWord, $res)
{
    /* Datensaetze aus Ergebnis ermitteln, */
    /* in Array speichern und ausgeben    */
    while ($dsatz = mysqli_fetch_assoc($res))
    {
        echo
        "<tr>".
            "<td>" . $dsatz["id"] . "</td>".
            "<td>" . utf8_encode(preg_replace("/" . $searchWord. "/", "<span class='highlight'>" . $searchWord . "</span>",$dsatz["de"]))       . "</td>".
            "<td>" . utf8_encode(preg_replace("/" . $searchWord. "/", "<span class='highlight'>" . $searchWord . "</span>",$dsatz["fr"]))      . "</td>".
            "<td>" . utf8_encode(preg_replace("/" . $searchWord. "/", "<span class='highlight'>" . $searchWord . "</span>",$dsatz["it"]))       . "</td>".
            "<td class='filter columnCarline'><input type='submit' class='filterLink' name='search' value='" . utf8_encode($dsatz["rubrik"]) . "' src='img/button_edit.png' class='editButton'  formaction='003_db_filtern_a.php'></button></td>".
            //"<td>" . utf8_encode(preg_replace("/" . $searchWord. "/", "<span class='highlight'>" . $searchWord . "</span>",$dsatz["rubrik"]))    . "</a></td>".
            //"<td>" . utf8_encode(preg_replace("/" . $searchWord. "/", "<span class='highlight'>" . $searchWord . "</span>",$dsatz["info"]))      . "</a></td>".
            "<td class='filter columnCarline'><input type='submit' class='filterLink' name='search' value='" . utf8_encode($dsatz["info"]) . "' src='img/button_edit.png' class='editButton'  formaction='003_db_filtern_a.php'></button></td>".
        "<td class='columnCarline'>";

        $carlineArray = $dsatz["carline"];
        $carlineArray = explode(', ',$carlineArray);

        //alle referenzierten Carlines werden mit jeweiligem Preislisten-PDF verlinkt
        foreach ($carlineArray as $carKey){
            echo "<a href='pl/".$carKey."_df.pdf' target='_blank'>" . $carKey . " (DF)" . "</a><br/>";
            echo "<a href='pl/".$carKey."_di.pdf' target='_blank'>" . $carKey . " (DI)" . "</a><br/>";
        }

        echo    "</td>";

        echo    "<td >
                    <input  type=\"image\" name='update' value='" . $dsatz["id"] . "' src=\"img/button_edit.png\" class=\"editButton\"  formaction=\"003_db_aendern_b.php\"></button>
                </td>".
                "<td >
                    <input  type=\"image\" name='delete' value='" . $dsatz["id"] . "' src=\"img/button_delete.png\" class=\"editButton\"   formaction=\"003_db_loeschen_b.php\"></button>
                </td>".
                "</tr>";
        }//ENDE WHILE
    }//ENDE viewWithoutSlash
?>

</tbody>
    </table>

<script type="text/javascript">
    function send(edit, id)
    {
        if(edit==1)
            alert("Update" + "<?php $_POST["id"] ?>");
        else if(edit==2)
        {
            alert("Delete");
        }
    }
</script>

<form action="google.de" method = 'post'>
<table class="table table-hover table-responsive table-striped">
    <thead>
        <tr>
            <th class="col-sm-1">Id</th>
            <th class="col-sm-2">De</a></th>
            <th class="col-sm-2">Fr</th>
            <th class="col-sm-2">It</th>
            <th class="col-sm-2">En</th>
            <th class="col-sm-2">Rubrik</th>
            <th class="col-sm-2">Info</th>
            <th class="col-sm-2">Carline</th>
            <th class="col-sm-2"></th>
            <th class="col-sm-2" colspan="3">Edit</th>
        </tr>
    </thead>


<?php
/* Datensaetze aus Ergebnis ermitteln, */
/* in Array speichern und ausgeben    */
while ($dsatz = mysqli_fetch_assoc($res))
{


    echo    "<tr>".

        "<td >" . $dsatz["id"]        . "</td>".
        "<td>" . $dsatz["de"]        . "</td>".
        "<td>" . $dsatz["fr"]        . "</td>".
        "<td>" . $dsatz["it"]        . "</td>".
        "<td>" . $dsatz["en"]        . "</td>".
        "<td>" . $dsatz["rubrik"]    . "</td>".
        "<td>" . $dsatz["info"]      . "</td>".
        "<td>" . $dsatz["carline"]   . "</td>".
        "<td>" .  "</td>".
        "<td ><input type='radio' name='auswahl' class=\"radioButton\" onchange=\"send(1)\" value='" . $dsatz["id"] . "' /></td>".
        "<td >
            <a value='" . $dsatz["id"] . "' href='javascript:send(1, " . $dsatz["id"] . ");'>Update</a>
        </td>".
        "<td >
            <a value='" . $dsatz["id"] . "' href='javascript:send(2, " . $dsatz["id"] . ");'>Delete</a>
        </td>";

    echo    "</tr>";

}
echo    "</table>";
echo "</form>";
?>
<script type="text/javascript">
    function send(ak,id)
    {
        if(ak==0)
            document.f.ak.value = "in";
        else if(ak==1)
            document.f.ak.value = "up";
        else if(ak==2)
        {
            if (confirm("Datensatz mit id " + id + " löschen?"))
                document.f.ak.value = "de";
            else
                return;
        }
        document.f.id.value = id;
        document.f.submit();
    }
</script>

<?php

/* Aktion ausf�hren */
if(isset($_POST["ak"]))
{
    /* neu eintragen */
    if($_POST["ak"]=="in")
    {

    }

    /* �ndern */
    else if($_POST["ak"]=="up")
    {
        echo "update";


    }

    /* l�schen */
    else if($_POST["ak"]=="de")
    {

        echo "delete";
    }
}

?>

<?php

    //default-Wert fuer ID eines Eintrags
    $verbindlichkeit_ID = 1;

    //---------------------------------------------------------------------------------------------------------
    $orderBy = array('verbindlichkeit', 'id', 'datum', 'author', 'titel', 'beschreibung');

    $order = 'verbindlichkeit';
    if (isset($_GET['orderBy']) && in_array($_GET['orderBy'], $orderBy)) {
        $order = $_GET['orderBy'];
    }

    $sql = 'SELECT * FROM `rosetta_requirements` ORDER BY '.$order;

    $result = $conn->query($sql);
    
    //---------------------------------------------------------------------------------------------------------
    
    //Deutsche Zeitzone
    date_default_timezone_set('Europe/Berlin');
                    
    //---------------------------------------------------------------------------------------------------------

    //http://stackoverflow.com/questions/3489783/how-to-sort-rows-of-html-table-that-are-called-from-mysql

    //Datenausgabe
    while ($row = $result->fetch_assoc()) {
        $id_nr = $row["id"];
        echo "<tr>";
                        
            echo "<td class=\"verbindlichkeit\" id=\"Verb_ID_$verbindlichkeit_ID\">" . $row["verbindlichkeit"] . "</td>";
            echo "<td class=\"id\">" . $row["id"] . "</td>";
            echo "<td class=\"datum\">" . date('d.m.y H:i:s', strtotime($row["datum"])) . "</td>";
            echo "<td class=\"author\">" . $row["author"] . "</td>";
            echo "<td class=\"titel\">" . $row["titel"] . "</td>";
            echo "<td class=\"beschreibung\">" . $row["beschreibung"] . "</td>";
            echo "<td><a href='javascript:send(1,$id_nr);'><img src=\"img/button_agree.png\"></a></td>";
            echo "<td><a href='javascript:send(2,$id_nr);'><img src=\"img/button_delete.png\"></a></td>";
            //echo "<td class=\"id\"><input type=\"checkbox\" id=\"Checkbox_$verbindlichkeit_ID\"></td>";
                        
        echo "</tr>";
                          
        //Wert fuer ID wir inkrementiert
        $verbindlichkeit_ID += 1;
    }
    //---------------------------------------------------------------------------------------------------------
?>
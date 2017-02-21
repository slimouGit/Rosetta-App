<?php

    //default-Wert fuer ID eines Eintrags
    $verbindlichkeit_ID = 1;

    //---------------------------------------------------------------------------------------------------------
/*
$orderBy = array('type', 'description', 'recorded_date', 'added_date');

$order = 'type';
if (isset($_GET['orderBy']) && in_array($_GET['orderBy'], $orderBy)) {
    $order = $_GET['orderBy'];
}

$query = 'SELECT * FROM aTable ORDER BY '.$order;
*/
    //alle Funde ausser Verbindlichkeit = "kann" ausgeben
    $sql = "SELECT * FROM `rosetta_requirements`  order by `verbindlichkeit` ASC";

    $result = $conn->query($sql);
    
    //---------------------------------------------------------------------------------------------------------
    
    //Deutsche Zeitzone
    date_default_timezone_set('Europe/Berlin');
                    
    //---------------------------------------------------------------------------------------------------------

    //http://stackoverflow.com/questions/3489783/how-to-sort-rows-of-html-table-that-are-called-from-mysql

    //Datenausgabe
    while ($row = $result->fetch_assoc()) {
                        
        echo "<tr>";
                        
            echo "<td class=\"verbindlichkeit\" id=\"Verb_ID_$verbindlichkeit_ID\">" . $row["verbindlichkeit"] . "</td>";
            echo "<td class=\"id\">" . $row["id"] . "</td>";
            echo "<td class=\"datum\">" . $row["datum"] . "</td>";
            echo "<td class=\"author\">" . $row["author"] . "</td>";
            echo "<td class=\"titel\">" . $row["titel"] . "</td>";
            echo "<td class=\"beschreibung\">" . $row["beschreibung"] . "</td>";
            echo "<td class=\"id\"><input type=\"checkbox\" id=\"Checkbox_$verbindlichkeit_ID\"></td>";
                        
        echo "</tr>";
                          
        //Wert fuer ID wir inkrementiert
        $verbindlichkeit_ID += 1;
    }
/*
$sql = "SELECT * FROM rosetta_requirements";

if ($_GET['sort'] == 'verbindlichkei')
{
    $sql .= " ORDER BY Verbindlichkei";
}
elseif ($_GET['sort'] == 'id')
{
    $sql .= " ORDER BY ID";
}
elseif ($_GET['sort'] == 'datum')
{
    $sql .= " ORDER BY Datum/Uhrzeit";
}
elseif($_GET['sort'] == 'author')
{
    $sql .= " ORDER BY Author";
}
elseif ($_GET['sort'] == 'titel')
{
    $sql .= " ORDER BY Titel";
}
elseif($_GET['sort'] == 'beschreibung')
{
    $sql .= " ORDER BY Beschreibung";
}
*/
    //---------------------------------------------------------------------------------------------------------
    
    //nur die Eintraege mit Verbindlichkeit = "kann" ausgeben
/*
    $sql = "SELECT * FROM `rosetta_requirements` WHERE `verbindlichkeit` = 'kann'";
    $result = $conn->query($sql);
                
    //Datenausgabe
    while ($row = $result->fetch_assoc()) {
                        
        echo "<tr>";
                        
            echo "<td class=\"verbindlichkeit\" id=\"Verb_ID_$verbindlichkeit_ID\">" . $row["verbindlichkeit"] . "</td>";
            echo "<td class=\"id\">" . $row["id"] . "</td>";
            echo "<td class=\"datum\">" . $row["datum"] . "</td>";
            echo "<td class=\"author\">" . $row["author"] . "</td>";
            echo "<td class=\"titel\">" . $row["titel"] . "</td>";
            echo "<td class=\"beschreibung\">" . $row["beschreibung"] . "</td>";
        echo "<td class=\"id\"><input type=\"checkbox\" id=\"Checkbox_$verbindlichkeit_ID\"></td>";
        echo "</tr>";
                          
        //Wert fuer ID wir inkrementiert
        $verbindlichkeit_ID += 1;
    }

*/
?>
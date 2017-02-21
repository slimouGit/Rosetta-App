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
                        
        echo "<tr>";
                        
            echo "<td class=\"verbindlichkeit\" id=\"Verb_ID_$verbindlichkeit_ID\">" . $row["verbindlichkeit"] . "</td>";
            echo "<td class=\"id\">" . $row["id"] . "</td>";
            echo "<td class=\"datum\">" . $row["datum"] . "</td>";
            echo "<td class=\"author\">" . $row["author"] . "</td>";
            echo "<td class=\"titel\">" . $row["titel"] . "</td>";
            echo "<td class=\"beschreibung\">" . $row["beschreibung"] . "</td>";
            //echo "<td class=\"id\"><input type=\"checkbox\" id=\"Checkbox_$verbindlichkeit_ID\"></td>";
                        
        echo "</tr>";
                          
        //Wert fuer ID wir inkrementiert
        $verbindlichkeit_ID += 1;
    }
    //---------------------------------------------------------------------------------------------------------
?>
<?php

    //default-Wert fuer ID eines Eintrags
    $verbindlichkeit_ID = 1;
    
    //---------------------------------------------------------------------------------------------------------
    
    //alle Funde ausser Verbindlichkeit = "kann" ausgeben
    $sql = "SELECT * FROM `rosetta-app_requirements` WHERE `verbindlichkeit` <> 'kann' order by `verbindlichkeit` ASC";
    $result = $conn->query($sql);
    
    //---------------------------------------------------------------------------------------------------------
    
    //Deutsche Zeitzone
    date_default_timezone_set('Europe/Berlin');
                    
    //---------------------------------------------------------------------------------------------------------
                
    //Datenausgabe
    while ($row = $result->fetch_assoc()) {
                        
        echo "<tr>";
                        
            echo "<td class=\"verbindlichkeit\" id=\"Verb_ID_$verbindlichkeit_ID\">" . $row["verbindlichkeit"] . "</td>";
            echo "<td class=\"id\">" . $row["id"] . "</td>";
            echo "<td class=\"datum\">" . $row["datum"] . "</td>";
            echo "<td class=\"author\">" . $row["author"] . "</td>";
            echo "<td class=\"titel\">" . $row["titel"] . "</td>";
            echo "<td class=\"beschreibung\">" . $row["beschreibung"] . "</td>";
                        
        echo "</tr>";
                          
        //Wert fuer ID wir inkrementiert
        $verbindlichkeit_ID += 1;
    }

    //---------------------------------------------------------------------------------------------------------
    
    //nur die Eintraege mit Verbindlichkeit = "kann" ausgeben
    $sql = "SELECT * FROM `rosetta-app_requirements` WHERE `verbindlichkeit` = 'kann'";
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
                        
        echo "</tr>";
                          
        //Wert fuer ID wir inkrementiert
        $verbindlichkeit_ID += 1;
    }
?>
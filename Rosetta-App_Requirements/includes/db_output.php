
<script>
    function markChecked(ak, id){
        alert(id +" Kommt an");

        var theForm, newInput1, newInput2;
        // Start by creating a <form>
        theForm = document.createElement('form');
        //theForm.action = 'somepage.php';
        theForm.action = 'index.php';
        theForm.method = 'post';
        var sendId = id;
        // Next create the <input>s in the form and give them names and values
        newInput1 = document.createElement('input');
        newInput1.type = 'hidden';
        newInput1.name = 'input_1';
        newInput1.value = 'value 1';
        newInput2 = document.createElement('input');
        newInput2.type = 'hidden';
        newInput2.name = 'input_2';
        newInput2.value = 'value 2';
        // Now put everything together...
        theForm.appendChild(newInput1);
        theForm.appendChild(newInput2);
        // ...and it to the DOM...
        document.getElementById('hidden_form_container').appendChild(theForm);
        // ...and submit it
        var x="<?php updateData(); ?>";
        alert(x + " " + sendId);
    }
</script>

<?php
function updateData() {
    echo "Funzt" ;
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

            echo "<form action='db_output.php' id=\"hidden_form_container\"' method='POST'>";
            echo "<td><input name='erledigt' type=\"checkbox\" value=\"checked\" onClick='markChecked(this.value, $id_nr)'></td>";
            echo "</form";

            echo "</td>";
            //echo "<td><a href='javascript:send(1,$id_nr);'><img src=\"img/button_agree.png\"></a></td>";
            //echo "<td><a href='javascript:send(2,$id_nr);'><img src=\"img/button_delete.png\"></a></td>";
            //echo "<td class=\"id\"><input type=\"checkbox\" id=\"Checkbox_$verbindlichkeit_ID\"></td>";
                        
        echo "</tr>";
                          
        //Wert fuer ID wir inkrementiert
        $verbindlichkeit_ID += 1;
    }
    //---------------------------------------------------------------------------------------------------------
?>


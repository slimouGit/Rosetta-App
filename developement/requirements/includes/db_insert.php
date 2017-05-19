<?php
if(isset($_POST['submit']) && (!$fehler)) {
        
//Daten einfuegen
$sql = "INSERT INTO rosetta_ret(verbindlichkeit, author, titel, beschreibung)
        VALUES ('$verbindlichkeit', '$author', '$titel', '$beschreibung')";
        
        if ($conn->query($sql) === TRUE) {
           // echo "Eintrag erstellt";
            
            } else {
                echo "Fehler: " . $sql . "<br>" . $conn->error;
            }
        }
?>      	
        	
        	
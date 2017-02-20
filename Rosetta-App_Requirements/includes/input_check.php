<?php

$fehler = false;
$verbindlichkeit = $author = $titel = $beschreibung =  "";
$verbindlichkeit_Err = $author_Err = $titel_Err = $beschreibung_Err =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if(!empty($verbidlichkeit)){
        $verbindlichkeit = test_input($_POST["verbindlichkeit"]);
   }
  $author = test_input($_POST["author"]);
  $titel = test_input($_POST["titel"]);
  $beschreibung = test_input($_POST["beschreibung"]);

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
    if (empty($_POST["verbindlichkeit"])) {
        $verbindlichkeit_Err = "Bitte die Verbindlichkeit angeben?";
      $fehler = true;
    } else {
      $verbindlichkeit = test_input($_POST["verbindlichkeit"]);
    }

    if (empty($_POST["titel"])) {
      $titel_Err = "Bitte eine kurze Beschreibung angeben";
      $fehler = true;
    } else {
      $titel = test_input($_POST["titel"]);
    }
  
    if (empty($_POST["beschreibung"])) {
      $beschreibung_Err = "Eine ausfuehrliche Beschreibung fehlt";
      $fehler = true;
    } else {
      $beschreibung = test_input($_POST["beschreibung"]);
    }
    
  }

}

// Hilfsmethode, entfernt stoerzeichen
function test_input($data) {
  $data = trim($data); //leerzeichen
  $data = stripslashes($data); // Slashes entfernen
  $data = htmlspecialchars($data); //sonderzeichen entfernen-umwandeln
  return $data;
}
?>
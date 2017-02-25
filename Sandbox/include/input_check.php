<?php

$fehler = false;
$search =  "";
$search_Err =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = test_input($_POST["search"]);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["search"])) {
            $search_Err = "Bitte einen Suchbegriff angeben";
            $fehler = true;
        } else {
            $titel = test_input($_POST["search"]);
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
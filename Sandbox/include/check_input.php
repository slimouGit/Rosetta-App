<?php

$fehler = false;
$taskOption = $search =  "";
$taskOption_Err = $search_Err =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $taskOption = test_input($_POST["taskOption"]);
    $search = test_input($_POST["search"]);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["taskOption"])) {
            $taskOption_Err = "Bitte den Author eintragen";
            $fehler = true;
        } else {
            $titel = test_input($_POST["taskOption"]);
        }

        if (empty($_POST["search"])) {
            $search_Err = "Bitte den Author eintragen";
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
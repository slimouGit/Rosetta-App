<?php
include "lib/elements/header.php";
?>

<!---------------------------------------------->

<div class="container-fluid content">

    <!---------------------------------------------->

    <div class="container">
        <div class='row'>
            <h1>Rosetta-App XML-Datei hochladen</h1>
        </div>
    </div>

    <!---------------------------------------------->

    <?php
    // EINBINDEN PHP-Klasse mit Formlar-Objekten
    require_once "mvc/view/formularFields_view.class.php";

    // Objekt erzeugen
    $form = new formular();
    $form->uploadFile("XML wählen", "?upload_xml=1", "uploadXML");
    ?>

    <!---------------------------------------------->

    <div class="container">
        <div class='row'>

            <?php
            if(isset($_GET['upload_xml'])) {
                include "mvc/model/upload_xml_model.php";
            }
            ?>

        </div>
    </div>

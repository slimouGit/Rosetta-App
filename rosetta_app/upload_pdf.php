<?php
include "lib/elements/header.php";
?>

        <!---------------------------------------------->

        <div class="container-fluid content">

            <!---------------------------------------------->

            <div class="container">
                <div class='row'>
                    <h1>Rosetta-App PDF hochladen</h1>
                </div>
            </div>

            <!---------------------------------------------->

            <?php
            // EINBINDEN PHP-Klasse mit Formlar-Objekten
            require_once "mvc/view/formularFields_view.class.php";

            // Objekt erzeugen
            $form = new formular();
            $form->uploadFile("PDF wählen", "?upload_pdf=1", "uploadPDF");
            ?>

            <!---------------------------------------------->

            <div class="container">
                <div class='row'>
                <?php

                if(isset($_GET['upload_pdf'])) {
                   include "mvc/model/upload_pdf_model.php";
                }
                ?>
                </div>
            </div>

            <!---------------------------------------------->

        </div>

        <!---------------------------------------------->

<?php
include "lib/elements/footer.php";
?>



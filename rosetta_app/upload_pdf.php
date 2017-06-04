<?php
//include header
include "lib/elements/header.php";
?>

<?php
//include connection to database
include "mvc/model/db_connect_model.php";
?>

        <!---------------------------------------------->

        <div class="container-fluid content">

            <!---------------------------------------------->

            <div class="container">
                <div class='row'>
                    <h1>Rosetta-App upload PDF</h1>
                </div>
            </div>

            <!---------------------------------------------->

            <div class="container">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <h4>PDF-Datei wählen</h4>
                        <form action="?upload_pdf=1" method="post" enctype="multipart/form-data" id="js-upload-form">
                            <div class="input-group image-preview">
                                <input placeholder="PDF wählen" type="button" class="form-control image-preview-filename" >
                                <span class="input-group-btn">
                            <button type="button" class="btn btn-default image-preview-clear" style="display:none;"> <span class="glyphicon glyphicon-remove"></span> Clear </button>
                            <div class="btn btn-default image-preview-input"> <span class="glyphicon glyphicon-folder-open"></span> <span class="image-preview-input-title">Browse</span>
                                <input type="file" class="form-control" name="upfile"/>
                            </div>
                            <button type="submit" class="btn btn-labeled btn-primary"> <span class="btn-label"><i class="glyphicon glyphicon-upload"></i> </span>Hochladen</button>
                            </span> </div>
                    </div>
                    </form>
                </div>
            </div>

            <!---------------------------------------------->

            <div class="container">
                <div class='row'>
                <?php

                //CONTROLLER
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
//include header
include "lib/elements/footer.php";
?>



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
                    <h1>Rosetta-App PDF hochladen</h1>
                </div>
            </div>

            <!---------------------------------------------->

            <div class="container">
                <div class="panel panel-default">
                    <div class="panel-body">
                    <h4>PDF auswählen</h4>
                        <form action="?upload_pdf=1" method="post" enctype="multipart/form-data">
                        <div class="form-inline">
                            <div class="form-group">
                                <input type="file" class="form-control" name="upfile"/>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">Hochladen</button>
                        </div>
                    </form>
                    </div>
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



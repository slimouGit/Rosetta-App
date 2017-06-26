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
            <h1>Rosetta-App XML-Datei hochladen</h1>
        </div>
    </div>

    <!---------------------------------------------->

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">
                <h4>XML auswählen</h4>
                <form action="?upload_xml=1" method="post" enctype="multipart/form-data">
                    <div class="form-inline">
                        <div class="form-group">
                            <input type="file" class="form-control" name="xmlFile"/>
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
            if(isset($_GET['upload_xml'])) {
                include "mvc/model/upload_xml_model.php";
            }
            ?>

        </div>
    </div>
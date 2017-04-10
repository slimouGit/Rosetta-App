<?php
//include header
include "elements/header.php";
?>

<?php
//include db connection
include "include/db_connect.php";
?>

    <h2>XML mit Datensätzen hochladen</h2>
    <p>XML-Struktur muss eingehalten werden, d.h. evtl. Erklär-Funktion integrieren</p>

<form enctype="multipart/form-data" action="003_db_upload_xml_02.php" method="post">
    <div class="row">
        <div class="form-group">
            <label class="col-sm-1 control-label">Datei</label>
            <div class="col-sm-4">
                <input type="file" class="form-control" name="xmlFile" /></input>
            </div>
        </div>
    </div>

    <div class="row button">
        <div class="form-group">
            <div class="col-sm-1"></div>
            <div class="col-sm-1">
                <input type="submit" class="btn btn-primary" value="Senden"></input>
            </div>
        </div>
    </div>

</form>
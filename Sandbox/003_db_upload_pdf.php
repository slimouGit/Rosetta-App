<?php
//include header
include "elements/header.php";
?>

<?php
//include db connection
include "include/db_connect.php";
?>

    <h2>Preislisten-PDFs hochladen</h2>
    <p>Schreibweise muss eingehalten werden, d.h. evtl. Erklär-Funktion integrieren</p>



<form enctype="multipart/form-data" action="upload.php" method="post">
    <p>Datei: <input name="upfile" type="file" size="25" /></p>
    <p><input type="submit" value="Senden" /></p>
</form>




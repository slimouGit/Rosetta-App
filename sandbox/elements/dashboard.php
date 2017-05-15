<?php
/**
 * Created by PhpStorm.
 * User: salim
 * Date: 11.04.2017
 * Time: 07:19
 */
?>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <div class="offer offer-radius offer-primary">
            <div class="offer-content">
                <h3 class="lead">
                    <a href="suchen.php">Eintrag suchen</a>
                </h3>
                <p>
                    <a href="suchen.php">Eintrag suchen</a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <div class="offer offer-radius offer-primary">

            <div class="offer-content">
                <h3 class="lead">
                    <a href="erzeugen_a.php">Eintrag erstellen</a>
                </h3>
                <p>
                    <a href="erzeugen_a.php">Neuen Eintrag erstellen</a>
                </p>
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <div class="offer offer-radius offer-primary">

            <div class="offer-content">
                <h3 class="lead">
                    <a href="upload_pdf_01.php">Preisliste hochladen</a>
                </h3>
                <p>
                    <a href="upload_pdf_01.php">PDF hochladen</a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <div class="offer offer-radius offer-primary">

            <div class="offer-content">
                <h3 class="lead">
                    <a href="upload_xml_01.php">XML hochladen</a>
                </h3>
                <p>
                    <a href="upload_xml_01.php">XML Datei in Datenbank importieren</a>
                </p>
            </div>
        </div>
    </div>
</div>
<!--
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <div class="offer offer-radius offer-primary">

            <div class="offer-content">
                <h3 class="lead">
                    <a href="registrieren.php">Nutzer registrieren</a>
                </h3>
                <p>
                    <a href="registrieren.php">Einen neuen nutzer registrieren</a>
                </p>
            </div>
        </div>
    </div>
</div>
-->
<?php
if($authorizations=="admin"){
    echo "
        <div class=\"row\">
    <div class=\"col-xs-12 col-sm-6 col-md-4 col-lg-3\">
        <div class=\"offer offer-radius offer-primary\">

            <div class=\"offer-content\">
                <h3 class=\"lead\">
                    <a href=\"registrieren.php\">Nutzer registrieren</a>
                </h3>
                <p>
                    <a href=\"registrieren.php\">Einen neuen nutzer registrieren</a>
                </p>
            </div>
        </div>
    </div>
    <div class=\"col-xs-12 col-sm-6 col-md-4 col-lg-3\">
        <div class=\"offer offer-radius offer-primary\">

            <div class=\"offer-content\">
                <h3 class=\"lead\">
                    <a href=\"benutzerAnzeigen.php\">Benutzer verwalten</a>
                </h3>
                <p>
                    <a href=\"benutzerAnzeigen.php\">Alle Benutzer</a>
                </p>
            </div>
        </div>
    </div>
</div>
<div class=\"row\">
    
    <div class=\"col-xs-12 col-sm-6 col-md-4 col-lg-3\">
        <div class=\"offer offer-radius offer-primary\">

            <div class=\"offer-content\">
                <h3 class=\"lead\">
                    <a href=\"anzeigen.php\">Daten gesamt</a>
                </h3>
                <p>
                    <a href=\"anzeigen.php\">Gesamten Datenbestand anzeigen.</a>
                </p>
            </div>
        </div>
    </div>
    
    <div class=\"col-xs-12 col-sm-6 col-md-4 col-lg-3\">
        <div class=\"offer offer-radius offer-primary\">

            <div class=\"offer-content\">
                <h3 class=\"lead\">
                    <a href=\"geloeschte.php\">Gelöschte Datensätze</a>
                </h3>
                <p>
                    <a href=\"geloeschte.php\">Gelöschte Datensätze anzeigen</a>
                </p>
            </div>
        </div>
    </div>
    
    

</div>
    ";

};
?>

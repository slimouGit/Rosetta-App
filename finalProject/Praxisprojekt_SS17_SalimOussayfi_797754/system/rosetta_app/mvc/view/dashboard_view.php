<?php
/**
 * Created by PhpStorm.
 * User: salim
 *
 * Script stellt je nach Berechtigung Links auf der Startseite dar
 */
?>

<div class="col-lg-6">

    <div class="row">
        <a href="search_item.php">
            <div class="col-lg-6 daeshbordIcon daeshbordIconUser">
                <img src="lib/img/search_icon.png">
                <h4><span class="daeshbordText">Eintrag suchen</span></h4>
            </div>
        </a>
        <a href="insert_item.php">
            <div class="col-lg-6 daeshbordIcon daeshbordIconUser">
                <img src="lib/img/createItem_icon.png">
                <h4><span class="daeshbordText">Eintrag erstellen</span></h4>
            </div>
        </a>
    </div>

    <div class="row">
        <a href="upload_pdf.php">
            <div class="col-lg-6 daeshbordIcon daeshbordIconUser">
                <img src="lib/img/uploadPDF_icon.png">
                <h4><span class="daeshbordText">Preisliste hochladen</span></h4>
            </div>
        </a>
        <a href="upload_xml.php">
            <div class="col-lg-6 daeshbordIcon daeshbordIconUser">
                <img src="lib/img/uploadXML_icon.png">
                <h4><span class="daeshbordText">XML hochladen</span></h4>
            </div>
        </a>
    </div>

    <?php
    //Anzeige der Items je nach Authorisierung des Nutzers
    if($authorization == "admin"){
    ?>

    <div class="row">
        <a href="register_user.php">
            <div class="col-lg-6 daeshbordIcon daeshbordIconAdmin">
                <img src="lib/img/registerUser_icon.png">
                <h4><span class="daeshbordText">Benutzer registrieren</span></h4>
            </div>
        </a>
        <a href="user_complete.php">
            <div class="col-lg-6 daeshbordIcon daeshbordIconAdmin">
                <img src="lib/img/manageUser_icon.png">
                <h4><span class="daeshbordText">Benutzer verwalten</span></h4>
            </div>
        </a>
    </div>

    <div class="row">
        <a href="data_complete.php">
            <div class="col-lg-6 daeshbordIcon daeshbordIconAdmin">
                <img src="lib/img/completeData_icon.png">
                <h4><span class="daeshbordText">Gesamte Daten</span></h4>
            </div>
        </a>
        <a href="deleted_items.php">
            <div class="col-lg-6 daeshbordIcon daeshbordIconAdmin">
                <img src="lib/img/deletedData_icon.png">
                <h4><span class="daeshbordText">Gelöschte Daten</span></h4>
            </div>
        </a>
    </div>

    <?php
    };
    ?>

</div>

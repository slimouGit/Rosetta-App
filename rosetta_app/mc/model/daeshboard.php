<div class="col-lg-6">

    <div class="row">
        <a href="search_item.php">
            <div class="col-lg-6 daeshbordIcon">
                <p>Eintrag suchen</p>
            </div>
        </a>
        <a href="insert_item.php">
            <div class="col-lg-6 daeshbordIcon">
                <p>Eintrag erstellen</p>
            </div>
        </a>
    </div>

    <div class="row">
        <a href="upload_pdf.php">
            <div class="col-lg-6 daeshbordIcon">
                <p>Preisliste hochladen</p>
            </div>
        </a>
        <a href="upload_xml.php">
            <div class="col-lg-6 daeshbordIcon">
                <p>XML hochladen</p>
            </div>
        </a>
    </div>

    <?php
    if($authorization == "admin"){
    ?>

    <div class="row">
        <a href="register_user.php">
            <div class="col-lg-6 daeshbordIcon">
                <p>Nutzer registrieren</p>
            </div>
        </a>
        <a href="user_complete.php">
            <div class="col-lg-6 daeshbordIcon">
                <p>Benutzer verwalten</p>
            </div>
        </a>
    </div>

    <div class="row">
        <a href="data_complete.php">
            <div class="col-lg-6 daeshbordIcon">
                <p>Daten gesamt</p>
            </div>
        </a>
        <a href="deleted_item.php">
            <div class="col-lg-6 daeshbordIcon">
                <p>Gelöschte Daten</p>
            </div>
        </a>
    </div>

    <?php
    };
    ?>

</div>
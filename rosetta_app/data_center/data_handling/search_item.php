<?php
//include header
include "../../lib/elements/header.php";
?>

<?php
//include connection to database
include "../../mc/controller/db_connect.php";
?>



    <div class="container">
        <div class='row'>
            <h1>Rosetta-Data search data</h1>
            <form action="?search_item=1" method = "post">
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="skills" name="search" value="<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>" placeholder="Suchbegriff">
                </div>

            <div class="row">
                <div class="form-group">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-1">
                        <input type="submit" class="btn btn-primary" value="Abschicken">
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>

<?php
if(isset($_GET['search_item'])) {
    //die Eingabe aus dem Inputfeld wird in $searchWord gespeichert
    ?>
    <div class="container">
        <div class='row'>
            <?php
            require "../../mc/model/table_items.class.php";
            table_items::showSearchData($_POST["search"]);
            ?>
        </div>
    </div>
    <?php
}
?>





<?php
//include header
include "../../lib/elements/footer.php";
?>
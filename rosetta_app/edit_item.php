<?php
//include header
include "lib/elements/header.php";
?>

<?php
//include connection to database
include "mc/controller/db_connect.php";
?>



    <div class="container">
        <div class='row'>
            <h1>Rosetta-Data edit data</h1>
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

        <div class='row'>
            <?php
            echo "Gesuchte ID ist " . $_GET["data_id"];
            $tempId = $_GET["data_id"];
            echo $tempId;
            $res = $pdo->query("SELECT * FROM rosetta_data WHERE data_id LIKE $tempId");

            //pruefen, ob Suche ein Resultat ergibt
            $count = $res->rowCount();
            if($count == 0){
                echo "Kein Ergebnis für " . $_POST['search'];
            }
            else{
                require "mc/model/table_items.class.php";
                table_items::showData();
            }
            ?>
        </div>
    </div>


<?php
//include header
include "lib/elements/footer.php";
?>
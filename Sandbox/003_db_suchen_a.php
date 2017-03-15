

<?php
//include header
include "elements/header.php";
?>

<?php
//include db connection
include "include/db_connect.php";
?>

<?php
//include input_check
include "include/input_check.php";
?>

<!--Script Autovervollstaendigung-->
<script>
    $(function() {
        $( "#skills" ).autocomplete({
            source: 'search.php',
            minLength:3
        });
    });
</script>



<h2>Suche</h2>
<p>Volltextsuche (evtl. später mit Autovervollständigung)</p>
<p>Die Suche kann eingeschränkt werden nach bestehenden Rubriken. Gibt man keine Rubrik an, wird in allen gesucht</p>


<!--Suchformular-->
<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post">
    <div class='results'><!--in diesem container werden die Fragezeichen geloescht -->
    <div class="row">
        <div class="form-group "> <!--ui-widget-->
            <label for="skills" class="col-sm-2 control-label">Was soll gesucht werden</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="skills" name="search" value="<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>" placeholder="Suchbegriff">
            </div>
            <div class="col-sm-4 errorContainer"><span class="error"><?php echo $search_Err;?></span></div>
        </div>
    </div>
    </div>

    <div class="row">
        <label class="col-sm-2 control-label">in welcher Kategorie</label>
        <div class="col-sm-6">
            <label class="checkbox-inline">
                <input name="category[]" type="checkbox" value="de">deutsch
            </label>
            <label class="checkbox-inline">
                <input name="category[]" type="checkbox" value="fr">französisch
            </label>
            <label class="checkbox-inline">
                <input name="category[]" type="checkbox" value="it">italienisch
            </label>
            <!--
            <label class="checkbox-inline">
                <input name="category[]" type="checkbox" value="en">englisch
            </label>
            -->
            <label class="checkbox-inline">
                <input name="category[]" type="checkbox" value="rubrik">Rubrik
            </label>
            <label class="checkbox-inline">
                <input name="category[]" type="checkbox" value="info">Info
            </label>
            <label class="checkbox-inline">
                <input name="category[]" type="checkbox" value="carline">Carline
            </label>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <div class="col-sm-2"></div>
            <div class="col-sm-1">
                <input type="submit" class="btn btn-primary" name="Suchen" value="Suchen">
            </div>
        </div>
    </div>

</form>


<!--Code, sobald auf Button gedrueckt wurde-->
<?php

if(isset($_POST['Suchen']) && (!$fehler)) {



    //Pruefung, ob checkboxen ausgewaehlt wurden
    if(!empty($_POST['category'])) {
        //das Array carline wird ueber implode in $car gespeichert
        $cat = implode(',  ', $_POST['category']);
    }
    //falls keine checkbox aktiv, wird in allen Spalten gesucht
    if(empty($cat)) {
        $cat = 'de, fr, it, rubrik, info, carline';
    }

    $searchWord = str_replace("\n", "XXXX", $_POST["search"]);

    var_dump($searchWord);

    $sql = "select * from rosetta_data";
    $sql .= " where CONCAT_WS('',$cat) like '%" . $searchWord . "%' ";



    //Variable, um Resultat in Ausgabe Tabelle (view_table) zu highlighten
    //$searchWord = $_POST["search"] ;







    $res = mysqli_query($con, $sql);
    $num = mysqli_num_rows($res);
    if ($num==0) {
        echo "\"" . $_POST['search'] . "\"" . " ist nicht vorhanden";
    }
    else{
        ?>

        <form action = "003_db_aendern_b.php" method = "post">
            <?php

            //include table
            include "include/view_table.php";

            //close connection
            mysqli_close($con);
            ?>

            <!--
            <p><input type="submit" value="anzeigen" /></p>
            -->
        </form>

        <?php
    }
}
?>

<?php
//include footer
include "elements/footer.html";
?>


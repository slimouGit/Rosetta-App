

<?php
//include header
include "elements/header.html";
?>

<?php
//include navigation
include 'elements/navigation.php';
?>

<h2>Form control: inline checkbox</h2>
<p>The form below contains three inline checkboxes:</p>


<form action = "003_db_suchen_b.php" method = "post">


    <div class="row">
        <div class="form-group">
            <label for="suche" class="col-sm-2 control-label">Was soll gesucht werden</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="search">
            </div>
            <div class="col-sm-4 errorContainer"></div>
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
            <label class="checkbox-inline">
                <input name="category[]" type="checkbox" value="en">englisch
            </label>
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
                <button type="submit" class="btn btn-primary" value="Suchen"">Suchen</button>
            </div>
        </div>
    </div>

</form>

<?php
//include footer
include "elements/footer.html";
?>


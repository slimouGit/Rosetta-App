

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
            <label for="select" class="col-sm-2 control-label"></label>
            <div class="col-sm-6">
                <select name="taskOption" class="form-control">
                    <option selected value="">bitte wählen</option>
                    <option value="de">deutsch</option>
                    <option value="fr">französisch</option>
                    <option value="it">italienisch</option>
                    <option value="en">englisch</option>
                    <option value="rubrik">Rubrik</option>
                    <option value="info">Info</option>
                    <option value="carline">Carline</option>
                </select>
            </div>
            <div class="col-sm-4 errorContainer"></div>
        </div>
    </div>


    <div class="row">
        <div class="form-group">
            <label for="suche" class="col-sm-2 control-label">Suchen</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="search">
            </div>
        <div class="col-sm-4 errorContainer"></div>
    </div>
    </div>

    <div class="row">
        <div class="form-group">
            <div class="col-sm-2"></div>
            <div class="col-sm-1">
                <button type="submit" class="btn btn-primary" value="Suchen"">Suchen</button>
            </div>
            <div class="col-sm-1">
                <button type="reset" class="btn btn-primary" value=""">Zurueckstezen</button>
            </div>
        </div>
    </div>

</form>

<?php
//include footer
include "elements/footer.html";
?>


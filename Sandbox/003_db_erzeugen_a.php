<?php
//include header
include "elements/header.php";
?>

<?php
//include db connection
include "include/connect_db.php";
?>


<h2>Datensatz erzeugen</h2>
<p>Verschieden Parameter stehen zur Auswahl, kann beliebig erweitert werden</p>

<form action = "003_db_erzeugen_b.php" method = "post">

    <div class="row">
        <div class="form-group">
            <label class="col-sm-2 control-label">Deutsch</label>
            <div class="col-sm-6">
                <input class="form-control" name="dts">
            </div>
            <div class="col-sm-4 errorContainer"></div>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <label class="col-sm-2 control-label">Französisch</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="frz">
            </div>
            <div class="col-sm-4 errorContainer"></div>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <label class="col-sm-2 control-label">Italienisch</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="itl">
            </div>
            <div class="col-sm-4 errorContainer"></div>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <label class="col-sm-2 control-label">Englisch</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="eng">
            </div>
            <div class="col-sm-4 errorContainer"></div>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <label class="col-sm-2 control-label">Rubrik</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="rub">
            </div>
            <div class="col-sm-4 errorContainer"></div>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <label class="col-sm-2 control-label">Info</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="inf">
            </div>
            <div class="col-sm-4 errorContainer"></div>
        </div>
    </div>


    <div class="row">
    <label class="col-sm-2 control-label">Carline</label>
        <div class="col-sm-6">
    <label class="checkbox-inline">
        <input name="carline[]" type="checkbox" value="General">General
    </label>
    <label class="checkbox-inline">
        <input name="carline[]" type="checkbox" value="ADAM">ADAM
    </label>
    <label class="checkbox-inline">
        <input name="carline[]" type="checkbox" value="Astra HB5">Astra HB5
    </label>
    <label class="checkbox-inline">
        <input name="carline[]" type="checkbox" value="Astra ST">Astra ST
    </label>
    <label class="checkbox-inline">
        <input name="carline[]" type="checkbox" value="Corsa">Corsa
    </label>
    <label class="checkbox-inline">
        <input name="carline[]" type="checkbox" value="GTC/OPC">GTC/OPC
    </label>
    <label class="checkbox-inline">
        <input name="carline[]" type="checkbox" value="KARL">KARL
    </label>
    <label class="checkbox-inline">
        <input name="carline[]" type="checkbox" value="Meriva">Meriva
    </label>
        </div>
    </div>
    <div class="row">
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-6">
    <label class="checkbox-inline">
        <input name="carline[]" type="checkbox" value="MokkaX">MokkaX
    </label>
    <label class="checkbox-inline">
        <input name="carline[]" type="checkbox" value="Movano Combi Bus">Movano Combi Bus
    </label>
    <label class="checkbox-inline">
        <input name="carline[]" type="checkbox" value="Movano Fahrgestell">Movano Fahrgestell
    </label>
    <label class="checkbox-inline">
        <input name="carline[]" type="checkbox" value="Movano Van">Movano Van
    </label>
    <label class="checkbox-inline">
        <input name="carline[]" type="checkbox" value="Vivaro">Vivaro
    </label>
    <label class="checkbox-inline">
        <input name="carline[]" type="checkbox" value="Zafira">Zafira
    </label>
    </div>
    </div>

    <div class="row">
        <div class="form-group">
            <div class="col-sm-2"></div>
            <div class="col-sm-1">
                <input type="submit" class="btn btn-primary" value="Eintragen" name="gesendet"></input>
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

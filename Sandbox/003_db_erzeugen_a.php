<?php
//include header
include "elements/header.php";
?>

<?php
//include db connection
include "include/db_connect.php";
?>


<h2>Datensatz erzeugen</h2>
<p>Verschieden Parameter stehen zur Auswahl, kann beliebig erweitert werden</p>
<p>wird keine Carline ausgewählt, wird der Wert mit "General" initialisiert</p>

<form action = "003_db_erzeugen_b.php" method = "post">

    <div class="row">
        <div class="form-group">
            <label class="col-sm-2 control-label">Deutsch</label>
            <div class="col-sm-6">
                <textarea onkeyup='auto_grow(this)' class="form-control" name="dts"></textarea>
            </div>
            <div class="col-sm-4 errorContainer"></div>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <label class="col-sm-2 control-label">Französisch</label>
            <div class="col-sm-6">
                <textarea onkeyup='auto_grow(this)' type="text" class="form-control" name="frz"></textarea>
            </div>
            <div class="col-sm-4 errorContainer"></div>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <label class="col-sm-2 control-label">Italienisch</label>
            <div class="col-sm-6">
                <textarea onkeyup='auto_grow(this)' type="text" class="form-control" name="itl"></textarea>
            </div>
            <div class="col-sm-4 errorContainer"></div>
        </div>
    </div>
    <!--
    <div class="row">
        <div class="form-group">
            <label class="col-sm-2 control-label">Englisch</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="eng">
            </div>
            <div class="col-sm-4 errorContainer"></div>
        </div>
    </div>
    -->
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
        <div class="form-group">
    <label class="col-sm-2 control-label">Carline</label>
        <div class="col-sm-6">

            <select name="carline[]" id="example-getting-started" multiple="multiple" class="checkbox-inline">
                <option title="ADAM" value="ADAM">ADAM</option>
                <option title="Ampera" value="Ampera">Ampera</option>
                <option value="Antara">Antara</option>
                <option value="AstraST">AstraST</option>
                <option value="AstraNG">AstraNG</option>
                <option value="Cascada">Cascada</option>
                <option value="ComboKastenwagen">ComboKastenwagen</option>
                <option value="ComboPassenger">ComboPassenger</option>
                <option value="Corsa">Corsa</option>
                <option value="Crossland">Crossland</option>
                <option value="GTC_OPC">GTC_OPC</option>
                <option value="InsigniaLimousine">InsigniaLimousine</option>
                <option value="InsigniaOPC">InsigniaOPC</option>
                <option value="InsigniaST">InsigniaST</option>
                <option value="KARL">KARL</option>
                <option value="Meriva">Meriva</option>
                <option value="MokkaX">MokkaX</option>
                <option value="MovanoCombiBus">MovanoCombiBus</option>
                <option value="MovanoFahrgestell">MovanoFahrgestell</option>
                <option value="MovanoVan">MovanoVan</option>
                <option value="Zafira">Zafira</option>
            </select>

            <!--
    <label class="checkbox-inline">
        <input name="carline[]" type="checkbox" value="General">General
    </label>
    <label class="checkbox-inline">
        <input name="carline[]" type="checkbox" value="ADAM">ADAM
    </label>
    <label class="checkbox-inline">
        <input name="carline[]" type="checkbox" value="AstraHB5">AstraHB5
    </label>
    <label class="checkbox-inline">
        <input name="carline[]" type="checkbox" value="AstraST">AstraST
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
    -->
        </div>
        </div>
    </div>
    <!--
    <br>

    <div class="row">
        <label class="col-sm-2 control-label">an Übersetzer übergeben</label>
        <div class="col-sm-6">
            <label class="checkbox-inline">
                <input name="translate" type="hidden" value="false">
                <input name="translate" type="checkbox" value="true">
            </label>
        </div>
    </div>
    -->

    <div class="row">
        <div class="form-group">
            <div class="col-sm-2"></div>
            <div class="col-sm-1">
                <input type="submit" class="btn btn-primary" value="Eintragen" name="gesendet"></input>
            </div>
            <!--
            <div class="col-sm-1">
                <button type="reset" class="btn btn-primary" value=""">Zuruecksetzen</button>
            </div>
            -->
        </div>
    </div>




</form>

<?php
//include footer
include "elements/footer.html";
?>

<script>
    function auto_grow(element) {
        element.style.height = "5px";
        element.style.height = (element.scrollHeight)+"px";
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example-getting-started').multiselect();
    });
</script>
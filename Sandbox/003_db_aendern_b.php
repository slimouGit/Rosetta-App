<html>
<head>
    <title>Rosetta-App</title>
</head>
<?php
//include header
include "elements/header.php";
?>

<?php
//include db connection
include "include/db_connect.php";
?>



<h2>Daten ändern</h2>
<p>Bestehende Daten werden angezeigt und können geändert werden.</p>

<?php

if (isset($_POST['update']) ? $_POST['update'] : '')
{
    $sql = "select * from rosetta_data where id = '" . $_POST['update'] . "'";
    $res = mysqli_query($con, $sql);
    $dsatz = mysqli_fetch_assoc($res);



    echo "<form action = '003_db_aendern_c.php' method = 'post'>";

    echo "<div class='results'><!--in diesem container werden die Fragezeichen geloescht -->";

    echo "<p><input type='hidden' name='id' value='" . $_POST['update'] . "' /> </p>";
    echo "
                    <div class=\"row\">
                        <div class=\"form-group\">
                            <label class=\"col-sm-2 control-label\">Deutsch</label>
                            <div class=\"col-sm-6\">
                                <textarea onkeyup='auto_grow(this)' class=\"form-control \" name=\"dts\" value='" . utf8_encode($dsatz["de"]) . "'></textarea>
                            </div>
                            <div class=\"col-sm-4 errorContainer\"></div>
                        </div>
                    </div>
            
                    ";

    echo "
                    <div class=\"row\">
                        <div class=\"form-group\">
                            <label class=\"col-sm-2 control-label\">Französisch</label>
                            <div class=\"col-sm-6\">
                                <textarea onkeyup='auto_grow(this)' class=\"form-control\" name=\"frz\" value='" . utf8_encode($dsatz["fr"]) . "'></textarea>
                            </div>
                            <div class=\"col-sm-4 errorContainer\"></div>
                        </div>
                    </div>
            
                    ";

    echo "
                    <div class=\"row\">
                        <div class=\"form-group\">
                            <label class=\"col-sm-2 control-label\">Italienisch</label>
                            <div class=\"col-sm-6\">
                                <textarea onkeyup='auto_grow(this)' class=\"form-control\" name=\"itl\" value='" . utf8_encode($dsatz["it"]) . "'></textarea>
                            </div>
                            <div class=\"col-sm-4 errorContainer\"></div>
                        </div>
                    </div>
            
                    ";
    /**
    echo "
    <div class=\"row\">
    <div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">Englisch</label>
    <div class=\"col-sm-6\">
    <input class=\"form-control\" name=\"eng\" value='" . $dsatz["en"] . "'>
    </div>
    <div class=\"col-sm-4 errorContainer\"></div>
    </div>
    </div>

    ";
     **/
    echo "
                    <div class=\"row\">
                        <div class=\"form-group\">
                            <label class=\"col-sm-2 control-label\">Rubrik</label>
                            <div class=\"col-sm-6\">
                                <input class=\"form-control\" name=\"rub\" value='" . utf8_encode($dsatz["rubrik"]) . "'>
                            </div>
                            <div class=\"col-sm-4 errorContainer\"></div>
                        </div>
                    </div>
            
                    ";

    echo "
                    <div class=\"row\">
                        <div class=\"form-group\">
                            <label class=\"col-sm-2 control-label\">Info</label>
                            <div class=\"col-sm-6\">
                                <input class=\"form-control\" name=\"inf\" value='" . utf8_encode($dsatz["info"]) . "'>
                            </div>
                            <div class=\"col-sm-4 errorContainer\"></div>
                        </div>
                    </div>
            
                    ";

    echo "
                    <div class=\"row\">
                    <div class=\"form-group\"> 
                        <label class=\"col-sm-2 control-label\">Carline</label>
                    <div class=\"col-sm-6\">";


    $carline = array_map('trim', explode(", ", $dsatz['carline']));
    //print_r( $carline);
    /*
    if (in_array("General", $carline)) { ?> <input type="checkbox" value="General" name="carline[]" checked >General<?php }  else { ?> <input type="checkbox" value="General" name="carline[]"> <span class="carline">General</span><?php }
    if (in_array("ADAM", $carline)) { ?> <input type="checkbox" value="ADAM" name="carline[]" checked >ADAM<?php }  else { ?> <input type="checkbox" value="ADAM" name="carline[]"> ADAM<?php }
    if (in_array("AstraHB5", $carline)) { ?> <input type="checkbox" value="AstraHB5" name="carline[]" checked >AstraHB5<?php }  else { ?> <input type="checkbox" value="AstraHB5" name="carline[]"> AstraHB5<?php }
    if (in_array("AstraST", $carline)) { ?> <input type="checkbox" value="AstraST" name="carline[]" checked >AstraST<?php }  else { ?> <input type="checkbox" value="AstraST" name="carline[]"> AstraST<?php }
    if (in_array("Corsa", $carline)) { ?> <input type="checkbox" value="Corsa" name="carline[]" checked > Corsa<?php }  else { ?> <input type="checkbox" value="Corsa" name="carline[]">  Corsa<?php }
    if (in_array("GTC/OPC", $carline)) { ?> <input type="checkbox" value="GTC/OPC" name="carline[]" checked > GTC/OPC <?php }  else { ?> <input type="checkbox" value="GTC/OPC" name="carline[]">  GTC/OPC <?php }
    if (in_array("KARL", $carline)) { ?> <input type="checkbox" value="Karl" name="carline[]" checked >KARL<?php }  else { ?> <input type="checkbox" value="Karl" name="carline[]"> KARL<?php }
    if (in_array("Meriva", $carline)) { ?> <input type="checkbox" value="Meriva" name="carline[]" checked >Meriva<?php }  else { ?> <input type="checkbox" value="Meriva" name="carline[]"> Meriva<?php }
    if (in_array("MokkaX", $carline)) { ?> <input type="checkbox" value="MokkaX" name="carline[]" checked >MokkaX<?php }  else { ?> <input type="checkbox" value="MokkaX" name="carline[]"> MokkaX<?php }
    if (in_array("Movano Combi Bus", $carline)) { ?> <input type="checkbox" value="Movano Combi Bus" name="carline[]" checked >Movano Combi Bus<?php }  else { ?> <input type="checkbox" value="Movano Combi Bus" name="carline[]"> Movano Combi Bus<?php }
    if (in_array("Movano Fahrgestell", $carline)) { ?> <input type="checkbox" value="Movano Fahrgestell" name="carline[]" checked >Movano Fahrgestell<?php }  else { ?> <input type="checkbox" value="Movano Fahrgestell" name="carline[]"> Movano Fahrgestell<?php }
    if (in_array("Movano Van", $carline)) { ?> <input type="checkbox" value="Movano Van" name="carline[]" checked >Movano Van<?php }  else { ?> <input type="checkbox" value="Movano Van" name="carline[]"> Movano Van<?php }
    if (in_array("Vivaro", $carline)) { ?> <input type="checkbox" value="Vivaro" name="carline[]" checked >Vivaro<?php }  else { ?> <input type="checkbox" value="Vivaro" name="carline[]"> Vivaro<?php }
    if (in_array("Zafira", $carline)) { ?> <input type="checkbox" value="Zafira" name="carline[]" checked >Zafira<?php }  else { ?> <input type="checkbox" value="Zafira" name="carline[]"> Zafira<?php }

    var_dump($carline);
    */
    echo "
        <select name='carline[]' id='example-getting-started' multiple='multiple' class='checkbox-inline'>";
            if (in_array('ADAM', $carline)) { ?><option type='checkbox' selected title='ADAM' value='ADAM'>ADAM</option>    <?php } else { ?> <option  type='checkbox' title='ADAM' value='ADAM'>ADAM</option> <?php }
            if (in_array('Ampera', $carline)) { ?><option type='checkbox' selected title='Ampera' value='ADAM'>Ampera</option>    <?php } else { ?> <option  type='checkbox' title='Ampera' value='Ampera'>Ampera</option> <?php }
            if (in_array('Antara', $carline)) { ?><option type='checkbox' selected title='Antara' value='ADAM'>Antara</option>    <?php } else { ?> <option type='checkbox' title='Antara' value='Antara'>Antara</option> <?php }
            if (in_array('AstraST', $carline)) { ?><option type='checkbox' selected title='AstraST' value='AstraST'>AstraST</option>    <?php } else { ?> <option type='checkbox' title='AstraST' value='AstraST'>AstraST</option> <?php }
            if (in_array('AstraNG', $carline)) { ?><option type='checkbox' selected title='AstraNG' value='AstraNG'>AstraNG</option>    <?php } else { ?> <option  type='checkbox' title='AstraNG' value='AstraNG'>AstraNG</option> <?php }
            if (in_array('Cascada', $carline)) { ?><option type='checkbox' selected title='Cascada' value='Cascada'>Cascada</option>    <?php } else { ?> <option  type='checkbox' title='Cascada' value='Cascada'>Cascada</option> <?php }
            if (in_array('ComboKastenwagen', $carline)) { ?><option type='checkbox' selected title='ComboKastenwagen' value='ComboKastenwagen'>ComboKastenwagen</option>    <?php } else { ?> <option type='checkbox' title='ComboKastenwagen' value='ComboKastenwagen'>ComboKastenwagen</option> <?php }
            if (in_array('ComboPassenger', $carline)) { ?><option type='checkbox' selected title='ComboPassenger' value='ComboPassenger'>ComboPassenger</option>    <?php } else { ?> <option  type='checkbox' title='ComboPassenger' value='ComboPassenger'>ComboPassenger</option> <?php }
            if (in_array('ComboPassenger', $carline)) { ?><option type='checkbox' selected title='ComboPassenger' value='ComboPassenger'>ComboPassenger</option>    <?php } else { ?> <option  type='checkbox'  title='ComboPassenger' value='ComboPassenger'>ComboPassenger</option> <?php }
            if (in_array('Crossland', $carline)) { ?><option type='checkbox' selected title='Crossland' value='Crossland'>Crossland</option>    <?php } else { ?> <option  type='checkbox'  title='Crossland' value='Crossland'>Crossland</option> <?php }
            if (in_array('GTC_OPC', $carline)) { ?><option type='checkbox' selected title='GTC_OPC' value='GTC_OPC'>GTC_OPC</option>    <?php } else { ?> <option  type='checkbox'  title='GTC_OPC' value='GTC_OPC'>GTC_OPC</option> <?php }
            if (in_array('InsigniaLimousine', $carline)) { ?><option type='checkbox' selected title='InsigniaLimousine' value='InsigniaLimousine'>InsigniaLimousine</option>    <?php } else { ?> <option  type='checkbox'  title='InsigniaLimousine' value='InsigniaLimousine'>InsigniaLimousine</option> <?php }
            if (in_array('InsigniaOPC', $carline)) { ?><option type='checkbox' selected title='InsigniaOPC' value='InsigniaOPC'>InsigniaOPC</option>    <?php } else { ?> <option  type='checkbox'  title='InsigniaOPC' value='InsigniaOPC'>InsigniaOPC</option> <?php }
            if (in_array('InsigniaST', $carline)) { ?><option type='checkbox' selected title='InsigniaST' value='InsigniaST'>InsigniaST</option>    <?php } else { ?> <option  type='checkbox'  title='InsigniaST' value='InsigniaST'>InsigniaST</option> <?php }
            if (in_array('KARL', $carline)) { ?><option type='checkbox' selected title='KARL' value='KARL'>KARL</option>    <?php } else { ?> <option  type='checkbox'  title='KARL' value='KARL'>KARL</option> <?php }
            if (in_array('Meriva', $carline)) { ?><option type='checkbox' selected title='Meriva' value='Meriva'>Meriva</option>    <?php } else { ?> <option  type='checkbox'  title='Meriva' value='Meriva'>Meriva</option> <?php }
            if (in_array('MokkaX', $carline)) { ?><option type='checkbox' selected title='MokkaX' value='MokkaX'>MokkaX</option>    <?php } else { ?> <option  type='checkbox'  title='MokkaX' value='MokkaX'>MokkaX</option> <?php }
            if (in_array('MovanoCombiBus', $carline)) { ?><option type='checkbox' selected title='MovanoCombiBus' value='MovanoCombiBus'>InsigniMovanoCombiBusaOPC</option>    <?php } else { ?> <option  type='checkbox'  title='MovanoCombiBus' value='MovanoCombiBus'>MovanoCombiBus</option> <?php }
            if (in_array('MovanoFahrgestell', $carline)) { ?><option type='checkbox' selected title='MovanoFahrgestell' value='MovanoFahrgestell'>MovanoFahrgestell</option>    <?php } else { ?> <option  type='checkbox'  title='MovanoFahrgestell' value='MovanoFahrgestell'>MovanoFahrgestell</option> <?php }
            if (in_array('MovanoVan', $carline)) { ?><option type='checkbox' selected title='MovanoVan' value='MovanoVan'>MovanoVan</option>    <?php } else { ?> <option  type='checkbox' checked title='MovanoVan' value='MovanoVan'>MovanoVan</option> <?php }
            if (in_array('Zafira', $carline)) { ?><option type='checkbox' selected title='Zafira' value='Zafira'>Zafira</option>    <?php } else { ?> <option  type='checkbox' checked title='Zafira' value='Zafira'>Zafira</option> <?php }
                     
    echo "</select>";

    echo "
                    </div>
                        <div class=\"col-sm-4 errorContainer\"></div>
                    </div>
                    </div>
                    </div>
   
                    ";


    echo "<input type='hidden' name='orianr' value='" . $_POST["update"] . "' />";

    echo "
                <div class=\"row button\">
                    <div class=\"form-group\">
                        <div class=\"col-sm-2\"></div>
                        <div class=\"col-sm-1\">
                            <input type=\"submit\" class=\"btn btn-primary\" value=\"Eintragen\" name=\"gesendet\"></input>
                        </div>
                        <div class=\"col-sm-1\">
                            <button type=\"reset\" class=\"btn btn-primary\" value=\"\"\">Zuruecksetzen</button>
                        </div>
                    </div>
                </div>
                
                ";

    echo "</div>";

    echo "</form>";

    //close connection
    mysqli_close($con);
}
else
    echo "<p>Es wurde kein Datensatz ausgewaehlt</p>";
?>

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

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
$test = true;
echo "before isset";
    if (isset($_POST['update']) ? $_POST['update'] : '')
    {
        echo "if isset";
        $sql = "select * from rosetta_data where id = '" . $_POST['update'] . "'";
        $res = mysqli_query($con, $sql);
        $dsatz = mysqli_fetch_assoc($res);



        echo "<form action = '003_db_aendern_c.php' method = 'post'>";

            echo "<p><input type='hidden' name='id' value='" . $_POST['update'] . "' /> </p>";
            echo "
                    <div class=\"row\">
                        <div class=\"form-group\">
                            <label class=\"col-sm-2 control-label\">Deutsch</label>
                            <div class=\"col-sm-6\">
                                <input class=\"form-control\" name=\"dts\" value='" . utf8_encode($dsatz["de"]) . "'>
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
                                <input class=\"form-control\" name=\"frz\" value='" . utf8_encode($dsatz["fr"]) . "'>
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
                                <input class=\"form-control\" name=\"itl\" value='" . utf8_encode($dsatz["it"]) . "'>
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
                        <label class=\"col-sm-2 control-label\">Carline</label>
                    <div class=\"col-sm-6\">";


        $carline = array_map('trim', explode(", ", $dsatz['carline']));
        //print_r( $carline);
        if (in_array("General", $carline)) { ?> <input type="checkbox" value="General" name="carline[]" checked >General<?php }  else { ?> <input type="checkbox" value="General" name="carline[]"> <span class="carline">General</span><?php }
        if (in_array("ADAM", $carline)) { ?> <input type="checkbox" value="ADAM" name="carline[]" checked >ADAM<?php }  else { ?> <input type="checkbox" value="ADAM" name="carline[]"> ADAM<?php }
        if (in_array("Astra HB5", $carline)) { ?> <input type="checkbox" value="Astra HB5" name="carline[]" checked >Astra HB5<?php }  else { ?> <input type="checkbox" value="Astra HB5" name="carline[]"> Astra HB5<?php }
        if (in_array("Astra ST", $carline)) { ?> <input type="checkbox" value="Astra ST" name="carline[]" checked >Astra ST<?php }  else { ?> <input type="checkbox" value="Astra ST" name="carline[]"> Astra ST<?php }
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

            echo "
                    </div>
                        <div class=\"col-sm-4 errorContainer\"></div>
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


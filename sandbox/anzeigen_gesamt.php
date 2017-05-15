
<?php
//include header
include "elements/header.php";
?>

<?php
$id=0;
?>

<?php
//include db connection
include "include/db_connect.php";
?>

<h2>Ausgabe aller Datensätze</h2>
<p></p>


<script type="text/javascript">
    function send(ak,id)
    {
        if(ak==0)
            document.f.ak.value = "in";
        else if(ak==1)
            document.f.ak.value = "up";
        else if(ak==2)
        {
            if (confirm("Datensatz mit id " + id + " löschen?"))
                document.f.ak.value = "del";
            else
                return;
        }
        document.f.id.value = id;
        document.f.submit();
    }
</script>



<?php


/* Aktion ausf�hren */
if(isset($_POST["ak"]))
{
    /* neu eintragen */
    if($_POST["ak"]=="in")
    {
        /*$sql = "insert rosetta_data"
            . "(id, de, fr) values ('"
            . "('" . $_POST["ident"][0] . "', '" . $_POST["dts"][0] . "', '"  . $_POST["frz"][0] . "')";
        */
        $sql = "INSERT INTO rosetta_data (de, fr, it, comment_de, comment_fr, comment_it, rubrik, info, carline)
          VALUES ('"    . $_POST["dts"][0] . "', '"
                        . $_POST["frz"][0] . "', '"
                        . $_POST["itl"][0] . "', '"
                        . $_POST["com_de"][0] . "', '"
                        . $_POST["com_fr"][0] . "', '"
                        . $_POST["com_it"][0] . "', '"
                        . $_POST["rub"][0] . "', '"
                        . $_POST["inf"][0] . "', '"
                        . $_POST["car"][0] . "')";
        mysqli_query($con, $sql);
    }

    /* �ndern */
    else if($_POST["ak"]=="up")
    {
        $id_nr = $_POST["id"];

        //Pruefung, ob checkboxen ausgewaehlt wurden
        if(!empty($carline)) {
            //das Array carline wird ueber implode in $car gespeichert
            $car = implode(', ', $carline);
        }
//
        if(empty($car)) {
            $car = 'General';
        }


        $sql = "
                UPDATE rosetta_data SET 
               de = '" . $_POST["dts"][$id_nr] . "',"
            . "fr = '" . $_POST["frz"][$id_nr] . "',"
            . "it = '" . $_POST["itl"][$id_nr] . "',"
            . "comment_de = '" . $_POST["com_de"][$id_nr] . "',"
            . "comment_fr = '" . $_POST["com_fr"][$id_nr] . "',"
            . "comment_it = '" . $_POST["com_it"][$id_nr] . "',"
            . "rubrik = '" . $_POST["rub"][$id_nr] . "',"
            . "info = '" . $_POST["inf"][$id_nr] . "',"
            . " carline = '" . $car . "'"
            . " WHERE id=$id_nr
                ";
/*

        $sql = "UPDATE rosetta_data SET * WHERE id=$id_nr";
*/
        mysqli_query($con, $sql);



    }

    /* l�schen */
    else if($_POST["ak"]=="del")
    {
        $sql = "delete from rosetta_data where id = " . $_POST["id"];
        mysqli_query($con, $sql);
    }
}

/* Formular-Beginn */
echo "<form name='f' action='anzeigen_gesamt.php'
               method='post'>";
echo "<input name='ak' type='hidden' />";
echo "<input name='id' type='hidden' />";

/* Tabellen-Beginn */
echo "<table class='table table-hover table-responsive table-striped'>"
    . "<thead>"
    . "<tr>"
    //. "<th class=\"col-sm-1\">ID</th>"
    . "<th class=\"col-sm-4\">DE</th>"
    . "<th class=\"col-sm-4\">FR</th>"
    . "<th class=\"col-sm-4\">IT</th>"
    . "<th class=\"col-sm-4\">Rubrik</th>"
    . "<th class=\"col-sm-4\">Info/Code</th>"
    . "<th class=\"col-sm-4\">Carline</th>"
    . "<th class=\"col-sm-1\"></th>"
    . "</tr>"
    . "</thead>";

/* Neuer Eintrag */
echo "<tr>"
    //. "<td><input class='toEdit' name='ident[0]' size='3' /></td>"
    //. "<td size='3' /></td>"
    . "<td><input class='toEdit' name='dts[0]' size='40' /></td>"
    . "<td><input class='toEdit' name='frz[0]' size='40' /></td>"
    . "<td><input class='toEdit' name='itl[0]' size='40' /></td>"
    . "<td><input class='toEdit' name='rub[0]' size='40' /></td>"
    . "<td><input class='toEdit' name='inf[0]' size='40' /></td>"
    . "<td><a href='javascript:send(0,0);'>neu eintragen</a></td>"
    . "</tr>";

/* Anzeigen */
//$res = mysqli_query($con, "select * from rosetta_data where id = 136");
$res = mysqli_query($con, "select * from rosetta_data");

/* Alle vorhandenen Datens�tze */
while ($dsatz = mysqli_fetch_assoc($res))
{
    $result_array[] = $dsatz;
    //var_dump($result_array);
    $id_nr = $dsatz["id"];
    echo "\n\n<tr>"
        //. "<td rowspan='2'>" . $dsatz["id"] . "</td>"
        . "<td><textarea onkeyup='auto_grow(this)' class='form-control' name='dts[$id_nr]' id=\"de_$id\">" . utf8_encode( $dsatz["de"] ) . "</textarea><button data-copytarget=\"#de_$id\">copy</button></td>"
        . "<td><textarea onkeyup='auto_grow(this)' class='form-control' name='frz[$id_nr]' id=\"fr_$id\">" . utf8_encode( $dsatz["fr"] ) . "</textarea><button data-copytarget=\"#fr_$id\">copy</button></td>"
        . "<td><textarea onkeyup='auto_grow(this)' class='form-control' name='itl[$id_nr]' id=\"it_$id\">" . utf8_encode( $dsatz["it"] ) . "</textarea><button data-copytarget=\"#it_$id\">copy</button></td>"
        . "<td><textarea onkeyup='auto_grow(this)' class='form-control' name='rub[$id_nr]' >" . utf8_encode( $dsatz["rubrik"] ) . "</textarea></td>"
        . "<td><textarea onkeyup='auto_grow(this)' class='form-control' name='inf[$id_nr]' >" . utf8_encode( $dsatz["info"] ) . "</textarea></td>"
        . "<td>";

    $carline = $dsatz["carline"];
    $carline = explode(', ',$carline);
$counter = count($carline);
//var_dump($carlineArray);
//alle referenzierten Carlines werden mit jeweiligem Preislisten-PDF verlinkt
//for ($i = 0; $i < $counter;$i++) {
    echo "<select name='carline[]' class='example-getting-started' multiple='multiple' class='checkbox-inline'>";
        if (in_array('ADAM', $carline)) { $dsatz["de"] ?><option selected value='ADAM'>ADAM</option>    <?php } else { ?> <option value='ADAM'>ADAM</option> <?php }
        if (in_array('Ampera', $carline)) { ?><option selected value='ADAM'>Ampera</option>    <?php } else { ?> <option value='Ampera'>Ampera</option> <?php }
        if (in_array('Antara', $carline)) { ?><option selected value='ADAM'>Antara</option>    <?php } else { ?> <option value='Antara'>Antara</option> <?php }
        if (in_array('AstraST', $carline)) { ?><option selected value='AstraST'>AstraST</option>    <?php } else { ?> <option value='AstraST'>AstraST</option> <?php }
        if (in_array('AstraNG', $carline)) { ?><option selected value='AstraNG'>AstraNG</option>    <?php } else { ?> <option value='AstraNG'>AstraNG</option> <?php }
        if (in_array('Cascada', $carline)) { ?><option selected value='Cascada'>Cascada</option>    <?php } else { ?> <option value='Cascada'>Cascada</option> <?php }
        if (in_array('ComboKastenwagen', $carline)) { ?><option selected value='ComboKastenwagen'>ComboKastenwagen</option>    <?php } else { ?> <option value='ComboKastenwagen'>ComboKastenwagen</option> <?php }
        if (in_array('ComboPassenger', $carline)) { ?><option selected value='ComboPassenger'>ComboPassenger</option>    <?php } else { ?> <option value='ComboPassenger'>ComboPassenger</option> <?php }
        if (in_array('ComboPassenger', $carline)) { ?><option selected value='ComboPassenger'>ComboPassenger</option>    <?php } else { ?> <option value='ComboPassenger'>ComboPassenger</option> <?php }
        if (in_array('Crossland', $carline)) { ?><option selected value='Crossland'>Crossland</option>    <?php } else { ?> <option value='Crossland'>Crossland</option> <?php }
        if (in_array('GTC_OPC', $carline)) { ?><option selected value='GTC_OPC'>GTC_OPC</option>    <?php } else { ?> <option value='GTC_OPC'>GTC_OPC</option> <?php }
        if (in_array('InsigniaLimousine', $carline)) { ?><option selected value='InsigniaLimousine'>InsigniaLimousine</option>    <?php } else { ?> <option value='InsigniaLimousine'>InsigniaLimousine</option> <?php }
        if (in_array('InsigniaOPC', $carline)) { ?><option selected value='InsigniaOPC'>InsigniaOPC</option>    <?php } else { ?> <option value='InsigniaOPC'>InsigniaOPC</option> <?php }
        if (in_array('InsigniaST', $carline)) { ?><option selected value='InsigniaST'>InsigniaST</option>    <?php } else { ?> <option value='InsigniaST'>InsigniaST</option> <?php }
        if (in_array('KARL', $carline)) { ?><option selected value='KARL'>KARL</option>    <?php } else { ?> <option value='KARL'>KARL</option> <?php }
        if (in_array('Meriva', $carline)) { ?><option selected value='Meriva'>Meriva</option>    <?php } else { ?> <option value='Meriva'>Meriva</option> <?php }
        if (in_array('MokkaX', $carline)) { ?><option selected value='MokkaX'>MokkaX</option>    <?php } else { ?> <option value='MokkaX'>MokkaX</option> <?php }
        if (in_array('MovanoCombiBus', $carline)) { ?><option selected value='MovanoCombiBus'>InsigniMovanoCombiBusaOPC</option>    <?php } else { ?> <option value='MovanoCombiBus'>MovanoCombiBus</option> <?php }
        if (in_array('MovanoFahrgestell', $carline)) { ?><option selected value='MovanoFahrgestell'>MovanoFahrgestell</option>    <?php } else { ?> <option value='MovanoFahrgestell'>MovanoFahrgestell</option> <?php }
        if (in_array('MovanoVan', $carline)) { ?><option selected value='MovanoVan'>MovanoVan</option>    <?php } else { ?> <option value='MovanoVan'>MovanoVan</option> <?php }
        if (in_array('Zafira', $carline)) { ?><option selected value='Zafira'>Zafira</option>    <?php } else { ?> <option value='Zafira'>Zafira</option> <?php }
    echo "</select>";
//var_dump($carline);
//}
        //<textarea onkeyup='auto_grow(this)' class='form-control' name='car[$id_nr]' >" . utf8_encode( $dsatz["carline"] ) . "</textarea>

    /*
     $carline = array_map('trim', explode(", ", $dsatz['carline']));

        echo "<select name='carline[]' id='example-getting-started' multiple='multiple' class='checkbox-inline'>";


        if (in_array('ADAM', $carline)) { ?><option type='checkbox' name='car[$id_nr]' selected title='ADAM' value='ADAM'>ADAM</option>    <?php } else { ?> <option  type='checkbox' name='car[$id_nr]' title='ADAM' value='ADAM'>ADAM</option> <?php };
        if (in_array('Ampera', $carline)) { ?><option type='checkbox' name='car[$id_nr]' selected title='Ampera' value='ADAM'>Ampera</option>    <?php } else { ?> <option  type='checkbox' name='car[$id_nr]' title='Ampera' value='Ampera'>Ampera</option> <?php }
        if (in_array('Antara', $carline)) { ?><option type='checkbox' name='car[$id_nr]' selected title='Antara' value='ADAM'>Antara</option>    <?php } else { ?> <option type='checkbox' name='car[$id_nr]' title='Antara' value='Antara'>Antara</option> <?php }
        if (in_array('AstraST', $carline)) { ?><option type='checkbox' name='car[$id_nr]' selected title='AstraST' value='AstraST'>AstraST</option>    <?php } else { ?> <option type='checkbox' name='car[$id_nr]' title='AstraST' value='AstraST'>AstraST</option> <?php }
        if (in_array('AstraNG', $carline)) { ?><option type='checkbox' name='car[$id_nr]' selected title='AstraNG' value='AstraNG'>AstraNG</option>    <?php } else { ?> <option  type='checkbox' name='car[$id_nr]' title='AstraNG' value='AstraNG'>AstraNG</option> <?php }
        if (in_array('Cascada', $carline)) { ?><option type='checkbox' name='car[$id_nr]' selected title='Cascada' value='Cascada'>Cascada</option>    <?php } else { ?> <option  type='checkbox' name='car[$id_nr]' title='Cascada' value='Cascada'>Cascada</option> <?php }
        if (in_array('ComboKastenwagen', $carline)) { ?><option type='checkbox' selected title='ComboKastenwagen' value='ComboKastenwagen'>ComboKastenwagen</option>    <?php } else { ?> <option type='checkbox' title='ComboKastenwagen' value='ComboKastenwagen'>ComboKastenwagen</option> <?php }
        if (in_array('ComboPassenger', $carline)) { ?><option type='checkbox' selected title='ComboPassenger' value='ComboPassenger'>ComboPassenger</option>    <?php } else { ?> <option  type='checkbox' title='ComboPassenger' value='ComboPassenger'>ComboPassenger</option> <?php }
        echo "</select>";
*/
        echo "</td>"
        . "<td rowspan='2'><a href='javascript:send(1,$id_nr);'><img src=\"img/button_agree.png\"></a>"
        . " <a href='javascript:send(2,$id_nr);'><img src=\"img/button_delete.png\"></a></td>"
        . "</tr>"
        ."<tr>"
        ."<td><input class='form-control cellComment' name='com_de[$id_nr]' value='" . utf8_encode( $dsatz["comment_de"] ) . "' size='40' /></td>"
        ."<td><input class='form-control cellComment' name='com_fr[$id_nr]' value='" . utf8_encode( $dsatz["comment_fr"] ) . "' size='40' /></td>"
        ."<td><input class='form-control cellComment' name='com_it[$id_nr]' value='" . utf8_encode( $dsatz["comment_it"] ) . "' size='40' /></td>"
        ."</tr>";
$id +=1;
}
echo "</table>";
echo "</form>";

mysqli_close($con);
?>
</body>
</html>

<script>
    function auto_grow(element) {
        element.style.height = "5px";
        element.style.height = (element.scrollHeight)+"px";
    }
</script>
<?php
//include footer
include "elements/footer.html";
?>
<script>
    (function() {

        'use strict';

        // click events
        document.body.addEventListener('click', copy, true);

        // event handler
        function copy(e) {

            // find target element
            var
                t = e.target,
                c = t.dataset.copytarget,
                inp = (c ? document.querySelector(c) : null);

            // is element selectable?
            if (inp && inp.select) {

                // select text
                inp.select();

                try {
                    // copy text
                    document.execCommand('copy');
                    inp.focus();

                    // copied animation
                    t.classList.add('copied');
                    setTimeout(function() { t.classList.remove('copied'); }, 1500);
                }
                catch (err) {
                    alert('please press Ctrl/Cmd+C to copy');
                }

            }

        }

    })();
</script>
<?php
//include header
include "elements/header.php";
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
        if(!empty($_POST['carline'])) {
            //das Array carline wird ueber implode in $car gespeichert
            $car = implode(', ', $_POST['carline']);
        }
//falls keine Carline genannt wurde, wird die Variable mit General belegt
        if(empty($car)) {
            $car = 'General';
        }

        $countCarline = count($car);
        for($i = 0;$i < $countCarline;$i++){

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
            . "carline = '" . $car . "'"
            . " WHERE id=$id_nr
                ";

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
echo "<form name='f' action='003_db_anzeigen_gesamt.php'
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
        . "<td><textarea onkeyup='auto_grow(this)' class='form-control' name='dts[$id_nr]' >" . utf8_encode( $dsatz["de"] ) . "</textarea></td>"
        . "<td><textarea onkeyup='auto_grow(this)' class='form-control' name='frz[$id_nr]' >" . utf8_encode( $dsatz["fr"] ) . "</textarea></td>"
        . "<td><textarea onkeyup='auto_grow(this)' class='form-control' name='itl[$id_nr]' >" . utf8_encode( $dsatz["it"] ) . "</textarea></td>"
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
    //echo "<option name='carline[]' type='checkbox' title='ADAM' value='ADAM'>ADAM</option>";
    //echo "<option name='carline[]' type='checkbox' title='Ampera' value='Ampera'>Ampera</option>";
     //foreach ($carline as $carKey){
        if (in_array('ADAM', $carline)) { ?><option name='car[$id_nr]' type='checkbox' selected title='ADAM' value='ADAM'>ADAM</option>    <?php } else { ?> <option name='car[$id_nr]' type='checkbox' title='ADAM' value='ADAM'>ADAM</option> <?php }
        if (in_array('Ampera', $carline)) { ?><option name='car[$id_nr]' type='checkbox' selected title='Ampera' value='ADAM'>Ampera</option>    <?php } else { ?> <option name='car[$id_nr]' type='checkbox' title='Ampera' value='Ampera'>Ampera</option> <?php }
        if (in_array('Antara', $carline)) { ?><option name='car[$id_nr]' type='checkbox' selected title='Antara' value='ADAM'>Antara</option>    <?php } else { ?> <option name='car[$id_nr]' type='checkbox' title='Antara' value='Antara'>Antara</option> <?php }
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
        // echo "<option type='checkbox' name='car[$id_nr]' selected title='$carKey' value='$carKey'>$carKey</option>";
   // }

    //   echo "<a href='pl/" . $carKey . "_df.pdf' target='_blank'>" . $carKey . " (DF)" . "</a><br/>";
   // echo "<a href='pl/" . $carKey . "_di.pdf' target='_blank'>" . $carKey . " (DI)" . "</a><br/>";
    echo "</select>";

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

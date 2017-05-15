

<?php
$id=0;
?>
<table class="table table-hover table-responsive">
    <thead>
    <tr>
        <th class="col-sm-1">Id</th>
        <th class="col-sm-2">De</a></th>
        <th class="col-sm-2">Fr</th>
        <th class="col-sm-2">It</th>
        <!--
        <th class="col-sm-2">En</th>
        -->
        <th class="col-sm-2">Rubrik</th>
        <th class="col-sm-2">Info/Code</th>
        <th class="col-sm-2">Carline</th>
        <th class="col-sm-2"></th>
        <th class="col-sm-2" colspan="3">Edit</th>
    </tr>
    </thead>
    <tbody class="results">

    <?php

    //falls nicht ueber die Suchfunktion auf die Daten zugegriffen wird,
    //ist $searchWord nicht initialisiert und die Daten werden nicht ausgegeben
    if(empty($searchWord)){$searchWord="";};
    //Slash wird in Variable $slash gespeichert
    $slash = "/";
    //es wird getestet, ob der Datensatz einen Slash enthaellt
    //je nach Ergebnis werden die Daten in seperater Funktion ausgegeben
    if(strstr($searchWord, $slash)){
        echo "<br/>"."Slash inside query";
        viewWithSlash($res, $id);
    }else{
        viewWithOutSlash($searchWord, $res, $id);
    }
    //Falls im Datensatz Slash enthalten, wier diese Funktion aufgerufen
    function viewWithSlash($res, $id)
    {
        /* Datensaetze aus Ergebnis ermitteln, */
        /* in Array speichern und ausgeben    */
        while ($dsatz = mysqli_fetch_assoc($res))
        {

            $generateUser = $dsatz['user'];
            if($generateUser=="default"){
                $generateUser = "uploaded data";
            }

            $updateUser = $dsatz['updateBy'];
            if(!empty($updateUser)){
                $showUpdateData =" / " .  (date('d.m.Y H:i', strtotime($dsatz['date']))) . " Uhr - geändert von: " . $updateUser;
            }else{
                $showUpdateData = "";
            }

            $id++;
            //Benutzer Zeile
            echo "<tr class='timeRow'>"
                ."<td></td>"
                ."<td colspan='3' class='columnDateTime'>" . (date('d.m.Y H:i', strtotime($dsatz['create']))) . " Uhr - erstellt von: " . $generateUser . $showUpdateData . "</td>"
                ."<td class='columnCommentTranslator'></td>"
                ."<td class='columnCommentTranslator'></td>"
                ."<td></td>"
                ."<td></td>"
                ."<td></td>"
                ."<td></td>"
                ."<td></td>"
                ."</tr>";
            //Daten Zeile
            echo
                "<tr>".
                "<td>" . $dsatz["id"] . "</td>" .
                "<td>
                <div >
                <form  method = \"post\">
                    <div class='commentIcon'>
                        <input  type=\"image\" name='update' value='" . $dsatz["id"] . "' src=\"img/button_comment.png\" class=\"editButton\"  formaction=\"kommentar_de.php\"></button>
                    </div>
                    <div id=\"de_$id\" class='commentValue'>"  . utf8_encode($dsatz["de"]) . "
                    <input type='image' name='search' value='" . utf8_encode($dsatz["de"]) . "' src='img/button_search.png' class='editButton'  formaction='filtern.php'></button></div>
                   </form>
                    <input type='image' onclick=\"copyToClipboard('#de_$id')\" src='img/button_copy.png' class='editButton'></div>
                </div>
            </td>".
                "<td>
                <div >
                <form  method = \"post\">
                    <div class='commentIcon'>
                        <input  type=\"image\" name='update' value='" . $dsatz["id"] . "' src=\"img/button_comment.png\" class=\"editButton\"  formaction=\"kommentar_fr.php\"></button>
                    </div>
                    <div id=\"fr_$id\" class='commentValue'>"  . utf8_encode($dsatz["fr"]) . "
                    <input type='image' name='search' value='" . utf8_encode($dsatz["fr"]) . "' src='img/button_search.png' class='editButton'  formaction='filtern.php'></button></div>
                    </form>
                    <input type='image' onclick=\"copyToClipboard('#fr_$id')\" src='img/button_copy.png' class='editButton'></div>
                </div>
            </td>".
                "<td>
                <div >
                <form  method = \"post\">
                    <div class='commentIcon'>
                        <input  type=\"image\" name='update' value='" . $dsatz["id"] . "' src=\"img/button_comment.png\" class=\"editButton\"  formaction=\"kommentar_it.php\"></button>
                    </div>
                    <div id=\"it_$id\" class='commentValue'>"  . utf8_encode($dsatz["it"]) . "
                    <input type='image' name='search' value='" . utf8_encode($dsatz["it"]) . "' src='img/button_search.png' class='editButton'  formaction='filtern.php'></button></div>
                   </form>
                    <input type='image' onclick=\"copyToClipboard('#it_$id')\" src='img/button_copy.png' class='editButton'></div>
            </div>
            </td>".
                "<form  method = \"post\">".

                "<td class='filter columnCarline'><input type='submit' class='filterLink' name='search' value='" . $dsatz["rubrik"] . "' src='img/button_search.png' class='editButton'  formaction='filtern.php'></button></td>".
                "<td class='filter columnCarline'><input type='submit' class='filterLink' name='search' value='" . $dsatz["info"] . "' src='img/button_search.png' class='editButton'  formaction='filtern.php'></button></td>".
                "</form>".
                "<td class='columnCarline'>";
            $carlineArray = $dsatz["carline"];
            $carlineArray = explode(', ',$carlineArray);
            //alle referenzierten Carlines werden mit jeweiligem Preislisten-PDF verlinkt
            foreach ($carlineArray as $carKey){
                echo "<a href='pl/".$carKey."_df.pdf' target='_blank'>" . $carKey . " (DF)" . "</a><br/>";
                echo "<a href='pl/".$carKey."_di.pdf' target='_blank'>" . $carKey . " (DI)" . "</a><br/>";
            }
            echo    "</td>";
            echo    "<form  method = \"post\"><td >
                    <input  type=\"image\" name='update' value='" . $dsatz["id"] . "' src=\"img/button_edit.png\" class=\"editButton\"  formaction=\"aendern_b.php\"></button>
                </td></form>".
                "<form  method = \"post\"><td >
                    <input  type=\"image\" name='delete' value='" . $dsatz["id"] . "' src=\"img/button_delete.png\" class=\"editButton\"   formaction=\"loeschen_b.php\"></button>
                </td></form>".
                "</tr>";
            //Kommentar Zeile
            echo "<tr class='commentRow'>"
                ."<td></td>"
                ."<td class='cellComment'>
                <div class='commentContainer'>
                    <div class='commentIcon'>
                        <input  type=\"image\" name='update' value='" . $dsatz["id"] . "' src=\"img/button_editComment.png\" class=\"editButton\"  formaction=\"kommentar_de.php\"></button>
                    </div>
                    <div class='commentValue'>" . utf8_encode($dsatz["comment_de"]) . "</div>            
                </div>
            </td>"
                ."<td class='cellComment'>
                <div class='commentContainer'>
                    <div class='commentIcon'>
                        <input  type=\"image\" name='update' value='" . $dsatz["id"] . "' src=\"img/button_editComment.png\" class=\"editButton\"  formaction=\"kommentar_fr.php\"></button>
                    </div>
                    <div class='commentValue'>" . utf8_encode($dsatz["comment_fr"]) . "</div>            
                </div>
            </td>"
                //."<td class='cellComment'>" . utf8_encode($dsatz["comment_fr"]) . "</td>"
                ."<td class='cellComment'>
                <div class='commentContainer'>
                    <div class='commentIcon'>
                        <input  type=\"image\" name='update' value='" . $dsatz["id"] . "' src=\"img/button_editComment.png\" class=\"editButton\"  formaction=\"kommentar_it.php\"></button>
                    </div>
                    <div class='commentValue'>" . utf8_encode($dsatz["comment_it"]) . "</div>            
                </div>
            </td>"
                ."<td></td>"
                ."<td></td>"
                ."<td></td>"
                ."<td></td>"
                ."<td></td>"
                ."</tr>";
            echo "<tr>"
                ."<td></td>"
                ."<td><div class='commentUser'>" . utf8_encode($dsatz["comment_de_user"]) . "</div> </td>"
                ."<td><div class='commentUser'>" . utf8_encode($dsatz["comment_fr_user"]) . "</div> </td>"
                ."<td><div class='commentUser'>" . utf8_encode($dsatz["comment_it_user"]) . "</div> </td>"
                ."</tr>";
            //http://stackoverflow.com/questions/917610/put-icon-inside-input-element-in-a-form
        }//ENDE WHILE

    }//ENDE viewWithSlash
    //Falls im Datensatz KEIN Slash enthalten, wier diese Funktion aufgerufen
    function viewWithOutSlash($searchWord, $res, $id)
    {
        /* Datensaetze aus Ergebnis ermitteln, */
        /* in Array speichern und ausgeben    */
        while ($dsatz = mysqli_fetch_assoc($res))
        {

            $generateUser = $dsatz['user'];
            if($generateUser=="default"){
                $generateUser = "uploaded data";
            }

            $updateUser = $dsatz['updateBy'];
            if(!empty($updateUser)){
                $showUpdateData =" / " .  (date('d.m.Y H:i', strtotime($dsatz['date']))) . " Uhr - geändert von: " . $updateUser;
            }else{
                $showUpdateData = "";
            }

            $id++;
            //Benutzer Zeile
            echo "<tr class='timeRow'>"
                ."<td></td>"
                ."<td colspan='3' class='columnDateTime'>" . (date('d.m.Y H:i', strtotime($dsatz['create']))) . " Uhr - erstellt von: " . $generateUser . $showUpdateData . "</td>"
                ."<td class='columnCommentTranslator'></td>"
                ."<td class='columnCommentTranslator'></td>"
                ."<td></td>"
                ."<td></td>"
                ."<td></td>"
                ."<td></td>"
                ."<td></td>"
                ."</tr>";
            //Daten Zeile
            echo
                "<tr>".
                "<td>" . $dsatz["id"] . "</td>".
                "<td>
                <div>
                    <form  method = \"post\">
                    <div class='commentIcon'>
                        <input  type=\"image\" name='update' value='" . $dsatz["id"] . "' src=\"img/button_comment.png\" class=\"editButton\"  formaction=\"kommentar_de.php\"></button>
                    </div>
                    <div id=\"de_$id\" class='commentValue'>" . utf8_encode(preg_replace("/" . $searchWord. "/", "<span class='highlight'>" . $searchWord . "</span>",$dsatz["de"]))       . "
                     <input type='image' name='search' value='" . utf8_encode($dsatz["de"]) . "' src='img/button_search.png' class='editButton'  formaction='filtern.php'></button></div>
                     </form>
                     <input type='image' onclick=\"copyToClipboard('#de_$id')\" src='img/button_copy.png' class='editButton'></div>
                     <!--<button onclick=\"copyToClipboard('#de_$id')\">copy</button>    -->       
                </div>
            </td>".
                //"<td>" . utf8_encode(preg_replace("/" . $searchWord. "/", "<span class='highlight'>" . $searchWord . "</span>",$dsatz["de"]))       . "</td>".
                "<td>
                <div>
                <form  method = \"post\">
                    <div class='commentIcon'>
                        <input  type=\"image\" name='update' value='" . $dsatz["id"] . "' src=\"img/button_comment.png\" class=\"editButton\"  formaction=\"kommentar_fr.php\"></button>
           
                    </div>
                    <div id=\"fr_$id\" class='commentValue'>" . utf8_encode(preg_replace("/" . $searchWord. "/", "<span class='highlight'>" . $searchWord . "</span>",$dsatz["fr"]))       . "
                     <input type='image' name='search' value='" . utf8_encode($dsatz["fr"]) . "' src='img/button_search.png' class='editButton'  formaction='filtern.php'></button></div>
                      </form>
                       <input type='image' onclick=\"copyToClipboard('#fr_$id')\" src='img/button_copy.png' class='editButton'></div>
                </div>
            </td>".
                //"<td>" . utf8_encode(preg_replace("/" . $searchWord. "/", "<span class='highlight'>" . $searchWord . "</span>",$dsatz["fr"]))      . "</td>".
                "<td>
                <div>
                <form  method = \"post\">
                    <div class='commentIcon'>
                        <input  type=\"image\" name='update' value='" . $dsatz["id"] . "' src=\"img/button_comment.png\" class=\"editButton\"  formaction=\"kommentar_it.php\"></button>
                    </div>
                    <div id=\"it_$id\" class='commentValue'>" . utf8_encode(preg_replace("/" . $searchWord. "/", "<span class='highlight'>" . $searchWord . "</span>",$dsatz["it"]))       . "           
                    <input type='image' name='search' value='" . utf8_encode($dsatz["it"]) . "' src='img/button_search.png' class='editButton'  formaction='filtern.php'></button></div>
                    </form>
                    <input type='image' onclick=\"copyToClipboard('#it_$id')\" src='img/button_copy.png' class='editButton'></div>
                </div>
            </td>".
                "<form  method = \"post\">".
                //"<td>" . utf8_encode(preg_replace("/" . $searchWord. "/", "<span class='highlight'>" . $searchWord . "</span>",$dsatz["it"]))       . "</td>".
                "<td class='filter columnCarline'><input type='submit' class='filterLink' name='search' value='" . utf8_encode($dsatz["rubrik"]) . "' src='img/button_edit.png' class='editButton'  formaction='filtern.php'></button></td>".
                //"<td>" . utf8_encode(preg_replace("/" . $searchWord. "/", "<span class='highlight'>" . $searchWord . "</span>",$dsatz["rubrik"]))    . "</a></td>".
                //"<td>" . utf8_encode(preg_replace("/" . $searchWord. "/", "<span class='highlight'>" . $searchWord . "</span>",$dsatz["info"]))      . "</a></td>".
                "<td class='filter columnCarline'><input type='submit' class='filterLink' name='search' value='" . utf8_encode($dsatz["info"]) . "' src='img/button_edit.png' class='editButton'  formaction='filtern.php'></button></td>".
                "</form>".
                "<td class='columnCarline'>";
            $carlineArray = $dsatz["carline"];
            $carlineArray = explode(', ',$carlineArray);
            //alle referenzierten Carlines werden mit jeweiligem Preislisten-PDF verlinkt
            foreach ($carlineArray as $carKey){
                echo "<a href='pl/".$carKey."_df.pdf' target='_blank'>" . $carKey . " (DF)" . "</a><br/>";
                echo "<a href='pl/".$carKey."_di.pdf' target='_blank'>" . $carKey . " (DI)" . "</a><br/>";
            }
            echo    "</td>";
            echo    "<form  method = \"post\"><td >
                    <input  type=\"image\" name='update' value='" . $dsatz["id"] . "' src=\"img/button_edit.png\" class=\"editButton\"  formaction=\"aendern_b.php\"></button>
                </td></form>".
                "<form  method = \"post\"><td >
                    <input  type=\"image\" name='delete' value='" . $dsatz["id"] . "' src=\"img/button_delete.png\" class=\"editButton\"   formaction=\"loeschen_b.php\"></button>
                   
                </td></form>".
                "</tr>";
            //Kommentar Zeile
            echo "<tr class='commentRow'>"
                ."<td></td>"
                ."<td class='cellComment'>
                <div class='commentContainer'>
                    <div class='commentIcon'>
                        <input  type=\"image\" name='update' value='" . $dsatz["id"] . "' src=\"img/button_editComment.png\" class=\"editButton\"  formaction=\"kommentar_de.php\"></button>
                    </div>
                    <div class='commentValue'>" . utf8_encode($dsatz["comment_de"]) . "</div>            
                </div>
            </td>"
                ."<td class='cellComment'>
                <div class='commentContainer'>
                    <div class='commentIcon'>
                        <input  type=\"image\" name='update' value='" . $dsatz["id"] . "' src=\"img/button_editComment.png\" class=\"editButton\"  formaction=\"kommentar_fr.php\"></button>
                    </div>
                    <div class='commentValue'>" . utf8_encode($dsatz["comment_fr"]) . "</div>            
                </div>
            </td>"
                //."<td class='cellComment'>" . utf8_encode($dsatz["comment_fr"]) . "</td>"
                ."<td class='cellComment'>
                <div class='commentContainer'>
                    <div class='commentIcon'>
                        <input  type=\"image\" name='update' value='" . $dsatz["id"] . "' src=\"img/button_editComment.png\" class=\"editButton\"  formaction=\"kommentar_it.php\"></button>
                    </div>
                    <div class='commentValue'>" . utf8_encode($dsatz["comment_it"]) . "</div>            
                </div>
            </td>"
                ."<td></td>"
                ."<td></td>"
                ."<td></td>"
                ."<td></td>"
                ."<td></td>"
                ."</tr>";
            echo "<tr>"
                ."<td></td>"
                ."<td><div class='commentUser'>" . utf8_encode($dsatz["comment_de_user"]) . "</div> </td>"
                ."<td><div class='commentUser'>" . utf8_encode($dsatz["comment_fr_user"]) . "</div> </td>"
                ."<td><div class='commentUser'>" . utf8_encode($dsatz["comment_it_user"]) . "</div> </td>"
                ."</tr>";
            //http://stackoverflow.com/questions/917610/put-icon-inside-input-element-in-a-form
        }//ENDE WHILE
    }//ENDE viewWithoutSlash
    ?>

    </tbody>
</table>
<?php

/*

isUpdated();

function isUpdated()
{
    $pdo = new PDO('mysql:host=localhost;dbname=rosetta-app;charset=utf8', 'root', '');

    $sql = "SELECT updateBy FROM rosetta_data";
    foreach ($pdo->query($sql) as $row) {
        if(!($row['updateBy']=="notUpdated")){
            echo "geändert von " . $row['updateBy'];
        }
    }
}

function testFunction(){
    echo "testFunction";
}
*/
?>
<!--Copy to clipboard-->
<script>
    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);

        //kopierten Text in copiedValue speichern
        var copiedValue = $(element).text();
        //Leerzeichen ind copiedValue entfernen
        while (copiedValue.indexOf('  ') > 0) {
            copiedValue = copiedValue.replace('  ', '');
            if(copiedValue.slice(-1)==' '){
                //var deleteSpace = copiedValue.length-1;
                copiedValue = copiedValue.slice(0, copiedValue.length-1);
            }
        }

        $temp.val(copiedValue).select();
        document.execCommand("copy");

        console.log(copiedValue.length-1);
        $temp.remove();
    }
</script>
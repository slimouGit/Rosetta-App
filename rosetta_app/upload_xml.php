<?php
//include header
include "lib/elements/header.php";
?>



<!---------------------------------------------->

<div class="container-fluid content">

    <!---------------------------------------------->

    <div class="container">
        <div class='row'>
            <h1>Rosetta-App upload PDF</h1>
        </div>
    </div>

    <!---------------------------------------------->

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">

                <h4>XML-Datei wählen</h4>
                <form action="?upload_xml=1" method="post" enctype="multipart/form-data" id="js-upload-form">
                    <div class="input-group image-preview">
                        <input placeholder="PDF wählen" type="button" class="form-control image-preview-filename" >
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-default image-preview-clear" style="display:none;"> <span class="glyphicon glyphicon-remove"></span> Clear </button>
                            <div class="btn btn-default image-preview-input"> <span class="glyphicon glyphicon-folder-open"></span> <span class="image-preview-input-title">Browse</span>
                                <input type="file" class="form-control" name="xmlFile"/>
                            </div>
                            <button type="submit" class="btn btn-labeled btn-primary"> <span class="btn-label"><i class="glyphicon glyphicon-upload"></i> </span>Hochladen</button>
                            </span> </div>
                    </div>
            </form>
        </div>
    </div>

    <!---------------------------------------------->

    <div class="container">
        <div class='row'>
            <?php
            if(isset($_GET['upload_xml'])) {
                //include "mc/controller/xml_upload.php";

                $target_dir = __DIR__."/";
                $fileName = $_FILES["xmlFile"]["name"];
                $new_path = $target_dir . $fileName;

                echo "Originaldateiname: "
                    . $fileName."<br />";

                /* Temporaerer Dateiname auf dem Server */
                echo "Temporaerer Dateiname: "
                    . $_FILES["xmlFile"]["tmp_name"] . "</p>";

                copy($_FILES["xmlFile"]["tmp_name"],$new_path);
                echo "<p>Datei wurde kopiert in {$target_dir}<br />";

                echo "Der neue Pfad lautet: ".$new_path. "<br/>";

                $username = "Max Mustermann";

                importXML($fileName, $username);



                function importXML($fileName, $username){

                    $xmlDoc = new DOMDocument();
                    $xmlDoc->load($fileName);

                    //include db connection
                    include "mc/controller/xml_upload.php";


                    //Erstellen eines einzigartigen tokens SOLLTE SPAETER GLOBAL LAUFEN!!!
                    //dient dazu, wenn der letzte eingetragene Datensatz angezeigt wird
                    //da hier noch nicht mit der ID gearbeitet werden kann
                    $token = bin2hex(openssl_random_pseudo_bytes(16));
                    $token = (string)$token;
                    $username = $username;

                    $xmlObject = $xmlDoc->getElementsByTagName('item');
                    $itemCount = $xmlObject->length;


                    for ($i=0; $i < $itemCount; $i++){
                        $item_de = $xmlObject->item($i)->getElementsByTagName('item_de')->item(0)->childNodes->item(0)->nodeValue;
                        $item_fr  = $xmlObject->item($i)->getElementsByTagName('item_fr')->item(0)->childNodes->item(0)->nodeValue;
                        $item_it  = $xmlObject->item($i)->getElementsByTagName('item_it')->item(0)->childNodes->item(0)->nodeValue;
                        $category  = $xmlObject->item($i)->getElementsByTagName('category')->item(0)->childNodes->item(0)->nodeValue;
                        $info  = $xmlObject->item($i)->getElementsByTagName('info')->item(0)->childNodes->item(0)->nodeValue;
                        $carline  = $xmlObject->item($i)->getElementsByTagName('carline')->item(0)->childNodes->item(0)->nodeValue;



                        //$sql   = "INSERT INTO `rosetta_data` (token, de, fr, it, rubrik, info, carline, user) VALUES ('$token', '$de', '$fr','$it','$rubrik', '$info' , '$carline', '$username')";

                        //Daten werden eingefuegt
                        $res = $pdo->prepare("INSERT INTO rosetta_data (token, item_de, item_fr, item_it, category, info, carline, user_create) VALUES (:token, :item_de, :item_fr, :item_it, :category, :info, :carline, :user_create)");
                        $res->execute(array('token' => $token, 'item_de' => $item_de, 'item_fr' => $item_fr, 'item_it' => $item_it, 'category' => $category, 'info' => $info, 'carline' => $car, 'user_create' => $username));


                        //mysqli_query($con, $sql);

                        print "Added Item $i: <br/> $item_de <br/> $item_fr<br/> $item_it<br/> $carline<br/> <br/> ";
                    }

                }

            }
            ?>
        </div>
    </div>

    <!---------------------------------------------->

</div>

<!---------------------------------------------->

<?php
//include header
include "lib/elements/footer.php";
?>



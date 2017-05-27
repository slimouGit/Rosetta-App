<?php
//include header
include "lib/elements/header.php";
?>

<?php
//include connection to database
include "mc/controller/db_connect.php";
?>

<?php
//include navigation
include 'lib/elements/navigation.php';
?>

    <div class="container-fluid content">

    <div class="container">
        <div class='row'>
            <h1>Rosetta-Data create item</h1>

        </div>

        <div class='row'>
            <div class="formWrapper col-lg-8">
                <div class="formField">
            <form action="?insert_item=1" method = "post">

                <?php
                // EINBINDEN PHP-Klasse mit Formlar-Objekten
                require_once "mc/model/formularFields.class.php";

                // Objekt erzeugen
                $form = new formular();
                $form->inputField("Deutsch", "item_de", "", "", "");
                $form->inputField("Französisch", "item_fr", "", "", "");
                $form->inputField("Italienisch", "item_it", "", "", "");
                $form->inputField("Rubrik", "category", "", "", "");
                $form->inputField("Info", "info", "", "", "");

                $form->selectStart("Carline");
                $form->checkBox("ADAM");
                $form->checkBox("Ampera");
                $form->checkBox("Antara");
                $form->checkBox("AstraST");
                $form->checkBox("AstraNG");
                $form->selectFinish();

                $form->submitButton("2","Eintragen");
                ?>
            </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class='row'>
            <?php
            if(isset($_GET['insert_item'])) {

                //Erstellen eines einzigartigen tokens dient dazu, wenn der letzte eingetragene Datensatz angezeigt wird
                //da hier noch nicht mit der ID gearbeitet werden kann
                $token = bin2hex(openssl_random_pseudo_bytes(16));
                $token = (string)$token;
                //------------------------------------------------------------------------------------------

                $item_de = $_POST['item_de'];
                $item_fr = $_POST['item_fr'];
                $item_it = $_POST['item_it'];
                $category = $_POST['category'];
                $info = $_POST['info'];

                //------------------------------------------------------------------------------------------
                //Pruefung, ob checkboxen ausgewaehlt wurden
                if(!empty($_POST['carline'])) {
                    //das Array carline wird ueber implode in $car gespeichert
                    $car = implode(', ', $_POST['carline']);
                }
                //falls keine Carline genannt wurde, wird die Variable mit General belegt
                if(empty($car)) {
                    $car = 'General';
                }
                //------------------------------------------------------------------------------------------

                $res = $pdo->prepare("INSERT INTO rosetta_data (token, item_de, item_fr, item_it, category, info, carline, user_create) VALUES (:token, :item_de, :item_fr, :item_it, :category, :info, :carline, :user_create)");
                $result = $res->execute(array('token' => $token, 'item_de' => $item_de, 'item_fr' => $item_fr, 'item_it' => $item_it, 'category' => $category, 'info' => $info, 'carline' => $car, 'user_create' => $username));

                //Test mit Controller Klasse
                /**
                require "mc/model/insert_item.class.php";
                insert_item::insertData($var1,$var2,$var3,$var4,$var5,$var6,$var7);
                 **/
                //------------------------------------------------------------------------------------------

                //Eintrag anzeigen
                $res = $pdo->query("SELECT * FROM rosetta_data WHERE token LIKE '" . $token . "' ");

                require "mc/model/table_items.class.php";
                table_items::showData();

                //------------------------------------------------------------------------------------------

            }
            ?>
        </div>
    </div>

<?php
//include header
include "lib/elements/footer.php";
?>


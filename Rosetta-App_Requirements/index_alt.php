<?php
include 'includes/db_connect.php';
include 'includes/input_check.php';
include 'includes/db_insert.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Rosetta-App</title>
        <meta charset="utf-8"/>
        <meta name="author" content="Salim Oussayfi">
        <meta name="description" content="Requirements Engineering Praxis-Semester">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap -->
        <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- CSS Import-->
        <link rel="stylesheet" href="css/stylesheet.css">
        
        <!-- Import fuer JQery Animation fuer Eingabefelder -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        
    </head>
    <body>
        
        <header>Requirements Engineering Tool</header>
        <span  id="home"></span>
        <main>
            <div class="container">
                <div class="row">
                <!------------------------------------------------------------------------------------------------------------------------------------------>
                
                <div id="eingabeFormular">
                
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        
                        <!------------------------------------------------------------------------------------------------------------------------------------------>
                        
                        <div>
                            <div class="form_container">
                                <label class="form">Verbindlichkeit</label>
                                <div id="verbindlichkeit_container">
                                    <input type="radio" id="muss" name="verbindlichkeit" <?php if (isset($verbindlichkeit) && $verbindlichkeit=="muss") echo "checked";?> value="muss">
                                    <label class="radio formular" for="muss">muss</label>
                                    <input type="radio" id="soll" name="verbindlichkeit" <?php if (isset($verbindlichkeit) && $verbindlichkeit=="soll") echo "checked";?> value="soll">
                                    <label class="radio formular" for="soll">soll</label>
                                    <input type="radio" id="wird" name="verbindlichkeit" <?php if (isset($verbindlichkeit) && $verbindlichkeit=="wird") echo "checked";?> value="wird">
                                    <label class="radio formular" for="wird">wird</label>
                                    <input type="radio" id="kann" name="verbindlichkeit" <?php if (isset($verbindlichkeit) && $verbindlichkeit=="kann") echo "checked";?> value="kann">
                                    <label class="radio formular" for="kann">kann</label>
                                </div>
                            </div>
                            <!------------------------------------------------------------------------------------------------------------------------------------------>
                            <div class="error_container">
                                <span class="error"><?php echo $verbindlichkeit_Err;?></span>
                            </div>
                        </div>
                        
                        <!------------------------------------------------------------------------------------------------------------------------------------------>
                        
                        <div>
                            <div class="form_container">
                                <label class="form">Author</label>
                                <!--<input class="textFeld formular" placeholder="Author" type="text" name="author" value="<?php echo $author;?>">-->
                                <select name="author">
                                    <option value="" selected="selected">bitte wählen</option>
                                    <option value="Welde">Welde</option>
                                    <option value="Salim">Salim</option>
                                </select>
                            </div>
                            <!------------------------------------------------------------------------------------------------------------------------------------------>
                            <div class="error_container">
                                <span class="error"><?php echo $author_Err;?></span>
                            </div>
                        </div>
                        
                        <!------------------------------------------------------------------------------------------------------------------------------------------>
                        
                        <div>
                            <div class="form_container">
                                <label class="form">Titel</label>
                                <input class="textFeld formular" placeholder="Titel" type="text" name="titel" value="<?php echo $titel;?>">
                            </div>
                            <!------------------------------------------------------------------------------------------------------------------------------------------>
                            <div class="error_container">
                                <span class="error"><?php echo $titel_Err;?></span>
                            </div>
                        </div>
                        
                        <!------------------------------------------------------------------------------------------------------------------------------------------>
                        
                        <div>
                            <div class="form_container">
                                <label class="form">Beschreibung</label>
                                <textarea class="textArea formular" placeholder="Beschreibung" rows="5" cols="40" name="beschreibung" value="<?php echo $beschreibung;?>"></textarea>
                            </div>
                            <!------------------------------------------------------------------------------------------------------------------------------------------>
                            <div class="error_container">
                                <span class="error"><?php echo $beschreibung_Err;?></span>
                            </div>
                        </div>
                        
                        <!------------------------------------------------------------------------------------------------------------------------------------------>
                        
                        <div>
                            <input type="submit" class="button" value="eintragen" name="submit"/>
                        </div>
                        
                        <!------------------------------------------------------------------------------------------------------------------------------------------>
                        
                    </form> 
                </div>
            <div id="flipFormular"><span id="textWechsel">Formular ausblenden</span></div>
                </div><!--row-->
            <!------------------------------------------------------------------------------------------------------------------------------------------>
                <div class="row">
        	<table class="table table-striped">
        		<thead>
        			<tr>
        				<td class="headline" colspan="5">Projekt Rosetta-App</td>
        				<td class="headline" id="status_headline" colspan="3"></td>
        			</tr>
        		</thead>
        		
        		<!------------------------------------------------------------------------------------------------------------------------------------------>
        		
        		<tbody>
        			<tr>
        				<th class="head">Verbindlichkeit</th>
        				<td class="head">ID</td>
        				<td class="head">Datum/Uhrzeit</td>
        				<td class="head">Author</td>
        				<td class="head">Titel</td>
        				<td class="head">Beschreibung</td>
        			</tr>
        			
        	
                    <!------------------------------------------------------------------------------------------------------------------------------------------>
        	        <?php
        	        include 'includes/db_output.php';
                    ?>
                    <!------------------------------------------------------------------------------------------------------------------------------------------>
                    
                </tbody>
                <tr>
                    <td class="footer" colspan="8">
                        <div id="arrow">
                            <a href="#home" title="nach oben">
                                <img src="img/home-arrow.png"/>
                            </a>
                        </div>
                        <div id="logo">
                            <!--
                            <img src="img/slimou.png" title="slimou by Salim Oussayfi"/>
                            -->
                        </div>
                    </td>
                </tr>
        	</table>
                </div><!--row-->
                </div><!--Container-->
        </main>
    </body>
    <script src="js/script.js"></script>
</html>
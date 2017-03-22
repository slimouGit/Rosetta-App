<form class="form-horizontal" id="formular" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">



    <!--------------------------------------------------------------------------------------->
    <!--author-->
    <div class="row"><br></div>
    <div class="form-group">
        <input name='ak' type='hidden' />
        <input name='id' type='hidden' />
        <label for="select" class="col-sm-2 control-label">Author</label>
        <div class="col-sm-6">
            <select name="author" class="form-control">
                <option value="" selected="selected">bitte wählen</option>
                <option value="Claudia">Claudia</option>
                <option value="Nicole">Nicole</option>
                <option value="Salim">Salim</option>
                <option value="Thomas">Thomas</option>
            </select>
        </div>
        <div class="col-sm-4 errorContainer">
            <span class="error"><?php echo $author_Err;?></span>
        </div>
    </div>

    <!--------------------------------------------------------------------------------------->
    <!--titel-->

    <div class="form-group">
        <label for="titel" class="col-sm-2 control-label">Titel</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="titel" value="<?php echo $titel;?>">
        </div>
        <div class="col-sm-4 errorContainer">
            <span class="error"><?php echo $titel_Err;?></span>
        </div>
    </div>

    <!--------------------------------------------------------------------------------------->
    <!--beschreibung-->

    <div class="form-group">
        <label for="beschreibung" class="col-sm-2 control-label">Beschreibung</label>
        <div class="col-sm-6">
            <textarea class="form-control" rows="5" name="beschreibung" value="<?php echo $beschreibung;?>"></textarea>
        </div>
        <div class="col-sm-4 errorContainer">
            <span class="error"><?php echo $beschreibung_Err;?></span>
        </div>
    </div>

    <!--------------------------------------------------------------------------------------->
    <!--verbidlichkeit-->

    <div class="form-group">
        <label for="select" class="col-sm-2 control-label">Verbindlichkeit</label>
        <div class="col-sm-6">
            <label class="radio-inline">
                <input type="radio" id="muss" name="verbindlichkeit" <?php if (isset($verbindlichkeit) && $verbindlichkeit=="muss") echo "checked";?> value="muss"><b>muss</b> (Pflicht)
            </label>
            <label class="radio-inline">
                <input type="radio" selected id="soll" name="verbindlichkeit" <?php if (isset($verbindlichkeit) && $verbindlichkeit=="muss") echo "checked";?> value="soll"><b>soll</b> (Wunsch)
            </label>
            <label class="radio-inline">
                <input type="radio" id="kann" name="verbindlichkeit" <?php if (isset($verbindlichkeit) && $verbindlichkeit=="muss") echo "checked";?> value="kann"><b>kann</b> (Absicht)
            </label>
            <label class="radio-inline">
                <input type="radio" id="wird" name="verbindlichkeit" <?php if (isset($verbindlichkeit) && $verbindlichkeit=="muss") echo "checked";?> value="wird"><b>wird</b> (Vorschlag)
            </label>
        </div>
        <div class="col-sm-4 errorContainer">
            <span class="error"><?php echo $verbindlichkeit_Err;?></span>
        </div>
    </div>

    <div class="row"><br></div>
    <!--------------------------------------------------------------------------------------->
    <!--submit-->

    <div class="form-group">
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary" value="eintragen" name="submit">Submit</button>
        </div>
    </div>

    <!--------------------------------------------------------------------------------------->

</form>



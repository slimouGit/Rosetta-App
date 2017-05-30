<head>
    <link href="https://slimou.de/___Bootstrap/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<style>

    body{margin:0px;padding:0px;}
    /******************************************/


    /*Container fuer Datenausgabe*/
    .col {
        background: none;
        height: auto;
    }

    .row .white {
        background: white;
        color: black;
    }

    .row .bottomLine {
        border-bottom: 1px dashed #888888;
    }

    .row .topLine {
        border-top: 1px dashed #888888;
    }

    /*Feld enthaelt .itemField mit Daten*/
    .itemFieldWrapper{
        padding: 0px 10px;
    }

    /*FormularWrapper*/
    .formWrapper{
        padding: 10px 0px;
    }

    /*Felder mit Daten*/
    .itemField{
        background-color: #dcedef;
        padding: 5px 5px 10px 10px;
        border-bottom-left-radius: 1em;
        border-bottom-right-radius: 1em;
    }

    /*Felder mit Daten*/
    .formField{
        background-color: #ddeff2;
        padding: 20px 5px 10px 10px;
        border-bottom-left-radius: 1em;
        border-bottom-right-radius: 1em;
        box-shadow: 2px 2px 2px #888888;
    }

    .formMarginBottom{
        margin-bottom:20px;
    }
    /*Felder mit Icons*/
    .row .editLine {
        padding: 10px 0px;
    }

    .itemWrapper{
        margin: 10px 0px;
        border-bottom-left-radius: 1em;
        border-bottom-right-radius: 1em;
        box-shadow: 2px 2px 2px #888888;
    }

    .itemHeader {
        margin: 10px 0px;
        padding: 10px ;
        border-bottom-left-radius: 1em;
        border-bottom-right-radius: 1em;
        box-shadow: 2px 2px 2px #888888;
    }

    .topLineDashed{
        border-top: 1px dashed #2aabd2;
    }

    /*Feld mit Carline-Angaben*/
    .carlineHeadline {
        margin-top:10px;
        padding-top:10px;
        border-top: 1px dashed #2aabd2;
        font-size: .75em;
        font-weight: bold;
        color: #1b6d85;
        display: block;
    }

    /*Kommentarzeile*/
    .comment {
        color: #ff0000;
        font-size: .75em;
    }
    .userComment{
        font-weight: bold;
        color: #8c8c8c;
        font-size: .75em;
    }

    .dateComment{
        font-size: .75em;
    }

    .commentInfo {
        margin-top: 5px;
        padding: 5px 0px;
    }

    /*Zeile mit Daten zum Eintrag => userCreate, userUpdate, userDelete, data_id*/
    .itemInfo {
        margin-top: 5px;
    }

    .row .itemBottom {
        background-color: #2e6da4;
        padding-top: 5px;
        padding-bottom: 5px;
        color: white;
        font-size: .75em;
    }


    .borderRoundBottomLeft {
        border-bottom-left-radius: 1em;
    }

    .borderRoundBottomRight {
        border-bottom-right-radius: 1em;
    }

    /******************************************/


    /*Highlighting der Suchfunktion*/
    .highlight{background-color: yellow; }
    /******************************************/


    /*Item-Container*/
    .itemRow{
        margin: 20px; padding-bottom: 30px;
    }
    /******************************************/


    /**/
    .navbar{
        color: #fff;
        background-color: #2e6da4;
        box-shadow: 2px 2px 2px #888888;
    }

    /**/
    .content {
        position: relative;
        top: 50px;
    }
    /******************************************/


    /**/
    .userRow {
        color: #fff;
        background-color: #2e6da4;
        margin-bottom: 20px;
        border-radius: 5px;
    }
    /******************************************/




    /*User Tabelle*/
    .userTableRow{
        border-bottom: 1px dashed #2aabd2;
        margin-bottom: 10px;
        padding-bottom: 10px;
    }


    /******************************************************************/

</style>
</head>




<div class="container">

    <div class="row">
        <div class="col-md-12 col itemHeader">
            <div class="row">
                <div class="col-md-3 col">DE</div>
            <div class="col-md-3 col">FR</div>
            <div class="col-md-3 col">IT</div>
            <div class="col-md-1 col">Rubrik</div>
            <div class="col-md-1 col">Info</div>
            <div class="col-md-1 col">Edit</div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-12 col itemWrapper">

            <div class="row ">

                <div class="col-md-9 bottomLine">

                    <div class="row">
                        <div class="col-md-4 white col bottomLine">item_de</div>
                        <div class="col-md-4 white col bottomLine">item_fr</div>
                        <div class="col-md-4 white col bottomLine">item_it</div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 white col bottomLine">edit german</div>
                        <div class="col-md-4 white col bottomLine">edit french</div>
                        <div class="col-md-4 white col bottomLine">edit italien</div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 white col bottomLine comment">comment german</div>
                        <div class="col-md-4 white col bottomLine comment">comment french</div>
                        <div class="col-md-4 white col bottomLine comment">comment italien</div>
                    </div>

                     <div class="row">
                         <div class="col-md-4 white col">
                             <div class="col-md-12 white col">
                            <div class="col-md-8 userComment">Salim</div>
                            <div class="col-md-4 dateComment">heute</div>
                             </div>
                        </div>
                        <div class="col-md-4 white col bottomLine">user comment french</div>
                        <div class="col-md-4 white col bottomLine">user comment italien</div>
                    </div>

                </div>

                <div class="col-md-3">

                    <div class="row">
                        <div class="col-md-4 white col bottomLine">Rubrik</div>
                        <div class="col-md-4 white col bottomLine">Info</div>
                        <div class="col-md-4 white col">Edit</div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 white">
                            carlines<br>carlines<br>carlines<br>carlines<br>carlines<br>
                        </div>
                    </div>

                </div>

            <div class="col-md-12">
                <div class="row ">
                    <div class="col-md-3 itemBottom col borderRoundBottomLeft">user created</div>
                    <div class="col-md-3 itemBottom col">user upated</div>
                    <div class="col-md-3 itemBottom col">user deleted</div>
                    <div class="col-md-3 itemBottom col borderRoundBottomRight">data_id</div>
                </div>
            </div>

            </div><!-- row -->

    </div><!-- wrapper -->

</div><!-- container -->

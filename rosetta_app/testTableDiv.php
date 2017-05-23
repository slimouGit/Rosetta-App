<style>



</style>
<?php
//include header
include "lib/elements/header.php";
?>

<?php
//include connection to database
include "mc/controller/db_connect.php";
?>

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
                        <div class="col-md-4 white col bottomLine">comment german</div>
                        <div class="col-md-4 white col bottomLine">comment french</div>
                        <div class="col-md-4 white col bottomLine">comment italien</div>
                    </div>

                     <div class="row">
                        <div class="col-md-4 white col bottomLine">
                            <div class="col-md-6 userComment">Salim</div>
                            <div class="col-md-4 dateComment">heute</div>
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

<?php
//include header
include "lib/elements/footer.php";
?>

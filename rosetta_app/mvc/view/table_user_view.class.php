<?php
/**
 * Created by PhpStorm.
 * User: salim
 *
 * Klasse stellt Geruest fuer Nutzerdatenausgabe
 * nicht als Tabelle implementiert
 */


class table_user
{

    public static function showUser()
    {
        self::printUser("active");
    }

    function printUser(){
        global $res;

        ?>

        <div class="row">
            <div class="col-md-12 col itemHeader">
                <div class="col-md-1 col">User ID</div>
                <div class="col-md-2 col">Vorname</div>
                <div class="col-md-2 col">Nachname</div>
                <div class="col-md-3 col">Email</div>
                <div class="col-md-2 col">Authorisation</div>
                <div class="col-md-2 col">Bearbeiten</div>
            </div>
        </div>
    <?php

        foreach ($res AS $row):
    ?>

        <div class="row ">
            <div class="col-md-12 col userTableRow">
                <div class="col-md-1 col"><?php echo $row["user_id"]; ?></div>
                <div class="col-md-2 col"><?php echo $row["forename"]; ?></div>
                <div class="col-md-2 col"><?php echo $row["surname"]; ?></div>
                <div class="col-md-3 col"><?php echo $row["email"]; ?></div>
                <div class="col-md-2 col"><?php echo $row["authorization"]; ?></div>
                <div class="col-md-2 col">
                    <a href="edit_user.php?user_id=<?php echo $row['user_id']?>"><img src="lib/img/button_edit.png"/></a>
                    <a href="change_pwd.php?user_id=<?php echo $row['user_id']?>"><img src="lib/img/button_pwd.png"/></a>
                    <a href="delete_user.php?user_id=<?php echo $row['user_id']?>"><img src="lib/img/button_delete.png"/></a>
                </div>
            </div>
        </div>


    <?php
        endforeach;

    }//ENDE printUser
}//ENDE class table_user
?>
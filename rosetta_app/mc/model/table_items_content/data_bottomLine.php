<div class="row itemInfo">


    <div class="col-md-3 itemBottom col borderRoundBottomLeft">Erstellt von <?php echo $row['user_create']?> am <?php echo date('d.m.Y H:i', strtotime($row['date_create']))?></div>


    <div class="col-md-3 itemBottom col">
        <?php
        //Feld wird erst angezeigt, wenn Datum > 1970 ist
        $updateYear = date('Y', strtotime($row['date_update']));
        if($updateYear>1970){ ?>
            Geändert von <?php echo $row['user_update']?> am <?php echo date('d.m.Y H:i', strtotime($row['date_update']));
        }else { ?>&nbsp;<?php } ?>
    </div>


    <!-- Feld fuer geloeschte Eintraege-->
    <div class="col-md-3 itemBottom col">
        <?php
        //dieses Feld ist nur sichtbar, wenn Eintrag geloescht wurde
        if($temp=="deleted") { ?>
            Gelöscht von <?php echo $row['user_delete'] ?> am <?php echo date('d.m.Y H:i', strtotime($row['date_delete']));
        }else { ?>&nbsp;<?php } ?>
    </div>


    <div class="col-md-3 itemBottom col borderRoundBottomRight">ID: <?php echo $row['data_id']?></div>

</div>
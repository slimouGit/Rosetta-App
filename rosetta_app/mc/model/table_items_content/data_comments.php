<div class="row">
    <div class="col-md-4 white col comment"><?php echo $row["item_de_comment"]; ?></div>
    <div class="col-md-4 white col comment"><?php echo $row["item_fr_comment"]; ?></div>
    <div class="col-md-4 white col comment"><?php echo $row["item_it_comment"]; ?></div>
</div>

<!-- Kommentare User und Datum -->
<div class="row topLine commentInfo">
    <div class="col-md-2 white col userComment"><?php echo $row["user_de_comment"]; ?></div>
    <div class="col-md-2 white col dateComment"><?php echo $row["date_de_comment"]; ?></div>
    <div class="col-md-2 white col userComment"><?php echo $row["user_fr_comment"]; ?></div>
    <div class="col-md-2 white col dateComment"><?php echo $row["date_fr_comment"]; ?></div>
    <div class="col-md-2 white col userComment"><?php echo $row["user_it_comment"]; ?></div>
    <div class="col-md-2 white col dateComment"><?php echo $row["date_it_comment"]; ?></div>
</div>
<a href="edit_item.php?data_id=<?php echo $row['data_id']?>"><img src="lib/img/button_edit.png"/></a>

<?php if($row["state"]=="active"){ ?>
    <a href="delete_item.php?data_id=<?php echo $row['data_id']?>"><img src="lib/img/button_delete.png"/></a>
<?php } ?>
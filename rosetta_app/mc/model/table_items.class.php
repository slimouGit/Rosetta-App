<?php


class table_items
{
    public static function showData()
    {
        echo "FUNZT";
        self::printData();
    }



    function printData(){
        echo "FUNZT AUCH";
        $path = str_replace("model","controller",__DIR__);
        include $path."/db_connect.php";

        //$res = $pdo->query("SELECT * FROM `rosetta_data`");
        $res = showCompleteData();

       ?>

        <table class="table table-hover table-responsive">
            <thead>
            <tr>
                <th class="col-sm-3">De</a></th>
                <th class="col-sm-3">Fr</th>
                <th class="col-sm-3">It</th>
                <th class="col-sm-2">Rubrik</th>
                <th class="col-sm-2">Info/Code</th>
                <th class="col-sm-2">Edit</th>
            </tr>
            </thead>
        <?php foreach ($res AS $row): ?>
            <tr>
                <td>
                    <?php echo $row["item_de"];?>
                </td>
                <td>
                    <?php echo $row["item_fr"];?>
                </td>
                <td>
                    <?php echo $row["item_it"];?>
                </td>
                <td>
                    <?php echo $row["category"];?>
                </td>
                <td>
                    <?php echo $row["info"];?>
                </td>
                <td>
                </td>
            </tr>
        <?php endforeach ?>
        </table>
<?php

}
}


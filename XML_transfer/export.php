<?php

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` decimal(8,5) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

$xmlData =<<< END
<?xml version="1.0"?>
<data>
<item>
<id>20</id>
<name>mangoes</name>
<price>11</price>
</item>
<item>
<id>22</id>
<name>strawberries</name>
<price>5</price>
</item>
<item>
<id>23</id>
<name>grapes</name>
<price>25</price>
</item>
</data>
END;
// read XML data string
$xml = simplexml_load_string($xmlData) or die("ERROR: Cannot create SimpleXML object");
// open MySQL connection
$connection = mysqli_connect("localhost", "root", "", "rosetta-app") or die ("ERROR: Cannot connect");
// process node data
// create and execute INSERT queries
foreach ($xml->item as $item) {
    $id = $item->id;
    $name = mysqli_real_escape_string($connection, $item->name);
    $price = $item->price;
    $sql = "INSERT INTO products (id, name, price) VALUES ('$id', '$name', '$price')";
    mysqli_query($connection, $sql) or die ("ERROR: " .mysqli_error($connection) . " (query was $sql)");
}
// close connection
mysqli_close($connection);
?>
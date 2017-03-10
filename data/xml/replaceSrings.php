<meta charset="utf-8"/>
<?php

//$text = "Mimi ist doof.";
$text = file_get_contents("MOKKA_df_008.xml");
$suchmuster = '/ <entry align=\"left\" valign=\"middle\"></entry>/';
$ersetzen =  ' ' ;

$neuerText =  preg_replace ($suchmuster, $ersetzen, $text);



file_put_contents("MOKKA_df_008_.xml", $neuerText);

echo "<b>\"$text\"</b> wurde in <b>\"$neuerText\"</b> geändert.";


?>
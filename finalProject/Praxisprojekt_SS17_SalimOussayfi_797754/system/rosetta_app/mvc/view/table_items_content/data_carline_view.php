<?php

/**
 * Created by PhpStorm.
 * User: salim
 *
 * Script generiert Links zu jeweiligen PDFs
 */

$carlineArray = $row["carline"];

$carlineArray = explode(', ', $carlineArray);

$size = count($carlineArray);

for ($carKey=0; $carKey < $size; $carKey++){

    echo $carlineArray[$carKey]."<a href='uploaded_data/pricelists/" . $carlineArray[$carKey] . "_df.pdf' target='_blank'> (df) </a>";
    echo "<a href='uploaded_data/pricelists/" . $carlineArray[$carKey] . "_di.pdf' target='_blank'> (di)</a>";

    //nach letzer Carline keine Komma setzen
    if(!($carKey+2>$size)){
        echo ", ";
    }
};

/*
foreach ($carlineArray as $carKey) {
    echo $carKey."<a href='uploaded_data/pricelists/" . $carKey . "_df.pdf' target='_blank'> (df) </a>";
    echo "<a href='uploaded_data/pricelists/" . $carKey . "_di.pdf' target='_blank'> (di)</a>";
    echo ", ";
}
*/
?>
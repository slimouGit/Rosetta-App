<?php
include '002_modelRosetta.php';

$testItems = new SimpleXMLElement($xmlstr);

echo $testItems->headline[0]->de;
echo "<br/>";
echo $testItems->headline[0]->fr;
echo "<br/>";
echo $testItems->headline[0]->it;
/*
echo "<br/>";
echo $testItems->monate[0]->monat[0]->de;
echo "<br/>";
echo $testItems->monate[0]->monat[0]->fr;
echo "<br/>";
echo $testItems->monate[0]->monat[0]->it;
echo "<br/>";

echo $testItems->monate[0]->monat[1]->de;
echo "<br/>";
echo $testItems->monate[0]->monat[1]->fr;
echo "<br/>";
echo $testItems->monate[0]->monat[1]->it;
*/

for($i = 0;$i<=11;$i+=1){
    echo "<br/>";
    echo $testItems->monate[0]->monat[$i]->de;
    echo "  |  ";
    echo $testItems->monate[0]->monat[$i]->fr;
    echo "  |  ";
    echo $testItems->monate[0]->monat[$i]->it;
    echo "<br/>-----------------------------------<br/>";
}

$result = $testItems->xpath("Januar");

print_r(var_dump($result));

?>
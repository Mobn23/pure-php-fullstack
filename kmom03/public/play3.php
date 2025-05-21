<?php

include('../config/config.php');

// Extract details about the day
$month = date('F');
$weekNum = date('W');
$dayNum = date('N');
$dayStr = date('l');

if($dayNum == 5) {
    echo "It is Friday<br>";
} elseif ($dayNum == 4) {
    echo "It is Thursday";
} elseif ($dayNum < 5) {
    $days = 5 - $dayNum ; 
    echo "There is ".$days. " days left until it's Friday.";
} else {
    echo "It's a Holiday Now (" .$dayNum.")<br>";
}


?>

<ul>
    <li>Månad : <?=$month?></li>
    <li>Veckonummer : <?=$weekNum?></li>
    <li>Dagnummer(i veckan) : <?=$dayNum?></li>
    <li>Dag : <?=$dayStr?></li>
</ul>

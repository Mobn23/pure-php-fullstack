<?php

//$MoBn ="Mo Bn 29 år student";

$mikael =["Mikael","Roos",42,"Teacher",3.1415];

$marie =[
    "Marie",
    "Grahn",
    42,
    "Teacher",
];



?><h1>Lek med arrayer</h1>

<p>Antal delar i arrayen är <?=count($mikael)?> + <?=count($marie)?>.</p>

<p>Mina lärare är <?=$mikael[0] ." ". $mikael[1]?> och <?=$marie[0]?>.</p>
<pre>
<?=print_r($mikael, True)?>
</pre>

<pre>
<?=var_dump($mikael)?>
</pre>

<?php
include('../config/config.php');

$title = 'PHP';

include('../view/header.php');
?>


<main class="main">
<article class="article">


<h1><?=$title ?></h1>
<p>Nu skall vi träna på PHP programmering</p>

<?php include('../view/php/hello.php')?>






</article>
</main>
<?php include('../view/footer.php') ?>

<?php
include('../config/config.php');

$title = 'Om kurs och webbplatsen';

include('../view/header.php');
?>

<!--<main class="main">
<article class="article">
    <h1>Om kursen och webbplatsen</h1>
    <p>Här tänkte jag skriva lite om denna webbplatsen och om kursen.</p>
</article>
</main>-->

<div class="two-col-layout">
    <main class="main">
        <article class="article">
        <h1>Om kursen och webbplatsen</h1>
        <p>Här tänkte jag skriva lite om denna webbplatsen och om kursen.</p>
        </article>
    </main>

    <aside class="aside">
        <h4>Kursen</h4>
        <ul>
            <li> <a href="https://github.com/dbwebb-se/webtec">Kursens repo</a></li>
        </ul>
    </aside>
</div>

<?php include('../view/footer.php') ?>

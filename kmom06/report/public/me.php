<?php
include('../config/config.php');

$title = 'Om mig själv';

include('../view/header.php');
?>

    <!--<main>
        <h1>Om Mig Själv</h1>
        <p>Här kommer snart min  fina me-sida.</p>
        <img src="img/mo.jpg" width="300" class="me" alt="Bild på mig">
    </main>-->
<div class="two-col-layout">
<main class="main">
    <article class="article">
        <header>
            <h1>Om Mig Själv</h1>
            <p class="author">Skriven av Mo Bnshi, uppdaterad <time datetime="2023-09-12">2023-09-12</time>.</p>
        </header>

        <p>Så, en presentation en bra början. Skriv några ord om dig själv. Jag börjar.</p>

        <figure class="figure right">
            <img src="img/mo.jpg" width="300" alt="Bild på mig">
            <figcaption>Mo Bnshi pratar gärna med ankan.</figcaption>
        </figure>

        <p>Mitt namn är <em>Mohamed bnshi</em>. Född och uppvuxen i <em>Idleb, Syrien</em>. Jag gillade schack och har deltagit i internationella mästerskap. Jag har varit städare, diskare, servitör och kock.</p>
        <p><b>Programmering</b> har alltid intresserat mig sedan 15-årsåldern och brukade jag leka med <b>software</b> och <b>systemen</b>.</p>

        <p>Om jag skall nämna någon hobby, förutom webbprogrammering, så är det <b>design</b> och <b>videoframställning</b> .</p>

        <p>Till och från får jag för mig att börja på lite hobbies, så gillar jag att <b>simma</b> och träna <b>calisthenics</b>.</p>

        <p>Vi syns och hörs i forum och <b>chatt!</b></p>

        <?php include('../view/byline.php') ?>

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

<!--
Filler Content: Tools, Tips and a Dynamic Example
by Jim Nielsen 9 May 2013
https://webdesign.tutsplus.com/tutorials/filler-content-tools-tips-and-a-dynamic-example--webdesign-12258
-->
<html>
<head>
    <title>Franky's Fav Five</title>
    <link href="http://meyerweb.com/eric/tools/css/reset/reset.css" rel="stylesheet"/>
    <link href="styles.css" rel="stylesheet"/>
</head>
<body>
<header class="header">
    <h1 class="header-title">Franky's Fav Five</h1>
</header>

<section class="wrapper">

    <?php
    require_once __DIR__ . '/vendor/autoload.php';

    $faker = Faker\Factory::create();
    for ($i = 1; $i < 6; $i++) {
        $imageUrl = $faker->imageUrl(600, 200, 'Sport', true);
        //$imageUrl = "https://picsum.photos/600/200?random=$i";
        ?>

        <article class="article">
            <img src="<?= $imageUrl ?>"/>
            <div class="content">
                <h2><a href="#" class="article-title"><?= $faker->sentence() ?></a></h2>
                <ul class="article-meta">
                    <li><strong>author</strong>:<?= $faker->name ?></li>
                    <li><strong>source</strong>: <a href="#"><?= $faker->domainName() ?></a></li>
                </ul>
                <p class="article-paragraph"><?= $faker->text ?>&hellip; <a href="#">read more &raquo;</a></p>

            </div>
        </article>

    <?php } ?>

</section>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</body>
</html>

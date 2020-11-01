<html lang="de">
<title>konserven-tests</title>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="/css/materialize/css/materialize.min.css">
<link rel="stylesheet" href="/css/main.css">
<link rel="stylesheet" href="/css/single_product.css">
<body>
<?php
include_once 'controllers/ProductController.php';
include_once 'components/session.php';
include_once 'components/header.php';

$controller = new ProductController;
$postObject = $controller->readSingle("url");

$imgPath = "/uploads/" . $postObject->image;
?>
<section>
    <div class="container single_product_page">
        <img src="<?= $imgPath ?>" alt="konserve">
        <div class="single_content">
            <div class="single_content_rating">
                <h2><?= $postObject->brand ?></h2>
                <h1><?= $postObject->name ?></h1>
                <div>
                    <?= !$postObject->bio ? '' : '<p class="bio">Bio<span>&#10003;</span></p>' ?>
                    <?= !$postObject->vegan ? '' : '<p class="vegan">Vegan<span>&#10003;</span></p>' ?>
                </div>
                <div class="taste_rating">
                    <p>Geschmack:</p>
                    <div>
                        <strong><span><?= $postObject->score ?></span></strong>
                        <span class="small">/</span>
                        <span class="small">10</span>
                    </div>
                </div>
                <div class="taste_rating">
                    <p>Sättigungsgrad:</p>
                    <div>
                        <strong><span><?= $postObject->filling ?></span></strong>
                        <span class="small">/</span>
                        <span class="small">10</span>
                    </div>
                </div>
            </div>
            <div class="single_content_infos">
                <p>Zutaten: <?= $postObject->description ?></p>
            </div>
        </div>
    </div>
</section>


<?php
readfile('components/footer.html');
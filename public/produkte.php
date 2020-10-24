<html>
<title>konserven-tests</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="css/materialize/css/materialize.min.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/single_product.css">
<body>
<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if (isset($_SESSION['login'])) {
	$_SESSION["login"] = $_SESSION["login"];
} else {
	$_SESSION["login"] = false;
}
include_once '../database/database.class.php';
require('components/header.php');


$id = $_GET["id"];
$columns = "`id`,`name`,`bio`,`score`,`image`,`vegan`,`filling`,`description`";
$table = "`konserven`";

$connection = new Database;
$postObject = $connection->readSingle($columns, $table, $id);

$imgPath = "uploads/" . $postObject->image;
?>
<section>
    <style>
    .page-footer {  
        position: sticky;
        bottom: 0;
    }
    </style>
    <div class="container single_product_page">
        <img src="<?= $imgPath ?>" alt="konserve">
        <div class="single_content">
            <div class="single_content_rating">
                <h1 class="card-title"><?= $postObject->name ?></h1>
                <div>
                    <?= !$postObject->bio ? '' : '<p class="bio">Bio<span>&#10003;</span></p>' ?>
                    <?= !$postObject->vegan ? '' : '<p class="vegan">Vegan<span>&#10003;</span></p>' ?>
                  </div>
                <p>Geschmack: <?= $postObject->score ?>/10 </p>
                <p>Sättigungsgrad: <?= $postObject->filling ?>/10</p>
            </div>
            <div class="single_content_infos">
                <p>Zutaten: <?= $postObject->description ?></p>
            </div>
        </div>
    </div>
</section>


<?php
readfile('components/footer.html');
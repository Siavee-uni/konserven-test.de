<?php
include_once 'database/database.class.php';
include_once 'database/migration.class.php';
// get data
$columns = "`name`,`bio`,`score`,`image`,`vegan`,`filling`,`description`,`created`";
$table = "`konserven`";

$connection = new Database;
new Migration;
$data = $connection->get($columns,$table);
// loop
echo '<div class="container grid-img">';

foreach ($data as $can) : ?>
<?php 
$imgPath = "uploads/" . $can['image'] ;
$bioImgPath = "img/bio.png";
?>

<div class="can">
    <div class="col s12">
        <div class="card">
            <div class="face face1">
                <div class="card-image face">
                    <img src="<?= $imgPath?>" alt="konserve">
                    <span class="card-title"><?= $can['name'] ?></span>
                </div>
            </div>
            <div class="face face2">
                <div class="card-content face">
                    <div class="symbols">
                            <?= !$can['bio'] ? '' : '<img src="img/bio.png" alt="konserve">' ?>
                            <?= !$can['vegan'] ? '' : '<img src="img/vegan.png" alt="konserve">' ?>
                    </div>
                    <p>Score: <?= $can['score'] ?> </p>
                    <p>Datum: <?= $can['created'] ?> </p>
                </div>
            </div>
        </div>
    </div>
</div> 
<?php endforeach; 
echo "</div>";
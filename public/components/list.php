<?php
$url = dirname(__DIR__, 2);
include_once $url . '/database/database.class.php';
include_once $url . '/database/migration.class.php';

// get data
$columns = "`name`,`bio`,`score`,`image`,`vegan`,`filling`,`description`,`created`";
$table = "`konserven`";

$connection = new Database;
/* new Migration; */
$data = $connection->read($columns, $table);
// loop
echo '<div class="container grid-img">';

foreach ($data as $can) : ?>
    <?php
    $imgPath = "uploads/" . $can['image'];
    $bioImgPath = "img/bio.png";
    ?>

    <div class="can">
        <div class="col s12">
            <div class="card">
                <div class="face face1">
                    <?php if ($_SESSION["login"]) : ?>
                        <div>
                            <button>edit</button>
                            <button>delete</button>
                        </div>
                    <?php endif ?>
                    <div class="card-image face">
                        <img src="<?= $imgPath ?>" alt="konserve">
                        <span class="card-title"><?= $can['name'] ?></span>
                    </div>
                    <div class="card-content">
                        <div class="symbols">
                            <?= !$can['bio'] ? '' : '<img src="img/bio.png" alt="konserve">' ?>
                            <?= !$can['vegan'] ? '' : '<img src="img/vegan.png" alt="konserve">' ?>
                        </div>
                        <p>Geschmack: <?= $can['score'] ?>/10 </p>
                        <p>Sättigungsgrad: <?= $can['filling'] ?>/10</p>
                        <p><?= $can['created'] ?> </p>
                    </div>
                </div>
                <div class="face face2">
                    <div class="card-content2 face">
                        <p>Zutaten: <?= $can['description'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach;
echo "</div>"; ?>
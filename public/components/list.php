<?php
$url = dirname(__DIR__, 2);
include_once $url . '/database/database.class.php';
include_once $url . '/database/migration.class.php';

// get data
$columns = "`id`,`name`,`bio`,`score`,`image`,`vegan`,`filling`,`description`,`created`";
$table = "`konserven`";
/*  new Migration;  */
$connection = new Database;
$data = $connection->read($columns, $table);

// loop
echo '<div class="container grid-img">';

foreach ($data as $can) : ?>
    <?php
    $imgPath = "uploads/" . $can['image'];
    $bioImgPath = "img/bio.png";
    ?>
    <!-- <div id="modal<?= $can['id'] ?>" class="modal">
        <div class="modal-header modal-close">
            <div class="line1"></div>
            <div class="line2"></div>
        </div>
        <article class="modal-content">
            <div>
                <img src="<?= $imgPath ?>" alt="konserve">
                <h1><?= $can['name'] ?></h1>
            </div>
            <div>
                <div>
                    <p>Geschmack: <?= $can['score'] ?>/10 </p>
                    <p>Sättigungsgrad: <?= $can['filling'] ?>/10</p>
                </div>
                <p>Zutaten: <?= $can['description'] ?></p>
            </div>
        </article>
    </div> -->

    <div class="can">
        <div class="col s12">
        <?php if ($_SESSION["login"]) : ?>
                        <div>
                            <form action="components/edit_form.php" method="post">
                                <input name="id" type="hidden" value="<?= $can['id'] ?>">
                                <button type="submit">edit</button>
                            </form>
                            <form action="api/delete.php" method="post">
                                <button type="submit">delete</button>
                                <input name="id" type="hidden" value="<?= $can['id'] ?>">
                            </form>
                        </div>
                    <?php endif?>
            <div class="card">
                <a class="" href="produkte.php?id=<?php echo $can['id'] ?>">
                    <div class="card-image face">
                        <img src="<?= $imgPath ?>" alt="konserve">
                        <span class="card-title"><?= $can['name'] ?></span>
                    </div>
                </a>
                <div class="card-content">
                    <p>Geschmack: <?= $can['score'] ?>/10 </p>
                    <p>Sättigungsgrad: <?= $can['filling'] ?>/10</p>
                    <div class="card-footer">
                        <p><?= $can['created'] ?> </p>
                        <div class="symbols">
                            <?= !$can['bio'] ? '' : '<img src="img/bio.png" alt="konserve">' ?>
                            <?= !$can['vegan'] ? '' : '<img src="img/vegan.png" alt="konserve">' ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach;
echo "</div>"; ?>
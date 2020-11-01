<?php
$url = dirname(__DIR__, 2);
include_once $url . '/database/database.class.php';
include_once $url . '/database/migration.class.php';

/* $migrate = new Migration; 
$migrate->addColumn(); */
$connection = new Database;

if (isset($_GET["search"])) {
    $column = $_GET["search"];
    $data = $connection->search($column);
} else {
    $data = $connection->readAll();
}

// loop
echo '<div class="container grid-img">';

foreach ($data as $can) : ?>
    <?php
    $imgPath = "uploads/" . $can['image'];
    $bioImgPath = "img/bio.png";
    ?>

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
            <?php endif ?>
            <div class="card" data-bio="<?php echo $can['bio'] ?>" data-vegan="<?php echo $can['vegan'] ?>">
                <a class="" href="produkte/<?php echo $can['url'] ?>">
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
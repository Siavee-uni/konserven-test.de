<?php
include_once 'database/database.class.php';
// get data
$connection = new Database;
$data = $connection->get();
// loop
echo '<div class="container grid-img">';

foreach ($data as $can) : ?>
<?php $imgPath = "img/" . $can['image'] ?>
<div class="can">
    <div class="col s12">
        <div class="card">
        <div class="card-image">
            <img src="<?= $imgPath?>" alt="konserve">
            <span class="card-title"><?= $can['name'] ?></span>
            <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content">
            <p>Score: <?= $can['score'] ?> </p>
            <p>Datum: <?= $can['date'] ?> </p>
        </div>
        </div>
    </div>
</div> 
<?php endforeach; 
echo "</div>";
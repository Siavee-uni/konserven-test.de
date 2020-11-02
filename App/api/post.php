<?php
$url = dirname(__DIR__, 1);
include_once $url . '/components/session.php';

$server = "http://$_SERVER[HTTP_HOST]";

if ($_SESSION["login"] && ($_SERVER['REQUEST_METHOD'] == 'POST')) {

    $url = dirname(__DIR__, 1);
    include_once $url . '/controllers/ProductController.php';

    $post = new ProductController();

    if ($post->create()) {
        header("Location:" . $server);
    } else {
        echo "something went wrong";
        header("refresh:5; " . $server);
    }

} else {

    echo "You are not logged in";
    header("refresh:5; " . $server );
}
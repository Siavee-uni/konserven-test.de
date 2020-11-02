<?php
$url = dirname(__DIR__, 1);
include_once $url . '/components/session.php';

$server = "http://$_SERVER[HTTP_HOST]";

if ($_SESSION["login"] && isset($_POST["id"])) {

    $url = dirname(__DIR__, 1);
    include_once $url . '/controllers/ProductController.php';

    $productController = new ProductController();

    if ($productController->delete()) {
        header("Location:" . $server);

    } else {
        echo "something went wrong";
        header("refresh:5;" . $server);
    }

} else {
    echo "You are not logged in. Redirect in 5sec";
    header("refresh:5;" . $server);
}


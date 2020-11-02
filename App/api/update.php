<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
$server = "http://$_SERVER[HTTP_HOST]";
if ($_SESSION["login"] && ($_SERVER['REQUEST_METHOD'] == 'POST')) {

    $url = dirname(__DIR__, 1);
    include_once $url . '/controllers/ProductController.php';

    $post = new ProductController();

    if ($post->update()) {
        header("Location:" . $server);
    } else {
        echo "You are not logged in. Redirect in 5sec";
        header("refresh:5;" . $server);
    }
}